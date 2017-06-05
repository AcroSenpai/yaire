
<?php
	include 'head_common.php';
?>

<div class="container">
	<div class="top_space">
	</div>
<form action="" id="formulario" >

	<div class="input-group row">

		<span id="m_error" style="display: none">¡correo o contraseña INCORRECTOS!</span>

		<p class="form_title">LOGIN</p>

		<span>
			<label class="reg_label" for="email">Email</label>
			<input class="reg_input" type="email" id="email" required="required" name="email">
		</span>

		<span>
			<label class="reg_label" for="password">Password</label>
			<input class="reg_input" type="password" id="paw"  required="required" name="password">
		</span>
		<span><a href="/error">¿Olvidaste tu contraseña?</a></span>
		<span><a href="/register">Aún no estas registrado? Regístrate</a></span>
		<input type="submit" class="hvr-grow" id="submit" value="OK">

	</div>

</form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php
	include 'footer_common.php';
?>
