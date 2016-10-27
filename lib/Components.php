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
		return $this->add('content_block', [
			'class' => 'spacer, cool-spacer',
			'content' => '',
			'height' => $height
		]);
	}

	public function content_block( $args )
	{
		$args = $this->set_arg_class_attributes($args);
		return $this->get_file( $this->dir_settings['component_dir'] . '/content-block.php', $args );
	}

	public function row( $args )
	{
		$args = $this->set_arg_class_attributes($args);
		return $this->get_file( $this->dir_settings['component_dir'] . '/row.php', $args );
	}

	public function button( $args )
	{
		$args['class_block'] = ( isset( $args['class_outer']) ) ? 'button-wrapper, ' . $args['class_block'] : 'button-wrapper';
		$args['class_outer'] = ( isset($args['class_outer']) ) ? 'button-outer, ' . $args['class_outer'] : 'button-outer';
		$args['class'] = ( isset(  $args['class'] ) ) ? 'button, ' . $args['class'] : 'button';

		$args = $this->set_arg_class_attributes($args);
		return $this->get_file( $this->dir_settings['component_dir'] . '/button.php', $args );
	}

	public function link($args)
	{
		$args['class'] = ( isset(  $args['class'] ) ) ? 'link, ' . $args['class'] : 'link';
		$args = $this->set_arg_class_attributes($args);

		$html = '<a';
		$html .= ' href="' . $args['url'] . '"';
		$html .= ' class=" '. implode(" ", $args['class']) . ' " ' ;
		$html .= ' style="' . $args['class_inline'] . '" ';
		$html .= $args['width_attr'] .  ' ' . $args['height_attr'] .  '>';
		$html .= $args['content'];
		$html .= '</a>';
		return $html;
	}

	public function full_width_row( $args )
	{
		$args = $this->set_arg_class_attributes($args);
		return $this->get_file( $this->dir_settings['component_dir'] . '/full-width-row.php', $args );
	}

	public function content_wrapper( $args )
	{
		$args['class'] =  ( array_key_exists('class', $args) ) ?  'content-wrapper, ' . $args['class'] : 'content-wrapper';
		$args['class_block'] =  ( array_key_exists('class_block', $args) ) ?  'content-wrapper-block, ' . $args['class'] : 'content-wrapper-block';
		$args = $this->set_arg_class_attributes($args);
		return $this->get_file( $this->dir_settings['component_dir'] . '/content-block.php', $args );
	}

	public function container( $args )
	{	
		$args['class'] = 'container, ' . $args['class'];
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

	public function columns( $args, $elem = 'td', $child_class = 'column' )
	{
		$args['class_block'] =  ( array_key_exists('class_block', $args) ) ?  'row, ' . $args['class_block'] : 'row';
		$args = $this->set_arg_class_attributes($args);
		$inner_content = '';
		$width = 600 / count($args['columns']);
		
		foreach($args['columns'] as $key => $column ) {
			$column['class'] =  ( array_key_exists('class', $column) ) ? $child_class . ', ' . $column['class'] : $child_class;
			$column = $this->set_arg_class_attributes($column);
			$inner_content .=  $this->get_file( $this->dir_settings['component_dir'] . '/column.php', $column );
		}
		
		$args['content'] = $inner_content;
		$outer_content =  $this->get_file( $this->dir_settings['component_dir'] . '/row.php', $args );

		return $outer_content;
	}

	public function menu($args) {
		return $this->columns($args, 'td', 'menu-item');
	}

}


