<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsmenuclass`;");
E_C("CREATE TABLE `phome_enewsmenuclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(60) NOT NULL default '',
  `issys` tinyint(1) NOT NULL default '0',
  `myorder` smallint(6) NOT NULL default '0',
  `classtype` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`classid`),
  KEY `myorder` (`myorder`),
  KEY `classtype` (`classtype`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>