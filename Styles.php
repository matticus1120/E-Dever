<?php

namespace Builder;

include 'Sections.php';

class Styles extends Sections {

	public $styles = [];

	public $font_families = [
		'font-family-1' => [
			'Century Gothic, sans-serif',
			'Arial, sans-serif',
		],
		'font-family-2' => [
			'MS Serif, serif',
			'Georgia, sans-serif'
		]
	];

	public function build_styles()
	{
		$this->set_styles();
		$this->set_font_familiy_styles();
		$default_styles = $this->get_file( './styles/defaults.css.php', $this->styles );
		$this->add_to_header($default_styles);
	}

	public function get_font_rules($font_handle)
	{
		$rules = '';
		$family = $this->font_families[$font_handle];
		foreach($family as $key => $rule) {
			$rules .= $rule;
			$rules .= ( $key < count($family) - 1 ) ? ', ' : '';
		}
		return $rules;
	}

	public function add_font_family($family, $rules) {
		$this->font_families[$family] = $rules;
	}

	public function add_font_families( $familes ) {
		foreach($familes as $family => $rules) {
			$this->add_font_family( $family, $rules );
		}
	}

	public function set_font_familiy_styles()
	{
		$this->styles['body']['font-family'] = $this->get_font_rules( 'font-family-1' );
		$this->styles['h1, h2, h3, h4, h5']['font-family'] = $this->get_font_rules( 'font-family-2' );
	}

	public function set_styles($styles = [])
	{
		$defaults = $this->get_json_styles( __DIR__ . '/styles/defaults.css.json' );
		$this->styles = array_merge( $defaults, $styles );
	}

	public function get_json_styles( $file )
	{
		$styles =  $this->get_json_file_content( $file );
		return $styles;
	}

	public function parse_class_args( $classes ) {

		if( !is_array($classes) ) {
			$string = preg_replace('/\s+/', '', $classes);
			$arr = explode(',', $string);
		}
		else {
			$arr = $classes;
		}
		return $arr;
		
	}

	public function get_class_styles_inline( $classes = '' ) 
	{
		if( $classes != '' ) {
			$inline_styles = '';
			foreach($classes as $class) {
				if(  ( isset( $this->styles[ '.' . $class ] ) ) ) {
					$inline_styles .= $this->get_styles_inline( $this->styles[ '.' . $class ]  );
				}
			}
			return $inline_styles;
		}	
		else {
			return [];
		}
		
	}

	public function get_styles_inline( $styles ) 
	{
		$inline = '';
		foreach( $styles as $selector => $value ) :
			$inline .= $selector . ':' . $value . ';';
		endforeach;
		return $inline;
	}

}






