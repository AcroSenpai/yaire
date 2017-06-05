<?php
	include 'head_common.php';
	?>
<span class="breadcrums"><a href="/teoria">Teoría</a> > Crear Test</span>

<div class="container">
	<div class="top_space">
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="crear_wrap">

	<h1 class="crear_title">Crear un test</h1>

	<form id="test">

		<div class="made_test_top">

			<label>Nombre del test
			<input type="text" name="test" id="nombre" required class="create_input_text"></label>
			<label style="margin-left:10px">Categoría
				<select id="cat" class="create_select"></label>
							<option value=""></option>
							<?php
								foreach ($this->dataTable['categorias'] as $categorias) {
							?>
									<option value="<?=$categorias['id_categoria']?>"><?=utf8_encode($categorias['nombre'])?></option>
							<?php
								}
							?>
				</select>

		</div>

		<br>
			<?php
					for($i=1;$i<31;$i++)
					{
						?>
						<div class="create_question">Pregunta <?=$i?></div>
						<?php
						?>
							<select class="create_select_question">
								<option value=""></option>
								<?php
									foreach ($this->dataTable['preguntas'] as $preguntas) {
								?>
										<option value="<?=$preguntas['id_pregunta']?>"><?=utf8_encode($preguntas['pregunta'])?></option>
								<?php
									}
								?>
							</select>

						<?php
					}
			?>
			<input type="submit"  class="hvr-grow" id="submit" name="enviar" value="CREAR TEST">
		</form>

</div>

<hr>

<div class="crear_wrap">

	<h1 class="crear_title">Crear preguntas</h1>

	<form id="pregunta" enctype="multipart/form-data" method="POST">
		<label>Pregunta:</label>
			<input class="create_input_text" type="text" name="pre" id="pre" required>
		<label>Opcion correcta:</label>
			<input class="create_input_text" type="text" name="c" id="c" required>
		<label>Opcion incorrecta:</label>
			<input class="create_input_text" type="text" name="i1" id="i1" required>
		<label>Opcion incorrecta:</label>
			<input class="create_input_text" type="text" name="i2" id="i2" required>
		<input type="submit" name="enviar" value="CREAR PREGUNTA" class="hvr-grow" id="submit" >
	</form>

</div>

<div class="space">
</div>

</div>

<?php
	include 'footer_common.php';
?>
