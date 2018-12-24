<?php 
	namespace app\back\controller;
	use think\Controller;
	use think\Request;
	use app\back\model\Customer as CustomerModel;

	/**
	 * 
	 */
	class Customer extends Controller {
		
		public function index() {
			$model = new CustomerModel;
			$list = $model->all();
			$this->assign('list', $list);

			return $this->fetch();
		}

		public function add() {
			return $this->fetch();
		}

		public function delete() {
			return $this->fetch();
		}

		public function saveCustomer() {
			$account = Request::instance()->param('account');
			$password = Request::instance()->param('password');
			$name = Request::instance()->param('name');
			$sex = Request::instance()->param('sex');
			$phone = Request::instance()->param('phone');
			$email = Request::instance()->param('email');
		}
	}
 ?>