<?php
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/q_functions.php");
require("../class/qinfofun.php");
require("../class/user.php");
require("../data/dbcache/class.php");
require("../data/dbcache/MemberLevel.php");
$link=db_connect();
$empire=new mysqlquery();
if($public_r['addnews_ok'])//�ر�Ͷ��
{
	printerror("NotOpenCQInfo","",1);
}
//��֤IP
eCheckAccessDoIp('postinfo');
$classid=(int)$_GET['classid'];
$mid=$class_r[$classid]['modid'];
if(empty($classid)||empty($mid))
{
	printerror("EmptyQinfoCid","",1);
}
$enews=$_GET['enews'];
if(empty($enews))
{
	$enews="MAddInfo";
}
$r=array();
$muserid=(int)getcvar('mluserid');
$musername=RepPostVar(getcvar('mlusername'));
$mrnd=RepPostVar(getcvar('mlrnd'));
$newstime=time();
$r[newstime]=date("Y-m-d H:i:s");
$todaytime=$r[newstime];
$showkey="";
$r['newstext']="";
//ȡ�õ�½��Ա����
if($muserid)
{
	$memberinfor=$empire->fetch1("select u.*,ui.* from ".$user_tablename." u LEFT JOIN {$dbtbpre}enewsmemberadd ui ON u.{$user_userid}=ui.userid where u.{$user_userid}='$muserid' limit 1");
}
//����
if($enews=="MAddInfo")
{
	$cr=DoQCheckAddLevel($classid,$muserid,$musername,$mrnd,0,1);
	$mr=$empire->fetch1("select qenter,qmname from {$dbtbpre}enewsmod where mid='$cr[modid]'");
	if(empty($mr['qenter']))
	{
		printerror("NotOpenCQInfo","history.go(-1)",1);
	}
	$word="�ύ��Ϣ";
	$ecmsfirstpost=1;
	$rechangeclass="&nbsp;[<a href='ChangeClass.php?mid=".$mid."'>����ѡ��</a>]";
	//��֤��
	if($cr['qaddshowkey'])
	{
		$showkey="<tr bgcolor=\"#FFFFFF\">
      <td width=\"11%\" height=\"25\">��֤��</td>
      <td height=\"25\"><input name=\"key\" type=\"text\" size=\"6\">
        <img src=\"../ShowKey/?v=info\"></td></tr>";
	}
	//ͼƬ
	$imgwidth=0;
	$imgheight=0;
	//�ļ���֤��
	$filepass=time();
}
else
{
	$word="�޸���Ϣ";
	$ecmsfirstpost=0;
	$id=(int)$_GET['id'];
	if(empty($id))
	{
		printerror("EmptyQinfoCid","",1);
	}
	$cr=DoQCheckAddLevel($classid,$muserid,$musername,$mrnd,1,0);
	$mr=$empire->fetch1("select qenter,qmname from {$dbtbpre}enewsmod where mid='$cr[modid]'");
	if(empty($mr['qenter']))
	{
		printerror("NotOpenCQInfo","history.go(-1)",1);
	}
	$r=CheckQdoinfo($classid,$id,$muserid,$cr['tbname'],$cr['adminqinfo'],1);
	//���ʱ��
	if($public_r['qeditinfotime'])
	{
		if(time()-$r['truetime']>$public_r['qeditinfotime']*60)
		{
			printerror("QEditInfoOutTime","history.go(-1)",1);
		}
	}
	$newstime=$r['newstime'];
	$r['newstime']=date("Y-m-d H:i:s",$r['newstime']);
	//ͼƬ
	$imgwidth=170;
	$imgheight=120;
	//�ļ���֤��
	$filepass=$id;
}
$tbname=$cr['tbname'];
esetcookie("qeditinfo","dgcms");
//ר��
$ztwhere=ReturnClass($class_r[$classid][featherclass]);
$z_sql=$empire->query("select ztname,ztid,tbname from {$dbtbpre}enewszt where usezt=0 and (classid=0 or classid='$classid' or (".$ztwhere.")) order by ztid");
$j=0;
$br='';
$zts='';
while($z_r=$empire->fetch($z_sql))
{
	$j++;
	if($j%8==0)
	{
		$br='<br>';
	}
	else
	{
		$br='';
	}
	$select='';
	if(strstr($r[ztid],'|'.$z_r[ztid].'|'))
	{
		$select=" checked";
	}
	$zts.="<input type=checkbox name=ztid[] value='".$z_r[ztid]."'".$select.">".$z_r[ztname]."&nbsp;".$br;
}
//�������
$cttidswhere='';
$caddr=$empire->fetch1("select ttids from {$dbtbpre}enewsclassadd where classid='$classid'");
if($caddr['ttids']&&$caddr['ttids']!=',')
{
	$cttidswhere=' and typeid in ('.substr($caddr['ttids'],1,-1).')';
}
$tts='';
$ttsql=$empire->query("select typeid,tname from {$dbtbpre}enewsinfotype where mid='$cr[modid]'".$cttidswhere." order by myorder");
while($ttr=$empire->fetch($ttsql))
{
	$select='';
	if($ttr[typeid]==$r[ttid])
	{
		$select=' selected';
	}
	$tts.="<option value='$ttr[typeid]'".$select.">$ttr[tname]</option>";
}
//��Ŀ
$classurl=sys_ReturnBqClassname($cr,9);
$postclass="<a href='".$classurl."' target='_blank'>".$class_r[$classid]['classname']."</a>".$rechangeclass;
if($cr['bclassid'])
{
	$bcr['classid']=$cr['bclassid'];
	$bclassurl=sys_ReturnBqClassname($bcr,9);
	$postclass="<a href='".$bclassurl."' target=_blank>".$class_r[$cr['bclassid']]['classname']."</a>&nbsp;>&nbsp;".$postclass;
}
//html�༭��
if($emod_r[$mid]['editorf']&&$emod_r[$mid]['editorf']!=',')
{
	include('../data/ecmseditor/infoeditor/fckeditor.php');
}
if(empty($musername))
{
	$musername="�ο�";
}
$modfile="../data/html/q".$cr['modid'].".php";
//����ģ��
require(ECMS_PATH.'e/template/DoInfo/AddInfo.php');
db_close();
$empire=null;
?>