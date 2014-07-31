<?php 	
	//start session.
	session_start();
	//Database connection.
	include('../config/connection.php');
	
	if ($_POST) {
		
		$query = "select* from users where email = '$_POST[email]' and password = sha1('$_POST[password]') and domain = $_POST[domain]";
		$result = $db->query($query);
		
		if (mysqli_num_rows($result) == 1) {
			
			$user_info = $result->fetch_assoc(); //stores all of the user information.
			
			
			
			$_SESSION['username'] = $_POST['email'];
			
			if ($user_info['domain'] == 0) {
			
				header('Location: index.php?page=pages');
				
			}
			
			if ($user_info['domain'] == 1) {
			
				header('Location: index.php?page=pages');
				
			}
			
			if ($user_info['domain'] == 2) {
			
				//header('Location: index.php?page=pages');
				header('Location: ../index.php');
			
			}
			
			if ($user_info['domain'] == 3) {
			
				//header('Location: index.php?page=pages');
				print_r($user_info);
				
			}
			
			
		}
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login page</title>
	<?php 
		include("../header.php");
		//include("navbar.html");
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

	    <?php //include(D_TEMPLATES.'/navigation.php'); ?>

		<div class="container">
		 <div class="row">

			<div class="col-md-4 col-md-offset-4">
				
				<div class="panel panel-info">
					
					<div class="panel-heading"><h4>Login</h4></div>
					  <div class="panel-body">

						<form action="login.php" method="post" role="form">
							
						  <div class="form-group">
						    <label for="email">Email address</label>
						    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
						  </div>
						  
						  <div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" class="form-control" id="password1" name="password" placeholder="Password">
						  </div>
						  
						  <div class="form-group">
						  	<label for="exampleInputPassword1">Domain</label><br>
						  	<input type="radio" name="domain" value="0">&nbspAdministartor<br>
							<input type="radio" name="domain" value="1">&nbspBoard member<br>
							<input type="radio" name="domain" value="2">&nbspPrincipal InvestigatorI<br>
							<input type="radio" name="domain" value="3">&nbspStudent
						  </div>
						  
						  <button type="submit" class="btn btn-default">Submit</button>
						</form>
						
					</div>
				</div>
					
			</div> <!--end column-->
			
		 </div> <!--end row-->

		</div>
			
	<?php //include(D_TEMPLATES.'/footer.php'); ?>
	
	<?php //if ($debug == 1) { include('widgets/debug.php'); }?>
	

</body>
</html>