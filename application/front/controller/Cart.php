<?php 
	namespace app\front\controller;
	use think\Controller;
	use app\front\model\Orderitem as OrderitemModel;

	/**
	 * 购物车
	 */
	class Cart extends Controller {
		
		public function Index() {
			return $this->fetch();
		}

		public function Cartlist(){
			$list = OrderitemModel::select();
			$this->assign('list',$list);
			return $this->fetch();
		}
	}
 ?>