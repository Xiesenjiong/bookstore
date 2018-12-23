<?php

    namespace app\back\controller;

    use think\Controller;
    use think\Session;
    use app\back\model\Customer as CustomerModel;
    use app\back\model\Book as BookModel;

    class Index extends Controller {

    	public function _initialize() {
    		//初始化的时候检查登录状态
    		if (!Session::has('account')) {
    			$this->redirect('login/index');
    		}
    	}

        public function index() {
            return $this->fetch();
        }

        public function welcome() {
        	$time = date('Y-m-d H:i:s');

        	$count = array(
        		'会员数' => count(CustomerModel::all()),
        		'书籍数' => count(BookModel::all()),
        		'分类数' => count(CustomerModel::all()),
        		'待处理订单数' => count(CustomerModel::all())
        	);

        	// mysql_connect("127.0.0.1","root","password");
        	// echo mysql_get_server_info();
			$info = array(
				'操作系统' => PHP_OS,
				'运行环境' => $_SERVER["SERVER_SOFTWARE"],
				'PHP运行方式' => php_sapi_name(),
	            'PHP版本' => PHP_VERSION,
	            // 'MySQL版本'=>$mysql,
				'ThinkPHP版本' => THINK_VERSION,
				'上传附件限制' => ini_get('upload_max_filesize'),
				'执行时间限制' => ini_get('max_execution_time').'秒',
				'服务器时间' => date("Y年n月j日 H:i:s"),
				'服务器域名' => $_SERVER['SERVER_NAME'],
	            '服务器IP' => gethostbyname($_SERVER['SERVER_NAME']),
				'剩余空间' => round((@disk_free_space(".")/(1024*1024)),2).'M',
				);

			$this->assign('time', $time);
			$this->assign('count', $count);
			$this->assign('info', $info);
			return $this->fetch();
        }
}
