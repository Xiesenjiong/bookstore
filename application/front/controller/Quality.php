<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Book as BookModel;
	use app\front\model\Category as CategoryModel;

	class Quality extends Controller {

		public function index() 
		{
			$literlist = BookModel::where(['isdelete' => 0, 'categoryId' => 10])->paginate(6);			
			$childlist = BookModel::where(['isdelete' => 0, 'categoryId' => 1])->paginate(6);			
			$this->assign('childlist',$childlist);			
			$this->assign('literlist',$literlist);			
			return $this->fetch();
		}
	}
 ?>