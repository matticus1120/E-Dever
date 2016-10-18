<?php

namespace Builder;

include 'Helpers.php';

class Components extends Helpers {

	public function show_me_things( )
	{
		return '<p>Oh ya im a thing</p>';
	}

	public function elem( $args )
	{
		$html = '<' . $args['tag'] . '>' . $args['content'] . '</' . $args['tag'] .'/>';
		return $html;
	}


	public function text_block( $args )
	{
		$args = $this->parse_template_var( $args );
		$array = $this->set_inline_class_args( $args );
		return $this->get_file( $this->dir_settings['component_dir'] . '/text-block.php', $array );
	}

	public function button( $args )
	{
		// $args = $this->parse_template_var( $args );
		// $array = $this->set_inline_class_args( $args );
		return $this->get_file( $this->dir_settings['component_dir'] . '/button.php', $args );
	}

	public function full_width_row( $args )
	{
		return $this->get_file( $this->dir_settings['component_dir'] . '/full-width-row.php', $args );
	}

	public function container( $args )
	{	
		$args['width'] = ( array_key_exists('width', $args) ) ? $args['width'] : '600px';
		return $this->get_file( $this->dir_settings['component_dir'] . '/container.php', $args );
	}

	public function image( $args )
	{	
		return $this->get_file( $this->dir_settings['component_dir'] . '/image.php', $args );
	}

	public function get_content( $args )
	{
		return $this->get_file( $this->dir_settings['content_dir'] . $args['file_name'], $args );
	}

}


