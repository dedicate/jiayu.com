<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//��֤�û�
$lur=is_login();
$logininid=$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];
//��֤Ȩ��
CheckLevel($logininid,$loginin,$classid,"setsafe");
if($do_openonlinesetting==0||$do_openonlinesetting==1)
{
	echo"û�п�����̨�������ò��������Ҫʹ�������������޸�/e/class/config.php�ļ���$do_openonlinesetting�������ÿ���";
	exit();
}

$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
if($enews)
{
	include('setfun.php');
}
if($enews=='SetSafe')
{
	SetSafe($_POST,$logininid,$loginin);
}

db_close();
$empire=null;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��ȫ��������</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td>λ�ã�<a href="SetSafe.php">��ȫ��������</a> 
      <div align="right"> </div></td>
  </tr>
</table>
<form name="setform" method="post" action="SetSafe.php" onsubmit="return confirm('ȷ������?');">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header"> 
      <td height="25" colspan="2">��ȫ�������� 
        <input name="enews" type="hidden" id="enews" value="SetSafe"> </td>
    </tr>
    <tr> 
      <td height="25" colspan="2">��̨��ȫ�������</td>
    </tr>
    <tr> 
      <td width="17%" height="25" bgcolor="#FFFFFF"> <div align="left">��̨��½��֤��</div></td>
      <td width="83%" height="25" bgcolor="#FFFFFF"> <input name="loginauth" type="password" id="loginauth" value="<?=$do_loginauth?>" size="35"> 
        <font color="#666666">(������õ�¼��Ҫ�������֤�����ͨ��)</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <div align="left">��̨��¼COOKIE��֤��</div></td>
      <td height="25" bgcolor="#FFFFFF"> <input name="ecookiernd" type="text" id="ecookiernd" value="<?=$do_ecookiernd?>" size="35">
        <input type="button" name="Submit3" value="���" onclick="document.setform.ecookiernd.value='<?=make_password(36)?>';"> <font color="#666666">(��д10~50�������ַ�����ö����ַ����)</font></td>
    </tr>
    <tr>
      <td height="25" bgcolor="#FFFFFF">��̨�����ļ���֤��½</td>
      <td height="25" bgcolor="#FFFFFF"> <input type="radio" name="ckhloginfile" value="0"<?=$do_ckhloginfile==0?' checked':''?>>
        ���� 
        <input type="radio" name="ckhloginfile" value="1"<?=$do_ckhloginfile==1?' checked':''?>>
        �ر� <font color="#666666">&nbsp;</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">��̨������֤��¼IP</td>
      <td height="25" bgcolor="#FFFFFF"> <input type="radio" name="ckhloginip" value="1"<?=$do_ckhloginip==1?' checked':''?>>
        ���� 
        <input type="radio" name="ckhloginip" value="0"<?=$do_ckhloginip==0?' checked':''?>>
        �ر� <font color="#666666">(���������IP�Ǳ䶯�ģ���Ҫ����)</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">��¼��½��־</td>
      <td height="25" bgcolor="#FFFFFF"> <input type="radio" name="theloginlog" value="0"<?=$do_theloginlog==0?' checked':''?>>
        ���� 
        <input type="radio" name="theloginlog" value="1"<?=$do_theloginlog==1?' checked':''?>>
        �ر�</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">��¼������־</td>
      <td height="25" bgcolor="#FFFFFF"> <input type="radio" name="thedolog" value="0"<?=$do_thedolog==0?' checked':''?>>
        ���� 
        <input type="radio" name="thedolog" value="1"<?=$do_thedolog==1?' checked':''?>>
        �ر�</td>
    </tr>
    <tr> 
      <td height="25" colspan="2">COOKIE����</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">COOKIE������</td>
      <td height="25" bgcolor="#FFFFFF"> <input name="cookiedomain" type="text" id="fw_pass3" value="<?=$phome_cookiedomain?>" size="35"> 
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">COOKIE����·��</td>
      <td height="25" bgcolor="#FFFFFF"><input name="cookiepath" type="text" id="cookiedomain" value="<?=$phome_cookiepath?>" size="35"></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">ǰ̨COOKIE����ǰ׺</td>
      <td height="25" bgcolor="#FFFFFF"><input name="cookievarpre" type="text" id="cookievarpre" value="<?=$phome_cookievarpre?>" size="35"> 
        <font color="#666666">(��Ӣ����ĸ���,5~12���ַ����)</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">��̨COOKIE����ǰ׺</td>
      <td height="25" bgcolor="#FFFFFF"><input name="cookieadminvarpre" type="text" id="cookieadminvarpre" value="<?=$phome_cookieadminvarpre?>" size="35"> 
        <font color="#666666">(��Ӣ����ĸ���,5~12���ַ����)</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">COOKIE��֤�����</td>
      <td height="25" bgcolor="#FFFFFF"> <input name="cookieckrnd" type="text" id="cookieckrnd" value="<?=$phome_cookieckrnd?>" size="35">
        <input type="button" name="Submit32" value="���" onclick="document.setform.cookieckrnd.value='<?=make_password(36)?>';"> 
        <font color="#666666">(��д10~50�������ַ�����ö����ַ����)</font></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"></td>
      <td height="25" bgcolor="#FFFFFF"> <input type="submit" name="Submit" value=" �� �� "> 
        &nbsp;&nbsp;&nbsp; <input type="reset" name="Submit2" value="����"></td>
    </tr>
  </table>
</form>
</body>
</html>
