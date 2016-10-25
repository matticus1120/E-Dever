<?php extract($variables) ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%"  class="button-wrapper <?php  echo implode(" ", $class_wrapper) ?>" style="<?php echo $class_wrapper_inline; ?>">
	<tbody>
		<tr>
			<td class="button-outer <?php  echo implode(" ", $class_outer) ?>" style="<?php echo $class_outer_inline; ?>">
				<a class="<?php echo implode(" ", $class) ?>" href="<?php echo $url ?>" target="_blank" style="<?php echo $class_inline; ?>">
					<?php echo $content; ?>
				</a>
			</td>
		</tr>
	</tbody>
</table>