<h2>Viewing #<?php echo $category->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $category->id; ?></dd>
	<br>
	<dt>Name</dt>
	<dd><?php echo $category->name; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/category/edit/'.$category->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/category', 'Back', array('class' => 'btn btn-default')); ?>
</div>
