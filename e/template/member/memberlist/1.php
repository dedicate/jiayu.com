<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php

//���ò�ѯ�Զ����ֶ��б�,���ſ�ͷ������ö��Ÿ񿪣���ʽ��ui.�ֶ�����
$useraddf=',ui.userpic';

//��ҳSQL
$query='select u.'.$user_userid.',u.'.$user_username.',u.'.$user_email.',u.'.$user_registertime.',u.'.$user_group.$useraddf.' from '.$user_tablename.' u'.$add." order by u.".$user_userid." desc limit $offset,$line";
$sql=$empire->query($query);

//����
$url="<a href='../../../'>��ҳ</a>&nbsp;>&nbsp;��Ա�б�";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="memberform" method="get" action="index.php">
    <input type="hidden" name="sear" value="1">
    <input type="hidden" name="groupid" value="<?=$groupid?>">
    <tr class="header"> 
      <td width="10%"><div align="center">ID</div></td>
      <td width="38%" height="25"><div align="center">�û���</div></td>
      <td width="30%" height="25"><div align="center">ע��ʱ��</div></td>
      <td width="22%" height="25"><div align="center"></div></td>
    </tr>
    <?php
	while($r=$empire->fetch($sql))
	{
		//ע��ʱ��
		$registertime=$user_register?date("Y-m-d H:i:s",$r[$user_registertime]):$r[$user_registertime];
		//�û���
		$groupname=$level_r[$r[$user_group]]['groupname'];
		//�û�ͷ��
		$userpic=$r['userpic']?$r['userpic']:$public_r[newsurl].'e/data/images/nouserpic.gif';
	?>
    <tr bgcolor="#FFFFFF"> 
      <td><div align="center"> 
          <?=$r[$user_userid]?>
        </div></td>
      <td height="25"> <a href='<?=$public_r[newsurl]?>e/space/?userid=<?=$r[$user_userid]?>' target='_blank'> 
        <?=$r[$user_username]?>
        </a> </td>
      <td height="25"><div align="center"> 
          <?=$registertime?>
        </div></td>
      <td height="25"><div align="center"> [<a href="<?=$public_r[newsurl]?>e/member/ShowInfo/?userid=<?=$r[$user_userid]?>" target="_blank">��Ա����</a>] 
          [<a href="<?=$public_r[newsurl]?>e/space/?userid=<?=$r[$user_userid]?>" target="_blank">��Ա�ռ�</a>]</div></td>
    </tr>
    <?
  	}
  	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="3"> 
        <?=$returnpage?>
      </td>
      <td height="25"> <div align="center"> 
          <input name="keyboard" type="text" id="keyboard" size="10">
          <input type="submit" name="Submit" value="����">
        </div></td>
    </tr>
  </form>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>