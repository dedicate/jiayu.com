<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsvotemod`;");
E_C("CREATE TABLE `phome_enewsvotemod` (
  `voteid` smallint(6) NOT NULL auto_increment,
  `title` varchar(120) NOT NULL default '',
  `votetext` text NOT NULL,
  `voteclass` tinyint(1) NOT NULL default '0',
  `doip` tinyint(1) NOT NULL default '0',
  `dotime` date NOT NULL default '0000-00-00',
  `tempid` smallint(6) NOT NULL default '0',
  `width` int(11) NOT NULL default '0',
  `height` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `ysvotename` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`voteid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>