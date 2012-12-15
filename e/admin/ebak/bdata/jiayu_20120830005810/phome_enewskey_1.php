<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewskey`;");
E_C("CREATE TABLE `phome_enewskey` (
  `keyid` smallint(6) NOT NULL auto_increment,
  `keyname` varchar(60) NOT NULL default '',
  `keyurl` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`keyid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>