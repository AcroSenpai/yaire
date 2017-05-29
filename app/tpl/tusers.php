<h1><?= $this->page; ?></h1>

<div class="userweb">
	<div>
		Email: <span><?=$this->dataTable['userweb'][0]['mail']?></span>
	</div>
	<div>
		Username: <span><?=$this->dataTable['userweb'][0]['username']?></span>
	</div>
	<div>
		Cambiar password.
		<div>
			<label>Password Antigua</label> <input type="password" name="antigua" id="antigua">
			<label>Password Nueva</label> <input type="password" name="nueva" id="nueva">
			<label>Repite la Password</label> <input type="password" name="rep" id="rep">
			<input type="button" name="boton" id="cambiar" value="Cambiar">
		</div>
	</div>
</div>
<div id="charts"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/yaire/pub/js/jquery.md5.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    $(function(){


    	$("#antigua").on('focusout', function(){
    		antigua = $("#antigua").val();
    		if(antigua != "")
    		{
    			antigua = $.md5(antigua);
	    		$.post("/yaire/users/comprobar_contra", {antigua:antigua},function(data){

	    			if(data==1)
	    			{
	    				alert('Contraseña incorrecta');
	    				$("#antigua").val("");
	    			}

	    		});
    		}

    	});

    	$("#cambiar").on('click', function(){
    		antigua = $("#antigua").val();
    		nueva = $("#nueva").val();
    		rep = $("#rep").val();

    		if(antigua != "" && nueva != "" && rep!= "")
    		{
    			if(nueva == rep)
    			{
    				nueva = $.md5(nueva);
		    		$.post("/yaire/users/cambiar_contra", {nueva:nueva},function(data){

		    				alert(data);
		    			

		    		});	    			
    			}
    			else
    			{
    				alert("Las contraseñas no coinciden");
    			}
    		}
    		else
    		{
    			alert("Completa los campos");
    		}

    	});



	$.post("/yaire/users/generar_grafico", function(data){
			datos = jQuery.parseJSON(data);
			resultado = Array()	;
			j=0;
			for (var i in datos) {
			    if (datos.hasOwnProperty(i)) {
			        resultado[j] =[Object.keys(datos)[j],datos[i]];
			        j++;
			    }
			  }

			  //Intenta separar array y poder recoger sus datos por separado
		      google.charts.load('current', {'packages':['corechart']});
		      google.charts.setOnLoadCallback(dibujar);

		      function dibujar()
		      {
		      		var data = new google.visualization.DataTable();
		      		data.addColumn('string','Fecha');
		      		data.addColumn('number','Total test aprobados');

		      		data.addRows(
		      			resultado
		      		);
		      		var opciones = {'title':'Total test Aprobados',
		      						'windth':500,
		      						'height':300};

		      		var grafica = new google.visualization.AreaChart(document.getElementById('charts'));	
		      		grafica.draw(data,opciones);
		      }
		});

      
    });
      
</script>
<?php 
if($_SESSION['roles']==3 || $_SESSION['roles']==4)
{
?>
<div class="userweb">
	<div>
		Nombre: <span><?=$this->dataTable['datos'][0]['nombre']?></span>
	</div>
	<div>
		Apellidos: <span><?=$this->dataTable['datos'][0]['apellidos']?></span>
	</div>
	<div>
		Dni: <span><?=$this->dataTable['datos'][0]['DNI']?></span>
	</div>
	<div>
		Telefono: <span><?=$this->dataTable['datos'][0]['telf']?></span>
	</div>
	<div>
		Dirección: <span><?=$this->dataTable['datos'][0]['direccion']?></span>
	</div>
	<div>
		Población: <span><?=$this->dataTable['datos'][0]['poblacion']?></span>
	</div>
	<div>
		Provincia: <span><?=$this->dataTable['datos'][0]['provincia']?></span>
	</div>
</div>

	<?php 
	if($_SESSION['roles']==3)
	{
	?>
		<h1>Practicas por realizar</h1>
		<table>
			<tr>
				<td>Fecha y hora</td><td>Profesor</td><td>Zona</td><td>Observaciones</td>
			</tr>
		<?php
		if(!empty($this->dataTable['practicas_ph_a']))
		{
			foreach ($this->dataTable['practicas_ph_a'] as $practica) {

				?>	
				<tr>
					<td><?=$practica['fecha_hora']?></td><td><?=$practica['Np']?><?=$practica['Ap']?></td><td><?=$practica['zona']?></td><td><?=$practica['observaciones']?></td>
				</tr>
				<?php
			}
		}
		else
		{
			?>	
				<tr>
					<td colspan="4">Aun no has seleccionado ninguna practica</td>
				</tr>
				<?php
		}
		?>

		</table>

		<h1>Practicas realizadas</h1>
		<table>
			<tr>
				<td>Fecha y hora</td><td>Profesor</td><td>Zona</td><td>Observaciones</td>
			</tr>

		<?php
		if(!empty($this->dataTable['practicas_h_a']))
		{
			foreach ($this->dataTable['practicas_h_a'] as $practica) {

				?>	
				<tr>
					<td><?=$practica['fecha_hora']?></td><td><?=$practica['Np']?><?=$practica['Ap']?></td><td><?=$practica['zona']?></td><td><?=$practica['observaciones']?></td>
				</tr>
				<?php
			}
		
	}
	else
	{
		?>	
			<tr>
				<td colspan="4">Aun no has hecho ninguna practica</td>
			</tr>
			<?php
	}
	?>

	</table>

	<?php
	}
	else if($_SESSION['roles']==4)
	{
		?>
		<h1>Practicas por realizar</h1>
		<table>
			<tr>
				<td>Fecha y hora</td><td> Alumno</td><td>Zona</td><td>Observaciones</td>
			</tr>
		<?php
		if(!empty($this->dataTable['practicas_ph_p']))
		{
			foreach ($this->dataTable['practicas_ph_p'] as $practica) {

				?>	
				<tr>
					<td><?=$practica['fecha_hora']?></td><td><?=$practica['Na']?><?=$practica['Aa']?></td><td><?=$practica['zona']?></td><td><?=$practica['observaciones']?></td><td><button class="m_h">Marcar como hecha<span style="display: none"><?=$practica['id_practicas']?></span></button></td>
				</tr>
				</tr>
				<?php
			}
		}
		else
		{
			?>	
				<tr>
					<td colspan="4">Aun no has seleccionado ninguna practica</td>
				</tr>
				<?php
		}
		?>

		</table>

		<h1>Practicas realizadas</h1>
		<table>
			<tr>
				<td>Fecha y hora</td><td>Profesor</td><td>Zona</td><td>Observaciones</td>
			</tr>

		<?php
		if(!empty($this->dataTable['practicas_h_p']))
		{
			foreach ($this->dataTable['practicas_h_p'] as $practica) {

				?>	
				<tr>
					<td><?=$practica['fecha_hora']?></td><td><?=$practica['Na']?><?=$practica['Aa']?></td><td><?=$practica['zona']?></td><td><?=$practica['observaciones']?></td>
				<?php
			}
			
		}
		else
		{
			?>	
				<tr>
					<td colspan="4">Aun no has hecho ninguna practica</td>
				</tr>
				<?php
		}
		?>

		</table>

		<?php
	}
}
?>

<script type="text/javascript">
	$(function(){
		$(".m_h").on('click', function(){

			practica = $(this).find('span').text();
			$.post("/yaire/users/marcar_practica", {practica:practica}, function(data){
				window.location.reload(); 
			});
		});
	});
</script>