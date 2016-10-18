<?php extract($args) ?>
<table border="0" cellpadding="0" cellspacing="0" style="min-width:100%;" width="100%" class="image-wrapper <?php echo implode(" ", $class_wrapper) ?>" style="<?php echo $class_wrapper_inline ?>">
	<tbody>
		<tr>
			<td valign="top" align="center" class="<?php echo implode(" ", $class_outer) ?>" style="<?php echo $class_outer_inline ?>">
				<img src="<?php echo $src ?>" alt="" class="<?php echo implode(" ", $class) ?>" style="<?php echo $class_inline ?>">
			</td>
		</tr>
	</tbody>
</table>