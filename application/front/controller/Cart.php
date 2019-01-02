<?php 
	namespace app\front\controller;
	use think\Controller;
	use app\front\model\Orderitem as OrderitemModel;
	use app\front\model\Cart as CartModel;

	/**
	 * 购物车
	 */
	class Cart extends Controller {
		
		public function Index() {
			$customerId = Session::get('customerId');
			$list = CartModel::all(['customerId' => $customerId, 'orderId' => 0]);

			$this->assign('list', $list);
			return $this->fetch();
		}

		public function Cartlist(){
			$list = OrderitemModel::select();
			$this->assign('list',$list);
			return $this->fetch();
		}
	}
 ?>