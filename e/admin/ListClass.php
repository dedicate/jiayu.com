<?php
define('EmpireCMSAdmin','1');
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/functions.php");
require LoadLang("pub/fun.php");
$link=db_connect();
$empire=new mysqlquery();
//��֤�û�
$lur=is_login();
$logininid=$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];
//��֤Ȩ��
CheckLevel($logininid,$loginin,$classid,"class");

//��ʾ���޼���Ŀ[������Ŀʱ]
function ShowClass_ListClass($bclassid,$exp){
	global $empire,$fun_r,$dbtbpre;
	//��
	if(getcvar('displayclass',1))
	{
		$display=" style='display=none'";
    }
	if(empty($bclassid))
	{
		$bclassid=0;
		$exp="";
    }
	else
	{
		$exp="&nbsp;&nbsp;&nbsp;".$exp;
	}
	$sql=$empire->query("select * from {$dbtbpre}enewsclass where bclassid='$bclassid' order by myorder,classid");
	$returnstr="";
	while($r=$empire->fetch($sql))
	{
		$classurl=sys_ReturnBqClassUrl($r);
		$divonclick="";
		$start_tbody="";
		$end_tbody="";
		$docinfo="";
		$classinfotype='';
		//�ռ���Ŀ
		if($r[islast])
		{
			$img="<a href='AddNews.php?enews=AddNews&classid=".$r[classid]."' target=_blank><img src='../data/images/txt.gif' border=0></a>";
			$bgcolor="#ffffff";
			$renewshtml=" <a href='#e' onclick=renews(".$r[classid].",'".$r[tbname]."')>".$fun_r['news']."</a> ";
			$docinfo=" <a href='#e' onclick=docinfo(".$r[classid].")>�鵵</a>";
			$classinfotype=" <a href='#e' onclick=ttc(".$r[classid].")>����</a>";
		}
		else
		{
			$img="<img src='../data/images/dir.gif'>";
			if(empty($r[bclassid]))
			{
				$bgcolor="#DBEAF5";
				$divonclick=" onMouseUp='turnit(classdiv".$r[classid].");' style='CURSOR:hand'";
				$start_tbody="<tbody id='classdiv".$r[classid]."'".$display.">";
				$end_tbody="</tbody>";
		    }
			else
			{$bgcolor="#ffffff";}
			$renewshtml=" <a href='#e' onclick=renews(".$r[classid].",'".$r[tbname]."')>".$fun_r['news']."</a> ";
		}
		//�ⲿ��Ŀ
		$classname=$r[classname];
		if($r[wburl])
		{
			$classname="<font color='#666666'>".$classname."&nbsp;(�ⲿ)</font>";
		}
		$returnstr.="<tr bgcolor='".$bgcolor."' height=25><td><input type=text name=myorder[] value=".$r[myorder]." size=2><input type=hidden name=classid[] value=".$r[classid]."></td><td".$divonclick.">".$exp.$img."</td><td align=center>".$r[classid]."</td><td><input type=checkbox name=reclassid[] value=".$r[classid]."> <a href='".$classurl."' target=_blank>".$classname."</a></td><td align=center>".$r[onclick]."</td><td><a href='#e' onclick=editc(".$r[classid].")>".$fun_r['edit']."</a> <a href='#e' onclick=copyc(".$r[classid].")>".$fun_r['copyclass']."</a> <a href='#e' onclick=delc(".$r[classid].")>".$fun_r['del']."</a></td><td><a href='#e' onclick=relist(".$r[classid].")>".$fun_r['re']."</a>".$renewshtml."<a href='#e' onclick=rejs(".$r[classid].")>JS</a> <a href='#e' onclick=tvurl(".$r[classid].")>����</a>".$classinfotype.$docinfo."</td></tr>";
		//ȡ������Ŀ
		if(empty($r[islast]))
		{
			$returnstr.=$start_tbody.ShowClass_ListClass($r[classid],$exp).$end_tbody;
		}
	}
	return $returnstr;
}

