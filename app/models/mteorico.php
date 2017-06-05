<?php

	namespace X\App\Models;
	use \X\Sys\Model;

	class mTeorico extends Model{
		public function __construct(){
			parent::__construct();

		}

		/**
	    *
	    * getTest: funcion que devuelve los test y sus categorias.
	    *
	    */

		public function getTest()
		{
			$sql="SELECT * FROM test
					inner join test_has_categoria_test on test.id_test = test_has_categoria_test.test";

			$this->query($sql);
			$res=$this->execute();
			if($res){
				$result=$this->resultset();

			}else {$result=null;}
			return $result;
		}

		/**
	    *
	    * getResults: funcion que devuelve los aciertos e intentos de los test.
	    *
	    */

		public function getResults($iduser)
		{
			$sql="SELECT max(aciertos) AS 'max', test, count(*) AS 'intentos'
			 FROM test inner join userweb_has_test on test.id_test = userweb_has_test.test
			 WHERE userweb = ".$iduser." GROUP BY userweb_has_test.test";

			$this->query($sql);
			$res=$this->execute();
			if($res){
				$result=$this->resultset();

			}else {$result=null;}
			return $result;
		}

		/**
	    *
	    * getPT: funcion que devuelve las preguntas del test seleccionado.
	    *
	    */

		public function getPT($id)
		{
			$sql="SELECT test.*, preguntas.*
				FROM test inner join test_has_preguntas on test.id_test = test_has_preguntas.test
				inner join preguntas on test_has_preguntas.preguntas = preguntas.id_pregunta
				where test.id_test = ".$id;
			$this->query($sql);
			$res=$this->execute();
			if($res){
				$result=$this->resultset();

			}else {$result=null;}
			return $result;
		}


		/**
	    *
	    * get_all_PT: funcion que devuelve todas las preguntas.
	    *
	    */

		public function get_all_PT()
		{
			$sql="SELECT * FROM  preguntas";
			$this->query($sql);
			$res=$this->execute();
			if($res){
				$result=$this->resultset();

			}else {$result=null;}
			return $result;
		}

		/**
	    *
	    * get_cat_T: funcion que devuelve las catagorias de los test.
	    *
	    */

		public function get_cat_T()
		{
			$sql="SELECT * FROM  categoria_test";
			$this->query($sql);
			$res=$this->execute();
			if($res){
				$result=$this->resultset();

			}else {$result=null;}
			return $result;
		}

		/**
	    *
	    * ckTest: funcion que devuelve los datos de un test preguntando por el nombre.
	    *
	    */
		public function ckTest($test)
		{
			$sql="SELECT * FROM  test WHERE Nombre='".$test."'";
			$this->query($sql);
			$res=$this->execute();
			if($res){
				$result=$this->resultset();

			}else {$result=null;}
			return $result;
		}

		/**
	    *
	    * set_test: funcion que inserta el test.
	    *
	    */
		public function set_test($test)
		{
			$sql="Insert into test (Nombre) value ('".$test."')";
			$this->query($sql);
			$res=$this->execute();
		}

		/**
	    *
	    * set_test_categoria: funcion que inserta la relacion del test y la categoria.
	    *
	    */
		public function set_test_categoria($test,$cat)
		{
			$sql="Insert into test_has_categoria_test (test,categoria) value ('".$test."','".$cat."')";
			$this->query($sql);
			$res=$this->execute();
		}

		/**
	    *
	    * set_test_pregunta: funcion que inserta la relacion del test y la pregunta.
	    *
	    */
		public function set_test_pregunta($test,$pregunta)
		{
			$sql="Insert into test_has_preguntas (test,preguntas) value ('".$test."','".$pregunta."')";
			$this->query($sql);
			$res=$this->execute();
		}

		/**
	    *
	    * set_pregunta: funcion que inserta una pregunta.
	    *
	    */
		public function set_pregunta($pre,$c,$i1,$i2)
		{
			$sql="Insert into preguntas (pregunta,opcion_i1,opcion_i2,opcion_c) value ('".$pre."','".$c."','".$i1."','".$i2."')";
			$this->query($sql);
			$res=$this->execute();
		}

		/**
	    *
	    * set_pregunta: funcion que inserta la relacion del test y el usuario guardando el numero de aciertos.
	    *
	    */

		public function setAciertos($iduser,$aciertos,$id)
		{
			$sql="Insert into userweb_has_test (Test, aciertos, fecha, Userweb) value ('".$id."','".$aciertos."',now(),'".$iduser."')";
			$this->query($sql);
			$res=$this->execute();
			return $res;
		}

	}
