<?php
/**
 * Created by PhpStorm.
 * User: wb
 * Date: 2015/3/21 0021
 * Time: 23:06
 */
function load_config(){
    return require( "../Application/Common/Conf/db.php" );
}
$db_cfg = load_config();
$link=mysql_connect($db_cfg['DB_HOST'] . ':' . $db_cfg['DB_PORT'],$db_cfg['DB_USER'],$db_cfg['DB_PWD']);
if(!$link)
{
    die("error");
}
if(!mysql_select_db( $db_cfg['DB_NAME'],$link))
{
    die("error");
}