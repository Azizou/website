<!DOCTYPE html>
<html>
<head>
	<title>header</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="pi_siteHead">
	<div id="pi_siteHeadcontent">
	</div>
	</div>
	<div id="gaap">&nbsp;</div>
</body>
</html>
<?php 

	//start a session;
	session_start();
	
	if (!isset($_SESSION['username'])) {
		header('Location: login.php');
	}

 ?>
 
<?php include("./config/setup.php");?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php 
		//include("header.php");
		include('./config/css.php');
		include('./config/js.php');
 	?>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

</head>

<body>

	<!-- Static navbar -->
	<div class="navbar navbar-default" role="navigation">
		
		<?php include(D_TEMPLATES.'/navigation.php'); ?>
	    
	</div>