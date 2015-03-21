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
$localFormat = getFileExt( $uploadFileName );
$is_allowed_upload = true;
$forbbidenFileType = array( "php", "sh", "exe", "bat" );
foreach ( $forbbidenFileType as $value )
{
    if ( !( strtolower( $localFormat ) == $value ) )
    {
        continue;
    }
    $is_allowed_upload = false;
    break;
    break;
}
if ( strtolower( $localFormat ) != "ppt" )
{
    $is_allowed_upload = false;
}
if ( $is_allowed_upload && is_uploaded_file( $uploadFile ) )
{
    $extendType = getFileExt( $uploadFileName );
    $localFileName = trim( $_GET['fileName'] );
    $localFile = api_get_path( SYS_PATH )."meeting/pptUpload/".$localFileName;
    if ( move_uploaded_file( $uploadFile, $localFile ) )
    {
        $pos = strrpos( $localFileName, "." );
        $len = strlen( $uploadFileName );
        $folder = substr( $localFileName, 0, $pos );
        $create_date = date( "Y-m-d h:i:s" );
        if ( !( $ppt = new COM( "powerpoint.application" ) ) )
        {
            exit( "Unable to Open MSPowerPoint" );
        }
        $ppt->Visible = true;
        $ppt->Presentations->Open( realpath( $localFile ) );
        $pptCount = $ppt->activePresentation->Slides->Count;
        $export_folder = api_get_path( SYS_PATH )."meeting/pptUpload/".$folder;
        if ( !file_exists( $export_folder ) )
        {
            mkdir( $export_folder, 511 );
        }
        $ppt->activePresentation->Export( $export_folder, "JPG", 640, 480 );
        $ppt->Quit( );
        $sql = "insert into attachment (file_name,local_file_name,meet_no,file_size,file_type,created_time,model_type) values ('".$uploadFileName."','".$folder."','".Database::escape_string( trim( $_GET['roomID'] ) )."','".$pptCount."','".$extendType."',NOW(),'PRESENTATION')";
        $rs = api_sql_query( $sql, __FILE__, 61 );
        if ( !$rs && $debug )
        {
            error_log( "insert zlchat pptFile -".$uploadFileName." ERROR!", 0 );
        }
        $path2 = api_get_path( SYS_PATH )."meeting/pptUpload/".$folder."/";
        $handle = opendir( $path2 );
        while ( $file = readdir( $handle ) )
        {
            if ( !is_dir( $file ) )
            {
                preg_match_all( "/(\\d+)\\.JPG\$/", $file, $name_arr );
                $newName = $name_arr[0][0];
                rename( $path2.$file, $path2.$newName );
            }
        }
        closedir( $handle );
    }
    else if ( $debug )
    {
        error_log( "upload zlchat pptFile -".$uploadFileName." ERROR!", 0 );
    }
}
?>
