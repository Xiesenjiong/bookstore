<?php
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Customer as CustomerModel;

	/**
	 * 	编辑个人信息页面
	 */
	class Set extends Controller
	{
		public function set()
		{
			$account = Session::get('account');
			$customer = CustomerModel::get(['account' => $account, 'isdelete' => 0])->toarray();
			$this->assign('customer',$customer);
			return $this->fetch();
		}
	}
?>
