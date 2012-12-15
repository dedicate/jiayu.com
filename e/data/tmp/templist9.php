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
<meta name="keywords" content="[!--pagekey--]" />
<meta name="description" content="[!--pagedes--]" />
<meta name="keywords" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>[!--pagetitle--] - 嘉鱼县人民政府门户网站</title>
<!-- 调用样式表 -->
<link href="[!--news.url--]skin/jy/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="[!--news.url--]skin/jy/effect.js"></script>
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
SetCookie('PEOPLE_CUSTOMIZE_city',city,expdate,'/','[!--news.url--]');

	document.getElementById("weathercustomize").src="[!--news.url--]";
	//location.reload();
}
</script>
<!--检索-->
</head>

<body onload='e=new Selecter2("t_select_list3");'>
<div class="center bor">
<div class="top">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="26"><img src="[!--news.url--]skin/jy/images/top01.gif" width="26" height="25" /></td>
<td width="48">县　委</td>
<td width="26"><img src="[!--news.url--]skin/jy/images/top02.gif" width="26" height="25" /></td>
<td width="48">县人大</td>
<td width="26"><img src="[!--news.url--]skin/jy/images/top02.gif" width="26" height="25" /></td>
<td width="48">县政府</td>
<td width="26"><img src="[!--news.url--]skin/jy/images/top03.gif" width="26" height="25" /></td>
<td width="49">县政协</td>
<td width="294">&nbsp;</td>
<td width="389" align="right">
<a href="" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.jiayu.gov.cn');" rel="nofollow">设为首页</a> |
<a href="javascript:window.external.AddFavorite('http://www.jiayu.gov.cn','嘉鱼政务网')" rel="nofollow">加入收藏</a> | 
<a href="[!--news.url--]">返回首页</a>&nbsp;</td>
</tr>
</table>
</div>
<div class="banner">
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="980" height="200">
      <param name="movie" value="[!--news.url--]skin/jy/images/banner.swf"/>
      <param name="quality" value="high" />
      <embed src="[!--news.url--]skin/jy/images/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="980" height="200"></embed>
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
    <td width="80" id="card0" align="center"><a href="[!--news.url--]" onMouseOver="javascript:switchTab('cardBar','card0');">首页</a></td>
    <td width="100" id="card1" align="center"><a href="[!--news.url--]jiayuxianqing/"  onMouseOver="javascript:switchTab('cardBar','card1');">嘉鱼县情</a></td>
    <td width="100" id="card2" align="center"><a href="[!--news.url--]jiayuzhengwu/"  onMouseOver="javascript:switchTab('cardBar','card2');">嘉鱼政务</a></td>
    <td width="100" id="card3" align="center"><a href="[!--news.url--]dangwugongkai/"  onMouseOver="javascript:switchTab('cardBar','card3');">党务公开</a></td>
    <td width="100" id="card4" align="center"><a href="[!--news.url--]zhaoshangyinzi/"  onMouseOver="javascript:switchTab('cardBar','card4');">招商引资</a></td>
    <td width="100" id="card5" align="center"><a href="[!--news.url--]fuwulvyouzhe/"  onMouseOver="javascript:switchTab('cardBar','card5');">游在嘉鱼</a></td>
    <td width="100" id="card6" align="center"><a href="http://219.138.168.126:8082/"  onMouseOver="javascript:switchTab('cardBar','card6');" target="_blank">纪委举报网</a></td>
    <td width="100" id="card7" align="center"><a href="[!--news.url--]bbs/"  onMouseOver="javascript:switchTab('cardBar','card7');" target="_blank">政务贴吧</a></td>
     <td width="200"></td>
  </tr>
</table>

<table width="980" id="cardContent">
  <tr>
  <td align="center">
<div id="Dcard1" class="hackBox">
		| <a href="[!--news.url--]jiayuxianqing/jiayugailan/">嘉鱼概览</a> |
		<a href="[!--news.url--]jiayuxianqing/xianyujingji/">县域经济</a> |
		<a href="[!--news.url--]jiayuxianqing/jiayuwenhua/">嘉鱼文化</a> |
		</div>
 
