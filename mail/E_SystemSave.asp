<% @language="vbscript" %>
<!--#include file="conn.asp"-->
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

	Set rs9 = Server.CreateObject("ADODB.Recordset")
	sql9 ="SELECT * From "& db_EC_System_Table &" Order By id DESC"
	RS9.open sql9,Conn,1,1
	if rs9("system")="1" or request.cookies(eChsys)("ManagePurview")="99999" then

	xpurl=request("xpurl")
	email=request("email")
	QQ=request("QQ")
	copyright=request("copyright")
	version=request("version")
	ver=request("ver")
	Address=request("Address")
	zip=request("zip")
	tel=request("tel")
	gd1=request("gd1")
	gd2=request("gd2")
	B_BG=request("B_BG")
	
	top_news=request("top_news")
	L_BG=request("L_BG")
	bigclassshownum=request("bigclassshownum")
	top_sp=request("top_sp")
	top_txt=request("top_txt")
	top_img=request("top_img")
	newsnum=request("newsnum")
	picnum=request("picnum")
	topuser=request("topuser")
	linkshownum=request("linkshownum")
	reviewnum=request("reviewnum")
	
	logo=request("logo")
	logourl=request("logourl")
	TopBanner=request("TopBanner")
	TopBannerurl=request("TopBannerurl")
	OtherTopBanner=request("OtherTopBanner")
	OtherTopBannerurl=request("OtherTopBannerurl")
	moveurl=request("moveurl")
	E_announceview=request("E_announceview")


	
	gg1=server.htmlencode(request("gg1"))
	gg1=CheckStr(gg1)
	SiteName=server.htmlencode(request("SiteName"))
	SiteName=CheckStr(SiteName)
	Address=server.htmlencode(request("Address"))
	Address=CheckStr(Address)
	CopyRight=server.htmlencode(request("CopyRight"))
	CopyRight=CheckStr(CopyRight)
	
	if DbType="ACCESS" then
		version="E��������վ����ϵͳAccess���Ż���"
	end if
	
	if DbType="MSSQL" then
		version="E��������վ����ϵͳMSSQL���Ż���"
	end if
	
	if DbType="MYSQL" then
		version="E��������վ����ϵͳMYSQL���Ż���"
	end if
	
	ver="EC0704_V6017"
	R_BG=request("R_BG")
	AD_Show=request("AD_Show")
	ad_class=request("ad_class")
	R_TOP=request("R_TOP")
	R_MAIN=request("R_MAIN")
	L_MAIN=request("L_MAIN")
	
	If SiteName=""  or xpurl="" or email="" Then
		Show_Err("�Բ���,��������������д��?<br><br><a href='javascript:history.back()'>��ȥ����</a>")
		response.end
	end if
	
	if len(gg1)>=65535 then
		Show_Err("��վ����̫���ˣ������ƻ�ҳ���������<br><br><a href='javascript:history.back()'>��ȥ����</a>")
		response.end
	end if
	
	if len(url)>=100 then
		Show_Err("�����ҳ��ַ̫����<br><br><a href='javascript:history.back()'>��ȥ����</a>")
		response.end
	end if

	set rs3=server.createobject("adodb.recordset")
	sql3="select * from "& db_UploadPic_Table &" where username='"&request.cookies(eChsys)("username")&"'" 
	rs3.open sql3,conn,1,3
	do while not rs3.eof
		set rs4=server.createobject("adodb.recordset")
		sql4="select * from "& db_EC_Attach_Table &"" 
		rs4.open sql4,conn,1,3
		filename=rs3("picname")
		rs4.addnew
		rs4("filename")=filename
		rs4.update
		rs4.close
		set rs4=nothing
		RS3.MoveNext
	loop
	conn.execute("delete from "& db_UploadPic_Table &" where username='"&request.cookies(eChsys)("username")&"'")
	rs3.close
	set rs3=nothing
	
	Set rs = Server.CreateObject("ADODB.Recordset")
	
	sql="update "& db_EC_System_Table &" set SiteName='"&SiteName&"',xpurl='"&xpurl&"',bigclassshownum='"&bigclassshownum&"',reviewnum='"&reviewnum&"',linkshownum='"&linkshownum&"',topuser='"&topuser&"',email='"&email&"',QQ='"&QQ&"',copyright='"&copyright&"',Address='"&Address&"',Zip='"&zip&"',Tel='"&Tel&"',gd1='"&gd1&"',gd2='"&gd2&"',B_BG='"&B_BG&"',top_news="&top_news&",L_BG="&L_BG&",top_sp="&top_sp&",R_BG="&R_BG&",AD_Show="&AD_Show&",ad_class="&ad_class&",top_txt="&top_txt&",top_img="&top_img&",gg1='"&gg1&"',R_TOP='"&R_TOP&"',R_MAIN='"&R_MAIN&"',L_MAIN='"&L_MAIN&"',newsnum='"&newsnum&"',picnum='"&picnum&"',ver='"&ver&"',version='"&version&"',logo='"&logo&"',logourl='"&logourl&"',Topbanner='"&Topbanner&"',Topbannerurl='"&Topbannerurl&"',OtherTopbanner='"&OtherTopbanner&"',OtherTopbannerurl='"&OtherTopbannerurl&"',moveurl='"&moveurl&"',E_announceview='"&E_announceview&"'"
	conn.execute(sql)
	conn.close
	
	set conn=nothing
	set fso=Server.CreateObject("Scripting.FileSystemObject")
	set hf=fso.CreateTextFile(Server.mappath("inc/config.asp"),true)
	hf.write "<" & "%" & vbcrlf
	hf.write "Const MaxFileSize=" & chr(34) & trim(request("MaxFileSize")) & chr(34) & "        '�ϴ��ļ���С����" & vbcrlf
	hf.write "Const SaveUpFilesPath=" & chr(34) & "UploadFile" & chr(34) & "        		'����ϴ��ļ���Ŀ¼" & vbcrlf
	hf.write "Const UpFileType=" & chr(34) & trim(request("UpFileType")) & chr(34) & "        '������ϴ��ļ�����" & vbcrlf
	hf.write "Const byteType=" & chr(34) & trim(request("byteType")) & chr(34) & "        '���Ա����˴���" & vbcrlf
    hf.write "Const byteipType=" & chr(34) & trim(request("byteipType")) & chr(34) & "        '��վ����ɣе�ַ��������" & vbcrlf
	hf.write "Const bytezfType=" & chr(34) & trim(request("bytezfType")) & chr(34) & "        '��վ�����������ַ�����" & vbcrlf
	hf.write "Const newsipType=" & chr(34) & trim(request("newsipType")) & chr(34) & "        '�������IP��������(��дΪ����������Ҫ��Ӧ����)" & vbcrlf
	hf.write "Const echuangmenu=" & chr(34) & trim(request("echuangmenu")) & chr(34) & "        '�Զ���˵�" & vbcrlf
	hf.write "Const BOTTOMmenu=" & chr(34) & trim(request("BOTTOMmenu")) & chr(34) & "	'�Զ���ײ��˵�" & vbcrlf
	hf.write "%" & ">"
	hf.close
	set hf=nothing
	set fso=nothing
	response.write "<meta http-equiv=""refresh"" content="""&freetime&";url=E_System.asp"">"
	Show_Message("<p align=center><font color=red>�Ѿ��ɹ���ӵ����ݿ�!<br><br>"&freetime&"���Ӻ󷵻���ҳ!</font>")
	response.end

	rs9.close
		set rs9=nothing
		conn.close
		set conn=nothing
	else
		Show_Err("�Բ��𣬸ù����Ѿ�������ϵͳ����Ա�رգ���û��Ȩ�޲�����")
		response.end
	end if
end if%>