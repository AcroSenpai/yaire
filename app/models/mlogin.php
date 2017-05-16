<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mLogin extends Model{
		public function __construct(){
			parent::__construct();
			
		}
       	
       	public function get_user($mail,$pass)
        {
            $sql='Select * From userweb Where mail="'.$mail.'" AND password="'.$pass.'"';
            $this->query($sql);
            $this->execute();
            $res=$this->execute();
            $result="";
            if($res){
                $result=$this->resultset();
            }
            return $result;
        }
		
	}