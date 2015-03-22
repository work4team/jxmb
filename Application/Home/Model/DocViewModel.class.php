<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐



  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:

  Support:
 -------------------------------------------------------------------------*/

namespace Home\Model;
use Think\Model\ViewModel;

class  DocViewModel extends ViewModel {
	public $viewFields=array(
		'Doc'=>array('*'),
		'SystemFolder'=>array('name'=>'folder_name','_on'=>'Doc.folder=SystemFolder.id')
		);
}
?>