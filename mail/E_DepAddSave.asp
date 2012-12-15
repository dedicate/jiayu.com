<!--#INCLUDE FILE="Conn.asp" -->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="ChkUser.asp" -->
<!--#include file="ChkManage.asp" -->
<%
IF request.cookies(eChsys)("ManageKEY")<>"super" then
	Show_Err("对不起，您的后台管理权限不够！")
	response.end
else
	if depmanage="1" or (request.cookies(eChsys)("ManagePurview")="99999" and request.cookies(eChsys)("purview")="99999") then

	function changechr(str) 
		changechr=replace(replace(replace(replace(str,"<","&lt;"),">","&gt;"),chr(13),"<br>")," "," ") 
		changechr=replace(changechr,"'","&acute;")
		changechr=replace(changechr,mid(" "" ",2,1),"&quot;")
	end function

	Dim E_DepName, E_DepType,SiteUrl
	
	E_DepType=changechr(trim(request.form("E_DepType")))
	E_DepName=changechr(trim(request("E_DepName")))
	SiteUrl=trim(request("SiteUrl"))
	Dep_bannerUrl=trim(request("Dep_bannerUrl"))
	DepIntroduce = DepIntroduce & Request.Form("DepIntroduce")
    DepFunction = DepFunction & Request.Form("DepFunction")
    DepOrg = DepOrg & Request.Form("DepOrg")
    DepLead = DepLead & Request.Form("DepLead")
    DepContact = DepContact & Request.Form("DepContact")
	'DepIntroduce=trim(request("DepIntroduce"))
	'DepFunction=trim(request("DepFunction"))
	'DepOrg=trim(request("DepOrg"))
	'DepLead=trim(request("DepLead"))
	'DepContact=trim(request("DepContact"))
	
	If E_DepName="" Then
		Show_Err("对不起，单位名称不能为空！<br><br><a href='javascript:history.back()'>返回</a>")
		response.end
	end if
	If E_DepType="" Then
		Show_Err("对不起，部门名称不能为空！<br><br><a href='javascript:history.back()'>返回</a>")
		response.end
	end if
		If Dep_bannerUrl="" Then
		Show_Err("对不起，部门主页顶部Banner地址不能为空！如果没有请填写默认值 images/top_flash.swf!<br><br><a href='javascript:history.back()'>返回</a>")
		response.end
	end if
	set rs=server.createobject("adodb.recordset")
	sql="select * from "& db_EC_Dep_Table &""
	rs.open sql,conn,3,3
	do while not rs.eof
		if rs("E_DepName")=E_DepName and rs("E_DepType")=E_DepType then
			Show_Err("对不起，相同的单位部门已经存在！<br><br><a href='javascript:history.back()'>返回</a>")
			response.end
		end if
		rs.movenext
	loop

If E_DepType="" Then
		Show_Err("对不起，部门名称不能为空！<br><br><a href='javascript:history.back()'>返回</a>")
		response.end
	end if
	set rs=server.createobject("adodb.recordset")
	sql="select * from "& db_EC_Dep_Table &""
	rs.open sql,conn,3,3
	do while not rs.eof		
		rs.movenext
	loop

	rs.close
	set rs=nothing
	
	Set rs = Server.CreateObject("ADODB.Recordset")
	sql="select * from "& db_EC_Dep_Table &""
	rs.open sql,conn,3,3
	rs.addnew
	rs("E_DepName")=E_DepName
	rs("E_DepType")=E_DepType
	rs("SiteUrl")=SiteUrl
	rs("Dep_bannerUrl")=Dep_bannerUrl
    rs("depnumber")="0"
	rs("DepIntroduce")=DepIntroduce
	rs("DepFunction")=DepFunction
	rs("DepOrg")=DepOrg
	rs("DepLead")=DepLead
	rs("DepContact")=DepContact
	rs.update
	rs.close
	set rs=nothing
	conn.close
	set conn=nothing
	response.redirect "E_DepManage.asp"
	else
		Show_Err("对不起，该功能已经被超级系统管理员关闭，您没有权限操作！")
		response.end
	end if
end if%>