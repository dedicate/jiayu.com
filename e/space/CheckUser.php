<?php
if(!defined('InEmpireCMS'))
{
	exit();
}

//ͳ�Ʒ���
function UpdateSpaceViewStats($userid){
	global $empire,$dbtbpre;
	if(!getcvar('dospacevstats'))
	{
		$sql=$empire->query("update {$dbtbpre}enewsmemberadd set viewstats=viewstats+1 where userid='".$userid."' limit 1");
		esetcookie("dospacevstats",1,time()+3600);
	}
}

//�ر�
if($public_r['openspace']==1)
{
	printerror('CloseMemberSpace','',1);
}

require_once ECMS_PATH.'e/space/spacefun.php';

//�û��Ƿ����
$userid=intval($_GET['userid']);
if($userid)
{
	$add="userid=$userid";
	$username='';
	$utfusername='';
	$uadd="$user_userid=$userid";
}
else
{
	$username=RepPostVar($_GET['username']);
	if(empty($username))
	{
		printerror("NotUsername","",1);
	}
	$add="username='$username'";
	$utfusername=doUtfAndGbk($username,0);
	$uadd="$user_username='$utfusername'";
}
$ur=$empire->fetch1("select * from ".$user_tablename." where ".$uadd." limit 1");
if(empty($ur[$user_username]))
{
	printerror("NotUsername","",1);
}
$userid=$userid?$userid:$ur[$user_userid];
$utfusername=$utfusername?$utfusername:doUtfAndGbk($ur[$user_username],0);
$username=$username?$username:doUtfAndGbk($ur[$user_username],1);
$groupid=$ur[$user_group];
UpdateSpaceViewStats($userid);//ͳ�Ʒ���
$addur=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='".$userid."' limit 1");
//ͷ��
$userpic=$addur['userpic']?$addur['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
//�ռ��ַ
$spaceurl=eReturnDomainSiteUrl()."e/space/?userid=".$userid;
//�ռ�����
$spacename=$addur['spacename']?$addur['spacename']:$username." �ĸ��˿ռ�";
//�ռ�ģ��
$spacestyleid=$addur['spacestyleid'];
if(empty($spacestyleid))
{
	$spacestyleid=$public_r['defspacestyleid'];
}
$spacestyler=$empire->fetch1("select stylepath from {$dbtbpre}enewsspacestyle where styleid='$spacestyleid'");
$spacestyle=$spacestyler['stylepath']?$spacestyler['stylepath']:'default';
?>