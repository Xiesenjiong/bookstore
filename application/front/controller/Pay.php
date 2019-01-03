<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Session;
	use think\Request;
	use app\front\model\Address as AddressModel;
	use app\front\model\Book as BookModel;

	class pay extends Controller {
		
		public function index() {
			$customerId = Session::get('customerId');
			$bookId = Request::instance()->post('bookId');
			$num = Request::instance()->post('num');
			$add = AddressModel::all(['customerId' => $customerId]);
			$book = BookModel::get($bookId);
			// dump($book);
			
			$this->assign('num', $num);
			$this->assign('book', $book);
			$this->assign('address', $add);
			return $this->fetch();
		}
	}
 ?>