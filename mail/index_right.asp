<table width="227" height="349" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table width="227" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><img src="Images/echsys_gov_09.gif" width="227" height="38" /></td>
      </tr>
      <tr>
        <td height="70" align="center">
		<table width="227" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <%if Request.cookies(eChsys)("username")="" then%>
            <%
		Function getcode1()
			Dim test
			On Error Resume Next
			Set test=Server.CreateObject("Adodb.Stream")
			Set test=Nothing
			If Err Then
				Dim zNum
				Randomize timer
				zNum = cint(8999*Rnd+1000)
				Session("verifycode") = zNum
				getcode1= Session("verifycode")		
			Else
				getcode1= "<img src=""getcode.asp"">"		
			End If
		End Function
		%>
            <td width="227" height="24" align="center">
			<form action="ChkLogin.asp" method="post" name="UserLogin" class="login" id="UserLogin" onsubmit="return CheckFormUserLogin();">
            <span align="center" valign="middle" class="login_user">用户：</span>
              <input name="UserName" size="12" class="login_username" onmouseover ="this.style.backgroundColor='#F3EAD5'" onmouseout ="this.style.backgroundColor='#FFFFFF'" />
              <br />
              <span align="center" valign="middle" class="login_user">密码：</span>
              <input type="password" name="Passwd" size="12" class="login_username" onmouseover ="this.style.backgroundColor='#F3EAD5'" onmouseout ="this.style.backgroundColor='#FFFFFF'" />
              <br />
              <span align="center" valign="middle" class="login_user">
                验码：</span>
              <input type="text" name="verifycode" size="5" class="login_username" onmouseover ="this.style.backgroundColor='#F3EAD5'" onmouseout ="this.style.backgroundColor='#FFFFFF'" />
              <span><%=getcode1()%></span><br />
              <input type="submit" name="Submit" value="登录"  class="login_username" onmouseover ="this.style.backgroundColor='#F3EAD5'" onmouseout ="this.style.backgroundColor='#FFFFFF'" title="登录系统" />
              <%if reg=1 then%>
              &nbsp;
              <input type="button" name="Submit2" value="注册" class="login_username" onmouseover ="this.style.backgroundColor='#F3EAD5'" onmouseout ="this.style.backgroundColor='#FFFFFF'" onclick="javascript:adduser()" title="注册新会员" />
              <%end if%>
              &nbsp;
              <input type="button" name="Submit2" value="忘密" class="login_username" onmouseover ="this.style.backgroundColor='#F3EAD5'" onmouseout ="this.style.backgroundColor='#FFFFFF'" onclick="javascript:getpwd()" title="忘记密码了？" />
            </form></td>
			</tr>
            <%else%>
			<tr>
            <td height="24"><span align="center" valign="middle" style="font-size: 9pt;color: #000000"> 欢迎：<b><%=Request.cookies(eChsys)("UserName")%></b>&nbsp;&nbsp;</span>
                <%if db_Birthday_Select="EChuang" then		'性别字段是原E创字段%>
                <%=Request.cookies(eChsys)("sex")%>
                <%else
				if db_Birthday_Select="Text" then		'性别字段是BBS的文本型阿拉伯数字
					if Request.cookies(eChsys)("sex")=1 then%>
              男
              <%else
						if Request.cookies(eChsys)("sex")=0 then%>
              女
              <%else%>
              保密
              <%end if
					end if
				end if
			end if%>
              <br />
              您的权限：
              <%if Request.cookies(eChsys)("KEY")="super" and Request.cookies(eChsys)("purview")="99999" then%>
              <font color="#ff0000">超级管理员</font>
              <%end if%>
              <%if Request.cookies(eChsys)("KEY")="super" and Request.cookies(eChsys)("purview")<>"99999" then%>
              <font color="#ff0000">系统管理员</font>
              <%end if%>
              <%if Request.cookies(eChsys)("KEY")="check" then%>
              <font color="#ff0000">文章审核员</font>
              <%end if%>
              <%if Request.cookies(eChsys)("KEY")="selfreg" then%>
              <font color="#ff0000">注册用户</font>
              <%end if%>
              <%if Request.cookies(eChsys)("KEY")="smallmaster" then%>
              <font color="#ff0000">小类管理员</font>
              <%end if%>
              <%if Request.cookies(eChsys)("KEY")="bigmaster" then%>
              <font color="#ff0000">大类管理员</font>
              <%end if%>
              <%if Request.cookies(eChsys)("KEY")="typemaster" then%>
              <font color="#ff0000">总栏管理员</font>
              <%end if%>
              <br />
              您的等级：
              <%if Request.cookies(eChsys)("KEY")<>"selfreg" then%>
              <font color="#ff0000">内部成员</font>
              <%end if%>
              <%if Request.cookies(eChsys)("KEY")="selfreg" and Request.cookies(eChsys)("reglevel")="1" then%>
              <font color="red">普通</font>
              <%end if%>
              <%if Request.cookies(eChsys)("KEY")="selfreg" and Request.cookies(eChsys)("reglevel")="2" then%>
              <font color="red">高级</font>
              <%end if%>
              <%if Request.cookies(eChsys)("KEY")="selfreg" and Request.cookies(eChsys)("reglevel")="3" then%>
              <font color="red">特级</font>
              <%end if%>
              <br />
              <a href="admin_index.asp" class="my">[发文入口]</a>&nbsp;<a href="Exit.asp" class="my">[退出登录]</a>&nbsp;<a href="bloguser.asp?user=<%=Request.cookies(eChsys)("UserName")%>" class="my">[我的博客]</a></span> </td>
            <%end if%>
          </tr>
        </table></td>
      </tr>
    </table>
      <table width="227" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><a href="E_board.asp"><img src="Images/echsys_gov_18.gif" width="227" height="37" border="0" /></a></td>
        </tr>
        <tr>
          <td height="117" align="center">
		 <DIV id=demoa style="OVERFLOW: hidden; WIDTH: 210px; HEIGHT: 100px"> 
