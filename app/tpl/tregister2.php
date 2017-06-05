<?php
	include 'head_common.php';
?>

<div class="container">
	<div class="top_space">
	</div>
<form id="formulario3" >

	<div class="input-group row">

		<p class="form_title">REGISTRO PRACTICA</p>

		<span class="ce_error" style="display: none">0</span>
		<span class="cu_error" style="display: none">0</span>
		<span class="cr_error" style="display: none">0</span>
		<span class="crp_error" style="display: none">0</span>

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
		<input type="submit" id="submit" value="¡Regístrame!">

	</div>

</form>

<div class="space">
</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
	include 'footer_common.php';
?>
