<?php

function getFileExt($file_name)
{
    while($dot = strpos($file_name, "."))
    {
        $file_name = substr($file_name, $dot+1);
    }
    return $file_name;
}

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
}
if ( $is_allowed_upload && is_uploaded_file( $uploadFile ) )
{
    $extendType = getFileExt( $uploadFileName );
    $localFileName = trim( $_GET['fileName'] );
    $localFile = dirname(__FILE__) ."/upload/temp/".$localFileName;
    if ( !move_uploaded_file( $uploadFile, $localFile ) )
    {
        error_log( "private uploadfile -".$localFileName." Failed!", 0 );
    }
}
?>
