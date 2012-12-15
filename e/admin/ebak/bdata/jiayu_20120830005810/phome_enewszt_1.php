<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewszt`;");
E_C("CREATE TABLE `phome_enewszt` (
  `ztid` smallint(6) NOT NULL auto_increment,
  `ztname` varchar(60) NOT NULL default '',
  `onclick` int(11) NOT NULL default '0',
  `ztnum` tinyint(4) NOT NULL default '0',
  `listtempid` smallint(6) NOT NULL default '0',
  `ztpath` varchar(255) NOT NULL default '',
  `zttype` varchar(10) NOT NULL default '',
  `newline` int(11) NOT NULL default '0',
  `zturl` varchar(200) NOT NULL default '',
  `hotline` tinyint(4) NOT NULL default '0',
  `goodline` tinyint(4) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `hotplline` tinyint(4) NOT NULL default '0',
  `firstline` tinyint(4) NOT NULL default '0',
  `islist` tinyint(1) NOT NULL default '0',
  `maxnum` int(11) NOT NULL default '0',
  `tid` smallint(6) NOT NULL default '0',
  `tbname` varchar(60) NOT NULL default '',
  `reorder` varchar(50) NOT NULL default '',
  `intro` text NOT NULL,
  `ztimg` varchar(255) NOT NULL default '',
  `jstempid` smallint(6) NOT NULL default '0',
  `zcid` smallint(6) NOT NULL default '0',
  `showzt` tinyint(1) NOT NULL default '0',
  `ztpagekey` varchar(255) NOT NULL default '',
  `classtempid` smallint(6) NOT NULL default '0',
  `myorder` smallint(6) NOT NULL default '0',
  `nrejs` tinyint(1) NOT NULL default '0',
  `usezt` tinyint(1) NOT NULL default '0',
  `yhid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`ztid`),
  KEY `classid` (`classid`),
  KEY `zcid` (`zcid`),
  KEY `usezt` (`usezt`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>