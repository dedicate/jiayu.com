<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
require "../".LoadLang("pub/fun.php");
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
CheckLevel($logininid,$loginin,$classid,"card");

//���ӵ㿨
function AddCard($add,$userid,$username){
	global $empire,$dbtbpre;
	if(!$add[card_no]||!$add[password]||!$add[money])
	{printerror("EmptyCard","history.go(-1)");}
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"card");
	$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewscard where card_no='$add[card_no]' limit 1");
	if($num)
	{printerror("ReCard","history.go(-1)");}
	$cardtime=date("Y-m-d H:i:s");
	$add[cardfen]=(int)$add[cardfen];
	$add[money]=(int)$add[money];
	$add[carddate]=(int)$add[carddate];
	$add[cdgroupid]=(int)$add[cdgroupid];
	$add[cdzgroupid]=(int)$add[cdzgroupid];
	$sql=$empire->query("insert into {$dbtbpre}enewscard(card_no,password,cardfen,money,cardtime,endtime,carddate,cdgroupid,cdzgroupid) values('$add[card_no]','$add[password]',$add[cardfen],$add[money],'$cardtime','$add[endtime]',$add[carddate],$add[cdgroupid],$add[cdzgroupid]);");
	$cardid=$empire->lastid();
	if($sql)
	{
		//������־
	    insert_dolog("cardid=$cardid&card_no=$add[card_no]&cardfen=$add[cardfen]&carddate=$add[carddate]");
		printerror("AddCardSuccess","AddCard.php?enews=AddCard");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//�������ӵ㿨
function AddMoreCard($add,$userid,$username){
	global $empire,$dbtbpre;
	$donum=(int)$add['donum'];
	$cardnum=(int)$add['cardnum'];
	$passnum=(int)$add['passnum'];
	$add[cardfen]=(int)$add[cardfen];
	$add[money]=(int)$add[money];
	$add[carddate]=(int)$add[carddate];
	$add[cdgroupid]=(int)$add[cdgroupid];
	$add[cdzgroupid]=(int)$add[cdzgroupid];
	if(!$donum||!$cardnum||!$passnum||!$add[money])
	{printerror("EmptyMoreCard","history.go(-1)");}
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"card");
	$cardtime=date("Y-m-d H:i:s");
	//д�뿨��
	$no=1;
    while($no<=$donum)
	{
		$card_no=strtolower(no_make_password($cardnum));
		$password=strtolower(no_make_password($passnum));
		$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewscard where card_no='$card_no' limit 1");
		if(!$num)
		{
			$sql=$empire->query("insert into {$dbtbpre}enewscard(card_no,password,cardfen,money,cardtime,endtime,carddate,cdgroupid,cdzgroupid) values('$card_no','$password',$add[cardfen],$add[money],'$cardtime','$add[endtime]',$add[carddate],$add[cdgroupid],$add[cdzgroupid]);");
			$no+=1;
	    }
    }
	if($sql)
	{
		//������־
		insert_dolog("cardnum=$donum&cardfen=$add[cardfen]&carddate=$add[carddate]");
		printerror("AddMoreCardSuccess","AddMoreCard.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//�޸ĵ㿨
function EditCard($add,$userid,$username){
	global $empire,$time,$dbtbpre;
	$add[cardid]=(int)$add[cardid];
	if(!$add[card_no]||!$add[password]||!$add[money]||!$add[cardid])
	{printerror("EmptyCard","history.go(-1)");}
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"card");
	$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewscard where card_no='$add[card_no]' and cardid<>".$add[cardid]." limit 1");
	if($num)
	{printerror("ReCard","history.go(-1)");}
	$add[cardfen]=(int)$add[cardfen];
	$add[money]=(int)$add[money];
	$add[carddate]=(int)$add[carddate];
	$add[cdgroupid]=(int)$add[cdgroupid];
	$add[cdzgroupid]=(int)$add[cdzgroupid];
	$sql=$empire->query("update {$dbtbpre}enewscard set card_no='$add[card_no]',password='$add[password]',cardfen=$add[cardfen],money=$add[money],endtime='$add[endtime]',carddate=$add[carddate],cdgroupid=$add[cdgroupid],cdzgroupid=$add[cdzgroupid] where cardid='$add[cardid]'");
	if($sql)
	{
		//������־
	    insert_dolog("cardid=$add[cardid]&card_no=$add[card_no]&cardfen=$add[cardfen]&carddate=$add[carddate]");
		printerror("EditCardSuccess","ListCard.php?time=$time");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//ɾ���㿨
function DelCard($cardid,$userid,$username){
	global $empire,$time,$dbtbpre;
	$cardid=(int)$cardid;
	if(!$cardid)
	{printerror("NotChangeCardid","history.go(-1)");}
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"card");
	$r=$empire->fetch1("select card_no,cardfen,carddate from {$dbtbpre}enewscard where cardid='$cardid'");
	$sql=$empire->query("delete from {$dbtbpre}enewscard where cardid='$cardid'");
	if($sql)
	{
		//������־
		insert_dolog("cardid=$cardid&card_no=$r[card_no]&cardfen=$r[cardfen]&carddate=$r[carddate]");
		printerror("DelCardSuccess","ListCard.php?time=$time");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//����ɾ���㿨
function DelCard_all($add,$userid,$username){
	global $empire,$time,$dbtbpre;
	$cardid=$add[cardid];
	$count=count($cardid);
	if(!$count)
	{
		printerror("NotChangeCardid","history.go(-1)");
	}
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"card");
	$ids='';
	$dh='';
	for($i=0;$i<$count;$i++)
	{
		$ids.=$dh.intval($cardid[$i]);
		$dh=',';
	}
	$sql=$empire->query("delete from {$dbtbpre}enewscard where cardid in (".$ids.")");
	if($sql)
	{
		//������־
		insert_dolog("");
		printerror("DelCardSuccess","ListCard.php?time=$add[time]");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
//���ӵ㿨
if($enews=="AddCard")
{
	$add=$_POST['add'];
	AddCard($add,$logininid,$loginin);
}
//�޸ĵ㿨
elseif($enews=="EditCard")
{
	$time=$_POST['time'];
	$add=$_POST['add'];
	EditCard($add,$logininid,$loginin);
}
//ɾ���㿨
elseif($enews=="DelCard")
{
	$time=$_POST['time'];
	$cardid=$_GET['cardid'];
	DelCard($cardid,$logininid,$loginin);
}
elseif($enews=="AddMoreCard")//�������ӵ㿨
{
	$add=$_POST;
	AddMoreCard($add,$logininid,$loginin);
}
elseif($enews=="DelCard_all")//����ɾ���㿨
{
	DelCard_all($_POST,$logininid,$loginin);
}

$time=$_GET['time'];
if(empty($time))
{$time=$_POST['time'];}
$page=(int)$_GET['page'];
$start=0;
$line=25;
$page_line=25;
$add="";
//����
$sear=$_POST['sear'];
if(empty($sear))
{$sear=$_GET['sear'];}
if($sear)
{
	$show=$_POST['show'];
	if(empty($show))
	{$show=$_GET['show'];}
	$keyboard=$_POST['keyboard'];
	if(empty($keyboard))
	{$keyboard=$_GET['keyboard'];}
	$keyboard=RepPostVar2($keyboard);
	if($show==1)
	{$add=" where card_no like '%$keyboard%'";}
	elseif($show==2)
	{$add=" where money='$keyboard'";}
	elseif($show==3)
	{$add=" where cardfen='$keyboard'";}
	else
	{$add=" where carddate='$keyboard'";}
	$search="&sear=1&show=$show&keyboard=$keyboard";
}
//����
if($time)
{
	$today=date("Y-m-d");
	$search.="&time=$time";
	if($add)
	{$add.=" and endtime<>'0000-00-00' and endtime<'$today'";}
	else
	{$add.=" where endtime<>'0000-00-00' and endtime<'$today'";}
}
$offset=$line*$page;
$totalquery="select count(*) as total from {$dbtbpre}enewscard".$add;
$num=$empire->gettotal($totalquery);
$query="select cardid,card_no,password,cardfen,money,endtime,cardtime,carddate from {$dbtbpre}enewscard".$add;
$query.=" order by cardid desc limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page2($num,$line,$page_line,$start,$page,$search);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�����㿨</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<script>
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
  }
</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td width="50%">λ�ã�<a href="ListCard.php">�����㿨</a></td>
    <td><div align="right" class="emenubutton">
        <input type="button" name="Submit5" value="���ӵ㿨" onclick="self.location.href='AddCard.php?enews=AddCard';">
		&nbsp;&nbsp;
        <input type="button" name="Submit52" value="�������ӵ㿨" onclick="self.location.href='AddMoreCard.php';">
		&nbsp;&nbsp;
        <input type="button" name="Submit53" value="�������ڵ㿨" onclick="self.location.href='ListCard.php?time=1';">
      </div></td>
  </tr>
</table>
<br>
<table width="100%" border="0" cellpadding="0" cellspacing="1">
  <form name=search method=get action=ListCard.php>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="6"> ������ 
        <input name="keyboard" type="text" id="keyboard"> <select name="show" id="show">
          <option value="1">����</option>
          <option value="2">���</option>
          <option value="3">����</option>
          <option value="4">����</option>
        </select> <input type="submit" name="Submit" value="����"> <input name="sear" type="hidden" id="sear" value="1"> 
        <input name="time" type="hidden" id="time" value="<?=$time?>"> </td>
    </tr>
	</form>
</table>
  
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="tableborder">
  <form name="listcardform" method="post" action="ListCard.php" onsubmit="return confirm('ȷ��Ҫɾ��?');">
    <input type="hidden" name="enews" value="DelCard_all">
	<input name="time" type="hidden" id="time" value="<?=$time?>">
    <tr class="header"> 
      <td width="4%"><div align="center"></div></td>
      <td width="7%" height="25"> <div align="center">ID</div></td>
      <td width="36%" height="25"> <div align="center">����</div></td>
      <td width="14%" height="25"> <div align="center">���(Ԫ)</div></td>
      <td width="12%"><div align="center">��Ч��</div></td>
      <td width="12%" height="25"> <div align="center">����</div></td>
      <td width="15%" height="25"> <div align="center">����</div></td>
    </tr>
    <?
  while($r=$empire->fetch($sql))
  {
  ?>
    <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'"> 
      <td><div align="center"> 
          <input name="cardid[]" type="checkbox" id="cardid[]" value="<?=$r[cardid]?>">
        </div></td>
      <td height="25"> <div align="center"> 
          <?=$r[cardid]?>
        </div></td>
      <td height="25"> <div align="center"> <a alt="End Time:<?=$r[endtime]?><br>Add Time:<?=$r[cardtime]?>"> 
          <?=$r[card_no]?>
          </a> </div></td>
      <td height="25"> <div align="center"> 
          <?=$r[money]?>
        </div></td>
      <td><div align="center"><?=$r[carddate]?></div></td>
      <td height="25"> <div align="center"> 
          <?=$r[cardfen]?>
        </div></td>
      <td height="25"> <div align="center">[<a href="AddCard.php?enews=EditCard&cardid=<?=$r[cardid]?>&time=<?=$time?>">�޸�</a>]&nbsp;[<a href="ListCard.php?enews=DelCard&cardid=<?=$r[cardid]?>&time=<?=$time?>" onclick="return confirm('ȷ��Ҫɾ��?');">ɾ��</a>]</div></td>
    </tr>
    <?
  }
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25"> <div align="center"> 
          <input type=checkbox name=chkall value=on onclick="CheckAll(this.form)">
        </div></td>
      <td height="25" colspan="6">&nbsp; 
        <?=$returnpage?>
        &nbsp;&nbsp; <input type="submit" name="Submit2" value="ɾ��ѡ��"> </td>
    </tr>
  </form>
</table>
</body>
</html>
<?
db_close();
$empire=null;
?>