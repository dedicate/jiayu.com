<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewstask`;");
E_C("CREATE TABLE `phome_enewstask` (
  `id` smallint(6) NOT NULL auto_increment,
  `taskname` varchar(60) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `isopen` tinyint(1) NOT NULL default '0',
  `filename` varchar(60) NOT NULL default '',
  `lastdo` int(11) NOT NULL default '0',
  `doweek` char(1) NOT NULL default '0',
  `doday` char(2) NOT NULL default '0',
  `dohour` char(2) NOT NULL default '0',
  `dominute` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>