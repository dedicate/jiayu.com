<!--#INCLUDE FILE="Conn.asp"-->
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
	if request("action")="update" then
		dim E_typeorder,typemaster,mode,E_typename,typecontent,E_typeview,E_dh_typeview,typeurl
		for i=1 to request.form("E_typeid").count
			E_typeid=CheckStr(request.form("E_typeid")(i))
			mode=CheckStr(request.form("mode")(i))
			E_typename=CheckStr(request.form("E_typename")(i))
			typecontent=CheckStr(request.form("typecontent")(i))
			E_typeorder=CheckStr(request.form("E_typeorder")(i))
			typemaster=CheckStr(request.form("typemaster")(i))
			E_typeview=CheckStr(request.form("E_typeview")(i))
			E_dh_typeview=CheckStr(request.form("E_dh_typeview")(i))
			if CheckStr(request.form("E_typeorder")(i))="" then
				Show_Err("����д��������<br><br><a href='javascript:history.back()'>����</a>")
				response.end
			end if
			typeurl=CheckStr(request.form("url")(i))
			if CheckStr(request.form("typemaster")(i))="" then
				typemaster="��"
			else
				master=split(CheckStr(request.form("typemaster")(i)),"|")
				for k=0 to ubound(master)
					set rs=server.createobject("adodb.recordset")
					sql="Select * from "& db_User_Table &" where oskey='typemaster' and  "& db_User_Name &"='"&trim(master(k))&"'"
					rs.open sql,ConnUser,1,3
					if trim(master(k))<>"��" then
						if rs.eof then
							Show_Err("��������Ա����"& trim(master(k)) &"�û���������ѡ��������Ĺ���Ա��<br><br><a href='javascript:history.back()'>����</a>")
							Response.End
						end if
					else
						typemaster="��"
					end if
					rs.close
					set rs=nothing
				next
			end if
			conn.execute("update "& db_EC_Type_Table &" set E_typeorder="&E_typeorder&",typemaster='"&typemaster&"',mode="&mode&",E_typeview="&E_typeview&",E_dh_typeview="&E_dh_typeview&",E_typename='"&E_typename&"',typecontent='"&typecontent&"',url='"&typeurl&"' where E_typeid="&E_typeid)
		next
	end if

	if request("action")="add" then
	typecontent=request.form("typecontent")
	E_typename=trim(request("E_typename"))
	mode=request("mode")
	E_typeorder=request("E_typeorder")
	E_typeview=request("E_typeview")
	E_dh_typeview=request("E_dh_typeview")
	typeurl=request.form("url")
	typemaster=request("typemaster")
	
	If mode="0" Then
		Show_Err("��ѡ��ģ�壡<br><br><a href='javascript:history.back()'>����</a>")
		response.end
	end if
	
	If E_typeorder="" Then
		Show_Err("����������Ϊ�գ�<br><br><a href='javascript:history.back()'>����</a>")
		response.end
	end if
	If E_typename="" Then
		Show_Err("�������Ʋ���Ϊ�գ�<br><br><a href='javascript:history.back()'>����</a>")
		response.end
	end if
	set rs=server.createobject("adodb.recordset")
		sql="select * from "& db_EC_Type_Table
	rs.open sql,conn,3,3
	do while not rs.eof
		if rs("E_typename")=E_typename then
			Show_Err("�Ѿ���������������ƣ�<br><br><a href='javascript:history.back()'>����</a>")
			response.end
		end if
		rs.movenext
	loop
	rs.close
	set rs=nothing
	set rs=server.createobject("adodb.recordset")
		sql="select * from "& db_EC_Type_Table
	rs.open sql,conn,3,3
	do while not rs.eof
		if rs("E_typeorder")=E_typeorder then
			Show_Err("�Ѿ������������˳��<br><br><a href='javascript:history.back()'>����</a>")
			response.end
		end if
		rs.movenext
	loop
	rs.close
	set rs=nothing
	
	Set rs = Server.CreateObject("ADODB.Recordset")
	sql="select * from "& db_EC_Type_Table &""
	rs.open sql,conn,3,3
	rs.addnew
	rs("E_typename")=E_typename
	rs("mode")=mode
	rs("typecontent")=typecontent
	rs("E_typeorder")=E_typeorder
	rs("E_typeview")=E_typeview
	rs("E_dh_typeview")=E_dh_typeview
	rs("url")=typeurl
	if typemaster="" then
		rs("typemaster")="��"
	else
		rs("typemaster")=typemaster
	end if
	rs.update
	rs.close
	set rs=nothing
	end if
	
	conn.close
	set conn=nothing
	response.write "<meta http-equiv=""refresh"" content="""&freetime&";url=E_TypeManage.asp"">"
	Show_Message("<p align=center><font color=red>��ϲ��!���óɹ�!<br><br>"&freetime&"���Ӻ󷵻���ҳ!</font>")
	response.end
end if%>