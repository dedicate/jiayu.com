<%@ Language="VBScript" %>
<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="inc/config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<%
IF request.cookies(eChsys)("KEY")<>"super" THEN
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	response.buffer=true
	Response.Expires=0
	
	Set rs9 = Server.CreateObject("ADODB.Recordset")
	sql9 ="SELECT * From "& db_EC_System_Table &" Order By id DESC"
	RS9.open sql9,Conn,1,1
	if rs9("system")="1" or request.cookies(eChsys)("purview")="99999" then
		rs9.close
		set rs9=nothing
		conn.close
		set conn=nothing		
'==========================================================================		
		' ʹ�������������������WIN2003��ʾ����
		Response.Buffer = true		
		' �������������
		Dim ObjTotest(26,4)		
		ObjTotest(0,0) = "MSWC.AdRotator"
		ObjTotest(1,0) = "MSWC.BrowserType"
		ObjTotest(2,0) = "MSWC.NextLink"
		ObjTotest(3,0) = "MSWC.Tools"
		ObjTotest(4,0) = "MSWC.Status"
		ObjTotest(5,0) = "MSWC.Counters"
		ObjTotest(6,0) = "IISSample.ContentRotator"
		ObjTotest(7,0) = "IISSample.PageCounter"
		ObjTotest(8,0) = "MSWC.PermissionChecker"
		ObjTotest(9,0) = "Scripting.FileSystemObject"
		ObjTotest(9,1) = "(FSO �ı��ļ���д)"
		ObjTotest(10,0) = "adodb.connection"
		ObjTotest(10,1) = "(ADO ���ݶ���)"
		ObjTotest(11,0) = "SoftArtisans.FileUp"
		ObjTotest(11,1) = "(SA-FileUp �ļ��ϴ�)"
		ObjTotest(12,0) = "SoftArtisans.FileManager"
		ObjTotest(12,1) = "(SoftArtisans �ļ�����)"
		ObjTotest(13,0) = "LyfUpload.UploadFile"
		ObjTotest(13,1) = "(���Ʒ���ļ��ϴ����)"
		ObjTotest(14,0) = "Persits.Upload.1"
		ObjTotest(14,1) = "(ASPUpload �ļ��ϴ�)"
		ObjTotest(15,0) = "w3.upload"
		ObjTotest(15,1) = "(Dimac �ļ��ϴ�)"		
		ObjTotest(16,0) = "JMail.SmtpMail"
		ObjTotest(16,1) = "(Dimac JMail �ʼ��շ�)"
		ObjTotest(17,0) = "CDONTS.NewMail"
		ObjTotest(17,1) = "(���� SMTP ����)"
		ObjTotest(18,0) = "Persits.MailSender"
		ObjTotest(18,1) = "(ASPemail ����)"
		ObjTotest(19,0) = "SMTPsvg.Mailer"
		ObjTotest(19,1) = "(ASPmail ����)"
		ObjTotest(20,0) = "DkQmail.Qmail"
		ObjTotest(20,1) = "(dkQmail ����)"
		ObjTotest(21,0) = "Geocel.Mailer"
		ObjTotest(21,1) = "(Geocel ����)"
		ObjTotest(22,0) = "IISmail.Iismail.1"
		ObjTotest(22,1) = "(IISmail ����)"
		ObjTotest(23,0) = "SmtpMail.SmtpMail.1"
		ObjTotest(23,1) = "(SmtpMail ����)"			
		ObjTotest(24,0) = "SoftArtisans.ImageGen"
		ObjTotest(24,1) = "(SA ��ͼ���д���)"
		ObjTotest(25,0) = "W3Image.Image"
		ObjTotest(25,1) = "(Dimac ��ͼ���д���)"
		public IsObj,VerObj,TestObj
		public okOS,okCPUS,okCPU
		'���Ԥ�����֧��������汾
		dim i
		for i=0 to 25
			on error resume next
			IsObj=false
			VerObj=""
			'dim TestObj
			TestObj=""
			set TestObj=server.CreateObject(ObjTotest(i,0))
			If -2147221005 <> Err then		'��л����iAmFisher�ı�����
				IsObj = True
				VerObj = TestObj.version
				if VerObj="" or isnull(VerObj) then VerObj=TestObj.about
			end if
			ObjTotest(i,2)=IsObj
			ObjTotest(i,3)=VerObj
		next
		'�������Ƿ�֧�ּ�����汾���ӳ���
		sub ObjTest(strObj)
			on error resume next
			IsObj=false
			VerObj=""
			TestObj=""
			set TestObj=server.CreateObject (strObj)
			If -2147221005 <> Err then		'��л����iAmFisher�ı�����
				IsObj = True
				VerObj = TestObj.version
				if VerObj="" or isnull(VerObj) then VerObj=TestObj.about
			end if	
		End sub
		%>
	<HTML>
	<HEAD>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<TITLE>��������Ϣ</TITLE>
	<style>
	<!--
	BODY
	{
		FONT-FAMILY: ����;
		FONT-SIZE: 9pt
	}
	TD
	{
		FONT-SIZE: 9pt
	}
	A
	{
		COLOR: #000000;
		TEXT-DECORATION: none
	}
	A:hover
	{
		COLOR: #C0C0C0;
		TEXT-DECORATION: underline
	}
	.input
	{
		BORDER: #111111 1px solid;
		FONT-SIZE: 9pt;
		BACKGROUND-color: #F8FFF0
	}
	.backs
	{
		BACKGROUND-COLOR: #7C7CB5;
		COLOR: #ffffff;
	
	}
	.backq
	{
		BACKGROUND-COLOR: #FEEBE4
	}
	.backc
	{
		BACKGROUND-COLOR: #009000;
		BORDER: medium none;
		COLOR: #ffffff;
		HEIGHT: 18px;
		font-size: 9pt
	}
	.fonts
	{
		COLOR: #008000
	}
	-->
	</STYLE>
	</HEAD>
	<body topmargin="0">
	<div align="center">
	  <table width=100% border="1" cellpadding=3 cellspacing=0 bordercolor="#FFDFBF">
        <tr bgcolor="#FEEBE4" class="TDtop" height=18>
          <td height="25" colspan="2" align=left><div align="center">���������йز���</div></td>
        </tr>
        <tr bgcolor="#FEEBE4" height=18>
          <td height="26" align=left bgcolor="#FFFFFF">&nbsp;��������</td>
          <td bgcolor="#FFFFFF">&nbsp;<%=Request.ServerVariables("SERVER_NAME")%></td>
        </tr>
        <tr bgcolor="#FEEBE4" height=18>
          <td height="24" align=left bgcolor="#FFFFFF">&nbsp;������IP</td>
          <td bgcolor="#FFFFFF">&nbsp;<%=Request.ServerVariables("LOCAL_ADDR")%></td>
        </tr>
        <tr bgcolor="#FEEBE4" height=18>
          <td height="27" align=left bgcolor="#FFFFFF">&nbsp;�������˿�</td>
          <td bgcolor="#FFFFFF">&nbsp;<%=Request.ServerVariables("SERVER_PORT")%></td>
        </tr>
        <tr bgcolor="#FEEBE4" height=18>
          <td align=left bgcolor="#FFFFFF">&nbsp;������ʱ��</td>
          <td bgcolor="#FFFFFF">&nbsp;<%=now%></td>
        </tr>
        <tr bgcolor="#FEEBE4" height=18>
          <td height="24" align=left bgcolor="#FFFFFF">&nbsp;IIS�汾</td>
          <td bgcolor="#FFFFFF">&nbsp;<%=Request.ServerVariables("SERVER_SOFTWARE")%></td>
        </tr>
        <tr bgcolor="#FEEBE4" height=18>
          <td align=left bgcolor="#FFFFFF">&nbsp;�ű���ʱʱ��</td>
          <td bgcolor="#FFFFFF">&nbsp;<%=Server.ScriptTimeout%> ��</td>
        </tr>
        <tr bgcolor="#FEEBE4" height=18>
          <td height="26" align=left bgcolor="#FFFFFF">&nbsp;���ļ�·��</td>
          <td bgcolor="#FFFFFF">&nbsp;<%=Request.ServerVariables("PATH_TRANSLATED")%></td>
        </tr>
        <tr bgcolor="#FEEBE4" height=18>
          <td align=left bgcolor="#FFFFFF">&nbsp;��������������</td>
          <td bgcolor="#FFFFFF">&nbsp;<%=ScriptEngine & "/"& ScriptEngineMajorVersion &"."&ScriptEngineMinorVersion&"."& ScriptEngineBuildVersion %></td>
        </tr>
        <%getsysinfo()  '��÷���������%>
        <tr bgcolor="#FEEBE4" height=18>
          <td align=left bgcolor="#FFFFFF">&nbsp;������CPU����</td>
          <td bgcolor="#FFFFFF">&nbsp;<%=okCPUS%> ��</td>
        </tr>
        <tr bgcolor="#FEEBE4" height=18>
          <td align=left bgcolor="#FFFFFF">&nbsp;������CPU����</td>
          <td bgcolor="#FFFFFF">&nbsp;<%=okCPU%></td>
        </tr>
        <tr bgcolor="#FEEBE4" height=18>
          <td align=left bgcolor="#FFFFFF">&nbsp;����������ϵͳ</td>
          <td bgcolor="#FFFFFF">&nbsp;<%=okOS%></td>
        </tr>
      </table>
	  <br>
	  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFDFBF" width="100%">
		<tr height=18 class=TDtop align=center><td height="25" colspan="2">���֧�����
       	    <%
	Dim strClass
		strClass = Trim(Request.Form("classname"))
		If "" <> strClass then
		Response.Write "<br>��ָ��������ļ������"
		Dim Verobj1
		ObjTest(strClass)
		  If Not IsObj then 
			Response.Write "<br><font color=red>���ź����÷�������֧�� " & strclass & " �����</font>"
		  Else
			if VerObj="" or isnull(VerObj) then 
				Verobj1="�޷�ȡ�ø�����汾"
			Else
				Verobj1="������汾�ǣ�" & VerObj
			End If
			Response.Write "<br><font class=fonts>��ϲ���÷�����֧�� " & strclass & " �����" & verobj1 & "</font>"
		  End If
		  Response.Write "<br>"
		end if
		%>
