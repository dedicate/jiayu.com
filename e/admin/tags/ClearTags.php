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
CheckLevel($logininid,$loginin,$classid,"tags");

//�����������
function ClearTags($start,$line,$userid,$username){
	global $empire,$dbtbpre,$class_r,$fun_r;
	$line=(int)$line;
	if(empty($line))
	{
		$line=500;
	}
	$start=(int)$start;
	$b=0;
	$sql=$empire->query("select id,classid,tid,tagid from {$dbtbpre}enewstagsdata where tid>$start order by tid limit ".$line);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$newstart=$r['tid'];
		if(empty($class_r[$r[classid]]['tbname']))
		{
			$empire->query("delete from {$dbtbpre}enewstagsdata where tid='$r[tid]'");
			$empire->query("update {$dbtbpre}enewstags set num=num-1 where tagid='$r[tagid]'");
			continue;
		}
		$nr=$empire->fetch1("select id,classid,infotags from {$dbtbpre}ecms_".$class_r[$r[classid]]['tbname']." where id='$r[id]'");
		if(!$nr['id'])
		{
			$empire->query("delete from {$dbtbpre}enewstagsdata where tid='$r[tid]'");
			$empire->query("update {$dbtbpre}enewstags set num=num-1 where tagid='$r[tagid]'");
		}
		else
		{
			$tagr=$empire->fetch1("select tagname from {$dbtbpre}enewstags where tagid='$r[tagid]'");
			if(!stristr(','.$nr['infotags'].',',','.$tagr['tagname'].','))
			{
				$empire->query("delete from {$dbtbpre}enewstagsdata where tid='$r[tid]'");
				$empire->query("update {$dbtbpre}enewstags set num=num-1 where tagid='$r[tagid]'");
			}
			elseif($nr['classid']!=$r[classid])
			{
				$empire->query("update {$dbtbpre}enewstagsdata set classid='$nr[classid]' where tid='$r[tid]'");
			}
		}
	}
	if(empty($b))
	{
		//������־
		insert_dolog("");
		printerror('ClearTagsSuccess','ClearTags.php');
	}
	echo"<meta http-equiv=\"refresh\" content=\"0;url=ClearTags.php?enews=ClearTags&line=$line&start=$newstart\">".$fun_r[OneClearTagsSuccess]."(ID:<font color=red><b>".$newstart."</b></font>)";
	exit();
}

$enews=$_GET['enews'];
if($enews)
{
	include("../../data/dbcache/class.php");
	include "../".LoadLang("pub/fun.php");
	ClearTags($_GET[start],$_GET[line],$logininid,$loginin);
}

db_close();
$empire=null;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>TAGS</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td>λ�ã�<a href=ListTags.php>����TAGS</a> &gt; �������TAGS��Ϣ</td>
  </tr>
</table>
<form name="tagsclear" method="get" action="ClearTags.php" onsubmit="return confirm('ȷ��Ҫ����?');">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header"> 
      <td height="25" colspan="2">�������TAGS��Ϣ <input name=enews type=hidden value=ClearTags></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="19%" height="25">ÿ����������</td>
      <td width="81%" height="25"><input name="line" type="text" id="line" value="500"> 
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">&nbsp;</td>
      <td height="25"><input type="submit" name="Submit" value="��ʼ����"> <input type="reset" name="Submit2" value="����"></td>
    </tr>
  </table>
</form>
</body>
</html>