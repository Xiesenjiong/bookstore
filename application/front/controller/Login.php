<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Customer as CustomerModel;

	class Login extends Controller {
		
		public function index() {
			return $this->fetch();
		}

		public function doLogin() {
			$account = Request::instance()->param('account');
            $password = Request::instance()->param('password');

            $customer = CustomerModel::get(['account' => $account, 'isdelete' => 0]);

            //检查用户名
            if(empty($customer)) {
                $this->error('用户不存在');
            }

            //检查密码
            if(md5($password) != $customer->password) {
                $this->error('密码错误');
            }

            //检查状态
            if($customer->status == 0) {
                $this->error('该账号已被禁用');
            }

            Session::set('account', $account);
            Session::set('customerId', $customer->customerId);
            $this->redirect('index/index');
		}

        public function logOut(){
            Session::set('account', null);
            Session::set('customerId', null);

            $this->redirect('index/index');
        }
	}
 ?>