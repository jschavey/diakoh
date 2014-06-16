<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Student extends ORM{
	protected $_primary_key = '$stUserID';
	protected $_table_name = 'student';
	protected $_table_columns = array(
		'stUserID' => NULL,

		);
    
}