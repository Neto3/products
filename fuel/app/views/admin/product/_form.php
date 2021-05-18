<?php echo Form::open(); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class' => 'control-label')); ?>

			<?php echo Form::input('name', Input::post('name', isset($product) ? $product->name : ''), array('class' => 'form-control', 'placeholder' => 'Name')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class' => 'control-label')); ?>

			<?php echo Form::input('description', Input::post('description', isset($product) ? $product->description : ''), array('class' => 'form-control', 'placeholder' => 'Description')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Price', 'price', array('class' => 'control-label')); ?>

			<?php echo Form::input('price', Input::post('price', isset($product) ? $product->price : ''), array('class' => 'form-control', 'placeholder' => 'Price')); ?>
		</div>

		<div class="form-group">
			<?php echo Form::label('Image path', 'image_path', array('class' => 'control-label')); ?>

			<?php echo Form::input('image_path', Input::post('image_path', isset($product) ? $product->image_path : ''), array('class' => 'form-control', 'placeholder' => 'Image path')); ?>
		</div>

		<?php
			var_dump($categories);
		?>

		<div class="form-group">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

			<div class="pull-right">
				<?php if (Uri::segment(3) === 'edit'): ?>
					<div class="btn-group">
						<?php echo Html::anchor('admin/product/view/'.$product->id, 'View', array('class' => 'btn btn-info')); ?>
						<?php echo Html::anchor('admin/product', 'Back', array('class' => 'btn btn-default')); ?>
					</div>
				<?php else: ?>
					<?php echo Html::anchor('admin/product', 'Back', array('class' => 'btn btn-link')); ?>
				<?php endif ?>
			</div>
		</div>
	</fieldset>


<?php echo Form::close(); ?>