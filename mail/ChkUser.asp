<!--#include file="SafeRequest.asp"-->
<!--#include file="char.inc"-->

<%
if ((Request.cookies(eChsys)("UserName")="") or (Request.cookies(eChsys)("passwd")="") or (Request.cookies(eChsys)("KEY")="")) then
	if IsDebug="1" then
		Show_Err("cookies(UserName)(passwd)(KEY)����Ϊ��ֵ��<br><br><a href='javascript:history.back()'>����</a>")
	else
		response.redirect "login.asp"
	end if
	response.end
else
	if not(Request.cookies(eChsys)("KEY")="super" or Request.cookies(eChsys)("KEY")="check" or Request.cookies(eChsys)("KEY")="checkdep" or Request.cookies(eChsys)("KEY")="typemaster" or Request.cookies(eChsys)("KEY")="bigmaster" or Request.cookies(eChsys)("KEY")="smallmaster" or Request.cookies(eChsys)("KEY")="selfreg") THEN
		if IsDebug="1" then
				Show_Err("cookies(KEY)ֵ����[super][check][checkdep][typemaster][bigmaster][smallmaster][selfreg]�е�һ����<br><br><a href='javascript:history.back()'>����</a>")
		else
			response.redirect "login.asp"
		end if
		response.end
	else
		UserName=CheckStr(trim(Request.cookies(eChsys)("username")))
		PassWD=trim(Request.cookies(eChsys)("passwd"))
		Key=trim(request.cookies(eChsys)("KEY"))
		
		set urs=server.createobject("adodb.recordset")
		sql="select * from "& db_User_Table &" where "& db_User_Name &"='"& UserName &"'"
		urs.open sql,ConnUser,1,3
		if urs.bof or urs.eof then
			if IsDebug="1" then
					Show_Err("��cookies(username)�ķ���ֵ�����Ҳ����û����е����Ӧ��¼��<br><br><a href='javascript:history.back()'>����</a>")
			else
				response.redirect "login.asp"
			end if
			response.end
		else
			if urs("jingyong")=0 or (Request.cookies(eChsys)("KEY")="super") then
				if PassWD<>urs(db_User_Password) then
					if IsDebug="1" then
						Show_Err("cookies(passwd)�ķ���ֵ���û����е����Ӧ��¼��Passwordֵ������<br><br><a href='javascript:history.back()'>����</a>")
					else
						response.redirect "login.asp"
					end if
					response.end
				else
					if key<>urs("OSKEY") then
						if IsDebug="1" then
							Show_Err("cookies(KEY)�ķ���ֵ���û����е����Ӧ��¼��OSKEYֵ������<br><br><a href='javascript:history.back()'>����</a>")
						else
							response.redirect "login.asp"
						end if
						response.end
					end if
				end if
			else
				Show_Err("�Բ��������û�״̬Ϊ�����ã�����ϵ����Ա�����<br><br><a href='javascript:history.back()'>����</a>")
				response.end
			end if
		end if
		urs.close
		set urs=nothing
	end if
end if
%>