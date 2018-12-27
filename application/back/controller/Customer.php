<?php 
	namespace app\back\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\back\model\Customer as CustomerModel;

	/**
	 * 
	 */
	class Customer extends Controller {

		// public function _initialize() {
  //   		//初始化的时候检查登录状态
  //   		if (!Session::has('account')) {
  //   			$this->redirect('login/index');
  //   		}
  //   	}
		
		public function index() {
			$list = CustomerModel::where(['isdelete' => 0])->paginate(5);
			$num = count($list);
			for ($i=0; $i < $num; $i++) { 
				if ($list[$i]['sex'] == 1) {
					$list[$i]['sex'] = "男";
				} elseif ($list[$i]['sex'] == 2) {
					$list[$i]['sex'] = "女";
				}
			}
			$option = array(array('title' => '启用', 'icon' => '&#xe62f;'), array('title' => '停用', 'icon' => '&#xe601;'));

			$this->assign('list', $list);
			$this->assign('num', $num);
			$this->assign('option', $option);
			return $this->fetch();
		}

		public function add() {
			return $this->fetch();
		}

		public function delete() {
			$list = CustomerModel::where(['isdelete' => 1])->paginate(5);
			$num = count($list);
			for ($i=0; $i < $num; $i++) { 
				if ($list[$i]['sex'] == 1) {
					$list[$i]['sex'] = "男";
				} elseif ($list[$i]['sex'] == 2) {
					$list[$i]['sex'] = "女";
				}
			}

			$this->assign('list', $list);
			$this->assign('num', $num);
			return $this->fetch();
		}
		
		public function edit($customerId) {
			$info = CustomerModel::get($customerId)->toarray();
			$this->assign('info', $info);
			
			return $this->fetch();
		}

		public function save() {
			$data = Request::instance()->post();
			$data['password'] = md5($data['password']);
			// dump($data);
			$model = new CustomerModel($data);

			//保存到数据库
			$model->allowField(true)->save();
		}

		public function update() {
			$data = Request::instance()->post();
			$model = CustomerModel::get($data['customerId']);
			if ($model->password != $data['password']) {
				$model->password = md5($data['password']);
			}
			$model->phone = $data['phone'];
			$model->email = $data['email'];
			$model->save();
		}

		public function setStatus() {
			$customerId = $_POST['customerId'];
			$model = CustomerModel::get($customerId);
			if ($model->status == 1) {
				$model->status = 0;
			} else {
				$model->status = 1;
			}
			$model->save();
		}

		public function isDelete() {
			$customerId = $_POST['customerId'];
			$model = CustomerModel::get($customerId);
			if ($model->isdelete == 1) {
				$model->isdelete = 0;
			} else {
				$model->isdelete = 1;
			}
			$model->save();
		}
	}
 ?>