<h1><?= $this->page; ?></h1>
<?php
$total =0;
if(!empty($this->dataTable))
{
	foreach ($this->dataTable as $concepto) {
		?>

			<div class="concepto">
				<div>
					<a href="/yaire/tienda/producto/id/<?=$concepto['id_productos']?>"><img style="width: 300px" src="/yaire/pub/images/<?=$concepto['img']?>"></a>
				</div>
				<div>
					<?=$concepto['nombre']?>
				</div>
				<div>
					Precio: <?=$concepto['precio']?>
				</div>
				<div>
					Cantidad: <input type="number" class="precio" name="precio" min="1" value="<?=$concepto['cantidad']?>">
					<span class="id" style="display: none;"><?=$concepto['id_conceptos']?></span>
					<span class="producto" style="display: none;"><?=$concepto['id_productos']?></span>
				</div>
				<div>
					<button class="borrar">X<span class="id" style="display: none;"><?=$concepto['id_conceptos']?></span></span></button>
				</div>
			</div>

		<?php
		$total = $total + $concepto['precio'];
	}
	
}
else
{
	?>
		<h1>No tienes productos en el carrito</h1>
	<?php
}
?>
<div>
	Total: <span id="total"><?=$total?></span>
</div>
<button id="tramitar_pedido">Tramitar pedido</button>
<div id="pago_tarjeta">
	           <label>Nombre</label>
	           <input type="text" name="nombre" id="nombre">
	           <label>Numero</label>
	           <input type="text" name="numero" id="numero" maxlength="16" minlength="16">
		        <label>Expiracion (MM/VV)</label>
		        <label class="lccv">CCV <span id="ccv_ex" class="click">(?)</span></label><br/>

	           <div  class="diferencia">
		           <div>
		           		<input type="number" name="mes" id="mes" min="1" max="12">/
		           		<input type="number" name="año" id="ano" min="12" max="22">
		           	</div>
	           <input class="ccv" type="text" name="ccv" id="ccv" minlength="3" maxlength="3">
	           </div>
           </div>
<button id="comprar">Comprar</button>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){

		$(".borrar").on("click", function(){

			cocnepto = $(this).find('.id').text();
			$.post( "/yaire/tienda/borrar_concepto",{cocnepto:cocnepto}, function( data ) {
				window.location.href = "/yaire/tienda/carrito";
			});

		});

		$(".precio").on('change',function(){

			producto = $(this).siblings('.producto').text();
			cantidad = $(this).val();

			$.post( "/yaire/tienda/modificar_concepto",{producto:producto,cantidad:cantidad}, function( data ) {
				location.reload(true);
					
			});
		
		})

		if($("#total").text()==0)
		{
			$("#comprar").hide();
			$("#pago_tarjeta").hide();
			$("#tramitar_pedido").hide();
		}

		$("#comprar").on('click', function(){

			nombre = $("#nombre").val();
			numero = $("#numero").val();
			mes = $("#mes").val();
			ano = $("#ano").val();
			ccv = $("#ccv").val();

			if(nombre =="")
			{
				alert("Falta por poner el nombre");
			}
			else if(numero == "" || numero.length < 16)
			{
				alert("El numero es incorrecto");
			}
			else if(mes == "" || mes > 12 || mes < 1)
			{
				alert("El mes es incorrecto");
			}
			else if(ano == "" || ano > 22 || ano < 12)
			{
				alert("El año es incorrecto");
			}
			else if(ccv == "" || cvv.length < 3)
			{
				alert("El ccv es incorrecto");
			}
			else
			{
				total = $("#total").text();
				$.post( "/yaire/tienda/crear_compra",{total:total}, function( data ) {
					//window.location.href = "/yaire/tienda";
				});

				$('.concepto').each(function(){

					cocnepto = $(this).find('.id').text();
					$.post( "/yaire/tienda/asignar_conceptos",{cocnepto:cocnepto}, function( data ) {
						window.location.href = "/yaire/tienda";
					});
				});
				
			}



		});

	});
</script>