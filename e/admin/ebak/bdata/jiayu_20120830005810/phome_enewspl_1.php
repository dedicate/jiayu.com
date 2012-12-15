<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewspl`;");
E_C("CREATE TABLE `phome_enewspl` (
  `plid` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `sayip` varchar(20) NOT NULL default '',
  `saytime` datetime NOT NULL default '0000-00-00 00:00:00',
  `id` int(11) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `zcnum` smallint(6) NOT NULL default '0',
  `fdnum` smallint(6) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `stb` varchar(6) NOT NULL default '',
  PRIMARY KEY  (`plid`),
  KEY `id` (`id`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>