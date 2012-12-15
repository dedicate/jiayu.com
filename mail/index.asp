<%@ Language=VBScript%>
<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="function.asp"-->
<!--'#include file="char.inc"-->
<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="keywords" content="嘉鱼政务网">
<title><%=eChSys%></title>
<LINK href="news.css" rel=stylesheet>
<link rel="Shortcut Icon" href="e-cweb.ico"><!--IE地址栏前换成自己的图标--> 
<link rel="Bookmark" href="e-cweb.ico"><!--可以在收藏夹中显示出你的图标-->
<noscript><iframe scr="*"></iframe></noscript>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<SCRIPT> 
<!-- 
window.defaultStatus="<%=gg1%>"; 
//--> 
</SCRIPT>
<script language="JavaScript">
<!--
if (self != top) top.location.href = window.location.href
//-->
</script>
<script language=JavaScript>
<!--
//
var version = "other"
browserName = navigator.appName;   
browserVer = parseInt(navigator.appVersion);
if (browserName == "Netscape" && browserVer >= 3) version = "n3";
else if (browserName == "Netscape" && browserVer < 3) version = "n2";
else if (browserName == "Microsoft Internet Explorer" && browserVer >= 4) version = "e4";
else if (browserName == "Microsoft Internet Explorer" && browserVer < 4) version = "e3";
function marquee1()
{
	if (version == "e4" | version == "n3")
	{
		document.write("<marquee style='BOTTOM: 0px; FONT-WEIGHT: 100px; HEIGHT:120px;  TEXT-ALIGN: left; TOP: 0px' id='news' scrollamount='1' scrolldelay='10' behavior='loop' direction='up' border='0' onmouseover='this.stop()' onmouseout='this.start()'>")
	}
}

function marquee2()
{
	if (version == "e4" | version == "n3")
	{
		document.write("</marquee>")
	}
}

function marquee_logo_news()
{
	if (version == "e4")
	{
		document.write("<marquee style='BOTTOM: 0px; FONT-WEIGHT: 1200px; HEIGHT:31px;  TEXT-ALIGN: left; TOP: 0px' id='link_map' scrollamount='2' scrolldelay='10' behavior='alternate' direction='right' border='0' onmouseover='this.stop()' onmouseout='this.start()'>")
	}
}

function marquee3()
{
	if (version == "e4" | version == "n3")
	{
		document.write("<marquee direction='left' border='0' onmouseover='this.stop()' onmouseout='this.start()'>")
	}
}

function marquee4()
{
	if (version == "e4" | version == "n3")
	{
		document.write("</marquee>")
	}
}

function marquee5()
{
	if (version == "e4" | version == "n3")
	{
		document.write("<marquee style='BOTTOM: 0px; FONT-WEIGHT: 100px; HEIGHT:100px;  TEXT-ALIGN: left; TOP: 0px' id='news' scrollamount='1' scrolldelay='10' behavior='loop' direction='up' border='0' onmouseover='this.stop()' onmouseout='this.start()'>")
	}
}

function marquee6()
{
	if (version == "e4" | version == "n3")
	{
		document.write("</marquee>")
	}
}

//-->
</script>
<script language="JavaScript1.2">
function makevisible(cur,which){
if (which==0)
cur.filters.alpha.opacity=100
else
cur.filters.alpha.opacity=20
}
</script>

<script LANGUAGE="javascript">
<!--

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
//-->
</script>
</head>
<body>
<%if E_announceview=1 then%>
<script language="JavaScript">
  window.open("gonggao.asp","公告窗","width=300,height=400,toolbar=0,status=0,menubar=0,resize=0");
</script>
<%end if%>
<!--#include file="Top.asp"-->
<%
dim E_typeid
dim E_typename
dim typecontent

Set Rs=server.CreateObject("ADODB.RecordSet")
Rs.Source="Select * From "& db_EC_Type_Table &" Where E_typeview=1 order by E_typeorder"
Rs.Open Rs.Source,Conn,1,1

i=1
Dim ArrayE_typeid(10000),ArrayE_typename(10000)
Rs.Close
Set Rs=Nothing


Set Rs=server.CreateObject("ADODB.RecordSet")
Rs.Source="Select * From "& db_EC_Type_Table &" Where E_typeview=1 order by E_typeorder"
Rs.Open Rs.Source,Conn,1,1

