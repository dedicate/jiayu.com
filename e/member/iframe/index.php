<?php
require("../../class/connect.php");
if(!defined('InEmpireCMS'))
{
	exit();
}
$myuserid=(int)getcvar('mluserid');
$mhavelogin=0;
if($myuserid)
{
	include("../../class/db_sql.php");
	include("../../class/user.php");
	include("../../data/dbcache/MemberLevel.php");
	$link=db_connect();
	$empire=new mysqlquery();
	$mhavelogin=1;
	//����
	$myusername=RepPostVar(getcvar('mlusername'));
	$myrnd=RepPostVar(getcvar('mlrnd'));
	$r=$empire->fetch1("select ".$user_userid.",".$user_username.",".$user_group.",".$user_userfen.",".$user_money.",".$user_userdate.",".$user_havemsg.",".$user_checked." from ".$user_tablename." where ".$user_userid."='$myuserid' and ".$user_rnd."='$myrnd' limit 1");
	if(empty($r[$user_userid])||$r[$user_checked]==0)
	{
		EmptyEcmsCookie();
		$mhavelogin=0;
	}
	//��Ա�ȼ�
	if(empty($r[$user_group]))
	{$groupid=$user_groupid;}
	else
	{$groupid=$r[$user_group];}
	$groupname=$level_r[$groupid]['groupname'];
	//����
	$userfen=$r[$user_userfen];
	//���
	$money=$r[$user_money];
	//����
	$userdate=0;
	if($r[$user_userdate])
	{
		$userdate=$r[$user_userdate]-time();
		if($userdate<=0)
		{$userdate=0;}
		else
		{$userdate=round($userdate/(24*3600));}
	}
	//�Ƿ��ж���Ϣ
	$havemsg="";
	if($r[$user_havemsg])
	{
		$havemsg="<a href='".$public_r['newsurl']."e/member/msg/' target=_blank><font color=red>��������Ϣ</font></a>";
	}
	//$myusername=$r[$user_username];
	db_close();
	$empire=null;
}
if($mhavelogin==1)
{
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��½</title>
<LINK href="../../data/images/qcss.css" rel=stylesheet>
</head>
<body bgcolor="#ededed" topmargin="0">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
	<td height="23" align="center">
	<div align="left">
		&raquo;&nbsp;<font color=red><b><?=$myusername?></b></font>&nbsp;&nbsp;<a href="../my/" target="_parent"><?=$groupname?></a>&nbsp;<?=$havemsg?>&nbsp;<a href="http://www.jiayu.gov.cn/e/space/?userid=<?=$myuserid?>" target=_blank>�ҵĿռ�</a>&nbsp;&nbsp;<a href="../msg/" target=_blank>����Ϣ</a>&nbsp;&nbsp;<a href="../fava/" target=_blank>�ղؼ�</a>&nbsp;&nbsp;<a href="../cp/" target="_parent">�������</a>&nbsp;&nbsp;<a href="../../enews/?enews=exit&prtype=9" onclick="return confirm('ȷ��Ҫ�˳�?');">�˳�</a> 
	</div>
	</td>
    </tr>
</table>
</body>
</html>
<?
}
else
{
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��½</title>
<LINK href="../../data/images/qcss.css" rel=stylesheet>
</head>
<body bgcolor="#ededed" topmargin="0">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <form name=login method=post action="../../enews/index.php">
    <input type=hidden name=enews value=login>
    <input type=hidden name=prtype value=1>
    <tr> 
      <td height="23" align="center">
      <div align="left">
      �û�����<input name="username" type="text" size="8">&nbsp;
      ���룺<input name="password" type="password" size="8">
      <select name="lifetime" id="lifetime">
         <option value="0">������</option>
         <option value="3600">һСʱ</option>
         <option value="86400">һ��</option>
         <option value="2592000">һ����</option>
         <option value="315360000">����</option>
      </select>&nbsp;
      <input type="submit" name="Submit" value="��½">&nbsp;
      <input type="button" name="Submit2" value="ע��" onclick="window.open('../register/');">
      </div>
      </td>
    </tr>
  </form>
</table>
</body>
</html>

<?
}
?>