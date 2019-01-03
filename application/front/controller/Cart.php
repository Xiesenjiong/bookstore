<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Session;
	use think\Request;
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
			// dump($bookId);
			$num = Request::instance()->post('num');
			$book = BookModel::get($bookId);
			// dump($book);
			$customerId = Session::get('customerId');
			// $customerId = 1;
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
				$cart->num = $num;
				$cart->price = $book->price;
			}
			$cart->save();
		}

		public function changeNum() {
			$itemId = Request::instance()->post('itemId');
			$option = Request::instance()->post('option');
			$item = CartModel::get($itemId);
			if ($option == '加') {
				$item->num++;
				$item->price = $item->bookprice * $item->num;
			} elseif ($option == '减') {
				$item->num--;
				$item->price = $item->bookprice * $item->num;
			}
			$item->save();
		}

		public function del() {
			$itemId = Request::instance()->post('itemId');
			$model = CartModel::get($itemId);
			$model->delete();
		}
	}
 ?>