<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐



  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:

  Support:
 -------------------------------------------------------------------------*/

namespace Home\Model;
use Think\Model\ViewModel;

class  UserViewModel extends ViewModel {
	public $viewFields=array(
		'User'=>array('id','emp_no','name','letter','dept_id','position_id','rank_id','email','duty','office_tel','mobile_tel','pic','birthday','sex','password','is_del'),
		'Position'=>array('name'=>'position_name','_on'=>'Position.id=User.position_id'),
		'Rank'=>array('name'=>'rank_name','_on'=>'Rank.id=User.rank_id'),
		'Dept'=>array('name'=>'dept_name','_on'=>'Dept.id=User.dept_id')
		);
}
?>