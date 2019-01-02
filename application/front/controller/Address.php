<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Session;
	use app\front\model\Address as AddressModel;

	/**
	 * 
	 */
	class Address extends Controller {
				
		public function index() {
			$customerId = Session::get('customerId');
			$list = AddressModel::all(['customerId' => $customerId]);

			$this->assign('list', $list);
			return $this->fetch();
		}

		public function edit($addressId) {
			$info = AddressModel::get($addressId)->toarray();
			// dump($info);

			$this->assign('info', $info);
			return $this->fetch();
		}

		public function save($addressId) {
			$data = Request::instance()->post();
			// dump($data);
			$model = new AddressModel($data);

			//保存到数据库
			$model->allowField(true)->save();
		}

		public function delete($addressId) {
			$model = AddressModel::get($addressId);
			$model->delete();
		}
	}
 ?>