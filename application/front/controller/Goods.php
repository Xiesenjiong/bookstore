<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Book as BookModel;
	use app\front\model\Category as CategoryModel;

	class Goods extends Controller {
		
		public function index($bookId) {			
			$info = BookModel::get($bookId)->toarray();
			$categoryId = BookModel::where(['bookId' => $bookId])->value('categoryId');
			$cateName = CategoryModel::where(['categoryId' => $categoryId])->value('cateName');
			$this->assign('info',$info);
			$this->assign('cateName',$cateName);
			return $this->fetch();
		}
	}
 ?>