<?php
error_reporting(E_ALL ^ E_NOTICE);

define('InEmpireCMS',TRUE);
define('ECMS_PATH',substr(dirname(__FILE__),0,-7));
define('MAGIC_QUOTES_GPC',function_exists('get_magic_quotes_gpc')&&get_magic_quotes_gpc());

$public_r=array();
$emod_pubr=array();
$etable_r=array();
$emod_r=array();
$notcj_r=array();
$fun_r=array();
$message_r=array();
$qmessage_r=array();
$enews_r=array();
$class_r=array();
$class_zr=array();
$class_tr=array();
$eyh_r=array();
$schalltb_r=array();
$level_r=array();
$r=array();
$addr=array();
$search='';
$start=0;
$addgethtmlpath='';
$editor=0;
$navinfor=array();
$navclassid='';
$navnewsid='';
$formattxt='';
$link='';
$efileftp='';
$efileftp_fr=array();
$efileftp_dr=array();
$doetran=0;

require_once ECMS_PATH.'e/class/config.php';

if(!defined('EmpireCMSConfig'))
{
	exit();
}

//��ʱ����
if($public_r['php_outtime'])
{
	@set_time_limit($public_r['php_outtime']);
}

//ҳ�����
if($phome_headercharset==1)
{
	if($phome_ecms_charver=='gb2312'||$phome_ecms_charver=='big5'||$phome_ecms_charver=='utf-8')
	{
		@header('Content-Type: text/html; charset='.$phome_ecms_charver);
	}
}

//ʱ��
if(function_exists('date_default_timezone_set'))
{
	@date_default_timezone_set("PRC");
}

//��ֹIP
eCheckAccessIp(0);

if(defined('EmpireCMSAdmin'))
{
	eCheckAccessIp(1);//��ֹIP
	//FireWall
	if(!empty($efw_open))
	{
		DoEmpireCMSFireWall();
	}
}
else
{
	if(!empty($public_r['closeqdt']))
	{
		echo $public_r['closeqdtmsg'];
		exit();
	}
}

//--------------- ���ݿ� ---------------

function db_connect(){
	global $phome_db_server,$phome_db_username,$phome_db_password,$phome_db_dbname,$phome_db_port,$phome_db_char,$phome_use_dbver;
	$dblocalhost=$phome_db_server;
	//�˿�
	if($phome_db_port)
	{
		$dblocalhost.=":".$phome_db_port;
	}
	$link=@mysql_connect($dblocalhost,$phome_db_username,$phome_db_password);
	if(!$link)
	{
		echo"Cann't connect to DB!";
		exit();
	}
	//����
	if($phome_use_dbver>='4.1')
	{
		$q='';
		if($phome_db_char)
		{
			$q='character_set_connection='.$phome_db_char.',character_set_results='.$phome_db_char.',character_set_client=binary';
		}
		if($phome_use_dbver>='5.0')
		{
			$q.=(empty($q)?'':',').'sql_mode=\'\'';
		}
		if($q)
		{
			@mysql_query('SET '.$q);
		}
	}
	@mysql_select_db($phome_db_dbname);
	return $link;
}

//���ñ���
function DoSetDbChar($dbchar){
	if($dbchar&&$dbchar!='auto')
	{
		//@mysql_query("set names '".$dbchar."';");
		@mysql_query('set character_set_connection='.$dbchar.',character_set_results='.$dbchar.',character_set_client=binary;');
	}
}

function db_close(){
	global $link;
	if($link)
	{
		@mysql_close($link);
	}
}


//--------------- ���� ---------------

//����COOKIE
function esetcookie($var,$val,$life=0,$ecms=0){
	global $phome_cookiedomain,$phome_cookiepath,$phome_cookievarpre,$phome_cookieadminvarpre;
	$varpre=empty($ecms)?$phome_cookievarpre:$phome_cookieadminvarpre;
	return setcookie($varpre.$var,$val,$life,$phome_cookiepath,$phome_cookiedomain);
}

//����cookie
function getcvar($var,$ecms=0){
	global $phome_cookievarpre,$phome_cookieadminvarpre;
	$tvar=empty($ecms)?$phome_cookievarpre.$var:$phome_cookieadminvarpre.$var;
	return $_COOKIE[$tvar];
}

//������ʾ
function printerror($error="",$gotourl="",$ecms=0,$noautourl=0,$novar=0){
	global $empire,$editor,$ecmslang,$public_r;
	if($editor==1){$a="../";}
	elseif($editor==2){$a="../../";}
	elseif($editor==3){$a="../../../";}
	else{$a="";}
	if($ecms==1||$ecms==9)
	{
		$a=ECMS_PATH.'e/data/';
	}
	if(strstr($gotourl,"(")||empty($gotourl))
	{
		$gotourl_js="history.go(-1)";
		$gotourl="javascript:history.go(-1)";
	}
	else
	{$gotourl_js="self.location.href='$gotourl';";}
	if(empty($error))
	{$error="DbError";}
	if($ecms==9)//ǰ̨�����Ի���
	{
		@include $a.LoadLang("pub/q_message.php");
		$error=empty($novar)?$qmessage_r[$error]:$error;
		echo"<script>alert('".$error."');".$gotourl_js."</script>";
		db_close();
		$empire=null;
		exit();
	}
	elseif($ecms==8)//��̨�����Ի���
	{
		@include $a.LoadLang("pub/message.php");
		$error=empty($novar)?$message_r[$error]:$error;
		echo"<script>alert('".$error."');".$gotourl_js."</script>";
		db_close();
		$empire=null;
		exit();
	}
	elseif($ecms==0)
	{
		@include $a.LoadLang("pub/message.php");
		$error=empty($novar)?$message_r[$error]:$error;
		@include($a."message.php");
	}
	else
	{
		@include $a.LoadLang("pub/q_message.php");
		$error=empty($novar)?$qmessage_r[$error]:$error;
		@include($a."../message/index.php");
	}
	db_close();
	$empire=null;
	exit();
}

//������ʾ2��ֱ������
function printerror2($error='',$gotourl='',$ecms=0,$noautourl=0){
	global $empire,$public_r;
	if(strstr($gotourl,"(")||empty($gotourl))
	{
		$gotourl_js="history.go(-1)";
		$gotourl="javascript:history.go(-1)";
	}
	else
	{$gotourl_js="self.location.href='$gotourl';";}
	if($ecms==9)//�����Ի���
	{
		echo"<script>alert('".$error."');".$gotourl_js."</script>";
	}
	else
	{
		@include(ECMS_PATH.'e/message/index.php');
	}
	db_close();
	exit();
}

//ajax������ʾ
function ajax_printerror($result='',$ajaxarea='ajaxarea',$error='',$ecms=0,$novar=0){
	global $empire,$editor,$ecmslang,$public_r;
	if($editor==1){$a="../";}
	elseif($editor==2){$a="../../";}
	elseif($editor==3){$a="../../../";}
	else{$a="";}
	if($ecms==1)
	{
		$a=ECMS_PATH.'e/data/';
	}
	if($ecms==0)
	{
		@include $a.LoadLang("pub/message.php");
		$error=empty($novar)?$message_r[$error]:$error;
	}
	else
	{
		@include $a.LoadLang("pub/q_message.php");
		$error=empty($novar)?$qmessage_r[$error]:$error;
	}
	if(empty($ajaxarea))
	{
		$ajaxarea='ajaxarea';
	}
	$string=$result.'|'.$ajaxarea.'|'.$error;
	echo $string;
	db_close();
	$empire=null;
	exit();
}

//����ת��
function DoIconvVal($code,$targetcode,$str,$inc=0){
	global $editor;
	if($editor==1){$a="../";}
	elseif($editor==2){$a="../../";}
	elseif($editor==3){$a="../../../";}
	else{$a="";}
	if($inc)
	{
		@include_once(ECMS_PATH."e/class/doiconv.php");
	}
	$iconv=new Chinese($a);
	$str=$iconv->Convert($code,$targetcode,$str);
	return $str;
}

//ģ���ת��
function GetTemptb($temptb){
	global $public_r,$ecmsdeftempid,$dbtbpre;
	if(!empty($ecmsdeftempid))
	{
		$tempid=$ecmsdeftempid;
	}
	else
	{
		$tempid=$public_r['deftempid'];
	}
	if(!empty($tempid)&&$tempid!=1)
	{
		$en="_".$tempid;
	}
	return $dbtbpre.$temptb.$en;
}

//���ز���ģ���
function GetDoTemptb($temptb,$gid){
	global $dbtbpre;
	if(!empty($gid)&&$gid!=1)
	{
		$en="_".$gid;
	}
	return $dbtbpre.$temptb.$en;
}

//���ص�ǰʹ��ģ����ID
function GetDoTempGid(){
	global $ecmsdeftempid,$public_r;
	if($ecmsdeftempid)
	{
		$gid=$ecmsdeftempid;
	}
	elseif($public_r['deftempid'])
	{
		$gid=$public_r['deftempid'];
	}
	else
	{
		$gid=1;
	}
	return $gid;
}

//�������԰�
function LoadLang($file){
	global $ecmslang;
	return "../data/language/".$ecmslang."/".$file;
}

