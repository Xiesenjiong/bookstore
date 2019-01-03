<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Session;
	use app\front\model\Order as OrderModel;
	use app\front\model\Cart as CartModel;
	use app\front\model\Address as AddressModel;
	use app\front\model\Book as BookModel;

	/**
	 * 订单页面
	 */
	class Order extends Controller {
		
		public function index() {
			$list = OrderModel::all();

			$this->assign('list', $list);
			return $this->fetch();
		}

		public function waitpay(){
			$list = OrderModel::all(['orderstate' => 1]);

			$this->assign('list', $list);
			return $this->fetch();
		}

		public function waitsend(){
			$list = OrderModel::all(['orderstate' => 2]);

			$this->assign('list', $list);
			return $this->fetch();
		}

		public function beensend(){
			$list = OrderModel::all(['orderstate' => 3]);

			$this->assign('list', $list);
			return $this->fetch();
		}

		public function waitcomment(){
			$list = OrderModel::all(['orderstate' => 0]);

			$this->assign('list', $list);
			return $this->fetch();			
		}

		public function buy($bookId, $num, $addressId) {
			$book = BookModel::get($bookId);
			$address = AddressModel::get($addressId);

			$model = new OrderModel;
			$model->customerId = Session::get('customerId');
			$model->name = $address->name;
			$model->phone = $address->phone;
			$model->address = $address->address;
			$model->zipCode = $address->zipCode;
			$model->price = $book->price * $num;
			$model->actualPrice = $book->price * $num;
			//保存订单到数据库
			// $model->save();
			dump($model);

			$item = new CartModel;
			$item->customerId = Session::get('customerId');
			$item->orderId = $model->orderId;
			$item->bookId = $book->bookId;
			$item->booktitle = $book->title;
			$item->bookpress = $book->press;
			$item->bookPrice = $book->price;
			$item->num = $num;
			$item->bookId = $book->price * $num;
			//保存订单项目到数据库
			// $item->save();
			dump($item);
		}

		// public function create($itemId, $addressId) {
		// 	$cart = CartModel::get($itemId);
		// 	$address = AddressModel::get($addressId);
		// 	$model = new OrderModel;
		// 	$model->customerId = Session::get('customerId');
		// 	$model->name = $address->name;
		// 	$model->phone = $address->phone;
		// 	$model->address = $address->address;
		// 	$model->zipCode = $address->zipCode;
		// 	$model->price = $cart->price;
		// 	$model->actualPrice = $cart->price;
			
		// 	$model->save();
		// 	dump($model->orderId);
		// }
	}
 ?>