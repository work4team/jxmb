<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

require_once( "../inc/inc.php" );
$errorMsg = urldecode( $_GET['message'] );
$resultMsg = urldecode( $_GET['msg'] );
$roomID = getParam( "roomID" );
$meet = meeting_get_info( "", $roomID );
$isAllowedGuest = $meet['is_allowed_guest'];
api_session_unregister( "connStr" );
session_unregister( "zlchat_current_logined_username" );
if ( isset( $_SESSION['is_logined'] ) && $_SESSION['is_logined'] == "true" && isset( $_user['user_id'] ) )
{
    $connStr = "";
    if ( $isAllowedGuest == 0 )
    {
        if ( $_user['roles'] == ROLE_ADMIN )
        {
            $chatRole = 2;
            $connStr = "userName=".$_user['login_name']."&realName=".$_user['real_name']."&password=".$_user['passwd']."&mediaServer=".api_get_path( ZLCHAT_SERVER_URL )."&role=".$chatRole."&roomID=".$roomID."&scriptType=php";
        }
        else
        {
            $chatRole = 4;
        }
        $meetingUserList = meeting_getMeetingUserList( $_GET['meetID'] );
        if ( $meetingUserList )
        {
            foreach ( $meetingUserList as $tmpMeeting )
            {
                if ( !( $tmpMeeting['login_name'] == $_user['login_name'] ) )
                {
                    continue;
                }
                $connStr = "userName=".$_user['login_name']."&realName=".$_user['real_name']."&password=".$_user['passwd']."&mediaServer=".api_get_path( ZLCHAT_SERVER_URL )."&role=".$tmpMeeting['m_role']."&roomID=".$roomID."&scriptType=php";
                break;
                break;
            }
        }
    }
    else
    {
        if ( $_user['roles'] == ROLE_HOLDER )
        {
            $chatRole = 2;
        }
        else if ( $_user['roles'] == ROLE_USER )
        {
            $chatRole = 3;
        }
        else
        {
            $chatRole = 4;
        }
        $connStr = "userName=".$_user['login_name']."&realName=".$_user['real_name']."&password=".$_user['passwd']."&mediaServer=".api_get_path( ZLCHAT_SERVER_URL )."&role=".$chatRole."&roomID=".$roomID."&scriptType=php";
    }
    api_session_register( "connStr" );
    header( "Location: zlchat.php" );
    exit( );
}
else
{
    header( "Location: ../index.php" );
}
echo "\r\n<!doctype html public \"-//w3c//dtd html 4.0 transitional//en\">\r\n<html>\r\n<head>\r\n<title>";
echo getLang( "ProductName" );
echo "</title>\r\n<meta http-equiv=content-type content=\"text/html; charset=utf-8\">\r\n<meta content=\"mshtml 6.00.2900.2180\" name=generator>\r\n<LINK href=\"";
echo $appCtx;
echo "/images/style.css\" type=text/css rel=stylesheet>\r\n";
echo "<S";
echo "CRIPT src=\"";
echo $appCtx;
echo "/js/common.js\" type=text/javascript></SCRIPT>\r\n";
echo "<s";
echo "tyle>\r\nbody {\r\n\toverflow-y: auto\r\n}\r\n</style>\r\n";
echo "<S";
echo "CRIPT language=Javascript>\r\n\r\nfunction chkForm2(){\r\n\tvar f=document.memberActionForm;\r\n\tif(getRadioValue(\"signInType\")==\"0\"){\r\n\t\tif(isEmpty(f.userName,'";
echo getLang( "meeting_signin_inputUserName" );
echo "')) return false;//请输入用户名!\r\n\t\tif(isEmpty(f.password,'";
echo getLang( "meeting_signin_inputPassword" );
echo "')) return false;\t//请输入密码\r\n\t}else{\t\r\n\t\tif(isEmpty(f.guestName,'";
echo getLang( "meeting_signin_inputUserName" );
echo "')) return false;//请输入用户名\r\n\t}\r\n\treturn true;\r\n}\r\n\r\nfunction chkForm(){\r\n\tvar f=document.memberActionForm;\r\n\tif(getRadioValue(\"signInType\")==\"0\"){\r\n\t\tif(isEmpty2(f.userName)){\r\n\t\t\t//\$(\"errorBox\").style.display='none';\r\n\t\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_signin_inputUserName" );
echo "';//请输入用户名\r\n\t\t\t\$(\"errorMsg\").style.display='';\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tif(isEmpty2(f.password)){\r\n\t\t\t//\$(\"errorBox\").style.display='none';\r\n\t\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_signin_inputPassword" );
echo "';//请输入密码\r\n\t\t\t\$(\"errorMsg\").style.display='';\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}else{\r\n\t\tif(isEmpty2(f.guestName)){\r\n\t\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_signin_inputUserName" );
echo "';//请输入用户名\r\n\t\t\t\$(\"errorMsg\").style.display='';\r\n\t\t\treturn false;\r\n\t\t}\r\n\t}\r\n\treturn true;\t\r\n}\r\n\r\nfunction showStyle(value)\r\n{\r\n\tif(value=='1')\r\n\t{\r\n\t\tdocument.all.style1.style.display='';\r\n\t\tdocument.all.style2.style.display='none';\r\n\t\tdocument.all.style3.style.display='none';\r\n\t}\r\n\tif(value=='0')\r\n\t{\r\n\t\tdocument.all.style1.style.display='none';\r\n\t\tdocument.all.style2.style.display='';\r";
echo "\n\t\tdocument.all.style3.style.display='';\r\n\t}\r\n}\r\n</SCRIPT>\r\n</head>\r\n<body leftmargin=0 background=\"";
echo $appCtx;
echo "/images/main_bg.gif\"\r\n\ttopmargin=0 marginheight=\"0\" marginwidth=\"0\">\r\n<center><br>\r\n<br>\r\n<br>\r\n<br>\r\n<br>\r\n<br>\r\n<br>\r\n<br>\r\n";
if ( !empty( $errorMsg ) )
{
    echo "<div class=\"ErrorBox\">";
    echo $errorMsg;
    echo "</div>\r\n";
}
echo " ";
if ( !empty( $resultMsg ) )
{
    echo "<div class=\"NoteBox\">";
    echo $resultMsg;
    echo "</div>\r\n";
}
echo "<div id=\"errorMsg\" class=\"ErrorBox\" style=\"display: none\"></div>\r\n<br>\r\n<table cellspacing=0 cellpadding=0 width=\"80%\" border=0>\r\n\t<tr>\r\n\t\t<td valign=top align=middle width=\"100%\"><br>\r\n\t\t<form name=memberActionForm\r\n\t\t\taction=\"";
echo $appCtx;
echo "meeting/meeting_actions.php?action=authSignin\"\r\n\t\t\tmethod=post onSubmit=\"return chkForm();\"><input type=\"hidden\"\r\n\t\t\tname=\"roomID\" value=\"";
echo $roomID;
echo "\">\r\n\t\t<table cellspacing=0 cellpadding=0 width=80% border=0>\r\n\t\t\t<tr>\r\n\t\t\t\t<td width=10><img height=11 src=\"";
echo $appCtx;
echo "images/bg_1.gif\"\r\n\t\t\t\t\twidth=10></td>\r\n\t\t\t\t<td width=100% background=\"";
echo $appCtx;
echo "images/bg_5.gif\"></td>\r\n\t\t\t\t<td width=10><img height=11 src=\"";
echo $appCtx;
echo "images/bg_2.gif\"\r\n\t\t\t\t\twidth=10></td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td background=\"";
echo $appCtx;
echo "images/bg_7.gif\">&nbsp;</td>\r\n\t\t\t\t<td align=middle bgcolor=#ffffff><!-- content-->\r\n\t\t\t\t<TABLE height=39 cellSpacing=0 cellPadding=0 width=500 border=0>\r\n\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD height=46 class=titlered><IMG height=32\r\n\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "images/wlhy.gif\" width=40> <!--  登录会议室-->";
echo getLang( "meeting_signin_loginMeetingRoom" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD>&nbsp;</TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t</TBODY>\r\n\t\t\t\t</TABLE>\r\n\t\t\t\t<TABLE class=table height=78 cellSpacing=0 cellPadding=0 width=500\r\n\t\t\t\t\tborder=0>\r\n\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD class=td1><!--  登录方式:-->";
echo getLang( "meeting_signin_loginWay" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD class=td1><INPUT type=radio name=\"signInType\" value=\"1\"\r\n\t\t\t\t\t\t\t\tonClick=\"showStyle(this.value);\"\r\n\t\t\t\t\t\t\t\t";
echo $isAllowedGuest == 1 ? "checked" : "disabled";
echo "> <!--  以客人身份进入-->";
echo getLang( "meeting_signin_loginAsCommon" );
echo "\t\t\t\t\t\t\t\t<br>\r\n\t\t\t\t\t\t\t<INPUT type=radio name=\"signInType\" value=\"0\"\r\n\t\t\t\t\t\t\t\tonClick=\"showStyle(this.value);\"\r\n\t\t\t\t\t\t\t\t";
echo $isAllowedGuest == 0 ? "checked" : "disabled";
echo "> <!--  使用登录名入口令进入-->";
echo getLang( "meeting_signin_loginAsUser" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t<TR id=\"style1\" style=\"DISPLAY: \">\r\n\t\t\t\t\t\t\t<TD class=td2><!--  用户名：-->";
echo getLang( "meeting_signin_userName" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD class=td2><INPUT type=text name=\"guestName\"\r\n\t\t\t\t\t\t\t\tstyle=\"width: 200px\"></TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t<TR id=\"style2\" style=\"DISPLAY: none\">\r\n\t\t\t\t\t\t\t<TD class=td2><!--  用户名：-->";
echo getLang( "meeting_signin_userName" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD class=td2><INPUT type=text name=userName style=\"width: 200px\"\r\n\t\t\t\t\t\t\t\tvalue=\"";
echo $_user['login_name'];
echo "\"></TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t<TR id=\"style3\" style=\"DISPLAY: none\">\r\n\t\t\t\t\t\t\t<TD class=td1><!--  密  码：-->";
echo getLang( "meeting_signin_password" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD class=td1><INPUT type=password name=password\r\n\t\t\t\t\t\t\t\tstyle=\"width: 200px\" value=\"\"></TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t</TBODY>\r\n\t\t\t\t</TABLE>\r\n\t\t\t\t<TABLE height=42 cellSpacing=0 cellPadding=0 width=500 border=0>\r\n\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t<TR align=middle>\r\n\t\t\t\t\t\t\t<TD height=42><input type=\"image\"\r\n\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "images/login_bottonenter.gif\"></TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t</TBODY>\r\n\t\t\t\t</TABLE>\r\n\t\t\t\t<!-- content --></td>\r\n\t\t\t\t<td background=\"";
echo $appCtx;
echo "images/bg_8.gif\"></td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td><img height=11 src=\"";
echo $appCtx;
echo "images/bg_3.gif\" width=10></td>\r\n\t\t\t\t<td background=\"";
echo $appCtx;
echo "images/bg_6.gif\"></td>\r\n\t\t\t\t<td><img height=11 src=\"";
echo $appCtx;
echo "images/bg_4.gif\" width=10></td>\r\n\t\t\t</tr>\r\n\t\t</table>\r\n\t\t</form>\r\n\t\t</td>\r\n\t</tr>\r\n</table>\r\n</center>\r\n</body>\r\n</html>\r\n";
echo "<s";
echo "cript>showStyle('";
echo $isAllowedGuest;
echo "');</script>\r\n";
?>
