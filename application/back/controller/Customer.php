<?php 
	namespace app\back\controller;
	use think\Controller;
	use app\back\model\Customer as CustomerModel;

	/**
	 * 
	 */
	class Customer extends Controller {
		
		public function index() {
			$model = new CustomerModel;
			$list = $model->list();
			$this->assign('list', $list);

			return $this->fetch();
		}

		public function add() {
			return $this->fetch();
		}

		public function delete() {
			return $this->fetch();
		}
	}
 ?>