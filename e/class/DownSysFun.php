<?php
$DownSys_CheckIp=0;	//������֤�����û�IP��0Ϊ��������1Ϊ����

//���ؼ��IP
function ReturnDownSysCheckIp(){
	global $DownSys_CheckIp;
	$ip=$DownSys_CheckIp?egetip():'127.0.0.1';
	return $ip;
}

//�������
function DownSoft($classid,$id,$pathid,$p,$pass){
	global $empire,$public_r,$level_r,$class_r,$emod_r,$user_tablename,$user_userid,$user_rnd,$user_group,$user_userfen,$user_userdate,$user_username,$dbtbpre;
	//��֤IP
	eCheckAccessDoIp('downinfo');
	$id=(int)$id;
	$classid=(int)$classid;
	$pathid=(int)$pathid;
	if(empty($id)||empty($p)||empty($classid))
	{
		printerror("ErrorUrl","history.go(-1)",1);
	}
	$p=RepPostVar($p);
	$p_r=explode(":::",$p);
	$userid=$p_r[0];
	$rnd=$p_r[1];
	//��֤��
	$cpass=md5(ReturnDownSysCheckIp()."wm_chief".$public_r[downpass].$userid);
	if($cpass<>$pass)
	{
		printerror("FailDownpass","history.go(-1)",1);
    }
	//������
	if(empty($class_r[$classid][tbname]))
	{
		printerror("ExiestSoftid","history.go(-1)",1);
	}
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$ok=1;
	$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id='$id' and classid='$classid'");
	if(empty($r[id]))
	{
		printerror("ExiestSoftid","history.go(-1)",1);
	}
	//����
	if($emod_r[$mid]['tbdataf']&&$emod_r[$mid]['tbdataf']<>',')
	{
		$selectdataf=substr($emod_r[$mid]['tbdataf'],1,-1);
		$finfor=$empire->fetch1("select ".$selectdataf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$r[id]'");
		$r=array_merge($r,$finfor);
	}
	//�������ص�ַ
	$path_r=explode("\r\n",$r[downpath]);
	if(!$path_r[$pathid])
	{
		printerror("ExiestSoftid","history.go(-1)",1);
	}
	$showdown_r=explode("::::::",$path_r[$pathid]);
	$downgroup=$showdown_r[2];
	//����Ȩ��
	if($downgroup)
	{
		$userid=(int)$userid;
		//ȡ�û�Ա����
		$u=$empire->fetch1("select * from ".$user_tablename." where ".$user_userid."='$userid' and ".$user_rnd."='$rnd'");
		if(empty($u[$user_userid]))
		{printerror("MustSingleUser","history.go(-1)",1);}
		//���ش�������
		$setuserday="";
		if($level_r[$u[$user_group]][daydown])
		{
			$setuserday=DoCheckMDownNum($userid,$u[$user_group]);
		}
		if($level_r[$downgroup][level]>$level_r[$u[$user_group]][level])
		{
			printerror("NotDownLevel","history.go(-1)",1);
		}
		//�����Ƿ��㹻
		$showdown_r[3]=intval($showdown_r[3]);
		if($showdown_r[3])
		{
			//---------�Ƿ�����ʷ��¼
			$bakr=$empire->fetch1("select id,truetime from {$dbtbpre}enewsdownrecord where id='$id' and classid='$classid' and userid='$userid' and pathid='$pathid' and online=0 order by truetime desc limit 1");
			if($bakr[id]&&(time()-$bakr[truetime]<=$public_r[redodown]*3600))
			{}
			else
			{
				//���¿�
				if($u[$user_userdate]-time()>0)
				{}
				//����
				else
				{
					if($showdown_r[3]>$u[$user_userfen])
					{
						printerror("NotEnoughFen","history.go(-1)",1);
					}
					//ȥ������
					$usql=$empire->query("update ".$user_tablename." set ".$user_userfen."=".$user_userfen."-".$showdown_r[3]." where ".$user_userid."='$userid'");
				}
				//�������ؼ�¼
				$utfusername=doUtfAndGbk($u[$user_username],1);
				BakDown($classid,$id,$pathid,$userid,$utfusername,$r[title],$showdown_r[3],0);
			}
		}
		//�����û����ش���
		if($setuserday)
		{
			$usql=$empire->query($setuserday);
		}
	}
	//������������һ
    $usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set totaldown=totaldown+1 where id='$id'");
    $downurl=stripSlashes($showdown_r[1]);
	$downurlr=ReturnDownQzPath($downurl,$showdown_r[4]);
	$downurl=$downurlr['repath'];
	//������
	@include(ECMS_PATH."e/class/enpath.php");
	$downurl=DoEnDownpath($downurl);
    db_close();
    $empire=null;
	DoTypeForDownurl($downurl,$downurlr['downtype']);
}

//���ز���
function DoTypeForDownurl($downurl,$type=0){
	global $public_r;
	if($type==1)//meta
	{
		echo"<META HTTP-EQUIV=\"refresh\" CONTENT=\"0;url=$downurl\">";
	}
	elseif($type==2)//read
	{
		QDownLoadFile($downurl);
	}
	else//header
	{
		Header("Location:$downurl");
	}
	exit();
}

//����
function QDownLoadFile($file){
	global $public_r;
	if(strstr($file,"\\"))
	{
		$exp="\\";
	}
	elseif(strstr($file,"/"))
	{
		$exp="/";
	}
	else
	{
		Header("Location:$file");
		exit();
	}
	if(strstr($file,$exp."e".$exp)||strstr($file,"..")||strstr($file,"?")||strstr($file,"#"))
	{
		Header("Location:$file");
		exit();
    }
	$efileurl=eReturnFileUrl();
	if(strstr($file,$efileurl))
	{
		$file=str_replace($efileurl,'/d/file/',$file);
	}
	if(!strstr($file,"://"))
	{
		if(!file_exists($file))
		{
			$file="../..".$file;
		}
	}
	$filename=GetDownurlFilename($file,$exp);
	if(empty($filename))
	{
		Header("Location:$file");
		exit();
	}
	//����
	Header("Content-type: application/octet-stream");
	//Header("Accept-Ranges: bytes");
	//Header("Accept-Length: ".$filesize);
	Header("Content-Disposition: attachment; filename=".$filename);
	echo ReadFiletext($file);
}

//ȡ�������ļ���
function GetDownurlFilename($file,$expstr){
	$r=explode($expstr,$file);
	$count=count($r)-1;
	$filename=$r[$count];
	return $filename;
}

//----------------------���ߵ�Ӱģ��
//ȡ����֤��
function GetOnlinePass(){
	global $public_r;
	$onlinep=$public_r[downpass]."qweirtydui4opttt.,mvcfvxzzf3dsfm,.dsa";
	$r[0]=time();
	$r[1]=md5($onlinep.$r[0]);
	return $r;
}

//��֤��֤��
function CheckOnlinePass($onlinetime,$onlinepass){
	global $movtime,$public_r;
	if($onlinetime+$movtime<time()||$onlinetime>time())
	{
		exit();
	}
	$onlinep=$public_r[downpass]."qweirtydui4opttt.,mvcfvxzzf3dsfm,.dsa";
	$cpass=md5($onlinep.$onlinetime);
	if($onlinepass<>$cpass)
	{
		exit();
	}
}

//--------ȡ�������ַ
function GetSofturl($classid,$id,$pathid,$p,$pass,$onlinetime,$onlinepass){
	global $empire,$public_r,$class_r,$emod_r,$level_r,$user_tablename,$user_userid,$user_username,$user_rnd,$user_group,$user_userfen,$user_userdate,$dbtbpre,$realplayertype,$mediaplayertype;
	//��֤IP
	eCheckAccessDoIp('onlineinfo');
	$classid=(int)$classid;
	$id=(int)$id;
	$pathid=(int)$pathid;
	$onlinetime=(int)$onlinetime;
	$p=RepPostVar($p);
	if(!$classid||empty($id)||empty($p))
	{exit();}
	$p_r=explode(":::",$p);
	$userid=$p_r[0];
	$rnd=$p_r[1];
	//��֤��
	$cpass=md5(ReturnDownSysCheckIp()."wm_chief".$public_r[downpass].$userid);
	if($cpass<>$pass)
	{exit();}
	//��֤��֤��
	CheckOnlinePass($onlinetime,$onlinepass);
	//������
	if(empty($class_r[$classid][tbname]))
	{exit();}
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id='$id' and classid='$classid'");
	if(empty($r[id]))
	{exit();}
	//����
	if($emod_r[$mid]['tbdataf']&&$emod_r[$mid]['tbdataf']<>',')
	{
		$selectdataf=substr($emod_r[$mid]['tbdataf'],1,-1);
		$finfor=$empire->fetch1("select ".$selectdataf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$r[id]'");
		$r=array_merge($r,$finfor);
	}
	//�������ص�ַ
	$path_r=explode("\r\n",$r[onlinepath]);
	if(!$path_r[$pathid])
	{
		exit();
	}
	$showdown_r=explode("::::::",$path_r[$pathid]);
	$downgroup=$showdown_r[2];
	//����Ȩ��
	if($downgroup)
	{
		$userid=(int)$userid;
		//ȡ�û�Ա����
		$u=$empire->fetch1("select * from ".$user_tablename." where ".$user_userid."='$userid' and ".$user_rnd."='$rnd'");
		if(empty($u[$user_userid]))
		{exit();}
		//���ش�������
		$setuserday="";
		if($level_r[$u[$user_group]][daydown])
		{
			$setuserday=DoCheckMDownNum($userid,$u[$user_group],1);
		}
		if($level_r[$downgroup][level]>$level_r[$u[$user_group]][level])
		{
			exit();
		}
		//�����Ƿ��㹻
		$showdown_r[3]=intval($showdown_r[3]);
		if($showdown_r[3])
		{
			//---------�Ƿ�����ʷ��¼
		    $bakr=$empire->fetch1("select id,truetime from {$dbtbpre}enewsdownrecord where id='$id' and classid='$classid' and userid='$userid' and pathid='$pathid' and online=1 order by truetime desc limit 1");
			if($bakr[id]&&(time()-$bakr[truetime]<=$public_r[redodown]*3600))
			{}
			else
			{
				//���¿�
				if($u[$user_userdate]-time()>0)
				{}
				//����
				else
				{
			       if($showdown_r[3]>$u[$user_userfen])
			       {
					   exit();
			       }
			       //ȥ������
				   $usql=$empire->query("update ".$user_tablename." set ".$user_userfen."=".$user_userfen."-".$showdown_r[3]." where ".$user_userid."='$userid'");
				}
				//�������ؼ�¼
				$utfusername=doUtfAndGbk($u[$user_username],1);
				BakDown($classid,$id,$pathid,$userid,$utfusername,$r[title],$showdown_r[3],1);
			}
		}
		//�����û����ش���
		if($setuserday)
		{
			$usql=$empire->query($setuserday);
		}
	}
	//������������һ
    $usql=$empire->query("update {$dbtbpre}ecms_".$class_r[$classid][tbname]." set totaldown=totaldown+1 where id='$id'");
	//ѡ�񲥷���
	$ftype=GetFiletype($showdown_r[1]);
	if(strstr($realplayertype,','.$ftype.','))
	{
		Header("Content-Type: audio/x-pn-realaudio");
	}
	else
	{
		Header("Content-Type: video/x-ms-asf");
	}
    $downurl=stripSlashes($showdown_r[1]);
	$downurlr=ReturnDownQzPath($downurl,$showdown_r[4]);
	$downurl=$downurlr['repath'];
	//������
	@include("../class/enpath.php");
	$downurl=DoEnOnlinepath($downurl);
    db_close();
    $empire=null;
	echo $downurl;
	exit();
}
?>