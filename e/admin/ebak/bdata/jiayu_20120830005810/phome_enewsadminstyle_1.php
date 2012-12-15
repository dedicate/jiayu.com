<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsadminstyle`;");
E_C("CREATE TABLE `phome_enewsadminstyle` (
  `styleid` smallint(6) NOT NULL auto_increment,
  `stylename` varchar(60) NOT NULL default '',
  `path` smallint(6) NOT NULL default '0',
  `isdefault` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`styleid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsadminstyle` values('1','管理员后台界面','1','0');");
E_D("replace into `phome_enewsadminstyle` values('2','编辑后台界面','2','1');");

@include("../../inc/footer.php");
?>