//չ��
if($_GET['doopen'])
{
	$open=(int)$_GET['open'];
	SetDisplayClass($open);
}
//ͼ��
if(getcvar('displayclass',1))
{
	$img="<a href='ListClass.php?doopen=1&open=0' title='չ��'><img src='../data/images/displaynoadd.gif' width='15' height='15' border='0'></a>";
}
else
{
	$img="<a href='ListClass.php?doopen=1&open=1' title='����'><img src='../data/images/displayadd.gif' width='15' height='15' border='0'></a>";
}
//����
$displayclass=(int)getcvar('displayclass',1);
$fcfile="../data/fc/ListClass".$displayclass.".php";
echo"<link rel=\"stylesheet\" href=\"adminstyle/".$loginadminstyleid."/adminstyle.css\" type=\"text/css\">";
if(file_exists($fcfile))
{
	@include($fcfile);
	exit();
}
@ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>������Ŀ</title>
<SCRIPT lanuage="JScript">
function turnit(ss)
{
 if (ss.style.display=="") 
  ss.style.display="none";
 else
  ss.style.display=""; 
}
var newWindow = null

//���õ�ַ
function tvurl(classid){
	window.open('view/ClassUrl.php?classid='+classid,'','width=500,height=250');
}
//ˢ����Ŀ
function relist(classid){
	self.location.href='enews.php?enews=ReListHtml&from=ListClass.php&classid='+classid;
}
//ˢ����Ϣ
function renews(classid,tbname){
	window.open('ReHtml/DoRehtml.php?enews=ReNewsHtml&from=ListClass.php&classid='+classid+'&tbname[]='+tbname);
}
//�鵵
function docinfo(classid){
	if(confirm('ȷ�Ϲ鵵?'))
	{
		self.location.href='ecmsinfo.php?enews=InfoToDoc&ecmsdoc=1&docfrom=ListClass.php&classid='+classid;
	}
}
//ˢ��JS
function rejs(classid){
	self.location.href='ecmschtml.php?enews=ReSingleJs&doing=0&classid='+classid;
}
//����
function copyc(classid){
	self.location.href='AddClass.php?classid='+classid+'&enews=AddClass&docopy=1';
}
//�޸�
function editc(classid){
	self.location.href='AddClass.php?classid='+classid+'&enews=EditClass';
}
//ɾ��
function delc(classid){
	if(confirm('ȷ��Ҫɾ������Ŀ����ɾ����������Ŀ����Ϣ'))
	{
		self.location.href='ecmsclass.php?classid='+classid+'&enews=DelClass';
	}
}
//�������
function ttc(classid){
	window.open('ClassInfoType.php?classid='+classid);
}
</SCRIPT>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td width="18%">λ��: <a href="ListClass.php">������Ŀ</a></td>
    <td width="82%"> <div align="right" class="emenubutton">
        <input type="button" name="Submit6" value="������Ŀ" onclick="self.location.href='AddClass.php?enews=AddClass'">
        <input type="button" name="Submit" value="ˢ����ҳ" onclick="self.location.href='ecmschtml.php?enews=ReIndex'">
        <input type="button" name="Submit2" value="ˢ��������Ŀҳ" onclick="window.open('ecmschtml.php?enews=ReListHtml_all&from=ListClass.php','','');">
        <input type="button" name="Submit3" value="ˢ��������Ϣҳ��" onclick="window.open('ReHtml/DoRehtml.php?enews=ReNewsHtml&start=0&from=ListClass.php','','');">
        <input type="button" name="Submit4" value="ˢ������JS����" onclick="window.open('ecmschtml.php?enews=ReAllNewsJs&from=ListClass.php','','');">
      </div></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
  <form name=editorder method=post action=ecmsclass.php onsubmit="return confirm('ȷ��Ҫ����?');">
    <tr class="header" height="25"> 
      <td width="5%" align="center">˳��</td>
      <td width="7%" align="center"><?=$img?></td>
      <td width="6%" align="center">ID</td>
      <td width="36%">��Ŀ��</td>
      <td width="6%" align="center">����</td>
      <td width="14%">��Ŀ����</td>
      <td width="29%">����</td>
    </tr>
    <?
 echo ShowClass_ListClass(0,'');
  ?>
    <tr class="header"> 
      <td height="25" colspan="7"> <div align="left"> &nbsp;&nbsp;
          <input type="submit" name="Submit5" value="�޸���Ŀ˳��" onClick="document.editorder.enews.value='EditClassOrder';document.editorder.action='ecmsclass.php';">&nbsp;&nbsp;
          <input name="enews" type="hidden" id="enews" value="EditClassOrder">
          <input type="submit" name="Submit7" value="ˢ����Ŀҳ��" onClick="document.editorder.enews.value='GoReListHtmlMoreA';document.editorder.action='ecmschtml.php';">&nbsp;&nbsp;
          <input type="submit" name="Submit72" value="�ռ���Ŀ����ת��" onClick="document.editorder.enews.value='ChangeClassIslast';document.editorder.action='ecmsclass.php';">
        </div></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="7"><strong>�ռ���Ŀ����ת��˵��(ֻ��ѡ�񵥸���Ŀ)��</strong><br>
        �����ѡ�����<font color="#FF0000">���ռ���Ŀ</font>����תΪ<font color="#FF0000">�ռ���Ŀ</font><font color="#666666">(����Ŀ����������Ŀ)</font><br>
        �����ѡ�����<font color="#FF0000">�ռ���Ŀ</font>����תΪ<font color="#FF0000">���ռ���Ŀ</font><font color="#666666">(���Ȱѵ�ǰ��Ŀ������ת�ƣ�����������������)<br>
        </font><strong>�޸���Ŀ˳��:˳��ֵԽСԽǰ��</strong></td>
    </tr>
    <input name="from" type="hidden" value="ListClass.php">
    <input name="gore" type="hidden" value="0">
  </form>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class="header"> 
    <td width="13%" height="25"> 
      <div align="center">����</div></td>
    <td width="39%" height="25">���õ�ַ</td>
    <td width="13%">
