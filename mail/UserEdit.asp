<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<!--#include file="ChkURL.asp" -->
<%
if not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	if request.cookies(eChsys)("purview")="99999" and request.cookies(eChsys)("KEY")="super" then
		%>
<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - �޸�����</title>
<script LANGUAGE="javascript">
<!--
function FrmAddLink_onsubmit() {
 if (document.FrmAddLink.passwd.value=="")
	{
	  alert("�Բ��������������룡")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd.value.length < 4)
	{
	  alert("Ϊ�˰�ȫ����������Ӧ�ó�һ�㣡")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd.value.length > 16)
	{
	  alert("��������̫���˰ɣ�")
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
	  alert("�Բ�����������ʵ������")
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
	  alert("�Բ�����ѡ������λ��")
	  document.FrmAddLink.depid.focus()
	  return false
	 }
}

//-->
</script>
</head>
<body topmargin="0">

	<%
		dim sql
		dim rs
		sql="select * from "& db_User_Table &" where "& db_User_ID &"="&ChkRequest(request("id"),1)	'��ע��
		set rs=server.createobject("adodb.recordset")
		rs.open sql,ConnUser,1,1
		if rs("adder")=request.cookies(eChsys)("username") or request.cookies(eChsys)("key")="super" or request.cookies(eChsys)("key")="typemanage" then%> 
<table border="1" width="100%" cellspacing="0" cellpadding="0"   bgcolor="#FFFFFF"  style="border-collapse: collapse"  bordercolor="#FF6600" align=center>
<form method="POST" name="FrmAddLink" LANGUAGE="javascript" onSubmit="return FrmAddLink_onsubmit()"   action="SaveEdit.asp?id=<%=request("id")%>">
<tr>
	<td width="100%" height=32 colspan="2" class="TDtop">
		<p align="center" >�� <strong>�û������޸�</strong> ��
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right" valign="middle"> 
		<div align="center"><span class="smallFont">�� �� ����</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left">
			<input name="username" size="20" value="<%=rs(db_User_Name)%>" <%if (rs(db_User_Name)<>request.cookies(eChsys)("username")  and request.cookies(eChsys)("purview")="99999") or request.cookies(eChsys)("purview")<>"99999" then%>readonly<%end if%> class="smallInput" maxlength="30" >
		</div>
	</td>
	</tr>
<tr>
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">��&nbsp;&nbsp;&nbsp;�룺</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left"> 
			<input name="passwd" type="password" size="20" value="<%=rs(db_User_Password)%>" class="smallInput" maxlength="50" >
		</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">��֤���룺</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left"> 
			<input name="passwd2" type="password" size="20" value="<%=rs(db_User_Password)%>" class="smallInput" maxlength="50" >
		</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">��ʵ������</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left"> 
			<input name="fullname" size="20" value="<%=rs("fullname")%>" class="smallInput" maxlength="50" >
		</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">�Ա�</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left"> 
	<%if db_Sex_Select= "EChuang"	then %>
		<select size="1" name="sex"  >
			<option <%if rs(db_User_sex)="����" then%>selected<%end if%> value="����">����</option>
			<option <%if rs(db_User_sex)="Ůʿ" then%>selected<%end if%> value="Ůʿ">Ůʿ</option>
			<option <%if rs(db_User_sex)="����" then%>selected<%end if%> value="����">����</option>
		</select>
	<%else%>
		<%if  db_Sex_Select="Number" then%>
		<select size="1" name="sex"  >
			<option <%if rs(db_User_Sex)=1 then%>selected<%end if%> value="1">����</option>
			<option <%if rs(db_User_Sex)=0 then%>selected<%end if%> value="0">Ůʿ</option>
		</select>
		<%end if%>
	<%end if%>
		</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">�������䣺</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left"> 
			<input name="email" type="text" size="20" value="<%=rs(db_User_Email)%>" class="smallInput"   >
		</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right"> 
		<div align="center"><span class="smallFont">������λ��</span></div>
	</td>
	<td width="54%" height="32">
			<% 
			set rstype=createobject("adodb.recordset")
			sql="select * from "& db_EC_Dep_Table &" order by id"
			rstype.Open sql,conn,1,3
			%>
		<select name="depid" >
			<%do while not rstype.EOF%>
			<option value="<%=rstype("id")%>" <%if rs("depid")=Cint(rstype("id")) then%>selected<%end if%> ><%=rstype("E_DepName")%>==<%=rstype("E_DepType")%></option>
				<%
				rstype.MoveNext
			loop
			set rstype=nothing
			%>
		</select>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right"><div align="center">�û�Ȩ�ޣ�</div></td>
	<td width="54%" height="32">
		<select name="oskey" >
			<%if request.cookies(eChsys)("key")="super" then%>
			<option <%if rs("oskey")="super" then%> selected <%end if%>value="super">ϵͳ�û�</option>
			<option <%if rs("oskey")="typemaster" then%> selected <%end if%>value="typemaster">�����û�</option>
			<option <%if rs("oskey")="bigmaster" then%> selected <%end if%>value="bigmaster">�����û�</option>
			<option <%if rs("oskey")="smallmaster" then%> selected <%end if%>value="smallmaster">С���û�</option>
			<option <%if rs("oskey")="check" then%> selected <%end if%>value="check">����û�</option>
			<option <%if rs("oskey")="checkdep" then%> selected <%end if%>value="checkdep">���������û�</option>
			<option <%if rs("oskey")="selfreg" then%> selected <%end if%>value="selfreg">ע���û�</option>
			<%else%>
				<%if request.cookies(eChsys)("key")="typemaster" then%>
			<option <%if rs("oskey")="bigmaster" then%> selected <%end if%>value="bigmaster">�����û�</option>
			<option <%if rs("oskey")="smallmaster" then%> selected <%end if%>value="smallmaster">С���û�</option>
			<option <%if rs("oskey")="selfreg" then%> selected <%end if%>value="selfreg">ע���û�</option>
				<%end if%>
			<%end if%>
		</select>
	</td>
