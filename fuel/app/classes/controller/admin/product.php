<?php
class Controller_Admin_Product extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Product::query();

		$pagination = Pagination::forge('products_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['products'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Products";
		$this->template->content = View::forge('admin/product/index', $data);
	}

	public function action_view($id = null)
	{
		$data['product'] = Model_Product::find($id);

		$this->template->title = "Product";
		$this->template->content = View::forge('admin/product/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Product::validate('create');

			if ($val->run())
			{
				$product = Model_Product::forge(array(
					'id' => Input::post('id'),
					'name' => Input::post('name'),
					'description' => Input::post('description'),
					'price' => Input::post('price'),
					'image_path' => Input::post('image_path'),
				));

				if ($product and $product->save())
				{
					Session::set_flash('success', e('Added product #'.$product->id.'.'));

					Response::redirect('admin/product');
				}

				else
				{
					Session::set_flash('error', e('Could not save product.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Products";
		$this->template->content = View::forge('admin/product/create');

	}

	public function action_edit($id = null)
	{
		$product = Model_Product::find($id);
		$val = Model_Product::validate('edit');

		if ($val->run())
		{
			$product->id = Input::post('id');
			$product->name = Input::post('name');
			$product->description = Input::post('description');
			$product->price = Input::post('price');
			$product->image_path = Input::post('image_path');

			if ($product->save())
			{
				Session::set_flash('success', e('Updated product #' . $id));

				Response::redirect('admin/product');
			}

			else
			{
				Session::set_flash('error', e('Could not update product #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$product->id = $val->validated('id');
				$product->name = $val->validated('name');
				$product->description = $val->validated('description');
				$product->price = $val->validated('price');
				$product->image_path = $val->validated('image_path');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('product', $product, false);
		}

		$this->template->title = "Products";
		$this->template->content = View::forge('admin/product/edit');

	}

	public function action_delete($id = null)
	{
		if ($product = Model_Product::find($id))
		{
			$product->delete();

			Session::set_flash('success', e('Deleted product #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete product #'.$id));
		}

		Response::redirect('admin/product');

	}

}
