<?php
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
if ( $is_allowed_upload && is_uploaded_file( $uploadFile ) )
{
    $extendType = getFileExt( $uploadFileName );
    $localFileName = date( "Ymdhis" ).".".$extendType;
    $localFile = api_get_path( SYS_PATH )."meeting/upload/".$localFileName;
    if ( move_uploaded_file( $uploadFile, $localFile ) )
    {
        $fsize = filesize( $localFile ) / 1024;
        $create_date = date( "Y-m-d H:i:s" );
        $sql = "insert into attachment (file_name,local_file_name,meet_no,file_size,file_type,created_time,model_type) values ('".$uploadFileName."','".$localFileName."','".Database::escape_string( trim( $_GET['roomID'] ) )."','".$fsize."','".$extendType."',NOW(),'FILESHARE')";
        $rs = api_sql_query( $sql, __FILE__, 44 );
        if ( !$rs && $debug )
        {
            error_log( "insert zlchat file -".$uploadFileName." ERROR!", 0 );
        }
    }
    else if ( $debug )
    {
        error_log( "upload zlchat file -".$uploadFileName." ERROR!", 0 );
    }
}
?>
