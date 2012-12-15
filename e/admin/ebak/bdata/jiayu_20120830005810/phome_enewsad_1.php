<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsad`;");
E_C("CREATE TABLE `phome_enewsad` (
  `adid` int(11) NOT NULL auto_increment,
  `picurl` varchar(255) NOT NULL default '',
  `url` text NOT NULL,
  `pic_width` int(11) NOT NULL default '0',
  `pic_height` int(11) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `adtype` tinyint(4) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `target` varchar(10) NOT NULL default '',
  `alt` varchar(120) NOT NULL default '',
  `starttime` date NOT NULL default '0000-00-00',
  `endtime` date NOT NULL default '0000-00-00',
  `adsay` text NOT NULL,
  `titlefont` varchar(255) NOT NULL default '',
  `titlecolor` varchar(10) NOT NULL default '',
  `htmlcode` text NOT NULL,
  `t` tinyint(4) NOT NULL default '0',
  `ylink` tinyint(1) NOT NULL default '0',
  `reptext` text NOT NULL,
  PRIMARY KEY  (`adid`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>