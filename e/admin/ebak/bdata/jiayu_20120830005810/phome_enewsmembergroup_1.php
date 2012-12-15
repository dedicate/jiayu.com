<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsmembergroup`;");
E_C("CREATE TABLE `phome_enewsmembergroup` (
  `groupid` smallint(6) NOT NULL auto_increment,
  `groupname` varchar(60) NOT NULL default '',
  `level` smallint(6) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `favanum` smallint(6) NOT NULL default '0',
  `daydown` int(11) NOT NULL default '0',
  `msglen` int(11) NOT NULL default '0',
  `msgnum` int(11) NOT NULL default '0',
  `canreg` tinyint(1) NOT NULL default '0',
  `formid` smallint(6) NOT NULL default '0',
  `regchecked` tinyint(1) NOT NULL default '0',
  `spacestyleid` smallint(6) NOT NULL default '0',
  `dayaddinfo` smallint(6) NOT NULL default '0',
  `infochecked` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsmembergroup` values('1','普通会员','1','0','120','0','255','50','1','1','0','1','0','0');");
E_D("replace into `phome_enewsmembergroup` values('2','VIP会员','2','0','200','0','255','120','0','1','0','1','0','0');");
E_D("replace into `phome_enewsmembergroup` values('3','企业会员','1','0','120','0','255','50','1','2','0','2','0','0');");
E_D("replace into `phome_enewsmembergroup` values('4','企业VIP会员','2','0','200','0','255','120','0','2','0','2','0','0');");

@include("../../inc/footer.php");
?>