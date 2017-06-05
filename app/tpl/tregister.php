<?php
	include 'head_common.php';
	?>

<div class="container">
	<div class="top_space">
	</div>
	<p id="reg_title" class="body_title">¿Que quieres hacer?</p>

	<div class="reg_images">

		<img id="reg_teoria" src="<?= 'pub/images/teoria.png'; ?>" alt="alumno de ya ire" class="hvr-grow"/>
		<img id="reg_practica" src="<?= 'pub/images/practicas.png'; ?>" alt="alumno de ya ire" class="hvr-grow"/>

	</div>

<form id="formulario1" >

	<div class="input-group row">

		<p class="form_title">REGISTRO TEORICA</p>

		<span>
			<label class="reg_label" for="email">Email</label>
			<input class="reg_input" type="email" id="email" required="required" name="email">
			<span class="me_error" style="display: none">El correo ya existe</span>
		</span>

		<span class="ce_error" style="display: none">0</span>

		<span>
			<label class="reg_label" for="username">Username</label>
			<input class="reg_input" type="text" id="username" required="required" name="username">
			<span class="mu_error" style="display: none">El username ya existe</span>
		</span>

		<span class="cu_error" style="display: none">0</span>

		<span>
			<label class="reg_label" for="password">Password</label>
			<input class="reg_input" type="password" id="paw"  required="required" name="password">
			<span class="mr_error" style="display: none">Constraseña insegura</span>
		</span>

		<span class="cr_error" style="display: none">0</span>

		<span>
			<label class="reg_label" for="rpassword">Password</label>
			<input class="reg_input" type="password" id="paw2"  required="required" name="rpassword">
			<span class="mrp_error" style="display: none">Contraseñas diferentes</span>
		</span>

		<span class="crp_error" style="display: none">0</span>
		<span><a href="/login">Ya tienes cuenta? Identificate</a></span>
		<input type="submit" class="hvr-grow" id="submit1" value="OK">

	</div>

</form>


<form id="formulario2" >

	<div class="input-group row">

		<p class="form_title">REGISTRO PRACTICA</p>

		<span class="ce_error" style="display: none">0</span>
		<span class="cu_error" style="display: none">0</span>
		<span class="cr_error" style="display: none">0</span>
		<span class="crp_error" style="display: none">0</span>


		<div class="form_row1">

			<div class="form_col1">

				<span>
					<label class="reg_label" for="email2" >Email</label>
					<input class="reg_input" type="email" name="email2" id="email2" required="required">
					<span class="me_error" style="display: none">El correo ya existe</span>
				</span>

				<span>
					<label class="reg_label" for="username2" >Username</label>
					<input class="reg_input" type="text" name="username2" id="username2" required="required" >
					<span class="mu_error" style="display: none">El username ya existe</span>
				</span>

			</div>

			<div class="form_col2">

				<span>
					<label class="reg_label" for="paw3">Password</label>
					<input class="reg_input" type="password" name="paw3" id="paw3" required="required">
					<span class="mr_error" style="display: none">Constraseña insegura</span>
				</span>

				<span>
					<label class="reg_label" for="paw4">Repite el password</label>
					<input class="reg_input" type="password" name="paw4" id="paw4" required="required">
					<span class="mrp_error" style="display: none">Contraseñas diferentes</span>
				</span>

			</div>

		</div>

		<div class="form_row2">

			<div class="form_col1">

				<span>
					<label class="reg_label" for="apellidos">Apellidos</label>
					<input class="reg_input" type="text" name="apellidos" id="apellidos" required="required">
				</span>

				<span>
					<label class="reg_label" for="telefono">Teléfono</label>
					<input class="reg_input" type="text" name="telefono" id="telefono" required="required">
				</span>

				<span>
					<label class="reg_label" for="direccion">Direccion</label>
					<input class="reg_input" type="text" name="direccion" id="direccion" required="required">
				</span>

			</div>

			<div class="form_col2">

				<span>
					<label class="reg_label" for="nombre">Nombre</label>
					<input class="reg_input" type="text" name="nombre" id="nombre"  required="required">
				</span>

				<span>
					<label class="reg_label" for="dni" >DNI</label>
					<input class="reg_input" type="text" name="dni" id="dni" required="required">
				</span>

				<!--<input type="text" name="poblacion" id="poblacion" placeholder="poblacion" required="required">-->
				<span>
					<label class="reg_label" id="reg_poblacion">Población</label>
					<select class="reg_id" id="poblacion">
						<?php
						foreach ($this->dataTable as $poblacion) {

						?>
							<option value="<?=$poblacion['id_poblacion']?>"><?=utf8_encode($poblacion['nombre'])?></option>
						<?php
						}

						?>

					</select>

				</span>

			</div>

		</div>
		<span><a href="/login">¿Ya tienes cuenta? Identificate</a></span>
		<input type="submit" id="submit2" value="¡Regístrame!" >

	</div>

</form>

<div class="space">
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
	include 'footer_common.php';
?>
