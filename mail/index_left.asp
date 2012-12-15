<table width="190" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="190" height="1000" colspan="2" valign="top">
	
<table width="169" border="0" align="center" cellpadding="0" cellspacing="0">
	   <tr>
        <td height="6"></td>
      </tr>	
      <tr>
        <td><a href="E_board.asp" target="_blank"><img src="Images/annouce_1.gif" alt="更多公告" width="169" height="31" border="0" ></a></td>
      </tr>  
      <tr>
        <td background="images\list_bg.gif">
<DIV id=demoa style="OVERFLOW: hidden; WIDTH: 169px; HEIGHT: 140px"> 
<DIV id=demoa1>                 
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
<%
set rsb=server.CreateObject("ADODB.RecordSet") 
rsb.Source="select top 10 * from "& db_EC_Board_Table 
rsb.Open rsb.Source,conn,1,1
if Rsb.bof and Rsb.eof then 
Response.Write "<tr><td align=center>暂无公告</td></tr>" 
else 
Do While Not Rsb.Eof %>
   <tr>
    <td height="19" align="left" class="blacklink">
     ·<A HREF="E_Board_News.asp?ID=<%=rsb("ID")%>" class="middle" target="_blank"><%=CutStr(htmlencode4(rsb("title")),22)%></A>
    </td>    
   </tr>
<% 
rsb.movenext     
loop
end if  
rsb.close   
set rsb=nothing
%>    
</table> 
</div> 
<DIV id=demoa2></DIV>
</DIV>		  

<SCRIPT>				 
var speed2=60
demoa2.innerHTML=demoa1.innerHTML
function Marquee2(){
if(demoa2.offsetTop-demoa.scrollTop<=0)
demoa.scrollTop-=demoa1.offsetHeight
else{
demoa.scrollTop++
}
}
var MyMar2=setInterval(Marquee2,speed2)
demoa.onmouseover=function() {clearInterval(MyMar2)}
demoa.onmouseout=function() {MyMar2=setInterval(Marquee2,speed2)}
</script>

		</td>
      </tr>
      <tr>
        <td><img src="Images/list_bg2.gif" width="169" height="15" /></td>
      </tr>
    </table>
      <table width="169" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"></td>
        </tr>
        <tr>
          <td><img src="Images/hot_article.gif" width="169" height="29" /></td>
        </tr>
        <tr>
          <td background="images\list_bg.gif"><div align="center">
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" id="AutoNumber5" style="border-collapse: collapse">
              <% 
dim ii
ii = 0
Set Rs=Server.CreateObject("ADODB.RecordSet")
if DbType = "MSSQL" then
		Rs.Source="select top " & top_txt & " * from "& db_EC_News_Table &" where updatetime>'"& now()-30 &"' and checkked=1 order by click DESC"   '选择本月
else
		Rs.Source="select top " & top_txt & " * from "& db_EC_News_Table &" where (updatetime>now()-30) and checkked=1 order by click DESC"   '选择本月
End if
Rs.Open Rs.Source,conn,1,1
if Rs.bof and Rs.eof then 
	Response.Write "<tr><td align=center><br>暂 无 信 息<br><br></td></tr>" 
else 
	Do While Not Rs.Eof%>
              <tr>
                <td height="18"> ·
                  <a class="middle" href="E_ReadNews.asp?NewsID=<%=rs("NewsID")%>" title="<%=htmlencode4(rs("title"))%>" target="_blank" ><%=CutStr(htmlencode4(rs("title")),22)%></a> </td>
              </tr>
              <% ii = ii + 1
    if ii>top_txt-1 then exit do
	rs.movenext     
	loop
end if  
rs.close   
set rs=nothing%>
            </table>
          </div></td>
        </tr>
        <tr>
          <td><img src="Images/list_bg2.gif" width="169" height="15" /></td>
        </tr>
      </table>
      <table width="169" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="6"></td>
          </tr>
          <tr>
            <td><img src="Images/message.gif" width="169" height="29" /></td>
          </tr>
          <tr>
            <td background="images\list_bg.gif"><div align="center">
              <!--#include file="ReviewIndex.asp"-->
            </div></td>
          </tr>
          <tr>
            <td><img src="Images/list_bg2.gif" width="169" height="15" /></td>
          </tr>
      </table>
        <%if showvote="1" then%>
        <table width="169" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="6"></td>
          </tr>
          <tr>
            <td><img src="Images/Vote.gif" width="169" height="29" /></td>
          </tr>
          <tr>
            <td background="images\list_bg.gif"><table width="169" border="0" align="center" cellpadding="0" cellspacing="0">
              <%
		set rs=conn.execute("SELECT * FROM " & db_EC_Vote_Table & " where IsChecked=1") 
		if rs.eof then
		%>
              <tr>
                <td height="25" colspan="2">尚无任何投票调查</td>
              </tr>
              <%else%>
              <tr>
                <td height="25" colspan="2" valign="middle"><span class="vote_title"><%=rs("Title")%></span></td>
              </tr>
              <form action="E_Vote.asp" method="post" name="research" target="newwindow" id="research">
                <tr>
                  <td colspan="2"><div align="left">
                      <%
for i=1 to 8
	if rs("Select"&i)<>"" then
