<?php 
	namespace app\back\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use think\Db;
	use app\back\model\Book as BookModel;
	use app\back\model\Category as CategoryModel;

	/**
	 * 书籍管理、书籍分类
	 */
	class Book extends Controller {
		
		public function index() {
			$model = new BookModel;
			// $list = $model->paginate(5);
			$result = Db::table('book')->alias('a')->join('category b','a.categoryId = b.categoryId')
					  ->paginate(5);
			$num = count($result);

			$this->assign('list', $result);
			$this->assign('num', $num);

			return $this->fetch();
		}

		public function add(){
			return $this->fetch();
		}

		public function edit($bookId){
			$info = BookModel::get($bookId)->toarray();
			$this->assign('info',$info);

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
			if( $data['press'] == NULL){
				$model->press = $data['cover'];
			}else{
				$model->press = $data['press'];
			}
			$model->save();
		}

		public function save(){
			$data = Request::instance()->post();
			$model = new BookModel($data);

			//保存到数据库
			$ret = $model->save();
			if($ret==false){
				$this->error("失败");
			}
			$this->success("成功");
		}

		public function cate(){
			$model = new CategoryModel;		
			return $this->fetch('cate/cate');
		}

		public function setStatus($bookId) {
			$model = BookModel::get($bookId);
			if ($model->status == 1) {
				$model->status = 0;
			} else {
				$model->status = 1;
			}
			$model->save();
		}

		public function isDelete($bookId) {
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