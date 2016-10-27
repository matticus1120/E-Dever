<?php extract($variables) ?>
<table border="0" cellpadding="0" cellspacing="0" style="min-width:100%;" width="100%" class="row-block">
	<tbody>
		<tr class="row <?php echo implode(" ", $class) ?>"  <?php echo $align ?> <?php echo $valign ?> <?php echo $height_attr  ?> <?php echo $width_attr ?>>
			<?php echo $content ?>
		</tr>
	</tbody>
</table>