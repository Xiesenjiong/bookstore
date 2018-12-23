<?php 
	namespace app\back\controller;
	use think\Controller;
	use app\back\model\Book as BookModel;

	/**
	 * 
	 */
	class Book extends Controller {
		
		public function index() {
			$model = new BookModel;
			$list = $model->list();
			dump($list);
			$this->assign('list', $list);

			// return $this->fetch();
		}
	}
 ?>