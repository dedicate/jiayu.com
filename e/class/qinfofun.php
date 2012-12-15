<?php
//���û�Ͷ����֤
function qCheckNewMemberAddInfo($registertime){
	global $user_register,$public_r;
	if(empty($public_r['newaddinfotime']))
	{
		return '';
	}
	if(empty($user_register))
	{
		$registertime=to_time($registertime);
	}
	if(time()-$registertime<=$public_r['newaddinfotime']*60)
	{
		printerror('NewMemberAddInfoError','',1);
	}
}

//�����ַ�
function qCheckInfoCloseWord($mid,$add,$closewordsf,$closewords){
	if(empty($closewordsf)||$closewordsf=='|'||empty($closewords)||$closewords=='|')
	{
		return '';
	}
	$fr=explode('|',$closewordsf);
	$count=count($fr);
	$r=explode('|',$closewords);
	$countr=count($r);
	for($i=0;$i<$count;$i++)
	{
		if(empty($fr[$i]))
		{
			continue;
		}
		for($j=0;$j<$countr;$j++)
		{
			if($r[$j]&&stristr($add[$fr[$i]],$r[$j]))
			{
				$GLOBALS['msgclosewords']=$r[$j];
				printerror("HaveCloseWords","history.go(-1)",1);
			}
		}
	}
}

//�ύ�ֶ�ֵ�Ĵ���
function DoqValue($mid,$f,$val){
	global $public_r,$emod_r;
	$val=RepPhpAspJspcodeText($val);
	if(strstr($emod_r[$mid]['editorf'],','.$f.','))//�༭��
	{
		$val=ClearNewsBadCode($val);
	}
	else
	{
		$val=doehtmlstr($val);//�滻html
		if(!strstr($emod_r[$mid]['tobrf'],','.$f.',')&&strstr($emod_r[$mid]['dohtmlf'],','.$f.','))//�ӻس�
		{
			$val=doebrstr($val);
		}
	}
	return $val;
}

//����
function ClearNewsBadCode($text){
	$text=preg_replace(array('!<script!i','!</script>!i','!<link!i','!<iframe!i','!</iframe>!i','!<meta!i','!<body!i'),array('&lt;script','&lt;/script&gt;','&lt;link','&lt;iframe','&lt;/iframe&gt;','&lt;meta','&lt;body'),$text);
	return $text;
}

//�����ֶ�ֵ�Ĵ���
function DoReqValue($mid,$f,$val){
	global $public_r,$emod_r;
	if($emod_r[$mid]['savetxtf']&&$emod_r[$mid]['savetxtf']==$f)//���ı�
	{
		$val=stripSlashes(GetTxtFieldText($val));
	}
	if(strstr($emod_r[$mid]['editorf'],','.$f.','))//�༭��
	{
		return $val;
	}
	$val=dorehtmlstr($val);//�滻html
	if(!strstr($emod_r[$mid]['tobrf'],','.$f.',')&&strstr($emod_r[$mid]['dohtmlf'],','.$f.','))//�ӻس�
	{
		$val=dorebrstr($val);
	}
	return $val;
}

//�滻html����
function doehtmlstr($str){
	$str=htmlspecialchars($str,ENT_QUOTES);
	return $str;
}

//��ԭhtml����
function dorehtmlstr($str){
	return $str;
}

//�滻�س�
function doebrstr($str){
	$str=str_replace("\n","<br />",$str);
	return $str;
}

//��ԭ�س�
function dorebrstr($str){
	$str=str_replace("<br />","\n",$str);
	$str=str_replace("<br>","\n",$str);
	return $str;
}

//Ͷ����������ҳ��
function qAddGetHtml($classid,$id){
	$titleurl=DoGetHtml($classid,$id);
	return $titleurl;
}

//Ͷ������ҳ��
function qAddListHtml($classid,$mid,$qaddlist,$listdt){
	global $class_r;
	if($qaddlist==0)//������
	{
		return "";
	}
	elseif($qaddlist==1)//���ɵ�ǰ��Ŀ
	{
		if(!$listdt)
		{
			$sonclass="|".$classid."|";
			QReClassHtml($sonclass);
		}
	}
	elseif($qaddlist==2)//������ҳ
	{
		QReIndex();
	}
	elseif($qaddlist==3)//���ɸ���Ŀ
	{
		$featherclass=$class_r[$classid]['featherclass'];
		if($featherclass&&$featherclass!="|")
		{
			QReClassHtml($featherclass);
		}
	}
	elseif($qaddlist==4)//���ɵ�ǰ��Ŀ�븸��Ŀ
	{
		$featherclass=$class_r[$classid]['featherclass'];
		if(empty($featherclass))
		{
			$featherclass="|";
		}
		if(!$listdt)
		{
			$featherclass.=$classid."|";
		}
		QReClassHtml($featherclass);
	}
	elseif($qaddlist==5)//���ɸ���Ŀ����ҳ
	{
		QReIndex();
		$featherclass=$class_r[$classid]['featherclass'];
		if($featherclass&&$featherclass!="|")
		{
			QReClassHtml($featherclass);
		}
	}
	elseif($qaddlist==6)//���ɵ�ǰ��Ŀ������Ŀ����ҳ
	{
		QReIndex();
		$featherclass=$class_r[$classid]['featherclass'];
		if(empty($featherclass))
		{
			$featherclass="|";
		}
		if(!$listdt)
		{
			$featherclass.=$classid."|";
		}
		QReClassHtml($featherclass);
	}
}

