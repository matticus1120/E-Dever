E-Dever
-------
_HTML Email Development Tool_


E-Dever is a library with a developer friendly API that allows you to use PHP methods and chaining and JSON to output cross-client safe HTML Emails. Out of the box, you only need to string content together using the layout builder, and the default styles will be set in the head as well as inline with the elements you choose.

With the built in helpers, you can include styles, variables, and font families in the form of JSON files. All of your custom styles will be automatically inlined into your elements. Preview your email in your browser as you're developing, and enter a filename to output your final HTML file.



## Getting Started


Download *eDever*, and create a new php file in the root directory eg: `newsletter.php`. Enclude eDever and instantiate the class at the top of that file.

**newsletter.php**

```
<?php

require_once( './lib/eDever.php' );
$ed = new eDever();

...

```



###Basic Templating

####Add Custom Styles

Create a JSON file in the root directory called `my-styles.css.json`. In here, you will be creating your CSS rules in a JSON format. The syntax for creating JSON CSS is simply `"selector": {"rule": "value"}`. Then you can include them into your template file.

**my-styles.css.json**

```
{
	...
	
	".email-header": {
		"background-color": "#C0D4CE"
	},
	".main-heading": {
		"color": "#333333"
	},
	"p": {
		"font-size": "12px"
	}
	
	...
}
```

**newsletter.php**

```
<?php
...

$ed->add_styles( __DIR__ . 'my-styles.ss.json' );

```

####Creating Content

Create a heading and some paragraph text.

**newsletter.php**

```
<?php
...

$content = $ed->tag([
	'elem' => 'h1',
	'content => 'Greetings From Us!',
	'class' => 'main-heading'
]);

$content .= $ed->tag([
	'elem' => 'p',
	'content => 'Candy carrot cake jelly beans dragée muffin. Sweet roll oat cake tootsie roll jelly beans tiramisu cupcake pastry.'
]);

...
```

####Wrap and Add Your Content

Stick your content into a content block, wrap it in a container, and add it to the email's body content.

**newsletter.php**

```
<?php
...

$ed
	->add('content_block', [
		'content' => $content
	])
	->wrap('container', [
		'class' => 'email-header'
	])
->add_to_body_content();

...
```

####Get Your Final Email

Finally, you can either preview your email by visiting `newsletter.php`  directly in your browser, or output it to an HTML file of your choosing.

**newsletter.php**

```
<?php
...

// Display from the php file
$ed->get_email();

// Or output the to an HTML file
$ed->output_email_to_file();

...
```


##Generating Your Email

eDever uses pre-built components that you can string together using PHP method chaining. You can use combinations of nesting methods and parameters, and saving markup into variables which then save into other methods. 

####Compiling Content with Method Chaining

The `add` method takes two paramenters: `component_type` and an `args` array (more on that further down). Chaining multiple `add` methods will cache all content that is created, and add it to your email's body after using the `wrap` and `add_to_body_content` methods. 

**newsletter.php**

```
<?php
...

$ed
	->add('tag', [
		'elem' => 'h2',
		'content' => 'Heading Number Two'
	])
	->add('tag', [
		'elem' => 'p',
		'content' => ' Im just some content in a paragraph tag'
	])
	->wrap('container', [
		'class' => 'dark-bg'
	])
->add_to_body_content();	

...
```

####Setting and Getting Content

You can also use the `get` method to generate content befoer adding it to the email body which takes two parameters: `component_type` and an `args` array (again, more on that further down). As opposed to `add`, `get` return content, which you can then store in a variable or use directly as the value of a `content` parameter.

**newsletter.php**

```
<?php
...

$column = $ed->get(
			'image', [
				'src' => './img/square-1.jpg',
				'url' => 'http://github.com/'
			]
		);

$column .= $ed->get(
			'tag', [
				'elem' => 'p',
				'content' => 'This is a caption underneath a sweet photo.'
			]
		);
$ed
	->add('content_block', [
		'content' => $column
	])
	->wrap('container')

->add_to_body_content();

...
```				


