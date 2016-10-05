<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once('Builder.php');

$builder = new Builder();

$builder->add_to_body('<h1>Im a brand new section</h1>');
$builder->add_to_body('<h2>And a subheading yo</h2>');

$builder->get_email();