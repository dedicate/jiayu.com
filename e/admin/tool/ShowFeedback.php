<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
require("../../class/com_functions.php");
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
CheckLevel($logininid,$loginin,$classid,"feedback");
$id=(int)$_GET['id'];
$r=$empire->fetch1("select * from {$dbtbpre}enewsfeedback where id='$id' limit 1");
if(!$r[id])
{
	printerror('ErrorUrl','');
}
$bidr=ReturnAdminFeedbackClass($r['bid'],$logininid,$loginin);
$br=$empire->fetch1("select bname,enter,filef from {$dbtbpre}enewsfeedbackclass where bid='$r[bid]'");
$username="�ο�";
if($r['userid'])
{
	$username="<a href='../member/AddMember.php?enews=EditMember&userid=".$r['userid']."' target=_blank>".$r['username']."</a>";
}
$fpath=0;
$getfpath=0;
$record="<!--record-->";
$field="<!--field--->";
$er=explode($record,$br['enter']);
$count=count($er);
for($i=0;$i<$count-1;$i++)
{
	$er1=explode($field,$er[$i]);
	//����
	if(strstr($br['filef'],",".$er1[1].","))
	{
		if($r[$er1[1]])
		{
			if(!$getfpath)
			{
				$filename=GetFilename($r[$er1[1]]);
				$filer=$empire->fetch1("select fpath from {$dbtbpre}enewsfile where path='$r[filepath]' and filename='$filename' limit 1");
				$fpath=$filer[fpath];
				$getfpath=1;
			}
			$fspath=ReturnFileSavePath(0,$fpath);
			$fileurl=$fspath['fileurl'].$r[$er1[1]];
			$val="<b>������</b><a href='".$fileurl."' target=_blank>".$r[$er1[1]]."</a>";
		}
		else
		{
			$val="";
		}
	}
	else
	{
		$val=$r[$er1[1]];
	}
	$feedbackinfo.="<tr bgcolor='#FFFFFF'><td height=25>".$er1[0].":</td><td>".nl2br($val)."</td></tr>";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�鿴������Ϣ</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class=tableborder>
  <tr class=header> 
    <td height="25" colspan="2">�������ࣺ<?=$br[bname]?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width="19%" height="25">�ύ��:</td>
    <td width="81%" height="25"> 
      <?=$username?>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25">����ʱ��:</td>
    <td height="25"> 
      <?=$r[saytime]?>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25">IP��ַ:</td>
    <td height="25"> 
      <?=$r[ip]?>
    </td>
  </tr>
  <?=$feedbackinfo?>
  <tr bgcolor="#FFFFFF"> 
    <td height="25" colspan="2"><div align="center">[ <a href="javascript:window.close();">�� 
        ��</a> ]</div></td>
  </tr>
</table>
</body>
</html>
<?php
db_close();
$empire=null;
?>