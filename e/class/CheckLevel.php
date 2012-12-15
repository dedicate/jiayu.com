<?php
if(!defined('empirecms'))
{
	exit();
}

//����Ȩ���б�
function ShowViewInfoLevels($groupid){
	global $level_r;
	if(empty($groupid))
	{
		return '���ٻ�Ա';
	}
	$r=explode(',',$groupid);
	$count=count($r)-1;
	$groups='';
	$dh='';
	for($i=1;$i<$count;$i++)
	{
		$groups.=$dh.$level_r[$r[$i]][groupname];
		$dh=',';
	}
	return $groups;
}

//��ʾ��ʾҳ��
function ShowViewInfoMsg($r,$msg){
	global $public_r,$check_path,$level_r,$class_r;
	//�鿴Ȩ��
	if(empty($r['userfen']))
	{
		if($class_r[$r[classid]]['cgtoinfo'])//��Ŀ����
		{
			$ViewLevel="��Ҫ [".ShowViewInfoLevels($r['eclass_cgroupid'])."] ������ܲ鿴��";
		}
		else
		{
			$ViewLevel="��Ҫ [".$level_r[$r[groupid]][groupname]."] �������ϲ��ܲ鿴��";
		}
	}
	else
	{
		if($class_r[$r[classid]]['cgtoinfo'])//��Ŀ����
		{
			$ViewLevel="��Ҫ [".ShowViewInfoLevels($r['eclass_cgroupid'])."] ������۳� ".$r['userfen']." ����ֲ��ܲ鿴��";
		}
		else
		{
			$ViewLevel="��Ҫ [".$level_r[$r[groupid]][groupname]."] ����������۳� ".$r['userfen']." ����ֲ��ܲ鿴��";
		}
	}
	$url="<a href='".$public_r[newsurl]."'>��ҳ</a>&nbsp;>&nbsp;<a href='".$public_r[newsurl]."e/member/cp/'>�������</a>&nbsp;>&nbsp;�鿴��Ϣ";
	include($check_path."e/data/template/cp_1.php");
	?>
	<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class="header"> 
    <td height="25">��ʾ��Ϣ</td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25"><?=$msg?></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <tr class="header"> 
    <td height="25" colspan="2">���⣺
      <?=$r[title]?>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25">�鿴Ȩ�ޣ�</td>
    <td height="25">
      <?=$ViewLevel?>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td width="17%" height="25">����ʱ�䣺</td>
    <td width="83%" height="25"> 
      <?=date("Y-m-d H:i:s",$r[newstime])?>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td height="25">��Ϣ��飺</td>
    <td height="25"> 
      <?=ReturnTheIntroField($r)?>
    </td>
  </tr>
	</table>
	<?php
	include($check_path."e/data/template/cp_2.php");
	exit();
}

//���ؼ���ֶ�
function ReturnTheIntroField($r){
	global $public_r,$class_r,$emod_r,$check_tbname;
	$sublen=120;//��ȡ120����
	$mid=$class_r[$r[classid]]['modid'];
	$smalltextf=$emod_r[$mid]['smalltextf'];
	$stf=$emod_r[$mid]['savetxtf'];
	//���
	$value='';
	$showf='';
	if($smalltextf&&$smalltextf<>',')
	{
		$smr=explode(',',$smalltextf);
		$smcount=count($smr)-1;
		for($i=1;$i<$smcount;$i++)
		{
			$smf=$smr[$i];
			if($r[$smf])
			{
				$value=$r[$smf];
				$showf=$smf;
				break;
			}
		}
	}
	if(empty($showf))
	{
		$value=strip_tags($r['newstext']);
		$value=esub($value,$sublen);
		$showf='newstext';
	}
	//���ı�
	if($stf==$showf)
	{
		$value='';
	}
	return $value;
}