//Ͷ��������Ŀ
function QReClassHtml($sonclass){
	global $empire,$dbtbpre,$class_r;
	$r=explode("|",$sonclass);
	$count=count($r);
	for($i=1;$i<$count-1;$i++)
	{
		//�ռ���Ŀ
		if($class_r[$r[$i]]['islast'])
		{
			if(!$class_r[$r[$i]]['listdt'])
			{
				ListHtml($r[$i],'',0,$userlistr);
			}
		}
		elseif($class_r[$r[$i]]['islist']==1)//�б�ʽ����Ŀ
		{
			if(!$class_r[$r[$i]]['listdt'])
			{
				ListHtml($r[$i],'',3);
			}
		}
		elseif($class_r[$r[$i]]['islist']==3)//��Ŀ����Ϣʽ
		{
			ReClassBdInfo($r[$i]);
		}
		else//����Ŀ
		{
			$cr=$empire->fetch1("select classtempid from {$dbtbpre}enewsclass where classid='$r[$i]'");
			$classtemp=$class_r[$r[$i]]['islist']==2?GetClassText($r[$i]):GetClassTemp($cr['classtempid']);
			NewsBq($r[$i],$classtemp,0,0);
		}
	}
}

//Ͷ��������ҳ
function QReIndex(){
	$indextemp=GetIndextemp();
	NewsBq($classid,$indextemp,1,0);
}

