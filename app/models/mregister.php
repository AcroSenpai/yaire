<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mRegister extends Model{
		public function __construct(){
			parent::__construct();
			
		}

        public function check_email($mail)
        {
            $sql='Select * From userweb Where mail="'.$mail.'"';
            $this->query($sql);
            $this->execute();
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }

        public function get_poblaciones()
        {
            $sql='Select * From poblacion';
            $this->query($sql);
            $this->execute();
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }

        public function check_username($username)
        {
            $sql='Select * From userweb Where username="'.$username.'"';
            $this->query($sql);
            $this->execute();
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }

        public function insert($username,$pass,$email)
        {
            $sql='Insert into userweb (mail, password, roles, fecha_registro, username) Values ("'.$email.'","'.$pass.'",2,"'.	Date("Y-m-d").'","'.$username.'")';
            $this->query($sql);
            $this->execute();
        }

        public function insert_a($apellidos,$nombre,$dni,$direccion,$telefono,$poblacion,$userweb)
        {
            $sql='Call new_alumno ("'.$apellidos.'","'.$nombre.'","'.$dni.'","'.$direccion.'","'.$telefono.'","'.$poblacion.'","'.$userweb.'")';
            echo $sql;
            die;
            $this->query($sql);
            $this->execute();
        }
	}