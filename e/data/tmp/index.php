<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="utf-8">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB2312" />
<meta http-equiv="Content-Language" content="utf-8" />
<meta content="all" name="robots" />
<meta name="author" content=" " />
<meta name="keywords" content="嘉鱼,嘉鱼县,嘉鱼政务网,嘉鱼县政务网,嘉鱼政府网站,嘉鱼县政府网站,嘉鱼县政府门户网站,嘉鱼县人民政府门户网站,www.jiayu.gov.cn" />
<meta name="description" content="嘉鱼县人民政府门户网站" />
<meta name="keywords" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>嘉鱼县人民政府门户网站</title>
<!-- 调用样式表 -->
<link href="http://www.jiayu.gov.cn/skin/jy/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="http://www.jiayu.gov.cn/skin/jy/effect.js"></script>
<script language="javascript">
//Cookie日期修正函数 function FixCookieDate(date)
function FixCookieDate(date){
	var base = new Date(0);
	var skew = base.getTime();
	if (skew > 0)date.setTime(date.getTime() - skew);
}

//设置Cookie函数 function SetCookie(name,value,expires,path,domain,secure)
function SetCookie(name,value,expires,path,domain,secure){
	document.cookie = name + "=" + escape(value) + ((expires)? "; expires=" + expires.toGMTString() : "") + ((path) ? "; path=" + path : "") + ((domain) ? "; domain=" + domain : "") + ((secure) ? "; secure" : "");
}
	//设置Cookie相应名值对中值的函数 function getCookieVal(offset)
	function getCookieVal(offset) {
		var endstr = document.cookie.indexOf(";",offset);
		if (endstr == -1) endstr = document.cookie.length;
		return unescape(document.cookie.substring(offset,endstr));
	}

	//设置Cookie函数 function GetCookie(name)
	function GetCookie(name){
		var arg = name + '=';
		var alen = arg.length;
		var clen = document.cookie.length;
		var i = 0;
		var flag = ''
		while (i<clen) {
			var j = i + alen;
			if (document.cookie.substring(i,j) == arg) flag = getCookieVal(j);
			i = document.cookie.indexOf(" ",i) + 1;
			if (i == 0) break;
		}
		return flag;
	}
function myCustomize(city)
{
	if(city == "#")
	{
		alert("请选择城市");
		return false;
	}

	var expdate = new Date();
		FixCookieDate(expdate);//修正MAC机器的BUG
		expdate.setTime(expdate.getTime() + (1000*60*60*24*365));//设置Cookie的有效期为1年
//		SetCookie('PEOPLE_CUSTOMIZE_city',city,expdate,'/');
SetCookie('PEOPLE_CUSTOMIZE_city',city,expdate,'/','http://www.jiayu.gov.cn/');

	document.getElementById("weathercustomize").src="http://www.jiayu.gov.cn/";
	//location.reload();
}
</script>
<!--检索-->
<script src="http://www.jiayu.gov.cn/skin/jy/css/cpcsearch.js"></script>
</head>
<body>
<body onload='e=new Selecter2("t_select_list3");'>
<div class="center bor">
<div class="top">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="26"><img src="http://www.jiayu.gov.cn/skin/jy/images/top01.gif" width="26" height="25" /></td>
<td width="48">县　委</td>
<td width="26"><img src="http://www.jiayu.gov.cn/skin/jy/images/top02.gif" width="26" height="25" /></td>
<td width="48">县人大</td>
<td width="26"><img src="http://www.jiayu.gov.cn/skin/jy/images/top02.gif" width="26" height="25" /></td>
<td width="48">县政府</td>
<td width="26"><img src="http://www.jiayu.gov.cn/skin/jy/images/top03.gif" width="26" height="25" /></td>
<td width="49">县政协</td>
<td width="294">&nbsp;</td>
<td width="389" align="right">
<a href="" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.jiayu.gov.cn');" rel="nofollow">设为首页</a> |
<a href="javascript:window.external.AddFavorite('http://www.jiayu.gov.cn','嘉鱼政务网')" rel="nofollow">加入收藏</a> | 
<a href="http://www.jiayu.gov.cn/">返回首页</a>&nbsp;</td>
</tr>
</table>
</div>
<div class="banner">
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="980" height="200">
      <param name="movie" value="http://www.jiayu.gov.cn/skin/jy/images/banner.swf"/>
      <param name="quality" value="high" />
      <embed src="http://www.jiayu.gov.cn/skin/jy/images/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="980" height="200"></embed>
    </object>
</div>

<style>

