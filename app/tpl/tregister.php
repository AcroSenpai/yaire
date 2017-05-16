<h1><?= $this->page; ?></h1>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	
	$(function(){

		$("#email").on("focusout", function(){
			email = $("#email").val();
			$.post( "/yaire/register/ckemail",{email:email}, function( data ) {
				
	            if(data==1)
	            {
	                $(".me_error").css("display", "inline");
	                if($(".ce_error").text()<1)
	            	{
	                	$(".ce_error").text(eval($(".ce_error").text())+1);
	            	}
	            }
	            else
	            {
	            	 $(".me_error").css("display", "none");
	            	 if($(".ce_error").text()>0)
	            	 {
	            	 	$(".ce_error").text(eval($(".ce_error").text())-1);
	            	 }
	            }
       		});
		});

		$("#email2").on("focusout", function(){
			email = $("#email2").val();
			$.post( "/yaire/register/ckemail",{email:email}, function( data ) {
				
	            if(data==1)
	            {
	                $(".me_error").css("display", "inline");
	                if($(".ce_error").text()<1)
	            	{
	                	$(".ce_error").text(eval($(".ce_error").text())+1);
	            	}
	            }
	            else
	            {
	            	 $(".me_error").css("display", "none");
	            	 if($(".ce_error").text()>0)
	            	 {
	            	 	$(".ce_error").text(eval($(".ce_error").text())-1);
	            	 }
	            }
       		});
		});


		$("#username").on("focusout", function(){
			username = $("#username").val();
			$.post( "/yaire/register/ckusername",{username:username}, function( data ) {
	            if(data==1)
	            {
	                $(".mu_error").css("display", "inline");
	                if($(".cu_error").text()<1)
	            	{
	            		$(".cu_error").text(eval($(".cu_error").text())+1);
	            	}
	            }
	            else
	            {
	            	 $(".mu_error").css("display", "none");
	            	 if($(".cu_error").text()>0)
	            	 {
	            	 	$(".cu_error").text(eval($(".cu_error").text())-1);
	            	 }
	            }
       		});
		});

		$("#username2").on("focusout", function(){
			username = $("#username2").val();
			$.post( "/yaire/register/ckusername",{username:username}, function( data ) {
	            if(data==1)
	            {
	                $(".mu_error").css("display", "inline");
	                if($(".cu_error").text()<1)
	            	{
	            		$(".cu_error").text(eval($(".cu_error").text())+1);
	            	}
	            }
	            else
	            {
	            	 $(".mu_error").css("display", "none");
	            	 if($(".cu_error").text()>0)
	            	 {
	            	 	$(".cu_error").text(eval($(".cu_error").text())-1);
	            	 }
	            }
       		});
		});
		
		$("#paw").on("focusout", function(){
			paw = $("#paw").val();
			tam = paw.length;
			if(eval(tam)<8 && tam != 0)
			{
				$(".mr_error").css("display", "inline");
				if($(".cr_error").text()<1)
	            {
					$(".cr_error").text(eval($(".cr_error").text())+1);
				}
			}
			else
			{
				$(".mr_error").css("display", "none");
				if($(".cr_error").text()>0)
            	{
            	 	$(".cr_error").text(eval($(".cr_error").text())-1);
            	}
			}
			
		});

		$("#paw3").on("focusout", function(){
			paw = $("#paw3").val();
			tam = paw.length;
			if(eval(tam)<8 && tam != 0)
			{
				$(".mr_error").css("display", "inline");
				if($(".cr_error").text()<1)
	            {
					$(".cr_error").text(eval($(".cr_error").text())+1);
				}
			}
			else
			{
				$(".mr_error").css("display", "none");
				if($(".cr_error").text()>0)
            	{
            	 	$(".cr_error").text(eval($(".cr_error").text())-1);
            	}
			}
			
		});

		$("#paw2").on("focusout", function(){
			paw2 = $("#paw2").val();
			paw = $("#paw").val();
			if(paw2 != paw)
			{
				$(".mrp_error").css("display", "inline");
				if($(".crp_error").text()<1)
	            {
					$(".crp_error").text(eval($(".crp_error").text())+1);
				}
			}
			else
			{
				$(".mrp_error").css("display", "none");
				if($(".crp_error").text()>0)
	        	{
	        	 	$(".crp_error").text(eval($(".crp_error").text())-1);
	        	}
			}
			
		});

		$("#paw4").on("focusout", function(){
			paw2 = $("#paw4").val();
			paw = $("#paw3").val();
			if(paw2 != paw)
			{
				$(".mrp_error").css("display", "inline");
				if($(".crp_error").text()<1)
	            {
					$(".crp_error").text(eval($(".crp_error").text())+1);
				}
			}
			else
			{
				$(".mrp_error").css("display", "none");
				if($(".crp_error").text()>0)
	        	{
	        	 	$(".crp_error").text(eval($(".crp_error").text())-1);
	        	}
			}
			
		});

		$("#formulario1").submit(function(e){
			
			e.preventDefault();
			email = $("#email").val();
			username = $("#username").val();
			pass = $("#paw").val();

			fmail = 0;
			fusername = 0;

			if(email != "" && username != "" && pass != "")
			{	
				c1 = $(".ce_error").text();
				c2 = $(".cu_error").text();
				c3 = $(".cr_error").text();
				c4 = $(".crp_error").text();

				if(c1 != 1 && c2 != 1 && c3 != 1 && c4 != 1)
				{
					$.post( "/yaire/register/insert",{email:email, pass:pass, username:username}, function( data ) {
	                    if(data==1)
	                    {
	                        window.location.href = "/yaire/login";
	                    }
	                    else
	                    {
	                    	alert(data);
	                        //alert("Error inesperado! T.T");
	                    }
	            	});
				}
				
			}
		});

		$("#formulario2").submit(function(e){
			e.preventDefault();
			email = $("#email2").val();
			username = $("#username2").val();
			pass = $("#paw3").val();
			nombre = $("#nombre").val();
			apellidos = $("#apellidos").val();
			dni = $("#dni").val();
			direccion = $("#direccion").val();
			poblacion = $("#poblacion").val();

			fmail = 0;
			fusername = 0;

			if(email != "" && username != "" && pass != "")
			{
				c1 = $(".ce_error").text();
				c2 = $(".cu_error").text();
				c3 = $(".cr_error").text();
				c4 = $(".crp_error").text();
				

				if(c1 != 1 && c2 != 1 && c3 != 1 && c4 != 1)
				{
					//{email:email, pass:pass, username:username,nombre:nombre,apellidos:apellidos,dni:dni,direccion:direccion,poblacion:poblacion}
					$.post( "/yaire/register/insert_a",$(this).serialize(), function( data ) {
	                    if(data==1)
	                    {
	                        window.location.href = "/yaire/login";
	                    }
	                    else
	                    {
	                    	alert(data);
	                        //alert("Error inesperado! T.T");
	                    }
	            	});
				}
				
			}
		});
	});

