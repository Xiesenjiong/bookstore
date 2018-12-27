<?php 
	namespace app\front\controller;
	use think\Controller;

	/**
	 * 
	 */
	class Address extends Controller {
		
		public function address() {
			return $this->fetch();
		}
	}
 ?>