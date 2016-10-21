<?php

namespace Builder;

include 'Helpers.php';

class Components extends Helpers {

	public function show_me_things( )
	{
		return '<p>Oh ya im a thing</p>';
	}

	public function add_elem( $args )
	{
		$html = '<' . $args['elem'] . ' class="'. implode(" ", $args['class']) . '" style="' . $args['class_inline'] . '">' . $args['content'] . '</' . $args['elem'] .'/>';
		return $html;
	}

	public function spacer($height = "20px")
	{
		return $this->add('text_block', [
			'class' => 'spacer, cool-spacer',
			'content' => ''
		]);
	}

	public function text_block( $args )
	{
		return $this->get_file( $this->dir_settings['component_dir'] . '/text-block.php', $args );
	}

	public function row( $args )
	{
		return $this->get_file( $this->dir_settings['component_dir'] . '/row.php', $args );
	}

	public function button( $args )
	{
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
		$args['url'] = ( isset($args['url']) ) ? $args['url'] : null;
		return $this->get_file( $this->dir_settings['component_dir'] . '/image.php', $args );
	}

	public function columns( $args )
	{
		$inner_content = '';
		$width = 600 / count($args['columns']);

		foreach($args['columns'] as $key => $column ) {
			$column['elem'] = 'td';
			$inner_content .= $this->tag( $column );
		}
		
		$args['content'] = $inner_content;

		$outer_content = $this->get('row',  $args );

		return $outer_content;
	}

	public function get_content( $args )
	{
		return $this->get_file( $this->dir_settings['content_dir'] . $args['file_name'], $args );
	}

}


