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

//������Ƭ��Ϣ����
function ReturnSpInfoidGetData($add,$userid,$username){
	global $empire,$dbtbpre,$class_r,$emod_r;
	$idr=explode(',',$add['getinfoid']);
	$classid=(int)$idr[0];
	$id=(int)$idr[1];
	if(!$classid||!$id||!$class_r[$classid][tbname])
	{
		return '';
	}
	$mid=$class_r[$classid]['modid'];
	$smalltextf=$emod_r[$mid]['smalltextf'];
	$sf='';
	if($smalltextf&&$smalltextf<>',')
	{
		$smr=explode(',',$smalltextf);
		$sf=$smr[1];
	}
	$addf='';
	if($sf&&!strstr($emod_r[$mid]['tbdataf'],','.$sf.','))
	{
		$addf=','.$sf;
	}
	$infor=$empire->fetch1("select id,classid,titleurl,groupid,newspath,filename,checked,isgood,firsttitle,plnum,totaldown,onclick,newstime,titlepic,title,stb".$addf." from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id'");
	if(!$infor['id'])
	{
		return '';
	}
	if($sf&&!$addf)
	{
		$finfor=$empire->fetch1("select ".$sf." from {$dbtbpre}ecms_".$class_r[$classid][tbname]."_data_".$infor[stb]." where id='$id'");
		$infor[$sf]=$finfor[$sf];
	}
	$ret_r['title']=$infor[title];
	$ret_r['titleurl']=sys_ReturnBqTitleLink($infor);
	$ret_r['titlepic']=$infor[titlepic];
	$ret_r['smalltext']=$infor[$sf];
	$ret_r['newstime']=$infor[newstime];
	return $ret_r;
}

