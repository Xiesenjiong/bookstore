<?php
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Customer as CustomerModel;

	/**
	 * 	编辑个人信息页面
	 */
	class Setinfo extends Controller
	{
		public function index()
		{
			$account = Session::get('account');
			$customer = CustomerModel::get(['account' => $account, 'isdelete' => 0])->toarray();
			$this->assign('customer',$customer);
			return $this->fetch();
		}

		public function update(){
			$data = Request::instance()->post();
			$model = CustomerModel::get($data['customerId']);			
			$model->phone = $data['phone'];
			$model->name = $data['name'];
			$model->email = $data['email'];
			// $model->sex = $data['sex'];
			$model->save();
		}
	}
?>
