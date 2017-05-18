<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
	$(function(){

		$("#nombre").focusout(function(){

			test = $("#nombre").val();

			$.post( "/yaire/teorico/ckTest",{test:test}, function( data ) {
					if(data==1)
	                {
	                    alert("Ese test ya existe");
	                }
			});

		});
		
		$("#test").submit(function(e){
			e.preventDefault();
			test = $("#test").val();
			preguntas=new Array;
			tpreguntas = 0;
			$('select').each(function(i){
				if($(this).val()!="")
				{
					preguntas[i]=$(this).val();
					tpreguntas ++;
				}
				console.log(tpreguntas);
			});

			test = $("#nombre").val();
			cat = $("#cat").val();

			if(tpreguntas == 31)
			{
				if(test!="" && cat!="")
				{
					var pre=JSON.stringify(preguntas);
					$.post( "/yaire/teorico/crearTest",{test:test,cat:cat,pre:pre}, function( data ) {
						alert(data);
				    });
					
				}
				else
				{
					alert("Nombre o categoria vacio!!!");
				}
				
			}
			else
			{
				alert("Faltan preguntas por asignar");
			}
		});

		$("#pregunta").submit(function(e){
			e.preventDefault();

			$.post( "/yaire/teorico/crearP",$("#pregunta").serialize(), function( data ) {
					alert("Pregunta creada correctamente!");
					$("#pre").val("");
					$("#c").val("");
					$("#i1").val("");
					$("#i2").val("");
			});
		});
	});
</script>

<h1>Opcion 1, Crear un test.</h1>

	<form id="test">
	Nombre del test:
		<input type="text" name="test" id="nombre" required>
		<select id="cat">
					<option value=""></option>
					<?php
						foreach ($this->dataTable['categorias'] as $categorias) {
					?>
							<option value="<?=$categorias['id_categoria']?>"><?=utf8_encode($categorias['nombre'])?></option>
					<?php
						}
					?>
		</select>
	Preguntas:
		<?php
				for($i=1;$i<31;$i++) 
				{
					?>
					<div>Pregunta <?=$i?></div>
					<?php
					?>
						<select>
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
		<input type="submit" name="enviar" value="crear">
	</form>

<h1>Opcion 2, Crear preguntas.</h1>

<form id="pregunta" enctype="multipart/form-data" method="POST">
	Pregunta:
		<input type="text" name="pre" id="pre" required>
	Opcion correcta:
		<input type="text" name="c" id="c" required>
	Opcion incorrecta:
		<input type="text" name="i1" id="i1" required>
	Opcion incorrecta:
		<input type="text" name="i2" id="i2" required>
	<input type="submit" name="enviar" value="crear">
</form>