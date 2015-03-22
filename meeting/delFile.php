<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/
require("dbInc.php");
//$logfile = fopen("debug.txt", "w") or die("Unable to open file!");
$fileName = mysql_real_escape_string( trim( $_GET['fileName'] ) );
$sql = "delete from " .  $db_cfg['DB_PREFIX']  . "meet_attachment where local_file_name='".$fileName."' and model_type='FILESHARE'";
$result=mysql_query($sql,$link);
//fwrite($logfile, $sql);
if ( !$result)
{
   error_log( "delfile -". $fileName." Failed!", 0 );
}
$file_path = dirname(__FILE__) ."/upload/".$fileName;
if ( file_exists( $file_path ) )
{
    unlink( $file_path );
}
echo "\r\n";
?>
