<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewstempgroup`;");
E_C("CREATE TABLE `phome_enewstempgroup` (
  `gid` smallint(6) NOT NULL auto_increment,
  `gname` varchar(60) NOT NULL default '',
  `isdefault` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewstempgroup` values('1','默认模板组','0');");
E_D("replace into `phome_enewstempgroup` values('3','嘉鱼政务网','1');");

@include("../../inc/footer.php");
?>