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
          <td height="32"><img src="Images/havereply.gif" width="206" height="32"></td>
        </tr>
        <tr>
          <td height="44" align="left">
		  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" id="AutoNumber1" style="border-collapse: collapse">

            <%
Set Rsr=Server.CreateObject("ADODB.RecordSet")
Rsr.Source="Select Top 10 * From "& db_EC_Approve_Table &" where HaveReply=1 Order By ApproveID Desc"
Rsr.Open Rsr.Source,Conn,1,1
If Not rsr.eof then
Do While Not Rsr.EOF
Topic=trim(rsr("topic"))
DisplayTopic=mid(Topic,1,14)
%>
            <tr>
              <td width="100%" height="22" align="left"><div class="side_con"> ·<a  class="middle" href='E_ReadApprove.asp?ApproveID=<%=rsr("ApproveID")%>' target="_black"><%=htmlencode(DisplayTopic)%>...</a></div></td>
            </tr>
            <%
Rsr.Movenext
Loop
Rsr.Close
Set Rsr=Nothing
else
Response.Write "<tr><td height=25 colspan=4 bgcolor=ffffff align=center><font color=red>暂无已审事项</font></td></tr>"
End If
%>
          </table></td>
        </tr>
</table>