<?php 
	namespace app\front\controller;
	use think\Controller;

	/**
	 * 
	 */
	class Cart extends Controller {
		
		public function Index() {
			return $this->fetch();
		}
	}
 ?>