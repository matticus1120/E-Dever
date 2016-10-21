<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once('Builder.php');

$builder = new Builder();

/**
 * Set Variables and Fonts
 */
$builder->add_to_header('<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">');
$builder->add_style_vars([
	'black' => '#000000',
	'white' => '#FFF',
	'grey' => '#8a8a8a'
]);
$builder->add_font_families($builder->get_json_data( __DIR__ . '/phlegm/phlegm-fonts.json' ) );
$builder->add_to_styles( $builder->get_json_data( __DIR__ . '/phlegm/phlegm-styles.css.json') );


/**
 * Content
 */

$builder
	->add('image', [
		'src' => 'http://clients.blackjetinteractive.com/eblast/yongestclair/top-image.jpg'
	])
	->wrap('container', [
		'class' => ['simple-container']
	])
	->wrap('full_width_row', [
		'class_wrapper' => 'grey-bg'
	])
	->add_to_body_content();

$text = $builder->tag([ 
	'elem' => 'p', 
	'content' => "For the better part of a month Phlegm's been painting an 8-storey masterpiece on the side of 1 St. Clair West. Now it's time to unveil the work.",
	'class' => 'dark-p'
]);
// $text .= $builder->spacer('50px');
$text .= $builder->tag([ 
	'elem' => 'p', 
	'content' => "Join other influential members of the community, prominent Toronto artists, city builders, and the media for this invite only affair."
]);

$text .= $builder->tag([
	'elem' => 'p',
	'content' => '6 to 8pm August 17<br />on the Roof of Scallywags<br />11 St. Clair West'
]);

$builder
	->spacer('80px')
	->add('text_block', [
		'content' => $text,
		'class' => 'white-text, align-center'
	])
	->spacer('40px')
	->add('button', [
		'content' => 'RSVP',
		'url' => 'mailto:rsvp@kimgraham.ca?subject=Yonge%20%2B%20St.%20Clair%20Mural%20Unveiling%20RSVP',
		'class' => 'phlegm-btn',
		'class_outer' => 'align-center, vertical-padding'
	])
	->wrap('container', [
		'class' => 'simple-container',
	])
	->wrap('full_width_row', [
		'class_wrapper' => 'black-bg'
	])
->add_to_body_content();


$builder
	->spacer('50px')
	->add('image', [
		'src' => 'http://clients.blackjetinteractive.com/eblast/yongestclair/steps-initiative-logo.jpg',
		'url' => 'http://www.stepsinitiative.com/projects/stclair/'
	])
	->wrap('container', [
		'class' => 'step-container',
		'width' => '350px'
	])
	->spacer('50px')
	->wrap('container', [
		'class' => 'main-container',
		'width' => '600px'
	])
	->wrap('full_width_row', [
		'class' => 'white-bg'
	])
->add_to_body_content();

$builder
	->add('columns', [
		'class_wrapper' => 'cool-ass-columns',
		'height' => '120px',
		'columns' => [
			[
				'content' => $builder->get('image', [
					'src' => 'http://clients.blackjetinteractive.com/eblast/yongestclair/slate-logo.jpg',
					'url' => 'http://www.slateam.com/investments/private-funds/slate-advisors/yonge-and-st-clair-revitalization/'
				]),
				'class' => 'align-left',
				'width' => '50%',
			],
			[
				'content' => $builder->get('image', [
					'src' => 'http://clients.blackjetinteractive.com/eblast/yongestclair/start.jpg',
					'url' => 'http://www1.toronto.ca/wps/portal/contentonly?vgnextoid=bebb4074781e1410VgnVCM10000071d60f89RCRD'
				]),
				'class' => 'align-right',
				'width' => '50%'
			],
		]
	])
	->spacer('80px')
	->wrap('container', [
		'class' => 'simple-container',
		'width' => '240px'
	])
	->wrap('full_width_row', [
		'class_wrapper' => 'white-bg'
	])
->add_to_body_content();


$builder
	->add('columns', [
		'class_wrapper' => 'cool-ass-columns',
		'height' => '120px',
		'columns' => [
			[
				'content' => $builder->get('image', [
					'src' => 'http://clients.blackjetinteractive.com/eblast/yongestclair/cbre-logo.jpg',
					'url' => 'http://www.cbre.ca/EN/Pages/Home.aspx',
					'align' => 'left'
				]),
				'class' => 'align-center',
				'width' => '20%',
			],
			[
				'content' => $builder->get('image', [
					'src' => 'http://clients.blackjetinteractive.com/eblast/yongestclair/cibc.jpg',
					'url' => 'http://www.cibccm.com/',
					'align' => 'center'
				]),
				'class' => 'align-center',
				'width' => '20%',
			],
			[
				'content' => $builder->get('image', [
					'src' => 'http://clients.blackjetinteractive.com/eblast/yongestclair/rexall.jpg',
					'url' => 'http://www.rexall.ca/',
					'align' => 'center'
				]),
				'class' => 'align-center',
				'width' => '20%',
			],
			[
				'content' => $builder->get('image', [
					'src' => 'http://clients.blackjetinteractive.com/eblast/yongestclair/dulux.jpg',
					'url' => 'https://www.dulux.ca/diy/home',
					'align' => 'right'
				]),
				'class' => 'align-center',
				'width' => '20%',
			],
		]
	])
	->spacer('80px')
	->wrap('container', [
		'class' => 'simple-container',
		'width' => '360px'
	])
	->wrap('full_width_row', [
		'class_wrapper' => 'white-bg'
	])
->add_to_body_content();



$builder->get_email();




