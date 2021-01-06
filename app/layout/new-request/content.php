<button class="new-request"><i class="fas fa-plus"></i></button>
<div class="pd-15 d-flex w-full">
	<div class="d-flex w-full justify-content-space-around a-items-flex-start">
		<div class="purchase-order-form card width-half-height-screen">
			<div class="card-header">
				Crear
			</div>
			<form id="new-request" class="card-body d-flex flex-direction-column">
				<div class="line m-b-16">
					<span>Fecha solicitud</span>
				</div>
				<div class="p-relative">
					<label id="label-date" class="field-label" for="date">Fecha solicitud</label>
					<input id="date" class="m-b-16" type="text" name="date" placeholder="...">
				</div>
				<div class="line m-b-16">
					<span>Datos campaña</span>
				</div>
				<div class="p-relative">
					<label id="label-campaign" class="field-label" for="campaign">Campaña</label>
					<input id="campaign" class="m-b-8" type="text" name="campaign" placeholder="...">
				</div>
				<div class="d-flex a-items-flex-start m-b-16">
					<div class="p-relative m-r-8">
						<label id="label-date-start" class="field-label" for="date-start">Fecha inicio</label>
						<input id="date-start" type="text" name="date_start" placeholder="...">
					</div>
					<div class="p-relative">
						<label id="label-date-end" class="field-label" for="date-end">Fecha final</label>
						<input id="date-end" type="text" name="date_end" placeholder="...">
					</div>
				</div>

				<div class="line m-b-16">
					<span>Distribuidora</span>
				</div>
				<div class="d-flex a-items-flex-start m-b-16">
					<div class="p-relative m-r-8">
						<label id="label-distributor" class="field-label" for="distributor">Distribuidor/a</label>
						<input id="distributor" type="text" name="distributor" placeholder="...">
					</div>
					<div class="p-relative">
						<label id="label-entrepreneur" class="field-label" for="entrepreneur">Apellido y nombre</label>
						<input id="entrepreneur" type="text" name="entrepreneur" placeholder="...">
					</div>
				</div>
				<div class="line m-b-16">
					<span>Revendedor</span>
				</div>
				<div class="d-flex a-items-flex-start m-b-16">
					<div class="p-relative m-r-8">
						<label id="label-num-registered" class="field-label" for="num-registered">N° Empadron.</label>
						<input id="num-registered" type="text" name="num_registered" placeholder="...">
					</div>
					<div class="p-relative">
						<label id="label-reseller" class="field-label" for="reseller">Apellido y nombre</label>
						<input id="reseller" type="text" name="reseller" placeholder="...">
					</div>
				</div>

				<button id="loader">Crear</button>
			</form>
		</div>
		<div class="order-list card width-half-screen">
			<div class="card-header">
				Lista de ordenes
			</div>
			<div id="order-list">
				<div id="order" class="card-body">
					<?php
					$query = mysqli_query($con, "SELECT * FROM purchase_request WHERE user_id = '$userId' ORDER BY id DESC");
					if ($query->num_rows > 0) {
						foreach ($query as $n['order']) {
							include "app/layout/orders/content.php";
						}
					} else {
						echo "No tienes ordenes creadas.";
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>