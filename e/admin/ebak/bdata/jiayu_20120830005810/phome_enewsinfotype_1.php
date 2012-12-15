<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsinfotype`;");
E_C("CREATE TABLE `phome_enewsinfotype` (
  `typeid` smallint(6) NOT NULL auto_increment,
  `tname` varchar(30) NOT NULL default '',
  `mid` smallint(6) NOT NULL default '0',
  `myorder` smallint(6) NOT NULL default '0',
  `yhid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`typeid`),
  KEY `mid` (`mid`,`myorder`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>