<div id="Dcard2" class="hackBox">
		| <a href="[!--news.url--]jiayuzhengwu/lingdaoxinxi/">领导信息</a> |
		<a href="[!--news.url--]jiayuzhengwu/zuzhijigou/">组织机构</a> |
		<a href="[!--news.url--]jiayuzhengwu/lingdaojianghua/">领导讲话</a> |
		<a href="[!--news.url--]jiayuzhengwu/zhengwudongtai/">政务动态</a> |
		<a href="[!--news.url--]jiayuzhengwu/zhengfuwenjian/">政府文件</a> |
		<a href="[!--news.url--]jiayuzhengwu/zhengfugonggao/">政府公告</a> |
		<a href="[!--news.url--]jiayuzhengwu/zhengfugongzuobaogao/">政府工作报告</a> |
		<a href="[!--news.url--]jiayuzhengwu/xinxigongkaizhinan/">信息公开指南</a> |
		<a href="[!--news.url--]jiayuzhengwu/xinxigongkaimulu/">信息公开目录</a> |
		<a href="[!--news.url--]jiayuzhengwu/xinxigongkaishenqing/">信息公开申请 </a> |
		</div>
<div id="Dcard3" class="hackBox">
		| <a href="[!--news.url--]dangwugongkai/jibenqingkuang/">基本情况</a> |
		<a href="[!--news.url--]dangwugongkai/xianweigongzuo/">县委工作</a> |
		<a href="[!--news.url--]dangwugongkai/gongzuodongtai/">工作动态</a> |
		<a href="[!--news.url--]dangwugongkai/jicengdangwu/">基层党务</a> |
		<a href="[!--news.url--]dangwugongkai/lianzhengwenhua/">廉政文化</a> |
		<a href="http://www.jiayu.gov.cn/bbs/index.asp?boardid=6">建言献策</a> |
		</div>
<div id="Dcard4" class="hackBox">
		| <a href="[!--news.url--]zhaoshangyinzi/zhaoshangdongtai/">招商动态</a> |
		<a href="[!--news.url--]zhaoshangyinzi/touzichengben/">投资成本</a> |
		<a href="[!--news.url--]zhaoshangyinzi/zhaoshangxiangmu/">招商项目</a> |
		<a href="[!--news.url--]zhaoshangyinzi/zhaoshangfuwu/">招商服务</a> |
		<a href="[!--news.url--]zhaoshangyinzi/touzihuanjing/">投资环境</a> |
		<a href="[!--news.url--]zhaoshangyinzi/touzizhengce/">投资政策</a> |
		<a href="[!--news.url--]zhaoshangyinzi/yuanqujianshe/">园区建设</a> |		
		</div>
<div id="Dcard5" class="hackBox">
		| <a href="[!--news.url--]fuwulvyouzhe/lvyouziyuan/">旅游资源</a> |
		<a href="[!--news.url--]fuwulvyouzhe/lvyouguihua/">旅游规划</a> |
		<a href="[!--news.url--]fuwulvyouzhe/lvyoujingdian/">旅游景点</a> |
		<a href="[!--news.url--]fuwulvyouzhe/lvyouguanli/">旅游管理</a> |
		<a href="[!--news.url--]fuwulvyouzhe/lvyoujingji/">旅游经济</a> |
		<a href="[!--news.url--]fuwulvyouzhe/lvyoubaoxian/">旅游保险</a> |
		<a href="[!--news.url--]fuwulvyouzhe/tesemeishi/">特色美食</a> |	
                             </div> 
 </td>
  </tr>
</table>


<table height="37" border=0 cellpadding=3 cellspacing=1 style="background:url([!--news.url--]skin/jy/images/index_016_2.jpg) no-repeat;">
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
<form name=search_js1 method=post action='[!--news.url--]e/search/index.php' onsubmit='return search_check(document.search_js1);'>
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

      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0" class="one">
     <tr>
      <td width="772" height="30" valign="top">
      
