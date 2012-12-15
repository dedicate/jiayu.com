<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <title>[!--pagetitle--] - 嘉鱼县人民政府门户网站</title>
    </head>
    <body>
        <meta content="text/html; charset=GB2312" http-equiv="Content-Type" />
        <meta content="utf-8" http-equiv="Content-Language" />
        <meta content="all" name="robots" />
        <meta content=" " name="author" />
        <meta content="[!--pagekey--]" name="keywords" />
        <meta content="[!--pagedes--]" name="description" />
        <meta content="" name="keywords" />
        <meta content="IE=EmulateIE7" http-equiv="X-UA-Compatible" /><!-- 调用样式表 -->
        <link href="[!--news.url--]skin/jy/css.css" type="text/css" rel="stylesheet" /><script language="javascript" src="[!--news.url--]skin/jy/effect.js"></script><script language="javascript">
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
</script><!--检索--><body onload='e=new Selecter2("t_select_list3");'>
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
<div class="one">
<div class="ej_l_nr">
<div class="nav_ej" id="p_navigator">[!--newsnav--]</div>

<div class="jbt"></div>
<h2><div id="p_title">[!--title--]</div></h2>
<div class="jbt"></div>
<div class="zuozhe"></div>
<div align="center"><span id="p_publishtime">[!--newstime--]</span>&nbsp;&nbsp;<span id="p_origin">来源：[!--befrom--]&nbsp;&nbsp;责任编辑：[!--writer--]</span></div>
<font class="show_c" id="zoom">
    <div id="p_content">
	　　[!--newstext--]
                </div>
	</font>
	<div class="wenzi"></div>
<div align="left"> </div>
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td align="right"><div id="p_editor">（责任编辑：[!--writer--]）</div></td>
    </tr>
  </tbody>
</table>
</div>

<div class="o_lb_1">
<div class="o_lb_2">
<div class="o_lb_3">
<div class="o_lb_4"><a href="[!--news.url--]jiayuxiansheqixingzhengshiyexingshoufeibiaozhunmulu/" target="_blank"><img src="[!--news.url--]skin/jy/images/l1.gif" width="168" height="50" border="0"></a></div>
<div class="o_lb_4"><a href="[!--news.url--]xingzhengshiyeshoufeimulujibiaozhun/" target="_blank"><img src="[!--news.url--]skin/jy/images/l2.gif" width="168" height="50" border="0"></a></div>
<div class="o_lb_4"><a href="[!--news.url--]jiayuxianxingzhengxukemulu/" target="_blank"><img src="[!--news.url--]skin/jy/images/l3.gif" width="168" height="50" border="0"></a></div>
<div class="o_lb_4"><a href="[!--news.url--]mail/E_LeadMail.asp" target="_blank"><img src="[!--news.url--]skin/jy/images/l4.gif" width="168" height="50" border="0"></a></div>
<div class="o_lb_4"><a href="[!--news.url--]baijianshishiwangshangban/" target="_blank"><img src="[!--news.url--]skin/jy/images/l5.gif" width="168" height="50" border="0"></a></div>
</div>
</div>
</div>



</div>
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


</div>
</body>
</html>