<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;

   /**
   * Description of Conocenos
   *  Controlador que se encarga de la pantalla de conocenos y del faq.
   *
   * @author aitor y olalla
   */


   class Conocenos extends Controller{


   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Conocenos'));
   			$this->model=new \X\App\Models\mConocenos();
   			$this->view =new \X\App\Views\vConocenos($this->dataView,$this->dataTable);
   			$this->view2 =new \X\App\Views\vFaq($this->dataView,$this->dataTable);
         }


         /**
         *
         * home: funcion que se llama al entrar a conocenos, donde cargamos la vista.
         *
         */

   		function home()
   		{
            $this->view->__construct($this->dataView,$this->dataTable);
            $this->view->show();
   		}

         /**
         *
         * faq: funcion que carga el faq.
         *
         */

   		function faq()
   		{
            $this->view2->__construct($this->dataView,$this->dataTable);
            $this->view2->show();
   		}


   }
