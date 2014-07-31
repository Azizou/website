<?php
	//setup file
	error_reporting(0);
	include('connection.php');

	//constants definition.
	define('D_TEMPLATES', 'templates');

	//functions.
	include('functions/sandbox.php');
	include('functions/data.php');
	include('functions/template.php');
	
	//site setup.
	$debug = data_setting_value($db, 'debug-status');
	
	$path = get_path(); //holds all the info returning to our URL.
	
	//The we start running queries to the database.
	if (!isset($path['call_parts'][0]) || $path['call_parts'][0] == '' ) {
		# code...
		/*$path['call_parts'][0] = 'home'; //set $pageid to equal the value given in the URL.*/
		
		header('Location: home');
		
	} /*else {
		# code...
		$pageid = 'home'; //set $pageid to equal 1 or the home page.
	}*/
	
	$row = data_page($db,$path['call_parts'][0]);
	$page_title = $row["header"];
	$site_title = $row["title"];
	
?>