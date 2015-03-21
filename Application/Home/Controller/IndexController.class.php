<?php
/*---------------------------------------------------------------------------
 网络民兵指挥管理系统 - 让工作更轻松快乐



 Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )

 Author:

 Support:
 -------------------------------------------------------------------------*/

namespace Home\Controller;

class IndexController extends HomeController {
	protected $config = array('app_type' => 'public');
	//过滤查询字段

	public function index() {
		$plugin['jquery-ui'] = true;
		$this -> assign("plugin", $plugin);

		cookie("current_node", null);
		cookie("top_menu", null);

		$this -> _mail_list();
		$this -> _info_list();

		$this -> display();
	}

	public function set_sort() {
		$val = I('val');
		$data['home_sort'] = $val;
	}

	protected function _mail_list() {
		$user_id = get_user_id();
		$model = D('Mail');

		//获取最新邮件
		$where['user_id'] = $user_id;
		$where['is_del'] = array('eq', '0');
		$where['folder'] = array( array('eq', 1), array('gt', 6), 'or');

		$new_mail_list = $model -> where($where) -> field("id,name,create_time") -> order("create_time desc") -> limit(10) -> select();
		$this -> assign('new_mail_list', $new_mail_list);

		//获取未读邮件
		$where['read'] = array('eq', '0');
		$unread_mail_list = $model -> where($where) -> field("id,name,create_time") -> order("create_time desc") -> limit(10) -> select();
		$this -> assign('unread_mail_list', $unread_mail_list);
	}


	protected function _info_list() {
		$user_id = get_user_id();
		$dept_id = get_dept_id();
		
		$map['_string'] = " Info.is_public=1 or Info.dept_id=$dept_id ";

		$info_list = M("InfoScope") -> where("user_id=$user_id") -> getField('info_id', true);
		$info_list = implode(",", $info_list);

		if (!empty($info_list)) {
			$map['_string'] .= "or Info.id in ($info_list)";
		}

		$folder_list = D("SystemFolder") -> get_authed_folder($user_id, "Info");
		if ($folder_list) {
			$map['folder'] = array("in", $folder_list);
		} else {
			$map['_string'] = '1=2';
		}
		$map['is_del'] = array('eq', 0);

		$model = D("InfoView");
		//获取最新邮件

		$info_list = $model -> where($map) -> field("id,name,create_time,folder_name") -> order("create_time desc") -> limit(10) -> select();
		$this -> assign("info_list", $info_list);
	}

}
?>