<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->
<%
From_url = Cstr(Request.ServerVariables("HTTP_REFERER"))
Serv_url = Cstr(Request.ServerVariables("SERVER_NAME"))
if mid(From_url,8,len(Serv_url)) <> Serv_url then
 response.write "�Ƿ����ӣ�" '��ֹ����
 response.end
end if

'if Request.Cookies("Logined")="" then
'response.redirect "/login.asp" '��Ҫ��½��
'end if
Function GetFileName(longname)'/folder1/folder2/file.asp=>file.asp
 while instr(longname,"/")
  longname = right(longname,len(longname)-1)
 wend
 GetFileName = longname
End Function
Dim Stream
Dim Contents
Dim FileName
Dim TrueFileName
Dim FileExt
Dim SavePath

Const adTypeBinary = 1
FileName = Request.QueryString("FileName")
if FileName = "" Then
    Response.Write "��Ч�ļ�����"
    Response.End
End if
FileExt = Mid(FileName, InStrRev(FileName, ".") + 1)
Select Case UCase(FileExt)
    Case "ASP", "ASA", "ASPX", "ASAX", "MDB"
        Response.Write "�Ƿ�������"
        Response.End
End Select
Response.Clear
if lcase(right(FileName,3))="gif" or lcase(right(FileName,3))="jpg" or lcase(right(FileName,3))="png" then
 Response.ContentType = "image/*" '��ͼ���ļ����������ضԻ���
else
 Response.ContentType = "application/ms-download"
end if
Response.AddHeader "content-disposition", "attachment; filename=" & GetFileName(Request.QueryString("FileName"))
Set Stream = server.CreateObject("ADODB.Stream")
Stream.Type = adTypeBinary
Stream.Open

SavePath = FileUploadPath   '����ϴ��ļ���Ŀ¼
TrueFileName = SavePath & FileName

Stream.LoadFromFile Server.MapPath(TrueFileName)
While Not Stream.EOS
    Response.BinaryWrite Stream.Read(1024 * 64)
Wend
Stream.Close
Set Stream = Nothing
Response.Flush
Response.End
%>