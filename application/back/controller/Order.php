<?php 
	namespace app\back\controller;
	use think\Controller;
	use think\Session;
	use app\back\model\Order as OrderModel;


	/**
	 * Order控制器
	 */
	class Order extends Controller {
		
		public function index() {
			$list = OrderModel::paginate(5);
			$this->assign('list',$list);
			return $this->fetch();
		}

		public function add() {
			return $this->fetch();
		}
	}
 ?>