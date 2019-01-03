<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Session;
	use app\front\model\Customer as CustomerModel;
	use app\front\model\Order as OrderModel;

	/**
	 * 个人信息页面
	 */
	class Information extends Controller {
		
		public function Index() {
			$customerId = Session::get('customerId');
			$waitpaylist = OrderModel::all(['customerId' => $customerId, 'orderstate' => 1]);
			$waitsendlist = OrderModel::all(['customerId' => $customerId, 'orderstate' => 2]);
			$beensendlist = OrderModel::all(['customerId' => $customerId, 'orderstate' => 3]);
			$waitcommentlist = OrderModel::all(['customerId' => $customerId, 'orderstate' => 0]);
					
			$waitpayNum = count($waitpaylist);
			$waitsendNum = count($waitsendlist);
			$beensendNum = count($beensendlist);
			$waitcommentNum = count($waitcommentlist);
			$this->assign('waitpayNum', $waitpayNum);
			$this->assign('waitsendNum', $waitsendNum);
			$this->assign('beensendNum', $beensendNum);
			$this->assign('waitcommentNum', $waitcommentNum);
			return $this->fetch();
		}
	}
 ?>