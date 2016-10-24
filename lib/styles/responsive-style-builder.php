<style>
<?php
foreach ($variables as $key => $rules) :
	echo '@media( ' . $args['breakpoints'][0] . ' ) {';
		echo $key .' {';
			foreach($rules as $rule => $value) :
				echo $rule .': ' . $value . ';';
			endforeach;
		echo '}';
	echo '}';
endforeach;
?>
</style>
