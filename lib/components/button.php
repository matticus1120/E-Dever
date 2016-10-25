<?php extract($variables) ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%" >
	<tbody>
		<tr>
			<td <?php echo $align ?> >
				<table class="<?php  echo implode(" ", $class_wrapper) ?>" border="0" cellpadding="0" cellspacing="0" style="<?php echo $class_wrapper_inline; ?>">
					<tr>
						<td class="<?php  echo implode(" ", $class_outer) ?>" align="center" valign="middle" style="<?php echo $class_outer_inline; ?>">
							<a href="<?php echo $url ?>" target="_blank" class="button"  style="<?php echo $class_inline; ?>"><?php echo $content; ?></a>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</tbody>
</table>

