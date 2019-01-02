<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Book as BookModel;

	class Index extends Controller {
		
		public function Index() {
			$list = BookModel::where(['isdelete'=>0])->paginate(6);
			$this->assign('list', $list);			
			return $this->fetch();
		}
	}
 ?>