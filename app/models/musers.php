<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mUsers extends Model{
		public function __construct(){
			parent::__construct();
			
		}

		public function get_userweb($id)
		{
			$sql="SELECT * FROM userweb  WHERE id_userweb =".$id;
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function get_alumno($uw)
		{
			$sql="SELECT alumnos.id_alumnos, alumnos.nombre, alumnos.apellidos, alumnos.DNI, alumnos.direccion, alumnos.telf, poblacion.nombre as 'poblacion' ,provincia.nombre as 'provincia' FROM alumnos inner join poblacion on alumnos.poblacion = poblacion.id_poblacion inner join provincia on poblacion.provincia = provincia.id_provincia WHERE userweb =".$uw;
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function get_profe($uw)
		{
			$sql="SELECT profesores.id_profesores, profesores.nombre, profesores.apellidos, profesores.DNI, profesores.direccion, profesores.telf, poblacion.nombre as 'poblacion' ,provincia.nombre as 'provincia' FROM profesores inner join poblacion on profesores.poblacion = poblacion.id_poblacion inner join provincia on poblacion.provincia = provincia.id_provincia WHERE userweb =".$uw;
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function get_practicas_hechas_a($alumno)
		{
			$sql="SELECT practicas.id_practicas, practicas.fecha_hora, profesores.nombre 'Np', profesores.apellidos 'Ap',zonas.nombre as 'zona', practicas.observaciones FROM practicas inner join profesores on practicas.profesor = profesores.id_profesores inner join zonas on practicas.zonas = zonas.id_zonas where alumnos = ".$alumno." and realizada = 1";
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function get_practicas_por_hacer_a($alumno)
		{
			$sql="SELECT practicas.id_practicas, practicas.fecha_hora, profesores.nombre 'Np', profesores.apellidos 'Ap',zonas.nombre as 'zona', practicas.observaciones FROM practicas inner join profesores on practicas.profesor = profesores.id_profesores inner join zonas on practicas.zonas = zonas.id_zonas where alumnos = ".$alumno." and realizada = 0";
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function get_practicas_hechas_p($profe)
		{
			$sql="SELECT practicas.id_practicas, practicas.fecha_hora, alumnos.nombre 'Na', alumnos.apellidos 'Aa',zonas.nombre as 'zona', practicas.observaciones FROM practicas inner join alumnos on practicas.alumnos = alumnos.id_alumnos inner join zonas on practicas.zonas = zonas.id_zonas where profesor = ".$profe." and realizada = 1";
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function get_practicas_por_hacer_p($profe)
		{
			$sql="SELECT practicas.id_practicas, practicas.fecha_hora, alumnos.nombre 'Na', alumnos.apellidos 'Aa',zonas.nombre as 'zona', practicas.observaciones FROM practicas inner join alumnos on practicas.alumnos = alumnos.id_alumnos inner join zonas on practicas.zonas = zonas.id_zonas where profesor = ".$profe." and realizada = 0";
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}


		public function update_practica($practica)
		{
			$sql="UPDATE practicas set realizada = 1 where id_practicas = ".$practica;
			$this->query($sql);

			$res=$this->execute();
		}

		public function resultados_test($alumno)
		{
			$sql="SELECT fecha, Count(*) as 'total' FROM userweb_has_test where Userweb = ".$alumno." and aciertos >= 27 Group by fecha, Test";
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function comprobar_contra($pass,$alumno)
		{
			$sql="SELECT * FROM userweb where id_userweb = ".$alumno." and password = '".$pass."'";
			$this->query($sql);

			$res=$this->execute();
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
		}

		public function cambiar_contra($pass,$alumno)
		{
			$sql="UPDATE userweb SET password = '".$pass."' where id_userweb = ".$alumno;
			echo $sql;
			die;
			$this->query($sql);

			$res=$this->execute();
		}
	}