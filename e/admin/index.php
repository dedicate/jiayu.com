<?php
define('EmpireCMSAdmin','1');
define('EmpireCMSAPage','login');
require("../class/connect.php");
require("../class/functions.php");
//���
$loginadminstyleid=EcmsReturnAdminStyle();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���������������Ż���վ</title>
<link rel="stylesheet" href="loginimg/css.css" type="text/css">
<base onmouseover="window.status='���������������Ż���վ';return true">
<script>
if(self!=top)
{
	parent.location.href='index.php';
}
function CheckLogin(obj){
	if(obj.username.value=='')
	{
		alert('�������û���');
		obj.username.focus();
		return false;
	}
	if(obj.password.value=='')
	{
		alert('�������¼����');
		obj.password.focus();
		return false;
	}
	if(obj.loginauth!=null)
	{
		if(obj.loginauth.value=='')
		{
			alert('��������֤��');
			obj.loginauth.focus();
			return false;
		}
	}
	if(obj.key!=null)
	{
		if(obj.key.value=='')
		{
			alert('��������֤��');
			obj.key.focus();
			return false;
		}
	}
	return true;
}
</script>
</head>

<body text="383636" bgcolor="#FFFFFF" onLoad="document.login.username.focus();">
<table width="98" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
    <td height="60">&nbsp;</td>
  </tr>
</table>
<table width="524" border="0" cellspacing="0" cellpadding="0" align="center" height="320">
  <form name="login" id="login" method="post" action="ecmsadmin.php" onSubmit="return CheckLogin(document.login);">
    <input type="hidden" name="enews" value="login">
    <tr> 
      <td width="61" rowspan="3" valign="top"> <TABLE WIDTH=61 height="100%" BORDER=0 CELLPADDING=0 CELLSPACING=0>
          <TR> 
            <TD height="63"> <IMG SRC="loginimg/login_r1_c1_01.jpg" WIDTH=61 HEIGHT=63></TD>
          </TR>
          <TR> 
            <TD height="163" background="loginimg/login_r1_c1_02.jpg">&nbsp; </TD>
          </TR>
          <TR> 
            <TD height="100%" background="loginimg/login_r1_c1_003.jpg">&nbsp;</TD>
          </TR>
          <TR> 
            <TD height="23"> <IMG SRC="loginimg/login_r1_c1_03.jpg" WIDTH=61 HEIGHT=23></TD>
          </TR>
        </TABLE></td>
      <td colspan="3"><img src="loginimg/login_r1_c2.gif" width="463" height="65"></td>
    </tr>
    <tr> 
      <td width="241" valign="top" bgcolor="#FFFFFF"><img src="loginimg/login_r2_c2.gif" width="241" height="104"></td>
      <td width="157" rowspan="2" valign="top" bgcolor="#FFFFFF"> 
        <table width="157" height="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td> <br><br>
              <img src="loginimg/login_r2_c3.gif" width="157" height="184"></td>
          </tr>
          <tr>
            <td height="100%" valign="bottom"> <div align="right"><a href="http://www.jiayu.gov.cn/" target="_blank"><img src="loginimg/homepage.gif" width="79" height="21" border="0"></a></div></td>
          </tr>
        </table> </td>
      <td width="65" rowspan="2" valign="top"> 
        <table width="65" height="100%" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td height="184" background="loginimg/login_r2_c4.gif">&nbsp;</td>
          </tr>
          <tr> 
            <td height="100%" background="loginimg/login_r2_c4_002.jpg">&nbsp;</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr> 
      <td height="80"> <table width="230" height="100%" border="0" align="right" cellpadding="0" cellspacing="0">
          <tr> 
            <td width="50" height="27">�û���: </td>
            <td colspan="2"> <input name="username" type="text" class="b-form2" size="24"> 
            </td>
          </tr>
          <tr> 
            <td height="27">��&nbsp;&nbsp;��:&nbsp;</td>
            <td colspan="2"> <input name="password" type="password" class="b-form2" size="24"> 
            </td>
          </tr>
		  <?php
		  if($do_loginauth)
		  {
		  ?>
          <tr> 
            <td height="27">��֤��:&nbsp;</td>
            <td colspan="2"><input name="loginauth" type="password" id="loginauth" class="b-form2" size="24"></td>
          </tr>
          <?php
		  }
		  ?>
          <tr>
            <td height="27">��&nbsp;&nbsp;��:&nbsp;</td>
            <td colspan="2"><select name="equestion" id="equestion" onChange="if(this.options[this.selectedIndex].value==0){showanswer.style.display='none';}else{showanswer.style.display='';}">
                <option value="0">�ް�ȫ����</option>
                <option value="1">ĸ�׵�����</option>
                <option value="2">үү������</option>
                <option value="3">���׳����ĳ���</option>
                <option value="4">������һλ��ʦ������</option>
                <option value="5">�����˼�������ͺ�</option>
                <option value="6">����ϲ���Ĳ͹�����</option>
                <option value="7">��ʻִ�յ������λ����</option>
              </select></td>
          </tr>
          <tr id="showanswer">
            <td height="27">��&nbsp;&nbsp;��:&nbsp;</td>
            <td colspan="2"><input name="eanswer" type="text" id="eanswer" class="b-form2" size="24"></td>
          </tr>
          <?php
		  if(empty($public_r['adminloginkey']))
		  {
		  ?>
          <tr> 
            <td height="27">��֤��:&nbsp;</td>
            <td width="83"> <input name="key" type="text" class="b-form2" size="9"> 
            </td>
            <td width="97"><img src="ShowKey.php" name="KeyImg" id="KeyImg" align="bottom" onClick="KeyImg.src='ShowKey.php?'+Math.random()" alt="�������,���ˢ��"></td>
          </tr>
          <?php
		  }
		  ?>
          <tr> 
            <td height="27">��&nbsp;&nbsp;��:&nbsp;</td>
            <td colspan="2"><input type="radio" name="adminwindow" value="0" checked>
              ���� 
              <input type="radio" name="adminwindow" value="1">
              ȫ��</td>
          </tr>
          <tr> 
            <td height="27">&nbsp;</td>
            <td colspan="2" valign="bottom"> <input name="imageField" type="image" src="loginimg/login2.gif" width="69" height="21" border="0"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td colspan="4"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="loginimg/login_r4_c1.gif">
          <tr> 
            <td width="111" height="32">&nbsp;</td>
            <td width="111" valign="top">&nbsp;</td>
            <td width="302">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="39" colspan="4" valign="top" bgcolor="ECECEC">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 

            <td height="30" align="center"> Powered by <a href="http://www.jiayu.gov.cn/" target="_blank"><strong>���������������Ż���վ</strong></a> 
              <font color="#FF9900">&copy; 2001-2011 
              </td>

          </tr>
        </table></td>
    </tr>
  </form>
</table>
<script>
if(document.login.equestion.value==0)
{
	showanswer.style.display='none';
}
</script>
</body>
</html>