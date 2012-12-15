<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsbuybak`;");
E_C("CREATE TABLE `phome_enewsbuybak` (
  `username` varchar(30) NOT NULL default '',
  `card_no` varchar(255) NOT NULL default '',
  `buytime` datetime NOT NULL default '0000-00-00 00:00:00',
  `cardfen` int(11) NOT NULL default '0',
  `money` int(11) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  `userdate` int(11) NOT NULL default '0',
  `type` tinyint(1) NOT NULL default '0',
  KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>