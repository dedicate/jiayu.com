<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsshopdd`;");
E_C("CREATE TABLE `phome_enewsshopdd` (
  `ddid` bigint(20) NOT NULL auto_increment,
  `ddno` varchar(30) NOT NULL default '',
  `ddtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `outproduct` tinyint(1) NOT NULL default '0',
  `haveprice` tinyint(1) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `truename` varchar(20) NOT NULL default '',
  `oicq` varchar(25) NOT NULL default '',
  `msn` varchar(120) NOT NULL default '',
  `email` varchar(120) NOT NULL default '',
  `call` varchar(30) NOT NULL default '',
  `phone` varchar(30) NOT NULL default '',
  `address` varchar(255) NOT NULL default '',
  `zip` varchar(8) NOT NULL default '',
  `bz` text NOT NULL,
  `g_truename` varchar(20) NOT NULL default '',
  `g_oicq` varchar(25) NOT NULL default '',
  `g_msn` varchar(120) NOT NULL default '',
  `g_email` varchar(120) NOT NULL default '',
  `g_call` varchar(30) NOT NULL default '',
  `g_phone` varchar(30) NOT NULL default '',
  `g_address` varchar(255) NOT NULL default '',
  `g_zip` varchar(8) NOT NULL default '',
  `buycar` mediumtext NOT NULL,
  `psid` smallint(6) NOT NULL default '0',
  `psname` varchar(60) NOT NULL default '',
  `pstotal` float(11,2) NOT NULL default '0.00',
  `alltotal` float(11,2) NOT NULL default '0.00',
  `payfsid` smallint(6) NOT NULL default '0',
  `payfsname` varchar(60) NOT NULL default '',
  `payby` tinyint(4) NOT NULL default '0',
  `alltotalfen` float(11,2) NOT NULL default '0.00',
  `fp` tinyint(1) NOT NULL default '0',
  `fptt` varchar(255) NOT NULL default '',
  `fptotal` float(11,2) NOT NULL default '0.00',
  PRIMARY KEY  (`ddid`),
  KEY `ddno` (`ddno`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>