//�Ƿ��½
function ViewCheckLogin($infor){
	global $empire,$public_r,$user_tablename,$user_userid,$user_username,$user_userfen,$user_group,$user_groupid,$user_rnd,$user_zgroup,$user_userdate,$user_checked,$eloginurl,$toreturnurl,$gotourl;
	$userid=(int)getcvar('mluserid');
	$rnd=RepPostVar(getcvar('mlrnd'));
	if(!$userid)
	{
		if(!getcvar('returnurl'))
		{
			esetcookie("returnurl",$toreturnurl,0);
		}
		$msg="����δ��½��<a href='$gotourl'><u>�������</u></a>���е�½������ע����<a href='".$public_r['newsurl']."e/member/register/'><u>�������</u></a>��";
		ShowViewInfoMsg($infor,$msg);
	}
	$cr=$empire->fetch1("select ".$user_checked.",".$user_userid.",".$user_username.",".$user_group.",".$user_userfen.",".$user_userdate.",".$user_zgroup." from ".$user_tablename." where ".$user_userid."='$userid' and ".$user_rnd."='$rnd' limit 1");
	if(!$cr[$user_userid])
	{
		EmptyEcmsCookie();
		if(!getcvar('returnurl'))
		{
			esetcookie("returnurl",$toreturnurl,0);
		}
		$msg="ͬһ�ʺ�ֻ��һ�����ߣ�<a href='$gotourl'><u>�������</u></a>���µ�½��ע����<a href='".$public_r['newsurl']."e/member/register/'><u>�������</u></a>��";
		ShowViewInfoMsg($infor,$msg);
	}
	if($cr[$user_checked]==0)
	{
		EmptyEcmsCookie();
		if(!getcvar('returnurl'))
		{
			esetcookie("returnurl",$toreturnurl,0);
		}
		$msg="�����ʺŻ�δ���ͨ����<a href='$gotourl'><u>�������</u></a>���µ�½��ע����<a href='".$public_r['newsurl']."e/member/register/'><u>�������</u></a>��";
		ShowViewInfoMsg($infor,$msg);
	}
	//Ĭ�ϻ�Ա��
	if(empty($cr[$user_group]))
	{
		$usql=$empire->query("update ".$user_tablename." set ".$user_group."='$user_groupid' where ".$user_userid."='".$cr[$user_userid]."'");
		$cr[$user_group]=$user_groupid;
	}
	//�Ƿ����
	if($cr[$user_userdate])
	{
		if($cr[$user_userdate]-time()<=0)
		{
			OutTimeZGroup($cr[$user_userid],$cr[$user_zgroup]);
			$cr[$user_userdate]=0;
			if($cr[$user_zgroup])
			{
				$cr[$user_group]=$cr[$user_zgroup];
				$cr[$user_zgroup]=0;
			}
		}
	}
	$re[userid]=$cr[$user_userid];
	$re[username]=doUtfAndGbk($cr[$user_username],1);
	$re[userfen]=$cr[$user_userfen];
	$re[groupid]=$cr[$user_group];
	$re[userdate]=$cr[$user_userdate];
	$re[zgroupid]=$cr[$user_zgroup];
	return $re;
}

