<!--#include file="conn.asp" -->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="md5.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<!--#include file="ChkURL.asp"-->
<%
if not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	usernamecookie=CheckStr(request.cookies(eChsys)("UserName"))
	passwdcookie=CheckStr(trim(Request.cookies(eChsys)("passwd")))
	KEYcookie=CheckStr(trim(request.cookies(eChsys)("KEY")))
	
	dim rs,tsql
	dim rst
	dim UserName
	dim passwd
	dim adder
	dim sex
	dim email
	dim depid
	dim oskey
	dim shenhe
	adder=request.form("adder")
	UserName=trim(request("UserName"))
	Sex=trim(request("Sex"))
	Email=trim(request("email"))
	depid=ChkRequest(request.form("depid"),1)	'��ע��
	oskey=request.form("oskey")
	passwd=md5(trim(request("passwd")))
	purview=trim(request("purview"))
	
	if trim(request("UserName"))="" then
		Show_Err("�Բ����������û���!<br><br><a href='javascript:history.back()'>��ȥ����</a>")
		response.end
	end if
	
	if Instr(request("UserName"),"=")>0 or Instr(request("UserName"),"%")>0 or Instr(request("UserName"),chr(32))>0 or Instr(request("UserName"),"?")>0 or Instr(request("UserName"),"&")>0 or Instr(request("UserName"),";")>0 or Instr(request("UserName"),",")>0 or Instr(request("UserName"),"'")>0 or Instr(request("UserName"),",")>0 or Instr(request("UserName"),chr(34))>0 or Instr(request("UserName"),chr(9))>0 or Instr(request("UserName"),"��")>0 or Instr(request("UserName"),"$")>0 then
		Show_Err("�Բ�����������û����а����зǷ��ַ�!<br><br><a href='javascript:history.back()'>��ȥ����</a>")
		response.end
	end if


	set rs=server.createobject("adodb.recordset")
	sql="select * from "& db_User_Table
	rs.open sql,ConnUser,3,3
	do while not rs.eof
		if rs(db_User_Name)=UserName then
			Show_Err("�Բ����Ѿ���������û�["& UserName &"]��<br><br><a href='javascript:history.back()'>��ȥ����</a>")
			response.end
		end if
		rs.movenext
	loop
	rs.close
	set rs=nothing
	
	dim E_DepName
	dim E_DepType
	set rs11=server.createobject("adodb.recordset")
	sql11="select * from "& db_EC_Dep_Table &" where id="&depid
	rs11.open sql11,conn,3,3
	E_DepName=rs11("E_DepName")
	E_DepType=rs11("E_DepType")
	rs11.close
	set rs11=nothing
	
	set rst=server.CreateObject("ADODB.RecordSet")
	rst.open "select * from "& db_User_Table,ConnUser,3,2
	rst.addnew
	rst("oskey")=oskey
	rst(db_User_Name)=Username
	rst(db_User_Password)=Passwd

    if request.form("ifpurview")=99999 and oskey="super" then
		rst("purview")=99999
	else
		rst("purview")=1
	end if

    rst("UserSex")=Sex
	rst("UserEmail")=Email
	rst("depid")=depid
	rst("fullname")=request.form("fullname")
	rst("E_DepName")=E_DepName
	rst("E_DepType")=E_DepType
	rst("adder")=adder
	rst("jingyong")=0
	rst("reglevel")=1
	rst(db_User_RegDate )=now()
	'if request.form("shenhe")="" then
		rst("shenhe")=1
	'else
	'	rst("shenhe")=request.form("shenhe")
	'end if
	rst.update
	oskey=rst("oskey")
	rst.close
	
	IF UserTableType = "Dvbbs" then
		'�������������ò�������� db_Form_UserNum �� db_Form_lastUser ֵ[���û�������ע���û���]
		dim usernum
		set rs2=server.CreateObject("ADODB.RecordSet")
		rs2.open "select * from "& db_Set_Table &"",conn,3,2
		usernum=rs2(db_Forum_UserNum)
		rs2(db_Forum_UserNum)=usernum+1
		rs2(db_Forum_lastUser)=Username
		rs2.update
		rs2.close
		set rs2=nothing
	END IF
	
	response.redirect "E_UserManage.asp"
end if%>