%>
                      <input style="border: 0" <%if i=1 then%>checked<%end if%> name="Options" type="radio" value="<%=i%>" />
                      <%=i%>.<%=rs("Select"&i)%><br />
                      <%	end if
next
%></td>
                </tr>
                <tr>
                  <td height="48" colspan="2" align="center"><input style="cursor:hand" type="submit" value="投它一票" id="submit1" name="submit1"  class="login_username"/>
                      <input onclick="javascript:vote()" type="button" value="查看结果" id="button1" name="button1" style="cursor:hand" class="login_username" /></td>
                </tr>
              </form>
              <%end if%>
            </table></td>
          </tr>
          <tr>
            <td><img src="Images/list_bg2.gif" width="169" height="15" /></td>
          </tr>
        </table>
        <%end if%>
      <% if showdata=1 then%>
      <table width="169" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"></td>
        </tr>
        <tr>
          <td><img src="Images/Tatol.gif" width="169" height="29" /></td>
        </tr>
        <tr>
          <td background="images\list_bg.gif"><div align="center">
            <table width="98%" height="118" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><div align="left">
                    <%								
		function gettipnum()
			dim tmprs
			tmprs=conn.execute("Select Count(NewsID) from "& db_EC_News_Table &" where checkked=1")
			gettipnum=tmprs(0)
			set tmprs=nothing
			if isnull(gettipnum) then gettipnum=0
		end function

		function todays()
			dim tmprs
			tmprs=conn.execute("Select count(NewsID) from "& db_EC_News_Table &" Where checkked=1 and year(updatetime)="& year(date()) &" and month(updatetime)="& month(date()) &" and day(updatetime)="& day(date()) &"")
			todays=tmprs(0)
			set tmprs=nothing
			if isnull(todays) then todays=0
		end function

		function getusernum()
			dim rs
			rs=ConnUser.execute("Select Count("& db_User_ID &") from "& db_User_Table &"")
			getusernum=rs(0)
			set rs=nothing
			if isnull(getusernum) then getusernum=0
		end function

		function getgg()
			dim rs
			if db_Sex_Select = "EChuang" then
				rs=ConnUser.execute("Select Count("& db_User_Id &") from "& db_User_Table &" where  "& db_User_Sex &"='男' ")
				getgg=rs(0)
				set rs=nothing
			else
				if db_Sex_Select = "Number" then
					rs=ConnUser.execute("Select Count("& db_User_Id &") from "& db_User_Table &" where  "& db_User_Sex &"=1")
					getgg=rs(0)
					set rs=nothing
				end if
			end if
			if isnull(getgg) then getgg=0
		end function

		function getmm()
			dim rs
			if db_Sex_Select = "EChuang" then
				rs=ConnUser.execute("Select Count("& db_User_Id &") from "& db_User_Table &" where  "& db_User_Sex &"='女' ")
				getmm=rs(0)
				set rs=nothing
			else
				if db_Sex_Select = "Number" then
					rs=ConnUser.execute("Select Count("& db_User_Id &") from "& db_User_Table &" where  "& db_User_Sex &"=0")
					getmm=rs(0)
					set rs=nothing
				end if
			end if
			if isnull(getmm) then getmm=0
		end function

		function getother()
			dim rs
			if db_Sex_Select = "EChuang" then
				rs=ConnUser.execute("Select Count("& db_User_ID &") from "& db_User_Table &" where  "& db_User_Sex &" = '保密' ")
				getother=rs(0)
				set rs=nothing
			else
				if db_Sex_Select = "Number" then
					rs=ConnUser.execute("Select Count("& db_User_ID &") from "& db_User_Table &" where  "& db_User_Sex &" <>1 and  "& db_User_Sex &"<>0 ")
					getother=rs(0)
					set rs=nothing
				end if
			end if
			if isnull(getother) then getother=0
		end function
		%>
                  &nbsp;&nbsp;○- 今日文章：<font color="red"><%=todays()%></font><br />
                  &nbsp;&nbsp;○- 文章总数：<font color="red"><%=gettipnum()%></font><br />
                  &nbsp;&nbsp;○- 会员总数：<font color="red"><%=getusernum()%></font><br />
                  <!--#include file="LastMember.asp" -->
                  <br />
                  <%if showcount=1 then%>
                  <script src="Cnt.asp"></script>
                  <!--#include file=zx.asp -->
                  <br />
                  &nbsp;&nbsp;○- 当前在线：<font color="red"><%=i%></font><br />
                  <%end if%>
                </div></td>
              </tr>
            </table>
          </div></td>
        </tr>
        <tr>
          <td><img src="Images/list_bg2.gif" width="169" height="15" /></td>
        </tr>
      </table>
      <%end if%>	  
      <%if showuser=1 then%>
      <table width="169" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="6"></td>
        </tr>
        <tr>
          <td><img src="Images/order.gif" width="169" height="29" /></td>
        </tr>
        <tr>
          <td background="images\list_bg.gif"><!--#include file="TopUser.asp" -->
<!--#include file="Topdep.asp" --></td>
        </tr>
        <tr>
          <td><img src="Images/list_bg2.gif" width="169" height="15" /></td>
        </tr>
      </table>
      <%end if%></td>
  </tr>
</table>
