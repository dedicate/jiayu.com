<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewstable`;");
E_C("CREATE TABLE `phome_enewstable` (
  `tid` smallint(6) NOT NULL auto_increment,
  `tbname` varchar(60) NOT NULL default '',
  `tname` varchar(60) NOT NULL default '',
  `tsay` text NOT NULL,
  `isdefault` tinyint(1) NOT NULL default '0',
  `datatbs` text NOT NULL,
  `deftb` varchar(6) NOT NULL default '',
  `yhid` smallint(6) NOT NULL default '0',
  `mid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewstable` values('1','news','����ϵͳ���ݱ�','����ϵͳ���ݱ�','1',',1,','1','0','1');");
E_D("replace into `phome_enewstable` values('2','download','����ϵͳ���ݱ�','����ϵͳ���ݱ�','0',',1,','1','0','2');");
E_D("replace into `phome_enewstable` values('3','photo','ͼƬϵͳ���ݱ�','ͼƬϵͳ���ݱ�','0',',1,','1','0','3');");
E_D("replace into `phome_enewstable` values('4','flash','FLASHϵͳ���ݱ�','FLASHϵͳ���ݱ�','0',',1,','1','0','4');");
E_D("replace into `phome_enewstable` values('5','movie','��Ӱϵͳ���ݱ�','��Ӱϵͳ���ݱ�','0',',1,','1','0','5');");
E_D("replace into `phome_enewstable` values('6','shop','�̳�ϵͳ���ݱ�','�̳�ϵͳ���ݱ�','0',',1,','1','0','6');");
E_D("replace into `phome_enewstable` values('7','article','����ϵͳ���ݱ�','����ϵͳ���ݱ�(���ݴ��ı�)','0',',1,','1','0','7');");
E_D("replace into `phome_enewstable` values('8','info','������Ϣ���ݱ�','������Ϣ���ݱ�','0',',1,','1','0','8');");

@include("../../inc/footer.php");
?>