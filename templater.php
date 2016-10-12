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

$text_row = $builder->text('Im a row of text in a paragraph', 'h1');
$text_row .= $builder->text('When in doubt, add a subheading', 'h2');
$text_row .= $builder->text('Now you have a paragraph', 'p');

$text_row .= $builder->text('Hey what the what', 'h3');

$content = $text_row;

$button = $builder->button([
		'content' => 'You should come to my stuff',
		'url' => 'http://blackjet.ca/'
	    ]);

$content .= $button;

$full_content = $builder->container([
			'content' => $content
		]);

$builder->add_to_body($full_content);

$builder->get_email();