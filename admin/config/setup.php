<?php
	//setup file
	
	//Database connection.
	include('../config/connection.php');

	//constants definition.
	define('D_TEMPLATES', 'templates');

	//functions.
	include('functions/data.php');
	include('functions/template.php');
	include('functions/sandbox.php');
	
	//site setup.
	$debug = data_setting_value($db, 'debug-status');
	
	//The we start running queries to the database.
	if (isset($_GET['page'])) {
		# code...
		$page = $_GET['page']; //set $pageid to equal the value given in the URL.
	} else {
		# code...
		//$page = 1; //set $pageid to equal 1 or the home page.
		$page = 'dashboard';
	}
	
	//page setup.
	
	include('queries.php');
	
	/*$row = data_page($db,$pageid);
	$page_title = $row["header"];
	$site_title = $row["title"];*/
	

	
	//User setup.
	$user = data_user($db, $_SESSION['username']);

?>