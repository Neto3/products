<h2>Viewing #<?php echo $product->id; ?></h2>
<br>

<dl class="dl-horizontal">
	<dt>Id</dt>
	<dd><?php echo $product->id; ?></dd>
	<br>
	<dt>Name</dt>
	<dd><?php echo $product->name; ?></dd>
	<br>
	<dt>Description</dt>
	<dd><?php echo $product->description; ?></dd>
	<br>
	<dt>Price</dt>
	<dd><?php echo $product->price; ?></dd>
	<br>
	<dt>Image path</dt>
	<dd><?php echo $product->image_path; ?></dd>
	<br>
</dl>

<div class="btn-group">
	<?php echo Html::anchor('admin/product/edit/'.$product->id, 'Edit', array('class' => 'btn btn-warning')); ?>
	<?php echo Html::anchor('admin/product', 'Back', array('class' => 'btn btn-default')); ?>
</div>
