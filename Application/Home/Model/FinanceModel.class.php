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

class  FinanceModel extends CommonModel {
	function _before_insert(&$data, $options) {
		$sql = "SELECT CONCAT(year(now()),'-',LPAD(count(*)+1,4,0)) doc_no FROM `" . $this -> tablePrefix . "finance` WHERE 1 and year(FROM_UNIXTIME(create_time))>=year(now())";
		$rs = $this -> db -> query($sql);
		if ($rs) {
			$data['doc_no'] = $rs[0]['doc_no'];
		} else {
			$data['doc_no'] = date('Y') . "-0001";
		}
	}

	function _after_insert(&$data, $options) {
		$doc_type = $data['doc_type'];
		if ($doc_type == 1) {
			$account_id = $data['account_id'];
			$income = $data['income'];

			$where['id'] = array('eq', $account_id);
			M("FinanceAccount") -> where($where) -> setInc('balance', $income);
		}
		if ($doc_type == 2) {
			$account_id = $data['account_id'];
			$payment = $data['payment'];

			$where['id'] = array('eq', $account_id);
			M("FinanceAccount") -> where($where) -> setDec('balance', $payment);
		}
		if ($doc_type == 3) {
			$account_id = $data['account_id'];
			$where['id'] = array('eq', $account_id);
			
			$payment = $data['payment'];			
			if (!empty($payment)) {
				M("FinanceAccount") -> where($where) -> setDec('balance', $payment);
			}
			
			$income = $data['income'];
			if (!empty($income)) {
				M("FinanceAccount") -> where($where) -> setInc('balance', $income);
			}
		}
	}

}
?>