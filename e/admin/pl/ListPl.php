<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
require "../".LoadLang("pub/fun.php");
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

$classid=(int)$_GET['classid'];
$bclassid=(int)$_GET['bclassid'];
$id=(int)$_GET['id'];
//��֤Ȩ��
CheckLevel($logininid,$loginin,$classid,"news");
$start=0;
$page=(int)$_GET['page'];
$line=30;//ÿҳ��ʾ
$page_line=12;
$offset=$page*$line;
$search="&bclassid=$bclassid&classid=$classid&id=$id";
$add='';
//����
$keyboard=RepPostVar2($_GET['keyboard']);
if($keyboard)
{
	$show=(int)$_GET['show'];
	if($show==1)
	{
		$where="username like '%".$keyboard."%'";
	}
	else
	{
		$where="sayip like '%".$keyboard."%'";
	}
	$add.=' and '.$where;
	$search.="&keyboard=$keyboard&show=$show";
}
$query="select plid,username,saytime,sayip,checked,zcnum,fdnum,userid,isgood,stb from {$dbtbpre}enewspl where id='$id' and classid='$classid'".$add;
$totalquery="select count(*) as total from {$dbtbpre}enewspl where id='$id' and classid='$classid'".$add;
//ȡ��������
$totalnum=(int)$_GET['totalnum'];
if($totalnum>0)
{
	$num=$totalnum;
}
else
{
	$num=$empire->gettotal($totalquery);
}
$query.=" order by plid desc limit $offset,$line";
$sql=$empire->query($query);
$search.='&totalnum='.$num;
$returnpage=page2($num,$line,$page_line,$start,$page,$search);
//λ��
$n_r=$empire->fetch1("select title from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id'");
//����
$url=AdminReturnClassLink($classid).'&nbsp;>&nbsp;<a href="../../public/InfoUrl/?classid='.$classid.'&id='.$id.'" target="_blank">'.stripSlashes($n_r[title]).'</a>&nbsp;>&nbsp;��������';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��������</title>
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
    <td>λ��:<?=$url?></td>
  </tr>
</table>

  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <form name="form2" method="get" action="ListPl.php">
    <tr>
      <td>�ؼ��֣� 
        <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>">
        <select name="show" id="show">
          <option value="1"<?=$show==1?' selected':''?>>������</option>
          <option value="2"<?=$show==2?' selected':''?>>IP��ַ</option>
        </select>
        <input type="submit" name="Submit2" value="��������">
        <input name=id type=hidden id="id" value=<?=$id?>>
        <input name=classid type=hidden id="classid" value=<?=$classid?>>
        <input name=bclassid type=hidden id="bclassid" value=<?=$bclassid?>></td>
    </tr>
	</form>
  </table>

<form name="form1" method="post" action="../ecmspl.php">
<input type=hidden name=bclassid value=<?=$bclassid?>>
<input type=hidden name=classid value=<?=$classid?>>
<input type=hidden name=id value=<?=$id?>>
  <input name="isgood" type="hidden" id="isgood" value="1">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" style="WORD-BREAK: break-all; WORD-WRAP: break-word">
    <tr class="header"> 
      <td width="4%" height="25"><div align="center">ѡ��</div></td>
      <td width="19%" height="25"><div align="center">����</div></td>
      <td width="49%" height="25"><div align="center">��������</div></td>
      <td width="14%" height="25"><div align="center">����ʱ��</div></td>
      <td width="14%" height="25"><div align="center">IP</div></td>
    </tr>
    <?php
	while($r=$empire->fetch($sql))
	{
		//����
		$fr=$empire->fetch1("select saytext from {$dbtbpre}enewspl_data_".$r[stb]." where plid='$r[plid]'");
		if(!empty($r[checked]))
		{$checked=" title='δ���' style='background:#99C4E3'";}
		else
		{$checked="";}
		if($r['userid'])
		{
			$r['username']="<a href='../member/AddMember.php?enews=EditMember&userid=$r[userid]' target='_blank'><b>$r[username]</b></a>";
		}
		if(empty($r['username']))
		{
			$r['username']='����';
		}
		if($r[isgood])
		{
			$r[saytime]='<font color=red>'.$r[saytime].'</font>';
		}
		//�滻����
		$saytext=RepPltextFace(stripSlashes($fr['saytext']));
	?>
    <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'" id=pl<?=$r[plid]?>> 
      <td height="25" valign="top"><div align="center"> 
          <input name="plid[]" type="checkbox" id="plid[]" value="<?=$r[plid]?>"<?=$checked?>>
        </div></td>
      <td height="25" valign="top"><div align="center"> 
          <?=$r[username]?>
        </div></td>
      <td height="25" valign="top"> 
        <?=$saytext?>
      </td>
      <td height="25" valign="top"><div align="center"> 
          <?=$r[saytime]?>
        </div></td>
      <td height="25" valign="top"><div align="center"> 
          <?=$r[sayip]?>
        </div></td>
    </tr>
    <?
	}
	db_close();
	$empire=null;
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25"> <div align="center"> 
          <input type=checkbox name=chkall value=on onclick=CheckAll(this.form)>
        </div></td>
      <td height="25" colspan="4"> <div align="right"> 
          <input type="submit" name="Submit" value="�������" onClick="document.form1.enews.value='CheckPl_all';">
          &nbsp;&nbsp;&nbsp; 
          <input type="submit" name="Submit3" value="�Ƽ�����" onClick="document.form1.enews.value='DoGoodPl_all';document.form1.isgood.value='1';">
          &nbsp;&nbsp;&nbsp; 
          <input type="submit" name="Submit4" value="ȡ���Ƽ�����" onClick="document.form1.enews.value='DoGoodPl_all';document.form1.isgood.value='0';">
          &nbsp;&nbsp; &nbsp; 
          <input type="submit" name="Submit" value="ɾ��" onClick="document.form1.enews.value='DelPl_all';">
          <input name="enews" type="hidden" id="enews" value="DelPl_all">
        </div></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">&nbsp; </td>
      <td height="25" colspan="4">
        <?=$returnpage?>
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="5"><font color="#666666">˵������ѡ��Ϊ��ɫ����δ������ۣ��Ӵ�����Ϊ��½��Ա������ʱ���ɫΪ�Ƽ�����</font></td>
    </tr>
  </table>
</form>
</body>
</html>
