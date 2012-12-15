<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewswfinfolog`;");
E_C("CREATE TABLE `phome_enewswfinfolog` (
  `logid` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `wfid` smallint(6) NOT NULL default '0',
  `tid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `checktime` int(11) NOT NULL default '0',
  `checktext` text NOT NULL,
  `checknum` tinyint(4) NOT NULL default '0',
  `checktype` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`logid`),
  KEY `id` (`id`,`classid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>