<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<html>
<head>
<title></title>
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<%=request.cookies(eChsys)("content")%>
<%
Action=LCase(Request.QueryString("Action"))
newsID=ChkRequest(Request.QueryString("newsID"),1)	'��ע��

If request("action")="modify" Then
set rs=server.createobject("adodb.recordset")
sql="select * from "& db_EC_News_Table &" where newsid="&newsid
rs.open sql,conn,1,1
	If Not rs.Eof Then
		Content=rs("Content")
		''ͼƬ�ϴ�·����ԭΪ config.asp ���趨�� [FileUploadPath] ֵ
		Content=replace(Content,"="&chr(34)&"uploadfile/","="&chr(34)&FileUploadPath,1,-1,1)
	End If
	Response.Write Content
End If
%>
</body>
</html>