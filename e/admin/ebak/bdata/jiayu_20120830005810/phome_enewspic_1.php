<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewspic`;");
E_C("CREATE TABLE `phome_enewspic` (
  `picid` smallint(6) NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  `pic_url` varchar(200) NOT NULL default '',
  `url` varchar(200) NOT NULL default '',
  `pic_width` varchar(20) NOT NULL default '',
  `pic_height` varchar(20) NOT NULL default '',
  `open_pic` varchar(20) NOT NULL default '',
  `border` tinyint(1) NOT NULL default '0',
  `pictext` text NOT NULL,
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`picid`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>