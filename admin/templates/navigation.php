  <!--</div>-->

  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">

    	<?php //nav_main($db,$pageid); ?>
    	<li><a href="?page=dashboard">Dashboard</a></li>
    	<li><a href="?page=pages">Pages</a></li>
    	<li><a href="?page=users">Users</a></li>
    	<li><a href="?page=settings">Settings</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
    	<li>
    		
		    <?php if ($debug == 1) {?>
				<button id="btn-debug" class="btn btn-default navbar-btn"><i class="fa fa-bug"></i></button>
			<?php } ?>
		 
    		
    	</li>
      
      <li class="dropdown">
      	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user["fullname"]; ?><span class="caret"></span></a>
      		<ul class="dropdown-menu">
      			<li><a href="logout.php">Sign out</a></li>
      		</ul>
      </li>

    </ul>
  </div><!--/.nav-collapse -->
</div>