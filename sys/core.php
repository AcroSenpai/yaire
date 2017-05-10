<?php
	namespace X\Sys;
	
	/**
	* Core: Front Controller
	*
	*  @author: toni
	*  @package:sys
	*
	*
	**/

	use X\Sys\Request;
	use X\App\Controllers\Error;

	class Core{
		static private $controller;
		static private $action;
		static private $params;


		public  static function init(){
			
			Request::exploding();
			//$arrayquery preparat per extreure controlador

			self::$controller=Request::getVariable();
			
			self::$action=Request::getVariable();
			
			self::$params=Request::getParams();
			
			// Fer routing			
			self::router();
		}
		/**
		 * 
		 *  Obtaining file controller
		 * 
		 * 
		 *  @return string $fileroute
		 * 
		 * */
		static function getFileContAct(){
			self::$controller=(self::$controller!="")?self::$controller:'home';
			self::$action=(self::$action!="")?self::$action:'home';
			//trobar controladors
			$filename=strtolower(self::$controller).'.php';
			$fileroute=APP.'controllers'.DS.$filename;
			return $fileroute;

		}


		/**
		* router: Looks for controller and action
		*
		*
		*
		*/
		static function router(){
			
			$fileroute=self::getFileContAct();
		
			if(is_readable($fileroute)){
				$contr_class='\X\App\Controllers\\'.ucfirst(self::$controller);
				self::$controller=new $contr_class(self::$params);
				// cal cridar ara l'accio
				if (is_callable(array(self::$controller,self::$action))){
					call_user_func(array(self::$controller,self::$action));
				}
				else{ 
					 self::$action='error';
					 call_user_func(array(self::$controller,self::$action));}
			}else{
				self::$controller=new Error(self::$params);
			}
		}
	}