/*对点击下栏显示边框的代码进行美化*/
div.hackBox{display:none;height:25px;background-color:#fff;}
div.hackBox a{color:#000000; font-size:12px;}

</style>
<script>

function switchTab(cardBar,cardId){


    document.getElementById(cardId).className="Selected";
    //读出cardContent 下面的所有div标签
    var dvs=document.getElementById("cardContent").getElementsByTagName("div");
    //循环，判断应该显示的div
    for (i=0;i<dvs.length;i++ ){
        if (dvs[i].id==("D"+cardId)){
            dvs[i].style.display="block";
        }else{
            dvs[i].style.display="none";
        }
    }
}
</script>

<table width="980" height="35" id="cardBar" class="nav">
<tr>
    <td width="80" id="card0" align="center"><a href="http://www.jiayu.gov.cn/" onMouseOver="javascript:switchTab('cardBar','card0');">首页</a></td>
    <td width="100" id="card1" align="center"><a href="http://www.jiayu.gov.cn/jiayuxianqing/"  onMouseOver="javascript:switchTab('cardBar','card1');">嘉鱼县情</a></td>
    <td width="100" id="card2" align="center"><a href="http://www.jiayu.gov.cn/jiayuzhengwu/"  onMouseOver="javascript:switchTab('cardBar','card2');">嘉鱼政务</a></td>
    <td width="100" id="card3" align="center"><a href="http://www.jiayu.gov.cn/dangwugongkai/"  onMouseOver="javascript:switchTab('cardBar','card3');">党务公开</a></td>
    <td width="100" id="card4" align="center"><a href="http://www.jiayu.gov.cn/zhaoshangyinzi/"  onMouseOver="javascript:switchTab('cardBar','card4');">招商引资</a></td>
    <td width="100" id="card5" align="center"><a href="http://www.jiayu.gov.cn/fuwulvyouzhe/"  onMouseOver="javascript:switchTab('cardBar','card5');">游在嘉鱼</a></td>
    <td width="100" id="card6" align="center"><a href="http://219.138.168.126:8082/"  onMouseOver="javascript:switchTab('cardBar','card6');" target="_blank">纪委举报网</a></td>
    <td width="100" id="card7" align="center"><a href="http://www.jiayu.gov.cn/bbs/"  onMouseOver="javascript:switchTab('cardBar','card7');" target="_blank">政务贴吧</a></td>
     <td width="200"></td>
  </tr>
</table>

<table width="980" id="cardContent">
  <tr>
  <td align="center">
<div id="Dcard1" class="hackBox">
		| <a href="http://www.jiayu.gov.cn/jiayuxianqing/jiayugailan/">嘉鱼概览</a> |
		<a href="http://www.jiayu.gov.cn/jiayuxianqing/xianyujingji/">县域经济</a> |
		<a href="http://www.jiayu.gov.cn/jiayuxianqing/jiayuwenhua/">嘉鱼文化</a> |
		</div>
 
<div id="Dcard2" class="hackBox">
		| <a href="http://www.jiayu.gov.cn/jiayuzhengwu/lingdaoxinxi/">领导信息</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/zuzhijigou/">组织机构</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/lingdaojianghua/">领导讲话</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/zhengwudongtai/">政务动态</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/zhengfuwenjian/">政府文件</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/zhengfugonggao/">政府公告</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/zhengfugongzuobaogao/">政府工作报告</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/xinxigongkaizhinan/">信息公开指南</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/xinxigongkaimulu/">信息公开目录</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/xinxigongkaishenqing/">信息公开申请 </a> |
		</div>
<div id="Dcard3" class="hackBox">
		| <a href="http://www.jiayu.gov.cn/dangwugongkai/jibenqingkuang/">基本情况</a> |
		<a href="http://www.jiayu.gov.cn/dangwugongkai/xianweigongzuo/">县委工作</a> |
		<a href="http://www.jiayu.gov.cn/dangwugongkai/gongzuodongtai/">工作动态</a> |
		<a href="http://www.jiayu.gov.cn/dangwugongkai/jicengdangwu/">基层党务</a> |
		<a href="http://www.jiayu.gov.cn/dangwugongkai/lianzhengwenhua/">廉政文化</a> |
		<a href="http://www.jiayu.gov.cn/bbs/index.asp?boardid=6">建言献策</a> |
		</div>
<div id="Dcard4" class="hackBox">
		| <a href="http://www.jiayu.gov.cn/zhaoshangyinzi/zhaoshangdongtai/">招商动态</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/touzichengben/">投资成本</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/zhaoshangxiangmu/">招商项目</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/zhaoshangfuwu/">招商服务</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/touzihuanjing/">投资环境</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/touzizhengce/">投资政策</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/yuanqujianshe/">园区建设</a> |		
		</div>
<div id="Dcard5" class="hackBox">
		| <a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyouziyuan/">旅游资源</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyouguihua/">旅游规划</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyoujingdian/">旅游景点</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyouguanli/">旅游管理</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyoujingji/">旅游经济</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyoubaoxian/">旅游保险</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/tesemeishi/">特色美食</a> |	
                             </div> 
 </td>
  </tr>
</table>


<table height="37" border=0 cellpadding=3 cellspacing=1 style="background:url(http://www.jiayu.gov.cn/skin/jy/images/index_016_2.jpg) no-repeat;">
<tr width="980">
<td width="400" align="right">
<script>  
  var   CalendarData=new   Array(20);  
  var   madd=new   Array(12);  
  var   TheDate=new   Date();  
  var   tgString="甲乙丙丁戊己庚辛壬癸";  
  var   dzString="子丑寅卯辰巳午未申酉戌亥";  
  var   numString="一二三四五六七八九十";  
  var   monString="正二三四五六七八九十冬腊";  
  var   weekString="日一二三四五六";  
  var   sx="鼠牛虎兔龙蛇马羊猴鸡狗猪";  
  var   cYear;  
  var   cMonth;  
  var   cDay;  
  var   cHour;  
  var   cDateString;  
  var   DateString;  
  var   Browser=navigator.appName;  
   
  function   init()  
  {    
      CalendarData[0]=0x41A95;  
      CalendarData[1]=0xD4A;  
      CalendarData[2]=0xDA5;  
      CalendarData[3]=0x20B55;  
      CalendarData[4]=0x56A;  
      CalendarData[5]=0x7155B;  
      CalendarData[6]=0x25D;  
      CalendarData[7]=0x92D;  
      CalendarData[8]=0x5192B;  
      CalendarData[9]=0xA95;  
      CalendarData[10]=0xB4A;  
      CalendarData[11]=0x416AA;  
      CalendarData[12]=0xAD5;  
      CalendarData[13]=0x90AB5;  
      CalendarData[14]=0x4BA;  
      CalendarData[15]=0xA5B;  
      CalendarData[16]=0x60A57;  
      CalendarData[17]=0x52B;  
      CalendarData[18]=0xA93;  
      CalendarData[19]=0x40E95;  
      madd[0]=0;  
      madd[1]=31;  
      madd[2]=59;  
      madd[3]=90;  
      madd[4]=120;  
      madd[5]=151;  
      madd[6]=181;  
      madd[7]=212;  
      madd[8]=243;  
      madd[9]=273;  
      madd[10]=304;  
      madd[11]=334;  
    }  
   
  function   GetBit(m,n)  
  {    
        return   (m>>n)&1;  
  }  
   
  function   e2c()  
  {      
      var   total,m,n,k;  
      var   isEnd=false;  
      var   tmp=TheDate.getYear();  
      if   (tmp<1900)     tmp+=1900;  
      total=(tmp-2001)*365  
          +Math.floor((tmp-2001)/4)  
          +madd[TheDate.getMonth()]  
          +TheDate.getDate()  
          -23;  
      if   (TheDate.getYear()%4==0&&TheDate.getMonth()>1)  
          total++;  
      for(m=0;;m++)  
      {      
          k=(CalendarData[m]<0xfff)?11:12;  
          for(n=k;n>=0;n--)  
          {  
              if(total<=29+GetBit(CalendarData[m],n))  
              {    
                  isEnd=true;  
                  break;  
              }  
              total=total-29-GetBit(CalendarData[m],n);  
          }  
          if(isEnd)break;  
      }  
      cYear=2001   +   m;  
      cMonth=k-n+1;  
      cDay=total;  
      if(k==12)  
      {  
          if(cMonth==Math.floor(CalendarData[m]/0x10000)+1)  
              cMonth=1-cMonth;  
          if(cMonth>Math.floor(CalendarData[m]/0x10000)+1)  
              cMonth--;  
      }  
      cHour=Math.floor((TheDate.getHours()+3)/2);  
  }  
   
  function   GetcDateString()  
  {   var   tmp="";  
      tmp+=tgString.charAt((cYear-4)%10);       //年干  
      tmp+=dzString.charAt((cYear-4)%12);       //年支  
      tmp+="年(";  
      tmp+=sx.charAt((cYear-4)%12);  
      tmp+=")   ";  
      if(cMonth<1)  
      {    
        tmp+="闰";  
          tmp+=monString.charAt(-cMonth-1);  
      }  
      else  
          tmp+=monString.charAt(cMonth-1);  
      tmp+="月";  
      tmp+=(cDay<11)?"初":((cDay<20)?"十":((cDay<30)?"廿":"卅"));  
      if(cDay%10!=0||cDay==10)  
          tmp+=numString.charAt((cDay-1)%10);  
      tmp+="    ";  
      if(cHour==13)tmp+="夜";  
          tmp+=dzString.charAt((cHour-1)%12);  
      tmp+="时";  
      cDateString=tmp;  
      return   tmp;  
  }  
   
  function   GetDateString()  
  {    
      var   tmp="";  
      var   t1=TheDate.getYear();  
      if   (t1<1900)t1+=1900;  
      tmp+=t1  
                +"年"  
                +(TheDate.getMonth()+1)+"月"  
                +TheDate.getDate()+"日   "  
                +TheDate.getHours()+":"  
                +((TheDate.getMinutes()<10)?"0":"")  
                +TheDate.getMinutes()
                +"   星期"+weekString.charAt(TheDate.getDay());    
      DateString=tmp;  
      return   tmp;  
  }  
   
  init();  
  e2c();  
  GetDateString();  
  GetcDateString();  
  document.write(DateString,"农历",cDateString);  
</script>

</td>

<td width="580">
<form name=search_js1 method=post action='http://www.jiayu.gov.cn/e/search/index.php' onsubmit='return search_check(document.search_js1);'>
<div align="right">
<select name=show><option value=title>
标题</option><option value=smalltext>
简介</option><option value=newstext>
内容</option><option value=writer>
作者</option><option value=title,smalltext,newstext,writer>
搜索全部</option></select><select name=classid><option value=0>
所有栏目</option>[!--class--]</select><input name=keyboard type=text size=13><input type=submit name=Submit value=搜索>
</div>
</form>
</td>
</tr>
</table>

<div class="one">

<div class="o_l">
<div class="o_l1">
<div class="o_l2">
<div class="o_l3"><a href="http://www.jiayu.gov.cn/jiayuzhengwu/lingdaoxinxi/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/ldxx.gif" width="144" height="60" border="0"></a></div>
<div class="o_l3"><a href="http://www.jiayu.gov.cn/jiayuzhengwu/zuzhijigou/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/zfjg.gif" width="144" height="60" border="0"></a></div>
<div class="o_l3"><a href="http://www.jiayu.gov.cn/jiayuzhengwu/lingdaojianghua/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/ldjh.gif" width="144" height="60" border="0"></a></div>
</div>
</div>

<div class="o_l1">
<div class="o_l4">
<div class="o_l1_tit"><img src="http://www.jiayu.gov.cn/skin/jy/images/xxgk.gif" width="143" height="35"></a></div>
<div class="o_l5"><a href="http://www.jiayu.gov.cn/jiayuzhengwu/xinxigongkaizhinan/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/xxgkzn.gif" width="135" height="40" border="0"></a></div>
<div class="o_l5"><a href="http://www.jiayu.gov.cn/jiayuzhengwu/xinxigongkaimulu/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/xxgkml.gif" width="135" height="40" border="0"></a></div>
<div class="o_l5"><a href="http://www.jiayu.gov.cn/jiayuzhengwu/xinxigongkaishenqing/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/xxgksq.gif" width="135" height="40" border="0"></a></div>
</div>
</div>
</div>

<div class="o_c1">
<div class="o_flash">
<? @sys_FlashPixpic("6,302",5,310,198,1,45,0,0,'','newstime DESC');?></div>

<div class="o_c0">
<div class="o_c0_tit"><img src="http://www.jiayu.gov.cn/skin/jy/images/zhengwu.gif" width="308" height="35"></a></div>
<div class="o_c1_tit">
<div class="o_c2_tit"><span><a href="http://www.jiayu.gov.cn/jiayuzhengwu/zhengfugonggao/" target="_blank">政府公告</a></span></div>
<div class="o_c2_tit"><span><a href="http://www.jiayu.gov.cn/jiayuzhengwu/zhengfugongzuobaogao/" target="_blank">政府工作报告</a></span></div>
<div class="o_c2_tit"><span><a href="http://www.hbcz.gov.cn/421221/ " target="_blank">政府采购</a></span></div>
<div class="o_c2_tit"><span><a href="http://www.jyztb.com.cn/investM.asp.htm " target="_blank">招标投标</a></span></div>
</div>
</div>
</div>

<div class="o_c3">
<div>
<table width="305" height="85"><?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("6,302",1,12,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<tr><td><h1><a href='<?=$bqsr[titleurl]?>' target="_blank"><?=esub($bqr[title],60)?></a></h1></td><?php
}
?>
</tr></table></div>

<div>
<table width="305" height="135"><?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("6,302",5,0,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<tr>
<td width="270" align="left"><a href='<?=$bqsr[titleurl]?>' target=_blank><?=esub($bqr[title],42)?></a></td>
<td width="5" align="center">&nbsp;</td>
<td width="30" align="right"><?=date('m-d',$bqr[newstime])?></td>
<?php
}
?>
<tr></table></div>



<script language=javascript>
function nav_01(n) {
var menu = document.getElementById('nav_02_menu').getElementsByTagName('li');
var main = document.getElementById('nav_02_main').getElementsByTagName('li');
for (i = 0; i < menu.length; i++) {
menu[i].className = "sec3";
}
menu[n].className = "sec4";
for (i = 0; i < main.length; i++) {
main[i].style.display = "none";
}
main[n].style.display = "block";
}
</script>
<!--导航选项区域-->
<div>
<ul id="nav_02_menu">
<li onclick="nav_01(1)" class="sec4" >县委文件</li>
<li onclick="nav_01(0)" class="sec3" >政府文件</li>
</ul>
<!--//nav_menu-->
<ul id="nav_02_main">
<li class="block">
<table width="305" height="130"><?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(7,5,0,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<tr>
<td width="270" align="left"><a href='<?=$bqsr[titleurl]?>' target=_blank><?=esub($bqr[title],42)?></a></td>
<td width="5" align="center">&nbsp;</td>
<td width="30" align="right"><?=date('m-d',$bqr[newstime])?></td>
<?php
}
?>
<tr></table>
</li>
<li class="unblock">
 <table width="305" height="130"><?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(308,5,0,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<tr>
<td width="270" align="left"><a href='<?=$bqsr[titleurl]?>' target=_blank><?=esub($bqr[title],42)?></a></td>
<td width="5" align="center">&nbsp;</td>
<td width="30" align="right"><?=date('m-d',$bqr[newstime])?></td>
<?php
}
?>
<tr></table>
</li>
</ul>				
</div></div>






<div class="o_r">
<div class="o_r01">
<div class="o_r02">
<div class="o_r03"><a href="http://www.jiayu.gov.cn/jiayuxiansheqixingzhengshiyexingshoufeibiaozhunmulu/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/l1.gif" width="168" height="50" border="0"></a></div>
<div class="o_r03"><a href="http://www.jiayu.gov.cn/xingzhengshiyeshoufeimulujibiaozhun/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/l2.gif" width="168" height="50" border="0"></a></div>
<div class="o_r03"><a href="http://www.jiayu.gov.cn/jiayuxianxingzhengxukemulu/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/l3.gif" width="168" height="50" border="0"></a></div>
<div class="o_r03"><a href="http://www.jiayu.gov.cn/mail/E_LeadMail.asp" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/l4.gif" width="168" height="50" border="0"></a></div>
<div class="o_r03"><a href="http://www.jiayu.gov.cn/mail/E_LeadMail.asp" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/xianzhang_mail.gif" width="168" height="126" border="0"></a></div>
<div class="o_r03"><a href="http://gcjs.cnhubei.com/qszl/auto4170/auto4222/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/zt.jpg" width="168" height="48" border="0"></a></div>
</div>
</div>
</div>


<div class="two">
<div class="t_tit">
<a href="http://www.jiayu.gov.cn/dangwugongkai/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/dwgk.gif" width="138" height="33" /></a>
<a href="http://www.jiayu.gov.cn/dangwugongkai/jibenqingkuang/" target="_blank">基本情况</a> | 
<a href="http://www.jiayu.gov.cn/dangwugongkai/xianweigongzuo/" target="_blank">县委工作</a> |
<a href="http://www.jiayu.gov.cn/dangwugongkai/gongzuodongtai/" target="_blank">工作动态</a> |
<a href="http://www.jiayu.gov.cn/dangwugongkai/jicengdangwu/" target="_blank">基层党务</a> | 
<a href="http://www.jiayu.gov.cn/dangwugongkai/lianzhengwenhua/" target="_blank">廉政文化</a> | 
<a href="http://www.jiayu.gov.cn/bbs/index.asp?boardid=6" target="_blank">建言献策</a>
 </div>
 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(289,5,0,1);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?> 
<span><a href="<?=$bqsr[titleurl]?>" target="_blank"><img src="<?=$bqr[titlepic]?>" width="164" height="117" border="0" alt="<?=esub($bqr[title],55)?>"></a><p><a href="<?=$bqsr[titleurl]?>" target="_blank"><?=esub($bqr[title],55)?></a></p></span>
  <?php
}
?>
</div>



<div class="two">
<div class="t_tit">
<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/web_56.gif" width="138" height="33" /></a>
<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/zhaoshangdongtai/" target="_blank">招商动态</a> | 
<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/touzichengben/" target="_blank">投资成本</a> |
<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/zhaoshangxiangmu/" target="_blank">招商项目</a> | 
<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/zhaoshangfuwu/" target="_blank">招商服务</a> |
<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/touzihuanjing/" target="_blank">投资环境</a> | 
<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/touzizhengce/" target="_blank">投资政策</a> | 
<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/yuanqujianshe/" target="_blank">园区建设</a>
 </div>
 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(78,5,0,1);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?> 
<span><a href="<?=$bqsr[titleurl]?>" target="_blank"><img src="<?=$bqr[titlepic]?>" width="164" height="117" border="0" alt="<?=esub($bqr[title],55)?>"></a><p><a href="<?=$bqsr[titleurl]?>" target="_blank"><?=esub($bqr[title],55)?></a></p></span>
  <?php
}
?>
</div>

