<div id="console-debug">
	<?php 
		
		$all_vars = get_defined_vars();
	
	 ?>
	<h1>Get</h1>
	<pre>
		
		<?php print_r($_GET);?>
	</pre>
	<h1>Post</h1>
	<pre>
		
		<?php print_r($_POST);?>
	</pre>
	
	<h1>Console-debug</h1>
	<pre>
		
		<?php print_r($row); ?>
	</pre>
</div>