<?php 
	namespace app\front\controller;
	use think\Controller;

	/**
	 * 
	 */
	class Information extends Controller {
		
		public function Index() {
			return $this->fetch();
		}
	}
 ?>