<div align="center">����</div></td>
    <td width="35%"> 
      <div align="center">���õ�ַ</div></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF"><div align="center">������Ϣ����</div></td>
    <td height="25" bgcolor="#FFFFFF"> <input name="textfield" type="text" value="<?=$public_r[newsurl]?>d/js/js/hotnews.js">
      [<a href="ecmschtml.php?enews=ReHot_NewNews">ˢ��</a>][<a href="view/js.php?js=hotnews&p=js" target="_blank">Ԥ��</a>]</td>
    <td bgcolor="#FFFFFF"><div align="center">����������</div></td>
    <td bgcolor="#FFFFFF"> <div align="left"> 
        <input name="textfield3" type="text" value="<?=$public_r[newsurl]?>d/js/js/search_news1.js">
        [<a href="view/js.php?js=search_news1&p=js" target="_blank">Ԥ��</a>]</div></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF"> <div align="center">������Ϣ����</div></td>
    <td height="25" bgcolor="#FFFFFF"> <input name="textfield2" type="text" value="<?=$public_r[newsurl]?>d/js/js/newnews.js">
      [<a href="ecmschtml.php?enews=ReHot_NewNews">ˢ��</a>][<a href="view/js.php?js=newnews&p=js" target="_blank">Ԥ��</a>]</td>
    <td bgcolor="#FFFFFF"><div align="center">����������</div></td>
    <td bgcolor="#FFFFFF"> <div align="left"> 
        <input name="textfield4" type="text" value="<?=$public_r[newsurl]?>d/js/js/search_news2.js">
        [<a href="view/js.php?js=search_news2&p=js" target="_blank">Ԥ��</a>]</div></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF"><div align="center">�Ƽ���Ϣ����</div></td>
    <td height="25" bgcolor="#FFFFFF"><input name="textfield22" type="text" value="<?=$public_r[newsurl]?>d/js/js/goodnews.js">
      [<a href="ecmschtml.php?enews=ReHot_NewNews">ˢ��</a>][<a href="view/js.php?js=goodnews&p=js" target="_blank">Ԥ��</a>]</td>
    <td bgcolor="#FFFFFF"><div align="center">����ҳ���ַ</div></td>
    <td bgcolor="#FFFFFF"> <div align="left"> 
        <input name="textfield5" type="text" value="<?=$public_r[newsurl]?>search">
        [<a href="../../search" target="_blank">Ԥ��</a>]</div></td>
  </tr>
  <tr> 
    <td height="24" bgcolor="#FFFFFF"> 
      <div align="center">��������ַ</div></td>
    <td height="24" bgcolor="#FFFFFF">
<input name="textfield52" type="text" value="<?=$public_r[newsurl]?>e/member/cp">
      [<a href="../member/cp" target="_blank">Ԥ��</a>]</td>
    <td bgcolor="#FFFFFF"><div align="center"></div></td>
    <td bgcolor="#FFFFFF"><div align="center"></div></td>
  </tr>
  <tr class="header"> 
    <td height="25" colspan="4">js���÷�ʽ��&lt;script src=js��ַ&gt;&lt;/script&gt;</td>
  </tr>
</table>
</body>
</html>
<?
db_close();
$empire=null;
$string=@ob_get_contents();
WriteFiletext($fcfile,AddCheckViewTempCode().$string);
?>
