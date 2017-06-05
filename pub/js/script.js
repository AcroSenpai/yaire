$(document).ready(function(){

  var f_cont = 0;
  var f_tarjeta = 0;
  var f_click = 0;
  f_flecha = 0;

  /* BARRA NAV */

    $("#nav_user").click( function () {

        if(f_cont==0)
        {
          $(".nav_off").css("display","inline");
          f_cont = 1;
        }
        else{
          $(".nav_off").css("display","none");
          f_cont = 0;
        }

      });

  /* MOVIL --> BOTON ATRÀS (para que la app sea más dinámica) */

  $('#nav_back').click(function(){
    window.history.back();
  })

  /* REGISTRO TEORICO (USERWEB) */

      $("#reg_teoria").click( function () {

          $("#formulario1").css("display","inline");
          $(".reg_images").css("display","none");
          $("#reg_title").css("display","none");

      });

  /* REGISTRO PRACTICO */

      $("#reg_practica").click( function () {

          $("#formulario2").css("display","inline");
          $(".reg_images").css("display","none");
          $("#reg_title").css("display","none");

      });

/* EFECTO INPUTS REGISTRO + LOGIN */

      $(".reg_input").focus(function() {

        $(this).siblings("label").css("transition","all .3s ease-in-out");
        $(this).siblings("label").css("top","0");

      });

      $(".reg_input").focusout(function() {

        if( $(this).val() == "")
        {
          $(this).siblings("label").css("transition","all .3s ease-in-out");
          $(this).siblings("label").css("top","35px");
          $(this).siblings("label").fadeIn("slow");
        }
        else{
          $(this).siblings("label").css("transition","none");
          $(this).siblings("label").fadeOut("slow");
        }


      });

  /* COMPROBACIONES REGISTRO */

  /*Comprobacion de si existe el mail*/
  /*email de userweb*/
  $("#email").on("focusout", function(){
  	email = $("#email").val();
  	$.post( "/register/ckemail",{email:email}, function( data ) {
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
  /*email de alumno*/
  $("#email2").on("focusout", function(){
  	email = $("#email2").val();
  	$.post( "/register/ckemail",{email:email}, function( data ) {
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

    /*Comprobacion de si existe el username*/
    /*username de userweb*/
  $("#username").on("focusout", function(){
  	username = $("#username").val();
  	$.post( "/register/ckusername",{username:username}, function( data ) {
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
    /*username de alumno*/
  $("#username2").on("focusout", function(){
  	username = $("#username2").val();
  	$.post( "/register/ckusername",{username:username}, function( data ) {
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

  /* COMPROBACION CONTRASEÑA SEGURA */
  /*contraseña de userweb*/
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
    /*contraseña de alumno*/
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

  /* COMPROBACION CONTRASEÑA REPETIDA */
    /*contraseña de userweb*/
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
  /*contraseña de alumno*/
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

  /* REGISTRO USERWEB */

    $("#formulario1").submit(function(e)
    {
      e.preventDefault();
      email = $("#email").val();
      username = $("#username").val();
      pass = $.md5($("#paw").val());

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
      		$.post( "/register/insert",{email:email, pass:pass, username:username}, function( data ) {
            if(data==1)
            {
                window.location.href = "/login";
            }
            else
            {
            	//alert(data);
              alert("Error inesperado! T.T");
            }
        	});
      	}
      }
    });

  /* REGISTRO PRACTICAS */

    $("#formulario2").submit(function(e)
    {
      e.preventDefault();
      email2 = $("#email2").val();
      username2 = $("#username2").val();
      paw3 = $.md5($("#paw3").val());
      nombre = $("#nombre").val();
      apellidos = $("#apellidos").val();
      dni = $("#dni").val();
      direccion = $("#direccion").val();
      poblacion = $("#poblacion").val();
      telefono = $("#telefono").val();

      fmail = 0;
      fusername = 0;

      if(email != "" && username != "" && paw3 != "")
      {
      	c1 = $(".ce_error").text();
      	c2 = $(".cu_error").text();
      	c3 = $(".cr_error").text();
      	c4 = $(".crp_error").text();


      	if(c1 != 1 && c2 != 1 && c3 != 1 && c4 != 1)
      	{
      		$.post( "/register/insert_a",{email2:email2, paw3:paw3, username2:username2,nombre:nombre,apellidos:apellidos,dni:dni,direccion:direccion,telefono:telefono,poblacion:poblacion}, function( data ) {
              if(data==1)
              {
                  alert("Tu petición ha sido procesada, después de verificar tu aprobado te enviaremos un mail de confirmación");
                  window.location.href = "/login";
              }
              else
              {
                  alert("Error inesperado! T.T");
              }
          });
        }
      }
    });

    /* REGISTRO PRACTICAS */

      $("#formulario3").submit(function(e)
      {
        e.preventDefault();

        nombre = $("#nombre").val();
        apellidos = $("#apellidos").val();
        dni = $("#dni").val();
        direccion = $("#direccion").val();
        poblacion = $("#poblacion").val();
        telefono = $("#telefono").val();

        		$.post( "/register/insert_practica",{nombre:nombre,apellidos:apellidos,dni:dni,direccion:direccion,telefono:telefono,poblacion:poblacion}, function( data ) {

                if(data==1)
                {
                    alert("Tu petición ha sido procesada, después de verificar tu aprobado te enviaremos un mail de confirmación");
                    $.post("/login/logout");
                    window.location.href = "/login";
                }
                else
                {
                    alert("Error inesperado! T.T");
                }
            });
      });

    /* LOGIN */

    $("#formulario").submit(function(e)
    {
      e.preventDefault();
      email = $("#email").val();
      pass = $.md5($("#paw").val());
      $.post( "/login/ckuser",{email:email, pass:pass}, function( data ) {
        if(data==1)
        {
            window.location.href = "/";
        }
        else
        {
						$('#m_error').addClass('animated flash');
            $("#m_error").css("display", "inline");
        }
      });
    });

    /*Esconder los labels cuando se autorellenan*/
    $("body").hover(function(){

      $(".reg_input").each(function(){

        if( $(this).val() != "" )
        {
          $(this).siblings("label").hide();
        }
      })

    });


      /*Funcion que al clicar sube o baja dependiendo de donde estes */

      $('.flecha').on('click', function()
      {
        if(f_flecha == 0)
        {
            if ($(window).width() < 768) {
              largo = $("#corregir").offset().top;
              window.scrollTo(0,largo);
            }
            else{
              $('html,body').animate({
                scrollTop: $("#footer_text").offset().top
              }, 1000);
            }

            $(".flecha").css("-webkit-transform","rotate(0deg)");
            f_flecha=0;
        }
        else{

          if ($(window).width() < 768)
          {
            window.scrollTo(0,0);
          }
          else
          {
            $('html,body').animate({
              scrollTop: 0
            }, 1000);
          }

          $(".flecha").css("-webkit-transform","rotate(180deg)");
          f_flecha++;

        }

      });

      /*Cuando se hace scroll si esta arriba la flecha apunta hacia abajo y viceversa*/

      $(window).scroll(function() {

         if($(window).scrollTop() + $(window).height() == $(document).height()) {
           $(".flecha").css("-webkit-transform","rotate(180deg)");
           f_flecha++;
         }
         else if ($(window).scrollTop() < 10) {
           $(".flecha").css("-webkit-transform","rotate(0deg)");
           f_flecha=0;
         }

      });

    /*Cuando se hace un slide cambia el display none a flex*/
    $(".test_title").click(function(){

      $(this).siblings(".test_list_container").slideToggle(function()
      {
          if ($(this).css('display') == 'block') $(this).css('display', 'flex'); // enter desired display type
      });

    });

    /*Cuando se hace un slide cambia el display none a flex*/
    $(".crear_title").click(function(){

      $(this).siblings("form").slideToggle(function()
      {
          if ($(this).css('display') == 'block') $(this).css('display', 'flex'); // enter desired display type
      });

    });

  /* TEST */

  $("#corregir").on("click", function(){

    contestadas = 0;
    fcontestadas = 0;

    for(i=1;i<31 && fcontestadas == 0;i++)
    {
      if($("input[name=r"+i+"]").is(':checked'))
      {
        contestadas ++;
      }
      else
      {
        alert("Falta por contestar la pregunta "+i);

        $('html,body').animate({
          scrollTop: $("#pregunta_"+i).offset().top
        }, 1000);
        $("#pregunta_"+i).parent("form").parent('section').css('background-color','rgba(0,0,0,0.1)');
        fcontestadas = 1;
      }
    }

    if(contestadas == 30)
    {
      total = 0;

      for(i=1;i<31;i++)
      {
        val = $("input[name=r"+i+"]:checked").val();
        if(val == "c")
        {
          total++;
          $("input[name=r"+i+"]:checked").siblings("label").css("color","green");
        }
        else
        {
          $("input[name=r"+i+"][value=c]").siblings("label").css("color","green");
          $("input[name=r"+i+"]:checked").siblings("label").css("color","red");
        }


      }

      if(total>=27)
      {
        $("#aciertos").text(total+" aciertos, ¡aprobaste! :)");
        $("#container_aciertos").css("display","flex");
        $("#container_aciertos").css("border","10px solid green");
      }
      else{
        $("#aciertos").text(total+" aciertos, suspendiste :(");
        $("#container_aciertos").css("display","flex");
        $("#container_aciertos").css("border","10px solid red");
      }

      $("#corregir").css("display","none");

      //AJAX + CONTROLADOR GUARDAR ACIERTOS + MODELO INSERTAR

      aciertos = total;
      id = $("#id_test").text();
      $.post("/teorico/setAciertos",{aciertos:aciertos, id:id}, function(data){
        if(data==1)
        {
            alert("has tenido "+aciertos+" aciertos");
        }
        else
        {
						alert("error");
        }
      });

    }

  });

/* CREAR TEST */

/*funcion que comprueba si el nombre del test existe*/

$("#nombre").focusout(function(){
  test = $("#nombre").val();
  $.post( "/teorico/ckTest",{test:test}, function( data ) {
      if(data==1)
              {
                  alert("Ese test ya existe");
              }
  });
});

/*enviamos el formulario con las preguntas del test para crearlo*/

$("#test").submit(function(e){
  e.preventDefault();
  test = $("#test").val();
  preguntas=new Array;
  tpreguntas = 0;
  $('select').each(function(i){
    if($(this).val()!="")
    {
      preguntas[i]=$(this).val();
      tpreguntas ++;
    }
    //console.log(tpreguntas);
  });
  test = $("#nombre").val();
  cat = $("#cat").val();
  if(tpreguntas == 31)
  {
    if(test!="" && cat!="")
    {
      var pre=JSON.stringify(preguntas);
      $.post( "/teorico/crearTest",{test:test,cat:cat,pre:pre}, function( data ) {
          alert("¡Test creado correctamente!");
          window.location.href = "/teorico";
        });

    }
    else
    {
      alert("Nombre o categoria vacio!!!");
    }

  }
  else
  {
    alert("Faltan preguntas por asignar");
  }
});

/* funcion para crear preguntas por separado */

$("#pregunta").submit(function(e){
  e.preventDefault();
  $.post( "/teorico/crearP",$("#pregunta").serialize(), function( data ) {
      alert("¡Pregunta creada correctamente!");
      $("#pre").val("");
      $("#c").val("");
      $("#i1").val("");
      $("#i2").val("");
  });
});

/* CONCEPTOS TIENDA */

  numero_conceptos();
  /*Cuando le das a comprar se registra un nuevo concepto*/
  $(".comprar").on('click',function(){
    producto = $(this).siblings('.id').text();
    cantidad = 1;
    precio = $(this).siblings('.precio').text();
    $.post( "/tienda/generar_concepto",{producto:producto,cantidad:cantidad,precio:precio});
    numero_conceptos();
  });

  /* Cuando un userweb pulsa comprar lo redirigimos a users ya que solo pueden comprar los alumnos*/

  $(".comprar_userw").on('click', function(){
    window.location.href = "/users";
  });

  /*Recoge el numero de conceptos*/
  function numero_conceptos()
  {
    $.post( "/tienda/num_conceptos", function( data ) {
      if(data>0)
      {
        $(".num_c").text(data);
        $(".num_c").show();
      }

    });
  }

  /* CARRITO */
  /*Borra el concepto*/
  $(".borrar").on("click", function(){
    cocnepto = $(this).find('.id_2').text();
    $.post( "/tienda/borrar_concepto",{cocnepto:cocnepto}, function( data ) {
      window.location.href = "/tienda/carrito";
    });
  });
  /*Cambia la cantidad y el precio*/
  $(".precio").on('change',function(){
    producto = $(this).siblings('.producto').text();
    cantidad = $(this).val();
    $.post( "/tienda/modificar_concepto",{producto:producto,cantidad:cantidad}, function( data ) {
      location.reload(true);
    });
  })
  /*Si no hay conceptos no mostramos el proceso de compra*/
  if($("#total").text()==0)
  {
    $("#comprar").hide();
    $("#pago_tarjeta").hide();
    $("#tramitar_pedido").hide();
  }
  /*Cuando le damos a comprar, comprobamos que los datos de la targeta son correctos y si son correctos creamos la compra y modificamos los conceptos*/
  $("#comprar").on('click', function(){

    numero = $("#number").val();
    nombre = $("#name").val();
    exp = $("#expiry").val();
    f_tarjeta = 0;

    var fecha = exp.split("/");

    ccv = $("#ccv").val();

    //alert(nombre+" "+numero+" "+fecha[0]+" "+fecha[1]+" "+ccv);

    if(nombre =="")
    {
      alert("Falta por poner el nombre");
      f_tarjeta = -1;
    }
    else if(numero == "" || numero.length < 16)
    {
      alert("El numero es incorrecto");
      f_tarjeta = -1;
    }
    else if(fecha[0] == "" || fecha[0] > 12 || fecha[0] < 1)
    {
      alert("El mes es incorrecto");
      f_tarjeta = -1;
    }
    else if(fecha[1] == "" || fecha[1] > 22 || fecha[1] < 12)
    {
      alert("El año es incorrecto");
      f_tarjeta = -1;
    }
    else if(ccv == "" || ccv.length < 3)
    {
      alert("El ccv es incorrecto");
      f_tarjeta = -1;
    }


    if(f_tarjeta == 0)
    {

      total = $("#total").text();



      $.post("/tienda/crear_compra",{total:total}, function( data ) {
        window.location.href = "/tienda";
        //alert(data);
      });

      $('.concepto').each(function(){
        concepto = $(this).find('.id').text();
        $.post( "/tienda/asignar_conceptos",{concepto:concepto}, function( data ) {
          //alert(data);
          window.location.href = "/tienda";
        });
      });

    }

  });

/*Al darle a tramitar mostramos el formulario de pago y ocultamos el resto*/
$("#tramitar_pedido").on("click", function(){
  $("#tramitar_pedido").hide();
  $(".concepto_total").hide();
  $(".concepto").hide();
  $(".carrito_pago").show();
});

/* VENTANA PRODUCTO */

/*función para comprar */

$(".comprar").on('click',function(){
  producto = $(this).siblings('.id').text();
  cantidad = $(this).siblings('input').val();
  precio = $(this).siblings('.precio').text();

  $.post( "/tienda/generar_concepto",{producto:producto,cantidad:cantidad,precio:precio}, function( data ) {
    //alert(data);
    window.location.href = "/tienda/carrito";
  });

})

/* VENTANA USERS */

/* botón que aparece junto a las prácticas por realizar para marcarlas como realizadas */

$(".m_h").on('click', function(){
  practica = $(this).find('span').text();
  $.post("/users/marcar_practica", {practica:practica}, function(data){
    window.location.reload();
  });

});

/* USUARIO */

$('#user_change_password').on('click', function(){

  if(f_click == 0)
  {
      $('#user_password').css('display','flex');
      f_click++;
  }
  else{
    $('#user_password').css('display','none');
    f_click=0;
  }

});

$('#reg_practico').on('click', function(){
    window.location='/register/practica';
});

/* JQUERY SCRIPT DE ESTILO DEL TEST (NO FUNCIONABA FUERA) */

if( document.createElement('svg').getAttributeNS ) {

    var checkbxsCross = Array.prototype.slice.call( document.querySelectorAll( 'form.ac-cross input[type="checkbox"]' ) ),
    	radiobxsFill = Array.prototype.slice.call( document.querySelectorAll( 'form.ac-fill input[type="radio"]' ) ),
    	checkbxsCheckmark = Array.prototype.slice.call( document.querySelectorAll( 'form.ac-checkmark input[type="checkbox"]' ) ),
    	radiobxsCircle = Array.prototype.slice.call( document.querySelectorAll( 'form.ac-circle input[type="radio"]' ) ),
    	checkbxsBoxfill = Array.prototype.slice.call( document.querySelectorAll( 'form.ac-boxfill input[type="checkbox"]' ) ),
    	radiobxsSwirl = Array.prototype.slice.call( document.querySelectorAll( 'form.ac-swirl input[type="radio"]' ) ),
    	checkbxsDiagonal = Array.prototype.slice.call( document.querySelectorAll( 'form.ac-diagonal input[type="checkbox"]' ) ),
    	checkbxsList = Array.prototype.slice.call( document.querySelectorAll( 'form.ac-list input[type="checkbox"]' ) ),
    	pathDefs = {
    		cross : ['M 10 10 L 90 90','M 90 10 L 10 90'],
    		fill : ['M15.833,24.334c2.179-0.443,4.766-3.995,6.545-5.359 c1.76-1.35,4.144-3.732,6.256-4.339c-3.983,3.844-6.504,9.556-10.047,13.827c-2.325,2.802-5.387,6.153-6.068,9.866 c2.081-0.474,4.484-2.502,6.425-3.488c5.708-2.897,11.316-6.804,16.608-10.418c4.812-3.287,11.13-7.53,13.935-12.905 c-0.759,3.059-3.364,6.421-4.943,9.203c-2.728,4.806-6.064,8.417-9.781,12.446c-6.895,7.477-15.107,14.109-20.779,22.608 c3.515-0.784,7.103-2.996,10.263-4.628c6.455-3.335,12.235-8.381,17.684-13.15c5.495-4.81,10.848-9.68,15.866-14.988 c1.905-2.016,4.178-4.42,5.556-6.838c0.051,1.256-0.604,2.542-1.03,3.672c-1.424,3.767-3.011,7.432-4.723,11.076 c-2.772,5.904-6.312,11.342-9.921,16.763c-3.167,4.757-7.082,8.94-10.854,13.205c-2.456,2.777-4.876,5.977-7.627,8.448 c9.341-7.52,18.965-14.629,27.924-22.656c4.995-4.474,9.557-9.075,13.586-14.446c1.443-1.924,2.427-4.939,3.74-6.56 c-0.446,3.322-2.183,6.878-3.312,10.032c-2.261,6.309-5.352,12.53-8.418,18.482c-3.46,6.719-8.134,12.698-11.954,19.203 c-0.725,1.234-1.833,2.451-2.265,3.77c2.347-0.48,4.812-3.199,7.028-4.286c4.144-2.033,7.787-4.938,11.184-8.072 c3.142-2.9,5.344-6.758,7.925-10.141c1.483-1.944,3.306-4.056,4.341-6.283c0.041,1.102-0.507,2.345-0.876,3.388 c-1.456,4.114-3.369,8.184-5.059,12.212c-1.503,3.583-3.421,7.001-5.277,10.411c-0.967,1.775-2.471,3.528-3.287,5.298 c2.49-1.163,5.229-3.906,7.212-5.828c2.094-2.028,5.027-4.716,6.33-7.335c-0.256,1.47-2.07,3.577-3.02,4.809'],
    		checkmark : ['M16.667,62.167c3.109,5.55,7.217,10.591,10.926,15.75 c2.614,3.636,5.149,7.519,8.161,10.853c-0.046-0.051,1.959,2.414,2.692,2.343c0.895-0.088,6.958-8.511,6.014-7.3 c5.997-7.695,11.68-15.463,16.931-23.696c6.393-10.025,12.235-20.373,18.104-30.707C82.004,24.988,84.802,20.601,87,16'],
    		circle : ['M34.745,7.183C25.078,12.703,13.516,26.359,8.797,37.13 c-13.652,31.134,9.219,54.785,34.77,55.99c15.826,0.742,31.804-2.607,42.207-17.52c6.641-9.52,12.918-27.789,7.396-39.713 C85.873,20.155,69.828-5.347,41.802,13.379'],
    		boxfill : ['M6.987,4.774c15.308,2.213,30.731,1.398,46.101,1.398 c9.74,0,19.484,0.084,29.225,0.001c2.152-0.018,4.358-0.626,6.229,1.201c-5.443,1.284-10.857,2.58-16.398,2.524 c-9.586-0.096-18.983,2.331-28.597,2.326c-7.43-0.003-14.988-0.423-22.364,1.041c-4.099,0.811-7.216,3.958-10.759,6.81 c8.981-0.104,17.952,1.972,26.97,1.94c8.365-0.029,16.557-1.168,24.872-1.847c2.436-0.2,24.209-4.854,24.632,2.223 c-14.265,5.396-29.483,0.959-43.871,0.525c-12.163-0.368-24.866,2.739-36.677,6.863c14.93,4.236,30.265,2.061,45.365,2.425 c7.82,0.187,15.486,1.928,23.337,1.903c2.602-0.008,6.644-0.984,9,0.468c-2.584,1.794-8.164,0.984-10.809,1.165 c-13.329,0.899-26.632,2.315-39.939,3.953c-6.761,0.834-13.413,0.95-20.204,0.938c-1.429-0.001-2.938-0.155-4.142,0.436 c5.065,4.68,15.128,2.853,20.742,2.904c11.342,0.104,22.689-0.081,34.035-0.081c9.067,0,20.104-2.412,29.014,0.643 c-4.061,4.239-12.383,3.389-17.056,4.292c-11.054,2.132-21.575,5.041-32.725,5.289c-5.591,0.124-11.278,1.001-16.824,2.088 c-4.515,0.885-9.461,0.823-13.881,2.301c2.302,3.186,7.315,2.59,10.13,2.694c15.753,0.588,31.413-0.231,47.097-2.172 c7.904-0.979,15.06,1.748,22.549,4.877c-12.278,4.992-25.996,4.737-38.58,5.989c-8.467,0.839-16.773,1.041-25.267,0.984 c-4.727-0.031-10.214-0.851-14.782,1.551c12.157,4.923,26.295,2.283,38.739,2.182c7.176-0.06,14.323,1.151,21.326,3.07 c-2.391,2.98-7.512,3.388-10.368,4.143c-8.208,2.165-16.487,3.686-24.71,5.709c-6.854,1.685-13.604,3.616-20.507,4.714 c-1.707,0.273-3.337,0.483-4.923,1.366c2.023,0.749,3.73,0.558,5.95,0.597c9.749,0.165,19.555,0.31,29.304-0.027 c15.334-0.528,30.422-4.721,45.782-4.653'],
    		swirl : ['M49.346,46.341c-3.79-2.005,3.698-10.294,7.984-8.89 c8.713,2.852,4.352,20.922-4.901,20.269c-4.684-0.33-12.616-7.405-14.38-11.818c-2.375-5.938,7.208-11.688,11.624-13.837 c9.078-4.42,18.403-3.503,22.784,6.651c4.049,9.378,6.206,28.09-1.462,36.276c-7.091,7.567-24.673,2.277-32.357-1.079 c-11.474-5.01-24.54-19.124-21.738-32.758c3.958-19.263,28.856-28.248,46.044-23.244c20.693,6.025,22.012,36.268,16.246,52.826 c-5.267,15.118-17.03,26.26-33.603,21.938c-11.054-2.883-20.984-10.949-28.809-18.908C9.236,66.096,2.704,57.597,6.01,46.371 c3.059-10.385,12.719-20.155,20.892-26.604C40.809,8.788,58.615,1.851,75.058,12.031c9.289,5.749,16.787,16.361,18.284,27.262 c0.643,4.698,0.646,10.775-3.811,13.746'],
    		diagonal : ['M16.053,91.059c0.435,0,0.739-0.256,0.914-0.768 c3.101-2.85,5.914-6.734,8.655-9.865C41.371,62.438,56.817,44.11,70.826,24.721c3.729-5.16,6.914-10.603,10.475-15.835 c0.389-0.572,0.785-1.131,1.377-1.521'],
    		list : ['M1.986,8.91c41.704,4.081,83.952,5.822,125.737,2.867 c17.086-1.208,34.157-0.601,51.257-0.778c21.354-0.223,42.706-1.024,64.056-1.33c18.188-0.261,36.436,0.571,54.609,0.571','M3.954,25.923c9.888,0.045,19.725-0.905,29.602-1.432 c16.87-0.897,33.825-0.171,50.658-2.273c14.924-1.866,29.906-1.407,44.874-1.936c19.9-0.705,39.692-0.887,59.586,0.45 c35.896,2.407,71.665-1.062,107.539-1.188']
    	},
    	animDefs = {
    		cross : { speed : .2, easing : 'ease-in-out' },
    		fill : { speed : .8, easing : 'ease-in-out' },
    		checkmark : { speed : .2, easing : 'ease-in-out' },
    		circle : { speed : .2, easing : 'ease-in-out' },
    		boxfill : { speed : .8, easing : 'ease-in' },
    		swirl : { speed : .8, easing : 'ease-in' },
    		diagonal : { speed : .2, easing : 'ease-in-out' },
    		list : { speed : .3, easing : 'ease-in-out' }
    	};

    function createSVGEl( def ) {
    	var svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    	if( def ) {
    		svg.setAttributeNS( null, 'viewBox', def.viewBox );
    		svg.setAttributeNS( null, 'preserveAspectRatio', def.preserveAspectRatio );
    	}
    	else {
    		svg.setAttributeNS( null, 'viewBox', '0 0 100 100' );
    	}
    	svg.setAttribute( 'xmlns', 'http://www.w3.org/2000/svg' );
    	return svg;
    }

    function controlCheckbox( el, type, svgDef ) {
    	var svg = createSVGEl( svgDef );
    	el.parentNode.appendChild( svg );

    	el.addEventListener( 'change', function() {
    		if( el.checked ) {
    			draw( el, type );
    		}
    		else {
    			reset( el );
    		}
    	} );
    }

    function controlRadiobox( el, type ) {
    	var svg = createSVGEl();
    	el.parentNode.appendChild( svg );
    	el.addEventListener( 'change', function() {
    		resetRadio( el );
    		draw( el, type );
    	} );
    }

    checkbxsCross.forEach( function( el, i ) { controlCheckbox( el, 'cross' ); } );
    radiobxsFill.forEach( function( el, i ) { controlRadiobox( el, 'fill' ); } );
    checkbxsCheckmark.forEach( function( el, i ) { controlCheckbox( el, 'checkmark' ); } );
    radiobxsCircle.forEach( function( el, i ) { controlRadiobox( el, 'circle' ); } );
    checkbxsBoxfill.forEach( function( el, i ) { controlCheckbox( el, 'boxfill' ); } );
    radiobxsSwirl.forEach( function( el, i ) { controlRadiobox( el, 'swirl' ); } );
    checkbxsDiagonal.forEach( function( el, i ) { controlCheckbox( el, 'diagonal' ); } );
    checkbxsList.forEach( function( el ) { controlCheckbox( el, 'list', { viewBox : '0 0 300 100', preserveAspectRatio : 'none' } ); } );

    function draw( el, type ) {
    	var paths = [], pathDef,
    		animDef,
    		svg = el.parentNode.querySelector( 'svg' );

    	switch( type ) {
    		case 'cross': pathDef = pathDefs.cross; animDef = animDefs.cross; break;
    		case 'fill': pathDef = pathDefs.fill; animDef = animDefs.fill; break;
    		case 'checkmark': pathDef = pathDefs.checkmark; animDef = animDefs.checkmark; break;
    		case 'circle': pathDef = pathDefs.circle; animDef = animDefs.circle; break;
    		case 'boxfill': pathDef = pathDefs.boxfill; animDef = animDefs.boxfill; break;
    		case 'swirl': pathDef = pathDefs.swirl; animDef = animDefs.swirl; break;
    		case 'diagonal': pathDef = pathDefs.diagonal; animDef = animDefs.diagonal; break;
    		case 'list': pathDef = pathDefs.list; animDef = animDefs.list; break;
    	};

    	paths.push( document.createElementNS('http://www.w3.org/2000/svg', 'path' ) );

    	if( type === 'cross' || type === 'list' ) {
    		paths.push( document.createElementNS('http://www.w3.org/2000/svg', 'path' ) );
    	}

    	for( var i = 0, len = paths.length; i < len; ++i ) {
    		var path = paths[i];
    		svg.appendChild( path );

    		path.setAttributeNS( null, 'd', pathDef[i] );

    		var length = path.getTotalLength();
    		// Clear any previous transition
    		//path.style.transition = path.style.WebkitTransition = path.style.MozTransition = 'none';
    		// Set up the starting positions
    		path.style.strokeDasharray = length + ' ' + length;
    		if( i === 0 ) {
    			path.style.strokeDashoffset = Math.floor( length ) - 1;
    		}
    		else path.style.strokeDashoffset = length;
    		// Trigger a layout so styles are calculated & the browser
    		// picks up the starting position before animating
    		path.getBoundingClientRect();
    		// Define our transition
    		path.style.transition = path.style.WebkitTransition = path.style.MozTransition  = 'stroke-dashoffset ' + animDef.speed + 's ' + animDef.easing + ' ' + i * animDef.speed + 's';
    		// Go!
    		path.style.strokeDashoffset = '0';
    	}
    }

    function reset( el ) {
    	Array.prototype.slice.call( el.parentNode.querySelectorAll( 'svg > path' ) ).forEach( function( el ) { el.parentNode.removeChild( el ); } );
    }

    function resetRadio( el ) {
    	Array.prototype.slice.call( document.querySelectorAll( 'input[type="radio"][name="' + el.getAttribute( 'name' ) + '"]' ) ).forEach( function( el ) {
    		var path = el.parentNode.querySelector( 'svg > path' );
    		if( path ) {
    			path.parentNode.removeChild( path );
    		}
    	} );
    }

    }

  });
