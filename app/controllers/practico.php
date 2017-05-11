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
