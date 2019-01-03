<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use org\Verify;
	use app\front\model\Customer as CustomerModel;

	class Register extends Controller {
		
		public function Index() {
			return $this->fetch();
		}

		public function verify() {
			$verify = new Verify();
	        $verify->imageH = 32;
	        $verify->imageW = 100;
	        $verify->length = 4;
	        $verify->useNoise = false;
	        $verify->fontSize = 14;
	        return $verify->entry();			
		}

		public function sendSms()
		{
			$tele   = input('post.phone','','strip_tags');
        	//创蓝
			$api = "http://sms.quweiziyuan.cn/sms.php";
			$random = mt_rand(100000, 999999);
			$data = array(
				'key' => 'wein07699',
				'tele' => "{$tele}",
				'code' => "{$random}"
			);

        	// $ret = post($api, $data);
        	// echo $ret;
			// session('tellcode', $random);

			$result = [
				'status' => true,
				'msg' => 'ok',
				'code' => $random
			];
			$this->assign('smscode',$random);
			echo json_encode($result);
		}

		public function save(){
			$data = Request::instance()->post();
			$data['password'] = md5($data['password']);		
			$model = new CustomerModel($data);

			//保存到数据库
			$model->allowField(true)->save();
		}
	}
?>