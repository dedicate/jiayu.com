<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewslink`;");
E_C("CREATE TABLE `phome_enewslink` (
  `lid` smallint(6) NOT NULL auto_increment,
  `lname` varchar(100) NOT NULL default '',
  `lpic` varchar(255) NOT NULL default '',
  `lurl` varchar(255) NOT NULL default '',
  `ltime` datetime NOT NULL default '0000-00-00 00:00:00',
  `onclick` int(11) NOT NULL default '0',
  `width` varchar(10) NOT NULL default '',
  `height` varchar(10) NOT NULL default '',
  `target` varchar(10) NOT NULL default '',
  `myorder` tinyint(4) NOT NULL default '0',
  `email` varchar(60) NOT NULL default '',
  `lsay` text NOT NULL,
  `checked` tinyint(1) NOT NULL default '0',
  `ltype` smallint(6) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  PRIMARY KEY  (`lid`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewslink` values('1','�й�������','','http://www.cnjiayu.com.cn/','2011-11-05 16:01:08','2','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('2','����������','','http://www.jytour.com.cn/','2011-11-05 16:01:19','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('3','��˰��','','http://www.hb-l-tax.gov.cn/xnsxs/jyx/','2011-11-05 16:01:30','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('4','��˰��','','http://xianning.hb-n-tax.gov.cn/col/col5280/index.html','2011-11-05 16:01:39','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('5','������','','#','2011-11-05 16:01:48','4','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('6','��۾�','','http://www.jywjw.gov.cn/','2011-11-05 16:01:58','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('7','˾����','','#','2011-11-05 16:02:07','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('8','������','','http://www.jygqt.com.cn/','2011-11-05 16:02:15','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('9','���ľ�','','http://www.jyfgw.gov.cn/','2011-11-05 16:02:24','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('10','ͳ�ƾ�','','http://www.jytj.cn/','2011-11-05 16:02:33','2','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('11','ũҵ��','','http://www.jynyw.cn','2011-11-05 16:02:43','1','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('12','���̾�','','http://www.07e5.net/12315/index.asp','2011-11-05 16:02:53','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('13','������','','http://jyx.hbws.gov.cn/','2011-11-05 16:03:01','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('14','������','','http://www.jyrkjs.com/','2011-11-05 16:03:10','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('15','������','','http://www.jyjyw.net/','2011-11-05 16:03:18','1','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('16','������','','http://www.hbcz.gov.cn/421221/','2011-11-05 16:03:27','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('17','��������','','http://www.jyxcdc.com/','2011-11-05 16:03:41','1','88','31','_blank','0','','','1','0','1');");
E_D("replace into `phome_enewslink` values('18','������','','http://www.yuyue.gov.cn','2011-11-05 16:05:21','0','88','31','_blank','0','','','1','0','2');");
E_D("replace into `phome_enewslink` values('19','½Ϫ��','','http://www.cnjiayu.com.cn/2011/0302/178.html','2011-11-05 16:05:34','0','88','31','_blank','0','','','1','0','2');");
E_D("replace into `phome_enewslink` values('20','��������','','http://www.cnjiayu.com.cn/2011/0302/176.html','2011-11-05 16:05:47','0','88','31','_blank','0','','','1','0','2');");
E_D("replace into `phome_enewslink` values('21','������','','http://www.cnjiayu.com.cn/2011/0302/177.html','2011-11-05 16:05:59','0','88','31','_blank','0','','','1','0','2');");
E_D("replace into `phome_enewslink` values('22','�½���','','http://www.cnjiayu.com.cn/2011/0302/181.html','2011-11-05 16:06:10','1','88','31','_blank','0','','','1','0','2');");
E_D("replace into `phome_enewslink` values('23','�˼�����','','http://www.pjw.gov.cn','2011-11-05 16:06:20','0','88','31','_blank','0','','','1','0','2');");
E_D("replace into `phome_enewslink` values('24','������','','http://www.cnjiayu.com.cn/2011/0302/175.html','2011-11-05 16:06:30','0','88','31','_blank','0','','','1','0','2');");
E_D("replace into `phome_enewslink` values('25','��������','','http://www.cnjiayu.com.cn/2011/0302/179.html','2011-11-05 16:06:40','0','88','31','_blank','0','','','1','0','2');");

@include("../../inc/footer.php");
?>