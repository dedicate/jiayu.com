<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewswriter`;");
E_C("CREATE TABLE `phome_enewswriter` (
  `wid` smallint(6) NOT NULL auto_increment,
  `writer` varchar(30) NOT NULL default '',
  `email` varchar(120) NOT NULL default '',
  PRIMARY KEY  (`wid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewswriter` values('1','МЮгуеўЮёЭјБрМ­','');");

@include("../../inc/footer.php");
?>