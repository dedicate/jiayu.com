<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="md5.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkURL.asp"-->
<%
IF request.cookies(eChsys)("KEY")="" THEN
	Show_Err("�Բ�������Ȩ���д��������")
	response.end
else
	usernamecookie=CheckStr(request.cookies(eChsys)("UserName"))
	passwdcookie=CheckStr(trim(Request.cookies(eChsys)("passwd")))
	KEYcookie=CheckStr(trim(request.cookies(eChsys)("KEY")))
	dim sql
	dim rs
	dim fullname
	dim passwd,passwd1
	dim question
	dim answer
	dim username
	dim email
	dim sex
	dim birthyear,birthmonth,birthday
	dim content
	dim tel
	dim depid
	dim E_DepName
	dim E_DepType
	dim photo
	username=CheckStr(trim(request("username")))
	fullname=htmlencode(request.form("fullname"))
	passwd=htmlencode(request.form("passwd"))
	passwd1=md5(passwd)
	question=htmlencode(request.form("question"))
	answer=htmlencode(request.form("answer"))
	'answer1=md5(answer)
	sex=htmlencode(request.form("sex"))
	if db_Birthday_Select="EChuang" then	'���ǲ�����
		birthyear=request.form("birthyear")
		birthmonth=request.form("birthmonth")
	end if
	birthday=request.form("birthday")
	email=htmlencode(request.form("email"))
	depid=ChkRequest(request.form("depid"),1)	'��ע��
	content=htmlencode(request.form("content"))
	tel=htmlencode(request.form("tel"))
	photo=request.form("photo")
	
	if Instr(request("username"),"=")>0 or Instr(request("username"),"%")>0 or Instr(request("username"),chr(32))>0 or Instr(request("username"),"?")>0 or Instr(request("username"),"&")>0 or Instr(request("username"),";")>0 or Instr(request("username"),",")>0 or Instr(request("username"),"'")>0 or Instr(request("username"),",")>0 or Instr(request("username"),chr(34))>0 or Instr(request("username"),chr(9))>0 or Instr(request("username"),"��")>0 or Instr(request("username"),"$")>0 then
		Show_Err("�Բ�����������û����а����зǷ��ַ���<br><br><a href='javascript:history.back()'>��ȥ����</a>")
		response.end
	end if
	
	if username<>usernamecookie then
		Show_Err("�Բ��������ܸ������˵����ϡ�<br><br><a href='javascript:history.back()'>��ȥ����</a>")
		response.end
	end if
	
	set rs1=server.createobject("adodb.recordset")
	sql1="select * From "& db_EC_Dep_Table &" where id="&depid
	rs1.open sql1,conn,1,3
	E_DepName=rs1("E_DepName")
	E_DepType=rs1("E_DepType")
	rs1.close
	set rs1=nothing
	
	set rs=server.createobject("adodb.recordset")
	sql="select * from "& db_User_Table &" where  "& db_User_Name &"='"&usernamecookie&"'"
	rs.open sql,ConnUser,3,3
	rs("content")=content
	
	if passwd<>rs(db_User_Password) or isnull(rs(db_User_Password)) then
		rs(db_User_Password)=passwd1
	end if
	
	rs(db_User_Question)=question
	'if rs(db_User_Answer)<>answer or isnull(rs(db_User_Answer)) then
	   rs(db_User_Answer)=answer
	'end if
	
	rs("fullname")=fullname
	rs(db_User_Email)=email
	rs(db_User_Sex)=sex
	if db_Birthday_Select="EChuang" then		'���ǲ�����
		rs("birthyear")=birthyear
		rs("birthmonth")=birthmonth
	end if
	rs(db_User_birthday)=birthday
	rs("depid")=depid
	rs("E_DepName")=E_DepName
	rs("E_DepType")=E_DepType
	rs("tel")=tel
	rs(db_User_Face)=photo
	rs(db_User_LoginTimes)=rs(db_User_LoginTimes)+1
	rs.update
	rs.close
	set rs=nothing
	conn.close
	set conn=nothing

	response.write "<meta http-equiv=""refresh"" content="""&freetime&";url=Edit.asp"">"
	Show_Message("<p align=center><font color=red>��ϲ��!���������Ѿ��޸ĳɹ�!<br><br>"&freetime&"���Ӻ󷵻���ҳ!</font>")
	response.end
end if%>