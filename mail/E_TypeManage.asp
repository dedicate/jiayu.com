<!--#include file="Conn.ASP"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<%
IF request.cookies(eChsys)("KEY")="bigmaster" THEN
	response.redirect "E_BigClassManage.asp"
	response.end
else
	IF request.cookies(eChsys)("KEY")="smallmaster" THEN
		response.redirect "E_SmallClassManage.asp"
		response.end
	else
		%>
<html>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<head>
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - ���¹���</title>
<script>
	function IsDigit()
	{
  	return ((event.keyCode >= 48) && (event.keyCode <= 57));
	}
</script>
</head>
<body topmargin="0">
<table border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFDFBF" width="100%" id="AutoNumber1">
<form action ="E_TypeSet.asp?action=update" method=post>
<tr height="20"> 
	<td width="100%" height="20"  colspan="10" align="left" valign="middle" class="TDtop">
		<a href=E_TypeManage.asp>ȫ������</a>�����Ҫ�޸��������ϣ�ֻҪ�޸���Ϻ󰴡����桱���ɣ���Ϊ�����޸ģ�	</td>
</tr>
		<%
		Set rs6 = Server.CreateObject("ADODB.Recordset")
		sql6 ="select * from "& db_EC_Type_Table &" order by E_typeorder"
		RS6.open sql6,Conn,3,3
		%>
<tr align="center"  height="25" class="TDtop1"> 
<td width="6%"  >ID��</td>
<td width="13%" ><b>ѡ������Ŀ¼</b></td>
<td width="25%"  >����������|��ע�ͣ�</td>
<td width="4%"  >������ʾ</td>
<td width="4%"  >��ҳ��ʾ</td>
<td width="10%"  >����ģ��</td>
<td width="8%"  >����<br>
  (����)</td>
 <td width="8%">�ⲿ����</td>
<td width="8%"  >����Ա<br>
  (�������|�ָ�)</td>
<td width="6%"  >ɾ��</td>
</tr>
		<%
		do while not rs6.eof
			dim typemaster,tmaster,master
			master=rs6("typemaster")
			if master<>"" then
				tmaster=split(master,"|")
				for i=0 to ubound(tmaster)
					if request.cookies(eChsys)("username")=trim(tmaster(i)) then
						typemaster=true
						exit for
					else
						typemaster=false
					end if
				next
			end if
			if (typemaster=true and request.cookies(eChsys)("key")="typemaster") or request.cookies(eChsys)("key")="super" or request.cookies(eChsys)("key")="selfreg" or request.cookies(eChsys)("key")="check" then%>
<tr>
<td align="center" bgcolor="#FFFFFF"><%=rs6("E_typeid")%>
	<input type=hidden name="E_typeid" value="<%=rs6("E_typeid")%>"></td>
<td align="center" bgcolor="#FFFFFF">
	<a href="E_BigClassManage.asp?E_typeid=<%=rs6("E_typeid")%>" title="<%if rs6("typecontent")<>"" then%><%=rs6("typecontent")%><%else%>��<%end if%>"><%=rs6("E_typename")%></a></td>
<td align="center" bgcolor="#FFFFFF">
	<input class=text type="text" name="E_typename" size="10" value="<%=rs6("E_typename")%>" <%if request.cookies(eChsys)("key")<>"super" then%>disabled<%end if%>  >
	<input class=text type="text" name="typecontent" size="12" value="<%=rs6("typecontent")%>" <%if request.cookies(eChsys)("key")<>"super" then%>disabled<%end if%>  ></td>
<td align="center" bgcolor="#FFFFFF">
	<select size="1" name="E_dh_typeview" style="font-family: ����; font-size: 9pt" <%if request.cookies(eChsys)("key")<>"super" then%>disabled<%end if%>>
	<option <%if rs6("E_dh_typeview")=1 then%>selected<%end if%> value="1">��ʾ</option>
	<option <%if rs6("E_dh_typeview")=0 then%>selected<%end if%> value="0">����</option>
	</select></td>
<td align="center" bgcolor="#FFFFFF">
    <select size="1" name="E_typeview" style="font-family: ����; font-size: 9pt" <%if request.cookies(eChsys)("key")<>"super" then%>disabled<%end if%>>
  <option <%if rs6("E_typeview")=1 then%>selected<%end if%> value="1">��ʾ</option>
  <option <%if rs6("E_typeview")=0 then%>selected<%end if%> value="0">����</option>
