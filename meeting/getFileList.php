<?php
require("dbInc.php");
$roomID = mysql_real_escape_string( trim( $_GET['roomID'] ) );
$sql = "select * from " .  $db_cfg['DB_PREFIX']  . "meet_attachment where meet_no='".$roomID."' and model_type='FILESHARE'";
$xml = "<FileList>";
$result=mysql_query($sql,$link);
while ( $row = mysql_fetch_array( $rs ) )
{
    $xml .= "<File id='".$row['id']."' name='".$row['file_name']."' fileName='".$row['local_file_name']."' size='".$row['file_size']."' date='".$row['created_time']."'></File>";
}
mysql_close($link);
$xml .= "</FileList>";
echo $xml;
?>
