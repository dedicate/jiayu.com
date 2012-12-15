<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewslinkclass`;");
E_C("CREATE TABLE `phome_enewslinkclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewslinkclass` values('1','嘉鱼县内网站导航');");
E_D("replace into `phome_enewslinkclass` values('2','乡镇链接');");

@include("../../inc/footer.php");
?>