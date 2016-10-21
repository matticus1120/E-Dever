<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once('Builder.php');

$builder = new Builder();

$builder->add_style_vars([
	'border-cool' => 'solid 10px #DFDFDF',
	'off-white' => '#E5F5F5'
]);
$custom_fonts = $builder->get_json_data( __DIR__ . '/styles/custom-fonts.json' );
$builder->add_font_families( $custom_fonts );

/**
 * Set Styles
 */
$builder->add_to_styles( $builder->get_json_data( __DIR__ . '/styles/custom.css.json') );




/**
 * Header
 */
$image = $builder->image([
	'src' => 'http://clients.blackjetinteractive.com/eblast/vanguard/images/logo.png'
]);

$header = $builder->full_width_row([
	'content' => $image,
	'class' => 'lime-header, cool-header'
]);

// $builder->add_to_body($header);


/**
 * Top Section
 */
$builder->add_to_header('<link href="https://fonts.googleapis.com/css?family=Merriweather:400,700|Roboto" rel="stylesheet">');
$builder->add_to_header('<link href="https://fonts.googleapis.com/css?family=Amatic+SC|Anton|Domine|Josefin+Slab" rel="stylesheet">');



$builder
	->add('elem', [
		'content' => 'Im a row of text in a paragraph',
		'tag' => 'h1'
	])
	->add('elem', [
		'content' => 'Look at me, im a third heading',
		'tag' => 'h3'
	])
	->wrap('container', [
		'class' => ['simple-container']
	])
	->wrap('full_width_row',[
		'class' => 'grey-full-width, vertical-padding'
	])
	->add_to_body_content();

$builder
	->add('button', [
		'content' => 'Convert dammit!',
		'url' => "http://google.ca",
		'class' => 'serif-button, phat-button',
		'class_outer' => 'crazy-outer-classer',
		'class_wrapper' => 'crazy-wrapper-class'
	])
	->wrap('container', [
		'class' => ['simple-container', 'bg-container', 'align-center'],
	])
	->add_to_body_content();

$builder	
	->add('image', [
		'src' => 'http://clients.blackjetinteractive.com/eblast/vanguard/images/model-home.jpg',
		'class' => ['oh-my'],
		'class_outer' => 'cool-image-outer, asdf-asf'
	])
	->wrap('full_width_row', [
		'class' => ['light-blue'],
	])
	->add_to_body_content();

$builder
	->add('text_block', [
		'content' => $builder->get_content([
			'file_name' => 'secondary-section.php'
		]),
		'class' => 'one-class, two-class, wowow'
	])
	->wrap('container', [
		'width' => '400px'
	])
	->add_to_body_content();

$builder
	->add('image', [
		'src' => 'https://s-media-cache-ak0.pinimg.com/originals/f3/d4/b4/f3d4b47f240fd6a1353c1c00e67e095a.jpg',
		'class' => 'lazer-cat',
		'class_outer' => 'polaroid',
		'class_wrapper' => 'wrapper-padding'
	])
	->wrap('container', [
		'width' => '300px'
	])
	->wrap('full_width_row', [
		'class' => ['light-blue'],
	])
	->add_to_body_content();

$builder->get_email();







