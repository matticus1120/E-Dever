<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once('Builder.php');

/*
1. Builder
2. Styles
3. Sections
4. Components
5. Helpers
*/

$builder = new Builder();

$fonts = [
	'body-font' => [
		"'Domine', serif",
		"Palatino Linotype, sans-serif",
		"Lucida Grande, serif",
	],
	'heading-font' => [
		"Lucida Sans, sans-serif",
		"'Anton', sans-serif",
		"Arial Black, sans-serif"
	],
];

$builder->add_font_families($fonts);

$builder->lt($builder->font_families);

/**
 * Set Styles
 */
$builder->set_styles([
	'.grey-bg' => [
		'background-color' => '#DADFE1',
		'border-top' => 'solid 30px #999C9E',
		'padding-top' => '30px',
		'padding-bottom' => '30px',
	],
	'.lime-header' => [
		'background-color' => '#A2DED0',
		'padding-top' => '30px',
		'padding-bottom' => '30px'
	],
	'.bottom-footer' => [
		'color' => '#E3E7EB',
		'background-color' => '#2E2F30',
		'padding-top' => '30px',
		'padding-bottom' => '30px'
	],
	'.full-width-image-color' => [
		'background-color' => '#9DA1B2'
	],
	'.grey-full-width' => [
		'background-color' => '#4D7BE2'
	],
	'.bg-container' => [
		'background-color' => '#EBE3AA'
	],
	'.polaroid' => [
		'padding-top' => '10px',
		'padding-right' => '10px',
		'padding-bottom' => '40px',
		'padding-left' => '10px',
	],
	'.lazer-cat' => [
		'color' => '#F34573',
		'border' => 'solid thin'
	],
	'.simple-container' => [
		'padding-top' => '20px',
		'padding-bottom' => '20px',
		'font-weight' => '100',
		'font-family' => $builder->get_font_rules( 'heading-font' )
	],
	'.light-blue' => [
		'background-color' => '#C5DEF2'
	]
]);


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
		'class' => ['grey-full-width']
	])
	->add_to_body_content();

$builder
	->add('button', [
		'content' => 'Convert dammit!',
		'url' => "http://google.ca",
		'class' => 'serif-button'
	])
	->wrap('container', [
		'class' => ['simple-container', 'bg-container', 'align-center'],
	])
	->add_to_body_content();

$builder	
	->add('image', [
		'src' => 'http://clients.blackjetinteractive.com/eblast/vanguard/images/model-home.jpg',
		'class' => ['oh-my']
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
		'class' => 'one-class, two-class'
	])
	->wrap('container', [
		'width' => '300px'
	])
	->add_to_body_content();

$builder
	->add('image', [
		'src' => 'https://s-media-cache-ak0.pinimg.com/originals/f3/d4/b4/f3d4b47f240fd6a1353c1c00e67e095a.jpg',
		'class' => 'polaroid, lazer-cat'
	])
	->wrap('container', [
		'width' => '300px'
	])
	->wrap('full_width_row', [
		'class' => ['light-blue'],
	])
	->add_to_body_content();

$builder->get_email();