<table width="772" height="35" border="0" cellpadding="0" cellspacing="0" class="bjsswsbwz">     
      <tr>
        <td width="32"><img src="[!--news.url--]skin/jy/images/lmwz.gif" width="11" height="11" /></td>
        <td width="740">您现在的位置：[!--newsnav--]</td>
      </tr>
    </table>
  
<div class="bjsswsb_body">		
<div class="bjsswsb_main">			  
<table width="770" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<script language=javascript>
function nav_01(n) {
var menu = document.getElementById('nav_01_menu').getElementsByTagName('li');
var main = document.getElementById('nav_01_main').getElementsByTagName('li');
for (i = 0; i < menu.length; i++) {
menu[i].className = "sec1";
}
menu[n].className = "sec2";
for (i = 0; i < main.length; i++) {
main[i].style.display = "none";
}
main[n].style.display = "block";
}
</script>
<!--导航选项区域-->
<ul id="nav_01_menu">
<li onclick="nav_01(0)" class="sec2">教　　育</li>
<li onclick="nav_01(1)" class="sec1">医疗卫生</li>
<li onclick="nav_01(2)" class="sec1">劳动保障</li>
<li onclick="nav_01(3)" class="sec1">交通出行</li>
<li onclick="nav_01(4)" class="sec1">公用事业</li>
</ul>
<!--//nav_menu-->
<ul id="nav_01_main">
<li class="block">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="１" bgcolor="#e2e2e2">
<tr>
<td width="150" align="center" valign="top" bgcolor="#FFFFFF">
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
        <tr>
          <td height="15" align="center" bgcolor="#FFFFFF">学前教育</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">小学教育</td>
        </tr>       
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">初中教育</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">高中教育</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">职业教育</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">高等教育</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">特殊教育</td>
        </tr>
        <tr>
          <td height="65" align="center" bgcolor="#FFFFFF">考试服务</td>
        </tr>
      </table>
	  </td>
	  
      <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
      	<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-25/6.html" title="幼儿园一览表及介绍" target="_blank">·幼儿园一览表及介绍</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-25/7.html" title="小学一览表及介绍" target="_blank">·小学一览表及介绍</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-25/8.html" title="小学入学、转学、升学政策规定介绍" target="_blank">·小学入学、转学、升学政策规定介绍</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/448.html" title="初中一览表及介绍" target="_blank">·初中一览表及介绍</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/449.html" title="初中入学、转学、升学政策规定介绍" target="_blank">·初中入学、转学、升学政策规定介绍</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/450.html" title="高中一览表及介绍" target="_blank">·高中一览表及介绍</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/452.html" title="嘉鱼县职业教育一览表及介绍" target="_blank">·嘉鱼县职业教育一览表及介绍</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/453.html" title="高等教育学历证书网上查询" target="_blank">·高等教育学历证书网上查询</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/454.html" title="嘉鱼县特殊教育学校" target="_blank">·嘉鱼县特殊教育学校</a></td>
        </tr>

		<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/457.html" title="成人考试网上报名服务" target="_blank">·成人考试网上报名服务</a></td>

        </tr>

<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/460.html" title="高等教育自学考试报考条件" target="_blank">·高等教育自学考试报考条件</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/461.html" title="报考成人高等学校考生须知" target="_blank">·报考成人高等学校考生须知</a></td>
        </tr>
      </table></td>
    </tr>
  </table>
