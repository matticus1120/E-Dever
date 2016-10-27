<?php extract($variables) ?>

<table class="<?php  echo implode(" ", $class_wrapper) ?>" border="0" cellpadding="0" cellspacing="0" style="<?php echo $class_wrapper_inline; ?>">
	<tr>
		<td class="<?php  echo implode(" ", $class_outer) ?>"  valign="middle" style="<?php echo $class_outer_inline; ?>">
			<a href="<?php echo $url ?>" target="_blank" class="button"  style="<?php echo $class_inline; ?>"><?php echo $content; ?></a>
		</td>
	</tr>
</table>