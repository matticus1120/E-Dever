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

/**
 * Set Styles
 */
$builder->set_styles([
	'h2' => [
		'color' => 'red'
	],
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
	'class' => 'lime-header'
]);

$builder->add_to_body($header);


/**
 * Top Section
 */
$text_row = $builder->text('Im a row of text in a paragraph', 'h1');
/*$text_row = $builder->text('Im a row of text in a paragraph', 'h1');
$text_row .= $builder->text('When in doubt, add a subheading', 'h2');
$text_row .= $builder->text('Now you have a paragraph', 'p');
$text_row .= $builder->text('Hey what the what', 'h3');
*/




$builder
	->add( 'text', 'Im a row of text in a paragraph', 'h1')
	->add( 'text', 'When in doubt, add a subheading', 'h2')
	->add( 'text', 'Now you have a paragraph', 'p')
	->add( 'text', 'Hey what the what', 'h3')
	->wrap('container', [
		'class' => 'simple-container'
	])
	->wrap('full_width_row',[
		'class' => 'grey-full-width'
	])
	->add_to_body_content();








$content = $text_row;

$button = $builder->button([
	'content' => 'You should come to my stuff',
	'url' => 'http://blackjet.ca/'
]);

$content .= $button;

$full_content = $builder->container([
	'content' => $content,
	'class' => 'grey-bg'
]);

$builder->add_to_body($full_content);



$image = $builder->image([
	'src' => 'http://clients.blackjetinteractive.com/eblast/vanguard/images/model-home.jpg'
]);

$full_width_image = $builder->full_width_row([
	'content' => $builder->container([
		'content' => $image,
		'class' => 'nothin'
	]),
	'class' => 'full-width-image-color'
]);

// example
// 	$builder->add('')

$builder->add_to_body($full_width_image);



/**
 * Secondary Section
 */
$builder->add_to_body(
	$builder->container([
		'content' => $builder->get_file( './content/secondary-section.php')
	])
);

/**
 * Footer
 */
$footer = $builder->full_width_row([
	'content' => $builder->container([
		'content' => 'im in the footer',
	]),
	'class' => 'bottom-footer'
]);

$builder->add_to_body($footer);


$builder->get_email();







