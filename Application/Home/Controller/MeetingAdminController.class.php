<?php
/**
 * Created by PhpStorm.
 * User: wb
 * Date: 2015/3/21 0021
 * Time: 1:54
 */

namespace Home\Controller;


class MeetingAdminController extends HomeController {
    protected $config = array('app_type' => 'master', 'read' => 'index,list_type,read', 'admin' => 'index,read', 'write' => 'index,read');

    function _search_filter(&$map) {
        $keyword=I('keyword');
        if (!empty($keyword)) {
            $map['type_no|name'] = array('like', "%" .$keyword . "%");
        }
    }

    function del(){
        $id=$_POST['id'];
        $this->_destory($id);
    }
    public function add() {
        $plugin['jquery-ui'] = true;
        $plugin['date'] = true;
        $plugin['editor'] = true;
        $this -> assign("plugin", $plugin);
        $model = M("MeetType");
        $list = $model -> where('is_del=0') -> order('sort asc') -> getField('id,name');
        $this -> assign('meet_type_list', $list);
        $this -> display();
    }
    public function edit($id) {
        $plugin['jquery-ui'] = true;
        $plugin['date'] = true;
        $plugin['editor'] = true;
        $this -> assign("plugin", $plugin);
        $model = M("MeetType");
        $list = $model -> where('is_del=0') -> order('sort asc') -> getField('id,name');
        $this -> assign('meet_type_list', $list);
        $this -> _edit($id);
    }
    public function index() {
        $plugin['date'] = true;
        $this -> assign("plugin", $plugin);
        $this -> assign('auth', $this -> config['auth']);

        $model = D("Meeting");
        $map = $this -> _search();
        if (method_exists($this, '_search_filter')) {
            $this -> _search_filter($map);
        }
        if (!empty($model)) {
            $this -> _list($model, $map, 'id desc');
        }

        $this -> display();
    }
    public function read($id) {
        $user_id = get_user_id();
        $this -> assign('user_id', $user_id);
        $plugin['jquery-ui'] = true;
        $this -> assign("plugin", $plugin);
        $model = M('Meeting');
        $vo = $model -> find($id);
        $this -> assign('vo', $vo);
        $model = M("MeetType");
        $list = $model -> where('is_del=0') -> order('sort asc') -> getField('id,name');
        $this -> assign('meet_type_list', $list);
        $this -> display();
    }
}