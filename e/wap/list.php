<?php
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/q_functions.php");
require("../data/dbcache/class.php");
$link=db_connect();
$empire=new mysqlquery();
define('WapPage','list');
require("wapfun.php");

//��ĿID
$classid=(int)$_GET['classid'];
if(!$classid||!$class_r[$classid]['tbname'])
{
	DoWapShowMsg('�����Ե����Ӳ�����','index.php?style=$wapstyle');
}
$pagetitle=$class_r[$classid]['classname'];

$bclassid=(int)$_GET['bclassid'];
$search='';
$add='';
if($class_r[$classid]['islast'])
{
	$add.=" and classid='$classid'";
}
else
{
	$where=ReturnClass($class_r[$classid][sonclass]);
	$add.=" and (".$where.")";
}
$modid=$class_r[$classid][modid];
//�Ż�
$yhid=$class_r[$classid][yhid];
$yhvar='qlist';
$yhadd='';
if($yhid)
{
	$yhadd=ReturnYhSql($yhid,$yhvar);
}
$search.="&amp;style=$wapstyle&amp;classid=$classid&amp;bclassid=$bclassid";

$page=intval($_GET['page']);
$line=$pr['waplistnum'];//ÿҳ��ʾ��¼��
$offset=$page*$line;
$query="select ".ReturnSqlListF($modid)." from {$dbtbpre}ecms_".$class_r[$classid]['tbname']." where ".$yhadd."checked=1".$add;
$totalnum=intval($_GET['totalnum']);
if($totalnum<1)
{
	$totalquery="select count(*) as total from {$dbtbpre}ecms_".$class_r[$classid]['tbname']." where ".$yhadd."checked=1".$add;
	$num=$empire->gettotal($totalquery);//ȡ��������
}
else
{
	$num=$totalnum;
}
$search.="&amp;totalnum=$num";
//����
if(empty($class_r[$classid][reorder]))
{
	$addorder="newstime desc";
}
else
{
	$addorder=$class_r[$classid][reorder];
}
$query.=" order by ".ReturnSetTopSql('list').$addorder." limit $offset,$line";
$sql=$empire->query($query);
$returnpage=DoWapListPage($num,$line,$page,$search);
//ϵͳģ��
$ret_r=ReturnAddF($modid,2);
require('template/'.$usewapstyle.'/list.temp.php');
db_close();
$empire=null;
?>