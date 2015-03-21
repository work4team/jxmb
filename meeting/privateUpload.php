<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

$debug = true;
header( "Content-Type:text/xml;charset=UTF-8" );
header( "Cache-Control: no-store, no-cache, must-revalidate" );
header( "Cache-Control: post-check=0, pre-check=0", false );
require_once( "../inc/inc.php" );
$uploadFileName = $_FILES['Filedata']['name'];
$uploadFile = $_FILES['Filedata']['tmp_name'];
$pos = strrpos( $uploadFileName, "." );
$len = strlen( $uploadFileName );
$localFormat = substr( $uploadFileName, $pos + 1, $len );
$is_allowed_upload = true;
$denied_files = array( "php", "sh", "exe", "bat" );
foreach ( $denied_files as $denied_file )
{
    if ( !( strtolower( $denied_file ) == $localFormat ) )
    {
        continue;
    }
    $is_allowed_upload = false;
    break;
    break;
}
if ( $is_allowed_upload && is_uploaded_file( $uploadFile ) )
{
    $extendType = getFileExt( $uploadFileName );
    $localFileName = trim( $_GET['fileName'] );
    $localFile = api_get_path( SYS_PATH )."meeting/upload/temp/".$localFileName;
    if ( !move_uploaded_file( $uploadFile, $localFile ) && $debug )
    {
        error_log( "private zlchat uploadfile -".$localFileName." Failed!", 0 );
    }
}
?>
