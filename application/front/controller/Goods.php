<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Book as BookModel;

	class Goods extends Controller {
		
		public function index($bookId) {			
			$info = BookModel::get($bookId)->toarray();
			$this->assign('info',$info);
			return $this->fetch();
		}
	}
 ?>