<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
require("../../data/dbcache/class.php");
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

$ztid=(int)$_GET['ztid'];
if(empty($class_zr[$ztid][zturl]))
{$url=$public_r[newsurl].$class_zr[$ztid][ztpath]."/";}
else
{$url=$class_zr[$ztid][zturl];}
$jspath=$public_r['newsurl'].'d/js/class/zt'.$ztid.'_';
?>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">

<title>���õ�ַ</title><table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class=header> 
    <td height="25">&nbsp;</td>
    <td height="25">���õ�ַ</td>
    <td height="25"> <div align="center">Ԥ��</div></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width="22%" height="25">ר���ַ:</td>
    <td width="71%" height="25"> <input name="textfield" type="text" value="<?=$url?>" size="35"></td>
    <td width="7%" height="25"> <div align="center"><a href="<?=$url?>" target="_blank">Ԥ��</a></div></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25">������ϢJS:</td>
    <td height="25"> <input name="textfield2" type="text" value="<?=$jspath?>newnews.js" size="35"></td>
    <td height="25"> <div align="center"><a href="js.php?classid=<?=$ztid?>&js=<? echo urlencode($jspath."newnews.js");?>" target="_blank">Ԥ��</a></div></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25">������ϢJS:</td>
    <td height="25"> <input name="textfield3" type="text" value="<?=$jspath?>hotnews.js" size="35"></td>
    <td height="25"> <div align="center"><a href="js.php?classid=<?=$ztid?>&js=<? echo urlencode($jspath."hotnews.js");?>" target="_blank">Ԥ��</a></div></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25">�Ƽ���ϢJS:</td>
    <td height="25"> <input name="textfield4" type="text" value="<?=$jspath?>goodnews.js" size="35"></td>
    <td height="25"> <div align="center"><a href="js.php?classid=<?=$ztid?>&js=<? echo urlencode($jspath."goodnews.js");?>" target="_blank">Ԥ��</a></div></td>
  </tr>

  <tr bgcolor="#FFFFFF"> 
    <td height="25">�ȵ�������ϢJS:</td>
    <td height="25"> <input name="textfield4" type="text" value="<?=$jspath?>hotplnews.js" size="35"></td>
    <td height="25"> <div align="center"><a href="js.php?classid=<?=$ztid?>&js=<? echo urlencode($jspath."hotplnews.js");?>" target="_blank">Ԥ��</a></div></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25">ͷ����ϢJS:</td>
    <td height="25"> <input name="textfield4" type="text" value="<?=$jspath?>firstnews.js" size="35"></td>
    <td height="25"> <div align="center"><a href="js.php?classid=<?=$ztid?>&js=<? echo urlencode($jspath."firstnews.js");?>" target="_blank">Ԥ��</a></div></td>
  </tr>
</table>
