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
			$num = count($model->select());
			$list = $model->paginate(5);
			$this->assign('list', $list);
			$this->assign('num', $num);

			return $this->fetch();
		}

		public function add() {
			return $this->fetch();
		}

		public function delete() {
			return $this->fetch();
		}
		
		public function edit($customerId) {
			echo $customerId;
			
			return $this->fetch();
		}

		public function save() {
			$customer = Request::instance()->post();
			dump($customer);
			$model = new CustomerModel($customer);

			//保存到数据库
			$model->save();

			return "成功";
		}

		public function update() {
			$customer = Request::instance()->post();
			dump($customer);
		}
	}
 ?>