<%@ Language=VBScript%>
<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->
<!--#include file="function.asp"-->
<!--#include file="char.inc"-->
<%
E_typeid=checkstr(request("E_typeid"))
if E_typeid="" then
	Response.Write "<script>alert('δָ������');history.back()</script>"
	response.end
else
	if not IsNumeric(E_typeid) then
		response.write "<script>alert('�Ƿ�����');history.back()</script>"
		response.end
	else
		dim tE_typename
		set rs5=server.CreateObject("ADODB.RecordSet")
		rs5.Source="select * from "& db_EC_Type_Table &" where E_typeid=" & E_typeid &" order by E_typeorder"
		rs5.Open rs5.Source,conn,1,1
		tE_typename=rs5("E_typename")
		E_typeorder=rs5("E_typeorder")
		rs5.Close
		set rs5=nothing
		%>
		<%
		dim E_typeid
		E_typeid=checkstr(request("E_typeid"))
		set rs=server.CreateObject("ADODB.RecordSet")
		rs.Source="select * from "& db_EC_BigClass_Table &" where E_typeid="& E_typeid &" order by E_bigclassorder"
		rs.Open rs.Source,conn,1,1
		i=1
		Dim ArrayE_BigClassID(10000),ArrayE_BigClassName(10000),ArrayE_BigClassView(10000)
		if not rs.EOF then
			rseof=1
		end if
	end if
	while not rs.EOF
		abcount=rs.RecordCount
		E_BigClassView=rs("E_BigClassView")
		E_BigClassID=rs("E_BigClassID")
		
		E_BigClassName=trim(rs("E_BigClassName"))
		BigClasszs=rs("BigClasszs")
		
		ArrayE_BigClassView(i)=E_BigClassView
		ArrayE_BigClassID(i)=E_BigClassID
		ArrayE_BigClassName(i)=E_BigClassName

		i=i+1
		
		rs.MoveNext
	wend
	rs.close
	%>

<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><%=tE_typename%>__<%=eChSys%></title>
<LINK href="news.css" rel="stylesheet">
<noscript><iframe scr="*"></iframe></noscript>
<script language="JavaScript1.2">
<!--
function makevisible(cur,which){
if (which==0)
cur.filters.alpha.opacity=100
else
cur.filters.alpha.opacity=20
}

