<?php

   namespace X\App\Controllers;
   use X\Sys\Controller;
   use X\Sys\Session;


    /**
    * Description of Tienda
    *  Controlador que se encarga de mostrar la tienda, el producto y el carrito.
    *
    * @author aitor y olalla
    */


   class Tienda extends Controller{

   		public function __construct($params)
      {
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Tienda'));
   			$this->model=new \X\App\Models\mTienda();
   			$this->view =new \X\App\Views\vTienda($this->dataView,$this->dataTable);
        $this->view2 =new \X\App\Views\vProducto($this->dataView,$this->dataTable);
        $this->view3 =new \X\App\Views\vCarrito($this->dataView,$this->dataTable);
      }

      /**
      * 
      * home: funcion que recoge los productos y se los envia a la tienda.
      * 
      */

   		function home()
      {
        $data['productos']=$this->model->getProductos();
        $data['tienda']=1;
        $this->addData($data);
        //rebuilding with new data
        $this->view->__construct($this->dataView,$this->dataTable);
        $this->view->show();
   		}

      /**
      * 
      * producto: funcion que recoge un producto y se los envia a la vista del producto.
      * 
      */

      function producto()
      {
        $id=$this->params['id'];
        $data['productos']=$this->model->getProducto($id);
        $data['tienda']=1;
        $this->addData($data);
        $this->view2->__construct($this->dataView,$this->dataTable);
        $this->view2->show();
      }

      /**
      * 
      * generar_concepto: funcion que genera un concepto o lo modifica si ya existe y borra los anteriores.
      * 
      */

      function generar_concepto()
      {
        $producto=filter_input(INPUT_POST, 'producto');
        $cantidad=filter_input(INPUT_POST, 'cantidad');
        $precio=filter_input(INPUT_POST, 'precio');
        $precio = $precio * $cantidad;

        $alumno=$this->model->get_alumno($_SESSION['iduser']);
        $concepto = $this->model->get_concepto($producto,$alumno[0]['id_alumnos']);
        //Si el concepto no existe, lo creamos
        if(empty($concepto))
        {
          $this->model->set_concepto($producto,$cantidad,$precio,$alumno[0]['id_alumnos']);
        }
        else
        {
          //Si no existe lo modificamos
          $this->model->update_concepto($producto,$cantidad,$precio,$alumno[0]['id_alumnos']);
        }
        $this->model->delete_conceptos();
      }

      /**
      * 
      * num_conceptos: funcion que calcula el numero de conceptos de un usuario
      * 
      */

      function num_conceptos()
      {

        $alumno=$this->model->get_alumno($_SESSION['iduser']);
        $conceptos=$this->model->get_num_conceptos($alumno[0]['id_alumnos']);
        echo $conceptos[0]['total'];
      }

      /**
      * 
      * carrito: funcion que recoge los conceptos del alumno y llama al carrito
      * 
      */

      function carrito()
      {

        $alumno=$this->model->get_alumno($_SESSION['iduser']);
        $data = $this->model->get_concepto_alumno($alumno[0]['id_alumnos']);
        if(!empty($data))
        {
          $this->addData($data);
          $this->view3->__construct($this->dataView,$this->dataTable);
        }
        $this->view3->show();
      }

      /**
      * 
      * modificar_concepto: funcion que modifica el concepto desde el carrito.
      * 
      */

      function modificar_concepto()
      {
        $producto=filter_input(INPUT_POST, 'producto');
        $cantidad=filter_input(INPUT_POST, 'cantidad');

        $precio = $this->model->get_precio_producto($producto);
        $t_precio = $precio[0]['precio'] * $cantidad;

        $alumno=$this->model->get_alumno($_SESSION['iduser']);
        $concepto = $this->model->get_concepto($producto,$alumno[0]['id_alumnos']);
        $this->model->update_concepto_2($producto,$cantidad,$t_precio,$alumno[0]['id_alumnos']);
      }

      /**
      * 
      * crear_compra: funcion que crea una compra.
      * 
      */

      function crear_compra()
      {
        $total=filter_input(INPUT_POST, 'total');

        $alumno=$this->model->get_alumno($_SESSION['iduser']);
        $this->model->set_compra($total,$alumno[0]['id_alumnos']);
      }

      /**
      * 
      * asignar_conceptos: funcion que asigna los conceptos a una compra.
      * 
      */

      function asignar_conceptos()
      {
        $concepto=filter_input(INPUT_POST, 'concepto');

        $alumno=$this->model->get_alumno($_SESSION['iduser']);
        $compra=$this->model->get_compra($alumno[0]['id_alumnos']);
        $this->model->modificar_concepto_compra($compra[0]['id_compras'], $concepto);
      }

      /**
      * 
      * borrar_concepto: funcion que borra un concepto.
      * 
      */

      function borrar_concepto()
      {
        $concepto=filter_input(INPUT_POST, 'concepto');
        $this->model->borrar_concepto($concepto);
      }

   }
