<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
define('InEmpireCMSUser',TRUE);

//��ǰ׺
if(!defined('InEmpireCMS'))
{$user_tbpre="phome_";}
else
{$user_tbpre=$dbtbpre;}

//---------------------- ���濪ʼ��Ա������� ----------------------

$user_tablename="{$user_tbpre}enewsmember";               //�û���
$user_userid="userid";                                    //�û�ID�ֶ�
$user_username="username";                                //�û����ֶ�
$user_password="password";                                //�����ֶ�
$user_dopass=0;                                           //���뱣����ʽ,0Ϊmd5,1Ϊ����,2Ϊ˫�ؼ���,3Ϊ16λmd5
$user_rnd="rnd";                                          //�������
$user_email="email";                                      //�����ֶ�
$user_checked="checked";                                  //���״̬�ֶ�
$user_registertime="registertime";                        //ע��ʱ���ֶ�
$user_regcookietime=0;									  //ע����Ϣ����ʱ��(��)
$user_register=0;                                         //ע��ʱ�䱣����ʽ,0Ϊ����ʱ��,1Ϊ��ֵ��
$user_group="groupid";                                    //��Ա���ֶ�
$user_userfen="userfen";                                  //�����ֶ�
$user_userdate="userdate";                                //��Ч���ֶ�
$user_zgroup="zgroupid";								  //����ת���Ա��
$user_money="money";                                      //�ʻ����
$user_havemsg="havemsg";                                  //�ж���Ϣ
$user_groupid=$public_r[defaultgroupid];                  //ע��ʱ��Ա��ID(ecms�Ļ�Ա��)

//��Աҳ��
$changeregisterurl="ChangeRegister.php";                  //���Ա����תע���ַ
$registerurl="";										  //ע���ַ
$eloginurl="";											  //��½��ַ
$equiturl="";											  //�˳���ַ

//��������(��vbb,molyx)
$user_salt="salt";                                        //salt
$user_saltnum=3;                                          //salt������ַ���

$utfdata=0;                                               //�����Ƿ���UTF8����,0Ϊ��������,1ΪUTF8����

//---------------------- ��Ա������ý��� ----------------------

//����ת��
function doUtfAndGbk($str,$phome=0){
	global $utfdata;
	if(empty($utfdata))//��������
	{
		return $str;
    }
	if(!function_exists("iconv"))//�Ƿ�֧��iconv
	{
		$fun="DoIconvVal";
		$code="GB2312";
		$targetcode="UTF8";
	}
	else
	{
		$fun="iconv";
		$code="GBK";
		$targetcode="UTF-8";
	}
	if(empty($phome))
	{
		$str=$fun($code,$targetcode,$str);
	}
	else
	{
		$str=$fun($targetcode,$code,$str);
	}
	return addslashes($str);
}

//��¼����cookie
function AddLoginCookie($r){
}

//ȡ�ñ�id
function GetMemberFormId($groupid){
	global $empire,$dbtbpre;
	$groupid=(int)$groupid;
	$r=$empire->fetch1("select formid from {$dbtbpre}enewsmembergroup where groupid='$groupid'");
	return $r['formid'];
}

//��֤��Ա���Ƿ��ע��
function CheckMemberGroupCanReg($groupid){
	global $empire,$dbtbpre;
	$groupid=(int)$groupid;
	$r=$empire->fetch1("select groupid from {$dbtbpre}enewsmembergroup where groupid='$groupid' and canreg=1");
	if(empty($r['groupid']))
	{
		printerror('ErrorUrl','',1);
	}
}

//��̨�޸�����
function admin_EditMember($add,$logininid,$loginin){
	global $empire,$user_tablename,$user_username,$user_userid,$user_password,$user_dopass,$user_group,$user_email,$user_userfen,$user_money,$user_userdate,$user_saltnum,$user_salt,$user_zgroup,$dbtbpre,$user_checked;
	if(!trim($add[userid])||!trim($add[email])||!trim($add[username])||!$add[groupid])
	{
		printerror("EmptyEmail","history.go(-1)");
	}
    CheckLevel($logininid,$loginin,$classid,"member");//��֤Ȩ��
	//����
	$add[userid]=(int)$add[userid];
	$add[checked]=(int)$add[checked];
	//����ת��
	$dousername=$add[username];
	$dooldusername=$add[oldusername];
	$add[username]=doUtfAndGbk($add[username],0);
	$add[oldusername]=doUtfAndGbk($add[oldusername],0);
	$add[password]=doUtfAndGbk($add[password],0);
	$add[email]=doUtfAndGbk($add[email],0);
	//�޸�����
	$add1='';
	if($add[password])
	{
		$sa='';
		if(empty($user_dopass))//����md5
		{
		   $add[password]=md5($add[password]);
	    }
		elseif($user_dopass==2)//˫��md5
		{
			$salt=make_password($user_saltnum);
			$add[password]=md5(md5($add[password]).$salt);
			$sa=",".$user_salt."='$salt'";
		}
		elseif($user_dopass==3)//16λmd5
		{
			$add[password]=substr(md5($add[password]),8,16);
		}
		else
		{}
		$add1=",".$user_password."='".$add[password]."'".$sa;
    }
	//�޸��û���
	if($add[oldusername]<>$add[username])
	{
		$num=$empire->gettotal("select count(*) as total from ".$user_tablename." where ".$user_username."='$add[username]' and ".$user_userid."<>".$add[userid]." limit 1");
		$add1.=",".$user_username."='$add[username]'";
		if($num)
		{
			printerror("ReUsername","history.go(-1)");
		}
	}
	//����
	$add[zgroupid]=(int)$add[zgroupid];
	if($add[userdate]>0)
	{
		$userdate=time()+$add[userdate]*24*3600;
	}
	else
	{
		$add[zgroupid]=0;
	}
	//����
	$add[groupid]=(int)$add[groupid];
	$add[userfen]=(int)$add[userfen];
	$userdate=(int)$userdate;
	$add[money]=(float)$add[money];
	$add[spacestyleid]=(int)$add[spacestyleid];
	//��֤���ӱ������
	$addr=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$add[userid]'");
	$fid=GetMemberFormId($add[groupid]);
	if(empty($addr[userid]))
	{
		$member_r=ReturnDoMemberF($fid,$_POST,$mr,0,$dousername,1);
	}
	else
	{
		$member_r=ReturnDoMemberF($fid,$_POST,$addr,1,$dousername,1);
	}

	$sql=$empire->query("update ".$user_tablename." set ".$user_email."='$add[email]',".$user_group."=$add[groupid],".$user_userfen."=$add[userfen],".$user_money."=$add[money],".$user_userdate."=$userdate,".$user_zgroup."=$add[zgroupid],".$user_checked."=$add[checked]".$add1." where ".$user_userid."='$add[userid]'");

	//�����û���
	if($add[oldusername]<>$add[username])
	{
		//����Ϣ
		$empire->query("update {$dbtbpre}enewsqmsg set to_username='$dousername' where to_username='$dooldusername'");
		$empire->query("update {$dbtbpre}enewsqmsg set from_username='$dousername' where from_username='$dooldusername'");
		//�ղ�
		$empire->query("update {$dbtbpre}enewsfava set username='$dousername' where userid='$add[userid]'");
		//�����¼
		$empire->query("update {$dbtbpre}enewsbuybak set username='$dousername' where userid='$add[userid]'");
		//���ؼ�¼
		$empire->query("update {$dbtbpre}enewsdownrecord set username='$dousername' where userid='$add[userid]'");
		//��Ϣ��
		$tbsql=$empire->query("select tbname from {$dbtbpre}enewstable");
		while($tbr=$empire->fetch($tbsql))
		{
			$empire->query("update {$dbtbpre}ecms_".$tbr['tbname']." set username='$dousername' where userid='$add[userid]' and ismember=1");
		}
	}

	//���ӱ�
	if(empty($addr[userid]))
	{
		$sql1=$empire->query("insert into {$dbtbpre}enewsmemberadd(userid,spacestyleid".$member_r[0].") values($add[userid],$add[spacestyleid]".$member_r[1].");");
    }
	else
	{
		$sql1=$empire->query("update {$dbtbpre}enewsmemberadd set spacestyleid=$add[spacestyleid]".$member_r[0]." where userid='$add[userid]'");
    }
	if($sql)
	{
	   insert_dolog("userid=".$add[userid]."<br>username=".$dousername);//������־
	   printerror("EditMemberSuccess","ListMember.php");
	}
    else
	{
		printerror("DbError","history.go(-1)");
	}
}

