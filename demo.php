<?php

require_once(  './lib/eDever.php');
$ed = new eDever();

$ed->add_webfont(
	[
		"'Roboto', sans-serif", 
		"'Oswald', sans-serif" 
	], 
	"https://fonts.googleapis.com/css?family=Oswald|Roboto"
);

$ed->add_styles_vars( __DIR__ . '/demo-vars.json'  );
$ed->add_fonts( __DIR__ . '/demo-fonts.json' );
$ed->add_styles( __DIR__ . '/demo-styles.css.json' );

$ed
	->spacer('20px')
	->add('tag', [
		'elem' => 'h1',
		'content' => 'Heading Number Two',
		'class' => "email-headline",
	])
	->add('tag', [
		'elem' => 'p',
		'class' => 'tagline',
		'content' => ' Im just some content in a paragraph tag'
	])
	->spacer('10px')
	->wrap('content_wrapper', [
		'align' => 'center'
	])
	->wrap('container', [
		'class' => 'dark-bg, email-header',
	])
->add_to_body_content();	

$content = $ed->get( 'tag', [
			'elem' => 'h2',
			'content' => 'Check out these super duper promos!'
]);
$content .= $ed->get('tag', [
			'elem' => 'p',
			'content' => 'Sesame snaps dessert sweet roll. Bear claw croissant marzipan halvah cotton candy. Marzipan croissant cheesecake caramels gummi bears chocolate bar caramels carrot cake.'
]);
$content .= $ed->get('tag', [
			'elem' => 'p',
			'content' => 'Icing soufflé bear claw marzipan sweet. Sugar plum cupcake bear claw tootsie roll jujubes. Cake chocolate bonbon tiramisu soufflé biscuit topping lollipop pudding. Caramels wafer danish dragée.'
]);

$ed
	->spacer('20px')
	->add('content_block', [
		'content' => $content
	])
	->spacer('20px')
	->wrap('content_wrapper', [
		'class' => 'padding-sides'
	])
	->wrap('container', [
		'class' => 'white-bg'
	])
->add_to_body_content();

$ed
	->add('image', [
		'src' => 'http://www.loc8tor.com/uk/pets/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/l/i/lifestyle-1-600x600.jpg'
	])
	->wrap('container')
->add_to_body_content();
$ed	
	->spacer('20px')
	->add('content_block', [
		'content' => $ed->tag([
			'elem' => 'p',
			'content' => $ed->get('link', [
				'url' => 'http://gooogle.ca/',
				'content' => 'Go to Google to search for Cats!'
			] )
		])
	])
	->add('tag', [
		'elem' => 'p',
		'content' => 'Gummies liquorice caramels pie soufflé soufflé chocolate ice cream. Candy soufflé icing fruitcake. Powder croissant chupa chups powder carrot cake tart gingerbread jujubes cupcake.'
	])
	->spacer('20px')
	->add('button', [
		'url' => 'https://3.bp.blogspot.com/-JO42VpQgBBE/VulE9xTMVsI/AAAAAAAAHJI/gZoKpck2TBkDTDR3QOCsT-NHgJgp3dEPw/s1600/cute-cats-cats-8477446-600-600.jpg',
		'content' => 'Look at a cat!',
		'class' => 'my-button',
		'align' => 'center'
	])
	->wrap('content_wrapper', [
		'class' => 'padding-sides',
		'align' => 'center'
	])
	->spacer('20px')
	->wrap('container', [
		'class' => 'white-bg'
	])
->add_to_body_content();

$ed
	->spacer('20px')
	->add('tag', [
		'elem' => 'p',
		'class' => 'legal',
		'content' => 'I am legal copy.'
	])
	->spacer('10px')
	->wrap('container')
	->wrap('full_width_row', [
		'class' => 'dark-blue-bg, email-footer'
	])
->add_to_body_content();

$ed->get_email();
