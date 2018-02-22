<?php

// +----------------------------------------------------------------------
// | 艺术节日常安排 控制器
// +----------------------------------------------------------------------
// | 创建时间: 2017-08-01 17:34:52
// +----------------------------------------------------------------------
namespace Admin\Controller;
use Common\Controller\AdminBase;
use Admin\Service\User;

class FestivalCalendarController extends AdminBase {
    private $model = NULL;
     protected $Page_Size =20; 
    protected function _initialize() {
        parent::_initialize();
        $this->model = D('Admin/FestivalCalendar');
        $this->assign('site_array',$this->model->getSiteArray());
        $this->assign('class_array',$this->model->getClassArray());
    }
    //首页列表
    public function index(){
        $pagenum = I('get.page','1','');
		$count = $this->model->where($where)->count();
		$page = new \Libs\Util\Page($count,$this->Page_Size,$pagenum);
        $page->SetPager('sellercenter','<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页',array('jump'=>'input'));
		$data = $this->model->where($where)->page($pagenum.','.$this->Page_Size)->order('id desc')->select();
		$pageinfo["page"] = $page->show('sellercenter');
        $pageinfo['count'] = $count;
		$this->assign('data',$data);
        $this->assign('pageinfo',$pageinfo);
		$this->display();
    }
    //新增
    public function add(){
        if(IS_POST){
            $data = I('post.',null);
            if($this->model->create($data)){
                $id = $this->model->add();
                if($id){
                    $this->success('添加成功!',U('index'));
                }else{
                    $this->error('添加错误:'.$this->model->getError());
                }
            }else{
                $this->error('添加数据错误:'.$this->model->getError());
            }
        }else{
            $this->display();
        }
    }
    //修改
    public function edit(){
        $id = I('request.id',null);
        if($id){
            if(IS_POST){
                $data = $_POST;
                if($this->model->create($data)){
                    $id = $this->model->save();
                    if($id){
                        $this->success('更新成功!',U('index'));
                    }else{
                        $this->error('更新错误:'.$this->model->getError());
                    }
                }else{
                    $this->error('更新数据错误:'.$this->model->getError());
                }
            }else{
                $data = $this->model->where(['id'=>$id])->find();
                $this->assign('data',$data);
                $this->display();
            }
        }else{
            $this->error('为指定内容ID');
        }
    }
    //删除
    public function delete(){
        $where['id'] = I('id');
        $this->model->where($where)->delete();
        $this->success('删除成功!', U('index'));
    }
}