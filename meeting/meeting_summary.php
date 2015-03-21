<?php
/*********************/
/*                   */
/*  Version : 5.1.0  */
/*  Author  : RM     */
/*  Comment : 071223 */
/*                   */
/*********************/

require_once( "../inc/inc.php" );
api_block_anonymous_users( );
$errorMsg = urldecode( $_GET['message'] );
$resultMsg = urldecode( $_GET['msg'] );
$meet = meeting_get_info( getParam( "id" ), "" );
$holder = api_get_user_info( $meet['holder'] );
$users = meeting_getMeetingUserList( getParam( "id" ) );
if ( $users )
{
    foreach ( $users as $tmpuser )
    {
        $user_str .= $tmpuser['login_name']."(".$tmpuser['real_name']."),&nbsp;";
        $user_ids .= $tmpuser['id'].",";
    }
}
if ( is_null( $meet['end_time'] ) || empty( $meet['end_time'] ) )
{
    $time = strtotime( "+1 hour" );
    $date = date( "Y-m-d", $time );
    $hour = date( "H", $time );
    $minute = date( "i", $time );
}
else
{
    $time = strtotime( $meet['end_time'] );
    $date = date( "Y-m-d", $time );
    $hour = date( "H", $time );
    $minute = date( "i", $time );
}
echo "<!doctype html public \"-//w3c//dtd html 4.0 transitional//en\">\r\n<html>\r\n<head>\r\n<meta http-equiv=content-type content=\"text/html; charset=utf-8\">\r\n<meta content=\"mshtml 6.00.2900.2180\" name=generator>\r\n<link href=\"";
echo $appCtx;
echo "images/style.css\" rel=\"stylesheet\"\r\n\ttype=\"text/css\">\r\n";
echo "<S";
echo "CRIPT src=\"";
echo $appCtx;
echo "js/calendar.js\"></SCRIPT>\r\n";
echo "<S";
echo "CRIPT src=\"";
echo $appCtx;
echo "js/common.js\" type=text/javascript></SCRIPT>\r\n";
echo "<S";
echo "TYLE>\r\nBODY {\r\n\tOVERFLOW-Y: auto\r\n}\r\n</STYLE>\r\n\r\n\r\n";
echo "<s";
echo "cript language=\"JavaScript\" type=\"text/javascript\">\r\n\t\r\n\tfunction goAdd(){\r\n\tvar f=document.form1;\r\n\t\r\n\tif(f.endDate.value==\"\"){\r\n\t\talert(\"请输入结束时间!\");\r\n\t\tf.endDate.focus();\r\n\t\treturn false;\r\n\t}\r\n\tif(confirm(\"如果提交,该会议室会处于关闭状态! 你确认要提交吗?\")){\r\n\t\tf.submit();\r\n\t}else{\t\r\n\t\treturn false;\r\n\t}\r\n}\r\n\r\nfunction goAdd2(){\r\n\tvar f=document.form1;\r\n\t\$(\"con";
echo "firmMsg\").style.display='';\r\n\treturn false;\r\n}\r\n\r\nfunction rtn(){\r\n\tlocation.href='";
echo $appCtx;
echo "meeting/meeting_manage.php';\r\n}\r\n</script>\r\n\r\n\r\n";
echo "<s";
echo "cript language=\"Javascript1.2\"><!-- // load htmlarea\r\n_editor_url = \"";
echo $appCtx;
echo "/syscommon/\";                     // URL to htmlarea files\r\nvar win_ie_ver = parseFloat(navigator.appVersion.split(\"MSIE\")[1]);\r\nif (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }\r\nif (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }\r\nif (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }\r\nif (win_ie_ver >= 5.5) {\r\n  document.write('";
echo "<s";
echo "cr' + 'ipt src=\"' +_editor_url+ 'editor.js\"');\r\n  document.write(' language=\"Javascript1.2\"></scr' + 'ipt>');  \r\n} else { document.write('";
echo "<s";
echo "cr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }\r\n// --></script>\r\n\r\n</head>\r\n<body leftmargin=0 background=\"";
echo $appCtx;
echo "images/main_bg.gif\"\r\n\ttopmargin=0 marginheight=\"0\" marginwidth=\"0\">\r\n<center><br>\r\n<div id=\"errorMsg\" class=\"ErrorBox\" style=\"display: none\"></div>\r\n<div id=\"confirmMsg\" class=\"NoteBox\" style=\"display: none\"><!-- 如果提交,该会议室会处于关闭状态! 您确认要提交吗? -->\r\n";
echo getLang( "meeting_edit_confirmSub" );
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n<a href=\"#\" onclick=\"javascript:document.form1.submit();\">";
echo "<s";
echo "trong>";
echo getLang( "meeting_edit_OK" );
echo "</strong></a>\r\n&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"#\" onclick=\"javascript:\$(\"\r\n\tconfirmMsg\").style.display='none';\">";
echo "<s";
echo "trong>";
echo getLang( "meeting_edit_cancel" );
echo "</strong></a>\r\n</div>\r\n<div id=\"notice\" class=\"NoteBox\" style=\"display: \"><!-- 注意:保存会议纪录信息后,会议将正常结束! -->";
echo getLang( "meeting_edit_notice" );
echo "</div>\r\n<table cellspacing=0 cellpadding=0 width=\"100%\" border=0>\r\n\t<tr>\r\n\t\t<td valign=top align=middle width=\"100%\"><br>\r\n\t\t<form name=\"form1\"\r\n\t\t\taction=\"";
echo $appCtx;
echo "meeting/meeting_actions.php?action=editSummary\"\r\n\t\t\tmethod=post onSubmit=\"return goAdd2();\"><input\r\n\t\t\tvalue=\"";
echo $meet['id'];
echo "\" type=\"hidden\" name=\"id\">\r\n\t\t<table cellspacing=0 cellpadding=0 width=80% border=0>\r\n\t\t\t<tr>\r\n\t\t\t\t<td width=10><img height=11 src=\"";
echo $appCtx;
echo "images/bg_1.gif\"\r\n\t\t\t\t\twidth=10></td>\r\n\t\t\t\t<td width=100% background=\"";
echo $appCtx;
echo "images/bg_5.gif\"></td>\r\n\t\t\t\t<td width=10><img height=11 src=\"";
echo $appCtx;
echo "images/bg_2.gif\"\r\n\t\t\t\t\twidth=10></td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td background=\"";
echo $appCtx;
echo "images/bg_7.gif\">&nbsp;</td>\r\n\t\t\t\t<td align=middle bgcolor=#ffffff><!-- content-->\r\n\t\t\t\t<TABLE height=39 cellSpacing=0 cellPadding=0 width=100% border=0>\r\n\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD class=titlered width=300 height=39><IMG height=32\r\n\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "images/wlhy.gif\" width=40> <!-- 填写会议纪录 --> ";
echo getLang( "meeting_edit_meetingSummary" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD width=350>&nbsp;<br>\r\n\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t</TBODY>\r\n\t\t\t\t</TABLE>\r\n\t\t\t\t<TABLE class=table height=172 cellSpacing=0 cellPadding=0 width=100%\r\n\t\t\t\t\tborder=0>\r\n\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD class=td1><!-- 会议名称--> ";
echo getLang( "meeting_edit_name" );
echo "</TD>\r\n\t\t\t\t\t\t\t<TD class=td2>";
echo $meet['meet_name'];
echo "</TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD class=\"td1\"><!-- 会议主题 --> ";
echo getLang( "meeting_edit_subject" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD class=\"td2\">";
echo $meet['subject'];
echo "</TD>\r\n\t\t\t\t\t\t</TR>\r\n\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<TD class=td1><!-- 开始时间 --> ";
echo getLang( "meeting_edit_beginTime" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD class=td2>";
echo date( "Y-m-d H:i", strtotime( $meet['start_time'] ) );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD class=td1><!-- 主持人 --> ";
echo getLang( "meeting_edit_holder" );
echo "</TD>\r\n\t\t\t\t\t\t\t<TD class=td2>";
echo $holder['real_name']."(".$holder['login_name'].")";
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD class=td1><!-- 容纳人数 --> ";
echo getLang( "meeting_edit_capacity" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD class=td2>";
echo $meet['capacity'];
echo "</TD>\r\n\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t<TD class=td1><!-- 访问权限 --> ";
echo getLang( "meeting_edit_privileges" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD class=td2>";
if ( $meet['is_allowed_guest'] == "0" )
{
    echo " ";
    echo getLang( "meeting_edit_privilege1" );
    echo "\t\t\t\t\t\t\t<!-- 只有注册用户才可进入(需同时提供用户名及密码) --> ";
}
if ( $meet['is_allowed_guest'] == "1" )
{
    echo "\t\t\t\t\t\t\t";
    echo getLang( "meeting_edit_privilege2" );
    echo " <!-- 允许以客人身份进入(只提供任意用户名) -->\r\n\t\t\t\t\t\t\t";
}
echo "</TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t";
if ( $meet['is_allowed_guest'] == 0 )
{
    echo "\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD class=td1><!-- 会议密码 --> ";
    echo getLang( "meeting_edit_pwd" );
    echo "</TD>\r\n\t\t\t\t\t\t\t<TD class=td2>";
    echo !empty( $meet['meet_pwd'] ) ? empty( $meet['meet_pwd'] ) : "无";
    echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD class=td1><!-- 与会人员 --> ";
    echo getLang( "meeting_edit_members" );
    echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD class=td2>";
    echo 0 < strlen( $user_str ) ? $user_str : "&nbsp;";
    echo "</TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t";
}
echo "\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t<TD class=\"td1\"><!-- 会议纪要 --> ";
echo getLang( "meeting_edit_summary" );
echo "\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t<TD class=\"td2\" colSpan=3><TEXTAREA name=\"summary\" rows=8 cols=70>";
echo $meet['summary'];
echo "</TEXTAREA>\r\n\t\t\t\t\t\t\t";
echo "<s";
echo "cript language=\"javascript1.2\">editor_generate('summary');</script>\r\n\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t<TR>\r\n\r\n\t\t\t\t\t\t\t<TD class=td1><!-- 结束时间 --> ";
echo getLang( "meeting_edit_endTime" );
echo "\t\t\t\t\t\t\t&nbsp;<FONT color=red>*</FONT></TD>\r\n\t\t\t\t\t\t\t<TD class=td2>&nbsp;&nbsp;<INPUT readOnly size=10 name=endDate\r\n\t\t\t\t\t\t\t\tonFocus=\"calendar();\" notnull=\"false\"\r\n\t\t\t\t\t\t\t\tvalue=\"";
echo $date;
echo "\">&nbsp; ";
echo makeHourHtml( "hour", $hour );
echo "\t\t\t\t\t\t\t\t";
echo makeMinuteHtml( "min", $minute );
echo "</TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t</TBODY>\r\n\t\t\t\t</TABLE>\r\n\t\t\t\t<TABLE height=42 cellSpacing=0 cellPadding=0 width=100% border=0>\r\n\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t<TR align=middle>\r\n\t\t\t\t\t\t\t<TD height=42><input type=image height=25\r\n\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "/images/";
echo $lang;
echo "save.gif\" width=78 border=0>\r\n\t\t\t\t\t\t\t&nbsp;&nbsp; <a href=\"javascript:rtn();\"><img height=25\r\n\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "/images/";
echo $lang;
echo "return.gif\" width=78\r\n\t\t\t\t\t\t\t\tborder=0> </a> &nbsp;&nbsp;</TD>\r\n\t\t\t\t\t\t\t<TD></TD>\r\n\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t</TBODY>\r\n\t\t\t\t</TABLE>\r\n\t\t\t\t</td>\r\n\t\t\t\t<td background=\"";
echo $appCtx;
echo "images/bg_8.gif\"></td>\r\n\t\t\t</tr>\r\n\t\t\t<tr>\r\n\t\t\t\t<td><img height=11 src=\"";
echo $appCtx;
echo "images/bg_3.gif\" width=10></td>\r\n\t\t\t\t<td background=\"";
echo $appCtx;
echo "images/bg_6.gif\"></td>\r\n\t\t\t\t<td><img height=11 src=\"";
echo $$appCtx;
echo "images/bg_4.gif\" width=10></td>\r\n\t\t\t</tr>\r\n\t\t</table>\r\n\t\t</form>\r\n\t\t</td>\r\n\t</tr>\r\n\r\n\r\n</table>\r\n</center>\r\n</body>\r\n</html>\r\n";
?>
