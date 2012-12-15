<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewspostserver`;");
E_C("CREATE TABLE `phome_enewspostserver` (
  `pid` smallint(6) NOT NULL auto_increment,
  `pname` varchar(60) NOT NULL default '',
  `purl` varchar(255) NOT NULL default '',
  `ptype` tinyint(1) NOT NULL default '0',
  `ftphost` varchar(255) NOT NULL default '',
  `ftpport` varchar(20) NOT NULL default '',
  `ftpusername` varchar(120) NOT NULL default '',
  `ftppassword` varchar(120) NOT NULL default '',
  `ftppath` varchar(255) NOT NULL default '',
  `ftpmode` tinyint(1) NOT NULL default '0',
  `ftpssl` tinyint(1) NOT NULL default '0',
  `ftppasv` tinyint(1) NOT NULL default '0',
  `ftpouttime` smallint(6) NOT NULL default '0',
  `lastposttime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pid`),
  KEY `ptype` (`ptype`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewspostserver` values('1','¸½¼þ·þÎñÆ÷','','1','','','','','','0','0','0','0','0');");

@include("../../inc/footer.php");
?>