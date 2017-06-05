<?php
   namespace X\App\Controllers;
   use X\Sys\Controller;

    /**
    * Description of practico
    *  Controlador que se encarga de mostrar la tabla con los horarios de los profesores disponibles si eres un alumno y la tabla de horarios disponibles si heres profesor
    *
    * @author aitor y olalla  
    */
   class Practico extends Controller{

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Practico'));
   			$this->model=new \X\App\Models\mPractico();
   			$this->view =new \X\App\Views\vPractico($this->dataView,$this->dataTable);
        $this->view2 =new \X\App\Views\vHorarios($this->dataView,$this->dataTable);
      }

      /**
      *
      * home: funcion que se llama al entrar a practico, donde recogemos los profesores y se los pasamos a la vista.
      *
      */
      
   		function home()
      {
          $data=$this->model->getProfes();
          $this->addData($data);
          //rebuilding with new data
          $this->view->__construct($this->dataView,$this->dataTable);
          $this->view->show();
   		}

      /**
      *
      * crear_tabla: funcion que genera la tabla de los alumnos.
      *
      */

      function crear_tabla()
      {
        //Array para saber cuantos dias tienen los meses
        $meses = array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
        $cambio_mes = 0;
        //Recogemos los datos
        $num1 = filter_input(INPUT_POST, 'num1');
        $profe = filter_input(INPUT_POST, 'profe');
        $zona = filter_input(INPUT_POST, 'zona');
        $mes = filter_input(INPUT_POST, 'mes');
        $año = filter_input(INPUT_POST, 'año');

        //Recogemos los horarios del profesor y la zona seleccionados
        $h_profe=$this->model->get_h_profe($profe, $zona);
        $numeros[5]="";
        $numeros[0]=$num1;
        //Sacamos los cinco numeros de la semana
        for($i=0;$i<5;$i++)
        {
          $numeros[$i+1] = $numeros[$i]+1;
          //si el numero es superior al dia maximo del mes entonces le restamos el dia maximo y reseteamos los dias
          if( $numeros[$i+1] > $meses[$mes-1])
          {
            $numeros[$i+1] = $numeros[$i+1] - $meses[$mes-1];
            //marcamos que cambiamos de mes
            $cambio_mes = 1;
          }

        }
        $total = "";
            //bucle para crear los tr de las horas
            for($i=8;$i<21;$i++)
            {
              //Quitamos las horas de comer
              if($i!=14 && $i!=15)
              {
                //generamos el primer td con la hora
                $total.="<tr><td>".$i.":00-".($i+1).":00</td>";
                //bucle para sacar el resto de td
                for($k=0;$k<5;$k++)
                {
                  $total .= "<td class='$numeros[$k]-$i dia_$k'>";
                    //foreach de horarios para comprobar si coincide con la fecha y tenemos que printar un boton
                    foreach ($h_profe as $hora)
                    {
                      //creamos otra variable de mes para no modificar la global
                      $mes_1 = $mes;
                      //Preguntas para saber si hay que modificar el mes, ya sea sumar o cambiar a 1
                      if($cambio_mes == 1 && $mes_1 < 12 && $numeros[$k]<5)
                      {
                        $mes_1 = $mes_1+1;
                      }
                      else if( $cambio_mes == 1 && $mes_1 == 12 && $numeros[$k]<5)
                      {
                        $mes_1 = 1;
                        $año = $año+1;
                      }
                      //Añadimos un zero a la izquierda si es inferior a 10
                        $mes_1 = str_pad($mes_1, 2, "0", STR_PAD_LEFT);
                        $dia =  str_pad($numeros[$k], 2, "0", STR_PAD_LEFT);
                        //Montamos la fecha
                        $fecha = $año."-".$mes_1."-".$dia ;

                        //Preguntamos si la hora del tr es la misma que la del horario y lo mismo con la fecha
                      if($hora['hora']== $i && $hora['fecha'] == $fecha)
                      {
                        //Si coincide creamos el boton
                         $total.= "<button class='practica hvr-grow-shadow'>Marcar</button>";
                      }
                    }
                    //Le metemos un span oculto con los datos de dia y hora.
                  $total .="<span style='display:none'>".$numeros[$k]." ".$i.":00</span></td>";

                }
                $total.="</tr>";
              }
            }
            //Enviamos la tabla
         echo $total;
      }

      /**
      *
      * cargar_zonas: funcion que carga las zonas.
      *
      */

      function cargar_zonas()
      {
        $profe = filter_input(INPUT_POST, 'profe');
        $zonas=$this->model->get_zona_p($profe);
        $options="";
        //generamos los options de cada zona
        foreach ($zonas as $zona)
        {
          $options.="<option value='".$zona['id_zonas']."'>".utf8_encode($zona['nombre'])."</option>";
        }
        echo $options;
      }

      /**
      *
      * guardar_practicas: funcion que guarda la practica que se le pasa.
      *
      */

      function guardar_practicas()
      {
        $profe = filter_input(INPUT_POST, 'profe');
        $fecha = filter_input(INPUT_POST, 'fecha');
        $hora = filter_input(INPUT_POST, 'hora');
        $zona = filter_input(INPUT_POST, 'zona');
        $this->model->update_h($profe,$fecha,$hora);

        $alumno=$this->model->get_alumno($_SESSION['iduser']);
        $this->model->set_practica($profe,$fecha,$hora,$alumno[0]['id_alumnos'],$zona);
      }

      /**
      *
      * horarios: funcion que carga la tabla de los horarios de los profes en otra vista.
      *
      */

      function horarios()
      {
        $this->view2->__construct($this->dataView,$this->dataTable);
        $this->view2->show();
      }

      /**
      *
      * crear_tabla_horario: funcion que genera la tabla de los profesores.
      *
      */
      function crear_tabla_horario()
      {
        //El funcionamiento es el mismo que en crear_tabla, excepto que aqui no le pasamos el profesor
        $meses = array("31", "28", "31", "30", "31", "30", "31", "31", "30", "31", "30", "31");
        $cambio_mes = 0;

        $num1 = filter_input(INPUT_POST, 'num1');

        $profe=$this->model->get_profe($_SESSION['iduser']);
        $zona = filter_input(INPUT_POST, 'zona');
        $mes = filter_input(INPUT_POST, 'mes');
        $año = filter_input(INPUT_POST, 'año');

        $mes = str_pad($mes, 2, "0", STR_PAD_LEFT);
        $h_profe=$this->model->get_h_profe($profe[0]['id_profesores'], $zona);
        $numeros[5]="";
        $numeros[0]=$num1;
        for($i=0;$i<5;$i++)
        {

          $numeros[$i+1] = $numeros[$i]+1;

          if( $numeros[$i+1] > $meses[$mes-1])
          {
            $numeros[$i+1] = $numeros[$i+1] - $meses[$mes-1];
            $cambio_mes = 1;
          }

        }
        $total = "";
            for($i=8;$i<21;$i++)
            {
              if($i!=14 && $i!=15)
              {

                $total.="<tr><td>".$i.":00-".($i+1).":00</td>";
                for($k=0;$k<5;$k++)
                {
                  $total .= "<td class='$numeros[$k]-$i dia_$k'>";
                  $ano=str_pad($numeros[$k],2,"0",STR_PAD_LEFT);
                    //Si el horario del profe esta vacio printamos boton en todos los td
                    if(!empty($h_profe))
                    {
                      $cont = 0;
                      foreach ($h_profe as $hora)
                      {
                        $mes_1 = $mes;
                        if($cambio_mes == 1 && $mes_1 < 12 && $numeros[$k]<5)
                        {
                          $mes_1 = $mes_1+1;
                        }
                        else if( $cambio_mes == 1 && $mes_1 == 12 && $numeros[$k]<5)
                        {
                          $mes_1 = 1;
                          $año = $año+1;
                        }
                        $mes_1 = str_pad($mes_1, 2, "0", STR_PAD_LEFT);
                        $fecha = $año."-".$mes_1."-".$ano;

                        //Comprobamos si la hora y la fecha coincide y sumamos 1 al contador
                        if($hora['hora']==$i && $hora['fecha'] == $fecha)
                        {
                           $cont++;
                        }
                      }
                      //Si el cantador sigue en 0 printamos boton ya que significa que no ha sido marcada
                      if($cont ==0)
                      {
                        $total.= "<button class='horario hvr-grow-shadow'>Marcar</button>";
                      }
                    }
                    else
                    {
                      $total.= "<button class='horario hvr-grow-shadow'>Marcar</button>";
                    }
                  $total .="<span style='display:none'>".$numeros[$k]." ".$i.":00</span></td>";
                }
                $total.="</tr>";
              }
            }
         echo $total;
      }

      /**
      *
      * cargar_zonas_h: funcion que carga las zonas de la tabla de los profes.
      *
      */
      function cargar_zonas_h()
      {

        $profe=$this->model->get_profe($_SESSION['iduser']);
        $zonas=$this->model->get_zona_p($profe[0]['id_profesores']);
        $options="";
         //generamos los options de cada zona
        foreach ($zonas as $zona)
        {
          $options.="<option value='".$zona['id_zonas']."'>".utf8_encode($zona['nombre'])."</option>";
        }
        echo $options;
      }
      /**
      *
      * guardar_horario: funcion que guarda el horario que se le pasa.
      *
      */
      function guardar_horario()
      {
        $fecha = filter_input(INPUT_POST, 'fecha');
        $hora = filter_input(INPUT_POST, 'hora');
        $zona = filter_input(INPUT_POST, 'zona');

        $profe=$this->model->get_profe($_SESSION['iduser']);
        $this->model->set_horario($profe[0]['id_profesores'],$fecha,$hora,$zona);
        $this->model->delete_horario();

      }
   }
