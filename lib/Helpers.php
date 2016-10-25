<?php

namespace Builder;

include 'FileHelpers.php';

class Helpers extends FileHelpers {

	public $added_content = '';
	public $wrappers = [];

	public static function getInstance()
	{
		if (null === static::$instance) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	public function lt($data) { ?>
		<script>
			console.log( <?php echo json_encode($data) ; ?>)
		</script>
	<?php }

	public function parse_template_var( $args )
	{
		$args['class'] = ( array_key_exists('class', $args ) ) ? $this->parse_class_args($args['class']) : [];
		$args['class_outer'] = ( array_key_exists('class_outer', $args ) ) ? $this->parse_class_args($args['class_outer']) : [];
		$args['class_wrapper'] = ( array_key_exists('class_wrapper', $args ) ) ? $this->parse_class_args($args['class_wrapper'] ): [];

		return $args;
	}

	public function set_inline_class_args( $args )
	{
		$args['class_inline'] = $this->get_class_styles_inline( $args['class'] );
		$args['class_outer_inline'] = $this->get_class_styles_inline( $args['class_outer'] );
		$args['class_wrapper_inline'] = $this->get_class_styles_inline( $args['class_wrapper'] );

		return $args;
	}

	public function tag( $args = [] )
	{
		$args = $this->parse_template_var( $args );
		$args = $this->set_inline_class_args( $args );
		$args['class_inline'] .= $this->get_elem_styles_inline($args['elem']);
		$args = $this->get_attributes( $args );
		return $this->add_elem( $args );
	}


	public function add( $methodName = '', $args = [] )
	{
		if( is_array($args) ) {
			$args = $this->parse_template_var( $args );
			$args = $this->set_inline_class_args( $args );
			$args = $this->get_attributes( $args );
		}
		$this->added_content .= $this->$methodName( $args );
		return $this;
	}

	public function get( $methodName = '', $args = [] )
	{
		if( is_array($args) ) {
			$args = $this->parse_template_var( $args );
			$args = $this->set_inline_class_args( $args );
			$args = $this->get_attributes( $args );
		}
		return $this->$methodName( $args );
	}

	public function wrap( $methodName = '', $args = [] )
	{
		$args['content'] = $this->added_content;
		$args = $this->parse_template_var( $args );
		$args = $this->set_inline_class_args( $args );
		$this->added_content = $this->$methodName($args);
		return $this;
	}

	public function add_to_body_content()
	{
		$this->add_to_body($this->added_content);
		$this->added_content = '';
		return null;
	}

}