</tr>
<%if request.cookies(eChsys)("key")="super" and Request.cookies(eChsys)("purview")="99999" And rs("oskey")="super" then%>
<tr> 
	<td height="32" align="right"> 
		<div align="center">ϵͳ����Ա�Ƿ�Ϊ��������Ա��<br>�ù��ܽ���ϵͳ����Ա��Ч��</div>
	</td>
		<td height="32"> ���û�
		<select name="ifpurview" >
		<option <%if rs("purview")="1" then%> selected <%end if%> value="1">����</option>
		<option <%if rs("purview")="99999" then%> selected <%end if%> value="99999">��</option>
		</select> ��������Ա
	</td>
</tr>
<%end if%>

<%if rs("oskey")="smallmaster" then%>
<tr>
	<td width="46%" height="32" align="right"> 
		<div align="center">С�����Ա����Ĭ��״̬��<br>�ù��ܽ���С���û���Ч��</div>
	</td>
	<td width="54%" height="32">
		<select name="shenhe" >
			<option <%if rs("shenhe")="0" then%> selected <%end if%> value="0">�����</option>
			<option <%if rs("shenhe")="1" then%> selected <%end if%> value="1">δ���</option>
		</select>Ĭ��ֵΪ��Ҫ���
	</td>
</tr>
<%End if%>

<tr>
	<td width="100%" colspan="2" height=32>
		<p align="center">
			<input type="reset" value=" �� �� " onClick="javascript:history.go(-1)" class="buttonface" >&nbsp;
			<input type="submit" value=" �� �� " name="cmdok" class="buttonface" >&nbsp;
			<input type="reset" value=" �� ԭ " name="cmdcancel" class="buttonface" >
		</p>
	</td>
</tr>
			<%if rs(db_User_Name)=request.cookies(eChsys)("username") and request.cookies(eChsys)("purview")="99999" then%>
<tr>
	<td width="100%" height=32 colspan="2" align=center>
		<font color=red>�����û� <%=request.cookies(eChsys)("username")%> ���ã�������������Լ����û��������ڸ��ĺ��˳�ϵͳ�����û������µ�¼���Ա�֤ϵͳ�����������С�</font>
	</td>
</tr>
			<%end if%>
</form>
</table>
</body>
</html>
			<%rs.close 
			set rs=nothing
			ConnUser.close
			set ConnUser=nothing
			conn.close
			set conn=nothing
		else
			Show_Err("�Բ�������Ȩ�޸ĸ��û���Ϣ��<br><br>������<a href='javascript:history.back()'>��ȥ����</a>������")
			response.end
		end if
	else
		Show_Err("�Բ�������ǰ̨�û�����Ȩ�޲���������")
		response.end
	end if
end if%>