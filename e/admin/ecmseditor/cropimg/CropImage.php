<?php
define('EmpireCMSAdmin','1');
require("../../../class/connect.php");
require("../../../class/db_sql.php");
require("../../../class/functions.php");
require("../../../data/dbcache/class.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=2;
//��֤�û�
$lur=is_login();
$logininid=$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];

$enews=$_POST['enews'];
if(empty($enews))
{
	$enews=$_GET['enews'];
}
//�ü�ͼƬ
if($enews=='DoCropImage')
{
	if($public_r['phpmode'])
	{
		include("../../../class/ftp.php");
		$incftp=1;
	}
	include('copyimgfun.php');
	DoCropImage($_POST,$logininid,$loginin);
}

$fileid=(int)$_GET['fileid'];
$filepass=(int)$_GET['filepass'];
if(empty($fileid))
{
	printerror('NotCropImage','history.go(-1)');
}
$filer=$empire->fetch1("select fileid,path,filename,classid,fpath,no from {$dbtbpre}enewsfile where fileid='$fileid'");
if(empty($filer['fileid']))
{
	printerror('NotCropImage','history.go(-1)');
}
$path=$filer['path']?$filer['path'].'/':$filer['path'];
$fspath=ReturnFileSavePath($filer['classid'],$filer['fpath']);
$big_image_name=ECMS_PATH.$fspath['filepath'].$path.$filer['filename'];
$imgurl=$fspath['fileurl'].$path.$filer['filename'];
if(!file_exists($big_image_name))
{
	printerror('NotCropImage','history.go(-1)');
}
$filetype=GetFiletype($filer['filename']);//ȡ���ļ�����
if(!strstr($tranpicturetype,','.$filetype.','))
{
	printerror('CropImageFiletypeFail','history.go(-1)');
}
db_close();
$empire=null;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�ü�ͼƬ��<?=$filer['no']?> (<?=$filer['filename']?>)</title>
<link href="../../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">

<script src="js/jquery.min.js"></script>
<script src="js/jquery.Jcrop.js"></script>
<link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />

		<script language="Javascript">

			// Remember to invoke within jQuery(window).load(...)
			// If you don't, Jcrop may not initialize properly
			jQuery(document).ready(function(){

				jQuery('#cropbox').Jcrop({
					onChange: showCoords,
					onSelect: showCoords
				});

			});

			// Our simple event handler, called from onChange and onSelect
			// event handlers, as per the Jcrop invocation above
			function showCoords(c)
			{
				jQuery('#pic_x').val(c.x);
				jQuery('#pic_y').val(c.y);
				jQuery('#x2').val(c.x2);
				jQuery('#y2').val(c.y2);
				jQuery('#pic_w').val(c.w);
				jQuery('#pic_h').val(c.h);
			};

		</script>

</head>

<body>
<form name="cropimgform" method="post" action="CropImage.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
    <tr> 
      <td height="30">�ü�ͼƬ��С���� 
        <input name="pic_w" type="text" id="pic_w" value="0" size="6">
        ���� <input name="pic_h" type="text" id="pic_h" value="0" size="6">
        �� 
        <input name="doing" type="checkbox" id="doing" value="1" checked>
        ����ԭͼ <input type="submit" name="Submit" value="�ü�ͼƬ">
        <input name="enews" type="hidden" id="enews" value="DoCropImage">
        <input name="pic_x" type="hidden" id="pic_x" value="0">
        <input name="pic_y" type="hidden" id="pic_y" value="0">
        <input name="fileid" type="hidden" id="fileid" value="<?=$fileid?>">
		<input name="filepass" type="hidden" id="filepass" value="<?=$filepass?>">

		<input type="hidden" id="x2" name="x2" />
		<input type="hidden" id="y2" name="y2" />
      </td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"><img src="<?=$imgurl?>" border="0" id="cropbox"></td>
    </tr>
  </table>
</form>
</body>
</html>