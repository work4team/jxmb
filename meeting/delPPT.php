<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$debug = true;
require_once( "../inc/inc.php" );
$folder = mysql_real_escape_string( trim( $_GET['folder'] ) );
$sql = "delete from attachment where local_file_name='".$folder."' and model_type='PRESENTATION'";
$rs = api_sql_query( $sql, __FILE__, 7 );
if ( !$rs && $debug )
{
    error_log( "delete zlchat pptFile -".$folder." ERROR!", 0 );
}
$pathdir = api_get_path( SYS_PATH )."meeting/pptUpload/".$folder;
remove_dir( $pathdir );
$file_path = api_get_path( SYS_PATH )."meeting/pptUpload/".$folder.".ppt";
if ( file_exists( $file_path ) )
{
    unlink( $file_path );
}
?>
