<?php

namespace X\App\Controllers;

   use X\Sys\Controller;


   class Users extends Controller{
   		

   		public function __construct($params){
            parent::__construct($params);
            $this->addData(array(
               'page'=>'Users'));
            $this->model=new \X\App\Models\mUsers();
            $this->view =new \X\App\Views\vUsers($this->dataView);
            
         }
         
   		function home(){

         }
   }