<%@ Language=VBScript%>
<!--#include file="conn.asp"-->
<!--#include file="config.asp" -->
<!--��#include file="char.inc"-->
<%
ReViewID=ChkRequest(Request.QueryString("ReViewID"),1)	'��ע��
newsID=Request.QueryString("newsID")

if ReViewID="" then
	Response.Write "<script>alert('δָ������');history.back()</script>"
	response.end
else
	if not IsNumeric(ReViewID) then
		response.write "<script>alert('�Ƿ�����');history.back()</script>"
		response.end
	else
		set rs=server.CreateObject("ADODB.RecordSet")
		rs.Source="select * from EC_Review where ReViewID=" & ReViewID & " order by reviewid desc"
		rs.Open rs.Source,conn,1,3
		if rs.EOF then  NoReview=1
			rs.close
			set rs=nothing
		end if
	end if
	%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��������_<%=eChSys%></title>
<LINK href=news.css rel=stylesheet>
</head>
<body topmargin="0">
<!--#include file="Top.asp"-->
  <table width="1002" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <form method="POST" action="AddReview.asp">
    <tr valign="top">
      <td rowspan="2"><center>
          <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
            <tr>
              <td height="25" background="IMAGES/dh_bg.gif" class="daohang" >&nbsp;&nbsp;&nbsp;<img src="Images/arrow_dh_1.gif" width="7" height="7">&nbsp;&nbsp;&nbsp;��Ŀ����<a class=daohang href="./" >&nbsp;</a>&nbsp;&nbsp;��ǰλ�ã�<a class="daohang" href="./" >��վ��ҳ</a>&gt;&gt;����</td>
            </tr>       
            <tr valign="top">
              <td><table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0" id="AutoNumber3" style="border-collapse: collapse">
                  <tr>
                    <td valign=top><table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                          <td width="100%" colspan="2"><%if NoReview then Response.Write "����Ϣ��ǰû���κ����ۣ�"%>
                          </td>
                        </tr>
                        <%
if not NoReview then
set rs=server.CreateObject("ADODB.RecordSet")
rs.Source="select * from EC_Review where ReViewID=" & ReViewID & " order by reviewid desc"
rs.Open rs.Source,conn,1,1

author=trim(rs("author"))
reviewip=rs("reviewip")
email=server.HTMLEncode(trim(rs("email")))
content=trim(rs("content"))
%>
                        <tr>
                          <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="efefef" style="table-layout:fixed; word-break:break-all">
                              <tr>
                                <td width="322">�����ˣ�<%=author%></td>
                                <td width="270"><p align="right">
                                    <%if Request.cookies(eChsys)("key")="super" or showip="1" then%>
                                  IP��<%=reviewip%>
                                  <%end if%>
                                  </td>
                              </tr>
                              <tr>
                                <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed; word-break:break-all">
                                    <tr>
                                      <td>�������ʼ���<a href='mailto:<%=email%>'><%=email%></a></td>
                                      <td align="right">����ʱ�䣺<%=rs("updatetime")%></td>
                                    </tr>
                                </table></td>
                              </tr>
                              <tr>
                                <td height="111" colspan="2" valign="top" bgcolor="#FFFFFF"><%=content%></td>
                              </tr>
                          </table></td>
                        </tr>
                        <%end if
				rs.close
				set rs=nothing%>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
            <tr valign="top">
              <td height="19">&nbsp;</td>
            </tr>
          </table>
      </center></td>
    </tr></form>
  </table>
<!--#include file="bottom.asp"-->
</body>
</html>