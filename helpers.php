<?php

namespace Builder;

class Helpers {

	public $dir_settings = [
		'component_dir' =>  __DIR__  .'/components/',
		'section_dir' =>  __DIR__  .'/sections/',
	];

	public $added_content = '';
	public $wrappers = [];

	public static function getInstance()
	{
		if (null === static::$instance) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public function get_file( $file, $args = [] )
	{
		ob_start( );
			include $file;
		$output = ob_get_clean();
		return $output;
	}

	public function add( $methodName, $content, $args )
	{
		$this->added_content .= $this->$methodName($content, $args);
		return $this;
	}

	public function wrap( $methodName, $args )
	{
		$wrapper_args['content'] = $this->added_content;
		array_merge($wrapper_args, $args);
		$this->added_content = $this->$methodName($wrapper_args);
		return $this;
	}

	public function add_to_body_content()
	{
		$this->add_to_body($this->added_content);
		$this->added_content = '';
		return null;
	}

}
