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
CheckLevel($logininid,$loginin,$classid,"firewall");
if($do_openonlinesetting==0||$do_openonlinesetting==2)
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
if($enews=='SetFirewall')
{
	SetFirewall($_POST,$logininid,$loginin);
}

db_close();
$empire=null;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��վ����ǽ</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td>λ�ã�<a href="SetFirewall.php">��վ����ǽ</a> 
      <div align="right"> </div></td>
  </tr>
</table>
<form name="setform" method="post" action="SetFirewall.php" onsubmit="return confirm('ȷ������?');">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header"> 
      <td height="25" colspan="2">��վ����ǽ <input name="enews" type="hidden" id="enews" value="SetFirewall"> 
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25"><div align="left">��������ǽ</div></td>
      <td height="25"><input type="radio" name="fw_open" value="1"<?=$efw_open==1?' checked':''?>>
        ���� 
        <input type="radio" name="fw_open" value="0"<?=$efw_open==0?' checked':''?>>
        �ر�</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="17%" height="25"><div align="left">����ǽ������Կ</div></td>
      <td width="83%" height="25"><input name="fw_pass" type="text" id="fw_pass" value="<?=$efw_pass?>" size="35">
        <font color="#666666">
        <input type="button" name="Submit3" value="���" onclick="document.setform.fw_pass.value='<?=make_password(36)?>';">
        (��д10~50�������ַ�����ö����ַ����)</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" valign="top">
