<!--#include file="Conn.ASP"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->
<!--#include file="ChkURL.asp"-->
<%dim jingyong
set rs=server.createobject("adodb.recordset")
sql="select * from "& db_User_Table &" where  "& db_User_Name &"='"&Request.cookies(eChsys)("username")&"'"
rs.open sql,ConnUser,1,3
if rs.bof or rs.eof then
	response.redirect "login.asp"
	response.end
end if
jingyong=rs("jingyong")
rs.close
set rs=nothing
if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="check" or Request.cookies(eChsys)("KEY")="bigmaster" or Request.cookies(eChsys)("KEY")="smallmaster" or Request.cookies(eChsys)("KEY")="typemaster" or (Request.cookies(eChsys)("key")="selfreg" and jingyong=0) then

%>
<%
request_E_BigClassID=checkstr(Request("E_BigClassID"))
keyword=trim(checkstr(Request("keyword")))


PageShowSize = 10	'ÿҳ��ʾ���ٸ�ҳ
MyPageSize   = 40	'ÿҳ��ʾ������
	
If Not IsNumeric(Request("page")) Or IsEmpty(Request("page")) Or Request("page") <=0 Then
	MyPage=1
Else
	MyPage=Int(Abs(Request("page")))
End if

if keyword="" or keyword="�ؼ���" then
	%>
	<script language=javascript>
		alert("�������ѯ�ؼ��֣�")
		history.back()
	</script>
	<body onload=javascript:window.close()></body> 
	<%
	Response.End
end if
if request("action")="" then
	findword="title like '%"&keyword&"%' or content like '%"&keyword&"%' or author like '%"&keyword&"%' or editor like '%"&keyword&"%' or about like '%"&keyword&"%'"
elseif request("action")="title" then
	findword="title like '%"&keyword&"%' "
elseif request("action")="content" then
	findword="content like '%"&keyword&"%' "
elseif request("action")="editor" then
	findword="editor like '%"&keyword&"%' or author like '%"&keyword&"%' "
elseif request("action")="about" then
	findword="about like '%"&keyword&"%' "
elseif request("action")="UpdateTime" then
	findword="UpdateTime like '%"&keyword&"%' "
end if 

set rs=server.CreateObject("ADODB.RecordSet")
sql1="select * from "& db_EC_Type_Table &" order by E_typeorder"
rs.Open sql1,conn,1,1

dim ArrayE_typeid(10000),ArrayE_typename(10000),Arraytypecontent(10000)
typeCount=rs.RecordCount
for i=1 to typeCount
	ArrayE_typeid(i)=rs("E_typeid")
	ArrayE_typename(i)=rs("E_typename")
	Arraytypecontent(i)=rs("typecontent")
	rs.MoveNext
next
rs.Close
%>
<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href="site.css" rel=stylesheet>
<title><%=copyright%><%=version%><%=ver%></title>
<script language="JavaScript">
<!--
function CheckAll(form)  {
  for (var i=0;i<form.elements.length;i++)    {
    var e = form.elements[i];
    if (e.name != 'chkall')       e.checked = form.chkall.checked; 
   }
  }
//-->
</script>
</head>
<body topmargin="0">

<div align="center">
<table border="1" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFDFBF" width="100%" id="AutoNumber1">
<tr> 
<td colspan=5 class="TDtop" height=25 align="center"> 
	�� <B>���¼���</B> �� <form method="post" name="myform" action="admin_Result.asp">
        <%if showsearch=1 then%>
        <%if search="1" then%>
        <!--#include file=admin_search.asp-->
        <%else%>
        <!--#include file=admin_search1.asp-->
        <%end if%>
        <%end if%>  </form>
      </td>
  
</tr>
<tr>
<td colspan="5" align=center height=25><a href="newsaddd1.asp">�������</a></td>
</tr>


