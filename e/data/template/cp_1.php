<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title><?=defined('empirecms')?$r[title]:'�û��������'?> - ���������������Ż���վ</title>
<meta name="keywords" content="<?=defined('empirecms')?$r[title]:'�û��������'?>" />
<meta name="description" content="<?=defined('empirecms')?$r[title]:'�û��������'?>" />
<link href="http://www.jiayu.gov.cn/skin/jy/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://www.jiayu.gov.cn/skin/jy/tabs.js"></script>
</head>
<body class="listpage">
<body onload='e=new Selecter2("t_select_list3");'>
<div class="center bor">
<div class="top">
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="26"><img src="http://www.jiayu.gov.cn/skin/jy/images/top01.gif" width="26" height="25" /></td>
<td width="48">�ء�ί</td>
<td width="26"><img src="http://www.jiayu.gov.cn/skin/jy/images/top02.gif" width="26" height="25" /></td>
<td width="48">���˴�</td>
<td width="26"><img src="http://www.jiayu.gov.cn/skin/jy/images/top02.gif" width="26" height="25" /></td>
<td width="48">������</td>
<td width="26"><img src="http://www.jiayu.gov.cn/skin/jy/images/top03.gif" width="26" height="25" /></td>
<td width="49">����Э</td>
<td width="294">&nbsp;</td>
<td width="389" align="right">
<a href="" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.jiayu.gov.cn');" rel="nofollow">��Ϊ��ҳ</a> |
<a href="javascript:window.external.AddFavorite('http://www.jiayu.gov.cn','����������')" rel="nofollow">�����ղ�</a> | 
<a href="http://www.jiayu.gov.cn/">������ҳ</a>&nbsp;</td>
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
    <td width="80" id="card0" align="center"><a href="http://www.jiayu.gov.cn/" onMouseOver="javascript:switchTab('cardBar','card0');">��ҳ</a></td>
    <td width="100" id="card00" align="center"><a href="http://www.jiayu.gov.cn/jiayuxianqing/"  onMouseOver="javascript:switchTab('cardBar','card00');">��������</a></td>
    <td width="100" id="card1" align="center"><a href="http://www.jiayu.gov.cn/jiayuzhengwu/"  onMouseOver="javascript:switchTab('cardBar','card1');">��������</a></td>
    <td width="100" id="card2" align="center"><a href="http://www.jiayu.gov.cn/zhaoshangyinzi/"  onMouseOver="javascript:switchTab('cardBar','card2');">��������</a></td>
    <td width="100" id="card3" align="center"><a href="http://www.jiayu.gov.cn/fuwulvyouzhe/"  onMouseOver="javascript:switchTab('cardBar','card3');">���ڼ���</a></td>
    <td width="100" id="card5" align="center"><a href="http://www.jiayu.gov.cn/bbs/"  onMouseOver="javascript:switchTab('cardBar','card5');" target="_blank">��������</a></td>
   <td width="100" id="card6" align="center"><a href="http://219.138.168.126:8082/"  onMouseOver="javascript:switchTab('cardBar','card6');" target="_blank">��ί�ٱ���</a></td>
  <td width="200"></td>
  </tr>
</table>

<table width="980" id="cardContent">
  <tr>
  <td align="center">
<div id="Dcard00" class="hackBox">
		| <a href="http://www.jiayu.gov.cn/jiayuxianqing/jiayugailan/">�������</a> |
		<a href="http://www.jiayu.gov.cn/jiayuxianqing/xianyujingji/">���򾭼�</a> |
		<a href="http://www.jiayu.gov.cn/jiayuxianqing/jiayuwenhua/">�����Ļ�</a> |
		</div>
 
