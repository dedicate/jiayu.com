<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `phome_enewsbqtemp_3`;");
E_C("CREATE TABLE `phome_enewsbqtemp_3` (
  `tempid` smallint(6) NOT NULL auto_increment,
  `tempname` varchar(60) NOT NULL default '',
  `modid` smallint(6) NOT NULL default '0',
  `temptext` text NOT NULL,
  `showdate` varchar(50) NOT NULL default '',
  `listvar` text NOT NULL,
  `subnews` smallint(6) NOT NULL default '0',
  `rownum` smallint(6) NOT NULL default '0',
  `classid` smallint(6) NOT NULL default '0',
  `docode` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`tempid`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=gbk");
E_D("replace into `phome_enewsbqtemp_3` values('1','子栏目导航标签模板','1','[!--empirenews.listtemp--]<!--list.var1-->[!--empirenews.listtemp--]\r\n\r\n','Y-m-d H:i:s','<a href=\"[!--classurl--]\">[!--classname--]</a> | ','0','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('2','标题列表模板','1','[!--empirenews.listtemp--]<!--list.var1-->[!--empirenews.listtemp--]','Y-m-d H:i:s','<li><a href=\"[!--titleurl--]\" title=\"[!--oldtitle--]\">[!--title--]</a></li>','0','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('3','标题+简介','1','[!--empirenews.listtemp--]<!--list.var1-->[!--empirenews.listtemp--]','m-d','<li><p><strong><a href=\"[!--titleurl--]\" title=\"[!--oldtitle--]\">[!--title--]</a></strong>[!--smalltext--] </p></li>','60','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('4','头条相关','1','[!--empirenews.listtemp--]<!--list.var1-->　<!--list.var2-->[!--empirenews.listtemp--]','Y-m-d H:i:s','<a href=\"[!--titleurl--]\" title=\"[!--oldtitle--]\">·[!--title--]</a>','0','2','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('5','图片+标题+简介','1','[!--empirenews.listtemp--]\r\n<!--list.var1-->\r\n[!--empirenews.listtemp--]','Y-m-d H:i:s','<table width=\"94%\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"6\" class=\"picText\">\r\n<tr valign=\"top\">\r\n<td><a href=\"[!--titleurl--]\" target=\"_blank\"><img width=\"70\" height=\"78\" src=\"[!--titlepic--]\" alt=\"[!--oldtitle--]\" /></a></td>\r\n<td><strong><a href=\"[!--titleurl--]\" title=\"[!--oldtitle--]\">[!--title--]</a></strong>[!--smalltext--]</td>\r\n</tr>\r\n</table>','56','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('7','嘉鱼政务网循环子栏目标签','1','<div class=\"c_tit ej_tit\"><span><a href=''[!--the.classurl--]'' target=\"_blank\">[!--the.classname--]</a></span></div>\r\n<ul>\r\n       [!--empirenews.listtemp--]\r\n       <!--list.var1-->\r\n       [!--empirenews.listtemp--]\r\n<div align=right><a href=''[!--the.classurl--]'' target=\"_blank\">更多&gt;&gt;</a>&nbsp;&nbsp;</div>\r\n</ul>','Y-m-d','<li>·<a href=''[!--titleurl--]'' target=\"_blank\">[!--title--]</a></li>','0','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('8','头条标题','1','[!--empirenews.listtemp--]\r\n<!--list.var1-->\r\n[!--empirenews.listtemp--]','Y-m-d H:i:s','<strong><a href=\"[!--titleurl--]\">[!--title--]</a></strong>\r\n<p>　　[!--smalltext--]</p>','150','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('9','标题+软件简介','2','[!--empirenews.listtemp--]<!--list.var1-->[!--empirenews.listtemp--]','Y-m-d H:i:s','<li><p><strong><a href=\"[!--titleurl--]\" title=\"[!--oldtitle--]\">[!--title--]</a></strong>[!--softsay--]</p></li>','50','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('10','排行列表','1','[!--empirenews.listtemp--]<!--list.var1-->[!--empirenews.listtemp--]','Y-m-d H:i:s','<li><a href=\"[!--titleurl--]\" title=\"[!--oldtitle--]\">[!--title--]</a></li>','0','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('11','图片集分页模板','1','<script type=\"text/javascript\">\r\n        var photosr=new Array();\r\n        [!--photor--]\r\n        function GotoPhPage(page){\r\n                page=parseInt(page);\r\n                document.getElementById(\"showpagephoto\").innerHTML=photosr[page];\r\n                document.ViewPhotoForm.thisphpage.value=page;\r\n                document.ViewPhotoForm.tothephpage.options[page-1].selected=true;\r\n        }\r\n        //上一页\r\n        function PriPhPage(){\r\n                var thispage=parseInt(document.ViewPhotoForm.thisphpage.value);\r\n                var num=photosr.length;\r\n                if(thispage<=1)\r\n                {\r\n                        return false;\r\n                }\r\n                GotoPhPage(thispage-1);\r\n        }\r\n        //下一页\r\n        function NextPhPage(){\r\n                var thispage=parseInt(document.ViewPhotoForm.thisphpage.value);\r\n                var num=photosr.length;\r\n                if(thispage>=num-1)\r\n                {\r\n                        return false;\r\n                }\r\n                GotoPhPage(thispage+1);\r\n        }\r\n        function PhAutoPlay(){\r\n                var sec=parseInt(document.ViewPhotoForm.autoplaysec.value);\r\n                var i;\r\n                var num=photosr.length;\r\n                for(i=1;i<=sec;i++)\r\n                {\r\n                        if(document.ViewPhotoForm.autophstop.value==0)\r\n                        {\r\n                                window.setTimeout(\"PhAutoPlayExe(\"+i+\",\"+sec+\")\",i*1000);\r\n                        }\r\n                        else\r\n                        {\r\n                                break;\r\n                        }\r\n                }\r\n        }\r\n        function PhAutoPlayExe(num,sec){\r\n                var t;\r\n                if(document.ViewPhotoForm.autophstop.value==1)\r\n                {\r\n                        return \"\";\r\n                }\r\n                if(num==sec) \r\n                {\r\n                        t=NextPhPage();\r\n                        if(t==false)\r\n                        {\r\n                                GotoPhPage(1);\r\n                        }\r\n                        PhAutoPlay();\r\n                } \r\n        }\r\n        </script>\r\n        \r\n<table width=\"100%\" border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"1\">\r\n  <tr> \r\n    <td height=\"25\" id=\"showpagephoto\" align=\"center\"> \r\n      <!--list.var1-->\r\n    </td>\r\n  </tr>\r\n  <form name=\"ViewPhotoForm\" id=\"ViewPhotoForm\" method=\"POST\" action=\"\">\r\n    <tr> \r\n      <td height=\"25\"> <div align=\"center\"> \r\n          <input type=\"button\" name=\"Submit\" value=\"上一页\" onclick=\"PriPhPage();\">\r\n          &nbsp;&nbsp; \r\n          <select name=\"tothephpage\" onchange=\"GotoPhPage(this.options[this.selectedIndex].value)\">\r\n            [!--select--]\r\n          </select>\r\n          &nbsp;&nbsp; \r\n          <input type=\"button\" name=\"Submit2\" value=\"下一页\" onclick=\"NextPhPage();\">\r\n          <input name=\"thisphpage\" type=\"hidden\" value=\"1\">\r\n        </div></td>\r\n    </tr>\r\n    <tr>\r\n      <td height=\"25\"><div align=\"center\">\r\n          <select name=\"autoplaysec\">\r\n            <option value=\"1\">1秒</option>\r\n            <option value=\"2\">2秒</option>\r\n            <option value=\"3\" selected>3秒</option>\r\n            <option value=\"4\">4秒</option>\r\n            <option value=\"5\">5秒</option>\r\n            <option value=\"6\">6秒</option>\r\n            <option value=\"7\">7秒</option>\r\n            <option value=\"8\">8秒</option>\r\n            <option value=\"9\">9秒</option>\r\n            <option value=\"10\">10秒</option>\r\n          </select>\r\n                  <input name=\"autophstop\" type=\"hidden\" value=\"0\">\r\n          <input type=\"button\" name=\"Submit3\" value=\"自动播放\" onclick=\"document.ViewPhotoForm.autophstop.value=0;PhAutoPlay();\">\r\n          &nbsp;<input type=\"button\" name=\"Submit32\" value=\"停止播放\" onclick=\"document.ViewPhotoForm.autophstop.value=1;\">\r\n        </div></td>\r\n    </tr>\r\n  </form>\r\n</table>\r\n<table width=\"500\" border=\"0\" align=\"center\" cellpadding=\"3\" cellspacing=\"1\">\r\n<tr><td>\r\n<marquee  behavior=alternate ONMOUSEOUT=\"this.scrollDelay=1\" ONMOUSEOVER=\"this.scrollDelay=600\"  scrollamount=1  SCROLLDELAY=1  border=0  scrolldelay=70  width=\"100%\"  align=middle>\r\n        [!--smalldh--]\r\n</marquee>\r\n</td></tr></table>','Y-m-d H:i:s','<a href=''#ecms'' onclick=''NextPhPage();'' title=''点击进入下一张图片''><img src=''[!--picurl--]'' alt=''[!--picname--]'' border=1 class=''photoresize''></a><br><span style=''line-height=18pt''>[!--picname--]</span>','0','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('12','嘉鱼政务网栏目导航','1','[!--empirenews.listtemp--]<!--list.var1-->[!--empirenews.listtemp--]','Y-m-d H:i:s','<a href=\"[!--classurl--]\" target=''_blank''>[!--classname--]</a>','0','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('15','服务市民子栏目模板','1','<table>\r\n[!--empirenews.listtemp--]\r\n<tr>\r\n<!--list.var1-->\r\n<!--list.var2-->\r\n<!--list.var3-->\r\n<!--list.var4-->\r\n</tr>\r\n[!--empirenews.listtemp--]\r\n</table>','Y-m-d H:i:s','<td class=\"sgfw\"><a href=\"[!--classurl--]\">[!--classname--]</a></td>\r\n','0','4','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('16','服务企业子栏目模板','1','<table>\r\n[!--empirenews.listtemp--]\r\n<tr>\r\n<!--list.var1-->\r\n<!--list.var2-->\r\n<!--list.var3-->\r\n<!--list.var4-->\r\n<!--list.var5-->\r\n</tr>\r\n[!--empirenews.listtemp--]\r\n</table>','Y-m-d H:i:s','<td class=\"sgfw\"><a href=\"[!--classurl--]\">[!--classname--]</a></td>\r\n','0','5','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('17','服务三农子栏目模板','1','<table>\r\n[!--empirenews.listtemp--]\r\n<tr>\r\n<!--list.var1-->\r\n<!--list.var2-->\r\n<!--list.var3-->\r\n<!--list.var4-->\r\n<!--list.var5-->\r\n</tr>\r\n[!--empirenews.listtemp--]\r\n</table>','Y-m-d H:i:s','<td class=\"sgfw\"><a href=\"[!--classurl--]\">[!--classname--]</a></td>\r\n','0','5','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('26','热门信息调用','1','[!--empirenews.listtemp--]<!--list.var1-->[!--empirenews.listtemp--]','Y-m-d H:i:s','<ul><a href=\"[!--titleurl--]\" title=\"[!--oldtitle--]\">&nbsp;[!--title--]</a></ul>','0','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('20','行政许可目录子栏目2排','1','[!--empirenews.listtemp--]<tr><!--list.var1--><!--list.var2--></tr>[!--empirenews.listtemp--]','Y-m-d H:i:s','<td width=\"26\" height=\"35\" align=\"center\"><img src=\"[!--news.url--]skin/jy/images/lmt.gif\" width=\"11\" height=\"11\" /></td>\r\n<td height=\"35\" align=\"left\"><a href=\"[!--classurl--]\">[!--classname--]</a></td>\r\n','0','2','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('21','首页服务企业标签模板','1','<table>[!--empirenews.listtemp--]<tr><td> | <!--list.var1--><!--list.var2--><!--list.var3--><!--list.var4--></td></tr>[!--empirenews.listtemp--]</table>','Y-m-d H:i:s','<a href=\"[!--classurl--]\" target=\"_blank\">[!--classname--]</a> | ','0','4','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('23','专题栏图片+标题 ','1','[!--empirenews.listtemp--]<!--list.var1-->[!--empirenews.listtemp--]','Y-m-d H:i:s','<DIV class=imgRAppCol>\r\n<DIV class=boximage><A href=\"[!--titleurl--]\" target=_blank><div style=''width:104px;height:64px;overflow:hidden;''><img src=\"[!--titlepic--]\" width=\"104\"/></div></A></DIV>\r\n<DIV class=imgRAppTxt><A title=\"[!--oldtitle--]\" href=\"[!--titleurl--]\" target=_blank>[!--title--]</A></DIV></DIV>','0','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('24','嘉鱼政务栏目导航','1','[!--empirenews.listtemp--]\r\n<!--list.var1-->\r\n[!--empirenews.listtemp--]','Y-m-d H:i:s','<tr>\r\n              <td width=\"26\" height=\"35\" align=\"center\"><img src=\"[!--news.url--]skin/jy/images/lmt.gif\" width=\"11\" height=\"11\" /></td>\r\n              <td height=\"35\" align=\"left\"><a href=\"[!--classurl--]\">[!--classname--]</a>\r\n</td>\r\n            </tr>\r\n','0','1','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('25','首页服务三农标签模板','1','<table>[!--empirenews.listtemp--]<tr><td> | <!--list.var1--><!--list.var2--><!--list.var3--></td></tr>[!--empirenews.listtemp--]</table>','Y-m-d H:i:s','<a href=\"[!--classurl--]\" target=\"_blank\">[!--classname--]</a> | ','0','3','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('27','首页专题专栏导航','1','<table  height=\"135\">[!--empirenews.listtemp--]\r\n<tr><td><!--list.var1--></td></tr>\r\n<tr><td><!--list.var2--></td></tr>\r\n<tr><td><!--list.var3--></td></tr>\r\n<tr><td><!--list.var4--></td></tr>\r\n<tr><td><!--list.var5--></td></tr>\r\n[!--empirenews.listtemp--]</table>','Y-m-d H:i:s','<img src=\"[!--news.url--]skin/jy/images/t1.gif\"> <a href=''[!--classurl--]'' target=_blank>[!--classname--]</a>\r\n','0','5','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('28','党务右廉政导航标签模板','1','<table>\r\n[!--empirenews.listtemp--]\r\n<tr><td height=\"25\"></td></tr>\r\n<tr><td><!--list.var1--></td></tr>\r\n<tr><td><!--list.var2--></td></tr>\r\n<tr><td><!--list.var3--></td></tr>\r\n<tr><td><!--list.var4--></td></tr>\r\n<tr><td><!--list.var5--></td></tr>\r\n[!--empirenews.listtemp--]</table>\r\n\r\n\r\n','Y-m-d H:i:s',' <a href=\"[!--classurl--]\" target=\"_blank\">[!--classname--]</a>','0','5','0','0');");
E_D("replace into `phome_enewsbqtemp_3` values('29','党务右基层党务导航标签模板','1','<table>\r\n[!--empirenews.listtemp--]\r\n<tr><td height=\"25\"></td></tr>\r\n<tr><td> | <!--list.var1--> | </td><td><!--list.var2--> | </td></tr>\r\n<tr><td> | <!--list.var3--> | </td><td><!--list.var4--> | </td></tr>\r\n<tr><td> | <!--list.var5--> | </td></tr>\r\n[!--empirenews.listtemp--]</table>\r\n\r\n\r\n','Y-m-d H:i:s',' <a href=\"[!--classurl--]\" target=\"_blank\">[!--classname--]</a>','0','5','0','0');");

@include("../../inc/footer.php");
?>