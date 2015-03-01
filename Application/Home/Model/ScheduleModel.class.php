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

class  ScheduleModel extends CommonModel {

	function _after_insert($data,$options){

		$date=explode("-",$data["start_date"]);
		$time=explode(":",$data["start_time"]);
		$warn_time=$data["warn_time"];
		$id=$data['id'];
		$name=$data['name'];
		
		$year=$date[0];
		$month=$date[1];
		$day=$date[2];

		$hour=$time[0];
		$minute=$time[1];

		if ($warn_time!="none"){
			$tmp=explode("_",$warn_time);
			if ($tmp[0]="h"){
				$hour=$hour-$tmp[1];
			}
			if ($tmp[0]="m"){
				$minute=$minute-$tmp[1];
			}
			if ($tmp[0]="d"){
				$day=$day-$tmp[1];
			}
		}
		
		$time=mktime($hour,$minute,0,$month,$day,$year);
	}

	function _after_update($data,$options){

		$date=explode("-",$data["start_date"]);
		$time=explode(":",$data["start_time"]);
		$warn_time=$data["warn_time"];
		$id=$data['id'];
		$name=$data['name'];
		
		$year=$date[0];
		$month=$date[1];
		$day=$date[2];

		$hour=$time[0];
		$minute=$time[1];

		if ($warn_time!="none"){
			$tmp=explode("_",$warn_time);
			if ($tmp[0]="h"){
				$hour=$hour-$tmp[1];
			}
			if ($tmp[0]="m"){
				$minute=$minute-$tmp[1];
			}
			if ($tmp[0]="d"){
				$day=$day-$tmp[1];
			}
		}
		
		$time=mktime($hour,$minute,0,$month,$day,$year);
	}
}
	
?>