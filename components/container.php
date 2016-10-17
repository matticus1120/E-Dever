<?php extract($args) ?>
<table border="0" cellpadding="0" cellspacing="0" style="min-width:100%;" width="100%">
	<tbody>
		<tr>
			<td valign="top" align="center">
				<table class="container <?php echo implode($class); ?>" border="0" cellpadding="0" cellspacing="0"  style="width: 600px; max-width: 600px; <?php echo $inline_styles; ?>" width="600px">
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

