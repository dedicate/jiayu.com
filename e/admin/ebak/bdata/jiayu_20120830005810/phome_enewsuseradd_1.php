<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsuseradd`;");
E_C("CREATE TABLE `phome_enewsuseradd` (
  `userid` int(11) NOT NULL auto_increment,
  `equestion` tinyint(4) NOT NULL default '0',
  `eanswer` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsuseradd` values('1','0','');");
E_D("replace into `phome_enewsuseradd` values('2','0','');");
E_D("replace into `phome_enewsuseradd` values('5','0','');");

@include("../../inc/footer.php");
?>