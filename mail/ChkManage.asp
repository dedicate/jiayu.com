<!--#include file="SafeRequest.asp"-->
<!--#include file="Char.inc"-->
<%
if not(Request.cookies(eChsys)("KEY")="super" or Request.cookies(eChsys)("KEY")="check" or Request.cookies(eChsys)("KEY")="typemaster") THEN
	Show_Err("�Բ�������Ȩ��¼��̨���й���")
	response.end
else
	if ((Request.cookies(eChsys)("ManageUserName")="") or (Request.cookies(eChsys)("ManagePasswd")="") or (Request.cookies(eChsys)("ManageKEY")="")) then
		if IsDebug="1" then
			Show_Err("cookies(ManageUserName)(ManagePasswd)(ManageKEY)����Ϊ��ֵ��<br><br><a href='javascript:history.back()'>����</a>")
		else
			response.redirect "admin_index.asp?action=Manage.asp"
		end if
		response.end
	else
		IF not(Request.cookies(eChsys)("ManageKEY")="super" or Request.cookies(eChsys)("ManageKEY")="check" or Request.cookies(eChsys)("ManageKEY")="typemaster" or Request.cookies(eChsys)("ManageKEY")="bigmaster" or Request.cookies(eChsys)("ManageKEY")="smallmaster" ) THEN
			if IsDebug="1" then
					Show_Err("cookies(KEY)ֵ����[ManageSuper][ManageCheck][ManageTypemaster][ManageBigmaster][ManageSmallmaster]�е�һ����<br><br><a href='javascript:history.back()'>����</a>")
			else
				response.redirect "admin_index.asp?action=Manage.asp"
			end if
			response.end
		else
			UserName=CheckStr(trim(Request.cookies(eChsys)("UserName")))
			M_UserName=CheckStr(trim(Request.cookies(eChsys)("ManageUserName")))
			M_PassWD=trim(Request.cookies(eChsys)("ManagePasswd"))
			M_Key=trim(request.cookies(eChsys)("ManageKEY"))
			set urs=server.createobject("adodb.recordset")
			sql="select * from "& db_EC_Manage_Table &" where ("& db_ManageUser_Name &"='"& M_UserName &"' and adder='"& UserName &"')"
			urs.open sql,Conn,1,3
			if urs.bof or urs.eof then
				if IsDebug="1" then
					Show_Err("��cookies(username)��cookies(ManageUserName)�ķ���ֵ�����Ҳ��������û����е����Ӧ��¼��<br><br><a href='javascript:history.back()'>����</a>")
				else
					response.redirect "admin_index.asp?action=Manage.asp"
				end if
				response.end
			else
				if M_PassWD<>urs(db_ManageUser_Password) then
					if IsDebug="1" then
						Show_Err("cookies(ManagePasswd)�ķ���ֵ������û����е����Ӧ��¼��Passwordֵ������<br><br><a href='javascript:history.back()'>����</a>")
					else
						response.redirect "admin_index.asp?action=Manage.asp"
					end if
					response.end
				else
					if M_key<>urs("OSKEY") then
						if IsDebug="1" then
							Show_Err("cookies(ManageKEY)�ķ���ֵ������û����е����Ӧ��¼��OSKEYֵ������<br><br><a href='javascript:history.back()'>����</a>")
						else
							response.redirect "admin_index.asp?action=Manage.asp"
						end if
						response.end
					end if
				end if
				urs.close
				set urs=nothing
			end if
		end if
	end if
end if%>