<?php
    session_start();
?>

<html>
    <head>
        <title>Spotify</title>
    </head>
    <body>
        <?php 

        error_reporting(E_ALL);                                                                              
        ini_set('display_errors', 1);  
    
        require("spotify_suggest.php");

        echo $_SESSION["access"];
        echo "<br>";
        echo $_SESSION["refresh"];

        die();

        $suggest = new suggester( $_SESSION["access"], $_SESSION["refresh"], $_SESSION["is_host"] );

        $suggest->get_top("artists");        

        $suggest->get_top("tracks");

        ?> 
    </body>
</html>
