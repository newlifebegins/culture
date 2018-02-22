<?php

// +----------------------------------------------------------------------
// | 公共文化服务平台   基本服务项目公示后台
// +----------------------------------------------------------------------
// | Author: libing
// +----------------------------------------------------------------------

namespace Admin\Controller;

use Common\Controller\AdminBase;

class BaseservicesController extends AdminBase
{
    protected $model = null;
    public static $type = array('图书馆', '文化馆');

    protected function _initialize()
    {
        parent::_initialize();
        $this->model = D('Admin/BaseServices');
    }

    //列表页
    public function index()
    {
        $pagenum = I('get.page', 1);
        $count = $this->model->scope('normal')->count();
        $page = new \Libs\Util\Page($count, 20, $pagenum);
        //设置分页参数
        $page->SetPager('baseservices', '<span class="all">共有{recordcount}条信息</span><span class="pageindex">{pageindex}/{pagecount}</span>{first}{prev}{liststart}{list}{listend}{next}{last}到第{jump}页', array('jump' => 'input'));
        //获取当前页数据
        $data = $this->model->scope('normal')->relation(true)->page($pagenum . ',20')->order('id desc')->select();
        //分页跳转的时候保证查询条件
        foreach ($where as $key => $val) {
            $page->parameter[$key] = urlencode($val);
        }
        //分页显示输出
        $pageinfo["page"] = $page->show('landmark');
        $pageinfo["data"] = $data;
        $this->assign('pageinfo', $pageinfo);
        $this->display();
    }

    //新增及修改页
    public function addedit()
    {
        if (IS_POST) {
            if ($this->model->create($_POST)) {
                if ($_POST['id'] != '') {
                    $this->model->save();
                } else {
                    $_POST['id'] = $this->model->add();
                }
            } else {
                $this->error($this->model->getError());
            }
            $this->success('提交成功!', U('addedit', array('id' => $_POST['id'])));
        } else {
            $id = I('request.id', null);
            if (!empty($id)) {
                $data = $this->model->scope('normal')->relation(true)->where(array('id' => $id))->find();
                $data['default_area'] = D('Admin/Area')->getFullAreaID($data['area']);
                $this->assign('data', $data);
            }
            $this->assign('type', self::$type);
            $this->display();
        }
    }

    //删除操作
    public function delete()
    {
        $id = I('request.id', '');
        $this->model->scope('normal')->where(array('id' => $id))->setField('isdelete', '1');
        $this->success('删除成功!', U('index'));
    }

    //子表操作
    public function content()
    {
        if (IS_POST) {
            if (D('Admin/BaseContent')->Create($_POST)) {
                if ($_POST['id_content'] != '') {
                    D('Admin/BaseContent')->save();
                } else {
                    D('Admin/BaseContent')->add();
                }
            } else {
                $this->ajaxReturn(array('status' => '-1', msg => D('Admin/BaseContent')->getError()));
            }
            $this->ajaxReturn(array('status' => '1', msg => 'success'));
        } else {
            $id_content = I('id_content', '');
            if (!empty($id_content)) {
                $data = D('Admin/BaseContent')->where(array('id_content' => $id_content))->find();
                $this->assign('data', $data);
            }
            $this->display();
        }
    }

    //删除
    public function content_del()
    {
        $id_content = I('id_content', null);
        if (!empty($id_content)) {
            D('Admin/BaseContent')->where(array('id_content' => $id_content))->delete();
            $this->success('删除成功!');
        }
    }

    //子项内容预览
    public function preview()
    {
        $id_content = I('id_content', null);
        if (!empty($id_content)) {
            $data = D('Admin/BaseContent')->where(array('id_content' => $id_content))->find();
            $this->assign('data', $data);
            $this->display();
        }
    }
}