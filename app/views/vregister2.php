<?php

	namespace X\App\Views;
	use \X\Sys\View;

	class vRegister2 extends View{

		function __construct($dataView,$dataTable=null){
			parent::__construct($dataView,$dataTable);
			$this->output= $this->render('tregister2.php');

		}

	}
