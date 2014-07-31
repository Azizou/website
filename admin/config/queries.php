<?php 

	switch ($page) {
		
		case 'dashboard':
			
		break;
		case 'pages':
			
			if (isset($_POST['submitted']) == 1) {
				
				$label = mysqli_real_escape_string($db,$_POST['label']);
				$title = mysqli_real_escape_string($db,$_POST['title']);
				$header = mysqli_real_escape_string($db,$_POST['header']);
				$content = mysqli_real_escape_string($db,$_POST['content']);
				
				if (isset($_POST['id']) != '') {
						
					$action = "updated.";
					$query = "update pages set user = $_POST[user], slug='$_POST[slug]', label='$label', title='$title', header='$header', content='$content' where id = $_GET[id]";
					
				} else {
					$action = "added";
					$query = "insert into pages (user, slug, label, title, header, content) values ($_POST[user],'$_POST[slug]','$label','$title','$header','$content')";
				}
				
				
				$result = $db->query($query);
				
				if ($result) {
				
					$message = '<p class="alert alert-success">Page was '.$action.'</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Page cannot be '.$action.' because: </p>'.mysqli_error($db);
					$message .= '<p class="alert alert-warning">Query: '.$query.'</p>';
					
				}
		
			}

			if (isset($_GET['id'])) {
				
				$opened = data_page($db, $_GET['id']);
							
			}
					
		break;
			
		case 'users':
			
			if (isset($_POST['submitted']) == 1) {
				
				$first = mysqli_real_escape_string($db,$_POST['first']);
				$last = mysqli_real_escape_string($db,$_POST['last']);
				
				if ($_POST['password'] != '') {
						
					if ($_POST['password'] === $_POST['passwordconf']) {
							
						$password = "password=sha1('$_POST[password]'),";
						$verify = true;
						
					}else {
						
						$verify = false;
						
					}
							
				}else {
							
					$verify = false;
					
				}
				
				if (isset($_POST['id']) != '') {
						
					$action = "updated.";
					$query = "update users set first ='$first', last='$last',email='$_POST[email]', $password status=$_POST[status] where id = $_GET[id]";
					$result = $db->query($query);
					
				} else {
							
					$action = "added";
		
					$query = "insert into users (first, last, email, password, status) values ('$first','$last','$_POST[email]',sha1('$_POST[password]'),'$_POST[status]')";
					
					if ($verify == true) {
						
						$result = $db->query($query);
						
					}
	
				}
	
				
				if ($result) {
				
					$message = '<p class="alert alert-success">User was '.$action.'</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">User cannot be '.$action.' because: </p>'.mysqli_error($db);
					
					if ($verify == false) {
						
						$message .= '<p class="alert alert-danger">Password field empty and/or do not match.</p>';
						
					}
					
					$message .= '<p class="alert alert-warning">Query: '.$query.'</p>';
					
				}
		
			}

			if (isset($_GET['id'])) {
				
				$opened = data_user($db, $_GET['id']);
							
			}
					
		break;
					
		case 'settings':
			
		break;

		default:
			
		break;
	}
					
 ?>