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
CheckLevel($logininid,$loginin,$classid,"pltable");
$r=$empire->fetch1("select pldatatbs,pldeftb from {$dbtbpre}enewspublic limit 1");
$tr=explode(',',$r[pldatatbs]);
$url="<a href=ListAllPl.php>��������</a>&nbsp;>&nbsp;<a href=ListPlDataTable.php>�������۷ֱ�</a>";
$datatbname=$dbtbpre.'enewspl_data_';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�������۷ֱ�</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td>λ�ã�<?=$url?></td>
  </tr>
</table>
<form name="adddatatableform" method="post" action="../ecmspl.php" onsubmit="return confirm('ȷ��Ҫ����?');">
  <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header">
      <td>���ӷֱ� 
        <input name="enews" type="hidden" id="enews" value="AddPlDataTable">
      </td>
    </tr>
    <tr> 
      <td bgcolor="#FFFFFF">
        <?=$datatbname?>
        <input name="datatb" type="text" id="datatb" value="0" size="6">
        <input type="submit" name="Submit" value="����">
        <font color="#666666">(����Ҫ������)</font></td>
    </tr>
  </table>
</form>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class="header"> 
    <td width="38%" height="25"><div align="center">����</div></td>
    <td width="33%" height="25"><div align="center">��¼��</div></td>
    <td width="29%" height="25"><div align="center">����</div></td>
  </tr>
  <?
  $count=count($tr)-1;
  $maxtb=0;
  for($i=1;$i<$count;$i++)
  {
  	$total_r=$empire->fetch1("SHOW TABLE STATUS LIKE '".$datatbname.$tr[$i]."';");
	$bgcolor="#ffffff";
	if($tr[$i]==$r['pldeftb'])
	{
		$bgcolor="#DBEAF5";
	}
	if($tr[$i]>$maxtb)
	{
		$maxtb=$tr[$i];
	}
	$dostr="&nbsp;&nbsp;&nbsp;[<a href=\"../ecmspl.php?enews=DelPlDataTable&datatb=".$tr[$i]."\" onclick=\"return confirm('ȷ��Ҫɾ����ɾ����ɾ���������������?');\">ɾ��</a>]";
  ?>
  <tr bgcolor="<?=$bgcolor?>"> 
    <td height="25"> 
      <?=$datatbname?><b><?=$tr[$i]?></b>
    </td>
    <td height="25"><div align="center"> 
        <?=$total_r['Rows']?>
      </div></td>
    <td height="25"><div align="center">[<a href="../ecmspl.php?enews=DefPlDataTable&datatb=<?=$tr[$i]?>" onclick="return confirm('ȷ��Ҫ���������Ϊ��ǰ��ű�?');">��Ϊ��ǰ��ű�</a>]<?=$dostr?></div></td>
  </tr>
  <?
	}
	?>
</table>
<br>
<script>
document.adddatatableform.datatb.value="<?=$maxtb+1?>";
</script>
</body>
</html>
<?
db_close();
$empire=null;
?>
