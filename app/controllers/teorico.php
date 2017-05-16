
<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;


   
   class Teorico extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Teorico'));
   			$this->model=new \X\App\Models\mTeorico();
   			$this->view =new \X\App\Views\vTeorico($this->dataView,$this->dataTable);    
                           
                        
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

