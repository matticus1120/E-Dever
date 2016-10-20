<?php

namespace Builder;

include 'Sections.php';

class Styles extends Sections {

	public $styles = [];

	public $font_families = [];
	public $style_vars = [];

	public function build_styles()
	{
		$default_fonts = $this->get_json_data( __DIR__ . '/styles/defaults-fonts.css.json' );
		$this->add_font_families( $default_fonts );
		$this->set_font_familiy_styles();

		$defaults = $this->get_json_data( __DIR__ . '/styles/defaults.css.json' );
		$this->add_to_styles($defaults);
	}

	public function replace_style_vars($style_arr)
	{
		foreach($style_arr as $key => $arr) {
			foreach($arr as $selector => $value) {
				if(array_key_exists( $value , $this->style_vars)) {
					$style_arr[$key][$selector] = str_replace( $value, $this->style_vars[$value], $style_arr[$key][$selector] );
				}
			}
		}
		return $style_arr;
	}

	public function add_style_vars($vars)
	{
		$array = [];
		foreach($vars as $key => $arr) {
			$array[ '$' . $key ] = $arr;
		}
		$this->style_vars = array_merge($this->style_vars, $array);
	}

	public function add_to_styles($styles = [])
	{
		$this->replace_style_vars($styles);
		$this->styles = array_merge($this->styles, $this->replace_style_vars($styles));
		$styles = $this->get_file( './styles/style-builder.php', $this->styles );
		$this->add_to_header($styles, 'main-styles');
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


	public function get_json_data( $file )
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