function MM_preloadImages() { //v3.0
var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<style type="text/css">
<!--
.STYLE1 {color: #FFFFFF}
-->
</style>
</head>
<body>
<%
dim E_typename
E_typeid=checkstr(request("E_typeid"))
set rs=server.CreateObject("ADODB.RecordSet")
rs.Source="select * from "& db_EC_Type_Table &" where E_typeid="& E_typeid &" order by E_typeorder"
rs.Open rs.Source,conn,1,1
mode=rs("mode")
E_typename=rs("E_typename")
rs.close
set rs=nothing%>
<!--#include file="Top.asp"-->

<table width="1002" height="500" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td height="25" colspan="2" background="Images/dh_bg.gif">&nbsp;&nbsp;&nbsp;<img src="Images/arrow_dh_1.gif" width="7" height="7">&nbsp;&nbsp;&nbsp;<font class=m_tittle>&nbsp;</font>��Ŀ����&nbsp;&nbsp;<a href="./" class="daohang">��վ��ҳ</a>&gt;&gt;<%=E_typename%></td>
    <td width="210" rowspan="2" align="center" valign="top" background="Images/r_b.gif"><!--#include file="other_right.asp"--></td>
  </tr>
  <tr>
    <td width="210" height="500" align="center" valign="top" background="Images/l_b.gif"><table width="99%" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr bordercolor="#999999">
        <td height="30" align="center" valign="middle" background="Images/red_bg.jpg"><font color="#ffffff" class="yellow_title">&nbsp;<%=E_typename%>������ <%=E_typeorder%></font> </td>
      </tr>
      <tr>
        <td height="231" valign="top">
		
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<%  
E_typeid=checkstr(request("E_typeid"))
Set Rs=Conn.Execute("SELECT * FROM "& db_EC_BigClass_Table &" where E_typeid="&E_typeid&" order by E_bigclassorder") 
Do While Not Rs.Eof
%>
  <tr>
    <td  height="32" align="center" valign="middle" background="Images/m_bg.gif" onMouseOver="background='Images/m_bg_1.gif'" onMouseout="background='Images/m_bg.gif'">
	<%If Rs("url")<>"" then%>
	 <a class=middle href="<%=Rs("Url")%>"><font color="#000000"><%=Rs("E_BigClassName")%></font> </a>   
	<%else%> 
 <a class=middle href="E_BigClass.asp?E_typeid=<%=E_typeid%>&E_BigClassID=<%=Rs("E_BigClassID")%>"><%=Rs("E_BigClassName")%></a>	
	<%end if%>
    </td>
  </tr>
<%
Rs.movenext   
Loop  
Rs.Close
%>
</table>
<table width="100%" height="25" border="0" cellpadding="0" cellspacing="0" id="AutoNumber4" style="border-collapse: collapse">
              <tr>
                <td height="30" align=center background="Images/red_bg.jpg"><span class="yellow_title">����ͼ��</span></td>
              </tr>
              <tr>
                <td width="100%" height="20" align=center><br>
                    <%
									set rs3=server.CreateObject("ADODB.RecordSet")
									if uselevel=1 then
										if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
											rs3.Source ="select top " & top_img & " * from "& db_EC_News_Table &" where picnews=1 and checkked=1 and E_typeid="&E_typeid&" and picname is not null order by NewsID DESC"
										end if
										if Request.cookies(eChsys)("key")="" then
											rs3.Source ="select top " & top_img & " * from "& db_EC_News_Table &" where picnews=1 and checkked=1  and E_typeid="&E_typeid&" and picname is not null order by NewsID DESC"
										end if
										if Request.cookies(eChsys)("key")="selfreg" then
											if Request.cookies(eChsys)("reglevel")=3 then
												rs3.Source ="select top " & top_img & " * from "& db_EC_News_Table &" where picnews=1 and checkked=1  and E_typeid="&E_typeid&" and picname is not null order by NewsID DESC"
											end if
											if Request.cookies(eChsys)("reglevel")=2 then
												rs3.Source ="select top " & top_img & " * from "& db_EC_News_Table &" where picnews=1 and checkked=1  and E_typeid="&E_typeid&" and picname is not null order by NewsID DESC"
											end if
											if Request.cookies(eChsys)("reglevel")=1 then
												rs3.Source ="select top " & top_img & " * from "& db_EC_News_Table &" where picnews=1 and checkked=1  and E_typeid="&E_typeid&" and picname is not null order by NewsID DESC"
											end if
										end if
									else
										rs3.Source ="select top " & top_img & " * from "& db_EC_News_Table &" where picnews=1 and checkked=1 and E_typeid="&E_typeid&" and picname is not null order by NewsID DESC"
									end if
									rs3.Open rs3.Source,conn,1,1
									if not rs3.EOF then
										while not rs3.EOF
											fileExt=lcase(getFileExtName(rs3("picname")))
											Content=htmlencode4(rs3("Content"))%>
                    <table width="90%" border="0" cellspacing="0" cellpadding="3" align="center" style="TABLE-LAYOUT: fixed">
                      <tr>
                        <td style="WORD-WRAP: break-word" align="center"><a class=middle href="E_ReadNews.asp?NewsID=<%=rs3("NewsID")%>" target=_blank title="<%=htmlencode4(rs3("title"))%>">
                          <%if fileext="jpg" or fileext="bmp" or fileext="png" or fileext="gif" then%>
                          <img  src="<%=FileUploadPath & rs3("picname")%>" width="80" height="80" border=0 align="center">
                          <%end if%>
                          <%if fileext="swf" then%>
                          <object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'  codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width="80" height="80" border=0 align="center">
                            <param name=movie value="<%=FileUploadPath & rs3("picname")%>">
                            <param name=quality value=high>
                            <param name='Play' value='-1'>
                            <param name='Loop' value='0'>
                            <param name='Menu' value='-1'>
                            <embed src="<%=FileUploadPath & rs3("picname")%>" width="80" height="80" border=0 align="center" pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash'></embed>
                          </object>
                          <%end if%>
                        </a> </td>
                      </tr>
                      <tr>
                        <td style="WORD-WRAP: break-word" align="center"><a class=middle href="E_ReadNews.asp?NewsID=<%=rs3("NewsID")%>" target=_blank title="<%=htmlencode4(rs3("title"))%>"><%=CutStr(htmlencode4(rs3("title")),24)%></a></td>
                      </tr>
                    </table>
                  <%
						rs3.MoveNext
						wend
						else
						Response.Write "<tr><td width=100% align=center height=18>����</td></tr>"
						end if
						rs3.close
						set rs3=nothing
						%>
                </td>
              </tr>
          </table></td>
      </tr>
    </table></td>
    <td width="582" height="500" rowspan="2" valign="top">	
          <!--�޴�����������ʼ-->
          <% select case mode%>
          <% case 1 %>
          <!--ͼƬģ��-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="93%" height="25" background="Images/dh_bg.gif">&nbsp;&nbsp;&nbsp;<img src="Images/arrow_dh_1.gif" width="7" height="7">&nbsp;&nbsp;<%=E_typename%>��[����]</td>
        <td width="7%" background="Images/dh_bg.gif"><a class=class href='E_NobigClass.asp?E_typeid=<%=E_typeid%>'><img src="images/more.gif" border="0" alt="����<%=E_typename%>"></a></td>
      </tr>
	</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<%
Row_Count=1
set rsnodigclass=server.CreateObject("ADODB.RecordSet")
			if uselevel=1 then		    
				if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
				rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="" then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="selfreg" then
					if Request.cookies(eChsys)("reglevel")=3 then
						rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
					end if
				if Request.cookies(eChsys)("reglevel")=2 then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("reglevel")=1 then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				
			end if
			else
			rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1) order by newsid DESC"
			end if
				rsnodigclass.Open rsnodigclass.Source,conn,1,1
				if not rsnodigclass.EOF then
				%>
                  <!--ͼƬ������ʾ1-->
                  <tr>
                    <%
					fileExt=lcase(getFileExtName(rsnodigclass("picname")))
					Content=htmlencode4(rsnodigclass("Content"))
					content=replace(content,"[---��ҳ---]","")
					%>
					<%do while not rsnodigclass.EOF%>
                   <td align=center valign="top" style="table-layout:fixed; word-break:break-all">
					<%if not rsnodigclass.EOF then%>
                        <div align="center">
                          <% content=htmlencode4(rsnodigclass("Content"))
					content=replace(content,"[---��ҳ---]","")%>
                         <br> <a class=middle href="E_ReadNews.asp?NewsID=<%=rsnodigclass("NewsID")%>" target=_blank title="<%=CutStr(nohtml(Content),150)%>...">
                          <%if   rsnodigclass("picname")="" then%>
                          <img  src="IMAGES/flashorno.gif" width="110" height="80" border=1 style="border-color:#000000 align=top">
                          <% else %>
                          <%if fileext="jpg" or fileext="bmp" or fileext="png" or fileext="gif" then%>
                          <img  src="<%=FileUploadPath & rsnodigclass("picname")%>" width="110" height="80" border="1" style="border-color:#000000 align=top">
                          <%end if%>
                          <%if fileext="swf" then%>
                          <object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'  codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width="110" height="80" border=0 >
                            <param name=movie value="<%=FileUploadPath & rsnodigclass("picname")%>">
                            <param name=quality value=high>
                            <param name='Play' value='-1'>
                            <param name='Loop' value='0'>
                            <param name='Menu' value='-1'>
                            <embed src="<%=FileUploadPath & rsnodigclass("picname")%>" width="110" height="80" border=0  pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash'></embed>
                          </object>
                          <%end if%>
                          <%end if%>
                          </a>
                          <br>
 <a class=middle href="E_ReadNews.asp?NewsID=<%=rsnodigclass("NewsID")%>" target=_blank title="<%=rsnodigclass("title")%>"><%=CutStr(rsnodigclass("title"),16)%></a> <br></div></td>
<%if row_count mod 4 <>0 then%>
<%end if%>
<% if row_count mod 4 =0 then%>
</tr>				  
<%
End if
rsnodigclass.movenext
Row_Count=Row_Count+1    
end if
loop
else
Response.Write "<tr><td> <div align='center'><table width='98%' border='0' cellpadding='3' cellspacing='0'><tr><td width='62%'>&nbsp;&nbsp;<img src='IMAGES/006.gif' width='10' height='10'> ���ޱ�����Ϣ</td></tr></table></div></td></tr>"
end if
rsnodigclass.close
set rsnodigclass=nothing
%>

</table>
<!--ͼƬģ�����-->
 
<% case 2 %>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="93%" height="25" background="Images/dh_bg.gif">&nbsp;&nbsp;&nbsp;<img src="Images/arrow_dh_1.gif" width="7" height="7">&nbsp;&nbsp;<%=E_typename%>��[����]</td>
        <td width="7%" background="Images/dh_bg.gif"><a class=class href='E_NobigClass.asp?E_typeid=<%=E_typeid%>'><img src="images/more.gif" border="0" alt="����<%=E_typename%>"></a></td>
      </tr>
	</table>
          <!--����ģ��-->
          <table width="100%" border="0" cellpadding="3" cellspacing="0">
	          <%set rsnodigclass=server.CreateObject("ADODB.RecordSet")
			if uselevel=1 then
			    
				if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
				rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="" then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="selfreg" then
					if Request.cookies(eChsys)("reglevel")=3 then
						rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
					end if
				if Request.cookies(eChsys)("reglevel")=2 then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("reglevel")=1 then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				
			end if
			else
			rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1) order by newsid DESC"
			end if
				rsnodigclass.Open rsnodigclass.Source,conn,1,1
			if not rsnodigclass.EOF then
			while not rsnodigclass.EOF
				if showyear=1 then
					newsurl="E_ReadNews.asp?NewsID=" & rsnodigclass("NewsID")
					newswwwurl=rsnodigclass("titleface")
					datetime="<font class=middle>[" & year(rsnodigclass("UpdateTime"))  &"/"& Month(rsnodigclass("UpdateTime"))  &"/"& Day(rsnodigclass("UpdateTime")) &"]</font>"
				else
					newsurl="E_ReadNews.asp?NewsID=" & rsnodigclass("NewsID")
					newswwwurl=rsnodigclass("titleface")
					datetime="<font class=middle>["& Month(rsnodigclass("UpdateTime"))  &"/"& Day(rsnodigclass("UpdateTime")) &"]</font>"
				end if
				if rsnodigclass("picnews")=1 then
					img="<font class=pic_word>[ͼ]</font>"
				else
					img=""
				end if
					title=trim(rsnodigclass("title"))
					title=replace(title,"<br>","")
		%>
		  <tr>
            <td>
			<div align="center" class="side_con">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="79%">&nbsp;&nbsp;<img src="IMAGES/006.gif" width="10" height="10"><a class=middle href="<%if rsnodigclass("titleface")="��" then %><%=newsurl%><% else %> <%=newswwwurl%><%end if%>" title="<%=rsnodigclass("title")%>" target="_blank"> <<%=rsnodigclass("titletype")%>><font color="<%=rsnodigclass("titlecolor")%>"> <%=CutStr(title,46)%></font></<%=rsnodigclass("titletype")%>></a>
                <!--�����������ʾ-->
                <% if rsnodigclass("titlesize")>=1 then %>
                <A class=middle HREF="<%=path%>review.asp?NewsID=<%=rsnodigclass("NewsID")%>" target="_blank" ><font color=red><b>��</b></font></A>
                <%end if %>
				<%=img%> 
                <!--�����������ʾ-->
                <%if year(rsnodigclass("updatetime"))=year(date()) and month(rsnodigclass("updatetime"))=month(date()) and day(rsnodigclass("updatetime"))=day(date()) then%>
                 <img src="images/new.gif">
                <%end if%>
				</td>
                <td width="21%" align="right">
                <%if showtime="1" then%>
                <%=datetime%>
                <%end if%>
