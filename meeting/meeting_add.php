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
echo "\r\n\r\n\r\n<html>\r\n<head>\r\n<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<title></title>\r\n<link href=\"";
echo $appCtx;
echo "images/style.css\" rel=\"stylesheet\" type=\"text/css\">\r\n";
echo "<S";
echo "CRIPT src=\"";
echo $appCtx;
echo "js/calendar.js\"></SCRIPT> \r\n";
echo "<S";
echo "CRIPT src=\"";
echo $appCtx;
echo "js/common.js\" type=text/javascript></SCRIPT>\r\n ";
echo "<S";
echo "TYLE>BODY {\tOVERFLOW-Y: auto}\r\n</STYLE>\r\n\r\n\r\n";
echo "<s";
echo "cript language=\"JavaScript\" type=\"text/javascript\">\r\n\t\r\n\tfunction select()\r\n\t{\r\n\t\tvar f=document.form1;\r\n\t\t//alert(f.holder.value+\" \"+f.selectedName.value);\r\n\t\tif(f.holder.value==\"\" || f.selectedName.value==\"\"){\r\n\t\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_add_chooseMaster" );
echo "';//在选择与会人员之前,请先选择会议主持人!\r\n\t\t\t\$(\"errorMsg\").style.display='';\r\n\t\t\tf.selectedName.focus();\r\n\t\t\treturn false;\r\n\t\t}\r\n\t\tselectUser_multi(\"";
echo $appCtx;
echo "syscommon/pop_frame.php?type=select_user&holder=\"+f.holder.value,\r\n\t\t\t\"selectedIDs\",\"selectedNames\");\r\n\t}\r\n\t\r\n\tfunction clear(form){\r\n\t\r\n\t\tform.selectedIDs.value=\"\";\r\n\t\tform.selectedNames.value=\"\";\r\n\t}\r\n\t\r\n\tfunction select2()\r\n\t{\t\r\n\t\tif(is_ie){\r\n\t\t\tselectUser_single('";
echo $appCtx;
echo "syscommon/pop_frame.php?type=select_user_single&listType=1',\r\n\t\t\t\"holder\",\"selectedName\");\r\n\t\t}else{\t\t\t\r\n\t\t\tselectUser_single2('";
echo $appCtx;
echo "syscommon/pop_frame.php?type=select_user_single&listType=1');\r\n\t\t}\r\n\t}\r\n\t\r\n\tfunction clear2(form){\r\n\t\r\n\t\tform.selectedName.value=\"\";\r\n\t\tform.holder.value=\"\";\r\n\t}\t\r\n\r\n\tfunction goAdd(){\r\n\t\tvar f=document.form1;\r\n\t\tif(isEmpty(f.meet_name,'";
echo getLang( "meeting_add_inputmeetingName" );
echo "')) return false;//请输入会议名称!\r\n\t\tif(f.holder.value==\"\" || f.selectedName.value==\"\"){\r\n\t\t\talert('";
echo getLang( "meeting_add_chooseMeetingMaster" );
echo "');//请选择会议主持人!\r\n\t\t\tf.selectedName.focus();\r\n\t\t\treturn false;\r\n\t\t}\t\t\r\n\t\t\r\n\t\t\r\n\t\t\r\n\t\tif(confirm('";
echo getLang( "meeting_add_confirmInf" );
echo "')){//确认提交所填的信息吗?\r\n\t\t  return true;\r\n\t\t}else{\r\n\t\t\treturn false;\r\n\t\t}\r\n}\r\n\r\nfunction goAdd2(){\r\n\tvar f=document.form1;\r\n\tif(isEmpty2(f.meet_name)){\r\n\t\tf.meet_name.focus();\r\n\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_add_inputmeetingName" );
echo "';//请输入会议名称!\r\n\t\t\$(\"errorMsg\").style.display='';\r\n\t\treturn false;\r\n\t}\r\n\t\r\n\tif(f.meet_name.value.length>50){\r\n\t\tf.meet_name.focus();\r\n\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_add_maxLength" );
echo "';//会议名称的长度不能超过50个字符！\r\n\t\t\$(\"errorMsg\").style.display='';\r\n\t\treturn false;\r\n\t}\r\n\t\r\n\tif(isEmpty2(f.startDate)){\r\n\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_add_inputmeetingStartTime" );
echo "';//请输入开始时间!\r\n\t\t\$(\"errorMsg\").style.display='';\r\n\t\treturn false;\r\n\t}\r\n\t\r\n\tif(f.holder.value==\"\" || f.selectedName.value==\"\"){\r\n\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_add_chooseMeetingMaster" );
echo "';//请选择会议主持人!\r\n\t\t\$(\"errorMsg\").style.display='';\r\n\t\tf.selectedName.focus();\r\n\t\treturn false;\r\n\t}\t\r\n\t\r\n\tif(isEmpty2(f.capacity)){\r\n\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_add_inputmeetingPerNumber" );
echo "';//请输入会议室容纳人数!\r\n\t\t\$(\"errorMsg\").style.display='';\r\n\t\tf.capacity.focus();\r\n\t\treturn false;\r\n\t}\r\n\t\r\n\t\r\n\t/*var patrn=/^[1-9]d*\$/;*/\r\n\t var patrn=/^[0-9]*[1-9][0-9]*\$/;\r\n\tif(!patrn.test(f.capacity.value)){\r\n\t\tf.capacity.focus();\t\r\n\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_add_meetingAbnomalCha" );
echo "';//会议室容纳人数为非法字符,请填入非负整数值!\r\n\t\t\$(\"errorMsg\").style.display='';\t\t\r\n\t\treturn false;\r\n\t}\r\n\tif(eval(f.capacity.value)>";
echo MAX_ACCOUNT_CAPACITY;
echo "){\r\n\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_add_maxNum1" );
echo "'+";
echo MAX_MEETING_CAPACITY;
echo "+'";
echo getLang( "meeting_add_maxNum2" );
echo "';//会议室超出最大人数限制,请输入1到 之间的正整数!\r\n\t\t\$(\"errorMsg\").style.display='';\r\n\t\treturn false;\r\n\t}\r\n\treturn true;\r\n}\r\n\r\n\r\nfunction showStyle(value)\r\n{\r\n\tif(value=='0')\r\n\t{\r\n\t\t//document.all.style1.style.display='';\r\n\t\tdocument.all.style2.style.display='';\r\n\t\t\r\n\t}\r\n\tif(value=='1')\r\n\t{\r\n\t\t//document.all.style1.style.display='none';\r\n\t\tdocument.all.style2.style.display='n";
echo "one';\r\n\t\t\r\n\t}\r\n}\r\n\r\nfunction rtn(){\r\n\tlocation.href='";
echo $appCtx;
echo "meeting/meeting_manage.php';\r\n}\r\n</script>\r\n\r\n\r\n";
echo "<s";
echo "cript language=\"Javascript1.2\"><!-- // load htmlarea\r\n_editor_url = \"";
echo $appCtx;
echo "/syscommon/\";                     // URL to htmlarea files\r\nvar win_ie_ver = parseFloat(navigator.appVersion.split(\"MSIE\")[1]);\r\nif (navigator.userAgent.indexOf('Mac')        >= 0) { win_ie_ver = 0; }\r\nif (navigator.userAgent.indexOf('Windows CE') >= 0) { win_ie_ver = 0; }\r\nif (navigator.userAgent.indexOf('Opera')      >= 0) { win_ie_ver = 0; }\r\nif (win_ie_ver >= 5.5) {\r\n  document.write('";
echo "<s";
echo "cr' + 'ipt src=\"' +_editor_url+ 'editor.js\"');\r\n  document.write(' language=\"Javascript1.2\"></scr' + 'ipt>');  \r\n} else { document.write('";
echo "<s";
echo "cr'+'ipt>function editor_generate() { return false; }</scr'+'ipt>'); }\r\n// --></script>\r\n\r\n</head>\r\n\r\n<BODY leftMargin=0 background=\"";
echo $appCtx;
echo "images/main_bg.gif\" topMargin=0 \r\nmarginheight=\"0\" marginwidth=\"0\">\r\n<CENTER><br>\r\n";
if ( !empty( $errorMsg ) )
{
    echo "\t<div class=\"ErrorBox\">";
    echo $errorMsg;
    echo "</div>";
}
echo "\t";
if ( !empty( $resultMsg ) )
{
    echo "\t<div class=\"NoteBox\">";
    echo $resultMsg;
    echo "</div> ";
}
echo "\t\r\n \t<div id=\"errorMsg\" class=\"ErrorBox\" style=\"display:none\"></div>\r\n<TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0>\r\n  <TBODY>\r\n  <TR>\r\n    <TD vAlign=top align=middle width=\"100%\">\r\n     \r\n      <BR><!-- 提交路径 -->\r\n      <FORM name=\"form1\" action=\"";
echo $appCtx;
echo "meeting/meeting_actions.php?action=add\" \r\n      method=post onSubmit=\"return goAdd2();\">\r\n      <TABLE cellSpacing=0 cellPadding=0 width=80% border=0>\r\n        <TBODY>\r\n        <TR>\r\n          <TD width=10><IMG height=11 src=\"";
echo $appCtx;
echo "images/bg_1.gif\"></TD>\r\n          <TD width=100% background=";
echo $appCtx;
echo "images/bg_5.gif></TD>\r\n          <TD width=10><IMG height=11 src=\"";
echo $appCtx;
echo "images/bg_2.gif\"></TD></TR>\r\n        <TR>\r\n          <TD background=";
echo $appCtx;
echo "images/bg_7.gif height=300>&nbsp;</TD>\r\n          <TD align=middle bgColor=#ffffff>\r\n            <TABLE height=300 cellSpacing=0 cellPadding=0 width=100% border=0>\r\n              <TBODY>\r\n              <TR>\r\n                <TD vAlign=top align=middle bgColor=#ffffff height=300>\r\n                  <TABLE height=39 cellSpacing=0 cellPadding=0 width=100% \r\n                  border=0>\r\n                    <T";
echo "BODY>\r\n                    <TR>\r\n                      <TD class=titlered width=300 height=39><IMG height=32 \r\n                        src=\"";
echo $appCtx;
echo "/images/wlhy.gif\" width=40> <!--新建会议 --> ";
echo getLang( "meeting_add_newMeeting" );
echo "</TD>\r\n                      <TD width=350>&nbsp;</TD></TR></TBODY></TABLE>\r\n                  <TABLE class=table height=200 cellSpacing=0 cellPadding=0 \r\n                  width=100% border=0>\r\n                    <TBODY>\r\n                    <TR>\r\n                      <TD class=td1><!-- 会议名称 -->&nbsp;";
echo getLang( "meeting_add_meetingName" );
echo "<FONT color=red>*</FONT> </TD>\r\n                      <TD class=td2><INPUT maxLength=128 \r\n                        size=48 name=\"meet_name\" nomorethan=\"128\" datatype=\"String\" \r\n                        notnull=\"true\"></TD></TR>\r\n                    <TR>\r\n                      <TD class=\"td1\"><!-- 会议主题 --> ";
echo getLang( "meeting_add_meetingTitle" );
echo " </TD>\r\n                      <TD class=\"td2\"><TEXTAREA name=\"subject\" rows=8 cols=70></TEXTAREA>                      \r\n                      </TD></TR>\r\n\t\t\t\t\t";
echo "<s";
echo "cript language=\"javascript1.2\">editor_generate('subject');</script>\r\n                   \r\n                   <tr>\r\n                      <TD class=td1><!-- 开始时间 -->";
echo getLang( "meeting_add_meetingStartTime" );
echo "&nbsp;<FONT color=red>*</FONT></TD>\r\n                      <TD class=td2><INPUT size=10 id=startDate onFocus=\"calendar();\"\r\n                        name=startDate value=\"";
echo date( "Y-m-d" );
echo "\">&nbsp;                        \r\n                        ";
echo makeHourHtml( "hour", 8 );
echo "                        ";
echo makeMinuteHtml( "min", 0 );
echo "                         </TD></tr>\r\n                     <TR>\r\n                     <TD class=td1><!--主持人 -->";
echo getLang( "meeting_add_meetingMaster" );
echo "&nbsp;<FONT color=red>*</FONT></TD>\r\n                      <TD class=td2>                 \r\n                       \t<input type=\"hidden\" name=\"holder\" id=\"holder\">\r\n                      \t<input type=\"text\" id=\"selectedName\" name=\"selectedName\" readonly=true>\r\n                      \t<a href=\"javascript:select2();\"><!--选人-->";
echo getLang( "meeting_add_choosePersons" );
echo "</a>\r\n                     <a href=\"javascript:clear2(document.form1);\"><!--清空 -->";
echo getLang( "meeting_add_clean" );
echo "</a>\r\n                      </TD>\r\n                     </TR>\r\n                       <TR id=\"style2\" style=\"DISPLAY: \">\r\n                     <TD class=td1><!--与会人员 -->";
echo getLang( "meeting_add_meetingPerson" );
echo "&nbsp;<FONT color=red>*</FONT></TD>\r\n                     <TD class=td2><textarea rows=\"3\" cols=\"70\" name=\"selectedNames\" readonly></textarea>\r\n                     <input type=\"hidden\" name=\"selectedIDs\">\r\n                     <a href=\"#\" onClick=\"javascript:select();\"><!--选人 -->";
echo getLang( "meeting_add_choosePersons" );
echo "</a>\r\n                     <a href=\"javascript:clear(document.form1);\"><!--清空 -->";
echo getLang( "meeting_add_clean" );
echo "</a>\r\n                     </TD>\r\n                     </TR>\r\n                      </TBODY></TABLE>\r\n                  <TABLE height=42 cellSpacing=0 cellPadding=0 width=100% \r\n                  border=0>\r\n                    <TBODY>\r\n                    <TR align=middle>\r\n                      <TD height=42>\r\n                      <input type=image \r\n                        height=25 src=\"";
echo $appCtx;
echo "images/";
echo $lang;
echo "save.gif\" width=78 border=0>     \r\n                         &nbsp;&nbsp;\r\n                        <a href=\"javascript:rtn();\"><img \r\n                        height=25 src=\"";
echo $appCtx;
echo "/images/";
echo $lang;
echo "return.gif\" width=78 border=0></a>\r\n                        &nbsp;&nbsp;\r\n                        </TD>\r\n                      <TD></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD>\r\n          <TD background=";
echo $appCtx;
echo "images/bg_8.gif>&nbsp;</TD></TR>\r\n        <TR>\r\n          <TD><IMG height=11 src=\"";
echo $appCtx;
echo "images/bg_3.gif\" width=10></TD>\r\n          <TD background=";
echo $appCtx;
echo "images/bg_6.gif></TD>\r\n          <TD><IMG height=11 src=\"";
echo $appCtx;
echo "images/bg_4.gif\" \r\n        width=10></TD></TR></TBODY></TABLE></FORM></TD></TR></TBODY></TABLE></CENTER></BODY></HTML>\r\n";
?>
