<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\captcha\Captcha;
	use think\Request;
	use think\Session;
	use app\front\model\Customer as CustomerModel;

	class Register extends Controller {
		
		public function Index() {
			return $this->fetch();
		}

		public function verify() {
			// $captcha = new Captcha();
			// $captcha->imageH = 32;
			// $captcha->imageW = 100;
			// $captcha->length = 4;
			// $captcha->useNoise = false;
			// $captcha->fontSize = 14;
			// return $captcha->entry();
			$config =    [
    		// 验证码字体大小
				'fontSize'    =>    30,    
    		// 验证码位数
				'length'      =>    3,   
    		// 关闭验证码杂点
				'useNoise'    =>    false, 
			];
			$captcha = new Captcha($config);
			return $captcha->entry();			
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