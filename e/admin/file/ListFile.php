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
//��֤Ȩ��
CheckLevel($logininid,$loginin,$classid,"file");
$page=(int)$_GET['page'];
$start=0;
$line=25;//ÿҳ��ʾ����
$page_line=12;//ÿҳ��ʾ������
$offset=$page*$line;//��ƫ����
$add="";
//��������
$type=(int)$_GET['type'];
if($type!=9)//��������
{
	$add.=" and type='$type'";
}
if($type==0)
{
	$select0=" selected";
}
elseif($type==1)
{
	$select1=" selected";
}
elseif($type==2)
{
	$select2=" selected";
}
elseif($type==3)
{
	$select3=" selected";
}
else
{
	$select9=" selected";
}
//ѡ����Ŀ
$classid=(int)$_GET['classid'];
/*
$fcjsfile='../../data/fc/cmsclass.js';
$classoptions=GetFcfiletext($fcjsfile);
*/
//��Ŀ
if($classid)
{
	if($class_r[$classid]['islast'])
	{
		$add.=" and classid='$classid'";
	}
	else
	{
		$add.=" and ".ReturnClass($class_r[$classid]['sonclass']);
	}
	//$classoptions=str_replace("<option value='$classid'","<option value='$classid' selected",$classoptions);
}
//�ؼ���
$keyboard=RepPostVar2($_GET['keyboard']);
if(!empty($keyboard))
{
	$show=$_GET['show'];
	//����ȫ��
	if($show==0)
	{
		$add.=" and (filename like '%$keyboard%' or no like '%$keyboard%' or adduser like '%$keyboard%')";
	}
	//�����ļ���
	elseif($show==1)
	{
		$add.=" and filename like '%$keyboard%'";
	}
	//�������
	elseif($show==2)
	{
		$add.=" and no like '%$keyboard%'";
	}
	//�����ϴ���
	else
	{
		$add.=" and adduser like '%$keyboard%'";
	}
}
$search="&classid=$classid&type=$type&show=$show&keyboard=$keyboard";
$totalquery="select count(*) as total from {$dbtbpre}enewsfile where 1=1".$add;
$num=$empire->gettotal($totalquery);//ȡ��������
$query="select * from {$dbtbpre}enewsfile where 1=1".$add;
$query=$query." order by fileid desc limit $offset,$line";
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
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="36%">λ�ã�<a href="ListFile.php?type=9">������(����ʽ)</a>&nbsp;</td>
    <td width="64%"><div align="right" class="emenubutton">
        <input type="button" name="Submit52" value="Ŀ¼ʽ������" onclick="self.location.href='FilePath.php';">
		&nbsp;&nbsp;
		<input type="button" name="Submit52" value="�ϴ��฽��" onclick="self.location.href='TranMoreFile.php';">
      </div></td>
  </tr>
</table>
<br>
  
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
  <form name="form2" method="get" action="ListFile.php">
    <input type=hidden name=classid value="<?=$classid?>">
    <tr> 
      <td width="82%">����: <select name="type" id="select">
          <option value="9">���и�������</option>
          <option value="1"<?=$select1?>>ͼƬ</option>
          <option value="2"<?=$select2?>>Flash�ļ�</option>
          <option value="3"<?=$select3?>>��ý���ļ�</option>
          <option value="0"<?=$select0?>>��������</option>
        </select> <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>">
        <select name="show" id="show">
          <option value="0"<?=$show==0?' checked':''?>>����</option>
          <option value="1"<?=$show==1?' checked':''?>>�ļ���</option>
          <option value="2"<?=$show==2?' checked':''?>>���</option>
          <option value="3"<?=$show==3?' checked':''?>>�ϴ���</option>
        </select>
		<span id="listfileclassnav"></span>
        <input type="submit" name="Submit2" value="����"> </td>
      <td width="18%"><div align="center">[<a href="../ecmsfile.php?enews=DelFreeFile" onclick="return confirm('ȷ��Ҫ����?');">����ʧЧ����</a>]</div></td>
    </tr>
  </form>
</table>
<form name="form1" method="post" action="../ecmsfile.php" onsubmit="return confirm('ȷ��Ҫɾ��?');">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header"> 
      <td width="5%" height="25"><div align="center">ID</div></td>
      <td width="29%" height="25"><div align="center">�ļ���</div></td>
      <td width="10%" height="25"><div align="center">������</div></td>
      <td width="9%"><div align="center">�ļ���С</div></td>
      <td width="17%" height="25"><div align="center">����ʱ��</div></td>
      <td width="11%" height="25"><div align="center">����</div></td>
    </tr>
    <?php
	while($r=$empire->fetch($sql))
	{
		$filesize=ChTheFilesize($r[filesize]);
		$fspath=ReturnFileSavePath($r[classid],$r[fpath]);
		$filepath=$r[path]?$r[path].'/':$r[path];
		$path1=$fspath['fileurl'].$filepath.$r[filename];
		//����
		$thisfileid=$r['fileid'];
		if($r['id'])
		{
			$thisfileid="<b><a href='../../public/InfoUrl?classid=$r[classid]&id=$r[id]' target=_blank>".$r[fileid]."</a></b>";
		}
	?>
    <tr bgcolor="#FFFFFF" id="file<?=$r[fileid]?>" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'"> 
      <td height="25"><div align="center"> 
          <?=$thisfileid?>
        </div></td>
      <td height="25"><div align="center"> 
          <?=$r[no]?>
          <br>
          <a href="<?=$path1?>" target="_blank">
          <?=$r[filename]?>
          </a> </div></td>
      <td height="25"><div align="center"> 
          <?=$r[adduser]?>
        </div></td>
      <td><div align="center"> 
          <?=$filesize?>
        </div></td>
      <td height="25"><div align="center"> 
          <?=$r[filetime]?>
        </div></td>
      <td height="25"><div align="center">[<a href="../ecmsfile.php?enews=DelFile&fileid=<?=$r[fileid]?>" onclick="return confirm('���Ƿ�Ҫɾ����');">ɾ��</a> 
          <input name="fileid[]" type="checkbox" id="fileid[]" value="<?=$r[fileid]?>" onclick="if(this.checked){file<?=$r[fileid]?>.style.backgroundColor='#DBEAF5';}else{file<?=$r[fileid]?>.style.backgroundColor='#ffffff';}">
          ]</div></td>
    </tr>
    <?
	}
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="6"> 
        <?=$returnpage?>
        &nbsp;&nbsp; <input type="submit" name="Submit" value="����ɾ��"> <input name="enews" type="hidden" id="enews" value="DelFile_all"> 
        &nbsp;
        <input type=checkbox name=chkall value=on onClick=CheckAll(this.form)>
        ѡ��ȫ��</td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25" colspan="6"><font color="#666666">���ID�Ǵ��壬��ʾ����Ϣ���ã����ID���ɲ鿴��Ϣҳ��</font></td>
    </tr>
  </table>
</form>
<IFRAME frameBorder="0" id="showclassnav" name="showclassnav" scrolling="no" src="../ShowClassNav.php?ecms=5&classid=<?=$classid?>" style="HEIGHT:0;VISIBILITY:inherit;WIDTH:0;Z-INDEX:1"></IFRAME>
</body>
</html>
<?
db_close();
$empire=null;
?>
