<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Shopuser extends Model
{
    /* 关联到模型的数据表
	 *
	 * @var string
	 */
    protected $table = 'shop_user';
    protected  $primaryKey='user_id';

	    /**
	 * 表明模型是否应该被打上时间戳
	 *
	 * @var bool
	 */
	 public $timestamps = false;


		 /**
	 * 不能被批量赋值的属性
	 *
	 * @var array
	 */
	 protected $guarded = [];
}
