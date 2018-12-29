<?php 
	namespace app\front\controller;
	use think\Controller;

	class Collect extends Controller {
		
		public function index() {
			return $this->fetch();
		}
	}
 ?>