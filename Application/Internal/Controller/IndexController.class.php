<?php
namespace Internal\Controller;

use Think\Controller;

class IndexController extends Controller
{
    protected $config = array('app_type' => 'public');
    public function index()
    {
        $this->show("test");
    }

    //http://localhost/learn/index.php?m=Home&c=Index&a=ajax&id=1
    public function ajax()
    {
        $data['a'] = $_GET['a'];
        $data['id'] = I('get.id',0);
        $data['status'] = 1;
        $data['content'] = 'content';
        $this->ajaxReturn($data);
    }
}