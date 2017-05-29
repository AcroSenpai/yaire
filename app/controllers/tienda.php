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
        $this->view2 =new \X\App\Views\vProducto($this->dataView,$this->dataTable);
        $this->view3 =new \X\App\Views\vCarrito($this->dataView,$this->dataTable);    
                           
                        
                }


   		function home(){

                    $data['productos']=$this->model->getProductos();
                    $this->addData($data); 
                    //rebuilding with new data
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
           
   		}

      function producto()
      {
        $id=$this->params['id'];

        $data=$this->model->getProducto($id);
        $this->addData($data); 


        $this->view2->__construct($this->dataView,$this->dataTable);
        $this->view2->show();
      }

      function generar_concepto()
      {
        $producto=filter_input(INPUT_POST, 'producto');
        $cantidad=filter_input(INPUT_POST, 'cantidad');
        $precio=filter_input(INPUT_POST, 'precio');

        $precio = $precio * $cantidad;

        /**/
        $_SESSION['id_user'] = 9;
        /**/
        $alumno=$this->model->get_alumno($_SESSION['id_user']);

        $concepto = $this->model->get_concepto($producto,$alumno[0]['id_alumnos']);

        if(empty($concepto))
        {
          $this->model->set_concepto($producto,$cantidad,$precio,$alumno[0]['id_alumnos']);
        }
        else
        {
          $this->model->update_concepto($producto,$cantidad,$precio,$alumno[0]['id_alumnos']);
        }

        $this->model->delete_conceptos();

      }

      function num_conceptos()
      {
        /**/
        $_SESSION['id_user'] = 9;
        /**/
        $alumno=$this->model->get_alumno($_SESSION['id_user']);
        $conceptos=$this->model->get_num_conceptos($alumno[0]['id_alumnos']);

        echo $conceptos[0]['total'];
      }


      function carrito()
      {
        /**/
        $_SESSION['id_user'] = 9;
        /**/
        $alumno=$this->model->get_alumno($_SESSION['id_user']);
        $data = $this->model->get_concepto_alumno($alumno[0]['id_alumnos']);
        if(!empty($data))
        {
          $this->addData($data); 
          $this->view3->__construct($this->dataView,$this->dataTable);
        }
        $this->view3->show();
      }

      
              
      function modificar_concepto()
      {
        $producto=filter_input(INPUT_POST, 'producto');
        $cantidad=filter_input(INPUT_POST, 'cantidad');
        
        $precio = $this->model->get_precio_producto($producto);

        $t_precio = $precio[0]['precio'] * $cantidad;

        /**/
        $_SESSION['id_user'] = 9;
        /**/
        $alumno=$this->model->get_alumno($_SESSION['id_user']);

        $concepto = $this->model->get_concepto($producto,$alumno[0]['id_alumnos']);

        $this->model->update_concepto_2($producto,$cantidad,$t_precio,$alumno[0]['id_alumnos']);

      }


      function crear_compra()
      {
        $total=filter_input(INPUT_POST, 'total');

        /**/
        $_SESSION['id_user'] = 9;
        /**/
        $alumno=$this->model->get_alumno($_SESSION['id_user']);

        $this->model->set_compra($total,$alumno[0]['id_alumnos']);

      }

      function asignar_conceptos()
      {
        $concepto=filter_input(INPUT_POST, 'cocnepto');
        /**/
        $_SESSION['id_user'] = 9;
        /**/
        $alumno=$this->model->get_alumno($_SESSION['id_user']);

        $compra=$this->model->get_compra($alumno[0]['id_alumnos']);

        $this->model->modificar_concepto_compra($compra[0]['id_compras'], $concepto);
      }

      function borrar_concepto()
      {
        $concepto=filter_input(INPUT_POST, 'cocnepto');
        $this->model->borrar_concepto($concepto);
      }


         
   }