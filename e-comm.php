<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once(  './lib/eDever.php');
$ed = new eDever();

$ed->set_settings([
		'title' => 'Cool E-Comm Newsletter',
		'output_file' => __DIR__ . '/e-comm/e-comm.html' 
]);

$ed->add_webfont(
	[
		"'Roboto', sans-serif", 
		"'Oswald', sans-serif" 
	], 
	"https://fonts.googleapis.com/css?family=Oswald|Roboto"
);

$ed->add_styles_vars( __DIR__ . '/e-comm/e-comm-vars.json'  );
$ed->add_fonts( __DIR__ . '/e-comm/e-comm-fonts.json' );
$ed->add_styles( __DIR__ . '/e-comm/e-comm-styles.css.json' );


$header_text = $ed->tag([
		'elem' => 'h1',
		'content' => 'Super Dope E-Comm Letter',
		'class' => 'header-logo, align-center, my-style',
	]);

$ed
	->spacer('40px')
	->add('content_block', [
		'content' => $header_text,
	])
	->spacer('40px')
	->wrap('container', [
		'class' => 'black-bg'
	])
->add_to_body_content();


$right_promo = $ed->tag([
	'elem' => 'h2',
	'content' => 'Prices Drop<br>Quality Doesn\'t',
	'class' => 'hero-sub-heading',
	'align' => 'center'
]);
$right_promo .= $ed->tag([
	'elem' => 'h1',
	'content' => 'Save 20% before it\'s too late.',
	'class' => 'hero-heading',
	'align' => 'center',
]);

/*top banner*/
$ed
	->add('columns', [
		'class_block' => 'hero-images-outer',
		'columns' => [
			[
				'width' => '50%',
				'content' => $ed->get('image', [
					'src' => 'http://localhost:8888/eBlasts/blackjet-template/e-comm/main-banner.jpg'
				])
			],
			[
				'width' => '50%',
				'valign' => 'middle',
				'content' => $ed->get('content_block', [
					'content' => $right_promo,
					'class' => 'align-center'
				])
			]
		]
	])
	/*container*/
	->wrap('container', [
		'class' => 'white-bg, top-hero'
	])
->add_to_body_content();

