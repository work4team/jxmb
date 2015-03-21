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
$fileName = Database::escape_string( trim( $_GET['fileName'] ) );
$sql = "delete from attachment where local_file_name='".$fileName."' and model_type='FILESHARE'";
$rs = api_sql_query( $sql, __FILE__, 8 );
if ( !$rs && $debug )
{
    error_log( "delete zlchat file -".$fileName." ERROR!", 0 );
}
$file_path = api_get_path( SYS_PATH )."meeting/upload/".$fileName;
if ( file_exists( $file_path ) )
{
    unlink( $file_path );
}
echo "\r\n";
?>
