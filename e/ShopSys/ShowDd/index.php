<?php
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/q_functions.php");
require("../../class/user.php");
eCheckCloseMods('shop');//�ر�ģ��
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//�Ƿ��½
$user=islogin();
$ddid=(int)$_GET['ddid'];
$r=$empire->fetch1("select * from {$dbtbpre}enewsshopdd where ddid='$ddid' and userid='$user[userid]' limit 1");
if(empty($r[ddid]))
{
	printerror('�˶���������','',1,0,1);
}
//��Ҫ��Ʊ
$fp="��";
if($r[fp])
{
	$fp="��";
}
//���
$total=0;
if($r[payby]==1)
{
	$pstotal=$r[pstotal]." ��";
	$alltotal=$r[alltotal]." ��";
	$total=$r[pstotal]+$r[alltotal];
	$mytotal=$total." ��";
}
else
{
	$pstotal=$r[pstotal]." Ԫ";
	$alltotal=$r[alltotal]." Ԫ";
	$total=$r[pstotal]+$r[alltotal]+$r[fptotal];
	$mytotal=$total." Ԫ";
}
//֧����ʽ
if($r[payby]==1)
{
	$payfsname=$r[payfsname]."(��������)";
}
elseif($r[payby]==2)
{
	$payfsname=$r[payfsname]."(����)";
}
else
{
	$payfsname=$r[payfsname];
}
//״̬
if($r[checked])
{
	$ch="��ȷ��";
}
else
{
	$ch="<font color=red>δȷ��</font>";
}
//����
if($r[outproduct])
{
	$ou="�ѷ���";
}
else
{
	$ou="<font color=red>δ����</font>";
}
if($r[haveprice])
{
	$ha="�Ѹ���";
}
else
{
	//�Ƿ�����֧��
	$topay='';
	$payfs_r=$empire->fetch1("select payurl from {$dbtbpre}enewsshoppayfs where payid='$r[payfsid]'");
	if($payfs_r['payurl'])
	{
		$topay="&nbsp;&nbsp;&nbsp;&nbsp;<input type='button' name='button' value='���֧��' onclick=\"window.open('../../enews/?ddid=$ddid&enews=ShopDdToPay','','width=760,height=600,scrollbars=yes,resizable=yes');\">";
	}
	$ha="<font color=red>δ����</font>";
}
//����ģ��
require(ECMS_PATH.'e/template/ShopSys/ShowDd.php');
db_close();
$empire=null;
?>