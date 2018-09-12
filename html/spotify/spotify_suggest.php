

<?php

require '../vendor/autoload.php';
require("songs.php");

class suggester {

    private $songs;

    // Spotify
    private $api;           // api object for spotify
    private $accesstoken;
    private $refreshtoken;


    // Mysql
    private $servername =   "localhost";
    private $username   =   "root";
    private $password   =   "Fishfullofdollars@6";
    private $dbname;

    // connection object for mysqli
    private $conn;

    function __construct(){

        $this->songs = get_songs();

    }

    /*
        @param Access and refrsh token for spotify api (both string)
    */
    public static function with_all( $accesstoken, $refreshtoken, $is_host=FALSE, $session_id=NULL){
    
        $out = new self();

        $out->initSQL();
        $out->initSpotify($accesstoken, $refreshtoken);
        $out->createUser($is_host, $session_id);
    
        return $out;
    }


    /*----------------------------------------------------
                Functions
    ----------------------------------------------------*/

    /*
        Starts the spotify api by initiating $api object

        @param Access and refresh token for spotify api (both string)
    */
    public function initSpotify( $accesstoken, $refreshtoken ){
        // start api
        $this->api = new SpotifyWebAPI\SpotifyWebAPI();

        // give access token
        $this->api->setAccessToken($accesstoken);

        // save refresh token
        $this->refreshtoken = $refreshtoken;
    }

    /*
        Creates connection to sql database and stores in $conn object

        @param Name of database to connect to (Default: "spotify_suggest") (string)
    */
    public function initSQL( $dbname = "spotify_suggest" ){
       
        // set the database you are connecting to 
        $this->dbname = $dbname;
    
        // connect to mysql server
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

    }

    /*
        Creates user in the current database

        @param Boolean if the given user is a host (Default: FALSE) (boolean)
    */
    public function createUser( $is_host = FALSE, $session_id=NULL) {

        $data   = $this->api->me();

        $id         = $data->id;
        $name       = $data->display_name;

        $sql    = "INSERT INTO User (ID, Name, RefreshToken, IsHost) VALUES ('{$id}', '{$name}', '{$this->refreshtoken}', " . ((int)$is_host) . " );";

        $success = $this->executeSQL( $sql );


        if($success && $is_host){
            $session_id = $this->createSession();
        }

        if($success){
            $sql = "UPDATE User SET SessionID={$session_id} WHERE ID='{$id}';";
            echo $sql;
            $this->executeSQL( $sql );
        }
    }

    /*
        Creates new music session for the host and guests to connect to

        @return SessionID for the new session (int)
    */
    private function createSession(  ) {
        
        $session_id = $this->get_unique_id( "Session" );

        $session_name = $this->get_unique_name();

        echo $session_name;

        $sql = "INSERT INTO Session (ID, Name) VALUES ('{$session_id}', '{$session_name}');";

        $this->executeSQL( $sql ); 

        return $session_id;

    }
   
    public function findSession( $session_name ) {

        $sql = "SELECT ID FROM Session WHERE Name='{$session_name}'";

        $session_id = array();

        if ($result = $this->conn->query($sql)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                array_push($session_id, $row["ID"]);
            }
        }

        if (count($session_id) > 0){
            return $session_id[0];
        }else{
            return NULL;
        }

    }
 
    /*
        @param  $type: The type of entity you want returned (Artists or Tracks) (string)
                $limit: The number of entities you want returned (Default: 20) (int)
                $offset: The index of the first entity you want returned (Default: 0) (int)

        TODO: Fix time_frame
    */
    public function get_top( $type, $limit = 20, $offset = 0, $time_frame = "medium_term" ){

        $user_id        = $this->api->me()->id;       
        $table = ucfirst(substr($type, 0, -1));

        //reset given user's songs
        $sql = "DELETE FROM {$table} WHERE UserID='{$user_id}';";

        $this->executeSQL($sql);

        $top = $this->api->getMyTop( $type, [ 'limit'=>$limit, 'offset'=>$offset ] );


        foreach($top->items as $entity){
            $id             = $this->get_unique_id( $table );
            $spotify_id      = $entity->id;
            $spotify_name    = $entity->name;
 
            $sql = "INSERT INTO {$table} (ID, SpotifyID, Name, UserID) VALUES ('{$id}', '{$spotify_id}', '{$spotify_name}', '{$user_id}');"; 

            $this->executeSQL($sql); 
        
        }

    }

    /*
        Exeute given sql code

        @param SQL string you want to run (string)
        @return Boolean if it succeeded or not (boolean)
    */
    private function executeSQL( $sql ) {
       
        //echo $sql . "<br><br>";

        if ($this->conn->query($sql) === FALSE){
            //echo "Error: " . $sql . "<br>" . $this->conn->error . "<br><br>";
            return FALSE;
        }
        return TRUE;
    }

    /*
        Create a unique id for a new entry in a table

        @param The table you want to get a unique id for (string)
        @return Unique id for table (int)
    */
    private function get_unique_id( $table ){
        
        $sql    = "SELECT ID FROM {$table};";
      
        $already_exist = array(); 
 
        $unique_id = rand(100, 999999999);

        if ($result = $this->conn->query($sql)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                array_push($already_exist, $row["ID"]);
            }
        }

        while( in_array($unique_id, $already_exist) ){
            $unique_id = rand(100, 999999999);
        }

        return $unique_id;

    }

    /*
        Create a unique name for users to connect to a session

        @return Unique name for session (string)
    */
    private function get_unique_name( ){
        
        $sql    = "SELECT Name FROM Session;";
      
        $already_exist = array(); 
 
        $unique_name = $this->songs[array_rand($this->songs)];

        if ($result = $this->conn->query($sql)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                array_push($already_exist, $row["Name"]);
            }
        }

        while( in_array($unique_name, $already_exist) ){
            $unique_name = $this->songs[array_rand($this->songs)];
        }

        return $unique_name;

    }
}

?>
