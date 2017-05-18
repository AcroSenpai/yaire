<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mTeorico extends Model{
		public function __construct(){
			parent::__construct();
			
		}
                
		public function getTest(){

			$sql="SELECT * FROM ya_ire.test 
					inner join test_has_categoria_test on test.id_test = test_has_categoria_test.test";
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function getPT($id)
		{
			$sql="SELECT test.id_test, preguntas.*
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

		public function set_test($test)
		{
			$sql="Insert into test (Nombre) value ('".$test."')";
			$this->query($sql);
			$res=$this->execute();
		}

		public function set_test_categoria($test,$cat)
		{
			$sql="Insert into test_has_categoria_test (test,categoria) value ('".$test."','".$cat."')";
			$this->query($sql);
			$res=$this->execute();
		}

		public function set_test_pregunta($test,$pregunta)
		{
			$sql="Insert into test_has_preguntas (test,preguntas) value ('".$test."','".$pregunta."')";
			$this->query($sql);
			$res=$this->execute();
		}

		public function set_pregunta($pre,$c,$i1,$i2)
		{

			$sql="Insert into preguntas (pregunta,opcion_i1,opcion_i2,opcion_c) value ('".$pre."','".$c."','".$i1."','".$i2."')";
			$this->query($sql);
			$res=$this->execute();
		}



	}