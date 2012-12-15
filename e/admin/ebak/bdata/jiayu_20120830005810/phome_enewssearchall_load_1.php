<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewssearchall_load`;");
E_C("CREATE TABLE `phome_enewssearchall_load` (
  `lid` smallint(6) NOT NULL auto_increment,
  `tbname` varchar(60) NOT NULL default '',
  `titlefield` varchar(30) NOT NULL default '',
  `infotextfield` varchar(30) NOT NULL default '',
  `smalltextfield` varchar(30) NOT NULL default '',
  `loadnum` smallint(6) NOT NULL default '0',
  `lasttime` int(11) NOT NULL default '0',
  `lastid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>