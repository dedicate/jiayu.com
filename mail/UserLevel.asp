<!--#INCLUDE FILE="Conn.asp" -->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<%
if not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	dim reglevel
	dim ID
	ID=ChkRequest(request("ID"),1)	'��ע��
	reglevel=trim(request("reglevel"))
	
	set rs=server.createobject("adodb.recordset")
	sql="select * from "& db_User_Table &" where "& db_User_ID &"="&ID
	rs.open sql,ConnUser,3,3
	rs("reglevel")=reglevel
	rs.update
	
	rs.close
	set rs=nothing
	conn.close
	set conn=nothing
	response.write "<meta http-equiv=""refresh"" content="""&freetime&";url=E_UserManage.asp"">"
	Show_Message("<p align=center><font color=red>��ϲ��!�û�Ա�ȼ����óɹ�!<br><br>"&freetime&"���Ӻ󷵻���ҳ!</font>")
	response.end
end if%>