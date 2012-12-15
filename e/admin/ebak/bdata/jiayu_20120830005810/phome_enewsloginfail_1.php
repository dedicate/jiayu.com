<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsloginfail`;");
E_C("CREATE TABLE `phome_enewsloginfail` (
  `ip` varchar(20) NOT NULL default '',
  `num` tinyint(4) NOT NULL default '0',
  `lasttime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsloginfail` values('183.39.222.101','5','1345695584');");

@include("../../inc/footer.php");
?>