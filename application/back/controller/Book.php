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
			$list = $model->paginate(5);
			$num = count($model->select());

			$this->assign('list', $list);
			$this->assign('num', $num);

			return $this->fetch();
		}

		public function add(){
			return $this->fetch();
		}

		public function edit(){
			// $model = new BookModel;			
			// $bookId = input('get.bookId');
			// $result = [];
			// if( $bookId != ""){
			// 	$result = $model->where("bookId={$bookId}")->find();
			// }
			// $this->assign('result',$result);

			return $this->fetch();
		}
	}
 ?>