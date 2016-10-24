<?php $vars = $variables; extract($variables) ?>
<table border="0" cellpadding="0" cellspacing="0" style="min-width:100%;" width="100%" class="text-block-wrap <?php  echo implode(" ", $class_wrapper) ?>">
	<tbody>
		<tr class="row <?php echo implode(" ", $class) ?>" style="<?php echo $class_inline; ?>">
			<?php echo $content ?>
		</tr>
	</tbody>
</table>
<?php $variables = false ?>