<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../../>��ҳ</a>&nbsp;>&nbsp;<a href=../../cp/>�������</a>&nbsp;>&nbsp;<a href=../../msg/?out=".$out.">�ռ���</a>&nbsp;>&nbsp;���Ͷ���Ϣ";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="15%" valign="top"> <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">����Ϣ����</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../../msg/">�ռ���</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../../msg/?out=1">������</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../AddMsg/?enews=AddMsg">������Ϣ</a></td>
        </tr>
      </table></td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="84%" valign="top"> <div align="center">
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <form action="../../../enews/index.php" method="post" name="sendmsg" id="sendmsg">
            <tr class="header"> 
              <td height="23" colspan="2">���Ͷ���Ϣ</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td width="21%" height="25">����</td>
              <td width="79%" height="25"><input name="title" type="text" id="title2" value="<?=htmlspecialchars(stripSlashes($title))?>" size="43">
                *</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25">������</td>
              <td height="25"><input name="to_username" type="text" id="to_username2" value="<?=$username?>">
                [<a href="#EmpireCMS" onclick="window.open('../../friend/change/?fm=sendmsg&f=to_username','','width=250,height=360');">ѡ�����</a>] *</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25" valign="top">����</td>
              <td height="25"><textarea name="msgtext" cols="60" rows="12" id="textarea"><?=htmlspecialchars(stripSlashes($msgtext))?></textarea>
                *</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25" valign="top">&nbsp;</td>
              <td height="25"><input name="inout" type="checkbox" id="inout2" value="1">
                ���浽������</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25">&nbsp;</td>
              <td height="25"><input type="submit" name="Submit" value="����" onclick="document.sendmsg.enews.value='AddMsg';"> 
                &nbsp; <input type="submit" name="Submit3" value="���浽������" onclick="document.sendmsg.enews.value='AddOutMsg';"> 
                &nbsp; <input type="reset" name="Submit2" value="����"> <input name="enews" type="hidden" id="enews2" value="AddMsg"> 
                <input name="out" type="hidden" id="out5" value="<?=$out?>"> </td>
            </tr>
          </form>
        </table>
      </div></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>