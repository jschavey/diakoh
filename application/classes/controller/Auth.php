<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Auth extends Controller_Template {
	public $template = '';

	public function action_index()
	{
		$this->template = 'auth';
	}


}