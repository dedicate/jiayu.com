<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_ecms_infoclass_flash`;");
E_C("CREATE TABLE `phome_ecms_infoclass_flash` (
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
  `zz_flashwriter` text NOT NULL,
  `z_flashwriter` varchar(255) NOT NULL default '',
  `qz_flashwriter` text NOT NULL,
  `save_flashwriter` varchar(10) NOT NULL default '',
  `zz_email` text NOT NULL,
  `z_email` varchar(255) NOT NULL default '',
  `qz_email` text NOT NULL,
  `save_email` varchar(10) NOT NULL default '',
  `zz_star` text NOT NULL,
  `z_star` varchar(255) NOT NULL default '',
  `qz_star` text NOT NULL,
  `save_star` varchar(10) NOT NULL default '',
  `zz_filesize` text NOT NULL,
  `z_filesize` varchar(255) NOT NULL default '',
  `qz_filesize` text NOT NULL,
  `save_filesize` varchar(10) NOT NULL default '',
  `zz_flashurl` text NOT NULL,
  `z_flashurl` varchar(255) NOT NULL default '',
  `qz_flashurl` text NOT NULL,
  `save_flashurl` varchar(10) NOT NULL default '',
  `zz_width` text NOT NULL,
  `z_width` varchar(255) NOT NULL default '',
  `qz_width` text NOT NULL,
  `save_width` varchar(10) NOT NULL default '',
  `zz_height` text NOT NULL,
  `z_height` varchar(255) NOT NULL default '',
  `qz_height` text NOT NULL,
  `save_height` varchar(10) NOT NULL default '',
  `zz_flashsay` text NOT NULL,
  `z_flashsay` varchar(255) NOT NULL default '',
  `qz_flashsay` text NOT NULL,
  `save_flashsay` varchar(10) NOT NULL default '',
  KEY `classid` (`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>