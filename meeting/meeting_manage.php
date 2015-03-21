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
$map = array(
    "meet_name" => getParam( "meet_name" ),
    "subject" => getParam( "subject" )
);
$showPage = ( integer )$_GET['page'];
if ( !isset( $_GET['page'] ) )
{
    $showPage = 1;
}
$queryString = "meet_name=".getParam( "meet_name" )."&subject=".getParam( "subject" );
$page_list = meeting_query( $showPage, $map );
$data_list = $page_list->getDataList( );
$nav = $page_list->getNavigation( "meeting_manage.php", $queryString );
echo "\r\n\r\n<!doctype html public \"-//w3c//dtd html 4.0 transitional//en\">\r\n<html>\r\n<head>\r\n<meta http-equiv=content-type content=\"text/html; charset=utf-8\">\r\n<meta content=\"mshtml 6.00.2900.2180\" name=generator>\r\n";
echo "<S";
echo "CRIPT src=\"";
echo $appCtx;
echo "/js/select.js\" type=text/javascript></SCRIPT>\r\n";
echo "<S";
echo "CRIPT src=\"";
echo $appCtx;
echo "/js/common.js\" type=text/javascript></SCRIPT>\r\n<link href=\"";
echo $appCtx;
echo "/images/style.css\" type=text/css\r\n\trel=stylesheet>\r\n";
echo "<s";
echo "tyle>\r\nbody {\r\n\toverflow-y: auto\r\n}\r\n</style>\r\n";
echo "<s";
echo "cript>\r\nfunction CheckDel(deptbh,uid)\r\n  {\r\n  \t ok=window.confirm('";
echo getLang( "meeting_manage_DeleteMeetingInf" );
echo "');//真的要删除该会议的信息吗?\r\n     if(ok)\r\n     {      \r\n       window.location.href=\"";
echo $appCtx;
echo "meeting/meeting_actions.php?action=meeting_del&id=\"+uid;\r\n     }\r\n     else{\r\n     \twindow.location.href=\"";
echo $appCtx;
echo "meeting/meeting_manage.php\";\r\n     }\r\n  }\r\n  \r\nvar uid=0;\r\nfunction confirmDelete(id){\r\n\tuid=id;\r\n\tif(\$('resultMsg')!=null)\r\n\t\t\$('resultMsg').style.display='none';\r\n\tif(\$('errMsg')!=null)\r\n\t\t\$('errMsg').style.display='none'\r\n\t\$(\"confirmMsg\").style.display='';\r\n}\r\n\r\nfunction del(){\r\n\twindow.location.href=\"";
echo $appCtx;
echo "meeting/meeting_actions.php?action=del&id=\"+uid;\r\n}\r\n\r\nfunction cancelDelete(){\r\n\t\$(\"confirmMsg\").style.display='none';\r\n}\r\n  \r\nfunction query(){\r\n\tvar f=document.form1;\r\n\tvar pattern=/[%&',;=?\$_]+/g;\r\n\tif(pattern.test(f.meet_name.value) || pattern.test(f.subject.value)){\r\n\t\t\$(\"errorMsg\").innerText='";
echo getLang( "meeting_manage_abnomalKeyCha" );
echo "';//查询关键字含有非法字符(%&',;=?\$_)!;\r\n\t\t\$(\"errorMsg\").style.display='';\r\n\t\treturn false;\r\n\t}\r\n\treturn true;\r\n}\r\n  </script>\r\n</head>\r\n<body leftmargin=0 background=\"";
echo $appCtx;
echo "/images/main_bg.gif\"\r\n\ttopmargin=0 marginheight=\"0\" marginwidth=\"0\">\r\n<center><br>\r\n";
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
echo "\t\r\n<div id=\"errorMsg\" class=\"ErrorBox\" style=\"display: none\"></div>\r\n<div id=\"confirmMsg\" class=\"NoteBox\" style=\"display: none\"><!-- 您确定要删除该会议信息吗?-->\r\n";
echo getLang( "meeting_manage_DeleteMeetingInf" );
echo str_repeat( "&nbsp;", 9 );
echo "<a href=\"#\" onClick=\"javascript:del();\">";
echo "<s";
echo "trong><!-- 确定删除-->";
echo getLang( "meeting_manage_confirmDel" );
echo "</strong></a>\r\n&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"#\"\r\n\tonclick=\"javascript:cancelDelete();\">";
echo "<s";
echo "trong><!-- 取消-->";
echo getLang( "meeting_manage_cancel" );
echo "</strong></a></div>\r\n<table cellspacing=0 cellpadding=0 width=\"100%\" border=0>\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td valign=top align=middle width=\"80%\"><br>\r\n\t\t\t<form name=\"form1\" method=\"post\"\r\n\t\t\t\taction=\"";
echo $appCtx;
echo "meeting/meeting_manage.php\"\r\n\t\t\t\tonsubmit=\"return query();\">\r\n\t\t\t<table cellspacing=0 cellpadding=0 width=80% border=0>\r\n\t\t\t\t<tbody>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td width=10><img height=11 src=\"";
echo $appCtx;
echo "images/bg_1.gif\"\r\n\t\t\t\t\t\t\twidth=10></td>\r\n\t\t\t\t\t\t<td width=100% background=\"";
echo $appCtx;
echo "images/bg_5.gif\"></td>\r\n\t\t\t\t\t\t<td width=10><img height=11 src=\"";
echo $appCtx;
echo "images/bg_2.gif\"\r\n\t\t\t\t\t\t\twidth=10></td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td background='";
echo $appCtx;
echo "images/bg_7.gif'>&nbsp;</td>\r\n\t\t\t\t\t\t<td align=middle bgcolor=#ffffff>\r\n\t\t\t\t\t\t<table cellspacing=0 cellpadding=0 width=100% border=0>\r\n\t\t\t\t\t\t\t<tbody>\r\n\t\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t\t<td valign=top align=middle bgcolor=#ffffff>\r\n\t\t\t\t\t\t\t\t\t<TABLE width=100% border=0 align=\"center\" cellPadding=0\r\n\t\t\t\t\t\t\t\t\t\tcellSpacing=0>\r\n\t\t\t\t\t\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD height=46 class=titlered><IMG height=32\r\n\t\t\t\t\t\t\t";
echo "\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "images/wlhy.gif\" width=40> <!-- 会议管理 -->";
echo getLang( "meeting_manage_meetingManage" );
echo "</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<td align=center></td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD></TD>\r\n\t\t\t\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<td height=10></td>\r\n\t\t\t\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<td align=center>";
echo "<s";
echo "trong> <!-- 名称:-->";
echo getLang( "meeting_manage_name" );
echo "</strong>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"meet_name\"></td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<td>";
echo "<s";
echo "trong> <!-- 主题:-->";
echo getLang( "meeting_manage_subject" );
echo "</strong>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"subject\"></td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TD><input type=\"image\"\r\n\t\t\t\t\t\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "images/";
echo $lang;
echo "query.gif\"\r\n\t\t\t\t\t\t\t\t\t\t\t\t\talt='";
echo getLang( "meeting_manage_query" );
echo "'> <A\r\n\t\t\t\t\t\t\t\t\t\t\t\t\thref=\"";
echo $appCtx;
echo "meeting/meeting_add.php\"><IMG\r\n\t\t\t\t\t\t\t\t\t\t\t\t\tsrc=\"";
echo $appCtx;
echo "images/";
echo $lang;
echo "add.gif\" border=\"0\"> </A>\r\n\t\t\t\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t\t\t\t</TBODY>\r\n\t\t\t\t\t\t\t\t\t</TABLE>\r\n\t\t\t\t\t\t\t\t\t<br>\r\n\t\t\t\t\t\t\t\t\t<table width=\"100%\" border=\"0\" align=\"center\" cellspacing=\"0\"\r\n\t\t\t\t\t\t\t\t\t\tclass=table>\r\n\t\t\t\t\t\t\t\t\t\t<tr class=tdtitle HEIGHT=23>\r\n\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\"><!-- 名称-->";
echo getLang( "meeting_manage_name" );
echo "</th>\r\n\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\"><!-- 主题-->";
echo getLang( "meeting_manage_subject" );
echo "</th>\r\n\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\"><!-- 容纳人数-->";
echo getLang( "meeting_manage_personNum" );
echo "</th>\r\n\r\n\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\"><!-- 主持人-->";
echo getLang( "meeting_manage_master" );
echo "</th>\r\n\r\n\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\"><!-- 开始时间-->";
echo getLang( "meeting_manage_startTime" );
echo "</th>\r\n\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\"><!-- 状态-->";
echo getLang( "meeting_manage_status" );
echo "</th>\r\n\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\"><!-- 操作-->";
echo getLang( "meeting_manage_operate" );
echo "</th>\r\n\t\t\t\t\t\t\t\t\t\t</tr>\r\n\r\n\t\t\t\t\t\t\t\t\t\t";
$row = 0;
if ( $data_list )
{
    $i = 0;
    while ( $i < count( $data_list ) )
    {
        $meet = $data_list[$i];
        ++$row;
        $row_css_class_name = $row % 2 == 1 ? "td2" : "td1";
        echo "\t\t\t\t\t\t\t\t\t\t<tr align=\"center\" onMouseOver=\"changeRowColor(this,0);\"\r\n\t\t\t\t\t\t\t\t\t\t\tonmouseout=\"changeRowColor(this,1);\">\r\n\t\t\t\t\t\t\t\t\t\t\t<td align=left class=\"";
        echo $row_css_class_name;
        echo "\"><a\r\n\t\t\t\t\t\t\t\t\t\t\t\thref=\"";
        echo $appCtx;
        echo "meeting/meeting_view.php?id=";
        echo $meet['id'];
        echo "\"\r\n\t\t\t\t\t\t\t\t\t\t\t\ttitle=\"";
        echo $meet['meet_name'];
        echo "\"> ";
        echo api_trunc_str( $meet['meet_name'], 20 );
        echo "</a></td>\r\n\t\t\t\t\t\t\t\t\t\t\t<td align=left class=\"";
        echo $row_css_class_name;
        echo "\">";
        echo api_trunc_str( $meet['subject'] );
        echo "</td>\r\n\t\t\t\t\t\t\t\t\t\t\t<td class=\"";
        echo $row_css_class_name;
        echo "\">";
        echo $meet['capacity'];
        echo "</td>\r\n\t\t\t\t\t\t\t\t\t\t\t<td class=\"";
        echo $row_css_class_name;
        echo "\">";
        echo $meet['holder'];
        echo "</td>\r\n\t\t\t\t\t\t\t\t\t\t\t<td class=\"";
        echo $row_css_class_name;
        echo "\">";
        echo $meet['start_time'];
        echo "</td>\r\n\t\t\t\t\t\t\t\t\t\t\t<td class=\"";
        echo $row_css_class_name;
        echo "\">";
        if ( $meet['status'] == 0 )
        {
            echo getLang( "meeting_manage_ongoing" );
        }
        if ( $meet['status'] == 2 )
        {
            echo getLang( "meeting_manage_over" );
        }
        echo "</td>\r\n\t\t\t\t\t\t\t\t\t\t\t<td class=\"";
        echo $row_css_class_name;
        echo "\"><a\r\n\t\t\t\t\t\t\t\t\t\t\t\thref=\"";
        echo $appCtx;
        echo "meeting/meeting_view.php?id=";
        echo $meet['id'];
        echo "\" title=\"";
        echo getLang( "meeting_manage_view" );
        echo "\"><img src=\"";
        echo $appCtx;
        echo "images/view.gif\" border=0></a>&nbsp; \r\n\t\t\t\t\t\t\t\t\t\t\t\t";
        if ( $meet['status'] != 2 )
        {
            echo "\t\t\t\t\t\t\t\t\t\t\t<a\r\n\t\t\t\t\t\t\t\t\t\t\t\thref=\"";
            echo $appCtx;
            echo "meeting/meeting_edit.php?id=";
            echo $meet['id'];
            echo "\" title=\"";
            echo getLang( "meeting_manage_edit" );
            echo "\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
            echo $appCtx;
            echo "images/edit.gif\" border=0></a>&nbsp;&nbsp; ";
        }
        else
        {
            echo "\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
            echo $appCtx;
            echo "images/edit_na.gif\" border=0>&nbsp;&nbsp;\r\n\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t";
        }
        echo " \r\n                                            \r\n                                           \r\n                                                \r\n                                                \r\n\t\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp; ";
        if ( $meet['status'] != 2 )
        {
            echo " \r\n                                            \r\n                                            <a\r\n\t\t\t\t\t\t\t\t\t\t\t\thref=\"javascript:confirmDelete('";
            echo $meet['id'];
            echo "');\" title=\"";
            echo getLang( "meeting_manage_delete" );
            echo "\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
            echo $appCtx;
            echo "images/delete.gif\" border=0></a>\r\n\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        else
        {
            echo " <img src=\"";
            echo $appCtx;
            echo "images/delete_na.gif\" border=0>\r\n\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        echo "                                                \r\n                                                </td>\r\n\t\t\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t\t\t\t";
        ++$i;
    }
    echo "\t\t\t\t\t\t\t\t\t\t<tr class=\"PageBar\">\r\n\t\t\t\t\t\t\t\t\t\t\t<TD colspan=7 align=right>&nbsp;&nbsp;&nbsp;&nbsp; ";
    echo $nav;
    echo "</td>\r\n\t\t\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t\t\t\t";
}
else
{
    echo "\t\t\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t\t\t<TD>";
    echo getLang( "meeting_manage_noRecord" );
    echo "</TD>\r\n\t\t\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t\t\t";
}
echo "\t\t\t\t\t\t\t\t\t</table>\r\n\t\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t</tbody>\r\n\t\t\t\t\t\t</table>\r\n\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t<td background=\"";
echo $appCtx;
echo "images/bg_8.gif\">&nbsp;</td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t\t<tr>\r\n\t\t\t\t\t\t<td><img height=11 src=\"";
echo $appCtx;
echo "images/bg_3.gif\" width=10></td>\r\n\t\t\t\t\t\t<td background='";
echo $appCtx;
echo "/images/bg_6.gif'></td>\r\n\t\t\t\t\t\t<td><img height=11 src=\"";
echo $appCtx;
echo "images/bg_4.gif\" width=10></td>\r\n\t\t\t\t\t</tr>\r\n\t\t\t\t</tbody>\r\n\t\t\t</table>\r\n\t\t\t</form>\r\n\t\t\t</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n</center>\r\n</body>\r\n</html>\r\n";
?>
