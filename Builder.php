<?php

include 'Components.php';
include 'Sections.php';

use Builder\Components as Components;
use Builder\Sections as Sections;

class Builder {

	public $settings = [
		'styles' => [
			'colors' => [
				'primary' => 'red',
				'secondary' => 'blue'
			],
			'fonts' => [
				'primary' => [
					"Oswald sans-serif",
					"Arial, sans-serif"
				],
				'secondary' => [
					"Kameron, serif",
					"Georgia, serif"
				]
			]
		],	
		'meta' => [
			'title' => 'Blackjet Eblast Template'
		]
	];

	public $email = null;
	public $header = [];
	public $body = [];
	public $footer = [];

	private $sections;

	public function __construct($settings = null) 
	{
		if($settings) {
			$this->settings = $settings;
		}
		$this->sections = Sections::getInstance();
	}

	public function show_settings() 
	{
		var_dump($this->settings);
		echo '<hr>';
		echo  Components::show_me_things();
	}

	public function add_to_head( $content )
	{
		$this->head[] = $content;
	}

	public function add_to_header($content)
	{
		$this->header_items[] = $content;
	}

	public function add_to_body($content)
	{
		$this->body_items[] = $content;
	}

	public function build_header()
	{
		// $sections = Sections::getInstance();
		foreach($this->body_items as $item)
		{
			$this->sections->append_head_content($item);
		}
	}

	public function build_body()
	{
		// $sections = Sections::getInstance();
		foreach($this->body_items as $item)
		{
			$this->sections->append_body_content($item);
		}

	}

	public function build_email()
	{
		$this->build_header();
		$this->build_body();

		$this->email = $this->sections->get_entire_email();
	}

	public function get_email()
	{
		$this->build_email();
		echo $this->email;
	}

}






