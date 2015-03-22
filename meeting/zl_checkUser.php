<?php
require("dbInc.php");
$userName = trim( $_GET['userName'] );
$password = trim( $_GET['password'] );
$sql = "select emp_no from " .  $db_cfg['DB_PREFIX']  . "user where emp_no='".$userName."' and password='" . $password . "'";
$result=mysql_query($sql,$link);
$xml = "<Result isUser='false' />";
while ( $row = mysql_fetch_array( $result ) )
{
    $xml = "<Result isUser='true' />";
    break;
}
echo $xml;
?>