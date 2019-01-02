<?php 
	namespace app\front\controller;
	use think\Controller;
	use app\front\model\Cart as CartModel;

	/**
	 * 
	 */
	class Cart extends Controller {
		
		public function Index() {

			return $this->fetch();
		}
	}
 ?>