<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//��ʾ��Ʒ��Ϣ
function ShowBuyproduct(){
	global $empire,$class_r,$dbtbpre;
	$buycar=getcvar('mybuycar');
	if(empty($buycar))
	{
		printerror('��Ĺ��ﳵû����Ʒ','',1,0,1);
	}
	$record="!";
	$field="|";
	echo"<table width='100%' border=0 align=center cellpadding=3 cellspacing=1>
          <tr class='header'> 
            <td width='41%' height=23> <div align=center>��Ʒ����</div></td>
            <td width='15%'> <div align=center>�г��۸�</div></td>
            <td width='15%'> <div align=center>�Żݼ۸�</div></td>
            <td width='8%'> <div align=center>����</div></td>
            <td width='21%'> <div align=center>С��</div></td>
          </tr>";
	$alltotal=0;
	$return[0]=0;
	$return[1]=0;
	$return[2]=0;
	$r=explode($record,$buycar);
	$count=count($r);
	for($i=0;$i<$count-1;$i++)
	{
		$pr=explode($field,$r[$i]);
		$productid=$pr[1];
		$fr=explode(",",$pr[1]);
		//ID
		$classid=(int)$fr[0];
		$id=(int)$fr[1];
		if(empty($class_r[$classid][tbname]))
		{
			continue;
		}
		//����
		$num=(int)$pr[2];
		if(empty($num))
		{
			$num=1;
		}
		//ȡ�ò�Ʒ��Ϣ
		$productr=$empire->fetch1("select title,tprice,price,titleurl,groupid,classid,newspath,filename,id,titlepic,buyfen from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where classid='$classid' and id='$id' limit 1");
		if(empty($productr[id]))
		{
			continue;
		}
		//�Ƿ�ȫ������
		if(!$productr[buyfen])
		{
			$return[0]=1;
		}
		$return[1]+=$productr[buyfen]*$num;
		//��ƷͼƬ
		if(empty($productr[titlepic]))
		{
			$productr[titlepic]="../../data/images/notimg.gif";
		}
		//��������
		$titleurl=sys_ReturnBqTitleLink($productr);
		$thistotal=$productr[price]*$num;
		$alltotal+=$thistotal;
		echo"<tr>
	<td align='center' height=23><a href='".$titleurl."' target=_blank>".$productr[title]."</a></td>
	<td align='right'>��".$productr[tprice]."</td>
	<td align='right'><b>��".$productr[price]."</b></td>
	<td align='right'>".$num."</td>
	<td align='right'>��".$thistotal."</td>
	</tr>";
    }
	//֧����������
	if(!$return[0])
	{
	$a="<tr height='25'> 
      <td colspan=5><div align=right>�ϼƵ���:<strong>".$return[1]."</strong></div></td>
    </tr>";
	}
	echo"<tr height='27'> 
      <td colspan=5><div align=right>�ϼ�:<strong>��".$alltotal."</strong></div></td>
    </tr>".$a."
  </table>";
  $return[2]=$alltotal;
  return $return;
}

//��ʾ���ͷ�ʽ
function ShowPs(){
	global $empire,$dbtbpre;
	$sql=$empire->query("select pid,pname,price,psay from {$dbtbpre}enewsshopps order by pid");
	$str='';
	while($r=$empire->fetch($sql))
	{
		$str.="<table width='100%' border=0 align=center cellpadding=3 cellspacing=1>
  <tr> 
    <td width='69%' height=23> 
      <input type=radio name=psid value=".$r[pid]."><strong>".$r[pname]."</strong>
    </td>
    <td width='31%'><strong>����:��".$r[price]."</strong></td>
  </tr>
  <tr> 
    <td colspan=2><table width='98%' border=0 align=right cellpadding=3 cellspacing=1><tr><td>".$r[psay]."</td></tr></table></td>
  </tr>
</table>";
	}
	return $str;
}

