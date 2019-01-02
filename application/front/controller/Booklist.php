<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Book as BookModel;
	use app\front\model\Category as CategoryModel;

	class Booklist extends Controller {
		
		public function index() {			
			$list = BookModel::where(['isdelete' => 0])->select();
			$this->assign('list',$list);
			return $this->fetch();
		}
	}
 ?>