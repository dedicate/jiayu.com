<%@ Language=VBScript %>
<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<!--#include file="ChkURL.asp"-->
<%
if not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	if Complainmanage="1" or (request.cookies(eChsys)("ManagePurview")="99999" and request.cookies(eChsys)("purview")="99999") then

	ComplainID=ChkRequest(Request.Form("ComplainID"),1)	'��ע��
	button_value=trim(Request.Form("alert_button"))
	if button_value="ȷ��" then
		conn.execute("delete from "& db_EC_Complain_Table &" where ComplainID=" & ComplainID)
	else
		Response.Redirect "ComplainList.asp"
	end if

	response.write "<meta http-equiv=""refresh"" content="""&freetime&";url=ComplainList.asp"">"
	Show_Message("Ͷ�߻��߾ٱ� ID =["& ComplainID &"]ɾ���ɹ���!<br><br>"&freetime&"���Ӻ󷵻���ҳ!</font>")
	response.end
		else
		Show_Err("�Բ��𣬸ù����Ѿ�������ϵͳ����Ա�رգ���û��Ȩ�޲�����")
		response.end
	end if
end if
%>