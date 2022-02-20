<?php

//start session on web page
session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('570075051434-0f0ufmu41aru656l327ar6v1drb5g23q.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/login/index.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');
$google_client->addScope('phone');

?>