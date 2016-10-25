<style>
<?php
foreach ($variables as $key => $rules) :
	echo '@media ( ' . $args['breakpoints'][0] . ' ) {' .  "\n ";
		echo $key .' {' . "\n ";
			foreach($rules as $rule => $value) :
				echo $rule .': ' . $value . ';' .  "\n ";
			endforeach;
		echo '}' .  "\n ";
	echo '}' .  "\n ";
endforeach;
?>
</style>
