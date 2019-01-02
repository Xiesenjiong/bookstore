<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Session;
	use app\front\model\Order as OrderModel;
	use app\front\model\Cart as CartModel;
	use app\front\model\Address as AddressModel;

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

		public function create($itemId, $addressId) {
			$cart = CartModel::get($itemId);
			$address = AddressModel::get($addressId);
			$model = new OrderModel;
			$model->customerId = Session::get('customerId');
			$model->name = $address->name;
			$model->phone = $address->phone;
			$model->address = $address->address;
			$model->zipCode = $address->zipCode;
			$model->price = $cart->price;
			$model->actualPrice = $cart->price;
			dump($model);
			// $model->save();
		}
	}
 ?>