<div class="banner1"><img src="http://www.jiayu.gov.cn/skin/jy/images/ad.gif" width="960" height="170" border="0"></div>


<div class="four">
<div class="f_l1">

<div class="f_a1">
<div class="fa1_tit"><span><a href=" http://www.jiayu.gov.cn/fuwushimin/" target="_blank">服务市民</a></span><a href="http://www.jiayu.gov.cn/fuwushimin/" target="_blank">更多>></a></div>
<ul> | <a href="http://www.jiayu.gov.cn/fuwushimin/shengyushouyang/" target="_blank">生育收养</a> | <a href="http://www.jiayu.gov.cn/fuwushimin/yanglao/" target="_blank">养&nbsp;&nbsp;&nbsp;&nbsp;老</a> | 
<a href="http://www.jiayu.gov.cn/fuwushimin/gongansifa/" target="_blank">公安司法</a> | <a href="http://www.jiayu.gov.cn/fuwushimin/chujingrujing/" target="_blank">出境入境</a> | <br>
 | <a href="http://www.jiayu.gov.cn/fuwushimin/jiaotong/" target="_blank">交&nbsp;&nbsp;&nbsp;&nbsp;通</a> | <a href="http://www.jiayu.gov.cn/fuwushimin/zhengjianbanli/" target="_blank">证件办理</a> | <a href="http://www.jiayu.gov.cn/fuwushimin/huji/" target="_blank">户&nbsp;&nbsp;&nbsp;&nbsp;籍</a> | <a href="http://www.jiayu.gov.cn/fuwushimin/yiliao/" target="_blank">医&nbsp;&nbsp;&nbsp;&nbsp;疗</a> | <br> 
         | <a href="http://www.jiayu.gov.cn/fuwushimin/zhiyezige/" target="_blank">职业资格</a> | <a href="http://www.jiayu.gov.cn/fuwushimin/shehuibaozhang/" target="_blank">社会保障</a> | <a href="http://www.jiayu.gov.cn/fuwushimin/nashui/" target="_blank">纳&nbsp;&nbsp;&nbsp;&nbsp;税</a> | <a href="http://www.jiayu.gov.cn/fuwushimin/hunyin/" target="_blank">婚&nbsp;&nbsp;&nbsp;&nbsp;姻</a> |  <br>
         | <a href="http://www.jiayu.gov.cn/fuwushimin/jiuye/" target="_blank">就&nbsp;&nbsp;&nbsp;&nbsp;业</a> | <a href="http://www.jiayu.gov.cn/fuwushimin/bingyi/" target="_blank">兵&nbsp;&nbsp;&nbsp;&nbsp;役</a> | <a href="http://www.jiayu.gov.cn/fuwushimin/wenhua/" target="_blank">文&nbsp;&nbsp;&nbsp;&nbsp;化</a> | <a href="http://www.jiayu.gov.cn/fuwushimin/jiaoyu/" target="_blank">教&nbsp;&nbsp;&nbsp;&nbsp;育</a> | </ul> 
