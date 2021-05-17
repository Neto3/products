<?php
class Controller_Admin_Category extends Controller_Admin
{

	public function action_index()
	{
		$query = Model_Category::query();

		$pagination = Pagination::forge('categories_pagination', array(
			'total_items' => $query->count(),
			'uri_segment' => 'page',
		));

		$data['categories'] = $query->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$this->template->set_global('pagination', $pagination, false);

		$this->template->title   = "Categories";
		$this->template->content = View::forge('admin/category/index', $data);
	}

	public function action_view($id = null)
	{
		$data['category'] = Model_Category::find($id);

		$this->template->title = "Category";
		$this->template->content = View::forge('admin/category/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Category::validate('create');

			if ($val->run())
			{
				$category = Model_Category::forge(array(
					'name' => Input::post('name'),
				));

				if ($category and $category->save())
				{
					Session::set_flash('success', e('Added category #'.$category->id.'.'));

					Response::redirect('admin/category');
				}

				else
				{
					Session::set_flash('error', e('Could not save category.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Categories";
		$this->template->content = View::forge('admin/category/create');

	}

	public function action_edit($id = null)
	{
		$category = Model_Category::find($id);
		$val = Model_Category::validate('edit');

		if ($val->run())
		{
			$category->id = Input::post('id');
			$category->name = Input::post('name');

			if ($category->save())
			{
				Session::set_flash('success', e('Updated category #' . $id));

				Response::redirect('admin/category');
			}

			else
			{
				Session::set_flash('error', e('Could not update category #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$category->id = $val->validated('id');
				$category->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('category', $category, false);
		}

		$this->template->title = "Categories";
		$this->template->content = View::forge('admin/category/edit');

	}

	public function action_delete($id = null)
	{
		if ($category = Model_Category::find($id))
		{
			$category->delete();

			Session::set_flash('success', e('Deleted category #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete category #'.$id));
		}

		Response::redirect('admin/category');

	}

}
