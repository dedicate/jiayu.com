<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<%
if not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("对不起，您的后台管理权限不够操作！")
	response.end
else
	%>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>嘉鱼政务网 - 添加用户</title>
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<link rel="stylesheet" type="text/css" href="site.css">
<script LANGUAGE="javascript">
<!--
function FrmAddLink_onsubmit() {
if (document.FrmAddLink.username.value=="")
	{
	  alert("对不起，请输入用户名！")
	  document.FrmAddLink.username.focus()
	  return false
	 }
else if (document.FrmAddLink.username.value.length < 2)
	{
	  alert("用户名能不能长一点！")
	  document.FrmAddLink.username.focus()
	  return false
	 }
else if (document.FrmAddLink.username.value.length > 30)
	{
	  alert("用户名太长了吧！")
	  document.FrmAddLink.username.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd.value=="")
	{
	  alert("对不起，请输入密码！")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd.value.length < 4)
	{
	  alert("为了安全，密码应该长一点！")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd.value.length > 16)
	{
	  alert("密码太长了吧！")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.username.value==document.FrmAddLink.passwd.value)
	{
	  alert("为了安全，用户名与密码不应该相同！")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd2.value=="")
	{
	  alert("对不起，请您输入验证密码！")
	  document.FrmAddLink.passwd2.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd2.value !== document.FrmAddLink.passwd.value)
	{
	  alert("对不起，您两次输入的密码不一致！")
	  document.FrmAddLink.passwd2.focus()
	  return false
	 }
else if (document.FrmAddLink.fullname.value=="")
	{
	  alert("对不起，请输入该用户的真实姓名！")
	  document.FrmAddLink.fullname.focus()
	  return false
	 }
else if (document.FrmAddLink.sex.value=="")
	{
	  alert("对不起，请输入您的性别！")
	  document.FrmAddLink.sex.focus()
	  return false
	 }
else if (document.FrmAddLink.email.value=="")
	{
	  alert("对不起，请输入您的电子邮件！")
	  document.FrmAddLink.email.focus()
	  return false
	 }
else if (document.FrmAddLink.email.value.indexOf("@",0)== -1||document.FrmAddLink.email.value.indexOf(".",0)==-1)
	  {
	  alert("对不起，您输入的电子邮件有误！")
	  document.FrmAddLink.email.focus()
	  return false
	 }
else if (document.FrmAddLink.depid.value=="")
	{
	  alert("对不起，请选择该用户的工作单位！")
	  document.FrmAddLink.depid.focus()
	  return false
	 }
else if (document.FrmAddLink.oskey.value=="")
	{
	  alert("对不起，请选择该用户的权限！")
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
		<p align="center" >┊<strong> 添 加 新 用 户 </strong>┊
	</td>
</tr>
<tr> 
	<td width="46%" height="32" align="right" valign="middle"> 
		<div align="center"><span class="smallFont">用 户 名：</span></div>
	</td>
	<td width="54%" height="32"> 
		<div align="left">
			<input name="username" size="26" class="smallInput" maxlength="30" >
		</div>
	</td>
</tr>
<tr>
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">密&nbsp;&nbsp;&nbsp;码：</span></div>
	</td>
	<td height="32"> 
		<div align="left"> 
			<input name="passwd" size="26" class="smallInput" maxlength="15"  type="password" >
		</div>
	</td>
</tr>
<tr>
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">验证密码：</span></div>
	</td>
	<td height="32"> 
		<div align="left"> 
			<input name="passwd2" size="26" class="smallInput" maxlength="15"  type="password" >
		</div>
	</td>
</tr>
<tr> 
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">真实姓名：</span></div>
	</td>
	<td height="32"> 
		<div align="left"> 
			<input name="fullname" size="26" class="smallInput" maxlength="10" >
		</div>
	</td>
</tr>
<tr> 
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">性别：</span></div>
	</td>
	<td height="32"> 
		<div align="left"> 		
		<%if db_Sex_Select= "EChuang"then %>
		<select size="1" name="sex"  >
			<option  value="先生">先生</option>
			<option  value="女士">女士</option>
			<option  value="保密">保密</option>
		</select>
	    <%else%>
		<%if  db_Sex_Select="Number" then%>
		<select size="1" name="sex"  >
			<option value="1">先生</option>
			<option value="0">女士</option>
		</select>
		<%end if%>
	   <%end if%>
		</div>
	</td>
</tr>
<tr> 
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">电子邮件：</span></div>
	</td>
	<td height="32"> 
		<div align="left"> 
			<input name="email" type="text" size="26"  class="smallInput"   >
		</div>
	</td>
</tr>
<tr>
	<td height="32" align="right"> 
		<div align="center"><span class="smallFont">工作单位：</span></div>
	</td>
	<td height="32">
	<% 
	set rstype=createobject("adodb.recordset")
	sql="select * from "& db_EC_Dep_Table &" order by id"
	rstype.Open sql,conn,1,3
	%>
		<select name="depid" >
		<option value="">请选择工作单位</option>
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
	<td height="32" align="right"><div align="center">用户权限：</div></td>
	<td height="32">
		<select name="oskey" >
		<option  selected value="">请选择用户权限</option>
	<%if request.cookies(eChsys)("key")="super" then%>
		<option value="super">系统管理员</option>
		<option value="check">文章审核员</option>
		<option value="checkdep">事项审批员</option>
		<option value="typemaster">总栏管理员</option>
	<%end if%>
	<%if request.cookies(eChsys)("key")="typemaster" or request.cookies(eChsys)("key")="super" then%>
		<option value="bigmaster">大类管理员</option>
	<%end if%>
		<option value="smallmaster">小类管理员</option>
	<%if request.cookies(eChsys)("key")="super" then%>
		<option value="selfreg">注册用户</option>
	<%end if%>
		</select>
	</td>
</tr>
<%if request.cookies(eChsys)("key")="super" and Request.cookies(eChsys)("purview")="99999" then%>
<tr> 
	<td height="32" align="right"> 
		<div align="center">系统管理员是否为超级管理员：<br>该功能仅对系统管理员有效！</div>
	</td>
		<td height="32"> 该用户
		<select name="ifpurview" >
		<option value="1">不是</option>
		<option value="99999">是</option>
		</select> 超级管理员
	</td>
</tr>
<%end if%>
<!--
<tr> 
	<td height="32" align="right"> 
		<div align="center">小类管理员文章默认状态：</div>
	</td>
	
	<td height="32">
		<select name="shenhe" >
		<option selected value="">该用户需要审核吗</option>
		<option value="1">已审核</option>
		<option value="0">未审核</option>
		</select>默认值为未审核
	</td>
	
</tr>
-->
<tr>
	<td width="100%" colspan="2" height=32>
		<p align="center">
		<input name="purview" type="hidden" value="1">
		<input name="adder" type="hidden" value="<%=request.cookies(eChsys)("username")%>">
		<input type="button" value=" 返 回 " onClick="javascript:history.go(-1)" class="unnamed5" >&nbsp;
		<input type="submit" value=" 确 定 " name="cmdOk" class="buttonface" >&nbsp;
		<input type="reset" value=" 重 置 " name="cmdReset" class="buttonface" >
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