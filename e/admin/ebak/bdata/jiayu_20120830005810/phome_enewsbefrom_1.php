<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsbefrom`;");
E_C("CREATE TABLE `phome_enewsbefrom` (
  `befromid` smallint(6) NOT NULL auto_increment,
  `sitename` varchar(60) NOT NULL default '',
  `siteurl` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`befromid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsbefrom` values('4','����������','http://www.jiayu.gov.cn/');");
E_D("replace into `phome_enewsbefrom` values('5','�й�������','http://www.cnjiayu.com.cn/');");
E_D("replace into `phome_enewsbefrom` values('6','��������','http://www.jiayu.net/');");

@include("../../inc/footer.php");
?>