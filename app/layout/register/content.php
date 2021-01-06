<div class="pd-15 d-flex w-full h-full">
	<div class="d-flex w-full justify-content-center a-items-center">
		<div class="form card">
			<div class="card-header">
				Registro
			</div>
			<form id="register" class="card-body d-flex flex-direction-column">
				<div class="line m-b-20">
					<span>¡Registrate y usa el sistema!</span>
				</div>
                <div class="p-relative m-b-20">
					<label id="label-full-name" class="field-label" for="full-name">Nombre completo</label>
					<input id="full-name" type="text" name="full_name" placeholder="...">
				</div>
				<div class="p-relative m-b-20">
					<label id="label-email" class="field-label" for="email">E-mail</label>
					<input id="email" type="text" name="email" placeholder="...">
				</div>
				<div class="p-relative m-b-16">
					<label id="label-password" class="field-label" for="password">Contraseña</label>
					<input id="password" type="password" name="password" placeholder="...">
				</div>
                <p class="m-b-16">
                    ¿Ya la creaste? <a href="<?php echo $n['site_url'] ?>/?link=login">¡Iniciá sesión!</a>
                </p>
				<button id="loader">Registrarte</button>
			</form>
		</div>
	</div>
</div>