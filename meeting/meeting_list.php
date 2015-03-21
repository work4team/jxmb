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
$page_list = meeting_getUserMeetingList( $showPage, $map, $_user['user_id'] );
$data_list = $page_list->getDataList( );
$nav = $page_list->getNavigation( "meeting_list.php", $queryString );
echo "<!doctype html public \"-//w3c//dtd html 4.0 transitional//en\">\r\n<html>\r\n<head>\r\n<meta http-equiv=content-type content=\"text/html; charset=utf-8\">\r\n<meta content=\"mshtml 6.00.2900.2180\" name=generator>\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"../lib/fonts/fonts-min.css\" />\r\n<link rel=\"stylesheet\" type=\"text/css\" href=\"../lib/button/assets/skins/sam/button.css\" />\r\n<link rel=\"stylesheet\" type=\"text/css";
echo "\" href=\"../lib/container/assets/skins/sam/container.css\" />\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../lib/yahoo-dom-event/yahoo-dom-event.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../lib/element/element-beta-min.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../lib/button/button-min.js\"></script>\r\n";
echo "<s";
echo "cript type=\"text/javascript\" src=\"../lib/container/container-min.js\"></script>\r\n\r\n";
echo "<S";
echo "CRIPT src=\"";
echo $appCtx;
echo "/js/select.js\" type=text/javascript></SCRIPT>\r\n";
echo "<S";
echo "CRIPT src=\"";
echo $appCtx;
echo "/js/common.js\" type=text/javascript></SCRIPT>\r\n<link href=\"";
echo $appCtx;
echo "/images/style.css\" rel=\"stylesheet\">\r\n";
echo "<s";
echo "tyle>\r\nbody {\toverflow-y: auto}\r\n</style>\r\n";
echo "<s";
echo "cript>\r\n\r\nvar meetNo;\r\nvar meetID;\r\nfunction enterMeeting(meet_no,mid)\r\n{\r\n  \tmeetNo=meet_no;\r\n\tmeetID=mid;\r\n\tYAHOO.example.container.simpledialog1.show();\r\n  \t//\$(\"confirmMsg\").style.display='';\r\n}\r\n\r\nfunction enter(obj)\r\n{\r\n\talert(obj);\r\n   /*\r\n   obj.target=\"_blank\";\r\n   obj.href = \"";
echo $appCtx;
echo "meeting/meeting_signin.php?roomID=\"+meetNo;\r\n   \$(\"confirmMsg\").style.display='none';\r\n   */\r\n   //obj.click();\r\n}\r\n\r\nfunction cancel(){\r\n\t\$(\"confirmMsg\").style.display='none';\r\n}  \r\n\r\nfunction query(){\r\n\tvar f=document.form1;\r\n\tf.submit();\r\n\treturn true;\r\n}\r\n  </script>\r\n\r\n";
echo "<s";
echo "cript>\r\nYAHOO.namespace(\"example.container\");\r\n\r\nfunction init() {\r\n\t\r\n\t// Define various event handlers for Dialog\r\n\tvar handleYes = function() {\r\n\t\t\r\n\t\t\r\n\t\t//window.location.target=\"_blank\";\r\n   \t\twindow.open( \"";
echo $appCtx;
echo "meeting/meeting_signin.php?roomID=\"+meetNo+\"&meetID=\"+meetID);\r\n\t\tthis.hide();\r\n\t};\r\n\tvar handleNo = function() {\r\n\t\tthis.hide();\r\n\t};\r\n\r\n\t// Instantiate the Dialog\r\n\tYAHOO.example.container.simpledialog1 = new YAHOO.widget.SimpleDialog(\"simpledialog1\", \r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t { width: \"300px\",\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   fixedcenter: true,\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   visible: false,\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   dr";
echo "aggable: true,\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   modal:true,\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   close: false,\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   text: \"你确定要进入会议室吗?\",\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   icon: YAHOO.widget.SimpleDialog.ICON_HELP,\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   constraintoviewport: true,\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t   buttons: [ { text:\"进入\", handler:handleYes, isDefault:true },\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t  { text:\"取消\",  ha";
echo "ndler:handleNo } ]\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t } );\r\n\tYAHOO.example.container.simpledialog1.setHeader(\"确定进入会议室?\");\r\n\t\r\n\tYAHOO.example.container.simpledialog1.render(\"container\");\r\n\r\n}\r\n\r\nYAHOO.util.Event.addListener(window, \"load\", init);\r\n</script>\r\n\r\n</head>\r\n<body  class=\" yui-skin-sam\" leftmargin=0 background=\"";
echo $appCtx;
echo "images/main_bg.gif\" topmargin=0 marginheight=\"0\" marginwidth=\"0\">\r\n\r\n<div id=\"container\">\r\n</div>\r\n\r\n<center><br><div id=\"confirmMsg\" class=\"NoteBox\" style=\"display:none\">\r\n\t\t<!--您确定要进入该会议室吗?  -->";
echo getLang( "meeting_list_confirmToRoom" );
echo " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; \r\n\t\t<a  id=\"enterRoom\" href=\"javascript:void(0)\" onClick=\"javascript:enter(this);\">";
echo "<s";
echo "trong><!--确定 -->";
echo getLang( "meeting_list_confirm" );
echo "</strong></a> &nbsp;&nbsp;&nbsp;&nbsp;\r\n\t\t<a href=\"#\" onClick=\"javascript:cancel();\">";
echo "<s";
echo "trong><!--取消 -->";
echo getLang( "meeting_list_cancel" );
echo "</strong></a>\r\n\t</div>\r\n  <table cellspacing=0 cellpadding=0 width=\"100%\" border=0>\r\n    <tr>\r\n      <td valign=top align=middle width=\"100%\"><br>\r\n        <form name=\"form1\" method=\"post\"\r\n\t\t\t\taction=\"";
echo $appCtx;
echo "/sysmanage/MeetingAction.action?action=query\">\r\n          <table cellspacing=0 cellpadding=0 width=80% border=0>\r\n            <tr>\r\n              <td width=10><img height=11 src=\"";
echo $appCtx;
echo "/images/bg_1.gif\" \r\n            width=10></td>\r\n              <td width=100% background=\"";
echo $appCtx;
echo "/images/bg_5.gif\"></td>\r\n              <td width=10><img height=11 src=\"";
echo $appCtx;
echo "/images/bg_2.gif\" \r\n            width=10></td>\r\n            </tr>\r\n            <tr>\r\n              <td background=\"";
echo $appCtx;
echo "/images/bg_7.gif\">&nbsp;</td>\r\n              <td align=middle bgcolor=#ffffff>\r\n\t\t\t   <TABLE width=100% border=0 align=\"center\"\r\n\t\t\t\t\t\t\t\t\t\t\t\tcellPadding=0 cellSpacing=0>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<TBODY>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<TD height=46 class=titlered >\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<IMG height=32 \r\n                        src=\"";
echo $appCtx;
echo "images/wlhy.gif\" width=40> <!--我的会议 -->";
echo getLang( "meeting_list_myMeeting" );
echo " \r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td align=center>";
echo "<s";
echo "trong></strong><br>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<tr >\t\t\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<TD>\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t</TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t\t\t\t\t\t</TBODY>\r\n\t\t\t\t\t\t\t\t\t\t\t</TABLE>\r\n\t\t\t\t\t\t\t\t\t\t\t<table width=\"100%\" border=\"0\" align=\"center\" cellspacing=\"0\"\r\n\t\t\t\t\t\t\t\t\t\t\t\tclass=table>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<tr class=tdtitle HEIGHT=23>\r\n";
echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<!--名称 -->";
echo getLang( "meeting_list_meetingname" );
echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</th>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<!--主题 -->";
echo getLang( "meeting_list_subject" );
echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</th>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<!--容纳人数 -->";
echo getLang( "meeting_list_personNum" );
echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</th>\r\n\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<!--主持人 -->";
echo getLang( "meeting_list_master" );
echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</th>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<!--开始时间 -->";
echo getLang( "meeting_list_startTime" );
echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</th>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<!--状态 -->";
echo getLang( "meeting_list_status" );
echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</th>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<th scope=\"col\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<!--操作 -->";
echo getLang( "meeting_list_operate" );
echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</th>\r\n\t\t\t\t\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t\t\t\t\t\t";
$row = 0;
if ( $data_list )
{
    $i = 0;
    while ( $i < count( $data_list ) )
    {
        $meet = $data_list[$i];
        ++$row;
        $row_css_class_name = $row % 2 == 1 ? "td2" : "td1";
        echo "\t\t\t\t\t\t\t\t\t\t\t\t<tr align=\"center\" onMouseOver=\"changeRowColor(this,0);\"\r\n\t\t\t\t\t\t\t\t\t\t\t\t\tonmouseout=\"changeRowColor(this,1);\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<td align=left\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"";
        echo $row_css_class_name;
        echo "\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
        echo $appCtx;
        echo "meeting/meeting_view.php?id=";
        echo $meet['id'];
        echo "\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo api_trunc_str( $meet['meet_name'], 21 );
        echo "</a></td>\t\t\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<td align=left\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"";
        echo $row_css_class_name;
        echo "\">";
        echo api_trunc_str( $meet['subject'] );
        echo "</td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"";
        echo $row_css_class_name;
        echo "\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo $meet['capacity'];
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<td\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"";
        echo $row_css_class_name;
        echo "\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo $meet['holder'];
        echo "</td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<td class=\"";
        echo "\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo date( "Y-m-d h:i", strtotime( $meet['start_time'] ) );
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<td\tclass=\"";
        echo $row_css_class_name;
        echo "\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        if ( $meet['status'] == 0 )
        {
            echo getLang( "meeting_list_ongoing" );
        }
        if ( $meet['status'] == 2 )
        {
            echo getLang( "meeting_list_over" );
        }
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<td\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\tclass=\"";
        echo $row_css_class_name;
        echo "\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"";
        echo $appCtx;
        echo "meeting/meeting_view.php?id=";
        echo $meet['id'];
        echo "\" title=\"";
        echo getLang( "meeting_list_query" );
        echo "\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
        echo $appCtx;
        echo "images/view.gif\" border=0></a>&nbsp;&nbsp;\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        if ( $meet['status'] != 2 )
        {
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"javascript:enterMeeting('";
            echo $meet['meet_no'];
            echo "','";
            echo $meet['id'];
            echo "');\" title=\"";
            echo getLang( "meeting_list_goTo" );
            echo "\">\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img src=\"";
            echo $appCtx;
            echo "images/login_as.gif\" border=0></a>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        else
        {
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" disabled=true><!--进入  -->";
            echo getLang( "meeting_list_goTo" );
            echo "></a>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        php;
        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t</tr>\t\t\t\t\t\t\t\t\t\t\t\t\r\n\t\t\t\t\t\t\t\t\t\t\t\t";
        ++$i;
    }
    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<tr class=\"PageBar\">\r\n\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t<TD colspan=8 align=right>\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t&nbsp;&nbsp;&nbsp;&nbsp;\r\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
    echo $nav;
    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</td>\r\n\t\t\t\t\t\t\t\t\t\t\t\t</tr>\r\n\t\t\t\t\t\t\t\t\t\t\t\t";
}
else
{
    echo "\t\t\t\t\t\t\t\t\t\t\t\t<TR><TD>\r\n\t\t\t\t\t\t\t\t\t\t\t\t<!-- 没有符合要求的记录! -->";
    echo getLang( "meeting_list_noRecord" );
    echo "</TD></TR>\r\n\t\t\t\t\t\t\t\t\t\t\t\t";
}
echo "\r\n\t\t\t\t\t\t\t\t\t\t\t</table>\r\n\t\t\t  </td>\r\n              <td background=\"";
echo $appCtx;
echo "images/bg_8.gif\"></td>\r\n            </tr>\r\n            <tr>\r\n              <td><img height=11 src=\"";
echo $appCtx;
echo "images/bg_3.gif\" width=10></td>\r\n              <td background=\"";
echo $appCtx;
echo "images/bg_6.gif\"></td>\r\n              <td><img height=11 src=\"";
echo $appCtx;
echo "images/bg_4.gif\" \r\n        width=10></td>\r\n            </tr>\r\n          </table>\r\n        </form></td>\r\n    </tr>\r\n   \r\n    \r\n  </table>\r\n</center>\r\n</body>\r\n</html>\r\n";
?>
