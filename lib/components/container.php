<?php extract($variables) ?>
<!--[if mso]>
	<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
		<tr>
<![endif]-->

	<!--[if mso]>
			<td valign="top" width="<?php echo $width; ?>" style="width:<?php echo $width; ?>px;">
	<![endif]-->

<table class="<?php echo implode(" ", $class_wrapper); ?>" border="0" cellpadding="0" cellspacing="0"  style="<?php echo $class_wrapper_inline; ?> width:<?php echo $width ?>px" <?php echo $width_attr; ?>>
	<tbody>
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td class="<?php echo implode(" ", $class); ?>" style="<?php echo $class_inline; ?>"><?php echo $content; ?></td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
	<!--[if mso]>
			</td>
	<![endif]-->

<!--[if mso]>
		</tr>
	</table>
<![endif]-->