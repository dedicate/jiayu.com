<%@ Language=VBScript %>
<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<!--#include file="ChkURL.asp" -->
<%
if not((request.cookies(eChsys)("ManageKEY")="super" ) or (request.cookies(eChsys)("KEY")="super" )) then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	Set rs9 = Server.CreateObject("ADODB.Recordset")
	sql9 ="SELECT * From "& db_EC_System_Table &" Order By id DESC"
	RS9.open sql9,Conn,1,1

	if rs9("init")="1" or (request.cookies(eChsys)("ManagePurview")="99999" and request.cookies(eChsys)("purview")="99999") then

		if (request.form("action")="del") then
			if request.form("selectdel")<>"" then
				For i = 1 To Request.Form("selectdel").Count
					SelectTable=Request.Form("selectdel")(i)
					select case SelectTable
						'��ʼ�����ű�
						case db_EC_Dep_Table conn.execute "delete from "& db_EC_Dep_Table
						'��ʼ��������
						case db_EC_Type_Table conn.execute "delete from "& db_EC_Type_Table
						'��ʼ��������
						case db_EC_BigClass_Table conn.execute "delete from "& db_EC_BigClass_Table
						'��ʼ��С����
						case db_EC_SmallClass_Table conn.execute "delete from "& db_EC_SmallClass_Table
						'��ʼ��ר���
						case db_EC_Special_Table conn.execute "delete from "& db_EC_Special_Table
						'��ʼ�����±�
						case db_EC_News_Table conn.execute "delete from "& db_EC_News_Table
						'��ʼ����ʱ��
						case db_NewsFile_Table conn.execute "delete from "& db_NewsFile_Table
						'��ʼ���ϴ���ʱ��
						case db_UploadPic_Table
								set rs2=server.createobject("adodb.recordset")
								sql2="select * from "& db_UploadPic_Table
								rs2.open sql2,conn,1,3
								do while not rs2.EOF
									Set fso=Server.CreateObject("Scripting.FileSystemObject")
									If fso.FileExists(Server.Mappath(FileUploadPath & rs2("picname")))=true Then
										fso.DeleteFile Server.MapPath(FileUploadPath & rs2("picname"))
									End If
									Set fso=Nothing
									rs2.movenext
								loop
								rs2.close
								set rs2=nothing
								conn.execute "delete from "& db_UploadPic_Table
						'��ʼ��ͶƱ��
						case db_EC_Vote_Table conn.execute "delete from "& db_EC_Vote_Table
						'��ʼ���������ӱ�
						case db_EC_Link_Table conn.execute "delete from "& db_EC_Link_Table
						'��ʼ�������
						case db_EC_Board_Table conn.execute "delete from "& db_EC_Board_Table
						'��ʼ��������
						case db_EC_Attach_Table
								set rs1=server.createobject("adodb.recordset")
								sql1="select * from "& db_EC_Attach_Table
								rs1.open sql1,conn,1,3
								do while not rs1.EOF
									Set fso=Server.CreateObject("Scripting.FileSystemObject")
									If fso.FileExists(Server.Mappath(FileUploadPath & rs1("filename")))=true Then
										fso.DeleteFile Server.MapPath(FileUploadPath & rs1("filename") )
									End If
									Set fso=Nothing
									rs1.movenext
								loop
								rs1.close
								set rs1=nothing
						 		conn.execute "delete from "& db_EC_Attach_Table
						'��ʼ�����۱�
						case (db_EC_Review_Table&"1") conn.execute "delete from "& db_EC_Review_Table &" where NewsId>0"
						'��ʼ�����Ա�
						case (db_EC_Review_Table&"0") conn.execute "delete from "& db_EC_Review_Table &" where NewsId<1"
						'��ʼ���û���
						case db_User_Table ConnUser.execute "delete from "& db_User_Table &" where purview<>99999"
						'��ʼ������Ա��
						case db_EC_Manage_Table conn.execute "delete from "& db_EC_Manage_Table &" where purview<>99999"
					end select
				Next
				ConnUser.close
				set ConnUser=nothing
				conn.close
				set conn=nothing
				response.write "<meta http-equiv=""refresh"" content="""&freetime&";url=New.asp"">"
				Show_Message("<p align=center><font color=red>ϵͳ��"& (request.form("selectdel")) &"��ʼ�����!<br><br>"&freetime&"���Ӻ󷵻س�ʼҳ!</font>")
				response.end
			else
				Show_Err("�Բ�������û��ѡ���κβ�����<br><br>������<a href='javascript:history.back()'>��ȥ����</a>������")
				response.end
			end if
		else
			SpecialID=Request.Form("SpecialID")
			button_value=trim(Request.Form("alert_button"))
			if button_value="ȷ��" then
				conn.execute("delete from "& db_EC_BigClass_Table &"")
				conn.execute("delete from "& db_EC_SmallClass_Table &"")
				conn.execute("delete from "& db_EC_Special_Table &"")
				conn.execute("delete from "& db_EC_News_Table &"")
				conn.execute("delete from "& db_EC_Review_Table &"")
				conn.execute("delete from "& db_EC_Vote_Table &"")
				conn.execute("delete from "& db_EC_Link_Table &"")
				conn.execute("delete from "& db_EC_Type_Table &"")
				conn.execute("delete from "& db_EC_Dep_Table &"")
				conn.execute("delete from "& db_EC_Board_Table &"")

				set rs1=server.createobject("adodb.recordset")
				sql1="select * from "& db_EC_Attach_Table
				rs1.open sql1,conn,1,3
				do while not rs1.EOF
					Set fso=Server.CreateObject("Scripting.FileSystemObject")
					If fso.FileExists(Server.Mappath(FileUploadPath & rs1("filename")))=true Then
						fso.DeleteFile Server.MapPath(FileUploadPath & rs1("filename") )
					End If
					Set fso=Nothing
					rs1.movenext
				loop
				rs1.close
				set rs1=nothing
				conn.execute("delete from "& db_EC_Attach_Table &"")
				conn.execute("delete from "& db_NewsFile_Table &"")

				set rs2=server.createobject("adodb.recordset")
				sql2="select * from "& db_UploadPic_Table
				rs2.open sql2,conn,1,3
				do while not rs2.EOF
					Set fso=Server.CreateObject("Scripting.FileSystemObject")
					If fso.FileExists(Server.Mappath(FileUploadPath & rs2("picname")))=true Then
						fso.DeleteFile Server.MapPath(FileUploadPath & rs2("picname"))
					End If
					Set fso=Nothing
					rs2.movenext
				loop
				rs2.close
				set rs2=nothing
				conn.execute("delete from "& db_UploadPic_Table &"")

				if UserTableType = "EChuang" then		'��������
					ConnUser.execute("delete from "& db_User_Table &" where purview<>99999")
				end if
				response.write "<meta http-equiv=""refresh"" content="""&freetime&";url=admin_index.asp"">"
				Show_Message("<p align=center><font color=red>ϵͳ�Ѿ�����ʼ��!<br><br>"&freetime&"���Ӻ󷵻���ҳ!</font>")
				response.end
			else
				Response.Redirect "admin_index.asp"
			end if
		end if
		rs9.close
		set rs9=nothing
		conn.close
		set conn=nothing
	else
		Show_Err("�Բ��𣬸ù����Ѿ�������ϵͳ����Ա�رգ���û��Ȩ�޲�����")
		response.end
	end if
end if%>