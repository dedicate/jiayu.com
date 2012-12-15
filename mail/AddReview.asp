<%@ Language=VBScript %>
<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->
<!--#include file="inc/config.asp"-->
<!--#include file="char.inc"-->
<%
reviewID=checkstr(Request.Form("reviewID"))
NewsID=checkstr(Request.Form("NewsID"))
title=checkstr(Request.Form("title"))
Author=trim(checkstr((Request.Form("Author"))))
dim ViewUrl
ViewUrl=request.cookies(eChsys)("ViewUrl")
if ViewUrl="" then
	ViewUrl="index.asp"
end if

if author="" then
	response.write "<script>alert('请输入您的姓名！');history.back()</script>"
	Response.End
end if
author=htmlencode(author)

email=trim(Request.Form("email"))
if email="" then
	response.write "<script>alert('请输入您的EMAIL。');history.back()</script>"
	Response.End
end if

if  IsValidEmail(email)=false  then
	response.write "<script>alert('请输入正确的EMAIL。');history.back()</script>"
	Response.End
end if

if Instr(request("content"),"'")>0 or Instr(request("content"),"script")>0 or Instr(request("content"),"onClick")>0  or Instr(request("content"),"onload")>0 then
	Show_Err("对不起，您输入的留言内容包含有非法字符。<br><br><a href='javascript:history.back()'>返回</a>")
	Response.End 
end if



content=trim(htmlencode1((request.form("content"))))
content=replace(content,"<p> ","")
content=replace(content,"<P> ","")

Response.cookies(eChsys)("content")=content

dim byte1
byte1=split(byteType,"|")

for i=0 to ubound(byte1)
	content=replace(content,trim(byte1(i)),"***")
next

dim byte2
byte2=split(byteipType,"|")

for i=0 to ubound(byte2)
if Request.serverVariables("REMOTE_ADDR")=byte2(i) then
	Show_Err("对不起，你的IP地址已被锁定，请联系管理员！！！。<br><br><a href='javascript:history.back()'>返回</a>")
	Response.cookies(eChsys)("content")=""
	Response.End 
end if
next

dim byte3
byte3=split(bytezfType,"|")

for i=0 to ubound(byte3)
if Instr(request("content"),byte3(i))>0  then
	Show_Err("对不起，请不要发布非法小广告！！！。<br><br><a href='javascript:history.back()'>返回</a>")
	Response.cookies(eChsys)("content")=""
	Response.End 
end if
next

if content="" then
	response.write "<script>alert('请输入评论内容！');history.back()</script>"
	Response.End
end if

set rs=server.createobject("adodb.recordset")
sql="select * from "& db_EC_News_Table &" where NewsId=" & NewsId
rs.open sql,conn,1,3
if rs.eof and rs.bof then
	rs.close
	set rs=nothing
	response.write "<script>alert('无法对不存在的文章进行评论！\n 确认是否为非法的提交。');history.back()</script>"
	response.end
else
	checked=rs("checkked")
	if checked<>1 then
		rs.close
		set rs=nothing
		response.write "<script>alert('文章未通过审核，不能进行评论！');history.back()</script>"
		response.end
	else
		rs("titlesize")=1
		rs.update
		rs.close
		reviewip=Request.ServerVariables("REMOTE_ADDR")
		passed=checkstr(Request.Form("passed"))
	
		set rs=server.createobject("adodb.recordset")
		sql="select * from "& db_EC_Review_Table &"" 
		rs.open sql,conn,1,3
		rs.addnew
		rs("author")=author
		rs("content")=content
		rs("title")=title
		rs("NewsID")=NewsID
		rs("passed")=passed
		rs("reviewip")=reviewip
		rs("email")=email
		rs("updatetime")=now()
		rs.update
		rs.close
		reviewid=reviewID+1
		set rs=nothing
		Response.cookies(eChsys)("content")=""
	end if
end if
Response.Redirect ViewUrl
%>