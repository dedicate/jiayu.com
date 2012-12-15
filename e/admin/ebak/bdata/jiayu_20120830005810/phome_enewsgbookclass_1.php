<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsgbookclass`;");
E_C("CREATE TABLE `phome_enewsgbookclass` (
  `bid` smallint(6) NOT NULL auto_increment,
  `bname` varchar(60) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `groupid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>