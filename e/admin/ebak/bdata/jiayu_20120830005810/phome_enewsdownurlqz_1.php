<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsdownurlqz`;");
E_C("CREATE TABLE `phome_enewsdownurlqz` (
  `urlid` smallint(6) NOT NULL auto_increment,
  `urlname` varchar(30) NOT NULL default '',
  `url` varchar(255) NOT NULL default '',
  `downtype` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`urlid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>