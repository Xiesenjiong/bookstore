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
			$customerId = Session::get('customerId');
			$list = OrderModel::where(['customerId' => $customerId])->order('orderId desc')->paginate(5);
			$num = count($list);

			$this->assign('num', $num);
			$this->assign('list', $list);
			return $this->fetch();
		}

		public function waitpay(){
			$customerId = Session::get('customerId');
			$list = OrderModel::where(['customerId' => $customerId, 'orderstate' => 1])
					->order('orderId desc')->paginate(5);
			$num = count($list);

			$this->assign('num', $num);
			$this->assign('list', $list);
			return $this->fetch();
		}

		public function waitsend(){
			$customerId = Session::get('customerId');
			$list = OrderModel::where(['customerId' => $customerId, 'orderstate' => 2])
					->order('orderId desc')->paginate(5);
			$num = count($list);

			$this->assign('num', $num);
			$this->assign('list', $list);
			return $this->fetch();
		}

		public function beensend(){
			$customerId = Session::get('customerId');
			$list = OrderModel::where(['customerId' => $customerId, 'orderstate' => 3])
					->order('orderId desc')->paginate(5);
			$num = count($list);

			$this->assign('num', $num);
			$this->assign('list', $list);
			return $this->fetch();
		}

		public function waitcomment(){
			$customerId = Session::get('customerId');
			$list = OrderModel::where(['customerId' => $customerId, 'orderstate' => 0])
					->order('orderId desc')->paginate(5);
			$num = count($list);

			$this->assign('num', $num);
			$this->assign('list', $list);
			return $this->fetch();		
		}

		public function orderbox($orderId) {
			$order = OrderModel::get(['orderId' => $orderId]);
			$list = CartModel::all(['orderId' => $orderId]);
			$price = 0.0;
			for ($i=0; $i < count($list); $i++) { 
				$price+=$list[$i]->price;
			}
			// dump($list);

			$this->assign('order', $order);
			$this->assign('list', $list);
			$this->assign('price', $price);
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
			$model->save();
			// dump($model);

			$item = new CartModel;
			$item->customerId = Session::get('customerId');
			$item->orderId = $model->orderId;
			$item->bookId = $book->bookId;
			$item->booktitle = $book->title;
			$item->bookpress = $book->press;
			$item->bookprice = $book->price;
			$item->num = $num;
			$item->price = $book->price * $num;
			//保存订单项目到数据库
			$item->save();
			// dump($item);
			
			return $model->orderId;
		}

		public function orderState($orderId, $state) {
			$order = OrderModel::get($orderId);
			$order->orderstate = $state;
			$order->save();
		}
	}
 ?>