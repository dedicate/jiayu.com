<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=$pagetitle?> ��Ϣ���� - ����������</title>
<meta name="keywords" content="<?=$pagetitle?> ��Ϣ����" />
<meta name="description" content="<?=$pagetitle?> ��Ϣ����" />
<style type="text/css">
<!--
body,Table{ color: #222; font-size: 12px; }
a { color: #222; text-decoration: none; }
a:hover { color: #f00; text-decoration: underline; }
h1 { font-size:32px; font-weight: bold; }
h2 { color: #1e3a9e; font-size: 25px; font-weight: bold;  }
.you { color: #1f3a87; font-size: 14px; }
.text { font-size: 14px; padding-left: 5px; padding-right: 5px; line-height: 20px}
.re a { color: #1f3a87; }
.name { color: #1f3a87; }
.name a { color: #1f3a87; text-decoration: underline;}
.retext { background-color: #f3f3f3; width: 100%; float: left; padding-top: 22px; padding-bottom: 22px; border-top: 1px solid #ccc; }
.retext textarea { width: 535px; height: 130px; float: left; margin-left: 60px; border-top-style: inset; border-top-width: 2px; border-left-style: inset; border-left-width: 2px; }
.hrLine{BORDER-BOTTOM: #807d76 1px dotted;}
-->
</style>
<script src="http://www.jiayu.gov.cn/e/data/js/ajax.js"></script>
</head>

<body topmargin="0">
<table width="766" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr>
    <td width="210"><a href="http://www.jiayu.gov.cn/"><img src="http://www.jiayu.gov.cn/skin/default/images/logo.gif" border="0" /></a></td>
    <td><h1>��������</h1></td>
    <td><div align="right"><a href="#tosaypl"><strong><font color="#FF0000">��Ҳ������</font></strong></a></div></td>
  </tr>
</table>
<table width="766" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#222">
  <tr>
    <td height="2"></td>
  </tr>
</table>
<table width="766" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td height="42"> 
      <h2>���ۣ�<a href="<?=$titleurl?>" target="_blank"><font color="#1e3a9e"><?=$title?></font></a></h2></td>
    <td><div align="right"><a href="<?=$titleurl?>" target="_blank">�鿴ԭ��</a></div></td>
  </tr>
</table>
<hr align="center" width="766" size=1 class=hrline>
<table width="766" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#384EA3">
  <form action="../enews/index.php" method="post" name="infopfenform">
    <input type="hidden" name="enews" value="AddInfoPfen" />
    <input type="hidden" name="classid" value="<?=$classid?>" />
    <input type="hidden" name="id" value="<?=$id?>" />
    <tr> 
      <td width="50%" height="27" valign="middle"><font color="#FFFFFF">&nbsp;����: 
        <input type="radio" name="fen" value="1">
        1�� 
        <input type="radio" name="fen" value="2">
        2�� 
        <input name="fen" type="radio" value="3" checked>
        3�� 
        <input type="radio" name="fen" value="4">
        4�� 
        <input type="radio" name="fen" value="5">
        5�� 
        <input type="submit" name="Submit" value="�ύ">
        </font></td>
      <td width="50%" valign="middle"><div align="center"><font color="#FFFFFF">ƽ���÷�: 
          <strong><span id="pfendiv"><?=$pinfopfen?></span></strong> �֣����� <strong><?=$infopfennum?></strong> 
          �˲�������</font></div></td>
    </tr>
  </form>
</table>
<table width="766" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
  <tr> 
    <td height="30" bgcolor="#FFFFFF"> 
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="17%">&nbsp;&nbsp;&nbsp;��������</td>
          <td width="83%"><div align="right"><?=$listpage?>&nbsp;&nbsp;&nbsp;</div></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td bgcolor="#f8fcff"> 
<?php
while($r=$empire->fetch($sql))
{
	$plusername=$r[username];
	if(empty($r[username]))
	{
		$plusername=$fun_r['nomember'];
	}
	if($r[userid])
	{
		$plusername="<a href='$public_r[newsurl]e/space/?userid=$r[userid]' target='_blank'>$r[username]</a>";
	}
	//ip
	$sayip=ToReturnXhIp($r[sayip]);
	//����
	$fr=$empire->fetch1("select * from {$dbtbpre}enewspl_data_".$r[stb]." where plid='$r[plid]'");
	$saytext=RepPltextFace(stripSlashes($fr['saytext']));//�滻����
	$includelink=" onclick=\"javascript:document.saypl.saytext.value+='[quote]".$r[plid]."[/quote]';document.saypl.repid.value='".$r[plid]."';document.saypl.saytext.focus();\"";
?>
 
      <table width="96%" border="0" align="center" cellpadding="3" cellspacing="1" style="word-break:break-all; word-wrap:break-all;">
        <tr> 
          <td height="30"><span class="name">��վ���� <?=$plusername?></span> <font color="#666666">ip:<?=$sayip?></font></td>
          <td><div align="right"><font color="#666666"><?=$r[saytime]?> ����</font></div></td>
        </tr>
        <tr valign="top"> 
          <td height="50" colspan="2" class="text"><?=$saytext?></td>
        </tr>
        <tr> 
          <td height="30">&nbsp;</td>
          <td><div align="right" class="re"><a href="#tosaypl"<?=$includelink?>>�ظ�</a>&nbsp; 
              <a href="JavaScript:makeRequest('../enews/?enews=DoForPl&plid=<?=$r[plid]?>&classid=<?=$classid?>&id=<?=$id?>&dopl=1&doajax=1&ajaxarea=zcpldiv<?=$r[plid]?>','EchoReturnedText','GET','');">֧��</a>[<span id="zcpldiv<?=$r[plid]?>"><?=$r[zcnum]?></span>]&nbsp; 
              <a href="JavaScript:makeRequest('../enews/?enews=DoForPl&plid=<?=$r[plid]?>&classid=<?=$classid?>&id=<?=$id?>&dopl=0&doajax=1&ajaxarea=fdpldiv<?=$r[plid]?>','EchoReturnedText','GET','');">����</a>[<span id="fdpldiv<?=$r[plid]?>"><?=$r[fdnum]?></span>]
            </div></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr>
          <td background="http://www.jiayu.gov.cn/skin/default/images/plhrbg.gif"></td>
        </tr>
      </table>
      
<?
}
?>
 
      <div align="right"><br />
        <?=$listpage?>&nbsp;&nbsp;&nbsp;<br />
        <br />
        <font color="#FF0000">�������۽������ѱ����˿���������������վͬ����۵��֤ʵ������&nbsp;&nbsp;&nbsp;</font><br><br> </div></td>
  </tr>
  <script>
  function CheckPl(obj)
  {
  	if(obj.saytext.value=="")
  	{
  		alert("�������۲���Ϊ��");
  		obj.saytext.focus();
  		return false;
  	}
  	return true;
  }
  </script>
  <form action="../enews/index.php" method="post" name="saypl" id="saypl" onsubmit="return CheckPl(document.saypl)">
  <tr id="tosaypl"> 
    <td bgcolor="#f8fcff"> <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
            <td width="13%" height="28">&nbsp;&nbsp;&nbsp;<span class="you">��Ҳ������</span></td>
            <td valign="middle">�û����� 
              <input name="username" type="text" id="username" size="12" value="<?=$lusername?>" />
            ���룺 
            <input name="password" type="password" id="password" size="12" value="<?=$lpassword?>" />
            ��֤�룺 
            <input name="key" type="text" id="key" size="6" />
              <img src="http://www.jiayu.gov.cn/e/ShowKey/?v=pl" align="middle" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.jiayu.gov.cn/e/member/register/" target="_blank">��û��ע�᣿</a></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td bgcolor="#f8fcff"> <table width="100%" border="0" cellspacing="1" cellpadding="3" class="retext">
        <tr> 
          <td width="78%"><div align="center"> 
              <textarea name="saytext" cols="58" rows="6" id="saytext"></textarea>
            </div></td>
          <td width="22%" rowspan="2"> <div align="center">
              <input name="nomember" type="checkbox" id="nomember" value="1" checked="checked" />
                ��������<br>
                <br />
              <input name="imageField" type="submit" id="imageField" value=" �� �� " />
            </div></td>
        </tr>
        <tr> 
          <td><div align="center"> 
              <script src="http://www.jiayu.gov.cn/d/js/js/plface.js"></script>
            </div></td>
        </tr>
      </table> </td>
  </tr>
  <input name="id" type="hidden" id="id" value="<?=$id?>" />
  <input name="classid" type="hidden" id="classid" value="<?=$classid?>" />
  <input name="enews" type="hidden" id="enews" value="AddPl" />
  <input name="repid" type="hidden" id="repid" value="0" />
  </form>
</table>
<div class="copyright">
    <table width="980" border="0" cellpadding="0" cellspacing="0">
	  <tr>
	    <td height="30" colspan="2" align="center" background="http://www.jiayu.gov.cn/skin/jy/images/foot_nav_bg.gif">&nbsp;|&nbsp;<a href="/">��վ��ҳ</a>&nbsp;|&nbsp;<a href="http://www.jiayu.gov.cn/baijianshishiwangshangban/" target="_blank">�ټ�ʵ�����ϰ�</a>&nbsp;|&nbsp;<a href="http://www.jiayu.gov.cn/mail/E_LeadMail.asp" target="_blank">�س�����</a>&nbsp;|&nbsp;
<a href="http://www.jiayu.gov.cn/bbs" target="_blank">��������</a>&nbsp;|&nbsp;</td>
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
&nbsp;[<a href="http://www.jiayu.gov.cn/mail/login.asp" target="_blank">�س�����</a>]</p></td>
      </tr>
	  <tr><td><a href="http://www.xianning.cyberpolice.cn/" target="_blank"><img src="http://www.jiayu.gov.cn/skin/jy/images/jc.gif" width="70" height="65"></a></td>
	  </tr>
    </table>
  </div>
</body>
</html>