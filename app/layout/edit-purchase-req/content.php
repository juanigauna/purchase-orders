<button class="new-request"><i class="fas fa-plus"></i></button>
<div class="pd-15 d-flex w-full">
	<div class="d-flex w-full justify-content-space-around a-items-flex-start">
		<div class="form card">
			<div class="card-header">
				Editar
			</div>
			<form id="edit-purchase-req" class="card-body d-flex flex-direction-column" onsubmit="editPr(<?php echo $_GET['pr_id'] ?>); return false">
				<div class="line m-b-16">
					<span>Fecha solicitud</span>
				</div>
				<div class="p-relative">
					<label id="label-date" class="field-label" for="date">Fecha solicitud</label>
					<input id="date" class="m-b-16" type="text" name="date" placeholder="..." value="<?php echo $n['pr']['date'] ?>">
				</div>
				<div class="line m-b-16">
					<span>Datos campaña</span>
				</div>
				<div class="p-relative">
					<label id="label-campaign" class="field-label" for="campaign">Campaña</label>
					<input id="campaign" class="m-b-8" type="text" name="campaign" placeholder="..." value="<?php echo $n['pr']['campaign'] ?>">
				</div>
				<div class="d-flex a-items-flex-start m-b-16">
					<div class="p-relative m-r-8">
						<label id="label-date-start" class="field-label" for="date-start">Fecha inicio</label>
						<input id="date-start" type="text" name="date_start" placeholder="..." value="<?php echo $n['pr']['date_start'] ?>">
					</div>
					<div class="p-relative">
						<label id="label-date-end" class="field-label" for="date-end">Fecha final</label>
						<input id="date-end" type="text" name="date_end" placeholder="..." value="<?php echo $n['pr']['date_end'] ?>">
					</div>
				</div>

				<div class="line m-b-16">
					<span>Distribuidora</span>
				</div>
				<div class="d-flex a-items-flex-start m-b-16">
					<div class="p-relative m-r-8">
						<label id="label-distributor" class="field-label" for="distributor">Distribuidor/a</label>
						<input id="distributor" type="text" name="distributor" placeholder="..." value="<?php echo $n['pr']['distributor'] ?>">
					</div>
					<div class="p-relative">
						<label id="label-entrepreneur" class="field-label" for="entrepreneur">Apellido y nombre</label>
						<input id="entrepreneur" type="text" name="entrepreneur" placeholder="..." value="<?php echo $n['pr']['entrepreneur'] ?>">
					</div>
				</div>
				<div class="line m-b-16">
					<span>Revendedor</span>
				</div>
				<div class="d-flex a-items-flex-start m-b-16">
					<div class="p-relative m-r-8">
						<label id="label-num-registered" class="field-label" for="num-registered">N° Empadron.</label>
						<input id="num-registered" type="text" name="num_registered" placeholder="..." value="<?php echo $n['pr']['num_registered'] ?>">
					</div>
					<div class="p-relative">
						<label id="label-reseller" class="field-label" for="reseller">Apellido y nombre</label>
						<input id="reseller" type="text" name="reseller" placeholder="..." value="<?php echo $n['pr']['reseller'] ?>">
					</div>
				</div>

				<button id="loader">Editar</button>
			</form>
		</div>
	</div>
</div>