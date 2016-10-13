<?php

namespace Builder;

include 'Helpers.php';

class Components extends Helpers {

	public function show_me_things( )
	{
		return '<p>Oh ya im a thing</p>';
	}

	public function text( $content = '', $tag = 'p' )
	{
		$html = '<' . $tag . '>' . $content . '</' . $tag .'/>';
		return $html;
	}

	public function button( $args )
	{
		return $this->get_file( $this->dir_settings['component_dir'] . '/button.php', $args );
	}

	private function parse_template_var( $args )
	{
		$args['class'] = ( array_key_exists('class', $args ) ) ? $args['class'] : null;
		$args['inline_styles'] = $this->get_class_styles_inline( $args['class'] );

		return $args;
	}

	public function full_width_row( $args )
	{
		$array = $this->parse_template_var( $args );
		return $this->get_file( $this->dir_settings['component_dir'] . '/full-width-row.php', $array );
	}

	public function container( $args )
	{	
		$array = $this->parse_template_var( $args );
		return $this->get_file( $this->dir_settings['component_dir'] . '/container.php', $array );
	}

	public function image( $args )
	{	
		return $this->get_file( $this->dir_settings['component_dir'] . '/image.php', $args );
	}

}


