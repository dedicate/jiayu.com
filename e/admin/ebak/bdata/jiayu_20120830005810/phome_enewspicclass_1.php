<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewspicclass`;");
E_C("CREATE TABLE `phome_enewspicclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewspicclass` values('1','默认图片信息类别');");

@include("../../inc/footer.php");
?>