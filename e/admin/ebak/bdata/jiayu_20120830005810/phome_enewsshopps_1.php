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
E_D("replace into `phome_enewsshopps` values('1','�ͻ�����','10.00','','�ͻ�����');");
E_D("replace into `phome_enewsshopps` values('2','�ؿ�ר�ݣ�EMS��','25.00','','�ؿ�ר�ݣ�EMS��');");
E_D("replace into `phome_enewsshopps` values('3','��ͨ�ʵ�','5.00','','��ͨ�ʵ�');");
E_D("replace into `phome_enewsshopps` values('4','�ʾֿ���','12.00','','�ʾֿ���');");

@include("../../inc/footer.php");
?>