<?php
namespace X\App\Controllers;
   use X\Sys\Controller;
   class Users extends Controller{

   		public function __construct($params){
            parent::__construct($params);
            $this->addData(array(
               'page'=>'Users'));
            $this->model=new \X\App\Models\mUsers();
            $this->view =new \X\App\Views\vUsers($this->dataView,$this->dataTable);

         }

   		function home(){

        if(! empty ($_SESSION['user']) )
        {
           if($_SESSION['rol']==3)
           {
                $data['userweb']=$this->model->get_userweb($_SESSION['iduser']);
                $data['datos']=$this->model->get_alumno($_SESSION['iduser']);
                $data['practicas_h_a']=$this->model->get_practicas_hechas_a($data['datos'][0]['id_alumnos']);
                $data['practicas_ph_a']=$this->model->get_practicas_por_hacer_a($data['datos'][0]['id_alumnos']);
           }
           else if($_SESSION['rol']==4)
          {

                $data['userweb']=$this->model->get_userweb($_SESSION['iduser']);
                $data['datos']=$this->model->get_profe($_SESSION['iduser']);

                $data['practicas_h_p']=$this->model->get_practicas_hechas_p($data['datos'][0]['id_profesores']);
                $data['practicas_ph_p']=$this->model->get_practicas_por_hacer_p($data['datos'][0]['id_profesores']);

          }
          else
          {
             $data['userweb']=$this->model->get_userweb($_SESSION['iduser']);
          }
          $this->addData($data);
          $this->view->__construct($this->dataView,$this->dataTable);
        }
          $this->view->show();

     }

     function marcar_practica()
     {
        $practica = filter_input(INPUT_POST, 'practica');
        $this->model->update_practica($practica);
     }

     function generar_grafico()
     {

        $result = $this->model->resultados_test($_SESSION['iduser']);
        $datos = array();
        $total = 0;
        foreach ($result as $r)
        {
           $total = $total + $r['total'];
           $datos[$r['fecha']]= $total;
        }
        echo json_encode($datos);
     }

     function comprobar_contra()
     {
        $antigua = filter_input(INPUT_POST, 'antigua');

        $result = $this->model->comprobar_contra($antigua,  $_SESSION['iduser']);
        if($result == "")
        {
           echo 1;
        }
        else
        {
           echo 2;
        }
     }

     function cambiar_contra()
     {
        $pass = filter_input(INPUT_POST, 'nueva');
        $result = $this->model->cambiar_contra($pass,  $_SESSION['iduser']);
        echo $result;
     }

   }
