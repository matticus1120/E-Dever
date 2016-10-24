<style>
<?php
foreach ($args as $key => $rules) :
	echo $key .' {';
		foreach($rules as $rule => $value) :
			echo $rule .': ' . $value . ';';
		endforeach;
	echo '}';
endforeach;
?>
</style>
