<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="md5.asp"-->
<!--#include file="ChkURL.asp"-->

<%
ComplainID=ChkRequest(request("ComplainID"),1)	'防注入
YourName=checkstr(request.form("YourName"))
Email=checkstr(request.form("Email"))
TelePhone=checkstr(request.form("TelePhone"))
Address=checkstr(request.form("Address"))
Zip=checkstr(request.form("Zip"))
ClassID=(request.form("ClassID"))
Topic=checkstr(request.form("Topic"))
content=trim(htmlencode1((request.form("content"))))
content=replace(content,"<p> ","")
content=replace(content,"<P> ","")
LeadMailIP=checkstr(Request.serverVariables("REMOTE_ADDR"))
Response.cookies(eChsys)("content")=content

dim byte1
byte1=split(byteType,"|")

for i=0 to ubound(byte1)
	content=replace(content,trim(byte1(i)),"***")
next

dim byte2
byte2=split(byteipType,"|")

for i=0 to ubound(byte2)
if Request.serverVariables("REMOTE_ADDR")=byte2(i) then
	Show_Err("对不起，你的IP地址已被锁定，请联系管理员！！！。<br><br><a href='javascript:history.back()'>返回</a>")
	Response.cookies(eChsys)("content")=""
	Response.End 
end if
next

dim byte3
byte3=split(bytezfType,"|")

for i=0 to ubound(byte3)
if Instr(request("content"),byte3(i))>0  then
	Show_Err("对不起，请不要发布非法小广告！！！。<br><br><a href='javascript:history.back()'>返回</a>")
	Response.cookies(eChsys)("content")=""
	Response.End 
end if
next

if Instr(request("content"),"'")>0 or Instr(request("content"),"script")>0 or Instr(request("content"),"onClick")>0  or Instr(request("content"),"onload")>0 then
	Show_Err("对不起，您输入的投诉内容包含有非法字符。<br><br><a href='javascript:history.back()'>返回</a>")
	Response.End 
end if

if ComplainID="" then
	set rs=server.createobject("adodb.recordset")
	sql="select * from "& db_EC_Complain_Table &"" 
	rs.open sql,conn,1,3
	rs.addnew
	rs("YourName")=YourName
	rs("email")=email			
	rs("TelePhone")=TelePhone
	rs("ComplainIP")=ComplainIP
	rs("Address")=Address
	rs("Zip")=Zip
	rs("updatetime")=now()
	rs("ClassID")=ClassID
	rs("Topic")=Topic
	rs("content")=content	
	rs.update
	rs.close
	set rs=nothing
	Response.cookies(eChsys)("content")=""
end if
%>
<html>
<head>
<title>投诉举报成功__<%=eChSys%></title>
<meta http-equiv=refresh content="1;url=Complain.asp">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="news.css" rel=stylesheet type=text/css>
</head>
<body>
<!--#include file="Top.asp"-->
      <table width="1002" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr valign="top">
          <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr bgcolor="CDCCCC">
                <td height="25" background="Images/dh_bg.gif" class="daohang">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;栏目导航&nbsp;&nbsp;<a class=daohang href="./" >网站首页</a>&gt;&gt;<a href="Complain.asp" class="daohang">网上投诉举报</a>&gt;&gt;投诉举报成功</td>
              </tr>
          </table></td>
        </tr>
        <tr valign="top">
          <td height="228" align="center" valign="middle"><table border="0" cellspacing="0" width="30%" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" cellpadding="0">
            <tr>
              <td width="100%" height="20"><p align="center"><font color=red><b>投诉举报成功&nbsp;&nbsp;&nbsp;&nbsp;</b></font><a class=daohang href="Complain.asp">返回</a> </p></td>
            </tr>
          </table></td>
        </tr>
        <tr valign="top">
          <td height="10"></td>
        </tr>
</table>
<!--#include file="bottom.asp"-->
<%Response.cookies(eChsys)("content")=""
'response.redirect "Complain.asp"%>