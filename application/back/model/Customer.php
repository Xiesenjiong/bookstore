<?php 
	namespace app\back\model;
	use think\Model;

	/**
	 * Customer模型
	 */
	class Customer extends Model {
		
		// 设置当前模型对应的完整数据表名称
    	protected $table = 'customer';
    	// 自动写入时间戳字段
    	protected $autoWriteTimestamp = true;
	}
 ?>