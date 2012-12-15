<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->
<!--#include file="function.asp"-->
<%
LeadMailID=Request.QueryString("LeadMailID")%>
<%
    LeadMailID=ChkRequest(request("LeadMailID"),1)	'防注入
	if LeadMailID="" then
	Show_Err("请输入您要要查看的信件ID!<br><br>－－－<a href='javascript:history.back()'>回去重来</a>－－－")
	response.end
	end if	
	
	set rs=server.CreateObject("ADODB.RecordSet")
	rs.Source="select * from "& db_EC_LeadMail_Table &" where  Checked=1 and  LeadMailID="&LeadMailID	
	rs.Open rs.Source,conn,1,1	
		
	if rs.EOF then
	Show_Err("非法信件ID，请确认信件是否存在或者您的信件未通过审核!<br><br>－<a href='javascript:history.back()'>回去重来</a>－")
	Response.End
	end if
		%>
<html>
<head>
<title>嘉鱼县人民政府门户网站 - 阅读信件</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="news.css" rel=stylesheet type=text/css>
</head>
<body bgcolor="#FFFFFF" text="#000000" topmargin="0">
<!--#include file="Top.asp"-->
<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr valign="top">
    <td width="210" height="163" background="Images/L_b.gif">
	<table width="192" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
              <td><img src="Images/mail_top_bg.gif" width="200" height="40"></td>
            </tr>
			            <tr> 
              <td align="center"><img src="Images/xzmail.gif" width="168" height="126"></td>
            </tr>

    </table></td>
    <td width="792"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="9%" height="53" valign="middle" background="Images/location_bg.gif" align="center" >&nbsp;<img src="Images/point_location.gif" width="24" height="24"></td>
        <td width="91%" valign="middle" background="Images/location_bg.gif" class="daohang">&nbsp;您的位置：&nbsp;<a class=daohang href="../" target="_blank">网站首页</a>&gt;&gt;<a href="E_LeadMail.asp" class="daohang">县长信箱</a>&gt;&gt;查看信件</td>
      </tr>
    </table>
      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#E6D9A4">
        <tr class="TDtop">
          <td height="27" colspan="2" bgcolor="#FCFDEB" class="TDtop"><div align="center" class="top1">查看信件内容</div></td>
        </tr>
        <tr>
          <td width="14%" height="25" bgcolor="#FCFDEB"><div align="right" class="top1">来信日期：</div></td>
          <td width="86%" bgcolor="#FCFDEB"><%=year(rs("UpdateTime")) %>-<%=Month(rs("UpdateTime")) %>-<%=Day(rs("UpdateTime")) %></td>
        </tr>
        <tr>
          <td height="23" bgcolor="#FCFDEB"><div align="right" class="top1">您的姓名：</div></td>
          <td bgcolor="#FCFDEB"><%=trim(rs("YourName"))%></td>
        </tr>
        <tr>
          <td height="25" bgcolor="#FCFDEB"><div align="right" class="top1">联系邮箱：</div></td>
          <td bgcolor="#FCFDEB"><a class=middle href='mailto:<%=trim(rs("email"))%>'><%=trim(rs("email"))%></a></td>
        </tr>
        <tr>
          <td height="24" bgcolor="#FCFDEB"><div align="right" class="top1">联系电话：</div></td>
          <td bgcolor="#FCFDEB"><%=trim(rs("TelePhone"))%></td>
        </tr>
        <tr>
          <td height="24" bgcolor="#FCFDEB"><div align="right" class="top1">联系地址：</div></td>
          <td bgcolor="#FCFDEB"><%=trim(rs("Address"))%></td>
        </tr>
        <tr>
          <td height="24" bgcolor="#FCFDEB"><div align="right" class="top1">信件类型：</div></td>
          <td bgcolor="#FCFDEB"><%if rs("ClassID")=0 then%>
              <font color=red>不希望公开，希望回复到邮箱！</font>
              <%else%>
              <font color=red>可以公开</font>
              <%end if%></td>
        </tr>
        <tr>
          <td height="24" bgcolor="#FCFDEB"><div align="right" class="top1">信件标题：</div></td>
          <td bgcolor="#FCFDEB"><%=trim(rs("Topic"))%></td>
        </tr>
        <tr>
          <td height="59" bgcolor="#FCFDEB"><div align="right" class="top1">信件内容：</div></td>
          <td bgcolor="#FCFDEB"><%if rs("ClassID")=0 then%>
              <font color=red>*来信者不希望公开信件内容*</font>
              <%else%>
              <%=trim(rs("content"))%>
              <%end if%></td>
        </tr>
        <tr>
          <td height="27" bgcolor="#FCFDEB"><div align="right" class="top1">回信时间：</div></td>
          <td bgcolor="#FCFDEB"><%if trim(rs("ReplyContent"))<>"" then %>
              <%=trim(rs("ReplyTime"))%>
              <%else%>
              <font color=red >请耐心等待回复！</font>
              <%end if%>
          </td>
        </tr>
        <tr>
          <td height="55" bgcolor="#FCFDEB"><div align="right" class="top1">回信内容：</div></td>
          <td bgcolor="#FCFDEB"><%if trim(rs("ReplyContent"))<>"" then %>
              <%=trim(rs("ReplyContent"))%>
              <%else%>
              <font color=red >请耐心等待回复！</font>
              <%end if%>
          </td>
        </tr>
      </table></td>
  </tr>
</table>
<%
Rs.Close
Set Rs=Nothing
Conn.Close
Set Conn=Nothing
%>
<!--#include file="bottom.asp"-->