//��֤Ȩ��
function CheckQdoinfo($classid,$id,$userid,$tbname,$adminqinfo,$ecms=0){
	global $empire,$dbtbpre,$emod_r,$class_r;
	$r=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id='$id' and classid='$classid' and ismember=1 and userid='$userid' limit 1");
	if(!$r[id])
	{
		printerror("HaveNotLevelQInfo","history.go(-1)",1);
	}
	if($adminqinfo==1)//����δ�����Ϣ
	{
		if($r[checked])
		{
			printerror("ClassSetNotAdminQCInfo","history.go(-1)",1);
		}
	}
	elseif($adminqinfo==2)//ֻ�ɱ༭δ�����Ϣ
	{
		if($r[checked]||$ecms!=1)
		{
			printerror("ClassSetNotEditQCInfo","history.go(-1)",1);
		}
	}
	elseif($adminqinfo==3)//ֻ��ɾ��δ�����Ϣ
	{
		if($r[checked]||$ecms!=2)
		{
			printerror("ClassSetNotDelQCInfo","history.go(-1)",1);
		}
	}
	elseif($adminqinfo==4)//����������Ϣ
	{}
	elseif($adminqinfo==5)//ֻ�ɱ༭������Ϣ
	{
		if($ecms!=1)
		{
			printerror("ClassSetNotEditQInfo","history.go(-1)",1);
		}
	}
	elseif($adminqinfo==6)//ֻ��ɾ��������Ϣ
	{
		if($ecms!=2)
		{
			printerror("ClassSetNotDelQInfo","history.go(-1)",1);
		}
	}
	else//���ܹ���Ͷ��
	{
		printerror("ClassSetNotAdminQInfo","history.go(-1)",1);
	}
	//����
	$mid=$class_r[$classid]['modid'];
	if($emod_r[$mid]['tbdataf']&&$emod_r[$mid]['tbdataf']<>',')
	{
		$selectdataf=substr($emod_r[$mid]['tbdataf'],1,-1);
		$finfor=$empire->fetch1("select ".$selectdataf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$r[id]'");
		$r=array_merge($r,$finfor);
	}
	return $r;
}

//�������/Ӱ��
function DoqReturnDownPath($path,$ecms=0){
	global $fun_r;
	$downqz="";
	$fen=0;
	$fuser=0;
	$f_exp="::::::";
	$r_exp="\r\n";
	$returnstr="";
	$path=str_replace($f_exp,"",$path);
	$path=str_replace($r_exp,"",$path);
	if($ecms==0)
	{
		$name=$fun_r['DownPath']."1";
	}
	else
	{
		$name="1";
	}
	if($path)
	{
		$returnstr=$name.$f_exp.$path.$f_exp.$fuser.$f_exp.$fen.$f_exp.$downqz.$r_exp;
	}
	//ȥ�������ַ�
	$returnstr=substr($returnstr,0,strlen($returnstr)-2);
	return $returnstr;
}

//��������/Ӱ�ӵ�ַ
function DoReqDownPath($downpath){
	if(empty($downpath))
	{
		return "";
	}
	$f_exp="::::::";
	$r_exp="\r\n";
	$r=explode($r_exp,$downpath);
	$r1=explode($f_exp,$r[0]);
	return $r1[1];
}

//�����ֶδ���
function DoqSpecialValue($mid,$f,$value,$add,$infor,$ecms=0){
	global $public_r,$loginin,$emod_r;
	if($f=="morepic")//ͼƬ��
	{
		$add['msavepic']=0;
		$value=ReturnMorepicpath($add['msmallpic'],$add['mbigpic'],$add['mpicname'],$add['mdelpicid'],$add['mpicid'],$add,$add['mpicurl_qz'],$ecms);
		$value=doehtmlstr($value);
	}
	elseif($f=="downpath")//���ص�ַ
	{
		$value=DoqReturnDownPath($value,0);
		$value=doehtmlstr($value);
	}
	elseif($f=="onlinepath")//���ߵ�ַ
	{
		$value=DoqReturnDownPath($value,1);
		$value=doehtmlstr($value);
	}
	elseif($f=="newstext")//����
	{
		//Զ�̱���
		//$value=addslashes(CopyImg(stripSlashes($value),$add[copyimg],$add[copyflash],$add[classid],$add[qz_url],$loginin,$add['id'],$add['filepass'],$add['mark']));
	}
	//���ı�
	if($emod_r[$mid]['savetxtf']&&$f==$emod_r[$mid]['savetxtf'])
	{
		if($ecms==1)
		{
			//����Ŀ¼
			$newstexttxt_r=explode("/",$infor[$f]);
			$thetxtfile=$newstexttxt_r[2];
			$truevalue=MkDirTxtFile($newstexttxt_r[0]."/".$newstexttxt_r[1],$thetxtfile);
		}
		else
		{
			//����Ŀ¼
			$thetxtfile=GetFileMd5();
			$truevalue=MkDirTxtFile(date("Y/md"),$thetxtfile);
		}
		//д���ļ�
		EditTxtFieldText($truevalue,$value);
		$value=$truevalue;
	}
	return $value;
}

//�������Ƿ��㹻
function MCheckEnoughFen($userfen,$userdate,$fen){
	if(!($userdate-time()>0))
	{
		if($userfen+$fen<0)
		{
			printerror("HaveNotFenAQinfo","history.go(-1)",1);
		}
	}
}

//�����ֶ�
function ReturnQAddinfoF($mid,$add,$infor,$classid,$filepass,$userid,$username,$ecms=0){
	global $empire,$dbtbpre,$public_r,$emod_r,$tranpicturetype,$mediaplayertype,$realplayertype,$tranflashtype;
	$pr=$empire->fetch1("select qaddtran,qaddtransize,qaddtranimgtype,qaddtranfile,qaddtranfilesize,qaddtranfiletype,closewords,closewordsf from {$dbtbpre}enewspublic limit 1");
	$isadd=$ecms==0?1:0;
	qCheckInfoCloseWord($mid,$add,$pr['closewordsf'],$pr['closewords']);//�����ַ���֤
	//�������ֶ�
	$mustr=explode(",",$emod_r[$mid]['mustqenterf']);
	$mustcount=count($mustr)-1;
	for($i=1;$i<$mustcount;$i++)
	{
		$mf=$mustr[$i];
		if(strstr($emod_r[$mid]['filef'],','.$mf.',')||strstr($emod_r[$mid]['imgf'],','.$mf.',')||strstr($emod_r[$mid]['flashf'],','.$mf.',')||$mf=='downpath'||$mf=='onlinepath')//����
		{
			$mfilef=$mf."file";
			//�ϴ��ļ�
			if($_FILES[$mfilef]['name'])
			{
				if(strstr($emod_r[$mid]['imgf'],','.$mf.','))//ͼƬ
				{
					if(!$pr['qaddtran'])
					{
						printerror("CloseQTranPic","",1);
					}
				}
				else//����
				{
					if(!$pr['qaddtranfile'])
					{
						printerror("CloseQTranFile","",1);
					}
				}
			}
			elseif(!trim($add[$mf])&&!$infor[$mf])
			{
				printerror("EmptyQMustF","",1);
			}
		}
		else
		{
			$chmustval=ReturnCheckboxAddF($add[$mf],$mid,$mf);//��ѡ��
			if(!trim($chmustval))
			{
				printerror("EmptyQMustF","",1);
			}
		}
	}
	//�ֶδ���
	$dh="";
	$tranf="";
	$fr=explode(',',$emod_r[$mid]['qenter']);
	$count=count($fr)-1;
	for($i=1;$i<$count;$i++)
	{
		$f=$fr[$i];
		if($f=='special.field'||($ecms==0&&!strstr($emod_r[$mid]['canaddf'],','.$f.','))||($ecms==1&&!strstr($emod_r[$mid]['caneditf'],','.$f.',')))
		{continue;}
		//����
		$add[$f]=str_replace('[!#@-','',$add[$f]);
		if(strstr($emod_r[$mid]['filef'],','.$f.',')||strstr($emod_r[$mid]['imgf'],','.$f.',')||strstr($emod_r[$mid]['flashf'],','.$f.',')||$f=='downpath'||$f=='onlinepath')
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
				if(strstr($emod_r[$mid]['imgf'],','.$f.','))//ͼƬ
				{
					if(!$pr['qaddtran'])
					{
						printerror("CloseQTranPic","",1);
					}
					if(!strstr($pr['qaddtranimgtype'],"|".$filetype."|"))
					{
						printerror("NotQTranFiletype","",1);
					}
					if($_FILES[$filetf]['size']>$pr['qaddtransize']*1024)
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
					if(!$pr['qaddtranfile'])
					{
						printerror("CloseQTranFile","",1);
					}
					if(!strstr($pr['qaddtranfiletype'],"|".$filetype."|"))
					{
						printerror("NotQTranFiletype","",1);
					}
					if($_FILES[$filetf]['size']>$pr['qaddtranfilesize']*1024)
					{
						printerror("TooBigQTranFile","",1);
					}
					if(strstr($emod_r[$mid]['flashf'],','.$f.','))//flash
					{
						if(!strstr($tranflashtype,",".$filetype.","))
						{printerror("NotQTranFiletype","",1);}
					}
					if($f=="onlinepath")//��Ƶ
					{
						if(strstr($wmv_type,",".$filetype.","))
						{}
					}
				}
				$tranf.=$dh.$f;
				$dh=",";
				$fval="[!#@-".$f."-@!]";
			}
			else
			{
				$fval=$add[$f];
				if($ecms==1&&$infor[$f]&&!trim($fval))
				{
					$fval=$infor[$f];
					//�����ֶ�
					if($f=="downpath"||$f=="onlinepath")
					{
						$fval=DoReqDownPath($fval);
					}
				}
			}
		}
		elseif($f=='newstime')//ʱ��
		{
			if($add[$f])
			{
				$fval=to_time($add[$f]);
			}
			else
			{
				$fval=time();
			}
		}
		elseif($f=='newstext')//����
		{
			if($ecms==0)
			{
				$fval=DoReplaceKeyAndWord($add[$f],1);//�滻�ؼ��ֺ��ַ�
			}
			else
			{
				$fval=$add[$f];
			}
		}
		elseif($f=='infoip')	//ip
		{
			$fval=egetip();
		}
		elseif($f=='infozm')	//��ĸ
		{
			$fval=$add[$f]?$add[$f]:GetInfoZm($add[title]);
		}
		else
		{
			$add[$f]=ReturnCheckboxAddF($add[$f],$mid,$f);//��ѡ��
			$fval=$add[$f];
		}
		$fval=DoFFun($mid,$f,$fval,$isadd,1);//ִ�к���
		ChIsOnlyAddF($mid,$infor[id],$f,$fval,1);//Ψһֵ
		$fval=DoqValue($mid,$f,$fval);
		$fval=DoqSpecialValue($mid,$f,$fval,$add,$infor,$ecms);
		$fval=RepPostStr2($fval);
		if($ecms==1)
		{
			SameDataAddF($info[id],$classid,$mid,$f,$fval);
		}
		$fval=addslashes($fval);
		if($ecms==0)//���
		{
			if(strstr($emod_r[$mid]['tbdataf'],','.$f.','))//����
			{
				$ret_r[2].=",".$f;
				$ret_r[3].=",'".$fval."'";
			}
			else
			{
				$ret_r[0].=",".$f;
				$ret_r[1].=",'".$fval."'";
			}
		}
		else//�༭
		{
			if($f=='infoip')	//ip
			{
				continue;
			}
			if(strstr($emod_r[$mid]['tbdataf'],','.$f.','))//����
			{
				$ret_r[3].=",".$f."='".$fval."'";
			}
			else
			{
				$ret_r[0].=",".$f."='".$fval."'";
			}
		}
	}
	//�ϴ�����
	if($tranf)
	{
		if($ecms==0)
		{
			$infoid=0;
		}
		else
		{
			$infoid=$infor['id'];
			$filepass=0;
		}
		$tranr=explode(",",$tranf);
		$count=count($tranr);
		for($i=0;$i<$count;$i++)
		{
			$tf=$tranr[$i];
			$tffile=$tf."file";
			$tfr=DoTranFile($_FILES[$tffile]['tmp_name'],$_FILES[$tffile]['name'],$_FILES[$tffile]['type'],$_FILES[$tffile]['size'],$classid);
			if($tfr['tran'])
			{
				//�ļ�����
				$mvf=$tf."mtfile";
				if(strstr($emod_r[$mid]['imgf'],','.$tf.','))//ͼƬ
				{
					$type=1;
				}
				elseif(strstr($emod_r[$mid]['flashf'],','.$tf.','))//flash
				{
					$type=2;
				}
				elseif($add[$mvf]==1)//��ý��
				{
					$type=3;
				}
				else//����
				{
					$type=0;
				}
				//д�����ݿ�
				$filetime=date("Y-m-d H:i:s");
				$filesize=(int)$_FILES[$tffile]['size'];
				$classid=(int)$classid;
				$sql=$empire->query("insert into {$dbtbpre}enewsfile(filename,filesize,adduser,path,filetime,classid,no,type,id,cjid,fpath) values('$tfr[filename]','$filesize','[Member]".$username."','$tfr[filepath]','$filetime','$classid','[".$tf."]".addslashes(RepPostStr($add[title]))."','$type','$infoid','$filepass','$public_r[fpath]');");
				//ɾ�����ļ�
				if($ecms==1&&$infor[$tf])
				{
					DelYQTranFile($classid,$infor['id'],$infor[$tf],$tf);
				}
				$repfval=$tfr['url'];
			}
			else
			{
				$repfval=$infor[$tf];
				//�����ֶ�
				if($tf=="downpath"||$tf=="onlinepath")
				{
					$repfval=DoReqDownPath($repfval);
				}
			}
			if($ecms==0)//���
			{
				$ret_r[1]=str_replace("[!#@-".$tf."-@!]",$repfval,$ret_r[1]);
				$ret_r[3]=str_replace("[!#@-".$tf."-@!]",$repfval,$ret_r[3]);
			}
			else//�༭
			{
				$ret_r[0]=str_replace("[!#@-".$tf."-@!]",$repfval,$ret_r[0]);
				$ret_r[3]=str_replace("[!#@-".$tf."-@!]",$repfval,$ret_r[3]);
			}
		}
	}
	$ret_r[4]=$emod_r[$mid]['deftb'];
	return $ret_r;
}

