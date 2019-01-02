<?php 
	namespace app\back\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use think\Db;
	use app\back\model\Category as CategoryModel;

	/**
	 * 书籍分类
	 */
	class Category extends Controller {

		public function cate(){
			$model = new CategoryModel;
			$list = $model->order('categoryId asc')->paginate(5);
			$num = count($list);

			$this->assign('list',$list);
			$this->assign('num',$num);
			return $this->fetch();
		}

		public function add(){
			$data = Request::instance()->post();			
			$model = new CategoryModel($data);

			//保存到数据库
			$ret = $model->save();
			if($ret==false){
				$this->error("失败");
			}
			$this->success("成功");
		}

		public function edit($categoryId){
			$info = CategoryModel::get($categoryId)->toarray();
			$this->assign('info',$info);

			return $this->fetch('category/edit');
		}

		public function update(){
			$data = Request::instance()->post();
			$model = CategoryModel::get($data['categoryId']);			
			$model->cateName = $data['cateName'];
			
			$model->save();
		}

		public function save(){
			$data = Request::instance()->post();
			$model = new CategoryModel($data);

			//保存到数据库
			$ret = $model->save();
			if($ret==false){
				$this->error("失败");
			}
			$this->success("成功");
		}

		public function isDelete() {
			$categoryId = $_POST['categoryId'];
			$model = CategoryModel::get($categoryId);
			if ($model->isdelete == 1) {
				$model->isdelete = 0;
			} else {
				$model->isdelete = 1;
			}
			$model->save();
		}
	}

?>