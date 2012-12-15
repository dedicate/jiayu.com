<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
require("../../class/user.php");
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
CheckLevel($logininid,$loginin,$classid,"member");

//��̨�����Ա
function admin_ClearMember($add,$logininid,$loginin){
	global $empire,$user_tablename,$user_username,$user_userid,$dbtbpre,$level_r,$user_group,$user_email,$user_checked,$user_registertime,$user_register,$user_group,$user_userfen,$user_money;
    CheckLevel($logininid,$loginin,$classid,"member");//��֤Ȩ��
	//��������
	$username=RepPostVar($add['username']);
	$email=RepPostStr($add['email']);
	$startuserid=(int)$add['startuserid'];
	$enduserid=(int)$add['enduserid'];
	$groupid=(int)$add['groupid'];
	$startregtime=RepPostVar($add['startregtime']);
	$endregtime=RepPostVar($add['endregtime']);
	$startuserfen=(int)$add['startuserfen'];
	$enduserfen=(int)$add['enduserfen'];
	$startmoney=(int)$add['startmoney'];
	$endmoney=(int)$add['endmoney'];
	$checked=(int)$add['checked'];
	$where='';
	if($username)
	{
		$where.=" and ".$user_username." like '%$username%'";
	}
	if($email)
	{
		$where.=" and ".$user_email." like '%$email%'";
	}
	if($enduserid)
	{
		$where.=' and '.$user_userid.' BETWEEN '.$startuserid.' and '.$enduserid;
	}
	if($groupid)
	{
		$where.=" and ".$user_group."='$groupid'";
	}
	if($startregtime&&$endregtime)
	{
		if($user_register)
		{
			$startregtime=to_time($startregtime);
			$endregtime=to_time($endregtime);
		}
		$where.=" and ".$user_registertime.">='$startregtime' and ".$user_registertime."<='$endregtime'";
	}
	if($enduserfen)
	{
		$where.=' and '.$user_userfen.' BETWEEN '.$startuserfen.' and '.$enduserfen;
	}
	if($endmoney)
	{
		$where.=' and '.$user_money.' BETWEEN '.$startmoney.' and '.$endmoney;
	}
	if($checked)
	{
		$checkval=$checked==1?1:0;
		$where.=" and ".$user_checked."='$checkval'";
	}
    if(!$where)
	{
		 printerror("EmptyClearMember","history.go(-1)");
	}
	$where=substr($where,5);
	$sql=$empire->query("select ".$user_userid.",".$user_username.",".$user_group." from ".$user_tablename." where ".$where);
	$dh='';
	$inid='';
	while($r=$empire->fetch($sql))
	{
		$euid=$r[$user_userid];
		//ɾ������Ϣ
		$dousername=doUtfAndGbk($r[$user_username],1);
		//ɾ�����ӱ�
		$fid=GetMemberFormId($r[$user_group]);
		DoDelMemberF($fid,$euid,$dousername);
		$empire->query("delete from {$dbtbpre}enewsqmsg where to_username='".$dousername."'");
		//����
		$inid.=$dh.$euid;
		$dh=',';
    }
	if($inid)
	{
		$addw=$user_userid." in (".$inid.")";
		$addaw="userid in (".$inid.")";
		$sql=$empire->query("delete from ".$user_tablename." where ".$addw);
		//ɾ���ղ�
		$del=$empire->query("delete from {$dbtbpre}enewsfava where ".$addaw);
		$del=$empire->query("delete from {$dbtbpre}enewsfavaclass where ".$addaw);
		//ɾ�������¼
		$del=$empire->query("delete from {$dbtbpre}enewsbuybak where ".$addaw);
		//ɾ�����ؼ�¼
		$del=$empire->query("delete from {$dbtbpre}enewsdownrecord where ".$addaw);
		//ɾ�����Ѽ�¼
		$del=$empire->query("delete from {$dbtbpre}enewshy where ".$addaw);
		$del=$empire->query("delete from {$dbtbpre}enewshyclass where ".$addaw);
		//ɾ������
		$del=$empire->query("delete from {$dbtbpre}enewsmembergbook where ".$addaw);
		//ɾ������
		$del=$empire->query("delete from {$dbtbpre}enewsmemberfeedback where ".$addaw);
	}
	insert_dolog("");//������־
	printerror("DelMemberSuccess","ClearMember.php");
}

$enews=$_POST['enews'];
if($enews=='ClearMember')
{
	@set_time_limit(0);
	admin_ClearMember($_POST,$logininid,$loginin);
}

//��Ա��
$group='';
$sql=$empire->query("select groupid,groupname from {$dbtbpre}enewsmembergroup order by level");
while($level_r=$empire->fetch($sql))
{
	$group.="<option value=".$level_r[groupid].">".$level_r[groupname]."</option>";
}
db_close();
$empire=null;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�����Ա</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<script src="../ecmseditor/fieldfile/setday.js"></script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td>λ�ã�<a href=ListMember.php>�����Ա</a>&nbsp;>&nbsp;�����Ա</td>
  </tr>
</table>
<form name="form1" method="post" action="ClearMember.php" onsubmit="return confirm('ȷ��Ҫɾ��?');">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header"> 
      <td height="25" colspan="2">�����Ա
        <input name="enews" type="hidden" id="enews" value="ClearMember"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="20%" height="25">�û��������ַ���</td>
      <td width="80%" height="25"><input name=username type=text id="username"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">�����ַ�����ַ���</td>
      <td height="25"><input name=email type=text id="email"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">�û�ID ���ڣ�</td>
      <td height="25"><input name="startuserid" type="text" id="startuserid">
        -- 
        <input name="enduserid" type="text" id="enduserid"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" valign="top">������Ա�飺</td>
      <td height="25"><select name="groupid" id="groupid">
          <option value="0">����</option>
          <?=$group?>
        </select></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" valign="top">ע��ʱ�� ���ڣ�</td>
      <td height="25"><input name="startregtime" type="text" id="startregtime" onclick="setday(this)">
        -- 
        <input name="endregtime" type="text" id="endregtime" onclick="setday(this)">
        <font color="#666666">(��ʽ��2011-01-27)</font></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25">���� ���ڣ�</td>
      <td height="25"><input name="startuserfen" type="text" id="startuserfen">
        -- 
        <input name="enduserfen" type="text" id="enduserfen"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25">�ʻ���� ���ڣ�</td>
      <td height="25"><input name="startmoney" type="text" id="startmoney">
        -- 
        <input name="endmoney" type="text" id="endmoney"></td>
    </tr>
	<tr bgcolor="#FFFFFF"> 
      <td height="25">�Ƿ���ˣ�</td>
      <td height="25"><input name="checked" type="radio" value="0" checked>
        ���� 
        <input name="checked" type="radio" value="1">
        ����˻�Ա 
        <input name="checked" type="radio" value="2">
        δ��˻�Ա</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">&nbsp;</td>
      <td height="25"><input type="submit" name="Submit" value="ɾ����Ա">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