//��̨ɾ����Ա
function admin_DelMember($userid,$loginuserid,$loginusername){
	global $empire,$user_tablename,$user_username,$user_userid,$dbtbpre,$user_group;
	$userid=(int)$userid;
	if(empty($userid))
	{
		printerror("NotDelMemberid","history.go(-1)");
	}
    CheckLevel($loginuserid,$loginusername,$classid,"member");//��֤Ȩ��
	$r=$empire->fetch1("select ".$user_username.",".$user_group." from ".$user_tablename." where ".$user_userid."='$userid'");
	if(empty($r[$user_username]))
	{
		printerror("NotDelMemberid","history.go(-1)");
	}
    $sql=$empire->query("delete from ".$user_tablename." where ".$user_userid."='$userid'");
	$dousername=doUtfAndGbk($r[$user_username],1);
	//ɾ�����ӱ�
	$fid=GetMemberFormId($r[$user_group]);
	DoDelMemberF($fid,$userid,$dousername);
	//ɾ���ղ�
	$del=$empire->query("delete from {$dbtbpre}enewsfava where userid='$userid'");
	$del=$empire->query("delete from {$dbtbpre}enewsfavaclass where userid='$userid'");
	//ɾ������Ϣ
	$del=$empire->query("delete from {$dbtbpre}enewsqmsg where to_username='".$dousername."'");
	//ɾ�������¼
	$del=$empire->query("delete from {$dbtbpre}enewsbuybak where userid='$userid'");
	//ɾ�����ؼ�¼
	$del=$empire->query("delete from {$dbtbpre}enewsdownrecord where userid='$userid'");
	//ɾ�����Ѽ�¼
	$del=$empire->query("delete from {$dbtbpre}enewshy where userid='$userid'");
	$del=$empire->query("delete from {$dbtbpre}enewshyclass where userid='$userid'");
	//ɾ������
	$del=$empire->query("delete from {$dbtbpre}enewsmembergbook where userid='$userid'");
	//ɾ������
	$del=$empire->query("delete from {$dbtbpre}enewsmemberfeedback where userid='$userid'");
    if($sql)
	{
	    insert_dolog("userid=".$userid."<br>username=".$dousername);//������־
		printerror("DelMemberSuccess","ListMember.php");
	}
    else
	{
		printerror("DbError","history.go(-1)");
	}
}

//��̨����ɾ����Ա
function admin_DelMember_all($userid,$logininid,$loginin){
	global $empire,$user_tablename,$user_username,$user_userid,$dbtbpre,$level_r,$user_group;
    CheckLevel($logininid,$loginin,$classid,"member");//��֤Ȩ��
    $count=count($userid);
    if(!$count)
	{
		 printerror("NotDelMemberid","history.go(-1)");
	}
	$dh="";
	for($i=0;$i<$count;$i++)
	{
		$euid=(int)$userid[$i];
		//ɾ������Ϣ
		$ur=$empire->fetch1("select ".$user_username.",".$user_group." from ".$user_tablename." where ".$user_userid."='".$euid."'");
		if(empty($ur[$user_username]))
		{
			continue;
		}
		$dousername=doUtfAndGbk($ur[$user_username],1);
		//ɾ�����ӱ�
		$fid=GetMemberFormId($ur[$user_group]);
		DoDelMemberF($fid,$euid,$dousername);
		$del=$empire->query("delete from {$dbtbpre}enewsqmsg where to_username='".$dousername."'");
		//����
		$inid.=$dh.$euid;
		$dh=",";
    }
	if(empty($inid))
	{
		printerror("NotDelMemberid","history.go(-1)");
	}
	$add=$user_userid." in (".$inid.")";
	$adda="userid in (".$inid.")";
	$sql=$empire->query("delete from ".$user_tablename." where ".$add);
	//ɾ���ղ�
	$del=$empire->query("delete from {$dbtbpre}enewsfava where ".$adda);
	$del=$empire->query("delete from {$dbtbpre}enewsfavaclass where ".$adda);
	//ɾ�������¼
	$del=$empire->query("delete from {$dbtbpre}enewsbuybak where ".$adda);
	//ɾ�����ؼ�¼
	$del=$empire->query("delete from {$dbtbpre}enewsdownrecord where ".$adda);
	//ɾ�����Ѽ�¼
	$del=$empire->query("delete from {$dbtbpre}enewshy where ".$adda);
	$del=$empire->query("delete from {$dbtbpre}enewshyclass where ".$adda);
	//ɾ������
	$del=$empire->query("delete from {$dbtbpre}enewsmembergbook where ".$adda);
	//ɾ������
	$del=$empire->query("delete from {$dbtbpre}enewsmemberfeedback where ".$adda);
	if($sql)
	{
	    insert_dolog("");//������־
		printerror("DelMemberSuccess","ListMember.php");
    }
	else
	{
		printerror("DbError","history.go(-1)");
    }
}

