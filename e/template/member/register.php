<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../>��ҳ</a>&nbsp;>&nbsp;<a href=../cp/>�������</a>&nbsp;>&nbsp;��Աע��";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width='100%' border='0' align='center' cellpadding='3' cellspacing='1' class="tableborder">
  <form name=userinfoform method=post enctype="multipart/form-data" action=../../enews/index.php>
    <input type=hidden name=enews value=register>
    <tr class="header"> 
      <td height="25" colspan="2">ע���Ա</td>
    </tr>
    <tr bgcolor="#EFEFEF"> 
      <td height="25" colspan="2"><strong>������Ϣ 
        <input name="groupid" type="hidden" id="groupid" value="<?=$groupid?>">
        </strong></td>
    </tr>
    <tr> 
      <td width='25%' height="25" bgcolor="#FFFFFF"> <div align='left'>�û���</div></td>
      <td width='75%' height="25" bgcolor="#FFFFFF"> <input name='username' type='text' id='username' maxlength='30'>
        *</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <div align='left'>����</div></td>
      <td height="25" bgcolor="#FFFFFF"> <input name='password' type='password' id='password' maxlength='20'>
        *</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <div align='left'>�ظ�����</div></td>
      <td height="25" bgcolor="#FFFFFF"> <input name='repassword' type='password' id='repassword' maxlength='20'>
        *</td>
    </tr>
    <tr> 
      <td height="25" bgcolor="#FFFFFF"> <div align='left'>����</div></td>
      <td height="25" bgcolor="#FFFFFF"> <input name='email' type='text' id='email' maxlength='50'>
        *</td>
    </tr>
    <tr bgcolor="#EFEFEF"> 
      <td height="25" colspan="2"><strong>������Ϣ</strong></td>
    </tr>
    <tr> 
      <td height="25" colspan="2" bgcolor="#FFFFFF"> 
    <?php
	@include($formfile);
	?>
      </td>
    </tr>
	<?
	if($public_r['regkey_ok'])
	{
	?>
    <tr>
      <td height="25" bgcolor="#FFFFFF">��֤�룺</td>
      <td height="25" bgcolor="#FFFFFF"><input name="key" type="text" id="key" size="6"> 
        <img src="../../ShowKey/?v=reg"></td>
    </tr>
	<?
	}	
	?>
    <tr> 
      <td height="25" bgcolor="#FFFFFF">&nbsp;</td>
      <td height="25" bgcolor="#FFFFFF"> <input type='submit' name='Submit' value='����ע��'> 
        &nbsp;&nbsp; <input type='button' name='Submit2' value='����' onclick='history.go(-1)'></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="2">˵������*��Ϊ���</td>
    </tr>
  </form>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>