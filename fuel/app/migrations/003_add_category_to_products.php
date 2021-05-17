<?php

namespace Fuel\Migrations;

class Add_category_to_products
{
	public function up()
	{
		\DBUtil::add_fields('products', array(
			'category' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('products', array(
			'category'
		));
	}
}