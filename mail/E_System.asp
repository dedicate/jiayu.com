<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="inc/config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="Function.asp"-->
<!--#include file="ChkUser.asp" -->
<!--#include file="ChkManage.asp" -->
<SCRIPT event=onclick for=Ok language=JavaScript>
  window.returnValue = moveurl.value
  window.close();
</SCRIPT>
<script>
function IsDigit()
{
  return ((event.keyCode >= 48) && (event.keyCode <= 57));
}
</script>
<%
IF request.cookies(eChsys)("ManageKEY")<>"super" then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲�����")
	response.end
else
	response.buffer=true
	Response.Expires=0

	Set rs9 = Server.CreateObject("ADODB.Recordset")
	sql9 ="SELECT * From "& db_EC_System_Table &" Order By id DESC"
	RS9.open sql9,Conn,1,1
	if rs9("system")="1" or request.cookies(eChsys)("ManagePurview")="99999" then
		%>
<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<title>���������� - ϵͳ����</title>
<style type="text/css">
<!--
.style1 {color: #FF0000}
.STYLE2 {color: #FF6600}
-->
</style>
<SCRIPT language="JavaScript" type="text/javascript">
// Begin color
	function color(color)
	{
	url = 'color.htm';
	window.open(url,color,"width=430,height=440,status=no,toolbar=no,menubar=no,resizable=no");
	}
// End color-->

function getServeUrl() 
	{
	document.system.xpurl.value = "<%=ServerHttpUrl("E_System.asp")%>";
	}
</script>
</head>
<body topmargin="0">

<div align="center">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#FFDFBF" bgcolor="#ffffff" id="AutoNumber1" style="border-collapse: collapse">
<form method="post" action="E_SystemSave.asp" name="system">
<tr> 
	<td colspan="3" height=25 class="title"  background="images/admin_topbg.gif"> 
		<div align="center">| ��վ�������� |</div>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" ><font color=red>*</font>��վ���ƣ�</td>
	<td  colspan="2" align="left" >
		<input type="text" name="SiteName" size="50" value="<%=rs9("SiteName")%>" >	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" ><font color=red>*</font>��վ��ַ��</td>
	<td  colspan="2" align="left">
		<input type="text" name="xpurl" size="40" value="<%=rs9("xpurl")%>" > 
		<input type="button" name="geturl" value="��ǰ��ȡ"  onclick="javascript:getServeUrl()" > <font color=red>�ǳ���Ҫ</font>(ϵͳ��װ����http��ַ)	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" ><font color=red>*</font>�������䣺</td>
	<td  colspan="2" align="left" >
		<input type="text" name="email" size="50" value="<%=rs9("email")%>" >	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >����QQ��</td>
	<td  colspan="2" align="left" >
		<input type="text" name="QQ" size="50" value="<%=rs9("QQ")%>" >	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >��Ȩ������</td>
	<td  colspan="2" align="left" > 
	<input type="text" name="Copyright" size="50" value="<%=rs9("Copyright")%>" ></td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >��λ��ַ��</td>
	<td  colspan="2" align="left" > 
	<input type="text" name="Address" size="50" value="<%=rs9("Address")%>" ></td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >�������룺</td>
	<td  colspan="2" align="left" > 
	<input type="text" name="Zip" size="50" value="<%=rs9("Zip")%>" ></td>
</tr>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >��ϵ�绰��</td>
	<td  colspan="2" align="left" > 
	<input type="text" name="Tel" size="50" value="<%=rs9("Tel")%>" ></td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >�汾��Ϣ��</td>
	<td  colspan="2" align="left" > <font color="#000000"><b>����������</b></font></td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" height="18" align="right" bgcolor="#FFFFFF">�����˵��ּ���</td>
	<td colspan="2" align="left">
		<select name="B_BG" size="1" id="gd1" >
		<option <%if rs9("B_BG")="1" then%>selected<%end if%> value="1">һ��</option>
		<option <%if rs9("B_BG")="0" then%>selected<%end if%> value="0">����</option>
		<option <%if rs9("B_BG")="3" then%>selected<%end if%> value="3">����</option>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" height="18" align="right" bgcolor="#FFFFFF">LOGOͼ�꣺</td>
	<td colspan="2" align="left">
		<input name="logo" type="text" id="logo"  value="<%=rs9("logo")%>" size="50">	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" height="18" align="right" bgcolor="#FFFFFF">LOGOͼ��URL��</td>
	<td colspan="2" align="left">
		<input name="logourl" type="text" id="logourl"  value="<%=rs9("logourl")%>" size="50">	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" bgcolor="#FFFFFF">LOGO���ͣ�</td>
	<td colspan="2" align="left">
		<select name="gd1" size="1" id="gd1" >
		<option <%if rs9("gd1")<>"0" then%>selected<%end if%> value="1">photo</option>
		<option <%if rs9("gd1")="0" then%>selected<%end if%> value="0">flash</option>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" height="18" align="right" bgcolor="#FFFFFF">��ҳ����Banner����</td>
	<td colspan="2" align="left">
		<input name="TopBanner" type="text" id="TopBanner"  value="<%=rs9("TopBanner")%>" size="50">	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" height="18" align="right" bgcolor="#FFFFFF">��ҳ����Banner��URL��</td>
	<td colspan="2" align="left">
		<input name="TopBannerurl" type="text" id="TopBannerurl"  value="<%=rs9("TopBannerurl")%>" size="50">	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" height="18" align="right" bgcolor="#FFFFFF">��ҳ�涥��Banner����</td>
	<td colspan="2" align="left">
		<input name="OtherTopBanner" type="text" id="OtherTopBanner"  value="<%=rs9("OtherTopBanner")%>" size="50">	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" height="18" align="right" bgcolor="#FFFFFF">��ҳ�涥��Banner��URL��</td>
	<td colspan="2" align="left">
		<input name="OtherTopBannerurl" type="text" id="OtherTopBannerurl"  value="<%=rs9("OtherTopBannerurl")%>" size="50">	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" bgcolor="#FFFFFF">Banner�����ͣ�</td>
	<td colspan="2" align="left">
		<select name="gd2" size="1" id="gd2" >
		<option <%if rs9("gd2")<>"0" then%>selected<%end if%> value="1">photo</option>
		<option <%if rs9("gd2")="0" then%>selected<%end if%> value="0">flash</option>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" height="18" align="right" bgcolor="#FFFFFF">��ҳ��Ƶ�㲥URL��</td>
	<td colspan="2" align="left">

<IFRAME name=ad src="UploadMove.htm" frameBorder=0 width="100%" scrolling=no 
height=20></IFRAME>
		<input id=moveurl name=moveurl value='<%=rs9("moveurl")%>'  title='��ֱ����������MediaPlay�ļ��ĵ�ַ�������ϴ������Զ�����MediaPlay�ļ���ַ' size="50" style="font-size: 9pt;  color: #000000; background-color: #FEEBE4; solid #FEEBE4" onMouseOver ="this.style.backgroundColor='#ffffff'" onMouseOut ="this.style.backgroundColor='#FEEBE4'"><font color="#FF0000">���ϴ����Զ���ȡ��ַ�������ֶ�������ӵ�ַ��</font>  	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >�ϴ��ļ����ͣ�</td>
	<td  colspan="2" align="left" >
		<input type="text" name="UpFileType" size="50" value="<%=UpFileType%>" ><font color="#FF0000">��Сд��|���ֿ�</font>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >�ϴ��ļ���С��</td>
	<td  colspan="2" align="left" >
		<input type="text" name="MaxFileSize" size="50" value="<%=MaxFileSize%>" ><font color="#FF0000">K</font>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >���Ա����۹��˴��</td>
	<td height="17" colspan="2" align="left" > 
		<input name="byteType" type="text"  value="<%=byteType%>" size="50"><font color="#FF0000">��Сд��|���ֿ�</font>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" ><font color="#FF0000">��վ����ɣе�ַ�������Σ�<font ></td>
	<td height="17" colspan="2" align="left" > 
		<input name="byteipType" type="text"  value="<%=byteipType%>" size="50"><font color="#FF0000">��Сд��|���ֿ�</font>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" ><font color="#FF0000">��վ�����������ַ����Σ�<font ></td>
	<td height="17" colspan="2" align="left" > 
		<input name="bytezfType" type="text"  value="<%=bytezfType%>" size="50"><font color="#FF0000">��Сд��|���ֿ�</font>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >�������IP�������ã�<br>
	  (��дΪ����������Ҫ��Ӧ����)��</td>
	<td height="17" colspan="2" align="left" > 
		<input name="newsipType" type="text"  value="<%=newsipType%>" size="50"><font color="#FF0000">��Сд��|���ֿ�</font>	</td>
</tr>
<tr bgcolor="#FFFFFF">
	<td width="193"  align="right" bgcolor="#FFFFFF">
		�Զ��嶥����TOP���˵���<br>
		<br>
		<font color="#FF0000">HTML��ʽ��д���粻֧��FSO��<br>
		�༭config.asp</font><br>	</td>
	<td colspan="2" align="left">
		<textarea name="echuangmenu" cols="80" rows="6" ><%=echuangmenu%></textarea><font color="#FF0000"></font>	</td>
</tr>
<tr bgcolor="#FFFFFF">
	<td width="193"  align="right" bgcolor="#FFFFFF">
		�Զ���ײ���BOTTOM���˵���<br>
		<br>
		<font color="#FF0000">HTML��ʽ��д���粻֧��FSO��<br>
		�༭config.asp</font>	</td>
	<td colspan="2" align="left">
		<textarea name="BOTTOMmenu" cols="80" rows="6" ><%=BOTTOMmenu%></textarea>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" bgcolor="#FFFFFF">��ҳ������棺</td>
	<td colspan="2" align="left">
		<select name="R_BG" size="1" >
		<option <%if rs9("R_BG")<>"0" then%>selected<%end if%> value="1">����</option>
		<option <%if rs9("R_BG")="0" then%>selected<%end if%> value="0">�ر�</option>
		</select>	</td>
    </tr>
<tr bgcolor="#FFFFFF">
  <td align="right" bgcolor="#FFFFFF">������ҳ������棺</td>
  <td colspan="2" align="left"><select name="AD_Show" size="1" >
    <option <%if rs9("AD_Show")="1" then%>selected<%end if%> value="1">����</option>
    <option <%if rs9("AD_Show")="0" then%>selected<%end if%> value="0">�ر�</option>
  </select></td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" bgcolor="#FFFFFF">����������ͣ�</td>
	<td colspan="2" align="left">
		<select name="ad_class" size="1" >
		<option <%if rs9("ad_class")="1" then%>selected<%end if%> value="1">ͼƬ</option>
		<option <%if rs9("ad_class")="0" then%>selected<%end if%> value="0">FLASH</option>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" height="18" align="right" bgcolor="#FFFFFF">��������ַ��</td>
	<td colspan="2" align="left">
		<input type="text" name="R_TOP" size="50" value="<%=rs9("R_TOP")%>" >
		*ע�����ļ�����Ҫ������ѡ������	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" bgcolor="#FFFFFF">����������ӵ�ַ��</td>
	<td colspan="2" align="left">
		<input type="text" name="L_MAIN" size="50" value="<%=rs9("L_MAIN")%>" >	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" bgcolor="#FFFFFF">�������˵����</td>
	<td colspan="2" align="left">
		<input type="text" name="R_MAIN" size="50" value="<%=rs9("R_MAIN")%>" >	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" bgcolor="#FFFFFF">��ҳ�������棺</td>
	<td colspan="2" align="left">
		<select size="1" name="E_announceview" style="font-family: ����; font-size: 9pt" >
	<option <%if rs9("E_announceview")=1 then%>selected<%end if%> value="1">����</option>
	<option <%if rs9("E_announceview")=0 then%>selected<%end if%> value="0">�ر�</option>
	</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" bgcolor="#FFFFFF"> <p align="right">״̬����Ϣ��</p></td>
	<td colspan="2" align="left" >
	<textarea  name="gg1" cols="80" rows="4" ><%=rs9("gg1")%></textarea>	</td>
</tr>
<tr class="TDtop"> 
	<td colspan="3"><div align="center">��ʾ��������</div></td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >��ҳ������ͼ��ʾ������</td>
	<td colspan="2" align="left">
		<select size="1" name="L_BG" >
		<%for i=1 to 3%>
			<option <%if rs9("L_BG")=i then%>selected<%end if%> value="<%=i%>"><%=i%></option>
		<%next%>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >������ʾ������</td>
	<td colspan="2" align="left">
		<select size="1" name="top_news" >
		<%for i=1 to 30%>
			<option <%if rs9("top_news")=i then%>selected<%end if%> value="<%=i%>"><%=i%></option>
		<%next%>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >����ҳ��������ʾ������</td>
	<td  colspan="2" align="left" >
		<select size="1" name="bigclassshownum" >
		<%for i=1 to 30%>
			<option <%if rs9("bigclassshownum")=i then%>selected<%end if%> value="<%=i%>"><%=i%></option>
		<%next%>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >ר����ʾ������</td>
	<td  colspan="2" align="left" >
		<select size="1" name="top_sp" >
		<%for i=1 to 30%>
			<option <%if rs9("top_sp")=i then%>selected<%end if%> value="<%=i%>"><%=i%></option>
		<%next%>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >����������ʾ������</td>
	<td  colspan="2" align="left" > <select size="1" name="top_txt" >
		<%for i=1 to 30%>
			<option <%if rs9("top_txt")=i then%>selected<%end if%> value="<%=i%>"><%=i%></option>
		<%next%>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >����ͼ����ʾ������</td>
	<td  colspan="2" align="left" > <select size="1" name="top_img" >
		<%for i=1 to 30%>
			<option <%if rs9("top_img")=i then%>selected<%end if%> value="<%=i%>"><%=i%></option>
		<%next%>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >�Ķ�����ҳ������������</td>
	<td  colspan="2" align="left" >
		<select size="1" name="reviewnum" >
		<%for i=1 to 30%>
			<option <%if rs9("reviewnum")=i then%>selected<%end if%> value="<%=i%>"><%=i%></option>
		<%next%>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >ͼƬJS���µ�������</td>
	<td  colspan="2" align="left" >
		<select size="1" name="picnum" >
		<%for i=1 to 30%>
			<option <%if rs9("picnum")=i then%>selected<%end if%> value="<%=i%>"><%=i%></option>
		<%next%>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >һ��JS���µ�������</td>
	<td  colspan="2" align="left" >
		<select size="1" name="newsnum" >
		<%for i=1 to 30%>
			<option <%if rs9("newsnum")=i then%>selected<%end if%> value="<%=i%>"><%=i%></option>
		<%next%>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >�û�����λ�������а���ʾ����</td>
	<td  colspan="2" align="left" >
		<select size="1" name="topuser" >
		<%for i=1 to 30%>
			<option <%if rs9("topuser")=i then%>selected<%end if%> value="<%=i%>"><%=i%></option>
		<%next%>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td width="193" align="right" >��ҳ�������ӣ�LOGO��������ʾ����</td>
	<td  colspan="2" align="left" >
		<select size="1" name="linkshownum" >
		<%for i=1 to 30%>
			<option <%if rs9("linkshownum")=i then%>selected<%end if%> value="<%=i%>"><%=i%></option>
		<%next%>
		</select>	</td>
</tr>
<tr bgcolor="#FFFFFF"> 
	<td colspan="3">
		<div align="center"> 
		<input type="submit" name="Submit" value="�ύ" >
		<input type="reset" name="Submit2" value="����" >
		</div>	</td>
</tr>
</form>
</table>
</div>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->
		<%rs9.close
		set rs9=nothing
		conn.close
		set conn=nothing
	else
		Show_Err("�Բ��𣬸ù����Ѿ�������ϵͳ����Ա�رգ���û��Ȩ�޲�����")
		response.end
	end if
end if%>