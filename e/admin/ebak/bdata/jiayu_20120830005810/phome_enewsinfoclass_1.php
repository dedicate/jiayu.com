<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsinfoclass`;");
E_C("CREATE TABLE `phome_enewsinfoclass` (
  `classid` int(11) NOT NULL auto_increment,
  `bclassid` int(11) NOT NULL default '0',
  `classname` varchar(100) NOT NULL default '',
  `infourl` mediumtext NOT NULL,
  `newsclassid` smallint(6) NOT NULL default '0',
  `startday` date NOT NULL default '0000-00-00',
  `endday` date NOT NULL default '0000-00-00',
  `bz` text NOT NULL,
  `num` smallint(6) NOT NULL default '0',
  `copyimg` tinyint(1) NOT NULL default '0',
  `renum` smallint(6) NOT NULL default '0',
  `keyboard` text NOT NULL,
  `oldword` text NOT NULL,
  `newword` text NOT NULL,
  `titlelen` smallint(6) NOT NULL default '0',
  `retitlewriter` tinyint(1) NOT NULL default '0',
  `smalltextlen` smallint(6) NOT NULL default '0',
  `zz_smallurl` text NOT NULL,
  `zz_newsurl` text NOT NULL,
  `httpurl` varchar(255) NOT NULL default '',
  `repad` text NOT NULL,
  `imgurl` varchar(255) NOT NULL default '',
  `relistnum` smallint(6) NOT NULL default '0',
  `zz_titlepicl` text NOT NULL,
  `z_titlepicl` varchar(255) NOT NULL default '',
  `qz_titlepicl` varchar(255) NOT NULL default '',
  `save_titlepicl` varchar(10) NOT NULL default '',
  `keynum` tinyint(4) NOT NULL default '0',
  `insertnum` smallint(6) NOT NULL default '0',
  `copyflash` tinyint(1) NOT NULL default '0',
  `tid` smallint(6) NOT NULL default '0',
  `tbname` varchar(60) NOT NULL default '',
  `pagetype` tinyint(1) NOT NULL default '0',
  `smallpagezz` text NOT NULL,
  `pagezz` text NOT NULL,
  `smallpageallzz` text NOT NULL,
  `pageallzz` text NOT NULL,
  `mark` tinyint(1) NOT NULL default '0',
  `enpagecode` tinyint(1) NOT NULL default '0',
  `recjtheurl` tinyint(1) NOT NULL default '0',
  `hiddenload` tinyint(1) NOT NULL default '0',
  `justloadin` tinyint(1) NOT NULL default '0',
  `justloadcheck` tinyint(1) NOT NULL default '0',
  `delloadinfo` tinyint(1) NOT NULL default '0',
  `pagerepad` mediumtext NOT NULL,
  `newsztid` text NOT NULL,
  `getfirstpic` tinyint(4) NOT NULL default '0',
  `oldpagerep` text NOT NULL,
  `newpagerep` text NOT NULL,
  `keeptime` smallint(6) NOT NULL default '0',
  `lasttime` int(11) NOT NULL default '0',
  `newstextisnull` tinyint(1) NOT NULL default '0',
  `getfirstspic` tinyint(1) NOT NULL default '0',
  `getfirstspicw` smallint(6) NOT NULL default '0',
  `getfirstspich` smallint(6) NOT NULL default '0',
  `doaddtextpage` tinyint(1) NOT NULL default '0',
  `infourlispage` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`classid`),
  KEY `newsclassid` (`newsclassid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>