�� IIS�Դ���ASP��� </td>
		</tr>
		<tr height=18 class=TDtop1 align=center>
		  <td width=320 height="25">�� �� �� ��</td>
	      <td width=130 height="25">֧�ּ��汾</td>
		</tr>
		<%For i=0 to 10%>
		<tr height="18" class=backq>
			<td height="25" align=left bgcolor="#FFFFFF">&nbsp;<%=ObjTotest(i,0) & "<font color=#888888>&nbsp;" & ObjTotest(i,1)%></font></td>
			<td align=left bgcolor="#FFFFFF">&nbsp;<%
			If Not ObjTotest(i,2) Then 
				Response.Write "<font color=red><b>��</b></font>"
			Else
				Response.Write "<font class=fonts><b>��</b></font> <a title='" & ObjTotest(i,3) & "'>" & left(ObjTotest(i,3),11) & "</a>"
			End If%></td>
		</tr>
		<%next%>
	  </table>
	  <br>
	  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFDFBF" width="100%">
        <tr height=18 class=TDtop align=center>
          <td height="25" colspan="2">�� �������ļ��ϴ��͹������ </td>
        </tr>
        <tr height=18 class=TDtop1 align=center>
          <td width=320 height="25">�� �� �� ��</td>
          <td width=130 height="25">֧�ּ��汾</td>
        </tr>
        <%For i=11 to 15%>
        <tr height="18" class=backq>
          <td height="25" align=left bgcolor="#FFFFFF">&nbsp;<%=ObjTotest(i,0) & "<font color=#888888>&nbsp;" & ObjTotest(i,1)%></font></td>
          <td align=left bgcolor="#FFFFFF">&nbsp;
          <%
			If Not ObjTotest(i,2) Then 
				Response.Write "<font color=red><b>��</b></font>"
			Else
				Response.Write "<font class=fonts><b>��</b></font> <a title='" & ObjTotest(i,3) & "'>" & left(ObjTotest(i,3),11) & "</a>"
			End If%></td>
        </tr>
        <%next%>
      </table>
	  <br>
	  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFDFBF" width="100%">
        <tr height=18 class=TDtop align=center>
          <td height="25" colspan="2">�� �������շ��ʼ����</td>
        </tr>
        <tr height=18 class=TDtop1 align=center>
          <td width=320 height="25">�� �� �� ��</td>
          <td width=130 height="25">֧�ּ��汾</td>
        </tr>
        <%For i=16 to 23%>
        <tr height="18" class=backq>
          <td height="25" align=left bgcolor="#FFFFFF">&nbsp;<%=ObjTotest(i,0) & "<font color=#888888>&nbsp;" & ObjTotest(i,1)%></font></td>
          <td align=left bgcolor="#FFFFFF">&nbsp;
          <%
			If Not ObjTotest(i,2) Then 
				Response.Write "<font color=red><b>��</b></font>"
			Else
				Response.Write "<font class=fonts><b>��</b></font> <a title='" & ObjTotest(i,3) & "'>" & left(ObjTotest(i,3),11) & "</a>"
			End If%></td>
        </tr>
        <%next%>
      </table>
	  <br>
	  <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFDFBF" width="100%">
        <tr height=18 class=TDtop align=center>
          <td height="25" colspan="2">�� ͼ�������</td>
        </tr>
        <tr height=18 class=TDtop1 align=center>
          <td width=320 height="25">�� �� �� ��</td>
          <td width=130 height="25">֧�ּ��汾</td>
        </tr>
        <%For i=24 to 25%>
        <tr height="18" class=backq>
          <td height="25" align=left bgcolor="#FFFFFF">&nbsp;<%=ObjTotest(i,0) & "<font color=#888888>&nbsp;" & ObjTotest(i,1)%></font></td>
          <td align=left bgcolor="#FFFFFF">&nbsp;
          <%
			If Not ObjTotest(i,2) Then 
				Response.Write "<font color=red><b>��</b></font>"
			Else
				Response.Write "<font class=fonts><b>��</b></font> <a title='" & ObjTotest(i,3) & "'>" & left(ObjTotest(i,3),11) & "</a>"
			End If%></td>
        </tr>
        <%next%>
      </table>
	  
	  <br>
	  �� �������֧��������<br>
	��������������������Ҫ���������ProgId��ClassId��
	<table border="1" cellpadding="0" cellspacing="0" width="100%">
	  <FORM action=<%=Request.ServerVariables("SCRIPT_NAME")%> method=post id=form1 name=form1>
		  <tr height="18" class=TDtop>
			  <td align=center height=30><input class=input type=text value="" name="classname" size=40>
	  <INPUT type=submit value=" ȷ �� " class=TDtop1 id=submit1 name=submit1>
	  <INPUT type=reset value=" �� �� " class=TDtop1 id=reset1 name=reset1> 
	  </td>
	    </tr>
	  </FORM>
	</table>
	<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFDFBF" width="100%">
	    <tr height="18" align=center class="TDtop">
		  <td height="25" colspan="6"><%
	Response.Flush
		
	if ObjTest("Scripting.FileSystemObject") then
	
		set fsoobj=server.CreateObject("Scripting.FileSystemObject")
	
	%>
	        ������ز���
	
	�� ������������Ϣ	</td>
	    </tr>
	    <tr height="18" align=center class="tdtop1">
	      <td width="100" height="27">�̷��ʹ�������</td>
          <td width="50">����</td>
          <td width="80">���</td>
          <td width="60">�ļ�ϵͳ</td>
          <td width="80">���ÿռ�</td>
          <td width="80">�ܿռ�</td>
      </tr>
	  <%
	
		' ���Դ�����Ϣ���뷨���ԡ�COCOON ASP ̽�롱
		
		set drvObj=fsoobj.Drives
		for each d in drvObj
	%>
	    <tr height="18" align=center>
		  <td height="26" align="right"><%=cdrivetype(d.DriveType) & " " & d.DriveLetter%>:</td>
	  <%
		if d.DriveLetter = "A" then	'Ϊ��ֹӰ������������������
			Response.Write "<td></td><td></td><td></td><td></td><td></td>"
		else
	%>
		  <td><%=cIsReady(d.isReady)%></td>
		  <td><%=d.VolumeName%></td>
		  <td><%=d.FileSystem%></td>
		  <td align="right"><%=cSize(d.FreeSpace)%></td>
		  <td align="right"><%=cSize(d.TotalSize)%></td>
	  <%
		end if
	%>
	    </tr>
	  <%
		next
	%>

	</table>
	<br>
	<table  border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFDFBF" width="100%">
	    <tr height="18" align="center" class="TDtop">
		  <td height="25" colspan="5">�� ��ǰ�ļ�����Ϣ
	<%
	
	Response.Flush
	
	
		dPath = server.MapPath("./")
		set dDir = fsoObj.GetFolder(dPath)
		set dDrive = fsoObj.GetDrive(dDir.Drive)
	%>
	�ļ���: <%=dPath%>
	</td>
	    </tr>
	    <tr height="18" align="center" class="tdtop1">
	      <td width="75" height="23">���ÿռ�</td>
          <td width="75">���ÿռ�</td>
          <td width="75">�ļ�����</td>
          <td width="75">�ļ���</td>
          <td width="150">����ʱ��</td>
      </tr>
	    <tr height="18" align="center">
		  <td height="24"><%=cSize(dDir.Size)%></td>
		  <td><%=cSize(dDrive.AvailableSpace)%></td>
		  <td><%=dDir.SubFolders.Count%></td>
		  <td><%=dDir.Files.Count%></td>
		  <td><%=dDir.DateCreated%></td>
	    </tr>
	</table>
	<br>
	�� �����ļ������ٶȲ���<br>
	<%
	Response.Flush
	
	
		' �����ļ���д���뷨���ԡ��Գ����ӡ�
		
		Response.Write "�����ظ�������д���ɾ���ı��ļ�50��..."
	
		dim thetime3,tempfile,iserr
	
	iserr=false
		t1=timer
		tempfile=server.MapPath("./") & "\aspchecktest.txt"
		for i=1 to 50
			Err.Clear
	
			set tempfileOBJ = FsoObj.CreateTextFile(tempfile,true)
			if Err <> 0 then
				Response.Write "�����ļ�����<br><br>"
				iserr=true
				Err.Clear
				exit for
			end if
			tempfileOBJ.WriteLine "Only for test. Ajiang ASPcheck"
			if Err <> 0 then
				Response.Write "д���ļ�����<br><br>"
				iserr=true
				Err.Clear
				exit for
			end if
			tempfileOBJ.close
			Set tempfileOBJ = FsoObj.GetFile(tempfile)
			tempfileOBJ.Delete 
			if Err <> 0 then
				Response.Write "ɾ���ļ�����<br><br>"
				iserr=true
				Err.Clear
				exit for
			end if
			set tempfileOBJ=nothing
		next
		t2=timer
	if iserr <> true then
		thetime3=cstr(int(( (t2-t1)*10000 )+0.5)/10)
		Response.Write "...����ɣ�<font color=red>" & thetime3 & "����</font>��<br>"
		Response.Flush
	
	%>
	<%
	end if
	
	Response.Flush
		
		set fsoobj=nothing
	
	end if%>

	<br>
	</div>
	</BODY>
	</HTML>
	<!--#include file="Admin_Bottom.asp"-->
		<%
		function cdrivetype(tnum)
		    Select Case tnum
		        Case 0: cdrivetype = "δ֪"
		        Case 1: cdrivetype = "���ƶ�����"
		        Case 2: cdrivetype = "����Ӳ��"
		        Case 3: cdrivetype = "�������"
		        Case 4: cdrivetype = "CD-ROM"
		        Case 5: cdrivetype = "RAM ����"
		    End Select
		end function
		
		function cIsReady(trd)
		    Select Case trd
				case true: cIsReady="<font class=fonts><b>��</b></font>"
				case false: cIsReady="<font color='red'><b>��</b></font>"
			End Select
		end function
		
		function cSize(tSize)
		    if tSize>=1073741824 then
				cSize=int((tSize/1073741824)*1000)/1000 & " GB"
		    elseif tSize>=1048576 then
		    	cSize=int((tSize/1048576)*1000)/1000 & " MB"
		    elseif tSize>=1024 then
				cSize=int((tSize/1024)*1000)/1000 & " KB"
			else
				cSize=tSize & "B"
			end if
		end function
		
		sub getsysinfo()
		  on error resume next
		  Set WshShell = server.CreateObject("WScript.Shell")
		  Set WshSysEnv = WshShell.Environment("SYSTEM")
		  okOS = cstr(WshSysEnv("OS"))
		  okCPUS = cstr(WshSysEnv("NUMBER_OF_PROCESSORS"))
		  okCPU = cstr(WshSysEnv("PROCESSOR_IDENTIFIER"))
		  if isnull(okCPUS) then
		    okCPUS = Request.ServerVariables("NUMBER_OF_PROCESSORS")
		  elseif okCPUS="" then
		    okCPUS = Request.ServerVariables("NUMBER_OF_PROCESSORS")
		  end if
		  if Request.ServerVariables("OS")="" then okOS=okOS & "(������ Windows Server 2003)"
		end sub
	end if
end if%>