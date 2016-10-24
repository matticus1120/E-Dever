<?php extract($args) ?>
<!--[if mso]>
	<table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
		<tr>
<![endif]-->

	<!--[if mso]>
			<td valign="top" width="<?php echo $width; ?>" style="width:<?php echo $width; ?>;">
	<![endif]-->

<table class="container <?php echo implode(" ", $class); ?>" border="0" cellpadding="0" cellspacing="0"  style="width: <?php echo $width; ?>; max-width: <?php echo $width; ?>; <?php echo $class_inline; ?>" width="<?php echo $width; ?>">
	<tbody>
		<tr>
			<td>
				<?php echo $content; ?>
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