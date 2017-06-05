<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>AUTOESCOLA YA IRÉ</title>
	<link rel="icon" href="<?='/pub/images/favicon.png'?>" type="image/png" sizes="16x16">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="stylesheet" type="text/css" href="<?= '/pub/fonts/flaticon/flaticon.css'; ?>"/>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500i,700,900" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css?family=Patrick+Hand" rel="stylesheet"/>
	<link rel="stylesheet" href="<?= '/pub/themes/default/default.css'; ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= '/pub/css/nivo-slider.css'; ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= '/pub/css/set2.css'; ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?= '/pub/css/animate.css'; ?>"/>
	<link rel="stylesheet" href="<?= '/pub/css/hover.css'; ?>"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="<?= '/pub/css/component.css' ?>" />
	<script type="text/javascript" src="<?='/pub/js/modernizr.custom.js'?>"></script>

	<link rel="stylesheet" href="<?= '/pub/css/style.css'; ?>"/>

</head>
<body>

	<nav class="navegador">

	<a href="/"><img src="/pub/images/logo.png" id="nav_logo" class="animated rotateIn" alt="logo autoescuela yaire"/></a>

	<ul>
	<?php
		if($this->page == 'Teorico')
		{
	?>
		<li id="nav_teorico" class="seleccionado">
	<?php
		}
		else
		{
	?>
		<li id="nav_teorico">
	<?php
		}
	?>
			<a href="/teorico" class="hvr-grow-shadow">Teoría</a>
		</li>
	<?php
		if($this->page == 'Practico')
		{
	?>
		<li id="nav_practico" class="seleccionado">
	<?php
		}
		else
		{
	?>
		<li id="nav_practico">
	<?php
		}
	?>
			<a href="/practico" class="hvr-grow-shadow">Prácticas</a>
		</li>


	<?php
		if($this->page == 'Tienda')
		{
	?>
		<li id="nav_tienda" class="seleccionado">
	<?php
		}
		else
		{
	?>
		<li id="nav_tienda">
	<?php
		}
	?>
			<a href="/tienda" class="hvr-grow-shadow">Tienda</a>
		</li>

		<li id="nav_user">
			<label class="hvr-grow-shadow">
			<?php
			use \X\Sys\Session;

					if( Session::get('user') )
							{
								echo "!Hola ".$_SESSION["user"]."!";
							}
						else{
								echo "Identifícate";
							}

			 ?>
			 </label><i class="flaticon-social"></i>
		</li>

		<?php if( (! empty ($_SESSION['user'])) && ( ($_SESSION['rol']==3) ) ):?>

		<li id="nav_cart">
			<a href="/tienda/carrito" class="hvr-grow-shadow">

				<?php if( isset($this->dataTable['tienda']) ): ?>
					<span class="num_c"></span>
				<?php endif; ?>

				<i class="flaticon-shopping-cart"></i></a>
		</li>

		<?php endif;?>

	</ul>

	</nav>

	<div class="nav_off">

		<div class="nav_off_wrapper">

				<div class="nav_user">

					<div class="nav_user_triangle">
					</div>

					<div class="nav_user_text">

						<?php

								if(! Session::get('user') )
										{
											echo '<a href="/login">Iniciar Sesión</a>
														<hr/>
														<a href="/register">Registrarme</a>';
										}

									else
										{
											echo '<a href="/users">Mi Perfil</a>
											<hr/>
											<a href="/login/logout">Cerrar Sesión</a>';
										}

						 ?>

					</div>

				</div>

		</div>

	</div>
