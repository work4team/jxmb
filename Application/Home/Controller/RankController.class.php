<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐



  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:

  Support:
 -------------------------------------------------------------------------*/

namespace Home\Controller;

class RankController extends HomeController {
	protected $config=array('app_type'=>'master');
	function _search_filter(&$map) {
		$keyword=I('keyword');
		if (!empty($keyword)) {
			$map['rank_no|name'] = array('like', "%" .$keyword . "%");
		}
	}
	
	function del(){
		$id=$_POST['id'];
		$this->_destory($id);		
	}
}
?>