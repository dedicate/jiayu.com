<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsbqclass`;");
E_C("CREATE TABLE `phome_enewsbqclass` (
  `classid` smallint(6) NOT NULL auto_increment,
  `classname` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsbqclass` values('1','��Ϣ����');");
E_D("replace into `phome_enewsbqclass` values('2','��Ŀ����');");
E_D("replace into `phome_enewsbqclass` values('3','����Ϣ����');");
E_D("replace into `phome_enewsbqclass` values('4','������ǩ');");

@include("../../inc/footer.php");
?>