//ɾ��ԭ����
function DelYQTranFile($classid,$id,$file,$tf){
	global $empire,$dbtbpre;
	//�����ֶ�
	if($tf=="downpath"||$tf=="onlinepath")
	{
		$file=DoReqDownPath($file);
	}
	if(empty($file))
	{
		return "";
	}
	$r=explode("/",$file);
	$count=count($r);
	$filename=$r[$count-1];
	$fr=$empire->fetch1("select filename,path,fileid,fpath,classid from {$dbtbpre}enewsfile where classid='$classid' and id='$id' and filename='$filename' limit 1");
	if($fr['fileid'])
	{
		$sql=$empire->query("delete from {$dbtbpre}enewsfile where fileid='$fr[fileid]'");
		DoDelFile($fr);
	}
}

//��ϢͶ��
function DodoInfo($add,$ecms=0){
	global $empire,$public_r,$emod_r,$level_r,$class_r,$dbtbpre,$fun_r;
	//��֤��Դ
	if($ecms==0||$ecms==1)
	{
		CheckCanPostUrl();
	}
	//����Ͷ��
	if($public_r['addnews_ok'])
	{
		printerror("CloseQAdd","",1);
	}
	$classid=(int)$add['classid'];
	$mid=(int)$class_r[$classid]['modid'];
	if(!$mid||!$classid)
	{
		printerror("EmptyQinfoCid","",1);
	}
	$tbname=$emod_r[$mid]['tbname'];
	$qenter=$emod_r[$mid]['qenter'];
	if(!$tbname||!$qenter||$qenter==',')
	{
		printerror("ErrorUrl","history.go(-1)",1);
	}
	$muserid=(int)getcvar('mluserid');
	$musername=RepPostVar(getcvar('mlusername'));
	$mrnd=RepPostVar(getcvar('mlrnd'));
	//ȡ����Ŀ��Ϣ
	$isadd=0;
	if($ecms==0)
	{
		$isadd=1;
	}
	$setuserday='';
	$cr=DoQCheckAddLevel($classid,$muserid,$musername,$mrnd,$ecms,$isadd);
	$setuserday=$cr['checkaddnumquery'];
	$filepass=(int)$add['filepass'];
	$id=(int)$add['id'];
	//��ϱ�������
	$titlecolor=RepPostStr(RepPhpAspJspcodeText($add[titlecolor]));
	$titlefont=TitleFont($add[titlefont],$titlecolor);
	$titlecolor="";
	$titlefont="";
	$ztid=ZtId($add['ztid']);
	$ttid=(int)$add['ttid'];
	$keyboard=addslashes(RepPostStr(trim(DoReplaceQjDh($add[keyboard]))));
	//���عؼ������
	if($keyboard&&strstr($qenter,',special.field,'))
	{
		$keyboard=str_replace('[!--f--!]','',$keyboard);
		$keyid=GetKeyid($keyboard,$classid,$id,$class_r[$classid][link_num]);
	}
	//��֤��
	$keyvname='checkinfokey';
	//-----------------����
	if($ecms==0)
	{
		//ʱ��
		$lasttime=getcvar('lastaddinfotime');
		if($lasttime)
		{
			if(time()-$lasttime<$public_r['readdinfotime'])
			{
				printerror("QAddInfoOutTime","",1);
			}
		}
		//��֤��
		if($cr['qaddshowkey'])
		{
			ecmsCheckShowKey($keyvname,$add['key'],1);
		}
		//�����ֶ�
		$ret_r=ReturnQAddinfoF($mid,$add,$infor,$classid,$filepass,$muserid,$musername,0);
		$checked=$cr['checkqadd'];
		$havehtml=0;
		$newspath=date($cr['newspath']);
		$truetime=time();
		$newstime=$truetime;
		$newstempid=$cr['newstempid'];
		$haveaddfen=0;
		//ǿ��ǩ��
		$isqf=0;
		if($cr['wfid'])
		{
			$checked=0;
			$isqf=1;
		}
		//���۵�
		if($checked&&$muserid)
		{
			AddInfoFen($cr['addinfofen'],$muserid);
			$haveaddfen=1;
		}
		if(empty($muserid))
		{
			$musername=$fun_r['guest'];
		}
		//��ԱͶ��������
		if($setuserday)
		{
			$empire->query($setuserday);
		}
		//����ʱ��
		if(!strstr($qenter,',newstime,'))
		{
			$ret_r[0]=",newstime".$ret_r[0];
			$ret_r[1]=",'$newstime'".$ret_r[1];
		}
		//����
		$sql=$empire->query("insert into {$dbtbpre}ecms_".$tbname."(classid,onclick,newspath,keyboard,keyid,userid,username,ztid,checked,istop,truetime,ismember,dokey,isgood,titlefont,titleurl,filename,groupid,newstempid,plnum,firsttitle,isqf,userfen,totaldown,closepl,havehtml,lastdotime,haveaddfen,infopfen,infopfennum,votenum,stb,ttid".$ret_r[0].") values('$classid',0,'$newspath','$keyboard','$keyid','".$muserid."','".addslashes($musername)."','$ztid','$checked',0,'$truetime',1,1,0,'$titlefont','','',0,'$newstempid',0,0,'$isqf',0,0,0,'$havehtml','$truetime','$haveaddfen',0,0,0,'$ret_r[4]','$ttid'".$ret_r[1].");");
		$id=$empire->lastid();
		//����
		$fsql=$empire->query("insert into {$dbtbpre}ecms_".$tbname."_data_".$ret_r[4]."(id,classid".$ret_r[2].") values('$id','$classid'".$ret_r[3].");");
		//�۵��¼
		if($haveaddfen)
		{
			if($cr['addinfofen']<0)
			{
				BakDown($classid,$id,0,$muserid,$musername,RepPostStr($add[title]),abs($cr['addinfofen']),3);
			}
		}
		//ǩ��
		if($isqf==1)
		{
			InfoInsertToWorkflow($id,$classid,$cr['wfid'],$muserid,addslashes($musername));
		}
		//�ļ�����
		$filename=ReturnInfoFilename($classid,$id,'');
		$usql=$empire->query("update {$dbtbpre}ecms_".$tbname." set filename='$filename' where id='$id'");
		//�޸�ispic
		UpdateTheIspic($classid,$id);
		//�޸ĸ���
		if($filepass)
		{
			$filesql=$empire->query("update {$dbtbpre}enewsfile set classid='$classid',id='$id',cjid=0 where cjid='$filepass'");
		}
		//�����֤��
		ecmsEmptyShowKey($keyvname);
		esetcookie("qeditinfo","",0);
		//����ҳ��
		if($checked&&!$cr['showdt'])
		{
			$titleurl=qAddGetHtml($classid,$id);
		}
		//�����б�
		if($checked)
		{
			qAddListHtml($classid,$mid,$cr['qaddlist'],$cr['listdt']);
			//������һƪ
			if($cr['repreinfo'])
			{
				$prer=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id<$id and classid='$classid' and checked=1 order by id desc limit 1");
				GetHtml($prer,'');
			}
		}
		if($sql)
		{
			$reurl=DoingReturnUrl("AddInfo.php?classid=$classid&mid=$mid",$add['ecmsfrom']);
			if($add['gotoinfourl']&&$checked)//��������ҳ
			{
				if($cr['showdt']==1)
				{
					$reurl=$public_r[newsurl]."e/action/ShowInfo/?classid=$classid&id=$id";
				}
				elseif($cr['showdt']==2)
				{
					$reurl=$public_r[newsurl]."e/action/ShowInfo.php?classid=$classid&id=$id";
				}
				else
				{
					$reurl=$titleurl;
				}
			}
			esetcookie("lastaddinfotime",time(),time()+3600*24);//������󷢱�ʱ��
			printerror("AddQinfoSuccess",$reurl,1);
		}
		else
		{printerror("DbError","history.go(-1)",1);}
	}
	//---------------�޸�
	elseif($ecms==1)
	{
		if(!$id)
		{
			printerror("ErrorUrl","history.go(-1)",1);
		}
		//���Ȩ��
		$infor=CheckQdoinfo($classid,$id,$muserid,$tbname,$cr['adminqinfo'],1);
		//���ʱ��
		if($public_r['qeditinfotime'])
		{
			if(time()-$infor['truetime']>$public_r['qeditinfotime']*60)
			{
				printerror("QEditInfoOutTime","history.go(-1)",1);
			}
		}
		$addfield='';
		//�����ֶ�
		$ret_r=ReturnQAddinfoF($mid,$add,$infor,$classid,$filepass,$muserid,$musername,1);
		if($keyboard)
		{
			$addfield=",keyboard='$keyboard',keyid='$keyid'";
		}
		//�޸��Ƿ���Ҫ���
		if($cr['qeditchecked'])
		{
			$infor['checked']=0;
			$addfield.=",checked=0";
			$relist=1;
			//ɾ��ԭҳ��
			DelNewsFile($infor[filename],$infor[newspath],$infor[classid],$infor[newstext],$infor[groupid]);
		}
		//��ԱͶ��������
		if($setuserday)
		{
			//$empire->query($setuserday);
		}
		$lastdotime=time();
		//����
		$sql=$empire->query("update {$dbtbpre}ecms_".$tbname." set lastdotime=$lastdotime,havehtml=0,ztid='$ztid',ttid='$ttid'".$addfield.$ret_r[0]." where id=$id and classid=$classid and userid='$muserid' and ismember=1");
		//����
		$fsql=$empire->query("update {$dbtbpre}ecms_".$tbname."_data_".$infor[stb]." set classid='$classid'".$ret_r[3]." where id='$id'");
		//�޸�ispic
		UpdateTheIspic($classid,$id);
		//���¸���
		UpdateTheFileEdit($classid,$id);
		esetcookie("qeditinfo","",0);
		//����ҳ��
		if($infor['checked']&&!$cr['showdt'])
		{
			$titleurl=qAddGetHtml($classid,$id);
		}
		//�����б�
		if($infor['checked']||$relist==1)
		{
			qAddListHtml($classid,$mid,$cr['qaddlist'],$cr['listdt']);
		}
		//������һƪ
		if($cr['repreinfo']&&$infor['checked'])
		{
			$prer=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id<$id and classid='$classid' and checked=1 order by id desc limit 1");
			GetHtml($prer,'');
		}
		if($sql)
		{
			$reurl=DoingReturnUrl("ListInfo.php?mid=$mid",$add['ecmsfrom']);
			if($add['editgotoinfourl']&&$infor['checked'])//��������ҳ
			{
				if($cr['showdt']==1)
				{
					$reurl=$public_r[newsurl]."e/action/ShowInfo/?classid=$classid&id=$id";
				}
				elseif($cr['showdt']==2)
				{
					$reurl=$public_r[newsurl]."e/action/ShowInfo.php?classid=$classid&id=$id";
				}
				else
				{
					$reurl=$titleurl;
				}
			}
			printerror("EditQinfoSuccess",$reurl,1);
		}
		else
		{printerror("DbError","history.go(-1)",1);}
	}
	//---------------ɾ��
	elseif($ecms==2)
	{
		if(!$id)
		{
			printerror("ErrorUrl","history.go(-1)",1);
		}
		//���Ȩ��
		$r=CheckQdoinfo($classid,$id,$muserid,$tbname,$cr['adminqinfo'],2);
		$stf=$emod_r[$mid]['savetxtf'];
		$pf=$emod_r[$mid]['pagef'];
		//��ҳ�ֶ�
		if($pf)
		{
			if(strstr($emod_r[$mid]['tbdataf'],','.$pf.','))
			{
				$finfor=$empire->fetch1("select ".$pf." from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id='$id'");
				$r[$pf]=$finfor[$pf];
			}
		}
		//���ı�
		if($stf)
		{
			$newstextfile=$r[$stf];
			$r[$stf]=GetTxtFieldText($r[$stf]);
			//ɾ���ļ�
			DelTxtFieldText($newstextfile);
		}
		//ɾ����Ϣ�ļ�
		DelNewsFile($r[filename],$r[newspath],$classid,$r[$pf],$r[groupid]);
		$sql=$empire->query("delete from {$dbtbpre}ecms_".$tbname." where id=$id and classid=$classid and userid='$muserid' and ismember=1");
		$fsql=$empire->query("delete from {$dbtbpre}ecms_".$tbname."_data_".$r[stb]." where id=$id");
		esetcookie("qdelinfo","",0);
		//ɾ���������¼
		$delsql=$empire->query("delete from {$dbtbpre}enewswfinfo where id='$id' and classid='$classid'");
		$delsql=$empire->query("delete from {$dbtbpre}enewswfinfolog where id='$id' and classid='$classid'");
		$delsql=$empire->query("delete from {$dbtbpre}enewsinfovote where id='$id' and classid='$classid'");
		$delsql=$empire->query("delete from {$dbtbpre}enewsdiggips where id='$id' and classid='$classid'");
		//ɾ������
		DelNewsTheFile($id,$classid);
		//�����б�
		if($r['checked'])
		{
			qAddListHtml($classid,$mid,$cr['qaddlist'],$cr['listdt']);
			//������һƪ
			if($cr['repreinfo'])
			{
				$prer=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id<$id and classid='$classid' and checked=1 order by id desc limit 1");
				GetHtml($prer,'');
				//��һƪ
				$nextr=$empire->fetch1("select * from {$dbtbpre}ecms_".$tbname." where id>$id and classid='$classid' and checked=1 order by id limit 1");
				if($nextr['id'])
				{
					GetHtml($nextr,'');
				}
			}
		}
		if($sql)
		{
			$reurl=DoingReturnUrl("ListInfo.php?mid=$mid",$add['ecmsfrom']);
			printerror("DelQinfoSuccess",$reurl,1);
		}
		else
		{printerror("DbError","history.go(-1)",1);}
	}
	else
	{
		printerror("ErrorUrl","",1);
	}
}

