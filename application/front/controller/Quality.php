<?php 
	namespace app\front\controller;
	use think\Controller;
	class Quality extends Controller {
		
		public function index() 
		{
			return $this->fetch();
		}
	}
 ?>