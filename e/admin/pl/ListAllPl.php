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
CheckLevel($logininid,$loginin,$classid,"pl");
$start=0;
$page=(int)$_GET['page'];
$line=30;//ÿҳ��ʾ
$page_line=12;
$offset=$page*$line;
$search='';
$add='';
$and='';
//����
$id=(int)$_GET['id'];
if($id)
{
	$add.=" where id='$id'";
	$search.="&id=$id";
}
//����
$classid=(int)$_GET['classid'];
if($classid)
{
	$and=empty($add)?' where ':' and ';
	if($class_r[$classid][islast])
	{
		$add.=$and."classid='$classid'";
	}
	else
	{
		$add.=$and.'('.ReturnClass($class_r[$classid][sonclass]).')';
	}
	$search.="&classid=$classid";
}
//���
$checked=(int)$_GET['checked'];
if($checked)
{
	$and=empty($add)?' where ':' and ';
	$add.=$and."checked='".($checked==1?0:1)."'";
	$search.="&checked=$checked";
}
//����
$keyboard=RepPostVar2($_GET['keyboard']);
if($keyboard)
{
	$and=empty($add)?' where ':' and ';
	$show=(int)$_GET['show'];
	if($show==1)//������
	{
		$add.=$and."(username like '%".$keyboard."%')";
	}
	elseif($show==2)//ip
	{
		$add.=$and."(sayip like '%".$keyboard."%')";
	}
	$search.="&keyboard=$keyboard&show=$show";
}
$totalquery="select count(*) as total from {$dbtbpre}enewspl".$add;
$query="select plid,username,saytime,sayip,id,classid,checked,zcnum,fdnum,userid,isgood,stb from {$dbtbpre}enewspl".$add;
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
$url="<a href=ListAllPl.php>��������</a>";
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
    <td width="38%">λ�ã� 
      <?=$url?>
    </td>
    <td width="62%"><div align="right" class="emenubutton"> 
        <input type="button" name="Submit5" value="�������۱���" onclick="self.location.href='plface.php';">&nbsp;&nbsp;&nbsp;
		<input type="button" name="Submit5" value="�������۹����ַ�" onclick="self.location.href='../SetEnews.php';">&nbsp;&nbsp;&nbsp;
		<input type="button" name="Submit5" value="�Զ��������ֶ�" onclick="self.location.href='ListPlF.php';">&nbsp;&nbsp;&nbsp;
		<input type="button" name="Submit5" value="�������۷ֱ�" onclick="self.location.href='ListPlDataTable.php';">&nbsp;&nbsp;&nbsp;
		<input type="button" name="Submit52" value="����ɾ������" onclick="self.location.href='DelMorePl.php';">
      </div></td>
  </tr>
</table>

  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <form name="form2" method="get" action="ListAllPl.php">
    <tr> 
      <td>��ϢID�� 
        <input name="id" type="text" id="id" value="<?=$id?>" size="6">
        �ؼ��֣� 
        <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>"> 
        <select name="show" id="show">
          <option value="1"<?=$show==1?' selected':''?>>������</option>
          <option value="2"<?=$show==2?' selected':''?>>IP��ַ</option>
        </select>
        <select name="checked" id="checked">
          <option value="0"<?=$checked==0?' selected':''?>>����</option>
          <option value="1"<?=$checked==1?' selected':''?>>�����</option>
          <option value="2"<?=$checked==2?' selected':''?>>δ���</option>
        </select> 
		<span id="listplclassnav"></span>&nbsp;
        <input type="submit" name="Submit2" value="��������">
      </td>
    </tr>
    <tr>
      <td> </td>
    </tr>
	</form>
  </table>
<form name="form1" method="post" action="../ecmspl.php" onsubmit="return confirm('ȷ��Ҫ����?');">
<input type=hidden name=classid value=<?=$classid?>>
<input type=hidden name=id value=<?=$id?>>
  <input name="isgood" type="hidden" id="isgood" value="1">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" style="WORD-BREAK: break-all; WORD-WRAP: break-word">
    <tr class="header"> 
      <td width="4%" height="25"><div align="center">ѡ��</div></td>
      <td width="21%" height="25"><div align="center">����</div></td>
      <td width="51%" height="25"><div align="center">��������(˫�����ݣ�������Ϣ����ҳ)</div></td>
      <td width="24%" height="25"><div align="center">������Ϣ</div></td>
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
		//��Ϣ
		$title='';
		if($class_r[$r[classid]][tbname])
		{
			$infor=$empire->fetch1("select titleurl,groupid,classid,newspath,filename,id,title from {$dbtbpre}ecms_".$class_r[$r[classid]][tbname]." where id='$r[id]' limit 1");
			$titleurl=sys_ReturnBqTitleLink($infor);
			$title="<a href='$titleurl' target='_blank'>".stripSlashes($infor[title])."</a>";
		}
	?>
    <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'" id=pl<?=$r[plid]?>> 
      <td height="25" valign="top"> <div align="center"> 
          <input name="plid[]" type="checkbox" id="plid" value="<?=$r[plid]?>"<?=$checked?>>
        </div></td>
      <td height="25" valign="top"><div align="center"> 
          <table width="100%" border="0" cellspacing="1" cellpadding="3">
            <tr> 
              <td width="20%">����</td>
              <td width="80%"> 
                <?=$r[username]?>
              </td>
            </tr>
            <tr> 
              <td>IP</td>
              <td> 
                <?=$r[sayip]?>
              </td>
            </tr>
            <tr> 
              <td>ʱ��</td>
              <td> 
                <?=$r[saytime]?>
              </td>
            </tr>
          </table>
        </div></td>
      <td height="25" valign="top" ondblclick="window.open('../../pl?classid=<?=$r[classid]?>&id=<?=$r[id]?>');"> 
        <?=$saytext?>
      </td>
      <td height="25"><div align="center"> 
          <?=$title?>
        </div></td>
    </tr>
    <?php
	}
	db_close();
	$empire=null;
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25"> <div align="center"> 
          <input type=checkbox name=chkall value=on onclick=CheckAll(this.form)>
        </div></td>
      <td height="25" colspan="3"> <div align="right">
          <input type="submit" name="Submit" value="�������" onClick="document.form1.enews.value='CheckPl_all';">
          &nbsp;&nbsp;&nbsp; 
          <input type="submit" name="Submit3" value="�Ƽ�����" onClick="document.form1.enews.value='DoGoodPl_all';document.form1.isgood.value='1';">
          &nbsp;&nbsp;&nbsp; 
          <input type="submit" name="Submit4" value="ȡ���Ƽ�����" onClick="document.form1.enews.value='DoGoodPl_all';document.form1.isgood.value='0';">
          &nbsp;&nbsp;&nbsp; 
          <input type="submit" name="Submit" value="ɾ��" onClick="document.form1.enews.value='DelPl_all';">
          <input name="enews" type="hidden" id="enews" value="DelPl_all">
        </div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25">&nbsp;</td>
      <td height="25" colspan="3"> 
        <?=$returnpage?>
         </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="4"><font color="#666666">˵������ѡ��Ϊ��ɫ����δ������ۣ��Ӵ�����Ϊ��½��Ա������ʱ���ɫΪ�Ƽ�����</font></td>
    </tr>
  </table>
</form>
<IFRAME frameBorder="0" id="showclassnav" name="showclassnav" scrolling="no" src="../ShowClassNav.php?ecms=6&classid=<?=$classid?>" style="HEIGHT:0;VISIBILITY:inherit;WIDTH:0;Z-INDEX:1"></IFRAME>
</body>
</html>