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
	'black' => '#000000',
	'blue' => '#4cb7ff'
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
	->add('content_block', [
		'content' => $header_text,
	])
	->spacer('40px')
	->wrap('container', [
		'class' => 'black-bg'
	])
->add_to_body_content();


$right_promo = $builder->tag([
	'elem' => 'h2',
	'content' => 'Prices Drop<br>Quality Doesn\'t',
	'class' => 'hero-sub-heading',
	'align' => 'center'
]);
$right_promo .= $builder->tag([
	'elem' => 'h1',
	'content' => 'Save 20% before it\'s too late.',
	'class' => 'hero-heading',
	'align' => 'center'
]);

$builder
	->add('columns', [
		'class_block' => 'hero-images-outer',
		'columns' => [
			[
				'width' => '50%',
				'content' => $builder->get('image', [
					'src' => 'http://localhost:8888/eBlasts/blackjet-template/e-comm/main-banner.jpg'
				])
			],
			[
				'width' => '50%',
				'content' => $builder->get('content_block', [
					'content' => $right_promo,
					'class' => 'align-center'
				])
			]
		]
	])
	->wrap('container', [
		'class' => 'white-bg, top-hero'
	])
->add_to_body_content();

$builder
	->spacer('20px')
	->add('content_block', [
		'content' => $builder->tag([
			'elem' => 'p',
			'content' => 'Chocolate cake marshmallow pie jelly-o chupa chups powder cupcake cookie toffee. Cake jelly wafer powder cotton candy jelly cheesecake. Bear claw gummies apple pie pudding sweet roll. Cookie chocolate bar muffin jelly beans cupcake cheesecake.',
		]),
		'class' => 'content-padding'
	])
	->spacer('20px')
	->add('content_block', [
		'content' => $builder->get('button', [
			'content' => "Shop Now to Save 50%!",
			'align' => 'center'
		])
	])
	->spacer('10px')
	->add('content_block', [
		'content' => $builder->tag([
			'elem' => 'p',
			'content' => 'Use promo code <strong>J533C</strong> at checkout.',
			'class' => 'align-center'
		])
	])
	->spacer('20px')
	->wrap('container', [
		'class' => 'white-bg'
	])
->add_to_body_content();

$builder
	->spacer('15px')
->add_to_body_content();


$col_one = $builder->get('image', [
					'src' => 'http://localhost:8888/eBlasts/blackjet-template/e-comm/square-1.jpg'
				]);
$col_one .= $builder->get('tag', [
					'elem' => 'p',
					'content' => '<a href="">Lookie lookie</a>',
				]);

$col_two = $builder->get('image', [
					'src' => 'http://localhost:8888/eBlasts/blackjet-template/e-comm/square-2.jpg',
				]);
$col_two .= $builder->get('tag', [
					'elem' => 'p',
					'content' => '<a href="">Hi there Lookie lookie</a>',
				]);

$col_three = $builder->get('image', [
					'src' => 'http://localhost:8888/eBlasts/blackjet-template/e-comm/square-3.jpg',
				]);
$col_three .= $builder->get('tag', [
					'elem' => 'p',
					'content' => '<a href="">Click here!</a>',
				]);

$builder
	->add('content_block', [
		'content' => $builder->tag([
			'elem' => 'h3',
			'content' => 'Check out these super duper promos!',
			'class' => 'align-center'
		])
	])
	->add('columns', [
		'class_block' => 'promo-images-outer',
		'columns' => [
			[
				'width' => '200px',
				'content' => $col_one,
			],
			[
				'width' => '200px',
				'content' => $col_two,
			],
			[
				'width' => '200px',
				'content' => $col_three,
			],
		]
	])
	->spacer('25px')
	->wrap('container', [
		'class' => 'white-bg'
	])
	
->add_to_body_content();

$builder
	->spacer('15px')
->add_to_body_content();

$social_icons = $builder
	->columns([
		'columns' => [
			[
				'content' => $builder->get('image', [
					'url' => 'http://facebook.com',
					'src' => 'http://themetalworks.ca/wp-content/themes/metalworks-theme/assets/img/LinkedIn.png',
					'width' => '20px',
					'height' => 'auto'
				])
			],
			[
				'content' => $builder->get('image', [
					'url' => 'http://facebook.com',
					'src' => 'http://themetalworks.ca/wp-content/themes/metalworks-theme/assets/img/Facebook.png',
					'width' => '20px',
					'height' => 'auto'
				])
			],
			[
				'content' => $builder->get('image', [
					'url' => 'http://facebook.com',
					'src' => 'http://themetalworks.ca/wp-content/themes/metalworks-theme/assets/img/youtube.png',
					'width' => '20px',
					'height' => 'auto'
				])
			],
			[
				'content' => $builder->get('image', [
					'url' => 'http://facebook.com',
					'src' => 'http://themetalworks.ca/wp-content/themes/metalworks-theme/assets/img/Twitter.png',
					'width' => '20px',
					'height' => 'auto'
				])
			]
		]
	]);



$menu = $builder
	->menu([
		'align' => 'right',
		'columns' => [
			[
				'content' => $builder->link([
					'url' =>  'http://localhost:8888/eBlasts/blackjet-template/e-comm.php',
					'content' => 'Item One'
				]),
				'align' => 'right',
				'class' => 'footer-menu-item, first-child'
			],
			[
				'content' => $builder->link([
					'url' =>  'http://localhost:8888/eBlasts/blackjet-template/e-comm.php',
					'content' => 'Item Two'
				]),
				'align' => 'right',
				'class' => 'footer-menu-item'
			],
			[
				'content' => $builder->link([
					'url' =>  'http://localhost:8888/eBlasts/blackjet-template/e-comm.php',
					'content' => 'Item Three'
				]),
				'align' => 'right',
				'class' => 'footer-menu-item'
			],
			[
				'content' => $builder->link([
					'url' =>  'http://localhost:8888/eBlasts/blackjet-template/e-comm.php',
					'content' => 'Item One'
				]),
				'align' => 'right',
				'class' => 'footer-menu-item, last-child'
			]
		]
]);

$menu_content_outer = $builder->get('content_block', [
	'content' => $menu,
	'width' => '200px',
	'align' => 'right',
	'class' => 'should-be-menu-outer, align-right',
	'class_block' => 'align-right'
]);

$builder
	->spacer('15px')
->add_to_body_content();

$builder
	->spacer('10px')
	->add('columns', [
		'class_block' => 'social-outer',
		'columns' => [
			[
				'content' => $social_icons,
				'width' => '140px'
			],
			[
				'content' => $menu_content_outer,
				'align' => 'right'
			]
		]
	])
	->spacer('25px')
	->wrap('container', [
		'class' => 'white-bg'
	])
->add_to_body_content();
















$builder->get_email();