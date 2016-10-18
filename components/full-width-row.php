<?php extract($args) ?>
<table border="0" cellpadding="0" cellspacing="0" width="100%" style="<?php echo $class_inline; ?>" class="full-width-row <?php echo implode(" ", $wrapper_class); ?>">
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
												<table class="full-width-row-inner" border="0" cellpadding="0" cellspacing="0"  style="width: 100%; max-width: 100%;" width=" 100%">
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
