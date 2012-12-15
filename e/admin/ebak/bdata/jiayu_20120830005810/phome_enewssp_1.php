<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewssp`;");
E_C("CREATE TABLE `phome_enewssp` (
  `spid` smallint(6) NOT NULL auto_increment,
  `spname` varchar(30) NOT NULL default '',
  `varname` varchar(30) NOT NULL default '',
  `sppic` varchar(255) NOT NULL default '',
  `spsay` varchar(255) NOT NULL default '',
  `sptype` tinyint(1) NOT NULL default '0',
  `cid` smallint(6) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `tempid` smallint(6) NOT NULL default '0',
  `maxnum` int(11) NOT NULL default '0',
  `sptime` int(10) NOT NULL default '0',
  `groupid` text NOT NULL,
  `userclass` text NOT NULL,
  `username` text NOT NULL,
  `isclose` tinyint(1) NOT NULL default '0',
  `cladd` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`spid`),
  UNIQUE KEY `varname` (`varname`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>