&nbsp;			    </td>
              </tr>
            </table>
            </div>
		</td>
       </tr>
<%
rsnodigclass.MoveNext
wend 
else 
Response.Write "<tr><td> <div align='center'><table width='98%' border='0' cellpadding='3' cellspacing='0'><tr><td width='62%'>&nbsp;&nbsp;<img src='IMAGES/006.gif' width='10' height='10'> ���ޱ�����Ϣ</td></tr></table></div></td></tr>"
		%>
        <%end if
		rsnodigclass.close
		set rsnodigclass=nothing
		%>
		</table>
		  <!--����ģ��-->
<% case 3 %>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="93%" height="25" background="Images/dh_bg.gif">&nbsp;&nbsp;&nbsp;<img src="Images/arrow_dh_1.gif" width="7" height="7">&nbsp;&nbsp;<%=E_typename%>��[����]</td>
        <td width="7%" background="Images/dh_bg.gif"><a class=class href='E_NobigClass.asp?E_typeid=<%=E_typeid%>'><img src="images/more.gif" border="0" alt="����<%=E_typename%>"></a></td>
      </tr>
	</table>
          <!--��ַģ��-->
        <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber5">
          <%set rsnodigclass=server.CreateObject("ADODB.RecordSet")
		if uselevel=1 then
			if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
				rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="" then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="selfreg" then
					if Request.cookies(eChsys)("reglevel")=3 then
						rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
					end if
				if Request.cookies(eChsys)("reglevel")=2 then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("reglevel")=1 then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
			end if
			else
			rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1) order by newsid DESC"
			end if
			rsnodigclass.Open rsnodigclass.Source,conn,1,1
		%>
          <tr>
            <td><table width="98%" border="1" cellspacing="0" cellpadding="3" bordercolorlight=#cccccc  bordercolordark=#ffffff align="center">
                <!--��ַ������ʾ1-->
                <%
					if not rsnodigclass.EOF then
					do while not rsnodigclass.EOF%>
                <tr>
                  <%
						Content=htmlencode4(rsnodigclass("Content"))
					%>
                  <td width=25% align=center valign="middle"><%if not rsnodigclass.EOF then%>
                      <div align="center"> <a class=middle href="<%=rsnodigclass("Original")%>" target=_blank title="<%=CutStr(nohtml(rsnodigclass("Content")),80)%>"><%=CutStr(rsnodigclass("title"),30)%></a> </div></td>
                  <%rsnodigclass.movenext   
					end if %>
                  <!--��ַ������ʾ2-->
                  <td width=25% align=center valign="middle"><%if not rsnodigclass.EOF then%>
                      <div align="center"> <a class=middle href="<%=rsnodigclass("Original")%>" target=_blank title="<%=CutStr(nohtml(rsnodigclass("Content")),80)%>"><%=CutStr(rsnodigclass("title"),30)%></a> </div></td>
                  <%rsnodigclass.movenext   
					end if %>
                </tr>
                <!--��ַ���н���-->
                <%loop%>
                <%
			else
			Response.Write "<tr><td> <div align='center'><table width='98%' border='0' cellpadding='3' cellspacing='0'><tr><td width='62%'>&nbsp;&nbsp;<img src='IMAGES/006.gif' width='10' height='10'> ���ޱ�����Ϣ</td></tr></table></div></td></tr>"
		    end if
			rsnodigclass.close
			set rsnodigclass=nothing
			%>
              </table>
          </tr>
          <tr>
            <td>        
          </tr>
        </table>
		  <!--��ַģ��-->
