<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Book as BookModel;

	class Goods extends Controller {
		
		public function index() {			
			$list = BookModel::where(['isdelete'=>0]);
			$this->assign('list', $list);
			return $this->fetch();
		}
	}
 ?>