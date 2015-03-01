<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐



  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:

  Support:
 -------------------------------------------------------------------------*/


// 用户模型
namespace Home\Model;
use Think\Model;

class  UserConfigModel extends CommonModel {
	function get_config(){
		
		$config = session('config'. get_user_id());
		
		if(empty($config)){
			$id=get_user_id();
			$config= $this->find($id);
		}
		return $config;
	}

	function set_config($data){
		$id=get_user_id();
		$data['id']=$id;
		$model=M("UserConfig");
		$count=$model->where("id=$id")->count();
		if(empty($count)){			
			return $model->add($data);
		}else{
			return $model->save($data);
		}
	}
}
?>