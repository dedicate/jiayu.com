<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsworkflowitem`;");
E_C("CREATE TABLE `phome_enewsworkflowitem` (
  `tid` int(11) NOT NULL auto_increment,
  `wfid` smallint(6) NOT NULL default '0',
  `tname` varchar(60) NOT NULL default '',
  `tno` int(11) NOT NULL default '0',
  `ttext` varchar(255) NOT NULL default '',
  `groupid` text NOT NULL,
  `userclass` text NOT NULL,
  `username` text NOT NULL,
  `lztype` tinyint(1) NOT NULL default '0',
  `tbdo` int(11) NOT NULL default '0',
  `tddo` int(11) NOT NULL default '0',
  `tstatus` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`tid`),
  KEY `wfid` (`wfid`),
  KEY `tno` (`tno`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>