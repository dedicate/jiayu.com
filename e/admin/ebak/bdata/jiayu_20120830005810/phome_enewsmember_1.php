<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsmember`;");
E_C("CREATE TABLE `phome_enewsmember` (
  `userid` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `rnd` varchar(30) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  `registertime` datetime NOT NULL default '0000-00-00 00:00:00',
  `groupid` smallint(6) NOT NULL default '0',
  `userfen` int(11) NOT NULL default '0',
  `userdate` int(11) NOT NULL default '0',
  `money` float(11,2) NOT NULL default '0.00',
  `zgroupid` smallint(6) NOT NULL default '0',
  `havemsg` tinyint(1) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `salt` varchar(8) NOT NULL default '',
  PRIMARY KEY  (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>