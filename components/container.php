<?php extract($args) ?>
<table border="0" cellpadding="0" cellspacing="0" style="min-width:100%;" width="100%" class="container-wrapper">
	<tbody>
		<tr>
			<td valign="top" align="center">
				<table class="container <?php echo implode(" ", $class); ?>" border="0" cellpadding="0" cellspacing="0"  style="width: <?php echo $width; ?>; max-width: <?php echo $width; ?>; <?php echo $class_inline; ?>" width="<?php echo $width; ?>">
					<tbody>
						<tr>
							<td>
								<?php echo $content; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>

