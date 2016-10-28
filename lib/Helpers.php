<?php

namespace eDever;

include 'FileHelpers.php';

class Helpers extends FileHelpers {

	public $added_content = '';
	public $wrappers = [];

	public function lt($data) { ?>
		<script>
			console.log( <?php echo json_encode($data) ; ?>)
		</script>
	<?php }

	public function set_default_class_args( $args )
	{
		$args['class'] = ( array_key_exists('class', $args ) ) ? $this->parse_class_args($args['class']) : [];
		$args['class_outer'] = ( array_key_exists('class_outer', $args ) ) ? $this->parse_class_args($args['class_outer']) : [];
		$args['class_block'] = ( array_key_exists('class_block', $args ) ) ? $this->parse_class_args($args['class_block'] ): [];

		return $args;
	}

	public function set_inline_class_args( $args )
	{
		$args['class_inline'] = $this->get_class_styles_inline( $args['class'] );
		$args['class_outer_inline'] = $this->get_class_styles_inline( $args['class_outer'] );
		$args['class_block_inline'] = $this->get_class_styles_inline( $args['class_block'] );

		return $args;
	}

	public function add( $methodName = '', $args = [] )
	{
		$this->added_content .= $this->$methodName( $args );
		return $this;
	}

	public function get( $methodName = '', $args = [] )
	{
		return $this->$methodName( $args );
	}

	public function set_arg_class_attributes($args = [] ) {
		$args = $this->set_default_class_args( $args );
		$args = $this->set_inline_class_args( $args );
		$args = $this->get_attributes( $args );
		return $args;
	}

	public function wrap( $methodName = '', $args = [] )
	{
		$args['content'] = $this->added_content;
		$this->added_content = $this->$methodName($args);
		return $this;
	}

	public function add_to_body_content()
	{
		$this->add_to_body($this->added_content);
		$this->added_content = '';
		return null;
	}

	public function add_fonts($file) 
	{
		$this->add_font_families($this->get_json_data( $file ) );
	}

	public function add_styles( $file )
	{
		$this->add_to_styles( $this->get_json_data( $file ));
	}

	public function add_styles_vars( $file )
	{
		$this->add_style_vars( $this->get_json_data( $file )  );
	}
}
