<!--#INCLUDE FILE="Conn.asp" -->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp"-->
<!--#include file="ChkManage.asp" -->
<!--#include file="ChkURL.asp"-->

<%
IF request.cookies(eChsys)("ManageKEY")<>"super" then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲�����")
	response.end
else
	if depmanage="1" or (request.cookies(eChsys)("ManagePurview")="99999" and request.cookies(eChsys)("purview")="99999") then

	function changechr(str) 
		changechr=replace(replace(replace(replace(str,"<","&lt;"),">","&gt;"),chr(13),"<br>")," "," ") 
		changechr=replace(changechr,"'","&acute;")
		changechr=replace(changechr,mid(" "" ",2,1),"&quot;")
	end function

	dim E_DepName
	dim E_DepType
	dim ID
	ID=ChkRequest(request("ID"),1)	'��ע��
	E_DepType=changechr(trim(request.form("E_DepType")))
	E_DepName=changechr(trim(request("E_DepName")))
	SiteUrl=trim(request("SiteUrl"))
	Dep_bannerUrl=trim(request("Dep_bannerUrl"))
	
	DepIntroduce = DepIntroduce & Request.Form("DepIntroduce")
    DepFunction = DepFunction & Request.Form("DepFunction")
    DepOrg = DepOrg & Request.Form("DepOrg")
    DepLead = DepLead & Request.Form("DepLead")
    DepContact = DepContact & Request.Form("DepContact")
	
	if E_DepName="" or E_DepType="" then
		Show_Err("��λ�������Ʋ���Ϊ��<br><br><a href=javascript:history.go(-1)>����������д</a>")
		response.end
	else
		'�޸Ĳ��ſ�
		dim depid
		set rs=server.createobject("adodb.recordset")
		sql="select * from "& db_EC_Dep_Table &" where ID="&ID
		rs.open sql,conn,3,3
		depid=rs("id")
		rs("E_DepName")=E_DepName
		rs("E_DepType")=E_DepType
	    rs("SiteUrl")=SiteUrl
		rs("Dep_bannerUrl")=Dep_bannerUrl
	    rs("DepIntroduce")=DepIntroduce
	    rs("DepFunction")=DepFunction
	    rs("DepOrg")=DepOrg
	    rs("DepLead")=DepLead
	    rs("DepContact")=DepContact
		rs.update
		rs.close
		set rs=nothing
	
		'�޸��û���
		set rs=server.createobject("adodb.recordset")
		sql="select * from "& db_User_Table &" where depid="&depid
		rs.open sql,ConnUser,3,3
		do while not rs.eof
			rs("E_DepName")=E_DepName
			rs("E_DepType")=E_DepType
			rs.update
			rs.movenext
		loop
		rs.close
		set rs=nothing
		conn.close
		set conn=nothing
		response.write "<meta http-equiv=""refresh"" content="""&freetime&";url=E_DepManage.asp"">"
		Show_Message("<p align=center><font color=red>��λ�����޸ĳɹ�!<br><br>"&freetime&"���Ӻ󷵻���ҳ!</font>")
		response.end
	end if
	else
		Show_Err("�Բ��𣬸ù����Ѿ�������ϵͳ����Ա�رգ���û��Ȩ�޲�����")
		response.end
	end if
end if%>