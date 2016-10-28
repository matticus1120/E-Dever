<?php

namespace eDever;

include 'Components.php';

class Sections  extends Components {

	private static $instance;

	/*head*/
	public $head = null;
	public $head_start = null;
	public $head_content = '';
	public $head_end = null;

	/*body*/
	public $body = null;
	public $body_start = null;
	public $body_content = '';
	public $body_end = null;

	public function __construct()
	{
		$this->set_head();
		$this->set_body();
	}

	public static function getInstance()
	{
		if (null === static::$instance) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public function get_entire_email()
	{
		$entire_email = $this->get_head();
		$entire_email .= $this->get_body();

		return $entire_email;
	}

	/**
	 * Head Portions
	 */
	public function set_head()
	{
		$this->head = $this->get_head_start();
		$this->head .= $this->get_head_content();
		$this->head .= $this->get_head_end();
	}

	public function get_head()
	{
		$this->set_head();
		return $this->head;
	}

	public function get_head_start()
	{
		$settings = $this->settings;
		return $this->get_section( 'head_start.php', $settings );
	}

	public function get_head_content()
	{
		return $this->head_content;
	}

	public function append_head_content( $content = null )
	{
		$this->head_content .= $content;
	}

	public function get_head_end()
	{
		return $this->get_section( 'head_end.php' );
	}



	/**
	 * Body Portions
	 */
	public function set_body()
	{
		$this->body = $this->get_body_start();
		$this->body .= $this->get_body_content();
		$this->body .= $this->get_body_end();
	}

	public function get_body()
	{
		$this->set_body();
		return $this->body;
	}

	public function get_body_start()
	{
		return $this->get_section('body_start.php' );
	}

	public function get_body_content()
	{
		return $this->body_content;
	}

	public  function append_body_content($content = null)
	{
		$this->body_content  = $this->body_content . $content;
	}

	public function get_body_end()
	{
		return $this->get_section( 'body_end.php' );
	}

}