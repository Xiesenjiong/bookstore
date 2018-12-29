<?php 
	namespace app\front\controller;
	use think\Controller;

	class Index extends Controller {
		
		public function Index() {
			return $this->fetch();
		}
	}
 ?>