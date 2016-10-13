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

	public function full_width_row( $args )
	{
		$class = ( isset($args['class']) ) ? $args['class'] : null;
		$args['inline_styles'] = $this->get_class_styles_inline( $class );
		
		return $this->get_file( $this->dir_settings['component_dir'] . '/full-width-row.php', $args );
	}

	public function container( $args )
	{	
		$class = ( isset($args['class']) ) ? $args['class'] : null;
		$args['inline_styles'] = $this->get_class_styles_inline( $class );

		return $this->get_file( $this->dir_settings['component_dir'] . '/container.php', $args );
	}

	public function container_chain( $args )
	{	
		$class = ( isset($args['class']) ) ? $args['class'] : null;
		$args['inline_styles'] = $this->get_class_styles_inline( $class );

		$this->wrapper_content = $this->container($args);

		return $this;
		// return $this->get_file( $this->dir_settings['component_dir'] . '/container.php', $args );
	}

	public function image( $args )
	{	
		return $this->get_file( $this->dir_settings['component_dir'] . '/image.php', $args );
	}

}


