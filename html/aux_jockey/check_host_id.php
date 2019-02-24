

<?php
    session_start();


    error_reporting(E_ALL);                                                                              
    ini_set('display_errors', 1);  

    require("spotify_suggest.php");

    $suggest = new Jockey();

    $suggest->initSQL();

    $session_id = $suggest->findSession($_GET["host_id"]);

    if($session_id){
        $_SESSION["is_host"] = FALSE;
        $_SESSION['session'] = array($session_id, $_GET['host_id']);
        header('Location: app.php');
    }else{
        header('Location: host_id.php');
    }

?>
