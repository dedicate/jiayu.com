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
CheckLevel($logininid,$loginin,$classid,"pl");

//����ɾ������(����)
function DelMorePl($add,$logininid,$loginin){
	global $empire,$dbtbpre,$class_r;
    CheckLevel($logininid,$loginin,$classid,"pl");//��֤Ȩ��
	//��������
	$username=RepPostVar($add['username']);
	$sayip=RepPostVar($add['sayip']);
	$startplid=(int)$add['startplid'];
	$endplid=(int)$add['endplid'];
	$startsaytime=RepPostVar($add['startsaytime']);
	$endsaytime=RepPostVar($add['endsaytime']);
	$checked=(int)$add['checked'];
	$ismember=(int)$add['ismember'];
	$classid=(int)$add['classid'];
	$id=RepPostVar($add['id']);
	$where='';
	//��Ŀ
	if($classid)
	{
		if(empty($class_r[$classid][islast]))//�м���Ŀ
		{
			$cwhere=ReturnClass($class_r[$classid][sonclass]);
		}
		else//�ռ���Ŀ
		{
			$cwhere="classid='$classid'";
		}
		$where.=" and ".$cwhere;
	}
	//��ϢID
	if($id)
	{
		$idr=explode(',',$id);
		$ids='';
		$dh='';
		$count=count($idr);
		for($i=0;$i<$count;$i++)
		{
			$ids.=$dh.intval($idr[$i]);
			$dh=',';
		}
		$where.=" and id in (".$ids.")";
	}
	//�Ƿ��Ա
	if($ismember)
	{
		if($ismember==1)
		{
			$where.=" and userid=0";
		}
		else
		{
			$where.=" and userid>0";
		}
	}
	//������
	if($username)
	{
		$where.=" and username like '%$username%'";
	}
	//����IP
	if($sayip)
	{
		$where.=" and sayip like '%$sayip%'";
	}
	//����ID
	if($endplid)
	{
		$where.=' and plid BETWEEN '.$startplid.' and '.$endplid;
	}
	//����ʱ��
	if($startsaytime&&$endsaytime)
	{
		$where.=" and saytime>='$startsaytime' and saytime<='$endsaytime'";
	}
	//�Ƿ����
	if($checked)
	{
		$checkval=$checked==1?0:1;
		$where.=" and checked='$checkval'";
	}
    if(!$where)
	{
		printerror("EmptyDelMorePl","history.go(-1)");
	}
	$where=substr($where,5);
	$sql=$empire->query("select plid,id,classid,stb from {$dbtbpre}enewspl where ".$where);
	$dh='';
	$b=0;
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$startid=$r['plid'];
		if($class_r[$r[classid]][tbname])
		{
			$empire->query("update {$dbtbpre}ecms_".$class_r[$r[classid]][tbname]." set plnum=plnum-1 where id='$r[id]'");
		}
		$empire->query("delete from {$dbtbpre}enewspl_data_".$r[stb]." where plid='$r[plid]'");
    }
	$sql=$empire->query("delete from {$dbtbpre}enewspl where ".$where);
	insert_dolog("");//������־
	printerror("DelPlSuccess","DelMorePl.php");
}

//����ɾ������(������)
function DelMorePlByText($add,$logininid,$loginin){
	global $empire,$dbtbpre,$class_r;
    CheckLevel($logininid,$loginin,$classid,"pl");//��֤Ȩ��
	//��������
	$saytext=RepPostStr($add['saytext']);
	if(!$saytext)
	{
		printerror("EmptyDelMorePl","history.go(-1)");
	}
	$classid=(int)$add['classid'];
	$where='';
	//��Ŀ
	if($classid)
	{
		if(empty($class_r[$classid][islast]))//�м���Ŀ
		{
			$cwhere=ReturnClass($class_r[$classid][sonclass]);
		}
		else//�ռ���Ŀ
		{
			$cwhere="classid='$classid'";
		}
		$where.=$cwhere.' and ';
	}
	//��������
	$twhere='';
	$or='';
	$tr=explode('|',$saytext);
	$count=count($tr);
	for($i=0;$i<$count;$i++)
	{
		$twhere.=$or."saytext like '%".$tr[$i]."%'";
		$or=' or ';
	}
	$where.='('.$twhere.')';
	$tbr=$empire->fetch1("select pldatatbs from {$dbtbpre}enewspublic limit 1");
	if($tbr['pldatatbs'])
	{
		$dtbr=explode(',',$tbr['pldatatbs']);
		$tcount=count($dtbr)-1;
		for($ti=1;$ti<$tcount;$ti++)
		{
			$sql=$empire->query("select plid,id,classid from {$dbtbpre}enewspl_data_".$dtbr[$ti]." where ".$where);
			while($r=$empire->fetch($sql))
			{
				if($class_r[$r[classid]][tbname])
				{
					$empire->query("update {$dbtbpre}ecms_".$class_r[$r[classid]][tbname]." set plnum=plnum-1 where id='$r[id]'");
				}
				$empire->query("delete from {$dbtbpre}enewspl where plid='$r[plid]'");
				$empire->query("delete from {$dbtbpre}enewspl_data_".$dtbr[$ti]." where plid='$r[plid]'");
			}
		}
	}
	insert_dolog("");//������־
	printerror("DelPlSuccess","DelMorePl.php");
}