i=1
Dim ArraytyID(10000),ArraytyName(10000),Arraytyview(10000)
If Not Rs.EOF Then
RsEof=1

While Not Rs.EOF
RecordCount=rs.RecordCount
tyID=rs("E_typeid")
tyName=trim(rs("E_typename"))
tycontent=rs("typecontent")
tyview=trim(rs("E_typeview"))
ArraytyID(i)=tyID
ArraytyName(i)=tyName
Arraytyview(i)=tyview
i=i+1
Rs.MoveNext
Wend
Rs.close
%>
<table width="1002" height="1235" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
 <tr><td height="4" colspan="3"></td></tr>
  <tr>
    <td height="244" colspan="2" align="left" valign="top"><!--#include file="E_daodu.asp" --></td>
    <td width="426" align="center"  valign="top"><!--#include file="E_ZG.asp" --></td>
  </tr>
  <tr>
    <td height="33" colspan="2" align="left" valign="middle" background="Images/echsys_gov_56.gif">
	<!--#include file=loginemail.asp --></td>
    <td height="33" align="left" valign="middle" background="Images/echsys_gov_56.gif">
			<form method="post" name="myform" action="Result.asp" target="newwindow" class="login">
              <%if showsearch="1" then%>
                 <%if search=1 then%>
                 <!--#include file=E_Search.asp-->
                 <%else%>
                 <!--#include file=E_Search1.asp-->
                 <%end if%>
              <%else response.write"管理员关闭了搜索，请联系管理员！"
			  end if%>
           </form>	</td>
  </tr>
  <tr>
    <td height="4" colspan="3" align="left" valign="top" bgcolor="#F0E0CA"><img src="Images/bgline.gif" width="1002" height="4"></td>
  </tr>
  <tr>
    <td width="572" height="337" valign="top"><!--#include file="E_Article.asp"--></td>
    <td width="4" align="left" valign="top" bgcolor="#F0E0CA"></td>
    <td width="426" rowspan="3" align="center"  valign="top" bgcolor="#FCFAE7">
	<table width="426" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="100" align="center" valign="middle">
		<script language=javascript src=./zongg/ad.asp?i=12></script></td>
      </tr>
    </table>
	<!--#include file="E_BanShi.asp"-->    </td>
  </tr>
  <tr>
    <td height="4" align="left" valign="top" bgcolor="#F0E0CA"></td>
    <td width="4" align="left" valign="top" bgcolor="#F0E0CA"><img src="Images/bg_dot.gif" width="4" height="4"></td>
  </tr>
  <tr>
    <td height="117" align="left" valign="middle"><table width="100%" height="117" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <td width="29" height="110"><img src="Images/echsys_gov_76.gif" width="29" height="117"></td>
        <td width="543"><!--#include file="NewTopPhoto.asp" --></td>
      </tr>
    </table></td>
    <td width="4" align="left" valign="top" bgcolor="#F0E0CA"></td>
  </tr>
  <tr>
    <td height="4" colspan="3" align="left" valign="top" bgcolor="#F0E0CA"><img src="Images/bgline.gif" width="1002" height="4"></td>
  </tr>
  <tr>
    <td height="366" align="center" valign="top"><!--#include file="E_HuDong.asp" --></td>
    <td width="4" align="left" valign="top" bgcolor="#F0E0CA"></td>
    <td width="426" align="center"  valign="top" bgcolor="#FCFAE7"><!--#include file="E_ShenPi.asp" --></td>
  </tr>
  <tr>
    <td height="4" colspan="3" align="left" valign="top"><img src="Images/bgline.gif" width="1002" height="4"></td>
  </tr>
  <tr>
    <td height="76" colspan="3" align="center" valign="middle"><!--#include file="FriendSite.asp" --></td>
  </tr>
</table>
<%
Else
Response.Write "<table width=1002 align=center border=0 height=200 bgcolor=#FFFFFF><tr><td align=center class=middle>暂 无 栏 目 类 别，请 <a href=login.asp>登 陆</a> 后 添 加！</td></tr></table>"
End If
%>
<!--#include file="Bottom.asp" -->
</body>
</HTML>