</select></td>
<td align="center" bgcolor="#FFFFFF">
	<select size="1" name="mode" style="font-family: ����; font-size: 9pt" <%if request.cookies(eChsys)("key")<>"super" then%>disabled<%end if%>>
	<option <%if rs6("mode")=1 then%>selected<%end if%> value="1">ͼƬ��Ʒģ��</option>
	<option <%if rs6("mode")=2 then%>selected<%end if%> value="2">����ý��ģ��</option>
	<option <%if rs6("mode")=3 then%>selected<%end if%> value="3">��ַ�Ƽ�ģ��</option>
	<option <%if rs6("mode")=4 then%>selected<%end if%> value="4">�������ģ��</option>
	<option <%if rs6("mode")=5 then%>selected<%end if%> value="5">����ҳ��ģ��</option>
	</select></td>
<td align="center" bgcolor="#FFFFFF">
	<input class=text type="text" name="E_typeorder" size="5" style="font-family: ����; font-size: 9pt" value="<%=rs6("E_typeorder")%>" <%if request.cookies(eChsys)("key")<>"super" then%>disabled<%end if%> ONKEYPRESS="event.returnValue=IsDigit();"  ></td>
<td bgcolor="#FFFFFF"><div align="center">
  <input class=text type="text"  name="url" size="12" value="<%=rs6("url")%>" <%if request.cookies(eChsys)("key")<>"super" then%>disabled<%end if%>  >
</div></td>
<td bgcolor="#FFFFFF" align="center">
	<input class=text type="text" name="typemaster" size="8" value="<%=rs6("typemaster")%>" <%if request.cookies(eChsys)("key")<>"super" then%>disabled<%end if%>  ></td>
<td bgcolor="#FFFFFF" align="center"><%if request.cookies(eChsys)("key")="super" then%><a href="E_TypeKill.asp?E_typeid=<%=rs6("E_typeid")%>">ɾ��</a><%end if%></td>
</tr>
			<%end if
			RS6.MoveNext
		Loop
		rs6.close
		set rs6=nothing
		%>
<tr> 
<td colspan="2" height="40" align="center" width="100%" bgcolor="#FFFFFF">
	<a href="javascript:window.location.reload()" target=leftFrame title="�����Ŀ��������������˵���" style="font-family: ����; font-size: 9pt">ˢ������</a></td>
<td colspan="8" height="40" align="center" width="100%" bgcolor="#FFFFFF">
	<input type="submit" name="Submit2" value="����" style="font-family: ����; font-size: 9pt" <%if request.cookies(eChsys)("key")<>"super" then%>disabled<%end if%>  >&nbsp;&nbsp;&nbsp;&nbsp;
	<!--
	<input type="button" value="�������" style="font-family: ����; font-size: 9pt" onclick="javascript:window.open('newsaddd1.asp','_self','')"  >
	--></td>
</tr>
</form>
		<%if request.cookies(eChsys)("key")="super" then%>
<form method="post" action="E_TypeSet.asp?action=add" name="type">
<tr>
<td align="center" bgcolor="#FFFFFF"></td>
<td align="center" bgcolor="#FFFFFF">�������</td>
<td align="center" bgcolor="#FFFFFF"><input class=text type="text" name="E_typename" size="10"  >
        <input class=text type="text" name="typecontent" size="12" >          </td>
<td align="center" bgcolor="#FFFFFF">
	<select size="1" name="E_dh_typeview" style="font-family: ����; font-size: 9pt" 
			<%if request.cookies(eChsys)("key")<>"super" then%>disabled<%end if%>>
	<option value="1">��ʾ</option>
	<option value="0">����</option>
	</select></td>
<td align="center" bgcolor="#FFFFFF">
    <select size="1" name="E_typeview" style="font-family: ����; font-size: 9pt" 
			<%if request.cookies(eChsys)("key")<>"super" then%>disabled<%end if%>>
  <option value="1">��ʾ</option>
  <option value="0">����</option>
</select></td>
<td align="center" bgcolor="#FFFFFF">
	<select size="1" name="mode" style="font-family: ����; font-size: 9pt">
	  <option value="2">����ý��ģ��</option>
	  <option value="1">ͼƬ��Ʒģ��</option>
        <option value="3">��ַ�Ƽ�ģ��</option>
        <option value="4">�������ģ��</option>
		<option value="5">����ҳ��ģ��</option>
      	</select></td>
<td align="center" bgcolor="#FFFFFF"><input class=text type="text" name="E_typeorder" size="5" style="font-family: ����; font-size: 9pt" ONKEYPRESS="event.returnValue=IsDigit();"  ></td>
<td bgcolor="#FFFFFF"><div align="center">
  <input class=text type="text"  name="url" size="12" >
</div></td>
<td bgcolor="#FFFFFF" align="center"><input class=text type="text" name="typemaster" size="8"  ></td>
<td bgcolor="#FFFFFF" align="center"><input type="submit" name="Submit" value="���" style="font-family: ����; font-size: 9pt"  ></td>
</tr>
</form>
</table>
</center>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->
		<%
		end if
	end if
	conn.close 
	set conn=nothing
end if%>