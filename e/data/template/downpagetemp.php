<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title><?=htmlspecialchars($r[title])?> - <?=htmlspecialchars($thisdownname)?> - 嘉鱼县人民政府门户网站</title>
<meta name="keywords" content="<?=htmlspecialchars($r[title])?> - <?=htmlspecialchars($thisdownname)?>">
<meta name="description" content="<?=htmlspecialchars($r[title])?> - <?=htmlspecialchars($thisdownname)?>">
<link href="../../data/images/qcss.css" rel="stylesheet" type="text/css">
</head>
<body>
<br>
<br>
<br>
<br>
<table align="center" width="100%">
  <tr> 
    <td height="32" align=center>
	<a href="<?=$url?>" title="<?=$r[title]?> －<?=$thisdownname?>">
	<img src="../../data/images/download.jpg" border=0>
	</a>
	</td>
  </tr>
  <tr> 
    <td align=center>(点击下载)</td>
  </tr>
</table>
<br>
</body>
</html>