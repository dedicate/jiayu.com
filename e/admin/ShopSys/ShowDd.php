<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//��֤�û�
$lur=is_login();
$logininid=$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];
//��֤Ȩ��
CheckLevel($logininid,$loginin,$classid,"shopdd");
$enews=$_GET['enews'];
$url="�鿴����";
$ddid=(int)$_GET['ddid'];
$r=$empire->fetch1("select * from {$dbtbpre}enewsshopdd where ddid='$ddid'");
//��Ҫ��Ʊ
$fp="��";
if($r[fp])
{
	$fp="��";
}
//���
$total=0;
if($r[payby]==1)
{
	$pstotal=$r[pstotal]." ����";
	$alltotal=$r[alltotal]." ����";
	$total=$r[pstotal]+$r[alltotal];
	$mytotal=$total." ����";
}
else
{
	$pstotal=$r[pstotal]." Ԫ";
	$alltotal=$r[alltotal]." Ԫ";
	$total=$r[pstotal]+$r[alltotal]+$r[fptotal];
	$mytotal=$total." Ԫ";
}
//֧����ʽ
if($r[payby]==1)
{
	$payfsname=$r[payfsname]."(���ֹ���)";
}
elseif($r[payby]==2)
{
	$payfsname=$r[payfsname]."(����)";
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
//����
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
//��ʾ��Ʒ��Ϣ
function ShowBuyproduct($buycar,$payby){
	global $empire,$dbtbpre;
	$record="!";
	$field="|";
	$r=explode($record,$buycar);
	$alltotal=0;
	$alltotalfen=0;
	echo"<table width='100%' border=0 align=center cellpadding=3 cellspacing=1>
          <tr class='header'> 
            <td width='9%' height=23> <div align=center>���</div></td>
            <td width='42%'> <div align=center>��Ʒ����</div></td>
            <td width='15%'> <div align=center>����</div></td>
            <td width='10%'> <div align=center>����</div></td>
            <td width='19%'> <div align=center>С��</div></td>
          </tr>";
	$j=0;
	for($i=0;$i<count($r)-1;$i++)
	{
		$j++;
		$pr=explode($field,$r[$i]);
		$productid=$pr[1];
		$fr=explode(",",$pr[1]);
		//ID
		$classid=(int)$fr[0];
		$id=(int)$fr[1];
		//����
		$num=(int)$pr[2];
		if(empty($num))
		{
			$num=1;
		}
		//����
		$price=$pr[3];
		$thistotal=$price*$num;
		$buyfen=$pr[4];
		$thistotalfen=$buyfen*$num;
		if($payby==1)
		{
			$showprice=$buyfen." ����";
			$showthistotal=$thistotalfen." ����";
		}
		else
		{
			$showprice=$price." Ԫ";
			$showthistotal=$thistotal." Ԫ";
		}
		//��Ʒ����
		$title=stripSlashes($pr[5]);
		//��������
		$titleurl="../../public/InfoUrl?classid=$classid&id=$id";
		$alltotal+=$thistotal;
		$alltotalfen+=$thistotalfen;
		echo"<tr>
	<td align=center>".$j."</td>
	<td align=center><a href='".$titleurl."' target=_blank>".$title."</a></td>
	<td align=right><b>��".$showprice."</b></td>
	<td align=right>".$num."</td>
	<td align=right>".$showthistotal."</td>
	</tr>";
    }
	//֧�����ָ���
	if($payby==1)
	{
		$a="<tr> 
      <td colspan=5><div align=right>�ϼƻ���:<strong>".$alltotalfen."</strong></div></td>
      <td>&nbsp;</td>
    </tr>
	</table>";
	}
	else
	{
	echo"<tr> 
      <td colspan=5><div align=right>�ϼ�:<strong>��".$alltotal."</strong></div></td>
      <td>&nbsp;</td>
    </tr>
  </table>";
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<title>�鿴����</title>
<script>
function PrintDd()
{
	pdiv.style.display="none";
	window.print();
}
</script>
</head>

<body>
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td width="61%" height="27" bgcolor="#FFFFFF"><strong>����ID: 
      <?=$r[ddno]?>
      </strong></td>
    <td width="39%" bgcolor="#FFFFFF"><strong>�µ�ʱ��: 
      <?=$r[ddtime]?>
      </strong></td>
  </tr>
  <tr> 
    <td height="23" colspan="2" bgcolor="#EFEFEF"><strong>��Ʒ��Ϣ</strong></td>
  </tr>
  <tr> 
    <td colspan="2"> 
      <?
	  ShowBuyproduct($r[buycar],$r[payby]);
	  ?>
    </td>
  </tr>
  <tr> 
    <td height="23" colspan="2" bgcolor="#EFEFEF"><strong>������Ϣ</strong></td>
  </tr>
  <tr> 
    <td height="23" colspan="2"><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="15%" height="25"> 
            <div align="right">�����ţ�</div></td>
          <td width="35%"><strong> 
            <?=$r[ddno]?>
            </strong></td>
          <td width="15%"><div align="right">����״̬��</div></td>
          <td width="35%"><strong> 
            <?=$ha?>
            </strong>/<strong> 
            <?=$ou?>
            </strong>/<strong> 
            <?=$ch?>
            </strong></td>
        </tr>
        <tr> 
          <td height="25"> 
            <div align="right">�µ�ʱ�䣺</div></td>
          <td><strong> 
            <?=$r[ddtime]?>
            </strong></td>
          <td><div align="right">��Ʒ�ܽ�</div></td>
          <td><strong>
            <?=$alltotal?>
            </strong></td>
        </tr>
        <tr> 
          <td height="25"> 
            <div align="right">���ͷ�ʽ��</div></td>
          <td><strong>
            <?=$r[psname]?>
            </strong></td>
          <td><div align="right">��Ʒ�˷ѣ�</div></td>
          <td><strong>
            <?=$pstotal?>
            </strong></td>
        </tr>
        <tr> 
          <td height="25"> 
            <div align="right">֧����ʽ��</div></td>
          <td><strong>
            <?=$payfsname?>
            </strong></td>
          <td><div align="right">��Ʊ��</div></td>
          <td><?=$r[fptotal]?></td>
        </tr>
        <tr> 
          <td height="25"> 
            <div align="right">��Ҫ��Ʊ��</div></td>
          <td><?=$fp?></td>
          <td><div align="right">�����ܽ�</div></td>
          <td><strong>
            <?=$mytotal?>
            </strong></td>
        </tr>
        <tr> 
          <td height="25"> 
            <div align="right">��Ʊ̧ͷ��</div></td>
          <td colspan="3"><strong> 
            <?=$r[fptt]?>
            </strong></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="23" colspan="2" bgcolor="#EFEFEF"><strong>��������Ϣ</strong></td>
  </tr>
  <tr> 
    <td colspan="2"><table width="100%%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="20%" height="25">��ʵ����:</td>
          <td width="80%"> 
            <?=$r[truename]?>
          </td>
        </tr>
        <tr> 
          <td height="25">OICQ:</td>
          <td> 
            <?=$r[oicq]?>
          </td>
        </tr>
        <tr> 
          <td height="25">MSN:</td>
          <td> 
            <?=$r[msn]?>
          </td>
        </tr>
        <tr> 
          <td height="25">�̶��绰:</td>
          <td> 
            <?=$r[call]?>
          </td>
        </tr>
        <tr> 
          <td height="25">�ƶ��绰:</td>
          <td> 
            <?=$r[phone]?>
          </td>
        </tr>
        <tr> 
          <td height="25">��ϵ����:</td>
          <td> 
            <?=$r[email]?>
          </td>
        </tr>
        <tr> 
          <td height="25">��ϵ��ַ:</td>
          <td> 
            <?=$r[address]?>
          </td>
        </tr>
        <tr> 
          <td height="25">�ʱ�:</td>
          <td> 
            <?=$r[zip]?>
          </td>
        </tr>
        <tr> 
          <td height="25">��ע:</td>
          <td> 
            <?=nl2br($r[bz])?>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="23" colspan="2" bgcolor="#EFEFEF"><strong>�ջ�����Ϣ</strong></td>
  </tr>
  <tr> 
    <td colspan="2"><table width="100%%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="20%" height="25">��ʵ����:</td>
          <td width="80%"> 
            <?=$r[g_truename]?>
          </td>
        </tr>
        <tr> 
          <td height="25">OICQ:</td>
          <td> 
            <?=$r[g_oicq]?>
          </td>
        </tr>
        <tr> 
          <td height="25">MSN:</td>
          <td> 
            <?=$r[g_msn]?>
          </td>
        </tr>
        <tr> 
          <td height="25">�̶��绰:</td>
          <td> 
            <?=$r[g_call]?>
          </td>
        </tr>
        <tr> 
          <td height="25">�ƶ��绰:</td>
          <td> 
            <?=$r[g_phone]?>
          </td>
        </tr>
        <tr> 
          <td height="25">��ϵ����:</td>
          <td> 
            <?=$r[g_email]?>
          </td>
        </tr>
        <tr> 
          <td height="25">��ϵ��ַ:</td>
          <td> 
            <?=$r[g_address]?>
          </td>
        </tr>
        <tr> 
          <td height="25">�ʱ�:</td>
          <td> 
            <?=$r[g_zip]?>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td colspan="2"><div align="center"> 
        <table width="98%%" border="0" align="center" cellpadding="3" cellspacing="1" id="pdiv">
          <tr> 
            <td><div align="center">
                <input type="button" name="Submit" value=" �� ӡ " onclick="javascript:PrintDd();">
              </div></td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
</body>
</html>
<?
db_close();
$empire=null;
?>