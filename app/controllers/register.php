<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;

  /**
  * Description of Register
  *  Controlador que se encarga de el registro, de usuarios y de alumnos
  *
  * @author aitor y olalla
  */

   class Register extends Controller{


   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Registro'));
   			$this->model=new \X\App\Models\mRegister();
   			$this->view =new \X\App\Views\vRegister($this->dataView,$this->dataTable);
        $this->view2 =new \X\App\Views\vRegister2($this->dataView,$this->dataTable);


                }
      /**
      *
      * home: funcion que se llama al entrar a register, donde recogemos las poblaciones se los pasamos a la vista.
      *
      */

   		function home()
      {

        $data=$this->model->get_poblaciones();
        $this->addData($data);

        $this->view->__construct($this->dataView,$this->dataTable);
        $this->view->show();

   		}

      /**
      *
      * ckemail: funcion que comprueba si existe el mail
      *
      */

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

      /**
      *
      * ckusername: funcion que comprueba si existe el username
      *
      */

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

      /**
      *
      * insert: funcion que inserta un userweb
      *
      */

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

      /**
      *
      * insert_a: funcion que inserta un userweb y un alumno
      *
      */

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

      /**
      *
      * practica: funcion que utilizaremos para cargar la vista de los alumnos
      * que ya han aprobado la teorica y quieren registrarse como conductores
      *
      */

      function practica()
      {

        $data=$this->model->get_poblaciones();
        $this->addData($data);

        $this->view2->__construct($this->dataView,$this->dataTable);
        $this->view2->show();

      }

      /**
      *
      * insert_practica: funcion que inserta un alumno que fue userweb
      *
      */

      function insert_practica()
      {

        $apellidos=filter_input(INPUT_POST, 'apellidos');
        $nombre=filter_input(INPUT_POST, 'nombre');
        $dni=filter_input(INPUT_POST, 'dni');
        $telefono=filter_input(INPUT_POST, 'telefono');
        $direccion=filter_input(INPUT_POST, 'direccion');
        $poblacion=filter_input(INPUT_POST, 'poblacion');

        $result = $this->model->insert_a($apellidos,$nombre,$dni,$direccion,$telefono,$poblacion,$_SESSION["iduser"]);
        echo $result;

      }


   }
