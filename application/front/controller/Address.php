<?php 
	namespace app\front\controller;
	use think\Controller;

	/**
	 * 
	 */
	class Address extends Controller {
		
		public function index() {
			return $this->fetch();
		}
	}
 ?>