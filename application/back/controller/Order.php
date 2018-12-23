<?php 
	namespace app\back\controller;
	use think\Controller;

	/**
	 * Order控制器
	 */
	class Order extends Controller {
		
		public function index() {
			return $this->fetch();
		}

		public function add() {
			return $this->fetch();
		}
	}
 ?>