//ȡ��IP
function egetip(){
	if(getenv('HTTP_CLIENT_IP')&&strcasecmp(getenv('HTTP_CLIENT_IP'),'unknown')) 
	{
		$ip=getenv('HTTP_CLIENT_IP');
	} 
	elseif(getenv('HTTP_X_FORWARDED_FOR')&&strcasecmp(getenv('HTTP_X_FORWARDED_FOR'),'unknown'))
	{
		$ip=getenv('HTTP_X_FORWARDED_FOR');
	}
	elseif(getenv('REMOTE_ADDR')&&strcasecmp(getenv('REMOTE_ADDR'),'unknown'))
	{
		$ip=getenv('REMOTE_ADDR');
	}
	elseif(isset($_SERVER['REMOTE_ADDR'])&&$_SERVER['REMOTE_ADDR']&&strcasecmp($_SERVER['REMOTE_ADDR'],'unknown'))
	{
		$ip=$_SERVER['REMOTE_ADDR'];
	}
	$ip=RepPostVar(preg_replace("/^([\d\.]+).*/","\\1",$ip));
	return $ip;
}

//���ص�ַ
function DoingReturnUrl($url,$from=''){
	if(empty($from))
	{
		return $url;
	}
	elseif($from==9)
	{
		$from=$_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:$url;
	}
	return $from;
}

//����������
function RepPostVar($val){
	if($val!=addslashes($val))
	{
		exit();
	}
	CkPostStrChar($val);
	$val=str_replace(" ","",$val);
	$val=str_replace("%20","",$val);
	$val=str_replace("%27","",$val);
	$val=str_replace("*","",$val);
	$val=str_replace("'","",$val);
	$val=str_replace("\"","",$val);
	$val=str_replace("/","",$val);
	$val=str_replace(";","",$val);
	$val=str_replace("#","",$val);
	$val=str_replace("--","",$val);
	$val=RepPostStr($val,1);
	$val=addslashes($val);
	//FireWall
	FWClearGetText($val);
	return $val;
}

//����������2
function RepPostVar2($val){
	if($val!=addslashes($val))
	{
		exit();
	}
	CkPostStrChar($val);
	$val=str_replace("%20","",$val);
	$val=str_replace("%27","",$val);
	$val=str_replace("*","",$val);
	$val=str_replace("'","",$val);
	$val=str_replace("\"","",$val);
	$val=str_replace("/","",$val);
	$val=str_replace(";","",$val);
	$val=str_replace("#","",$val);
	$val=str_replace("--","",$val);
	$val=RepPostStr($val,1);
	$val=addslashes($val);
	//FireWall
	FWClearGetText($val);
	return $val;
}

//�����ύ�ַ�
function RepPostStr($val,$ecms=0){
	$val=htmlspecialchars($val,ENT_QUOTES);
	if($ecms==0)
	{
		CkPostStrChar($val);
		$val=AddAddsData($val);
		//FireWall
		FWClearGetText($val);
	}
	return $val;
}

//�����ύ�ַ�2
function RepPostStr2($val){
	CkPostStrChar($val);
	$val=AddAddsData($val);
	//FireWall
	FWClearGetText($val);
	return $val;
}

//��������ַ�
function CkPostStrChar($val){
	if(substr($val,-1)=="\\")
	{
		exit();
	}
}

//����ת��
function egetzy($n='2'){
	if($n=='rn')
	{
		$str="\r\n";
	}
	elseif($n=='n')
	{
		$str="\n";
	}
	elseif($n=='r')
	{
		$str="\r";
	}
	elseif($n=='t')
	{
		$str="\t";
	}
	elseif($n=='syh')
	{
		$str="\\\"";
	}
	elseif($n=='dyh')
	{
		$str="\'";
	}
	else
	{
		for($i=0;$i<$n;$i++)
		{
			$str.="\\";
		}
	}
	return $str;
}

//ȡ���ļ���չ��
function GetFiletype($filename){
	$filer=explode(".",$filename);
	$count=count($filer)-1;
	return strtolower(".".RepGetFiletype($filer[$count]));
}

function RepGetFiletype($filetype){
	$filetype=str_replace('|','_',$filetype);
	$filetype=str_replace(',','_',$filetype);
	$filetype=str_replace('.','_',$filetype);
	return $filetype;
}

//ȡ���ļ���
function GetFilename($filename){
	if(strstr($filename,"\\"))
	{
		$exp="\\";
	}
	else
	{
		$exp='/';
	}
	$filer=explode($exp,$filename);
	$count=count($filer)-1;
	return $filer[$count];
}

//����Ŀ¼����
function eReturnCPath($path,$ypath=''){
	if(strstr($path,'..')||strstr($path,"\\")||strstr($path,'%')||strstr($path,':'))
	{
		return $ypath;
	}
	return $path;
}

//�ַ���ȡ����
function sub($string,$start=0,$length,$mode=false,$dot=''){
	global $phome_ecms_charver;
	$strlen=strlen($string);
	if($strlen<=$length)
	{
		return $string;
	}

	$string = str_replace(array('&nbsp;','&amp;','&quot;','&lt;','&gt;','&#039;'), array(' ','&','"','<','>',"'"), $string);

	$strcut = '';
	if(strtolower($phome_ecms_charver) == 'utf-8') {

		$n = $tn = $noc = 0;
		while($n < $strlen) {

			$t = ord($string[$n]);
			if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
				$tn = 1; $n++; $noc++;
			} elseif(194 <= $t && $t <= 223) {
				$tn = 2; $n += 2; $noc += 2;
			} elseif(224 <= $t && $t < 239) {
				$tn = 3; $n += 3; $noc += 2;
			} elseif(240 <= $t && $t <= 247) {
				$tn = 4; $n += 4; $noc += 2;
			} elseif(248 <= $t && $t <= 251) {
				$tn = 5; $n += 5; $noc += 2;
			} elseif($t == 252 || $t == 253) {
				$tn = 6; $n += 6; $noc += 2;
			} else {
				$n++;
			}

			if($noc >= $length) {
				break;
			}

		}
		if($noc > $length) {
			$n -= $tn;
		}

		$strcut = substr($string, 0, $n);

	} else {
		for($i = 0; $i < $length; $i++) {
			$strcut .= ord($string[$i]) > 127 ? $string[$i].$string[++$i] : $string[$i];
		}
	}

	$strcut = str_replace(array('&','"','<','>',"'"), array('&amp;','&quot;','&lt;','&gt;','&#039;'), $strcut);

	return $strcut.$dot;
}

//��ȡ����
function esub($string,$length,$dot=''){
	return sub($string,0,$length,false,$dot);
}

//ȡ�������
function make_password($pw_length){
	$low_ascii_bound=50;
	$upper_ascii_bound=122;
	$notuse=array(58,59,60,61,62,63,64,73,79,91,92,93,94,95,96,108,111);
	while($i<$pw_length)
	{
		mt_srand((double)microtime()*1000000);
		$randnum=mt_rand($low_ascii_bound,$upper_ascii_bound);
		if(!in_array($randnum,$notuse))
		{
			$password1=$password1.chr($randnum);
			$i++;
		}
	}
	return $password1;
}

//ȡ�������(����)
function no_make_password($pw_length){
	$low_ascii_bound=48;
	$upper_ascii_bound=57;
	$notuse=array(58,59,60,61,62,63,64,73,79,91,92,93,94,95,96,108,111);
	while($i<$pw_length)
	{
		mt_srand((double)microtime()*1000000);
		$randnum=mt_rand($low_ascii_bound,$upper_ascii_bound);
		if(!in_array($randnum,$notuse))
		{
			$password1=$password1.chr($randnum);
			$i++;
		}
	}
	return $password1;
}

//��ɫתRGB
function ToReturnRGB($rgb){
	$rgb=str_replace('#','',htmlspecialchars($rgb));
    return array(
        base_convert(substr($rgb,0,2),16,10),
        base_convert(substr($rgb,2,2),16,10),
        base_convert(substr($rgb,4,2),16,10)
    );
}

//ǰ̨��ҳ
function page1($num,$line,$page_line,$start,$page,$search){
	global $fun_r;
	if($num<=$line)
	{
		return '';
	}
	$search=htmlspecialchars($search,ENT_QUOTES);
	$url=$_SERVER['PHP_SELF'].'?page';
	$snum=2;//��Сҳ��
	$totalpage=ceil($num/$line);//ȡ����ҳ��
	$firststr='<a title="'.$fun_r['trecord'].'">&nbsp;<b>'.$num.'</b> </a>&nbsp;&nbsp;';
	//��һҳ
	if($page<>0)
	{
		$toppage='<a href="'.$url.'=0'.$search.'">'.$fun_r['startpage'].'</a>&nbsp;';
		$pagepr=$page-1;
		$prepage='<a href="'.$url.'='.$pagepr.$search.'">'.$fun_r['pripage'].'</a>';
	}
	//��һҳ
	if($page!=$totalpage-1)
	{
		$pagenex=$page+1;
		$nextpage='&nbsp;<a href="'.$url.'='.$pagenex.$search.'">'.$fun_r['nextpage'].'</a>';
		$lastpage='&nbsp;<a href="'.$url.'='.($totalpage-1).$search.'">'.$fun_r['lastpage'].'</a>';
	}
	$starti=$page-$snum<0?0:$page-$snum;
	$no=0;
	for($i=$starti;$i<$totalpage&&$no<$page_line;$i++)
	{
		$no++;
		if($page==$i)
		{
			$is_1="<b>";
			$is_2="</b>";
		}
		else
		{
			$is_1='<a href="'.$url.'='.$i.$search.'">';
			$is_2="</a>";
		}
		$pagenum=$i+1;
		$returnstr.="&nbsp;".$is_1.$pagenum.$is_2;
	}
	$returnstr=$firststr.$toppage.$prepage.$returnstr.$nextpage.$lastpage;
	return $returnstr;
}