<% case 4 %>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="93%" height="25" background="Images/dh_bg.gif">&nbsp;&nbsp;&nbsp;<img src="Images/arrow_dh_1.gif" width="7" height="7">&nbsp;&nbsp;<%=E_typename%>��[����]</td>
        <td width="7%" background="Images/dh_bg.gif"><a class=class href='E_NobigClass.asp?E_typeid=<%=E_typeid%>'><img src="images/more.gif" border="0" alt="����<%=E_typename%>"></a></td>
      </tr>
	</table>
          <!--���ģ��-->
        <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber5">
          <%set rsnodigclass=server.CreateObject("ADODB.RecordSet")
			if uselevel=1 then
				if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
				rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="" then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="selfreg" then
					if Request.cookies(eChsys)("reglevel")=3 then
						rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
					end if
				if Request.cookies(eChsys)("reglevel")=2 then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("reglevel")=1 then
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				end if
				else
					rsnodigclass.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1) order by newsid DESC"
				end if
			rsnodigclass.Open rsnodigclass.Source,conn,1,1
			    if not rsnodigclass.EOF then
				while not rsnodigclass.EOF
					if showyear=1 then
						newsurl="E_ReadNews.asp?NewsID=" & rsnodigclass("NewsID")
						newswwwurl=rsnodigclass("titleface")
						datetime="<font class=middle>[" & year(rsnodigclass("UpdateTime"))  &"/"& Month(rsnodigclass("UpdateTime"))  &"/"& Day(rsnodigclass("UpdateTime")) &"]</font>"
					else
						newsurl="E_ReadNews.asp?NewsID=" & rsnodigclass("NewsID")
						newswwwurl=rsnodigclass("titleface")
						datetime="<font class=middle>["& Month(rsnodigclass("UpdateTime"))  &"/"& Day(rsnodigclass("UpdateTime")) &"]</font>"
					end if
					if rsnodigclass("picnews")=1 then
						img="<font class=pic_word>[ͼ]</font>"
					else
						img=""
					end if
						title=trim(rsnodigclass("title"))
						title=replace(title,"<br>","")
			%>
          <tr>
            <%
		fileExt=lcase(getFileExtName(rsnodigclass("picname")))
		Content=htmlencode4(rsnodigclass("Content"))
		content=replace(content,"[---��ҳ---]","")%>
            <td><div align="center">
                <table width="100%" border="0" cellpadding="3" cellspacing="0">
                  <tr bgcolor="#EFEFEF">
                    <td colspan="2">&nbsp;<img src="images/news_img.gif" width="9" height="9"> <a class=middle href="<%if rsnodigclass("titleface")="��" then %><%=newsurl%><% else %> <%=newswwwurl%><%end if%>" title="<%=htmlencode4(title)%>" target="_blank"> <font color="<%=rsnodigclass("titlecolor")%>"><strong> <%=CutStr(title,40)%> </strong></font> </a>  <%if year(rsnodigclass("updatetime"))=year(date()) and month(rsnodigclass("updatetime"))=month(date()) and day(rsnodigclass("updatetime"))=day(date()) then%>
                      <img src="images/new.gif">
                      <%end if%></td>
                    <td width="22%" align="right" bgcolor="#EFEFEF">
                      <div align="right">
                        <%if showtime="1" then%>
                          <%=datetime%>
                          <%end if%>
                    &nbsp;</div></td>
                  </tr>
                  <tr>
                    <td width="35%"><a class=middle href="<%if rsnodigclass("titleface")="��" then %><%=newsurl%><% else %> <%=newswwwurl%><%end if%>" target=_blank title="<%=htmlencode4(rsnodigclass("title"))%>">
                      <%if   rsnodigclass("picname")=("")   then%>
                      <img  src="IMAGES/softno.gif" width="65" height="65" border=0 align="left">
                      <%else%>
                      <img  src="<%=FileUploadPath & rsnodigclass("picname")%>" width="65" height="65" border=0 align="left">
                      <%end if%>
                      <%if fileext="swf" then%>
                      </a><a class=middle href="<%if rsnodigclass("titleface")="��" then %><%=newsurl%><% else %> <%=newswwwurl%><%end if%>" target=_blank title="<%=htmlencode4(rsnodigclass("title"))%>">
                      <%if fileext="jpg" or fileext="bmp" or fileext="png" or fileext="gif" then%>
                      </a><a class=middle href="<%if rsnodigclass("titleface")="��" then %><%=newsurl%><% else %> <%=newswwwurl%><%end if%>" target=_blank title="<%=htmlencode4(rsnodigclass("title"))%>">
                      <object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'  codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width="65" height="65" border=0 >
                        <param name=movie value="<%=FileUploadPath & rsnodigclass("picname")%>">
                        <param name=quality value=high>
                        <param name='Play' value='-1'>
                        <param name='Loop' value='0'>
                        <param name='Menu' value='-1'>
                        <embed src="<%=FileUploadPath & rsnodigclass("picname")%>" width="6" 5height="65" border=0  pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash'></embed>
                      </object>
                      <%end if%>
                      <%end if%>
                    </a> </td>
                    <td colspan="3" valign="top"><a class=middle href="<%if rsnodigclass("titleface")="��" then %><%=newsurl%><% else %> <%=newswwwurl%><%end if%>" target="_blank" title="<%=htmlencode4(title)%>"><%=CutStr(nohtml(rsnodigclass("Content")),250)%></a> </td>
                  </tr>
                </table>
            </div></td>
          </tr>
          <%
		rsnodigclass.MoveNext
		wend
		%>
          <%
			else
			Response.Write "<tr><td> <div align='center'><table width='98%' border='0' cellpadding='3' cellspacing='0'><tr><td width='62%'>&nbsp;&nbsp;<img src='IMAGES/006.gif' width='10' height='10'> ���ޱ�����Ϣ</td></tr></table></div></td></tr>"
		    end if
			rsnodigclass.close
			set rsnodigclass=nothing
			%>
        </table>
		  <!--���ģ��-->
