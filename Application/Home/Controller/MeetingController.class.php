<?php
/**
 * Created by PhpStorm.
 * User: wb
 * Date: 2015/3/21 0021
 * Time: 1:54
 */

namespace Home\Controller;


class MeetingController extends HomeController {
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
    function domeet(){
        $room_no = I('post.roomno','');
        $holder_id = I('post.holder_id','');
        $user_id = get_user_id();
        $user_emp_no = get_emp_no();
        $user_name = get_user_name();
        $user_password = get_user_password();

        $m_role = '4';
        if($holder_id == $user_id){
            $m_role = '2';
        }
        //通过cookie共享连接字符串。
        $chatconnStr = 'userName=' . $user_emp_no . '&realName=' . $user_name .'&password=' . $user_password . '&mediaServer=' . C("mediaServer");
        $chatconnStr = $chatconnStr . '&role=' . $m_role . '&roomID=' . $room_no . '&scriptType=php';
        cookie('chatconnStr',$chatconnStr);

        $data['status'] = 1;
        $this->ajaxReturn($data);
    }

    function list_type(){
        $plugin['date'] = true;
        $this -> assign("plugin", $plugin);
        $map = $this -> _search();
        if (method_exists($this, '_search_filter')) {
            $this -> _search_filter($map);
        }

        $map['meet_type_id'] = get_system_config('MEET_TYPE_' . I('get.type',''));

        $user_id = get_user_id();
        $user_emp_no = get_emp_no();
        $user_name = get_user_name();
        $user_password = get_user_password();
        $this -> assign('user_id', $user_id);
        $this -> assign('user_emp_no', $user_emp_no);
        $this -> assign('user_name', $user_name);
        $this -> assign('user_password', $user_password);
        $this -> assign('mediaServer', C("mediaServer",null,"rtmp://localhost"));
        $this -> assign('user_password', $user_password);
        $where_scope['user_id'] = array('eq', $user_id);
        $scope_list = M("MeetingUser") -> where($where_scope) -> getField('meeting_id', true);
        $scope_list = implode(",", $scope_list);

        $model = D('Meeting');

        if (!empty($scope_list)) {
            $map['_string'] .= " " . $model -> get_tablePrefix()  . "meeting.id in ($scope_list)";
        }

        if (!empty($model)) {
            $this -> _list($model, $map);
        }
        $this -> display();
    }
} 