<div align="left">�����̨��½������</div></td>
      <td height="25"><input name="fw_adminloginurl" type="text" id="fw_adminloginurl" value="<?=$efw_adminloginurl?>" size="35">
        <font color="#666666"><br>
        (���ú����ͨ������������ܷ��ʺ�̨���磺http://admin.phome.net)</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">�����½��̨��ʱ���<br> <font color="#666666">(��ѡΪ������)</font></td>
      <td height="25"><table width="500" border="0" cellspacing="1" cellpadding="3">
          <tr> 
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="0"<?=strstr(','.$efw_adminhour.',',',0,')?' checked':''?>>
              0��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="1"<?=strstr(','.$efw_adminhour.',',',1,')?' checked':''?>>
              1��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="2"<?=strstr(','.$efw_adminhour.',',',2,')?' checked':''?>>
              2��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="3"<?=strstr(','.$efw_adminhour.',',',3,')?' checked':''?>>
              3��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="4"<?=strstr(','.$efw_adminhour.',',',4,')?' checked':''?>>
              4��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="5"<?=strstr(','.$efw_adminhour.',',',5,')?' checked':''?>>
              5��</td>
          </tr>
          <tr> 
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="6"<?=strstr(','.$efw_adminhour.',',',6,')?' checked':''?>>
              6��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="7"<?=strstr(','.$efw_adminhour.',',',7,')?' checked':''?>>
              7��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="8"<?=strstr(','.$efw_adminhour.',',',8,')?' checked':''?>>
              8��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="9"<?=strstr(','.$efw_adminhour.',',',9,')?' checked':''?>>
              9��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="10"<?=strstr(','.$efw_adminhour.',',',10,')?' checked':''?>>
              10��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="11"<?=strstr(','.$efw_adminhour.',',',11,')?' checked':''?>>
              11��</td>
          </tr>
          <tr> 
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="12"<?=strstr(','.$efw_adminhour.',',',12,')?' checked':''?>>
              12��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="13"<?=strstr(','.$efw_adminhour.',',',13,')?' checked':''?>>
              13��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="14"<?=strstr(','.$efw_adminhour.',',',14,')?' checked':''?>>
              14��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="15"<?=strstr(','.$efw_adminhour.',',',15,')?' checked':''?>>
              15��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="16"<?=strstr(','.$efw_adminhour.',',',16,')?' checked':''?>>
              16��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="17"<?=strstr(','.$efw_adminhour.',',',17,')?' checked':''?>>
              17��</td>
          </tr>
          <tr> 
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="18"<?=strstr(','.$efw_adminhour.',',',18,')?' checked':''?>>
              18��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="19"<?=strstr(','.$efw_adminhour.',',',19,')?' checked':''?>>
              19��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="20"<?=strstr(','.$efw_adminhour.',',',20,')?' checked':''?>>
              20��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="21"<?=strstr(','.$efw_adminhour.',',',21,')?' checked':''?>>
              21��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="22"<?=strstr(','.$efw_adminhour.',',',22,')?' checked':''?>>
              22��</td>
            <td><input name="fw_adminhour[]" type="checkbox" id="fw_adminhour[]" value="23"<?=strstr(','.$efw_adminhour.',',',23,')?' checked':''?>>
              23��</td>
          </tr>
        </table></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">�����½��̨������<br> <font color="#666666">(��ѡΪ������)</font> </td>
      <td height="25"><table width="500" border="0" cellspacing="1" cellpadding="3">
          <tr> 
            <td><input name="fw_adminweek[]" type="checkbox" id="fw_adminweek[]" value="1"<?=strstr(','.$efw_adminweek.',',',1,')?' checked':''?>>
              ����һ</td>
            <td><input name="fw_adminweek[]" type="checkbox" id="fw_adminweek[]" value="2"<?=strstr(','.$efw_adminweek.',',',2,')?' checked':''?>>
              ���ڶ�</td>
            <td><input name="fw_adminweek[]" type="checkbox" id="fw_adminweek[]" value="3"<?=strstr(','.$efw_adminweek.',',',3,')?' checked':''?>>
              ������</td>
            <td><input name="fw_adminweek[]" type="checkbox" id="fw_adminweek[]" value="4"<?=strstr(','.$efw_adminweek.',',',4,')?' checked':''?>>
              ������</td>
          </tr>
          <tr> 
            <td><input name="fw_adminweek[]" type="checkbox" id="fw_adminweek[]" value="5"<?=strstr(','.$efw_adminweek.',',',5,')?' checked':''?>>
              ������</td>
            <td><input name="fw_adminweek[]" type="checkbox" id="fw_adminweek[]" value="6"<?=strstr(','.$efw_adminweek.',',',6,')?' checked':''?>>
              ������</td>
            <td><input name="fw_adminweek[]" type="checkbox" id="fw_adminweek[]" value="0"<?=strstr(','.$efw_adminweek.',',',0,')?' checked':''?>>
              ������</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">����ǽ��̨Ԥ��½��֤������</td>
      <td height="25"><input name="fw_adminckpassvar" type="text" id="fw_pass3" value="<?=$efw_adminckpassvar?>" size="35">
        <font color="#666666">(��Ӣ����ĸ���,5~20���ַ����)</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">����ǽ��̨Ԥ��½��֤��</td>
      <td height="25"><input name="fw_adminckpassval" type="text" id="fw_adminckpassval" value="<?=$efw_adminckpassval?>" size="35">
        <font color="#666666">
        <input type="button" name="Submit32" value="���" onclick="document.setform.fw_adminckpassval.value='<?=make_password(36)?>';">
        (��д10~50�������ַ�����ö����ַ����)</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">
<div align="left">�����ύ�����ַ�<br>
          <font color="#666666">(����ð�Ƕ��Ÿ�;<br>
          ��������ǰ̨�����ύ���ݼ���̨��½����)</font></div></td>
      <td height="25"><textarea name="fw_cleargettext" cols="80" rows="8" style="WIDTH: 100%" id="fw_cleargettext"><?=htmlspecialchars($efw_cleargettext)?></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25"></td>
      <td height="25"><input type="submit" name="Submit" value=" �� �� "> &nbsp;&nbsp;&nbsp; 
        <input type="reset" name="Submit2" value="����"></td>
    </tr>
  </table>
</form>
</body>
</html>
