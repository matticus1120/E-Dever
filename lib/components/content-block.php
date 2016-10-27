<?php extract($variables) ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="<?php  echo implode(" ", $class_wrapper) ?>">
	<tbody>
		<tr>
			<td  align="center" <?php echo $valign ?> class="content <?php echo implode(" ", $class) ?>" style="<?php echo $class_inline; ?>" <?php echo $height_attr  ?> <?php echo $width_attr ?> >
				<?php echo $content ?>
			</td>
		</tr>
	</tbody>
</table>