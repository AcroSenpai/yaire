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
        $this->view2 =new \X\App\Views\vTeorico2($this->dataView,$this->dataTable);      
        $this->view3 =new \X\App\Views\vTeorico3($this->dataView,$this->dataTable);                   
      }


   		function home(){

                    $data=$this->model->getTest();
                    $this->addData($data); 
                    //rebuilding with new data
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
           
   		}

      function test()
      {

         $id= $this->params['id'];

         $data=$this->model->getPT($id);

         $this->addData($data); 
         $this->view2->__construct($this->dataView,$this->dataTable);

         $this->view2->show();

      }

      function crear()
      {

         $data['test']=$this->model->getTest();
         $data['categorias']=$this->model->get_cat_T();
         $data['preguntas']=$this->model->get_all_PT();

         $this->addData($data); 
         $this->view3->__construct($this->dataView,$this->dataTable);

         $this->view3->show();

      }

      function crearTest()
      {
        $test = filter_input(INPUT_POST, 'test');
        $array=filter_input(INPUT_POST, 'pre');
        $cat=filter_input(INPUT_POST, 'cat');
        //echo $array;

        $hola = substr($array, 1, strlen($array)-2);

        $array = explode(',', $hola);
        $this->model->set_test($test);
        $test=$this->model->ckTest($test);

        $this->model->set_test_categoria($test[0]['id_test'],$cat);

        for($i=0;$i<30;$i++)
        {
          echo $array[$i];
          $array[$i]=substr($array[$i], 1, strlen($array[$i])-2);

          $this->model->set_test_pregunta($test[0]['id_test'],$array[$i]);
        }

      }
        

      function ckTest()
      {
        $test = filter_input(INPUT_POST, 'test');

        $test=$this->model->ckTest($test);

        if(!empty($test))
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
      }

      function crearP()
      {
        $pre = filter_input(INPUT_POST, 'pre');
        $c=filter_input(INPUT_POST, 'c');
        $i1=filter_input(INPUT_POST, 'i1');
        $i2=filter_input(INPUT_POST, 'i2');

        $this->model->set_pregunta($pre,$c,$i1,$i2);
      }
                
         
   }

