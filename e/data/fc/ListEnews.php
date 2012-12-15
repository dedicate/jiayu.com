<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>管理信息</title>
<link href="../data/menu/menu.css" rel="stylesheet" type="text/css">
<script src="../data/menu/menu.js" type="text/javascript"></script>
<script language="javascript" src="../data/rightmenu/context_menu.js"></script>
<script language="javascript" src="../data/rightmenu/ieemu.js"></script>
<SCRIPT lanuage="JScript">
if(self==top)
{self.location.href='admin.php';}

function chft(obj,ecms,classid){
	if(ecms==1)
	{
		obj.style.fontWeight='bold';
	}
	else
	{
		obj.style.fontWeight='';
	}
	obj.title='栏目ID：'+classid;
}

function tourl(bclassid,classid){
	parent.main.location.href="ListNews.php?bclassid="+bclassid+"&classid="+classid;
}

if(moz) {
	extendEventObject();
	extendElementModel();
	emulateAttachEvent();
}
//右键菜单
function ShRM(obj,bclassid,classid,classurl,showmenu)
{
  var eobj,popupoptions;
  classurl='http://www.jiayu.gov.cn/e/public/ClassUrl/?classid='+classid;
if(showmenu==1)
{
  popupoptions = [
    new ContextItem("增加信息",function(){ parent.document.main.location="AddNews.php?enews=AddNews&bclassid="+bclassid+"&classid="+classid; }),
	new ContextSeperator(),
    new ContextItem("刷新栏目",function(){ parent.document.main.location="enews.php?enews=ReListHtml&classid="+classid; }),
	new ContextItem("刷新栏目JS",function(){ parent.document.main.location="ecmschtml.php?enews=ReSingleJs&doing=0&classid="+classid; }),
    new ContextItem("刷新首页",function(){ parent.document.main.location="ecmschtml.php?enews=ReIndex"; }),
	new ContextSeperator(),
	new ContextItem("预览首页",function(){ window.open("../../"); }),
    new ContextItem("预览栏目",function(){ window.open(classurl); }),
	new ContextSeperator(),
	new ContextItem("修改栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=EditClass"; }),
    new ContextItem("增加新栏目",function(){ parent.document.main.location="AddClass.php?enews=AddClass"; }),
    new ContextItem("复制栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=AddClass&docopy=1"; }),
    new ContextSeperator(),
	new ContextItem("数据更新",function(){ parent.document.main.location="ReHtml/ChangeData.php"; }),
	new ContextItem("增加采集节点",function(){ parent.document.main.location="AddInfoClass.php?enews=AddInfoClass&newsclassid="+classid; }),
	new ContextItem("管理附件",function(){ parent.document.main.location="file/ListFile.php?type=9&classid="+classid; }),
	new ContextSeperator()
  ]
}
else if(showmenu==2)
{
	popupoptions = [
    new ContextItem("新闻系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=news"; }),new ContextItem("下载系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=download"; }),new ContextItem("图片系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=photo"; }),new ContextSeperator(),new ContextItem("FLASH系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=flash"; }),new ContextItem("电影系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=movie"; }),new ContextItem("商城系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=shop"; }),new ContextSeperator(),new ContextItem("文章系统数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=article"; }),new ContextItem("分类信息数据表",function(){ parent.document.main.location="ListAllInfo.php?tbname=info"; })  ]
}
else
{
	popupoptions = [
    new ContextItem("刷新栏目",function(){ parent.document.main.location="enews.php?enews=ReListHtml&classid="+classid; }),
	new ContextItem("刷新栏目JS",function(){ parent.document.main.location="ecmschtml.php?enews=ReSingleJs&doing=0&classid="+classid; }),
    new ContextItem("刷新首页",function(){ parent.document.main.location="ecmschtml.php?enews=ReIndex"; }),
	new ContextItem("数据更新",function(){ parent.document.main.location="ReHtml/ChangeData.php"; }),
	new ContextSeperator(),
	new ContextItem("预览首页",function(){ window.open("../../"); }),
	new ContextItem("预览栏目",function(){ window.open(classurl); }),
	new ContextSeperator(),
	new ContextItem("修改栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=EditClass"; }),
    new ContextItem("增加新栏目",function(){ parent.document.main.location="AddClass.php?enews=AddClass"; }),
    new ContextItem("复制栏目",function(){ parent.document.main.location="AddClass.php?classid="+classid+"&enews=AddClass&docopy=1"; }),
	new ContextSeperator()
  ]
}
  ContextMenu.display(popupoptions)
}
</SCRIPT>
</head>
<body onLoad="initialize();ContextMenu.intializeContextMenu();" bgcolor="#FFCFAD">
	<table border='0' cellspacing='0' cellpadding='0'>
	<tr height=20>
			<td id="home"><img src="../data/images/homepage.gif" border=0></td>
			<td><a href="#ecms" onclick="parent.main.location.href='ListAllInfo.php';" onmouseout="this.style.fontWeight=''" onmouseover="this.style.fontWeight='bold'" oncontextmenu="ShRM(this,0,0,'',2)"><b>管理信息</b></a></td>
	</tr>
	</table>
	<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr267" class="menu1" onclick="chengstate('267')"><a onmouseout=chft(this,0,267) onmouseover=chft(this,1,267) oncontextmenu=ShRM(this,0,267,'',0)>专题专栏</a></td>
		  </tr>
				  <tr id="item267" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr288" class="file" onclick=""><a onclick=tourl(267,288) onmouseout=chft(this,0,288) onmouseover=chft(this,1,288) oncontextmenu=ShRM(this,267,288,'',1)>建设湖北经济强县重点项目建设专题</a></td>
		  </tr>
				<tr>
			<td id="pr287" class="file" onclick=""><a onclick=tourl(267,287) onmouseout=chft(this,0,287) onmouseover=chft(this,1,287) oncontextmenu=ShRM(this,267,287,'',1)>喜迎十八大争创新业绩</a></td>
		  </tr>
				<tr>
			<td id="pr284" class="file" onclick=""><a onclick=tourl(267,284) onmouseout=chft(this,0,284) onmouseover=chft(this,1,284) oncontextmenu=ShRM(this,267,284,'',1)>嘉鱼县治庸问责</a></td>
		  </tr>
				<tr>
			<td id="pr268" class="file" onclick=""><a onclick=tourl(267,268) onmouseout=chft(this,0,268) onmouseover=chft(this,1,268) oncontextmenu=ShRM(this,267,268,'',1)>两城同创</a></td>
		  </tr>
				<tr>
			<td id="pr269" class="file" onclick=""><a onclick=tourl(267,269) onmouseout=chft(this,0,269) onmouseover=chft(this,1,269) oncontextmenu=ShRM(this,267,269,'',1)>科普专栏</a></td>
		  </tr>
				<tr>
			<td id="pr285" class="file1" onclick=""><a onclick=tourl(267,285) onmouseout=chft(this,0,285) onmouseover=chft(this,1,285) oncontextmenu=ShRM(this,267,285,'',1)>“三万”活动专题</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr278" class="menu1" onclick="chengstate('278')"><a onmouseout=chft(this,0,278) onmouseover=chft(this,1,278) oncontextmenu=ShRM(this,0,278,'',0)>嘉鱼县情</a></td>
		  </tr>
				  <tr id="item278" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr280" class="file" onclick=""><a onclick=tourl(278,280) onmouseout=chft(this,0,280) onmouseover=chft(this,1,280) oncontextmenu=ShRM(this,278,280,'',1)>嘉鱼概览</a></td>
		  </tr>
				<tr>
			<td id="pr281" class="file" onclick=""><a onclick=tourl(278,281) onmouseout=chft(this,0,281) onmouseover=chft(this,1,281) oncontextmenu=ShRM(this,278,281,'',1)>县域经济</a></td>
		  </tr>
				<tr>
			<td id="pr282" class="file1" onclick=""><a onclick=tourl(278,282) onmouseout=chft(this,0,282) onmouseover=chft(this,1,282) oncontextmenu=ShRM(this,278,282,'',1)>嘉鱼文化</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr283" class="file" onclick=""><a onclick=tourl(0,283) onmouseout=chft(this,0,283) onmouseover=chft(this,1,283) oncontextmenu=ShRM(this,0,283,'',1)>乡镇链接</a></td>
		  </tr>
				<tr>
			<td id="pr289" class="menu1" onclick="chengstate('289')"><a onmouseout=chft(this,0,289) onmouseover=chft(this,1,289) oncontextmenu=ShRM(this,0,289,'',0)>党务公开</a></td>
		  </tr>
				  <tr id="item289" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr290" class="menu1" onclick="chengstate('290')"><a onmouseout=chft(this,0,290) onmouseover=chft(this,1,290) oncontextmenu=ShRM(this,289,290,'',0)>基本情况</a></td>
		  </tr>
				  <tr id="item290" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr299" class="file" onclick=""><a onclick=tourl(290,299) onmouseout=chft(this,0,299) onmouseover=chft(this,1,299) oncontextmenu=ShRM(this,290,299,'',1)>县委常委分工</a></td>
		  </tr>
				<tr>
			<td id="pr300" class="file" onclick=""><a onclick=tourl(290,300) onmouseout=chft(this,0,300) onmouseover=chft(this,1,300) oncontextmenu=ShRM(this,290,300,'',1)>县领导五联情况</a></td>
		  </tr>
				<tr>
			<td id="pr301" class="file1" onclick=""><a onclick=tourl(290,301) onmouseout=chft(this,0,301) onmouseover=chft(this,1,301) oncontextmenu=ShRM(this,290,301,'',1)>全县党组织概况</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr292" class="menu1" onclick="chengstate('292')"><a onmouseout=chft(this,0,292) onmouseover=chft(this,1,292) oncontextmenu=ShRM(this,289,292,'',0)>县委工作</a></td>
		  </tr>
				  <tr id="item292" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr302" class="file" onclick=""><a onclick=tourl(292,302) onmouseout=chft(this,0,302) onmouseover=chft(this,1,302) oncontextmenu=ShRM(this,292,302,'',1)>县委要闻</a></td>
		  </tr>
				<tr>
			<td id="pr303" class="file" onclick=""><a onclick=tourl(292,303) onmouseout=chft(this,0,303) onmouseover=chft(this,1,303) oncontextmenu=ShRM(this,292,303,'',1)>县委职权</a></td>
		  </tr>
				<tr>
			<td id="pr304" class="file" onclick=""><a onclick=tourl(292,304) onmouseout=chft(this,0,304) onmouseover=chft(this,1,304) oncontextmenu=ShRM(this,292,304,'',1)>重要工作</a></td>
		  </tr>
				<tr>
			<td id="pr305" class="file" onclick=""><a onclick=tourl(292,305) onmouseout=chft(this,0,305) onmouseover=chft(this,1,305) oncontextmenu=ShRM(this,292,305,'',1)>重要会议</a></td>
		  </tr>
				<tr>
			<td id="pr306" class="file" onclick=""><a onclick=tourl(292,306) onmouseout=chft(this,0,306) onmouseover=chft(this,1,306) oncontextmenu=ShRM(this,292,306,'',1)>重大决策</a></td>
		  </tr>
				<tr>
			<td id="pr307" class="file" onclick=""><a onclick=tourl(292,307) onmouseout=chft(this,0,307) onmouseover=chft(this,1,307) oncontextmenu=ShRM(this,292,307,'',1)>领导讲话</a></td>
		  </tr>
				<tr>
			<td id="pr308" class="file1" onclick=""><a onclick=tourl(292,308) onmouseout=chft(this,0,308) onmouseover=chft(this,1,308) oncontextmenu=ShRM(this,292,308,'',1)>重要文件</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr294" class="file" onclick=""><a onclick=tourl(289,294) onmouseout=chft(this,0,294) onmouseover=chft(this,1,294) oncontextmenu=ShRM(this,289,294,'',1)>工作动态</a></td>
		  </tr>
				<tr>
			<td id="pr295" class="menu1" onclick="chengstate('295')"><a onmouseout=chft(this,0,295) onmouseover=chft(this,1,295) oncontextmenu=ShRM(this,289,295,'',0)>基层党务</a></td>
		  </tr>
				  <tr id="item295" style="display:none">
			<td class="list">
						</td>
		 </tr>	
				<tr>
			<td id="pr296" class="menu3" onclick="chengstate('296')"><a onmouseout=chft(this,0,296) onmouseover=chft(this,1,296) oncontextmenu=ShRM(this,289,296,'',0)>廉政文化</a></td>
		  </tr>
				  <tr id="item296" style="display:none">
			<td class="list1">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr321" class="file" onclick=""><a onclick=tourl(296,321) onmouseout=chft(this,0,321) onmouseover=chft(this,1,321) oncontextmenu=ShRM(this,296,321,'',1)>格言警句</a></td>
		  </tr>
				<tr>
			<td id="pr322" class="file" onclick=""><a onclick=tourl(296,322) onmouseout=chft(this,0,322) onmouseover=chft(this,1,322) oncontextmenu=ShRM(this,296,322,'',1)>廉政故事</a></td>
		  </tr>
				<tr>
			<td id="pr323" class="file1" onclick=""><a onclick=tourl(296,323) onmouseout=chft(this,0,323) onmouseover=chft(this,1,323) oncontextmenu=ShRM(this,296,323,'',1)>廉政书画</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr1" class="menu1" onclick="chengstate('1')"><a onmouseout=chft(this,0,1) onmouseover=chft(this,1,1) oncontextmenu=ShRM(this,0,1,'',0)>嘉鱼政务</a></td>
		  </tr>
				  <tr id="item1" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr2" class="file" onclick=""><a onclick=tourl(1,2) onmouseout=chft(this,0,2) onmouseover=chft(this,1,2) oncontextmenu=ShRM(this,1,2,'',1)>领导信息</a></td>
		  </tr>
				<tr>
			<td id="pr3" class="file" onclick=""><a onclick=tourl(1,3) onmouseout=chft(this,0,3) onmouseover=chft(this,1,3) oncontextmenu=ShRM(this,1,3,'',1)>组织机构</a></td>
		  </tr>
				<tr>
			<td id="pr4" class="file" onclick=""><a onclick=tourl(1,4) onmouseout=chft(this,0,4) onmouseover=chft(this,1,4) oncontextmenu=ShRM(this,1,4,'',1)>领导讲话</a></td>
		  </tr>
				<tr>
			<td id="pr6" class="file" onclick=""><a onclick=tourl(1,6) onmouseout=chft(this,0,6) onmouseover=chft(this,1,6) oncontextmenu=ShRM(this,1,6,'',1)>政务动态</a></td>
		  </tr>
				<tr>
			<td id="pr7" class="file" onclick=""><a onclick=tourl(1,7) onmouseout=chft(this,0,7) onmouseover=chft(this,1,7) oncontextmenu=ShRM(this,1,7,'',1)>政府文件</a></td>
		  </tr>
				<tr>
			<td id="pr8" class="file" onclick=""><a onclick=tourl(1,8) onmouseout=chft(this,0,8) onmouseover=chft(this,1,8) oncontextmenu=ShRM(this,1,8,'',1)>政府公告</a></td>
		  </tr>
				<tr>
			<td id="pr9" class="file" onclick=""><a onclick=tourl(1,9) onmouseout=chft(this,0,9) onmouseover=chft(this,1,9) oncontextmenu=ShRM(this,1,9,'',1)>政府工作报告</a></td>
		  </tr>
				<tr>
			<td id="pr10" class="file" onclick=""><a onclick=tourl(1,10) onmouseout=chft(this,0,10) onmouseover=chft(this,1,10) oncontextmenu=ShRM(this,1,10,'',1)>信息公开指南</a></td>
		  </tr>
				<tr>
			<td id="pr11" class="file" onclick=""><a onclick=tourl(1,11) onmouseout=chft(this,0,11) onmouseover=chft(this,1,11) oncontextmenu=ShRM(this,1,11,'',1)>信息公开目录</a></td>
		  </tr>
				<tr>
			<td id="pr77" class="file1" onclick=""><a onclick=tourl(1,77) onmouseout=chft(this,0,77) onmouseover=chft(this,1,77) oncontextmenu=ShRM(this,1,77,'',1)>信息公开申请</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr13" class="menu1" onclick="chengstate('13')"><a onmouseout=chft(this,0,13) onmouseover=chft(this,1,13) oncontextmenu=ShRM(this,0,13,'',0)>嘉鱼县行政许可目录</a></td>
		  </tr>
				  <tr id="item13" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr40" class="file" onclick=""><a onclick=tourl(13,40) onmouseout=chft(this,0,40) onmouseover=chft(this,1,40) oncontextmenu=ShRM(this,13,40,'',1)>许可目录 </a></td>
		  </tr>
				<tr>
			<td id="pr43" class="file" onclick=""><a onclick=tourl(13,43) onmouseout=chft(this,0,43) onmouseover=chft(this,1,43) oncontextmenu=ShRM(this,13,43,'',1)>安监局</a></td>
		  </tr>
				<tr>
			<td id="pr44" class="file" onclick=""><a onclick=tourl(13,44) onmouseout=chft(this,0,44) onmouseover=chft(this,1,44) oncontextmenu=ShRM(this,13,44,'',1)>编办</a></td>
		  </tr>
				<tr>
			<td id="pr45" class="file" onclick=""><a onclick=tourl(13,45) onmouseout=chft(this,0,45) onmouseover=chft(this,1,45) oncontextmenu=ShRM(this,13,45,'',1)>发改局</a></td>
		  </tr>
				<tr>
			<td id="pr46" class="file" onclick=""><a onclick=tourl(13,46) onmouseout=chft(this,0,46) onmouseover=chft(this,1,46) oncontextmenu=ShRM(this,13,46,'',1)>公安局</a></td>
		  </tr>
				<tr>
			<td id="pr47" class="file" onclick=""><a onclick=tourl(13,47) onmouseout=chft(this,0,47) onmouseover=chft(this,1,47) oncontextmenu=ShRM(this,13,47,'',1)>规划局</a></td>
		  </tr>
				<tr>
			<td id="pr48" class="file" onclick=""><a onclick=tourl(13,48) onmouseout=chft(this,0,48) onmouseover=chft(this,1,48) oncontextmenu=ShRM(this,13,48,'',1)>国土局</a></td>
		  </tr>
				<tr>
			<td id="pr49" class="file" onclick=""><a onclick=tourl(13,49) onmouseout=chft(this,0,49) onmouseover=chft(this,1,49) oncontextmenu=ShRM(this,13,49,'',1)>环保局</a></td>
		  </tr>
				<tr>
			<td id="pr50" class="file" onclick=""><a onclick=tourl(13,50) onmouseout=chft(this,0,50) onmouseover=chft(this,1,50) oncontextmenu=ShRM(this,13,50,'',1)>交通局</a></td>
		  </tr>
				<tr>
			<td id="pr51" class="file" onclick=""><a onclick=tourl(13,51) onmouseout=chft(this,0,51) onmouseover=chft(this,1,51) oncontextmenu=ShRM(this,13,51,'',1)>教育局</a></td>
		  </tr>
				<tr>
			<td id="pr52" class="file" onclick=""><a onclick=tourl(13,52) onmouseout=chft(this,0,52) onmouseover=chft(this,1,52) oncontextmenu=ShRM(this,13,52,'',1)>林业局</a></td>
		  </tr>
				<tr>
			<td id="pr53" class="file" onclick=""><a onclick=tourl(13,53) onmouseout=chft(this,0,53) onmouseover=chft(this,1,53) oncontextmenu=ShRM(this,13,53,'',1)>民政局</a></td>
		  </tr>
				<tr>
			<td id="pr54" class="file" onclick=""><a onclick=tourl(13,54) onmouseout=chft(this,0,54) onmouseover=chft(this,1,54) oncontextmenu=ShRM(this,13,54,'',1)>农机局</a></td>
		  </tr>
				<tr>
			<td id="pr55" class="file" onclick=""><a onclick=tourl(13,55) onmouseout=chft(this,0,55) onmouseover=chft(this,1,55) oncontextmenu=ShRM(this,13,55,'',1)>人社局</a></td>
		  </tr>
				<tr>
			<td id="pr56" class="file" onclick=""><a onclick=tourl(13,56) onmouseout=chft(this,0,56) onmouseover=chft(this,1,56) oncontextmenu=ShRM(this,13,56,'',1)>水利局</a></td>
		  </tr>
				<tr>
			<td id="pr57" class="file" onclick=""><a onclick=tourl(13,57) onmouseout=chft(this,0,57) onmouseover=chft(this,1,57) oncontextmenu=ShRM(this,13,57,'',1)>卫生局</a></td>
		  </tr>
				<tr>
			<td id="pr58" class="file" onclick=""><a onclick=tourl(13,58) onmouseout=chft(this,0,58) onmouseover=chft(this,1,58) oncontextmenu=ShRM(this,13,58,'',1)>消防大队</a></td>
		  </tr>
				<tr>
			<td id="pr59" class="file" onclick=""><a onclick=tourl(13,59) onmouseout=chft(this,0,59) onmouseover=chft(this,1,59) oncontextmenu=ShRM(this,13,59,'',1)>畜牧局</a></td>
		  </tr>
				<tr>
			<td id="pr60" class="file" onclick=""><a onclick=tourl(13,60) onmouseout=chft(this,0,60) onmouseover=chft(this,1,60) oncontextmenu=ShRM(this,13,60,'',1)>渔政局</a></td>
		  </tr>
				<tr>
			<td id="pr61" class="file" onclick=""><a onclick=tourl(13,61) onmouseout=chft(this,0,61) onmouseover=chft(this,1,61) oncontextmenu=ShRM(this,13,61,'',1)>住建局</a></td>
		  </tr>
				<tr>
			<td id="pr62" class="file" onclick=""><a onclick=tourl(13,62) onmouseout=chft(this,0,62) onmouseover=chft(this,1,62) oncontextmenu=ShRM(this,13,62,'',1)>国税局</a></td>
		  </tr>
				<tr>
			<td id="pr63" class="file" onclick=""><a onclick=tourl(13,63) onmouseout=chft(this,0,63) onmouseover=chft(this,1,63) oncontextmenu=ShRM(this,13,63,'',1)>档案局</a></td>
		  </tr>
				<tr>
			<td id="pr64" class="file" onclick=""><a onclick=tourl(13,64) onmouseout=chft(this,0,64) onmouseover=chft(this,1,64) oncontextmenu=ShRM(this,13,64,'',1)>工商局</a></td>
		  </tr>
				<tr>
			<td id="pr65" class="file" onclick=""><a onclick=tourl(13,65) onmouseout=chft(this,0,65) onmouseover=chft(this,1,65) oncontextmenu=ShRM(this,13,65,'',1)>广电局</a></td>
		  </tr>
				<tr>
			<td id="pr66" class="file" onclick=""><a onclick=tourl(13,66) onmouseout=chft(this,0,66) onmouseover=chft(this,1,66) oncontextmenu=ShRM(this,13,66,'',1)>计生局</a></td>
		  </tr>
				<tr>
			<td id="pr67" class="file" onclick=""><a onclick=tourl(13,67) onmouseout=chft(this,0,67) onmouseover=chft(this,1,67) oncontextmenu=ShRM(this,13,67,'',1)>科技局</a></td>
		  </tr>
				<tr>
			<td id="pr68" class="file" onclick=""><a onclick=tourl(13,68) onmouseout=chft(this,0,68) onmouseover=chft(this,1,68) oncontextmenu=ShRM(this,13,68,'',1)>粮食局</a></td>
		  </tr>
				<tr>
			<td id="pr69" class="file" onclick=""><a onclick=tourl(13,69) onmouseout=chft(this,0,69) onmouseover=chft(this,1,69) oncontextmenu=ShRM(this,13,69,'',1)>民宗局</a></td>
		  </tr>
				<tr>
			<td id="pr70" class="file" onclick=""><a onclick=tourl(13,70) onmouseout=chft(this,0,70) onmouseover=chft(this,1,70) oncontextmenu=ShRM(this,13,70,'',1)>农业局</a></td>
		  </tr>
				<tr>
			<td id="pr71" class="file" onclick=""><a onclick=tourl(13,71) onmouseout=chft(this,0,71) onmouseover=chft(this,1,71) oncontextmenu=ShRM(this,13,71,'',1)>气象局</a></td>
		  </tr>
				<tr>
			<td id="pr72" class="file" onclick=""><a onclick=tourl(13,72) onmouseout=chft(this,0,72) onmouseover=chft(this,1,72) oncontextmenu=ShRM(this,13,72,'',1)>人防办</a></td>
		  </tr>
				<tr>
			<td id="pr73" class="file" onclick=""><a onclick=tourl(13,73) onmouseout=chft(this,0,73) onmouseover=chft(this,1,73) oncontextmenu=ShRM(this,13,73,'',1)>统计局</a></td>
		  </tr>
				<tr>
			<td id="pr74" class="file" onclick=""><a onclick=tourl(13,74) onmouseout=chft(this,0,74) onmouseover=chft(this,1,74) oncontextmenu=ShRM(this,13,74,'',1)>文体局</a></td>
		  </tr>
				<tr>
			<td id="pr75" class="file1" onclick=""><a onclick=tourl(13,75) onmouseout=chft(this,0,75) onmouseover=chft(this,1,75) oncontextmenu=ShRM(this,13,75,'',1)>其它科局</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr277" class="file" onclick=""><a onclick=tourl(0,277) onmouseout=chft(this,0,277) onmouseover=chft(this,1,277) oncontextmenu=ShRM(this,0,277,'',1)>嘉鱼县涉企行政事业性收费标准目录</a></td>
		  </tr>
				<tr>
			<td id="pr12" class="file" onclick=""><a onclick=tourl(0,12) onmouseout=chft(this,0,12) onmouseover=chft(this,1,12) oncontextmenu=ShRM(this,0,12,'',1)>行政事业收费目录及标准</a></td>
		  </tr>
				<tr>
			<td id="pr76" class="file" onclick=""><a onclick=tourl(0,76) onmouseout=chft(this,0,76) onmouseover=chft(this,1,76) oncontextmenu=ShRM(this,0,76,'',1)>百件实事网上办</a></td>
		  </tr>
				<tr>
			<td id="pr78" class="menu1" onclick="chengstate('78')"><a onmouseout=chft(this,0,78) onmouseover=chft(this,1,78) oncontextmenu=ShRM(this,0,78,'',0)>招商引资</a></td>
		  </tr>
				  <tr id="item78" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr79" class="file" onclick=""><a onclick=tourl(78,79) onmouseout=chft(this,0,79) onmouseover=chft(this,1,79) oncontextmenu=ShRM(this,78,79,'',1)>招商动态</a></td>
		  </tr>
				<tr>
			<td id="pr80" class="file" onclick=""><a onclick=tourl(78,80) onmouseout=chft(this,0,80) onmouseover=chft(this,1,80) oncontextmenu=ShRM(this,78,80,'',1)>投资成本</a></td>
		  </tr>
				<tr>
			<td id="pr81" class="file" onclick=""><a onclick=tourl(78,81) onmouseout=chft(this,0,81) onmouseover=chft(this,1,81) oncontextmenu=ShRM(this,78,81,'',1)>招商项目</a></td>
		  </tr>
				<tr>
			<td id="pr82" class="file" onclick=""><a onclick=tourl(78,82) onmouseout=chft(this,0,82) onmouseover=chft(this,1,82) oncontextmenu=ShRM(this,78,82,'',1)>招商服务</a></td>
		  </tr>
				<tr>
			<td id="pr83" class="file" onclick=""><a onclick=tourl(78,83) onmouseout=chft(this,0,83) onmouseover=chft(this,1,83) oncontextmenu=ShRM(this,78,83,'',1)>投资环境</a></td>
		  </tr>
				<tr>
			<td id="pr84" class="file" onclick=""><a onclick=tourl(78,84) onmouseout=chft(this,0,84) onmouseover=chft(this,1,84) oncontextmenu=ShRM(this,78,84,'',1)>投资政策</a></td>
		  </tr>
				<tr>
			<td id="pr85" class="file1" onclick=""><a onclick=tourl(78,85) onmouseout=chft(this,0,85) onmouseover=chft(this,1,85) oncontextmenu=ShRM(this,78,85,'',1)>园区建设</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr86" class="menu1" onclick="chengstate('86')"><a onmouseout=chft(this,0,86) onmouseover=chft(this,1,86) oncontextmenu=ShRM(this,0,86,'',0)>服务市民</a></td>
		  </tr>
				  <tr id="item86" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr87" class="menu1" onclick="chengstate('87')"><a onmouseout=chft(this,0,87) onmouseover=chft(this,1,87) oncontextmenu=ShRM(this,86,87,'',0)>生育收养</a></td>
		  </tr>
				  <tr id="item87" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr103" class="file" onclick=""><a onclick=tourl(87,103) onmouseout=chft(this,0,103) onmouseover=chft(this,1,103) oncontextmenu=ShRM(this,87,103,'',1)>计划生育</a></td>
		  </tr>
				<tr>
			<td id="pr104" class="file1" onclick=""><a onclick=tourl(87,104) onmouseout=chft(this,0,104) onmouseover=chft(this,1,104) oncontextmenu=ShRM(this,87,104,'',1)>领养收养</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr88" class="menu1" onclick="chengstate('88')"><a onmouseout=chft(this,0,88) onmouseover=chft(this,1,88) oncontextmenu=ShRM(this,86,88,'',0)>养老</a></td>
		  </tr>
				  <tr id="item88" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr105" class="file" onclick=""><a onclick=tourl(88,105) onmouseout=chft(this,0,105) onmouseover=chft(this,1,105) oncontextmenu=ShRM(this,88,105,'',1)>离休退休</a></td>
		  </tr>
				<tr>
			<td id="pr106" class="file1" onclick=""><a onclick=tourl(88,106) onmouseout=chft(this,0,106) onmouseover=chft(this,1,106) oncontextmenu=ShRM(this,88,106,'',1)>养老服务</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr89" class="menu1" onclick="chengstate('89')"><a onmouseout=chft(this,0,89) onmouseover=chft(this,1,89) oncontextmenu=ShRM(this,86,89,'',0)>公安司法</a></td>
		  </tr>
				  <tr id="item89" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr107" class="file" onclick=""><a onclick=tourl(89,107) onmouseout=chft(this,0,107) onmouseover=chft(this,1,107) oncontextmenu=ShRM(this,89,107,'',1)>法律援助</a></td>
		  </tr>
				<tr>
			<td id="pr108" class="file" onclick=""><a onclick=tourl(89,108) onmouseout=chft(this,0,108) onmouseover=chft(this,1,108) oncontextmenu=ShRM(this,89,108,'',1)>公正仲裁</a></td>
		  </tr>
				<tr>
			<td id="pr109" class="file" onclick=""><a onclick=tourl(89,109) onmouseout=chft(this,0,109) onmouseover=chft(this,1,109) oncontextmenu=ShRM(this,89,109,'',1)>监督投诉</a></td>
		  </tr>
				<tr>
			<td id="pr110" class="file1" onclick=""><a onclick=tourl(89,110) onmouseout=chft(this,0,110) onmouseover=chft(this,1,110) oncontextmenu=ShRM(this,89,110,'',1)>社会治安</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr90" class="menu1" onclick="chengstate('90')"><a onmouseout=chft(this,0,90) onmouseover=chft(this,1,90) oncontextmenu=ShRM(this,86,90,'',0)>出境入境</a></td>
		  </tr>
				  <tr id="item90" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr112" class="file1" onclick=""><a onclick=tourl(90,112) onmouseout=chft(this,0,112) onmouseover=chft(this,1,112) oncontextmenu=ShRM(this,90,112,'',1)>出入境</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr91" class="menu1" onclick="chengstate('91')"><a onmouseout=chft(this,0,91) onmouseover=chft(this,1,91) oncontextmenu=ShRM(this,86,91,'',0)>交通</a></td>
		  </tr>
				  <tr id="item91" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr114" class="file" onclick=""><a onclick=tourl(91,114) onmouseout=chft(this,0,114) onmouseover=chft(this,1,114) oncontextmenu=ShRM(this,91,114,'',1)>机动车</a></td>
		  </tr>
				<tr>
			<td id="pr115" class="file" onclick=""><a onclick=tourl(91,115) onmouseout=chft(this,0,115) onmouseover=chft(this,1,115) oncontextmenu=ShRM(this,91,115,'',1)>非机动车</a></td>
		  </tr>
				<tr>
			<td id="pr116" class="file1" onclick=""><a onclick=tourl(91,116) onmouseout=chft(this,0,116) onmouseover=chft(this,1,116) oncontextmenu=ShRM(this,91,116,'',1)>城市道路</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr92" class="menu1" onclick="chengstate('92')"><a onmouseout=chft(this,0,92) onmouseover=chft(this,1,92) oncontextmenu=ShRM(this,86,92,'',0)>证件办理</a></td>
		  </tr>
				  <tr id="item92" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr117" class="file" onclick=""><a onclick=tourl(92,117) onmouseout=chft(this,0,117) onmouseover=chft(this,1,117) oncontextmenu=ShRM(this,92,117,'',1)>居民身份证</a></td>
		  </tr>
				<tr>
			<td id="pr118" class="file" onclick=""><a onclick=tourl(92,118) onmouseout=chft(this,0,118) onmouseover=chft(this,1,118) oncontextmenu=ShRM(this,92,118,'',1)>暂住证</a></td>
		  </tr>
				<tr>
			<td id="pr121" class="file" onclick=""><a onclick=tourl(92,121) onmouseout=chft(this,0,121) onmouseover=chft(this,1,121) oncontextmenu=ShRM(this,92,121,'',1)>驾驶证</a></td>
		  </tr>
				<tr>
			<td id="pr122" class="file" onclick=""><a onclick=tourl(92,122) onmouseout=chft(this,0,122) onmouseover=chft(this,1,122) oncontextmenu=ShRM(this,92,122,'',1)>护照签证</a></td>
		  </tr>
				<tr>
			<td id="pr123" class="file" onclick=""><a onclick=tourl(92,123) onmouseout=chft(this,0,123) onmouseover=chft(this,1,123) oncontextmenu=ShRM(this,92,123,'',1)>港澳台通行证</a></td>
		  </tr>
				<tr>
			<td id="pr124" class="file1" onclick=""><a onclick=tourl(92,124) onmouseout=chft(this,0,124) onmouseover=chft(this,1,124) oncontextmenu=ShRM(this,92,124,'',1)>其他</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr93" class="menu1" onclick="chengstate('93')"><a onmouseout=chft(this,0,93) onmouseover=chft(this,1,93) oncontextmenu=ShRM(this,86,93,'',0)>户籍</a></td>
		  </tr>
				  <tr id="item93" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr127" class="file" onclick=""><a onclick=tourl(93,127) onmouseout=chft(this,0,127) onmouseover=chft(this,1,127) oncontextmenu=ShRM(this,93,127,'',1)>落户</a></td>
		  </tr>
				<tr>
			<td id="pr129" class="file" onclick=""><a onclick=tourl(93,129) onmouseout=chft(this,0,129) onmouseover=chft(this,1,129) oncontextmenu=ShRM(this,93,129,'',1)>变更</a></td>
		  </tr>
				<tr>
			<td id="pr130" class="file1" onclick=""><a onclick=tourl(93,130) onmouseout=chft(this,0,130) onmouseover=chft(this,1,130) oncontextmenu=ShRM(this,93,130,'',1)>注销</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr94" class="menu1" onclick="chengstate('94')"><a onmouseout=chft(this,0,94) onmouseover=chft(this,1,94) oncontextmenu=ShRM(this,86,94,'',0)>医疗</a></td>
		  </tr>
				  <tr id="item94" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr132" class="file" onclick=""><a onclick=tourl(94,132) onmouseout=chft(this,0,132) onmouseover=chft(this,1,132) oncontextmenu=ShRM(this,94,132,'',1)>医护人员</a></td>
		  </tr>
				<tr>
			<td id="pr133" class="file" onclick=""><a onclick=tourl(94,133) onmouseout=chft(this,0,133) onmouseover=chft(this,1,133) oncontextmenu=ShRM(this,94,133,'',1)>就医</a></td>
		  </tr>
				<tr>
			<td id="pr134" class="file" onclick=""><a onclick=tourl(94,134) onmouseout=chft(this,0,134) onmouseover=chft(this,1,134) oncontextmenu=ShRM(this,94,134,'',1)>疾病控制</a></td>
		  </tr>
				<tr>
			<td id="pr135" class="file" onclick=""><a onclick=tourl(94,135) onmouseout=chft(this,0,135) onmouseover=chft(this,1,135) oncontextmenu=ShRM(this,94,135,'',1)>新农村合作医疗</a></td>
		  </tr>
				<tr>
			<td id="pr136" class="file" onclick=""><a onclick=tourl(94,136) onmouseout=chft(this,0,136) onmouseover=chft(this,1,136) oncontextmenu=ShRM(this,94,136,'',1)>卫生监督</a></td>
		  </tr>
				<tr>
			<td id="pr137" class="file" onclick=""><a onclick=tourl(94,137) onmouseout=chft(this,0,137) onmouseover=chft(this,1,137) oncontextmenu=ShRM(this,94,137,'',1)>卫生保健</a></td>
		  </tr>
				<tr>
			<td id="pr138" class="file1" onclick=""><a onclick=tourl(94,138) onmouseout=chft(this,0,138) onmouseover=chft(this,1,138) oncontextmenu=ShRM(this,94,138,'',1)>城镇居民医保</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr95" class="menu1" onclick="chengstate('95')"><a onmouseout=chft(this,0,95) onmouseover=chft(this,1,95) oncontextmenu=ShRM(this,86,95,'',0)>职业资格</a></td>
		  </tr>
				  <tr id="item95" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr139" class="file" onclick=""><a onclick=tourl(95,139) onmouseout=chft(this,0,139) onmouseover=chft(this,1,139) oncontextmenu=ShRM(this,95,139,'',1)>资格认定</a></td>
		  </tr>
				<tr>
			<td id="pr140" class="file1" onclick=""><a onclick=tourl(95,140) onmouseout=chft(this,0,140) onmouseover=chft(this,1,140) oncontextmenu=ShRM(this,95,140,'',1)>职称评定</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr96" class="menu1" onclick="chengstate('96')"><a onmouseout=chft(this,0,96) onmouseover=chft(this,1,96) oncontextmenu=ShRM(this,86,96,'',0)>社会保障</a></td>
		  </tr>
				  <tr id="item96" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr141" class="file" onclick=""><a onclick=tourl(96,141) onmouseout=chft(this,0,141) onmouseover=chft(this,1,141) oncontextmenu=ShRM(this,96,141,'',1)>医疗保险</a></td>
		  </tr>
				<tr>
			<td id="pr143" class="file" onclick=""><a onclick=tourl(96,143) onmouseout=chft(this,0,143) onmouseover=chft(this,1,143) oncontextmenu=ShRM(this,96,143,'',1)>养老保险</a></td>
		  </tr>
				<tr>
			<td id="pr144" class="file" onclick=""><a onclick=tourl(96,144) onmouseout=chft(this,0,144) onmouseover=chft(this,1,144) oncontextmenu=ShRM(this,96,144,'',1)>工伤保险</a></td>
		  </tr>
				<tr>
			<td id="pr148" class="file1" onclick=""><a onclick=tourl(96,148) onmouseout=chft(this,0,148) onmouseover=chft(this,1,148) oncontextmenu=ShRM(this,96,148,'',1)>其它</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr97" class="menu1" onclick="chengstate('97')"><a onmouseout=chft(this,0,97) onmouseover=chft(this,1,97) oncontextmenu=ShRM(this,86,97,'',0)>纳税</a></td>
		  </tr>
				  <tr id="item97" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr149" class="file" onclick=""><a onclick=tourl(97,149) onmouseout=chft(this,0,149) onmouseover=chft(this,1,149) oncontextmenu=ShRM(this,97,149,'',1)>个人所得税</a></td>
		  </tr>
				<tr>
			<td id="pr150" class="file" onclick=""><a onclick=tourl(97,150) onmouseout=chft(this,0,150) onmouseover=chft(this,1,150) oncontextmenu=ShRM(this,97,150,'',1)>车辆购置税</a></td>
		  </tr>
				<tr>
			<td id="pr151" class="file" onclick=""><a onclick=tourl(97,151) onmouseout=chft(this,0,151) onmouseover=chft(this,1,151) oncontextmenu=ShRM(this,97,151,'',1)>车船税</a></td>
		  </tr>
				<tr>
			<td id="pr152" class="file" onclick=""><a onclick=tourl(97,152) onmouseout=chft(this,0,152) onmouseover=chft(this,1,152) oncontextmenu=ShRM(this,97,152,'',1)>消费税</a></td>
		  </tr>
				<tr>
			<td id="pr153" class="file" onclick=""><a onclick=tourl(97,153) onmouseout=chft(this,0,153) onmouseover=chft(this,1,153) oncontextmenu=ShRM(this,97,153,'',1)>财产税</a></td>
		  </tr>
				<tr>
			<td id="pr154" class="file1" onclick=""><a onclick=tourl(97,154) onmouseout=chft(this,0,154) onmouseover=chft(this,1,154) oncontextmenu=ShRM(this,97,154,'',1)>税务登记</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr98" class="menu1" onclick="chengstate('98')"><a onmouseout=chft(this,0,98) onmouseover=chft(this,1,98) oncontextmenu=ShRM(this,86,98,'',0)>婚姻</a></td>
		  </tr>
				  <tr id="item98" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr155" class="file" onclick=""><a onclick=tourl(98,155) onmouseout=chft(this,0,155) onmouseover=chft(this,1,155) oncontextmenu=ShRM(this,98,155,'',1)>国内婚姻</a></td>
		  </tr>
				<tr>
			<td id="pr156" class="file1" onclick=""><a onclick=tourl(98,156) onmouseout=chft(this,0,156) onmouseover=chft(this,1,156) oncontextmenu=ShRM(this,98,156,'',1)>涉外婚姻</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr99" class="menu1" onclick="chengstate('99')"><a onmouseout=chft(this,0,99) onmouseover=chft(this,1,99) oncontextmenu=ShRM(this,86,99,'',0)>就业</a></td>
		  </tr>
				  <tr id="item99" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr157" class="file" onclick=""><a onclick=tourl(99,157) onmouseout=chft(this,0,157) onmouseover=chft(this,1,157) oncontextmenu=ShRM(this,99,157,'',1)>求职招聘</a></td>
		  </tr>
				<tr>
			<td id="pr158" class="file1" onclick=""><a onclick=tourl(99,158) onmouseout=chft(this,0,158) onmouseover=chft(this,1,158) oncontextmenu=ShRM(this,99,158,'',1)>就业管理</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr100" class="menu1" onclick="chengstate('100')"><a onmouseout=chft(this,0,100) onmouseover=chft(this,1,100) oncontextmenu=ShRM(this,86,100,'',0)>兵役</a></td>
		  </tr>
				  <tr id="item100" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr161" class="file" onclick=""><a onclick=tourl(100,161) onmouseout=chft(this,0,161) onmouseover=chft(this,1,161) oncontextmenu=ShRM(this,100,161,'',1)>退伍转业</a></td>
		  </tr>
				<tr>
			<td id="pr162" class="file1" onclick=""><a onclick=tourl(100,162) onmouseout=chft(this,0,162) onmouseover=chft(this,1,162) oncontextmenu=ShRM(this,100,162,'',1)>伤残烈抚恤</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr101" class="menu1" onclick="chengstate('101')"><a onmouseout=chft(this,0,101) onmouseover=chft(this,1,101) oncontextmenu=ShRM(this,86,101,'',0)>文化</a></td>
		  </tr>
				  <tr id="item101" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr163" class="file1" onclick=""><a onclick=tourl(101,163) onmouseout=chft(this,0,163) onmouseover=chft(this,1,163) oncontextmenu=ShRM(this,101,163,'',1)>文化活动</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr102" class="menu3" onclick="chengstate('102')"><a onmouseout=chft(this,0,102) onmouseover=chft(this,1,102) oncontextmenu=ShRM(this,86,102,'',0)>教育</a></td>
		  </tr>
				  <tr id="item102" style="display:none">
			<td class="list1">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr165" class="file" onclick=""><a onclick=tourl(102,165) onmouseout=chft(this,0,165) onmouseover=chft(this,1,165) oncontextmenu=ShRM(this,102,165,'',1)>基础教育</a></td>
		  </tr>
				<tr>
			<td id="pr167" class="file" onclick=""><a onclick=tourl(102,167) onmouseout=chft(this,0,167) onmouseover=chft(this,1,167) oncontextmenu=ShRM(this,102,167,'',1)>职业教育</a></td>
		  </tr>
				<tr>
			<td id="pr168" class="file" onclick=""><a onclick=tourl(102,168) onmouseout=chft(this,0,168) onmouseover=chft(this,1,168) oncontextmenu=ShRM(this,102,168,'',1)>成人教育</a></td>
		  </tr>
				<tr>
			<td id="pr169" class="file1" onclick=""><a onclick=tourl(102,169) onmouseout=chft(this,0,169) onmouseover=chft(this,1,169) oncontextmenu=ShRM(this,102,169,'',1)>出国留学</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr171" class="menu1" onclick="chengstate('171')"><a onmouseout=chft(this,0,171) onmouseover=chft(this,1,171) oncontextmenu=ShRM(this,0,171,'',0)>服务企业</a></td>
		  </tr>
				  <tr id="item171" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr172" class="menu1" onclick="chengstate('172')"><a onmouseout=chft(this,0,172) onmouseover=chft(this,1,172) oncontextmenu=ShRM(this,171,172,'',0)>准营准办</a></td>
		  </tr>
				  <tr id="item172" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr186" class="file" onclick=""><a onclick=tourl(172,186) onmouseout=chft(this,0,186) onmouseover=chft(this,1,186) oncontextmenu=ShRM(this,172,186,'',1)>行业准营</a></td>
		  </tr>
				<tr>
			<td id="pr187" class="file1" onclick=""><a onclick=tourl(172,187) onmouseout=chft(this,0,187) onmouseover=chft(this,1,187) oncontextmenu=ShRM(this,172,187,'',1)>服务活动许可</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr173" class="menu1" onclick="chengstate('173')"><a onmouseout=chft(this,0,173) onmouseover=chft(this,1,173) oncontextmenu=ShRM(this,171,173,'',0)>财务税务</a></td>
		  </tr>
				  <tr id="item173" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr190" class="file" onclick=""><a onclick=tourl(173,190) onmouseout=chft(this,0,190) onmouseover=chft(this,1,190) oncontextmenu=ShRM(this,173,190,'',1)>财务</a></td>
		  </tr>
				<tr>
			<td id="pr191" class="file" onclick=""><a onclick=tourl(173,191) onmouseout=chft(this,0,191) onmouseover=chft(this,1,191) oncontextmenu=ShRM(this,173,191,'',1)>税务</a></td>
		  </tr>
				<tr>
			<td id="pr192" class="file1" onclick=""><a onclick=tourl(173,192) onmouseout=chft(this,0,192) onmouseover=chft(this,1,192) oncontextmenu=ShRM(this,173,192,'',1)>审计</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr174" class="menu1" onclick="chengstate('174')"><a onmouseout=chft(this,0,174) onmouseover=chft(this,1,174) oncontextmenu=ShRM(this,171,174,'',0)>土地房产</a></td>
		  </tr>
				  <tr id="item174" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr193" class="file" onclick=""><a onclick=tourl(174,193) onmouseout=chft(this,0,193) onmouseover=chft(this,1,193) oncontextmenu=ShRM(this,174,193,'',1)>土地管理</a></td>
		  </tr>
				<tr>
			<td id="pr194" class="file" onclick=""><a onclick=tourl(174,194) onmouseout=chft(this,0,194) onmouseover=chft(this,1,194) oncontextmenu=ShRM(this,174,194,'',1)>房产管理</a></td>
		  </tr>
				<tr>
			<td id="pr195" class="file1" onclick=""><a onclick=tourl(174,195) onmouseout=chft(this,0,195) onmouseover=chft(this,1,195) oncontextmenu=ShRM(this,174,195,'',1)>矿产资源</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr175" class="menu1" onclick="chengstate('175')"><a onmouseout=chft(this,0,175) onmouseover=chft(this,1,175) oncontextmenu=ShRM(this,171,175,'',0)>建设管理</a></td>
		  </tr>
				  <tr id="item175" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr196" class="file" onclick=""><a onclick=tourl(175,196) onmouseout=chft(this,0,196) onmouseover=chft(this,1,196) oncontextmenu=ShRM(this,175,196,'',1)>建筑工程</a></td>
		  </tr>
				<tr>
			<td id="pr198" class="file" onclick=""><a onclick=tourl(175,198) onmouseout=chft(this,0,198) onmouseover=chft(this,1,198) oncontextmenu=ShRM(this,175,198,'',1)>市政工程</a></td>
		  </tr>
				<tr>
			<td id="pr200" class="file" onclick=""><a onclick=tourl(175,200) onmouseout=chft(this,0,200) onmouseover=chft(this,1,200) oncontextmenu=ShRM(this,175,200,'',1)>水利工程</a></td>
		  </tr>
				<tr>
			<td id="pr202" class="file1" onclick=""><a onclick=tourl(175,202) onmouseout=chft(this,0,202) onmouseover=chft(this,1,202) oncontextmenu=ShRM(this,175,202,'',1)>其他</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr176" class="menu1" onclick="chengstate('176')"><a onmouseout=chft(this,0,176) onmouseover=chft(this,1,176) oncontextmenu=ShRM(this,171,176,'',0)>环保绿化</a></td>
		  </tr>
				  <tr id="item176" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr203" class="file" onclick=""><a onclick=tourl(176,203) onmouseout=chft(this,0,203) onmouseover=chft(this,1,203) oncontextmenu=ShRM(this,176,203,'',1)>排污</a></td>
		  </tr>
				<tr>
			<td id="pr204" class="file" onclick=""><a onclick=tourl(176,204) onmouseout=chft(this,0,204) onmouseover=chft(this,1,204) oncontextmenu=ShRM(this,176,204,'',1)>危险废物</a></td>
		  </tr>
				<tr>
			<td id="pr205" class="file" onclick=""><a onclick=tourl(176,205) onmouseout=chft(this,0,205) onmouseover=chft(this,1,205) oncontextmenu=ShRM(this,176,205,'',1)>环境治理</a></td>
		  </tr>
				<tr>
			<td id="pr208" class="file1" onclick=""><a onclick=tourl(176,208) onmouseout=chft(this,0,208) onmouseover=chft(this,1,208) oncontextmenu=ShRM(this,176,208,'',1)>其他</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr177" class="menu1" onclick="chengstate('177')"><a onmouseout=chft(this,0,177) onmouseover=chft(this,1,177) oncontextmenu=ShRM(this,171,177,'',0)>安全防护</a></td>
		  </tr>
				  <tr id="item177" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr209" class="file" onclick=""><a onclick=tourl(177,209) onmouseout=chft(this,0,209) onmouseover=chft(this,1,209) oncontextmenu=ShRM(this,177,209,'',1)>消防安全</a></td>
		  </tr>
				<tr>
			<td id="pr210" class="file" onclick=""><a onclick=tourl(177,210) onmouseout=chft(this,0,210) onmouseover=chft(this,1,210) oncontextmenu=ShRM(this,177,210,'',1)>爆炸物及其企业</a></td>
		  </tr>
				<tr>
			<td id="pr211" class="file" onclick=""><a onclick=tourl(177,211) onmouseout=chft(this,0,211) onmouseover=chft(this,1,211) oncontextmenu=ShRM(this,177,211,'',1)>化学品及其企业</a></td>
		  </tr>
				<tr>
			<td id="pr212" class="file" onclick=""><a onclick=tourl(177,212) onmouseout=chft(this,0,212) onmouseover=chft(this,1,212) oncontextmenu=ShRM(this,177,212,'',1)>安全生产</a></td>
		  </tr>
				<tr>
			<td id="pr213" class="file1" onclick=""><a onclick=tourl(177,213) onmouseout=chft(this,0,213) onmouseover=chft(this,1,213) oncontextmenu=ShRM(this,177,213,'',1)>其他</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr178" class="menu1" onclick="chengstate('178')"><a onmouseout=chft(this,0,178) onmouseover=chft(this,1,178) oncontextmenu=ShRM(this,171,178,'',0)>质量卫生</a></td>
		  </tr>
				  <tr id="item178" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr214" class="file" onclick=""><a onclick=tourl(178,214) onmouseout=chft(this,0,214) onmouseover=chft(this,1,214) oncontextmenu=ShRM(this,178,214,'',1)>质量检查</a></td>
		  </tr>
				<tr>
			<td id="pr215" class="file" onclick=""><a onclick=tourl(178,215) onmouseout=chft(this,0,215) onmouseover=chft(this,1,215) oncontextmenu=ShRM(this,178,215,'',1)>检验检疫</a></td>
		  </tr>
				<tr>
			<td id="pr216" class="file" onclick=""><a onclick=tourl(178,216) onmouseout=chft(this,0,216) onmouseover=chft(this,1,216) oncontextmenu=ShRM(this,178,216,'',1)>食品药品安全</a></td>
		  </tr>
				<tr>
			<td id="pr217" class="file1" onclick=""><a onclick=tourl(178,217) onmouseout=chft(this,0,217) onmouseover=chft(this,1,217) oncontextmenu=ShRM(this,178,217,'',1)>其他</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr179" class="menu1" onclick="chengstate('179')"><a onmouseout=chft(this,0,179) onmouseover=chft(this,1,179) oncontextmenu=ShRM(this,171,179,'',0)>商务活动</a></td>
		  </tr>
				  <tr id="item179" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr218" class="file" onclick=""><a onclick=tourl(179,218) onmouseout=chft(this,0,218) onmouseover=chft(this,1,218) oncontextmenu=ShRM(this,179,218,'',1)>商标管理</a></td>
		  </tr>
				<tr>
			<td id="pr219" class="file" onclick=""><a onclick=tourl(179,219) onmouseout=chft(this,0,219) onmouseover=chft(this,1,219) oncontextmenu=ShRM(this,179,219,'',1)>合同管理</a></td>
		  </tr>
				<tr>
			<td id="pr220" class="file1" onclick=""><a onclick=tourl(179,220) onmouseout=chft(this,0,220) onmouseover=chft(this,1,220) oncontextmenu=ShRM(this,179,220,'',1)>广告管理</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr180" class="menu1" onclick="chengstate('180')"><a onmouseout=chft(this,0,180) onmouseover=chft(this,1,180) oncontextmenu=ShRM(this,171,180,'',0)>物流采购</a></td>
		  </tr>
				  <tr id="item180" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr221" class="file" onclick=""><a onclick=tourl(180,221) onmouseout=chft(this,0,221) onmouseover=chft(this,1,221) oncontextmenu=ShRM(this,180,221,'',1)>车船管理</a></td>
		  </tr>
				<tr>
			<td id="pr222" class="file" onclick=""><a onclick=tourl(180,222) onmouseout=chft(this,0,222) onmouseover=chft(this,1,222) oncontextmenu=ShRM(this,180,222,'',1)>交通运输</a></td>
		  </tr>
				<tr>
			<td id="pr223" class="file1" onclick=""><a onclick=tourl(180,223) onmouseout=chft(this,0,223) onmouseover=chft(this,1,223) oncontextmenu=ShRM(this,180,223,'',1)>物流</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr181" class="menu1" onclick="chengstate('181')"><a onmouseout=chft(this,0,181) onmouseover=chft(this,1,181) oncontextmenu=ShRM(this,171,181,'',0)>专利版权</a></td>
		  </tr>
				  <tr id="item181" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr225" class="file" onclick=""><a onclick=tourl(181,225) onmouseout=chft(this,0,225) onmouseover=chft(this,1,225) oncontextmenu=ShRM(this,181,225,'',1)>专利申请</a></td>
		  </tr>
				<tr>
			<td id="pr226" class="file" onclick=""><a onclick=tourl(181,226) onmouseout=chft(this,0,226) onmouseover=chft(this,1,226) oncontextmenu=ShRM(this,181,226,'',1)>产权纠纷</a></td>
		  </tr>
				<tr>
			<td id="pr228" class="file1" onclick=""><a onclick=tourl(181,228) onmouseout=chft(this,0,228) onmouseover=chft(this,1,228) oncontextmenu=ShRM(this,181,228,'',1)>科技项目</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr182" class="menu1" onclick="chengstate('182')"><a onmouseout=chft(this,0,182) onmouseover=chft(this,1,182) oncontextmenu=ShRM(this,171,182,'',0)>投资融资</a></td>
		  </tr>
				  <tr id="item182" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr231" class="file1" onclick=""><a onclick=tourl(182,231) onmouseout=chft(this,0,231) onmouseover=chft(this,1,231) oncontextmenu=ShRM(this,182,231,'',1)>投资融资</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr183" class="menu1" onclick="chengstate('183')"><a onmouseout=chft(this,0,183) onmouseover=chft(this,1,183) oncontextmenu=ShRM(this,171,183,'',0)>对外交流</a></td>
		  </tr>
				  <tr id="item183" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr232" class="file" onclick=""><a onclick=tourl(183,232) onmouseout=chft(this,0,232) onmouseover=chft(this,1,232) oncontextmenu=ShRM(this,183,232,'',1)>进口出口</a></td>
		  </tr>
				<tr>
			<td id="pr233" class="file1" onclick=""><a onclick=tourl(183,233) onmouseout=chft(this,0,233) onmouseover=chft(this,1,233) oncontextmenu=ShRM(this,183,233,'',1)>加工贸易</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr184" class="menu1" onclick="chengstate('184')"><a onmouseout=chft(this,0,184) onmouseover=chft(this,1,184) oncontextmenu=ShRM(this,171,184,'',0)>年审年检</a></td>
		  </tr>
				  <tr id="item184" style="display:none">
			<td class="list">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr237" class="file1" onclick=""><a onclick=tourl(184,237) onmouseout=chft(this,0,237) onmouseover=chft(this,1,237) oncontextmenu=ShRM(this,184,237,'',1)>年审年检</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr185" class="menu3" onclick="chengstate('185')"><a onmouseout=chft(this,0,185) onmouseover=chft(this,1,185) oncontextmenu=ShRM(this,171,185,'',0)>设立变更</a></td>
		  </tr>
				  <tr id="item185" style="display:none">
			<td class="list1">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr238" class="file" onclick=""><a onclick=tourl(185,238) onmouseout=chft(this,0,238) onmouseover=chft(this,1,238) oncontextmenu=ShRM(this,185,238,'',1)>登记</a></td>
		  </tr>
				<tr>
			<td id="pr239" class="file" onclick=""><a onclick=tourl(185,239) onmouseout=chft(this,0,239) onmouseover=chft(this,1,239) oncontextmenu=ShRM(this,185,239,'',1)>变更</a></td>
		  </tr>
				<tr>
			<td id="pr240" class="file" onclick=""><a onclick=tourl(185,240) onmouseout=chft(this,0,240) onmouseover=chft(this,1,240) oncontextmenu=ShRM(this,185,240,'',1)>注销</a></td>
		  </tr>
				<tr>
			<td id="pr241" class="file1" onclick=""><a onclick=tourl(185,241) onmouseout=chft(this,0,241) onmouseover=chft(this,1,241) oncontextmenu=ShRM(this,185,241,'',1)>备案</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
			</table>
				</td>
		 </tr>	
				<tr>
			<td id="pr242" class="menu3" onclick="chengstate('242')"><a onmouseout=chft(this,0,242) onmouseover=chft(this,1,242) oncontextmenu=ShRM(this,0,242,'',0)>服务旅游者</a></td>
		  </tr>
				  <tr id="item242" style="display:none">
			<td class="list1">
				<table border=0 cellspacing=0 cellpadding=0>
			<tr>
			<td id="pr243" class="file" onclick=""><a onclick=tourl(242,243) onmouseout=chft(this,0,243) onmouseover=chft(this,1,243) oncontextmenu=ShRM(this,242,243,'',1)>旅游资源</a></td>
		  </tr>
				<tr>
			<td id="pr244" class="file" onclick=""><a onclick=tourl(242,244) onmouseout=chft(this,0,244) onmouseover=chft(this,1,244) oncontextmenu=ShRM(this,242,244,'',1)>旅游规划</a></td>
		  </tr>
				<tr>
			<td id="pr245" class="file" onclick=""><a onclick=tourl(242,245) onmouseout=chft(this,0,245) onmouseover=chft(this,1,245) oncontextmenu=ShRM(this,242,245,'',1)>旅游景点</a></td>
		  </tr>
				<tr>
			<td id="pr246" class="file" onclick=""><a onclick=tourl(242,246) onmouseout=chft(this,0,246) onmouseover=chft(this,1,246) oncontextmenu=ShRM(this,242,246,'',1)>旅游管理</a></td>
		  </tr>
				<tr>
			<td id="pr247" class="file" onclick=""><a onclick=tourl(242,247) onmouseout=chft(this,0,247) onmouseover=chft(this,1,247) oncontextmenu=ShRM(this,242,247,'',1)>旅游经济</a></td>
		  </tr>
				<tr>
			<td id="pr248" class="file" onclick=""><a onclick=tourl(242,248) onmouseout=chft(this,0,248) onmouseover=chft(this,1,248) oncontextmenu=ShRM(this,242,248,'',1)>旅游保险</a></td>
		  </tr>
				<tr>
			<td id="pr249" class="file1" onclick=""><a onclick=tourl(242,249) onmouseout=chft(this,0,249) onmouseover=chft(this,1,249) oncontextmenu=ShRM(this,242,249,'',1)>特色美食</a></td>
		  </tr>
			</table>
				</td>
		 </tr>	
			</table>
	</body>
</html>
