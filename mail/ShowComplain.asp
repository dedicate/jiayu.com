<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<%
ComplainID=Request.QueryString("ComplainID")%>
<%
if not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("对不起，您的后台管理权限不够操作！")
	response.end
else
	if Complainmanage="1" or (request.cookies(eChsys)("ManagePurview")="99999" and request.cookies(eChsys)("purview")="99999") then

    ComplainID=ChkRequest(request("ComplainID"),1)	'防注入
	if ComplainID="" then
	Show_Err("请输入您要要查看的ID!<br><br>－－－<a href='javascript:history.back()'>回去重来</a>－－－")
	response.end
	end if	
	set rs=server.CreateObject("ADODB.RecordSet")
	rs.Source="select * from "& db_EC_Complain_Table &" where ComplainID="&ComplainID	
	rs.Open rs.Source,conn,1,1		
	if rs.EOF then
		Show_Err("非法ID，请确认ComplainID是否存在!<br><br>－－－<a href='javascript:history.back()'>回去重来</a>－－－")
		Response.End
	end if
		%>
<html><head>
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - 审核评论</title>
<style type="text/css">
<!--
.STYLE4 {color: #FF0000}
-->
</style>
</head>
<body topmargin="0">

<div align="center">
  <table width="100%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="<%=border%>">
    <tr class="TDtop">
      <td height="27" colspan="2" class="TDtop"><div align="center">┊ <B>查看投诉举报内容</B> ┊</div></td>
    </tr>
    <tr>
      <td width="25%" height="22"><div align="right">日期：</div></td>
      <td width="75%"><%=year(rs("UpdateTime")) %>-<%=Month(rs("UpdateTime")) %>-<%=Day(rs("UpdateTime")) %></td>
    </tr>
    <tr>
      <td height="23"><div align="right">您的姓名：</div></td>
      <td><%=trim(rs("YourName"))%></td>
    </tr>
    <tr>
      <td height="23"><div align="right">联系邮箱：</div></td>
      <td><a href='mailto:<%=trim(rs("email"))%>'><%=trim(rs("email"))%></a></td>
    </tr>
    <tr>
      <td height="20"><div align="right">联系电话：</div></td>
      <td><%=trim(rs("TelePhone"))%></td>
    </tr>
    <tr>
      <td height="20"><div align="right">联系地址：</div></td>
      <td><%=trim(rs("Address"))%></td>
    </tr>
    <tr>
      <td height="24"><div align="right"><strong><span class="STYLE4">*</span>类型：</strong></div></td>
      <td><%if rs("ClassID")=0 then%><font color=red>举报</font><%else%><font color=red>投诉</font><%end if%></td>
    </tr>
    <tr>
      <td height="24"><div align="right"><strong><span class="STYLE4">*</span>主题：</strong></div></td>
      <td><%=trim(rs("Topic"))%></td>
    </tr>
    <tr>
      <td height="56"><div align="right"><strong><span class="STYLE4">*</span>内容：</strong></div></td>
      <td><%=trim(rs("content"))%></td>
    </tr>
    <tr>
      <td height="57" colspan="2"><div align="center"><a href="javascript:history.go(-1)">返回</a></div></td>
    </tr>
  </table>
<%
	else
		Show_Err("对不起，该功能已经被超级系统管理员关闭，您没有权限操作！")
		response.end
	end if
end if%>
<%
		rs.close
		set rs=nothing
		conn.close
		set conn=nothing
		%>
</div>
</body>
</html>

<!--#include file="Admin_Bottom.asp"-->