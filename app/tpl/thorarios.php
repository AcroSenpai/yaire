<h1><?= $this->page; ?></h1>
<html>
    <head>
        <link href="/yaire/pub/css/datepicker.min.css" rel="stylesheet" type="text/css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="/yaire/pub/js/datepicker.min.js"></script>

        <!-- Include English language -->
        <script src="/yaire/pub/js/i18n/datepicker.es.js"></script>
    </head>
    <body>
    	<input type='text' class="datepicker-here" data-position="right top"  data-language='es'/>
    	<span style="display: none" id="respaldo"></span>
    	<select id="zona">
    		
    	</select>
    	<table id ="mapa" border="1">

    	</table>

    	<table id="resultado" border="1">
    	<tr>
    		<td>Fecha</td><td>Hora</td><td>Zona</td><td></td>
    	</tr>
    	</table>
    	<button id="borrar">Borrar</button>
    	<button id="guardar">Guardar</button>
    	
    	<script type="text/javascript">
    		$(function(){
    			var dias = new Array('domingo','lunes','martes','miercoles','jueves','viernes','sabado');
    			var meses = new Array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
    			var mes ="";
    			var año ="";
    			var total ="";
    			Now = new Date();
    			var f = Now.getDate() + "/" + eval(Now.getMonth()+1)+"/"+Now.getFullYear();
    			cargar_zonas(f);
    			

    			$('#my-element').datepicker();
				$('#my-element').data('datepicker');

				$('.datepicker-here').on('click', function(){});

				$('.datepickers-container').on('click',function(){
 					$('.datepicker-here').val(calcular_semana($('.datepicker-here').val()));
					generar_cal();

				});

				function calcular_semana(fecha)
				{
					if(fecha != "" && fecha != $('#respaldo').text())
					{
						campos = fecha.split('/');
						año =campos[2];
						mes = campos[1];
						date = new Date(campos[2],campos[1]-1,campos[0]);
						dia_actual = date.getDay()

						dia_def_i = dia_actual - 1;
						dia_def_f = 5 - dia_actual;

						diainicio = campos[0]-dia_def_i;
						diafin = eval(campos[0])+dia_def_f;
						meses[campos[1]/1-1];

						if(diainicio < 1)
						{
							diainicio = eval(meses[campos[1]/1-2]) + diainicio;

						}

						if(diainicio == 0)
						{
							diainicio++;
						}

						if(diafin == 0)
						{
							diafin = meses[campos[1]/1-2];
						}


						if(diafin > meses[campos[1]/1-1])
						{

							diafin = diafin - meses[campos[1]/1-1];
						}

						semana = diainicio+"-"+diafin;
						$('#respaldo').text(semana);
						
						return semana;
					}
					else
					{
						return $('#respaldo').text();
					}
				}

				function generar_cal()
				{
					dia = $('.datepicker-here').val();
					if(dia!="")
					{
						numeros = dia.split('-');
						$("#mapa tr").remove();
						for(i=0;i<4;i++)
						{
							numeros[i+1] = eval(numeros[i])+1;
						}
						
						primera_fila = "<tr class='.hola'><td></td>";
						for(i=0;i<5;i++)
						{
							primera_fila += "<td>"+dias[i+1]+" "+numeros[i]+"</td>";
						}
						
						$("#mapa").append(primera_fila);
						zona = $("#zona").val();
						$.post("/yaire/practico/crear_tabla_horario", {num1:numeros[0],zona:zona,mes:mes,año:año}, function(data){
							$("#mapa").append(data);
							//alert(data);
						});

					}
				}

				$('select#zona').on('change',function(){
				  $('.datepicker-here').val(calcular_semana($('.datepicker-here').val()));
					generar_cal();
				});


				$("body").on('click','.horario', function(){

					zona= $("#zona option:selected").text();
					zona_id = $("#zona").val();
					fecha = $(this).siblings("span").text();
					fecha = fecha.split(' ');
					dia = fecha[0];
					hora= fecha[1];
					importe = 1;
					total = eval(total + importe);
					mes = pad(mes,2);
					$(this).remove();
					fecha = año+"-"+mes+"-"+dia;

					$(".total").remove();

					row = "<tr class='result '><td class='fecha'>"+fecha+"</td><td class='hora'>"+hora+"</td></td><td class='zona'>"+zona+"<span style='display:none;'>"+zona_id+"</span></td><td class='br'>Borrar</td></tr>";
					$("#resultado").append(row);

				});

				function pad (str, max) 
				{
					str = str.toString();
					return str.length < max ? pad("0" + str, max) : str;
				}

				$("#borrar").on('click', function()
				{	
					$(".result").each(function(){

						fecha = $(this).find(".fecha").text();
						fecha= fecha.split("-");
						hora = $(this).find(".hora").text();
						hora = hora.replace(':00', '');
						boton = "<button class='horario'>Marcar</button>";
						clase = fecha[2]+"-"+hora;
						$("."+clase).append(boton);

					});

					$(".result").remove();
				});


				$("body").on('click','.br', function()
				{
					fecha = $(this).siblings(".fecha").text();
					fecha= fecha.split("-");
					hora = $(this).siblings(".hora").text();
					hora = hora.replace(':00', '');
					boton = "<button class='horario'>Marcar</button>";
					clase = fecha[2]+"-"+hora;
					$("."+clase).append(boton);
					$(".total").remove();
					$(this).parent('tr').remove();
				});

				function cargar_zonas(f)
				{
					$.post("/yaire/practico/cargar_zonas_h", function(data){
							$("#zona").append(data);
							$('.datepicker-here').val(calcular_semana(f));
    						generar_cal();
					});

				}

				$("#guardar").on('click', function()
				{
					$(".result").each(function(){

						fecha = $(this).find(".fecha").text();
						hora = $(this).find(".hora").text();
						hora = hora.replace(':00', '');
						zona = $(this).find(".zona").find("span").text();

						$.post("/yaire/practico/guardar_horario", {fecha:fecha,hora:hora,zona:zona}, function(data){
								alert(data);
								//window.location.href = "/yaire/users";
							
						});

					});

				});
    		});
    	</script>
    </body>
</html>