</li>
<li class="unblock">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="１" bgcolor="#e2e2e2">
    <tr>
      <td width="150" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
        <tr>
          <td height="15" align="center" bgcolor="#FFFFFF">医疗机构信息</td>
        </tr>
       <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">药品药店信息</td>
        </tr>
        <tr>
          <td height="87" align="center" bgcolor="#FFFFFF">医疗保险信息</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">疾病防控信息</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">职业健康信息</td>
        </tr>
        <tr>
          <td height="65" align="center" bgcolor="#FFFFFF">计划生育信息</td>
        </tr>
      </table></td>
      <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
      	<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/462.html" title="医疗机构名录" target="_blank">·医疗机构名录</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/463.html" title="药店信息查询" target="_blank">·药店信息查询</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/464.html" title="医疗保险、公费医疗等规定及工作程序" target="_blank">·医疗保险、公费医疗等规定及工作程序</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/465.html" title="医疗保险定点医院查询" target="_blank">·医疗保险定点医院查询</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/466.html" title="医疗保险定点药店查询" target="_blank">·医疗保险定点药店查询</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/467.html" title="医疗保险范围药品查询" target="_blank">·医疗保险范围药品查询</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/468.html" title="防疫站,疫苗接种点列表" target="_blank">·防疫站,疫苗接种点列表</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/469.html" title="职业病目录及诊断鉴定服务" target="_blank">·职业病目录及诊断鉴定服务</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/470.html" title="健康证办理" target="_blank">·健康证办理</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/471.html" title="计划生育服务机构一览表及介绍" target="_blank">·计划生育服务机构一览表及介绍</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/473.html" title="流动人口计生管理与服务指南" target="_blank">·流动人口计生管理与服务指南</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/474.html" title="妇幼保健常识" target="_blank">·妇幼保健常识</a></td>
        </tr>

      </table></td>
    </tr>
  </table>

</li>
<li class="unblock">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="１" bgcolor="#e2e2e2">
    <tr>
      <td width="150" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">

        <tr>
          <td height="15" align="center" bgcolor="#FFFFFF">工资福利</td>
        </tr>       
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">劳动仲裁</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">劳动关系</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">劳动能力鉴定</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">社会救助</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">社会福利</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">优待抚恤</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">退伍安置</td>
        </tr>
      </table></td>
      <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
      	<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/476.html" title="我县工资标准" target="_blank">·我县工资标准</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/477.html" title="劳动仲裁" target="_blank">·劳动仲裁</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/478.html" title="劳动合同备案登记" target="_blank">·劳动合同备案登记</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/479.html" title="劳动能力鉴定" target="_blank">·劳动能力鉴定</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/480.html" title="工伤鉴定" target="_blank">·工伤鉴定</a></td>
        </tr>

<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/481.html" title="城市生活无着的流浪乞讨人员救助" target="_blank">·城市生活无着的流浪乞讨人员救助</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/482.html" title="城镇居民最低生活保障申请" target="_blank">·城镇居民最低生活保障申请</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/483.html" title="养老机构名录" target="_blank">·养老机构名录</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/484.html" title="各类优抚对象抚恤标准" target="_blank">·各类优抚对象抚恤标准</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/485.html" title="伤残人员伤残等级评定" target="_blank">·伤残人员伤残等级评定</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/486.html" title="接收安置退役士兵" target="_blank">·接收安置退役士兵</a></td>
        </tr>


      </table></td>
    </tr>
  </table>
</li>
<li class="unblock">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="１" bgcolor="#e2e2e2">
    <tr>
      <td width="150" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
        <tr>
          <td height="65" align="center" bgcolor="#FFFFFF">出行线路服务</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">机动车服务</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">驾驶员服务</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">费用查询服务</td>
        </tr>
      </table></td>
      <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
      	<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/487.html" title="客运线路查询" target="_blank">·客运线路查询</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/488.html" title="公共交通线路查询" target="_blank">·公共交通线路查询</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/489.html" title="城市地图查询" target="_blank">·城市地图查询</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/490.html" title="机动车注册登记" target="_blank">·机动车注册登记</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/491.html" title="驾校一览表" target="_blank">·驾校一览表</a></td>
        </tr>

<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/493.html" title="现行汽柴油价格" target="_blank">·现行汽柴油价格</a></td>
        </tr>

      </table></td>
    </tr>
  </table></li>
