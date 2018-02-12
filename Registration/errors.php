<?php if (count($errors) > 0):?>
	<div class="danger">
		<?php foreach ($errors as $error): ?>
			<p class="text-danger"><?php echo $error;?></p>
		<?php endforeach ?>
	</div>
<?php endif?>
<style type="text/css">
	.danger {
		padding: 10px;
		border: 1px solid #a94442;
		background-color: #f2dede;
		border-radius: 5px;
	}
</style>