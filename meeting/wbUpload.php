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
if ( is_uploaded_file( $uploadFile ) )
{
    $pos = strrpos( $uploadFileName, "." );
    $len = strlen( $uploadFileName );
    $extendType = getFileExt( $uploadFileName );
    $localFileName = $_GET['fileName'];
    $localFile = api_get_path( SYS_PATH )."meeting/wbUpload/".$localFileName;
    $is_allowed_upload = true;
    $forbbidenFileType = array( "gif", "jpg", "png", "jpeg" );
    foreach ( $forbbidenFileType as $value )
    {
        if ( !( $localFormat == $value ) )
        {
            continue;
        }
        $is_allowed_upload = false;
        break;
        break;
    }
    if ( $is_allowed_upload && move_uploaded_file( $uploadFile, $localFile ) )
    {
        return 1;
    }
    if ( $debug )
    {
        error_log( "upload zlchat wbFile -".$uploadFile." ERROR!", 0 );
    }
}
?>
