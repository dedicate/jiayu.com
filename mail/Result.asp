<%@ Language=VBScript%>
<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="function.asp"-->

<%
request_E_BigClassID=checkstr(Request("E_BigClassID"))
keyword=trim(checkstr(Request("keyword")))


PageShowSize = 10	'ÿҳ��ʾ���ٸ�ҳ
MyPageSize   = 20	'ÿҳ��ʾ������
	
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
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�ؼ��֣�<%=keyword%>__��[<%=Request("action")%>]__����__<%=eChSys%></title>
<LINK href=homestyle.css rel=stylesheet>
</head>
<BODY ONLOAD="newCalendar()" OnUnload="window.returnValue = document.all.ret.value;"> 
<!--#include file="Top.asp"-->
<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
	<td width="210" height="161" valign="top" background="Images/l_b.gif">
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" background="images/echsys_class_bg.gif" class="white_title" align="center">&nbsp;&nbsp;��������</td>
  </tr>
  <tr> 
	<td>
<br>
<STYLE TYPE="text/css"> 
.today {font-weight:bold;BACKGROUND: #6699cc} 
.satday{color:green} 
.sunday{color:red} 
.days {font-weight:bold} 
</STYLE>
<script language="JavaScript"> 
//�����·�,�������ʾӢ���·ݣ��޸������ע�� 
/*var months = new Array("January?, "February?, "March", 
"April", "May", "June", "July", "August", "September", 
"October", "November", "December");*/ 
var months = new Array("һ��", "����", "����", 
"����", "����", "����", "����", "����", "����", 
"ʮ��", "ʮһ��", "ʮ����"); 
var daysInMonth = new Array(31, 28, 31, 30, 31, 30, 31, 31, 
30, 31, 30, 31); 
//������ �������ʾ Ӣ�ĵģ��޸������ע�� 
/*var days = new Array("Sunday", "Monday", "Tuesday", 
"Wednesday", "Thursday", "Friday", "Saturday");*/ 
var days = new Array("��","һ", "��", "��", 
"��", "��", "��"); 
function getDays(month, year) { 
//�������δ������жϵ�ǰ�Ƿ�������� 
if (1 == month) 
return ((0 == year % 4) && (0 != (year % 100))) || 
(0 == year % 400) ? 29 : 28; 
else 
return daysInMonth[month]; 
} 

function getToday() { 
//�õ��������,��,�� 
this.now = new Date(); 
this.year = this.now.getFullYear(); 
this.month = this.now.getMonth(); 
this.day = this.now.getDate(); 
} 

today = new getToday(); 

function newCalendar() { 

today = new getToday(); 
var parseYear = parseInt(document.all.year 
[document.all.year.selectedIndex].text); 
var newCal = new Date(parseYear, 
document.all.month.selectedIndex, 1); 
var day = -1; 
var startDay = newCal.getDay(); 
var daily = 0; 
if ((today.year == newCal.getFullYear()) &&(today.month == newCal.getMonth())) 
day = today.day; 
var tableCal = document.all.calendar.tBodies.dayList; 
var intDaysInMonth =getDays(newCal.getMonth(), newCal.getFullYear()); 
for (var intWeek = 0; intWeek < tableCal.rows.length;intWeek++) 
for (var intDay = 0;intDay < tableCal.rows[intWeek].cells.length;intDay++) 
{ 
var cell = tableCal.rows[intWeek].cells[intDay]; 
if ((intDay == startDay) && (0 == daily)) 
daily = 1; 
if(day==daily) 
//���죬���ý����Class 
cell.className = "today"; 
else if(intDay==6) 
//���� 
cell.className = "sunday"; 
else if (intDay==0) 
//���� 
cell.className ="satday"; 
else 
//ƽ�� 
cell.className="normal"; 

if ((daily > 0) && (daily <= intDaysInMonth)) 
{ 
cell.innerText = daily; 
daily++; 
} 
else 
cell.innerText = ""; 
} 
} 

function getDate() { 
var sDate; 
//��δ��봦������������ 
if ("TD" == event.srcElement.tagName) 
if ("" != event.srcElement.innerText) 
{ 
sDate = document.all.year.value + "��" + document.all.month.value + "��" + event.srcElement.innerText + "��"; 
//alert(sDate); 
window.open ("Result.asp?keyword="+document.all.year.value+"-"+document.all.month.value+"-"+event.srcElement.innerText+"&action=UpdateTime") 
} 
} 
			</script>
			<input type="hidden" name="ret">
			<table id="calendar" border="0" cellpadding="3" cellspacing="0" align="center">
			<thead>
			<tr>
				<TD COLSPAN=7 ALIGN=CENTER>
<SELECT ID="month" ONCHANGE="newCalendar()"> 
	<SCRIPT LANGUAGE="JavaScript"> 
	for (var intLoop = 0; intLoop < months.length; 
	intLoop++) 
	document.write("<OPTION VALUE= " + (intLoop + 1) + " " + 
	(today.month == intLoop ? 
	"Selected" : "") + ">" + 
	months[intLoop]); 
	</SCRIPT> 
</SELECT>

<SELECT ID="year" ONCHANGE="newCalendar()"> 
	<SCRIPT LANGUAGE="JavaScript"> 
	for (var intLoop = today.year-50; intLoop < (today.year + 10); 
	intLoop++) 
	document.write("<OPTION VALUE= " + intLoop + " " + 
	(today.year == intLoop ? 
	"Selected" : "") + ">" + 
	intLoop); 
	</script>
</select>
<br><br>					</td>
				</tr>
				<tr class="days"> 
<script language="JavaScript"> 
document.write("<TD class=satday>" + days[0] + "</TD>"); 
for (var intLoop = 1; intLoop < days.length-1; 
intLoop++) 
document.write("<TD>" + days[intLoop] + "</TD>"); 
document.write("<TD class=sunday>" + days[intLoop] + "</TD>"); 
</script>
				</tr>
			  </thead>
				<tbody border=1 cellspacing="0" cellpadding="0" id="dayList"align=CENTER onClick="getDate()">
<script language="JavaScript"> 
for (var intWeeks = 0; intWeeks < 6; intWeeks++) { 
document.write("<TR style='cursor:hand'>"); 
for (var intDays = 0; intDays < days.length; 
intDays++) 
document.write("<TD></TD>"); 
document.write("</TR>"); 
} 
</script></tbody>
</table>
		 </td>
  </tr>
     </table>
	</td>
	<td width="792" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="25" background="images/dh_bg.gif" class="daohang">
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="daohang" href="./" > ��վ��ҳ</a>&gt;&gt;����>>�ؼ��֣�<%=keyword%>
				  </td>
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
rs.PageSize=20
rs.CacheSize = RS.PageSize

for i=1 to rs.PageSize *( page-1)
	if not rs.EOF then
		rs.MoveNext
	end if
next
Response.Write "<tr><td  width=100% height=25 align=center >&nbsp;"
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
If Not rs.eof then
	i = 0
	do until rs.Eof or i = rs.PageSize
		if rs("picname")<>"" then
			img="<font color=red>[ͼ]</font>"
		else
			img=""
		end if
		%>
		<%
		title=htmlencode4(trim(rs("title")))
		dim E_BigClassID
		E_BigClassID=rs("E_BigClassID")
		set rs11=server.CreateObject("ADODB.RecordSet")
		rs11.Source="select * from "& db_EC_BigClass_Table &" where E_BigClassID="&E_BigClassID&""
		rs11.Open rs11.Source,conn,1,1
		E_typeid=rs11("E_typeid")
		rs11.Close
		dim mode
		set rs12=server.CreateObject("ADODB.RecordSet")
		rs12.Source="select * from "& db_EC_Type_Table &" where E_typeid="&E_typeid&""
		rs12.Open rs12.Source,conn,1,1
		mode=rs12("mode")
		rs12.Close
		%>
		<tr><td height="24"><div class="side_con">
		&nbsp;��
		<%if mode="2" then%>
		<%=img%>
		<%end if%>
		<a class=middle href="E_ReadNews.asp?NewsID=<%=rs("NewsID")%>" target=_blank title="<%=title%>">
		<font color="<%=rs("titlecolor")%>">
	    <%=CutStr(title,46)%>
		</font></a> <font class=middle>(<%=rs("UpdateTime")%>)[<font color="#ff0000"><%=rs("click")%></font>]</font></div></td></tr>	
		<%
		rs.MoveNext
		i = i + 1
	loop
	%>
							<tr> 
								<td width="100%" align=center>�� <%=Mypage%>/<%=Maxpages%> ҳ��ÿҳ <%=MyPageSize%> �� 
	<%
	url="Result.asp?action="&request("action")&"&keyword=" & keyword
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
		End if
	end if
	rs.close					
	%>
								</td>
							</tr>
	  </table>
	</td>
</tr>
</table>
<!--#include file="bottom.asp"-->
