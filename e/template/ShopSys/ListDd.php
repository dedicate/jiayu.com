<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../>��ҳ</a>&nbsp;>&nbsp;<a href=../../member/cp/>�������</a>&nbsp;>&nbsp;������ѯ";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
<script src=../../data/images/setday.js></script>
<form name="form1" method="get" action="index.php">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
    <tr> 
      <td>������Ϊ: 
        <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>">
        ʱ��� 
        <input name="starttime" type="text" id="starttime2" value="<?=$starttime?>" size="12" onclick="setday(this)">
        �� 
        <input name="endtime" type="text" id="endtime2" value="<?=$endtime?>" size="12" onclick="setday(this)">
        ֹ�Ķ��� 
        <input type="submit" name="Submit6" value="����"> <input name="sear" type="hidden" id="sear2" value="1"> 
      </td>
    </tr>
  </table>
</form>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class=tableborder>
    <tr class=header> 
      <td width="7%" height="23"> <div align="center">���</div></td>
      <td width="21%"><div align="center">���(����鿴)</div></td>
      <td width="16%"><div align="center">����ʱ��</div></td>
      <td width="13%"><div align="center">�ܽ��</div></td>
      <td width="15%"><div align="center">���ѷ�ʽ</div></td>
      <td width="28%"><div align="center">״̬</div></td>
    </tr>
<?
$j=0;
while($r=$empire->fetch($sql))
{
	$j++;
	//��������
	$total=0;
	if($r[payby]==1)
	{
		$total=$r[alltotalfen]+$r[pstotal];
		$mytotal="<a href='#ecms' title='��Ʒ��(".$r[alltotalfen].")+�˷�(".$r[pstotal].")'>".$total." ��</a>";
	}
	else
	{
		//��Ʊ
		$fpa="";
		if($r[fp])
		{
			$fpa="+��Ʊ��(".$r[fptotal].")";
		}
		$total=$r[alltotal]+$r[pstotal]+$r[fptotal];
		$mytotal="<a href='#ecms' title='��Ʒ��(".$r[alltotal].")+�˷�(".$r[pstotal].")".$fpa."'>".$total." Ԫ</a>";
	}
	//֧����ʽ
	if($r[payby]==1)
	{
		$payfsname=$r[payfsname]."<br>(��������)";
	}
	elseif($r[payby]==2)
	{
		$payfsname=$r[payfsname]."<br>(����)";
	}
	else
	{
		$payfsname=$r[payfsname];
	}
	//״̬
	if($r[checked])
	{
		$ch="��ȷ��";
	}
	else
	{
		$ch="<font color=red>δȷ��</font>";
	}
	if($r[outproduct])
	{
		$ou="�ѷ���";
	}
	else
	{
		$ou="<font color=red>δ����</font>";
	}
	if($r[haveprice])
	{
		$ha="�Ѹ���";
	}
	else
	{
		$ha="<font color=red>δ����</font>";
	}
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25"> <div align="center">
          <?=$j?>
          </div></td>
      <td> <div align="center"><a href="#ecms" onclick="window.open('../ShowDd/?ddid=<?=$r[ddid]?>','','width=700,height=600,scrollbars=yes,resizable=yes');"> 
          <?=$r[ddno]?>
          </a></div></td>
      <td> <div align="center"> 
          <?=$r[ddtime]?>
        </div></td>
      <td> <div align="center"> 
          <?=$mytotal?>
        </div></td>
      <td><div align="center"> 
          <?=$payfsname?>
        </div></td>
      <td> <div align="center"><strong> 
          <?=$ha?>
          </strong>/<strong> 
          <?=$ou?>
          </strong>/<strong> 
          <?=$ch?>
          </strong></div></td>
    </tr>
<?
}
?>
    <tr bgcolor="#FFFFFF"> 
      <td> <div align="center"></div></td>
      <td colspan="5"> <div align="left">&nbsp; 
          <?=$returnpage?>
        </div></td>
    </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>