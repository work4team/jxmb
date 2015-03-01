<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐



  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:

  Support:
 -------------------------------------------------------------------------*/

namespace Home\Controller;

class SystemTagController extends HomeController {
	protected $config=array('app_type'=>'asst');

	public function index() {
		if ($_POST) {
			$opmode = $_POST["opmode"];
			$model = D("SystemTag");
			if (false === $model -> create()) {
				$this -> error($model -> getError());
			}
			if ($opmode == "add") {
				$model -> controller = CONTROLLER_NAME;
				$list = $model -> add();
			}
			if ($opmode == "edit") {
				$list = $model -> save();
			}
			if ($opmode == "del") {
				$tag_id = $model -> id;
				$model -> del_tag($tag_id);
			}
		}
		$model = D("SystemTag");
		$tag_list = $model -> get_tag_list("id,pid,name");
		$tree = list_to_tree($tag_list);
		$this -> assign('menu',sub_tree_menu($tree));

		$tag_list = $model -> get_tag_list();
		$this -> assign("tag_list", $tag_list);
		$this -> display('SystemTag:index');
	}

	function winpop() {
		$model = M("SystemTag");
		$controller = $_GET['controller'];
		$where['controller'] = array('eq', $controller);
		$menu = $model -> where($where) -> field('id,pid,name') -> order('sort asc') -> select();
				
		$tree = list_to_tree($menu);
		$this -> assign('menu',popup_tree_menu($tree));
		$this -> display();
	}

	function popup() {
		$model = M("SystemTag");
		$controller = $_GET['controller'];
		$where['controller'] = array('eq', $controller);
		$list = array();
		$list = $model -> where($where) -> field('id,pid,name') -> order('sort asc') -> select();
		$list = list_to_tree($list);
		$this -> assign('list_popup', sub_tree_menu($list));
		$this -> display();
		return;
	}
}
?>