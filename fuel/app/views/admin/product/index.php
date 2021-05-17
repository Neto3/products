<h2>Listing Products</h2>
<br>

<?php if ($products): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image path</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($products as $item): ?>
					<tr>
						<td><?php echo $item->id; ?></td>
						<td><?php echo $item->name; ?></td>
						<td><?php echo $item->description; ?></td>
						<td><?php echo $item->price; ?></td>
						<td><?php echo $item->image_path; ?></td>

						<td>
							<?php echo Html::anchor('admin/product/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/product/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/product/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Products.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/product/create', 'Add new Product', array('class' => 'btn btn-success')); ?>
</p>
