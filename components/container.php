<?php extract($args) ?>

<table class="container <?php echo implode(" ", $class); ?>" border="0" cellpadding="0" cellspacing="0"  style="width: <?php echo $width; ?>; max-width: <?php echo $width; ?>; <?php echo $class_inline; ?>" width="<?php echo $width; ?>">
	<tbody>
		<tr>
			<td>
				<?php echo $content; ?>
			</td>
		</tr>
	</tbody>
</table>
