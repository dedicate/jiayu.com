<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="inc/config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="ChkUser.asp" -->
<!--#include file="ChkManage.asp" -->
<!--#include file="Function.asp"-->
<%
IF request.cookies(eChsys)("ManageKEY")<>"super" then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲�����")
	response.end
else
	if depmanage="1" or (request.cookies(eChsys)("ManagePurview")="99999" and request.cookies(eChsys)("purview")="99999") then
	
       dim E_DepType
	   E_DepType=ChkRequest(request("E_DepType"),0)	'��ע��
	   
	   Set rs6 = Server.CreateObject("ADODB.Recordset")
	   if E_DepType="" then
		  sql6 ="select * from "& db_EC_Dep_Table &" order by ID"
	   else
		  sql6 ="select * from "& db_EC_Dep_Table &" where E_DepType="&E_DepType&" order by ID"
	   end if
	   rs6.open sql6,Conn,3,3
	%>
<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<title>���������� - ��λ���Ź���</title>
</head>
<body topmargin="0">

<center>
<table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#FFDFBF" bgcolor="#FFFFFF" id="AutoNumber1" style="border-collapse: collapse">
<tr class="TDtop"> 
	<td colspan="5" width="100%" height="25" align="center" valign="middle">
		�� <strong>��λ���Ź���</strong> ��  </td>
</tr>

<tr align="center" class="TDtop1"> 
	<td width="3%" >ԭ��</td>
	<td width="10%" >��λ����</td>
	<td width="6%" height="25" >��������</td>
	<td width="4%" >�ۼƸ��</td>
	<td width="10%" >��λ�༭</td>
</tr>
	<%do while not rs6.eof%>
<tr> 
	<td width="3%" align="center" bgcolor="#FFFFFF"><%=rs6("ID")%></td>
	<td width="10%" align="center" bgcolor="#FFFFFF"><%=nohtml(rs6("E_DepName"))%></span></td>
	<td width="6%" height="25" align="center" bgcolor="#FFFFFF"> 
		<%E_DepType=nohtml(rs6("E_DepType"))
		response.write ""& E_DepType &""
		%>
	</td>
	<td width="4%" align="center" bgcolor="#FFFFFF"><%=rs6("depnumber")%></td>
	<td width="10%" bgcolor="#FFFFFF" align="center">
		<a href="E_DepEdit.asp?ID=<%=rs6("ID")%>&E_DepName=<%=nohtml(rs6("E_DepName"))%>&E_DepType=<%=nohtml(rs6("E_DepType"))%>" onMouseOver="window.status='�༭��λ��<%=nohtml(rs6("E_DepName"))%>��������';return true;" onMouseOut="window.status='';return true;" title='�༭��λ��<%=nohtml(rs6("E_DepName"))%>��������'>�༭</a>&nbsp;
		<a href="E_DepKill.asp?ID=<%=rs6("ID")%>&E_DepName=<%=nohtml(rs6("E_DepName"))%>" onMouseOver="window.status='ɾ����λ��<%=nohtml(rs6("E_DepName"))%>��';return true;" onMouseOut="window.status='';return true;" title='ɾ����λ��<%=nohtml(rs6("E_DepName"))%>��'>ɾ��</a>
	</td>
</tr>
		<%
		rs6.MoveNext
	loop
	rs6.close
	set rs6=nothing
	%>
<tr> 
	<td align="center" colspan="5" width="100%"  height="34">
	<input onClick="javascript:window.open('E_DepAdd.asp','_self','')" type="button" value="��ӵ�λ����" name="button"> 
	</td>
</tr>
</table>
</center>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->
	<%else
		Show_Err("�Բ��𣬸ù����Ѿ�������ϵͳ����Ա�رգ���û��Ȩ�޲�����")
		response.end
	end if
end if%>