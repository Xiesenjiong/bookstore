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
			$list = CustomerModel::all(['isdelete' => 0]);
			$count = count($list);
			$this->assign('count', $count);
			$this->assign('list', $list);

			return $this->fetch();
		}

		public function add() {
			return $this->fetch();
		}

		public function delete() {
			$list = CustomerModel::all(['isdelete' => 1]);
			$count = count($list);
			$this->assign('count', $count);
			$this->assign('list', $list);

			return $this->fetch();
		}

		public function edit($customerId) {
			// echo $customerId;
			$info = CustomerModel::get($customerId)->toarray();
			// dump($info);
			$this->assign('info', $info);
			
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

		public function setStatus($customerId) {
			$customer = CustomerModel::get($customerId);
			if ($customer->status == 1) {
				$customer->status = 0;
			} else {
				$customer->status = 1;
			}
			$customer->save();

			return "成功";
		}

		public function isDelete($customerId) {
			$customer = CustomerModel::get($customerId);
			if ($customer->isdelete == 1) {
				$customer->isdelete = 0;
			} else {
				$customer->isdelete = 1;
			}
			$customer->save();

			return "成功";
		}
	}
 ?>