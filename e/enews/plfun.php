<?php
//��������
function AddPl($username,$password,$nomember,$key,$saytext,$id,$classid,$repid,$add){
	global $empire,$public_r,$class_r,$user_userid,$user_username,$user_password,$user_dopass,$user_tablename,$user_salt,$user_checked,$user_group,$dbtbpre,$level_r;
	//��֤IP
	eCheckAccessDoIp('pl');
	$id=(int)$id;
	$repid=(int)$repid;
	$classid=(int)$classid;
	//��֤��
	$keyvname='checkplkey';
	if($public_r['plkey_ok'])
	{
		ecmsCheckShowKey($keyvname,$key,1);
	}
	$username=RepPostVar($username);
	$password=RepPostVar($password);
	$muserid=(int)getcvar('mluserid');
	$musername=RepPostVar(getcvar('mlusername'));
	$mgroupid=(int)getcvar('mlgroupid');
	if($muserid)//�ѵ�½
	{
		$username=$musername;
	}
	else
	{
		if(empty($nomember))//������
		{
			//����ת��
			$utfusername=doUtfAndGbk($username,0);
			$password=doUtfAndGbk($password,0);
			//����
			if(empty($user_dopass))
			{
				$password=md5($password);
			}
			if($user_dopass==3)//16λmd5
			{
				$password=substr(md5($password),8,16);
			}
			//˫��md5
			if($user_dopass==2)
			{
				$ur=$empire->fetch1("select ".$user_userid.",".$user_salt.",".$user_password.",".$user_checked.",".$user_group." from ".$user_tablename." where ".$user_username."='$utfusername' limit 1");
				$password=md5(md5($password).$ur[$user_salt]);
				$cuser=0;
				if($password==$ur[$user_password])
				{
					$cuser=1;
				}
				if(empty($ur[$user_userid]))
				{
					$cuser=0;
				}
			}
			else
			{
				$ur=$empire->fetch1("select ".$user_userid.",".$user_checked.",".$user_group." from ".$user_tablename." where ".$user_username."='$utfusername' and ".$user_password."='$password' limit 1");
				$cuser=0;
				if($ur[$user_userid])
				{
					$cuser=1;
				}
			}
			if(empty($cuser))
			{
				printerror("FailPassword","history.go(-1)",1);
			}
			if($ur[$user_checked]==0)
			{
				printerror("NotCheckedUser",'',1);
			}
			$muserid=$ur[$user_userid];
			$mgroupid=$ur[$user_group];
		}
		else
		{
			$muserid=0;
		}
	}
	if($public_r['plgroupid'])
	{
		if(!$muserid)
		{
			printerror("GuestNotToPl","history.go(-1)",1);
		}
		if($level_r[$mgroupid][level]<$level_r[$public_r['plgroupid']][level])
		{
			printerror("NotLevelToPl","history.go(-1)",1);
		}
	}
	if(!trim($saytext)||!$id||!$classid)
	{
		printerror("EmptyPl","history.go(-1)",1);
	}
	//�����
	if(empty($class_r[$classid][tbname]))
	{
		printerror("ErrorUrl","history.go(-1)",1);
	}
	if(strlen($saytext)>$public_r[plsize])
	{
		printerror("PlSizeTobig","history.go(-1)",1);
	}
	$saytime=date("Y-m-d H:i:s");
	$time=time();
	$pltime=getcvar('lastpltime');
	if($pltime)
	{
		if($time-$pltime<$public_r[pltime])
		{printerror("PlOutTime","history.go(-1)",1);}
	}
	//�Ƿ�ر�����
	$r=$empire->fetch1("select classid,closepl from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where id='$id' and classid='$classid'");
	if(empty($r[classid]))
	{printerror("ErrorUrl","history.go(-1)",1);}
	if($class_r[$r[classid]][openpl])
	{printerror("CloseClassPl","history.go(-1)",1);}
	//����Ϣ�ر�����
	if($r['closepl'])
	{
		printerror("CloseInfoPl","history.go(-1)",1);
	}
	$sayip=egetip();
	$username=RepPostStr($username);
	$username=str_replace("\r\n","",$username);
	$saytext=nl2br(RepFieldtextNbsp(RepPostStr($saytext)));
	$pr=$empire->fetch1("select plclosewords,plf,plmustf,pldeftb from {$dbtbpre}enewspublic limit 1");
	if($repid)
	{
		if(trim($saytext)=="[quote]".$repid."[/quote]")
		{
			printerror("EmptyPl","history.go(-1)",1);
		}
		$saytext=RepPlTextQuote($repid,$saytext,$pr);
	}
	//�����ַ�
	$saytext=ReplacePlWord($pr['plclosewords'],$saytext);
	//���
	if($class_r[$classid][checkpl])
	{$checked=1;}
	else
	{$checked=0;}
	$ret_r=ReturnPlAddF($add,$pr,0);
	//����
	$sql=$empire->query("insert into {$dbtbpre}enewspl(username,sayip,saytime,id,classid,checked,zcnum,fdnum,userid,isgood,stb) values('".$username."','$sayip','$saytime','$id','$classid','$checked',0,0,'$muserid',0,'$pr[pldeftb]');");
	$plid=$empire->lastid();
	//����
	$fsql=$empire->query("insert into {$dbtbpre}enewspl_data_".$pr['pldeftb']."(plid,classid,id,saytext".$ret_r['fields'].") values('$plid','$classid','$id','".addslashes($saytext)."'".$ret_r['values'].");");
	//��Ϣ���1
	$usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set plnum=plnum+1 where id='$id'");
	//������󷢱�ʱ��
	$set1=esetcookie("lastpltime",time(),time()+3600*24);
	ecmsEmptyShowKey($keyvname);//�����֤��
	if($sql)
	{
		$reurl=DoingReturnUrl("../pl/?classid=$classid&id=$id",$_POST['ecmsfrom']);
		printerror("AddPlSuccess",$reurl,1);
	}
	else
	{printerror("DbError","history.go(-1)",1);}
}

