<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewswords`;");
E_C("CREATE TABLE `phome_enewswords` (
  `wordid` smallint(6) NOT NULL auto_increment,
  `oldword` varchar(255) NOT NULL default '',
  `newword` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`wordid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>