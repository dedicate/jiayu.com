<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<%
if not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("对不起，您的后台管理权限不够操作！")
	response.end
else
	if mailmanage="1" or (request.cookies(eChsys)("ManagePurview")="99999" and request.cookies(eChsys)("purview")="99999") then

	PageShowSize = 10            '每页显示多少个页
	MyPageSize   = 16          '每页显示多少条文章
		
	If Not IsNumeric(Request("page")) Or IsEmpty(Request("page")) Or Request("page") <=0 Then
		MyPage=1
	Else
		MyPage=Int(Abs(Request("page")))
	End if
	
	HaveReply=ChkRequest(Request("HaveReply"),0) '防注入
	set rs=server.CreateObject("ADODB.RecordSet")		
	if  LeadMailCheckShow=1 then
	    if  HaveReply="" then
		    rs.Source="Select * From "& db_EC_LeadMail_Table &"  order by LeadMailID Desc"
		else
		    rs.Source="Select * From "& db_EC_LeadMail_Table &"  Where  HaveReply="& HaveReply &" Order By LeadMailID Desc"
		end if
	else
	   	if  HaveReply="" then
		    rs.Source="Select * From "& db_EC_LeadMail_Table &"  Where Checked=0  order by LeadMailID Desc"
		else
		    rs.Source="Select * From "& db_EC_LeadMail_Table &"  Where Checked=0 and HaveReply="& HaveReply &" Order By LeadMailID Desc"
		end if
	  
	end if	
	rs.Open rs.Source,conn,1,1
	If Not rs.eof then
		rs.PageSize     = MyPageSize
		MaxPages        = rs.PageCount
		rs.absolutepage = MyPage
		total           = rs.RecordCount
		%>
<html><head>
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<title>嘉鱼县人民政府门户网站 - 县长信箱</title>
</head>
<body topmargin="0">

<div align="center">
<table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#FFDFBF" bgcolor="#FFFFFF" id="AutoNumber1" style="border-collapse: collapse">
<tr class="TDtop">
	<td colspan="8" height=25 class="TDtop" align="center">┊ <B>县长信箱</B> ┊ </td>
</tr>
<tr>

	
<form method="post" name="myform" action="Admin_LeadMail_Result.asp">
	<td colspan=8  align=center height=25>
        <span class=top1>信件查找：</span>
        <select name="HaveReply">
          <option value="0" selected>未回复</option>
          <option value="1">已回复</option>
        </select>

        &nbsp;
        <input type="text" name="keyword" class="login_username" onMouseOver ="this.style.backgroundColor='#F3EAD5'" onMouseOut ="this.style.backgroundColor='#FFFFFF'" size=20 value="请输入标题关键字"onfocus="if (value =='请输入标题关键字'){value =''}"onblur="if (value ==''){value='请输入标题关键字'}" maxlength="50">
      <input type="submit" name="Submit" value="搜 索" class="login_username" onMouseOver ="this.style.backgroundColor='#F3EAD5'" onMouseOut ="this.style.backgroundColor='#FFFFFF'" >
	</td>
</form>
</tr>
<tr>
	<td colspan=8  align=center height=25>共 <%=total%> 条，当前第 <%=Mypage%>/<%=Maxpages%> 页，每页 <%=MyPageSize%> 条</td>
</tr>
<tr class="TDtop1" align="center">
	<td width="4%">ID号</td>
	<td width="7%">是否公开</td>
	<td width="34%">信件标题</td>
	<td width="11%">信件日期</td>
	<td width="11%">回复领导</td>
	<td width="11%">处理状态</td>
	<td width="22%">操作</td>
</tr>
		<%
		for i=1 to rs.PageSize
			if not rs.EOF then
				topic=trim(rs("topic"))
				DisplayTopic=mid(Topic,1,25)
				%>
