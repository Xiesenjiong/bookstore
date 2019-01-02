<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Book as BookModel;
	use app\front\model\Category as CategoryModel;

	class Booklist extends Controller {
		
		public function index($categoryId) {
			$list = BookModel::where(['isdelete' => 0, 'categoryId' => $categoryId])->select();
			$catename = CategoryModel::where(['categoryId' => $categoryId])->value('cateName');
			$this->assign('list',$list);
			$this->assign('catename',$catename);
			return $this->fetch();
		}
	}
 ?>