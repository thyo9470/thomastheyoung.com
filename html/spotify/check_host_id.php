

<?php
    session_start();

    $_SESSION["is_host"] = FALSE;

    error_reporting(E_ALL);                                                                              
    ini_set('display_errors', 1);  

    require("spotify_suggest.php");

    $suggest = new suggester();

    $suggest->initSQL();

    $session_id = $suggest->findSession($_GET["host_id"]);

    if($session_id){
        header('Location: app.php?session_id=' . $session_id);
    }else{
        header('Location: host_id.php');
    }

?>