<DIV id=demoa1>                 
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
<%
set rsb=server.CreateObject("ADODB.RecordSet") 
rsb.Source="select top 6 * from "& db_EC_Board_Table 
rsb.Open rsb.Source,conn,1,1
if Rsb.bof and Rsb.eof then 
Response.Write "<tr><td align=center>暂无公告</td></tr>" 
else 
Do While Not Rsb.Eof %>
   <tr>
    <td height="19" align="left" class="blacklink">
     ·<A HREF="E_Board_News.asp?ID=<%=rsb("ID")%>" class="middle" target="_blank"><%=CutStr(htmlencode4(rsb("title")),24)%></A>
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
      </table>
      <table width="227" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="Images/echsys_gov_21.gif" width="227" height="37" /></td>
        </tr>
        <tr>
          <td height="80" align="center"><form action="Result.asp" method="post" name="myform" target="newwindow" class="login" id="myform">
            <%if showsearch="1" then%>
            <%if search=1 then%>
            <!--#include file="E_Search.asp"-->
            <%else%>
            <!--#include file="E_Search1.asp"-->
            <%end if%>
            <%end if%>
          </form></td>
        </tr>
      </table>
      <table width="227" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="Images/echsys_gov_27.gif" width="227" height="37" /></td>
        </tr>
        <tr>
          <td height="205" align="center"><table width="206" border="0" cellpadding="0" cellspacing="2">
            <tr>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=21" class="middle">行政区划</a></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=22" class="middle">自然地理</a></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=23" class="middle">历史沿革</a></div></td>
            </tr>
            <tr>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=24" class="middle">人口民族</a></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=25" class="middle">岭城经济</a></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=26" class="middle">岭城教育</a></div></td>
            </tr>
            <tr>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=27" class="middle">岭城科技</a></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=28" class="middle">岭城文化</a></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=29" class="middle">市容市貌</a></div></td>
            </tr>
            <tr>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=30" class="middle">岭城交通</a></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=31" class="middle">风景名胜</a></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=32" class="middle">历史名人</a></div></td>
            </tr>
            <tr>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=33" class="middle">图说岭城</a></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=34" class="middle">视频岭城</a></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=35" class="middle">岭城年鉴</a></div></td>
            </tr>
            <tr>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=36" class="middle">电子地图</a></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=37" class="middle">岭城市志</a></div>
                  <div align="center"></div></td>
              <td width="70" height="30" bgcolor="#FFFFFF"><div align="center">·<a href="E_BigClass.asp?E_typeid=13&amp;E_BigClassID=38" class="middle">更多概况</a></div></td>
            </tr>
          </table></td>
        </tr>
      </table>
      <table width="227" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="Images/echsys_gov_33.gif" width="227" height="36" /></td>
        </tr>
        <tr>
          <td height="345" align="center" valign="top"><table width="227" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="227" height="34" background="Images/echsys_gov_dh.gif">&nbsp;&nbsp;&nbsp;&nbsp;网上招标公告</td>
            </tr>
            <tr>
              <td height="84" align="center"><table width="95%" height="23" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="17"><script src="news.asp?E_SmallClass.asp?E_typeid=7&E_BigClassID=39&E_SmallClassID=2&shu=4&title=46&time=1&click=0"></script></td>
                </tr>
              </table></td>
            </tr>
          </table>
            <table width="227" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="227" height="34" background="Images/echsys_gov_dh.gif">&nbsp;&nbsp;&nbsp;&nbsp;中标单位</td>
              </tr>
              <tr>
                <td height="84" align="center"><table width="95%" height="23" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="17"><script src="news.asp?E_SmallClass.asp?E_typeid=7&E_BigClassID=39&E_SmallClassID=3&shu=4&title=46&time=1&click=0"></script></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <table width="227" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="227" height="34" background="Images/echsys_gov_dh.gif">&nbsp;&nbsp;&nbsp;&nbsp;采购政策</td>
              </tr>
              <tr>
                <td height="84" align="center"><table width="95%" height="23" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="17"><script src="news.asp?E_SmallClass.asp?E_typeid=7&E_BigClassID=39&E_SmallClassID=4&shu=4&title=46&time=1&click=0"></script></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <table width="227" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="Images/echsys_gov_39.gif" width="227" height="37" /></td>
        </tr>
        <tr>
          <td height="219" align="center" valign="top"><!--#include file="ReviewIndex.asp"--></td>
        </tr>
      </table>
      <table width="227" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="Images/echsys_gov_61.gif" width="227" height="38" /></td>
        </tr>
        <tr>
          <td height="191"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
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
      </table></td>
  </tr>
</table>
