<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐



  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:

  Support:
 -------------------------------------------------------------------------*/

namespace Home\Model;
use Think\Model\ViewModel;

class  MailAccountViewModel extends ViewModel {
	public $viewFields=array(
		'MailAccount'=>array('*'),
		'User'=>array('_on'=>'MailAccount.id=User.id')
		);
}
?>