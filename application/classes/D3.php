<?php defined('SYSPATH') OR die('No direct access allowed.');

class D3 extends D3_API{
	public function __construct($battlenet_tag = '', $server = 'us', $locale = 'en_US')
	{
		parent::__construct($battlenet_tag, $server, $locale);
	}
}