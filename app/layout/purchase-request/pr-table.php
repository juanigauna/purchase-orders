<table id="products">
	<tr style="background: #f1f1f1;">
		<th style="width: 40px;">Pág.</th>
		<th>Descripción</th>
		<th>Código</th>
		<th style="width: 40px;">Cant.</th>
		<th style="width: 90px;">Precio vent</th>
		<th>Importe</th>
	</tr>
	<?php
	$pr_id = $n['pr']['id'];
	$q = mysqli_query($con, "SELECT * FROM products WHERE pr_id = '$pr_id'");
	while ($n['product']=mysqli_fetch_array($q)) {
		include 'app/layout/products/content.php';
	}
	?>
	<?php if (isset($ready)) { ?>
		<tr style="background: #000; color: #fff">
			<td></td>
			<td style="text-align: right;">Total solicitado</td>
			<td></td>
			<td><?php echo total_products($pr_id) ?></td>
			<td></td>
			<td>$<?php echo total_import($pr_id) ?></td>
		</tr>
	<?php } ?>
</table>