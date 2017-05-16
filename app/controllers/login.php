<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;


   
   class Login extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Login'));
   			$this->model=new \X\App\Models\mLogin();
   			$this->view =new \X\App\Views\vLogin($this->dataView,$this->dataTable);    
                           
                        
                }


   		function home(){
                   /*
                    $data=$this->model->getRoles();
                    $this->addData($data); */
                    //rebuilding with new data
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
           
   		}

      function ckuser()
      {
        $email=filter_input(INPUT_POST, 'email');
        $pass=filter_input(INPUT_POST, 'pass');

        $result = $this->model->get_user($email,$pass);

        if(!empty($result))
        {
            $_SESSION["user"]=$result[0]['username'];
            $_SESSION["iduser"]=$result[0]['id_userweb'];
            $_SESSION["rol"]=$result[0]['roles'];
           
            echo 1;
        }
        else
        {
            echo "Error de login";
        }

      }
                
         
   }
