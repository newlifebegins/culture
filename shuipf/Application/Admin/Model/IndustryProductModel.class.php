<?php
// +----------------------------------------------------------------------
// | 文化产品展示馆 控制器
// +----------------------------------------------------------------------
// | 创建时间: 2017-07-28 16:13:14
// +----------------------------------------------------------------------
namespace Admin\Model;
use Common\Model\Model;

class IndustryProductModel extends Model{

    //静态分类变量
    static public $category_array = [];

    //自动完成
	protected $_auto = array(
        array('addtime', 'm_date', 1, 'callback'),
        array('updatetime','m_date',3,'callback')
    );
    //自动验证
    // self::MODEL_INSERT或者1新增数据时候验证
    // self::MODEL_UPDATE或者2编辑数据时候验证
    // self::MODEL_BOTH或者3全部情况下验证（默认）
    protected $_validate = array(

    );
    //获取分类数组
    public function getCateArray(){
        return self::$category_array;
    }
}