<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="Inc/config_LeadMail.asp"-->
<!--#include file="Inc/upload.asp"-->
<%
dim upload,file,formName,SavePath,SaveSecondPath,filename,fileExt,FileExtPath,filenameyc
dim upNum
dim EnableUpload
dim Forumupload
dim ranNum
dim uploadfiletype
dim msg,founderr
msg=""
founderr=false
EnableUpload=false
SavePath = (FileUploadPath)   '����ϴ��ļ���Ŀ¼
if right(SavePath,1)<>"/" then SavePath=SavePath&"/" '��Ŀ¼���(/)
%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>
<%
	call upload_0()  'ʹ�û���������ϴ���
%>
</body>
</html>
<%
sub upload_0()    'ʹ�û���������ϴ���
	set upload=new upload_file    '�����ϴ�����
	for each formName in upload.file '�г������ϴ��˵��ļ�
		set file=upload.file(formName)  '����һ���ļ�����
		if file.filesize<100 then
 			msg="����ѡ����Ҫ�ϴ����ļ���"
			founderr=true
		end if
		if file.filesize>(MaxFileSize*1024) then
 			msg="�ļ���С���������ƣ����ֻ���ϴ�" & CStr(MaxFileSize) & "K���ļ���"
			founderr=true
		end if
        fileExt=lcase(file.FileExt)
		Forumupload=split(UpFileType,"|")
		for i=0 to ubound(Forumupload)
			EnableUpload=false
			if fileEXT=trim(Forumupload(i)) then
				EnableUpload=true
				exit for
			end if
		next
		if fileEXT="asp" or fileEXT="asa" or fileEXT="aspx" or fileEXT="cer" or fileEXT="cdx" then
			EnableUpload=false
		end if
		if EnableUpload=false then
			msg="�����ļ����Ͳ������ϴ���\n\nֻ�����ϴ��⼸���ļ����ͣ�" & UpFileType
			founderr=true
		end if
	
		strJS="<SCRIPT language=javascript>" & vbcrlf
		if founderr<>true then

			SaveSecondPath=year(now)&"-"&month(now)
			FileExtPath=LCase(fileExt)
			ServePath=server.mappath(SavePath)
			Set fso=server.createobject("scripting.filesystemobject")
			'response.write ServePath & vbcrlf
			if fso.FolderExists(ServePath) then
				'���Config.asp�����õ��ϴ�Ŀ¼,�����Զ�����
			else
        Set f = fso.CreateFolder(ServePath)
        set f=nothing
			End if
			
			'response.write ServePath &"\"& FileExtPath & vbcrlf
			if fso.FolderExists(ServePath &"\"& FileExtPath) then
				'����ϴ�Ŀ¼��û���ϴ��ļ�����(��չ��)Ŀ¼,�����Զ�����
			else
        Set f = fso.CreateFolder(ServePath &"\"& FileExtPath)
        set f=nothing
			End if

			'response.write ServePath &"\"& FileExtPath &"\"& SaveSecondPath & vbcrlf
			if fso.FolderExists(ServePath &"\"& FileExtPath &"\"& SaveSecondPath) then
				'����ϴ�Ŀ¼��û�б�����Ŀ¼,�����Զ�����
			else
        Set f = fso.CreateFolder(ServePath &"\"& FileExtPath &"\"& SaveSecondPath)
        set f=nothing
			End if
			set fso=nothing

			randomize
			ranNum=int(900*rnd)+100
			SaveFileName=year(now)&month(now)&day(now)&hour(now)&minute(now)&second(now)&ranNum&"."&fileExt
			filename=SavePath & FileExtPath &"/"& SaveSecondPath &"/"& SaveFileName
			filenameyc=FileExtPath &"/"& SaveSecondPath &"/"& SaveFileName  '�������ļ�������
			fillle="����"   
			file.SaveToFile Server.mappath(FileName)   '�����ļ�
			filename1= FileExtPath &"/"& SaveSecondPath &"/"& SaveFileName
			set rs=server.createobject("adodb.recordset")
			sql="select * from "& db_UploadPic_Table
			rs.open sql,conn,1,3
			rs.addnew
			rs("picname")=filename1
			username=request.cookies(eChsys)("username")
			rs("username")=username
			rs.update
			rs.close
			set rs=nothing
			msg="�ϴ��ļ��ɹ���"

			strJS=strJS & "content=parent.message.document.body.innerHTML;"
			FileType=right(fileExt,3)
			strJS=strJS & "content=content+'����ͼ�����������<br><a href=down.asp?FileName="& filenameyc &"><img border=0 src=images/"&FileType&".gif></a><br>"& fillle &"';" & vbcrlf
	  	strJS=strJS & "parent.message.document.body.innerHTML=content;" & vbcrlf
		end if
		strJS=strJS & "alert('" & msg & "');" & vbcrlf
	  strJS=strJS & "history.go(-1);" & vbcrlf
	  strJS=strJS & "</script>"
	  response.write strJS
		set file=nothing
	next
	set upload=nothing
end sub
%>