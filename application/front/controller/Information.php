<?php 
	namespace app\front\controller;
	use think\Controller;
	use app\front\model\Customer as CustomerModel;

	/**
	 * 个人信息页面
	 */
	class Information extends Controller {
		
		public function Index() {
			return $this->fetch();
		}
	}
 ?>