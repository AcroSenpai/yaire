<h1><?= $this->page; ?></h1>
<div>Carrito <span id="num_c"></span></div>
<div style="display: flex;">
<?php

foreach ($this->dataTable['productos'] as $producto) 
{
	?>
		<div>
			<div>
				<a href="/yaire/tienda/producto/id/<?=$producto['id_productos']?>"><img style="width: 300px" src="/yaire/pub/images/<?=$producto['img']?>"></a>
			</div>
			<div>
				Precio: <?=$producto['precio']?>
			</div>
			<div>
				<button class="comprar">Comprar</button>
				<span class="id" style="display: none"><?=$producto['id_productos']?></span>
				<span class="precio" style="display: none"><?=$producto['precio']?></span>
			</div>
		</div>
	<?php
}
?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		numero_conceptos();

		$(".comprar").on('click',function(){

			producto = $(this).siblings('.id').text();
			cantidad = 1;
			precio = $(this).siblings('.precio').text();

			$.post( "/yaire/tienda/generar_concepto",{producto:producto,cantidad:cantidad,precio:precio}, function( data ) {
					
			});
			numero_conceptos();
		})

		function numero_conceptos()
		{
			$.post( "/yaire/tienda/num_conceptos", function( data ) {
					$("#num_c").text(data);
			});
		}

	});
</script>