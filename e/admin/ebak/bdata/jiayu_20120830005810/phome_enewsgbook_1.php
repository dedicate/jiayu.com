<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsgbook`;");
E_C("CREATE TABLE `phome_enewsgbook` (
  `lyid` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  `call` varchar(30) NOT NULL default '',
  `lytime` datetime NOT NULL default '0000-00-00 00:00:00',
  `lytext` text NOT NULL,
  `retext` text NOT NULL,
  `bid` smallint(6) NOT NULL default '0',
  `ip` varchar(20) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`lyid`),
  KEY `bid` (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>