//��ʾ֧����ʽ
function ShowPayfs($pr,$user){
	global $empire,$user_tablename,$user_money,$user_userid,$user_userfen,$user_rnd,$dbtbpre;
	$str='';
	$sql=$empire->query("select payid,payname,payurl,paysay,userpay,userfen from {$dbtbpre}enewsshoppayfs order by payid");
	while($r=$empire->fetch($sql))
	{
		$dis="";
		$words="";
		//�۵���
		if($r[userfen])
		{
			if($pr[0])
			{
				$dis=" disabled";
				$words="&nbsp;<font color='#666666'>(��ѡ�����Ʒ������һ����֧�ֵ�������)</font>";
			}
			else
			{
				if(getcvar('mluserid'))
				{
					if($user[userfen]<$pr[1])
					{
						$dis=" disabled";
						$words="&nbsp;<font color='#666666'>(�����ʺŵ�������,����ʹ�ô�֧����ʽ)</font>";
					}
				}
				else
				{
					$dis=" disabled";
					$words="&nbsp;<font color='#666666'>(��δ��¼,����ʹ�ô�֧����ʽ)</font>";
				}
			}
		}
		//���۳�
		elseif($r[userpay])
		{
			if(getcvar('mluserid'))
			{
				if($user[money]<$pr[2])
				{
					$dis=" disabled";
					$words="&nbsp;<font color='#666666'>(�����ʺ�����,����ʹ�ô�֧����ʽ)</font>";
				}
			}
			else
			{
				$dis=" disabled";
				$words="&nbsp;<font color='#666666'>(��δ��¼,����ʹ�ô�֧����ʽ)</font>";
			}
		}
		//����֧��
		elseif($r[payurl])
		{
			$words="";
		}
		else
		{}
		$str.="<tr><td><b><input type=radio name=payfsid value='".$r[payid]."'".$dis.">".$r[payname]."</b>".$words."</td></tr><tr><td><table width='98%' border=0 align=right cellpadding=3 cellspacing=1><tr><td>".$r[paysay]."</td></tr></table></td></tr>";
	}
	if($str)
	{
		$str="<table width='100%' border=0 align=center cellpadding=3 cellspacing=1>".$str."</table>";
	}
	return $str;
}
?>
<!DOCTYPE HTML PUBLIC -//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
<meta http-equiv=Content-Type content=text/html; charset=gb2312>
<title>��д����</title>
<link href=../../data/images/qcss.css rel=stylesheet type=text/css>
<script>
function copyinfo(obj)
{
obj.g_truename.value=obj.truename.value;
obj.g_oicq.value=obj.oicq.value;
obj.g_msn.value=obj.msn.value;
obj.g_call.value=obj.calla.value;
obj.g_phone.value=obj.phonea.value;
obj.g_email.value=obj.email.value;
obj.g_address.value=obj.addressa.value;
obj.g_zip.value=obj.zip.value;
}
</script>
</head>