<%end select%>

<!--�޴�������������-->
        <!--ģ�濪ʼ-->
        <% select case mode%>
        <% case 1 %>
        <!--ͼƬģ��-->
        <%
	if rseof=1 then
		for i=1 to abcount
		E_BigClassID=ArrayE_BigClassID(i)
		E_BigClassName=ArrayE_BigClassName(i)
			E_BigClassView=ArrayE_BigClassView(i)
		if ArrayE_BigClassView(i)=1 then 
%>
<table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber5">
          <tr>
            <td width="98%" height="24" background="Images/dh_bg.gif">&nbsp;&nbsp;&nbsp;&nbsp;<img src="Images/arrow_dh_1.gif" width="7" height="7">&nbsp;&nbsp;<font class=body><%=E_BigClassName%></font> </td>
            <td width="2%"  background="Images/dh_bg.gif"><a class=class href='E_BigClass.asp?E_typeid=<%=E_typeid%>&E_BigClassID=<%=E_BigClassID%>'><img src="images/more.gif" border="0" alt="����<%=E_BigClassName%>"></a></td>
          </tr>
		  </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<%
Row_Count=1
set rs3=server.CreateObject("ADODB.RecordSet")
				if uselevel=1 then
					if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
					rs3.Source="select top "& top_news &" * from "& db_EC_News_Table &" where (E_BigClassID="& E_BigClassID &" and checkked=1) order by newsid DESC"
					end if
					if Request.cookies(eChsys)("key")="" then
					rs3.Source="select top "& top_news &" * from "& db_EC_News_Table &" where (E_BigClassID="& E_BigClassID &" and checkked=1 ) order by newsid DESC"
					end if
					if Request.cookies(eChsys)("key")="selfreg" then
						if Request.cookies(eChsys)("reglevel")=3 then
						rs3.Source="select top "& top_news &" * from "& db_EC_News_Table &" where (E_BigClassID="& E_BigClassID &" and checkked=1 ) order by newsid DESC"
						end if
						if Request.cookies(eChsys)("reglevel")=2 then
						rs3.Source="select top "& top_news &" * from "& db_EC_News_Table &" where (E_BigClassID="& E_BigClassID &" and checkked=1 ) order by newsid DESC"
						end if
					if Request.cookies(eChsys)("reglevel")=1 then
						rs3.Source="select top "& top_news &" * from "& db_EC_News_Table &" where (E_BigClassID="& E_BigClassID &" and checkked=1 ) order by newsid DESC"
						end if
					end if
				else
					rs3.Source="select top "& top_news &" * from "& db_EC_News_Table &" where (E_BigClassID="& E_BigClassID &" and checkked=1) order by newsid DESC"
				end if
rs3.Open rs3.Source,conn,1,1
%>
			
 <!--ͼƬ������ʾ1-->
