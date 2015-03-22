<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/
$fileName = trim( $_GET['fileName'] );
$file_path = dirname(__FILE__) ."/upload/temp/".$fileName;
if ( file_exists( $file_path ) )
{
    unlink( $file_path );
}
echo "\r\n";
?>