<body>
<form action="../SubmitOrder/index.php" method="post" name="myorder" id="myorder">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>ѡ�����Ʒ</strong>��[<a href="../buycar/">�޸Ĺ��ﳵ</a>]</td>
    </tr>
    <tr> 
      <td> 
        <?
	  $pr=ShowBuyproduct();
	  ?>
      </td>
    </tr>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>��������Ϣ</strong></td>
    </tr>
    <tr> 
      <td><table width="100%%" border="0" cellspacing="1" cellpadding="3">
          <tr> 
            <td width="20%" height="25">��ʵ����:</td>
            <td width="80%"><input name="truename" type="text" id="truename" value="<?=$r[truename]?>" size="30">
              (����)</td>
          </tr>
          <tr> 
            <td height="25">��ϵ�绰:</td>
            <td><input name="calla" type="text" id="oicq3" value="<?=$r[call]?>" size="30">
              (����)</td>
          </tr>
          <tr> 
            <td height="25">�ƶ��绰:</td>
            <td><input name="phonea" type="text" id="call" value="<?=$r[phone]?>" size="30"></td>
          </tr>
          <tr> 
            <td height="25">��ϵ����:</td>
            <td><input name="email" type="text" id="email" value="<?=$email?>" size="30">
              (����)</td>
          </tr>
		  <tr> 
            <td height="25">OICQ:</td>
            <td><input name="oicq" type="text" id="oicq" value="<?=$r[oicq]?>" size="30"></td>
          </tr>
          <tr> 
            <td height="25">MSN:</td>
            <td><input name="msn" type="text" id="msn" value="<?=$r[msn]?>" size="30"></td>
          </tr>
          <tr> 
            <td height="25">��ϵ��ַ:</td>
            <td><input name="addressa" type="text" id="call3" value="<?=$r[address]?>" size="65">
              (����)</td>
          </tr>
          <tr> 
            <td height="25">�ʱ�:</td>
            <td><input name="zip" type="text" id="zip" value="<?=$r[zip]?>" size="30">
            </td>
          </tr>
          <tr> 
            <td height="25">��ע:</td>
            <td><textarea name="bz" cols="65" rows="6" id="bz"></textarea></td>
          </tr>
        </table></td>
    </tr>
	<?php
	$showps=ShowPs();
	if($showps)
	{
	?>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>ѡ�����ͷ�ʽ</strong></td>
    </tr>
    <tr> 
      <td> 
        <?=$showps?>
      </td>
    </tr>
	<?php
	}
	$showpayfs=ShowPayfs($pr,$user);
	if($showpayfs)
	{
	?>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>ѡ��֧����ʽ</strong></td>
    </tr>
    <tr> 
      <td> 
        <?=$showpayfs?>
      </td>
    </tr>
	<?php
	}
	?>
    <tr> 
      <td height="23" bgcolor="#EFEFEF"><strong>�ջ�����Ϣ</strong>[<a href="javascript:copyinfo(document.myorder);">�����ջ��˵���Ϣ</a>]</td>
    </tr>
    <tr> 
      <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
          <tr> 
            <td width="20%" height="25">��ʵ����:</td>
            <td width="80%"><input name="g_truename" type="text" id="truename3" size="30">
              (����)</td>
          </tr>
          <tr> 
            <td height="25">��ϵ�绰:</td>
            <td><input name="g_call" type="text" id="call4" size="30">
              (����)</td>
          </tr>
          <tr> 
            <td height="25">�ƶ��绰:</td>
            <td><input name="g_phone" type="text" id="phone" size="30"></td>
          </tr>
          <tr> 
            <td height="25">��ϵ����:</td>
            <td><input name="g_email" type="text" id="email3" size="30">
              (����)</td>
          </tr>
		  <tr> 
            <td height="25">OICQ:</td>
            <td><input name="g_oicq" type="text" id="oicq4" size="30"></td>
          </tr>
          <tr> 
            <td height="25">MSN:</td>
            <td><input name="g_msn" type="text" id="g_msn" size="30"></td>
          </tr>
          <tr> 
            <td height="25">��ϵ��ַ:</td>
            <td><input name="g_address" type="text" id="address" size="65">
              (����)</td>
          </tr>
          <tr> 
            <td height="25">�ʱ�:</td>
            <td><input name="g_zip" type="text" id="g_zip" size="30">
            </td>
          </tr>
        </table></td>
    </tr>
	<?
	//�ṩ��Ʊ
	if($public_r[havefp])
	{
	?>
    <tr> 
      <td height="23" bgcolor="#EFEFEF">�Ƿ���Ҫ��Ʊ:
        <input name="fp" type="checkbox" id="fp" value="1">
        ��(������ 
        <?=$public_r[fpnum]?>
        %�ķ���),��Ʊ̧ͷ:
        <input name="fptt" type="text" id="fptt" size="38"></td>
    </tr>
	<?
	}
	?>
    <tr> 
      <td height="25">
<div align="center"> 
          <input type="button" name="Submit3" value=" ��һ�� " onclick="history.go(-1)">
          &nbsp;&nbsp; &nbsp;&nbsp; 
          <input type="submit" name="Submit" value=" ��һ�� ">
          <input name="alltotal" type="hidden" id="alltotal" value="<?=$pr[2]?>">
          <input name="alltotalfen" type="hidden" id="alltotalfen" value="<?=$pr[1]?>">
        </div></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>