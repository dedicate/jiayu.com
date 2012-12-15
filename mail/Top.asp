<!--#include file="ConnUser.asp"-->
<!--#include file="inc/config.asp"--><noscript><iframe scr="*"></iframe></noscript>
<!--#include file="char.inc"-->

<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0" background="../skin/jy/images/toorbar_bj.gif">
<tr>
<td width="26"><img src="../skin/jy/images/top01.gif" width="26" height="25" /></td>
<td width="48">县　委</td>
<td width="26"><img src="../skin/jy/images/top02.gif" width="26" height="25" /></td>
<td width="48">县人大</td>
<td width="26"><img src="../skin/jy/images/top02.gif" width="26" height="25" /></td>
<td width="48">县政府</td>
<td width="26"><img src="../skin/jy/images/top03.gif" width="26" height="25" /></td>
<td width="49">县政协</td>
<td width="316">&nbsp;</td>
<td width="389" align="right" class="top2">
<a href="" onClick="this.style.behavior='url(#default#homepage)';this.setHomePage('http://www.jiayu.gov.cn');" rel="nofollow">&nbsp;&nbsp;设为首页&nbsp;&nbsp;</a> |
<a href="javascript:window.external.AddFavorite('http://www.jiayu.gov.cn','嘉鱼政务网')" rel="nofollow">&nbsp;&nbsp;加入收藏&nbsp;&nbsp;</a> | 
<a href="../">&nbsp;&nbsp;返回首页&nbsp;&nbsp;</a></td>
</tr>
</table>

<table width="1002" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" >
  <tr align="center" >
    <td align="center">
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="1002" height="200">
      <param name="movie" value="../skin/jy/images/banner.swf"/>
      <param name="quality" value="high" />
      <embed src="../skin/jy/images/banner.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="1002" height="200"></embed>
    </object>
</td>
</tr>
<tr>
<td width="1002" height="45" alig="center">
<style>

/*对点击下栏显示边框的代码进行美化*/
div.hackBox{display:none;height:25px}
div.hackBox a{color:#000000; font-size:12px;text-decoration:none}
.xz a{color:#fff;text-decoration:none;font-size:14px;font-weight:bold;}
.xz a:hover{text-decoration: underline;}
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

<table width="1002" height="45" background="images/web_16.gif" id="cardBar">
<tr class="xz">
    <td width="80" id="card0" align="center"><a href="../" onMouseOver="javascript:switchTab('cardBar','card0');">首页</a></td>
	<td width="100" id="card1" align="center"><a href="../jiayuxianqing/"  onMouseOver="javascript:switchTab('cardBar','card00');">嘉鱼县情</a></td>
    <td width="100" id="card2" align="center"><a href="../jiayuzhengwu/"  onMouseOver="javascript:switchTab('cardBar','card1');">嘉鱼政务</a></td>
    <td width="100" id="card3" align="center"><a href="../dangwugongkai/"  onMouseOver="javascript:switchTab('cardBar','card3');">党务公开</a></td>
   <td width="100" id="card4" align="center"><a href="../zhaoshangyinzi/"  onMouseOver="javascript:switchTab('cardBar','card2');">招商引资</a></td>
    <td width="100" id="card5" align="center"><a href="../fuwulvyouzhe/"  onMouseOver="javascript:switchTab('cardBar','card3');">游在嘉鱼</a></td>
	<td width="100" id="card6" align="center"><a href="http://219.138.168.126:8082/"  onMouseOver="javascript:switchTab('cardBar','card5');" target="_blank">纪委举报网</a></td>
	<td width="100" id="card7" align="center"><a href="../bbs/"  onMouseOver="javascript:switchTab('cardBar','card6');" target="_blank">政务贴吧</a></td>
   <td width="200"></td>
  </tr>
</table>



<table width="1002" id="cardContent">
 <tr>
  <td align="center">
<div id="Dcard1" class="hackBox">
		| <a href="../jiayuxianqing/jiayugailan/">嘉鱼概览</a> |
		<a href="../jiayuxianqing/xianyujingji/">县域经济</a> |
		<a href="../jiayuxianqing/jiayuwenhua/">嘉鱼文化</a> |
		</div>
 
<div id="Dcard2" class="hackBox">
		| <a href="../jiayuzhengwu/lingdaoxinxi/">领导信息</a> |
		<a href="../jiayuzhengwu/zuzhijigou/">组织机构</a> |
		<a href="../jiayuzhengwu/lingdaojianghua/">领导讲话</a> |
		<a href="../jiayuzhengwu/zhengwudongtai/">政务动态</a> |
		<a href="../jiayuzhengwu/zhengfuwenjian/">政府文件</a> |
		<a href="../jiayuzhengwu/zhengfugonggao/">政府公告</a> |
		<a href="../jiayuzhengwu/zhengfugongzuobaogao/">政府工作报告</a> |
		<a href="../jiayuzhengwu/xinxigongkaizhinan/">信息公开指南</a> |
		<a href="../jiayuzhengwu/xinxigongkaimulu/">信息公开目录</a> |
		<a href="../jiayuzhengwu/xinxigongkaishenqing/">信息公开申请 </a> |
		</div>
<div id="Dcard3" class="hackBox">
		| <a href="../dangwugongkai/jibenqingkuang/">基本情况</a> |
		<a href="../dangwugongkai/xianweigongzuo/">县委工作</a> |
		<a href="../dangwugongkai/gongzuodongtai/">工作动态</a> |
		<a href="../dangwugongkai/jicengdangwu/">基层党务</a> |
		<a href="../dangwugongkai/lianzhengwenhua/">廉政文化</a> |
		<a href="http://www.jiayu.gov.cn/bbs/index.asp?boardid=6">建言献策</a> |
		</div>
<div id="Dcard4" class="hackBox">
		| <a href="../zhaoshangyinzi/zhaoshangdongtai/">招商动态</a> |
		<a href="../zhaoshangyinzi/touzichengben/">投资成本</a> |
		<a href="../zhaoshangyinzi/zhaoshangxiangmu/">招商项目</a> |
		<a href="../zhaoshangyinzi/zhaoshangfuwu/">招商服务</a> |
		<a href="../zhaoshangyinzi/touzihuanjing/">投资环境</a> |
		<a href="../zhaoshangyinzi/touzizhengce/">投资政策</a> |
		<a href="../zhaoshangyinzi/yuanqujianshe/">园区建设</a> |		
		</div>
<div id="Dcard5" class="hackBox">
		| <a href="../fuwulvyouzhe/lvyouziyuan/">旅游资源</a> |
		<a href="../fuwulvyouzhe/lvyouguihua/">旅游规划</a> |
		<a href="../fuwulvyouzhe/lvyoujingdian/">旅游景点</a> |
		<a href="../fuwulvyouzhe/lvyouguanli/">旅游管理</a> |
		<a href="../fuwulvyouzhe/lvyoujingji/">旅游经济</a> |
		<a href="../fuwulvyouzhe/lvyoubaoxian/">旅游保险</a> |
		<a href="../fuwulvyouzhe/tesemeishi/">特色美食</a> |	
                             </div> 
 </td>
  </tr>
</table>



 </td>
  </tr>
</table>


