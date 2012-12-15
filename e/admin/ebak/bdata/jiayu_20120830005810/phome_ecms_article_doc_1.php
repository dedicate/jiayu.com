<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_ecms_article_doc`;");
E_C("CREATE TABLE `phome_ecms_article_doc` (
  `id` int(11) NOT NULL auto_increment,
  `classid` smallint(6) NOT NULL default '0',
  `onclick` int(11) NOT NULL default '0',
  `newspath` char(20) NOT NULL default '',
  `keyboard` char(160) NOT NULL default '',
  `keyid` char(255) NOT NULL default '',
  `userid` int(11) NOT NULL default '0',
  `username` char(30) NOT NULL default '',
  `ztid` char(255) NOT NULL default '',
  `checked` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  `truetime` int(10) NOT NULL default '0',
  `ismember` tinyint(1) NOT NULL default '0',
  `dokey` tinyint(1) NOT NULL default '0',
  `userfen` smallint(6) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `titlefont` char(20) NOT NULL default '',
  `titleurl` char(200) NOT NULL default '',
  `filename` char(60) NOT NULL default '',
  `groupid` smallint(6) NOT NULL default '0',
  `newstempid` smallint(6) NOT NULL default '0',
  `plnum` int(11) NOT NULL default '0',
  `firsttitle` tinyint(1) NOT NULL default '0',
  `isqf` tinyint(1) NOT NULL default '0',
  `totaldown` int(11) NOT NULL default '0',
  `title` char(200) NOT NULL default '',
  `newstime` int(10) NOT NULL default '0',
  `titlepic` char(200) NOT NULL default '',
  `closepl` tinyint(1) NOT NULL default '0',
  `havehtml` tinyint(1) NOT NULL default '0',
  `lastdotime` int(10) NOT NULL default '0',
  `haveaddfen` tinyint(1) NOT NULL default '0',
  `infopfen` int(11) NOT NULL default '0',
  `infopfennum` int(11) NOT NULL default '0',
  `votenum` int(11) NOT NULL default '0',
  `ftitle` char(120) NOT NULL default '',
  `smalltext` char(255) NOT NULL default '',
  `writer` char(30) NOT NULL default '',
  `befrom` char(60) NOT NULL default '',
  `newstext` char(50) NOT NULL default '',
  `diggtop` int(11) NOT NULL default '0',
  `stb` char(4) NOT NULL default '',
  `copyids` char(255) NOT NULL default '',
  `ttid` smallint(6) NOT NULL default '0',
  `infotags` char(160) NOT NULL default '',
  `ispic` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `checked` (`checked`),
  KEY `newstime` (`newstime`),
  KEY `truetime` (`truetime`),
  KEY `classid` (`classid`),
  KEY `ttid` (`ttid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

@include("../../inc/footer.php");
?>