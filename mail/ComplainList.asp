<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkManage.asp" -->
<%
if not(request.cookies(eChsys)("ManageKEY")="super" or request.cookies(eChsys)("ManageKEY")="typemaster" or request.cookies(eChsys)("ManageKEY")="bigmaster") then
	Show_Err("�Բ������ĺ�̨����Ȩ�޲���������")
	response.end
else
	if Complainmanage="1" or (request.cookies(eChsys)("ManagePurview")="99999" and request.cookies(eChsys)("purview")="99999") then

	PageShowSize = 10            'ÿҳ��ʾ���ٸ�ҳ
	MyPageSize   = 16          'ÿҳ��ʾ����������
		
	If Not IsNumeric(Request("page")) Or IsEmpty(Request("page")) Or Request("page") <=0 Then
		MyPage=1
	Else
		MyPage=Int(Abs(Request("page")))
	End if
	
	set rs=server.CreateObject("ADODB.RecordSet")
	rs.Source="select * from "& db_EC_Complain_Table &" where ClassID is not null and ClassID < 1 order by ComplainID desc"	
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
<title><%=copyright%><%=version%>&nbsp;<%=ver%> - Ͷ�߾ٱ�����</title>
</head>
<body topmargin="0">

<div align="center">
<table width="100%" border="1" cellpadding="3" cellspacing="0" bordercolor="#FFDFBF" bgcolor="#FFFFFF" id="AutoNumber1" style="border-collapse: collapse">
<tr class="TDtop">
	<td colspan="8" height=25 class="TDtop" align="center">�� <B>Ͷ�߾ٱ�����</B> �� </td>
</tr>
<tr>
<form method="post" name="myform" action="Admin_Complain_Result.asp">
	<td colspan=8  align=center height=25>
        <span class=top1>Ͷ�߾ٱ����ң�</span>
        <input type="text" name="keyword" class="login_username" onMouseOver ="this.style.backgroundColor='#F3EAD5'" onMouseOut ="this.style.backgroundColor='#FFFFFF'" size=20 value="���������ؼ���"onfocus="if (value =='���������ؼ���'){value =''}"onblur="if (value ==''){value='���������ؼ���'}" maxlength="50">
      <input type="submit" name="Submit" value="�� ��" class="login_username" onMouseOver ="this.style.backgroundColor='#F3EAD5'" onMouseOut ="this.style.backgroundColor='#FFFFFF'" >
	</td>
</form>
</tr>
<tr>
	<td colspan=8  align=center height=25>�� <%=total%> ������ǰ�� <%=Mypage%>/<%=Maxpages%> ҳ��ÿҳ <%=MyPageSize%> ��</td>
</tr>
<tr class="TDtop1" align="center">
	<td width="7%">ID��</td>
	<td width="9%">����</td>
	<td width="46%">����</td>
	<td width="14%">����</td>
	<td width="12%">����</td>		
	<td width="12%">����</td>
</tr>
		<%
		for i=1 to rs.PageSize
			if not rs.EOF then
				topic=trim(rs("topic"))
				DisplayTopic=mid(Topic,1,25)
				%>
<tr bgcolor=ffffff>
	<td align=center ><%=rs("ComplainID")%></td>
	<td align=center><%if rs("ClassID")=0 then%><font color=red>�ٱ�</font><%else%><font color=red>Ͷ��</font><%end if%></td>
	<td align="left"><a href='ShowComplain.asp?ComplainID=<%=rs("ComplainID")%>'><%=htmlencode(DisplayTopic)%>...</a></td>
	<td align=center><a href='mailto:<%=trim(rs("email"))%>'><%=trim(rs("email"))%></a></td>
	<td align=center><%=year(rs("UpdateTime")) %>-<%=Month(rs("UpdateTime")) %>-<%=Day(rs("UpdateTime")) %></td>
	<td align=center >
		<a href=ShowComplain.asp?ComplainID=<%=rs("ComplainID")%> style="font-size: 9pt;  color: #000000; background-color: #ffffff; solid #FEEBE4" onMouseOver ="this.style.backgroundColor='#FEEBE4'" onMouseOut ="this.style.backgroundColor='#ffffff'">�鿴</a>		
		<a href=DelComplain.asp?ComplainID=<%=rs("ComplainID")%> style="font-size: 9pt;  color: #000000; background-color: #ffffff; solid #FEEBE4" onMouseOver ="this.style.backgroundColor='#FEEBE4'" onMouseOut ="this.style.backgroundColor='#ffffff'">ɾ��</a>
	</td>
</tr>
				<%
				rs.MoveNext
			end if
		next
		%>
<tr>
	<td colspan=8  align=center height=25>�� <%=total%> ������ǰ�� <%=Mypage%>/<%=Maxpages%> ҳ��ÿҳ <%=MyPageSize%> �� 
		<%
		url="ComplainList.asp?" 
		PageNextSize=int((MyPage-1)/PageShowSize)+1
		Pagetpage=int((total-1)/rs.PageSize)+1
		if PageNextSize >1 then
			PagePrev=PageShowSize*(PageNextSize-1)
			Response.write "<a class=black href='" & Url & "page=" & PagePrev & "' title='��" & PageShowSize & "ҳ'>��һ��ҳ</a> "
			Response.write "<a class=black href='" & Url & "page=1' title='��1ҳ'>ҳ��</a> "
		end if
		if MyPage-1 > 0 then
			Prev_Page = MyPage - 1
			Response.write "<a class=black href='" & Url & "page=" & Prev_Page & "' title='��" & Prev_Page & "ҳ'>��һҳ</a> "
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
			Response.write "<a class=black href='" & Url & "page=" & Next_Page & "' title='��" & Next_Page & "ҳ'>��һҳ</A>"
		end if
		if MaxPages > PageShowSize*PageNextSize then
			PageNext = PageShowSize * PageNextSize + 1
			Response.write " <A class=black href='" & Url & "page=" & Pagetpage & "' title='��"& Pagetpage &"ҳ'>ҳβ</A>"
			Response.write " <a class=black href='" & Url & "page=" & PageNext & "' title='��" & PageShowSize & "ҳ'>��һ��ҳ</a>"
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
		Show_Message("��ʱû��Ͷ�߾ٱ�")
		response.end
	end if
	else
		Show_Err("�Բ��𣬸ù����Ѿ�������ϵͳ����Ա�رգ���û��Ȩ�޲�����")
		response.end
	end if
end if%>