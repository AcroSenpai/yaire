
<?php
	include 'head_common.php';
	?>
<span class="breadcrums"><a href="/teoria">Teoría</a> > Test</span>
<div class="nav_back">

	<button type="button" name="button" id="nav_back"> < </button>

</div>

<div class="container">
	<div class="top_space">
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php if( !empty ($_SESSION['user'])  && ($_SESSION['rol']==2 || $_SESSION['rol']==4) ): ?>

<span style="display:none" id="id_test"><?= $this->dataTable[0]['id_test']; ?></span>
<div>
<h1 id="ttest_title"><?= $this->dataTable[0]['Nombre']; ?></h1>

<img class="flecha hvr-grow" src="/pub/images/icons/flecha.png" alt="flecha" />

<?php
	$i = 1;
	$x=1;
		foreach ($this->dataTable as $test) {
		$random = rand(1,3);
		?>
		<section class="test_preguntas_wrap">
		<form class="ac-custom ac-radio ac-circle" autocomplete="off">
		<h3 id="pregunta_<?=$i?>"><?=$i?>. <?=utf8_encode($test['pregunta'])?></h3>
		<?php
			switch ($random) {
				case 1:
					?>
						<ul>
						<li><input id="r<?=$x?>" type="radio" name="r<?=$i?>" value="c"> <label for="r<?=$x?>"> a) <?=utf8_encode($test['opcion_c'])?></label><span style="display: none;" class="respuesta"></span></li>
						<?php $x++?>
						<li><input id="r<?=$x?>" type="radio" name="r<?=$i?>" value="i1"> <label for="r<?=$x?>"> b) <?=utf8_encode($test['opcion_i1'])?></label><span style="display: none;" class="respuesta"></span></li>
						<?php $x++?>
						<li><input id="r<?=$x?>" type="radio" name="r<?=$i?>" value="i2"> <label for="r<?=$x?>"> c) <?=utf8_encode($test['opcion_i2'])?></label><span style="display: none;" class="respuesta"></span></li>
						<?php $x++?>
						</ul>
					<?php
					break;

				case 2:
					?>
					<ul>
						<li><input id="r<?=$x?>" type="radio" name="r<?=$i?>" value="i2"> <label for="r<?=$x?>"> a) <?=utf8_encode($test['opcion_i2'])?></label><span style="display: none;" class="respuesta"></span></li>
						<?php $x++?>
						<li><input id="r<?=$x?>" type="radio" name="r<?=$i?>" value="i1"> <label for="r<?=$x?>"> b) <?=utf8_encode($test['opcion_i1'])?></label><span style="display: none;" class="respuesta"></span></li>
						<?php $x++?>
						<li><input id="r<?=$x?>" type="radio" class="correcto" name="r<?=$i?>" value="c"> <label for="r<?=$x?>"> c) <?=utf8_encode($test['opcion_c'])?></label><span style="display: none;" class="respuesta"></span></li>
						<?php $x++?>
					</ul>
					<?php
					break;
				case 3:
					?>
					<ul>
						<li><input id="r<?=$x?>" type="radio" name="r<?=$i?>" value="i1"> <label for="r<?=$x?>"> a) <?=utf8_encode($test['opcion_i1'])?></label><span style="display: none;" class="respuesta"></span></li>
						<?php $x++?>
						<li><input id="r<?=$x?>" type="radio" class="correcto" name="r<?=$i?>" value="c"> <label for="r<?=$x?>"> b) <?=utf8_encode($test['opcion_c'])?></label><span style="display: none;" class="respuesta"></span></li>
						<?php $x++?>
						<li><input id="r<?=$x?>" type="radio" name="r<?=$i?>" value="i2"> <label for="r<?=$x?>"> c) <?=utf8_encode($test['opcion_i2'])?></label><span style="display: none;" class="respuesta"></span></li>
						<?php $x++?>
					</ul>
					<?php
					break;
			}

		$i++;

		?>
	</form>
	</section>

		<?php

		if($i<=30)
		{
			echo "<hr>";
		}
	}
?>

<div class="test_bottom">

	<input type="button" id="corregir"  value="Corregir" class="test_button hvr-grow">
	<div id="container_aciertos">
		<hr>
		<label id="aciertos"></label>
		<hr>
	</div>

</div>

</div>

<?php else:
	header('Location: /users');
			endif;
?>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
	include 'footer_common.php';
?>
