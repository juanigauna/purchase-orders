<div style="max-width: 950px; margin: 7% auto;">
	<?php include 'pr-header.php'; ?>
	<form id="new-product" class="d-grid p-relative m-b-4" onsubmit="new_product(<?php echo $n['pr']['id'] ?>); return false;">
		<div class="d-flex m-b-3">
			<input class="m-r-2 w-full" type="text" name="page" placeholder="Pág">
			<input class="m-r-2 w-full" type="text" name="description" placeholder="Descripción">
			<input class="m-r-2 w-full" type="text" name="code" placeholder="Código">
			<input id="quantity" class="m-r-2 w-full" type="number" step="any" name="quantity" placeholder="Cant.">
			<input id="price" class="m-r-2 w-full" type="number" step="any" name="price" placeholder="Precio vent.">
			<input id="import" class="w-full" type="text" name="import" placeholder="Importe">
		</div>
		<button id="loader" class="p-absolute p-l-3 p-r-3" style="right: -50px; top: 0;"><i id="icon_btn" class="fas fa-plus"></i></button>
	</form>
	<div class="m-b-4" style="border: 1px solid #000;">
		<?php include 'pr-table.php'; ?>
	</div>
	<a href="<?php echo $n['site_url'] ?>?link=purchase-request-ready&pr_id=<?php echo $n['pr']['id'] ?>" target="_Blank">Calcular Cantidad/Importe</a>
</div>