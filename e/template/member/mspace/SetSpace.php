<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href='../../../'>��ҳ</a>&nbsp;>&nbsp;<a href='../cp/'>�������</a>&nbsp;>&nbsp;���ÿռ�";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="15%" valign="top">
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">�ռ�����</td>
        </tr>
        <tr>
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../../space/?userid=<?=$user[userid]?>" target="_blank">Ԥ���ռ�</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="SetSpace.php">���ÿռ�</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="ChangeStyle.php">ѡ��ģ��</a></td>
        </tr>
		<tr>
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="gbook.php">��������</a></td>
        </tr>
		<tr>
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="feedback.php">������</a></td>
        </tr>
      </table>
    </td>
    <td width="1%">&nbsp;</td>
    <td width="84%" valign="top">
		<table width="100%" border="0" cellspacing="1" cellpadding="3" class="tableborder">
        <form name="setspace" method="post" action="../../enews/index.php">
          <tr class="header"> 
            <td height="25" colspan="2">���ÿռ�</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td width="17%" height="25">�ռ�����</td>
            <td width="83%"> 
              <input name="spacename" type="text" id="spacename" value="<?=$addr[spacename]?>"></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>�ռ乫��</td>
            <td> 
              <textarea name="spacegg" cols="60" rows="6" id="spacegg"><?=$addr[spacegg]?></textarea></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td height="25">&nbsp;</td>
            <td> 
              <input type="submit" name="Submit" value="�ύ">
              <input type="reset" name="Submit2" value="����">
              <input name="enews" type="hidden" id="enews" value="DoSetSpace"></td>
          </tr>
		  </form>
        </table>
	</td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>