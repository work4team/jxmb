<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐



  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:

  Support:
 -------------------------------------------------------------------------*/


namespace Home\Model;
use Think\Model;

class  FlowTypeModel extends CommonModel {
	// 自动验证设置
	protected $_validate	 =	 array(
		array('name','require','名称必须',1),
		array('short','require','简称必须',1),
		array('doc_no_format','require','文档编码格式必须',1),		 
		array('content','require','表单必须'),
		);
}
?>