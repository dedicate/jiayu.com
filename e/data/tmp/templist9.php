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
<title>[!--pagetitle--] - ���������������Ż���վ</title>
<!-- ������ʽ�� -->
<link href="[!--news.url--]skin/jy/css.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="[!--news.url--]skin/jy/effect.js"></script>
<script language="javascript">
//Cookie������������ function FixCookieDate(date)
function FixCookieDate(date){
	var base = new Date(0);
	var skew = base.getTime();
	if (skew > 0)date.setTime(date.getTime() - skew);
}

//����Cookie���� function SetCookie(name,value,expires,path,domain,secure)
function SetCookie(name,value,expires,path,domain,secure){
	document.cookie = name + "=" + escape(value) + ((expires)? "; expires=" + expires.toGMTString() : "") + ((path) ? "; path=" + path : "") + ((domain) ? "; domain=" + domain : "") + ((secure) ? "; secure" : "");
}
	//����Cookie��Ӧ��ֵ����ֵ�ĺ��� function getCookieVal(offset)
	function getCookieVal(offset) {
		var endstr = document.cookie.indexOf(";",offset);
		if (endstr == -1) endstr = document.cookie.length;
		return unescape(document.cookie.substring(offset,endstr));
	}

	//����Cookie���� function GetCookie(name)
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
		alert("��ѡ�����");
		return false;
	}

	var expdate = new Date();
		FixCookieDate(expdate);//����MAC������BUG
		expdate.setTime(expdate.getTime() + (1000*60*60*24*365));//����Cookie����Ч��Ϊ1��
//		SetCookie('PEOPLE_CUSTOMIZE_city',city,expdate,'/');
SetCookie('PEOPLE_CUSTOMIZE_city',city,expdate,'/','[!--news.url--]');

	document.getElementById("weathercustomize").src="[!--news.url--]";
	//location.reload();
}
</script>
<!--����-->
</head>

<body onload='e=new Selecter2("t_select_list3");'>
<div class="center bor">
<div class="top">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="26"><img src="[!--news.url--]skin/jy/images/top01.gif" width="26" height="25" /></td>
<td width="48">�ء�ί</td>
<td width="26"><img src="[!--news.url--]skin/jy/images/top02.gif" width="26" height="25" /></td>
<td width="48">���˴�</td>
<td width="26"><img src="[!--news.url--]skin/jy/images/top02.gif" width="26" height="25" /></td>
<td width="48">������</td>
<td width="26"><img src="[!--news.url--]skin/jy/images/top03.gif" width="26" height="25" /></td>
<td width="49">����Э</td>
<td width="294">&nbsp;</td>
<td width="389" align="right">
<a href="" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.jiayu.gov.cn');" rel="nofollow">��Ϊ��ҳ</a> |
<a href="javascript:window.external.AddFavorite('http://www.jiayu.gov.cn','����������')" rel="nofollow">�����ղ�</a> | 
<a href="[!--news.url--]">������ҳ</a>&nbsp;</td>
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

