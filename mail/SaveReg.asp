<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="ChkURL.asp"-->
<%
dim sql
dim rs
dim webname
dim weburl
dim logo
dim webmaster
dim content
dim email
dim linktype
dim pass

webname=checkstr(request.form("webname"))

if Instr(request("webname"),"=")>0 or Instr(request("webname"),"%")>0 or Instr(request("webname"),chr(32))>0 or Instr(request("webname"),"?")>0 or Instr(request("webname"),"&")>0 or Instr(request("webname"),";")>0 or Instr(request("webname"),",")>0 or Instr(request("webname"),"'")>0 or Instr(request("webname"),",")>0 or Instr(request("webname"),chr(34))>0 or Instr(request("webname"),chr(9))>0 or Instr(request("webname"),"��")>0 or Instr(request("webname"),"$")>0 then
	Response.Write "<script>alert('�Բ������������վ�����а����зǷ��ַ���');history.back();</Script>"
   	Response.End 
end if

weburl=checkstr(request.form("weburl"))

if Instr(request("weburl"),"=")>0 or Instr(request("weburl"),"%")>0 or Instr(request("weburl"),chr(32))>0 or Instr(request("weburl"),"?")>0 or Instr(request("weburl"),"&")>0 or Instr(request("weburl"),";")>0 or Instr(request("weburl"),",")>0 or Instr(request("weburl"),"'")>0 or Instr(request("weburl"),",")>0 or Instr(request("weburl"),chr(34))>0 or Instr(request("weburl"),chr(9))>0 or Instr(request("weburl"),"��")>0 or Instr(request("weburl"),"$")>0 then
	Response.Write "<script>alert('�Բ������������վ��ַ�а����зǷ��ַ���');history.back();</Script>"
   	Response.End 
end if

content=htmlencode(request.form("content"))

if Instr(request("content"),"=")>0 or Instr(request("content"),"%")>0 or Instr(request("content"),chr(32))>0 or Instr(request("content"),"?")>0 or Instr(request("content"),"&")>0 or Instr(request("content"),";")>0 or Instr(request("content"),",")>0 or Instr(request("content"),"'")>0 or Instr(request("content"),",")>0 or Instr(request("content"),chr(34))>0 or Instr(request("content"),chr(9))>0 or Instr(request("content"),"��")>0 or Instr(request("content"),"$")>0 then
	Response.Write "<script>alert('�Բ������������վ����а����зǷ��ַ���');history.back();</Script>"
   	Response.End 
end if

logo=checkstr(request.form("logo"))

if Instr(request("logo"),"=")>0 or Instr(request("logo"),"%")>0 or Instr(request("logo"),chr(32))>0 or Instr(request("logo"),"?")>0 or Instr(request("logo"),"&")>0 or Instr(request("logo"),";")>0 or Instr(request("logo"),",")>0 or Instr(request("logo"),"'")>0 or Instr(request("logo"),",")>0 or Instr(request("logo"),chr(34))>0 or Instr(request("logo"),chr(9))>0 or Instr(request("logo"),"��")>0 or Instr(request("logo"),"$")>0 then
	Response.Write "<script>alert('�Բ������������վLOGO�а����зǷ��ַ���');history.back();</Script>"
   	Response.End 
end if

webmaster=checkstr(request.form("webmaster"))

if Instr(request("webmaster"),"=")>0 or Instr(request("webmaster"),"%")>0 or Instr(request("webmaster"),chr(32))>0 or Instr(request("webmaster"),"?")>0 or Instr(request("webmaster"),"&")>0 or Instr(request("webmaster"),";")>0 or Instr(request("webmaster"),",")>0 or Instr(request("webmaster"),"'")>0 or Instr(request("webmaster"),",")>0 or Instr(request("webmaster"),chr(34))>0 or Instr(request("webmaster"),chr(9))>0 or Instr(request("webmaster"),"��")>0 or Instr(request("webmaster"),"$")>0 then
	Response.Write "<script>alert('�Բ������������վվ�����а����зǷ��ַ���');history.back();</Script>"
   	Response.End 
end if

email=checkstr(request.form("email"))

if IsValidEmail(email)=0 then
	Response.Write "<script>alert('�Բ����������email�Ƿ���');history.back();</Script>"
   	Response.End 
end if

linktype=checkstr(request.form("linktype"))
pass=request.form("pass")

set rs=server.createobject("adodb.recordset")
sql="select * from "& db_EC_Link_Table &" where (id is null)" 

rs.open sql,conn,1,3
rs.addnew
rs("linktype")=linktype
rs("webname")=webname
rs("content")=content
rs("weburl")=weburl
rs("logo")=logo
rs("webmaster")=webmaster
rs("email")=email
rs("pass")=pass
rs("dateandtime")=now()
rs.update
rs.close
%>

<html>
<head>
<title>����ɹ�</title>
<LINK href=site.css rel=stylesheet>
<script language="Javascript">
     function closeit() {
     setTimeout("self.close()",4000)
     }
     </script>
</head>

<body body onload="closeit()" topmargin="0">
<div align="center">
  <table border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFDFBF" width="780"  id="AutoNumber1" bgcolor="#FFFFFF">
    <tr height="120">
      <td width="100%"> 
        <p align="center"><br><font color=red><b>������������ɹ�</b><br></font><br>������������վ����ϱ�վ�����ӡ�������ʣ���վ����������վ������ӣ�<br><br>
      </td>
    </tr>
    <tr valign="middle" height="120"> 
      <td width="100%" > 
        <div align="center"><br>
          �����ڽ���4���Ӻ��Զ��رգ���Ҳ����ֱ�ӵ������رմ��ڡ�<br>
         <br> <a href="javascript:window.close()">�رմ���</a><br>
          </div>
      </td>
    </tr>
    </table>
</div>
</body>
</html>