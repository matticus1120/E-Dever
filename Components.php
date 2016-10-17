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

	private function parse_template_var( $args )
	{
		$args['class'] = ( array_key_exists('class', $args ) ) ? $args['class'] : null;
		$args['inline_styles'] = ( array_key_exists('class', $args ) ) ? $this->get_class_styles_inline( $args['class'] ) : null;

		return $args;
	}

	public function text_block( $args )
	{
		$array = $this->parse_template_var( $args );
		return $this->get_file( $this->dir_settings['component_dir'] . '/text-block.php', $array );
	}

	public function button( $args )
	{
		$array = $this->parse_template_var( $args );
		return $this->get_file( $this->dir_settings['component_dir'] . '/button.php', $array );
	}

	public function full_width_row( $args )
	{
		$array = $this->parse_template_var( $args );
		return $this->get_file( $this->dir_settings['component_dir'] . '/full-width-row.php', $array );
	}

	public function container( $args )
	{	
		$array = $this->parse_template_var( $args );
		$array['width'] = ( isset( $args['width'] ) ) ? $args['width'] : '600px';
		return $this->get_file( $this->dir_settings['component_dir'] . '/container.php', $array );
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


