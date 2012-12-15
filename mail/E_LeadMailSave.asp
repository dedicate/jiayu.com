<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="md5.asp"-->
<!--#include file="ChkURL.asp"-->

<%
LeadMailID=ChkRequest(request("LeadMailID"),1)	'防注入
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
	Show_Err("对不起，您输入的信息内容包含有非法字符。<br><br><a href='javascript:history.back()'>返回</a>")
	Response.End 
end if


if LeadMailID="" then
	set rs=server.createobject("adodb.recordset")
	sql="select * from "& db_EC_LeadMail_Table &"" 
	rs.open sql,conn,1,3
	rs.addnew
	rs("YourName")=YourName
	rs("email")=email			
	rs("TelePhone")=TelePhone
	rs("LeadMailIP")=LeadMailIP
	rs("Address")=Address
	rs("Zip")=Zip
	rs("updatetime")=now()
	rs("ClassID")=ClassID
	rs("Topic")=Topic
	rs("content")=content
	if ReviewCheck=1 then		'根据默认审核状态进行发信件审核状态的设置
		rs("Checked")=1
	else
		rs("Checked")=0
	end if
	
	rs.update
	rs.close
	set rs=nothing
	Response.cookies(eChsys)("content")=""
end if
%>
<html>
<head>
<title>嘉鱼县人民政府门户网站 - 发信成功</title>
<meta http-equiv=refresh content="2;url=E_LeadMail.asp">
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
                <td height="25" background="Images/dh_bg.gif" class="daohang">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;栏目导航&nbsp;&nbsp;<a class=daohang href="../" target="_blank">网站首页</a>&gt;&gt;<a href="E_LeadMail.asp" class="daohang">县长信箱</a>&gt;&gt;发信成功</td>
              </tr>
          </table></td>
        </tr>
        <tr valign="top">
          <td height="259" align="center" valign="middle"><table border="0" cellspacing="0" width="30%" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" cellpadding="0">
            <tr>
              <td width="100%" height="20"><p align="center"><font color=red><b>发信成功，请等待管理员审核！&nbsp;&nbsp;&nbsp;&nbsp;</b></font><a class=daohang href="E_LeadMail.asp">返回</a> </p></td>
            </tr>
          </table></td>
        </tr>
        <tr valign="top">
          <td height="10"></td>
        </tr>
</table>
<!--#include file="bottom.asp"-->
<%Response.cookies(eChsys)("content")=""
'response.redirect "E_LeadMail.asp"%>