<%set rs=server.CreateObject("ADODB.RecordSet")
if request_E_BigClassID<>"" then
	if Request.cookies(eChsys)("key")="" then
		key_word="select * from "& db_EC_News_Table &" where E_BigClassID=" & request_E_BigClassID &" and " & findword & " and checkked=1 and newslevel=0 order by NewsID DESC"
	end if
	if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
		key_word="select * from "& db_EC_News_Table &" where E_BigClassID=" & request_E_BigClassID &" and " & findword & " and checkked=1 order by NewsID DESC"
	end if
	if Request.cookies(eChsys)("key")="selfreg" then
		if Request.cookies(eChsys)("reglevel")=3 then
			key_word="select * from "& db_EC_News_Table &" where E_BigClassID=" & request_E_BigClassID &" and " & findword & " and checkked=1  order by NewsID DESC"
		end if
		if Request.cookies(eChsys)("reglevel")=2 then
			key_word="select * from "& db_EC_News_Table &" where E_BigClassID=" & request_E_BigClassID &" and " & findword & " and checkked=1  order by NewsID DESC"
		end if
		if Request.cookies(eChsys)("reglevel")=1 then
			key_word="select * from "& db_EC_News_Table &" where E_BigClassID=" & request_E_BigClassID &" and " & findword & " and checkked=1  order by NewsID DESC"
		end if
	end if
else
	if Request.cookies(eChsys)("key")="" then
		key_word="select * from "& db_EC_News_Table &" where " & findword & " and checkked=1 and newslevel=0 order by NewsID DESC"
	end if
	if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
		key_word="select * from "& db_EC_News_Table &" where " & findword & " and checkked=1 order by NewsID DESC"
	end if
	if Request.cookies(eChsys)("key")="selfreg" then
		if Request.cookies(eChsys)("reglevel")=3 then
			key_word="select * from "& db_EC_News_Table &" where " & findword & " and checkked=1 order by NewsID DESC"
		end if
		if Request.cookies(eChsys)("reglevel")=2 then
			key_word="select * from "& db_EC_News_Table &" where " & findword & " and checkked=1 order by NewsID DESC"
		end if
		if Request.cookies(eChsys)("reglevel")=1 then
			key_word="select * from "& db_EC_News_Table &" where " & findword & " and checkked=1 order by NewsID DESC"
		end if
	end if
end if
rs.Open key_word,conn,1,1
rs.PageSize=40
rs.CacheSize = RS.PageSize

for i=1 to rs.PageSize *( page-1)
	if not rs.EOF then
		rs.MoveNext
	end if
next
Response.Write "<tr><td colspan=5 width=100% height=25 align=center >&nbsp;"
if rs.EOF then
	Response.Write "<img src='images/Image24.gif' ></img><br><br>"
	Response.Write "<font color=red>��Ǹ��û����������ص����ϣ�</font>"
else
	rs.PageSize     = MyPageSize
	MaxPages         = rs.PageCount
	rs.absolutepage = MyPage
	total            = rs.RecordCount
	Response.Write "��������" & total & "��������ϣ���ǰ��"& myPage &"/"& MaxPages &"ҳ��ÿҳ"& rs.PageSize &"��"
