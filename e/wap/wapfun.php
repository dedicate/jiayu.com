<?php
if(!defined('InEmpireCMS'))
{
	exit();
}

//-------- ����ת��
function DoWapIconvVal($str){
	global $phome_ecms_charver,$iconv,$pr;
	if($phome_ecms_charver!='utf-8')
	{
		$char=$phome_ecms_charver=='big5'?'BIG5':'GB2312';
		$targetchar=$pr['wapchar']?'UTF8':'UNICODE';
		$str=$iconv->Convert($char,$targetchar,$str);
	}
	return $str;
}

//-------- ��ʾ��Ϣ
function DoWapShowMsg($error,$returnurl='index.php'){
	DoWapHeader('��ʾ��Ϣ');
?>
<p><?php echo $error;?><br /><a href="<?php echo $returnurl;?>">����</a></p>
<?php
	DoWapFooter();
	exit();
}

//-------- ͷ��
function DoWapHeader($title){
	global $phome_ecms_charver;
	ob_start();
	header("Content-type: text/vnd.wap.wml; charset=utf-8");
	echo'<?xml version="1.0" encoding="UTF-8"?>';
?>

<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">
<wml>
<head>
<meta http-equiv="Cache-Control" content="max-age=180,private" />
</head>
<card id="empirecms_wml" title="<?php echo $title;?>">
<?php
}

//-------- β��
function DoWapFooter(){
?>
<p><br/><small>Powered by EmpireCMS</small></p>
</card></wml>
<?php
	$str=ob_get_contents();
	ob_end_clean();
	echo DoWapIconvVal($str);
}

//-------- ��ҳ
function DoWapListPage($num,$line,$page,$search){
	if(empty($num))
	{
		return '';
	}
	$str='';
	$pagenum=ceil($num/$line);
	$phpself=$_SERVER['PHP_SELF'];
	if($page)//��ҳ
	{
		$str.="<a href=\"".$phpself."?page=0".$search."\">��ҳ</a>&nbsp;";
	}
	if($page)
	{
		$str.="<a href=\"".$phpself."?page=".($page-1).$search."\">��һҳ</a>&nbsp;";
	}
	if($page!=$pagenum-1)
	{
		$str.="<a href=\"".$phpself."?page=".($page+1).$search."\">��һҳ</a>&nbsp;";
	}
	if($page!=$pagenum-1)
	{
		$str.="<a href=\"".$phpself."?page=".($pagenum-1).$search."\">βҳ</a>&nbsp;";
	}
	return $str;
}

//-------- �滻<p> --------
function DoWapRepPtags($text){
	$text=str_replace(array('<p>','<P>','</p>','</P>'),array('','','<br />','<br />'),$text);
	$preg_str="/<(p|P) (.+?)>/is";
	$text=preg_replace($preg_str,"",$text);
	return $text;
}

//-------- �ֶ����� --------
function DoWapRepField($text,$f,$field){
	global $modid,$emod_r;
	if(strstr($emod_r[$modid]['tobrf'],','.$f.','))//��br
	{
		$text=nl2br($text);
	}
	if(!strstr($emod_r[$modid]['dohtmlf'],','.$f.','))//ȥ��html
	{
		$text=htmlspecialchars($text);
	}
	return $text;
}

//-------- ȥ��html���� --------
function DoWapClearHtml($text){
	$text=stripSlashes($text);
	$text=htmlspecialchars(strip_tags($text));
	return $text;
}

//-------- �滻�ֶ�����
function DoWapRepF($text,$f,$field){
	$text=stripSlashes($text);
	$text=DoWapRepPtags($text);
	$text=DoWapRepField($text,$f,$field);
	return $text;
}

//-------- �滻���������ֶ�
function DoWapRepNewstext($text){
	$text=stripSlashes($text);
	$text=DoWapRepPtags($text);
	return $text;
}

//-------- �����ַ�ȥ��
function DoWapCode($string){
	$string=str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string);
	return $string;
}

//-------- ����ʹ��ģ��
function ReturnWapStyle($add,$style){
	global $empire,$dbtbpre,$pr,$class_r;
	$styleid=$pr['wapdefstyle'];
	$classid=0;
	if(WapPage=='index')
	{
		$classid=(int)$add['bclassid'];
	}
	elseif(WapPage=='list')
	{
		$classid=(int)$add['classid'];
	}
	elseif(WapPage=='show')
	{
		$classid=(int)$add['classid'];
	}
	if($classid&&$class_r[$classid]['tbname'])
	{
		$cr=$empire->fetch1("select wapstyleid from {$dbtbpre}enewsclass where classid='$classid'");
		if($cr['wapstyleid'])
		{
			$styleid=$cr['wapstyleid'];
		}
	}
	if($style&&$styleid==$pr['wapdefstyle'])
	{
		$styleid=$style;
	}
	$sr=$empire->fetch1("select path from {$dbtbpre}enewswapstyle where styleid='$styleid'");
	$wapstyle=$sr['path'];
	if(empty($wapstyle))
	{
		$wapstyle=1;
	}
	return $wapstyle;
}


$pr=$empire->fetch1("select wapopen,wapdefstyle,wapshowmid,waplistnum,wapsubtitle,wapshowdate,wapchar from {$dbtbpre}enewspublic limit 1");

//��������ļ�
if($phome_ecms_charver!='utf-8')
{
	@include_once("../class/doiconv.php");
	$iconv=new Chinese('');
}

if(empty($pr['wapopen']))
{
	DoWapShowMsg('��վû�п���WAP����','index.php');
}

$wapstyle=intval($_GET['style']);
//����ʹ��ģ��
$usewapstyle=ReturnWapStyle($_GET,$wapstyle);
if(!file_exists('template/'.$usewapstyle))
{
	$usewapstyle=1;
}
?>