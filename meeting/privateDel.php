<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

header( "Content-Type:text/xml;charset=UTF-8" );
require_once( "../inc/inc.php" );
$fileName = trim( $_GET['fileName'] );
$file_path = api_get_path( SYS_PATH )."meeting/upload/temp/".$fileName;
if ( file_exists( $file_path ) )
{
    unlink( $file_path );
}
echo "\r\n";
?>
