<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewscard`;");
E_C("CREATE TABLE `phome_enewscard` (
  `cardid` int(11) NOT NULL auto_increment,
  `card_no` varchar(30) NOT NULL default '',
  `password` varchar(20) NOT NULL default '',
  `money` int(11) NOT NULL default '0',
  `cardfen` int(11) NOT NULL default '0',
  `endtime` date NOT NULL default '0000-00-00',
  `cardtime` datetime NOT NULL default '0000-00-00 00:00:00',
  `carddate` int(11) NOT NULL default '0',
  `cdgroupid` smallint(6) NOT NULL default '0',
  `cdzgroupid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`cardid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>