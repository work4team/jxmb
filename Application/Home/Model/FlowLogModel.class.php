<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐



  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:

  Support:
 -------------------------------------------------------------------------*/


namespace Home\Model;
use Think\Model;

class  FlowLogModel extends CommonModel {
	
	function _before_insert(&$data,$options){
		$emp_no = $data["emp_no"];
		$where['emp_no']=array('eq',$emp_no);
		$user_id=M("User")->where($where)->getField("id");
		$user_name=M("User")->where($where)->getField("name");
		$data["user_id"]=$user_id;
		$data["user_name"]=$user_name;
		send_push($new, "收到新的流程",1,$user_id);
	}
}
?>