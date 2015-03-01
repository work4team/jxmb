<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐



  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:

  Support:
 -------------------------------------------------------------------------*/

namespace Home\Controller;

class SystemController extends HomeController {
	//过滤查询字段
	protected $config=array('app_type'=>'asst');
	function _search_filter(&$map) {
		$keyword=I('keyword');
		if (!empty($keyword)) {
			$map['type|name|code'] = array('like', "%" .$keyword . "%");
		}
	}

	function check_reg() {

	}

	function save() {

	}

	function index(){
		$this->assign("SERVER_NAME",$this->_SERVER('SERVER_NAME'));
		$this -> display();
	}

	function RandAbc($length = "") {//返回随机字符串
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		return str_shuffle($str);
	}

	function _GET($n) {return isset($_GET[$n]) ? $_GET[$n] : NULL; }
	function _SERVER($n) { return isset($_SERVER[$n]) ? $_SERVER[$n] : '[undefine]'; }

}
?>