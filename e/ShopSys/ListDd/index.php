<?php
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/q_functions.php");
require("../../class/user.php");
require "../".LoadLang("pub/fun.php");
eCheckCloseMods('shop');//�ر�ģ��
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//�Ƿ��½
$user=islogin();
$page=(int)$_GET['page'];
$start=0;
$line=16;//ÿҳ��ʾ����
$page_line=18;//ÿҳ��ʾ������
$offset=$page*$line;//��ƫ����
$add="";
$search='';
$totalquery="select count(*) as total from {$dbtbpre}enewsshopdd where userid='$user[userid]'";
$query="select ddid,ddno,ddtime,userid,username,outproduct,haveprice,checked,truename,psid,psname,pstotal,alltotal,payfsid,payfsname,payby,alltotalfen,fp,fptotal from {$dbtbpre}enewsshopdd where userid='$user[userid]'";
//����
$sear=$_GET['sear'];
if($sear)
{
	$keyboard=RepPostVar($_GET['keyboard']);
	$add=" and ddno like '%$keyboard%'";
	//ʱ��
	$starttime=RepPostVar($_GET['starttime']);
	$endtime=RepPostVar($_GET['endtime']);
	if($endtime!="")
	{
		$ostarttime=$starttime." 00:00:00";
		$oendtime=$endtime." 23:59:59";
		$add.=" and ddtime>='$ostarttime' and ddtime<='$oendtime'";
	}
	$search="&sear=1&keyboard=$keyboard&starttime=$starttime&endtime=$endtime";
}
$totalquery.=$add;
$num=$empire->gettotal($totalquery);//ȡ��������
$query.=$add;
$query=$query." order by ddid desc limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page1($num,$line,$page_line,$start,$page,$search);
//����ģ��
require(ECMS_PATH.'e/template/ShopSys/ListDd.php');
db_close();
$empire=null;
?>
