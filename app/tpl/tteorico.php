
<?php
	include 'head_common.php';
	?>
<span class="breadcrums">Teoría</span>

<div class="container">

	<div class="top_space">
	</div>
<?php if( !empty ($_SESSION['user']) && ($_SESSION['rol']==2 || $_SESSION['rol']==4) ): ?>

	<div class="top_wrap">

		<div>
		</div>

		<h1>TEORICO</h1>

		<?php

			if(!empty($_SESSION['user']))
			{

				if( $_SESSION["rol"]==4 )
						{
							echo '<a id="test_button_crear" class="hvr-grow" href="/teorico/crear/">+ Crear </a>';
						}
						else echo'<div></div>';

			}

		 ?>

	</div>

	<div class="test_div">

			<h2 class="test_title">Test oficiales de la DGT</h2>

			<div class="test_list_container">

				<table class="test_list">
				<tr><td>Nombre</td><td>Aciertos</td><td>Intentos</td></tr>

				<?php
				$i=0;
					foreach ($this->dataTable['test'] as $test) {

						if($i == 5)
						{
							?>
							</table>
							<table class="test_list">
								<tr><td>Nombre</td><td>Aciertos</td><td>Intentos</td></tr>
							<?php
							$i=0;
						}

						if($test['categoria']==1)
						{
						?>
							<tr>
								<td>
									<a href="/teorico/test/id/<?=$test['id_test']?>"><?=$test['Nombre']?></a>
								</td>
								<?php
								$cont = 0;
								foreach ($this->dataTable['resultados'] as $restablet) {

									if($restablet['test']==$test['id_test'])
									{
									?>
										<td><?=$restablet['max']?></td>
										<td><?=$restablet['intentos']?></td>
									<?php
									$cont++;
									}

								}

								if($cont == 0){
								?>
									<td>-</td>
									<td>-</td>
								<?php
							}

							?>
							</tr>

						<?php
						$i++;
						}

				 }
				?>
				</table>

			</div>

	</div>

	<hr class="style-six">

	<div class="test_div">

			<h2 class="test_title">Test de examen</h2>
			<div class="test_list_container">

				<table class="test_list">
				<tr><td>Nombre</td><td>Aciertos</td><td>Intentos</td></tr>

				<?php
				$i=0;
					foreach ($this->dataTable['test'] as $test) {

						if($i == 5)
						{
							?>
							</table>
							<table class="test_list">
								<tr><td>Nombre</td><td>Aciertos</td><td>Intentos</td></tr>
							<?php
							$i=0;
						}

						if($test['categoria']==2)
						{
						?>
							<tr>
								<td>
									<a href="/teorico/test/id/<?=$test['id_test']?>"><?=$test['Nombre']?></a>
								</td>
								<?php
								$cont = 0;
								foreach ($this->dataTable['resultados'] as $restablet) {

									if($restablet['test']==$test['id_test'])
									{
									?>
										<td><?=$restablet['max']?></td>
										<td><?=$restablet['intentos']?></td>
									<?php
									$cont++;
									}

								}

								if($cont == 0){
								?>
									<td>-</td>
									<td>-</td>
								<?php
							}

							?>
							</tr>

						<?php
						$i++;
						}

				 }
				?>
				</table>

			</div>

		</div>

	<hr class="style-six">

		<div class="test_div">

				<h2 class="test_title">Test por tema</h2>

				<div class="test_list_container">

					<table class="test_list">
					<tr><td>Nombre</td><td>Aciertos</td><td>Intentos</td></tr>

					<?php
					$i=0;
						foreach ($this->dataTable['test'] as $test) {

							if($i == 5)
							{
								?>
								</table>
								<table class="test_list">
									<tr><td>Nombre</td><td>Aciertos</td><td>Intentos</td></tr>
								<?php
								$i=0;
							}

							if($test['categoria']==3)
							{
							?>
								<tr>
									<td>
										<a href="/teorico/test/id/<?=$test['id_test']?>"><?=$test['Nombre']?></a>
									</td>
									<?php
									$cont = 0;
									foreach ($this->dataTable['resultados'] as $restablet) {

										if($restablet['test']==$test['id_test'])
										{
										?>
											<td><?=$restablet['max']?></td>
											<td><?=$restablet['intentos']?></td>
										<?php
										$cont++;
										}

									}

									if($cont == 0){
									?>
										<td>-</td>
										<td>-</td>
									<?php
								}

								?>
								</tr>

							<?php
							$i++;
							}

					 }
					?>
					</table>

				</div>

	</div>

	<hr class="style-six">

		<div class="test_div">

			<h2 class="test_title">¡Test Calientes! ¿Te atreves?</h2>

			<div class="test_list_container">

				<table class="test_list">
				<tr><td>Nombre</td><td>Aciertos</td><td>Intentos</td></tr>

				<?php
				$i=0;
					foreach ($this->dataTable['test'] as $test) {

						if($i == 5)
						{
							?>
							</table>
							<table class="test_list">
								<tr><td>Nombre</td><td>Aciertos</td><td>Intentos</td></tr>
							<?php
							$i=0;
						}

						if($test['categoria']==4)
						{
						?>
							<tr>
								<td>
									<a href="/teorico/test/id/<?=$test['id_test']?>"><?=$test['Nombre']?></a>
								</td>
								<?php
								$cont = 0;
								foreach ($this->dataTable['resultados'] as $restablet) {

									if($restablet['test']==$test['id_test'])
									{
									?>
										<td><?=$restablet['max']?></td>
										<td><?=$restablet['intentos']?></td>
									<?php
									$cont++;
									}

								}

								if($cont == 0){
								?>
									<td>-</td>
									<td>-</td>
								<?php
							}

							?>
							</tr>

						<?php
						$i++;
						}

				 }
				?>
				</table>

			</div>

		</div>

		<?php endif; ?>

		<?php if( empty ($_SESSION['user']) ):

			header('Location: /users');

		 endif; ?>

	<?php if( !empty ($_SESSION['user']) && ($_SESSION['rol']==1 || $_SESSION['rol']==3 ) ): ?>

		<div class="error_wraper">

			<img src="/pub/images/error.png" alt="error al entrar, no eres usuario de teoría"/>
			<h1>¡ERROR!</h1>
			<h3>NO PUEDE ACCEDER A LA PÁGINA PORQUE NO ES UN USUARIO DE TEORÍA</h3>

		</div>

	<?php endif; ?>

	<div class="space">
	</div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<?php
	include 'footer_common.php';
?>
