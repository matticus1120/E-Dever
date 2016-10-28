<?php extract($variables) ?>

<?php echo ( $url ) ? '<a href="' . $url . '" target="_blank">' : ''; ?>
	<img src="<?php echo $src ?>" alt="" class="<?php echo implode(" ", $class) ?>" <?php echo $width_attr; ?> <?php echo $height_attr; ?>  style="<?php echo $class_inline ?>">
<?php echo ( $url ) ? '</a>' : ''; ?>
