<!--#include file="function.asp"-->
<table width="206" height="117" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="33"><img src="Images/R_search.gif" width="205" height="59"></td>
  </tr>
  <tr>
    <td align="center"><form action="Result.asp" method="post" name="myform" target="newwindow" class="login" id="myform">
      <%if showsearch="1" then%>
      <%if search=1 then%>
      <!--#include file="E_Search_Other.asp" -->
      <%else%>
      <!--#include file="E_Search_Other1.asp" -->
      <%end if%>
      <%end if%>
    </form></td>
  </tr>
</table>
<table width="206" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="32"><img src="Images/news_hot.gif" width="206" height="32"></td>
        </tr>
<%
Set Rs_hot=Conn.Execute("select top 12 * from "& db_ec_news_table &"  order by click desc")
Do While Not Rs_hot.Eof
		newsurl="E_ReadNews.asp?NewsID=" & rs_hot("NewsID")
		newswwwurl=rs_hot("titleface")
		fileExt=lcase(getFileExtName(rs_hot("picname")))
%>
      <tr>
        <td height="20">
		¡¤<a class="middle" href="<%if rs_hot("titleface")="ÎÞ" then %><%=newsurl%><% else %> <%=newswwwurl%><%end if%>" title="<%=htmlencode4(rs_hot("title"))%>" target="_blank"> <font color="<%=rs_hot("titlecolor")%>"> <%=CutStr(htmlencode4(rs_hot("title")),26)%> </font> </a>
		</td>
      </tr>
<%
Rs_hot.Movenext
Loop
Rs_hot.Close
Set Rs_hot=Nothing	
%>
</table>