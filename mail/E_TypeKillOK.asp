<!--#include file="Conn.ASP"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="char.inc"-->
<!--#include file="config.asp"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkURL.asp"-->
<%
IF request.cookies(eChsys)("KEY")<>"super" THEN
	Show_Err("�Բ������ĺ�̨����Ȩ�޲�����")
	response.end
else
	E_typeid = ChkRequest(Request("E_typeid"),1)	'��ע��
	dim E_typename
	set rs=server.createobject("adodb.recordset")
	sql="select * from "& db_EC_Type_Table &" where E_typeid="&E_typeid
	rs.open sql,conn,3,3
	E_typename=rs("E_typename")
	rs.close
	set rs=nothing
	
	button_value=trim(Request.Form("alert_button"))
	if button_value="��" then
		conn.execute("delete from "& db_EC_News_Table &" where E_typeid=" &E_typeid)
		conn.execute("delete from "& db_EC_SmallClass_Table &" where E_typeid=" &E_typeid)
		conn.execute("delete from "& db_EC_BigClass_Table &" where E_typeid=" &E_typeid)
		conn.execute("delete from "& db_EC_Type_Table &" where E_typeid=" &E_typeid)
		conn.close
		set conn=nothing
		response.write "<meta http-equiv=""refresh"" content="""&freetime&";url=E_TypeManage.asp"">"
		Show_Message("<p align=center><font color=red>��ϲ��!��ѡ��������Ѿ���ɾ��!<br><br>"&freetime&"���Ӻ󷵻���ҳ!</font>")
		response.end
	else
		response.redirect "E_TypeManage.asp"
	end if
end if
%>