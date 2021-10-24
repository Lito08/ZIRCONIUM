<?php

require_once 'vendor/autoload.php';

$google_client = new Google_Client();

$google_client->setClientId('790191633841-4s6tp9gdb6qhh6n4lsaejt130tmmcqj9.apps.googleusercontent.com');

$google_client->setClientSecret('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');

$google_client->setRedirectUri('http://localhost/ZIRCONIUM/vendor/index.php');

$google_client->addScope('email');

$google_client->addScope('profile');

session_start();

?>