<style>
<?php
foreach ($variables as $key => $rules) :
	echo $key .' { ' . "\n ";
		foreach($rules as $rule => $value) :
			echo  $rule .': ' . $value . ';' . "\n ";
		endforeach;
	echo '}' . "\n ";
endforeach;
?>
</style>
