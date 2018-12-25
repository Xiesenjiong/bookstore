<?php 
	namespace app\front\controller;
	use think\Controller;

	class Login extends Controller {
		
		public function index() {
			return $this->fetch();
		}
	}
 ?>