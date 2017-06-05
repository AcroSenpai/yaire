$(document).ready(function(){

  var id_col = 0;
  var dias = new Array('domingo','lunes','martes','miercoles','jueves','viernes','sabado');
  var meses = new Array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
  var mes ="";
  var año ="";
  var total ="";
  var f_mes = 0;
  var f_flecha = 0;
  var f_mostrar_flecha = 0;
  var f_practica = 0;
  Now = new Date();
  var f = Now.getDate() + "/" + eval(Now.getMonth()+1)+"/"+Now.getFullYear();
   /*cargamos las zonas*/
  cargar_zonas(f);


  $('#my-element').datepicker();
  $('#my-element').data('datepicker');

  $('.datepicker-here').on('click', function(){});
  /*cuando clicas en un dia del canlendario llama a calcular semana y a generar calendario*/


  $('.datepickers-container').on('click',function(){
    $('.datepicker-here').val(calcular_semana($('.datepicker-here').val()));
    generar_cal();

  });

  /*funcion que recoge el dia seleccionado y saca los numeros de la semana,
    contando cuando cambia de mes y lo muestra en el input.*/
  function calcular_semana(fecha)
  {
    if(fecha != "" && fecha != $('#respaldo').text())
    {
      campos = fecha.split('/');
      año =campos[2];
      mes = campos[1];
      date = new Date(campos[2],campos[1]-1,campos[0]);
      dia_actual = date.getDay()

      dia_def_i = dia_actual - 1;
      dia_def_f = 5 - dia_actual;

      diainicio = campos[0]-dia_def_i;
      diafin = eval(campos[0])+dia_def_f;
      meses[campos[1]/1-1];



      if(diainicio < 1)
      {
        diainicio = eval(meses[campos[1]/1-2]) + diainicio;
      }

      if(diainicio == 0)
      {
        diainicio++;
      }

      if(diafin == 0)
      {
        diafin = meses[campos[1]/1-2];
      }


      if(diafin > meses[campos[1]/1-1])
      {
        diafin = diafin - meses[campos[1]/1-1];
      }

      semana = diainicio+"-"+diafin;
      $('#respaldo').text(semana);

      return semana;
    }
    else
    {
      return $('#respaldo').text();
    }
  }
    /*Funcion que generar la primera fila de la tabla y llama al php por el restro*/

  function generar_cal()
  {
    dia = $('.datepicker-here').val();
    var dias = new Array('domingo','lunes','martes','miercoles','jueves','viernes','sabado');

    if(dia!="")
    {
      numeros = dia.split('-');
      $("#mapa tr").remove();
      for(i=0;i<4;i++)
      {
        numeros[i+1] = eval(numeros[i])+1;

        if( numeros[i+1] > meses[mes-1])
        {
          numeros[i+1] = numeros[i+1] - meses[mes-1];
          f_mes = 1;
        }

      }

      primera_fila = "<tr class='table_top'><td class='vacia'></td>";
      for(i=0;i<5;i++)
      {
        primera_fila += "<td class='top dia_"+i+"'> <input type='button' value='<' class='h_button' id='izq'> "+dias[i+1]+" "+numeros[i]+" <input type='button' value='>' class='h_button' id='der'>  </td>";
      }

      $("#mapa").append(primera_fila);
      zona = $("#zona").val();
      $.post("/practico/crear_tabla_horario", {num1:numeros[0],zona:zona,mes:mes,año:año}, function(data){
        $("#mapa").append(data);
        ocultar_columnas();
      });

    }
  }
    /*Cuando cambias de zona vuelve a cargar la tabla*/
  $('select#zona').on('change',function(){
    $('.datepicker-here').val(calcular_semana($('.datepicker-here').val()));
    generar_cal();
  });

  /*Cuando le das ha un boton de practica y genera una entrada en el resumen*/
  $("body").on('click','.horario', function(){

    zona= $("#zona option:selected").text();
    zona_id = $("#zona").val();
    fecha = $(this).siblings("span").text();
    fecha = fecha.split(' ');
    dia = fecha[0];
    hora= fecha[1];
    importe = 1;
    total = eval(total + importe);

    mes_1 = mes;

    if(dia < 5 && f_mes == 1 && mes_1 != 12)
    {
      mes_1 = eval(mes_1)+1;
    }
    else if( dia < 5 && f_mes == 1 && mes_1 == 12 )
    {
      mes_1 = 1;
      año = eval(año)+1;
    }

      mes_1 = pad(mes_1,2);

    $(this).remove();
    fecha = año+"-"+mes_1+"-"+dia;

    $(".total").remove();

    row = "<tr class='result '><td class='fecha'>"+fecha+"</td><td class='hora'>"+hora+"</td></td><td class='zona'>"+zona+"<span style='display:none;'>"+zona_id+"</span></td><td class='br'>Borrar</td></tr>";
    $(".total_wrapper").addClass('animated zoomInLeft');
    $(".total_wrapper").css("display","flex");

    if ($('body').width() < 1220) {

      $(".flecha").show();

      $(".horarios_wrapper").css("margin-bottom","0px");
      $(".total_wrapper").css('margin-top','0px');
      $(".total_wrapper").css('margin-bottom','80px');

    }

    f_practica++;
    f_mostrar_flecha = 1;
    $("#resultado").append(row);


  });

  /*funcion para añadir ceros a la izquierda si el numero es inferior a 10*/
  function pad (str, max)
  {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
  }

  $("#borrar").on('click', function()
  {
    $(".result").each(function(){

      fecha = $(this).find(".fecha").text();
      fecha= fecha.split("-");
      hora = $(this).find(".hora").text();
      hora = hora.replace(':00', '');
      boton = "<button class='horario'>Marcar</button>";
      clase = fecha[2]+"-"+hora;
      $("."+clase).append(boton);
      $(".total_wrapper").css("display","none");
      $(".flecha").hide();
      f_mostrar_flecha = 0;
      f_practica = 0;
      $(".horarios_wrapper").css("margin-bottom","80px");
      $(".total_wrapper").css('margin-top','55px');
      $(".total_wrapper").css('margin-bottom','0px');

    });

    $(".result").remove();
  });

  /*Funcion que borra una entrada del resumen*/
  $("body").on('click','.br', function()
  {
    fecha = $(this).siblings(".fecha").text();
    fecha= fecha.split("-");
    hora = $(this).siblings(".hora").text();
    hora = hora.replace(':00', '');
    boton = "<button class='horario'>Marcar</button>";
    clase = fecha[2]+"-"+hora;
    $("."+clase).append(boton);
    $(".total").remove();
    $(this).parent('tr').remove();

    f_practica--;

    if(f_practica==0)
    {
      $('.total_wrapper').hide();

      $(".horarios_wrapper").css("margin-bottom","80px");
      $(".total_wrapper").css('margin-top','55px');
      $(".total_wrapper").css('margin-bottom','0px');

      $('.flecha').hide();
    }

  });
  /*funcion que carga las zonas pasandole una fecha*/
  function cargar_zonas(f)
  {
    $.post("/practico/cargar_zonas_h", function(data){
        $("#zona").append(data);
        $('.datepicker-here').val(calcular_semana(f));
          generar_cal();
    });

  }
  /*Funcion que guarda las practicas*/
  $("#guardar").on('click', function()
  {

    $(".result").each(function(){

      fecha = $(this).find(".fecha").text();
      hora = $(this).find(".hora").text();
      hora = hora.replace(':00', '');
      zona = $(this).find(".zona").find("span").text();

      $.post("/practico/guardar_horario", {fecha:fecha,hora:hora,zona:zona}, function(data){
          window.location.href = "/users";

      });

    });

  });
    /*cuando se cambia el tamaño del navegador llamamos a ocultar_columnas*/

  $(window).on('resize', function() {

      ocultar_columnas();

      if ($('body').width() > 1200 && f_mostrar_flecha == 1)
      {
        $(".flecha").hide();

      }

      if ( $('body').width() < 1200 && f_mostrar_flecha ==  1)
      {
        $(".flecha").show();

      }

  });

    /*Funcion que cambia de dia al de la izquierda*/

  $('body').on('click','#izq', function()
  {

    //alert(id_col);
    $(".dia_"+id_col).hide();

    id_col = id_col - 1;

    $(".dia_"+id_col).show();
    $(".table_top .dia_"+id_col).attr('colspan','2');
    mostrar_botones_columnas(id_col);

  });
    /*Funcion que cambia de dia al de la derecha*/

  $('body').on('click','#der', function()
  {
    //alert(id_col);
    $(".dia_"+id_col).hide();

      id_col = id_col + 1;

    $(".dia_"+id_col).show();
    $(".table_top .dia_"+id_col).attr('colspan','2');
    mostrar_botones_columnas(id_col);

  });

  /*Funcion que al clicar sube o baja dependiendo de donde estes */

  $('.flecha').on('click', function()
  {
    if(f_flecha == 0)
    {
        if ($(window).width() < 768) {
          largo = $(window).scrollTop() + $(window).height();
          window.scrollTo(0,largo);
        }
        else{
          $('html,body').animate({
            scrollTop: $(window).scrollTop() + $(window).height()
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

  /*Funcion que si la pantalla es inferior hace que se cambie la tabla y unicamente se vea un dia*/

  function ocultar_columnas()
  {
      if ($(window).width() < 768) {

        date_day = $('.datepicker--cell.-selected-').attr('data-date');
        //si hemos seleccionado un día este elemento nos devolverá cual es

        if(! date_day) //si no hemos seleccionado ningún día obtendremos el día de la fecha actual
        {
          date_day= $('.datepicker--cell.-current-').attr('data-date');
        }

        sem = $('.datepicker-here').val();
        dias = sem.split('-');

        delante = dias[0]-date_day;
        id_col = +-delante;

        if( id_col>4 || id_col<1 ) id_col=4;
        //alert(id_col);

        $('.horarios_wrapper .table_wrapper').css('width','300px');
        $('.vacia').hide();
        $(".table_top .dia_"+id_col).attr('colspan','2');
        //result = $(".table_top .dia_"+id_col).text();
        //$(".table_top .dia_"+id_col).text(" ");

        mostrar_botones_columnas(id_col);

        for(i = 0;i<5;i++)
        {
          if(i != id_col)
          {
            $(".dia_"+i).hide();
          }

        }

      }

      else{

        for(i = 0;i<5;i++)
        {
            $(".dia_"+i).show();
            $('.horarios_wrapper .table_wrapper').css('width','770px');
            $('.h_button').hide();
        }

        $('.vacia').show();
        $(".table_top .dia_"+id_col).attr('colspan','1');

      }

  }
  /*Funcion que muestra las flechas para cambiar de dia*/

  function mostrar_botones_columnas(id_col)
  {
    switch (id_col) {

      case 0:
          $(".table_top .dia_"+id_col).children('#der').css('display','inline');
          break;

      case 4:
          $(".table_top .dia_"+id_col).children('#izq').css('display','inline');
          break;

      default:
          $(".table_top .dia_"+id_col).children('#izq').css('display','inline');
          $(".table_top .dia_"+id_col).children('#der').css('display','inline');

    }
  }

});
