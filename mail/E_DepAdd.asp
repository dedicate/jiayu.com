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
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - ��ӵ�λ����</title>
</head>
<body topmargin="0">

<center>
<table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#FFDFBF" bgcolor="#FFFFFF" id="AutoNumber1" style="border-collapse: collapse">
<tr class="TDtop"> 
	<td colspan="5" height="25" align="center" valign="middle">
		�� <strong>��ӵ�λ����</strong> ��  </td>
</tr>
<form method="post" action="E_DepAddSave.asp" name="name">
<tr> 
	<td align="right" colspan="4"  height="30"> 
		��λ���ƣ�		  </td>
    <td align="left" width="80%"  height="30"><input class=text type="text" name="E_DepName" size="30" onMouseOver="window.status='����������Ҫ���ӵĵ�λ����';return true;" onMouseOut="window.status='';return true;" title="����������Ҫ���ӵĵ�λ����" ></td>
</tr>
<tr> 
	<td align="right" colspan="4"  height="15"> 
		��λ���ţ�	</td>
    <td width="80%"  height="0" align="left"><input class=text type="text" name="E_DepType" size="30" onMouseOver="window.status='����������Ҫ���ӵĵ�λ����';return true;" onMouseOut="window.status='';return true;" title="����������Ҫ���ӵĲ�������" ></td>
</tr>
<tr>
  <td align="right" colspan="4"  height="25">�ⲿ������ַ��</td>
  <td width="80%"  height="25" align="left"><input class=text type="text" name="SiteUrl" size="30" onMouseOver="window.status='�絥λ�������Լ�����վ����������ַ������Ϊ�ա�';return true;" onMouseOut="window.status='';return true;" title="�絥λ�������Լ�����վ����������ַ������Ϊ��" > 
    <font color="red">&nbsp;�絥λ�������Լ�����վ����������ַ������Ϊ�գ�</font></td>
</tr>
<tr> 
	<td align="right" colspan="4"  height="15"> 
	   ������վ���� Banner��</td>
    <td width="80%"  height="0" align="left"><input class=text type="text" name="Dep_bannerUrl" size="30" onMouseOver="window.status='���������뵥λ������ҳ���� Banner ��ַ';return true;" onMouseOut="window.status='';return true;" title="���������뵥λ������ҳ���� Banner ��ַ" value="images/top_flash.swf"><font color="red">&nbsp;���������뵥λ������ҳ���� Banner ��ַ,Ĭ��Ϊ��վ����Banner��</font></td>
</tr>
<tr>
  <td align="right" colspan="4"  height="30">��λ�ſ���</td>
  <td width="80%"  height="0" align="left">
  <textarea name="DepIntroduce" style="display:none"></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepIntroduce&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>  
  
  </td>
</tr>
<tr>
  <td align="right" colspan="4"  height="30">ְ��ְ��</td>
  <td width="80%"  height="0" align="left">
    <textarea name="DepFunction" style="display:none"></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepFunction&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>  
  </td>
</tr>
<tr>
  <td align="right" colspan="4"  height="30">��֯������</td>
  <td width="80%"  height="0" align="left">
  <textarea name="DepOrg" style="display:none"></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepOrg&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>    
  </td>
</tr>
<tr>
  <td align="right" colspan="4"  height="30">�쵼�ֹ���</td>
  <td width="80%"  height="0" align="left">
  <textarea name="DepLead" style="display:none"></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepLead&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>    
  </td>
</tr>
<tr>
  <td align="right" colspan="4"  height="30">��ϵ��ʽ��</td>
  <td width="80%"  height="30" align="left">
   <textarea name="DepContact" style="display:none"></textarea>
<IFRAME ID="eWebEditor1" SRC="editor/ewebeditor.asp?id=DepContact&style=s_red" FRAMEBORDER="0" SCROLLING="no" WIDTH="90%" HEIGHT="400" marginwidth="1" marginheight="1"></IFRAME>   
  </td>
</tr>
<tr> 
	<td align="center" colspan="5"  height="34"> 
		<input type="submit" name="Submit" value="���" title="�������ť��������λ" onMouseOver="window.status='�������ť�������С��';return true;" onMouseOut="window.status='';return true;" >
		 <input type="reset" value="��д" name="B1" title="�������ť������ӵ�λ" onMouseOver="window.status='�������ť������ӵ�λ';return true;" onMouseOut="window.status='';return true;" >	</td>
</tr>
</form>
</table>
</center>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->