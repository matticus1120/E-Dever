<?php

namespace Builder;

class Helpers {

	public $dir_settings = [
		'component_dir' =>  __DIR__  .'/components/',
		'section_dir' =>  __DIR__  .'/sections/',
	];

	public static function getInstance()
	{
		if (null === static::$instance) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public static function doathing()
	{
		echo 'hello';
	}

	public function get_file( $file, $args = [] )
	{
		ob_start( );
			include $file;
		$output = ob_get_clean();
		return $output;
	}

}
