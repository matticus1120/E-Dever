<?php extract($variables) ?>
<table border="0" cellpadding="0" cellspacing="0" style="min-width:100%;" width="100%" class="image-wrapper <?php echo implode(" ", $class_wrapper) ?>" style="<?php echo $class_wrapper_inline ?>">
	<tbody>
		<tr>
			<td valign="top" <?php echo $align ?> class="image-outer <?php echo implode(" ", $class_outer) ?>"  style="<?php echo $class_outer_inline ?>">
			<?php echo ( $url ) ? '<a href="' . $url . '" target="_blank">' : ''; ?>
				<img src="<?php echo $src ?>" alt="" class="<?php echo implode(" ", $class) ?>" <?php echo $width; ?> <?php echo $height; ?>  style="<?php echo $class_inline ?>">
			<?php echo ( $url ) ? '</a>' : ''; ?>
			</td>
		</tr>
	</tbody>
</table>