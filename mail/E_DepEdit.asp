<!--#include file="Conn.ASP"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<%
id=ChkRequest(CheckStr(Request("id")),1)  '防SQL注入
IF request.cookies(eChsys)("ManageKEY")<>"super" then
	Show_Err("对不起，您的后台管理权限不够！")
	response.end
else
	Set rs6 = Server.CreateObject("ADODB.Recordset")
	sql6 ="select * from "& db_EC_Dep_Table &" where id="&id
	rs6.open sql6,Conn,3,3
	%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - 修改部门</title>
<LINK href=site.css rel=stylesheet>
</head>
<body topmargin="0">

<table border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFDFBF" width="100%" id="AutoNumber1">
<form method="POST" action="E_DepEditOK.asp">
<tr>
	<td width="100%" height="25" class="TDtop"> 
		<p align="center" >┊ <strong>修 改 单 位 部 门</strong> ┊
	</td>
</tr>
<tr align="center"> 
	<td width="100%" bgcolor="#FFFFFF" height="150">

		<table border="1" cellspacing="0" width="100%" height="246" bordercolor="#FFDFBF" bgcolor="#FFFFFF">
		<tr> 
			<td align="right" height="33" width="20%">单位名称：</td>
			<td align="left" width="80%">
				<input type="text" name="E_DepName" size="30" maxlength="30" value='<%=rs6("E_DepName")%>' >			</td>
		</tr>
		<tr>
			<td align="right" height="28">部门名称：</td>
			<td height="28" align="left">
				<input type="text" name="E_DepType" size="30" maxlength="30" value='<%=rs6("E_DepType")%>' >			</td>
		</tr>
		<tr>
		  <td align="right" height="29">外部链接网址：</td>
		  <td height="29" align="left"><input class=text type="text" name="SiteUrl" size="30" value=<%=Rs6("SiteUrl")%>><font color="red">&nbsp;如单位部门有自己的网站，请输入网址，否则为空！</font></td>
		</tr>
		<tr>
		  <td align="right" height="29">部门网站顶部 Banner：</td>
		  <td height="29" align="left"><input class=text type="text" name="Dep_bannerUrl" size="30" value=<%=Rs6("Dep_bannerUrl")%>><font color="red">&nbsp;在这里输入单位部门主页顶部 Banner 地址,默认为主站顶部Banner！！</font></td>
		</tr>
		<tr>
		  <td align="right" height="30">单位概况：</td>
		  <td height="30" align="left">
  <textarea name="DepIntroduce" style="display:none" ><%=Rs6("DepIntroduce")%></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepIntroduce&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>  
		  </td>
		</tr>
		<tr>
		  <td align="right" height="28">职能职责：</td>
		  <td height="28" align="left"> 
		    <textarea name="DepFunction" style="display:none"><%=Rs6("DepFunction")%></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepFunction&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>  </td>
		</tr>
		<tr>
		  <td align="right" height="28">组织机构：</td>
		  <td height="28" align="left">
		  <textarea name="DepOrg" style="display:none"><%=Rs6("DepOrg")%></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepOrg&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>    
		  </td>
		</tr>
		<tr>
		  <td align="right" height="28">领导分工：</td>
		  <td height="28" align="left">
		   <textarea name="DepLead" style="display:none"><%=Rs6("DepLead")%></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepLead&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>  </td>
		</tr>
		<tr>
		  <td align="right" height="25">联系方式：</td>
		  <td height="25" align="left">
	   <textarea name="DepContact" style="display:none"><%=Rs6("DepContact")%></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepContact&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>  	  
		  </td>
		</tr>
		</table>
	</td>
</tr>
<tr align="center"> 
	<td width="100%" height="60" class="TDtop1">
	  <input type="hidden" name="ID" value='<%=request("ID")%>'>
		<input type="submit" value=" 修 改 " name="cmdok" >&nbsp;
		<input type="reset" value=" 复 原 " name="cmdcancel" >&nbsp; 
		<input type="button" name="ok" value=" 放 弃 " onClick="javascript:history.go(-1)" >
	</td>
</tr>
</form>
</table>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->
	<%rs6.close
	set rs6=nothing
	conn.close
	set conn=nothing
end if%>