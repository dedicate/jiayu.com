<?php
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/q_functions.php");
require("../class/user.php");
require("../data/dbcache/MemberLevel.php");
eCheckCloseMods('pay');//�ر�ģ��
$link=db_connect();
$empire=new mysqlquery();
//�Ƿ��½
$user=islogin();
//֧��ƽ̨
$payid=intval($_POST['payid']);
if(!$payid)
{
	printerror('��ѡ��֧��ƽ̨','',1,0,1);
}
//��ֵ����
$id=intval($_POST['id']);
if(!$id)
{
	printerror('��ѡ���ֵ����','',1,0,1);
}
$payr=$empire->fetch1("select * from {$dbtbpre}enewspayapi where payid='$payid' and isclose=0 limit 1");
if(!$payr[payid])
{
	printerror('��ѡ��֧��ƽ̨','',1,0,1);
}
$buyr=$empire->fetch1("select * from {$dbtbpre}enewsbuygroup where id='$id'");
if(!$buyr['id'])
{
	printerror('��ѡ���ֵ����','',1,0,1);
}
//Ȩ��
if($buyr[buygroupid]&&$level_r[$buyr[buygroupid]][level]>$level_r[$user[groupid]][level])
{
	printerror('�˳�ֵ������Ҫ '.$level_r[$buyr[buygroupid]][groupname].' ��Ա��������','',1,0,1);
}
include('payfun.php');

$money=$buyr['gmoney'];
if(!$money)
{
	printerror('�˳�ֵ���ͽ������','',1,0,1);
}
$ddno='';
$productname="��ֵ����:".$buyr['gname'];

esetcookie("payphome","BuyGroupPay",0);
esetcookie("paymoneybgid",$id,0);
//���ص�ַǰ׺
$PayReturnUrlQz=$public_r['newsurl'];
if(!stristr($public_r['newsurl'],'://'))
{
	$PayReturnUrlQz=eReturnDomain().$public_r['newsurl'];
}
//����
if($phome_ecms_charver!='gb2312')
{
	@include_once("../class/doiconv.php");
	$iconv=new Chinese('');
	$char=$phome_ecms_charver=='big5'?'BIG5':'UTF8';
	$targetchar='GB2312';
	$productname=$iconv->Convert($char,$targetchar,$productname);
	@header('Content-Type: text/html; charset=gb2312');
}
$file=$payr['paytype'].'/to_pay.php';
@include($file);
db_close();
$empire=null;
?>