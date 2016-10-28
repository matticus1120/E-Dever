<?php

namespace eDever;

class FileHelpers {

	public $dir_settings = [
		'component_dir' =>  __DIR__  .'/components/',
		'section_dir' =>  __DIR__  .'/sections/',
		'styles_dir' => __DIR__ .'/styles/'
	];
	
	public function get_file( $file, $variables = [], $args = [] )
	{
		ob_start( );
			include $file;
		$output = ob_get_clean();
		return $output;
	}

	public function get_section( $file_name, $variables = [] )
	{
		return $this->get_file(  $this->dir_settings['section_dir'] . $file_name, $variables );
	}

	public function get_component( $file_name, $variables )
	{
		return $this->get_file(  $this->dir_settings['component_dir'] . $file_name, $variables );
	}

	public function get_styles_file( $file_name, $variables, $args = [] )
	{
		return $this->get_file(  $this->dir_settings['styles_dir'] . $file_name, $variables, $args );
	}

	public function get_json_file_content( $file )
	{
		$json = file_get_contents( $file );
		return json_decode( $json, true );
	}

	public function get_json_data( $file )
	{
		$styles =  $this->get_json_file_content( $file );
		return $styles;
	}

	public function get_content( $args )
	{
		return $this->get_file( $this->dir_settings['content_dir'] . $args['file_name'], $args );
	}


}