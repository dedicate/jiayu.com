<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->

<%
response.cookies(eChsys)("UserName")=""
response.cookies(eChsys)("KEY")=""
response.cookies(eChsys)("purview")=""
response.cookies(eChsys)("fullname")=""
response.cookies(eChsys)("reglevel")=""
response.cookies(eChsys)("shenhe")=""
response.cookies(eChsys)("ViewUrl")="admin_index.asp"%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<LINK href=site.css rel=stylesheet>
<title>嘉鱼政务网 - 县长信箱</title>
<script language="JavaScript">
<!--

if (self != top) top.location.href = window.location.href

//-->
</script>

<script language=javascript>
function CheckFormUserLogin()
{
	if(document.UserLogin.UserName.value=="")
	{
		alert("请输入用户名！");
		document.UserLogin.UserName.focus();
		return false;
	}
	if(document.UserLogin.Passwd.value == "")
	{
		alert("请输入密码！");
		document.UserLogin.Passwd.focus();
		return false;
	}
	if(document.UserLogin.verifycode.value == "")
	{
		alert("请输入验证码！");
		document.UserLogin.verifycode.focus();
		return false;
	}
}
</script>

<style type="text/css">
<!--
.style1 {
	font-size: 10.5pt;
	font-weight: bold;
}
-->
</style>
</head>
<body topmargin="0" marginheight="0">
<br>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form method="POST" action="ChkLogin.asp" name="UserLogin" onSubmit="return CheckFormUserLogin();">
  <table width="533" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="53" background="IMAGES/login_01.gif"><div align="center"></div>
      </td>
    </tr>
    <tr>
      <td height="43" background="IMAGES/login_02.gif"><div align="center">
        <table width="100%" height="43" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30"><center>
                <font color="#000000"><b>县 长 信 箱</b></font>
            </center></td>
          </tr>
        </table>
      </div></td>
    </tr>
    <tr>
      <td height="98" background="IMAGES/login_03.gif">
        <table width="520" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="131" height="23"><center>
              用户名：            
            </center></td>
            <td width="131"><center>
              密&nbsp;&nbsp;码：
            </center></td>
            <td width="174"><center>
              验证码：
            </center></td>
            <td width="114" rowspan="2" valign="bottom">
              
              <center>
                <input type="submit" name="Submit" value="确定"  title="确定">
                &nbsp;
                <input type="reset" name="Submit2" value="重输"  title="重输">
              </center>
            </td></tr>
          <tr>
            <td height="25">
              
              <center>
                <input name="UserName" size="15" font face="宋体" style="font-size: 9pt; background-color:#FEEBE4">
              </center>
            </td>
            <td width="131">
              
              <center>
                <input type="password" name="Passwd" size="15" font face="宋体" style="font-size: 9pt; background-color:#FEEBE4">
              </center>
            </td><td width="174"><center>
            </center>
            <div align="center">
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
                <input type="text" name="verifycode" size="15" font face="宋体" style="font-size: 9pt; background-color:#FEEBE4">
                <b><span><font color=#000000><%=getcode1()%></font></span></b> </div></td>
          </tr>
        </table>
        <center>
        </center>
      </td>
    </tr>
    <tr>
      <td><div align="center"><img src="IMAGES/login_04.gif" width="533" height="23"></div></td>
    </tr>
    <tr>
      <td height="63" background="IMAGES/login_05.gif"><center>
        版权所有：嘉鱼政务网
      </center>
      
      
      </td>
    </tr>
  </table>
</form>
</body>
</html>