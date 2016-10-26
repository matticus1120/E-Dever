<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once(  './lib/Builder.php');

$builder = new Builder();

$builder->set_settings([
		'title' => 'Cool E-Comm Newsletter'
]);

$builder->add_webfont(["'Roboto', sans-serif"], "https://fonts.googleapis.com/css?family=Oswald|Roboto");
$builder->add_webfont(["'Oswald', sans-serif"], "https://fonts.googleapis.com/css?family=Oswald|Roboto");

$builder->add_style_vars([
	'off-white' => '#f7f7f7',
	'white' => '#FFFFFF',
	'blue' => '#4cb7ff',
	'black' => '#000000'
]);

$builder->add_font_families($builder->get_json_data( __DIR__ . '/e-comm/e-comm-fonts.json' ) );
$builder->add_to_styles( $builder->get_json_data( __DIR__ . '/e-comm/e-comm-styles.css.json'));

$header_text = $builder->tag([
		'elem' => 'h1',
		'content' => 'Super Dope E-Comm Letter',
		'class' => 'header-logo, align-center, my-style',
	]);

$builder
	->spacer('40px')
	->add('text_block', [
		'content' => $header_text,
	])
	->spacer('40px')
	->wrap('container', [
		'class' => 'black-bg'
	])
->add_to_body_content();



$builder->get_email();