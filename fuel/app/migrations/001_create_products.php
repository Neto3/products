<?php

namespace Fuel\Migrations;

class Create_products
{
	public function up()
	{
		\DBUtil::create_table('products', array(
			'id' => array('type' => 'int', 'unsigned' => true, 'null' => false, 'auto_increment' => true, 'constraint' => '11'),
			'name' => array('constraint' => 40, 'null' => false, 'type' => 'varchar'),
			'description' => array('constraint' => 80, 'null' => false, 'type' => 'varchar'),
			'price' => array('constraint' => '10,2', 'null' => false, 'type' => 'decimal'),
			'image_path' => array('constraint' => 100, 'null' => false, 'type' => 'varchar'),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('products');
	}
}