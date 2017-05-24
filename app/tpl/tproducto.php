<h1><?= $this->page; ?></h1>
<div style="display: flex;">
	<div>

	<img style="width: 600px" src="/yaire/pub/images/<?=$this->dataTable[0]['img']?>">
	</div>
	<div>
	<div>
		Descripcion: <?=$this->dataTable[0]['descripcion']?>
	</div>
	<div id="precio">
		Precio: <?=$this->dataTable[0]['precio']?>
	</div>
	<div>
		<input type="number" name="cantidad" value="1" min="1">
		<button class="comprar">Comprar</button>
		<span class="id" style="display: none"><?=$this->dataTable[0]['id_productos']?></span>
		<span class="precio" style="display: none"><?=$this->dataTable[0]['precio']?></span>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){


		$(".comprar").on('click',function(){

			producto = $(this).siblings('.id').text();
			cantidad = $(this).siblings('input').val();
			precio = $(this).siblings('.precio').text();

			$.post( "/yaire/tienda/generar_concepto",{producto:producto,cantidad:cantidad,precio:precio}, function( data ) {
				alert(data);
					//window.location.href = "/yaire/tienda";
			});
		
		})

	});
</script>