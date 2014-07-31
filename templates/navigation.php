  <!--</div>-->
<div class="navbar navbar-default" role="navigation">
<div class="container-fluid">
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">

    	<?php nav_main($db, $path); ?>
    </ul>

    <ul class="nav navbar-nav navbar-right">
    	<li>
    			
    		<?php if ($debug == 1) {?>
				<button id="btn-debug" class="btn btn-default"><i class="fa fa-bug"></i></button>
			<?php } ?>
			
		</li>
			
      	<li class="dropdown">
	      	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $fullname; ?><span class="caret"></span></a>
	      		<ul class="dropdown-menu">
	      			<li><a href="admin/logout.php">Sign out</a></li>
	      		</ul>
      	</li>
      	
    </ul>
    
  </div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</div>

    
