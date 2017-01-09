<?php if(count($errors) > 0): ?>
	<div class="alert alert-danger alert-dismissible" role="alert">
	 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<ul>
			<?php foreach($errors->all() as $error): ?>
				<li><?php echo $error; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php endif; ?>