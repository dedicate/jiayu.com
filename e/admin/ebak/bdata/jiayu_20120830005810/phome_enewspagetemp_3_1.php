<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewspagetemp_3`;");
E_C("CREATE TABLE `phome_enewspagetemp_3` (
  `tempid` smallint(6) NOT NULL auto_increment,
  `tempname` varchar(30) NOT NULL default '',
  `temptext` mediumtext NOT NULL,
  PRIMARY KEY  (`tempid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>