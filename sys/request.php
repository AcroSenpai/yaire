<?php
	namespace X\Sys;
	/**
	*
	*	Request: Translate URL
	*   to controller, action
	*   and parameters
	*	@author: Toni <t.jimenez@escolesnuria.cat>
	*	@package: sys
	*
	**/
	
	class Request{
		static private $query=array();

		static function exploding(){
			$array_query=explode('/',$_SERVER['REQUEST_URI']);
			
			array_shift($array_query);
			if(end($array_query)==""){
				array_pop($array_query);
			}
			//si es base no fem res,pero si
			// no lo es fem array_shift una altra vegada
			$dir=dirname($_SERVER['PHP_SELF']);
                       
			if($array_query){
                            if($dir=='/'.$array_query[0]){
                                    array_shift($array_query);
                            }		
                        }			
			self::$query=$array_query;
			
		}

		static function getVariable(){
			return array_shift(self::$query);
		}

		static function getParams(){
			if(count(self::$query)>0){
				if((count(self::$query)%2)==0){
					for($i=0;$i<count(self::$query);$i++){
						if(($i%2)==0){
							$key[]=self::$query[$i];
						}
						else{
							$value[]=self::$query[$i];
						}
					}
					$result=array_combine($key, $value);
					return $result;
				}
			}
		}

	}