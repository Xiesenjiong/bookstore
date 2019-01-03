<?php 
	namespace app\front\controller;
	use think\Controller;
	use think\Request;
	use think\Session;
	use app\front\model\Book as BookModel;

	class Index extends Controller {
		
		public function Index() {
			$list = BookModel::where(['status' => 1, 'isdelete' => 0])->paginate(6);
			$this->assign('list', $list);			
			return $this->fetch();
		}

		public function search(){
			$provinces = BookModel::where(['status' => 1, 'isdelete' => 0])->column('title');
			$tmp = $_GET['q'];
			$val = array();
			$k = 0;
			if (strlen($tmp)>0)
			{
				for($i=0;$i<31;$i++){
					if(strpos($provinces[$i],$tmp)!==false){
       					//传递值给val
						$val[$k]=$provinces[$i];
       					//下标增加
						$k = $k+1;
					}
				}
  				//遍历val数组
				for($j=0;$j<count($val);$j++)
				{
					echo $val[$j];
					echo "<br>";
				}
			}
		}
	}
 ?>