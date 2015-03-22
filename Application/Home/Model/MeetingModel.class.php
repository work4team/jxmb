<?php
/*---------------------------------------------------------------------------
  网络民兵指挥管理系统 - 让工作更轻松快乐



  Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )  

  Author:

  Support:
 -------------------------------------------------------------------------*/


// 节点模型
namespace Home\Model;
use Think\Model;

class  MeetingModel extends CommonModel {
    protected $_validate = array( array('meet_name', 'require', '标题必须', 1), array('subject', 'require', '会议主题必须'), );

    function _before_insert(&$data, $options) {
    }

    public function get_tablePrefix(){
        return $this->tablePrefix;
    }
    function _after_insert($data, $options) {
        $id = $data['id'];
        $join_user_id = $data['join_user_id'];
        $speak_user_id = $data['speak_user_id'];
        $this -> _save_scope($id, $join_user_id,$speak_user_id);
    }

    function _after_update($data, $options) {
        $id = $data['id'];
        $join_user_id = $data['join_user_id'];
        $speak_user_id = $data['speak_user_id'];
        $this -> _del_scope($id);
        $this -> _save_scope($id, $join_user_id,$speak_user_id);
    }

    private function _del_scope($id) {
        $where['meeting_id'] = array('eq', $id);

        $model = M("MeetingUser");
        $result = $model -> where($where) -> delete();

        if ($result === false) {
            return false;
        } else {
            return true;
        }
    }

    private function _save_scope($id, $user_list,$speak_user_list) {
        $user_list = array_filter(explode(",", $user_list));
        $speak_user_list = array_filter(explode(",", $speak_user_list));
        $return_user_list = array();
        foreach ($user_list as $val) {
            if (strpos($val, "dept_") !== false) {
                $dept_id = str_replace("dept_", '', $val);
                $dept_user = $this -> _get_user_list_by_dept_id($dept_id);
                if ($dept_user) {
                    $return_user_list = array_merge($return_user_list, $dept_user);
                }
            } else {
                $return_user_list[] = $val;
            }
        }
        $return_speak_user_list = array();
        foreach ($speak_user_list as $val) {
            if (strpos($val, "dept_") !== false) {
                $dept_id = str_replace("dept_", '', $val);
                $dept_user = $this -> _get_user_list_by_dept_id($dept_id);
                if ($dept_user) {
                    $return_speak_user_list = array_merge($return_speak_user_list, $dept_user);
                }
            } else {
                $return_speak_user_list[] = $val;
            }
        }

        if (!empty($return_user_list)) {
            $return_user_list = implode(",", $return_user_list);
            $where = 'a.id in (' . $return_user_list . ') and b.id=\'' . $id . '\'';
            $sql = 'insert into ' . $this -> tablePrefix . 'meeting_user (user_id,meeting_id, mrole) ';
            $sql .= ' select a.id, b.id, 4 mrole from ' . $this -> tablePrefix . 'user a, ' . $this -> tablePrefix . 'meeting b where ' . $where;
            $result = $this -> execute($sql);
            if ($result === false) {
                return false;
            }
        }
        if (!empty($return_speak_user_list)) {
            $return_speak_user_list = implode(",", $return_speak_user_list);
            $where = 'a.id in (' . $return_speak_user_list . ') and b.id=\'' . $id . '\'';
            $sql = 'insert into ' . $this -> tablePrefix . 'meeting_user (user_id,meeting_id, mrole) ';
            $sql .= ' select a.id, b.id, 3 mrole from ' . $this -> tablePrefix . 'user a, ' . $this -> tablePrefix . 'meeting b where ' . $where;
            $result = $this -> execute($sql);
            if ($result === false) {
                return false;
            }
        }

        return true;
    }

    private function _get_user_list_by_dept_id($id) {

        $dept = tree_to_list(list_to_tree( M("Dept") -> where('is_del=0') -> select(), $id));
        $dept = rotate($dept);

        if (empty($dept)) {
            $dept = array($id);
        } else {
            $dept = explode(",", implode(",", $dept['id']) . ",$id");
        }

        $model = M("User");
        $where['dept_id'] = array('in', $dept);
        $where['is_del'] = array('eq', 0);

        $data = $model -> where($where) -> getField('id user_id,id');
        return $data;
    }

}
?>