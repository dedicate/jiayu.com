<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsworkflow`;");
E_C("CREATE TABLE `phome_enewsworkflow` (
  `wfid` smallint(6) NOT NULL auto_increment,
  `wfname` varchar(60) NOT NULL default '',
  `wftext` varchar(255) NOT NULL default '',
  `myorder` smallint(6) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `adduser` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`wfid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>