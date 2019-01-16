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

        $suggest = new suggester( $_SESSION["access"], $_SESSION["refresh"], TRUE );

        $suggest->get_top("artists");        

        $suggest->get_top("tracks");

        ?> 
    </body>
</html>
