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
		'border-bottom' => 'solid 30px #999C9E',
		'padding-top' => '30px',
		'padding-bottom' => '30px',
	],
	'.lime-header' => [
		'background-color' => '#A2DED0',
		'padding-top' => '30px',
		'padding-bottom' => '30px'
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
$text_row .= $builder->text('When in doubt, add a subheading', 'h2');
$text_row .= $builder->text('Now you have a paragraph', 'p');
$text_row .= $builder->text('Hey what the what', 'h3');

$content = $text_row;

$content .= $builder->image([
		'src' => 'http://clients.blackjetinteractive.com/eblast/vanguard/images/model-home.jpg'
	   ]);

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


/**
 * Secondary Section
 */
$builder->add_to_body(
		$builder->container([
			'content' => $builder->get_file( './content/secondary-section.php')
		])
	);

$builder->get_email();