//ʱ��ת������
function to_time($datetime){
	if(strlen($datetime)==10)
	{
		$datetime.=" 00:00:00";
	}
	$r=explode(" ",$datetime);
	$t=explode("-",$r[0]);
	$k=explode(":",$r[1]);
	$dbtime=@mktime($k[0],$k[1],$k[2],$t[1],$t[2],$t[0]);
	return $dbtime;
}

//ʱ��ת����
function date_time($time,$format="Y-m-d H:i:s"){
	$threadtime=date($format,$time);
	return $threadtime;
}

//��ʽ������
function format_datetime($newstime,$format){
	if($newstime=="0000-00-00 00:00:00")
	{return $newstime;}
	$time=is_numeric($newstime)?$newstime:to_time($newstime);
	$newdate=date_time($time,$format);
	return $newdate;
}

//ʱ��ת������
function to_date($date){
	$date.=" 00:00:00";
	$r=explode(" ",$date);
	$t=explode("-",$r[0]);
	$k=explode(":",$r[1]);
	$dbtime=@mktime($k[0],$k[1],$k[2],$t[1],$t[2],$t[0]);
	return $dbtime;
}

//ѡ��ʱ��
function ToChangeTime($time,$day){
	$truetime=$time-$day*24*3600;
	$date=date_time($truetime,"Y-m-d");
	return $date;
}

//ɾ���ļ�
function DelFiletext($filename){
	@unlink($filename);
}

//ȡ���ļ�����
function ReadFiletext($filepath){
	$filepath=trim($filepath);
	$htmlfp=@fopen($filepath,"r");
	//Զ��
	if(strstr($filepath,"://"))
	{
		while($data=@fread($htmlfp,500000))
	    {
			$string.=$data;
		}
	}
	//����
	else
	{
		$string=@fread($htmlfp,@filesize($filepath));
	}
	@fclose($htmlfp);
	return $string;
}

//д�ļ�
function WriteFiletext($filepath,$string){
	global $public_r;
	$string=stripSlashes($string);
	$fp=@fopen($filepath,"w");
	@fputs($fp,$string);
	@fclose($fp);
	if(empty($public_r[filechmod]))
	{
		@chmod($filepath,0777);
	}
}

//д�ļ�
function WriteFiletext_n($filepath,$string){
	global $public_r;
	$fp=@fopen($filepath,"w");
	@fputs($fp,$string);
	@fclose($fp);
	if(empty($public_r[filechmod]))
	{
		@chmod($filepath,0777);
	}
}

//�������Ժ�
function DoTitleFont($titlefont,$title){
	if(empty($titlefont))
	{
		return $title;
	}
	$r=explode(',',$titlefont);
	if(!empty($r[0]))
	{
		$title="<font color='".$r[0]."'>".$title."</font>";
	}
	if(empty($r[1]))
	{return $title;}
	//����
	if(strstr($r[1],"b"))
	{$title="<strong>".$title."</strong>";}
	//б��
	if(strstr($r[1],"i"))
	{$title="<i>".$title."</i>";}
	//ɾ����
	if(strstr($r[1],"s"))
	{$title="<s>".$title."</s>";}
	return $title;
}

//�滻ȫ�Ƕ���
function DoReplaceQjDh($text){
	return str_replace('��',',',$text);
}

//����Ŀ¼����
function DoMkdir($path){
	global $public_r;
	//����������
	if(!file_exists($path))
	{
		//��ȫģʽ
		if($public_r[phpmode])
		{
			$pr[0]=$path;
			FtpMkdir($ftpid,$pr,0777);
			$mk=1;
		}
		else
		{
			$mk=@mkdir($path,0777);
			@chmod($path,0777);
		}
		if(empty($mk))
		{
			echo $path;
			printerror("CreatePathFail","history.go(-1)");
		}
	}
	return true;
}

//�����ϼ�Ŀ¼
function DoFileMkDir($file){
	$path=dirname($file.'empirecms.txt');
	DoMkdir($path);
}

//�����ϴ��ļ�Ȩ��
function DoChmodFile($file){
	global $public_r;
	if($public_r['filechmod']!=1)
	{
		@chmod($file,0777);
	}
}

//������Ŀ�����ַ���
function ReturnClassLink($classid){
	global $class_r,$public_r,$fun_r;
	if(empty($class_r[$classid][featherclass]))
	{$class_r[$classid][featherclass]="|";}
	$r=explode("|",$class_r[$classid][featherclass].$classid."|");
	$string="<a href=\"".$public_r[newsurl]."\">".$fun_r['index']."</a>";
	for($i=1;$i<count($r)-1;$i++)
	{
		//��̬�б�
		if(empty($class_r[$r[$i]][listdt]))
		{
			//�ް�����
			if(empty($class_r[$r[$i]][classurl]))
			{$url=$public_r[newsurl].$class_r[$r[$i]][classpath]."/";}
			else
			{$url=$class_r[$r[$i]][classurl];}
		}
		else
		{
			$url=$public_r[newsurl]."e/action/ListInfo/?classid=$r[$i]";
		}
		$string.="&nbsp;".$public_r[navfh]."&nbsp;<a href=\"".$url."\">".$class_r[$r[$i]][classname]."</a>";
	}
	return $string;
}

//����ר�������ַ���
function ReturnZtLink($ztid){
	global $class_zr,$public_r,$fun_r;
	$string="<a href=\"".$public_r[newsurl]."\">".$fun_r['index']."</a>";
	//�ް�����
	if(empty($class_zr[$ztid][zturl]))
	{$url=$public_r[newsurl].$class_zr[$ztid][ztpath]."/";}
	else
	{$url=$class_zr[$ztid][zturl];}
    $string.="&nbsp;".$public_r[navfh]."&nbsp;<a href=\"".$url."\">".$class_zr[$ztid][ztname]."</a>";
	return $string;
}

//���ص�ҳ�����ַ���
function ReturnUserPLink($title,$titleurl){
	global $public_r,$fun_r;
	$string='<a href="'.$public_r[newsurl].'">'.$fun_r['index'].'</a>&nbsp;'.$public_r[navfh].'&nbsp;'.$title;
	return $string;
}

//���ر�������
function sys_ReturnBqTitleLink($r){
	global $public_r,$class_r;
	if(empty($r[titleurl]))
	{
		if($class_r[$r[classid]][showdt]==1)//��̬����
		{
			$titleurl=$public_r[newsurl]."e/action/ShowInfo/?classid=$r[classid]&id=$r[id]";
			return $titleurl;
		}
		elseif($class_r[$r[classid]][showdt]==2)
		{
			$titleurl=$public_r[newsurl]."e/action/ShowInfo.php?classid=$r[classid]&id=$r[id]";
			return $titleurl;
		}
		if($class_r[$r[classid]][filename]==3)
		{
			$filename=ReturnInfoSPath($r[filename]);
		}
		else
		{
			$filetype=$r[groupid]?'.php':$class_r[$r[classid]][filetype];
			$filename=$r[filename].$filetype;
		}
		$iclasspath=ReturnSaveInfoPath($r[classid],$r[id]);
		$newspath=empty($r[newspath])?'':$r[newspath]."/";
		if($class_r[$r[classid]][classurl]&&$class_r[$r[classid]][ipath]=='')//����
		{
			$titleurl=$class_r[$r[classid]][classurl]."/".$newspath.$filename;
		}
		else
		{
			$titleurl=$public_r[newsurl].$iclasspath.$newspath.$filename;
		}
	}
	else
	{
		if($public_r['opentitleurl'])
		{
			$titleurl=$r[titleurl];
		}
		else
		{
			$titleurl=$public_r[newsurl]."e/public/jump/?classid=".$r[classid]."&id=".$r[id]."&url=".urlencode($r[titleurl]);
		}
	}
	return $titleurl;
}

//���ر�������
function sys_ReturnBqAutoTitleLink($r){
	global $public_r,$class_r;
	if(empty($r[titleurl]))
	{
		if($class_r[$r[classid]][showdt]==2)
		{
			$titleurl=$public_r[newsurl]."e/action/ShowInfo.php?classid=$r[classid]&id=$r[id]";
			return $titleurl;
		}
		if($class_r[$r[classid]][filename]==3)
		{
			$filename=ReturnInfoSPath($r[filename]);
		}
		else
		{
			$filetype=$r[groupid]?'.php':$class_r[$r[classid]][filetype];
			$filename=$r[filename].$filetype;
		}
		$iclasspath=ReturnSaveInfoPath($r[classid],$r[id]);
		$newspath=empty($r[newspath])?'':$r[newspath]."/";
		if($class_r[$r[classid]][classurl]&&$class_r[$r[classid]][ipath]=='')//����
		{
			$titleurl=$class_r[$r[classid]][classurl]."/".$newspath.$filename;
		}
		else
		{
			$titleurl=$public_r[newsurl].$iclasspath.$newspath.$filename;
		}
	}
	else
	{
		if($public_r['opentitleurl'])
		{
			$titleurl=$r[titleurl];
		}
		else
		{
			$titleurl=$public_r[newsurl]."e/public/jump/?classid=".$r[classid]."&id=".$r[id]."&url=".urlencode($r[titleurl]);
		}
	}
	return $titleurl;
}

