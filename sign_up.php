<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php 
		// define variables and set to empty values
		$myfile = "userData.txt";
		$usernameErr = $emailErr = $genderErr = $domainErr = $passwordErr = $passwordConfErr = "*";
		$errmsg = '';
		$username = $email = $gender = $domain = $password = $passwordConf = "";
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if (empty($_POST["name"])) {
				$usernameErr = "Username is required";
			}
			else {
				# code...
				$username = test_input($_POST["name"]);
				// check if name only contains letters and whitespace
			     if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
			       $nameErr = "Only letters and white space allowed"; 
			     }
			}
			if (empty($_POST["email"])) {
				$emailErr = "email is required.";
			}
			else {
				# code...
				$email = test_input($_POST["email"]);
				if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
			       $emailErr = "Invalid email format"; 
			    }
			}
			if (empty($_POST["gender"])) {
				# code...
				$genderErr = "* gender is required.";
			} else {
				# code...
				$gender = $_POST["gender"];
				$genderErr = "";
			}
			if (empty($_POST["domain"])) {
				# code...
				$domainErr = "* domain is required.";
			} else {
				# code...
				$domain = $_POST["domain"];
				$domainErr = "";
			}
			
			if (empty($password)) {
				$passwordErr = "* Password is required.";
			}
			else{
				if (empty($_POST["conf_passord"])) {
					$passwordConfErr = "* Confirm your Password.";
				}
				else{
					if ($_POST["password"] ===  $_POST["conf_passord"]) {
						$password = $_POST["password"];
						if (validate_reg($username,$password,$email,$myfile)) {
							# code...
							$passwordErr = $passwordConf = '';
							echo "Registration successful.";
						} else {
							# code...
							$errmsg = "* $username or $password already in the database.";
						}
						
					} else {
						# code...
						$passwordConfErr = "* the two passwords do not match.";
						$password = $passwordConf = '';
					}
				}
			}
			
			

		}
		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
		function validate_reg($user,$pass,$email,$aFile){
			$file = file_get_contents($aFile);
			$string = "$user||".sha1($pass);
			if (!strstr($file, "$string")) {
				# code...
				$filehandle = fopen($aFile, 'a') or die('Cannot open file $aFile.');
				$stringData = "$user||".sha1($pass)."\n";
				fwrite($filehandle, $stringData);
				fclose($filehandle);
				return true;
			} else {
				# code...
				return false;
			}
			

		}
	 ?>
	<div id="signUp" align="center">
		<span class="error">* required fields</span>
		<form method="post" action="sign_up.php">
		<table>
		<tr>
			<td><strong>Username</strong></td>
			<td><input type="text" name="name" value="<?php echo $username?>"></td>
			<td><span class="error"><?php echo $usernameErr?></span></td>
		</tr>
		<tr>
			<td><strong>E-mail</strong></td>
			<td><input type="text" name="email" value="<?php echo $email?>"></td>
			<td><span class="error"><?php echo $emailErr ?></span></td>
		</tr>
		<tr>
			<td><strong>Password</strong></td>
			<td><input type="password" name="password" value="<?php echo $password?>"></td>
			<td><span class="error"><?php echo $passwordErr ?></span></td>
		</tr>
		<tr>
			<td><strong>Confirm password:</strong></td>
			<td><input type="password" name="conf_passord" value="<?php echo $passwordConf?>"></td>
			<td><span class="error"><?php echo $passwordConfErr ?></span></td>
		</tr>
		<tr>
			<td><strong>Gender:</strong></td>
			<td><input type="radio" name="gender">Male
			<input type="radio" name="gender">Female</td>
			<td><span class="error"><?php echo $genderErr; ?></span></td>
		</tr>
		</table>
			<strong>Domain:</strong>
			<input type="radio" name="domain" value="boardMember">Board member
			<input type="radio" name="domain" value="PI">PI
			<input type="radio" name="domain" value="student">Student<span class="error">*</span><br>
			<span class="error"><?php echo $errmsg; ?></span>
			<input type="submit" name="register" value="Register">
		</form>
		

	</div>

</body>
</html>