<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href='../../'>��ҳ</a>&nbsp;>&nbsp;<a href='../member/cp/'>�������</a>&nbsp;>&nbsp;<a href='ListInfo.php?mid=".$mid."'>������Ϣ</a>&nbsp;>&nbsp;�ύ��Ϣ&nbsp;(".$mr[qmname].")";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<script>
function CheckChangeClass()
{
	if(document.changeclass.classid.value==0||document.changeclass.classid.value=='')
	{
		alert("��ѡ����Ŀ");
		return false;
	}
	return true;
}
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="17%" valign="top"> 
    <?
	//����ɹ����ģ��
	$modsql=$empire->query("select mid,qmname from {$dbtbpre}enewsmod where usemod=0 and showmod=0 and qenter<>'' order by myorder,mid");
	while($modr=$empire->fetch($modsql))
	{
		$fontb="";
		$fontb1="";
		if($modr['mid']==$mid)
		{
			$fontb="<b>";
			$fontb1="</b>";
		}
	?>
      <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">
            <?=$modr[qmname]?>����</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ChangeClass.php?mid=<?=$modr[mid]?>"><?=$fontb?>����<?=$modr[qmname]?>
            <?=$fontb1?></a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ListInfo.php?mid=<?=$modr[mid]?>"><?=$fontb?>����<?=$modr[qmname]?>
            <?=$fontb1?></a></td>
        </tr>
      </table>
      <br> 
      <?
	  }
	  ?>
    </td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="82%" valign="top">
      <table width="500" border="0" align="center">
        <tr> 
          <td>��ã�<b><?=$musername?></b></td>
        </tr>
      </table>
      <table width="500" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
        <form action="AddInfo.php" method="get" name="changeclass" id="changeclass" onsubmit="return CheckChangeClass();">
          <tr class="header"> 
            <td height="23"><strong>��ѡ��Ҫ�ύ��Ϣ����Ŀ 
              <input name="mid" type="hidden" id="mid" value="<?=$mid?>">
              <input name="enews" type="hidden" id="enews" value="MAddInfo">
              </strong></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="32"> <select name=classid size="22" style="width:300px">
                <script src="<?=$classjs?>"></script>
              </select> </td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td><input type="submit" name="Submit" value="�����Ϣ"> <font color="#666666">(��ѡ���ռ���Ŀ[��ɫ��])</font></td>
          </tr>
        </form>
      </table>
      </td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>