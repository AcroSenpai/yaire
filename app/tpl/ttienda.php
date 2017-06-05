
<?php
	include 'head_common.php';
	?>
<span class="breadcrums">Tienda</span>
<div class="container">
	<div class="top_space">
	</div>
	<h1><?= $this->page; ?></h1>

	<div class="productos_wrapper">
	<?php
	foreach ($this->dataTable['productos'] as $producto)
	{
		?>
			<div class="producto_wrapper animated bounce hvr-bob">

				<div class="producto_container">

					<div>
						<a href="/tienda/producto/id/<?=$producto['id_productos']?>"><img alt="producto" src="/pub/images/<?=$producto['img']?>"></a>
					</div>
					<div class="producto_bottom">
						<span class="producto_precio"><?=$producto['precio']?> € </span>

						<?php if( (! empty ($_SESSION['user'])) && ( ($_SESSION['rol']==3) ) ):?>
							<button class="comprar hvr-grow">Comprar</button>
						<?php else:?>
							<button class="comprar_userw hvr-grow">Comprar</button>
						<?php endif;?>

						<span class="id" style="display: none"><?=$producto['id_productos']?></span>
						<span class="precio" style="display: none"><?=$producto['precio']?></span>
					</div>

				</div>

			</div>
		<?php
	}
	?>
	</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
	include 'footer_common.php';
?>