//��������ҳ��ַǰ׺
function ReturnInfoPageQz($r){
	global $public_r,$class_r;
	$ret_r['titleurl']='';
	$ret_r['filetype']='';
	$ret_r['nametype']=0;
	//��̬ҳ��
	if($class_r[$r[classid]][showdt]==2)
	{
		$ret_r['titleurl']=$public_r[newsurl]."e/action/ShowInfo.php?classid=$r[classid]&id=$r[id]";
		$ret_r['filetype']='';
		$ret_r['nametype']=1;
		return $ret_r;
	}
	//��̬ҳ��
	$ret_r['filetype']=$r[groupid]?'.php':$class_r[$r[classid]][filetype];
	$filename=$r[filename];
	$iclasspath=ReturnSaveInfoPath($r[classid],$r[id]);
	$newspath=empty($r[newspath])?'':$r[newspath]."/";
	if($class_r[$r[classid]][classurl]&&$class_r[$r[classid]][ipath]=='')//����
	{
		$ret_r['titleurl']=$class_r[$r[classid]][classurl]."/".$newspath.$filename;
	}
	else
	{
		$ret_r['titleurl']=$public_r[newsurl].$iclasspath.$newspath.$filename;
	}
	return $ret_r;
}

//������Ŀ����
function sys_ReturnBqClassname($r,$have_class=0){
	global $public_r,$class_r;
	if($have_class)
	{
		//�ⲿ��Ŀ
		if($class_r[$r[classid]][wburl])
		{
			$classurl=$class_r[$r[classid]][wburl];
		}
		//��̬�б�
		elseif($class_r[$r[classid]][listdt])
		{
			$classurl=$public_r[newsurl]."e/action/ListInfo/?classid=$r[classid]";
		}
		elseif($class_r[$r[classid]][classurl])
		{
			$classurl=$class_r[$r[classid]][classurl];
		}
		else
		{
			$classurl=$public_r[newsurl].$class_r[$r[classid]][classpath]."/";
		}
		if(empty($class_r[$r[classid]][bname]))
		{$classname=$class_r[$r[classid]][classname];}
		else
		{$classname=$class_r[$r[classid]][bname];}
		$myadd="[<a href=".$classurl.">".$classname."</a>]";
		//ֻ��������
		if($have_class==9)
		{$myadd=$classurl;}
	}
	else
	{$myadd="";}
	return $myadd;
}

//����ר������
function sys_ReturnBqZtname($r){
	global $public_r,$class_zr;
	if($class_zr[$r[ztid]][zturl])
	{
		$zturl=$class_zr[$r[ztid]][zturl];
    }
	else
	{
		$zturl=$public_r[newsurl].$class_zr[$r[ztid]][ztpath]."/";
    }
	return $zturl;
}

//�ļ���С��ʽת��
function ChTheFilesize($size){
	if($size>=1024*1024)//MB
	{
		$filesize=number_format($size/(1024*1024),2,'.','')." MB";
	}
	elseif($size>=1024)//KB
	{
		$filesize=number_format($size/1024,2,'.','')." KB";
	}
	else
	{
		$filesize=$size." Bytes";
	}
	return $filesize;
}

//������Ŀ�Զ����ֶ�����
function ReturnClassAddField($classid,$f){
	global $empire,$dbtbpre,$navclassid;
	if(empty($classid))
	{
		$classid=$navclassid;
	}
	$fr=$empire->fetch1("select ".$f." from {$dbtbpre}enewsclassadd where classid='$classid' limit 1");
	if(strstr($f,','))
	{
		return $fr;
	}
	else
	{
		return $fr[$f];
	}
}

//����ר���Զ����ֶ�����
function ReturnZtAddField($classid,$f){
	global $empire,$dbtbpre,$navclassid;
	if(empty($classid))
	{
		$classid=$navclassid;
	}
	$fr=$empire->fetch1("select ".$f." from {$dbtbpre}enewsztadd where ztid='$classid' limit 1");
	if(strstr($f,','))
	{
		return $fr;
	}
	else
	{
		return $fr[$f];
	}
}

//������չ����ֵ
function ReturnPublicAddVar($myvar){
	global $empire,$dbtbpre;
	if(strstr($myvar,','))
	{
		$myvr=explode(',',$myvar);
		$count=count($myvr);
		for($i=0;$i<$count;$i++)
		{
			$v=$myvr[$i];
			$vr=$empire->fetch1("select varvalue from {$dbtbpre}enewspubvar where myvar='$v' limit 1");
			$ret_vr[$v]=$vr['varvalue'];
		}
		return $ret_vr;
	}
	else
	{
		$vr=$empire->fetch1("select varvalue from {$dbtbpre}enewspubvar where myvar='$myvar' limit 1");
		return $vr['varvalue'];
	}
}

//���������ֶ�
function ReturnDoOrderF($mid,$orderby,$myorder){
	global $emod_r;
	$orderby=str_replace(',','',$orderby);
	$orderf=',newstime,id,onclick,totaldown,plnum';
	if(!empty($emod_r[$mid]['orderf']))
	{
		$orderf.=$emod_r[$mid]['orderf'];
	}
	else
	{
		$orderf.=',';
	}
	if(strstr($orderf,','.$orderby.','))
	{
		$rr['returnorder']=$orderby;
		$rr['returnf']=$orderby;
	}
	else
	{
		$rr['returnorder']='newstime';
		$rr['returnf']='newstime';
	}
	if(empty($myorder))
	{
		$rr['returnorder'].=' desc';
	}
	return $rr;
}

//�����ö�
function ReturnSetTopSql($ecms){
	global $public_r;
	if(empty($public_r['settop']))
	{
		return '';
	}
	$top='istop desc,';
	if($ecms=='list')
	{
		if($public_r['settop']==1||$public_r['settop']==4||$public_r['settop']==5||$public_r['settop']==6)
		{
			return $top;
		}
	}
	elseif($ecms=='bq')
	{
		if($public_r['settop']==2||$public_r['settop']==4||$public_r['settop']==5||$public_r['settop']==7)
		{
			return $top;
		}
	}
	elseif($ecms=='js')
	{
		if($public_r['settop']==3||$public_r['settop']==4||$public_r['settop']==6||$public_r['settop']==7)
		{
			return $top;
		}
	}
	return '';
}

//�����Ż�����SQL
function ReturnYhSql($yhid,$yhvar){
	global $eyh_r;
	if(empty($yhid))
	{
		return '';
	}
	$query='';
	if($eyh_r[$yhid][$yhvar])
	{
		$t=time()-($eyh_r[$yhid][$yhvar]*86400);
		$query='newstime>'.$t.' and ';
	}
	return $query;
}

//���ز�ѯ�ֶ�
function ReturnSqlListF($mid){
	global $emod_r;
	if(empty($mid))
	{
		return '*';
	}
	$f='id,classid,onclick,newspath,keyboard,userid,username,ztid,checked,istop,truetime,ismember,userfen,isgood,titlefont,titleurl,filename,groupid,plnum,firsttitle,isqf,totaldown,closepl,lastdotime,infopfen,infopfennum,votenum,stb,ttid,infotags,ispic'.substr($emod_r[$mid]['listtempf'],0,-1);
	return $f;
}

//�����滻�б�
function ReturnReplaceListF($mid){
	global $emod_r;
	$r['mid']=$mid;
	$r['fr']=explode(',',$emod_r[$mid]['listtempf']);
	$r['fcount']=count($r['fr'])-1;
	return $r;
}

