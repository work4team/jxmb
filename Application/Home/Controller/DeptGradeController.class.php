<?php
/*---------------------------------------------------------------------------
 网络民兵指挥管理系统 - 让工作更轻松快乐



 Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )

 Author:

 Support:
 -------------------------------------------------------------------------*/

namespace Home\Controller;

class DeptGradeController extends HomeController {
	//app 类型
	protected $config = array('app_type' => 'master');

	function _search_filter(&$map) {
		$keyword=I('keyword');
		if (!empty($keyword)) {
			$map['grade_no|name'] = array('like', "%" . $keyword . "%");
		}
	}

	public function index() {
		$model = M("DeptGrade");
		$list = $model -> order('sort') -> select();
		$this -> assign('list', $list);
		$this -> display();
	}

	function del($id) {		
		$this -> _destory($id);
	}

}
?>