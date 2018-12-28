<?php 
	namespace app\front\controller;
	use think\Controller;

	/**
	 * 
	 */
	class Set extends Controller {
		
		public function set() 
		{
			return $this->fetch();
		}
	}
 ?>