//�滻�б�ģ��/��ǩģ��/����ģ��
function ReplaceListVars($no,$listtemp,$subnews,$subtitle,$formatdate,$url,$haveclass=0,$r,$field,$docode=0){
	global $empire,$public_r,$class_r,$class_zr,$fun_r,$dbtbpre,$emod_r,$class_tr,$level_r,$navclassid,$etable_r;
	if($haveclass)
	{
		$add=sys_ReturnBqClassname($r,$haveclass);
	}
	if(empty($r[oldtitle]))
	{
		$r[oldtitle]=$r[title];
	}
	if($docode==1)
	{
		$listtemp=stripSlashes($listtemp);
		eval($listtemp);
	}
	$ylisttemp=$listtemp;
	$mid=$field['mid'];
	$fr=$field['fr'];
	$fcount=$field['fcount'];
	for($i=1;$i<$fcount;$i++)
	{
		$f=$fr[$i];
		$value=$r[$f];
		$spf=0;
		if($f=='title')//����
		{
	        if(!empty($subtitle))//��ȡ�ַ�
	        {
				$value=sub($value,0,$subtitle,false);
	        }
			$value=DoTitleFont($r[titlefont],$value);
			$spf=1;
		}
		elseif($f=='newstime')//ʱ��
		{
			//$value=date($formatdate,$value);
			$value=format_datetime($value,$formatdate);
			$spf=1;
		}
		elseif($f=='titlepic')//����ͼƬ
		{
			if(empty($value))
		    {
				$value=$public_r[newsurl].'e/data/images/notimg.gif';
			}
			$spf=1;
		}
		elseif(strstr($emod_r[$mid]['smalltextf'],','.$f.','))//���
		{
			if(!empty($subnews))//��ȡ�ַ�
			{
				$value=sub($value,0,$subnews,false);
			}
		}
		elseif($f=='befrom')//��Ϣ��Դ
		{
			$spf=1;
		}
		elseif($f=='writer')//����
		{
			$spf=1;
		}
		if($spf==0&&!strstr($emod_r[$mid]['editorf'],','.$f.','))
		{
			if(strstr($emod_r[$mid]['tobrf'],','.$f.','))//��br
			{
				$value=nl2br($value);
			}
			if(!strstr($emod_r[$mid]['dohtmlf'],','.$f.','))//ȥ��html
			{
				$value=RepFieldtextNbsp(htmlspecialchars($value));
			}
		}
		$listtemp=str_replace('[!--'.$f.'--]',$value,$listtemp);
	}
	$titleurl=sys_ReturnBqTitleLink($r);//����
	$listtemp=str_replace('[!--id--]',$r[id],$listtemp);
	$listtemp=str_replace('[!--classid--]',$r[classid],$listtemp);
	$listtemp=str_replace('[!--class.name--]',$add,$listtemp);
	$listtemp=str_replace('[!--ttid--]',$r[ttid],$listtemp);
	$listtemp=str_replace('[!--tt.name--]',$class_tr[$r[ttid]][tname],$listtemp);
	$listtemp=str_replace('[!--userfen--]',$r[userfen],$listtemp);
	$listtemp=str_replace('[!--titleurl--]',$titleurl,$listtemp);
	$listtemp=str_replace('[!--no.num--]',$no,$listtemp);
	$listtemp=str_replace('[!--plnum--]',$r[plnum],$listtemp);
	$listtemp=str_replace('[!--userid--]',$r[userid],$listtemp);
	$listtemp=str_replace('[!--username--]',$r[username],$listtemp);
	$listtemp=str_replace('[!--onclick--]',$r[onclick],$listtemp);
	$listtemp=str_replace('[!--oldtitle--]',$r[oldtitle],$listtemp);
	$listtemp=str_replace('[!--totaldown--]',$r[totaldown],$listtemp);
	//��Ŀ����
	if(strstr($ylisttemp,'[!--this.classlink--]'))
	{
		$thisclasslink=sys_ReturnBqClassname($r,9);
		$listtemp=str_replace('[!--this.classlink--]',$thisclasslink,$listtemp);
	}
	$thisclassname=$class_r[$r[classid]][bname]?$class_r[$r[classid]][bname]:$class_r[$r[classid]][classname];
	$listtemp=str_replace('[!--this.classname--]',$thisclassname,$listtemp);
	return $listtemp;
}

//���Ϸ������ַ�
function AddNotCopyRndStr($text){
	global $public_r;
	if($public_r['opencopytext'])
	{
		$rnd=make_password(3).$public_r['sitename'];
		$text=str_replace("<br />","<span style=\"display:none\">".$rnd."</span><br />",$text);
		$text=str_replace("</p>","<span style=\"display:none\">".$rnd."</span></p>",$text);
	}
	return $text;
}

//�滻��Ϣ��Դ
function ReplaceBefrom($befrom){
	global $empire,$dbtbpre;
	if(empty($befrom))
	{return $befrom;}
	$befrom=addslashes($befrom);
	$r=$empire->fetch1("select befromid,sitename,siteurl from {$dbtbpre}enewsbefrom where sitename='$befrom' limit 1");
	if(empty($r[befromid]))
	{return $befrom;}
	$return_befrom="<a href='".$r[siteurl]."' target=_blank>".$r[sitename]."</a>";
	return $return_befrom;
}

//�滻����
function ReplaceWriter($writer){
	global $empire,$dbtbpre;
	if(empty($writer))
	{return $writer;}
	$writer=addslashes($writer);
	$r=$empire->fetch1("select wid,writer,email from {$dbtbpre}enewswriter where writer='$writer' limit 1");
	if(empty($r[wid])||empty($r[email]))
	{
		return $writer;
	}
	$return_writer="<a href='".$r[email]."'>".$r[writer]."</a>";
	return $return_writer;
}

//�������ؼ�¼
function BakDown($classid,$id,$pathid,$userid,$username,$title,$cardfen,$online=0){
	global $empire,$dbtbpre;
	$truetime=time();
	$id=(int)$id;
	$pathid=(int)$pathid;
	$userid=(int)$userid;
	$cardfen=(int)$cardfen;
	$classid=(int)$classid;
	$sql=$empire->query("insert into {$dbtbpre}enewsdownrecord(id,pathid,userid,username,title,cardfen,truetime,classid,online) values($id,$pathid,$userid,'$username','".addslashes($title)."',$cardfen,$truetime,$classid,'$online');");
}

//���ݳ�ֵ��¼
function BakBuy($userid,$username,$buyname,$userfen,$money,$userdate,$type=0){
	global $empire,$dbtbpre;
	$buytime=date("y-m-d H:i:s");
	$buyname=addslashes($buyname);
	$empire->query("insert into {$dbtbpre}enewsbuybak(userid,username,card_no,cardfen,money,buytime,userdate,type) values('$userid','$username','$buyname','$userfen','$money','$buytime','$userdate','$type');");
}

//��ȡ���
function SubSmalltextVal($value,$len){
	if(empty($len))
	{
		return '';
	}
	$value=str_replace(array("\r\n","<br />","<br>","&nbsp;","[!--empirenews.page--]","[/!--empirenews.page--]"),array("","\r\n","\r\n"," ","",""),$value);
	$value=strip_tags($value);
	if($len)
	{
		$value=sub($value,0,$len,false);
	}
	$value=trim($value,"\r\n");
	$value=str_replace('&amp;ldquo;','&ldquo;',$value);
	$value=str_replace('&amp;rdquo;','&rdquo;',$value);
	$value=str_replace('&amp;mdash;','&mdash;',$value);
	return $value;
}

//ȫվ�������
function SubSchallSmalltext($value,$len){
	$value=str_replace(array("\r\n","&nbsp;","[!--empirenews.page--]","[/!--empirenews.page--]"),array("","","",""),$value);
	$value=strip_tags($value);
	if($len)
	{
		$value=sub($value,0,$len,false);
	}
	$value=trim($value,"\r\n");
	return $value;
}

//�Ӻ��滻
function DoReplaceFontRed($text,$key){
	return str_replace($key,'<font color="red">'.$key.'</font>',$text);
}

//���ز�����html����Ŀ
function ReturnNreInfoWhere(){
	global $public_r;
	if(empty($public_r['nreinfo'])||$public_r['nreinfo']==',')
	{
		return '';
	}
	$cids=substr($public_r['nreinfo'],1,strlen($public_r['nreinfo'])-2);
	$where=' and classid not in ('.$cids.')';
	return $where;
}

//���ر�ǩ��������Ŀ
function ReturnNottoBqWhere(){
	global $public_r;
	if(empty($public_r['nottobq'])||$public_r['nottobq']==',')
	{
		return '';
	}
	$cids=substr($public_r['nottobq'],1,strlen($public_r['nottobq'])-2);
	$where=' and classid not in ('.$cids.')';
	return $where;
}

//�����ļ�������չ��
function ReturnCFiletype($file){
	$r=explode('.',$file);
	$count=count($r)-1;
	$re['filetype']=strtolower($r[$count]);
	$re['filename']=substr($file,0,strlen($file)-strlen($re['filetype'])-1);
	return $re;
}

//������ĿĿ¼
function ReturnSaveClassPath($classid,$f=0){
	global $class_r;
	$classpath=$class_r[$classid][classpath];
	if($f==1){
		$classpath.="/index".$class_r[$classid][classtype];
	}
	return $classpath;
}

//����ר��Ŀ¼
function ReturnSaveZtPath($classid,$f=0){
	global $class_zr;
	$classpath=$class_zr[$classid][ztpath];
	if($f==1){
		$classpath.="/index".$class_zr[$classid][zttype];
	}
	return $classpath;
}

//������ҳ�ļ�
function ReturnSaveIndexFile(){
	global $public_r;
	$file="index".$public_r[indextype];
	return $file;
}

//��������ҳ���Ŀ¼
function ReturnSaveInfoPath($classid,$id){
	global $class_r;
	if($class_r[$classid][ipath]==''){
		$path=$class_r[$classid][classpath].'/';
	}
	else{
		$path=$class_r[$classid][ipath]=='/'?'':$class_r[$classid][ipath].'/';
	}
	return $path;
}

//��������ҳ�ļ���
function GetInfoFilename($classid,$id){
	global $empire,$dbtbpre,$public_r,$class_r;
	$infor=$empire->fetch1("select titleurl,groupid,classid,newspath,filename,id from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' limit 1");
	if(!$infor['id']||$infor['titleurl'])
	{
		return '';
	}
	$filetype=$infor['groupid']?'.php':$class_r[$classid]['filetype'];
	$iclasspath=ReturnSaveInfoPath($classid,$id);
	$doclasspath=ECMS_PATH.$iclasspath;
	$newspath='';
	if($infor['newspath'])
	{
		$newspath=$infor['newspath'].'/';
	}
	$file=$doclasspath.$newspath.$infor['filename'].$filetype;
	return $file;
}

//��ʽ����ϢĿ¼
function FormatPath($classid,$mynewspath,$enews=0){
	global $class_r;
	if($enews)
	{
		$newspath=$mynewspath;
	}
	else
	{
		$newspath=date($class_r[$classid][newspath]);
	}
	if(empty($newspath))
	{
		return "";
	}
	$path=ECMS_PATH.ReturnSaveInfoPath($classid,$id);
	$returnpath="";
	$r=explode("/",$newspath);
	$count=count($r);
	for($i=0;$i<$count;$i++){
		if($i>0)
		{
			$returnpath.="/".$r[$i];
		}
		else
		{
			$returnpath.=$r[$i];
		}
		$createpath=$path.$returnpath;
		$mk=DoMkdir($createpath);
		if(empty($mk))
		{
			printerror("CreatePathFail","");
		}
	}
	return $returnpath;
}

