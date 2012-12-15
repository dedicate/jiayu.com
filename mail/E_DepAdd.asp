<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="inc/config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="ChkUser.asp" -->
<!--#include file="ChkManage.asp" -->
<!--#include file="Function.asp"-->

<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - 添加单位部门</title>
</head>
<body topmargin="0">

<center>
<table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#FFDFBF" bgcolor="#FFFFFF" id="AutoNumber1" style="border-collapse: collapse">
<tr class="TDtop"> 
	<td colspan="5" height="25" align="center" valign="middle">
		┊ <strong>添加单位部门</strong> ┊  </td>
</tr>
<form method="post" action="E_DepAddSave.asp" name="name">
<tr> 
	<td align="right" colspan="4"  height="30"> 
		单位名称：		  </td>
    <td align="left" width="80%"  height="30"><input class=text type="text" name="E_DepName" size="30" onMouseOver="window.status='在这里输入要增加的单位名称';return true;" onMouseOut="window.status='';return true;" title="在这里输入要增加的单位名称" ></td>
</tr>
<tr> 
	<td align="right" colspan="4"  height="15"> 
		单位部门：	</td>
    <td width="80%"  height="0" align="left"><input class=text type="text" name="E_DepType" size="30" onMouseOver="window.status='在这里输入要增加的单位部门';return true;" onMouseOut="window.status='';return true;" title="在这里输入要增加的部门名称" ></td>
</tr>
<tr>
  <td align="right" colspan="4"  height="25">外部链接网址：</td>
  <td width="80%"  height="25" align="left"><input class=text type="text" name="SiteUrl" size="30" onMouseOver="window.status='如单位部门有自己的网站，请输入网址，否则为空。';return true;" onMouseOut="window.status='';return true;" title="如单位部门有自己的网站，请输入网址，否则为空" > 
    <font color="red">&nbsp;如单位部门有自己的网站，请输入网址，否则为空！</font></td>
</tr>
<tr> 
	<td align="right" colspan="4"  height="15"> 
	   部门网站顶部 Banner：</td>
    <td width="80%"  height="0" align="left"><input class=text type="text" name="Dep_bannerUrl" size="30" onMouseOver="window.status='在这里输入单位部门主页顶部 Banner 地址';return true;" onMouseOut="window.status='';return true;" title="在这里输入单位部门主页顶部 Banner 地址" value="images/top_flash.swf"><font color="red">&nbsp;在这里输入单位部门主页顶部 Banner 地址,默认为主站顶部Banner！</font></td>
</tr>
<tr>
  <td align="right" colspan="4"  height="30">单位概况：</td>
  <td width="80%"  height="0" align="left">
  <textarea name="DepIntroduce" style="display:none"></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepIntroduce&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>  
  
  </td>
</tr>
<tr>
  <td align="right" colspan="4"  height="30">职能职责：</td>
  <td width="80%"  height="0" align="left">
    <textarea name="DepFunction" style="display:none"></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepFunction&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>  
  </td>
</tr>
<tr>
  <td align="right" colspan="4"  height="30">组织机构：</td>
  <td width="80%"  height="0" align="left">
  <textarea name="DepOrg" style="display:none"></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepOrg&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>    
  </td>
</tr>
<tr>
  <td align="right" colspan="4"  height="30">领导分工：</td>
  <td width="80%"  height="0" align="left">
  <textarea name="DepLead" style="display:none"></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepLead&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>    
  </td>
</tr>
<tr>
  <td align="right" colspan="4"  height="30">联系方式：</td>
  <td width="80%"  height="30" align="left">
   <textarea name="DepContact" style="display:none"></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepContact&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>   
  </td>
</tr>
<tr> 
	<td align="center" colspan="5"  height="34"> 
		<input type="submit" name="Submit" value="添加" title="按这个按钮添加这个单位" onMouseOver="window.status='按这个按钮重新添加小类';return true;" onMouseOut="window.status='';return true;" >
		 <input type="reset" value="重写" name="B1" title="按这个按钮重新添加单位" onMouseOver="window.status='按这个按钮重新添加单位';return true;" onMouseOut="window.status='';return true;" >	</td>
</tr>
</form>
</table>
</center>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->