//�滻�ظ�
function RepPlTextQuote($repid,$saytext,$pr){
	global $public_r,$empire,$dbtbpre,$fun_r;
	$r=$empire->fetch1("select username,saytime,stb from {$dbtbpre}enewspl where plid='$repid'");
	$fr=$empire->fetch1("select saytext from {$dbtbpre}enewspl_data_".$r['stb']." where plid='$repid'");
	if($r[username])
	{
		if(!empty($fun_r['plincludewords']))
		{
			$ypost=str_replace('[!--saytime--]',$r[saytime],str_replace('[!--username--]',$r[username],$fun_r['plincludewords']));
		}
		else
		{
			$ypost="Originally posted by <i>".$r[username]."</i> at ".$r[saytime].":<br>";
		}
	}
	$include="<table border=0 width='100%' cellspacing=1 cellpadding=10 bgcolor='#cccccc'><tr><td width='100%' bgcolor='#FFFFFF' style='word-break:break-all'>".$ypost.RepYPlQuote($fr[saytext])."</td></tr></table>";
	$restr=str_replace("[quote]".$repid."[/quote]",$include,$saytext);
	return $restr;
}

//ȥ��ԭ����
function RepYPlQuote($text){
	$preg_str="/<table (.+?)<\/table>/is";
	$text=preg_replace($preg_str,"",$text);
	return $text;
}

//�����ַ�
function ReplacePlWord($plclosewords,$text){
	global $empire,$dbtbpre;
	if(empty($text))
	{
		return $text;
	}
	toCheckCloseWord($text,$plclosewords,'HavePlCloseWords');
	return $text;
}

//�����ֶ�
function ReturnPlAddF($add,$pr,$ecms=0){
	global $empire,$dbtbpre;
	$fr=explode(',',$pr['plf']);
	$count=count($fr)-1;
	$ret_r['fields']='';
	$ret_r['values']='';
	for($i=1;$i<$count;$i++)
	{
		$f=$fr[$i];
		$fval=RepPostStr($add[$f]);
		//����
		if(strstr($pr[plmustf],','.$f.','))
		{
			if(!trim($fval))
			{
				$chfr=$empire->fetch1("select fname from {$dbtbpre}enewsplf where f='$f' limit 1");
				$GLOBALS['msgmustf']=$chfr['fname'];
				printerror('EmptyPlMustF','',1);
			}
		}
		$fval=nl2br(RepFieldtextNbsp($fval));
		$ret_r['fields'].=",".$f;
		$ret_r['values'].=",'".addslashes($fval)."'";
	}
	return $ret_r;
}

//֧��/��������
function DoForPl($add){
	global $empire,$dbtbpre;
	$classid=(int)$add['classid'];
	$id=(int)$add['id'];
	$plid=(int)$add['plid'];
	$dopl=(int)$add['dopl'];
	$doajax=(int)$add['doajax'];
	if(!$classid||!$id||!$plid)
	{
		$doajax==1?ajax_printerror('','','ErrorUrl',1):printerror('ErrorUrl','',1);
	}
	//��������
	if(getcvar('lastforplid'.$plid))
	{
		$doajax==1?ajax_printerror('','','ReDoForPl',1):printerror('ReDoForPl','',1);
	}
	if($dopl==1)
	{
		$f='zcnum';
		$msg='DoForPlGSuccess';
	}
	else
	{
		$f='fdnum';
		$msg='DoForPlBSuccess';
	}
	$sql=$empire->query("update {$dbtbpre}enewspl set ".$f."=".$f."+1 where plid='$plid' and id='$id' and classid='$classid'");
	if($sql)
	{
		esetcookie('lastforplid'.$plid,$plid,time()+30*24*3600);	//��󷢲�
		if($doajax==1)
		{
			$nr=$empire->fetch1("select ".$f." from {$dbtbpre}enewspl where plid='$plid' and id='$id' and classid='$classid'");
			ajax_printerror($nr[$f],$add['ajaxarea'],$msg,1);
		}
		else
		{
			printerror($msg,$_SERVER['HTTP_REFERER'],1);
		}
	}
	else
	{
		$doajax==1?ajax_printerror('','','DbError',1):printerror('DbError','',1);
	}
}
?>