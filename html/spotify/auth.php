

<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php

require '../vendor/autoload.php';

$session = new SpotifyWebAPI\Session(
    '530d37612b3d4e6c8174bc5376c47a58',
    '39c4942e5b3548e092dd492c9aded83b',
    'http://localhost/spotify/callback.php'
    //'http://thomastheyoung.com/callback.php'
);

$options = [
    'scope' => [
        'playlist-read-private',
        'user-read-private',
        'user-top-read',
        'user-library-read'
    ],
    'show_dialog' => true,
];

header('Location: ' . $session->getAuthorizeUrl($options));
die();

?> 
 </body>
</html>
