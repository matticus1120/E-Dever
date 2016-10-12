<?php extract($args) ?>
<?php $width = ( isset($container) ) ? $container : '100%' ?>
<?php $class = ( isset($container) ) ? 'container ': '' ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody>
		<tr>
			<td>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
						<tr>
							<td id="templateHeader" valign="top">
								<table border="0" cellpadding="0" cellspacing="0" style="min-width:100%;" width="100%">
									<tbody>
										<tr>
											<td valign="top" align="center">
												<table class="container" border="0" cellpadding="0" cellspacing="0"  style="width: <?php echo $width ?>; max-width: <?php echo $width ?>;" width=" <?php echo $width ?>">
													<tbody>
														<tr>
															<td >
																<?php echo $content; ?>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>
