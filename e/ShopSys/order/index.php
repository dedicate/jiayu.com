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
//�û���Ϣ
$user=array();
$user[userid]=0;
if(getcvar('mluserid'))
{
	$user=islogin();
	$email=GetUserEmail($user[userid],$user[username]);
	$r=$empire->fetch1("select truename,oicq,msn,`call`,phone,address,zip from {$dbtbpre}enewsmemberadd where userid='$user[userid]' limit 1");
}
//����ģ��
require(ECMS_PATH.'e/template/ShopSys/order.php');
db_close();
$empire=null;
?>