<?php
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/q_functions.php");
require("../class/user.php");
eCheckCloseMods('pay');//�ر�ģ��
$link=db_connect();
$empire=new mysqlquery();

$money=(float)$_POST['money'];
if($money<=0)
{
	printerror('֧������Ϊ0','',1,0,1);
}
$payid=(int)$_POST['payid'];
if(!$payid)
{
	printerror('��ѡ��֧��ƽ̨','',1,0,1);
}
$payr=$empire->fetch1("select * from {$dbtbpre}enewspayapi where payid='$payid' and isclose=0");
if(!$payr[payid])
{
	printerror('��ѡ��֧��ƽ̨','',1,0,1);
}
$ddno='';
$phome=$_POST['phome'];
if($phome=='PayToFen')//�������
{
	$productname='�������';
}
elseif($phome=='PayToMoney')//��Ԥ����
{
	$productname='��Ԥ����';
}
elseif($phome=='ShopPay')//�̳�֧��
{
	$productname='�̳�֧��';
}
else
{
	printerror('�����Ե����Ӳ�����','',1,0,1);
}

include('payfun.php');

if($phome=='PayToFen'||$phome=='PayToMoney')
{
	$user=islogin();//�Ƿ��½
	$pr=$empire->fetch1("select paymoneytofen,payminmoney from {$dbtbpre}enewspublic limit 1");
	if($money<$pr['payminmoney'])
	{
		printerror('����С�� '.$pr['payminmoney'].' Ԫ','',1,0,1);
	}
}
elseif($phome=='ShopPay')
{
	$ddid=(int)getcvar('paymoneyddid');
	$ddr=PayApiShopDdMoney($ddid);
	if($money!=$ddr['tmoney'])
	{
		printerror('�����������','',1,0,1);
	}
	$ddno=$ddr[ddno];
	$productname="֧������:".$ddno;
}

esetcookie("payphome",$phome,0);
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