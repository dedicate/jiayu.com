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
if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="check" or Request.cookies(eChsys)("key")="checkdep" or Request.cookies(eChsys)("KEY")="bigmaster" or Request.cookies(eChsys)("KEY")="smallmaster" or Request.cookies(eChsys)("KEY")="typemaster" or (Request.cookies(eChsys)("key")="selfreg" and jingyong=0) then

%>
<%
keyword=trim(checkstr(Request("keyword")))
HaveReply=trim(checkstr(Request("HaveReply")))

PageShowSize = 10	'ÿҳ��ʾ���ٸ�ҳ
MyPageSize   = 20	'ÿҳ��ʾ������
	
If Not IsNumeric(Request("page")) Or IsEmpty(Request("page")) Or Request("page") <=0 Then
	MyPage=1
Else
	MyPage=Int(Abs(Request("page")))
End if

if keyword="" or  keyword="���������ؼ���" then
	%>
	<script language=javascript>
		alert("�������ѯ�ؼ��֣�")
		history.back()
	</script>
	<body onload=javascript:window.close()></body> 
	<%
	Response.End
end if

set rs=server.CreateObject("ADODB.RecordSet")
sql1="select * from "& db_EC_Approve_Table &" where topic like '%"&keyword&"%' and HaveReply="& HaveReply &" order by ApproveID DESC"
rs.Open sql1,conn,1,1

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

<table border="1" cellpadding="3" cellspacing="0"  bordercolor="<%=border%>" width="100%" id="AutoNumber1">
 <tr valign="top">
   <td width="100%" valign="top">
		<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="100%" height="25" align="center" class="TDtop"> <B>���������������</B> </td>
                </tr>
              </table>
                <table width="100%" height="300" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="300" valign="top">
                      <br>
                      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1"  class="TDtop1" >	
                        <tr class="TDtop1" align="center" height="25">
                          <td width="7%"  class="top1"><a href="E_ApproveList.asp" title="�����ʾ������������">����״̬</a></td>
						  <td width="10%" class="top1">���쵥λ</td>
                          <td width="43%" class="top1">�����������</td>
                          <td width="12%"  class="top1">�ύ����</td>
                        </tr>
<%		
if not rs.EOF then
rs.PageSize     = MyPageSize
MaxPages         = rs.PageCount
rs.absolutepage = MyPage
total            = rs.RecordCount
dim i
i = 1
do until rs.Eof or i = rs.PageSize
%> 
				<% 	topic=trim(rs("topic"))
				DisplayTopic=mid(Topic,1,28)
				%>
                <tr bgcolor=ffffff>
                 <td height="23" align=center  >
				<%
				select case HaveReply
				case 1 response.write("<a href='E_ApproveList.asp?HaveReply="& HaveReply &"'>�ѻظ�</a>")
				case 0 response.write("<a href='E_ApproveList.asp?HaveReply="& HaveReply &"'><font color=red>δ�ظ�</font></a>")
				end select
				%>
				</td>
							<td height="23" align=center>
					        <%=rs("UserName")%></td>
<td align="left">
��<a  class=middle href='ShowApprove.asp?ApproveID=<%=rs("ApproveID")%>'><%=htmlencode(DisplayTopic)%>...</a></td>
                            <td align=center><%=year(rs("UpdateTime")) %>-<%=Month(rs("UpdateTime")) %>-<%=Day(rs("UpdateTime")) %></td>
                          </tr>
					    <%
		rs.MoveNext
		i = i + 1
		loop
		%>
		<tr> 
	<td colspan="5" width="100%" align=center height=25 >�������� <%=total%> ������ǰ�� <%=Mypage%>/<%=Maxpages%> ҳ��ÿҳ <%=MyPageSize%> ��
	<%
	url="Admin_Approve_Result.asp?keyword=" & keyword
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
else
Response.write "<tr><td align=center bgcolor=#FCFDEB colspan=3 height=100><font color=red>�Բ���û���ҵ���Ҫ�������������</font></td></tr>"
Response.write "<tr><td align=center bgcolor=#ffffff colspan=4 height=30><a href='E_myApproveList.asp'>����</a></td></tr>"	End If
rs.close
set rs=nothing
%>
</td>
</tr>			
</table>

                      <br>
				    </td>
                  </tr>
                </table></td>
            </tr>
          </table>
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
