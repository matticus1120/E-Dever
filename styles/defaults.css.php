<style>
<?php
foreach($args as $section => $group) :
	foreach ($group as $key => $rules) :
		echo $key .' {';
			foreach($rules as $rule => $value) :
				echo $rule .': ' . $value . ';';
			endforeach;
		echo '}';
	endforeach;
endforeach;	
?>
</style>
