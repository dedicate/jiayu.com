<?php
require("../../class/connect.php");
require("../../class/q_functions.php");
require("../../class/db_sql.php");
require("../../data/dbcache/class.php");
require("../../class/user.php");
require("../../class/ShopSysFun.php");
eCheckCloseMods('shop');//�ر�ģ��
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//��֤Ȩ��
ShopCheckAddDdGroup();

$r=$_POST;
if(!getcvar('mybuycar'))
{
	printerror('��Ĺ��ﳵû����Ʒ','',1,0,1);
}

if(!$r[truename]||!$r[calla]||!$r[email]||!$r[addressa]||!$r[g_truename]||!$r[g_call]||!$r[g_email]||!$r[g_address])
{
	printerror('�����˼��ջ�����Ϣû����д����','',1,0,1);
}

if(!$r[psid])
{
	printerror('��ѡ�����ͷ�ʽ','',1,0,1);
}
if(!$r[payfsid])
{
	printerror('��ѡ��֧����ʽ','',1,0,1);
}

$ddno=time();//����ID
//��Ʊ̧ͷ
if(empty($r[fp]))
{
	$r[fptt]="";
}
//����ģ��
require(ECMS_PATH.'e/template/ShopSys/SubmitOrder.php');
db_close();
$empire=null;
?>