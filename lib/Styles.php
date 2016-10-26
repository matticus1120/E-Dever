<?php

namespace Builder;

include 'Sections.php';

class Styles extends Sections {

	public $styles = [];

	public $font_families = [];
	public $webfonts = [];
	public $style_vars = [];

	public $get_default_image_dimensions = true;

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

	public function add_webfont( $handles, $url) {
		$this->webfonts = array_merge( $handles, $this->webfonts );
		$this->add_to_header( '<link href="'.$url.'" rel="stylesheet" type="text/css">' );
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
					$style_arr[$key][$selector] = $this->get_font_rules( $value );
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
		$new_styles = $this->replace_font_vars($styles);
		$new_styles = $this->replace_style_vars($new_styles);

		if( isset($args['breakpoints'] )) {
			$responsive_styles = $this->get_styles_file( 'responsive-style-builder.php', $new_styles, $args );
			$this->add_to_header($responsive_styles);
		}
		else {
			$old_styles = $this->styles;
			$this->styles = array_merge($old_styles, $this->replace_style_vars($new_styles));
			$styles = $this->get_styles_file( 'style-builder.php', $this->styles );
			$this->add_to_header($styles, 'main-styles');
		}
	}

	/*get font family rules from font family handle*/
	public function get_font_rules($font_handle)
	{
		$rules = '';
		$family = $this->font_families[$font_handle];
		if( $this->is_webfont_in_families($family) ) {
			$family = array_reverse($family);
		}
		foreach($family as $key => $rule) {
			$rules .= $rule;
			$rules .= ( $key < count($family) - 1 ) ? ', ' : '';
		}
		return $rules;
	}

	public function is_webfont_in_families($family) {
		$webfont_handle = false;
		foreach($family as $rule) {
			if( in_array($rule, $this->webfonts) ) {
				$webfont_handle = $rule;
			}
		}
		return $webfont_handle;
	}

	/*add a single font family to the PHP font family array*/
	public function add_font_family($family, $rules) {
		
		$this->font_families[ $family ] = $rules;

	}

	/*add multiple font families to the PHP font family array*/
	public function add_font_families( $familes ) {
		if( count($this->webfonts) > 0 ) {
			$this->add_global_font_rules($familes);
		}
		
		foreach($familes as $family => $rules) {
			$this->add_font_family( $family, $rules );
		}

	}

	public function add_global_font_rules( $familes )
	{
		$global_font_rules = [];
		foreach($familes as $family => $rules) {
			$webfont_handle = $this->is_webfont_in_families($rules);
			$global_font_rules[ '[style*="' . $webfont_handle . '"]' ] = [
				"font-family" => implode(", ", $rules) . ' !important'
			];
		}
		$this->add_to_styles($global_font_rules);
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

	public function get_image_dimensions( $args, $dimension = '' )
	{
		if( isset($args['src']) ) {
			list($width, $height) = getimagesize( $args['src'] );
			return ( 'height' == $dimension )  ? $height : $width;
		}
		return null;
	}

	public function get_attributes( $args )
	{
		
		$default_height = ( $this->get_default_image_dimensions ) ? $this->get_image_dimensions($args, 'height') : null;
		$default_width = ( $this->get_default_image_dimensions ) ? $this->get_image_dimensions($args, 'width') : null;

		$args['height'] = (isset( $args['height'] )) ? str_replace( 'px', '', $args['height'] ) :  $default_height;
		$args['width'] = (isset( $args['width'] )) ? str_replace( 'px', '', $args['width'] ) : $default_width;
		
		$args['align'] = (isset( $args['align'] )) ? $args['align'] : null;
		$args['valign'] = (isset( $args['valign'] )) ? $args['valign'] : null;

		$args['height_attr'] = ( $args['height'] ) ? 'height="' . $args['height'] . '" ' : '';
		$args['width_attr'] = ( $args['width'] ) ? 'width="' . $args['width'] . '" ' : "";

		$args['align'] = ( $args['align'] ) ? 'align="' . $args['align'] . '" ' : 'align="left"';
		$args['valign'] = ( $args['valign'] ) ? 'valign="' . $args['valign'] . '" ' : 'align="top"';

		return $args;
	}


	/*take php array of classes, return string for inline styles*/
	public function get_class_styles_inline( $classes = '' ) 
	{
		if( $classes != '' ) {
			$inline_styles = '';
			foreach($classes as $class) {
				if(  ( isset( $this->styles[ '.' . $class ] ) )  ) {
					$inline_styles .= $this->get_styles_inline( $this->styles[ '.' . $class ]  );
				}
			}
			return $inline_styles;
		}	
		else {
			return [];
		}
		
	}

	/* take element, get inline styles from stylesheets */
	public function get_elem_styles_inline( $elem = '' ) 
	{
		if( $elem != '' ) {
			$inline_styles = '';
			if(  ( isset( $this->styles[ $elem ] ) )  ) {
				$inline_styles .= $this->get_styles_inline( $this->styles[ $elem ] );
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






