<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->
<%
if request("action")="quit" then
	response.cookies(eChsys)("UserName")=""
	response.cookies(eChsys)("passwd")=""
	response.cookies(eChsys)("UserEmail")=""
	response.cookies(eChsys)("KEY")=""
	response.cookies(eChsys)("purview")=""
	response.cookies(eChsys)("fullname")=""
	response.cookies(eChsys)("reglevel")=""
	response.cookies(eChsys)("sex")=""
	response.cookies(eChsys)("UserLoginTimes")=""
	response.cookies(eChsys)("shenhe")=""
	if UserTableType = "Dvbbs" then	'�Ƿ�������̳
		Response.Write "<iframe width='0' height='0' frameborder=no scrolling=no src='"& BbsPath &"logout.asp'></iframe>"
	end if

	if Request.cookies(eChsys)("ManageUserName")<>"" then
		response.cookies(eChsys)("ManageUserName")="" 
		response.cookies(eChsys)("ManagePasswd")=""
		response.cookies(eChsys)("ManageUserEmail")=""
		response.cookies(eChsys)("ManageKEY")=""
		response.cookies(eChsys)("ManagePurview")=""
		response.cookies(eChsys)("ManageFullName")=""
		response.cookies(eChsys)("ManageReglevel")=""
		response.cookies(eChsys)("ManageSex")=""
		response.cookies(eChsys)("ManageUserLoginTimes")=""
	end if
	response.redirect "index.asp"
end if %>
<HTML>
<HEAD>
<TITLE>�û��˳���½ </TITLE>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href="site.css" rel=stylesheet type=text/css>
</HEAD>
<body bgcolor='#FFEFD7'>
<h1>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><b>ȷ���˳���վ��½?</b></p></h1>
<p align="center">&nbsp;</p><h1>
<p align="center"><a href="Admin_Exit.asp?action=quit">�˳�</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:history.go(-1)">����</a></p></h1>
</BODY>
</HTML>
