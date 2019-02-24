<?php
	session_start();
?>

<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        <?php
        require 'vendor/autoload.php';

        $session = new SpotifyWebAPI\Session(
            '530d37612b3d4e6c8174bc5376c47a58',
            '39c4942e5b3548e092dd492c9aded83b',
            'http://thomastheyoung.com/callback.php'
        );


        // Request a access token using the code from Spotify
        $session->requestAccessToken($_GET['code']);

        $accessToken = $session->getAccessToken();
        $refreshToken = $session->getRefreshToken();

        $_SESSION['access'] = $accessToken;
        $_SESSION['refresh'] = $refreshToken;


        //header('Location: app.php?access='.$accessToken);
        header('Location: app.php');

        die();

        ?> 
    </body>
</html>