<% if not rs3.EOF then %>
  <tr>
                <%
				fileExt=lcase(getFileExtName(rs3("picname")))
				Content=htmlencode4(rs3("Content"))
				content=replace(content,"[---��ҳ---]","")
				do while not rs3.EOF
				%>
                  <td align=center valign="top" style="table-layout:fixed; word-break:break-all">
				  <%if not rs3.EOF then%>
                      <div align="center">
                        <% content=htmlencode4(rs3("Content"))
						content=replace(content,"[---��ҳ---]","")%>
                       <br> <a class=middle href="E_ReadNews.asp?NewsID=<%=rs3("NewsID")%>" target=_blank title="<%=CutStr(nohtml(Content),150)%>...">
                        <%if   rs3("picname")=("") then%>
                        <img  src="IMAGES/flashorno.gif" width="110" height="80" border=1 style=border-color:#000000 align=top>
                        <%else%>
                        <%if fileext="jpg" or fileext="bmp" or fileext="png" or fileext="gif" then%>
                        <img  src="<%=FileUploadPath & rs3("picname")%>" width="110" height="80" border=1 style=border-color:#000000 align=top>
                        <%end if%>
                        <%if fileext="swf" then%>
                        <object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'  codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width="110" height="80" border=0 >
                          <param name=movie value="<%=FileUploadPath & rs3("picname")%>">
                          <param name=quality value=high>
                          <param name='Play' value='-1'>
                          <param name='Loop' value='0'>
                          <param name='Menu' value='-1'>
                          <embed src="<%=FileUploadPath & rs3("picname")%>" width="110" height="80" border=0  pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash'></embed>
                        </object>
                        <%end if%>
                        <%end if%>
                        </a> <br>  
<a class=middle href="E_ReadNews.asp?NewsID=<%=rs3("NewsID")%>" target=_blank title="<%=rs3("title")%>"><%=CutStr(rs3("title"),16)%></a><br></div>
					</td>
<%if row_count mod 4 <>0 then%>
<%end if%>
<% if row_count mod 4 =0 then%>	
</tr>                 
<%
End if
Rs3.movenext
Row_Count=Row_Count+1 
End if
Loop
Rs3.Close
Set Rs3=nothing
Else
Response.Write "<tr><td> <div align='center'><table width='98%' border='0' cellpadding='3' cellspacing='0'><tr><td width='62%'>&nbsp;&nbsp;<img src='IMAGES/006.gif' width='10' height='10'> ������Ϣ</td></tr></table></div></td></tr>"
end if
%>

<%
end if
next
end if
%>
</table>


        <% case 2 %>
        <!--����ģ��-->
        <%if rseof=1 then
	for i=1 to abcount
	E_BigClassID=ArrayE_BigClassID(i)
	E_BigClassName=ArrayE_BigClassName(i)
	E_BigClassView=ArrayE_BigClassView(i)
	if ArrayE_BigClassView(i)=1 then 
%>
        <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber5">
          <tr>
            <td width="97%" height="25" background="Images/dh_bg.gif">&nbsp;&nbsp;&nbsp;&nbsp;<img src="Images/arrow_dh_1.gif" width="7" height="7">&nbsp;&nbsp;<font class=body><%=E_BigClassName%></font></td>
            <td width="3%" background="Images/dh_bg.gif"><a class=class href='E_BigClass.asp?E_typeid=<%=E_typeid%>&E_BigClassID=<%=E_BigClassID%>'><img src="images/more.gif" border="0" alt="����<%=E_BigClassName%>"></a></td>
          </tr>
          <%set rs3=server.CreateObject("ADODB.RecordSet")
		if uselevel=1 then
			if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
				rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1) order by newsid DESC"
			end if
		if Request.cookies(eChsys)("key")="" then
			rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
			end if
		if Request.cookies(eChsys)("key")="selfreg" then
			if Request.cookies(eChsys)("reglevel")=3 then
				rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
			end if
			if Request.cookies(eChsys)("reglevel")=2 then
				rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
			end if
			if Request.cookies(eChsys)("reglevel")=1 then
				rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
			end if
			end if
		else
			rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1) order by newsid DESC"
		end if
			rs3.Open rs3.Source,conn,1,1
		if not rs3.EOF then
		while not rs3.EOF
			if showyear=1 then
				newsurl="E_ReadNews.asp?NewsID=" & rs3("NewsID")
				newswwwurl=rs3("titleface")
				datetime="<font class=middle>[" & year(rs3("UpdateTime"))  &"/"& Month(rs3("UpdateTime"))  &"/"& Day(rs3("UpdateTime")) &"]</font>"
			else
				newsurl="E_ReadNews.asp?NewsID=" & rs3("NewsID")
				newswwwurl=rs3("titleface")
				datetime="<font class=middle>["& Month(rs3("UpdateTime"))  &"/"& Day(rs3("UpdateTime")) &"]</font>"
			end if
				if rs3("picnews")=1 then
					img="<font class=pic_word>[ͼ]</font>"
				else
					img=""
				end if
					title=trim(rs3("title"))
					title=replace(title,"<br>","")
					%>
          <tr>
            <td colspan="2">
			<div align="center"  class="side_con">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="79%">&nbsp;&nbsp;<img src="IMAGES/006.gif" width="10" height="10"><a class=middle href="<%if rs3("titleface")="��" then %><%=newsurl%><% else %> <%=newswwwurl%><%end if%>" title="<%=rs3("title")%>" target="_blank"> <<%=rs3("titletype")%>><font color="<%=rs3("titlecolor")%>"> <%=CutStr(title,46)%></font></<%=rs3("titletype")%>></a>
                        <!--�����������ʾ-->
                        <% if rs3("titlesize")>=1 then %>
                        <A class=middle HREF="<%=path%>review.asp?NewsID=<%=rs3("NewsID")%>" target="_blank" ><font color=red><b>��</b></font></A>
                        <%end if %>
						 <%=img%> 
                        <!--�����������ʾ-->
                          <%if year(rs3("updatetime"))=year(date()) and month(rs3("updatetime"))=month(date()) and day(rs3("updatetime"))=day(date()) then%>
                          <img src="images/new.gif">
                          <%end if%>
