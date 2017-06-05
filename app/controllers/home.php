<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;

  /**
  * Description of home
  *  Controlador que se encarga de mostrar la pagina principal.
  *
  * @author aitor y olalla
  */
   
   class Home extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Home'));
   			$this->model=new \X\App\Models\mHome();
   			$this->view =new \X\App\Views\vHome($this->dataView,$this->dataTable);                   
       }

      /**
      *
      * home: funcion que se llama al entrar a homa y carga la vista.
      *
      */

   		function home()
      {
          $this->view->__construct($this->dataView,$this->dataTable);
          $this->view->show();
           
   		}
                
         
   }
