<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsshopps`;");
E_C("CREATE TABLE `phome_enewsshopps` (
  `pid` int(11) NOT NULL auto_increment,
  `pname` varchar(60) NOT NULL default '',
  `price` float(11,2) NOT NULL default '0.00',
  `otherprice` text NOT NULL,
  `psay` text NOT NULL,
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsshopps` values('1','送货上门','10.00','','送货上门');");
E_D("replace into `phome_enewsshopps` values('2','特快专递（EMS）','25.00','','特快专递（EMS）');");
E_D("replace into `phome_enewsshopps` values('3','普通邮递','5.00','','普通邮递');");
E_D("replace into `phome_enewsshopps` values('4','邮局快邮','12.00','','邮局快邮');");

@include("../../inc/footer.php");
?>