</div>

<div class="f_a2">
<div class="fa2_tit"><span><a href=" http://www.jiayu.gov.cn/zhaoshangyinzi/" target="_blank">服务投资者</a></span><a href="http://www.jiayu.gov.cn/zhaoshangyinzi/" target="_blank">更多>></a></div>
<ul>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(78,5,0,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>  
<li><img src="http://www.jiayu.gov.cn/skin/jy/images/t2.gif"> <a href='<?=$bqsr[titleurl]?>' target=_blank><?=esub($bqr[title],44)?></a></li>
<?php
}
?>
</ul>
</div>
</div>


<div class="f_l2">
<div class="f_a3">
<div class="fa3_tit"><span><a href="http://www.jiayu.gov.cn/fuwuqiye/ " target="_blank">服务企业</a></span><a href="http://www.jiayu.gov.cn/fuwuqiye/" target="_blank">更多>></a></div>
<ul><? @sys_ShowClassByTemp(171,21,0,0);?></ul></div>

<div class="f_a4">
<div class="fa4_tit"><span><a href=" http://www.jiayu.gov.cn/fuwulvyouzhe/" target="_blank">服务旅游者</a></span><a href="http://www.jiayu.gov.cn/fuwulvyouzhe/" target="_blank">更多>></a></div>
<ul>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(242,5,0,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>  
<li><img src="http://www.jiayu.gov.cn/skin/jy/images/t2.gif"> <a href='<?=$bqsr[titleurl]?>' target=_blank><?=esub($bqr[title],44)?></a></li>
<?php
}
?>
</ul>
</div>
</div>

