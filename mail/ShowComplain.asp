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
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	if Complainmanage="1" or (request.cookies(eChsys)("ManagePurview")="99999" and request.cookies(eChsys)("purview")="99999") then

    ComplainID=ChkRequest(request("ComplainID"),1)	'��ע��
	if ComplainID="" then
	Show_Err("��������ҪҪ�鿴��ID!<br><br>������<a href='javascript:history.back()'>��ȥ����</a>������")
	response.end
	end if	
	set rs=server.CreateObject("ADODB.RecordSet")
	rs.Source="select * from "& db_EC_Complain_Table &" where ComplainID="&ComplainID	
	rs.Open rs.Source,conn,1,1		
	if rs.EOF then
		Show_Err("�Ƿ�ID����ȷ��ComplainID�Ƿ����!<br><br>������<a href='javascript:history.back()'>��ȥ����</a>������")
		Response.End
	end if
		%>
<html><head>
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - �������</title>
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
      <td height="27" colspan="2" class="TDtop"><div align="center">�� <B>�鿴Ͷ�߾ٱ�����</B> ��</div></td>
    </tr>
    <tr>
      <td width="25%" height="22"><div align="right">���ڣ�</div></td>
      <td width="75%"><%=year(rs("UpdateTime")) %>-<%=Month(rs("UpdateTime")) %>-<%=Day(rs("UpdateTime")) %></td>
    </tr>
    <tr>
      <td height="23"><div align="right">����������</div></td>
      <td><%=trim(rs("YourName"))%></td>
    </tr>
    <tr>
      <td height="23"><div align="right">��ϵ���䣺</div></td>
      <td><a href='mailto:<%=trim(rs("email"))%>'><%=trim(rs("email"))%></a></td>
    </tr>
    <tr>
      <td height="20"><div align="right">��ϵ�绰��</div></td>
      <td><%=trim(rs("TelePhone"))%></td>
    </tr>
    <tr>
      <td height="20"><div align="right">��ϵ��ַ��</div></td>
      <td><%=trim(rs("Address"))%></td>
    </tr>
    <tr>
      <td height="24"><div align="right"><strong><span class="STYLE4">*</span>���ͣ�</strong></div></td>
      <td><%if rs("ClassID")=0 then%><font color=red>�ٱ�</font><%else%><font color=red>Ͷ��</font><%end if%></td>
    </tr>
    <tr>
      <td height="24"><div align="right"><strong><span class="STYLE4">*</span>���⣺</strong></div></td>
      <td><%=trim(rs("Topic"))%></td>
    </tr>
    <tr>
      <td height="56"><div align="right"><strong><span class="STYLE4">*</span>���ݣ�</strong></div></td>
      <td><%=trim(rs("content"))%></td>
    </tr>
    <tr>
      <td height="57" colspan="2"><div align="center"><a href="javascript:history.go(-1)">����</a></div></td>
    </tr>
  </table>
<%
	else
		Show_Err("�Բ��𣬸ù����Ѿ�������ϵͳ����Ա�رգ���û��Ȩ�޲�����")
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