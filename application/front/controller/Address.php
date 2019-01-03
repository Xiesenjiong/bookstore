<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Address as AddressModel;

	/**
	 * 收货地址
	 */
	class Address extends Controller {
				
		public function index() {
			$customerId = Session::get('customerId');
			$list = AddressModel::all(['customerId' => $customerId]);

			$this->assign('list', $list);
			return $this->fetch();
		}

		public function add(){
			return $this->fetch();
		}

		public function edit($addressId){
			$info = AddressModel::get($addressId)->toarray();
			$this->assign('info', $info);
			
			return $this->fetch();
		}

		public function update(){
			$data = Request::instance()->post();
			$model = AddressModel::get($data['addressId']);			
			$model->name = $data['name'];
			$model->phone = $data['phone'];
			$model->address = $data['address'];
			$model->zipCode = $data['zipCode'];
			$model->save();
		}

		public function save(){
			$data = Request::instance()->post();			
			$model = new AddressModel($data);
      		$model->customerId = Session::get('customerId');

			//保存到数据库
			$model->allowField(true)->save();
		}

		public function delete($addressId) {
			$model = AddressModel::get($addressId);
			$model->delete();
		}
	}
 ?>