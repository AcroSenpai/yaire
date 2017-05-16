<h1><?= $this->page; ?></h1><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
	
	$(function(){

		$("#formulario").submit(function(e){
			e.preventDefault();
			email = $("#email").val();
			pass = $("#paw").val();
			 $.post( "/yaire/login/ckuser",{email:email, pass:pass}, function( data ) {
                    if(data==1)
                    {
                        window.location.href = "/yaire";
                    }
                    else
                    {
                        $("#m_error").css("display", "inline");
                    }
            });
		});
	});

</script>

<form action="" id="formulario" >
	<div class="input-group">
		<input type="email" id="email" placeholder="Email" required="required">
		<input type="password" id="paw" placeholder="Password" required="required">
		<input type="submit" id="submit" value="Submit">
		<span id="m_error" style="display: none">¡¡¡El correo o la contraseña son incorectos!!!</span>
	</div>
</form>
		