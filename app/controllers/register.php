<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;


   
   class Register extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Registro'));
   			$this->model=new \X\App\Models\mRegister();
   			$this->view =new \X\App\Views\vRegister($this->dataView,$this->dataTable);    
                           
                        
                }


   		function home(){
                   
                    $data=$this->model->get_poblaciones();
                    $this->addData($data); 
                    //rebuilding with new data
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
           
   		}

      function ckemail()
      {
        $email=filter_input(INPUT_POST, 'email');

        $result = $this->model->check_email($email);

        if(!empty($result))
        {
            echo 1;
        }
        else
        {
            echo 0;
        }

      }

      function ckusername()
      {
        $username=filter_input(INPUT_POST, 'username');

        $result = $this->model->check_username($username);

        if(!empty($result))
        {
            echo 1;
        }
        else
        {
            echo 0;
        }

      }

      function insert()
      {
        $email=filter_input(INPUT_POST, 'email');
        $username=filter_input(INPUT_POST, 'username');
        $pass=filter_input(INPUT_POST, 'pass');


        $data=$this->model->check_email($email);
        $data+=$this->model->check_username($username);
        if(empty($data))
        {
            $this->model->insert($username,$pass,$email);
            echo 1;
        }   
        else
        {
            echo "Error de registro";
        }
      }

      function insert_a()
      {
        $email=filter_input(INPUT_POST, 'email2');
        $username=filter_input(INPUT_POST, 'username2');
        $pass=filter_input(INPUT_POST, 'paw3');
        $apellidos=filter_input(INPUT_POST, 'apellidos');
        $nombre=filter_input(INPUT_POST, 'nombre');
        $dni=filter_input(INPUT_POST, 'dni');
        $telefono=filter_input(INPUT_POST, 'telefono');
        $direccion=filter_input(INPUT_POST, 'direccion');
        $poblacion=filter_input(INPUT_POST, 'poblacion');

        $data=$this->model->check_email($email);
        $data+=$this->model->check_username($username);
        if(empty($data))
        {
            $this->model->insert($username,$pass,$email);
            $result = $this->model->check_email($email);
            $this->model->insert_a($apellidos,$nombre,$dni,$direccion,$telefono,$poblacion,$result[0]['id_userweb']);
            echo 1;
        }   
        else
        {
            echo "Error de registro";
        }

      }
                
         
   }