$enews=$_POST['enews'];
if($enews)
{
	include("../../data/dbcache/class.php");
	@set_time_limit(0);
}
if($enews=='DelMorePl')
{
	DelMorePl($_POST,$logininid,$loginin);
}
elseif($enews=='DelMorePlByText')
{
	DelMorePlByText($_POST,$logininid,$loginin);
}

//��Ŀ
$fcfile="../../data/fc/ListEnews.php";
$class="<script src=../../data/fc/cmsclass.js></script>";
if(!file_exists($fcfile))
{$class=ShowClass_AddClass("",$classid,0,"|-",0,0);}

db_close();
$empire=null;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>����ɾ������</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<script src="../ecmseditor/fieldfile/setday.js"></script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td>λ�ã�<a href=ListAllPl.php>��������</a>&nbsp;>&nbsp;����ɾ������</td>
  </tr>
</table>
<form name="form1" method="post" action="DelMorePl.php" onsubmit="return confirm('ȷ��Ҫɾ��?');">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header"> 
      <td height="25" colspan="2">����������ɾ������ 
        <input name="enews" type="hidden" id="enews" value="DelMorePl"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="19%" height="25">�����߰����ַ���</td>
      <td width="81%" height="25"><input name=username type=text id="username"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">�Ƿ��Ա������</td>
      <td height="25"><input name="ismember" type="radio" value="0" checked>
        ���� <input type="radio" name="ismember" value="1">
        �οͷ��� 
        <input type="radio" name="ismember" value="2">
        ��Ա����</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">����IP������</td>
      <td height="25"><input name=sayip type=text id="sayip"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td rowspan="2">������Ϣ��</td>
      <td height="25">������Ŀ��
        <select name="classid" id="classid">
		<option value=0>����</option>
          <?=$class?>
        </select> <font color="#666666">����ѡ����Ŀ����Ӧ������������Ŀ��</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">��ϢID&nbsp;&nbsp;�� 
        <input name="id" type="text" id="id">
        <font color="#666666">(���ID�á�,����Ƕ��Ÿ���)</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">����ID ���ڣ�</td>
      <td height="25"><input name="startplid" type="text" id="startplid">
        -- 
        <input name="endplid" type="text" id="endplid"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" valign="top">����ʱ�� ���ڣ�</td>
      <td height="25"><input name="startsaytime" type="text" id="startsaytime" onclick="setday(this)">
        -- 
        <input name="endsaytime" type="text" id="endsaytime" onclick="setday(this)">
        <font color="#666666">(��ʽ��2011-01-27)</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">�Ƿ���ˣ�</td>
      <td height="25"><input name="checked" type="radio" value="0" checked>
        ���� 
        <input name="checked" type="radio" value="1">
        ��������� 
        <input name="checked" type="radio" value="2">
        δ�������</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">&nbsp;</td>
      <td height="25"><input type="submit" name="Submit" value="ɾ������"> </td>
    </tr>
  </table>
</form>
<br>
<form name="form2" method="post" action="DelMorePl.php" onsubmit="return confirm('ȷ��Ҫɾ��?');">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header"> 
      <td height="25" colspan="2">����������ɾ������ 
        <input name="enews" type="hidden" id="enews" value="DelMorePlByText"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="19%" height="25">�������ݰ����ַ���<br>
        <br>
        <font color="#666666">(����ַ��á�|������)</font> </td>
      <td width="81%" height="25"><textarea name="saytext" cols="70" rows="6" id="saytext"></textarea></td>
    </tr>
	<tr bgcolor="#FFFFFF"> 
      <td height="25">������Ŀ��</td>
      <td height="25"><select name="classid" id="classid">
	  <option value=0>����</option>
          <?=$class?>
        </select> <font color="#666666">����ѡ����Ŀ����Ӧ������������Ŀ��</font></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">&nbsp;</td>
      <td height="25"><input type="submit" name="Submit2" value="ɾ������"> </td>
    </tr>
  </table>
</form>
</body>
</html>
