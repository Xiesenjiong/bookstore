<?php 
	namespace app\back\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\back\model\Book as BookModel;
	use app\back\model\Category as CategoryModel;

	/**
	 * 书籍管理
	 */
	class Book extends Controller {
		
		public function index() {
			$list = BookModel::where(['isdelete' => 0])->paginate(10);
			// $list = Db::table('book')->alias('a')->join('category b','a.categoryId = b.categoryId')
			// 		  ->paginate(5);
			$catelist = CategoryModel::select();
			$num 	= count($list);
			$option = array(array('title' => '上架', 'icon' => '&#xe62f;'), array('title' => '下架', 'icon' => '&#xe601;'));

			$this->assign('option', $option);
			$this->assign('list', $list);
			$this->assign('catelist', $catelist);
			$this->assign('num', $num);

			return $this->fetch();
		}

		public function add(){
			$catelist = CategoryModel::select();
			$this->assign('catelist', $catelist);		

			return $this->fetch();
		}

		public function edit($bookId){
			$info = BookModel::get($bookId)->toarray();
			$catelist = CategoryModel::select();		
			$this->assign('info',$info);
			$this->assign('catelist', $catelist);			

			return $this->fetch();
		}

		public function delete() {
			$list = BookModel::where(['isdelete' => 1])->paginate(5);
			$num = count($list);

			$this->assign('list', $list);
			$this->assign('num', $num);
			return $this->fetch();
		}

		public function update(){
			$data = Request::instance()->post();
			$model = BookModel::get($data['bookId']);			
			$model->title = $data['title'];
			$model->author = $data['author'];
			$model->description = $data['description'];
			$model->paddress = $data['paddress'];
			$model->soldNum = $data['soldNum'];
			$model->stockNum = $data['stockNum'];
			$model->price = $data['price'];
			$model->press = $data['press'];
			$model->categoryId = $data['categoryId'];
			
			$model->save();
		}

		public function save(){
			$data = Request::instance()->post();
			$model = new BookModel($data);

			//保存到数据库
			$model->allowField(true)->save();		
		}

		public function setStatus($bookId) {
			$bookId = $_POST['bookId'];			
			$model = BookModel::get($bookId);
			if ($model->status == 1) {
				$model->status = 0;
			} else {
				$model->status = 1;
			}
			$model->save();
		}

		public function isDelete($bookId) {
			$bookId = $_POST['bookId'];			
			$model = BookModel::get($bookId);
			if ($model->isdelete == 1) {
				$model->isdelete = 0;
			} else {
				$model->isdelete = 1;
			}
			$model->save();
		}

		public function upimg(){
			$file = request()->file('bookimg');

            // 移动到框架应用根目录/public/uploads/ 目录下
			if($file){
				$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
				if($info){
					$img_src = "/bookstore/public/uploads/{$info->getSaveName()}";
					echo $img_src;
				}else{
            // 上传失败获取错误信息
					$this->error($file->getError());
				}
			}
		}
	}
 ?>