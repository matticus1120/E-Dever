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

		$defaults = $this->get_json_data( __DIR__ . '/styles/defaults.css.json' );
		$this->add_to_styles($defaults);

		$responsive_styles = $this->get_json_data( __DIR__ . '/styles/responsive.css.json');
		$this->add_to_styles($responsive_styles, [
			'breakpoints' => [
					'max-width: 480px'
			]
		] );
	}

	/*replace variables in PHP CSS*/
	public function replace_style_vars($style_arr)
	{
		foreach($style_arr as $key => $arr) {
			foreach($arr as $selector => $value) {
				/*this condition needs to to a string search instead of key check*/
				if(array_key_exists( $value , $this->style_vars)) {
					$style_arr[$key][$selector] = str_replace( $value, $this->style_vars[$value], $style_arr[$key][$selector] );
				}
			}
		}
		return $style_arr;
	}

	/*replace font variables in PHP CSS*/
	public function replace_font_vars($style_arr)
	{
		$array = $style_arr;
		foreach($style_arr as $key => $arr) {
			foreach($arr as $selector => $value) {
				if( 'font-family' == $selector && array_key_exists( $value, $this->font_families) ) {
					$style_arr[$key][$selector] = $this->get_font_rules(  $value);
				}
			}
		}
		return $style_arr;
	}

	/*add variable definitions*/
	public function add_style_vars($vars)
	{
		$array = [];
		foreach($vars as $key => $arr) {
			$array[ '$' . $key ] = $arr;
		}
		$this->style_vars = array_merge($this->style_vars, $array);
	}

	/*add a block of PHP CSS*/
	public function add_to_styles($styles = [], $args = [])
	{
		$this->replace_style_vars($styles);
		$this->replace_font_vars($styles);
		$new_styles = $this->replace_font_vars($styles);

		if( isset($args['breakpoints'] )) {
			$responsive_styles = $this->get_styles_file( 'responsive-style-builder.php', $new_styles, $args );
			$this->add_to_header($responsive_styles);
		}
		else {
			$this->styles = array_merge($this->styles, $this->replace_style_vars($new_styles));
			$styles = $this->get_styles_file( 'style-builder.php', $this->styles );
			$this->add_to_header($styles, 'main-styles');
		}
	}

	public function parse_responsive_styles( $styles, $media_query )
	{
		$this->lt($styles);
		$this->lt($media_query);
	}

	/*get font family rules from font family handle*/
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

	/*add a single font family to the PHP font family array*/
	public function add_font_family($family, $rules) {
		$this->font_families[ $family] = $rules;
	}

	/*add multiple font families to the PHP font family array*/
	public function add_font_families( $familes ) {
		foreach($familes as $family => $rules) {
			$this->add_font_family( $family, $rules );
		}
	}

	/*pass array or comma separated string, return array*/
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

	public function get_attributes( $args )
	{
		$args['height'] = (isset( $args['height'] )) ? str_replace( 'px', '', $args['height'] ): null;
		$args['width'] = (isset( $args['width'] )) ? str_replace( 'px', '', $args['width'] ): null;
		$args['align'] = (isset( $args['align'] )) ? $args['align'] : null;
		$args['valign'] = (isset( $args['valign'] )) ? $args['valign'] : null;

		$args['height'] = ( $args['height'] ) ? 'height="' . $args['height'] . '" ' : '';
		$args['width'] = ( $args['width'] ) ? 'width="' . $args['width'] . '" ' : "";

		$args['align'] = ( $args['align'] ) ? 'align="' . $args['align'] . '" ' : 'align="left"';
		$args['valign'] = ( $args['valign'] ) ? 'valign="' . $args['valign'] . '" ' : 'align="top"';

		return $args;
	}


	/*take php array of styles, return string for inline styles*/
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

	/*take array of php styles, return string for use in stylesheet*/
	public function get_styles_inline( $styles ) 
	{
		$inline = '';
		foreach( $styles as $selector => $value ) :
			$inline .= $selector . ':' . $value . ';';
		endforeach;
		return $inline;
	}

}





