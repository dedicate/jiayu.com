<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsmembergbook`;");
E_C("CREATE TABLE `phome_enewsmembergbook` (
  `gid` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL default '0',
  `isprivate` tinyint(1) NOT NULL default '0',
  `uid` int(11) NOT NULL default '0',
  `uname` varchar(30) NOT NULL default '',
  `ip` varchar(15) NOT NULL default '',
  `addtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `gbtext` text NOT NULL,
  `retext` text NOT NULL,
  `checked` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`gid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>