</td>
                         <td width="21%" align="right">
                          <%if showtime="1" then%>
                          <%=datetime%>
                          <%end if%>                    </td>
                  </tr>
                </table>
            </div></td>
          </tr>
          <%
		rs3.MoveNext
		wend
		%>
          <%
			else
			Response.Write "<tr><td> <div align='center'><table width='98%' border='0' cellpadding='3' cellspacing='0'><tr><td width='62%'>&nbsp;&nbsp;<img src='IMAGES/006.gif' width='10' height='10'> ������Ϣ</td></tr></table></div></td></tr>"
		    end if
			Rs3.close
			set rs3=nothing
			%>
        </table>
        <%
		end if
		next
		end if
		%>
        <% case 3 %>
        <!--��ַģ��-->
        <%
		if rseof=1 then
		for i=1 to abcount
		E_BigClassID=ArrayE_BigClassID(i)
		E_BigClassName=ArrayE_BigClassName(i)
		E_BigClassView=ArrayE_BigClassView(i)
		if ArrayE_BigClassView(i)=1 then 
		%>
        <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber5">
          <tr>
            <td width="92%" height="25" background="Images/dh_bg.gif">&nbsp;&nbsp;&nbsp;&nbsp;<img src="Images/arrow_dh_1.gif" width="7" height="7">&nbsp;&nbsp;<font class=body><%=E_BigClassName%></font></td>
            <td width="8%" background="Images/dh_bg.gif"><a class=class href='E_BigClass.asp?E_typeid=<%=E_typeid%>&E_BigClassID=<%=E_BigClassID%>'><img src="images/more.gif" border="0" alt="����<%=E_BigClassName%>"></a></td>
          </tr>
          <%set rs3=server.CreateObject("ADODB.RecordSet")
			if uselevel=1 then
				if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
				rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="" then
				rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="selfreg" then
					if Request.cookies(eChsys)("reglevel")=3 then
						rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
					end if
				if Request.cookies(eChsys)("reglevel")=2 then
					rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
					end if
						if Request.cookies(eChsys)("reglevel")=1 then
							rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
						end if
					end if
				else
				rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1) order by newsid DESC"
				end if
				rs3.Open rs3.Source,conn,1,1
			%>
          <tr>
            <td colspan="2"><table width="98%" border="1" cellspacing="0" cellpadding="3" bordercolorlight=#cccccc  bordercolordark=#ffffff align="center">
                <!--��ַ������ʾ1-->
                <% if not rs3.EOF then %>
                <%do while not rs3.EOF%>
                <tr>
                  <%
				Content=htmlencode4(rs3("Content"))
				%>
                  <td width=25% align=center valign="middle"><%if not rs3.EOF then%>
                      <div align="center"> <a class=middle href="<%=rs3("Original")%>" target=_blank title="<%=CutStr(nohtml(rs3("Content")),80)%>"><%=CutStr(rs3("title"),30)%></a> </div></td>
                  <%rs3.movenext   
				end if %>
                  <!--��ַ������ʾ2-->
                  <td width=25% align=center valign="middle"><%if not rs3.EOF then%>
                      <div align="center"> <a class=middle href="<%=rs3("Original")%>" target=_blank title="<%=CutStr(nohtml(rs3("Content")),80)%>"><%=CutStr(rs3("title"),30)%></a> </div></td>
                  <%rs3.movenext   
				end if %>
                </tr>
                <!--��ַ���н���-->
                <%loop
				rs3.Close
				set rs3=nothing
				%>
                <%
			else
			Response.Write "<tr><td> <div align='center'><table width='98%' border='0' cellpadding='3' cellspacing='0'><tr><td width='62%'>&nbsp;&nbsp;<img src='IMAGES/006.gif' width='10' height='10'> ������Ϣ</td></tr></table></div></td></tr>"
		    end if
			%>
          </table>
		  </tr>

          <%
		end if
		next
		end if
		%>
        </table>
        <% case 4 %>
        <!--���ģ��-->
        <%if rseof=1 then
		for i=1 to abcount
		E_BigClassID=ArrayE_BigClassID(i)
		E_BigClassName=ArrayE_BigClassName(i)
		E_BigClassView=ArrayE_BigClassView(i)
		if ArrayE_BigClassView(i)=1 then 
		%>
        <table border="0" cellpadding="3" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber5">
          <tr>
            <td width="92%" height="25" background="Images/dh_bg.gif">&nbsp;&nbsp;&nbsp;&nbsp;<img src="Images/arrow_dh_1.gif" width="7" height="7">&nbsp;&nbsp;<font class=body><%=E_BigClassName%></font></td>
            <td width="8%" background="Images/dh_bg.gif"><a class=class href='E_BigClass.asp?E_typeid=<%=E_typeid%>&E_BigClassID=<%=E_BigClassID%>'><img src="images/more.gif" border="0" alt="����<%=E_BigClassName%>"></a></td>
          </tr>
          <%set rs3=server.CreateObject("ADODB.RecordSet")
		if uselevel=1 then
			if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
			rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1) order by newsid DESC"
			end if
			if Request.cookies(eChsys)("key")="" then
			rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
			end if
			if Request.cookies(eChsys)("key")="selfreg" then
				if Request.cookies(eChsys)("reglevel")=3 then
				rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
				end if
			if Request.cookies(eChsys)("reglevel")=2 then
			rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
			end if
			if Request.cookies(eChsys)("reglevel")=1 then
			rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1 ) order by newsid DESC"
			end if
		end if
		else
			rs3.Source="select top " & top_news & " * from "& db_EC_News_Table &" where (E_BigClassID=" & E_BigClassID &" and checkked=1) order by newsid DESC"
		end if
