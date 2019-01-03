<?php 
	namespace app\front\model;
	use think\Model;

	/**
	 * 
	 */
	class Order extends Model {
		
		// 设置当前模型对应的完整数据表名称
    	protected $table = 'userorder';
    	// 自动写入时间戳字段
    	protected $autoWriteTimestamp = true;
	}
 ?>