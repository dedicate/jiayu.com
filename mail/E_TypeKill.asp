<%@ Language=VBScript %>
<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<%
IF request.cookies(eChsys)("KEY")<>"super" THEN
	Show_Err("�Բ������ĺ�̨����Ȩ�޲�����")
	response.end
else
	dim E_typeid
	E_typeid=ChkRequest(request("E_typeid"),1)	'��ע��
	Set rs6 = Server.CreateObject("ADODB.Recordset")
	sql6 ="SELECT  * From "& db_EC_Type_Table &" where E_typeid=" & E_typeid & " order by E_typeid"
	RS6.open sql6,Conn,3,3
	%>

<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - ɾ������</title>
</head>
<body topmargin="0">

<div align="center">
<table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" bordercolor="<%=border%>">
<form action=E_TypeKillOK.asp method=post>
<tr class="TDtop">
	<td height=25 class="TDtop" align="center">�� <B>ɾ������ȷ��</B> �� </td>
</tr>
<input type="hidden" name="E_typeid" value="<%=E_typeid%>">
<tr>
	<td width="100%" align=center bgcolor="#FFFFFF"> 
		<p></p>
		<p>ɾ��������[ <%=rs6("E_typename")%> ]��
			<font color=red><br><br>
			���˲�����һ��ɾ����Ӧ�Ĵ��ࡢС������£�����ɾ�����޷��ָ�����</font>
		</p>
		<p></p>
	</td>
</tr>
<tr>
	<td width="100%" align=center class="TDtop" height="55" > 
		<input type=submit value="  ��  " name="alert_button" >&nbsp;&nbsp;&nbsp;&nbsp;
		<input type=submit value="  ��  " name="alert_button" >
	</td>
</tr>
</form>
</table>
</div>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->
	<%rs6.close
	set rs6=nothing
end if
%>