/*�Ե��������ʾ�߿�Ĵ����������*/
div.hackBox{display:none;height:25px;background-color:#fff;}
div.hackBox a{color:#000000; font-size:12px;}

</style>
<script>

function switchTab(cardBar,cardId){


    document.getElementById(cardId).className="Selected";
    //����cardContent ���������div��ǩ
    var dvs=document.getElementById("cardContent").getElementsByTagName("div");
    //ѭ�����ж�Ӧ����ʾ��div
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
    <td width="80" id="card0" align="center"><a href="[!--news.url--]" onMouseOver="javascript:switchTab('cardBar','card0');">��ҳ</a></td>
    <td width="100" id="card1" align="center"><a href="[!--news.url--]jiayuxianqing/"  onMouseOver="javascript:switchTab('cardBar','card1');">��������</a></td>
    <td width="100" id="card2" align="center"><a href="[!--news.url--]jiayuzhengwu/"  onMouseOver="javascript:switchTab('cardBar','card2');">��������</a></td>
    <td width="100" id="card3" align="center"><a href="[!--news.url--]dangwugongkai/"  onMouseOver="javascript:switchTab('cardBar','card3');">���񹫿�</a></td>
    <td width="100" id="card4" align="center"><a href="[!--news.url--]zhaoshangyinzi/"  onMouseOver="javascript:switchTab('cardBar','card4');">��������</a></td>
    <td width="100" id="card5" align="center"><a href="[!--news.url--]fuwulvyouzhe/"  onMouseOver="javascript:switchTab('cardBar','card5');">���ڼ���</a></td>
    <td width="100" id="card6" align="center"><a href="http://219.138.168.126:8082/"  onMouseOver="javascript:switchTab('cardBar','card6');" target="_blank">��ί�ٱ���</a></td>
    <td width="100" id="card7" align="center"><a href="[!--news.url--]bbs/"  onMouseOver="javascript:switchTab('cardBar','card7');" target="_blank">��������</a></td>
     <td width="200"></td>
  </tr>
</table>

<table width="980" id="cardContent">
  <tr>
  <td align="center">
<div id="Dcard1" class="hackBox">
		| <a href="[!--news.url--]jiayuxianqing/jiayugailan/">�������</a> |
		<a href="[!--news.url--]jiayuxianqing/xianyujingji/">���򾭼�</a> |
		<a href="[!--news.url--]jiayuxianqing/jiayuwenhua/">�����Ļ�</a> |
		</div>
 
<div id="Dcard2" class="hackBox">
		| <a href="[!--news.url--]jiayuzhengwu/lingdaoxinxi/">�쵼��Ϣ</a> |
		<a href="[!--news.url--]jiayuzhengwu/zuzhijigou/">��֯����</a> |
		<a href="[!--news.url--]jiayuzhengwu/lingdaojianghua/">�쵼����</a> |
		<a href="[!--news.url--]jiayuzhengwu/zhengwudongtai/">����̬</a> |
		<a href="[!--news.url--]jiayuzhengwu/zhengfuwenjian/">�����ļ�</a> |
		<a href="[!--news.url--]jiayuzhengwu/zhengfugonggao/">��������</a> |
		<a href="[!--news.url--]jiayuzhengwu/zhengfugongzuobaogao/">������������</a> |
		<a href="[!--news.url--]jiayuzhengwu/xinxigongkaizhinan/">��Ϣ����ָ��</a> |
		<a href="[!--news.url--]jiayuzhengwu/xinxigongkaimulu/">��Ϣ����Ŀ¼</a> |
		<a href="[!--news.url--]jiayuzhengwu/xinxigongkaishenqing/">��Ϣ�������� </a> |
		</div>
<div id="Dcard3" class="hackBox">
		| <a href="[!--news.url--]dangwugongkai/jibenqingkuang/">�������</a> |
		<a href="[!--news.url--]dangwugongkai/xianweigongzuo/">��ί����</a> |
		<a href="[!--news.url--]dangwugongkai/gongzuodongtai/">������̬</a> |
		<a href="[!--news.url--]dangwugongkai/jicengdangwu/">���㵳��</a> |
		<a href="[!--news.url--]dangwugongkai/lianzhengwenhua/">�����Ļ�</a> |
		<a href="http://www.jiayu.gov.cn/bbs/index.asp?boardid=6">�����ײ�</a> |
		</div>
<div id="Dcard4" class="hackBox">
		| <a href="[!--news.url--]zhaoshangyinzi/zhaoshangdongtai/">���̶�̬</a> |
		<a href="[!--news.url--]zhaoshangyinzi/touzichengben/">Ͷ�ʳɱ�</a> |
		<a href="[!--news.url--]zhaoshangyinzi/zhaoshangxiangmu/">������Ŀ</a> |
		<a href="[!--news.url--]zhaoshangyinzi/zhaoshangfuwu/">���̷���</a> |
		<a href="[!--news.url--]zhaoshangyinzi/touzihuanjing/">Ͷ�ʻ���</a> |
		<a href="[!--news.url--]zhaoshangyinzi/touzizhengce/">Ͷ������</a> |
		<a href="[!--news.url--]zhaoshangyinzi/yuanqujianshe/">԰������</a> |		
		</div>
<div id="Dcard5" class="hackBox">
		| <a href="[!--news.url--]fuwulvyouzhe/lvyouziyuan/">������Դ</a> |
		<a href="[!--news.url--]fuwulvyouzhe/lvyouguihua/">���ι滮</a> |
		<a href="[!--news.url--]fuwulvyouzhe/lvyoujingdian/">���ξ���</a> |
		<a href="[!--news.url--]fuwulvyouzhe/lvyouguanli/">���ι���</a> |
		<a href="[!--news.url--]fuwulvyouzhe/lvyoujingji/">���ξ���</a> |
		<a href="[!--news.url--]fuwulvyouzhe/lvyoubaoxian/">���α���</a> |
		<a href="[!--news.url--]fuwulvyouzhe/tesemeishi/">��ɫ��ʳ</a> |	
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
  var   tgString="���ұ����켺�����ɹ�";  
  var   dzString="�ӳ���î������δ�����纥";  
  var   numString="һ�����������߰˾�ʮ";  
  var   monString="�������������߰˾�ʮ����";  
  var   weekString="��һ����������";  
  var   sx="��ţ������������Ｆ����";  
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
      tmp+=tgString.charAt((cYear-4)%10);       //���  
      tmp+=dzString.charAt((cYear-4)%12);       //��֧  
      tmp+="��(";  
      tmp+=sx.charAt((cYear-4)%12);  
      tmp+=")   ";  
      if(cMonth<1)  
      {    
        tmp+="��";  
          tmp+=monString.charAt(-cMonth-1);  
      }  
      else  
          tmp+=monString.charAt(cMonth-1);  
      tmp+="��";  
      tmp+=(cDay<11)?"��":((cDay<20)?"ʮ":((cDay<30)?"إ":"ئ"));  
      if(cDay%10!=0||cDay==10)  
          tmp+=numString.charAt((cDay-1)%10);  
      tmp+="    ";  
      if(cHour==13)tmp+="ҹ";  
          tmp+=dzString.charAt((cHour-1)%12);  
      tmp+="ʱ";  
      cDateString=tmp;  
      return   tmp;  
  }  
   
  function   GetDateString()  
  {    
      var   tmp="";  
      var   t1=TheDate.getYear();  
      if   (t1<1900)t1+=1900;  
      tmp+=t1  
                +"��"  
                +(TheDate.getMonth()+1)+"��"  
                +TheDate.getDate()+"��   "  
                +TheDate.getHours()+":"  
                +((TheDate.getMinutes()<10)?"0":"")  
                +TheDate.getMinutes()
                +"   ����"+weekString.charAt(TheDate.getDay());    
      DateString=tmp;  
      return   tmp;  
  }  
   
  init();  
  e2c();  
  GetDateString();  
  GetcDateString();  
  document.write(DateString,"ũ��",cDateString);  
</script>

</td>

<td width="580">
<form name=search_js1 method=post action='[!--news.url--]e/search/index.php' onsubmit='return search_check(document.search_js1);'>
<div align="right">
<select name=show><option value=title>
����</option><option value=smalltext>
���</option><option value=newstext>
����</option><option value=writer>
����</option><option value=title,smalltext,newstext,writer>
����ȫ��</option></select><select name=classid><option value=0>
������Ŀ</option>[!--class--]</select><input name=keyboard type=text size=13><input type=submit name=Submit value=����>
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
        <td width="740">�����ڵ�λ�ã�[!--newsnav--]</td>
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
<!--����ѡ������-->
<ul id="nav_01_menu">
<li onclick="nav_01(0)" class="sec2">�̡�����</li>
<li onclick="nav_01(1)" class="sec1">ҽ������</li>
<li onclick="nav_01(2)" class="sec1">�Ͷ�����</li>
<li onclick="nav_01(3)" class="sec1">��ͨ����</li>
<li onclick="nav_01(4)" class="sec1">������ҵ</li>
</ul>
<!--//nav_menu-->
<ul id="nav_01_main">
<li class="block">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="��" bgcolor="#e2e2e2">
<tr>
<td width="150" align="center" valign="top" bgcolor="#FFFFFF">
<table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
        <tr>
          <td height="15" align="center" bgcolor="#FFFFFF">ѧǰ����</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">Сѧ����</td>
        </tr>       
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">���н���</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">���н���</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">ְҵ����</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">�ߵȽ���</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">�������</td>
        </tr>
        <tr>
          <td height="65" align="center" bgcolor="#FFFFFF">���Է���</td>
        </tr>
      </table>
	  </td>
	  
      <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
      	<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-25/6.html" title="�׶�԰һ����������" target="_blank">���׶�԰һ����������</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-25/7.html" title="Сѧһ����������" target="_blank">��Сѧһ����������</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-25/8.html" title="Сѧ��ѧ��תѧ����ѧ���߹涨����" target="_blank">��Сѧ��ѧ��תѧ����ѧ���߹涨����</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/448.html" title="����һ����������" target="_blank">������һ����������</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/449.html" title="������ѧ��תѧ����ѧ���߹涨����" target="_blank">��������ѧ��תѧ����ѧ���߹涨����</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/450.html" title="����һ����������" target="_blank">������һ����������</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/452.html" title="������ְҵ����һ����������" target="_blank">��������ְҵ����һ����������</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/453.html" title="�ߵȽ���ѧ��֤�����ϲ�ѯ" target="_blank">���ߵȽ���ѧ��֤�����ϲ�ѯ</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/454.html" title="�������������ѧУ" target="_blank">���������������ѧУ</a></td>
        </tr>

		<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/457.html" title="���˿������ϱ�������" target="_blank">�����˿������ϱ�������</a></td>

        </tr>

<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/460.html" title="�ߵȽ�����ѧ���Ա�������" target="_blank">���ߵȽ�����ѧ���Ա�������</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/461.html" title="�������˸ߵ�ѧУ������֪" target="_blank">���������˸ߵ�ѧУ������֪</a></td>
        </tr>
      </table></td>
    </tr>
  </table>
</li>
<li class="unblock">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="��" bgcolor="#e2e2e2">
    <tr>
      <td width="150" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
        <tr>
          <td height="15" align="center" bgcolor="#FFFFFF">ҽ�ƻ�����Ϣ</td>
        </tr>
       <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">ҩƷҩ����Ϣ</td>
        </tr>
        <tr>
          <td height="87" align="center" bgcolor="#FFFFFF">ҽ�Ʊ�����Ϣ</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">����������Ϣ</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">ְҵ������Ϣ</td>
        </tr>
        <tr>
          <td height="65" align="center" bgcolor="#FFFFFF">�ƻ�������Ϣ</td>
        </tr>
      </table></td>
      <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
      	<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/462.html" title="ҽ�ƻ�����¼" target="_blank">��ҽ�ƻ�����¼</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/463.html" title="ҩ����Ϣ��ѯ" target="_blank">��ҩ����Ϣ��ѯ</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/464.html" title="ҽ�Ʊ��ա�����ҽ�Ƶȹ涨����������" target="_blank">��ҽ�Ʊ��ա�����ҽ�Ƶȹ涨����������</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/465.html" title="ҽ�Ʊ��ն���ҽԺ��ѯ" target="_blank">��ҽ�Ʊ��ն���ҽԺ��ѯ</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/466.html" title="ҽ�Ʊ��ն���ҩ���ѯ" target="_blank">��ҽ�Ʊ��ն���ҩ���ѯ</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/467.html" title="ҽ�Ʊ��շ�ΧҩƷ��ѯ" target="_blank">��ҽ�Ʊ��շ�ΧҩƷ��ѯ</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/468.html" title="����վ,������ֵ��б�" target="_blank">������վ,������ֵ��б�</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/469.html" title="ְҵ��Ŀ¼����ϼ�������" target="_blank">��ְҵ��Ŀ¼����ϼ�������</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/470.html" title="����֤����" target="_blank">������֤����</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/471.html" title="�ƻ������������һ����������" target="_blank">���ƻ������������һ����������</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/473.html" title="�����˿ڼ������������ָ��" target="_blank">�������˿ڼ������������ָ��</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/474.html" title="���ױ�����ʶ" target="_blank">�����ױ�����ʶ</a></td>
        </tr>

      </table></td>
    </tr>
  </table>

</li>
<li class="unblock">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="��" bgcolor="#e2e2e2">
    <tr>
      <td width="150" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">

        <tr>
          <td height="15" align="center" bgcolor="#FFFFFF">���ʸ���</td>
        </tr>       
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">�Ͷ��ٲ�</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">�Ͷ���ϵ</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">�Ͷ���������</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">������</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">��ḣ��</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">�Ŵ�����</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">���鰲��</td>
        </tr>
      </table></td>
      <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
      	<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/476.html" title="���ع��ʱ�׼" target="_blank">�����ع��ʱ�׼</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/477.html" title="�Ͷ��ٲ�" target="_blank">���Ͷ��ٲ�</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/478.html" title="�Ͷ���ͬ�����Ǽ�" target="_blank">���Ͷ���ͬ�����Ǽ�</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/479.html" title="�Ͷ���������" target="_blank">���Ͷ���������</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/480.html" title="���˼���" target="_blank">�����˼���</a></td>
        </tr>

<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/481.html" title="�����������ŵ�����������Ա����" target="_blank">�������������ŵ�����������Ա����</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/482.html" title="�������������������" target="_blank">���������������������</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/483.html" title="���ϻ�����¼" target="_blank">�����ϻ�����¼</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/484.html" title="�����Ÿ���������׼" target="_blank">�������Ÿ���������׼</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/485.html" title="�˲���Ա�˲еȼ�����" target="_blank">���˲���Ա�˲еȼ�����</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/486.html" title="���հ�������ʿ��" target="_blank">�����հ�������ʿ��</a></td>
        </tr>


      </table></td>
    </tr>
  </table>
</li>
<li class="unblock">
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="��" bgcolor="#e2e2e2">
    <tr>
      <td width="150" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
        <tr>
          <td height="65" align="center" bgcolor="#FFFFFF">������·����</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">����������</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">��ʻԱ����</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">���ò�ѯ����</td>
        </tr>
      </table></td>
      <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
      	<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/487.html" title="������·��ѯ" target="_blank">��������·��ѯ</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/488.html" title="������ͨ��·��ѯ" target="_blank">��������ͨ��·��ѯ</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/489.html" title="���е�ͼ��ѯ" target="_blank">�����е�ͼ��ѯ</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/490.html" title="������ע��Ǽ�" target="_blank">��������ע��Ǽ�</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/491.html" title="��Уһ����" target="_blank">����Уһ����</a></td>
        </tr>

<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/493.html" title="���������ͼ۸�" target="_blank">�����������ͼ۸�</a></td>
        </tr>

      </table></td>
    </tr>
  </table></li>
<li class="unblock">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="��" bgcolor="#e2e2e2">
    <tr>
      <td width="150" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">��ˮ����</td>
        </tr>
        <tr>
          <td height="21" align="center" bgcolor="#FFFFFF">�������</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">��������</td>
        </tr>
        <tr>
          <td height="43" align="center" bgcolor="#FFFFFF">ͨѶ����</td>
        </tr>
      </table></td>
      <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="8" cellspacing="1" bgcolor="#e2e2e2">
      	<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/494.html" title="����ˮ�ɷ�" target="_blank">������ˮ�ɷ�</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/495.html" title="����ˮ��װ�����޷���" target="_blank">������ˮ��װ�����޷���</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/496.html" title="�õ籨�޷���" target="_blank">���õ籨�޷���</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/497.html" title="�ʱ��ѯ" target="_blank">���ʱ��ѯ</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/498.html" title="Ӫҵ�����ѯ" target="_blank">��Ӫҵ�����ѯ</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/499.html" title="ͨѶ�Ѳ�ѯ" target="_blank">��ͨѶ�Ѳ�ѯ</a></td>
        </tr>
<tr>
          <td height="15" bgcolor="#FFFFFF"><a href="/baijianshishiwangshangban/2011-10-27/500.html" title="ͨѶ�ѽ���" target="_blank">��ͨѶ�ѽ���</a></td>
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
          <td height="50" align="center" ><a href="[!--news.url--]jiayuxiansheqixingzhengshiyexingshoufeibiaozhunmulu/" target="_blank" title="����������������ҵ���շѱ�׼Ŀ¼"><img src="[!--news.url--]skin/jy/images/l1.gif" alt=" " width="168" height="50" border="0" /></a></td>
        </tr>
      </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;border:1px solid #FFCC99">
        <tr>
          <td height="50" align="center"><a href="[!--news.url--]xingzhengshiyeshoufeimulujibiaozhun/" target="_blank" title="������������ҵ�շ�Ŀ¼����׼"><img src="[!--news.url--]skin/jy/images/l2.gif" width="168" height="50" border="0" /></a></td>
        </tr>
      </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;border:1px solid #FFCC99">
        <tr>
          <td height="50" align="center"><a href="[!--news.url--]jiayuxianxingzhengxukemulu/" target="_blank" title="��������������Ŀ¼"><img src="[!--news.url--]skin/jy/images/l3.gif" width="168" height="50" border="0" /></a></td>
        </tr>
      </table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;border:1px solid #FFCC99">
        <tr>
          <td height="50" align="center"><a href="[!--news.url--]mail/E_LeadMail.asp" target="_blank" title="�س�����"><img src="[!--news.url--]skin/jy/images/l4.gif" width="168" height="50" border="0" /></a></td>
        </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px;border:1px solid #FFCC99">
        <tr>
          <td height="50" align="center"><a href="[!--news.url--]baijianshishiwangshangban/" target="_blank" title="�ټ�ʵ�����ϰ�"><img src="[!--news.url--]skin/jy/images/l5.gif" width="168" height="50" border="0" /></a></td>
        </tr>
      </table>
  
 <table width="168" border="0" cellspacing="0" cellpadding="0" style="margin-bottom:5px; border:1px solid #FFCC99">
        <tr>
          <td height="28" background="[!--news.url--]images/one_bj.png" class="lm_title">
          <table width="168" height="28" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="78" align="center" background="[!--news.url--]skin/jy/images/lm_title_bg.gif" class="lm_title">������Ϣ</td>
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
	    <td height="30" colspan="2" align="center" background="[!--news.url--]skin/jy/images/foot_nav_bg.gif">&nbsp;|&nbsp;<a href="/">��վ��ҳ</a>&nbsp;|&nbsp;<a href="[!--news.url--]baijianshishiwangshangban/" target="_blank">�ټ�ʵ�����ϰ�</a>&nbsp;|&nbsp;<a href="[!--news.url--]mail/E_LeadMail.asp" target="_blank">�س�����</a>&nbsp;|&nbsp;
<a href="[!--news.url--]bbs" target="_blank">��������</a>&nbsp;|&nbsp;</td>
	  </tr>
	  <tr><td height="25"></td></tr>
      <tr>
       <td height="25"><p>Copyright &copy; ���������������칫��  2001-2011</p></td>
      </tr>
      <tr>
        <td height="25"><p><a href="http://www.miibeian.gov.cn/" target="_blank">��ICP��11019422��-1</a></p></td>
      </tr>
      <tr>
        <td height="25"><p>��ַ���������������� ���ʱࣺ437200���������䣺<a href="mailto:jyzw0715@163.com">jyzw0715@163.com</a>&nbsp;</p></td>
      </tr>
      <tr>
        <td height="25"><p>����Ա�绰��0715-6355801 <script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F234f36dff8122bee169172f964b18fc3' type='text/javascript'%3E%3C/script%3E"));
</script>
&nbsp;[<a href="[!--news.url--]mail/login.asp" target="_blank">�س�����</a>]</p></td>
      </tr>
	  <tr><td><a href="http://www.xianning.cyberpolice.cn/" target="_blank"><img src="[!--news.url--]skin/jy/images/jc.gif" width="70" height="65"></a></td>
	  </tr>
    </table>
  </div>

</body>
</html>