<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../../>��ҳ</a>&nbsp;>&nbsp;<a href=../../cp/>�������</a>&nbsp;>&nbsp;<a href=../../msg/?out=".$out.">�ռ���</a>&nbsp;>&nbsp;�鿴����Ϣ";
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
          <form name="form1" method="post" action="../../../enews/index.php">
            <tr class="header"> 
              <td height="23" colspan="2">
                <?=stripSlashes($r[title])?>
              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td width="19%" height="25">�����ߣ�</td>
              <td width="81%" height="25"><a href="../../ShowInfo/?userid=<?=$r[from_userid]?>"> 
                <?=$r[from_username]?>
                </a></td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25">����ʱ�䣺</td>
              <td height="25">
                <?=$r[msgtime]?>
              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25" valign="top">���ݣ�</td>
              <td height="25"> 
                <?=nl2br(stripSlashes($r[msgtext]))?>
              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25" valign="top">&nbsp;</td>
              <td height="25">[<a href="#ecms" onclick="javascript:history.go(-1);"><strong>����</strong></a>] 
                [<a href="../AddMsg/?enews=AddMsg&re=1&mid=<?=$mid?>&out=<?=$out?>"><strong>�ظ�</strong></a>] 
                [<a href="../AddMsg/?enews=AddMsg&mid=<?=$mid?>&out=<?=$out?>"><strong>ת��</strong></a>] 
                [<a href="../../../enews/?enews=DelMsg&mid=<?=$mid?>&out=<?=$out?>" onclick="return confirm('ȷ��Ҫɾ��?');"><strong>ɾ��</strong></a>]</td>
            </tr>
          </form>
        </table>
      </div></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>