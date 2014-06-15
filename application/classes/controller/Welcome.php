<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public $template = 'slam_land';

	public function action_index()
	{
		$this->template->page_title = 'Welcome to the Slam Dance Clan!';
	}
}
