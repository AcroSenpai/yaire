<?php

	namespace X\Sys;

	class DB extends \PDO{
		static $instance;

		public function __construct(){
			$config=Registry::getInstance();
                        //determines the correct environment in DB
                        $strdbconf='dbconf_'.env;
			$dbconf=(array)$config->$strdbconf;
                      
			$dsn=$dbconf['driver'].':host='.$dbconf['dbhost'].';dbname='.$dbconf['dbname'];
		 	$usr=$dbconf['dbuser'];
		 	$pwd=$dbconf['dbpass'];
			parent::__construct($dsn,$usr,$pwd);
		}

		static function singleton(){
			if(!(self::$instance instanceof self)){
				self::$instance=new self();
			}
			return self::$instance;
		}
	}