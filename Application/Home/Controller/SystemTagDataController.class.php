<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐
 -------------------------------------------------------------------------*/

namespace Home\Controller;

class SystemTagDataController extends HomeController {
	protected $config=array('app_type'=>'master');

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
        $user_id = get_user_id();
        $this -> assign('user_id', $user_id);
        $plugin['jquery-ui'] = true;
        $plugin['date'] = true;
        $plugin['editor'] = true;
        $this -> assign("plugin", $plugin);
        //可以在此构造下拉框数据
        $this -> display();
    }
    public function edit($id) {
        $user_id = get_user_id();
        $this -> assign('user_id', $user_id);
        $plugin['jquery-ui'] = true;
        $plugin['date'] = true;
        $plugin['editor'] = true;
        $this -> assign("plugin", $plugin);
        //可以在此构造下拉框数据
        //$model = M("XXX");
        //$list = $model -> where('is_del=0') -> order('sort asc') -> getField('id,name');
        //$this -> assign('xx_list', $list);
        $this -> _edit($id);
    }
    public function index() {
        $user_id = get_user_id();
        $this -> assign('user_id', $user_id);
        $plugin['date'] = true;
        $this -> assign("plugin", $plugin);

        $model = D("SystemTagData");
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
        $model = D("SystemTagData");
        $vo = $model -> find($id);
        $this -> assign('vo', $vo);
        //可以在此构造下拉框数据

        $this -> display();
    }
}?>