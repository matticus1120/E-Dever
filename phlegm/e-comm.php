<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once(  './lib/Builder.php');

$builder = new Builder();

$builder->add_webfont(["'Oswald', sans-serif", "'Roboto', sans-serif"]);

$buidler->add_style_vars([
	'off-white' => '#f7f7f7',
	'white' => '#FFFFFF',
	'blue' => '#4cb7ff',
	'black' => '#000000'
]);

$builder->add_font_families($builder->get_json_data( __DIR__ . '/e-comm/e-comm-fonts.json' ) );
$builder->add_to_styles( $builder->get_json_data( __DIR__ . '/e-comm/e-comm-styles.css.json'));

$builder
	->spacer('40px')
	->tag('h1', [
		'content' => 'Super Dope E-Comm Letter',
		'class' => 'header-logo'
	])
	->wrap('container', [
		'class' => 'black-bg'
	])
->add_to_body_content();