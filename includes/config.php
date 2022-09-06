<?php

ob_start();
session_start();

require_once('connection.php');

// define site path
define('DIR','https://filmix.herokuapp.com/');

// define admin site path
define('DIRADMIN','https://filmix.herokuapp.com/admin/');

// define site title for top of the browser
define('SITETITLE','Filmx');

//define include checker
define('included', 1);

require_once('functions.php');

?>
