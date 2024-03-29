<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewspayapi`;");
E_C("CREATE TABLE `phome_enewspayapi` (
  `payid` smallint(6) NOT NULL auto_increment,
  `paytype` varchar(20) NOT NULL default '',
  `myorder` tinyint(4) NOT NULL default '0',
  `payfee` varchar(10) NOT NULL default '',
  `payuser` varchar(60) NOT NULL default '',
  `partner` varchar(60) NOT NULL default '',
  `paykey` varchar(120) NOT NULL default '',
  `paylogo` varchar(200) NOT NULL default '',
  `paysay` text NOT NULL,
  `payname` varchar(120) NOT NULL default '',
  `isclose` tinyint(1) NOT NULL default '0',
  `payemail` varchar(120) NOT NULL default '',
  `paymethod` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`payid`),
  UNIQUE KEY `paytype` (`paytype`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewspayapi` values('1','tenpay','1','0','','','','','财付通（www.tenpay.com） - 腾讯旗下在线支付平台，通过国家权威安全认证，支持各大银行网上支付。','财付通','0','','0');");
E_D("replace into `phome_enewspayapi` values('2','chinabank','2','0','','','','','网银在线与中国工商银行、招商银行、中国建设银行、农业银行、民生银行等数十家金融机构达成协议。全面支持全国19家银行的信用卡及借记卡实现网上支付。（网址：http://www.chinabank.com.cn）','网银在线','0','','0');");
E_D("replace into `phome_enewspayapi` values('3','alipay','0','0','','','','','支付宝网站(www.alipay.com) 是国内先进的网上支付平台。','支付宝接口','0','','1');");

@include("../../inc/footer.php");
?>