rs3.Open rs3.Source,conn,1,1
		if not rs3.EOF then
		while not rs3.EOF
			if showyear=1 then
				newsurl="E_ReadNews.asp?NewsID=" & rs3("NewsID")
				newswwwurl=rs3("titleface")
				datetime="<font class=middle>[" & year(rs3("UpdateTime"))  &"/"& Month(rs3("UpdateTime"))  &"/"& Day(rs3("UpdateTime")) &"]</font>"
			else
				newsurl="E_ReadNews.asp?NewsID=" & rs3("NewsID")
				newswwwurl=rs3("titleface")
				datetime="<font class=middle>["& Month(rs3("UpdateTime"))  &"/"& Day(rs3("UpdateTime")) &"]</font>"
			end if
			if rs3("picnews")=1 then
				img="<img src='images/news_img.gif' border='0'>"
			else
				img=""
			end if
				title=trim(rs3("title"))
				title=replace(title,"<br>","")
				%>
          <tr>
            <%
		fileExt=lcase(getFileExtName(rs3("picname")))
		Content=htmlencode4(rs3("Content"))
		content=replace(content,"[---��ҳ---]","")%>
            <td colspan="2"><div align="center">
                <table width="100%" border="0" cellpadding="3" cellspacing="0">
                  <tr bgcolor="#EFEFEF">
                    <td colspan="2">&nbsp;<img src="images/news_img.gif" width="9" height="9"> <a class=middle href="<%if rs3("titleface")="��" then %><%=newsurl%><% else %> <%=newswwwurl%><%end if%>" title="<%=htmlencode4(title)%>" target="_blank"> <font color="<%=rs3("titlecolor")%>"><strong> <%=CutStr(title,40)%> </strong></font> </a>
                      <%if year(rs3("updatetime"))=year(date()) and month(rs3("updatetime"))=month(date()) and day(rs3("updatetime"))=day(date()) then%>
                      <img src="images/new.gif">
                      <%end if%>
 </td>
                    <td width="22%" align="right" bgcolor="#EFEFEF"><%if showtime="1" then%>
                        <%=datetime%>
                        <%end if%>
                    &nbsp; </td>
                  </tr>
                  <tr>
                    <td width="37%"><a class=middle href="<%if rs3("titleface")="��" then %><%=newsurl%><% else %> <%=newswwwurl%><%end if%>" target=_blank title="<%=htmlencode4(rs3("title"))%>">
                      <%if   rs3("picname")=("")   then%>
                      <img  src="IMAGES/softno.gif" width="65" height="65" border=0 align="left">
                      <%else%>
                      <%if fileext="jpg" or fileext="bmp" or fileext="png" or fileext="gif" then%>
                      <img  src="<%=FileUploadPath & rs3("picname")%>" width="65" height="65" border=0 align="left">
                      <%end if%>
                      <%if fileext="swf" then%>
                      <object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'  codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' width="65" height="65" border=0 >
                        <param name=movie value="<%=FileUploadPath & rs3("picname")%>">
                        <param name=quality value=high>
                        <param name='Play' value='-1'>
                        <param name='Loop' value='0'>
                        <param name='Menu' value='-1'>
                        <embed src="<%=FileUploadPath & rs3("picname")%>" width="6" 5height="65" border=0  pluginspage='http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash' type='application/x-shockwave-flash'></embed>
                      </object>
                      <%end if%>
                      <%end if%>
                    </a> </td>
                    <td colspan="3" valign="top"><a class=middle href="<%if rs3("titleface")="��" then %><%=newsurl%><% else %> <%=newswwwurl%><%end if%>" target="_blank" title="<%=htmlencode4(title)%>"><%=CutStr(nohtml(rs3("Content")),250)%></a> </td>
                  </tr>
                </table>
            </div></td>
          </tr>
          <%
		rs3.MoveNext
		wend
		Rs3.close
		set rs3=nothing
		%>
          <%
			else
			Response.Write "<tr><td> <div align='center'><table width='98%' border='0' cellpadding='3' cellspacing='0'><tr><td width='62%'>&nbsp;&nbsp;<img src='IMAGES/006.gif' width='10' height='10'> ������Ϣ</td></tr></table></div></td></tr>"
		    end if
			%>
        </table>
        <%
		end if
		next
		end if
		%>
    <% case 5%>
    <table width="100%" border="0" cellpadding="3" cellspacing="0">
      <%set rsnodigclass=server.CreateObject("ADODB.RecordSet")
			if uselevel=1 then
			    
				if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="typemaster" or Request.cookies(eChsys)("key")="bigmaster" or Request.cookies(eChsys)("key")="smallmaster" or Request.cookies(eChsys)("key")="check" then
				rsnodigclass.Source="select top 1 * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="" then
					rsnodigclass.Source="select top 1 * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("key")="selfreg" then
					if Request.cookies(eChsys)("reglevel")=3 then
						rsnodigclass.Source="select top 1 * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
					end if
				if Request.cookies(eChsys)("reglevel")=2 then
					rsnodigclass.Source="select top 1  * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				if Request.cookies(eChsys)("reglevel")=1 then
					rsnodigclass.Source="select top 1 * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1 ) order by newsid DESC"
				end if
				
			end if
			else
			rsnodigclass.Source="select top 1 * from "& db_EC_News_Table &" where (E_typeid=" & E_typeid &"  and E_BigClassID is null and E_SmallClassID is null and checkked=1) order by newsid DESC"
			end if
				rsnodigclass.Open rsnodigclass.Source,conn,1,1
			if not rsnodigclass.EOF then

		%>
      <tr>
        <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="66%" height="52"><%=rsnodigclass("content")%> </td>
              </tr>
            </table>
        </td>
      </tr>
      <%
		else 
			Response.Write "<tr><td> <div align='center'><table width='98%' border='0' cellpadding='3' cellspacing='0'><tr><td width='62%'>&nbsp;&nbsp;<img src='IMAGES/006.gif' width='10' height='10'> ���ޱ�����Ϣ</td></tr></table></div></td></tr>"
		%>
      <%end if
		rsnodigclass.close
		set rsnodigclass=nothing
		%>
    </table>
    <%
		end select
		conn.close
		set conn=nothing
		%>	</td>
  </tr>
</table>
<%end if %>	
<!--#include file="bottom.asp"-->
