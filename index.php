<?php include("./config/setup.php");?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_title." | ".$page_title; ?></title>
	<?php 
		include('config/css.php');
		include("header.php");
		include('config/js.php');
 	?>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

</head>

<body>
	
	<?php $fullname = ''; ?>
	
	<?php $editor_on = false; // check weather or not to display a tet editor box.?>
	
	<?php if (isset($_POST['submitted']) == 1) {
		
		$editor_on = true;
		
	} ?>
	
	<div class="container">
	    <?php include(D_TEMPLATES.'/navigation.php'); ?>
	    
	<!-- Main component for a primary marketing message or call to action -->

	<div class="row equal">
		
	<div class="col-md-2 col-xs-2 col-sm-4">
		
		<div class="jumbotron1">
			
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
	dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
	 reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
	 deserunt mollit anim id est laborum.
	 		</p>
	 		
	 	</div>
	 	
	 	</div>

	<div class="col-md-8 col-xs-8 col-sm-8">
		
		<?php if ($editor_on  == false) {?>
				
			<div class="jumbotron">
				
				<h2><?php echo ucwords($row["header"]); ?></h2>
				
				<?php 
				$myarray = array("Six monthly Report","Initial Proposal","Full Proposal");
	
				if ($row['content'] == "") {
					
					if ($row['title'] == "Initial Proposal") {
						
						$message = "No Initial Proposal available";
						
					}
					
					elseif ($row['title'] == "Full Proposal") {
						
						$message = "No Full Proposal available";
						
					}
					
					/*elseif ($row['title'] == "Six monthly Report") {
						
						$message = "No previous report";
						
					}*/
						
					elseif ($row['title'] == "Six monthly Report") {
						
						$message = "No previous report available";
						
					}
					
				} else {
					$message = $row["content_formatted"];
				}?>
				
				<h2><?php echo  $message ?></h2>
				
				<form method="post" action="" role="form">
					<button type="submit" class="btn btn-default">NEXT</button>
					<input type="hidden" name="submitted" value="1">
				</form>
				
			</div>
			
		<?php } else {?>
		
			
		<?php //if (in_array($row['title'],$myarray)) {?>
				
		<form method="post" action="index.php">
			<div>&nbsp;</div>
			<!--<label for="content"><h3><u>NEXT REPORT</u></h3></label></br>-->
			<label for="content"><h3>Report title</h3></label></br>
			<input class="form-control" type="text" name="slug" id="slug" value="" placeholder="Enter page slug here">
			<label for="body"><h3>Report body</h3></label>
			<textarea class="form-control editor" type="text" name="content" id="content" rows="8" placeholder="Enter page body here">
				
			
			</textarea>
			<div>&nbsp;</div>
			<button type="submit" class="btn btn-default">Save</button>
		</form>
		<?php } ?>
		
		
	</div>

	<div class="col-md-2 col-xs-2 col-sm-2">
		<div class="jumbotron1">
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et 
	dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
	reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia 
	deserunt mollit anim id est laborum.
			</p>
		</div>
	</div>
	</div><!--end of row.-->

	</div><!--end of container -->
	
	<div class="container">
	<div class="jumbotron">
		<h1>Navbar example</h1>
		<p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, 
		so it also adapts to your viewport and device.</p>
		<p>
		<a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
		</p>
	</div>
	</div>

	<?php include(D_TEMPLATES.'/footer.php'); ?>
	
	<?php //if ($debug == 1) { include('widgets/debug.php'); }?>

</body>
</html>