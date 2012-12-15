<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewswfinfo`;");
E_C("CREATE TABLE `phome_enewswfinfo` (
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `wfid` smallint(6) NOT NULL default '0',
  `tid` int(11) NOT NULL default '0',
  `groupid` text NOT NULL,
  `userclass` text NOT NULL,
  `username` text NOT NULL,
  `checknum` tinyint(4) NOT NULL default '0',
  `tstatus` varchar(30) NOT NULL default '0',
  `checktno` tinyint(4) NOT NULL default '0',
  KEY `id` (`id`,`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>