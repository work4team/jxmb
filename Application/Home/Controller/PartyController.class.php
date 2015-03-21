<?php
/**
 * Created by PhpStorm.
 * User: wb
 * Date: 2015/3/21 0021
 * Time: 1:54
 */

namespace Home\Controller;


class PartyController extends HomeController {
    protected $config=array('app_type'=>'personal');

    function index(){
        $this->display();
    }

} 