//�鿴Ȩ�޺���
function CheckShowNewsLevel($infor){
	global $check_path,$level_r,$empire,$user_userfen,$user_userid,$user_tablename,$user_userdate,$gotourl,$toreturnurl,$public_r,$dbtbpre,$class_r;
	$groupid=$infor['groupid'];
	$userfen=$infor['userfen'];
	$id=$infor['id'];
	$classid=$infor['classid'];
	//�Ƿ��½
	$user_r=ViewCheckLogin($infor);
	//��֤Ȩ��
	if($class_r[$infor[classid]]['cgtoinfo'])//��Ŀ����
	{
		$checkcr=$empire->fetch1("select cgroupid from {$dbtbpre}enewsclass where classid='$infor[classid]'");
		if($checkcr['cgroupid'])
		{
			if(!strstr($checkcr[cgroupid],','.$user_r[groupid].','))
			{
				$infor['eclass_cgroupid']=$checkcr[cgroupid];
				if(!getcvar('returnurl'))
				{
					esetcookie("returnurl",$toreturnurl,0);
				}
				$msg="��û���㹻Ȩ�޲鿴����Ϣ! <a href='$gotourl'><u>�������</u></a>���µ�½��ע����<a href='".$public_r['newsurl']."e/member/register/'><u>�������</u></a>��";
				ShowViewInfoMsg($infor,$msg);
			}
		}
	}
	if($groupid)//��Ϣ����
	{
		if($level_r[$groupid][level]>$level_r[$user_r[groupid]][level])
		{
			if(!getcvar('returnurl'))
			{
				esetcookie("returnurl",$toreturnurl,0);
			}
			$msg="���Ļ�Ա������(���ĵ�ǰ����".$level_r[$user_r[groupid]][groupname].")��û�в鿴����Ϣ��Ȩ��! <a href='$gotourl'><u>�������</u></a>���µ�½��ע����<a href='".$public_r['newsurl']."e/member/register/'><u>�������</u></a>��";
			ShowViewInfoMsg($infor,$msg);
		}
	}
	//�۵�
	if(!empty($userfen))
	{
		//�Ƿ�����ʷ��¼
		$bakr=$empire->fetch1("select id,truetime from {$dbtbpre}enewsdownrecord where id='$id' and classid='$classid' and userid='$user_r[userid]' and online=2 order by truetime desc limit 1");
		if($bakr['id']&&(time()-$bakr['truetime']<=$public_r['redoview']*3600))
		{}
		else
		{
			if($user_r[userdate]-time()>0)//����
			{}
			else
			{
				if($user_r[userfen]<$userfen)
				{
					if(!getcvar('returnurl'))
					{
						esetcookie("returnurl",$toreturnurl,0);
					}
					$msg="���ĵ�������(����ǰӵ�еĵ��� ".$user_r[userfen]." ��)��û�в鿴����Ϣ��Ȩ��! <a href='$gotourl'><u>�������</u></a>���µ�½��ע����<a href='".$public_r['newsurl']."e/member/register/'><u>�������</u></a>��";
					ShowViewInfoMsg($infor,$msg);
				}
				//�۵�
				$usql=$empire->query("update ".$user_tablename." set ".$user_userfen."=".$user_userfen."-".$userfen." where ".$user_userid."='$user_r[userid]'");
			}
			//�������ؼ�¼
			$utfusername=$user_r['username'];
			BakDown($classid,$id,0,$user_r['userid'],$utfusername,$infor[title],$userfen,2);
		}
	}
}
$check_infoid=(int)$check_infoid;
$check_classid=(int)$check_classid;
if(!defined('PageCheckLevel'))
{
	require_once($check_path.'e/class/connect.php');
	if(!defined('InEmpireCMS'))
	{
		exit();
	}
	require_once(ECMS_PATH.'e/class/db_sql.php');
	require_once(ECMS_PATH.'e/data/dbcache/class.php');
	require_once(ECMS_PATH.'e/data/dbcache/MemberLevel.php');
	$link=db_connect();
	$empire=new mysqlquery();
	$check_tbname=RepPostVar($check_tbname);
	$checkinfor=$empire->fetch1("select * from {$dbtbpre}ecms_".$check_tbname." where id='$check_infoid' limit 1");
	if(!$checkinfor['id']||$checkinfor['classid']!=$check_classid)
	{
		echo"<script>alert('����Ϣ������');history.go(-1);</script>";
		exit();
	}
	//����
	$check_mid=$class_r[$checkinfor[classid]]['modid'];
	$check_tbdataf=$emod_r[$check_mid]['tbdataf'];
	if($check_tbdataf&&$check_tbdataf<>',')
	{
		$selectdataf=substr($check_tbdataf,1,-1);
		$checkfinfor=$empire->fetch1("select ".$selectdataf." from {$dbtbpre}ecms_".$check_tbname."_data_".$checkinfor[stb]." where id='$checkinfor[id]'");
		$checkinfor=array_merge($checkinfor,$checkfinfor);
	}
}
else
{
	$check_tbname=RepPostVar($check_tbname);
}
require_once(ECMS_PATH.'e/class/user.php');
//��֤IP
eCheckAccessDoIp('showinfo');
if($checkinfor['groupid']||$class_r[$checkinfor[classid]]['cgtoinfo'])
{
	$toreturnurl=$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];	//����ҳ���ַ
	$gotourl=$eloginurl?$eloginurl:$public_r['newsurl']."e/member/login/";	//��½��ַ
	CheckShowNewsLevel($checkinfor);
}
if(!defined('PageCheckLevel'))
{
	db_close();
	$empire=null;
}
?>