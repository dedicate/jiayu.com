<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../>��ҳ</a>&nbsp;>&nbsp;<a href=../cp/>�������</a>&nbsp;>&nbsp;�ҵĹ����¼";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="15%" valign="top">
      <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">���Ѽ�¼</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../buybak/">�㿨��ֵ��¼</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../downbak/">�������Ѽ�¼</a></td>
        </tr>
      </table>
	</td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="84%" valign="top"> 
      <div align="center">
      <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <tr class="header"> 
            <td width="12%"><div align="center">����</div></td>
            <td width="36%" height="25"><div align="center">��ֵ����</div></td>
            <td width="10%" height="25"><div align="center">��ֵ���</div></td>
            <td width="10%" height="25"><div align="center">�������</div></td>
			<td width="10%"><div align="center">��Ч��</div></td>
            <td width="22%" height="25"><div align="center">����ʱ��</div></td>
          </tr>
		<?php
		while($r=$empire->fetch($sql))
		{
			//����
			if($r['type']==0)
			{
				$type='�㿨��ֵ';
			}
			elseif($r['type']==1)
			{
				$type='���߳�ֵ';
			}
			elseif($r['type']==2)
			{
				$type='��ֵ����';
			}
			elseif($r['type']==3)
			{
				$type='��ֵ���';
			}
			else
			{
				$type='';
			}
		?>
          <tr bgcolor="#FFFFFF">
			<td><div align="center">
			<?=$type?>
			</div></td>
            <td height="25"><div align="center"> 
                <?=$r[card_no]?>
              </div></td>
            <td height="25"><div align="center"> 
                <?=$r[money]?>
              </div></td>
            <td height="25"><div align="center"> 
                <?=$r[cardfen]?>
              </div></td>
			<td><div align="center"><?=$r[userdate]?></div></td>
            <td height="25"><div align="center"> 
                <?=$r[buytime]?>
              </div></td>
          </tr>
        <?php
		}
		?>
          <tr bgcolor="#FFFFFF"> 
            <td height="25" colspan="6"> 
              <?=$returnpage?>
            </td>
          </tr>
        </table>
      </div>
	</td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>