<!--#include file="ConnUser.asp"-->
<!--#include file="inc/config.asp"-->
<!--#include file="char.inc"-->
<noscript><iframe scr="*"></iframe></noscript>
<script language=javascript>
function CheckFormUserLogin()
{
	if(document.UserLogin.UserName.value=="")
	{
		alert("�������û�����");
		document.UserLogin.UserName.focus();
		return false;
	}
	if(document.UserLogin.Passwd.value == "")
	{
		alert("���������룡");
		document.UserLogin.Passwd.focus();
		return false;
	}
	if(document.UserLogin.verifycode.value == "")
	{
		alert("��������֤�룡");
		document.UserLogin.verifycode.focus();
		return false;
	}
}
</script>
<SCRIPT language="JavaScript" type="text/javascript">
    // Begin morelink
      function morelink(morelink)
      {
        url = 'MoreLink.asp?linktype=1';
        window.open(url,morelink);
      }
    // End morelink-->
 // Begin linkreg
      function linkreg(linkreg)
      {
        url = 'LinkReg.asp';
        window.open(url,linkreg);
      }
    // End linkreg-->
// Begin vote
      function vote(vote)
      {
        url = 'E_Vote.asp?stype=view';
        window.open(url,vote);
      }
    // End vote-->
// Begin adduser
      function adduser(adduser)
      {
        url = 'AddUser.asp';
        window.open(url,adduser);
      }
    // End adduser-->
// Begin getpwd
      function getpwd(getpwd)
      {
        url = 'GetPwd.asp';
        window.open(url,getpwd);
      }
    // End getpwd-->
</script>
<%if TransShow="on" then%>
<META content=revealTrans(Transition=23,Duration=1.0) http-equiv=Page-Enter>
<META content=revealTrans(Transition=23,Duration=1.0) http-equiv=Page-Exit>
<SCRIPT language=JavaScript>
	<!--
	//ҳ������л�Ч��
	function transDemo(n) {
	if (document.all && navigator.userAgent.indexOf("Mac")==-1) {
	t=document.all.transmeta;
	t.style.width=document.body.clientWidth;
	t.style.height=document.body.offsetHeight;
	t.style.top=document.body.scrollTop;
	t.style.backgroundColor="#003333";
	t.style.visibility="visible";
	t.filters[0].transition=n;
	setTimeout("transShow()"); // separated to force screen paint
	} else {
	alert("You can view transitions only on Windows IE 4.0 and later.");
	} 
	}
	
	function transShow() {
	t.filters[0].Apply();
	t.style.visibility="hidden";
	t.filters[0].Play();
	}
	//-->
	</SCRIPT>
<%end if%>
<%		'��ȡ��ǰ URL
dim ViewUrl
if Request.ServerVariables("QUERY_STRING")<>"" then
	ViewUrl=Request.ServerVariables("url") &"?"& Request.ServerVariables("QUERY_STRING")&""
else
	ViewUrl=Request.ServerVariables("url") &""
end if
response.cookies(eChsys)("ViewUrl")=ViewUrl%>
<div id=menuDiv style='Z-INDEX: 2; VISIBILITY: hidden; WIDTH: 1px; POSITION: absolute; HEIGHT: 1px; BACKGROUND-COLOR: #9cc5f8'></div>
<%if topbg=1 then %>
<script src="clearevents.js"></script>
<%end if%>
<%if AD_Show=1 then %>
<SCRIPT language=JavaScript src="Float_AD.asp"></SCRIPT>
<%end if%>
<table width="780" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" >
  <tr>
    <td height="60"><a href="<%=OtherTopBannerurl%>">
        <%if gd2="1" then%>
        <img src="<%=OtherTopBanner%>" width="780" height="124" border="0" align="absmiddle">
        <%else%>
        <object codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0' 
      height="124" width="780" classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'>
          <param name="movie" value='<%=OtherTopBanner%>'>
          <param name="quality" value="high">
          <param name="wmode" value="transparent">
          <embed src="photo/top.swf" quality=high 
      pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" 
      type="application/x-shockwave-flash" width="780" height="24"> </embed>
      </object>
        <%end if%></a>
	</td>
  </tr>
  <tr>
    <td height="31">
	  <table width="780" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
	   <td valign="bottom" width="98"><a href="index.asp"> <img src="Images/ec_menu_00.gif" width="98" height="31" border="0"></a></td>
        <td  valign="middle" align="left" class="TOP1"><%
						dim mymenu
						mymenu=echuangmenu
						Response.Write mymenu
						%></td>
      </tr>
    </table>
	</td>
  </tr>
  <tr>
    <td height="34"  class="top"  background="Images/a_bg.gif">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="100%" align="left"><!--#include file="menu.asp"--></td>
      </tr>
    </table>
	
	</td>
  </tr>
</table>

