<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewswapstyle`;");
E_C("CREATE TABLE `phome_enewswapstyle` (
  `styleid` smallint(6) NOT NULL auto_increment,
  `stylename` varchar(60) NOT NULL default '',
  `path` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`styleid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewswapstyle` values('1','����ģ��','1');");
E_D("replace into `phome_enewswapstyle` values('2','������Ϣģ��','2');");

@include("../../inc/footer.php");
?>