$ed
	->spacer('20px')
	->add('content_block', [
		'content' => $ed->tag([
			'elem' => 'p',
			'content' => 'Chocolate cake marshmallow pie jelly-o chupa chups powder cupcake cookie toffee. Cake jelly wafer powder cotton candy jelly cheesecake. Bear claw gummies apple pie pudding sweet roll. Cookie chocolate bar muffin jelly beans cupcake cheesecake.',
		]),
		'class' => 'content-padding'
	])
	->spacer('20px')
	->add('content_block', [
		'content' => $ed->get('button', [
			'content' => "Shop Now to Save 50%!",
			'align' => 'center',
			'url' => 'http://globalnews.ca/news/3027015/over-60-per-cent-of-canadians-support-distracted-walking-legislation/'
		])
	])
	->spacer('10px')
	->add('content_block', [
		'content' => $ed->tag([
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

$ed
	->spacer('15px')
->add_to_body_content();


$col_one = $ed->get('image', [
					'src' => 'http://localhost:8888/eBlasts/blackjet-template/e-comm/square-1.jpg',
					'url' => 'http://globalnews.ca/news/3027015/over-60-per-cent-of-canadians-support-distracted-walking-legislation/'
				]);
$col_one .= $ed->get('tag', [
					'elem' => 'p',
					'content' => '<a href="">Lookie lookie</a>',
				]);

$col_two = $ed->get('image', [
					'src' => 'http://localhost:8888/eBlasts/blackjet-template/e-comm/square-2.jpg',
					'url' => 'http://globalnews.ca/news/3027015/over-60-per-cent-of-canadians-support-distracted-walking-legislation/'
				]);
$col_two .= $ed->get('tag', [
					'elem' => 'p',
					'content' => '<a href="">Hi there Lookie lookie</a>',
				]);

$col_three = $ed->get('image', [
					'src' => 'http://localhost:8888/eBlasts/blackjet-template/e-comm/square-3.jpg',
					'url' => 'http://globalnews.ca/news/3027015/over-60-per-cent-of-canadians-support-distracted-walking-legislation/'
				]);
$col_three .= $ed->get('tag', [
					'elem' => 'p',
					'content' => '<a href="">Click here!</a>',
				]);

$ed
	->add('content_block', [
		'content' => $ed->tag([
			'elem' => 'h3',
			'content' => 'Check out these super duper promos!',
			'class' => 'align-center'
		])
	])
	->add('columns', [
		'class_block' => 'promo-images-block',
		'class_outer' => 'promo-images-outer',
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
	->wrap('content_wrapper')
	->wrap('container', [
		'class' => 'white-bg'
	])
	
->add_to_body_content();


$social_icons = $ed
	->columns([
		'columns' => [
			[
				'content' => $ed->get('image', [
					'url' => 'http://facebook.com',
					'src' => 'http://themetalworks.ca/wp-content/themes/metalworks-theme/assets/img/LinkedIn.png',
					'width' => '20px',
					'height' => 'auto'
				])
			],
			[
				'content' => $ed->get('image', [
					'url' => 'http://facebook.com',
					'src' => 'http://themetalworks.ca/wp-content/themes/metalworks-theme/assets/img/Facebook.png',
					'width' => '20px',
					'height' => 'auto'
				])
			],
			[
				'content' => $ed->get('image', [
					'url' => 'http://facebook.com',
					'src' => 'http://themetalworks.ca/wp-content/themes/metalworks-theme/assets/img/youtube.png',
					'width' => '20px',
					'height' => 'auto'
				])
			],
			[
				'content' => $ed->get('image', [
					'url' => 'http://facebook.com',
					'src' => 'http://themetalworks.ca/wp-content/themes/metalworks-theme/assets/img/Twitter.png',
					'width' => '20px',
					'height' => 'auto'
				])
			]
		]
	]);



$menu = $ed
	->menu([
		'align' => 'right',
		'columns' => [
			[
				'content' => $ed->link([
					'url' =>  'http://localhost:8888/eBlasts/blackjet-template/e-comm.php',
					'content' => 'Item One'
				]),
				'align' => 'right',
				'class' => 'footer-menu-item, first-child'
			],
			[
				'content' => $ed->link([
					'url' =>  'http://localhost:8888/eBlasts/blackjet-template/e-comm.php',
					'content' => 'Item Two'
				]),
				'align' => 'right',
				'class' => 'footer-menu-item'
			],
			[
				'content' => $ed->link([
					'url' =>  'http://localhost:8888/eBlasts/blackjet-template/e-comm.php',
					'content' => 'Item Three'
				]),
				'align' => 'right',
				'class' => 'footer-menu-item'
			],
			[
				'content' => $ed->link([
					'url' =>  'http://localhost:8888/eBlasts/blackjet-template/e-comm.php',
					'content' => 'Item One'
				]),
				'align' => 'right',
				'class' => 'footer-menu-item, last-child'
			]
		]
]);

$menu_content_outer = $ed->get('content_block', [
	'content' => $menu,
	'align' => 'left',
	'class' => 'should-be-menu-outer',
	'class_block' => 'align-right'
]);

$ed
	->spacer('15px')
->add_to_body_content();

$ed
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
			]
		]
	])
	->spacer('10px')
	->wrap('content_wrapper')
	->wrap('container', [
		'class' => 'white-bg'
	])
->add_to_body_content();

$ed
	->spacer('20px')
	->add('content_block', [
		'content' => 'Topping brownie gingerbread cake sugar plum bear claw jujubes. Croissant biscuit pudding marshmallow icing cotton candy cupcake. Sesame snaps liquorice cheesecake macaroon cake ice cream tart jujubes. Jelly carrot cake lemon drops oat cake apple pie gingerbread halvah chocolate powder.
			Powder candy cookie croissant chocolate sesame snaps chocolate bar. Topping soufflé cake. Croissant gingerbread marshmallow chocolate cake bonbon. Tiramisu macaroon apple pie marshmallow croissant jelly cupcake tootsie roll.',
			'align' => "left"
	])
	->wrap('container', [
		'class' => 'legal-container'
	])
->add_to_body_content();

$ed->get_email();
// $ed->output_email_to_file();






