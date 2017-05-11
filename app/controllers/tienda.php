<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;


   
   class Tienda extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Tienda'));
   			$this->model=new \X\App\Models\mTienda();
   			$this->view =new \X\App\Views\vTienda($this->dataView,$this->dataTable);    
                           
                        
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
