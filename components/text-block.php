<?php extract($args) ?>
<table border="0" cellpadding="0" cellspacing="0" style="min-width:100%;" width="100%" class="row-wrap <?php  echo implode(" ", $class_wrapper) ?>">
	<tbody>
		<tr>
			<td valign="top" class="text-block <?php echo implode(" ", $class) ?>" style="<?php echo $class_inline; ?>" <?php echo $height  ?> <?php echo $width ?> >
				<?php echo $content ?>
			</td>
		</tr>
	</tbody>
</table>
