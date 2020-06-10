<?php
require('../src/config.php');
require('../src/dbconnect.php');
	$_SESSION = ['username'];
	session_destroy();
	redirectLocation('index.php');