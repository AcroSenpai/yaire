<?php
	namespace X\Sys;

	use X\Sys\Registry;
	/**
	*
	*   Controller: the base controller
	*     in MVC systems
	*
	*   Allows pass data between views and controller
	*   and between models and controllers
	*
	**/
	class Controller{
		protected $model;
		protected $view;
		protected $params;
		protected $dataView=array();// mechanism for passing data to views
		protected $dataTable=array();
		protected $conf; //object configuration data
		protected $app; //app version and title data
                protected $assets; // css, img, fonts and js
		
		function __construct($params=null,$dataView=null){
			$this->params=$params;
			$this->conf=Registry::getInstance();
			$this->app=(array)$this->conf->app;
                        $this->assets=(array)$this->conf->assets;
                        $this->addData($this->ext_assets($this->assets));
			$this->addData($this->app);
			
		}
                /**
                 * Updates assets array with path
                 * 
                 * @param array $array
                 * @return array
                 */
                function ext_assets($array){
                    $rs_array=array();
                    foreach ($array as $key=>$value){
                        $rs_array[$key]=$this->into_assets($value);
                    }
                    return $rs_array;
                }
                /**
                 * prepares assets path
                 * 
                 * @param string $resource
                 * @return string
                 */
                function into_assets($resource){
                    $ext= explode('.',$resource);
                    
                    switch($ext[1]){
                        case 'css':$string='pub/css/';
                            break;
                        case 'js':$string='pub/js/';
                            break;
                        case 'wof':$string='pub/font/';
                            break;
                        case 'ttf':$string='pub/font/';
                            break;
                        case 'png':$string='pub/img/';
                            break;
                        case 'jpg':$string='pub/img/';
                            break;
                        default :
                            break;
        
                    }
                    
                        return $string.$resource;
                    
                }
		/**
		 *   Merge two arrays
		 * 
		 *   Merge arrays in dataView array
		 * 	to use then lika variables in the template
		 *   @param array $array
		 * 
		 * 
		 * */
		protected function addData($array){
			if (is_array($array)){
				if ($this->is_single($array)&& is_array($this->dataView)){
					$this->dataView=array_merge($this->dataView,$array);
				}else{
					$this->dataTable=$array;
				}
			}
			else{
				$this->dataView=$array;
			}

		}
		/**
		 *  convert rows form multiple row array to  linnear
		 *  array data
		 * @param $mdata  array
		 * @return $result array
		 * 
		 * 
		 * */
		protected function multipleData($mdata){
			//
			for($i=0;$i<count($mdata);$i++){
				foreach ($mdata[$i] as $key => $value) {
					$result[$key.$i]=$value;
				}
			}
			return $result;
		}
		/**
		 *  Checks if array is single or multidimensional
		 *  @param $data array
		 * 	@return boolean
		 * 
		 * */
		protected function is_single($data){
				foreach ($data as  $value) {
					if (is_array($value)){
						return false;
					} 
					else {
						return true;
					}
				}
			}
				

		
		function error(){
            $this->msg='Error. Action not defined';
         }
		
		function ajax($output){
			ob_clean();
			if(is_array($output)){
				echo json_encode($output);
			}
		}

	}