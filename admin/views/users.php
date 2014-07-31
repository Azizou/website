<?php error_reporting(0); ?>

<div class="container">

<h1>User manager</h1>

<div class="row">
	
	<div class="col-md-3">

		<div class="list-group">

			<a class="list-group-item" href="?page=users">
				<h4 class="list-group-item-heading"><i class="fa fa-plus"></i> New User</h4>
			</a>

		<?php 
		
			$query = "select* from users order by last asc";
			$result = $db->query($query);
			
			while ($user_list = $result->fetch_assoc()) {
					
				//$blured = substr(strip_tags($page_list['content']), 0,150);
				$user_list = data_user($db, $user_list['id']);
				
			?>
				<a class="list-group-item <?php selected($user_list['id'], $opened['id'], 'active') ?>" href="index.php?page=users&id=<?php echo $user_list['id']; ?>">
					<h4 class="list-group-item-heading"><?php echo ucwords($user_list['fullname_reverse']); ?></h4>
					<!--<p class="list-group-item-text"><?php //echo $blured; ?></p>-->
				</a>
				
			<?php }?>
		
		</div>
		
	</div>
	<div class="col-md-9">
		
	<?php 
	
		if (isset($message)) {echo $message;}
	
	 ?>
		
	  <form action="index.php?page=users&id=<?php echo $opened['id']; ?>" method="post" autocomplete="on" role="form">
		
		<div class="form-group">
			
			<label for="first">First Name</label>
			<input class="form-control" type="text" name="first" id="first" value="<?php 
			/*if (isset($opened)) {*/echo ucwords($opened['first']); /*}*/?>" placeholder="First Name">
			
		</div>
		
		<div class="form-group">
			
			<label for="last">Last Name</label>
			<input class="form-control" type="text" name="last" id="last" value="<?php 
			/*if (isset($opened)) {*/echo $opened['last']; /*}*/?>" placeholder="Last Name"">
			
		</div>
		
		
		<div class="form-group">
			
			<label for="email">Email Address</label>
			<input class="form-control" type="text" name="email" id="email" value="<?php 
			/*if (isset($opened)) {*/echo $opened['email']; /*}*/?>" placeholder="Email address">
			
		</div>

		<div class="form-group">
			
			<label for="status">Status</label>
			
			<select class="form-control" name="status" id="status">
				
				<option value="0" <?php /*if (isset($_GET['id'])) {*/ selected('0', $opened['status'], 'Selected');/*}*/?>>Inactive</option>;
				<option value="1" <?php /*if (isset($_GET['id'])) {*/ selected('1', $opened['status'], 'Selected');/*}*/?>>Active</option>;
				
			</select>
			
		</div>
		
		<div class="form-group">
			
			<label for="password">Password</label>
			<input class="form-control" type="password" name="password" id="password" value="" placeholder="password" autocomplete="off">
			
		</div>
		
		
		<div class="form-group">
			
			<label for="passwordconf">Password Confirmation</label>
			<input class="form-control" type="password" name="passwordconf" id="passwordconf" value="" placeholder="Password Confirmation">
			
		</div>
		
		<button type="submit" class="btn btn-default">Save</button>
		
		<input type="hidden" name="submitted" value="1">
		
		<?php if (isset($opened['id'])) {?>
			
			<input type="hidden" name="id" value="<?php echo $opened['id']; ?>">
		
		<?php } ?>
		
	  </form> <!--end form-->
	  
	</div> <!--end column-->
	
</div> <!--end row-->

</div><!--end container-->