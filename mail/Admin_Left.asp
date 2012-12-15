<!--#include file="Conn.ASP"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->

<%dim jingyong
set rs=server.createobject("adodb.recordset")
sql="select * from "& db_User_Table &" where  "& db_User_Name &"='"&Request.cookies(eChsys)("username")&"'"
rs.open sql,ConnUser,1,3
if rs.bof or rs.eof then
	response.redirect "login.asp"
	response.end
end if'
jingyong=rs("jingyong")
rs.close
set rs=nothing

if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="check" or Request.cookies(eChsys)("key")="checkdep" or Request.cookies(eChsys)("KEY")="bigmaster" or Request.cookies(eChsys)("KEY")="smallmaster" or Request.cookies(eChsys)("KEY")="typemaster" or (Request.cookies(eChsys)("key")="selfreg" and jingyong=0) then
%>

<HTML><HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content="MSHTML 6.00.3790.118" name=GENERATOR>
<LINK href=site.css rel=stylesheet>
<style type="text/css">
BODY{ 
      background-color: #FA7727;MARGIN: 0px; FONT: 9pt 宋体;}
</style>
<SCRIPT src="inc/js.js" type=text/javascript></SCRIPT>
<SCRIPT src="inc/exit.js" type=text/javascript></SCRIPT>
<SCRIPT language=JavaScript>
<!--
/*for ie and ns*/
document.onclick=function(evt){
var evt=evt?evt:(window.event)?window.event:""
var e=evt.target?evt.target:evt.srcElement
evt.cancelBubble=true
if(e.tagName=="A"&&evt.shiftKey)return false
}
//-->
</SCRIPT>

<SCRIPT language=javascript>
  var whichOpen="";
  var whichContinue='';
</SCRIPT>

</HEAD>
<BODY oncontextmenu=window.event.returnValue=false onkeydown="if(event.keyCode==78&amp;&amp;event.ctrlKey)return false;" onresize=maxWin() leftMargin=0 topMargin=0 onload=maxWin() marginwidth="0" marginheight="0">
<SCRIPT language=JavaScript1.2 src="inc/menu.js"></SCRIPT>
<table cellpadding=0 cellspacing=0 width=158 align=center>
  <tr>
    <td height=42 valign=bottom  align=middle ><img src="images/admin_title.gif" width=158 height=38 border="0" style="vertical-align:bottom; border:0px;"></td>
  </tr>
</table>
<%if (request.cookies(eChsys)("KEY")="super" or request.cookies(eChsys)("KEY")="bigmaster" or request.cookies(eChsys)("KEY")="check" or request.cookies(eChsys)("key")="typemaster") then%>
<table cellpadding=0 cellspacing=0 width=158 align=center>
  <tr>
    <td height=25 background=images/title_bg_quit.gif class=menu_title1 onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title1';><div align="center"><a href="admin_main.asp" target=main>管理首页</a> | <A onClick="checkclick('您真的退出网站？')" href="Admin_Exit.asp" target=main>退 出 </a></div></td>
  </tr>
  <tr>
    <td style="display:">&nbsp;</td>
  </tr>
</table>
<table cellpadding=0 cellspacing=0 width=158 align=center>
  <tr>
    <td height=25 valign="middle" background=images/admin_left_1.gif class=menu_title1 id=menuTitle0 onClick="showsubmenu(0)" onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title1';><div align="center">系统配置</div></td>
  </tr>
  <tr>
    <td id='submenu0'><div class="sec_menu" style="width:158">
      <table cellpadding=0 cellspacing=0 align=center width=135 style="POSITION: relative; TOP: 5px">
<%if Request.cookies(eChsys)("ManageUserName")<>"" then%>
        <tr>
          <td height=20><div align="center"><img src="Images/bullet.gif" width="15" height="20"><A href="E_System.asp" target=main> 网站属性</a> | <A href="E_System1.asp" target=main> 功能设置</A></div></td>
        </tr>

<%else%>
		<tr>
          <td height=20><div align="center"><img src="Images/bullet.gif" width="15" height="20"><A href="Manage.asp" target=main> 管理登录</a></div></td>
        </tr>
	<%end if%>
      </table>
    </div>
        <div  style="width:158">
          <table cellpadding=0 cellspacing=0 align=center width=135>
            <tr>
              <td height=5></td>
            </tr>
          </table>
        </div></td>
  </tr>
</table>
<%end if%>


<%if (request.cookies(eChsys)("KEY")="super" or request.cookies(eChsys)("KEY")="bigmaster" or request.cookies(eChsys)("KEY")="check" or request.cookies(eChsys)("key")="typemaster") then%>
<table cellpadding=0 cellspacing=0 width=158 align=center>
  <tr>
    <td height=25 valign="middle" background=images/admin_left_3.gif class=menu_title1 id=menuTitle3 onClick="showsubmenu(3)" onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title1';><div align="center">信件管理</div></td>
  </tr>
  <tr>
    <td id='submenu3' style="display:none"><div class="sec_menu" style="width:158">
      <table cellpadding=0 cellspacing=0 align=center width=135 style="POSITION: relative; TOP: 5px">
<%if Request.cookies(eChsys)("ManageUserName")<>"" then%>
        <tr>
          <td height=20><div align="center"><img src="images/bullet.gif"> <A href="E_LeadMailList.asp" target="main">县长信箱</a></div></td>
        </tr>
<%else%>
		<tr>
          <td height=20><div align="center"><img src="Images/bullet.gif" width="15" height="20"><A href="Manage.asp" target=main> 管理登录</a></div></td>
        </tr>
	<%end if%>
      </table>
    </div>
        <div  style="width:158">
          <table cellpadding=0 cellspacing=0 align=center width=135>
            <tr>
              <td height=5></td>
            </tr>
          </table>
        </div></td>
  </tr>
</table>

<table cellpadding=0 cellspacing=0 width=158 align=center>
  <tr>
    <td height=25 valign="middle" background=images/admin_left_5.gif class=menu_title1 id=menuTitle5 onClick="showsubmenu(5)" onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title1';><div align="center">用户管理</div></td>
  </tr>
  <tr>
    <td id='submenu5' style="display:none"><div class="sec_menu" style="width:158">
      <table cellpadding=0 cellspacing=0 align=center width=135 style="POSITION: relative; TOP: 5px">
<%if Request.cookies(eChsys)("ManageUserName")<>"" then%>
        <tr>
          <td height=20><img src="images/bullet.gif"> <a href="Edit.asp" target="main">修改资料</a>| <a href="E_DepManage.asp" target="main">部门管理</a></td>
		</tr>
        <tr>
          <td height=20><img src="images/bullet.gif"> 
		  <A href="E_UserManage.asp" target="main">普通用户</a>| <A href="useradd1.asp" target="main">添加用户</a></td>
        </tr>
        <tr>
          <td height=20><img src="images/bullet.gif"> <a href="AdminManage.asp" target="main">超管管理</a>| <a href="AdminAdd1.asp" target="main">添加超管</a></td>
        </tr>
<%else%>
		<tr>
          <td height=20><div align="center"><img src="Images/bullet.gif" width="15" height="20"><A href="Manage.asp" target=main> 管理登录</a></div></td>
        </tr>
	<%end if%>
      </table>
    </div>
        <div  style="width:158">
          <table cellpadding=0 cellspacing=0 align=center width=135>
            <tr>
              <td height=5></td>
            </tr>
          </table>
        </div></td>
  </tr>
</table>
<%end if%>
<table cellpadding=0 cellspacing=0 width=158 align=center>
  <tr>
    <td height=25 valign="middle" background=images/admin_left_8.gif class=menu_title1 id=menuTitle7 onClick="showsubmenu(7)" onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title1';><div align="center">系统信息</div></td>
  </tr>
  <tr>
    <td  id='submenu7'><div class="sec_menu" style="width:158">
      <table cellpadding=0 cellspacing=0 align=center width=135 style="POSITION: relative; TOP: 5px">
          <td height=20><div align="center"><img src="images/bullet.gif"> <A onClick="checkclick('您是否要重新登录？')" href="Login.asp" target="main">重新登录</a></div></td>
        </tr>
        <tr>
          <td height=20><div align="center"><img src="images/bullet.gif"> <A onClick="checkclick('您真的退出网站？')" href="Login.asp" target="main">退出管理</a></div></td>
        </tr>
      </table>
    </div>
        <div  style="width:158">
          <table cellpadding=0 cellspacing=0 align=center width=135>
            <tr>
              <td height=5></td>
            </tr>
          </table>
        </div></td>
  </tr>
</table>
</BODY>
</HTML>
<%else%>
	<script language=javascript>
		history.back()
		alert("对不起，管理员尚未开通您的帐号，请稍候！")
	</script>
<%end if%>