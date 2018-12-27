<?php 
	namespace app\front\controller;
	use think\Controller;

	/**
	 * 订单页面
	 */
	class Order extends Controller {
		
		public function index() {
			return $this->fetch();
		}

		public function waitpay(){
			return $this->fetch();
		}

		public function waitsend(){
			return $this->fetch();
		}

		public function beensend(){
			return $this->fetch();
		}

		public function waitcomment(){
			return $this->fetch();			
		}
	}
 ?>