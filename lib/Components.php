<?php

namespace Builder;

include 'Helpers.php';

class Components extends Helpers {

	public $container_count = 0;
	public $image_count = 0;

	public function get_count_class( $elemnt )
	{
		$this->container_count ++;
		$args['class'][] = 'container-count-' . $this->container_count;
	}

	public function add_elem( $args )
	{
		$html = '<' . $args['elem'];
		$html .= ' class=" '. implode(" ", $args['class']) . ' " ' ;
		$html .= ' style="' . $args['class_inline'] . '" ';
		$html .= ' ' . $args['align'] . ' ';
		$html .= ' ' . $args['valign'] . ' ';
		$html .= $args['width_attr'] .  ' ' . $args['height_attr'] .  '>';
		$html .= $args['content'];
		$html .= '</' . $args['elem'] .'>';
		return $html;
	}

	public function tag( $args = [] )
	{
		$args = $this->set_default_class_args( $args );
		$args = $this->set_inline_class_args( $args );
		$args['class_inline'] .= $this->get_elem_styles_inline($args['elem']);
		$args = $this->get_attributes( $args );
		return $this->add_elem( $args );
	}


	public function spacer($height = "20px")
	{
		return $this->add('text_block', [
			'class' => 'spacer, cool-spacer',
			'content' => '',
			'height' => $height
		]);
	}

	public function text_block( $args )
	{
		$args = $this->set_arg_class_attributes($args);
		return $this->get_file( $this->dir_settings['component_dir'] . '/text-block.php', $args );
	}

	public function row( $args )
	{
		$args = $this->set_arg_class_attributes($args);
		return $this->get_file( $this->dir_settings['component_dir'] . '/row.php', $args );
	}

	public function button( $args )
	{
		$args['class_wrapper'] = ( isset( $args['class_outer']) ) ? 'button-wrapper, ' . $args['class_outer'] : 'button-wrapper';
		$args['class_outer'] = ( isset($args['class_outer']) ) ? 'button-outer, ' . $args['class_outer'] : 'button-outer';
		$args['class'] = ( isset(  $args['class'] ) ) ? 'button, ' . $args['class'] : 'button';

		$args = $this->set_arg_class_attributes($args);
		return $this->get_file( $this->dir_settings['component_dir'] . '/button.php', $args );
	}

	public function full_width_row( $args )
	{
		$args = $this->set_arg_class_attributes($args);
		return $this->get_file( $this->dir_settings['component_dir'] . '/full-width-row.php', $args );
	}

	public function container( $args )
	{	
		$args['class_wrapper'] = 'container, ' . $args['class_wrapper'];
		$args = $this->set_arg_class_attributes($args);
		return $this->get_file( $this->dir_settings['component_dir'] . '/container.php', $args );
	}

	public function image( $args )
	{	
		$args = $this->set_arg_class_attributes($args);
		$this->image_count ++;
		$args['class'][] = 'image-count-' . $this->image_count;

		$args['url'] = ( isset($args['url']) ) ? $args['url'] : null;
		return $this->get_file( $this->dir_settings['component_dir'] . '/image.php', $args );
	}

	public function columns( $args )
	{
		$this->lt($args);
		$args = $this->set_arg_class_attributes($args);
		$inner_content = '';
		$width = 600 / count($args['columns']);
		
		foreach($args['columns'] as $key => $column ) {
			$column['elem'] = 'td';
			$column['class'] = 'column';
			$inner_content .= $this->tag( $column );
			$this->lt($column);
		}
		
		$args['content'] = $inner_content;
		$args['class_wrapper'][] = ' columns-' . count($args['columns']);

		$outer_content = $this->get('row',  $args );

		return $outer_content;
	}

}


