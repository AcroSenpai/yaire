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
                   /*
                    $data=$this->model->getRoles();
                    $this->addData($data); */
                    //rebuilding with new data
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
           
   		}
                
         
   }
