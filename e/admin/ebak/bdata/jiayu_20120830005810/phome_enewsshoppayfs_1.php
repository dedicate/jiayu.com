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
E_D("replace into `phome_enewsshoppayfs` values('1','邮政汇款','','邮政汇款地址:******','0','0');");
E_D("replace into `phome_enewsshoppayfs` values('2','银行转帐','','银行转帐帐号:******','0','0');");
E_D("replace into `phome_enewsshoppayfs` values('3','网银支付','/e/payapi/ShopPay.php?paytype=alipay','<p>网银支付</p>','0','0');");
E_D("replace into `phome_enewsshoppayfs` values('4','预付款支付','','预付款支付','1','0');");
E_D("replace into `phome_enewsshoppayfs` values('5','货到付款(或上门收款)','','货到付款(或上门收款)说明','0','0');");
E_D("replace into `phome_enewsshoppayfs` values('6','点数购买','','点数购买','0','1');");

@include("../../inc/footer.php");
?>