//Ͷ��Ȩ�޼��
function DoQCheckAddLevel($classid,$userid,$username,$rnd,$ecms=0,$isadd=0){
	global $empire,$dbtbpre,$level_r,$public_r;
	$r=$empire->fetch1("select * from {$dbtbpre}enewsclass where classid='$classid'");
	if(!$r['classid']||$r[wburl])
	{
		printerror("EmptyQinfoCid","",1);
	}
	if(!$r['islast'])
	{
		printerror("MustLast","",1);
	}
	if($r['openadd'])
	{
		printerror("NotOpenCQInfo","",1);
	}
	//�Ƿ��½
	if($ecms==1||$ecms==2||($r['qaddgroupid']&&$r['qaddgroupid']<>','))
	{
		$user=islogin($userid,$username,$rnd);
		//��֤�»�ԱͶ��
		if($isadd==1&&$public_r['newaddinfotime'])
		{
			qCheckNewMemberAddInfo($user[registertime]);
		}
	}
	//��Ա��
	if($r['qaddgroupid']&&$r['qaddgroupid']<>',')
	{
		if(!strstr($r['qaddgroupid'],','.$user[groupid].','))
		{
			printerror("HaveNotLevelAQinfo","history.go(-1)",1);
		}
	}
	if($isadd==1)
	{
		//����Ƿ��㹻����
		if($r['addinfofen']<0&&$user['userid'])
		{
			MCheckEnoughFen($user['userfen'],$user['userdate'],$r['addinfofen']);
		}
		//���Ͷ����
		if($r['qaddgroupid']&&$r['qaddgroupid']<>','&&$level_r[$user[groupid]]['dayaddinfo'])
		{
			$r['checkaddnumquery']=DoQCheckAddNum($user['userid'],$user['groupid']);
		}
	}
	//���
	if(($ecms==0||$ecms==1)&&$userid)
	{
		if(!$user[groupid])
		{
			$user=islogin($userid,$username,$rnd);
		}
		if($level_r[$user[groupid]]['infochecked'])
		{
			$r['checkqadd']=1;
			$r['qeditchecked']=0;
		}
	}
	return $r;
}

