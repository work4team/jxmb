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
}
if ( $is_allowed_upload && is_uploaded_file( $uploadFile ) )
{
    $extendType = getFileExt( $uploadFileName );
    $localFileName = date( "Ymdhis" ).".".$extendType;
    $localFile =$_SERVER[ 'DOCUMENT_ROOT '] ."/meeting/upload/".$localFileName;
    if ( move_uploaded_file( $uploadFile, $localFile ) )
    {
        $fsize = filesize( $localFile ) / 1024;
        $create_date = date( "Y-m-d H:i:s" );
        $sql = "insert into " . $db_cfg['DB_PREFIX']  . "meet_attachment (file_name,local_file_name,meet_no,file_size,file_type,created_time,model_type) values ('".$uploadFileName."','".$localFileName."','".Database::escape_string( trim( $_GET['roomID'] ) )."','".$fsize."','".$extendType."',NOW(),'FILESHARE')";
        $result=mysql_query($sql,$link);
        if ( !$result)
        {
           die("error");
        }
    }else{
        die("error");
    }
}
?>
