<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsdownerror`;");
E_C("CREATE TABLE `phome_enewsdownerror` (
  `errorid` int(11) NOT NULL auto_increment,
  `id` int(11) NOT NULL default '0',
  `errortext` varchar(255) NOT NULL default '',
  `errortime` datetime NOT NULL default '0000-00-00 00:00:00',
  `errorip` varchar(20) NOT NULL default '',
  `email` varchar(80) NOT NULL default '',
  `classid` smallint(6) NOT NULL default '0',
  `cid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`errorid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>