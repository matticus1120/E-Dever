<?php

include 'Styles.php';

use Builder\Styles;

class Builder extends Styles {

	public $settings = [
		'title' => 'Blackjet Eblast Template'
	];

	public $email = null;
	public $header = [];
	public $body = [];
	public $footer = [];

	public function __construct($settings = null) 
	{
		if($settings) {
			$this->settings = $settings;
		}
		$this->build_styles();
	}

	public function set_settings($settings = [])
	{
		$this->settings = $settings;
	}

	public function add_to_head( $content )
	{
		$this->head[] = $content;
	}

	public function add_to_header($content, $key = false)
	{
		if( $key ) {
			$this->header_items[$key] = $content;
		}
		else {
			$this->header_items[] = $content;
		}
	}

	public function add_to_body($content)
	{
		$this->body_items[] = $content;
	}

	public function build_header()
	{
		foreach($this->header_items as $item)
		{
			$this->append_head_content($item);
		}
	}

	public function build_body()
	{
		foreach($this->body_items as $item)
		{
			$this->append_body_content($item);
		}

	}

	public function build_email()
	{
		// $this->build_styles();
		$this->build_header();
		$this->build_body();

		$this->email = $this->get_entire_email();
	}

	public function get_email()
	{
		$this->build_email();
		echo $this->email;
	}

}






