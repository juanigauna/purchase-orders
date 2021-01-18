<div style="max-width: 850px; margin: 7% auto;">
	<?php include 'pr-header.php'; ?>
	<div style="border: 1px solid #000;">
		<?php include 'pr-table.php'; ?>
		<table id="products">
			<tr style="background: #000; color: #fff">
				<td></td>
				<td style="text-align: right;">Total solicitado</td>
				<td></td>
				<td><?php echo total_products($pr_id) ?></td>
				<td></td>
				<td>$<?php echo total_import($pr_id) ?></td>
			</tr>
		</table>
	</div>
</div>