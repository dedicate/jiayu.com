<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsuser`;");
E_C("CREATE TABLE `phome_enewsuser` (
  `userid` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `rnd` varchar(20) NOT NULL default '',
  `adminclass` mediumtext NOT NULL,
  `groupid` smallint(6) NOT NULL default '0',
  `checked` tinyint(1) NOT NULL default '0',
  `styleid` smallint(6) NOT NULL default '0',
  `filelevel` tinyint(1) NOT NULL default '0',
  `salt` varchar(8) NOT NULL default '',
  `loginnum` int(11) NOT NULL default '0',
  `lasttime` int(11) NOT NULL default '0',
  `lastip` varchar(20) NOT NULL default '',
  `truename` varchar(20) NOT NULL default '',
  `email` varchar(120) NOT NULL default '',
  `classid` smallint(6) NOT NULL default '0',
  `pretime` int(11) NOT NULL default '0',
  `preip` varchar(20) NOT NULL default '',
  PRIMARY KEY  (`userid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsuser` values('1','admin','c5592ae409bd04f9957a43071ed1c29e','Y4Ggz6ZX2ar9TxpNhLBf','','1','0','1','0','JVR4UEKs','218','1346259339','58.250.15.210','','','0','1346209673','58.250.13.106');");
E_D("replace into `phome_enewsuser` values('2','jiayuadmin','ea1b624c9015293b6c40f8104475ba9a','5q4rdnAjV3TSFm25c6pL','|268|269|284|285|287|288|280|281|282|283|2|3|4|6|7|8|9|10|11|77|40|43|44|45|46|47|48|49|50|51|52|53|54|55|56|57|58|59|60|61|62|63|64|65|66|67|68|69|70|71|72|73|74|75|277|12|76|79|80|81|82|83|84|85|103|104|105|106|107|108|109|110|112|114|115|116|117|118|121|122|123|124|127|129|130|132|133|134|135|136|137|138|139|140|141|143|144|148|149|150|151|152|153|154|155|156|157|158|161|162|163|165|167|168|169|186|187|190|191|192|193|194|195|196|198|200|202|203|204|205|208|209|210|211|212|213|214|215|216|217|218|219|220|221|222|223|225|226|228|231|232|233|237|238|239|240|241|243|244|245|246|247|248|249|','2','0','1','0','G3p6Upvb','434','1346199758','121.61.83.57','','','0','1346144844','121.61.83.57');");
E_D("replace into `phome_enewsuser` values('5','dwadmin','e0a3bb78074fe2b0ea07a2e1c59ca3e1','SbiPdq3u3xt4ianDsDkH','|299|300|301|302|303|304|305|306|307|308|309|310|311|312|313|314|294|321|322|323|','2','0','1','0','ytrLYUdm','0','0','','','','0','0','');");

@include("../../inc/footer.php");
?>