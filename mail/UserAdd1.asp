<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<%
if not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	%>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���������� - ����û�</title>
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<link rel="stylesheet" type="text/css" href="site.css">
<script LANGUAGE="javascript">
<!--
function FrmAddLink_onsubmit() {
if (document.FrmAddLink.username.value=="")
	{
	  alert("�Բ����������û�����")
	  document.FrmAddLink.username.focus()
	  return false
	 }
else if (document.FrmAddLink.username.value.length < 2)
	{
	  alert("�û����ܲ��ܳ�һ�㣡")
	  document.FrmAddLink.username.focus()
	  return false
	 }
else if (document.FrmAddLink.username.value.length > 30)
	{
	  alert("�û���̫���˰ɣ�")
	  document.FrmAddLink.username.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd.value=="")
	{
	  alert("�Բ������������룡")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd.value.length < 4)
	{
	  alert("Ϊ�˰�ȫ������Ӧ�ó�һ�㣡")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd.value.length > 16)
	{
	  alert("����̫���˰ɣ�")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.username.value==document.FrmAddLink.passwd.value)
	{
	  alert("Ϊ�˰�ȫ���û��������벻Ӧ����ͬ��")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd2.value=="")
	{
	  alert("�Բ�������������֤���룡")
	  document.FrmAddLink.passwd2.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd2.value !== document.FrmAddLink.passwd.value)
	{
	  alert("�Բ�����������������벻һ�£�")
	  document.FrmAddLink.passwd2.focus()
	  return false
	 }
else if (document.FrmAddLink.fullname.value=="")
	{
	  alert("�Բ�����������û�����ʵ������")
	  document.FrmAddLink.fullname.focus()
	  return false
	 }
else if (document.FrmAddLink.sex.value=="")
	{
	  alert("�Բ��������������Ա�")
	  document.FrmAddLink.sex.focus()
	  return false
	 }
else if (document.FrmAddLink.email.value=="")
	{
	  alert("�Բ������������ĵ����ʼ���")
	  document.FrmAddLink.email.focus()
	  return false
	 }
else if (document.FrmAddLink.email.value.indexOf("@",0)== -1||document.FrmAddLink.email.value.indexOf(".",0)==-1)
	  {
	  alert("�Բ���������ĵ����ʼ�����")
	  document.FrmAddLink.email.focus()
	  return false
	 }
else if (document.FrmAddLink.depid.value=="")
	{
	  alert("�Բ�����ѡ����û��Ĺ�����λ��")
	  document.FrmAddLink.depid.focus()
	  return false
	 }
else if (document.FrmAddLink.oskey.value=="")
	{
	  alert("�Բ�����ѡ����û���Ȩ�ޣ�")
	  document.FrmAddLink.oskey.focus()
	  return false
	 }
}

//-->
</script>
</head>
<body topmargin="0">

<div align="center">
<table align=center border="1" width="100%" cellspacing="0" cellpadding="0" style="border-collapse: collapse" >
<form align="center" method="post" name="FrmAddLink" LANGUAGE="javascript" onSubmit="return FrmAddLink_onsubmit()" action="UserAdd2.asp">
<tr>
	<td width="100%" height=32 colspan="2" class="TDtop">
		<p align="center" >��<strong> �� �� �� �� �� </strong>��
	</td>
</tr>
<tr> 
	<td width="46%" height="32" align="right" valign="middle"> 
		<div align="center"><span class="smallFont">�� �� ����</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left">
			<input name="username" size="26" class="smallInput" maxlength="30" >
		</div>
	</td>
</tr>
<tr>
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">��&nbsp;&nbsp;&nbsp;�룺</span></div>
	</td>
	<td height="32"> 
		<div align="left"> 
			<input name="passwd" size="26" class="smallInput" maxlength="15"  type="password" >
		</div>
	</td>
</tr>
<tr>
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">��֤���룺</span></div>
	</td>
	<td height="32"> 
		<div align="left"> 
			<input name="passwd2" size="26" class="smallInput" maxlength="15"  type="password" >
		</div>
	</td>
