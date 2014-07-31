<?php 

	//start a session.
	session_start();
	unset($_SESSION['username']); //delete the username key.
	//session_destroy(); //this would destroy everything.
	header('Location: login.php');

 ?>