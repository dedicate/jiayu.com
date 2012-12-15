<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsfeedbackf`;");
E_C("CREATE TABLE `phome_enewsfeedbackf` (
  `fid` smallint(6) NOT NULL auto_increment,
  `f` varchar(30) NOT NULL default '',
  `fname` varchar(30) NOT NULL default '',
  `fform` varchar(20) NOT NULL default '',
  `fzs` varchar(255) NOT NULL default '',
  `myorder` smallint(6) NOT NULL default '0',
  `ftype` varchar(30) NOT NULL default '',
  `flen` varchar(20) NOT NULL default '',
  `fformsize` varchar(12) NOT NULL default '',
  `fvalue` text NOT NULL,
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsfeedbackf` values('1','title','标题','text','','7','VARCHAR','120','','');");
E_D("replace into `phome_enewsfeedbackf` values('2','saytext','内容','textarea','','8','TEXT','','','');");
E_D("replace into `phome_enewsfeedbackf` values('3','name','姓名','text','','0','VARCHAR','30','','');");
E_D("replace into `phome_enewsfeedbackf` values('4','email','邮箱','text','','3','VARCHAR','80','','');");
E_D("replace into `phome_enewsfeedbackf` values('5','call','电话','text','','4','VARCHAR','30','','');");
E_D("replace into `phome_enewsfeedbackf` values('6','homepage','网站','text','','5','VARCHAR','160','','');");
E_D("replace into `phome_enewsfeedbackf` values('7','company','公司名称','text','','2','VARCHAR','80','','');");
E_D("replace into `phome_enewsfeedbackf` values('8','address','联系地址','text','','6','VARCHAR','255','','');");
E_D("replace into `phome_enewsfeedbackf` values('9','job','职务','text','','1','VARCHAR','36','','');");

@include("../../inc/footer.php");
?>