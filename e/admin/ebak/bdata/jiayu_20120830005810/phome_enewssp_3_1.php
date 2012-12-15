<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewssp_3`;");
E_C("CREATE TABLE `phome_enewssp_3` (
  `sid` int(11) NOT NULL auto_increment,
  `spid` smallint(6) NOT NULL default '0',
  `sptext` mediumtext NOT NULL,
  PRIMARY KEY  (`sid`),
  UNIQUE KEY `spid` (`spid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>