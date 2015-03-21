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
$meet = meeting_get_info( getParam( "id" ), "" );
$holder = api_get_user_info( $meet['holder'] );
$users = meeting_getMeetingUserList( getParam( "id" ) );
if ( $users )
{
    foreach ( $users as $user )
    {
        $user_str .= $user['login_name']."(".$user['real_name']."),&nbsp;";
        $user_ids .= $user['id'].",";
    }
}
$accessURL = "meeting_signin.php?roomID=".$meet['meet_no'];
echo "\r\n<html>\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<title></title>\r\n<link href=\"";
echo $appCtx;
echo "images/style.css\" rel=\"stylesheet\"\r\n\ttype=\"text/css\">\r\n";
echo "<S";
echo "CRIPT src=\"";
echo $appCtx;
echo "js/selectdate.js\"></SCRIPT>\r\n";
echo "<S";
echo "TYLE>\r\nBODY {\r\n\tOVERFLOW-Y: auto\r\n}\r\n</STYLE>\r\n";
echo "<S";
echo "CRIPT language=Javascript>\r\nfunction rtn(){\r\n    ";
if ( $role_name == ROLE_ADMIN )
{
    echo "\tlocation.href='";
    echo $appCtx;
    echo "meeting/meeting_manage.php';\r\n\t";
}
else
{
    echo "\tlocation.href='";
    echo $appCtx;
    echo "meeting/meeting_list.php';\r\n\t";
}
echo "}\r\n</SCRIPT>\r\n</head>\r\n\r\n<BODY leftMargin=0 background=\"";
echo $appCtx;
echo "images/main_bg.gif\"\r\n\ttopMargin=0 marginheight=\"0\" marginwidth=\"0\">\r\n<CENTER><br>\r\n\t";
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
echo "<TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0>\r\n\t<TBODY>\r\n\t\t<TR>\r\n\t\t\t<TD vAlign=top align=middle width=\"100%\"><BR>\r\n\t\t\t<FORM name=\"form1\"\r\n\t\t\t\taction=\"";
echo $appCtx;
echo "meeting/meeting_actions.php?action=update\"\r\n\t\t\t\tmethod=post><input value=\"";
echo $meet['id'];
echo "\" type=\"hidden\" name=\"id\">\r\n\t\t\t<TABLE cellSpacing=0 cellPadding=0 width=80% border=0>\r\n\t\t\t\t<TBODY>\r\n\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t<TD width=10><IMG height=11 src=\"";
echo $appCtx;
echo "images/bg_1.gif\"\r\n\t\t\t\t\t\t\twidth=10></TD>\r\n\t\t\t\t\t\t<TD width=100% background='";
echo $appCtx;
echo "images/bg_5.gif'></TD>\r\n\t\t\t\t\t\t<TD width=10><IMG height=11 src=\"";
echo $appCtx;
echo "images/bg_2.gif\"\r\n\t\t\t\t\t\t\twidth=10></TD>\r\n\t\t\t\t\t</TR>\r\n\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t<TD background=\"";
echo $appCtx;
echo "images/bg_7.gif\">&nbsp;</TD>\r\n\t\t\t\t\t\t<TD align=middle bgColor=#ffffff>\r\n\t\t\t\t\t\t<TABLE cellSpacing=0 cellPadding=0 width=100% border=0>\r\n\t\t\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t<TD vAlign=top align=middle bgColor=#ffffff>\r\n\t\t\t\t\t\t\t\t\t<TABLE height=39 cellSpacing=0 cellPadding=0 width=100%\r\n\t\t\t\t\t\t\t\t\t\tborder=0>\r\n\t\t\t\t\t\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=titlered width=300 height=39><IMG height=32\r\n\t\t";
echo "\t\t\t\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "images/wlhy.gif\" width=40><!-- 会议信息 --> ";
echo getLang( "meeting_view_meetingInf" );
echo "</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD width=450>&nbsp;</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t\t\t</TBODY>\r\n\t\t\t\t\t\t\t\t\t</TABLE>\r\n\t\t\t\t\t\t\t\t\t<TABLE class=table cellSpacing=0 cellPadding=0 width=100%\r\n\t\t\t\t\t\t\t\t\t\tborder=0>\r\n\t\t\t\t\t\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=td1><!-- 会议状态-->";
echo getLang( "meeting_view_meetingStatus" );
echo "&nbsp;</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=\"td2\">&nbsp;&nbsp;";
echo $meet['status'] == 2 ? getLang( "meeting_view_meetingOver" ) : getLang( "meeting_view_meetingContinue" );
echo "\t\t\t\t\t\t\t\t\t\t\t\t<br>\r\n\t\t\t\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=td1 width=80><!-- 名称-->";
echo getLang( "meeting_view_meetingName" );
echo "&nbsp;</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=\"td2\">&nbsp;&nbsp;";
echo $meet['meet_name'];
echo "</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t</TR>\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=\"td1\"><!-- 主题-->";
echo getLang( "meeting_view_meetingSuject" );
echo "\t\t\t\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=\"td2\">&nbsp;&nbsp;";
echo $meet['subject'];
echo "</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=td1><!-- 会议主持人-->";
echo getLang( "meeting_view_meetingMaster" );
echo "&nbsp;</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=\"td2\">&nbsp;&nbsp;";
echo $meet['holder'];
echo "\t\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=td1><!-- 与会人员-->";
echo getLang( "meeting_view_meetingPerson" );
echo "&nbsp;</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=\"td2\">&nbsp;&nbsp;";
echo $user_str;
echo "</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=td1><!-- 访问权限-->";
echo getLang( "meeting_view_meetingPrio" );
echo "\t\t\t\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=\"td2\">&nbsp;&nbsp;";
echo $meet['is_allowed_guest'] == 0 ? getLang( "meeting_view_meetingAsMember" ) : getLang( "meeting_view_meetingAsComUser" );
echo "</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=td1><!-- 开始时间-->";
echo getLang( "meeting_view_meetingStartTime" );
echo "&nbsp;</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD class=\"td2\">&nbsp;&nbsp;";
echo $meet['start_time'];
echo "</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t</TBODY>\r\n\t\t\t\t\t\t\t\t\t</TABLE>\r\n\t\t\t\t\t\t\t\t\t<TABLE height=42 cellSpacing=0 cellPadding=0 width=100%\r\n\t\t\t\t\t\t\t\t\t\tborder=0>\r\n\t\t\t\t\t\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t\t\t\t\t\t<TR align=middle>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD height=42><br>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"javascript:rtn();\"> <img height=25\r\n\t\t\t\t\t\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "images/";
echo $lang;
echo "return.gif\" width=78\r\n\t\t\t\t\t\t\t\t\t\t\t\t\tborder=0></a></TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD></TD>\r\n\t\t\t\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t\t\t</TBODY>\r\n\t\t\t\t\t\t\t\t\t</TABLE>\r\n\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t</TBODY>\r\n\t\t\t\t\t\t</TABLE>\r\n\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t<TD background=\"";
echo $appCtx;
echo "images/bg_8.gif\">&nbsp;</TD>\r\n\t\t\t\t\t</TR>\r\n\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t<TD><IMG height=11 src=\"";
echo $appCtx;
echo "images/bg_3.gif\" width=10></TD>\r\n\t\t\t\t\t\t<TD background=\"";
echo $appCtx;
echo "images/bg_6.gif\"></TD>\r\n\t\t\t\t\t\t<TD><IMG height=11 src=\"";
echo $appCtx;
echo "images/bg_4.gif\" width=10></TD>\r\n\t\t\t\t\t</TR>\r\n\t\t\t\t</TBODY>\r\n\t\t\t</TABLE>\r\n\t\t\t</FORM>\r\n\t\t\t</TD>\r\n\t\t</TR>\r\n\t</TBODY>\r\n</TABLE>\r\n</CENTER>\r\n</BODY>\r\n</HTML>\r\n";
?>
