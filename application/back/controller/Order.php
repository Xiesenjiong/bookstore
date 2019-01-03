<?php 
	namespace app\back\controller;
	use think\Controller;
	use think\Session;
	use think\Request;
	use app\back\model\Order as OrderModel;


	/**
	 * Order控制器
	 */
	class Order extends Controller {
		
		public function index() {
			$list = OrderModel::paginate(5);
			$num = count($list);
			$this->assign('list',$list);
			$this->assign('num',$num);
			return $this->fetch();
		}

		public function add() {
			return $this->fetch();
		}

		public function edit($orderId){
			$info = OrderModel::get($orderId)->toarray();
			$this->assign('info',$info);
			return $this->fetch();
		}

		public function detail($orderId){
			$info = OrderModel::get($orderId)->toarray();
			$this->assign('info',$info);
			return $this->fetch();
		}

		public function update(){
			$data = Request::instance()->post();
			$model = OrderModel::get($data['orderId']);			
			$model->name = $data['name'];
			$model->phone = $data['phone'];
			$model->address = $data['address'];
			$model->zipCode = $data['zipCode'];
			$model->actualPrice = $data['actualPrice'];
			$model->orderstate = $data['orderstate'];
			$model->kuaidi = $data['kuaidi'];			
			
			$model->save();
		}

		public function save(){
			$data = Request::instance()->post();
			$model = new OrderModel($data);

			//保存到数据库
			$model->allowField(true)->save();	
		}
	}
 ?>