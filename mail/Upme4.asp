<!--#include file="Inc/config4.asp"-->
<!--#include file="Inc/upload.asp"-->
<!--#include file="conn.asp" -->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp" -->
<!--#include file="chkuser.asp" -->
<%
dim upload,file,formName,SavePath,SaveSecondPath,filename,fileExt,FileExtPath
dim upNum
dim EnableUpload
dim Forumupload
dim ranNum
dim uploadfiletype
dim msg,founderr
msg=""
founderr=false
EnableUpload=false
SavePath = FileUploadPath   '存放上传文件的目录
if right(SavePath,1)<>"/" then SavePath=SavePath&"/" '在目录后加(/)
%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
</head>
<body>
<%
call upload_0()  '使用化境无组件上传类
%>
</body>
</html>
<%
sub upload_0()    '使用化境无组件上传类
	set upload=new upload_file    '建立上传对象
	for each formName in upload.file '列出所有上传了的文件
		set file=upload.file(formName)  '生成一个文件对象
		if file.filesize<100 then
 			msg="请先选择你要上传的文件！"
			founderr=true
		end if
		if file.filesize>(MaxFileSize*1024) then
 			msg="文件大小超过了限制，最大只能上传" & CStr(MaxFileSize) & "K的文件！"
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
			msg="这种文件类型不允许上传！\n\n只允许上传这几种文件类型：" & UpFileType
			founderr=true
		end if
		
		strJS="<SCRIPT language=javascript>" & vbcrlf
		if founderr<>true then

			SaveSecondPath=year(now)&"-"&month(now)
			FileExtPath=LCase(fileExt)
			ServePath=server.mappath(SavePath)
			Set fso=server.createobject("scripting.filesystemobject")

			if fso.FolderExists(ServePath) then
				'检查Config.asp中设置的上传目录,无则自动建立
			else
        Set f = fso.CreateFolder(ServePath)
        set f=nothing
			End if
			
			if fso.FolderExists(ServePath &"\"& FileExtPath) then
				'检查上传目录有没有上传文件类型(扩展名)目录,无则自动建立
			else
        Set f = fso.CreateFolder(ServePath &"\"& FileExtPath)
        set f=nothing
			End if

			if fso.FolderExists(ServePath &"\"& FileExtPath &"\"& SaveSecondPath) then
				'检查上传目录有没有本年月目录,无则自动建立
			else
        Set f = fso.CreateFolder(ServePath &"\"& FileExtPath &"\"& SaveSecondPath)
        set f=nothing
			End if
			set fso=nothing

			randomize
			ranNum=int(900*rnd)+100
			SaveFileName=year(now)&month(now)&day(now)&hour(now)&minute(now)&second(now)&ranNum&"."&fileExt
			filename=SavePath & FileExtPath &"/"& SaveSecondPath &"/"& SaveFileName
			file.SaveToFile Server.mappath(FileName)   '保存文件
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
			msg="上传文件成功！"
			strJS=strJS & "content=parent.document.rm.r.value;"
			FileType=right(fileExt,3)
			select case FileType
				case "jpg","gif","png","bmp"
					strJS=strJS &"content=content+'<img src=" & filename & " align=left>';" & vbcrlf
				case "mht"
					strJS=strJS & "content=content+'<iframe src=" & filename & " width=640 height=400>';" & vbcrlf
				case "swf"
					strJS=strJS & "content=content+'" & filename & "';" & vbcrlf
				case "rm","ram"
					strJS=strJS & "content=content+'" & filename & "';" & vbcrlf
			end select
			strJS=strJS & "parent.document.rm.r.value=content;" & vbcrlf
			strJS=strJS & "content=parent.document.rm.g.value;"
			FileType=right(fileExt,3)
			select case FileType
				case "jpg","gif","png","bmp"
					strJS=strJS &"content=content+'<img src=" & filename1 & " align=left>';" & vbcrlf
				case "mht"
					strJS=strJS & "content=content+'<iframe src=" & filename1 & " width=640 height=400>';" & vbcrlf
				case "swf"
					strJS=strJS & "content=content+'" & filename1 & "';" & vbcrlf
				case "rm","ram"
					strJS=strJS & "content=content+'" & filename & "';" & vbcrlf
			end select
			strJS=strJS & "parent.document.rm.g.value=content;" & vbcrlf
		end if
		strJS=strJS & "alert('" & msg & "');" & vbcrlf
		strJS=strJS & "window.location = 'upme4.htm';" & vbcrlf
		strJS=strJS & "</script>"
		response.write strJS
		set file=nothing
	next
	set upload=nothing
end sub
%>