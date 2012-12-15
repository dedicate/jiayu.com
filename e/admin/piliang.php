<?php
require("../class/connect.php");
include("../class/db_sql.php");
include("../class/config.php");
include("../class/classfun.php");
include("../class/functions.php");
$link=db_connect();
$empire=new mysqlquery();
/*
 * Erhao插件
 * 功能： 批量添加栏目
*/
//验证用户
$lur=is_login();
$logininid=$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];
//验证权限
CheckLevel($logininid,$loginin,$classid,"class");
$enews=$_GET['enews'];

$action = $_POST[action];
$fangshi = $_POST[RadioGroup1];
echo " ";
if($action){
	if ($fangshi == 3){$d=array(
  array("a",-20319),
  array("a",-20317),
  array("a",-20304),
  array("a",-20295),
  array("a",-20292),
  array("b",-20283),
  array("b",-20265),
  array("b",-20257),
  array("b",-20242),
  array("b",-20230),
  array("b",-20051),
  array("b",-20036),
  array("b",-20032),
  array("b",-20026),
  array("b",-20002),
  array("b",-19990),
  array("b",-19986),
  array("b",-19982),
  array("b",-19976),
  array("b",-19805),
  array("b",-19784),
  array("c",-19775),
  array("c",-19774),
  array("c",-19763),
  array("c",-19756),
  array("c",-19751),
  array("c",-19746),
  array("c",-19741),
  array("ch",-19739),
  array("ch",-19728),
  array("ch",-19725),
  array("ch",-19715),
  array("ch",-19540),
  array("ch",-19531),
  array("ch",-19525),
  array("ch",-19515),
  array("ch",-19500),
  array("ch",-19484),
  array("ch",-19479),
  array("ch",-19467),
  array("ch",-19289),
  array("ch",-19288),
  array("ch",-19281),
  array("ch",-19275),
  array("ch",-19270),
  array("ch",-19263),
  array("c",-19261),
  array("c",-19249),
  array("c",-19243),
  array("c",-19242),
  array("c",-19238),
  array("c",-19235),
  array("c",-19227),
  array("c",-19224),
  array("d",-19218),
  array("d",-19212),
  array("d",-19038),
  array("d",-19023),
  array("d",-19018),
  array("d",-19006),
  array("d",-19003),
  array("d",-18996),
  array("d",-18977),
  array("d",-18961),
  array("d",-18952),
  array("d",-18783),
  array("d",-18774),
  array("d",-18773),
  array("d",-18763),
  array("d",-18756),
  array("d",-18741),
  array("d",-18735),
  array("d",-18731),
  array("d",-18722),
  array("e",-18710),
  array("e",-18697),
  array("e",-18696),
  array("f",-18526),
  array("f",-18518),
  array("f",-18501),
  array("f",-18490),
  array("f",-18478),
  array("f",-18463),
  array("f",-18448),
  array("f",-18447),
  array("f",-18446),
  array("g",-18239),
  array("g",-18237),
  array("g",-18231),
  array("g",-18220),
  array("g",-18211),
  array("g",-18201),
  array("g",-18184),
  array("g",-18183),
  array("g",-18181),
  array("g",-18012),
  array("g",-17997),
  array("g",-17988),
  array("g",-17970),
  array("g",-17964),
  array("g",-17961),
  array("g",-17950),
  array("g",-17947),
  array("g",-17931),
  array("g",-17928),
  array("h",-17922),
  array("h",-17759),
  array("h",-17752),
  array("h",-17733),
  array("h",-17730),
  array("h",-17721),
  array("h",-17703),
  array("h",-17701),
  array("h",-17697),
  array("h",-17692),
  array("h",-17683),
  array("h",-17676),
  array("h",-17496),
  array("h",-17487),
  array("h",-17482),
  array("h",-17468),
  array("h",-17454),
  array("h",-17433),
  array("h",-17427),
  array("j",-17417),
  array("j",-17202),
  array("j",-17185),
  array("j",-16983),
  array("j",-16970),
  array("j",-16942),
  array("j",-16915),
  array("j",-16733),
  array("j",-16708),
  array("j",-16706),
  array("j",-16689),
  array("j",-16664),
  array("j",-16657),
  array("j",-16647),
  array("k",-16474),
  array("k",-16470),
  array("k",-16465),
  array("k",-16459),
  array("k",-16452),
  array("k",-16448),
  array("k",-16433),
  array("k",-16429),
  array("k",-16427),
  array("k",-16423),
  array("k",-16419),
  array("k",-16412),
  array("k",-16407),
  array("k",-16403),
  array("k",-16401),
  array("k",-16393),
  array("k",-16220),
  array("k",-16216),
  array("l",-16212),
  array("l",-16205),
  array("l",-16202),
  array("l",-16187),
  array("l",-16180),
  array("l",-16171),
  array("l",-16169),
  array("l",-16158),
  array("l",-16155),
  array("l",-15959),
  array("l",-15958),
  array("l",-15944),
  array("l",-15933),
  array("l",-15920),
  array("l",-15915),
  array("l",-15903),
  array("l",-15889),
  array("l",-15878),
  array("l",-15707),
  array("l",-15701),
  array("l",-15681),
  array("l",-15667),
  array("l",-15661),
  array("l",-15659),
  array("l",-15652),
  array("m",-15640),
  array("m",-15631),
  array("m",-15625),
  array("m",-15454),
  array("m",-15448),
  array("m",-15436),
  array("m",-15435),
  array("m",-15419),
  array("m",-15416),
  array("m",-15408),
  array("m",-15394),
  array("m",-15385),
  array("m",-15377),
  array("m",-15375),
  array("m",-15369),
  array("m",-15363),
  array("m",-15362),
  array("m",-15183),
  array("m",-15180),
  array("n",-15165),
  array("n",-15158),
  array("n",-15153),
  array("n",-15150),
  array("n",-15149),
  array("n",-15144),
  array("n",-15143),
  array("n",-15141),
  array("n",-15140),
  array("n",-15139),
  array("n",-15128),
  array("n",-15121),
  array("n",-15119),
  array("n",-15117),
  array("n",-15110),
  array("n",-15109),
  array("n",-14941),
  array("n",-14937),
  array("n",-14933),
  array("n",-14930),
  array("n",-14929),
  array("n",-14928),
  array("n",-14926),
  array("o",-14922),
  array("o",-14921),
  array("p",-14914),
  array("p",-14908),
  array("p",-14902),
  array("p",-14894),
  array("p",-14889),
  array("p",-14882),
  array("p",-14873),
  array("p",-14871),
  array("p",-14857),
  array("p",-14678),
  array("p",-14674),
  array("p",-14670),
  array("p",-14668),
  array("p",-14663),
  array("p",-14654),
  array("p",-14645),
  array("q",-14630),
  array("q",-14594),
  array("q",-14429),
  array("q",-14407),
  array("q",-14399),
  array("q",-14384),
  array("q",-14379),
  array("q",-14368),
  array("q",-14355),
  array("q",-14353),
  array("q",-14345),
  array("q",-14170),
  array("q",-14159),
  array("q",-14151),
  array("r",-14149),
  array("r",-14145),
  array("r",-14140),
  array("r",-14137),
  array("r",-14135),
  array("r",-14125),
  array("r",-14123),
  array("r",-14122),
  array("r",-14112),
  array("r",-14109),
  array("r",-14099),
  array("r",-14097),
  array("r",-14094),
  array("r",-14092),
  array("s",-14090),
  array("s",-14087),
  array("s",-14083),
  array("s",-13917),
  array("s",-13914),
  array("s",-13910),
  array("s",-13907),
  array("s",-13906),
  array("sh",-13905),
  array("sh",-13896),
  array("sh",-13894),
  array("sh",-13878),
  array("sh",-13870),
  array("sh",-13859),
  array("sh",-13847),
  array("sh",-13831),
  array("sh",-13658),
  array("sh",-13611),
  array("sh",-13601),
  array("sh",-13406),
  array("sh",-13404),
  array("sh",-13400),
  array("sh",-13398),
  array("sh",-13395),
  array("sh",-13391),
  array("sh",-13387),
  array("s",-13383),
  array("s",-13367),
  array("s",-13359),
  array("s",-13356),
  array("s",-13343),
  array("s",-13340),
  array("s",-13329),
  array("s",-13326),
  array("t",-13318),
  array("t",-13147),
  array("t",-13138),
  array("t",-13120),
  array("t",-13107),
  array("t",-13096),
  array("t",-13095),
  array("t",-13091),
  array("t",-13076),
  array("t",-13068),
  array("t",-13063),
  array("t",-13060),
  array("t",-12888),
  array("t",-12875),
  array("t",-12871),
  array("t",-12860),
  array("t",-12858),
  array("t",-12852),
  array("t",-12849),
  array("w",-12838),
  array("w",-12831),
  array("w",-12829),
  array("w",-12812),
  array("w",-12802),
  array("w",-12607),
  array("w",-12597),
  array("w",-12594),
  array("w",-12585),
  array("x",-12556),
  array("x",-12359),
  array("x",-12346),
  array("x",-12320),
  array("x",-12300),
  array("x",-12120),
  array("x",-12099),
  array("x",-12089),
  array("x",-12074),
  array("x",-12067),
  array("x",-12058),
  array("x",-12039),
  array("x",-11867),
  array("x",-11861),
  array("y",-11847),
  array("y",-11831),
  array("y",-11798),
  array("y",-11781),
  array("y",-11604),
  array("y",-11589),
  array("y",-11536),
  array("y",-11358),
  array("y",-11340),
  array("y",-11339),
  array("y",-11324),
  array("y",-11303),
  array("y",-11097),
  array("y",-11077),
  array("y",-11067),
  array("z",-11055),
  array("z",-11052),
  array("z",-11045),
  array("z",-11041),
  array("z",-11038),
  array("z",-11024),
  array("z",-11020),
  array("z",-11019),
  array("z",-11018),
  array("zh",-11014),
  array("zh",-10838),
  array("zh",-10832),
  array("zh",-10815),
  array("zh",-10800),
  array("zh",-10790),
  array("zh",-10780),
  array("zh",-10764),
  array("zh",-10587),
  array("zh",-10544),
  array("zh",-10533),
  array("zh",-10519),
  array("zh",-10331),
  array("zh",-10329),
  array("zh",-10328),
  array("zh",-10322),
  array("zh",-10315),
  array("zh",-10309),
  array("zh",-10307),
  array("z",-10296),
  array("z",-10281),
  array("z",-10274),
  array("z",-10270),
  array("z",-10262),
  array("z",-10260),
  array("z",-10256),
  array("z",-10254)
 );}
 	else if(($fangshi == 1) or ($fangshi == 2)) {
$d=array(array("a",-20319),array("ai",-20317),array("an",-20304),array("ang",-20295),array("ao",-20292),array("ba",-20283),array("bai",-20265),array("ban",-20257),array("bang",-20242),array("bao",-20230),array("bei",-20051),array("ben",-20036),array("beng",-20032),array("bi",-20026),array("bian",-20002),array("biao",-19990),array("bie",-19986),array("bin",-19982),array("bing",-19976),array("bo",-19805),array("bu",-19784),array("ca",-19775),array("cai",-19774),array("can",-19763),array("cang",-19756),array("cao",-19751),array("ce",-19746),array("ceng",-19741),array("cha",-19739),array("chai",-19728),array("chan",-19725),array("chang",-19715),array("chao",-19540),array("che",-19531),array("chen",-19525),array("cheng",-19515),array("chi",-19500),array("chong",-19484),array("chou",-19479),array("chu",-19467),array("chuai",-19289),array("chuan",-19288),array("chuang",-19281),array("chui",-19275),array("chun",-19270),array("chuo",-19263),array("ci",-19261),array("cong",-19249),array("cou",-19243),array("cu",-19242),array("cuan",-19238),array("cui",-19235),array("cun",-19227),array("cuo",-19224),array("da",-19218),array("dai",-19212),array("dan",-19038),array("dang",-19023),array("dao",-19018),array("de",-19006),array("deng",-19003),array("di",-18996),array("dian",-18977),array("diao",-18961),array("die",-18952),array("ding",-18783),array("diu",-18774),array("dong",-18773),array("dou",-18763),array("du",-18756),array("duan",-18741),array("dui",-18735),array("dun",-18731),array("duo",-18722),array("e",-18710),array("en",-18697),array("er",-18696),array("fa",-18526),array("fan",-18518),array("fang",-18501),array("fei",-18490),array("fen",-18478),array("feng",-18463),array("fo",-18448),array("fou",-18447),array("fu",-18446),array("ga",-18239),array("gai",-18237),array("gan",-18231),array("gang",-18220),array("gao",-18211),array("ge",-18201),array("gei",-18184),array("gen",-18183),array("geng",-18181),array("gong",-18012),array("gou",-17997),array("gu",-17988),array("gua",-17970),array("guai",-17964),array("guan",-17961),array("guang",-17950),array("gui",-17947),array("gun",-17931),array("guo",-17928),array("ha",-17922),array("hai",-17759),array("han",-17752),array("hang",-17733),array("hao",-17730),array("he",-17721),array("hei",-17703),array("hen",-17701),array("heng",-17697),array("hong",-17692),array("hou",-17683),array("hu",-17676),array("hua",-17496),array("huai",-17487),array("huan",-17482),array("huang",-17468),array("hui",-17454),array("hun",-17433),array("huo",-17427),array("ji",-17417),array("jia",-17202),array("jian",-17185),array("jiang",-16983),array("jiao",-16970),array("jie",-16942),array("jin",-16915),array("jing",-16733),array("jiong",-16708),array("jiu",-16706),array("ju",-16689),array("juan",-16664),array("jue",-16657),array("jun",-16647),array("ka",-16474),array("kai",-16470),array("kan",-16465),array("kang",-16459),array("kao",-16452),array("ke",-16448),array("ken",-16433),array("keng",-16429),array("kong",-16427),array("kou",-16423),array("ku",-16419),array("kua",-16412),array("kuai",-16407),array("kuan",-16403),array("kuang",-16401),array("kui",-16393),array("kun",-16220),array("kuo",-16216),array("la",-16212),array("lai",-16205),array("lan",-16202),array("lang",-16187),array("lao",-16180),array("le",-16171),array("lei",-16169),array("leng",-16158),array("li",-16155),array("lia",-15959),array("lian",-15958),array("liang",-15944),array("liao",-15933),array("lie",-15920),array("lin",-15915),array("ling",-15903),array("liu",-15889),array("long",-15878),array("lou",-15707),array("lu",-15701),array("lv",-15681),array("luan",-15667),array("lue",-15661),array("lun",-15659),array("luo",-15652),array("ma",-15640),array("mai",-15631),array("man",-15625),array("mang",-15454),array("mao",-15448),array("me",-15436),array("mei",-15435),array("men",-15419),array("meng",-15416),array("mi",-15408),array("mian",-15394),array("miao",-15385),array("mie",-15377),array("min",-15375),array("ming",-15369),array("miu",-15363),array("mo",-15362),array("mou",-15183),array("mu",-15180),array("na",-15165),array("nai",-15158),array("nan",-15153),array("nang",-15150),array("nao",-15149),array("ne",-15144),array("nei",-15143),array("nen",-15141),array("neng",-15140),array("ni",-15139),array("nian",-15128),array("niang",-15121),array("niao",-15119),array("nie",-15117),array("nin",-15110),array("ning",-15109),array("niu",-14941),array("nong",-14937),array("nu",-14933),array("nv",-14930),array("nuan",-14929),array("nue",-14928),array("nuo",-14926),array("o",-14922),array("ou",-14921),array("pa",-14914),array("pai",-14908),array("pan",-14902),array("pang",-14894),array("pao",-14889),array("pei",-14882),array("pen",-14873),array("peng",-14871),array("pi",-14857),array("pian",-14678),array("piao",-14674),array("pie",-14670),array("pin",-14668),array("ping",-14663),array("po",-14654),array("pu",-14645),array("qi",-14630),array("qia",-14594),array("qian",-14429),array("qiang",-14407),array("qiao",-14399),array("qie",-14384),array("qin",-14379),array("qing",-14368),array("qiong",-14355),array("qiu",-14353),array("qu",-14345),array("quan",-14170),array("que",-14159),array("qun",-14151),array("ran",-14149),array("rang",-14145),array("rao",-14140),array("re",-14137),array("ren",-14135),array("reng",-14125),array("ri",-14123),array("rong",-14122),array("rou",-14112),array("ru",-14109),array("ruan",-14099),array("rui",-14097),array("run",-14094),array("ruo",-14092),array("sa",-14090),array("sai",-14087),array("san",-14083),array("sang",-13917),array("sao",-13914),array("se",-13910),array("sen",-13907),array("seng",-13906),array("sha",-13905),array("shai",-13896),array("shan",-13894),array("shang",-13878),array("shao",-13870),array("she",-13859),array("shen",-13847),array("sheng",-13831),array("shi",-13658),array("shou",-13611),array("shu",-13601),array("shua",-13406),array("shuai",-13404),array("shuan",-13400),array("shuang",-13398),array("shui",-13395),array("shun",-13391),array("shuo",-13387),array("si",-13383),array("song",-13367),array("sou",-13359),array("su",-13356),array("suan",-13343),array("sui",-13340),array("sun",-13329),array("suo",-13326),array("ta",-13318),array("tai",-13147),array("tan",-13138),array("tang",-13120),array("tao",-13107),array("te",-13096),array("teng",-13095),array("ti",-13091),array("tian",-13076),array("tiao",-13068),array("tie",-13063),array("ting",-13060),array("tong",-12888),array("tou",-12875),array("tu",-12871),array("tuan",-12860),array("tui",-12858),array("tun",-12852),array("tuo",-12849),array("wa",-12838),array("wai",-12831),array("wan",-12829),array("wang",-12812),array("wei",-12802),array("wen",-12607),array("weng",-12597),array("wo",-12594),array("wu",-12585),array("xi",-12556),array("xia",-12359),array("xian",-12346),array("xiang",-12320),array("xiao",-12300),array("xie",-12120),array("xin",-12099),array("xing",-12089),array("xiong",-12074),array("xiu",-12067),array("xu",-12058),array("xuan",-12039),array("xue",-11867),array("xun",-11861),array("ya",-11847),array("yan",-11831),array("yang",-11798),array("yao",-11781),array("ye",-11604),array("yi",-11589),array("yin",-11536),array("ying",-11358),array("yo",-11340),array("yong",-11339),array("you",-11324),array("yu",-11303),array("yuan",-11097),array("yue",-11077),array("yun",-11067),array("za",-11055),array("zai",-11052),array("zan",-11045),array("zang",-11041),array("zao",-11038),array("ze",-11024),array("zei",-11020),array("zen",-11019),array("zeng",-11018),array("zha",-11014),array("zhai",-10838),array("zhan",-10832),array("zhang",-10815),array("zhao",-10800),array("zhe",-10790),array("zhen",-10780),array("zheng",-10764),array("zhi",-10587),array("zhong",-10544),array("zhou",-10533),array("zhu",-10519),array("zhua",-10331),array("zhuai",-10329),array("zhuan",-10328),array("zhuang",-10322),array("zhui",-10315),array("zhun",-10309),array("zhuo",-10307),array("zi",-10296),array("zong",-10281),array("zou",-10274),array("zu",-10270),array("zuan",-10262),array("zui",-10260),array("zun",-10256),array("zuo",-10254));}
function  g($num){
	global  $d;
	if($num>0&&$num<160){
		return  chr($num);
	}elseif($num<-20319||$num>-10247){
		return  "";
	}else{
		for($i=count($d)-1;$i>=0;$i--){if($d[$i][1]<=$num)break;}
		return  $d[$i][0];
	}
}
function c($str){
	$ret="";
	for($i=0;$i<strlen($str);$i++){
		$p=ord(substr($str,$i,1));
		if($p>160){
			$q=ord(substr($str,++$i,1));
			$p=$p*256+$q-65536;
		}
		$ret.=g($p);
	}
	return  $ret;
}

$oldclassid = (integer)$_POST['oldclassid'];
$content = trim($_POST['content']);
$num = $_POST[id];
$zizeng = $_POST[zizeng];

if(!$oldclassid or !$content){
	printerror("请检查你的输入是否正确","history.go(-1)",0,0,1);
}

//提取同级栏目的属性
$r = $empire->fetch1( "select * from {$dbtbpre}enewsclass where classid={$oldclassid} limit 1" );

if(!$r){
	printerror("你要复制的栏目不存在,请检查你的输入是否正确","history.go(-1)",0,0,1);
}

//构造SQL语句
$query = $empire->query( "select * from {$dbtbpre}enewsclass" );
$fields_num = mysql_num_fields( $query );
for ( $i=0; $i<$fields_num; $i++ ){

	$f = mysql_field_name( $query, $i );
	if($f=="classid") continue;
	$t = mysql_field_type( $query, $i );
	$dot = (($i+1)==$fields_num) ? "" : ", ";
	$sr = "";
	if($t!="smallint" and $t!="tinyint" and $t!="int"){
		$sr = "'";
	}
	$sqls .= "{$f}={$sr}{$r[$f]}{$sr}{$dot}";
}

foreach(explode(",",trim($content)) as $value){
	$sql = $sqls;
	if(strstr($value,"|")){
		$cp = explode("|",trim($value));
		$classname = trim($cp[0]);
		$classpath = trim($cp[1]);
	}else{
		$classname = trim($value);
		$classpath = c($classname);
	}
	$bname = $classname;
	$sql = str_replace( "classname='".$r[classname]."'", "classname='".$classname."'", $sql );
	$sql = str_replace( "bname='".$r[bname]."'", "bname='".$bname."'", $sql );
	if($fangshi == 2){
	$classpath = $num;
	$num = $num + $zizeng;
	}
	if(strstr($r[classpath],"/")){
		$path = substr(strrchr($r[classpath],'/'),1);
		$path = str_replace( "/".$path."'", "/".$classpath."'", "classpath='".$r[classpath]."'" );
		$sql = str_replace( "classpath='".$r[classpath]."'", $path, $sql );
	}else{
		$sql = str_replace( "classpath='".$r[classpath]."'", "classpath='".$classpath."'", $sql );
	}

$s = $empire->query("INSERT INTO {$dbtbpre}enewsclass SET ".$sql."");
	unset($sql);
}

if($s){
	echo "<a href=ecmsclass.php?enews=DelFcListClass>点击这里更新缓存</a>";
}

}else{
//风格
$loginadminstyleid=(int)getcvar('loginadminstyleid');

//栏目
$fcjsfile='../data/fc/cmsclass.js';
$do_class=GetFcfiletext($fcjsfile);

?>
<html>
<head>
<title>批量添加栏目</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" type="text/css">
<style type="text/css">
<!--
.STYLE1 {
	color: #FFFFFF;
	font-size: 12px;
}
.STYLE2 {font-size: 12px}
.STYLE4 {color: #000000}
.STYLE6 {color: #FF0000}
.STYLE8 {font-size: 12px; font-style: italic; }
.STYLE9 {color: #0000CC}
-->
</style>
</head>

<body bgcolor="#FFFFFF" text="#000000">
<form name="form1" method="post" action="" onSubmit="return confirm('确认要进行批量添加这些栏目吗？');">
  <table width="100%" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#00ccee" bgcolor="#BFBFBF" class="tableborder">
    <tr class="header">
      <td style="padding:2px; line-height:25px;" height="25" colspan="3" bordercolor="#FFFFFF" bgcolor="#0099CC"><div align="center" class="STYLE1">批量添加栏目</div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="111" height="25" bordercolor="#99CCCC" bgcolor="#FFFFFF"><div align="right" class="STYLE2">同级栏目：</div></td>
      <td height="25" colspan="2" bordercolor="#99CCCC"><select name="oldclassid">
        <option value="0">选择应用其属性的栏目</option>
        <?=$do_class?>
      </select>

      <div align="left"></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td rowspan="2" bordercolor="#99CCCC" bgcolor="#FFFFFF"><div align="center">
        <p align="center" class="STYLE2">要添加的栏目</p>
        <p align="left" class="STYLE2"><br>
          <span class="STYLE6"><em>使用英文'，'逗号隔开</em></span></p>
        <p align="left" class="STYLE8">&nbsp;</p>
          <p align="right" class="STYLE2">&nbsp;</p>
          <p align="right">&nbsp;</p>
          <p><br />
          </p>
      </div></td>
      <td width="174" height="100%" rowspan="2" bordercolor="#99CCCC"><textarea name="content" id="content" style="width:100%; height:200;"></textarea></td>
      <td bordercolor="#99CCCC" bgcolor="#99CCCC" height="25"><span class="STYLE2">目录命名方式 </span></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td width="568" bordercolor="#99CCCC">
        <div align="left">
          <label></label>
        <p>
          <label><span class="STYLE2"><br>
          </span>
          <span class="STYLE2">
          <input name="RadioGroup1" type="radio" value="1" checked>
          使用<span class="STYLE6">全拼</span>做目录 </span></label>
          <span class="STYLE2"><br>
          <label>
          <input type="radio" name="RadioGroup1" value="2">
          目录采用<span class="STYLE6">数字</span>命名  起始数字：
          <input name="id" type="text" width="50" id="id" value="1">
自增：
<input name="zizeng" type="text" id="zizeng" value="1" width="50">
          </label>
          <br>
          <label>
          <input type="radio" name="RadioGroup1" value="3">
          选择后目录采用<span class="STYLE6">首字母<span class="STYLE4">命名</span> </span>例如：北京市 = bjsh</label>
          </span></p>
        <p class="STYLE2">请根据自身情况选择合适的方式 如果目录过多，使用全拼或者首字母可能会造成<span class="STYLE6">目录重复</span>，<span class="STYLE9">目录重复如果不能及时发现，重复目录只有一个能正常访问使用</span>，所以<span class="STYLE6">切记要避免重复目录</span>，使用数字命名目录会100%避免目录的重复。</p>
        <p><span class="STYLE2"><br>
            <label></label>
        </span></p>
        </div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25" colspan="3" bordercolor="#FFFFFF" bgcolor="#0099CC"><div align="left"> &nbsp;
            <input type="submit" name="action" value="提交">
  &nbsp;
  <input type="reset" name="Submit2" value="重置">
      </div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td height="25" colspan="3" bordercolor="#FFFFFF" bgcolor="#FFFFFF"><p><span class="STYLE2"><span class="STYLE2"><STRONG>注意事项：<br>
        </STRONG>新栏目的将继承选定栏目的属性,并且作为同级栏目添加</span><STRONG>;<br>
        </STRONG>目录命名采用栏目名拼音命名，所以注意新栏目是否拼音重名；<br>
        提交后<span class="STYLE6">必须更新缓存</span>才能生效；</span></p>
        <p><span class="STYLE2"><STRONG>By <a href="http://655.la" target="_blank" class="STYLE4">Erhao</a> :</STRONG>如有使用问题，请到<a href="http://655.la/?post=5" target="_blank"> 这里 </a>提问。</span><STRONG> <br>
          <br>
      </STRONG></p></td>
    </tr>
  </table>
</form>
</body>
</html>


<?
}
db_close();
$empire=null;
?>