<form method="post" action="CheckLeadMail.asp">
<tr bgcolor=ffffff>
	<td align=center ><%=rs("LeadMailID")%></td>
	<td align=center><%if rs("ClassID")=0 then%><font color=red>不希望公开</font><%else%><font color=red>可以公开</font><%end if%></td>
	<td align="left"><a href='ShowLeadMail.asp?LeadMailID=<%=rs("LeadMailID")%>'><%=htmlencode(DisplayTopic)%>...</a></td>
	<td align=center><%=year(rs("UpdateTime")) %>-<%=Month(rs("UpdateTime")) %>-<%=Day(rs("UpdateTime")) %></td>
	<td align=center><%=trim(rs("zip"))%></td>
	<td align=center>
	
		         <%
				  IsReply=Rs("HaveReply")
			      select case IsReply
				  case 1 response.write("<a href='E_LeadMailList.asp?HaveReply="& IsReply &"'>已回复</a>")
				  case 0 response.write("<a href='E_LeadMailList.asp?HaveReply="& IsReply &"'><font color=red>未回复</font></a>")
				  end select
				 %>

	</td>
	<td align=center >
			<input type=hidden name="LeadMailID" value="<%=rs("LeadMailID")%>">
		<input type=hidden name="Checked" value="<%=rs("Checked")%>">
		<input type=submit value="<%if rs("Checked")=0 then%>通过<%else%>取消<%end if%>审核" class=button target=_blank title="按这个按钮<%if rs("Checked")=0 then%>通过<%else%>取消<%end if%>审核" >		
<a href=ShowLeadMail.asp?LeadMailID=<%=rs("LeadMailID")%> style="font-size: 9pt;  color: #000000; background-color: #ffffff; solid #FEEBE4" onMouseOver ="this.style.backgroundColor='#FEEBE4'" onMouseOut ="this.style.backgroundColor='#ffffff'">查看</a>		
		<a href=DelLeadMail.asp?LeadMailID=<%=rs("LeadMailID")%> style="font-size: 9pt;  color: #000000; background-color: #ffffff; solid #FEEBE4" onMouseOver ="this.style.backgroundColor='#FEEBE4'" onMouseOut ="this.style.backgroundColor='#ffffff'">删除</a>
	</td>
</tr>
</form>
				<%
				rs.MoveNext
			end if
		next
		%>
<tr>
	<td colspan=8  align=center height=25>共 <%=total%> 条，当前第 <%=Mypage%>/<%=Maxpages%> 页，每页 <%=MyPageSize%> 条 
		<%
		url="E_LeadMailList.asp?" 
		PageNextSize=int((MyPage-1)/PageShowSize)+1
		Pagetpage=int((total-1)/rs.PageSize)+1
		if PageNextSize >1 then
			PagePrev=PageShowSize*(PageNextSize-1)
			Response.write "<a class=black href='" & Url & "page=" & PagePrev & "' title='上" & PageShowSize & "页'>上一翻页</a> "
			Response.write "<a class=black href='" & Url & "page=1' title='第1页'>页首</a> "
		end if
		if MyPage-1 > 0 then
			Prev_Page = MyPage - 1
			Response.write "<a class=black href='" & Url & "page=" & Prev_Page & "' title='第" & Prev_Page & "页'>上一页</a> "
		end if
	
		if Maxpages>=PageNextSize*PageShowSize then
			PageSizeShow = PageShowSize
		Else
			PageSizeShow = Maxpages-PageShowSize*(PageNextSize-1)
		End if
		If PageSizeShow < 1 Then PageSizeShow = 1
		for PageCounterSize=1 to PageSizeShow
			PageLink = (PageCounterSize+PageNextSize*PageShowSize)-PageShowSize
			if PageLink <> MyPage Then
				Response.write "<a class=black href='" & Url & "page=" & PageLink & "'>[" & PageLink & "]</a> "
			else
				Response.Write "<B>["& PageLink &"]</B> "
			end if
			If PageLink = MaxPages Then Exit for
		Next
		if Mypage+1 <=Pagetpage  then
			Next_Page = MyPage + 1
			Response.write "<a class=black href='" & Url & "page=" & Next_Page & "' title='第" & Next_Page & "页'>下一页</A>"
		end if
		if MaxPages > PageShowSize*PageNextSize then
			PageNext = PageShowSize * PageNextSize + 1
			Response.write " <A class=black href='" & Url & "page=" & Pagetpage & "' title='第"& Pagetpage &"页'>页尾</A>"
			Response.write " <a class=black href='" & Url & "page=" & PageNext & "' title='下" & PageShowSize & "页'>下一翻页</a>"
		End if
		rs.close
		set rs=nothing
		conn.close
		set conn=nothing
		%>
	</td>
</tr>
</table>
</div>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->
	<%else
		Show_Message("暂时没有需要审核的信件")
		response.end
	end if
	else
		Show_Err("对不起，该功能已经被超级系统管理员关闭，您没有权限操作！")
		response.end
	end if
end if%>