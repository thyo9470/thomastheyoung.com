

<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 

error_reporting(E_ALL);                                                                              
 ini_set('display_errors', 1);  

require 'vendor/autoload.php';

$api = new SpotifyWebAPI\SpotifyWebAPI();


// Fetch the saved access token from somewhere. A database for example.
$api->setAccessToken($_GET["access"]);

$data = $api->me();

print_r($data->id);

print_r($api->getMySavedTracks(['limit'=>5]));


/*foreach($data as $key => $value){
    echo $key . '<br>';
    print_r($value);
    echo '<br><br>';
}*/


?> 
 </body>
</html>
