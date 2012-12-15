<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsmenu`;");
E_C("CREATE TABLE `phome_enewsmenu` (
  `menuid` int(11) NOT NULL auto_increment,
  `menuname` varchar(60) NOT NULL default '',
  `menuurl` varchar(255) NOT NULL default '',
  `myorder` smallint(6) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`menuid`),
  KEY `myorder` (`myorder`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>