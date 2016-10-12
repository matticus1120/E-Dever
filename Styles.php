<?php

namespace Builder;

include 'Sections.php';

class Styles extends Sections {

	public $styles = [
		'tags' => [
			'h1, h2, h3, h4, h5' => [
				'display' => 'block',
				'margin' => '0',
				'padding' => '0'
			],
			'h1' => [
				'color' => '#202020',
				'font-size' => '26px',
				'line-height' => '30px',
			],
			'h1' => [
				'color' => '#202020',
				'font-size' => '21px',
				'line-height' => '25px',
			],
		],
		'common' => [
			'html, body' => [
				'padding' => '0',
				'margin' => '0'
			],
			'body' => [
				'font-family' => 'Verdana, Helvetica, sans-serif',
				'background-color' => '#ECECEC'
			],
			'.container' => [
				'width' => '600px',
				'margin' => '0 auto'
			]
		]
	];

	public function __construct() {
	}

	public function set_styles() {
		$default_styles = $this->get_file( './styles/defaults.css.php', $this->styles );
		$this->add_to_header($default_styles);
	}

}






