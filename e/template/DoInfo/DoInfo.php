<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../>��ҳ</a>&nbsp;>&nbsp;<a href=../member/cp/>�������</a>&nbsp;>&nbsp;������Ϣ";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="17%" valign="top"> 
	<?php
	//����ɹ����ģ��
	$sql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
	while($r=$empire->fetch($sql))
	{
	?>
	<table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23"><?=$r[qmname]?>����</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ChangeClass.php?mid=<?=$r[mid]?>">����<?=$r[qmname]?></a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ListInfo.php?mid=<?=$r[mid]?>">����<?=$r[qmname]?></a></td>
        </tr>
      </table>
	  <br>
	  <?
	  }
	  ?>
	  </td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="82%" valign="top"> 
      <table width="80%" border="0" align="center" class="tableborder">
        <tr class="header">
          <td height="25"><div align="center">��ӭ������Ϣ��������</div></td>
        </tr>
        <tr>
          <td height="35" bgcolor="#FFFFFF"> 
            <div align="center">ѡ�������Ҫ���ӻ�������Ϣ��</div></td>
        </tr>
      </table>
      <p>&nbsp;</p></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>