<div class="f_l3">


<div class="f_a5"><a href="http://www.jiayu.gov.cn/baijianshishiwangshangban/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/bjsswsb.gif" width="300" height="140" align="center"></a>

</div>

<div class="f_a6">
<div class="fa6_tit"><span><a href="http://www.jiayu.gov.cn/bbs/ " target="_blank">公众互动</a></span></div>
<div align="center"><a href="http://www.jiayu.gov.cn/bbs/index.asp?boardid=8" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/bbs1.gif" width="200" height="33" ></a>
<a href="http://www.jiayu.gov.cn/bbs/index.asp?boardid=7" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/bbs2.gif" width="200" height="33" ></a>
<a href="http://www.jiayu.gov.cn/bbs/index.asp?boardid=6" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/bbs3.gif" width="200" height="33" ></a></div>
</div>
</div>


<div class="five">
<div class="five_tit">网上审批</div>
<div class="five_bm">
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351551&depName=档案局" target="_blank">档案局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351228&depName=广电局" target="_blank">广电局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011350591&depName=人事局" target="_blank">人事局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=784468428&depName=文体局" target="_blank">文体局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=01135156X&depName=经管局" target="_blank">经管局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011350647&depName=农机局" target="_blank">农机局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=795937437&depName=城管局" target="_blank">城管局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351199&depName=计生局" target="_blank">计生局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011350882&depName=科技局" target="_blank">科技局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011350700&depName=环保局" target="_blank">环保局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=739146497&depName=人防办" target="_blank">人防办</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351316&depName=公安局" target="_blank">公安局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=76744538X&depName=安监局" target="_blank">安监局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011350989&depName=水利局" target="_blank">水利局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011350620&depName=水产局" target="_blank">水产局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011350604&depName=建设局" target="_blank">住建局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351340&depName=教育局" target="_blank">教育局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=421285403&depName=劳动局" target="_blank">人社局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011350671&depName=地税局" target="_blank">地税局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011350970&depName=林业局" target="_blank">林业局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351244&depName=发改局" target="_blank">发改局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=111111005&depName=民宗局" target="_blank">民宗局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011056253&depName=卫生局" target="_blank">卫生局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351033&depName=粮食局" target="_blank">粮食局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351287&depName=民政局" target="_blank">民政局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351279&depName=统计局" target="_blank">统计局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351885&depName=质监局" target="_blank">质监局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351164&depName=气象局" target="_blank">气象局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=751044792&depName=国土局" target="_blank">国土局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351084&depName=交通局" target="_blank">交通局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351105&depName=工商局" target="_blank">工商局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351076&depName=国税局" target="_blank">国税局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011350911&depName=农业局" target="_blank">农业局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011350962&depName=畜牧局" target="_blank">畜牧局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011351260&depName=物价局" target="_blank">物价局</a>
<a href="http://www.jyxzfw.com:8080/application/wsbs/bszn/xzzhinanxiang.jsp?ZZJGDM=011111111&depName=消防大队" target="_blank">消防大队</a> 
</div>
</div>


