<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<%
if request("action")="quit" then
	response.cookies(eChsys)("ManageUserName")="" 
	response.cookies(eChsys)("ManagePasswd")=""
	response.cookies(eChsys)("ManageUserEmail")=""
	response.cookies(eChsys)("ManageKEY")=""
	response.cookies(eChsys)("ManagePurview")=""
	response.cookies(eChsys)("ManageFullName")=""
	response.cookies(eChsys)("ManageReglevel")=""
	response.cookies(eChsys)("ManageSex")=""
	response.cookies(eChsys)("ManageUserLoginTimes")=""
	response.redirect "admin_index.asp"
end if
Show_Message("<table width=100% border=1 cellspacing=0 bordercolor=#FFDFBF bgcolor=#FFFFFF><tr><td><h1><p align='center'>&nbsp;</p><p align='center'><b>ȷ���˳���վ����?</b></p><p align='center'>&nbsp;</p><p align='center'><a href='ExitManage.asp?action=quit'>�˳�</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=javascript:history.go(-1)>����</a></p></hr></td></tr></table>")
response.end
%>