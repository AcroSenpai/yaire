<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mPractico extends Model{
		public function __construct(){
			parent::__construct();

		}

		/**
	    *
	    * getProfes: funcion que devuelve los profesores.
	    *
	    */

		public function getProfes()
		{
			$sql="SELECT * FROM profesores";
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();

			}else {$result=null;}
			return $result;
		}


		/**
	    *
	    * getProfes: funcion que los horarios del profe y la zona que no estan seleccionadas;
	    *
	    */

		public function get_h_profe($id, $zona)
		{

			$sql="SELECT * FROM horario WHERE Profesor =".$id." AND seleccionado = 0 AND zona = ".$zona;

			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();

			}else {$result=null;}
			return $result;
		}

		/**
	    *
	    * get_zona_p: funcion que devuelve las zonas relacionadas con ese profesor.
	    *
	    */

		public function get_zona_p($id)
		{

			$sql="SELECT * FROM zonas inner join profesores_has_zonas on zonas.id_zonas = profesores_has_zonas.zonas WHERE Profesores =".$id;
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();

			}else {$result=null;}
			return $result;
		}

		/**
	    *
	    * update_h: funcion que modifica el horario para marcar que ha sido seleccionado.
	    *
	    */

		public function update_h($profe,$fecha,$hora)
		{
			$sql="UPDATE horario SET seleccionado = 1 WHERE fecha ='".$fecha."' AND hora =".$hora." AND Profesor =".$profe;
			$this->query($sql);
			$res=$this->execute();
		}

		/**
	    *
	    * get_alumno: funcion que devuelve los datos de un alumno.
	    *
	    */

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


		/**
	    *
	    * set_practica: funcion que inserta la practica.
	    *
	    */

		public function set_practica($profe,$fecha,$hora,$alumno,$zona)
		{
			$sql="INSERT into practicas (fecha_hora,duracion,alumnos,profesor,zonas,realizada) VALUES ('".$fecha." ".$hora.":00',1, ".$alumno." ,".$profe.",".$zona.",0)";
			$this->query($sql);
			$res=$this->execute();
		}

		/**
	    *
	    * set_practica: funcion que devuelve un profesor.
	    *
	    */

		public function get_profe($uw)
		{
			$sql="SELECT * FROM profesores  WHERE userweb =".$uw;
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();

			}else {$result=null;}
			return $result;
		}

		/**
	    *
	    * set_horario: funcion que inserta un horario.
	    *
	    */

		public function set_horario($profe,$fecha,$hora,$zona)
		{
			$sql="INSERT into horario (fecha,hora,profesor,seleccionado,zona) VALUES ('".$fecha."',".$hora.",".$profe." ,0,".$zona.")";
			$this->query($sql);
			$res=$this->execute();
		}

		/**
	    *
	    * delete_horario: funcion que borra los horarios inferiores a hoy.
	    *
	    */

		public function delete_horario()
		{
			$sql="DELETE FROM horario
					WHERE fecha < NOW()";
			$this->query($sql);

			$res=$this->execute();
		}

	}
