<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;


   
   class Practico extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Practico'));
   			$this->model=new \X\App\Models\mPractico();
   			$this->view =new \X\App\Views\vPractico($this->dataView,$this->dataTable);
        $this->view2 =new \X\App\Views\vHorarios($this->dataView,$this->dataTable);    
                           
                        
                }


   		function home(){

                    $data=$this->model->getProfes();
                    $this->addData($data); 
                    //rebuilding with new data
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
           
   		}

      function crear_tabla()
      {
        $num1 = filter_input(INPUT_POST, 'num1');
        $profe = filter_input(INPUT_POST, 'profe');
        $zona = filter_input(INPUT_POST, 'zona');
        $mes = filter_input(INPUT_POST, 'mes');
        $año = filter_input(INPUT_POST, 'año');

      
        $mes = str_pad($mes, 2, "0", STR_PAD_LEFT);

        $h_profe=$this->model->get_h_profe($profe, $zona);

        $numeros[5]="";
        $numeros[0]=$num1;
        for($i=0;$i<5;$i++)
        {
          $numeros[$i+1] = $numeros[$i]+1;
        }
        $total = "";
            for($i=8;$i<21;$i++)
            {
              if($i!=14 && $i!=15)
              {
                $total.="<tr><td>".$i.":00-".($i+1).":00</td>";
                for($k=0;$k<5;$k++)
                {
                  $total .= "<td class='$numeros[$k]-$i'>";
                    
                    $fecha = $año."-".$mes."-".$numeros[$k];
                    foreach ($h_profe as $hora) 
                    {
                      
                      if($hora['hora']==$i && $hora['fecha'] == $fecha)
                      {
                         $total.= "<button class='practica'>Marcar</button>";
                      }
                    }

                  $total .="<span style='display:none'>".$numeros[$k]." ".$i.":00</span></td>";
                }
                $total.="</tr>";
              }
            }

         echo $total;
      }

      function cargar_zonas()
      {
        $profe = filter_input(INPUT_POST, 'profe');
        $zonas=$this->model->get_zona_p($profe);

        $options="";

        foreach ($zonas as $zona) 
        {

          $options.="<option value='".$zona['id_zonas']."'>".utf8_encode($zona['nombre'])."</option>";
        }

        echo $options;
      }
      
      function guardar_practicas()
      {
        $profe = filter_input(INPUT_POST, 'profe');
        $fecha = filter_input(INPUT_POST, 'fecha');
        $hora = filter_input(INPUT_POST, 'hora');
        $zona = filter_input(INPUT_POST, 'zona');

        $this->model->update_h($profe,$fecha,$hora);
        /**/
        $_SESSION['id_user'] = 9;
        /**/
        $alumno=$this->model->get_alumno($_SESSION['id_user']);
        $this->model->set_practica($profe,$fecha,$hora,$alumno[0]['id_alumnos'],$zona); 
      }

      function horarios()
      {
        $this->view2->__construct($this->dataView,$this->dataTable);
        $this->view2->show();
      }     
         

      //Horarios profes

      function crear_tabla_horario()
      {

        $num1 = filter_input(INPUT_POST, 'num1');
        /**/
        $_SESSION['id_user'] = 12;
        /**/
        $profe=$this->model->get_profe($_SESSION['id_user']);
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
        }
        $total = "";
            for($i=8;$i<21;$i++)
            {
              if($i!=14 && $i!=15)
              {
                $total.="<tr><td>".$i.":00-".($i+1).":00</td>";
                for($k=0;$k<5;$k++)
                {
                  $total .= "<td class='$numeros[$k]-$i'>";
                    
                    $fecha = $año."-".$mes."-".$numeros[$k];
                    if(!empty($h_profe))
                    {
                      $cont = 0;
                      foreach ($h_profe as $hora) 
                      {
                        
                        if($hora['hora']==$i && $hora['fecha'] == $fecha)
                        {
                           $cont++;
                        }
                      }

                      if($cont ==0)
                      {
                        $total.= "<button class='horario'>Marcar</button>";
                      }
                    }
                    else
                    {
                      $total.= "<button class='horario'>Marcar</button>";
                    }

                  $total .="<span style='display:none'>".$numeros[$k]." ".$i.":00</span></td>";
                }
                $total.="</tr>";
              }
            }

         echo $total;
      }
      function cargar_zonas_h()
      {
        /**/
        $_SESSION['id_user'] = 12;
        /**/
        $profe=$this->model->get_profe($_SESSION['id_user']);
        $zonas=$this->model->get_zona_p($profe[0]['id_profesores']);

        $options="";

        foreach ($zonas as $zona) 
        {

          $options.="<option value='".$zona['id_zonas']."'>".utf8_encode($zona['nombre'])."</option>";
        }

        echo $options;
      }

      

      function guardar_horario()
      {
        $fecha = filter_input(INPUT_POST, 'fecha');
        $hora = filter_input(INPUT_POST, 'hora');
        $zona = filter_input(INPUT_POST, 'zona');
        /**/
        $_SESSION['id_user'] = 12;
        /**/
        $profe=$this->model->get_profe($_SESSION['id_user']);
        $this->model->set_horario($profe[0]['id_profesores'],$fecha,$hora,$zona);
        $this->model->delete_horario();
       
      }
   }
