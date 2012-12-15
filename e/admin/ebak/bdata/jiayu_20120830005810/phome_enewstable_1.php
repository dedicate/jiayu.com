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
E_D("replace into `phome_enewstable` values('1','news','新闻系统数据表','新闻系统数据表','1',',1,','1','0','1');");
E_D("replace into `phome_enewstable` values('2','download','下载系统数据表','下载系统数据表','0',',1,','1','0','2');");
E_D("replace into `phome_enewstable` values('3','photo','图片系统数据表','图片系统数据表','0',',1,','1','0','3');");
E_D("replace into `phome_enewstable` values('4','flash','FLASH系统数据表','FLASH系统数据表','0',',1,','1','0','4');");
E_D("replace into `phome_enewstable` values('5','movie','电影系统数据表','电影系统数据表','0',',1,','1','0','5');");
E_D("replace into `phome_enewstable` values('6','shop','商城系统数据表','商城系统数据表','0',',1,','1','0','6');");
E_D("replace into `phome_enewstable` values('7','article','文章系统数据表','文章系统数据表(内容存文本)','0',',1,','1','0','7');");
E_D("replace into `phome_enewstable` values('8','info','分类信息数据表','分类信息数据表','0',',1,','1','0','8');");

@include("../../inc/footer.php");
?>