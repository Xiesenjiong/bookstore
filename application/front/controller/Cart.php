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
			$bookId = Request::instance()->post('bookId');
			$book = BookModel::get($bookId);
			// dump($book);
			
			$customerId = Session::get('customerId');
			$cart = CartModel::get(['customerId' => $customerId, 'bookId' => $bookId, 'orderId' => 0]);
			if ($cart) {
				$cart->num++;
				$cart->price = $book->price * $cart->num;
			} else {
				$cart = new CartModel;
				$cart->customerId = $customerId;
				$cart->bookId = $book->bookId;
				$cart->booktitle = $book->title;
				$cart->bookpress = $book->press;
				$cart->bookprice = $book->price;
				$cart->num = 1;
				$cart->price = $book->price;
			}
			$cart->save();
		}
	}
 ?>