end if
Response.Write "</td></tr>"
%>
	
		<tr align="center" class="TDtop1">
			<td width="4%">ID��</td>
			<td width="37%">�� &nbsp;&nbsp;&nbsp;��</td>
			<td width="10%">״̬</td>
			<td width="8%">�༭</td>
			<td width="4%">ѡ��</td>
		</tr>
	<form action="MyNews.asp?action=del" method=post name=check>
	<%do while not rs.eof %>
	<tr bgcolor=ffffff height="20"><%
		title=htmlencode4(trim(rs("title")))
		dim E_BigClassID
		E_BigClassID=rs("E_BigClassID")
		If Not(Trim(E_BigClassID)="" OR IsNull(E_BigClassID) OR IsEmpty(E_BigClassID)) Then
			set rs11=server.CreateObject("ADODB.RecordSet")
			rs11.Source="select * from "& db_EC_BigClass_Table &" where E_BigClassID="& E_BigClassID
			rs11.Open rs11.Source,conn,1,1
			E_typeid=rs11("E_typeid")
			rs11.Close
		End if

		dim mode
		If Not(Trim(E_typeid)="" OR IsNull(E_typeid) OR IsEmpty(E_typeid)) Then
			set rs12=server.CreateObject("ADODB.RecordSet")
			rs12.Source="select * from "& db_EC_Type_Table &" where E_typeid="& E_typeid
			rs12.Open rs12.Source,conn,1,1
			mode=rs12("mode")
			rs12.Close
		End if
		%>
	<td width=4% align=center ><%=rs("NewsID")%></td>
	<td width=37% >
				<%if mode="2" then%>
		         <%end if%>
				<a class=middle href="E_ReadNews.asp?NewsID=<%=rs("NewsID")%>" target=_blank title="<%=title%>">
		<font color="<%=rs("titlecolor")%>">
	    <%=rs("title")%>
		</font></a> (<%=rs("UpdateTime")%>)[<font color="#ff0000"><%=rs("click")%></font>]</td>
	<td width=10% align=center ><%if rs("checkked")<>1 then%>δ��<%else%>����<%end if%>��<%if rs("goodnews")<>1 then%>δ��<%else%>�Ѽ�<%end if%>��<%if rs("istop")<>1 then%>δ��<%else%>�ѹ�<%end if%></td>
	<td width=8% align=center ><a href="E_NewsEdit.asp?NewsID=<%=rs("NewsID")%>">�༭</a></td>
	<td width="4%" align=center><input name="selectdel" type="checkbox" id="selectdel" value=<%=rs("NewsID")%>>	</td>
	</tr>
	<%
	rs.MoveNext
	i = i + 1
	loop
	%>
	</form>

	<tr> 
	<td colspan="5" width="100%" align=center>�� <%=Mypage%>/<%=Maxpages%> ҳ��ÿҳ <%=MyPageSize%> �� 
	<%
	url="admin_Result.asp?action="&request("action")&"&keyword=" & keyword
	PageNextSize=int((MyPage-1)/PageShowSize)+1
	Pagetpage=int((total-1)/rs.PageSize)+1

	if PageNextSize >1 then
		PagePrev=PageShowSize*(PageNextSize-1)
		Response.write "<a class=black href='" & Url & "&page=" & PagePrev & "' title='��" & PageShowSize & "ҳ'>��һ��ҳ</a> "
		Response.write "<a class=black href='" & Url & "&page=1' title='��1ҳ'>ҳ��</a> "
	end if
	if MyPage-1 > 0 then
		Prev_Page = MyPage - 1
		Response.write "<a class=black href='" & Url & "&page=" & Prev_Page & "' title='��" & Prev_Page & "ҳ'>��һҳ</a> "
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
				Response.write "<a class=black href='" & Url & "&page=" & PageLink & "'>[" & PageLink & "]</a> "
			else
				Response.Write "<B>["& PageLink &"]</B> "
			end if
			If PageLink = MaxPages Then Exit for
		Next

		if Mypage+1 <=Pagetpage  then
			Next_Page = MyPage + 1
			Response.write "<a class=black href='" & Url & "&page=" & Next_Page & "' title='��" & Next_Page & "ҳ'>��һҳ</A>"
		end if

		if MaxPages > PageShowSize*PageNextSize then
			PageNext = PageShowSize * PageNextSize + 1
			Response.write " <A class=black href='" & Url & "&page=" & Pagetpage & "' title='��"& Pagetpage &"ҳ'>ҳβ</A>"
			Response.write " <a class=black href='" & Url & "&page=" & PageNext & "' title='��" & PageShowSize & "ҳ'>��һ��ҳ</a>"
		
	end if
	rs.close					
	%>
</td>
</tr>				

</table>
</div>
</body>
</html>
<!--#include file="Admin_Bottom.asp"-->
<%else%>
	<script language=javascript>
		history.back()
		alert("�Բ��𣬹���Ա��δ��ͨ�����ʺţ����Ժ�")
	</script>
<%end if%>
