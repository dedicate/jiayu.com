<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../../>��ҳ</a>&nbsp;>&nbsp;<a href=../../cp/>�������</a>&nbsp;>&nbsp;<a href=../../friend/>�����б�</a>&nbsp;>&nbsp;�������";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<script>
function DelFavaClass(cid)
{
var ok;
ok=confirm("ȷ��Ҫɾ��?");
if(ok)
{
self.location.href='../../../enews/?enews=DelFavaClass&doing=1&cid='+cid;
}
}
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="15%" valign="top"> <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">�����б�</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../FriendClass/">�������</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../../friend/">�����б�</a></td>
        </tr>
        <tr>
          <td height="23" bgcolor="#FFFFFF"><img src="../../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../add/">��Ӻ���</a></td>
        </tr>
      </table></td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="84%" valign="top"> <div align="center"> 
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <form name="form1" method="post" action="../../../enews/index.php">
            <tr class="header"> 
              <td>���Ӻ��ѷ���</td>
            </tr>
            <tr> 
              <td bgcolor="#FFFFFF">��������: 
                <input name="cname" type="text" id="cname"> <input type="submit" name="Submit" value="����"> 
                <input name="enews" type="hidden" id="enews" value="AddFavaClass">
                <input name="doing" type="hidden" id="doing" value="1"></td>
            </tr>
          </form>
        </table>
        <br>
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <tr class="header"> 
            <td width="10%" height="25"> <div align="center">ID</div></td>
            <td width="56%"><div align="center">��������</div></td>
            <td width="34%"><div align="center">����</div></td>
          </tr>
        <?php
		while($r=$empire->fetch($sql))
		{
		?>
          <form name=form method=post action=../../../enews/index.php>
            <tr bgcolor="#FFFFFF"> 
              <td height="25"> <div align="center"> 
                  <?=$r[cid]?>
                </div></td>
              <td><div align="center">
                  <input name="doing" type="hidden" id="doing" value="1">
                  <input name="enews" type="hidden" id="enews" value="EditFavaClass">
                  <input name="cid" type="hidden" value="<?=$r[cid]?>">
                  <input name="cname" type="text" id="cname" value="<?=$r[cname]?>">
                </div></td>
              <td><div align="center"> 
                  <input type="submit" name="Submit2" value="�޸�">
                  &nbsp; 
                  <input type="button" name="Submit3" value="ɾ��" onclick="javascript:DelFavaClass(<?=$r[cid]?>);">
                </div></td>
            </tr>
          </form>
		<?php
		}
		?>
        </table>
      </div></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>