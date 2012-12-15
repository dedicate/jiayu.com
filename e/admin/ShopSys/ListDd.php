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
CheckLevel($logininid,$loginin,$classid,"shopdd");

//�����趨
function SetShopDd($ddid,$doing,$userid,$username){
	global $empire,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"shopdd");
	$count=count($ddid);
	if(empty($count))
	{
		printerror("NotSetDdid","history.go(-1)");
	}
	$add='';
	for($i=0;$i<$count;$i++)
	{
		$add.="ddid='".intval($ddid[$i])."' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	//�Ѹ���
	if($doing==1)
	{
		$sql=$empire->query("update {$dbtbpre}enewsshopdd set haveprice=1 where ".$add);
		$mess="SetHavepriceSuccess";
    }
	//�ѷ���
	elseif($doing==2)
	{
		$sql=$empire->query("update {$dbtbpre}enewsshopdd set outproduct=1 where ".$add);
		$mess="SetOutProductSuccess";
    }
	//ȷ��
	elseif($doing==3)
	{
		$sql=$empire->query("update {$dbtbpre}enewsshopdd set checked=1 where ".$add);
		$mess="SetCheckedSuccess";
    }
	//ȡ��
	elseif($doing==4)
	{
		$sql=$empire->query("update {$dbtbpre}enewsshopdd set checked=0 where ".$add);
		$mess="SetNoCheckedSuccess";
    }
	//ɾ��
	elseif($doing==5)
	{
		$sql=$empire->query("delete from {$dbtbpre}enewsshopdd where ".$add);
		$mess="DelDdSuccess";
    }
	else
	{}
	if($sql)
	{
		//������־
		insert_dolog("doing=".$doing);
		printerror($mess,"ListDd.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
if($enews=="SetShopDd")
{
	$ddid=$_POST['ddid'];
	$doing=$_POST['doing'];
	SetShopDd($ddid,$doing,$logininid,$loginin);
}
else
{}
$page=(int)$_GET['page'];
$start=0;
$line=25;//ÿҳ��ʾ����
$page_line=18;//ÿҳ��ʾ������
$offset=$page*$line;//��ƫ����
$totalquery="select count(*) as total from {$dbtbpre}enewsshopdd";
$query="select ddid,ddno,ddtime,userid,username,outproduct,haveprice,checked,truename,psid,psname,pstotal,alltotal,payfsid,payfsname,payby,alltotalfen,fp,fptotal from {$dbtbpre}enewsshopdd";
$add="";
//����
$sear=$_GET['sear'];
if($sear)
{
	$keyboard=$_GET['keyboard'];
	$keyboard=RepPostVar2($keyboard);
	if($keyboard)
	{
		$show=$_GET['show'];
		if($show==1)//����������
		{
			$add=" and (ddno like '%$keyboard%')";
		}
		elseif($show==2)//�û���
		{
			$add=" and (username like '%$keyboard%')";
		}
		elseif($show==3)
		{
			$add=" and (truename like '%$keyboard%')";
		}
		elseif($show==4)
		{
			$add=" and (g_truename like '%$keyboard%')";
		}
		else//����
		{
			$add=" and (ddno like '%$keyboard%' or username like '%$keyboard%' or truename like '%$keyboard%' or g_truename like '%$keyboard%')";
		}
	}
	//״̬
	$checked=$_GET['checked'];
	if($checked==1)//ȷ��
	{
		$add.=" and checked=1";
	}
	elseif($checked==2)//δȷ��
	{
		$add.=" and checked=0";
	}
	else
	{}
	//�Ƿ񸶿�
	$haveprice=$_GET['haveprice'];
	if($haveprice==1)//�Ѹ���
	{
		$add.=" and haveprice=1";
	}
	elseif($haveprice==2)
	{
		$add.=" and haveprice=0";
	}
	else
	{}
	//�Ƿ񷢻�
	$outproduct=$_GET['outproduct'];
	if($outproduct==1)//�ѷ���
	{
		$add.=" and outproduct=1";
	}
	elseif($outproduct==2)
	{
		$add.=" and outproduct=0";
	}
	else
	{}
	//ʱ��
	$starttime=RepPostVar($_GET['starttime']);
	$endtime=RepPostVar($_GET['endtime']);
	if($endtime!="")
	{
		$ostarttime=$starttime." 00:00:00";
		$oendtime=$endtime." 23:59:59";
		$add.=" and ddtime>='$ostarttime' and ddtime<='$oendtime'";
	}
	if($add)
	{
		$add=" where ddid<>0".$add;
	}
	$search="&sear=1&keyboard=$keyboard&show=$show&checked=$checked&outproduct=$outproduct&haveprice=$haveprice&starttime=$starttime&endtime=$endtime";
}
$totalquery.=$add;
$query.=$add;
$num=$empire->gettotal($totalquery);//ȡ��������
$query=$query." order by ddid desc limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page2($num,$line,$page_line,$start,$page,$search);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<title>������</title>
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
<script src="../ecmseditor/fieldfile/setday.js"></script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td height="25">λ�ã�<a href="ListDd.php">������</a></td>
  </tr>
</table>

  
<form name="form1" method="get" action="ListDd.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
    <tr> 
      <td>����: <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>"> 
        <select name="show" id="show">
          <option value="0">���޷�Χ</option>
          <option value="1">������</option>
          <option value="2">�û���</option>
		  <option value="3">����������</option>
		  <option value="4">�ջ�������</option>
        </select> 
        <select name="checked" id="checked">
          <option value="0">����״̬</option>
          <option value="1">��ȷ��</option>
          <option value="2">δȷ��</option>
        </select> 
        <select name="outproduct" id="outproduct">
          <option value="0">�Ƿ񷢻�</option>
          <option value="1">�ѷ���</option>
          <option value="2">δ����</option>
        </select>
        <select name="haveprice" id="haveprice">
          <option value="0">�Ƿ񸶷�</option>
          <option value="1">�Ѹ���</option>
          <option value="2">δ����</option>
        </select> </td>
    </tr>
    <tr>
      <td>ʱ��:�� 
        <input name="starttime" type="text" id="starttime2" value="<?=$starttime?>" size="12" onclick="setday(this)">
        �� 
        <input name="endtime" type="text" id="endtime2" value="<?=$endtime?>" size="12" onclick="setday(this)">
        ֹ�Ķ��� 
        <input type="submit" name="Submit6" value="����"> <input name="sear" type="hidden" id="sear2" value="1"></td>
    </tr>
  </table>
</form>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class=tableborder>
  <form name="listdd" method="post" action="ListDd.php" onsubmit="return confirm('ȷ��Ҫ����?');">
    <input type=hidden name=enews value=SetShopDd>
    <input type=hidden name=doing value=0>
    <tr class=header> 
      <td width="5%" height="23"> <div align="center">ѡ��</div></td>
      <td width="19%"><div align="center">���(����鿴)</div></td>
      <td width="21%"><div align="center">����ʱ��</div></td>
      <td width="13%"><div align="center">������</div></td>
      <td width="11%"><div align="center">�ܽ��</div></td>
      <td width="12%"><div align="center">���ѷ�ʽ</div></td>
      <td width="19%"><div align="center">״̬</div></td>
    </tr>
    <?
	while($r=$empire->fetch($sql))
	{
		if(empty($r[userid]))//�ǻ�Ա
		{
			$username="<font color=cccccc>".$r[truename]."</font>";
		}
		else
		{
			$username="<a href='../member/AddMember.php?enews=EditMember&userid=".$r[userid]."' target=_blank>".$r[username]."</a>";
		}
		//��������
		$total=0;
		if($r[payby]==1)
		{
			$total=$r[alltotalfen]+$r[pstotal];
			$mytotal="<a href='#ecms' title='��Ʒ��(".$r[alltotalfen].")+�˷�(".$r[pstotal].")'>".$total." ��</a>";
		}
		else
		{
			//��Ʊ
			$fpa="";
			if($r[fp])
			{
				$fpa="+��Ʊ��(".$r[fptotal].")";
			}
			$total=$r[alltotal]+$r[pstotal]+$r[fptotal];
			$mytotal="<a href='#ecms' title='��Ʒ��(".$r[alltotal].")+�˷�(".$r[pstotal].")".$fpa."'>".$total." Ԫ</a>";
		}
		//֧����ʽ
		if($r[payby]==1)
		{
			$payfsname=$r[payfsname]."<br>(��������)";
		}
		elseif($r[payby]==2)
		{
			$payfsname=$r[payfsname]."<br>(����)";
		}
		else
		{
			$payfsname=$r[payfsname];
		}
		//״̬
		if($r[checked])
		{
			$ch="��ȷ��";
		}
		else
		{
			$ch="<font color=red>δȷ��</font>";
		}
		if($r[outproduct])
		{
			$ou="�ѷ���";
		}
		else
		{
			$ou="<font color=red>δ����</font>";
		}
		if($r[haveprice])
		{
			$ha="�Ѹ���";
		}
		else
		{
			$ha="<font color=red>δ����</font>";
		}
	?>
    <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'"> 
      <td height="25"> <div align="center"> 
          <input name="ddid[]" type="checkbox" id="ddid[]" value="<?=$r[ddid]?>">
        </div></td>
      <td> <div align="center"><a href="#ecms" onclick="window.open('ShowDd.php?ddid=<?=$r[ddid]?>','','width=700,height=600,scrollbars=yes,resizable=yes');">
          <?=$r[ddno]?>
          </a></div></td>
      <td> <div align="center">
          <?=$r[ddtime]?>
        </div></td>
      <td> <div align="center">
          <?=$username?>
        </div></td>
      <td> <div align="center">
          <?=$mytotal?>
        </div></td>
      <td><div align="center">
          <?=$payfsname?>
        </div></td>
      <td> <div align="center"><strong><?=$ha?></strong>/<strong><?=$ou?></strong>/<strong><?=$ch?></strong></div></td>
    </tr>
    <?
	}
	?>
    <tr bgcolor="#FFFFFF"> 
      <td> <div align="center"> 
          <input type=checkbox name=chkall value=on onClick='CheckAll(this.form)'>
        </div></td>
      <td colspan="6"><input type="submit" name="Submit" value="�ѵ���" onClick="document.listdd.doing.value='1';"> 
        &nbsp; <input type="submit" name="Submit2" value="�ѷ���" onClick="document.listdd.doing.value='2';"> 
        &nbsp; <input type="submit" name="Submit3" value="ȷ��" onClick="document.listdd.doing.value='3';"> 
        &nbsp; <input type="submit" name="Submit4" value="ȡ��" onClick="document.listdd.doing.value='4';"> 
        &nbsp; <input type="submit" name="Submit5" value="ɾ��" onClick="document.listdd.doing.value='5';"> 
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td> <div align="center"></div></td>
      <td colspan="6"> <div align="left">&nbsp;
          <?=$returnpage?>
        </div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td colspan="6"><font color="#666666">������Ϊ��ɫ,��Ϊ�ǻ�Ա����</font></td>
    </tr>
  </form>
</table>

</body>
</html>
<?
db_close();
$empire=null;
?>
