<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="md5.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<!--#include file="ChkURL.asp" -->
<%
if not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	dim sql
	dim sql11
	dim rs
	dim rs11
	dim id
	dim passwd,passwd1
	dim username
	dim oskey
	dim sex
	dim email
	dim depid
	dim shenhe
	dim fullname
	
	username=htmlencode(request.form("username"))
	fullname=htmlencode(request.form("fullname"))
	passwd=htmlencode(request.form("passwd"))
	passwd1=md5(trim(request.form("passwd")))
	oskey=htmlencode(request.form("oskey"))
	Sex=trim(request.form("Sex"))
	Email=trim(request.form("email"))
	id=ChkRequest(request("id"),1)	'��ע��
	depid=ChkRequest(request.form("depid"),1)	'��ע��
	shenhe=request.form("shenhe")
	
	dim E_DepName
	dim E_DepType
	set rs11=server.createobject("adodb.recordset")
	sql11="select * from "& db_EC_Dep_Table &" where id="&depid
	rs11.open sql11,conn,3,3
	E_DepName=rs11("E_DepName")
	E_DepType=rs11("E_DepType")
	rs11.close
	
	set rs=server.createobject("adodb.recordset")
	sql="select * from "& db_User_Table &" where "& db_User_ID &"="&id
	rs.open sql,ConnUser,3,3
	rs(db_User_Name)=username
	rs("fullname")=fullname
	
	if passwd<>rs(db_User_Password) then
		rs(db_User_Password)=passwd1
	end if
	
	rs("oskey")=oskey

	if request.form("ifpurview")=99999 and oskey="super" then
	rs("purview")=99999
	else
	rs("purview")=1
	end if
	
    rs("UserSex")=Sex
	rs("UserEmail")=Email
	rs("depid")=depid
	rs("E_DepName")=E_DepName
	rs("E_DepType")=E_DepType
	rs("shenhe")=shenhe
	rs.update
	rs.close
	
	conn.close
	set conn=nothing
	response.write "<meta http-equiv=""refresh"" content="""&freetime&";url=E_UserManage.asp"">"
	Show_Message("<p align=center><font color=red>��ϲ��!���û������Ѿ��޸ĳɹ�!<br><br>"&freetime&"���Ӻ󷵻���ҳ!</font>")
	response.end
end if%>