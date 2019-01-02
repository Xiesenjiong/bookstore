<?php 
	namespace app\front\model;
	use think\Model;

	/**
	 * Address模型
	 */
	class Address extends Model {
		
		// 设置当前模型对应的完整数据表名称
    	protected $table = 'address';
    	// // 自动写入时间戳字段
    	// protected $autoWriteTimestamp = true;
	}
 ?>