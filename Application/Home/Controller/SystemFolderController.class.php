<?php
/*---------------------------------------------------------------------------
 网络民兵指挥管理系统 - 让工作更轻松快乐



 Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )

 Author:

 Support:
 -------------------------------------------------------------------------*/

namespace Home\Controller;

class SystemFolderController extends HomeController {
	protected $config = array('app_type' => 'asst');

	//过滤查询字段
	function _search_filter(&$map) {
		$map['name'] = array('like', "%" . $_POST['name'] . "%");
		$map['is_del'] = array('eq', '0');
	}

	function index() {
		$model = D("SystemFolder");
		if (IS_POST) {
			$opmode = $_POST["opmode"];
			if (false === $model -> create()) {
				$this -> error($model -> getError());
			}
			if ($opmode == "add") {
				$model -> controller = CONTROLLER_NAME;
				$list = $model -> add();
				if ($list != false) {
					$this -> success("添加成功");
				} else {
					$this -> error("添加成功");
				}
			}
			if ($opmode == "edit") {
				$list = $model -> save();
				if ($list != false) {
					$this -> success("保存成功");
				} else {
					$this -> error("保存失败");
				}
			}
			if ($opmode == "del") {
				$this -> _del($model -> id);
			}
		}
		
		$folder_list = $model -> get_folder_list();
		$tree = list_to_tree($folder_list);
		
		$this -> assign('menu', sub_tree_menu($tree));	
		$this -> assign("folder_list", $folder_list);
		
		$this -> display('SystemFolder:index');
	}

	function read($id) {
		$model = M("SystemFolder");
		$data = $model -> find($id);
		if ($data !== false) {// 读取成功
			$return['data'] = $data;
			$this -> ajaxReturn($return);
		}
	}

	function _del($id,$name = CONTROLLER_NAME, $return_flag = false) {
		$model = D("SystemFolder");
		$data = $model -> getById($id);
		$controller = $data['controller'];
		$count = M($controller) -> where("folder=$id") -> count();

		$sub_folder_list = tree_to_list(list_to_tree($model -> get_folder_list(), $id));
		if ($count > 0 and empty($sub_folder_list)) {// 读取成功
			$this -> error('只能删除空文件夹');
		} else {
			$result = $model -> where("id=$id") -> delete();
			if ($result) {
				$this -> success('删除成功');
				die ;
			}
		}
	}

	function winpop($controller) {
		$where['controller'] = $controller;
		$menu = M("SystemFolder") -> where($where) -> field('id,pid,name') -> order('sort asc') -> select();
		$tree = list_to_tree($menu);
		$this -> assign('menu', popup_tree_menu($tree));
		$this -> display("SystemFolder:winpop");
	}

}
