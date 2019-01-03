<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Session;
	use app\front\model\Cart as CartModel;
	use app\front\model\Book as BookModel;

	/**
	 * 购物车
	 */
	class Cart extends Controller {
		
		public function Index() {
			// if (condition) {
			// 	# code...
			// } else {
			// 	# code...
			// }
			
			$customerId = Session::get('customerId');
			$list = CartModel::all(['customerId' => $customerId, 'orderId' => 0]);
			

			$this->assign('list', $list);
			return $this->fetch();
		}

		public function addToCart() {
			$customerId = Session::get('customerId');
			$bookId = Request::instance()->post('bookId');
			$book = BookModel::get($bookId);

			dump($book);
		}
	}
 ?>