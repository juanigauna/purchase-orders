<div id="info" class="p-relative m-b-7" style="border: 2px solid #000; padding: 8px;">
	<h2 class="black-color m-b-3" style="text-align: right; padding-right: 20%;">Solicitud de COMPRA</h2>
	<p class="black-color m-b-7" style="text-align: right; padding-right: 20%;"><span class="black-color text-bold">Fecha:</span> <?php echo $n['pr']['date'] ?></p>
	<div class="p-absolute d-grid" style="top: 8px; right: 8px;">
		<p class="m-b-1" style="border: 1px solid #000; padding: 5px; width: 115px;"><?php echo $n['pr']['campaign'] ?></p>
		<p class="pt-12 text-bold black-color m-b-3">CAMPAÑA</p>
		<p class="m-b-1" style="border: 1px solid #000; padding: 5px; width: 115px;"><?php echo $n['pr']['date_start'] ?></p>
		<p class="pt-12 text-bold black-color m-b-3">FECHA INICIO</p>
		<p class="m-b-1" style="border: 1px solid #000; padding: 5px; width: 115px;"><?php echo $n['pr']['date_end'] ?></p>
		<p class="pt-12 text-bold black-color m-b-3">FECHA FINAL</p>
	</div>
	<div class="d-flex m-b-5">
		<div class="d-grid m-r-5">
			<div style="border: 1px solid #000; padding: 5px 13px;"><?php echo $n['pr']['distributor'] ?></div>
			<p class="pt-14 text-bold black-color">Distribuidor/a</p>
		</div>
		<div class="d-grid m-r-3">
			<div style="border: 1px solid #000; padding: 5px 13px;"><?php echo $n['pr']['entrepreneur'] ?></div>
			<p class="pt-14 text-bold black-color">Apellido y Nombre EMPRESARIO/A</p>
		</div>
	</div>
	<div class="d-flex m-b-5">
		<div class="d-grid m-r-5">
			<div style="border: 1px solid #000; padding: 5px 13px;"><?php echo $n['pr']['num_registered'] ?></div>
			<p class="pt-14 text-bold black-color">N° empadronado/a REVENDEDOR/A</p>
		</div>
		<div class="d-grid m-r-3">
			<div style="border: 1px solid #000; padding: 5px 13px;"><?php echo $n['pr']['reseller'] ?></div>
			<p class="pt-14 text-bold black-color">Apellido y Nombre REVENDEDOR/A</p>
		</div>
	</div>
</div>