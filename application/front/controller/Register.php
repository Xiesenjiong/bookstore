<?php 
	namespace app\front\controller;
	use think\Controller;
	use org\Verify;

	class Register extends Controller {
		
		public function Index() {
			return $this->fetch();
		}

		public function verify() {
			$verify = new Verify();
			$verify->imageH = 32;
			$verify->imageW = 100;
			$verify->length = 4;
			$verify->useNoise = false;
			$verify->fontSize = 14;
			return $verify->entry();
		}
	}
 ?>