###Styles, Variables, Classes and Fonts
Styles, variables and class are defined in JSON files, which are then used by the PHP API when generating markup. Behind the scenes, classes you set in your method params are matched to your defined CSS classes which then creates inline styles in the genereated markup.

####Styles
CSS is generated using JSON files included into your template file using the `add_styles` method, which takes one parameter which is the path and file you're including.

**newsletter.php**

```
$ed->add_styles( __DIR__ . '/my-styles.css.json' );

```
**my-styles.css.json**

```
{
	"h2" : {
		"color": "grey",
		"font-size": "25px"
	},
	".grey-bg": {
		"background-color": "#dcdcdc"
	}
	...
}	

```

####Variables
Just like SASS variables, you can define variables that can be used in your CSS JSON files.

**my-variables.json**

```
{
	"off-white": "#f7f7f7",
	"image-border": "solid 2px #4cb7ff"
}
```
**my-styles.css.json**

```
{
	".body-bg": {
		"background-color": "$off-white"
	},
	"img": {
		"border": "$image-border"
	}
}
```

####Classes
Classes that you set in your compoents will be matched with the classes you've declared in your CSS JSON files, which will genereate inline styles within the genereated markup.

**newsletter.php**

```
$ed->add('tag', [
		'elem' => 'p',
		'content' => 'I am some super legal copy.'
	]);

```

**my-styles.css.json**

```
{
	"p.legal": {
		"font-size": "11px",
		"line-height": "13px",
		"color": "#616161"
	}
}
```
**Resulting HTML**

`<p style="font-size:11px;line-height:13px;color:#616161">I am some super legal copy.</p>`


####Fonts
Fonts are declared by using handles, which dictate font families and backup font families (in order). You can customize fonts by including a JSON file in your template file. The default fonts are as follows:

```
{
	"font-family-1": [
		"MS Serif, serif",
		"Georgia, sans-serif"
	],
	"font-family-2": [
		"Helvetica, sans-serif",
		"Arial, sans-serif"
	]
}
```
To use your fonts within your styles, you simply use the desired font handle instead of directly using the font-family name.

**my-styles.css.json**

```
{
	"p": {
		"font-family": "font-family-1"
	},
	"h1": {
		"font-family": "font-family-2"
	}
}
```
####Using Google Webfonts
You can use Google Webfonts by adding it into your template file using the `add_webfont` method, which takes two parameters: an array of webfont rules, and the URL to the google webfonts source. Then you can use these rules in your custom font rules file.


**newsletter.php**

```
$ed->add_webfont(
	[
		"'Roboto', sans-serif", 
		"'Oswald', sans-serif" 
	], 
	"https://fonts.googleapis.com/css?family=Oswald|Roboto"
);
```

**my-fonts.json**

```
{
	"body-font": [
		"'Roboto', sans-serif",
		"Arial, sans-serif",
		"Helvetica, sans-serif"
	],
	"heading-font": [
		"'Oswald', sans-serif",
		"Impact, Charcoal, sans-serif",
		"Tahoma, sans-serif"
	]
}
```

_Note:_ Webfonts are not supported in Outlook, and in fact will ignore your backup options and default to Times New Roman accross the board. To get around this, eDever will create a global font-family rule, and also reverse the inline font rules, which will make Outlook use your backup options.

**resulting CSS**

```
[style*="'Roboto', sans-serif"] { 
	font-family: 'Roboto', sans-serif, Arial, sans-serif, Helvetica, sans-serif !important;
}
```

**resulting HTML**

`<h1 class="header-title" style="font-family:Tahoma, sans-serif, Impact, Charcoal, sans-serif, 'Oswald', sans-serif;">Super Cool Header Title</h1>`


###Components and Options

Components and be accessed using the `get` or `add` methods, and both options take an array of options.

| Component | Description |
|-----------|------------|-------------|
|'content_block'  | A table that should be used as the main container for content. |













