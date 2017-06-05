
<?php
	include 'head_common.php';
?>
<span class="breadcrums">Prácticas</span>
	<link href="<?='/pub/css/datepicker.min.css'?>" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="<?='/pub/js/datepicker.min.js'?>"></script>
	<script src="<?='/pub/js/datepicker.es.js'?>"></script>
<div class="container">

	<div class="top_space">
	</div>
<?php if( !empty ($_SESSION['user']) && ($_SESSION['rol']==3) ): ?>

	<div class="horarios_top_wrapper">

	<label for="semana">Selecciona la semana:
		 <input type='text' id="semana" class="datepicker-here create_input_text" data-position="right top"  data-language='es'/>
	</label>

	<span style="display: none" id="respaldo"></span>

	<label for="profesor">Selecciona el profesor:
		<select id="profesor" class="create_select">
			<?php
				foreach ($this->dataTable as $profesor ) {
					?>
						<option value="<?=$profesor['id_profesores']?>"><?=$profesor['nombre']?> <?=$profesor['apellidos']?></option>
					<?php
				}
			?>
		</select>
	</label>

	<label for="zona">Selecciona la zona:
		<select id="zona" class="create_select">
		</select>
	</label>

</div>

<div class="container_horarios">

	  <div class="horarios_wrapper">

			<div class="table_wrapper">

	    	<table id ="mapa">

	    	</table>

			</div>

		</div>

		<img class="flecha hvr-grow" src="/pub/images/icons/flecha.png" alt="flecha" />

		<div class="total_wrapper" style="display:none">

      <label>Resumen de prácticas</label>

      <div class="table_wrapper">

	    	<table id="resultado" >
	    	<tr>
	    		<td>Fecha</td><td>Hora</td><td>Profesor</td><td>Zona</td><td>Importe</td><td></td>
	    	</tr>
			<tr class='total'>
				<td colspan="3">Total:</td><td colspan="2">0</td>
			</tr>
	    	</table>

				<div class="buttons_wrapper">

          <button id="borrar" class="hvr-grow">
            <img src="/pub/images/icons/rubbish.png" alt="papelera para eliminar practicas"/>
          </button>

          <button id="guardar" class="hvr-grow">Guardar</button>

        </div>
			</div>

    </div>

</div>



<?php endif;

if( !empty ($_SESSION['user']) && ($_SESSION['rol']==4) ):

	echo '<label style="display:none" id="profe">1</label>';

endif;

 if( empty ($_SESSION['user']) ):

	header('Location: /users');

endif;

if( ($_SESSION['rol']==2) ):

	header('Location: /');

endif; ?>

<div class="space">
</div>
</div>
<script src="<?='/pub/js/script_practico.js'?>"></script>

<?php
	include 'footer_common.php';
?>
