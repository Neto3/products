<?php
class Model_Product extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'description',
		'price',
		'image_path',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[40]');
		$val->add_field('description', 'Description', 'required|max_length[80]');
		$val->add_field('price', 'Price', 'required');
		$val->add_field('image_path', 'Image Path', 'required|max_length[100]');

		return $val;
	}

}