//��������ҳĿ¼
function ReturnInfoSPath($filename){
	return str_replace('/index','',$filename);
}

//------------- ���� -------------

//���ظ���������ַ
function eReturnFileUrl($ecms=0){
	global $public_r;
	if($ecms==1)
	{
		return $public_r['fileurl'];
	}
	$fileurl=$public_r['openfileserver']?$public_r['fs_purl']:$public_r['fileurl'];
	return $fileurl;
}

//���ظ���Ŀ¼
function ReturnFileSavePath($classid,$fpath=''){
	global $public_r,$class_r;
	$fpath=$fpath||strstr(','.$fpath.',',',0,')?$fpath:$public_r['fpath'];
	$efileurl=eReturnFileUrl();
	if($fpath==1)//pĿ¼
	{
		$r['filepath']='d/file/p/';
		$r['fileurl']=$efileurl.'p/';
	}
	elseif($fpath==2)//fileĿ¼
	{
		$r['filepath']='d/file/';
		$r['fileurl']=$efileurl;
	}
	else
	{
		if(empty($classid))
		{
			$r['filepath']='d/file/p/';
			$r['fileurl']=$efileurl.'p/';
		}
		else
		{
			$r['filepath']='d/file/'.$class_r[$classid][classpath].'/';
			$r['fileurl']=$efileurl.$class_r[$classid][classpath].'/';
		}
	}
	return $r;
}

//��ʽ������Ŀ¼
function FormatFilePath($classid,$mynewspath,$enews=0){
	global $public_r;
	if($enews)
	{
		$newspath=$mynewspath;
	}
	else
	{
		$newspath=date($public_r['filepath']);
	}
	if(empty($newspath))
	{
		return "";
	}
	$fspath=ReturnFileSavePath($classid);
	$path=ECMS_PATH.$fspath['filepath'];
	$returnpath="";
	$r=explode("/",$newspath);
	$count=count($r);
	for($i=0;$i<$count;$i++){
		if($i>0){
			$returnpath.="/".$r[$i];
		}
		else{
			$returnpath.=$r[$i];
		}
		$createpath=$path.$returnpath;
		$mk=DoMkdir($createpath);
		if(empty($mk)){
			printerror("CreatePathFail","");
		}
	}
	return $returnpath;
}

//�����ϴ��ļ���
function ReturnDoTranFilename($file_name,$classid){
	$filename=md5(uniqid(microtime()));
	return $filename;
}

//�ϴ��ļ�
function DoTranFile($file,$file_name,$file_type,$file_size,$classid,$ecms=0){
	global $public_r,$class_r,$doetran,$efileftp_fr;
	//�ļ�����
	$r[filetype]=GetFiletype($file_name);
	//�ļ���
	$r[insertfile]=ReturnDoTranFilename($file_name,$classid);
	$r[filename]=$r[insertfile].$r[filetype];
	//����Ŀ¼
	$r[filepath]=FormatFilePath($classid,$mynewspath,0);
	$filepath=$r[filepath]?$r[filepath].'/':$r[filepath];
	//���Ŀ¼
	$fspath=ReturnFileSavePath($classid);
	$r[savepath]=ECMS_PATH.$fspath['filepath'].$filepath;
	//������ַ
	$r[url]=$fspath['fileurl'].$filepath.$r[filename];
	//��ͼ�ļ�
	$r[name]=$r[savepath]."small".$r[insertfile];
	//�����ļ�
	$r[yname]=$r[savepath].$r[filename];
	$r[tran]=1;
	//��֤����
	if(CheckSaveTranFiletype($r[filetype]))
	{
		if($doetran)
		{
			$r[tran]=0;
			return $r;
		}
		else
		{
			printerror('TranFail','',$ecms);
		}
	}
	//�ϴ��ļ�
	$cp=@move_uploaded_file($file,$r[yname]);
	if(empty($cp))
	{
		if($doetran)
		{
			$r[tran]=0;
			return $r;
		}
		else
		{
			printerror('TranFail','',$ecms);
		}
	}
	DoChmodFile($r[yname]);
	$r[filesize]=(int)$file_size;
	//FileServer
	if($public_r['openfileserver'])
	{
		$efileftp_fr[]=$r['yname'];
	}
	return $r;
}

//Զ�̱�����Ե�ַ
function CheckNotSaveUrl($url){
	global $public_r;
	if(empty($public_r['notsaveurl']))
	{
		return 0;
    }
	$r=explode("\r\n",$public_r['notsaveurl']);
	$count=count($r);
	$re=0;
	for($i=0;$i<$count;$i++)
	{
		if(empty($r[$i]))
		{continue;}
		if(stristr($url,$r[$i]))
		{
			$re=1;
			break;
	    }
    }
	return $re;
}

//Զ�̱���
function DoTranUrl($url,$classid){
	global $public_r,$class_r,$tranpicturetype,$tranflashtype,$mediaplayertype,$realplayertype,$efileftp_fr;
	//�����ַ
	$url=trim($url);
	$url=str_replace(" ","%20",$url);
    $r[tran]=1;
	//������ַ
	$r[url]=$url;
	//�ļ�����
	$r[filetype]=GetFiletype($url);
	if(CheckSaveTranFiletype($r[filetype]))
	{
		$r[tran]=0;
		return $r;
	}
	//�Ƿ����ϴ����ļ�
	$havetr=CheckNotSaveUrl($url);
	if($havetr)
	{
		$r[tran]=0;
		return $r;
	}
	$string=ReadFiletext($url);
	if(empty($string))//��ȡ����
	{
		$r[tran]=0;
		return $r;
	}
	//�ļ���
	$r[insertfile]=ReturnDoTranFilename($file_name,$classid);
	$r[filename]=$r[insertfile].$r[filetype];
	//����Ŀ¼
	$r[filepath]=FormatFilePath($classid,$mynewspath,0);
	$filepath=$r[filepath]?$r[filepath].'/':$r[filepath];
	//���Ŀ¼
	$fspath=ReturnFileSavePath($classid);
	$r[savepath]=ECMS_PATH.$fspath['filepath'].$filepath;
	//������ַ
	$r[url]=$fspath['fileurl'].$filepath.$r[filename];
	//��ͼ�ļ�
	$r[name]=$r[savepath]."small".$r[insertfile];
	//�����ļ�
	$r[yname]=$r[savepath].$r[filename];
	WriteFiletext_n($r[yname],$string);
	$r[filesize]=@filesize($r[yname]);
	//��������
	if(strstr($tranflashtype,','.$r[filetype].','))
	{
		$r[type]=2;
	}
	elseif(strstr($tranpicturetype,','.$r[filetype].','))
	{
		$r[type]=1;
	}
	elseif(strstr($mediaplayertype,','.$r[filetype].',')||strstr($realplayertype,','.$r[filetype].','))//��ý��
	{
		$r[type]=3;
	}
	else
	{
		$r[type]=0;
	}
	//FileServer
	if($public_r['openfileserver'])
	{
		$efileftp_fr[]=$r['yname'];
	}
	return $r;
}

//ɾ������
function DoDelFile($r){
	global $class_r,$public_r,$efileftp_dr;
	$path=$r['path']?$r['path'].'/':$r['path'];
	$fspath=ReturnFileSavePath($r[classid],$r[fpath]);
	$delfile=ECMS_PATH.$fspath['filepath'].$path.$r['filename'];
	DelFiletext($delfile);
	//FileServer
	if($public_r['openfileserver'])
	{
		$efileftp_dr[]=$delfile;
	}
}

//�滻��ǰ׺
function RepSqlTbpre($sql){
	global $dbtbpre;
	$sql=str_replace('[!db.pre!]',$dbtbpre,$sql);
	return $sql;
}

//���滻��ǰ׺
function ReRepSqlTbpre($sql){
	global $dbtbpre;
	$sql=str_replace($dbtbpre,'***_',$sql);
	return $sql;
}

//ʱ��ת��
function ToChangeUseTime($time){
	global $fun_r;
	$usetime=time()-$time;
	if($usetime<60)
	{
		$tstr=$usetime.$fun_r['TimeSecond'];
	}
	else
	{
		$usetime=round($usetime/60);
		$tstr=$usetime.$fun_r['TimeMinute'];
	}
	return $tstr;
}

//������Ŀ����
function ReturnClass($sonclass){
	if($sonclass==''||$sonclass=='|'){
		return 'classid=0';
	}
	$where='classid in ('.RepSonclassSql($sonclass).')';
	return $where;
}

//�滻����Ŀ��
function RepSonclassSql($sonclass){
	if($sonclass==''||$sonclass=='|'){
		return 0;
	}
	$sonclass=substr($sonclass,1,strlen($sonclass)-2);
	$sonclass=str_replace('|',',',$sonclass);
	return $sonclass;
}

