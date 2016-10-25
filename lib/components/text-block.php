<?php extract($variables) ?>
<table border="0" cellpadding="0" cellspacing="0" class="row-wrap <?php  echo implode(" ", $class_wrapper) ?>">
	<tbody>
		<tr>
			<td valign="top" class="text-block <?php echo implode(" ", $class) ?>" style="<?php echo $class_inline; ?>" <?php echo $height_attr  ?> <?php echo $width_attr ?> >
				<?php echo $content ?>
			</td>
		</tr>
	</tbody>
</table>
