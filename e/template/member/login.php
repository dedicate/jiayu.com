<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../>��ҳ</a>&nbsp;>&nbsp;<a href=../cp/>�������</a>&nbsp;>&nbsp;��Ա��½";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<br>
  <table width="500" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="form1" method="post" action="../../enews/index.php">
    <input type=hidden name=ecmsfrom value="<?=htmlspecialchars($_GET['from'])?>">
    <input type=hidden name=enews value=login>
    <tr class="header"> 
      <td height="25" colspan="2"><div align="center">��Ա��½</div></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="23%" height="25">�û�����</td>
      <td width="77%" height="25"><input name="username" type="text" id="username" size="30">
	  	<?php
		if($public_r['regacttype']==1)
		{
		?>
        &nbsp;&nbsp;<a href="../register/regsend.php" target="_blank">�ʺ�δ���</a>
		<?php
		}
		?>
		</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">���룺</td>
      <td height="25"><input name="password" type="password" id="password" size="30">
        &nbsp;&nbsp;<a href="../GetPassword/" target="_blank">�������룿</a></td>
    </tr>
	 <tr bgcolor="#FFFFFF">
      <td height="25">����ʱ�䣺</td>
      <td height="25">
	  <input name=lifetime type=radio value=0 checked>
        ������
	    <input type=radio name=lifetime value=3600>
        һСʱ 
        <input type=radio name=lifetime value=86400>
        һ�� 
        <input type=radio name=lifetime value=2592000>
        һ����
<input type=radio name=lifetime value=315360000>
        ���� </td>
    </tr>
    <?php
	if($public_r['loginkey_ok'])
	{
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">��֤�룺</td>
      <td height="25"><input name="key" type="text" id="key" size="6">
        <img src="../../ShowKey/?v=login"></td>
    </tr>
    <?php
	}	
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25">&nbsp;</td>
      <td height="25"><input type="submit" name="Submit" value=" �� ½ ">&nbsp;&nbsp;&nbsp; <input type="button" name="button" value="����ע��" onclick="parent.location.href='../register/';"></td>
    </tr>
	</form>
  </table>
<br>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>