<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="char.inc"-->
<!--#include file="config.asp"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkURL.asp" -->
<!--#include file="ChkManage.asp" -->
<%
if not(request.cookies(eChsys)("ManageKEY")="super" and request.cookies(eChsys)("ManagePurview")="99999") then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	%>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - ���ӹ����û�</title>
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<link rel="stylesheet" type="text/css" href="site.css">
<script LANGUAGE="javascript">
<!--
function FrmAddLink_onsubmit() {
if (document.FrmAddLink.username.value=="")
	{
	  alert("�Բ�������������û�����")
	  document.FrmAddLink.username.focus()
	  return false
	 }
else if (document.FrmAddLink.username.value.length < 2)
	{
	  alert("�����û����ܲ��ܳ�һ�㣡")
	  document.FrmAddLink.username.focus()
	  return false
	 }
else if (document.FrmAddLink.username.value.length > 30)
	{
	  alert("�����û���̫���˰ɣ�")
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
	  alert("Ϊ�˰�ȫ�������û��������벻Ӧ����ͬ��")
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
	  alert("�Բ���������ù����û�����ʵ������")
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
else if (document.FrmAddLink.adder.value=="")
	{
	  alert("�Բ����������Ӧǰ̨��ͨ�����û���")
	  document.FrmAddLink.adder.focus()
	  return false
	 }
else if (document.FrmAddLink.depid.value=="")
	{
	  alert("�Բ�����ѡ��ù����û��Ĺ�����λ��")
	  document.FrmAddLink.depid.focus()
	  return false
	 }
else if (document.FrmAddLink.purview.value=="")
	{
	  alert("�Բ�����ѡ��ù����û���Ȩ�ޣ�")
	  document.FrmAddLink.purview.focus()
	  return false
	 }
}

//-->
</script>
</head>
<body topmargin="0">

<div align="center">
<table width="100%" border="1" align=center cellpadding="0" cellspacing="0" bordercolor="<%=border%>" bgcolor="#FFFFFF" style="border-collapse: collapse">
<form align="center" method="post" name="FrmAddLink" LANGUAGE="javascript" onSubmit="return FrmAddLink_onsubmit()" action="AdminAdd2.asp">
<tr>
	<td width="100%" height=32 colspan="2" class="TDtop"><p align="center" >��<strong> �� �� �� �� �� �� �� </strong>��</td>
</tr>
<tr> 
	<td width="46%" height="32" align="right" valign="middle"> 
		<div align="center"><span class="smallFont">�� �� �� �� ����</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left"> <input name="username" size="26" class="smallInput" maxlength="30" style="font-family: ����; font-size: 9pt" ></div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">��&nbsp;&nbsp;&nbsp; �룺</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left"><input name="passwd" size="26" class="smallInput" maxlength="15" style="font-family: ����; font-size: 9pt" type="password" ></div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">��֤���룺</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left"><input name="passwd2" size="26" class="smallInput" maxlength="15" style="font-family: ����; font-size: 9pt" type="password" ></div>
	</td>
</tr>
<tr> 
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">��ʵ������</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left"><input name="fullname" size="26" class="smallInput" maxlength="10" style="font-family: ����; font-size: 9pt" ></div>
	</td>
</tr>
<tr> 
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">�Ա�</span></div>
	</td>
	<td width="54%" height="32"> 
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
</tr><tr> 
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">�����ʼ���</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left">
	<input name="email" type="text" size="26"  class="smallInput"   >	
		</div>
	</td>
</tr>
<tr> 
	<td width="46%" height="32" align="right">
		<div align="center"><span class="smallFont">��Ӧǰ̨��ͨ�����û���</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left"><input name="adder" size="26" class="smallInput" maxlength="10" style="font-family: ����; font-size: 9pt" >�������ʹ�������û��޷���½��</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">������λ��</span></div>
	</td>
	<td width="54%" height="32"> <% 
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
	<td width="46%" height="32" align="right"> 
		<div align="center">�����û�Ȩ�ޣ�</div>	</td>
	<td width="54%" height="32"> 
	 	<select name="oskey" >
		<option  selected value="">��ѡ���û�Ȩ��</option>
		<option value="super">ϵͳ����Ա</option>
		<option value="check">�������Ա</option>
		<option value="checkdep">��������Ա</option>
		<option value="typemaster">��������Ա</option>
		<option value="bigmaster">�������Ա</option>
		<option value="smallmaster">С�����Ա</option>
		</select>
		</td>
</tr>
<%if request.cookies(eChsys)("key")="super" and Request.cookies(eChsys)("purview")="99999" then%>
<tr>
  <td height="23" align="center"><div align="center">ϵͳ����Ա�Ƿ�Ϊ��������Ա��<br>�ù��ܽ���ϵͳ����Ա��Ч��</div></td>
  <td width="54%" height="23">
  ���û�
    <select name="ifpurview" >
			<option value=99999>��</option>
			<option value=1 selected>����</option>
		</select>
    ��������Ա	

  </td>
</tr>
<%end if%>
<tr> 
	<td width="46%" colspan="2" height="32" align="right">&nbsp;</td>
</tr>
<tr>
	<td width="100%" colspan="2" height=32><p align="center">
		<input name="shenhe" type="hidden" value="0">
		<input type="button" value=" �� �� " onClick="javascript:history.go(-1)" class="unnamed5"  >&nbsp;           
		<input type="submit" value=" ȷ �� " name="cmdOk" class="buttonface" >&nbsp; 
		<input type="reset" value=" �� �� " name="cmdReset" class="buttonface" >
	</td>
</tr>
</form>
</table>
</div>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->
<%END IF%>