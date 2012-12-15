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
CheckLevel($logininid,$loginin,$classid,"infotype");

//���ӷ���
function AddInfoType($add,$userid,$username){
	global $empire,$dbtbpre;
	$tid=(int)$add['tid'];
	$tbname=RepPostVar($add['tbname']);
	$mid=(int)$add[mid];
	if(!$tid||!$tbname||!$mid||!$add[tname])
	{
		printerror("EmptyInfoTypeName","history.go(-1)");
    }
	$myorder=(int)$add['myorder'];
	$yhid=(int)$add['yhid'];
	$sql=$empire->query("insert into {$dbtbpre}enewsinfotype(tname,mid,myorder,yhid) values('$add[tname]','$mid','$myorder','$yhid');");
	$typeid=$empire->lastid();
	GetClass();//���»���
	if($sql)
	{
		//������־
	    insert_dolog("typeid=".$typeid."<br>tname=".$add[tname]);
		printerror("AddInfoTypeSuccess","InfoType.php?tid=$tid&tbname=$tbname&mid=$mid");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//�޸ķ���
function EditInfoType($add,$userid,$username){
	global $empire,$dbtbpre,$emod_r;
	$tid=(int)$add['tid'];
	$tbname=RepPostVar($add['tbname']);
	$mid=(int)$add[mid];
	$typeid=$add['typeid'];
	$tname=$add['tname'];
	$myorder=$add['myorder'];
	$yhid=$add['yhid'];
	$deltypeid=$add['deltypeid'];
	$count=count($typeid);
	if(!$tid||!$tbname||!$mid||!$count)
	{
		printerror("EmptyInfoTypeName","history.go(-1)");
    }
	//ɾ��
	$del=0;
	$ids='';
	$delcount=count($deltypeid);
	if($delcount)
	{
		$dh='';
		for($j=0;$j<$delcount;$j++)
		{
			$ids.=$dh.intval($deltypeid[$j]);
			$dh=',';
		}
		$empire->query("delete from {$dbtbpre}enewsinfotype where typeid in (".$ids.")");
		if($emod_r[$mid][tbname])
		{
			$empire->query("update {$dbtbpre}ecms_".$emod_r[$mid][tbname]." set ttid=0 where ttid in (".$ids.")");
		}
		$del=1;
	}
	//�޸�
	for($i=0;$i<$count;$i++)
	{
		if(strstr(','.$ids.',',','.$typeid[$i].','))
		{
			continue;
		}
		$empire->query("update {$dbtbpre}enewsinfotype set tname='".$tname[$i]."',myorder='".intval($myorder[$i])."',yhid='".intval($yhid[$i])."' where typeid='".intval($typeid[$i])."'");
	}
	GetClass();//���»���
	//������־
	insert_dolog("mid=".$mid."&del=$del");
	printerror("EditInfoTypeSuccess","InfoType.php?tid=$tid&tbname=$tbname&mid=$mid");
}

$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
if($enews=="AddInfoType")//���ӷ���
{
	AddInfoType($_POST,$logininid,$loginin);
}
elseif($enews=="EditInfoType")//�޸ķ���
{
	EditInfoType($_POST,$logininid,$loginin);
}

$tid=(int)$_GET['tid'];
$tbname=RepPostVar($_GET['tbname']);
$mid=(int)$_GET['mid'];
if(!$tid||!$tbname||!$mid)
{
	printerror("ErrorUrl","history.go(-1)");
}
$url="���ݱ�:[".$dbtbpre."ecms_".$tbname."]&nbsp;>&nbsp;<a href=ListM.php?tid=$tid&tbname=$tbname>ϵͳģ�͹���</a>&nbsp;>&nbsp;<a href=ListM.php?tid=$tid&tbname=$tbname>ģ��:[".$emod_r[$mid][mname]."]</a>&nbsp;>&nbsp;����������";
$sql=$empire->query("select typeid,tname,myorder,yhid from {$dbtbpre}enewsinfotype where mid='$mid' order by myorder,typeid");
//�Ż�����
$yh_options='';
$yhsql=$empire->query("select id,yhname from {$dbtbpre}enewsyh order by id");
while($yhr=$empire->fetch($yhsql))
{
	$yh_options.="<option value='".$yhr[id]."'>".$yhr[yhname]."</option>";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�������</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td>λ�ã�<?=$url?>
      </td>
  </tr>
</table>
<form name="form1" method="post" action="InfoType.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header">
      <td height="25">���ӱ������: 
        <input name=enews type=hidden id="enews" value=AddInfoType>
        <input name="tid" type="hidden" id="tid" value="<?=$tid?>">
        <input name="tbname" type="hidden" id="tbname" value="<?=$tbname?>">
        <input name="mid" type="hidden" id="mid" value="<?=$mid?>"></td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> �������ƣ�
<input name="tname" type="text">
        �Ż�������
        <select name="yhid" id="yhid">
          <option name="0">��ʹ��</option>
          <?=$yh_options?>
        </select>
        ���� 
        <input name="myorder" type="text" id="myorder" size="6"> 
        <input type="submit" name="Submit" value="����">
        <input type="reset" name="Submit2" value="����"></td>
    </tr>
  </table>
</form>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="form2" method="post" action="InfoType.php" onsubmit="return confirm('ȷ��Ҫ�ύ?');">
    <input name="tid" type="hidden" id="tid" value="<?=$tid?>">
    <input name="tbname" type="hidden" id="tbname" value="<?=$tbname?>">
    <input name="mid" type="hidden" id="mid" value="<?=$mid?>">
    <tr class="header"> 
      <td width="6%"><div align="center">ID</div></td>
      <td width="7%"><div align="center">����</div></td>
      <td width="37%" height="25"><div align="center">��������</div></td>
      <td width="41%"><div align="center">�Ż�����</div></td>
      <td width="9%" height="25"><div align="center">ɾ��</div></td>
    </tr>
    <?php
  while($r=$empire->fetch($sql))
  {
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td><div align="center"> 
          <?=$r[typeid]?>
          <input name="typeid[]" type="hidden" id="typeid[]" value="<?=$r[typeid]?>">
        </div></td>
      <td><div align="center"> 
          <input name="myorder[]" type="text" id="myorder[]" value="<?=$r[myorder]?>" size="6">
        </div></td>
      <td height="25"> <div align="center"> 
          <input name="tname[]" type="text" id="tname[]" value="<?=$r[tname]?>">
        </div></td>
      <td><div align="center">
          <select name="yhid[]" id="yhid[]">
            <option name="0">��ʹ��</option>
            <?=str_replace("<option value='".$r[yhid]."'>","<option value='".$r[yhid]."' selected>",$yh_options)?>
          </select>
        </div></td>
      <td height="25"><div align="center"> 
          <input name="deltypeid[]" type="checkbox" id="deltypeid[]" value="<?=$r[typeid]?>">
        </div></td>
    </tr>
    <?
  }
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td>&nbsp;</td>
      <td height="25" colspan="4"><input type="submit" name="Submit5" value="�� ��"> 
        &nbsp;&nbsp; <input type="reset" name="Submit6" value="����"> <input name="enews" type="hidden" id="enews" value="EditInfoType"> 
        &nbsp; <font color="#666666">(����ֵԽСԽǰ��)</font></td>
    </tr>
  </form>
</table>
</body>
</html>
<?php
db_close();
$empire=null;
?>