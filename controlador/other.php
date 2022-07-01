	<?php
	
	class otherController {
		
		public function __construct(){
			require_once "modelo/otherModel.php";
		}
		
		public function index(){
			
			require_once "vista/other.php";	
		}

		public function addOther(){
               require_once "vista/addOther.php";
		}

		public function editOthers(){
               require_once "vista/editOther.php";
		}
		
	}
?>
