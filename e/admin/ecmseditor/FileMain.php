<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
$showmod=(int)$_GET['showmod'];
$type=(int)$_GET['type'];
$classid=(int)$_GET['classid'];
$filepass=(int)$_GET['filepass'];
$doing=$_GET['doing'];
$field=$_GET['field'];
$tranfrom=$_GET['tranfrom'];
$fileno=htmlspecialchars($_GET['fileno']);
if(empty($field))
{
	$field="ecms";
}
$search="&classid=$classid&filepass=$filepass&type=$type&doing=$doing&tranfrom=$tranfrom&field=$field&fileno=$fileno";
$search1="&classid=$classid&filepass=$filepass&doing=$doing&tranfrom=$tranfrom&field=$field&fileno=$fileno";
if($showmod==1)
{
	$filename="filep.php";
}
else
{
	$filename="file.php";
}
$editor=1;
//���
$loginadminstyleid=(int)getcvar('loginadminstyleid',1);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<title>ѡ���ļ�</title>
<script>
function ChangeShowMod(obj){
	var furl,searchstr,dotype;
	searchstr="<?=$search1?>";
	dotype=obj.type.value;
	if(obj.showmod.value==1)
	{
		furl="filep.php?"+searchstr+"&type="+dotype;
	}
	else
	{
		furl="file.php?"+searchstr+"&type="+dotype;
	}
	elfile.location=furl;
}
</script>
</head>

<body leftmargin="0" topmargin="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%" class="tableborder">
  <tr class="header">
    <td height="27"> 
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <form name="FileMainNav" method="get" action="">
          <tr> 
            <td height="25">��ʾģʽ�� 
              <select name="showmod" id="showmod" onchange="ChangeShowMod(document.FileMainNav);">
                <option value="0"<?=$showmod==0?' selected':''?>>���ݿ�ģʽ</option>
                <option value="1"<?=$showmod==1?' selected':''?>>Ŀ¼ģʽ</option>
              </select>
              �ļ����ͣ� 
              <select name="type" id="type" onchange="ChangeShowMod(document.FileMainNav);">
                <option value="1"<?=$type==1?' selected':''?>>ͼƬ</option>
                <option value="2"<?=$type==2?' selected':''?>>Flash�ļ�</option>
                <option value="3"<?=$type==3?' selected':''?>>��ý���ļ�</option>
                <option value="0"<?=$type==0?' selected':''?>>��������</option>
              </select>
            </td>
          </tr>
        </form>
      </table>
	</td>
  </tr>
  <tr>
    <td height="100%"> 
      <IFRAME frameBorder="0" id="elfile" name="elfile" scrolling="yes" src="<?=$filename.'?'.$search?>" style="HEIGHT:100%;VISIBILITY:inherit;WIDTH:100%;Z-INDEX:1"></IFRAME>
    </td>
  </tr>
</table>
</body>
</html>
