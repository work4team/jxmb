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
$users = meeting_getMeetingUserList( getParam( "id" ) );
if ( $users )
{
    foreach ( $users as $tmpuser )
    {
        $user_str .= $tmpuser['login_name']."(".$tmpuser['real_name']."),&nbsp;";
        $user_ids .= $tmpuser['id'].",";
        if ( $tmpuser['m_role'] == 2 )
        {
            $holder['user_id'] = $tmpuser['id'];
        }
    }
}
$time = strtotime( $meet['start_time'] );
$date = date( "Y-m-d", $time );
$hour = date( "H", $time );
$minute = date( "i", $time );
echo "\r\n<!doctype html public \"-//w3c//dtd html 4.0 transitional//en\">\r\n<html>\r\n<head>\r\n<meta http-equiv=content-type content=\"text/html; charset=utf-8\">\r\n<meta content=\"mshtml 6.00.2900.2180\" name=generator>\r\n<link href=\"";
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
echo "<s";
echo "tyle>\r\nbody {\r\n\toverflow-y: auto\r\n}\r\n</style>\r\n";
echo "<s";
echo "cript language=\"JavaScript\" type=\"text/javascript\">\t\r\n\tfunction select()\r\n\t{\r\n\t\tvar f=document.form1;\r\n\t\tif(f.holder.value==\"\" || f.selectedName.value==\"\"){\r\n\t\t\talert('";
echo getLang( "meeting_update_chooseMaster" );
echo "');//在选择与会人员之前,请先选择会议主持人!\r\n\t\t\tf.selectedName.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tselectUser_multi(\"";
echo $appCtx;
echo "syscommon/pop_frame.php?type=select_user&holder=\"+f.holder.value,\r\n\t\t\t\"selectedIDs\",\"selectedNames\");\r\n\t}\r\n\t\r\n\tfunction selectAdd(){\r\n\t\tvar f=document.form1;\r\n\t\tif(f.holder.value==\"\" || f.selectedName.value==\"\"){\r\n\t\t\talert('";
echo getLang( "meeting_update_chooseMaster" );
echo "');//在选择与会人员之前,请先选择会议主持人!\r\n\t\t\tf.selectedName.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\t//alert(f.selectedIDs.value);\r\n\t\tselectUser_multi(\"";
echo $appCtx;
echo "/syscommon/pop_frame.php?type=select_user&holder=\"+f.holder.value+\"&selectedUsers=\"+f.selectedIDs.value,\r\n\t\t\t\"selectedIDs\",\"selectedNames\");\r\n\t}\r\n\t\r\n\tfunction clear(form){\r\n\t\r\n\t\tform.selectedIDs.value=\"\";\r\n\t\tform.selectedNames.value=\"\";\r\n\t}\r\n\t\r\n\tfunction select2()\r\n\t{\r\n\t\tselectUser_single('";
echo $appCtx;
echo "syscommon/pop_frame.php?type=select_user_single&listType=1',\r\n\t\t\t\"holder\",\"selectedName\");\r\n\t}\r\n\t\r\n\tfunction clear2(form){\r\n\t\r\n\t\tform.selectedName.value=\"\";\r\n\t\tform.holder.value=\"\";\r\n\t}\r\n\t\r\n\tfunction goAdd(){\r\n\t\tvar f=document.form1;\r\n\t\tif(isEmpty2(f.meet_name)){\r\n\t\t\tf.meet_name.focus();\r\n\t\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_update_inputMeetingName" );
echo "';//请输入会议名称!\r\n\t\t\t\$(\"errorMsg\").style.display='';\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\t\r\n\t\tif(f.meet_name.value.length>50){\r\n\t\t\tf.meet_name.focus();\r\n\t\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_update_maxLength" );
echo "';//会议名称的长度不能超过50个字符\r\n\t\t\t\$(\"errorMsg\").style.display='';\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\t\r\n\t\tif(isEmpty2(f.startDate)){\r\n\t\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_update_inputmeetingStartTime" );
echo "';//请输入开始时间\r\n\t\t\t\$(\"errorMsg\").style.display='';\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\t\r\n\t\tif(f.holder.value==\"\" || f.selectedName.value==\"\"){\r\n\t\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_update_chooseMeetingMaster" );
echo "';//请选择会议主持人\r\n\t\t\t\$(\"errorMsg\").style.display='';\r\n\t\t\tf.selectedName.focus();\r\n\t\t\treturn false;\r\n\t\t}\t\r\n\t\t\r\n\t\t\r\n\t\treturn true;\r\n\t}\t\r\n\r\n\t\r\n\r\n\r\nfunction showStyle(value)\r\n{\r\n\tif(value=='0')\r\n\t{\r\n\t\t//document.all.style1.style.display='';\r\n\t\tdocument.all.style2.style.display='';\r\n\t\t\r\n\t}\r\n\tif(value=='1')\r\n\t{\r\n\t\t//document.all.style1.style.display='none';\r\n\t\tdocument.all.style2.style.displ";
echo "ay='none';\r\n\t\t\r\n\t}\r\n}\r\n\r\nfunction rtn(){\r\n\tlocation.href='";
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
echo "images/main_bg.gif\"\r\n\ttopmargin=0 marginheight=\"0\" marginwidth=\"0\">\r\n<center><br>\r\n<div id=\"errorMsg\" class=\"ErrorBox\" style=\"display: none\"></div>\r\n<div id=\"confirmMsg\" class=\"NoteBox\" style=\"display: none\"><!-- 确认提交所填的信息吗? -->";
echo getLang( "meeting_update_confirmInfFill" );
echo str_repeat( "&nbsp;", 9 );
echo " <a href=\"#\"\r\n\tonclick=\"javascript:document.form1.submit();\">";
echo "<s";
echo "trong><!--确定-->";
echo getLang( "meeting_update_confirm" );
echo "</strong></a>\r\n&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"#\"\r\n\tonclick=\"javascript:\$('confirmMsg').style.display='none';\">";
echo "<s";
echo "trong><!--取消-->";
echo getLang( "meeting_update_cancel" );
echo "</strong></a>\r\n</div>\r\n<table cellspacing=0 cellpadding=0 width=\"100%\" border=0>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td valign=top align=middle width=\"100%\"><br>\r\n\t\t\t<form name=\"form1\"\r\n\t\t\t\taction=\"";
echo $appCtx;
echo "meeting/meeting_actions.php?action=update\"\r\n\t\t\t\tmethod=post onSubmit=\"return goAdd();\"><input\r\n\t\t\t\tvalue=\"";
echo $meet['id'];
echo "\" type=\"hidden\" name=\"id\">\r\n\t\t\t<table cellspacing=0 cellpadding=0 width=80% border=0>\r\n\t\t\t\t<tbody>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td width=10><img height=11 src=\"";
echo $appCtx;
echo "images/bg_1.gif\"\r\n\t\t\t\t\t\t\twidth=10></td>\r\n\t\t\t\t\t\t<td width=100% background=\"";
echo $appCtx;
echo "images/bg_5.gif\"></td>\r\n\t\t\t\t\t\t<td width=10><img height=11 src=\"";
echo $appCtx;
echo "images/bg_2.gif\"\r\n\t\t\t\t\t\t\twidth=10></td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td background=\"";
echo $appCtx;
echo "images/bg_7.gif\">&nbsp;</td>\r\n\t\t\t\t\t\t<td align=middle bgcolor=#ffffff>\r\n\t\t\t\t\t\t<TABLE height=39 cellSpacing=0 cellPadding=0 width=100% border=0>\r\n\t\t\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t<TD class=titlered width=300 height=39><IMG height=32\r\n\t\t\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "images/wlhy.gif\" width=40> <!--更新会议信息-->";
echo getLang( "meeting_update_meetingUpdateInf" );
echo "\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t\t<TD width=350>&nbsp;</TD>\r\n\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t</TBODY>\r\n\t\t\t\t\t\t</TABLE>\r\n\t\t\t\t\t\t<TABLE class=table height=172 cellSpacing=0 cellPadding=0\r\n\t\t\t\t\t\t\twidth=100% border=0>\r\n\t\t\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t<TD class=td1><!--会议名称-->";
echo getLang( "meeting_update_meetingName" );
echo "<FONT\r\n\t\t\t\t\t\t\t\t\t\tcolor=red>*</FONT></TD>\r\n\t\t\t\t\t\t\t\t\t<TD class=td2><INPUT maxLength=128 size=48 name=\"meet_name\"\r\n\t\t\t\t\t\t\t\t\t\tnomorethan=\"128\" datatype=\"String\" notnull=\"true\"\r\n\t\t\t\t\t\t\t\t\t\tvalue=\"";
echo $meet['meet_name'];
echo "\"></TD>\r\n\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t<TD class=\"td1\"><!--会议主题-->";
echo getLang( "meeting_update_meetingSubject" );
echo "\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t\t<TD class=\"td2\"><TEXTAREA name=\"subject\" rows=7 cols=70>";
echo $meet['subject'];
echo "</TEXTAREA>\r\n\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t";
echo "<s";
echo "cript language=\"javascript1.2\">editor_generate('subject');</script>\r\n\r\n\t\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t\t<TD class=td1><!--开始时间-->";
echo getLang( "meeting_update_meetingStartime" );
echo "<FONT\r\n\t\t\t\t\t\t\t\t\t\tcolor=red>*</FONT></TD>\r\n\t\t\t\t\t\t\t\t\t<TD class=td2><INPUT readOnly size=10 name=startDate\r\n\t\t\t\t\t\t\t\t\t\tid='startDate' onFocus=\"calendar();\" value=\"";
echo $date;
echo "\">\r\n\t\t\t\t\t\t\t\t\t&nbsp; ";
echo makeHourHtml( "hour", $hour );
echo makeMinuteHtml( "min", $minute );
echo "\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t<TD class=td1><!--主持人-->";
echo getLang( "meeting_update_meetingMaster" );
echo "<FONT\r\n\t\t\t\t\t\t\t\t\t\tcolor=red>*</FONT></TD>\r\n\t\t\t\t\t\t\t\t\t<TD class=td2><input type=\"hidden\" name=\"holder\"\r\n\t\t\t\t\t\t\t\t\t\tvalue=\"";
echo $holder['user_id'];
echo "\"> <input type=\"text\"\r\n\t\t\t\t\t\t\t\t\t\tname=\"selectedName\" readonly=true style=\"width: 200px\"\r\n\t\t\t\t\t\t\t\t\t\tvalue=\"";
echo $meet['holder'];
echo "\">\r\n\t\t\t\t\t\t\t\t\t<a href=\"javascript:select2();\"><!--选人-->";
echo getLang( "meeting_update_choosePerson" );
echo "</a>\r\n\t\t\t\t\t\t\t\t\t<a href=\"javascript:clear2(document.form1);\"><!--清空-->";
echo getLang( "meeting_update_clear" );
echo "</a>\r\n\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t<TR id=\"style2\" style=\"DISPLAY: \">\r\n\t\t\t\t\t\t\t\t\t<TD class=td1><!--与会人员-->";
echo getLang( "meeting_update_meetingPerson" );
echo "\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t\t<TD class=td2><textarea rows=\"3\" cols=\"70\" name=\"selectedNames\"\r\n\t\t\t\t\t\t\t\t\t\treadonly>";
echo $user_str;
echo "</textarea> <input type=\"hidden\"\r\n\t\t\t\t\t\t\t\t\t\tname=\"selectedIDs\" value=\"";
echo $user_ids;
echo "\"> <a href=\"#\"\r\n\t\t\t\t\t\t\t\t\t\tonclick=\"javascript:selectAdd();\"\r\n\t\t\t\t\t\t\t\t\t\ttitle='";
echo getLang( "meeting_update_choosePersonTip" );
echo "'> <!--选人-->";
echo getLang( "meeting_update_choosePerson" );
echo "</a>\r\n\t\t\t\t\t\t\t\t\t<a href=\"javascript:clear(document.form1);\"><!--清空  -->";
echo getLang( "meeting_update_clear" );
echo "</a>\r\n\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t</TBODY>\r\n\t\t\t\t\t\t</TABLE>\r\n\t\t\t\t\t\t<TABLE height=42 cellSpacing=0 cellPadding=0 width=100% border=0>\r\n\t\t\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t\t\t<TR align=middle>\r\n\t\t\t\t\t\t\t\t\t<TD height=42><input type=image height=25\r\n\t\t\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "images/";
echo $lang;
echo "save.gif\" width=78 border=0>\r\n\t\t\t\t\t\t\t\t\t&nbsp;&nbsp; <a href=\"javascript:rtn();\"><img height=25\r\n\t\t\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "images/";
echo $lang;
echo "return.gif\" width=78\r\n\t\t\t\t\t\t\t\t\t\tborder=0> </a> &nbsp;&nbsp;</TD>\r\n\t\t\t\t\t\t\t\t\t<TD></TD>\r\n\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t</TBODY>\r\n\t\t\t\t\t\t</TABLE>\r\n\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t<td background=\"";
echo $appCtx;
echo "images/bg_8.gif\"></td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td><img height=11 src=\"";
echo $appCtx;
echo "images/bg_3.gif\" width=10></td>\r\n\t\t\t\t\t\t<td background=\"";
echo $appCtx;
echo "images/bg_6.gif\"></td>\r\n\t\t\t\t\t\t<td><img height=11 src=\"";
echo $appCtx;
echo "images/bg_4.gif\" width=10></td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t</tbody>\r\n\t\t\t</table>\r\n\t\t\t</form>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n</center>\r\n</body>\r\n</html>\r\n";
echo "<s";
echo "cript type=\"text/javascript\">showStyle('";
echo $meet['is_allowed_guest'];
echo "');</script>\r\n";
?>
