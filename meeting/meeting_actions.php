<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

require_once( "../inc/inc.php" );
$action = $_REQUEST['action'];
$home_url = "..\\";
if ( isset( $_REQUEST['action'] ) )
{
    switch ( $action )
    {
    case "add" :
        api_block_anonymous_users( );
        api_protect_admin_script( );
        $meet_name = getParam( "meet_name" );
        $meet_pwd = getParam( "meet_pwd" );
        $subject = $_POST['subject'];
        $holeTime = getParam( "startDate" )." ".getParam( "hour" ).":".getParam( "min" ).":00";
        $capacity = MAX_ACCOUNT_CAPACITY;
        $holderStr = getParam( "selectedName" );
        $holderId = getParam( "holder" );
        $is_allowed_guest = 0;
        $selectedIDs = getParam( "selectedIDs" );
        if ( meeting_add( $meet_name, $meet_pwd, $holderStr, $subject, $capacity, $holeTime, $is_allowed_guest, 0 ) )
        {
            $selectedID = explode( ",", $selectedIDs );
            $last_insert_id = Database::get_last_insert_id( );
            meeting_addMeetUser( $last_insert_id, $selectedID, 4 );
            $selectedID2 = array(
                $holderId
            );
            meeting_addMeetUser( $last_insert_id, $selectedID2, 2 );
            $url = $home_url."meeting/meeting_view.php?id=".$last_insert_id."&msg=".urlencode( getLang( "MSGKEY_MEETING_002" ) );
        }
        else
        {
            $url = $home_url."meeting/meeting_add.php?message=".urlencode( getLang( "MSGKEY_MEETING_004" ) );
        }
        header( "Location: ".$url );
        exit( );
        break;
    case "del" :
        api_block_anonymous_users( );
        api_protect_admin_script( );
        $id = getParam( "id" );
        if ( meeting_remove( $id ) )
        {
            $url = $home_url."meeting/meeting_manage.php?msg=".urlencode( getLang( "MSGKEY_MEETING_008" ) );
        }
        else
        {
            $url = $home_url."meeting/meeting_manage.php?message=".urlencode( getLang( "MSGKEY_MEETING_010" ) );
        }
        header( "Location: ".$url );
        exit( );
        break;
    case "update" :
        api_block_anonymous_users( );
        api_protect_admin_script( );
        $id = getParam( "id" );
        $meet_name = getParam( "meet_name" );
        $meet_pwd = getParam( "meet_pwd" );
        $subject = $_POST['subject'];
        $capacity = MAX_ACCOUNT_CAPACITY;
        $holeTime = getParam( "startDate" )." ".getParam( "hour" ).":".getParam( "min" ).":00";
        $holderStr = getParam( "selectedName" );
        $holderId = getParam( "holder" );
        $is_allowed_guest = 0;
        $selectedIDs = getParam( "selectedIDs" );
        if ( $is_allowed_guest == "1" )
        {
            meeting_remove_meet_users( $id );
            $selectedID2 = array(
                $holderId
            );
        }
        if ( 0 < strlen( $selectedIDs ) )
        {
            meeting_remove_meet_users( $id );
            $selectedID = explode( ",", $selectedIDs );
            $last_insert_id = $id;
            meeting_addMeetUser( $last_insert_id, $selectedID, 4 );
            $selectedID2 = array(
                $holderId
            );
            meeting_addMeetUser( $last_insert_id, $selectedID2, 2 );
        }
        if ( meeting_update( $id, $meet_name, $meet_pwd, $holderStr, $subject, $capacity, $holeTime, "0000-00-00 00:00:00", $is_allowed_guest, 0, "" ) )
        {
            $url = $home_url."meeting/meeting_manage.php?msg=".urlencode( getLang( "MSGKEY_MEETING_012" ) );
        }
        else
        {
            $url = $home_url."meeting/meeting_manage.php?message=".urlencode( getLang( "MSGKEY_MEETING_014" ) );
        }
        header( "Location: ".$url );
        exit( );
        break;
    case "editSummary" :
        api_block_anonymous_users( );
        api_protect_admin_script( );
        $id = getParam( "id" );
        $endTime = getParam( "endDate" )." ".getParam( "hour" ).":".getParam( "min" ).":00";
        $summary = getParam( "summary" );
        if ( meeting_update_summary( $id, $endTime, 2, $summary ) )
        {
            $url = $home_url."meeting/meeting_manage.php?msg=".urlencode( getLang( "MSGKEY_MEETING_012" ) );
        }
        else
        {
            $url = $home_url."meeting/meeting_manage.php?message=".urlencode( getLang( "MSGKEY_MEETING_014" ) );
        }
        header( "Location: ".$url );
        exit( );
        break;
    case "authSignin" :
        $roomID = getParam( "roomID" );
        $signInType = getParam( "signInType" );
        $userName = getParam( "userName" );
        $password = md5( getParam( "password" ) );
        $allowAccess = false;
        $meeting = meeting_get_info( "", $roomID );
        $holder = api_get_user_info( $meeting['holder'] );
        $chatRole = "0";
        $mediaServer = api_get_path( ZLCHAT_SERVER_URL );
        $scriptType = "php";
        $connStr = "";
        if ( $signInType == "0" && $meeting['is_allowed_guest'] == 0 )
        {
            $allRight = false;
            $account = get_user_info( $userName );
            if ( !$account )
            {
                $url = $home_url."meeting/meeting_signin.php?roomID=".$roomID;
                header( "Location: ".$url );
                exit( );
            }
            if ( isset( $_user['user_id'] ) && $_user['user_id'] )
            {
                $loginAccount = $account;
            }
            if ( $holder['login_name'] == $userName && $loginAccount['roles'] == ROLE_HOLDER || $loginAccount['roles'] == ROLE_LEADER )
            {
                $chatRole = "2";
            }
            if ( IS_ROOT_AS_HOLDER_OF_ALL_MEETING && $userName == DEFAULT_ADMINISTRTOR_NAME )
            {
                $chatRole = "2";
            }
            if ( $loginAccount['roles'] == ROLE_USER )
            {
                $chatRole = "3";
            }
            if ( $loginAccount['roles'] == ROLE_AUDIENCE )
            {
                $chatRole = "4";
            }
            $authResult = authentication( $userName, $password );
            if ( $authResult == STATUS_LOGIN_SUCCESS )
            {
                $meetingUserList = meeting_getMeetingUserList( $meeting['id'] );
                if ( $meetingUserList )
                {
                    foreach ( $meetingUserList as $tmpMeeting )
                    {
                        if ( !( $tmpMeeting['login_name'] == $userName ) )
                        {
                            continue;
                        }
                        $allRight = true;
                        break;
                        break;
                    }
                }
                if ( IS_ROOT_AS_HOLDER_OF_ALL_MEETING && $userName == DEFAULT_ADMINISTRTOR_NAME )
                {
                    $allRight = true;
                }
            }
            if ( $allRight )
            {
                $allowAccess = true;
                $connStr = "userName=".$userName."&password=".$password."&mediaServer=".$mediaServer."&role=".$chatRole."&roomID=".$roomID."&scriptType=".$scriptType;
            }
        }
        else if ( $signInType == "1" && $meeting['is_allowed_guest'] == 1 )
        {
            $allowAccess = true;
            $userName = getParam( "guestName" );
            $chatRole = "3";
            if ( $holder['login_name'] == $guestName || IS_ROOT_AS_HOLDER_OF_ALL_MEETING && $guestName == DEFAULT_ADMINISTRTOR_NAME )
            {
                $chatRole = "2";
            }
            $connStr = "userName=".$userName."&password=&mediaServer=".$mediaServer."&role=".$chatRole."&roomID=".$roomID."&scriptType=".$scriptType;
        }
        if ( $allowAccess )
        {
            api_session_register( "connStr" );
            api_session_register( "allowAccess" );
            $_SESSION['zlchat_current_logined_username'] = $userName;
            $url = $home_url."meeting/zlchat.php";
        }
        else
        {
            $url = $home_url."meeting/meeting_signin.php?roomID=".$roomID."&message=".urlencode( getLang( "MSGKEY_MEETING_018" ) );
        }
        header( "Location: ".$url );
        exit( );
        break;
    default :
        exit( "Illegal Action---非法操作!" );
    }
}
?>