</script>

<form action="" id="formulario1" >
	<div class="input-group">
		<input type="email" id="email" placeholder="Email" required="required">
		<span class="me_error" style="display: none">El correo ya existe</span>
		<span class="ce_error" style="display: none">0</span>
		<input type="text" id="username" placeholder="Username" required="required">
		<span class="mu_error" style="display: none">El username ya existe</span>
		<span class="cu_error" style="display: none">0</span>
		<input type="password" id="paw" placeholder="Password" required="required">
		<span class="mr_error" style="display: none">Constraseña insegura</span>
		<span class="cr_error" style="display: none">0</span>
		<input type="password" id="paw2" placeholder="Repite la Password" required="required">
		<span class="mrp_error" style="display: none">Contraseñas diferentes</span>
		<span class="crp_error" style="display: none">0</span>
		<input type="submit" id="submit" value="Submit">
		
	</div>
</form>


<form action="" id="formulario2" >
	<div class="input-group">
		<input type="email" name="email2" id="email2" placeholder="Email" required="required">
		<span class="me_error" style="display: none">El correo ya existe</span>
		<span class="ce_error" style="display: none">0</span>
		<input type="text" name="username2" id="username2" placeholder="Username" required="required">
		<span class="mu_error" style="display: none">El username ya existe</span>
		<span class="cu_error" style="display: none">0</span>
		<input type="password" name="paw3" id="paw3" placeholder="Password" required="required">
		<span class="mr_error" style="display: none">Constraseña insegura</span>
		<span class="cr_error" style="display: none">0</span>
		<input type="password" name="paw4" id="paw4" placeholder="Repite la Password" required="required">
		<span class="mrp_error" style="display: none">Contraseñas diferentes</span>
		<span class="crp_error" style="display: none">0</span>

		<input type="text" name="apellidos" id="apellidos" placeholder="Apellclassos" required="required">
		<input type="text" name="nombre" id="nombre" placeholder="Nombre" required="required">
		<input type="text" name="dni" id="dni" placeholder="DNI" required="required">
		<input type="text" name="telefono" id="telefono" placeholder="Telefono" required="required">
		<input type="text" name="direccion" id="direccion" placeholder="Direccion" required="required">
		<!--<input type="text" name="poblacion" id="poblacion" placeholder="poblacion" required="required">-->
		<select>
			
			<?php
			foreach ($this->dataTable as $poblacion) {
				
			?>
				<option value="<?=$poblacion['id_poblacion']?>"><?=utf8_encode($poblacion['nombre'])?></option>
			<?php
			}
			
			?>

		</select>
		<input type="submit" id="submit" value="Submit" required="required">

	</div>
</form>