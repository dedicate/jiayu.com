<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="md5.asp"-->
<!--#include file="ChkURL.asp"-->

<%
LeadMailID=ChkRequest(request("LeadMailID"),1)	'��ע��
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
	Show_Err("�Բ������IP��ַ�ѱ�����������ϵ����Ա��������<br><br><a href='javascript:history.back()'>����</a>")
	Response.cookies(eChsys)("content")=""
	Response.End 
end if
next

dim byte3
byte3=split(bytezfType,"|")

for i=0 to ubound(byte3)
if Instr(request("content"),byte3(i))>0  then
	Show_Err("�Բ����벻Ҫ�����Ƿ�С��棡������<br><br><a href='javascript:history.back()'>����</a>")
	Response.cookies(eChsys)("content")=""
	Response.End 
end if
next

if Instr(request("content"),"'")>0 or Instr(request("content"),"script")>0 or Instr(request("content"),"onClick")>0  or Instr(request("content"),"onload")>0 then
	Show_Err("�Բ������������Ϣ���ݰ����зǷ��ַ���<br><br><a href='javascript:history.back()'>����</a>")
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
	if ReviewCheck=1 then		'����Ĭ�����״̬���з��ż����״̬������
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
<title>���������������Ż���վ - ���ųɹ�</title>
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
                <td height="25" background="Images/dh_bg.gif" class="daohang">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ŀ����&nbsp;&nbsp;<a class=daohang href="../" target="_blank">��վ��ҳ</a>&gt;&gt;<a href="E_LeadMail.asp" class="daohang">�س�����</a>&gt;&gt;���ųɹ�</td>
              </tr>
          </table></td>
        </tr>
        <tr valign="top">
          <td height="259" align="center" valign="middle"><table border="0" cellspacing="0" width="30%" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" cellpadding="0">
            <tr>
              <td width="100%" height="20"><p align="center"><font color=red><b>���ųɹ�����ȴ�����Ա��ˣ�&nbsp;&nbsp;&nbsp;&nbsp;</b></font><a class=daohang href="E_LeadMail.asp">����</a> </p></td>
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