//���Ͷ����
function DoQCheckAddNum($userid,$groupid){
	global $empire,$dbtbpre,$level_r,$public_r;
	$ur=$empire->fetch1("select userid,todayinfodate,todayaddinfo from {$dbtbpre}enewsmemberadd where userid='$userid' limit 1");
	$thetoday=date("Y-m-d");
	if($ur['userid'])
	{
		if($thetoday!=$ur['todayinfodate'])
		{
			$query="update {$dbtbpre}enewsmemberadd set todayinfodate='$thetoday',todayaddinfo=1 where userid='$userid'";
		}
		else
		{
			if($ur['todayaddinfo']>=$level_r[$groupid]['dayaddinfo'])
			{
				printerror("CrossDayInfo",$public_r['newsurl'],1);
			}
			$query="update {$dbtbpre}enewsmemberadd set todayaddinfo=todayaddinfo+1 where userid='$userid'";
		}
	}
	else
	{
		$query="replace into {$dbtbpre}enewsmemberadd(userid,todayinfodate,todayaddinfo) values('$userid','$thetoday',1);";
	}
	return $query;
}

//�ϴ�����
function DoQTranFile($add,$file,$file_name,$file_type,$file_size,$userid,$username,$rnd,$ecms=0){
	global $empire,$dbtbpre,$public_r,$tranpicturetype,$tranflashtype;
	if($public_r['addnews_ok'])//�ر�Ͷ��
	{
		$ecms!=1?printerror("NotOpenCQInfo","",9):ECMS_QEditorPrintError(1,'','','NotOpenCQInfo','','');
	}
	$filepass=(int)$add['filepass'];
	$classid=(int)$add['classid'];
	if(!$file_name||!$filepass||!$classid)
	{
		$ecms!=1?printerror("EmptyQTranFile","",9):ECMS_QEditorPrintError(1,'','','EmptyQTranFile','','');
	}
	//��֤Ȩ��
	$userid=(int)$userid;
	$username=RepPostVar($username);
	$rnd=RepPostVar($rnd);
	DoQCheckAddLevel($classid,$userid,$username,$rnd,0,0);
	$filetype=GetFiletype($file_name);//ȡ���ļ�����
	if(CheckSaveTranFiletype($filetype))
	{
		$ecms!=1?printerror("NotQTranFiletype","",9):ECMS_QEditorPrintError(1,'','','NotQTranFiletype','','');
	}
	$type=(int)$add['type'];
	$pr=$empire->fetch1("select qaddtran,qaddtransize,qaddtranimgtype,qaddtranfile,qaddtranfilesize,qaddtranfiletype from {$dbtbpre}enewspublic limit 1");
	if($type==1)//ͼƬ
	{
		if(!$pr['qaddtran'])
		{
			$ecms!=1?printerror("CloseQTranPic","",9):ECMS_QEditorPrintError(1,'','','CloseQTranPic','','');
		}
		if(!strstr($pr['qaddtranimgtype'],"|".$filetype."|"))
		{
			$ecms!=1?printerror("NotQTranFiletype","",9):ECMS_QEditorPrintError(1,'','','NotQTranFiletype','','');
		}
		if($file_size>$pr['qaddtransize']*1024)
		{
			$ecms!=1?printerror("TooBigQTranFile","",9):ECMS_QEditorPrintError(1,'','','TooBigQTranFile','','');
		}
		if(!strstr($tranpicturetype,','.$filetype.','))
		{
			$ecms!=1?printerror("NotQTranFiletype","",9):ECMS_QEditorPrintError(1,'','','NotQTranFiletype','','');
		}
	}
	elseif($type==2)//flash
	{
		if(!$pr['qaddtranfile'])
		{
			$ecms!=1?printerror("CloseQTranFile","",9):ECMS_QEditorPrintError(1,'','','CloseQTranFile','','');
		}
		if(!strstr($pr['qaddtranfiletype'],"|".$filetype."|"))
		{
			$ecms!=1?printerror("NotQTranFiletype","",9):ECMS_QEditorPrintError(1,'','','NotQTranFiletype','','');
		}
		if($file_size>$pr['qaddtranfilesize']*1024)
		{
			$ecms!=1?printerror("TooBigQTranFile","",9):ECMS_QEditorPrintError(1,'','','TooBigQTranFile','','');
		}
		if(!strstr($tranflashtype,','.$filetype.','))
		{
			$ecms!=1?printerror("NotQTranFiletype","",9):ECMS_QEditorPrintError(1,'','','NotQTranFiletype','','');
		}
	}
	else//����
	{
		if(!$pr['qaddtranfile'])
		{
			$ecms!=1?printerror("CloseQTranFile","",9):ECMS_QEditorPrintError(1,'','','CloseQTranFile','','');
		}
		if(!strstr($pr['qaddtranfiletype'],"|".$filetype."|"))
		{
			$ecms!=1?printerror("NotQTranFiletype","",9):ECMS_QEditorPrintError(1,'','','NotQTranFiletype','','');
		}
		if($file_size>$pr['qaddtranfilesize']*1024)
		{
			$ecms!=1?printerror("TooBigQTranFile","",9):ECMS_QEditorPrintError(1,'','','TooBigQTranFile','','');
		}
	}
	$r=DoTranFile($file,$file_name,$file_type,$file_size,$classid);
	if(empty($r[tran]))
	{
		$ecms!=1?printerror("TranFail","",9):ECMS_QEditorPrintError(1,'','','TranFail','','');
	}
	//д�����ݿ�
	$filetime=date("Y-m-d H:i:s");
	$r[filesize]=(int)$r[filesize];
	$classid=(int)$classid;
	$sql=$empire->query("insert into {$dbtbpre}enewsfile(filename,filesize,adduser,path,filetime,classid,no,type,id,cjid,fpath) values('$r[filename]','$r[filesize]','[Member]".$username."','$r[filepath]','$filetime','$classid','$r[filename]','$type','$filepass','$filepass','$public_r[fpath]');");
	//�༭��
	if($ecms==1)
	{
		ECMS_QEditorPrintError(0,$r[url],$r[filename],'',$r[filename],$r[filesize]);
	}
	else
	{
		echo"<script>opener.document.add.".$add['field'].".value='".$r['url']."';window.close();</script>";
	}
	db_close();
	$empire=null;
	exit();
}

//----------- �༭�� --------------

//��ʾ��Ϣ
function ECMS_QEditorPrintError($errorNumber,$fileUrl,$fileName,$customMsg,$fileno,$filesize){
	if(empty($errorNumber))
	{
		$errorNumber=0;
		$filesize=ChTheFilesize($filesize);
	}
	else
	{
		@include LoadLang("pub/q_message.php");
		$customMsg=$qmessage_r[$customMsg];
	}
	$errorNumber=(int)$errorNumber;
	echo"<script type=\"text/javascript\">window.parent.OnUploadCompleted($errorNumber,'".addslashes($fileUrl)."','".addslashes($fileName)."','".addslashes($customMsg)."','".addslashes($fileno)."','$filesize');</script>";
	db_close();
	exit();
}
?>