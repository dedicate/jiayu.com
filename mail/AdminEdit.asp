<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="char.inc"-->
<!--#include file="config.asp"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<!--#include file="ChkURL.asp" -->
<%
IF not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("对不起，您的后台管理权限不够操作！")
	response.end
else
    if request.cookies(eChsys)("purview")="99999" and request.cookies(eChsys)("KEY")="super" then
	%>
<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - 修改资料</title>
<script LANGUAGE="javascript">
<!--
function FrmAddLink_onsubmit() {
 if (document.FrmAddLink.passwd.value=="")
	{
	  alert("对不起，请您输入密码！")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd.value.length < 4)
	{
	  alert("为了安全，您的密码应该长一点！")
	  document.FrmAddLink.passwd.focus()
	  return false
	 }
else if (document.FrmAddLink.passwd.value.length > 16)
	{
	  alert("您的密码太长了吧！")
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
	  alert("对不起，请输入真实姓名！")
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
else if (document.FrmAddLink.adder.value=="")
	{
	  alert("对不起，请输入对应前台普通发文用户！")
	  document.FrmAddLink.adder.focus()
	  return false
	 }
else if (document.FrmAddLink.depid.value=="")
	{
	  alert("对不起，请选择工作单位！")
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
	sql="select * from "& db_EC_Manage_Table &" where "& db_ManageUser_ID &"="&ChkRequest(request("id"),1)	'防注入
	set rs=server.createobject("adodb.recordset")
	rs.open sql,Conn,1,1
	if request.cookies(eChsys)("ManageKEY")="super" or rs("oskey")=request.cookies(eChsys)("ManageKEY") then
		%>

<table width="100%" border="1" align=center cellpadding="0" cellspacing="0" bordercolor="<%=border%>" bgcolor="#FFFFFF" style="border-collapse: collapse">
<form method="POST" name="FrmAddLink" LANGUAGE="javascript" onSubmit="return FrmAddLink_onsubmit()"   action="SaveAdminEdit.asp?id=<%=ChkRequest(request("id"),1)%>">
<tr>
	<td width="100%" height=32 colspan="2" class="TDtop">
	<p align="center" >┊ <strong>管理用户资料修改</strong> ┊
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right" valign="middle">
		<div align="center"><span class="smallFont">管理用户名：</span></div>
	</td>
	<td width="54%" height="32">
		<div align="left">
			<input name="username" size="20" value="<%=rs(db_ManageUser_Name)%>" <%if (rs(db_ManageUser_Name)<>request.cookies(eChsys)("ManageUserName")  and request.cookies(eChsys)("purview")="99999") or request.cookies(eChsys)("purview")<>"99999" then%>readonly<%end if%> class="smallInput" maxlength="30" >
		</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right">
		<div align="center"><span class="smallFont">密&nbsp;&nbsp;&nbsp;码：</span></div>
	</td>
	<td width="54%" height="32">
		<div align="left">
			<input name="passwd" type="password" size="20" value="<%=rs(db_ManageUser_Password)%>" class="smallInput" maxlength="50" >
		</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right">
		<div align="center"><span class="smallFont">验证密码：</span></div>
	</td>
	<td width="54%" height="32">
		<div align="left">
			<input name="passwd2" type="password" size="20" value="<%=rs(db_ManageUser_Password)%>" class="smallInput" maxlength="50" >
		</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right">
		<div align="center"><span class="smallFont">真实姓名：</span></div>
	</td>
	<td width="54%" height="32">
		<div align="left">
			<input name="fullname" size="20" value="<%=rs("fullname")%>" class="smallInput" maxlength="50" >
		</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right">
		<div align="center"><span class="smallFont">性别：</span></div>
	</td>
	<td width="54%" height="32">
		<div align="left">
		<%if db_Sex_Select= "EChuang"	then %>
		<select size="1" name="sex"  >
			<option <%if rs(db_ManageUser_Sex)="先生" then%>selected<%end if%> value="先生">先生</option>
			<option <%if rs(db_ManageUser_Sex)="女士" then%>selected<%end if%> value="女士">女士</option>
			<option <%if rs(db_ManageUser_Sex)="保密" then%>selected<%end if%> value="保密">保密</option>
		</select>
	    <%else%>
		<%if  db_Sex_Select="Number" then%>
		<select size="1" name="sex"  >
			<option <%if rs(db_ManageUser_Sex)=1 then%>selected<%end if%> value="1">先生</option>
			<option <%if rs(db_ManageUser_Sex)=0 then%>selected<%end if%> value="0">女士</option>
		</select>
		<%end if%>
	<%end if%>
		</div>
	</td>
</tr><tr>
	<td width="46%" height="32" align="right">
		<div align="center"><span class="smallFont">电子邮件：</span></div>
	</td>
	<td width="54%" height="32">
		<div align="left">
			<input name="email" type="text" size="20" value="<%=rs(db_ManageUser_Email)%>" class="smallInput"  >
		</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right">
		<div align="center"><span class="smallFont">对应前台普通发文用户：</span></div>
	</td>
	<td width="54%" height="32">
		<div align="left">
			<input name="adder" size="20" value="<%=rs("adder")%>" class="smallInput" maxlength="50" >（填错将使本超管用户无法登陆）
		</div>
	</td>
</tr>
<tr>
	<td width="46%" height="32" align="right">
		<div align="center"><span class="smallFont">工作单位：</span></div>
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
	<td width="46%" height="32" align="right"> 
		<div align="center">管理用户权限：</div>	</td>
	<td width="54%" height="32"> 
		<select name="oskey" >
			<%if request.cookies(eChsys)("key")="super" then%>
			<option <%if rs("oskey")="super" then%> selected <%end if%>value="super">系统管理员</option>
			<option <%if rs("oskey")="typemaster" then%> selected <%end if%>value="typemaster">总栏管理员</option>
			<option <%if rs("oskey")="bigmaster" then%> selected <%end if%>value="bigmaster">大类管理员</option>
			<option <%if rs("oskey")="smallmaster" then%> selected <%end if%>value="smallmaster">小类管理员</option>
			<option <%if rs("oskey")="check" then%> selected <%end if%>value="check">审核管理员</option>
			<option <%if rs("oskey")="checkdep" then%> selected <%end if%>value="checkdep">事项审批管理员</option>
			<%else%>
			<%if request.cookies(eChsys)("key")="typemaster" then%>
			<option <%if rs("oskey")="bigmaster" then%> selected <%end if%>value="bigmaster">大类管理员</option>
			<option <%if rs("oskey")="smallmaster" then%> selected <%end if%>value="smallmaster">小类管理员</option>
			<%end if%>
			<%end if%>
		</select>
		</td>
</tr>
<%if request.cookies(eChsys)("key")="super" and Request.cookies(eChsys)("purview")="99999" And rs("oskey")="super" then%>
<tr>
  <td height="23" align="center"><div align="center">系统管理员是否为超级管理员：<br>该功能仅对系统管理员有效！</div></td>
  <td width="54%" height="23">
  该用户
		<select name="purview" >
		<option <%if rs("purview")="1" then%> selected <%end if%> value="1">不是</option>
		<option <%if rs("purview")="99999" then%> selected <%end if%> value="99999">是</option>
		</select> 超级管理员

  </td>
</tr>
<%end if%>
<tr>
	<td width="100%" colspan="2" height=32>
		<p align="center">
		<input type="button" value="返 回" onClick="javascript:history.go(-1)" class="buttonface" >&nbsp;
		<input type="submit" value="修 改" name="cmdok" class="buttonface" >&nbsp;
		<input type="reset" value="重 置" name="cmdcancel" class="buttonface" >
	</td>
</tr>
		<%if rs(db_ManageUser_Name)=request.cookies(eChsys)("ManageUserName")  and request.cookies(eChsys)("ManagePurview")="99999" then%>
<tr>
	<td width="100%" height=32 colspan="2" align=center><font color=red>超级管理员 <%=request.cookies(eChsys)("ManageUserName")%> 您好，如果您更改了自己的用户名，请在更改后退出系统以新用户名重新登录，以保证系统功能正常运行。</font></td>
</tr>
		<%end if
		rs.close
		set rs=nothing
		conn.close
		set conn=nothing
		%>
</form>
</table>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->
	<%else
			Show_Err("对不起，你无权修改该用户信息！<br><br><a href='javascript:history.back()'>返回</a>")
		response.end
	end if
	else
		Show_Err("对不起，您的后台用户管理权限不够操作！")
		response.end
	end if
end if
%>