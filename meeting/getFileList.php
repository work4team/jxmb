<?php

$roomID = mysql_real_escape_string( trim( $_GET['roomID'] ) );
//$client = new HttpClient('example.com');
//$client->post('/login.php', array(
//    'username' => 'Simon',
//    'password' => 'ducks'
//));
//if (!$client->get('/private.php')) {
//    die('An error occurred: '.$client->getError());
//}
//$pageContents = $client->getContent();

$sql = "select * from attachment where meet_no='".$roomID."' and model_type='FILESHARE'";
$xml = "<FileList>";
$rs = api_sql_query( $sql, __FILE__, 14 );
while ( $row = mysql_fetch_array( $rs ) )
{
    $xml .= "<File id='".$row['id']."' name='".$row['file_name']."' fileName='".$row['local_file_name']."' size='".$row['file_size']."' date='".$row['created_time']."'></File>";
}
$xml .= "</FileList>";
echo $xml;
?>