<div id="Dcard1" class="hackBox">
		| <a href="http://www.jiayu.gov.cn/jiayuzhengwu/lingdaoxinxi/">�쵼��Ϣ</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/zuzhijigou/">��֯����</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/lingdaojianghua/">�쵼����</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/zhengwudongtai/">����̬</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/zhengfuwenjian/">�����ļ�</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/zhengfugonggao/">��������</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/zhengfugongzuobaogao/">������������</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/xinxigongkaizhinan/">��Ϣ����ָ��</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/xinxigongkaimulu/">��Ϣ����Ŀ¼</a> |
		<a href="http://www.jiayu.gov.cn/jiayuzhengwu/xinxigongkaishenqing/">��Ϣ�������� </a> |
		</div>
        <div id="Dcard2" class="hackBox">
		| <a href="http://www.jiayu.gov.cn/zhaoshangyinzi/zhaoshangdongtai/">���̶�̬</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/touzichengben/">Ͷ�ʳɱ�</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/zhaoshangxiangmu/">������Ŀ</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/zhaoshangfuwu/">���̷���</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/touzihuanjing/">Ͷ�ʻ���</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/touzizhengce/">Ͷ������</a> |
		<a href="http://www.jiayu.gov.cn/zhaoshangyinzi/yuanqujianshe/">԰������</a> |		
		</div>
        <div id="Dcard3" class="hackBox">
		| <a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyouziyuan/">������Դ</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyouguihua/">���ι滮</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyoujingdian/">���ξ���</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyouguanli/">���ι���</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyoujingji/">���ξ���</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/lvyoubaoxian/">���α���</a> |
		<a href="http://www.jiayu.gov.cn/fuwulvyouzhe/tesemeishi/">��ɫ��ʳ</a> |	
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
<form name=search_js1 method=post action='http://www.jiayu.gov.cn/e/search/index.php' onsubmit='return search_check(document.search_js1);'>
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
<table width="100%" border="0" cellspacing="10" cellpadding="0">
<tr valign="top">
<td class="list_content"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="position">
<tr>
<td>���ڵ�λ�ã�<?=$url?>
</td>
</tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="box">
        <tr> 
          <td width="300" valign="top"> 
		  <?php
		  $lguserid=intval(getcvar('mluserid'));//��½�û�ID
		  $lgusername=RepPostVar(getcvar('mlusername'));//��½�û�
		  $lggroupid=intval(getcvar('mlgroupid'));//��Ա��ID
		  if($lggroupid)	//��½��Ա��ʾ�˵�
		  {
		  ?>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
              <tr class="header"> 
                <td height="20" bgcolor="#FFFFFF"> <div align="center"><strong><a href="http://www.jiayu.gov.cn/e/member/cp/">���ܲ˵�</a></strong></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/EditInfo/">�޸�����</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/my/">�ʺ�״̬</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/msg/">վ����Ϣ</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/mspace/SetSpace.php">�ռ�����</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/DoInfo/">������Ϣ</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/fava/">�ղؼ�</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/payapi/">����֧��</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/friend/">�ҵĺ���</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/buybak/">���Ѽ�¼</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/buygroup/">���߳�ֵ</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/card/">�㿨��ֵ</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="#ecms" onclick="window.open('http://www.jiayu.gov.cn/e/ShopSys/buycar/','','width=680,height=500,scrollbars=yes,resizable=yes');">�ҵĹ��ﳵ</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/ShopSys/ListDd/">�ҵĶ���</a></div></td>
              </tr>
			  <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/login/">���µ�½</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/enews/?enews=exit" onclick="return confirm('ȷ��Ҫ�˳�?');">�˳���½</a></div></td>
              </tr>
            </table>
			<?php
			}
			else	//�ο���ʾ�˵�
			{
			?>  
            <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
              <tr class="header"> 
                <td height="20" bgcolor="#FFFFFF"> <div align="center"><strong><a href="http://www.jiayu.gov.cn/e/member/cp/">���ܲ˵�</a></strong></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/login/">��Ա��½</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/member/register/">ע���ʺ�</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="http://www.jiayu.gov.cn/e/DoInfo/">����Ͷ��</a></div></td>
              </tr>
              <tr> 
                <td height="25" bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#EBF3FC'"><div align="center"><a href="#ecms" onclick="window.open('http://www.jiayu.gov.cn/e/ShopSys/buycar/','','width=680,height=500,scrollbars=yes,resizable=yes');">�ҵĹ��ﳵ</a></div></td>
              </tr>
            </table>
			<?php
			}
			?>
			</td>
          <td width="85%" valign="top">