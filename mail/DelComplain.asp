<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<!--#include file="ChkURL.asp"-->
<%
if not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	if Complainmanage="1" or (request.cookies(eChsys)("ManagePurview")="99999" and request.cookies(eChsys)("purview")="99999") then

	ComplainID=ChkRequest(request("ComplainID"),1)	'��ע��
	if ComplainID="" then
		Show_Err("��������Ҫɾ����Ͷ��ID!<br><br>������<a href='javascript:history.back()'>��ȥ����</a>������")
		response.end
	end if
	set rs=server.CreateObject ("ADODB.RecordSet")
	rs.Source="select * from "& db_EC_Complain_Table &" where ComplainID=" & ComplainID
	rs.Open rs.source,conn,1,1
	if rs.EOF then
		Show_Err("�Ƿ�Ͷ��ID����ȷ��ComplainID�Ƿ����!<br><br>������<a href='javascript:history.back()'>��ȥ����</a>������")
		Response.End
	end if
	%>
<html><head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - ɾ��Ͷ��</title>
</head>
<body topmargin="0">

<div align="center">
<table border="1" width="100%" cellspacing="0" bgcolor="#000000" cellpadding="0" style="border-collapse: collapse" bordercolor="<%=border%>">
<form action=DelComplain_Submit2.asp method=post>
<tr class="TDtop">
	<td height=25 class="TDtop" align="center">�� <B>ɾ �� ȷ ��</B> �� </td>
</tr>
<input type="hidden" name="ComplainID" value="<%=ComplainID%>">
<tr>
	<td width="100%" align=center bgcolor="#FFFFFF">
		<p>��</p>
		<p>
			<font color=red>
				ɾ��Ͷ�ߣ�[ <font color="#000066"> <%=ComplainID%> </font>�� ]��<br><BR>
				��ɾ�����޷��ָ�����
			</font>
		</p>
		<p></p>
	</td>
</tr>
	<%if (delreview="1" and request.cookies(eChsys)("ManageKEY")="input") or (shdelreview="1" and request.cookies(eChsys)("ManageKEY")="check") or request.cookies(eChsys)("ManageKEY")="super" then%>
<tr class="TDtop">
	<td height=25 class="TDtop" align="center">
		<input type=submit value="ȷ��" name="alert_button" >&nbsp;&nbsp;&nbsp;&nbsp;
		<input type=button value="ȡ��" name="alert_button" class=button onClick="javascript:history.go(-1)" >
	</td>
</tr>
	<%end if%>
</form>
</table>
</div>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->
<%
	else
		Show_Err("�Բ��𣬸ù����Ѿ�������ϵͳ����Ա�رգ���û��Ȩ�޲�����")
		response.end
	end if
end if%>