$spid=(int)$_GET['spid'];
//��Ƭ
$spr=$empire->fetch1("select spid,spname,varname,sptype,maxnum,groupid,userclass,username from {$dbtbpre}enewssp where spid='$spid'");
if(!$spr['spid'])
{
	printerror('ErrorUrl','');
}
//��֤����Ȩ��
CheckDoLevel($lur,$spr[groupid],$spr[userclass],$spr[username]);
$enews=$_GET['enews'];
$postword='������Ƭ��Ϣ';
$todaytime=date("Y-m-d H:i:s");
$url="<a href=UpdateSp.php>������Ƭ</a>&nbsp;>&nbsp;<a href=ListSpInfo.php?spid=$spid>".$spr[spname]."</a>&nbsp;>&nbsp;������Ƭ��Ϣ";
//�޸�
if($enews=="EditSpInfo")
{
	$postword='�޸���Ƭ��Ϣ';
	$sid=(int)$_GET['sid'];
	if($spr[sptype]==1)
	{
		$r=$empire->fetch1("select * from {$dbtbpre}enewssp_1 where sid='$sid' and spid='$spid'");
		$newstime=date('Y-m-d H:i:s',$r[newstime]);
		//��������
		if(strstr($r[titlefont],','))
		{
			$tfontr=explode(',',$r[titlefont]);
			$r[titlecolor]=$tfontr[0];
			$r[titlefont]=$tfontr[1];
		}
		if(strstr($r[titlefont],"b|"))
		{
			$titlefontb=" checked";
		}
		if(strstr($r[titlefont],"i|"))
		{
			$titlefonti=" checked";
		}
		if(strstr($r[titlefont],"s|"))
		{
			$titlefonts=" checked";
		}
		$url="<a href=UpdateSp.php>������Ƭ</a>&nbsp;>&nbsp;<a href=ListSpInfo.php?spid=$spid>".$spr[spname]."</a>&nbsp;>&nbsp;�޸���Ƭ��Ϣ";
	}
	elseif($spr[sptype]==2)
	{
		$r=$empire->fetch1("select * from {$dbtbpre}enewssp_2 where sid='$sid' and spid='$spid'");
		$newstime=date('Y-m-d H:i:s',$r[newstime]);
		$url="<a href=UpdateSp.php>������Ƭ</a>&nbsp;>&nbsp;<a href=ListSpInfo.php?spid=$spid>".$spr[spname]."</a>&nbsp;>&nbsp;�޸���Ƭ��Ϣ";
	}
	elseif($spr[sptype]==3)
	{
		$r=$empire->fetch1("select * from {$dbtbpre}enewssp_3 where spid='$spid' limit 1");
		$url="<a href=UpdateSp.php>������Ƭ</a>&nbsp;>&nbsp;".$spr[spname]."&nbsp;>&nbsp;�޸���Ƭ��Ϣ";
	}
}
//ȡ����Ϣ
$ecms=$_GET['ecms'];
if($ecms=='InfoidGetData')
{
	include("../../data/dbcache/class.php");
	$getinfor=ReturnSpInfoidGetData($_GET,$logininid,$loginin);
	if($getinfor['title'])
	{
		$r['title']=$getinfor['title'];
		$r['titlepic']=$getinfor['titlepic'];
		$r['titleurl']=$getinfor['titleurl'];
		$r['newstime']=$getinfor['newstime'];
		$r['smalltext']=$getinfor['smalltext'];
		$newstime=date('Y-m-d H:i:s',$r[newstime]);
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��Ƭ</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<script>
function foreColor(){
  if(!Error())	return;
  var arr = showModalDialog("../../data/html/selcolor.html", "", "dialogWidth:18.5em; dialogHeight:17.5em; status:0");
  if (arr != null) document.form1.titlecolor.value=arr;
  else document.form1.titlecolor.focus();
}
</script>
<script>
function ToGetInfo(){
	var infoid;
	infoid=prompt('��������ϢID����ʽ����ĿID,��ϢID',',');
	if(infoid==''||infoid==null||infoid==',')
	{
		return false;
	}
	self.location.href='AddSpInfo.php?enews=<?=$enews?>&spid=<?=$spid?>&sid=<?=$sid?>&ecms=InfoidGetData&getinfoid='+infoid;
}
</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td>λ�ã�<?=$url?></td>
  </tr>
</table>
<?php
if($spr['sptype']==1)
{
?>
<form name="form1" method="post" action="ListSpInfo.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr class="header"> 
      <td height="25" colspan="2"> 
        <?=$postword?>
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="14%" height="25">���⣺</td>
      <td width="86%" height="25"><input name="title" type="text" id="title" size="60" value="<?=htmlspecialchars(stripSlashes($r[title]))?>">
        <input type="button" name="Submit5" value="ͨ����ϢID��ȡ" onclick="ToGetInfo();"> </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">�������ӣ�</td>
      <td height="25"><input name="titleurl" type="text" id="titleurl" size="60" value="<?=stripSlashes($r[titleurl])?>"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">�������ԣ�</td>
      <td height="25"> <table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr> 
            <td> <input name="titlefont[b]" type="checkbox" value="b"<?=$titlefontb?>>
              ���� 
              <input name="titlefont[i]" type="checkbox" value="i"<?=$titlefonti?>>
              б�� 
              <input name="titlefont[s]" type="checkbox" value="s"<?=$titlefonts?>>
              ɾ���� &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ɫ: 
              <input name="titlecolor" type="text" value="<?=stripSlashes($r[titlecolor])?>" size="10"> 
              <a onclick="foreColor();"><img src="../../data/images/color.gif" width="21" height="21" align="absbottom"></a></td>
          </tr>
          <tr> 
            <td>���: 
              <input name="titlepre" type="text" id="titlepre3" value="<?=htmlspecialchars(stripSlashes($r[titlepre]))?>" size="21">
              �ұ�: 
              <input name="titlenext" type="text" id="titlenext" value="<?=htmlspecialchars(stripSlashes($r[titlenext]))?>" size="21"> 
            </td>
          </tr>
        </table></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">������ͼ��</td>
      <td height="25"><input name="titlepic" type="text" id="titlepic" size="60" value="<?=stripSlashes($r[titlepic])?>">
        <a onclick="window.open('../ecmseditor/FileMain.php?type=1&classid=&doing=2&field=titlepic','','width=700,height=550,scrollbars=yes');" title="ѡ�����ϴ���ͼƬ"><img src="../../data/images/changeimg.gif" alt="ѡ��/�ϴ�ͼƬ" width="22" height="22" border="0" align="absbottom"></a></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25">�����ͼ��</td>
      <td height="25"><input name="bigpic" type="text" id="bigpic" size="60" value="<?=stripSlashes($r[bigpic])?>">
        <a onclick="window.open('../ecmseditor/FileMain.php?type=1&classid=&doing=2&field=bigpic','','width=700,height=550,scrollbars=yes');" title="ѡ�����ϴ���ͼƬ"><img src="../../data/images/changeimg.gif" alt="ѡ��/�ϴ�ͼƬ" width="22" height="22" border="0" align="absbottom"></a></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">����ʱ�䣺</td>
      <td height="25"><input name="newstime" type="text" id="title3" size="60" value="<?=$newstime?>">
        <input type="button" name="Submit3" value="��ǰʱ��" onclick="document.form1.newstime.value='<?=$todaytime?>';"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">���ݼ�飺</td>
      <td height="25"><textarea name="smalltext" cols="60" rows="5" id="smalltext"><?=htmlspecialchars(stripSlashes($r[smalltext]))?></textarea></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">&nbsp;</td>
      <td height="25"><input type="submit" name="Submit" value="�ύ"> <input type="reset" name="Submit2" value="����"> 
        <input name="enews" type="hidden" id="enews" value="<?=$enews?>"> <input name="sid" type="hidden" id="sid" value="<?=$r[sid]?>"> 
        <input name="spid" type="hidden" id="spid" value="<?=$spid?>"></td>
    </tr>
  </table>
</form>
<?php
}
elseif($spr['sptype']==2)
{
?>
<form name="form1" method="post" action="ListSpInfo.php">
  <table width="100%" border="0" cellspacing="1" cellpadding="3" class="tableborder">
    <tr class="header"> 
      <td height="25" colspan="2"> 
        <?=$postword?>
      </td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="14%" height="25">��Ϣλ�ã�</td>
      <td width="86%" height="25">��ĿID: 
        <input name="classid" type="text" id="titlepre5" value="<?=$r[classid]?>" size="21">
        ��ϢID: 
        <input name="id" type="text" id="classid" value="<?=$r[id]?>" size="21"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">����ʱ�䣺</td>
      <td height="25"><input name="newstime" type="text" id="newstime" size="60" value="<?=$newstime?>"> 
        <input type="button" name="Submit32" value="��ǰʱ��" onclick="document.form1.newstime.value='<?=$todaytime?>';"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">&nbsp;</td>
      <td height="25"><input type="submit" name="Submit4" value="�ύ"> <input type="reset" name="Submit22" value="����"> 
        <input name="enews" type="hidden" id="enews" value="<?=$enews?>"> <input name="sid" type="hidden" id="sid3" value="<?=$r[sid]?>"> 
        <input name="spid" type="hidden" id="spid" value="<?=$spid?>"></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25">&nbsp;</td>
      <td height="25"><font color="#666666">������ʱ��ֱ�Ӷ�ȡ��Ϣ�����ķ���ʱ��.</font></td>
    </tr>
  </table>
</form>
<?php
}
elseif($spr['sptype']==3)
{
?>
	<script>
	function ReSpInfoBak(){
		self.location.href='AddSpInfo.php?enews=EditSpInfo&spid=<?=$spid?>';
	}
	</script>
<form name="form1" method="post" action="ListSpInfo.php">
  <table width="100%" border="0" cellspacing="1" cellpadding="3" class="tableborder">
    <tr class="header"> 
      <td height="25">
        <div align="center"><?=$postword?></div></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="86%" height="25"><div align="center"> 
          <textarea name="sptext" cols="80" rows="27" id="sptext" style="WIDTH: 100%"><?=htmlspecialchars(stripSlashes($r[sptext]))?></textarea>
        </div></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25"><div align="center"> 
          <input type="submit" name="Submit4" value="�ύ">&nbsp;&nbsp;
          &nbsp;&nbsp;<input type="reset" name="Submit22" value="����">
          &nbsp;&nbsp; [<a href="#ecms" onclick="window.open('../template/editor.php?getvar=opener.document.form1.sptext.value&returnvar=opener.document.form1.sptext.value&fun=ReturnHtml&notfullpage=1','edittemp','width=880,height=600,scrollbars=auto,resizable=yes');">���ӻ��༭</a>]&nbsp;&nbsp;[<a href="#empirecms" onclick="window.open('SpInfoBak.php?spid=<?=$r[spid]?>&sid=<?=$r[sid]?>','ViewSpInfoBak','width=450,height=500,scrollbars=yes,left=300,top=150,resizable=yes');">�޸ļ�¼</a>] 
          <input name="enews" type="hidden" id="enews" value="<?=$enews?>">
          <input name="sid" type="hidden" id="sid" value="<?=$r[sid]?>">
          <input name="spid" type="hidden" id="spid" value="<?=$spid?>">
        </div></td>
    </tr>
  </table>
</form>
<?php
}
?>
</body>
</html>
<?php
db_close();
$empire=null;
?>