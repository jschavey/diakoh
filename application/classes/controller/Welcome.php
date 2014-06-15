<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Welcome extends Controller_Template {

	public $template = 'slam_land';

	public function action_index()
	{

		$d3 = new D3('emb3r#1997');

		$this->template->page_title = 'Welcome to the Slam Dance Clan!';

		$this->template->d3 = $d3; 
	}
}