<li class="unblock">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="１" bgcolor="#e2e2e2">
    <tr>
      <td width="150" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">供水服务</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">供电服务</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">邮政服务</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">通讯服务</td>
        </tr>
      </table></td>
      <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
      	<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/494.html" title="自来水缴费" target="_blank">·自来水缴费</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/495.html" title="自来水报装、报修服务" target="_blank">·自来水报装、报修服务</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/496.html" title="用电报修服务" target="_blank">·用电报修服务</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/497.html" title="邮编查询" target="_blank">·邮编查询</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/498.html" title="营业网点查询" target="_blank">·营业网点查询</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/499.html" title="通讯费查询" target="_blank">·通讯费查询</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/500.html" title="通讯费缴纳" target="_blank">·通讯费缴纳</a></td>
        </tr>
      </table></td>
    </tr>
  </table></li>
</ul>				
</td>
</tr>
</table>

</div>
</div>

</td>
	<td width="10" valign="top">&nbsp;</td>
	<td width="168" valign="top" class="lmright">
 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;border:1px solid #FFCC99">
        <tr>
          <td height="50" align="center" ><a href="[!--news.url--]jiayuxiansheqixingzhengshiyexingshoufeibiaozhunmulu/" target="_blank" title="嘉鱼县涉企行政事业性收费标准目录"><img src="[!--news.url--]skin/jy/images/l1.gif" alt=" " width="168" height="50" border="0" /></a></td>
        </tr>
      </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;border:1px solid #FFCC99">
        <tr>
          <td height="50" align="center"><a href="[!--news.url--]xingzhengshiyeshoufeimulujibiaozhun/" target="_blank" title="嘉鱼县行政事业收费目录及标准"><img src="[!--news.url--]skin/jy/images/l2.gif" width="168" height="50" border="0" /></a></td>
        </tr>
      </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;border:1px solid #FFCC99">
        <tr>
          <td height="50" align="center"><a href="[!--news.url--]jiayuxianxingzhengxukemulu/" target="_blank" title="嘉鱼县行政许可目录"><img src="[!--news.url--]skin/jy/images/l3.gif" width="168" height="50" border="0" /></a></td>
        </tr>
      </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;border:1px solid #FFCC99">
        <tr>
          <td height="50" align="center"><a href="[!--news.url--]mail/E_LeadMail.asp" target="_blank" title="县长信箱"><img src="[!--news.url--]skin/jy/images/l4.gif" width="168" height="50" border="0" /></a></td>
        </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;border:1px solid #FFCC99">
        <tr>
          <td height="50" align="center"><a href="[!--news.url--]baijianshishiwangshangban/" target="_blank" title="百件实事网上办"><img src="[!--news.url--]skin/jy/images/l5.gif" width="168" height="50" border="0" /></a></td>
        </tr>
      </table>
  
 <table width="168" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px; border:1px solid #FFCC99">
        <tr>
          <td height="28" background="[!--news.url--]images/one_bj.png" class="lm_title">
          <table width="168" height="28" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="78" align="center" background="[!--news.url--]skin/jy/images/lm_title_bg.gif" class="lm_title">热门信息</td>
              <td width="90" align="right"></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="5"></td>
        </tr>
	  	
        <tr>
         <td><? @sys_GetEcmsInfo('selfinfo',10,24,0,0,26,0);?><td></tr>
      </table>
      </td>
</tr>
</table>

<div class="copyright">
    <table width="980" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td height="30" colspan="2" align="center" background="[!--news.url--]skin/jy/images/foot_nav_bg.gif">&nbsp;|&nbsp;<a href="/">网站首页</a>&nbsp;|&nbsp;<a href="[!--news.url--]baijianshishiwangshangban/" target="_blank">百件实事网上办</a>&nbsp;|&nbsp;<a href="[!--news.url--]mail/E_LeadMail.asp" target="_blank">县长信箱</a>&nbsp;|&nbsp;
<a href="[!--news.url--]bbs" target="_blank">政务贴吧</a>&nbsp;|&nbsp;</td>
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
&nbsp;[<a href="[!--news.url--]mail/login.asp" target="_blank">县长信箱</a>]</p></td>
      </tr>
	  <tr><td><a href="http://www.xianning.cyberpolice.cn/" target="_blank"><img src="[!--news.url--]skin/jy/images/jc.gif" width="70" height="65"></a></td>
	  </tr>
    </table>
  </div>

</body>
</html>