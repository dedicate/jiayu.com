<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewspostdata`;");
E_C("CREATE TABLE `phome_enewspostdata` (
  `postid` bigint(20) NOT NULL auto_increment,
  `rnd` varchar(32) NOT NULL default '',
  `postdata` varchar(255) NOT NULL default '',
  `ispath` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`postid`),
  KEY `rnd` (`rnd`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>