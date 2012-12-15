<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewssp_3_bak`;");
E_C("CREATE TABLE `phome_enewssp_3_bak` (
  `bid` int(11) NOT NULL auto_increment,
  `sid` int(11) NOT NULL default '0',
  `spid` smallint(6) NOT NULL default '0',
  `sptext` mediumtext NOT NULL,
  `lastuser` varchar(30) NOT NULL default '',
  `lasttime` int(10) NOT NULL default '0',
  PRIMARY KEY  (`bid`),
  KEY `sid` (`sid`),
  KEY `spid` (`spid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>