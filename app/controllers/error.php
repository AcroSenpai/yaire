<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;


   class Error extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Error'));
   			$this->model=new \X\App\Models\mError();
   			$this->view =new \X\App\Views\vError($this->dataView);
            
   		}


   		function home(){
   			
   		}
   }
