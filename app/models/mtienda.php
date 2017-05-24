<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mTienda extends Model{
		public function __construct(){
			parent::__construct();
			
		}

		public function getProductos()
		{

			$sql="SELECT * FROM productos";
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}


		public function getProducto($id)
		{

			$sql="SELECT * FROM productos Where id_productos = ".$id;
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}


		public function set_concepto($producto,$cantidad,$precio,$alumno)
		{
			$sql="INSERT INTO conceptos (cantidad,precio,productos,alumnos,fecha) VALUES(".$cantidad.",".$precio.",".$producto.",".$alumno.",'".Date("Y-m-d")."')";
			$this->query($sql);
			$res=$this->execute();
		}

		public function get_concepto($producto,$alumno)
		{
			$sql="SELECT * FROM conceptos  WHERE alumnos =".$alumno." AND productos =".$producto;

			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function get_concepto_alumno($alumno)
		{
			$sql="SELECT productos.nombre, productos.img, conceptos.precio, conceptos.cantidad, productos.id_productos, conceptos.id_conceptos FROM conceptos inner join productos on conceptos.productos = productos.id_productos  WHERE alumnos =".$alumno;
			
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function update_concepto($producto,$cantidad,$precio,$alumno)
		{
			$sql="UPDATE conceptos SET cantidad = cantidad + ".$cantidad." , precio = precio + ".$precio." Where productos =".$producto." AND alumnos =".$alumno;
			$this->query($sql);
			$res=$this->execute();
		}

		public function update_concepto_2($producto,$cantidad,$precio,$alumno)
		{
			$sql="UPDATE conceptos SET cantidad = ".$cantidad." , precio = ".$precio." Where productos =".$producto." AND alumnos =".$alumno;
			$this->query($sql);
			$res=$this->execute();
		}

		public function get_alumno($uw)
		{
			$sql="SELECT * FROM alumnos  WHERE userweb =".$uw;
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function delete_conceptos()
		{
			$sql="DELETE FROM conceptos WHERE fecha < DATE_SUB(CURDATE(), INTERVAL 1 DAY) WHERE compras = NULL";
			$this->query($sql);

			$res=$this->execute();
		}

		public function get_num_conceptos($alumno)
		{
			$sql="SELECT count(*) as 'total' FROM conceptos  WHERE alumnos =".$alumno;
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function get_precio_producto($producto)
		{
			$sql="SELECT precio FROM productos  WHERE id_productos =".$producto;

			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}


		public function set_compra($total,$alumno)
		{
			$sql="INSERT INTO compras (precio_total,fechas,alumnos) VALUES(".$total.",'".Date("Y-m-d")."',".$alumno.")";
			$this->query($sql);
			$res=$this->execute();
		}

		public function get_compra($alumno)
		{
			$sql="SELECT * FROM compras  WHERE alumnos =".$alumno." Order by fechas limit 1";
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function modificar_concepto_compra($id, $concepto)
		{
			$sql="UPDATE conceptos SET compras = ".$id." Where id_conceptos =".$concepto;
			echo $sql;
			die;
			$this->query($sql);
			$res=$this->execute();
		}
	}