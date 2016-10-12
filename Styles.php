<?php

namespace Builder;

include 'Sections.php';

class Styles extends Sections {

	public $styles = [
		'h1, h2, h3, h4, h5' => [
			'display' => 'block',
			'margin' => '0',
			'padding' => '0'
		],
		'h1' => [
			'font-size' => '26px',
			'line-height' => '30px',
		],
		'h2' => [
			'font-size' => '21px',
			'line-height' => '25px',
		],
		'img' => [
			'display' => 'block'
		],
		'html, body' => [
			'padding' => '0',
			'margin' => '0'
		],
		'body' => [
			'font-family' => 'Verdana, Helvetica, sans-serif',
			'color' => '#464646'
		],
		'.container' => [
			'width' => '600px',
			'margin' => '0 auto'
		],
	];

	public function __construct()
	{
	}

	public function build_styles()
	{
		$this->set_styles();
		$default_styles = $this->get_file( './styles/defaults.css.php', $this->styles );
		$this->add_to_header($default_styles);
	}

	public function set_styles($styles = [])
	{
		$defaults = $this->styles;
		$this->styles = array_merge( $defaults, $styles );
	}

	public function get_class_styles_inline( $class = '' ) 
	{
		// return ( isset( $this->styles[ '.' . $class ] ) ) ? $this->styles[ '.' . $class ] : false;
		if(  ( isset( $this->styles[ '.' . $class ] ) ) ) {
			return $inline_styles = $this->get_styles_inline( $this->styles[ '.' . $class ]  );
		}
		else {
			return false;
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