<div class="six">
 
<div class="six_a1">
<div class="six_tit1"><a href="http://www.jiayu.gov.cn/zhaoshangyinzi/yuanqujianshe/" target="_blank">更多>></a></div>
 <ul>
 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(85,5,1,0);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>  
<li><img src="http://www.jiayu.gov.cn/skin/jy/images/t1.gif"> <a href='<?=$bqsr[titleurl]?>' target=_blank><?=esub($bqr[title],20)?></a></li>
<?php
}
?></ul>
</div>

<div class="six_a2">
<div class="six_tit2"><img src="http://www.jiayu.gov.cn/skin/jy/images/web_89.gif" width="620" height="24"></div>
<div class="sixa2_tit">嘉鱼县内网站导航</div>
 <div align="left">
&nbsp&nbsp| <a href="http://www.cnjiayu.com.cn/" target='_blank'>中国嘉鱼网</a> |
 <a href="http://www.jytour.com.cn/" target='_blank'>嘉鱼旅游网</a> | 
 <a href="http://www.jiayufw.com/" target='_blank'>嘉房网</a> | 
<a href="http://xianning.hb-n-tax.gov.cn/col/col5280/index.html" target='_blank'>国税局</a> |
<a href="http://www.hb-l-tax.gov.cn/xnsxs/jyx/" target='_blank'>地税局</a> |
<a href="http://www.jyhbw.cn/" target='_blank'>环保局</a> |
<a href="http://www.jywjw.gov.cn/" target='_blank'>物价局</a> |
<a href="http://www.jylr.gov.cn/" target='_blank'>国土局</a> |
<a href="http://www.jygqt.com.cn/" target='_blank'>共青团</a> |
<a href="http://www.jyfgw.gov.cn/" target='_blank'>发改局</a> |
</div>
<div align="left">
&nbsp&nbsp| <a href="http://www.jyajj.gov.cn/" target='_blank'>安监局</a> |
<a href="http://www.jyjxw.gov.cn/" target='_blank'>经信局</a> |
<a href="http://www.jyxzfw.com/" target='_blank'>行政服务中心</a> |
<a href="http://jyx.hbws.gov.cn/" target='_blank'>卫生局</a> |
<a href="http://www.jyrkjs.com/" target='_blank'>计生局</a> |
<a href="http://www.jyjyw.net/" target='_blank'>教育局</a> |
<a href="http://www.hbcz.gov.cn/421221/" target='_blank'>财政局</a> |
<a href="http://www.jyxcdc.com/" target='_blank'>疾控中心</a> |</div>
<div class="sixa3_tit">乡镇链接</div>
<div align="center">
| <a href="http://www.yuyue.gov.cn//" target='_blank'>鱼岳镇</a> |
<a href="http://www.jiayu.gov.cn/xiangzhenlianjie/2011-11-23/923.html" target='_blank'>陆溪镇</a> |
<a href="http://www.jiayu.gov.cn/xiangzhenlianjie/2011-11-23/924.html" target='_blank'>高铁岭镇</a> |
<a href="http://www.guanqiao.gov.cn/Index.htm" target='_blank'>官桥镇</a> |
<a href="http://www.jiayu.gov.cn/xiangzhenlianjie/2011-11-23/926.html" target='_blank'>新街镇</a> |
<a href="http://www.pjw.gov.cn/" target='_blank'>潘家湾镇</a> |
<a href="http://www.jiayu.gov.cn/xiangzhenlianjie/2011-11-23/927.html" target='_blank'>渡普镇</a> |
<a href="http://www.jiayu.gov.cn/xiangzhenlianjie/2011-11-23/928.html" target='_blank'>牌洲湾镇</a> |
</div>


