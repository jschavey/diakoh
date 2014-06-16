<?php defined('SYSPATH') OR die('No direct access allowed.');

class Hero extends D3{
	private $id;
	private $name;

	public function __construct($id = 0)
	{
		parent::__construct();

		if( $id )
		{
			echo $id;
			$hero_array = $this->getHero( $id );
			print_r( $hero_array );

			if( is_array( $hero_array ) )
			{
				foreach($hero_array as $key => $value)
				{
			    	   	$this->{$key} = $value;
				}
			}
		}
	}
}