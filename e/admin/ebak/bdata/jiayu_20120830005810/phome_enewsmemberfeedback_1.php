<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsmemberfeedback`;");
E_C("CREATE TABLE `phome_enewsmemberfeedback` (
  `fid` int(11) NOT NULL auto_increment,
  `name` varchar(12) NOT NULL default '',
  `company` varchar(80) NOT NULL default '',
  `phone` varchar(30) NOT NULL default '',
  `fax` varchar(20) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `zip` varchar(8) NOT NULL default '',
  `title` varchar(120) NOT NULL default '',
  `ftext` text NOT NULL,
  `userid` int(11) NOT NULL default '0',
  `ip` varchar(15) NOT NULL default '',
  `uid` int(11) NOT NULL default '0',
  `uname` varchar(30) NOT NULL default '',
  `addtime` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`fid`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>