</div>


<div class="six_a3">
<div class="six_tit3"><img src="http://www.jiayu.gov.cn/skin/jy/images/web_90.gif" width="150" height="24"></div>
<? @sys_ShowClassByTemp(267,27,0,5);?></div>

</div>


<div class="pic_new">
  <a href="http://www.jiayu.gov.cn/fuwulvyouzhe/" target="_blank">
  <img src="http://www.jiayu.gov.cn/skin/jy/images/web_72.gif" width="40" height="200" style="float:left;margin-right:15px;" /></a>
 <div class="scrollImgList1" id="scrollImgList1">
<div class="Cont" id="ISL_Cont_1">
<div class="scrCont">
<div id=List1_1>
  <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(245,10,0,1);
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<div class=box><a href="<?=$bqsr[titleurl]?>" target="_blank"><img src="<?=$bqr[titlepic]?>" width="165" height="117" border="0" alt="<?=esub($bqr[title],55)?>"></a><p><?=esub($bqr[title],55)?><br></p></div>
  <?php
}
?>
</div>
<div id="List2_1"></div></div></div>
<table width="15"  border="0" cellspacing="10" height="200" cellpadding="0" style="float:right">
  <tr>
    <td><div onmouseup="ISL_StopUp_1()" class="leftBtn" onmousedown="ISL_GoUp_1()" onmouseout="ISL_StopUp_1()"><img src="http://www.jiayu.gov.cn/skin/jy/images/web_75.gif" width="13" height="17" /></div></td>
  </tr>
  <tr>
    <td><div onmouseup="ISL_StopDown_1()" class="rightBtn" onmousedown="ISL_GoDown_1()" onmouseout="ISL_StopDown_1()"><img src="http://www.jiayu.gov.cn/skin/jy/images/web_78.gif" width="13" height="17" /></div></td>
  </tr>
