<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsshoppayfs`;");
E_C("CREATE TABLE `phome_enewsshoppayfs` (
  `payid` smallint(6) NOT NULL auto_increment,
  `payname` varchar(60) NOT NULL default '',
  `payurl` varchar(255) NOT NULL default '',
  `paysay` text NOT NULL,
  `userpay` tinyint(1) NOT NULL default '0',
  `userfen` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`payid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsshoppayfs` values('1','�������','','��������ַ:******','0','0');");
E_D("replace into `phome_enewsshoppayfs` values('2','����ת��','','����ת���ʺ�:******','0','0');");
E_D("replace into `phome_enewsshoppayfs` values('3','����֧��','/e/payapi/ShopPay.php?paytype=alipay','<p>����֧��</p>','0','0');");
E_D("replace into `phome_enewsshoppayfs` values('4','Ԥ����֧��','','Ԥ����֧��','1','0');");
E_D("replace into `phome_enewsshoppayfs` values('5','��������(�������տ�)','','��������(�������տ�)˵��','0','0');");
E_D("replace into `phome_enewsshoppayfs` values('6','��������','','��������','0','1');");

@include("../../inc/footer.php");
?>