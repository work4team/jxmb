<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐



  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:

  Support:
 -------------------------------------------------------------------------*/

namespace Home\Model;
use Think\Model\ViewModel;

class  FlowTypeViewModel extends ViewModel {
	public $viewFields=array(
		'FlowType'=>array('*'),
		'SystemTag'=>array('name'=>'tag_name','_on'=>'FlowType.tag=SystemTag.id')
		);
}
?>