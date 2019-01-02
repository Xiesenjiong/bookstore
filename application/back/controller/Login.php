<?php

    namespace app\back\controller;

    use think\Controller;
    use think\Request;
    use think\Session;
    use app\back\model\Admin as AdminModel;

    class Login extends Controller {

        public function index() {
            return $this->fetch();
        }


        public function doLogin() {
            $account = Request::instance()->param('account');
            $password = Request::instance()->param('password');

            $admin = AdminModel::get(['account' => $account]);

            //检查用户名
            if (empty($admin)) {
                $this->error('用户名错误');
            }

            //检查密码
            if (md5($password) != $admin->password) {
                $this->error('密码错误');
            }
            Session::set('account', $account);
            $this->redirect('index/index');
        }

        public function doLogout() {
            //清除Session登录状态
            Session::clear();
            $this->redirect('index');
        }

}