//���ض���Ŀ
function sys_ReturnMoreClass($sonclass,$son=0){
	global $class_r;
	$r=explode(',',$sonclass);
	$count=count($r);
	$return_r[0]=intval($r[0]);
	$where='';
	$or='';
	for($i=0;$i<$count;$i++)
	{
		$r[$i]=intval($r[$i]);
		if($son==1)
		{
			if($class_r[$r[$i]]['tbname']&&!$class_r[$r[$i]]['islast'])
			{
				$where.=$or."classid in (".RepSonclassSql($class_r[$r[$i]]['sonclass']).")";
			}
			else
			{
				$where.=$or."classid='".$r[$i]."'";
			}
		}
		else
		{
			$where.=$or."classid='".$r[$i]."'";
		}
		$or=' or ';
	}
	$return_r[1]=$where;
	return $return_r;
}

//���ض�ר��
function sys_ReturnMoreZt($zt){
	$r=explode(',',$zt);
	$count=count($r);
	$return_r[0]=intval($r[0]);
	$where='';
	$or='';
	for($i=0;$i<$count;$i++)
	{
		$r[$i]=intval($r[$i]);
		$where.=$or."ztid like '%|".$r[$i]."|%'";
		$or=' or ';
	}
	$return_r[1]=$where;
	return $return_r;
}

//���ض�������
function sys_ReturnMoreTT($tt){
	$r=explode(',',$tt);
	$count=count($r);
	$return_r[0]=intval($r[0]);
	$ids='';
	$dh='';
	for($i=0;$i<$count;$i++)
	{
		$r[$i]=intval($r[$i]);
		$ids.=$dh.$r[$i];
		$dh=',';
	}
	$return_r[1]='ttid in ('.$ids.')';
	return $return_r;
}

//��֤�Ƿ������Ŀ
function CheckHaveInClassid($cr,$checkclass){
	global $class_r;
	if($cr['islast'])
	{
		$chclass='|'.$cr['classid'].'|';
	}
	else
	{
		$chclass=$cr['sonclass'];
	}
	$return=0;
	$r=explode('|',$chclass);
	$count=count($r);
	for($i=1;$i<$count-1;$i++)
	{
		if(strstr($checkclass,'|'.$r[$i].'|'))
		{
			$return=1;
			break;
		}
	}
	return $return;
}

//���ؼ�ǰ׺�����ص�ַ
function ReturnDownQzPath($path,$urlid){
	global $empire,$dbtbpre;
	$urlid=(int)$urlid;
	if(empty($urlid))
	{
		$re['repath']=$path;
		$re['downtype']=0;
    }
	else
	{
		$r=$empire->fetch1("select urlid,url,downtype from {$dbtbpre}enewsdownurlqz where urlid='$urlid'");
		if($r['urlid'])
		{
			$re['repath']=$r['url'].$path;
		}
		else
		{
			$re['repath']=$path;
		}
		$re['downtype']=$r['downtype'];
	}
	return $re;
}

//���ش��������ľ��Ե�ַ
function ReturnDSofturl($downurl,$qz,$path='../../',$isdown=0){
	$urlr=ReturnDownQzPath(stripSlashes($downurl),$qz);
	$url=$urlr['repath'];
	@include_once(ECMS_PATH."e/class/enpath.php");//������
	if($isdown)
	{
		$url=DoEnDownpath($url);
	}
	else
	{
		$url=DoEnOnlinepath($url);
	}
	return $url;
}

//��֤�ύ��Դ
function CheckCanPostUrl(){
	global $public_r;
	if($public_r['canposturl'])
	{
		$r=explode("\r\n",$public_r['canposturl']);
		$count=count($r);
		$b=0;
		for($i=0;$i<$count;$i++)
		{
			if(strstr($_SERVER['HTTP_REFERER'],$r[$i]))
			{
				$b=1;
				break;
			}
		}
		if($b==0)
		{
			printerror('NotCanPostUrl','',1);
		}
	}
}

//��֤IP
function eCheckAccessIp($ecms=0){
	global $public_r;
	$userip=egetip();
	if($ecms)//��̨
	{
		//����IP
		if($public_r['hopenip'])
		{
			$close=1;
			foreach(explode("\n",$public_r['hopenip']) as $ctrlip)
			{
				if(preg_match("/^(".preg_quote(($ctrlip=trim($ctrlip)),'/').")/",$userip))
				{
					$close=0;
					break;
				}
			}
			if($close==1)
			{
				echo"Ip<font color='#cccccc'>(".$userip.")</font> be prohibited.";
				exit();
			}
		}
	}
	else
	{
		//����IP
		if($public_r['openip'])
		{
			$close=1;
			foreach(explode("\n",$public_r['openip']) as $ctrlip)
			{
				if(preg_match("/^(".preg_quote(($ctrlip=trim($ctrlip)),'/').")/",$userip))
				{
					$close=0;
					break;
				}
			}
			if($close==1)
			{
				echo"Ip<font color='#cccccc'>(".$userip.")</font> be prohibited.";
				exit();
			}
		}
		//��ֹIP
		if($public_r['closeip'])
		{
			foreach(explode("\n",$public_r['closeip']) as $ctrlip)
			{
				if(preg_match("/^(".preg_quote(($ctrlip=trim($ctrlip)),'/').")/",$userip))
				{
					echo"Ip<font color='#cccccc'>(".$userip.")</font> be prohibited.";
					exit();
				}
			}
		}
	}
}

//��֤�ύIP
function eCheckAccessDoIp($doing){
	global $public_r,$empire,$dbtbpre;
	$pr=$empire->fetch1("select opendoip,closedoip,doiptype from {$dbtbpre}enewspublic limit 1");
	if(!strstr($pr['doiptype'],','.$doing.','))
	{
		return '';
	}
	$userip=egetip();
	//����IP
	if($pr['opendoip'])
	{
		$close=1;
		foreach(explode("\n",$pr['opendoip']) as $ctrlip)
		{
			if(preg_match("/^(".preg_quote(($ctrlip=trim($ctrlip)),'/').")/",$userip))
			{
				$close=0;
				break;
			}
		}
		if($close==1)
		{
			printerror('NotCanPostIp','history.go(-1)',1);
		}
	}
	//��ֹIP
	if($pr['closedoip'])
	{
		foreach(explode("\n",$pr['closedoip']) as $ctrlip)
		{
			if(preg_match("/^(".preg_quote(($ctrlip=trim($ctrlip)),'/').")/",$userip))
			{
				printerror('NotCanPostIp','history.go(-1)',1);
			}
		}
	}
}

//��֤�Ƿ�ر����ģ��
function eCheckCloseMods($mod){
	global $public_r;
	if(strstr($public_r['closemods'],','.$mod.','))
	{
		echo $mod.' is close';
		exit();
	}
}

//��֤�����ַ�
function toCheckCloseWord($word,$closestr,$mess){
	if($closestr&&$closestr!='|')
	{
		$checkr=explode('|',$closestr);
		$ckcount=count($checkr);
		for($i=0;$i<$ckcount;$i++)
		{
			if($checkr[$i]&&stristr($word,$checkr[$i]))
			{
				printerror($mess,"history.go(-1)",1);
			}
		}
	}
}

//�滻���۱���
function RepPltextFace($text){
	global $public_r;
	if(empty($public_r['plface'])||$public_r['plface']=='||')
	{
		return $text;
	}
	$facer=explode('||',$public_r['plface']);
	$count=count($facer);
	for($i=1;$i<$count-1;$i++)
	{
		$r=explode('##',$facer[$i]);
		$text=str_replace($r[0],"<img src='".$public_r['newsurl']."e/data/face/".$r[1]."' border=0>",$text);
	}
	return $text;
}

//�滻�ո�
function RepFieldtextNbsp($text){
	return str_replace(array("\t",'   ','  '),array('&nbsp; &nbsp; &nbsp; &nbsp; ','&nbsp; &nbsp;','&nbsp;&nbsp;'),$text);
}

//������չ����֤
function CheckSaveTranFiletype($filetype){
	$savetranfiletype=',.php,.php3,.php4,.php5,.php6,.asp,.aspx,.jsp,.cgi,.phtml,.asa,.asax,.fcgi,.pl,.ascx,.ashx,.cer,.cdx,.pht,.shtml,.shtm,.stm,';
	if(stristr($savetranfiletype,','.$filetype.','))
	{
		return true;
	}
	return false;
}

//������֤��
function ecmsSetShowKey($varname,$val,$ecms=0){
	global $public_r;
	$time=time();
	$checkpass=md5(md5($val.'EmpireCMS'.$time).$public_r['keyrnd']);
	$key=$time.','.$checkpass.','.$val;
	esetcookie($varname,$key,0,$ecms);
}

//�����֤��
function ecmsCheckShowKey($varname,$postval,$dopr,$ecms=0){
	global $public_r;
	$r=explode(',',getcvar($varname,$ecms));
	$cktime=$r[0];
	$pass=$r[1];
	$val=$r[2];
	$time=time();
	if($cktime>$time||$time-$cktime>$public_r['keytime']*60)
	{
		printerror('OutKeytime','',$dopr);
	}
	if(empty($postval)||$postval<>$val)
	{
		printerror('FailKey','',$dopr);
	}
	$checkpass=md5(md5($postval.'EmpireCMS'.$cktime).$public_r['keyrnd']);
	if($checkpass<>$pass)
	{
		printerror('FailKey','',$dopr);
	}
}

//�����֤��
function ecmsEmptyShowKey($varname,$ecms=0){
	esetcookie($varname,'',0,$ecms);
}

//�����ύ��
function DoSetActionPass($userid,$username,$rnd,$other,$ecms=0){
	global $phome_cookieckrnd;
	$varname='actionepass';
	$date=date("Y-m-d-H");
	$pass=md5(md5($rnd.'-'.$userid.'-'.$date.'-'.$other).$phome_cookieckrnd.$username);
	esetcookie($varname,$pass,0,$ecms);
}

