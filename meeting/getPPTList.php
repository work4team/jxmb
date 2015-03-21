<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

header( "Content-Type:text/xml;charset=UTF-8" );
header( "Cache-Control: no-store, no-cache, must-revalidate" );
header( "Cache-Control: post-check=0, pre-check=0", false );
$debug = true;
require_once( "../inc/inc.php" );
$roomID = mysql_real_escape_string( trim( $_GET['roomID'] ) );
$sql = "select * from attachment where meet_no='".$roomID."' and model_type='PRESENTATION'";
$xml = "<FileList>";
$rs = api_sql_query( $sql, __FILE__, 13 );
while ( $row = mysql_fetch_assoc( $rs ) )
{
    $xml .= "<File id='".$row['id']."' name='".$row['file_name']."' folder='".$row['local_file_name']."' totalFrame='".$row['file_size']."' date='".$row['created_time']."'></File>";
}
$xml .= "</FileList>";
echo $xml;
?>