</tr>
<tr> 
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">��ʵ������</span></div>
	</td>
	<td height="32"> 
		<div align="left"> 
			<input name="fullname" size="26" class="smallInput" maxlength="10" >
		</div>
	</td>
</tr>
<tr> 
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">�Ա�</span></div>
	</td>
	<td height="32"> 
		<div align="left"> 		
		<%if db_Sex_Select= "EChuang"then %>
		<select size="1" name="sex"  >
			<option  value="����">����</option>
			<option  value="Ůʿ">Ůʿ</option>
			<option  value="����">����</option>
		</select>
	    <%else%>
		<%if  db_Sex_Select="Number" then%>
		<select size="1" name="sex"  >
			<option value="1">����</option>
			<option value="0">Ůʿ</option>
		</select>
		<%end if%>
	   <%end if%>
		</div>
	</td>
</tr>
<tr> 
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">�����ʼ���</span></div>
	</td>
	<td height="32"> 
		<div align="left"> 
			<input name="email" type="text" size="26"  class="smallInput"   >
		</div>
	</td>
</tr>
<tr>
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">������λ��</span></div>
	</td>
	<td height="32">
	<% 
	set rstype=createobject("adodb.recordset")
	sql="select * from "& db_EC_Dep_Table &" order by id"
	rstype.Open sql,conn,1,3
	%>
		<select name="depid" >
		<option value="">��ѡ������λ</option>
	<%do while not rstype.EOF%>
		<option value="<%=rstype("id")%>"><%=rstype("E_DepName")%>==<%=rstype("E_DepType")%></option>
		<%
		rstype.MoveNext
	loop
	set rstype=nothing
	%>
		</select>
	</td>
</tr>
<tr> 
	<td height="32" align="right"><div align="center">�û�Ȩ�ޣ�</div></td>
	<td height="32">
		<select name="oskey" >
		<option  selected value="">��ѡ���û�Ȩ��</option>
	<%if request.cookies(eChsys)("key")="super" then%>
		<option value="super">ϵͳ����Ա</option>
		<option value="check">�������Ա</option>
		<option value="checkdep">��������Ա</option>
		<option value="typemaster">��������Ա</option>
	<%end if%>
	<%if request.cookies(eChsys)("key")="typemaster" or request.cookies(eChsys)("key")="super" then%>
		<option value="bigmaster">�������Ա</option>
	<%end if%>
		<option value="smallmaster">С�����Ա</option>
	<%if request.cookies(eChsys)("key")="super" then%>
		<option value="selfreg">ע���û�</option>
	<%end if%>
		</select>
	</td>
</tr>
<%if request.cookies(eChsys)("key")="super" and Request.cookies(eChsys)("purview")="99999" then%>
<tr> 
	<td height="32" align="right"> 
		<div align="center">ϵͳ����Ա�Ƿ�Ϊ��������Ա��<br>�ù��ܽ���ϵͳ����Ա��Ч��</div>
	</td>
		<td height="32"> ���û�
		<select name="ifpurview" >
		<option value="1">����</option>
		<option value="99999">��</option>
		</select> ��������Ա
	</td>
</tr>
<%end if%>
<!--
<tr> 
	<td height="32" align="right"> 
		<div align="center">С�����Ա����Ĭ��״̬��</div>
	</td>
	
	<td height="32">
		<select name="shenhe" >
		<option selected value="">���û���Ҫ�����</option>
		<option value="1">�����</option>
		<option value="0">δ���</option>
		</select>Ĭ��ֵΪδ���
	</td>
	
</tr>
-->
<tr>
	<td width="100%" colspan="2" height=32>
		<p align="center">
		<input name="purview" type="hidden" value="1">
		<input name="adder" type="hidden" value="<%=request.cookies(eChsys)("username")%>">
		<input type="button" value=" �� �� " onClick="javascript:history.go(-1)" class="unnamed5" >&nbsp;
		<input type="submit" value=" ȷ �� " name="cmdOk" class="buttonface" >&nbsp;
		<input type="reset" value=" �� �� " name="cmdReset" class="buttonface" >
	</td>
</tr>
</form>
</table>
</center>
</div>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->
<%end if%>