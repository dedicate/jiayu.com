<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_ecms_infoclass_info`;");
E_C("CREATE TABLE `phome_ecms_infoclass_info` (
  `classid` int(11) NOT NULL default '0',
  `zz_title` text NOT NULL,
  `z_title` varchar(255) NOT NULL default '',
  `qz_title` varchar(255) NOT NULL default '',
  `save_title` varchar(10) NOT NULL default '',
  `zz_titlepic` text NOT NULL,
  `z_titlepic` varchar(255) NOT NULL default '',
  `qz_titlepic` varchar(255) NOT NULL default '',
  `save_titlepic` varchar(10) NOT NULL default '',
  `zz_newstime` text NOT NULL,
  `z_newstime` varchar(255) NOT NULL default '',
  `qz_newstime` varchar(255) NOT NULL default '',
  `save_newstime` varchar(10) NOT NULL default '',
  `zz_smalltext` text NOT NULL,
  `z_smalltext` varchar(255) NOT NULL default '',
  `qz_smalltext` text NOT NULL,
  `save_smalltext` varchar(10) NOT NULL default '',
  `zz_myarea` text NOT NULL,
  `z_myarea` varchar(255) NOT NULL default '',
  `qz_myarea` text NOT NULL,
  `save_myarea` varchar(10) NOT NULL default '',
  `zz_email` text NOT NULL,
  `z_email` varchar(255) NOT NULL default '',
  `qz_email` text NOT NULL,
  `save_email` varchar(10) NOT NULL default '',
  `zz_mycontact` text NOT NULL,
  `z_mycontact` varchar(255) NOT NULL default '',
  `qz_mycontact` text NOT NULL,
  `save_mycontact` varchar(10) NOT NULL default '',
  `zz_address` text NOT NULL,
  `z_address` varchar(255) NOT NULL default '',
  `qz_address` text NOT NULL,
  `save_address` varchar(10) NOT NULL default '',
  KEY `classid` (`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>