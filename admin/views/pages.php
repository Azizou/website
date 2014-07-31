<div class="container">
  
<h1>Page manager</h1>

<div class="row">
	
	<div class="col-md-3">

		<div class="list-group">

			<a class="list-group-item" href="?page=pages">
				<h4 class="list-group-item-heading"><i class="fa fa-plus"></i> New page</h4>
			</a>

		<?php 
		
			$query = "select* from pages order by id asc";
			$result = $db->query($query);
			
			while ($page_list = $result->fetch_assoc()) {
					
				$blured = substr(strip_tags($page_list['content']), 0,150);
				
			?>
				<div id="page_<?php echo $page_list['id']; ?>" class="list-group-item <?php selected($page_list['id'], $opened['id'], 'active') ?>" >
					<h4 class="list-group-item-heading"><?php echo ucwords($page_list['title']); ?>
					<span class="pull-right">
						<a href="" id="del_<?php echo $page_list['id']; ?>" class="btn btn-danger btn-delete"><i class="fa fa-trash-o"></i></a>
						<a href="index.php?page=pages&id=<?php echo $page_list['id']; ?>" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>
					</span>
					</h4>
					<p class="list-group-item-text"><?php echo $blured; ?></p>
				</div>
				
			<?php }?>
		
		</div>
		
	</div>
	<div class="col-md-9">
		
	<?php 
	
		if (isset($message)) {echo $message;}
	
	 ?>
		
	  <form action="index.php?page=pages&id=<?php echo $opened['id']; ?>" method="post" role="form">
		
		<div class="form-group">
			
			<label for="title">Page title</label>
			<input class="form-control" type="text" name="title" id="title" value="<?php 
			if (isset($opened)) {echo $opened['title']; }?>" placeholder="Enter page title here"></input>
			
		</div>
		
		<div class="form-group">
			
			<label for="label">Page Label</label>
			<input class="form-control" type="text" name="label" id="label" value="<?php 
			if (isset($opened)) {echo $opened['label']; }?>" placeholder="Enter page label here"></input>

		
		</div>
		
		<div class="form-group">
			
			<label for="slug">Page slug</label>
			<input class="form-control" type="text" name="slug" id="slug" value="<?php 
			if (isset($opened)) {echo $opened['slug'];} ?>" placeholder="Enter page slug here"></input>
			
		</div>
		
		<div class="form-group">
			
			<label for="user">Page writer</label>
			
			<select class="form-control" name="user" id="user">
				
				<option value="0">No user</option>;
				
				<?php 
				
					$query = "select id from users order by first asc";
					$result = $db->query($query);
					
					while ($user_id = $result->fetch_assoc()) {
								
							$user_data = data_user($db, $user_id['id']);
						
						?>
								
						<option value="<?php echo $user_data['id'] ?>" 
							<?php 
								
								if (isset($_GET['id'])) {
									
									//if ($user_data['id'] == $opened['user']) { echo "selected";}
									selected($user_data['id'], $opened['user'], 'selected');
									
								} else {
									//if ($user_data['id'] == $user['id']) { echo "selected";}
									selected($user_data['id'], $user['id'], 'selected');
								}
								
							 ?>><?php echo $user_data["fullname"]; ?></option>;
						
					<?php } ?>
				
			</select>
			
		</div>
		
		<div class="form-group">
			
			<label for="header">Page header</label>
			<input class="form-control" type="text" name="header" id="herder" value="<?php 
			if (isset($opened)) {echo $opened['header']; }?>" placeholder="Enter page header here"></input>
			
		</div>
		
		<div class="form-group">
			
			<label for="content">Page body</label>
			<textarea class="form-control editor" type="text" name="content" id="content" rows="8" placeholder="Enter page body here">
				<?php 
				
					if (isset($opened)) {
						echo $opened['content'];
						
				}?>
			</textarea>
			
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