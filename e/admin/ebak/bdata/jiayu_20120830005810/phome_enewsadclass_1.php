<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsadclass`;");
E_C("CREATE TABLE `phome_enewsadclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsadclass` values('1','默认广告分类');");

@include("../../inc/footer.php");
?>