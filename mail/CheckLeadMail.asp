<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkURL.asp"-->
<%
if not(request.cookies(eChsys)("KEY")="super" or request.cookies(eChsys)("KEY")="check" or request.cookies(eChsys)("KEY")="typemaster" or request.cookies(eChsys)("KEY")="bigmaster") then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	dim LeadMailID,Checked,Checked1
	LeadMailID=ChkRequest(request("LeadMailID"),1)	'��ע��
	Checked=request("Checked")
	set rs=server.createobject("adodb.recordset")
	sql="Select LeadMailID,Checked from "& db_EC_LeadMail_Table &" where LeadMailID="&LeadMailID
	rs.open sql,conn,1,3
	if not (rs.bof or rs.eof) then
		if rs("Checked")=0 then
			rs("Checked")=1
		else
			rs("Checked")=0
		end if
		rs.update
		rs.close
		set rs=nothing
		conn.close
		set conn=nothing	
        Response.Redirect "E_LeadMailList.asp"
	else
		rs.close
		set rs=nothing
		conn.close
		set conn=nothing
		Show_Err("δ�ҵ���ؼ�¼������ʧ�ܣ�<br><br><a href=history.go(-1)>����</a>")
		response.end
	end if
end if%>