//��˻�Ա
function admin_DoCheckMember_all($userid,$logininid,$loginin){
	global $empire,$user_tablename,$user_userid,$dbtbpre,$user_checked;
    CheckLevel($logininid,$loginin,$classid,"member");//��֤Ȩ��
    $count=count($userid);
    if(!$count)
	{
		 printerror("NotChangeDoCheckMember","history.go(-1)");
	}
	for($i=0;$i<$count;$i++)
	{
		$dh=",";
		if($i==0)
		{
			$dh="";
		}
		//����
		$inid.=$dh.intval($userid[$i]);
	}
	$sql=$empire->query("update ".$user_tablename." set ".$user_checked."=1 where ".$user_userid." in (".$inid.")");
	if($sql)
	{
		insert_dolog("");//������־
		printerror("DoCheckMemberSuccess","ListMember.php");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//ȡ���ʼ���ַ
function GetUserEmail($userid,$username){
	global $empire,$user_tablename,$user_email,$user_userid;
	$r=$empire->fetch1("select ".$user_email." from ".$user_tablename." where ".$user_userid."='$userid' limit 1");
	return doUtfAndGbk($r[$user_email],1);
}

//�����޸�����
function ReturnUserInfo($userid){
	global $empire,$user_tablename,$user_userid,$user_username,$user_email,$user_group,$user_userfen,$user_money,$user_userdate,$user_zgroup,$user_checked,$user_registertime;
	$r=$empire->fetch1("select ".$user_username.",".$user_email.",".$user_group.",".$user_userfen.",".$user_money.",".$user_userdate.",".$user_zgroup.",".$user_checked.",".$user_registertime." from ".$user_tablename." where ".$user_userid."='$userid' limit 1");
	$re[username]=doUtfAndGbk($r[$user_username],1);
	$re[email]=doUtfAndGbk($r[$user_email],1);
	$re[userfen]=$r[$user_userfen];
	$re[money]=$r[$user_money];
	$re[groupid]=$r[$user_group];
	$re[userdate]=$r[$user_userdate];
	$re[zgroupid]=$r[$user_zgroup];
	$re[checked]=$r[$user_checked];
	$re[registertime]=$r[$user_registertime];
	return $re;
}

//�����Ƿ����
function ReturnGroupChecked($groupid){
	global $level_r;
	if($level_r[$groupid]['regchecked']==1)
	{
		$checked=0;
	}
	else
	{
		$checked=1;
	}
	return $checked;
}

//����ʹ�ÿռ�ģ��
function ReturnGroupSpaceStyleid($groupid){
	global $level_r;
	$spacestyleid=$level_r[$groupid]['spacestyleid']?$level_r[$groupid]['spacestyleid']:0;
	return intval($spacestyleid);
}

//ѡ��ռ�ģ��
function ChangeSpaceStyle($add){
	global $empire,$dbtbpre;
	$user_r=islogin();//�Ƿ��½
	$styleid=intval($add['styleid']);
	if(!$styleid)
	{
		printerror('NotChangeSpaceStyleId','',1);
	}
	$sr=$empire->fetch1("select styleid,membergroup from {$dbtbpre}enewsspacestyle where styleid='$styleid'");
	if(!$sr['styleid']||($sr['membergroup']&&!strstr($sr['membergroup'],','.$user_r[groupid].',')))
	{
		printerror('NotChangeSpaceStyleId','',1);
	}
	$sql=$empire->query("update {$dbtbpre}enewsmemberadd set spacestyleid='$styleid' where userid='$user_r[userid]' limit 1");
	if($sql)
	{
		printerror('ChangeSpaceStyleSuccess','../member/mspace/ChangeStyle.php',1);
	}
	else
	{
		printerror('DbError','',1);
	}
}

//���ÿռ�
function DoSetSpace($add){
	global $empire,$dbtbpre;
	$user_r=islogin();//�Ƿ��½
	$spacename=RepPostStr($add['spacename']);
	$spacegg=RepPostStr($add['spacegg']);
	$sql=$empire->query("update {$dbtbpre}enewsmemberadd set spacename='$spacename',spacegg='$spacegg' where userid='$user_r[userid]' limit 1");
	if($sql)
	{
		printerror('SetSpaceSuccess','../member/mspace/SetSpace.php',1);
	}
	else
	{
		printerror('DbError','',1);
	}
}

//��֤ע��ʱ��
function eCheckIpRegTime($ip,$time){
	global $empire,$dbtbpre,$user_tablename,$user_userid,$user_registertime,$user_register;
	if(empty($time))
	{
		return '';
	}
	$uaddr=$empire->fetch1("select userid from {$dbtbpre}enewsmemberadd where regip='$ip' order by userid desc limit 1");
	if(empty($uaddr['userid']))
	{
		return '';
	}
	$ur=$empire->fetch1("select ".$user_userid.",".$user_registertime." from {$user_tablename} where ".$user_userid."='".$uaddr[userid]."'");
	if(empty($ur[$user_userid]))
	{
		return '';
	}
	$registertime=$ur[$user_registertime];
	if(empty($user_register))
	{
		$registertime=to_time($registertime);
	}
	if(time()-$registertime<=$time*3600)
	{
		printerror('RegisterReIpError','',1);
	}
}

//�û�ע��
function register($username,$password,$repassword,$email){
	global $empire,$user_tablename,$public_r,$user_groupid,$user_username,$user_userid,$user_email,$user_password,$user_dopass,$user_rnd,$user_registertime,$user_register,$user_group,$user_saltnum,$user_salt,$user_seting,$forumgroupid,$registerurl,$dbtbpre,$user_regcookietime,$user_userfen,$user_checked,$level_r;
	if($public_r['register_ok'])//�ر�
	{
		printerror("CloseRegister","history.go(-1)",1);
	}
	//��֤IP
	eCheckAccessDoIp('register');
	if(!empty($registerurl))
	{
		Header("Location:$registerurl");
		exit();
    }
	//�Ѿ���½����ע��
	if(getcvar('mluserid'))
	{
		printerror("LoginToRegister","history.go(-1)",1);
	}
	CheckCanPostUrl();//��֤��Դ
	$add=$_POST;
	$username=trim($username);
	$password=trim($password);
	$username=RepPostVar($username);
	$password=RepPostVar($password);
	if(!$username||!$password||!$email)
	{
		printerror("EmptyMember","history.go(-1)",1);
	}
	//��֤��
	$keyvname='checkregkey';
	if($public_r['regkey_ok'])
	{
		ecmsCheckShowKey($keyvname,$_POST['key'],1);
	}
	$user_groupid=(int)$user_groupid;
	$groupid=(int)$add[groupid];
	$groupid=empty($groupid)?$user_groupid:$groupid;
	CheckMemberGroupCanReg($groupid);
	//IP
	$regip=egetip();
	//�û�����
	$pr=$empire->fetch1("select min_userlen,max_userlen,min_passlen,max_passlen,regretime,regclosewords,regemailonly from {$dbtbpre}enewspublic limit 1");
	$userlen=strlen($username);
	if($userlen<$pr[min_userlen]||$userlen>$pr[max_userlen])
	{
		printerror("FaiUserlen","history.go(-1)",1);
	}
	//��������
	$passlen=strlen($password);
	if($passlen<$pr[min_passlen]||$passlen>$pr[max_passlen])
	{
		printerror("FailPasslen","history.go(-1)",1);
	}
	if($repassword!==$password)
	{
		printerror("NotRepassword","history.go(-1)",1);
	}
	if(!chemail($email))
	{
		printerror("EmailFail","history.go(-1)",1);
	}
	if(strstr($username,"|")||strstr($username,"*"))
	{
		printerror("NotSpeWord","history.go(-1)",1);
	}
	//ͬһIPע��
	eCheckIpRegTime($regip,$pr['regretime']);
	//�����û�
	toCheckCloseWord($username,$pr['regclosewords'],'RegHaveCloseword');
	$username=RepPostStr($username);
	//�ظ��û�
	$num=$empire->gettotal("select count(*) as total from ".$user_tablename." where ".$user_username."='$username' limit 1");
	if($num)
	{
		printerror("ReUsername","history.go(-1)",1);
	}
	//�ظ�����
	$email=RepPostStr($email);
	if($pr['regemailonly'])
	{
		$num=$empire->gettotal("select count(*) as total from ".$user_tablename." where ".$user_email."='$email' limit 1");
		if($num)
		{
			printerror("ReEmailFail","history.go(-1)",1);
		}
	}
	//ע��ʱ��
	if($user_register)
	{
		$registertime=time();
	}
	else
	{
		$registertime=date("Y-m-d H:i:s");
	}
	$birthday=$y.$m.$d;
	$rnd=make_password(12);//�����������
	//����
	if(empty($user_dopass))//����md5
	{
		$password=md5($password);
	}
	elseif($user_dopass==2)//˫��md5
	{
		$salt=make_password($user_saltnum);
		$password=md5(md5($password).$salt);
	}
	elseif($user_dopass==3)//16λmd5
	{
		$password=substr(md5($password),8,16);
	}
	//���
	$checked=ReturnGroupChecked($groupid);
	if($checked&&$public_r['regacttype']==1)
	{
		$checked=0;
	}
	//��֤���ӱ������
	$fid=GetMemberFormId($groupid);
	$member_r=ReturnDoMemberF($fid,$add,$mr,0,$username);

	$sql=$empire->query("insert into ".$user_tablename."(".$user_username.",".$user_password.",".$user_email.",".$user_registertime.",".$user_group.",".$user_rnd.",".$user_userfen.",".$user_checked.") values('$username','$password','$email','$registertime','$groupid','$rnd','$public_r[reggetfen]','$checked');");
	//ȡ��userid
	$userid=$empire->lastid();
	//���ӱ�
	$addr=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$userid'");
	if(!$addr[userid])
	{
		$spacestyleid=ReturnGroupSpaceStyleid($groupid);
		$sql1=$empire->query("insert into {$dbtbpre}enewsmemberadd(userid,spacestyleid,regip".$member_r[0].") values('$userid','$spacestyleid','$regip'".$member_r[1].");");
	}
	ecmsEmptyShowKey($keyvname);//�����֤��
	if($sql)
	{
		//���伤��
		if($checked==0&&$public_r['regacttype']==1)
		{
			include('../class/qmemberfun.php');
			SendActUserEmail($userid,$username,$email);
		}
		//���
		if($checked==0)
		{
			$location=DoingReturnUrl("../../",$_POST['ecmsfrom']);
			printerror("RegisterSuccessCheck",$location,1);
		}
		$logincookie=0;
		if($user_regcookietime)
		{
			$logincookie=time()+$user_regcookietime;
		}
		$set1=esetcookie("mlusername",$username,$logincookie);
		$set2=esetcookie("mluserid",$userid,$logincookie);
		$set3=esetcookie("mlgroupid",$groupid,$logincookie);
		$set4=esetcookie("mlrnd",$rnd,$logincookie);
		$location="../member/cp/";
		$returnurl=getcvar('returnurl');
		if($returnurl&&!strstr($returnurl,"e/member/iframe")&&!strstr($returnurl,"e/member/register")&&!strstr($returnurl,"enews=exit"))
		{
			$location=$returnurl;
		}
		$set5=esetcookie("returnurl","");
		$location=DoingReturnUrl($location,$_POST['ecmsfrom']);
		printerror("RegisterSuccess",$location,1);
	}
	else
	{printerror("DbError","history.go(-1)",1);}
}

//�޸İ�ȫ��Ϣ
function EditSafeInfo($add){
	global $empire,$user_tablename,$public_r,$user_userid,$user_username,$user_password,$user_dopass,$user_email,$user_salt,$user_saltnum,$dbtbpre,$user_group;
	$user_r=islogin();//�Ƿ��½
	$userid=$user_r[userid];
	$username=$user_r[username];
	$rnd=$user_r[rnd];
	//����
	$email=trim($add['email']);
	if(!$email||!chemail($email))
	{
		printerror("EmailFail","history.go(-1)",1);
	}
	$email=RepPostStr($email);
	$email=doUtfAndGbk($email,0);
	//��֤ԭ����
	$oldpassword=RepPostVar($add[oldpassword]);
	if(!$oldpassword)
	{
		printerror('FailOldPassword','',1);
	}
	$a='';
	$sa='';
	$add[password]=RepPostVar($add[password]);
	$password=doUtfAndGbk($add[password],0);
	$oldpassword=doUtfAndGbk($oldpassword,0);
	if(empty($user_dopass))//���ؼ���
	{
		$password=md5($password);
		$oldpassword=md5($oldpassword);
	}
	elseif($user_dopass==2)//˫�ؼ���
	{
		$salt=make_password($user_saltnum);
		$password=md5(md5($password).$salt);
		$sa=",".$user_salt."='$salt'";
	}
	elseif($user_dopass==3)//16λmd5
	{
		$password=substr(md5($password),8,16);
		$oldpassword=substr(md5($oldpassword),8,16);
	}
	$num=0;
	//˫��md5
	if($user_dopass==2)
	{
		$ur=$empire->fetch1("select ".$user_userid.",".$user_salt.",".$user_password." from ".$user_tablename." where ".$user_userid."='$userid'");
		$oldpassword=md5(md5($oldpassword).$ur[$user_salt]);
		$num=0;
		if($oldpassword==$ur[$user_password])
		{$num=1;}
		if(empty($ur[$user_userid]))
		{$num=0;}
	}
	else
	{
		$num=$empire->gettotal("select count(*) as total from ".$user_tablename." where ".$user_userid."='$userid' and ".$user_password."='".$oldpassword."'");
	}
	if(!$num)
	{
		printerror('FailOldPassword','',1);
	}
	//����
	$pr=$empire->fetch1("select regemailonly from {$dbtbpre}enewspublic limit 1");
	if($pr['regemailonly'])
	{
		$num=$empire->gettotal("select count(*) as total from ".$user_tablename." where ".$user_email."='$email' and ".$user_userid."<>'$userid' limit 1");
		if($num)
		{
			printerror("ReEmailFail","history.go(-1)",1);
		}
	}
	//����
	if($add[password])
	{
		if($add[password]!==$add[repassword])
		{
			printerror('NotRepassword','history.go(-1)',1);
		}
		$a=",".$user_password."='".$password."'".$sa;
	}
	$sql=$empire->query("update ".$user_tablename." set ".$user_email."='$email'".$a." where ".$user_userid."='$userid'");
	if($sql)
    {
		printerror("EditInfoSuccess","../member/EditInfo/EditSafeInfo.php",1);
	}
    else
    {printerror("DbError","history.go(-1)",1);}
}

//��Ϣ�޸�
function EditInfo($post){
	global $empire,$user_tablename,$public_r,$user_userid,$user_username,$user_password,$user_dopass,$user_email,$user_salt,$user_saltnum,$dbtbpre,$user_group;
	$user_r=islogin();//�Ƿ��½
	$userid=$user_r[userid];
	$username=$user_r[username];
	$dousername=$username;
	$rnd=$user_r[rnd];
	$groupid=$user_r[groupid];
	if(!$userid||!$username)
	{
		printerror("NotEmpty","history.go(-1)",1);
	}
	//��֤���ӱ������
	$addr=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$userid'");
	$user_r=$empire->fetch1("select ".$user_group." from ".$user_tablename." where ".$user_userid."='$userid'");
	$fid=GetMemberFormId($user_r[$user_group]);
	if(empty($addr[userid]))
	{
		$member_r=ReturnDoMemberF($fid,$post,$mr,0,$dousername);
	}
	else
	{
		$member_r=ReturnDoMemberF($fid,$post,$addr,1,$dousername);
	}
	//���ӱ�
	if(empty($addr[userid]))
	{
		$sql=$empire->query("insert into {$dbtbpre}enewsmemberadd(userid".$member_r[0].") values('$userid'".$member_r[1].");");
    }
	else
	{
		$sql=$empire->query("update {$dbtbpre}enewsmemberadd set userid='$userid'".$member_r[0]." where userid='$userid'");
    }
    if($sql)
    {
		printerror("EditInfoSuccess","../member/EditInfo",1);
	}
    else
    {printerror("DbError","history.go(-1)",1);}
}

//----------------------------------�Ƿ��½
function islogin($uid=0,$uname='',$urnd=''){
	global $empire,$public_r,$editor,$user_tablename,$user_userid,$user_username,$user_email,$user_userfen,$user_money,$user_group,$user_groupid,$user_rnd,$user_zgroup,$user_userdate,$user_havemsg,$ecmsreurl,$eloginurl,$user_checked,$user_registertime;
	if($uid)
	{$userid=(int)$uid;}
	else
	{$userid=(int)getcvar('mluserid');}
	if($uname)
	{$username=$uname;}
	else
	{$username=getcvar('mlusername');}
	$username=RepPostVar($username);
	if($urnd)
	{$rnd=$urnd;}
	else
	{$rnd=getcvar('mlrnd');}
	if($eloginurl)
	{$gotourl=$eloginurl;}
	else
	{$gotourl=$public_r['newsurl']."e/member/login/";}
	$petype=1;
	if(!$userid)
	{
		if(!getcvar('returnurl'))
		{
			esetcookie("returnurl",$_SERVER['HTTP_REFERER'],0);
		}
		if($ecmsreurl==1)
		{
			$gotourl="history.go(-1)";
			$petype=9;
		}
		elseif($ecmsreurl==2)
		{
			$phpmyself=urlencode($_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"]);
			$gotourl=$public_r['newsurl']."e/member/login/login.php?prt=1&from=".$phpmyself;
			$petype=9;
		}
		printerror("NotLogin",$gotourl,$petype);
	}
	$rnd=RepPostVar($rnd);
	$cr=$empire->fetch1("select ".$user_userid.",".$user_username.",".$user_email.",".$user_group.",".$user_userfen.",".$user_money.",".$user_userdate.",".$user_zgroup.",".$user_havemsg.",".$user_checked.",".$user_registertime." from ".$user_tablename." where ".$user_userid."='$userid' and ".$user_username."='$username' and ".$user_rnd."='$rnd' limit 1");
	if(!$cr[$user_userid])
	{
		EmptyEcmsCookie();
		if(!getcvar('returnurl'))
		{
			esetcookie("returnurl",$_SERVER['HTTP_REFERER'],0);
		}
		if($ecmsreurl==1)
		{
			$gotourl="history.go(-1)";
			$petype=9;
		}
		elseif($ecmsreurl==2)
		{
			$phpmyself=urlencode($_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"]);
			$gotourl=$public_r['newsurl']."e/member/login/login.php?prt=1&from=".$phpmyself;
			$petype=9;
		}
		printerror("NotSingleLogin",$gotourl,$petype);
	}
	if($cr[$user_checked]==0)
	{
		EmptyEcmsCookie();
		if($ecmsreurl==1)
		{
			$gotourl="history.go(-1)";
			$petype=9;
		}
		elseif($ecmsreurl==2)
		{
			$phpmyself=urlencode($_SERVER['PHP_SELF']."?".$_SERVER["QUERY_STRING"]);
			$gotourl=$public_r['newsurl']."e/member/login/login.php?prt=1&from=".$phpmyself;
			$petype=9;
		}
		printerror("NotCheckedUser",'',$petype);
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
	$re[rnd]=$rnd;
	$re[username]=doUtfAndGbk($cr[$user_username],1);
	$re[email]=doUtfAndGbk($cr[$user_email],1);
	$re[userfen]=$cr[$user_userfen];
	$re[money]=$cr[$user_money];
	$re[groupid]=$cr[$user_group];
	$re[userdate]=$cr[$user_userdate];
	$re[zgroupid]=$cr[$user_zgroup];
	$re[havemsg]=$cr[$user_havemsg];
	$re[registertime]=$cr[$user_registertime];
	/*
	if($cr[$user_havemsg])
	{
		echo"<script>window.status='�����µ����Ļ�,��ע�����!';</script>";
	}
	*/
	return $re;
}

//-------------------------------------�˳���½
function loginout1($userid,$username,$rnd){
	global $empire,$public_r,$equiturl;
	//�Ƿ��½
	$user_r=islogin();
	if($equiturl)
	{
		Header("Location:$equiturl");
		exit();
	}
	EmptyEcmsCookie();
	$dopr=1;
	if($_GET['prtype'])
	{
		$dopr=9;
	}
	$gotourl="../../";
	if(strstr($_SERVER['HTTP_REFERER'],"e/member/iframe"))
	{
		$gotourl=$public_r['newsurl']."e/member/iframe/";
	}
	$gotourl=DoingReturnUrl($gotourl,$_GET['ecmsfrom']);
	printerror("ExitSuccess",$gotourl,$dopr);
}

//-----------------------------------���COOKIE
function EmptyEcmsCookie(){
	$set1=esetcookie("mlusername","",0);
	$set2=esetcookie("mluserid","",0);
	$set3=esetcookie("mlgroupid","",0);
	$set4=esetcookie("mlrnd","",0);
}

//----------------------------------------��½
function login1($username,$password,$lifetime,$key,$location){
	global $empire,$user_tablename,$user_userid,$user_username,$user_password,$user_dopass,$user_group,$user_groupid,$user_rnd,$public_r,$user_salt,$user_saltnum,$dbtbpre,$eloginurl,$user_checked;
	if($eloginurl)
	{
		Header("Location:$eloginurl");
		exit();
	}
	$dopr=1;
	if($_POST['prtype'])
	{
		$dopr=9;
	}
	if(!trim($username)||!trim($password))
	{printerror("EmptyLogin","history.go(-1)",$dopr);}
	//��֤��
	$keyvname='checkloginkey';
	if($public_r['loginkey_ok'])
	{
		ecmsCheckShowKey($keyvname,$key,$dopr);
	}
	$username=RepPostVar($username);
	$password=RepPostVar($password);
	//����ת��
	$utfusername=doUtfAndGbk($username,0);
	$password=doUtfAndGbk($password,0);
	//����
	if(empty($user_dopass))//����md5
	{
		$password=md5($password);
	}
	if($user_dopass==3)//16λmd5
	{
		$password=substr(md5($password),8,16);
	}
	//˫��md5
	$num=0;
	if($user_dopass==2)
	{
	    $ur=$empire->fetch1("select ".$user_userid.",".$user_salt.",".$user_password." from ".$user_tablename." where ".$user_username."='$utfusername' limit 1");
		$password=md5(md5($password).$ur[$user_salt]);
		$num=0;
		if($password==$ur[$user_password])
		{$num=1;}
		if(empty($ur[$user_userid]))
		{$num=0;}
    }
	else
	{
		$num=$empire->gettotal("select count(*) as total from ".$user_tablename." where ".$user_username."='$utfusername' and ".$user_password."='".$password."' limit 1");
	}
	if(!$num)
	{
		printerror("FailPassword","history.go(-1)",$dopr);
	}
	$r=$empire->fetch1("select * from ".$user_tablename." where ".$user_username."='$utfusername' limit 1");
	if($r[$user_checked]==0)
	{
		if($public_r['regacttype']==1)
		{
			printerror('NotCheckedUser','../member/register/regsend.php',1);
		}
		else
		{
			printerror('NotCheckedUser','',1);
		}
	}
	$time=date("Y-m-d H:i:s");
	$rnd=make_password(12);//ȡ���������
	//Ĭ�ϻ�Ա��
	if(empty($r[$user_group]))
	{$r[$user_group]=$user_groupid;}
	$r[$user_group]=(int)$r[$user_group];
	$usql=$empire->query("update ".$user_tablename." set ".$user_rnd."='$rnd',".$user_group."=".$r[$user_group]." where ".$user_userid."='$r[$user_userid]'");
	//����cookie
	$logincookie=0;
	if($lifetime)
	{
		$logincookie=time()+$lifetime;
	}
	$set1=esetcookie("mlusername",$username,$logincookie);
	$set2=esetcookie("mluserid",$r[$user_userid],$logincookie);
	$set3=esetcookie("mlgroupid",$r[$user_group],$logincookie);
	$set4=esetcookie("mlrnd",$rnd,$logincookie);
	//��¼����cookie
	AddLoginCookie($r);
	$location="../member/cp/";
	$returnurl=getcvar('returnurl');
	if($returnurl)
	{
		$location=$returnurl;
	}
	if(strstr($_SERVER['HTTP_REFERER'],"e/member/iframe"))
	{$location="../member/iframe/";}
	if(strstr($location,"enews=exit")||strstr($location,"e/member/register")||strstr($_SERVER['HTTP_REFERER'],"e/member/register"))
	{
		$location="../member/cp/";
		$_POST['ecmsfrom']='';
	}
	ecmsEmptyShowKey($keyvname);//�����֤��
	$set6=esetcookie("returnurl","");
	if($set1&&$set2)
	{
		$location=DoingReturnUrl($location,$_POST['ecmsfrom']);
		printerror("LoginSuccess",$location,$dopr);
    }
	else
	{
		printerror("NotCookie","history.go(-1)",$dopr);
	}
}

//----------------------------------�������͵���
function GetFen_all($cardfen,$userid,$username){
	global $empire,$user_tablename,$user_userfen;
	$cardfen=(int)$cardfen;
	if(!$cardfen)
	{printerror("EmptyGetFen","history.go(-1)");}
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"card");
	$sql=$empire->query("update ".$user_tablename." set ".$user_userfen."=".$user_userfen."+$cardfen");
	if($sql)
	{
		//������־
		insert_dolog("cardfen=$cardfen");
		printerror("GetFenSuccess","GetFen.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//----------------------------------���ӵ���
function AddInfoFen($cardfen,$userid){
	global $empire,$user_tablename,$user_userfen,$user_userid;
	$cardfen=(int)$cardfen;
	$sql=$empire->query("update ".$user_tablename." set ".$user_userfen."=".$user_userfen."+".$cardfen." where ".$user_userid."='$userid'");
}

//ת���Ա��
function OutTimeZGroup($userid,$zgroupid){
	global $empire,$user_tablename,$user_group,$user_zgroup,$user_userdate,$user_userid;
	if($zgroupid)
	{
		$sql=$empire->query("update ".$user_tablename." set ".$user_group."='".$zgroupid."',".$user_userdate."=0 where ".$user_userid."='$userid'");
	}
	else
	{
		$sql=$empire->query("update ".$user_tablename." set ".$user_userdate."=0 where ".$user_userid."='$userid'");
	}
}

//��ֵ
function eAddFenToUser($fen,$date,$groupid,$zgroupid,$user){
	global $empire,$dbtbpre,$user_tablename,$user_userfen,$user_userdate,$user_userid,$user_username,$user_zgroup,$user_group,$public_r;
	if(!($fen||$date))
	{
		return '';
	}
	$update='';
	//����
	if($fen)
	{
		$update.="$user_userfen=$user_userfen+$fen";
	}
	//��Ч��
	if($date)
	{
		$dh='';
		if($update)
		{
			$dh=',';
		}
		if($user[$user_userdate]<time())
		{
			$userdate=time()+$date*24*3600;
		}
		else
		{
			$userdate=$user[$user_userdate]+$date*24*3600;
		}
		$update.=$dh."$user_userdate='$userdate'";
		//ת���Ա��
		if($groupid)
		{
			$update.=",".$user_group."='$groupid'";
		}
		if($zgroupid)
		{
			$update.=",".$user_zgroup."='$zgroupid'";
		}
	}
	$sql=$empire->query("update ".$user_tablename." set ".$update." where ".$user_userid."='".$user[$user_userid]."'");
	if(!$sql)
	{
		printerror('DbError',$public_r[newsurl],1);
	}
}

//���������
function DoCheckMDownNum($userid,$groupid,$ecms=0){
	global $empire,$dbtbpre,$level_r;
	$ur=$empire->fetch1("select userid,todaydate,todaydown from {$dbtbpre}enewsmemberadd where userid='$userid' limit 1");
	$thetoday=date("Y-m-d");
	if($ur['userid'])
	{
		if($thetoday!=$ur['todaydate'])
		{
			$query="update {$dbtbpre}enewsmemberadd set todaydate='$thetoday',todaydown=1 where userid='$userid'";
		}
		else
		{
			if($ur['todaydown']>=$level_r[$groupid]['daydown'])
			{
				if($ecms==1)
				{
					exit();
				}
				elseif($ecms==2)
				{
					return 'error';
				}
				else
				{
					printerror("CrossDaydown","history.go(-1)",1);
				}
			}
			$query="update {$dbtbpre}enewsmemberadd set todaydown=todaydown+1 where userid='$userid'";
		}
	}
	else
	{
		$query="replace into {$dbtbpre}enewsmemberadd(userid,todaydate,todaydown) values('$userid','$thetoday',1);";
	}
	return $query;
}

//���¼�����֤��
function DoUpdateMemberAuthstr($userid,$authstr){
	global $empire,$dbtbpre;
	$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsmemberadd where userid='$userid' limit 1");
	if($num)
	{
		$sql=$empire->query("update {$dbtbpre}enewsmemberadd set authstr='$authstr' where userid='$userid'");
	}
	else
	{
		$sql=$empire->query("replace into {$dbtbpre}enewsmemberadd(userid,authstr) values('$userid','$authstr');");
	}
	return $sql;
}

//����ע���ֶ�ֵ
function DoMemberFValue($val){
	$val=htmlspecialchars($val,ENT_QUOTES);
	return $val;
}

//ɾ����Ա�ֶθ���
function DelYMemberTranFile($file,$tf,$username=''){
	global $empire,$dbtbpre;
	if(empty($file)){
		return "";
	}
	$r=explode("/",$file);
	$count=count($r);
	$filename=$r[$count-1];
	$fr=$empire->fetch1("select filename,path,fileid,fpath,classid from {$dbtbpre}enewsfile where no='Member[".$tf."]' and filename='$filename' and adduser='[EditInfo]".$username."' limit 1");
	if($fr['fileid'])
	{
		$sql=$empire->query("delete from {$dbtbpre}enewsfile where fileid='$fr[fileid]'");
		DoDelFile($fr);
	}
}

//��ϸ�ѡ������
function ReturnMCheckboxAddF($r,$f,$checkboxf){
	$val=$r;
	if(is_array($r)&&strstr($checkboxf,','.$f.','))
	{
		$val='';
		$count=count($r);
		for($i=0;$i<$count;$i++)
		{
			$val.=$r[$i].'|';
		}
		if($val)
		{
			$val='|'.$val;
		}
	}
	return $val;
}

//���ػ�Ա�ֶ�
function ReturnDoMemberF($fid,$add,$mr,$ecms=0,$username='',$admin=0){
	global $empire,$dbtbpre,$tranpicturetype,$public_r;
	$pr=$empire->fetch1("select openmembertranimg,memberimgsize,memberimgtype,openmembertranfile,memberfilesize,memberfiletype from {$dbtbpre}enewspublic limit 1");
	$formr=$empire->fetch1("select fid,enter,mustenter,filef,imgf,canaddf,caneditf,checkboxf from {$dbtbpre}enewsmemberform where fid='$fid'");
	//�������ֶ�
	$mustr=explode(",",$formr['mustenter']);
	$mustcount=count($mustr);
	for($i=1;$i<$mustcount-1;$i++)
	{
		$mf=$mustr[$i];
		if(strstr($formr['filef'],",".$mf.",")||strstr($formr['imgf'],",".$mf.","))//����
		{
			$mfilef=$mf."file";
			//�ϴ��ļ�
			if($_FILES[$mfilef]['name'])
			{
				if(strstr($formr['imgf'],",".$mf.","))//ͼƬ
				{
					if(!$pr['openmembertranimg'])
					{
						printerror("CloseQTranPic","",1);
					}
				}
				else//����
				{
					if(!$pr['openmembertranfile'])
					{
						printerror("CloseQTranFile","",1);
					}
				}
			}
			elseif(!trim($add[$mf])&&!$mr[$mf])
			{
				printerror("EmptyQMustF","",1);
			}
		}
		else
		{
			$chmustval=ReturnMCheckboxAddF($add[$mf],$mf,$formr['checkboxf']);
			if(!trim($chmustval))
			{
				printerror("EmptyQMustF","",1);
			}
		}
	}
	//�ֶδ���
	$dh="";
	$tranf="";
	$record="<!--record-->";
	$field="<!--field--->";
	$fr=explode($record,$formr['enter']);
	$count=count($fr);
	for($i=0;$i<$count-1;$i++)
	{
		$fr1=explode($field,$fr[$i]);
		$f=$fr1[1];
		if($admin==0&&(($ecms==0&&!strstr($formr['canaddf'],','.$f.','))||($ecms==1&&!strstr($formr['caneditf'],','.$f.','))))
		{continue;}
		//����
		$add[$f]=str_replace('[!#@-','',$add[$f]);
		if(strstr($formr['filef'],",".$f.",")||strstr($formr['imgf'],",".$f.","))
		{
			//�ϴ�����
			$filetf=$f."file";
			if($_FILES[$filetf]['name'])
			{
				$filetype=GetFiletype($_FILES[$filetf]['name']);//ȡ���ļ�����
				if(CheckSaveTranFiletype($filetype))
				{
					printerror("NotQTranFiletype","",1);
				}
				if(strstr($formr['imgf'],",".$f.","))//ͼƬ
				{
					if(!$pr['openmembertranimg'])
					{
						printerror("CloseQTranPic","",1);
					}
					if(!strstr($pr['memberimgtype'],"|".$filetype."|"))
					{
						printerror("NotQTranFiletype","",1);
					}
					if($_FILES[$filetf]['size']>$pr['memberimgsize']*1024)
					{
						printerror("TooBigQTranFile","",1);
					}
					if(!strstr($tranpicturetype,','.$filetype.','))
					{
						printerror("NotQTranFiletype","",1);
					}
				}
				else//����
				{
					if(!$pr['openmembertranfile'])
					{
						printerror("CloseQTranFile","",1);
					}
					if(!strstr($pr['memberfiletype'],"|".$filetype."|"))
					{
						printerror("NotQTranFiletype","",1);
					}
					if($_FILES[$filetf]['size']>$pr['memberfilesize']*1024)
					{
						printerror("TooBigQTranFile","",1);
					}
				}
				$tranf.=$dh.$f;
				$dh=",";
				$fval="[!#@-".$f."-@!]";
			}
			else
			{
				$fval=$add[$f];
				if($ecms==1&&$mr[$f]&&!trim($fval))
				{
					$fval=$mr[$f];
				}
			}
		}
		else
		{
			$add[$f]=ReturnMCheckboxAddF($add[$f],$f,$formr['checkboxf']);
			$fval=$add[$f];
		}
		$fval=DoMemberFValue($fval);
		$fval=RepPostStr2($fval);
		$fval=addslashes($fval);
		if($ecms==0)//���
		{
			$ret_r[0].=",`".$f."`";
			$ret_r[1].=",'".$fval."'";
		}
		else//�༭
		{
			$ret_r[0].=",`".$f."`='".$fval."'";
		}
	}
	//�ϴ�����
	if($tranf)
	{
		$infoid=0;
		$filepass=0;
		$classid=0;
		$tranr=explode(",",$tranf);
		$count=count($tranr);
		for($i=0;$i<$count;$i++)
		{
			$tf=$tranr[$i];
			$tffile=$tf."file";
			$tfr=DoTranFile($_FILES[$tffile]['tmp_name'],$_FILES[$tffile]['name'],$_FILES[$tffile]['type'],$_FILES[$tffile]['size'],$classid);
			if($tfr['tran'])
			{
				if(strstr($formr['imgf'],",".$tf.","))//ͼƬ
				{
					$type=1;
				}
				else//����
				{
					$type=0;
				}
				//д�����ݿ�
				$filetime=date("Y-m-d H:i:s");
				$filesize=(int)$_FILES[$tffile]['size'];
				$sql=$empire->query("insert into {$dbtbpre}enewsfile(filename,filesize,adduser,path,filetime,classid,no,type,id,cjid,fpath) values('$tfr[filename]',$filesize,'[EditInfo]".$username."','$tfr[filepath]','$filetime',$classid,'Member[".$tf."]',$type,$infoid,$filepass,'$public_r[fpath]');");
				//ɾ�����ļ�
				if($ecms==1&&$mr[$tf])
				{
					DelYMemberTranFile($mr[$tf],$tf,$username);
				}
				$repfval=$tfr['url'];
			}
			else
			{
				$repfval=$mr[$tf];
			}
			if($ecms==0)//���
			{
				$ret_r[1]=str_replace("[!#@-".$tf."-@!]",$repfval,$ret_r[1]);
			}
			else//�༭
			{
				$ret_r[0]=str_replace("[!#@-".$tf."-@!]",$repfval,$ret_r[0]);
			}
		}
	}
	return $ret_r;
}

//ɾ����Ա����
function DoDelMemberF($fid,$userid,$username){
	global $empire,$dbtbpre;
	$r=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$userid'");
	$sql=$empire->query("delete from {$dbtbpre}enewsmemberadd where userid='$userid'");
	if(empty($r[userid]))
	{
		return '';
	}
	$formr=$empire->fetch1("select fid,filef,imgf from {$dbtbpre}enewsmemberform where fid='$fid'");
	if(empty($formr['filef']))
	{
		$formr['filef']=',';
	}
	if(empty($formr['imgf']))
	{
		$formr['imgf']=',';
	}
	$fields=substr($formr['filef'],0,strlen($formr['filef'])-1).$formr['imgf'];
	$fr=explode(',',$fields);
	$count=count($fr);
	for($i=1;$i<$count-1;$i++)
	{
		$f=$fr[$i];
		if($r[$f])
		{
			DelYMemberTranFile($r[$f],$f,$username);
		}
	}
}

if($utfdata&&!function_exists("iconv"))
{
	@include_once(dirname(__FILE__)."/doiconv.php");
}
?>