</table>
</div>
<script type="text/javascript">
		var speed_1 = 10; //速度(毫秒)
		var space_1 = 10; //每次移动(px)
		var PageHeight_1 = 200; //翻页宽度
		var fill_1 = 0; //整体移位
		var moveLock_1 = false;
		var moveTimeObj_1;
		var moveWay_1 = "right";
		var comp_1 = 0;
		var autoPlayObj_1=null;
		
		GetObj("List2_1").innerHTML=GetObj("List1_1").innerHTML;
		GetObj('ISL_Cont_1').scrollTop=fill_1>=0?fill_1:GetObj('List1_1').scrollHeight-Math.abs(fill_1);
		GetObj("ISL_Cont_1").onmouseover=function(){clearInterval(autoPlayObj_1)}
		GetObj("ISL_Cont_1").onmouseout=function(){AutoPlay_1()}
		AutoPlay_1();
		
		function GetObj(objName){
			if(document.getElementById){return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName)}
		}
		
		function AutoPlay_1(){
			clearInterval(autoPlayObj_1);
			autoPlayObj_1=setInterval('ISL_GoDown_1();ISL_StopDown_1();',5000)
		}
		
		function ISL_GoUp_1(){
			if(moveLock_1)return;
			clearInterval(autoPlayObj_1);
			moveLock_1=true;
			moveWay_1="left";
			moveTimeObj_1=setInterval('ISL_ScrUp_1();',speed_1);
		}
		
		function ISL_StopUp_1(){
		if(moveWay_1 == "right"){return};
		clearInterval(moveTimeObj_1);
		if((GetObj('ISL_Cont_1').scrollTop-fill_1)%PageHeight_1!=0){
		comp_1=fill_1-(GetObj('ISL_Cont_1').scrollTop%PageHeight_1);
		CompScr_1()}else{moveLock_1=false}
		AutoPlay_1()}
		
		function ISL_ScrUp_1(){
		if(GetObj('ISL_Cont_1').scrollTop<=0){GetObj('ISL_Cont_1').scrollTop=GetObj('ISL_Cont_1').scrollTop+GetObj('List1_1').offsetHeight}
		GetObj('ISL_Cont_1').scrollTop-=space_1
		}
		
		function ISL_GoDown_1(){
			clearInterval(moveTimeObj_1);
			if(moveLock_1)return;
			clearInterval(autoPlayObj_1);
			moveLock_1=true;
			moveWay_1="right";
			ISL_ScrDown_1();
			moveTimeObj_1=setInterval('ISL_ScrDown_1()',speed_1)
		}
		
		function ISL_StopDown_1(){
			if(moveWay_1 == "left"){return};
			clearInterval(moveTimeObj_1);
			if(GetObj('ISL_Cont_1').scrollTop%PageHeight_1-(fill_1>=0?fill_1:fill_1+1)!=0){
				comp_1=PageHeight_1-GetObj('ISL_Cont_1').scrollTop%PageHeight_1+fill_1;
				CompScr_1()
			}
			else{moveLock_1=false}
			AutoPlay_1()
		}
		
		function ISL_ScrDown_1(){
		if(GetObj('ISL_Cont_1').scrollTop>=GetObj('List1_1').scrollHeight){GetObj('ISL_Cont_1').scrollTop=GetObj('ISL_Cont_1').scrollTop-GetObj('List1_1').scrollHeight}
		GetObj('ISL_Cont_1').scrollTop+=space_1
		}
		
		function CompScr_1(){
			if(comp_1==0){moveLock_1=false;return}
			var num,TempSpeed=speed_1,TempSpace=space_1;
			if(Math.abs(comp_1)<PageHeight_1/2){
				TempSpace=Math.round(Math.abs(comp_1/space_1));
				if(TempSpace<1){TempSpace=1}
			}
			if(comp_1<0){
				if(comp_1<-TempSpace){
					comp_1+=TempSpace;
					num=TempSpace
				}
				else{num=-comp_1;comp_1=0}
				GetObj('ISL_Cont_1').scrollTop-=num;
				setTimeout('CompScr_1()',TempSpeed)
			}	
			else{if(comp_1>TempSpace){comp_1-=TempSpace;num=TempSpace}
			else{num=comp_1;
			comp_1=0}
			GetObj('ISL_Cont_1').scrollTop+=num;
			setTimeout('CompScr_1()',TempSpeed)}
		}
		</script>
  </div>
  
<div class="copyright">
    <table width="980" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td height="30" colspan="2" align="center" background="http://www.jiayu.gov.cn/skin/jy/images/foot_nav_bg.gif">&nbsp;|&nbsp;<a href="/">网站首页</a>&nbsp;|&nbsp;<a href="http://www.jiayu.gov.cn/baijianshishiwangshangban/" target="_blank">百件实事网上办</a>&nbsp;|&nbsp;<a href="http://www.jiayu.gov.cn/mail/E_LeadMail.asp" target="_blank">县长信箱</a>&nbsp;|&nbsp;
<a href="http://www.jiayu.gov.cn/bbs" target="_blank">政务贴吧</a>&nbsp;|&nbsp;</td>
	  </tr>
	  <tr><td height="25"></td></tr>
      <tr>
       <td height="25"><p>Copyright &copy; 嘉鱼县人民政府办公室  2001-2011</p></td>
      </tr>
      <tr>
        <td height="25"><p><a href="http://www.miibeian.gov.cn/" target="_blank">鄂ICP备11019422号-1</a></p></td>
      </tr>
      <tr>
        <td height="25"><p>地址：嘉鱼县人民政府 　邮编：437200　政务邮箱：<a href="mailto:jyzw0715@163.com">jyzw0715@163.com</a>&nbsp;</p></td>
      </tr>
      <tr>
        <td height="25"><p>管理员电话：0715-6355801 <script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F234f36dff8122bee169172f964b18fc3' type='text/javascript'%3E%3C/script%3E"));
</script>
&nbsp;[<a href="http://www.jiayu.gov.cn/mail/login.asp" target="_blank">县长信箱</a>]</p></td>
      </tr>
	  <tr><td><a href="http://www.xianning.cyberpolice.cn/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/jc.gif" width="70" height="65"></a></td>
	  </tr>
    </table>
  </div>
</body>
</html>