//����ύ��
function DoEmptyActionPass($ecms=0){
	$varname='actionepass';
	esetcookie($varname,'',0,$ecms);
}

//����ύ��
function DoCheckActionPass($userid,$username,$rnd,$other,$ecms=0){
	global $phome_cookieckrnd;
	$varname='actionepass';
	$date=date("Y-m-d-H");
	$checkpass=md5(md5($rnd.'-'.$userid.'-'.$date.'-'.$other).$phome_cookieckrnd.$username);
	$pass=getcvar($varname,$ecms);
	if($checkpass<>$pass)
	{
		exit();
	}
}

//�����ֶα�ʶ
function toReturnFname($tbname,$f){
	global $empire,$dbtbpre;
	$r=$empire->fetch1("select fname from {$dbtbpre}enewsf where f='$f' and tbname='$tbname' limit 1");
	return $r[fname];
}

//����ƴ��
function ReturnPinyinFun($hz){
	global $phome_ecms_charver;
	include_once(ECMS_PATH.'e/class/epinyin.php');
	//����
	if($phome_ecms_charver!='gb2312')
	{
		include_once(ECMS_PATH.'e/class/doiconv.php');
		$iconv=new Chinese('');
		$char=$phome_ecms_charver=='big5'?'BIG5':'UTF8';
		$targetchar='GB2312';
		$hz=$iconv->Convert($char,$targetchar,$hz);
	}
	return c($hz);
}

//ȡ����ĸ
function GetInfoZm($hz){
	if(!trim($hz))
	{
		return '';
	}
	$py=ReturnPinyinFun($hz);
	$zm=substr($py,0,1);
	return strtoupper($zm);
}

//���ؼ��ܺ��IP
function ToReturnXhIp($ip,$n=1){
	$newip='';
	$ipr=explode(".",$ip);
	$ipnum=count($ipr);
	for($i=0;$i<$ipnum;$i++)
	{
		if($i!=0)
		{$d=".";}
		if($i==$ipnum-1)
		{
			$ipr[$i]="*";
		}
		if($n==2)
		{
			if($i==$ipnum-2)
			{
				$ipr[$i]="*";
			}
		}
		$newip.=$d.$ipr[$i];
	}
	return $newip;
}

//���ص�ǰ����
function eReturnDomain(){
	$domain=$_SERVER['HTTP_HOST'];
	if(empty($domain))
	{
		return '';
	}
	return 'http://'.$domain;
}

//����������վ��ַ
function eReturnDomainSiteUrl(){
	global $public_r;
	$PayReturnUrlQz=$public_r['newsurl'];
	if(!stristr($public_r['newsurl'],'://'))
	{
		$PayReturnUrlQz=eReturnDomain().$public_r['newsurl'];
	}
	return $PayReturnUrlQz;
}

//EMAIL��ַ���
function chemail($email){
	$chars = "/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$/i";
    if (strpos($email, '@') !== false && strpos($email, '.') !== false)
    {
        if (preg_match($chars, $email))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    else
    {
        return false;
    }
}

//ȥ��adds
function ClearAddsData($data){
	if(MAGIC_QUOTES_GPC)
	{
		$data=stripSlashes($data);
	}
	return $data;
}

//����adds
function AddAddsData($data){
	if(!MAGIC_QUOTES_GPC)
	{
		$data=addslashes($data);
	}
	return $data;
}

//ԭ�ַ�adds
function StripAddsData($data){
	$data=addslashes(stripSlashes($data));
	return $data;
}

//------- ���ı� -------

//��ȡ�ı��ֶ�����
function GetTxtFieldText($pagetexturl){
	global $do_txtpath;
	if(empty($pagetexturl))
	{
		return '';
	}
	$file=$do_txtpath.$pagetexturl.".php";
	$text=ReadFiletext($file);
	$text=substr($text,12);//ȥ��exit
	return $text;
}

//ȡ���ı���ַ
function GetTxtFieldTextUrl($pagetexturl){
	global $do_txtpath;
	$file=$do_txtpath.$pagetexturl.".php";
	return $file;
}

//�޸��ı��ֶ�����
function EditTxtFieldText($pagetexturl,$pagetext){
	global $do_txtpath;
	$pagetext="<? exit();?>".$pagetext;
	$file=$do_txtpath.$pagetexturl.".php";
	WriteFiletext_n($file,$pagetext);
}

//ɾ���ı��ֶ�����
function DelTxtFieldText($pagetexturl){
	global $do_txtpath;
	if(empty($pagetexturl))
	{
		return '';
	}
	$file=$do_txtpath.$pagetexturl.".php";
	DelFiletext($file);
}

//ȡ�������
function GetFileMd5(){
	$p=md5(uniqid(microtime()));
	return $p;
}

//�������Ŀ¼
function MkDirTxtFile($date,$file){
	global $do_txtpath;
	$r=explode("/",$date);
	$path=$do_txtpath.$r[0];
	DoMkdir($path);
	$path=$do_txtpath.$date;
	DoMkdir($path);
	$returnpath=$date."/".$file;
	return $returnpath;
}

//�滻�������
function ReplaceSvars($temp,$url,$classid,$title,$key,$des,$add,$repvar=1){
	global $public_r,$class_r,$class_zr;
	if($repvar==1)//ȫ��ģ�����
	{
		$temp=ReplaceTempvar($temp);
	}
	$temp=str_replace('[!--class.menu--]',$public_r['classnavs'],$temp);//��Ŀ����
	$temp=str_replace('[!--newsnav--]',$url,$temp);//λ�õ���
	$temp=str_replace('[!--pagetitle--]',$title,$temp);
	$temp=str_replace('[!--pagekey--]',$key,$temp);
	$temp=str_replace('[!--pagedes--]',$des,$temp);
	$temp=str_replace('[!--self.classid--]',0,$temp);
	$temp=str_replace('[!--news.url--]',$public_r['newsurl'],$temp);
	return $temp;
}

//������������ַ�
function eReturnRDataStr($r){
	$count=count($r);
	if(!$count)
	{
		return '';
	}
	$str=',';
	for($i=0;$i<$count;$i++)
	{
		$str.=$r[$i].',';
	}
	return $str;
}

//------- firewall -------

//��ʾ
function FWShowMsg($msg){
	//echo $msg;
	exit();
}

//����ǽ
function DoEmpireCMSFireWall(){
	global $efw_open,$efw_pass,$efw_adminloginurl,$efw_adminhour,$efw_adminweek,$efw_adminckpassvar,$efw_adminckpassval;
	if(!empty($efw_adminloginurl))
	{
		$usehost=FWeReturnDomain();
		if($usehost!=$efw_adminloginurl)
		{
			FWShowMsg('Login Url');
		}
	}
	if($efw_adminhour!=='')
	{
		$h=date('G');
		if(!strstr(','.$efw_adminhour.',',','.$h.','))
		{
			FWShowMsg('Admin Hour');
		}
	}
	if($efw_adminweek!=='')
	{
		$w=date('w');
		if(!strstr(','.$efw_adminweek.',',','.$w.','))
		{
			FWShowMsg('Admin Week');
		}
	}
	if(!defined('EmpireCMSAPage')&&$efw_adminckpassvar&&$efw_adminckpassval)
	{
		FWCheckPassword();
	}
}

//���ص�ǰ����
function FWeReturnDomain(){
	$domain=$_SERVER['HTTP_HOST'];
	if(empty($domain))
	{
		return '';
	}
	return 'http://'.$domain;
}

//��������ַ�
function FWClearGetText($str){
	global $efw_open,$efw_cleargettext;
	if(empty($efw_open))
	{
		return '';
	}
	if(empty($efw_cleargettext))
	{
		return '';
	}
	$r=explode(',',$efw_cleargettext);
	$count=count($r);
	for($i=0;$i<$count;$i++)
	{
		if(stristr($str,$r[$i]))
		{
			FWShowMsg('Post String');
		}
	}
}

//��̨����ǽ����
function FWSetPassword(){
	global $do_ckhloginip,$efw_open,$efw_pass,$efw_adminckpassvar,$efw_adminckpassval;
	if(!$efw_open||!$efw_adminckpassvar||!$efw_adminckpassval)
	{
		return '';
	}
	$ip=$do_ckhloginip==0?'127.0.0.1':egetip();
	$ecmsckpass=md5(md5($efw_adminckpassval.'-empirecms-'.$efw_pass).'-'.$ip.'-'.$efw_adminckpassval.'-phome.net-');
	esetcookie($efw_adminckpassvar,$ecmsckpass,0,1);
}

function FWCheckPassword(){
	global $do_ckhloginip,$efw_open,$efw_pass,$efw_adminckpassvar,$efw_adminckpassval;
	if(!$efw_open||!$efw_adminckpassvar||!$efw_adminckpassval)
	{
		return '';
	}
	$ip=$do_ckhloginip==0?'127.0.0.1':egetip();
	$ecmsckpass=md5(md5($efw_adminckpassval.'-empirecms-'.$efw_pass).'-'.$ip.'-'.$efw_adminckpassval.'-phome.net-');
	if($ecmsckpass<>getcvar($efw_adminckpassvar,1))
	{
		FWShowMsg('Password');
	}
}

function FWEmptyPassword(){
	global $efw_adminckpassvar;
	esetcookie($efw_adminckpassvar,'',0,1);
}
?>