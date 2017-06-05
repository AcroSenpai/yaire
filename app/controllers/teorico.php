<?php

   namespace X\App\Controllers;
   use X\Sys\Controller;

    /**
	* Description of teorico
	*  Controlador que se encarga de mostrar los test que existen, tus aciertos e intentos y si eres profesor, te permite crear un test o una pregunta.
	*
	* @author aitor y olalla
	*/

   class Teorico extends Controller{

   	public function __construct($params)
   	{
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Teorico'));
   			$this->model=new \X\App\Models\mTeorico();
   			$this->view =new \X\App\Views\vTeorico($this->dataView,$this->dataTable);
        $this->view2 =new \X\App\Views\vTeorico2($this->dataView,$this->dataTable);
        $this->view3 =new \X\App\Views\vTeorico3($this->dataView,$this->dataTable);
    }

    /**
    *
    * home: funcion que se llama al entrar a teorico, donde recogemos los test y los resultados y se los pasamos a la vista.
    *
    */
   	function home()
   	{

        $data['test']=$this->model->getTest();
        $data['resultados']=$this->model->getResults($_SESSION['iduser']);
        $this->addData($data);
        //rebuilding with new data
        $this->view->__construct($this->dataView,$this->dataTable);
        $this->view->show();
   	}

   	/**
    *
    * test: funcion que se llama al entrar a un test, donde recogemos el id del test por parametro y llamamos a la vista 2 donde le enviamos las preguntas.
    *
    */

    function test()
    {
         $id= $this->params['id'];
         $data=$this->model->getPT($id);
         $this->addData($data);
         $this->view2->__construct($this->dataView,$this->dataTable);
         $this->view2->show();
    }

    /**
    *
    * crear: funcion que se llama al entrar a crear, donde mostraremos las dos opciones, crear test y crear preguntas, pasandole las categorias y las preguntas.
    *
    */

    function crear()
    {
         $data['test']=$this->model->getTest();
         $data['categorias']=$this->model->get_cat_T();
         $data['preguntas']=$this->model->get_all_PT();
         $this->addData($data);
         $this->view3->__construct($this->dataView,$this->dataTable);
         $this->view3->show();
    }
    
    /**
    *
    * crearTest: funcion que sirve para crear el test, recogemos el nombre, la categoria y las preguntas.
    *
    */
    function crearTest()
    {
    	//Recogemos los datos
        $test = filter_input(INPUT_POST, 'test');
        $array=filter_input(INPUT_POST, 'pre');
        $cat=filter_input(INPUT_POST, 'cat');

        //Quitamos los caracteres sobrantes
        $hola = substr($array, 1, strlen($array)-2);
        //Separamos las preguntas en un array
        $array = explode(',', $hola);
        //Insertamos el test
        $this->model->set_test($test);
        //Recogemos el id del test recien creado
        $test=$this->model->ckTest($test);
        //creamos la relacion del test con la categoria
        $this->model->set_test_categoria($test[0]['id_test'],$cat);
        //Bucle para crear las relaciones del test y las preguntas
        for($i=0;$i<30;$i++)
        {
          echo $array[$i];
          $array[$i]=substr($array[$i], 1, strlen($array[$i])-2);
          $this->model->set_test_pregunta($test[0]['id_test'],$array[$i]);
        }
    }

    /**
    *
    * ckTest: funcion que recive el nombre de un test y comprueba si existe.
    *
    */

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

    /**
    *
    * crearP: funcion que crea una pregunta.
    *
    */

    function crearP()
    {
        $pre = filter_input(INPUT_POST, 'pre');
        $c=filter_input(INPUT_POST, 'c');
        $i1=filter_input(INPUT_POST, 'i1');
        $i2=filter_input(INPUT_POST, 'i2');
        $this->model->set_pregunta($pre,$c,$i1,$i2);
    }

    /**
    *
    * setAciertos: funcion que cuando corriges un test registra el intento y los aciertos.
    *
    */


    function setAciertos()
    {
        $iduser = $_SESSION["iduser"];
        $aciertos=filter_input(INPUT_POST,'aciertos');
        $id=filter_input(INPUT_POST,'id');

        $result = $this->model->setAciertos($iduser,$aciertos,$id);

        if(!empty($result))
        {
            echo 1;
        }
        else
        {
            echo "Error de login";
        }

    }


   }
