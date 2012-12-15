<?php
//*********************** ר�� *********************

//�����ֶ�ֵ
function ReturnZFvalue($value)
{
	$value=str_replace("\r\n","|",$value);
	return $value;
}

//ȡ��ר���Ԫ��html����
function GetZtFform($type,$f,$fvalue,$fformsize=''){
	if($type=="select"||$type=="radio"||$type=="checkbox")
	{
		return GetZFformSelect($type,$f,$fvalue,$fformsize);
	}
	$file="../data/html/classfhtml.txt";
	$data=ReadFiletext($file);
	$exp="[!--".$type."--]";
	$r=explode($exp,$data);
	$string=str_replace("[!--enews.var--]",$f,$r[1]);
	$string=str_replace("[!--enews.def.val--]",$fvalue,$string);
	if($type=='editor')//�༭��
	{
		$editortype='Default';
		$string=str_replace("[!--editor.type--]",$editortype,$string);
		$string=str_replace("[!--editor.basepath--]",'',$string);
	}
	$string=RepZFformSize($f,$string,$type,$fformsize);
	return addslashes($string);
}

//ȡ��select/radioԪ�ش���
function GetZFformSelect($type,$f,$fvalue,$fformsize=''){
	$vr=explode("|",$fvalue);
	$count=count($vr);
	$change="";
	$def=':default';
	for($i=0;$i<$count;$i++)
	{
		$val=$vr[$i];
		$isdef="";
		if(strstr($val,$def))
		{
			$dr=explode($def,$val);
			$val=$dr[0];
			$isdef="||\$ecmsfirstpost==1";
		}
		if($type=='select')
		{
			$change.="<option value=\"".$val."\"<?=\$r[".$f."]==\"".$val."\"".$isdef."?' selected':''?>>".$val."</option>";
		}
		elseif($type=='checkbox')
		{
			$change.="<input name=\"".$f."[]\" type=\"checkbox\" value=\"".$val."\"<?=strstr(\$r[".$f."],\"|".$val."|\")".$isdef."?' checked':''?>>".$val;
		}
		else
		{
			$change.="<input name=\"".$f."\" type=\"radio\" value=\"".$val."\"<?=\$r[".$f."]==\"".$val."\"".$isdef."?' checked':''?>>".$val;
		}
	}
	if($type=="select")
	{
		if($fformsize)
		{
			$addsize=' style="width:'.$fformsize.'"';
		}
		$change="<select name=\"".$f."\" id=\"".$f."\"".$addsize.">".$change."</select>";
	}
	return $change;
}

//�滻��Ԫ�س���
function RepZFformSize($f,$string,$type,$fformsize=''){
	$fformsize=ReturnDefZFformSize($f,$type,$fformsize);
	if($type=='textarea'||$type=='editor')
	{
		$r=explode(',',$fformsize);
		$string=str_replace('[!--fsize.w--]',$r[0],$string);
		$string=str_replace('[!--fsize.h--]',$r[1],$string);
	}
	else
	{
		$string=str_replace('[!--fsize.w--]',$fformsize,$string);
	}
	return $string;
}

//����Ĭ�ϳ���
function ReturnDefZFformSize($f,$type,$fformsize){
	if(empty($fformsize))
	{
		if($type=='textarea')
		{
			$fformsize='60,10';
		}
		elseif($type=='img')
		{
			$fformsize='45';
		}
		elseif($type=='file')
		{
			$fformsize='45';
		}
		elseif($type=='flash')
		{
			$fformsize='45';
		}
		elseif($type=='date')
		{
			$fformsize='12';
		}
		elseif($type=='color')
		{
			$fformsize='10';
		}
		elseif($type=='linkfield')
		{
			$fformsize='45';
		}
		elseif($type=='downpath')
		{
			$fformsize='45';
		}
		elseif($type=='onlinepath')
		{
			$fformsize='45';
		}
		elseif($type=='editor')
		{
			$fformsize='100%,300';
		}
	}
	return $fformsize;
}

//������Ŀ���ļ�
function ChangeZtForm(){
	global $empire,$dbtbpre;
	$file='../data/html/ztaddform.php';
	$mtemp='';
	$sql=$empire->query("select fname,f,fhtml from {$dbtbpre}enewsztf order by myorder,fid");
	while($r=$empire->fetch($sql))
	{
		$mtemp.="<tr bgcolor='#FFFFFF' height=25><td>".$r['fname']."</td><td>".$r['fhtml']."</td></tr>";
    }
	$mtemp="<?php
if(!defined('InEmpireCMS'))
{exit();}
?>".$mtemp;
	WriteFiletext($file,$mtemp);
}

//����ר���ֶ�
function AddZtF($add,$userid,$username){
	global $empire,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"ztf");
	$add[f]=RepPostVar($add[f]);
	if(empty($add[f])||empty($add[fname]))
	{
		printerror("EmptyF","");
	}
	//�ֶ��Ƿ��ظ�
	$s=$empire->query("SHOW FIELDS FROM {$dbtbpre}enewsztadd");
	$b=0;
	while($r=$empire->fetch($s))
	{
		if($r[Field]==$add[f])
		{
			$b=1;
			break;
		}
    }
	if($b)
	{
		printerror("ReF","");
	}
	$s=$empire->query("SHOW FIELDS FROM {$dbtbpre}enewszt");
	$b=0;
	while($r=$empire->fetch($s))
	{
		if($r[Field]==$add[f])
		{
			$b=1;
			break;
		}
    }
	if($b)
	{
		printerror("ReF","");
	}
	$add[fvalue]=ReturnZFvalue($add[fvalue]);//��ʼ��ֵ
	//�ֶ�����
	if($add[ftype]=="TINYINT"||$add[ftype]=="SMALLINT"||$add[ftype]=="INT"||$add[ftype]=="BIGINT"||$add[ftype]=="FLOAT"||$add[ftype]=="DOUBLE")
	{
		$def=" default '0'";
	}
	elseif($add[ftype]=="VARCHAR")
	{
		$def=" default ''";
	}
	else
	{
		$def="";
	}
	$type=$add[ftype];
	//VARCHAR
	if($add[ftype]=='VARCHAR'&&empty($add[flen]))
	{
		$add[flen]='255';
	}
	//�ֶγ���
	if($add[flen]){
		if($add[ftype]!="TEXT"&&$add[ftype]!="MEDIUMTEXT"&&$add[ftype]!="LONGTEXT"){
			$type.="(".$add[flen].")";
		}
	}
	$field="`".$add[f]."` ".$type." NOT NULL".$def;
	//�����ֶ�
	$asql=$empire->query("alter table {$dbtbpre}enewsztadd add ".$field);
	//�滻����
	$fhtml=GetZtFform($add[fform],$add[f],$add[fvalue],$add[fformsize]);
	if($add[fform]=='select'||$add[fform]=='radio'||$add[fform]=='checkbox')
	{
		$fhtml=str_replace("\$r[","\$addr[",$fhtml);
	}
	//�������
	$add[myorder]=(int)$add[myorder];
	$sql=$empire->query("insert into {$dbtbpre}enewsztf(f,fname,fform,fhtml,fzs,myorder,ftype,flen,fvalue,fformsize) values('$add[f]','$add[fname]','$add[fform]','".addslashes($fhtml)."','".addslashes($add[fzs])."',$add[myorder],'$add[ftype]','$add[flen]','".addslashes($add[fvalue])."','$add[fformsize]');");
	$lastid=$empire->lastid();
	//���±�
	ChangeZtForm();
	if($asql&&$sql)
	{
		//������־
		insert_dolog("fid=".$lastid."<br>f=".$add[f]);
		printerror("AddFSuccess","info/AddZtF.php?enews=AddZtF");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//�޸�ר���ֶ�
function EditZtF($add,$userid,$username){
	global $empire,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"ztf");
	$fid=(int)$add['fid'];
	$add[f]=RepPostVar($add[f]);
	$add[oldf]=RepPostVar($add[oldf]);
	if(empty($add[f])||empty($add[fname])||!$fid){
		printerror("EmptyF","history.go(-1)");
	}
	if($add[f]<>$add[oldf]){
		//�ֶ��Ƿ��ظ�
		$s=$empire->query("SHOW FIELDS FROM {$dbtbpre}enewsztadd");
		$b=0;
		while($r=$empire->fetch($s)){
			if($r[Field]==$add[f]){
				$b=1;
				break;
			}
		}
		if($b){
			printerror("ReF","history.go(-1)");
		}
		$s=$empire->query("SHOW FIELDS FROM {$dbtbpre}enewszt");
		$b=0;
		while($r=$empire->fetch($s))
		{
			if($r[Field]==$add[f])
			{
				$b=1;
				break;
			}
		}
		if($b)
		{
			printerror("ReF","");
		}
	}
	$add[fvalue]=ReturnZFvalue($add[fvalue]);//��ʼ��ֵ
	//�ֶ�����
	if($add[ftype]=="TINYINT"||$add[ftype]=="SMALLINT"||$add[ftype]=="INT"||$add[ftype]=="BIGINT"||$add[ftype]=="FLOAT"||$add[ftype]=="DOUBLE")
	{
		$def=" default '0'";
	}
	elseif($add[ftype]=="VARCHAR")
	{
		$def=" default ''";
	}
	else
	{
		$def="";
	}
	$type=$add[ftype];
	//VARCHAR
	if($add[ftype]=='VARCHAR'&&empty($add[flen]))
	{
		$add[flen]='255';
	}
	//�ֶγ���
	if($add[flen]){
		if($add[ftype]!="TEXT"&&$add[ftype]!="MEDIUMTEXT"&&$add[ftype]!="LONGTEXT"){
			$type.="(".$add[flen].")";
		}
	}
	$field="`".$add[f]."` ".$type." NOT NULL".$def;
	$usql=$empire->query("alter table {$dbtbpre}enewsztadd change `".$add[oldf]."` ".$field);
	//�滻����
	if($add[f]<>$add[oldf]||$add[fform]<>$add[oldfform]||$add[fvalue]<>$add[oldfvalue]||$add[fformsize]<>$add[oldfformsize]){
		$fhtml=GetZtFform($add[fform],$add[f],$add[fvalue],$add[fformsize]);
		if($add[fform]=='select'||$add[fform]=='radio'||$add[fform]=='checkbox')
		{
			$fhtml=str_replace("\$r[","\$addr[",$fhtml);
		}
	}
	else{
		$fhtml=$add[fhtml];
	}
	//�������
	$add[myorder]=(int)$add[myorder];
	$sql=$empire->query("update {$dbtbpre}enewsztf set f='$add[f]',fname='$add[fname]',fform='$add[fform]',fhtml='".addslashes($fhtml)."',fzs='".addslashes($add[fzs])."',myorder=$add[myorder],ftype='$add[ftype]',flen='$add[flen]',fvalue='".addslashes($add[fvalue])."',fformsize='$add[fformsize]' where fid=$fid");
	//���±�
	ChangeZtForm();
	if($usql&&$sql)
	{
		insert_dolog("fid=".$fid."<br>f=".$add[f]);//������־
		printerror("EditFSuccess","info/ListZtF.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//ɾ��ר���ֶ�
function DelZtF($add,$userid,$username){
	global $empire,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"ztf");
	$fid=(int)$add['fid'];
	if(empty($fid)){
		printerror("EmptyFid","history.go(-1)");
	}
	$r=$empire->fetch1("select f from {$dbtbpre}enewsztf where fid='$fid'");
	if(!$r[f]){
		printerror("EmptyFid","history.go(-1)");
	}
	$usql=$empire->query("alter table {$dbtbpre}enewsztadd drop COLUMN `".$r[f]."`");
	$sql=$empire->query("delete from {$dbtbpre}enewsztf where fid='$fid'");
	//���±���
	ChangeZtForm();
	if($usql&&$sql)
	{
		insert_dolog("fid=".$fid."<br>f=".$r[f]);//������־
		printerror("DelFSuccess","info/ListZtF.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//�޸�ר���ֶ�˳��
function EditZtFOrder($fid,$myorder,$userid,$username){
	global $empire,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"ztf");
	for($i=0;$i<count($myorder);$i++)
	{
		$fid[$i]=(int)$fid[$i];
		$newmyorder=(int)$myorder[$i];
		$usql=$empire->query("update {$dbtbpre}enewsztf set myorder=$newmyorder where fid='$fid[$i]'");
    }
	//���±���
	ChangeZtForm();
	printerror("EditFOrderSuccess","info/ListZtF.php");
}

//����ר���ֶ�
function ReturnZtAddF($add,$ecms=0){
	global $empire,$dbtbpre;
	$ret_r[0]='';
	$ret_r[1]='';
	$fsql=$empire->query("select f from {$dbtbpre}enewsztf");
	if($ecms==0)//����
	{
		while($fr=$empire->fetch($fsql))
		{
			$f=$fr['f'];
			$fval=$add[$f];
			$fval=RepPhpAspJspcode($fval);
			$ret_r[0].=",`".$f."`";
			$ret_r[1].=",'".AddAddsData($fval)."'";
		}
	}
	else//�޸�
	{
		while($fr=$empire->fetch($fsql))
		{
			$f=$fr['f'];
			$fval=$add[$f];
			$fval=RepPhpAspJspcode($fval);
			$ret_r[0].=",`".$f."`='".AddAddsData($fval)."'";
		}
	}
	return $ret_r;
}


//����ר���ύ����
function DoPostZtVar($add){
	if(empty($add[zttype])){
		$add[zttype]=".html";
	}
	if(empty($add[ztnum])){
		$add[ztnum]=25;
	}
	$add[zcid]=(int)$add['zcid'];
	$add[jstempid]=(int)$add['jstempid'];
	$add[ztname]=addslashes(htmlspecialchars($add[ztname]));
	$add[intro]=addslashes(RepPhpAspJspcode($add[intro]));
	$add[ztpagekey]=addslashes(RepPhpAspJspcode($add[ztpagekey]));
	$add[ztnum]=(int)$add[ztnum];
	$add[listtempid]=(int)$add[listtempid];
	$add[newline]=(int)$add[newline];
	$add[hotline]=(int)$add[hotline];
	$add[goodline]=(int)$add[goodline];
	$add[classid]=(int)$add[classid];
	$add[hotplline]=(int)$add[hotplline];
	$add[firstline]=(int)$add[firstline];
	$add[islist]=(int)$add[islist];
	$add[maxnum]=(int)$add[maxnum];
	$add[showzt]=(int)$add[showzt];
	$add[classtempid]=(int)$add[classtempid];
	$add['myorder']=(int)$add['myorder'];
	$add[nrejs]=(int)$add[nrejs];
	$add[reorder]=RepPostVar2($add[reorder]);
	$add[classtext]=RepPhpAspJspcode($add[classtext]);
	$add[usezt]=(int)$add[usezt];
	$add[yhid]=(int)$add[yhid];
	//Ŀ¼
	$add[ztpath]=$add['pripath'].$add['ztpath'];
	return $add;
}

//����ר��
function AddZt($add,$userid,$username){
	global $empire,$class_r,$dbtbpre;
	$add[ztpath]=trim($add[ztpath]);
	if(!$add[ztname]||!$add[listtempid]||!$add[ztpath]){
		printerror("EmptyZt","");
	}
	CheckLevel($userid,$username,$classid,"zt");
	$add=DoPostZtVar($add);
	$createpath='../../'.$add[ztpath];
	//���Ŀ¼�Ƿ����
	if(file_exists($createpath)){
		printerror("ReZtpath","");
	}
	CreateZtPath($add[ztpath]);//����ר��Ŀ¼
	//ȡ�ñ���
	$tabler=GetModTable(GetListtempMid($add[listtempid]));
	$tabler[tid]=(int)$tabler[tid];
	$sql=$empire->query("insert into {$dbtbpre}enewszt(ztname,ztnum,listtempid,onclick,ztpath,zttype,newline,zturl,hotline,goodline,classid,hotplline,firstline,islist,maxnum,tid,tbname,reorder,intro,ztimg,zcid,jstempid,showzt,ztpagekey,classtempid,myorder,nrejs,usezt,yhid) values('$add[ztname]',$add[ztnum],$add[listtempid],0,'$add[ztpath]','$add[zttype]',$add[newline],'$add[zturl]',$add[hotline],$add[goodline],$add[classid],$add[hotplline],$add[firstline],$add[islist],$add[maxnum],$tabler[tid],'$tabler[tbname]','$add[reorder]','$add[intro]','$add[ztimg]',$add[zcid],$add[jstempid],$add[showzt],'$add[ztpagekey]','$add[classtempid]',$add[myorder],$add[nrejs],'$add[usezt]','$add[yhid]');");
	$ztid=$empire->lastid();
	//����
	$ret_zr=ReturnZtAddF($add,0);
	$empire->query("replace into {$dbtbpre}enewsztadd(ztid,classtext".$ret_zr[0].") values('$ztid','".addslashes($add[classtext])."'".$ret_zr[1].");");
	//����ҳ��
	if($add[islist]==0||$add[islist]==2)
	{
		$classtemp=$add[islist]==2?GetZtText($ztid):GetClassTemp($add['classtempid']);
		NewsBq($ztid,$classtemp,3,1);
    }
	GetClass();//���»���
	if($sql){
		insert_dolog("ztid=".$ztid."<br>ztname=".$add[ztname]);//������־
		printerror("AddZtSuccess","AddZt.php?enews=AddZt");
	}
	else{
		printerror("DbError","");
	}
}

//�޸�ר��
function EditZt($add,$userid,$username){
	global $empire,$class_r,$dbtbpre;
	$add[ztid]=(int)$add[ztid];
	$add[ztpath]=trim($add[ztpath]);
	if(!$add[ztname]||!$add[listtempid]||!$add[ztpath]||!$add[ztid]){
		printerror("EmptyZt","");
	}
	CheckLevel($userid,$username,$classid,"zt");
	$add=DoPostZtVar($add);
	//�ı�Ŀ¼
	if($add[oldztpath]<>$add[ztpath]){
		$createpath='../../'.$add[ztpath];
		if(file_exists($createpath)){
			printerror("ReZtpath","");
		}
		if($add['oldpripath']==$add['pripath']){
			$new="../../";
			@rename($new.$add[oldztpath],$new.$add[ztpath]);//�ı�Ŀ¼��
		}
		else{
			CreateZtPath($add[ztpath]);//����ר��Ŀ¼
		}
    }
	//ȡ�ñ���
	$tabler=GetModTable(GetListtempMid($add[listtempid]));
	$tabler[tid]=(int)$tabler[tid];
	$sql=$empire->query("update {$dbtbpre}enewszt set ztname='$add[ztname]',ztnum=$add[ztnum],listtempid=$add[listtempid],ztpath='$add[ztpath]',zttype='$add[zttype]',newline=$add[newline],zturl='$add[zturl]',hotline=$add[hotline],goodline=$add[goodline],classid=$add[classid],hotplline=$add[hotplline],firstline=$add[firstline],islist=$add[islist],maxnum=$add[maxnum],tid=$tabler[tid],tbname='$tabler[tbname]',reorder='$add[reorder]',intro='$add[intro]',ztimg='$add[ztimg]',zcid=$add[zcid],jstempid=$add[jstempid],showzt=$add[showzt],ztpagekey='$add[ztpagekey]',classtempid='$add[classtempid]',myorder=$add[myorder],nrejs=$add[nrejs],usezt='$add[usezt]',yhid='$add[yhid]' where ztid='$add[ztid]'");
	//����
	$ret_zr=ReturnZtAddF($add,1);
	$empire->query("update {$dbtbpre}enewsztadd set classtext='".addslashes($add[classtext])."'".$ret_zr[0]." where ztid='$add[ztid]'");
	GetClass();//���»���
	//����ҳ��
	if($add[islist]==0||$add[islist]==2)
	{
		$classtemp=$add[islist]==2?GetZtText($add[ztid]):GetClassTemp($add['classtempid']);
		NewsBq($add[ztid],$classtemp,3,1);
    }
	if($sql){
		insert_dolog("ztid=".$add[ztid]."<br>ztname=".$add[ztname]);//������־
		printerror("EditZtSuccess","ListZt.php");
	}
	else{
		printerror("DbError","");
	}
}

//ɾ��ר��
function DelZt($ztid,$userid,$username){
	global $empire,$dbtbpre;
	$ztid=(int)$ztid;
	if(!$ztid){
		printerror("NotDelZtid","");
	}
	CheckLevel($userid,$username,$classid,"zt");
	$r=$empire->fetch1("select * from {$dbtbpre}enewszt where ztid='$ztid'");
	if(empty($r[ztid])){
		printerror("NotDelZtid","history.go(-1)");
	}
	//ɾ��ר��
	$sql=$empire->query("delete from {$dbtbpre}enewszt where ztid='$ztid'");
	$empire->query("delete from {$dbtbpre}enewsztadd where ztid='$ztid'");
	$delpath="../../".$r[ztpath];
	$del=DelPath($delpath);
	//�ı���Ϣר��ֵ
	$nsql=$empire->query("select id,ztid from {$dbtbpre}ecms_".$r[tbname]." where ztid like '%|".$ztid."|%'");
	while($nr=$empire->fetch($nsql))
	{
		$newztid=str_replace("|".$ztid."|","|",$nr[ztid]);
		$usql=$empire->query("update {$dbtbpre}ecms_".$r[tbname]." set ztid='$newztid' where id='$nr[id]'");
    }
	GetClass();//���»���
	if($sql){
		insert_dolog("ztid=".$ztid."<br>ztname=".$r[ztname]);//������־
		printerror("DelZtSuccess","ListZt.php");
	}
	else{
		printerror("DbError","");
	}
}

//���ר��
function TogZt($add,$userid,$username){
	global $empire,$class_r,$dbtbpre;
	$ztid=(int)$add['ztid'];
	if(empty($ztid))
	{
		printerror("ErrorUrl","history.go(-1)");
    }
	$r=$empire->fetch1("select ztid,ztname,tbname from {$dbtbpre}enewszt where ztid=$ztid");
	if(empty($r['ztid'])||empty($r['tbname']))
	{
		printerror("ErrorUrl","history.go(-1)");
	}
	$wheresql="";
	$formvar="";
	//�ؼ���
	$keyboard=RepPostVar2($add['keyboard']);
	if($keyboard)
	{
		$formvar.=ReturnFormHidden('keyboard',$add['keyboard']);
		$searchfsql='';
		if($add['stitle'])//����
		{
			$searchfsql.="title like '%$keyboard%'";
			$formvar.=ReturnFormHidden('stitle',$add['stitle']);
		}
		if($add['susername'])//������
		{
			if($searchfsql)
			{
				$or=" or ";
			}
			$searchfsql.=$or."username like '%$keyboard%'";
			$formvar.=ReturnFormHidden('susername',$add['susername']);
		}
		if($add['snewstext'])//����
		{
			$or="";
			if($searchfsql)
			{
				$or=" or ";
			}
			$searchfsql.=$or."newstext like '%$keyboard%'";
			$formvar.=ReturnFormHidden('snewstext',$add['snewstext']);
		}
		if($searchfsql)
		{
			$wheresql=" and (".$searchfsql.")";
		}
	}
	//�Ƿ��Ƽ�
	if($add['isgood'])
	{
		$wheresql.=" and isgood>0";
		$formvar.=ReturnFormHidden('isgood',$add['isgood']);
	}
	//ͷ��
	if($add['firsttitle'])
	{
		$wheresql.=" and firsttitle>0";
		$formvar.=ReturnFormHidden('firsttitle',$add['firsttitle']);
	}
	//�б���ͼƬ
	if($add['titlepic'])
	{
		$wheresql.=" and ispic=1";
		$formvar.=ReturnFormHidden('titlepic',$add['titlepic']);
	}
	//���
	if($add['checked'])
	{
		$wheresql.=" and checked=1";
		$formvar.=ReturnFormHidden('checked',$add['checked']);
	}
	//����Ŀˢ��
	$classid=(int)$add['classid'];
    if($classid)
	{
		$formvar.=ReturnFormHidden('classid',$add['classid']);
		//����Ŀ
		if(empty($class_r[$classid][islast]))
		{
			$where=ReturnClass($class_r[$classid][sonclass]);
		}
		//�ռ���Ŀ
		else
		{
			$where="classid='$classid'";
		}
		$wheresql.=" and (".$where.")";
    }
	$startid=(int)$add[startid];
	$endid=(int)$add[endid];
	$startday=RepPostVar($add[startday]);
	$endday=RepPostVar($add[endday]);
	$formvar.=ReturnFormHidden('retype',$add['retype']);
	//��ID
    if($add['retype'])
	{
		if($endid)
		{
			$wheresql.=" and id>=$startid and id<=$endid";
			$formvar.=ReturnFormHidden('startid',$add[startid]).ReturnFormHidden('endid',$add[endid]);
	    }
    }
    else
	{
		if($startday&&$endday)
		{
			$wheresql.=" and truetime>=".to_time($startday." 00:00:00")." and truetime<=".to_time($endday." 23:59:59");
			$formvar.=ReturnFormHidden('startday',$add[startday]).ReturnFormHidden('endday',$add[endday]);
	    }
    }
	//����sql����
	$query=$add['query'];
	if($query)
	{
		$query=ClearAddsData($query);//ȥ��adds
		$wheresql.=" and (".$query.")";
		$formvar.=ReturnFormHidden('query',$add['query']);
	}
	$wheresql=" where ztid not like '%|".$ztid."|%'".$wheresql;
	$owheresql=$wheresql." and ztid=''";
	if($add['doecmszt'])
	{
		if($add['inid'])
		{
			$add['inid']=RepPostVar($add['inid']);
			$wheresql.=" and id not in (".$add['inid'].")";
			$owheresql.=" and id not in (".$add['inid'].")";
		}
		$repztid="|".$ztid."|";
		$conztid=$ztid."|";
		//���ո�ת����|
		$usql=$empire->query("update {$dbtbpre}ecms_".$r['tbname']." set ztid='|'".$owheresql);
		//�����ר��
		$sql=$empire->query("update {$dbtbpre}ecms_".$r['tbname']." set ztid=CONCAT(REPLACE(ztid,'".$repztid."','|'),'".$conztid."')".$wheresql);
		if($usql&&$sql)
		{
			//������־
	        insert_dolog("ztid=$ztid&ztname=$r[ztname]");
			printerror("TogZtSuccess","TogZt.php?ztid=$ztid");
		}
		else
		{
			printerror("DbError","history.go(-1)");
		}
	}
	$re[0]=$wheresql;
	$re[1]=$formvar.ReturnFormHidden('ztid',$ztid).ReturnFormHidden('pline',$add[pline]).ReturnFormHidden('doecmszt',$add[doecmszt]).ReturnFormHidden('enews',$add[enews]).ReturnFormHidden('inid',$add[inid]);
	$re[2]=$r['tbname'];
	$re[3]=$r['ztname'];
	return $re;
}

//����ר����Ϣ
function SaveTogZtInfo($add,$userid,$username){
	global $empire,$dbtbpre;
	if(!trim($add[togztname]))
	{
		printerror('EmptySaveTogZtname','history.go(-1)');
	}
	$add['doecmszt']=(int)$add['doecmszt'];
	$add[classid]=(int)$add[classid];
	//�����ֶ�
	$searchf=',';
	if($add[stitle]==1)
	{
		$searchf.='stitle,';
	}
	if($add[susername]==1)
	{
		$searchf.='susername,';
	}
	if($add[snewstext]==1)
	{
		$searchf.='snewstext,';
	}
	//�����ֶ�
	$specialsearch=',';
	if($add[isgood])
	{
		$specialsearch.='isgood,';
	}
	if($add[firsttitle])
	{
		$specialsearch.='firsttitle,';
	}
	if($add[titlepic])
	{
		$specialsearch.='titlepic,';
	}
	if($add[checked])
	{
		$specialsearch.='checked,';
	}
	$add['retype']=(int)$add['retype'];
	$add['startid']=(int)$add['startid'];
	$add['endid']=(int)$add['endid'];
	$add['pline']=(int)$add['pline'];
	$r=$empire->fetch1("select togid from {$dbtbpre}enewstogzts where togztname='$add[togztname]'");
	if($r[togid])
	{
		$sql=$empire->query("update {$dbtbpre}enewstogzts set keyboard='".addslashes($add[keyboard])."',searchf='$searchf',query='".addslashes($add[query])."',specialsearch='$specialsearch',classid=$add[classid],retype=$add[retype],startday='".addslashes($add[startday])."',endday='".addslashes($add[endday])."',startid=$add[startid],endid=$add[endid],pline=$add[pline],doecmszt=$add[doecmszt] where togid='$r[togid]'");
		$togid=$r[togid];
	}
	else
	{
		$sql=$empire->query("insert into {$dbtbpre}enewstogzts(keyboard,searchf,query,specialsearch,classid,retype,startday,endday,startid,endid,pline,doecmszt,togztname) values('".addslashes($add[keyboard])."','$searchf','".addslashes($add[query])."','$specialsearch',$add[classid],$add[retype],'".addslashes($add[startday])."','".addslashes($add[endday])."',$add[startid],$add[endid],$add[pline],$add[doecmszt],'".addslashes($add[togztname])."');");
		$togid=$empire->lastid();
	}
	if($sql)
	{
		insert_dolog("togid=$togid&togztname=$add[togztname]");//������־
		printerror("SaveTogZtInfoSuccess","TogZt.php?ztid=$add[ztid]&togid=$togid");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//ɾ������ר����Ϣ
function DelTogZtInfo($add,$userid,$username){
	global $empire,$dbtbpre;
	$togid=intval($add[togid]);
	if(!$togid)
	{
		printerror('EmptyDelTogztid','history.go(-1)');
	}
	$r=$empire->fetch1("select togid,togztname from {$dbtbpre}enewstogzts where togid='$togid'");
	if(!$r[togid])
	{
		printerror('EmptyDelTogztid','history.go(-1)');
	}
	$sql=$empire->query("delete from {$dbtbpre}enewstogzts where togid='$togid'");
	if($sql)
	{
		insert_dolog("togid=$togid&togztname=$r[togztname]");//������־
		printerror('DelTogZtInfoSuccess',$_SERVER['HTTP_REFERER']);
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}


//************************************ ��Ŀ ************************************

//�����ֶ�ֵ
function ReturnCFvalue($value)
{
	$value=str_replace("\r\n","|",$value);
	return $value;
}

//ȡ����Ŀ��Ԫ��html����
function GetClassFform($type,$f,$fvalue,$fformsize=''){
	if($type=="select"||$type=="radio"||$type=="checkbox")
	{
		return GetCFformSelect($type,$f,$fvalue,$fformsize);
	}
	$file="../data/html/classfhtml.txt";
	$data=ReadFiletext($file);
	$exp="[!--".$type."--]";
	$r=explode($exp,$data);
	$string=str_replace("[!--enews.var--]",$f,$r[1]);
	$string=str_replace("[!--enews.def.val--]",$fvalue,$string);
	if($type=='editor')//�༭��
	{
		$editortype='Default';
		$string=str_replace("[!--editor.type--]",$editortype,$string);
		$string=str_replace("[!--editor.basepath--]",'',$string);
	}
	$string=RepCFformSize($f,$string,$type,$fformsize);
	return addslashes($string);
}

//ȡ��select/radioԪ�ش���
function GetCFformSelect($type,$f,$fvalue,$fformsize=''){
	$vr=explode("|",$fvalue);
	$count=count($vr);
	$change="";
	$def=':default';
	for($i=0;$i<$count;$i++)
	{
		$val=$vr[$i];
		$isdef="";
		if(strstr($val,$def))
		{
			$dr=explode($def,$val);
			$val=$dr[0];
			$isdef="||\$ecmsfirstpost==1";
		}
		if($type=='select')
		{
			$change.="<option value=\"".$val."\"<?=\$r[".$f."]==\"".$val."\"".$isdef."?' selected':''?>>".$val."</option>";
		}
		elseif($type=='checkbox')
		{
			$change.="<input name=\"".$f."[]\" type=\"checkbox\" value=\"".$val."\"<?=strstr(\$r[".$f."],\"|".$val."|\")".$isdef."?' checked':''?>>".$val;
		}
		else
		{
			$change.="<input name=\"".$f."\" type=\"radio\" value=\"".$val."\"<?=\$r[".$f."]==\"".$val."\"".$isdef."?' checked':''?>>".$val;
		}
	}
	if($type=="select")
	{
		if($fformsize)
		{
			$addsize=' style="width:'.$fformsize.'"';
		}
		$change="<select name=\"".$f."\" id=\"".$f."\"".$addsize.">".$change."</select>";
	}
	return $change;
}

//�滻��Ԫ�س���
function RepCFformSize($f,$string,$type,$fformsize=''){
	$fformsize=ReturnDefCFformSize($f,$type,$fformsize);
	if($type=='textarea'||$type=='editor')
	{
		$r=explode(',',$fformsize);
		$string=str_replace('[!--fsize.w--]',$r[0],$string);
		$string=str_replace('[!--fsize.h--]',$r[1],$string);
	}
	else
	{
		$string=str_replace('[!--fsize.w--]',$fformsize,$string);
	}
	return $string;
}

//����Ĭ�ϳ���
function ReturnDefCFformSize($f,$type,$fformsize){
	if(empty($fformsize))
	{
		if($type=='textarea')
		{
			$fformsize='60,10';
		}
		elseif($type=='img')
		{
			$fformsize='45';
		}
		elseif($type=='file')
		{
			$fformsize='45';
		}
		elseif($type=='flash')
		{
			$fformsize='45';
		}
		elseif($type=='date')
		{
			$fformsize='12';
		}
		elseif($type=='color')
		{
			$fformsize='10';
		}
		elseif($type=='linkfield')
		{
			$fformsize='45';
		}
		elseif($type=='downpath')
		{
			$fformsize='45';
		}
		elseif($type=='onlinepath')
		{
			$fformsize='45';
		}
		elseif($type=='editor')
		{
			$fformsize='100%,300';
		}
	}
	return $fformsize;
}

//������Ŀ���ļ�
function ChangeClassForm(){
	global $empire,$dbtbpre;
	$file='../data/html/classaddform.php';
	$mtemp='';
	$sql=$empire->query("select fname,f,fhtml from {$dbtbpre}enewsclassf order by myorder,fid");
	while($r=$empire->fetch($sql))
	{
		$mtemp.="<tr bgcolor='#FFFFFF' height=25><td>".$r['fname']."</td><td>".$r['fhtml']."</td></tr>";
    }
	$mtemp="<?php
if(!defined('InEmpireCMS'))
{exit();}
?>".$mtemp;
	WriteFiletext($file,$mtemp);
}

//������Ŀ�ֶ�
function AddClassF($add,$userid,$username){
	global $empire,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"classf");
	$add[f]=RepPostVar($add[f]);
	if(empty($add[f])||empty($add[fname]))
	{
		printerror("EmptyF","");
	}
	//�ֶ��Ƿ��ظ�
	$s=$empire->query("SHOW FIELDS FROM {$dbtbpre}enewsclassadd");
	$b=0;
	while($r=$empire->fetch($s))
	{
		if($r[Field]==$add[f])
		{
			$b=1;
			break;
		}
    }
	if($b)
	{
		printerror("ReF","");
	}
	$s=$empire->query("SHOW FIELDS FROM {$dbtbpre}enewsclass");
	$b=0;
	while($r=$empire->fetch($s))
	{
		if($r[Field]==$add[f])
		{
			$b=1;
			break;
		}
    }
	if($b)
	{
		printerror("ReF","");
	}
	$add[fvalue]=ReturnCFvalue($add[fvalue]);//��ʼ��ֵ
	//�ֶ�����
	if($add[ftype]=="TINYINT"||$add[ftype]=="SMALLINT"||$add[ftype]=="INT"||$add[ftype]=="BIGINT"||$add[ftype]=="FLOAT"||$add[ftype]=="DOUBLE")
	{
		$def=" default '0'";
	}
	elseif($add[ftype]=="VARCHAR")
	{
		$def=" default ''";
	}
	else
	{
		$def="";
	}
	$type=$add[ftype];
	//VARCHAR
	if($add[ftype]=='VARCHAR'&&empty($add[flen]))
	{
		$add[flen]='255';
	}
	//�ֶγ���
	if($add[flen]){
		if($add[ftype]!="TEXT"&&$add[ftype]!="MEDIUMTEXT"&&$add[ftype]!="LONGTEXT"){
			$type.="(".$add[flen].")";
		}
	}
	$field="`".$add[f]."` ".$type." NOT NULL".$def;
	//�����ֶ�
	$asql=$empire->query("alter table {$dbtbpre}enewsclassadd add ".$field);
	//�滻����
	$fhtml=GetClassFform($add[fform],$add[f],$add[fvalue],$add[fformsize]);
	if($add[fform]=='select'||$add[fform]=='radio'||$add[fform]=='checkbox')
	{
		$fhtml=str_replace("\$r[","\$addr[",$fhtml);
	}
	//�������
	$add[myorder]=(int)$add[myorder];
	$sql=$empire->query("insert into {$dbtbpre}enewsclassf(f,fname,fform,fhtml,fzs,myorder,ftype,flen,fvalue,fformsize) values('$add[f]','$add[fname]','$add[fform]','".addslashes($fhtml)."','".addslashes($add[fzs])."',$add[myorder],'$add[ftype]','$add[flen]','".addslashes($add[fvalue])."','$add[fformsize]');");
	$lastid=$empire->lastid();
	//���±�
	ChangeClassForm();
	if($asql&&$sql)
	{
		//������־
		insert_dolog("fid=".$lastid."<br>f=".$add[f]);
		printerror("AddFSuccess","info/AddClassF.php?enews=AddClassF");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//�޸���Ŀ�ֶ�
function EditClassF($add,$userid,$username){
	global $empire,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"classf");
	$fid=(int)$add['fid'];
	$add[f]=RepPostVar($add[f]);
	$add[oldf]=RepPostVar($add[oldf]);
	if(empty($add[f])||empty($add[fname])||!$fid){
		printerror("EmptyF","history.go(-1)");
	}
	if($add[f]<>$add[oldf]){
		//�ֶ��Ƿ��ظ�
		$s=$empire->query("SHOW FIELDS FROM {$dbtbpre}enewsclassadd");
		$b=0;
		while($r=$empire->fetch($s)){
			if($r[Field]==$add[f]){
				$b=1;
				break;
			}
		}
		if($b){
			printerror("ReF","history.go(-1)");
		}
		$s=$empire->query("SHOW FIELDS FROM {$dbtbpre}enewsclass");
		$b=0;
		while($r=$empire->fetch($s))
		{
			if($r[Field]==$add[f])
			{
				$b=1;
				break;
			}
		}
		if($b)
		{
			printerror("ReF","");
		}
	}
	$add[fvalue]=ReturnCFvalue($add[fvalue]);//��ʼ��ֵ
	//�ֶ�����
	if($add[ftype]=="TINYINT"||$add[ftype]=="SMALLINT"||$add[ftype]=="INT"||$add[ftype]=="BIGINT"||$add[ftype]=="FLOAT"||$add[ftype]=="DOUBLE")
	{
		$def=" default '0'";
	}
	elseif($add[ftype]=="VARCHAR")
	{
		$def=" default ''";
	}
	else
	{
		$def="";
	}
	$type=$add[ftype];
	//VARCHAR
	if($add[ftype]=='VARCHAR'&&empty($add[flen]))
	{
		$add[flen]='255';
	}
	//�ֶγ���
	if($add[flen]){
		if($add[ftype]!="TEXT"&&$add[ftype]!="MEDIUMTEXT"&&$add[ftype]!="LONGTEXT"){
			$type.="(".$add[flen].")";
		}
	}
	$field="`".$add[f]."` ".$type." NOT NULL".$def;
	$usql=$empire->query("alter table {$dbtbpre}enewsclassadd change `".$add[oldf]."` ".$field);
	//�滻����
	if($add[f]<>$add[oldf]||$add[fform]<>$add[oldfform]||$add[fvalue]<>$add[oldfvalue]||$add[fformsize]<>$add[oldfformsize]){
		$fhtml=GetClassFform($add[fform],$add[f],$add[fvalue],$add[fformsize]);
		if($add[fform]=='select'||$add[fform]=='radio'||$add[fform]=='checkbox')
		{
			$fhtml=str_replace("\$r[","\$addr[",$fhtml);
		}
	}
	else{
		$fhtml=$add[fhtml];
	}
	//�������
	$add[myorder]=(int)$add[myorder];
	$sql=$empire->query("update {$dbtbpre}enewsclassf set f='$add[f]',fname='$add[fname]',fform='$add[fform]',fhtml='".addslashes($fhtml)."',fzs='".addslashes($add[fzs])."',myorder=$add[myorder],ftype='$add[ftype]',flen='$add[flen]',fvalue='".addslashes($add[fvalue])."',fformsize='$add[fformsize]' where fid=$fid");
	//���±�
	ChangeClassForm();
	if($usql&&$sql)
	{
		insert_dolog("fid=".$fid."<br>f=".$add[f]);//������־
		printerror("EditFSuccess","info/ListClassF.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//ɾ����Ŀ�ֶ�
function DelClassF($add,$userid,$username){
	global $empire,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"classf");
	$fid=(int)$add['fid'];
	if(empty($fid)){
		printerror("EmptyFid","history.go(-1)");
	}
	$r=$empire->fetch1("select f from {$dbtbpre}enewsclassf where fid='$fid'");
	if(!$r[f]){
		printerror("EmptyFid","history.go(-1)");
	}
	$usql=$empire->query("alter table {$dbtbpre}enewsclassadd drop COLUMN `".$r[f]."`");
	$sql=$empire->query("delete from {$dbtbpre}enewsclassf where fid='$fid'");
	//���±���
	ChangeClassForm();
	if($usql&&$sql)
	{
		insert_dolog("fid=".$fid."<br>f=".$r[f]);//������־
		printerror("DelFSuccess","info/ListClassF.php");
	}
	else
	{printerror("DbError","history.go(-1)");}
}

//�޸���Ŀ�ֶ�˳��
function EditClassFOrder($fid,$myorder,$userid,$username){
	global $empire,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"classf");
	for($i=0;$i<count($myorder);$i++)
	{
		$fid[$i]=(int)$fid[$i];
		$newmyorder=(int)$myorder[$i];
		$usql=$empire->query("update {$dbtbpre}enewsclassf set myorder=$newmyorder where fid='$fid[$i]'");
    }
	//���±���
	ChangeClassForm();
	printerror("EditFOrderSuccess","info/ListClassF.php");
}

//������Ŀ�ֶ�
function ReturnClassAddF($add,$ecms=0){
	global $empire,$dbtbpre;
	$ret_r[0]='';
	$ret_r[1]='';
	$fsql=$empire->query("select f from {$dbtbpre}enewsclassf");
	if($ecms==0)//����
	{
		while($fr=$empire->fetch($fsql))
		{
			$f=$fr['f'];
			$fval=$add[$f];
			$fval=RepPhpAspJspcode($fval);
			$ret_r[0].=",`".$f."`";
			$ret_r[1].=",'".AddAddsData($fval)."'";
		}
	}
	else//�޸�
	{
		while($fr=$empire->fetch($fsql))
		{
			$f=$fr['f'];
			$fval=$add[$f];
			$fval=RepPhpAspJspcode($fval);
			$ret_r[0].=",`".$f."`='".AddAddsData($fval)."'";
		}
	}
	return $ret_r;
}


//��ϲ����ɵ���Ŀ��Ϣ
function TogNotReClass($changecache=0){
	global $empire,$dbtbpre;
	$sql=$empire->query("select classid,nreclass,nreinfo,nrejs,nottobq from {$dbtbpre}enewsclass where nreclass=1 or nreinfo=1 or nrejs=1 or nottobq=1");
	$nreclass=',';
	$nreinfo=',';
	$nrejs=',';
	$nottobq=',';
	while($r=$empire->fetch($sql))
	{
		if($r['nreclass']==1)
		{
			$nreclass.=$r['classid'].',';
		}
		if($r['nreinfo']==1)
		{
			$nreinfo.=$r['classid'].',';
		}
		if($r['nrejs']==1)
		{
			$nrejs.=$r['classid'].',';
		}
		if($r['nottobq']==1)
		{
			$nottobq.=$r['classid'].',';
		}
	}
	$empire->query("update {$dbtbpre}enewspublic set nreclass='$nreclass',nreinfo='$nreinfo',nrejs='$nrejs',nottobq='$nottobq' limit 1");
	if($changecache==1)
	{
		GetConfig();
	}
}

//����Ͷ��Ȩ��
function DoPostClassQAddGroupid($groupid){
	$count=count($groupid);
	if(!$count)
	{
		return '';
	}
	$qg=',';
	for($i=0;$i<$count;$i++)
	{
		$groupid[$i]=(int)$groupid[$i];
		$qg.=$groupid[$i].',';
	}
	return $qg;
}

//������Ŀ�ύ����
function DoPostClassVar($add){
	if(empty($add[classtype])){
		$add[classtype]=".html";
	}
	$add[classname]=addslashes(htmlspecialchars($add[classname]));
	$add[intro]=addslashes(RepPhpAspJspcode($add[intro]));
	$add[classpagekey]=addslashes(RepPhpAspJspcode($add[classpagekey]));
	//�����ַ�
	$add[listorder]=RepPostVar2($add[listorder]);
	$add[reorder]=RepPostVar2($add[reorder]);
	//�������
	$add[jstempid]=(int)$add['jstempid'];
	$add[bclassid]=(int)$add[bclassid];
	$add[link_num]=(int)$add[link_num];
	$add[newstempid]=(int)$add[newstempid];
	$add[islast]=(int)$add[islast];
	$add[filename]=(int)$add[filename];
	$add[openpl]=(int)$add[openpl];
	$add[openadd]=(int)$add[openadd];
	$add[newline]=(int)$add[newline];
	$add[hotline]=(int)$add[hotline];
	$add[goodline]=(int)$add[goodline];
	$add[groupid]=(int)$add[groupid];
	$add[hotplline]=(int)$add[hotplline];
	$add[modid]=(int)$add[modid];
	$add[checked]=(int)$add[checked];
	$add[firstline]=(int)$add[firstline];
	$add[islist]=(int)$add[islist];
	$add[searchtempid]=(int)$add[searchtempid];
	$add[checkpl]=(int)$add[checkpl];
	$add[down_num]=(int)$add[down_num];
	if(empty($add[down_num])){
		$add[down_num]=1;
	}
	$add[online_num]=(int)$add[online_num];
	if(empty($add[online_num])){
		$add[online_num]=1;
	}
	$add[addinfofen]=(int)$add[addinfofen];
	$add[listdt]=(int)$add[listdt];
	$add[showdt]=(int)$add[showdt];
	$add[maxnum]=(int)$add[maxnum];
	$add[showclass]=(int)$add[showclass];
	$add[checkqadd]=(int)$add[checkqadd];
	$add[qaddlist]=(int)$add[qaddlist];
	$add[qaddgroupid]=DoPostClassQAddGroupid($add[qaddgroupidck]);
	$add[qaddshowkey]=(int)$add[qaddshowkey];
	$add[adminqinfo]=(int)$add[adminqinfo];
	$add[doctime]=(int)$add[doctime];
	$add[nreclass]=(int)$add[nreclass];
	$add[nreinfo]=(int)$add[nreinfo];
	$add[nrejs]=(int)$add[nrejs];
	$add[nottobq]=(int)$add[nottobq];
	$add[lencord]=(int)$add[lencord];
	$add[listtempid]=(int)$add[listtempid];
	$add[dtlisttempid]=(int)$add[dtlisttempid];
	$add[classtempid]=(int)$add[classtempid];
	if(empty($add[bname])){
		$add[bname]=$add[classname];
	}
	$add[myorder]=(int)$add[myorder];
	if($add[infopath]==0)
	{
		$add[ipath]='';
	}
	$add[addreinfo]=(int)$add[addreinfo];
	$add[haddlist]=(int)$add[haddlist];
	$add[sametitle]=(int)$add[sametitle];
	$add[definfovoteid]=(int)$add[definfovoteid];
	$add[qeditchecked]=(int)$add[qeditchecked];
	$add[wapstyleid]=(int)$add[wapstyleid];
	$add[repreinfo]=(int)$add[repreinfo];
	$add[pltempid]=(int)$add[pltempid];
	$add[classtext]=RepPhpAspJspcode($add[classtext]);
	$add[yhid]=(int)$add[yhid];
	$add[wfid]=(int)$add[wfid];
	if($add['islist']==3)
	{
		$add['bdinfoid']=RepPostVar($add['bdinfoid']);
	}
	else
	{
		$add['bdinfoid']='';
	}
	//���÷���Ȩ��
	$add[cgroupid]=DoPostClassQAddGroupid($add[cgroupidck]);
	$add[cgtoinfo]=(int)$add[cgtoinfo];
	if($add[cgroupid])
	{
		$add[classtype]='.php';
		if($add[cgtoinfo])
		{
			$add[filetype]='.php';
		}
	}
	else
	{
		$add[cgtoinfo]=0;
	}
	return $add;
}

//�����ⲿ��Ŀ
function AddWbClass($add,$userid,$username){
	global $empire,$dbtbpre;
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"class");
	$add=DoPostClassVar($add);
	if(!$add[classname]||!$add[wburl])
	{
		printerror("EmptyWbClass","");
	}
	$add[islast]=0;
	//ȡ�ñ���
	$tabler=GetModTable($add[modid]);
	$tabler[tid]=(int)$tabler[tid];
	if(empty($add[bclassid]))//����Ŀ
	{
		$sonclass="";
		$featherclass="";
	}
	else//�м���Ŀ
	{
		//ȡ����һ������Ŀ
		$r=$empire->fetch1("select featherclass,islast,wburl from {$dbtbpre}enewsclass where classid='$add[bclassid]'");
		if($r[islast])//�Ƿ��ռ���Ŀ
		{
			printerror("BclassNotLast","");
		}
		if($r[wburl])
		{
			printerror("BclassNotWb","");
		}
		if(empty($r[featherclass]))
		{
			$r[featherclass]="|";
		}
		$featherclass=$r[featherclass].$add[bclassid]."|";
		$sonclass="";
	}
	$sql=$empire->query("insert into {$dbtbpre}enewsclass(bclassid,classname,is_zt,sonclass,lencord,link_num,newstempid,onclick,listtempid,featherclass,islast,classpath,classtype,newspath,filename,filetype,openpl,openadd,newline,hotline,goodline,classurl,groupid,myorder,filename_qz,hotplline,modid,checked,firstline,bname,islist,searchtempid,tid,tbname,maxnum,checkpl,down_num,online_num,listorder,reorder,intro,classimg,jstempid,addinfofen,listdt,showclass,showdt,checkqadd,qaddlist,qaddgroupid,qaddshowkey,adminqinfo,doctime,classpagekey,dtlisttempid,classtempid,nreclass,nreinfo,nrejs,nottobq,ipath,addreinfo,haddlist,sametitle,definfovoteid,wburl,qeditchecked,wapstyleid,repreinfo,pltempid,cgroupid,yhid,wfid,cgtoinfo,bdinfoid) values($add[bclassid],'$add[classname]',0,'$sonclass',$add[lencord],$add[link_num],$add[newstempid],0,$add[listtempid],'$featherclass',$add[islast],'$classpath','$add[classtype]','$add[newspath]',$add[filename],'$add[filetype]',$add[openpl],$add[openadd],$add[newline],$add[hotline],$add[goodline],'$add[classurl]',$add[groupid],$add[myorder],'$add[filename_qz]',$add[hotplline],$add[modid],$add[checked],$add[firstline],'$add[bname]',$add[islist],$add[searchtempid],$tabler[tid],'$tabler[tbname]',$add[maxnum],$add[checkpl],$add[down_num],$add[online_num],'$add[listorder]','$add[reorder]','$add[intro]','$add[classimg]',$add[jstempid],$add[addinfofen],$add[listdt],$add[showclass],$add[showdt],$add[checkqadd],$add[qaddlist],'$add[qaddgroupid]',$add[qaddshowkey],$add[adminqinfo],$add[doctime],'$add[classpagekey]','$add[dtlisttempid]','$add[classtempid]',$add[nreclass],$add[nreinfo],$add[nrejs],$add[nottobq],'$add[ipath]',$add[addreinfo],$add[haddlist],$add[sametitle],$add[definfovoteid],'$add[wburl]',$add[qeditchecked],$add[wapstyleid],'$add[repreinfo]','$add[pltempid]','$add[cgroupid]','$add[yhid]','$add[wfid]','$add[cgtoinfo]','$add[bdinfoid]');");
	$lastid=$empire->lastid();
	//����
	$ret_cr=ReturnClassAddF($add,0);
	$empire->query("replace into {$dbtbpre}enewsclassadd(classid,classtext".$ret_cr[0].") values('$lastid','".addslashes($add[classtext])."'".$ret_cr[1].");");
	GetClass();
	DelListEnews();//ɾ�������ļ�
	if($sql)
	{
		insert_dolog("classid=".$lastid."<br>classname=".$add[classname]);//������־
		printerror("AddClassSuccess","AddClass.php?enews=AddClass&from=$add[from]");
	}
	else
	{
		printerror("DbError","");
	}
}

//������Ŀ
function AddClass($add,$userid,$username){
	global $empire,$dbtbpre;
	//�����ⲿ��Ŀ
	if($add[ecmsclasstype])
	{
		AddWbClass($add,$userid,$username);
	}
	$add[classpath]=trim($add[classpath]);
	if(!$add[classname]||!$add[classpath]||!$add[modid])
	{
		printerror("EmptyClass","");
	}
	if($add[islast]&&(!$add[newstempid]||!$add[listtempid]))
	{
		printerror("LastMustChange","");
	}
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"class");
	$add=DoPostClassVar($add);
	//Ŀ¼�Ѵ���
	if(strstr($add[classpath],".")||strstr($add[classpath],"/")||strstr($add[classpath],"\\"))
	{
		printerror("badpath","");
	}
	$classpath=$add[pripath].$add[classpath];
	if(file_exists("../../".$classpath))
	{
		printerror("ReClasspath","");
	}
	//ȡ�ñ���
	$tabler=GetModTable($add[modid]);
	$tabler[tid]=(int)$tabler[tid];
	//���Ӵ���Ŀ
	if(!$add[islast])
	{
		if(empty($add[bclassid]))//����Ŀ
		{
			$sonclass="";
			$featherclass="";
	    }
		else//�м���Ŀ
		{
			//ȡ����һ������Ŀ
			$r=$empire->fetch1("select featherclass,islast,wburl from {$dbtbpre}enewsclass where classid='$add[bclassid]'");
			if($r[islast])//�Ƿ��ռ���Ŀ
			{
				printerror("BclassNotLast","");
			}
			if($r[wburl])
			{
				printerror("BclassNotWb","");
			}
			if(empty($r[featherclass]))
			{
				$r[featherclass]="|";
			}
			$featherclass=$r[featherclass].$add[bclassid]."|";
			$sonclass="";
	    }
		//����Ŀ¼
		CreateClassPath($classpath);
		$sql=$empire->query("insert into {$dbtbpre}enewsclass(bclassid,classname,is_zt,sonclass,lencord,link_num,newstempid,onclick,listtempid,featherclass,islast,classpath,classtype,newspath,filename,filetype,openpl,openadd,newline,hotline,goodline,classurl,groupid,myorder,filename_qz,hotplline,modid,checked,firstline,bname,islist,searchtempid,tid,tbname,maxnum,checkpl,down_num,online_num,listorder,reorder,intro,classimg,jstempid,addinfofen,listdt,showclass,showdt,checkqadd,qaddlist,qaddgroupid,qaddshowkey,adminqinfo,doctime,classpagekey,dtlisttempid,classtempid,nreclass,nreinfo,nrejs,nottobq,ipath,addreinfo,haddlist,sametitle,definfovoteid,wburl,qeditchecked,wapstyleid,repreinfo,pltempid,cgroupid,yhid,wfid,cgtoinfo,bdinfoid) values($add[bclassid],'$add[classname]',0,'$sonclass',$add[lencord],$add[link_num],$add[newstempid],0,$add[listtempid],'$featherclass',$add[islast],'$classpath','$add[classtype]','$add[newspath]',$add[filename],'$add[filetype]',$add[openpl],$add[openadd],$add[newline],$add[hotline],$add[goodline],'$add[classurl]',$add[groupid],$add[myorder],'$add[filename_qz]',$add[hotplline],$add[modid],$add[checked],$add[firstline],'$add[bname]',$add[islist],$add[searchtempid],$tabler[tid],'$tabler[tbname]',$add[maxnum],$add[checkpl],$add[down_num],$add[online_num],'$add[listorder]','$add[reorder]','$add[intro]','$add[classimg]',$add[jstempid],$add[addinfofen],$add[listdt],$add[showclass],$add[showdt],$add[checkqadd],$add[qaddlist],'$add[qaddgroupid]',$add[qaddshowkey],$add[adminqinfo],$add[doctime],'$add[classpagekey]','$add[dtlisttempid]','$add[classtempid]',$add[nreclass],$add[nreinfo],$add[nrejs],$add[nottobq],'$add[ipath]',$add[addreinfo],$add[haddlist],$add[sametitle],$add[definfovoteid],'',$add[qeditchecked],$add[wapstyleid],'$add[repreinfo]','$add[pltempid]','$add[cgroupid]','$add[yhid]','$add[wfid]','$add[cgtoinfo]','$add[bdinfoid]');");
		$lastid=$empire->lastid();
		//����
		$ret_cr=ReturnClassAddF($add,0);
		$empire->query("replace into {$dbtbpre}enewsclassadd(classid,classtext".$ret_cr[0].") values('$lastid','".addslashes($add[classtext])."'".$ret_cr[1].");");
		TogNotReClass(1);
		GetClass();
		if($add[islist]==0||$add[islist]==2)
		{
			$classtemp=$add[islist]==2?GetClassText($lastid):GetClassTemp($add['classtempid']);
			NewsBq($lastid,$classtemp,0,1);
		}
		elseif($add[islist]==3)//��Ŀ����Ϣ
		{
			ReClassBdInfo($lastid);
		}
		DelListEnews();//ɾ�������ļ�
		GetSearch($add[modid]);//���»���
		if($sql){
			insert_dolog("classid=".$lastid."<br>classname=".$add[classname]);//������־
			printerror("AddClassSuccess","AddClass.php?enews=AddClass&from=$add[from]");
		}
		else{
			printerror("DbError","");
		}
    }
	//�����ռ���Ŀ
	else
	{
		//�ļ�ǰ׺
		$add[filename_qz]=RepFilenameQz($add[filename_qz]);
		if(empty($add[bclassid]))//�����Ϊ�ռ���Ŀʱ
		{
			$sonclass="";
			$featherclass="";
	    }
		else//����Ŀ
		{
			//ȡ����һ������Ŀ
			$r=$empire->fetch1("select featherclass,islast,wburl from {$dbtbpre}enewsclass where classid='$add[bclassid]'");
			//�Ƿ��ռ����
			if($r[islast])
			{
				printerror("BclassNotLast","");
			}
			if($r[wburl])
			{
				printerror("BclassNotWb","");
			}
			if(empty($r[featherclass])){
				$r[featherclass]="|";
			}
			$featherclass=$r[featherclass].$add[bclassid]."|";
			$sonclass="";
		}
		//������ĿĿ¼
		CreateClassPath($classpath);
		$sql=$empire->query("insert into {$dbtbpre}enewsclass(bclassid,classname,sonclass,is_zt,lencord,link_num,newstempid,onclick,listtempid,featherclass,islast,classpath,classtype,newspath,filename,filetype,openpl,openadd,newline,hotline,goodline,classurl,groupid,myorder,filename_qz,hotplline,modid,checked,firstline,bname,islist,searchtempid,tid,tbname,maxnum,checkpl,down_num,online_num,listorder,reorder,intro,classimg,jstempid,addinfofen,listdt,showclass,showdt,checkqadd,qaddlist,qaddgroupid,qaddshowkey,adminqinfo,doctime,classpagekey,dtlisttempid,classtempid,nreclass,nreinfo,nrejs,nottobq,ipath,addreinfo,haddlist,sametitle,definfovoteid,wburl,qeditchecked,wapstyleid,repreinfo,pltempid,cgroupid,yhid,wfid,cgtoinfo,bdinfoid) values($add[bclassid],'$add[classname]','$sonclass',0,$add[lencord],$add[link_num],$add[newstempid],0,$add[listtempid],'$featherclass',$add[islast],'$classpath','$add[classtype]','$add[newspath]',$add[filename],'$add[filetype]',$add[openpl],$add[openadd],$add[newline],$add[hotline],$add[goodline],'$add[classurl]',$add[groupid],$add[myorder],'$add[filename_qz]',$add[hotplline],$add[modid],$add[checked],$add[firstline],'$add[bname]',$add[islist],$add[searchtempid],$tabler[tid],'$tabler[tbname]',$add[maxnum],$add[checkpl],$add[down_num],$add[online_num],'$add[listorder]','$add[reorder]','$add[intro]','$add[classimg]',$add[jstempid],$add[addinfofen],$add[listdt],$add[showclass],$add[showdt],$add[checkqadd],$add[qaddlist],'$add[qaddgroupid]',$add[qaddshowkey],$add[adminqinfo],$add[doctime],'$add[classpagekey]','$add[dtlisttempid]','$add[classtempid]',$add[nreclass],$add[nreinfo],$add[nrejs],$add[nottobq],'$add[ipath]',$add[addreinfo],$add[haddlist],$add[sametitle],$add[definfovoteid],'',$add[qeditchecked],$add[wapstyleid],'$add[repreinfo]','$add[pltempid]','$add[cgroupid]','$add[yhid]','$add[wfid]','$add[cgtoinfo]','$add[bdinfoid]');");
		$lastid=$empire->lastid();
		//����
		$ret_cr=ReturnClassAddF($add,0);
		$empire->query("replace into {$dbtbpre}enewsclassadd(classid,classtext".$ret_cr[0].") values('$lastid','".addslashes($add[classtext])."'".$ret_cr[1].");");
		//�޸ĸ���Ŀ������Ŀ
		if($add[bclassid])
		{
			$b_r=$empire->fetch1("select sonclass,featherclass from {$dbtbpre}enewsclass where classid='$add[bclassid]'");
			if(empty($b_r[sonclass]))
			{
				$b_r[sonclass]="|";
			}
			$new_sonclass=$b_r[sonclass].$lastid."|";
			$update=$empire->query("update {$dbtbpre}enewsclass set sonclass='$new_sonclass' where classid='$add[bclassid]'");
			//���ĸ����ĸ���Ŀ������Ŀ
			$where=ReturnClass($b_r[featherclass]);
			if(empty($where)){
				$where="classid=0";
			}
			$bsql=$empire->query("select sonclass,classid from {$dbtbpre}enewsclass where ".$where);
			while($br=$empire->fetch($bsql))
			{
				if(empty($br[sonclass]))
				{
					$br[sonclass]="|";
				}
				$new_sonclass=$br[sonclass].$lastid."|";
				$update=$empire->query("update {$dbtbpre}enewsclass set sonclass='$new_sonclass' where classid='$br[classid]'");
            }
	    }
		DelListEnews();//ɾ�������ļ�
		TogNotReClass(1);
		GetClass();
		GetSearch($add[modid]);//���»���
		if($sql){
			insert_dolog("classid=".$lastid."<br>classname=".$add[classname]);//������־
			printerror("AddLastClassSuccess","AddClass.php?enews=AddClass&from=$add[from]");
		}
		else{
			printerror("DbError","history.go(-1)");
		}
    }
}

//������Ӧ��������Ŀ
function UpdateSmallClassDomain($classid,$classurl,$classpath){
	global $empire,$dbtbpre;
	if(empty($classurl)){
		$query="update {$dbtbpre}enewsclass set classurl='' where featherclass like '%|".$classid."|%'";
    }
	else{
		$query="update {$dbtbpre}enewsclass set classurl=CONCAT('".$classurl."',SUBSTRING(classpath,LENGTH('".$classpath."')+1)) where featherclass like '%|".$classid."|%'";
    }
	$sql=$empire->query($query);
}

//��ĿĿ¼�޸�
function AlterClassPath($classid,$islast,$oldclasspath,$classpath){
	global $empire,$dbtbpre;
	//����Ŀ¼��
	if($oldclasspath!=$classpath)
	{
		@rename("../../".$oldclasspath,"../../".$classpath);
		@rename("../../d/file/".$oldclasspath,"../../d/file/".$classpath);
		if(empty($islast))
		{
			$sql=$empire->query("update {$dbtbpre}enewsclass set classpath=REPLACE(classpath,'".$oldclasspath."/','".$classpath."/') where featherclass like '%|".$classid."|%'");
		}
		DelListEnews();
	}
}

//�޸��ⲿ��Ŀ
function EditWbClass($add,$userid,$username){
	global $empire,$class_r,$dbtbpre;
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"class");
	$add=DoPostClassVar($add);
	$add[classid]=(int)$add[classid];
	if(!$add[classname]||!$add[classid]||!$add[wburl])
	{
		printerror("EmptyWbClass","");
	}
	$add[islast]=0;
	//ȡ�ñ���
	$tabler=GetModTable($add[modid]);
	$tabler[tid]=(int)$tabler[tid];
	//�ı����Ŀ
	if($add[bclassid]<>$add[oldbclassid])
	{
		//ת������Ŀ
		if(empty($add[bclassid]))
		{
			$sonclass="";
			$featherclass="";
		}
		//ת���м���Ŀ
		else
		{
			//����Ŀ��ԭ��Ŀ��ͬ
			if($add[classid]==$add[bclassid])
			{
				printerror("BclassIsself","");
			}
			//ȡ�����ڴ���Ŀ��ֵ
	 		$b=$empire->fetch1("select featherclass,sonclass,islast,wburl from {$dbtbpre}enewsclass where classid='$add[bclassid]'");
			//������Ŀ�Ƿ�Ϊ�ռ���Ŀ
			if($b[islast])
			{
				printerror("BclassNotLast","");
			}
			if($b[wburl])
			{
				printerror("BclassNotWb","");
			}
			//�Ƿ�Ƿ�����Ŀ
			if($b[featherclass])
			{
				$c_nb_r=explode("|".$add[classid]."|",$b[featherclass]);
				if(count($c_nb_r)<>1)
				{
					printerror("BclassIssmall","");
				}
			}
			if(empty($b[featherclass]))
			{
				$b[featherclass]="|";
			}
			$featherclass=$b[featherclass].$add[bclassid]."|";
		}
		$change=",bclassid=$add[bclassid],featherclass='$featherclass'";
	}
	//�޸����ݿ�����
	$sql=$empire->query("update {$dbtbpre}enewsclass set classname='$add[classname]',classpath='$classpath',classtype='$add[classtype]',newline=$add[newline],hotline=$add[hotline],goodline=$add[goodline],classurl='$add[classurl]',groupid=$add[groupid],myorder=$add[myorder],filename_qz='$add[filename_qz]',hotplline=$add[hotplline],modid=$add[modid],checked=$add[checked],firstline=$add[firstline],bname='$add[bname]',islist=$add[islist],listtempid=$add[listtempid],lencord=$add[lencord],searchtempid=$add[searchtempid],tid=$tabler[tid],tbname='$tabler[tbname]',maxnum=$add[maxnum],checkpl=$add[checkpl],down_num=$add[down_num],online_num=$add[online_num],listorder='$add[listorder]',reorder='$add[reorder]',intro='$add[intro]',classimg='$add[classimg]',jstempid=$add[jstempid],listdt=$add[listdt],showclass=$add[showclass],showdt=$add[showdt],qaddgroupid='$add[qaddgroupid]',qaddshowkey=$add[qaddshowkey],adminqinfo=$add[adminqinfo],doctime=$add[doctime],classpagekey='$add[classpagekey]',dtlisttempid='$add[dtlisttempid]',classtempid='$add[classtempid]',nreclass=$add[nreclass],nreinfo=$add[nreinfo],nrejs=$add[nrejs],nottobq=$add[nottobq],ipath='$add[ipath]',addreinfo=$add[addreinfo],haddlist=$add[haddlist],sametitle=$add[sametitle],definfovoteid=$add[definfovoteid],wburl='$add[wburl]',qeditchecked=$add[qeditchecked],openadd=$add[openadd],wapstyleid='$add[wapstyleid]',repreinfo='$add[repreinfo]',pltempid='$add[pltempid]',cgroupid='$add[cgroupid]',yhid='$add[yhid]',wfid='$add[wfid]',cgtoinfo='$add[cgtoinfo]',bdinfoid='$add[bdinfoid]'".$change." where classid='$add[classid]'");
	//����
	$ret_cr=ReturnClassAddF($add,1);
	$empire->query("update {$dbtbpre}enewsclassadd set classtext='".addslashes($add[classtext])."'".$ret_cr[0]." where classid='$add[classid]'");
	GetClass();
	//ɾ�������ļ�
	if($add[oldclassname]<>$add[classname]||$add[bclassid]<>$add[oldbclassid]||$add[wburl]<>$add[oldwburl])
	{
		DelListEnews();
    }
	//��Դ
	if($add['from'])
	{
		$returnurl="ListPageClass.php";
	}
	else
	{
		$returnurl="ListClass.php";
	}
	if($sql)
	{
		insert_dolog("classid=".$add[classid]."<br>classname=".$add[classname]);//������־
		printerror("EditClassSuccess",$returnurl);
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//�޸���Ŀ
function EditClass($add,$userid,$username){
	global $empire,$class_r,$dbtbpre;
	//�޸��ⲿ��Ŀ
	if($add[ecmsclasstype])
	{
		EditWbClass($add,$userid,$username);
	}
	$add[classid]=(int)$add[classid];
	$add[classpath]=trim($add[classpath]);
	$checkclasspath=$add['classpath'];
	if($add['oldclasspath']<>$add['pripath'].$add['oldcpath'])//��������Ŀ
	{
		$add[classpath]=$add['oldcpath'];
	}
	if(!$add[classname]||!$add[classpath]||!$add[modid]||!$add[classid]){
		printerror("EmptyClass","");
	}
	if($add[islast]&&(!$add[newstempid]||!$add[listtempid])){
		printerror("LastMustChange","");
	}
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"class");
	$add=DoPostClassVar($add);
	$add[oldmodid]=(int)$add[oldmodid];
	//�ı�Ŀ¼
	$classpath=$add[pripath].$add[classpath];
	if($add[oldclasspath]<>$classpath&&$checkclasspath==$add['oldcpath']){
		if(file_exists("../../".$classpath)){//���Ŀ¼�Ƿ����
			printerror("ReClasspath","");
		}
    }
	//ȡ�ñ���
	$tabler=GetModTable($add[modid]);
	$tabler[tid]=(int)$tabler[tid];
	//�޸Ĵ���Ŀ
	if(!$add[islast]){
		//�ı����Ŀ
		if($add[bclassid]<>$add[oldbclassid]){
			//ת������Ŀ
			if(empty($add[bclassid])){
				$sonclass="";
				$featherclass="";
				//ȡ�ñ���Ŀ������Ŀ
				$r=$empire->fetch1("select sonclass,featherclass,classpath from {$dbtbpre}enewsclass where classid='$add[classid]'");
				//�ı丸��Ŀ������Ŀ
				$where=ReturnClass($r[featherclass]);
				if(empty($where)){
					$where="classid=0";
				}
				$osql=$empire->query("select sonclass,classid from {$dbtbpre}enewsclass where ".$where);
				while($o=$empire->fetch($osql)){
					$newsonclass=str_replace($r[sonclass],"|",$o[sonclass]);
					$uosql=$empire->query("update {$dbtbpre}enewsclass set sonclass='$newsonclass' where classid='$o[classid]'");
				}
				//�޸�����Ŀ�ĸ���Ŀ
				$osql=$empire->query("select featherclass,classid,classpath from {$dbtbpre}enewsclass where featherclass like '%|".$add[classid]."%|'");
				while($o=$empire->fetch($osql)){
					$newclasspath=str_replace($r[classpath]."/",$classpath."/",$o[classpath]);
					$newfeatherclass=str_replace($r[featherclass],"|",$o[featherclass]);
					$uosql=$empire->query("update {$dbtbpre}enewsclass set featherclass='$newfeatherclass',classpath='$newclasspath' where classid='$o[classid]'");
				}
			}
			//ת���м���Ŀ
			else
			{
				//����Ŀ��ԭ��Ŀ��ͬ
				if($add[classid]==$add[bclassid]){
				  printerror("BclassIsself","");
				}
				//ȡ�����ڴ���Ŀ��ֵ
	 			$b=$empire->fetch1("select featherclass,sonclass,islast,wburl from {$dbtbpre}enewsclass where classid='$add[bclassid]'");
				//������Ŀ�Ƿ�Ϊ�ռ���Ŀ
				if($b[islast])
				{
					printerror("BclassNotLast","");
				}
				if($b[wburl])
				{
					printerror("BclassNotWb","");
				}
				//�Ƿ�Ƿ�����Ŀ
				if($b[featherclass]){
					$c_nb_r=explode("|".$add[classid]."|",$b[featherclass]);
					if(count($c_nb_r)<>1){
						printerror("BclassIssmall","");
					}
				}
				if(empty($b[featherclass])){
					$b[featherclass]="|";
				}
				$featherclass=$b[featherclass].$add[bclassid]."|";
				//ȡ��������Ŀ�����ֵ
				$o=$empire->fetch1("select featherclass,sonclass,classpath from {$dbtbpre}enewsclass where classid='$add[classid]'");
				//�޸�����Ŀ�ĸ���Ŀ
				$osql=$empire->query("select featherclass,classid,classpath from {$dbtbpre}enewsclass where featherclass like '%|".$add[classid]."|%'");
				while($or=$empire->fetch($osql)){
					$newclasspath=str_replace($o[classpath]."/",$classpath."/",$or[classpath]);
					if(empty($o[featherclass])){
						$newfeatherclass=$b[featherclass].$add[bclassid].$or[featherclass];
					}
					else{
						$newfeatherclass=str_replace($o[featherclass],$featherclass,$or[featherclass]);
					}
					$uosql=$empire->query("update {$dbtbpre}enewsclass set featherclass='$newfeatherclass',classpath='$newclasspath' where classid='$or[classid]'");
				}
				//�ı�ɴ���Ŀ����������Ŀ
				$owhere=ReturnClass($o[featherclass]);
				if(empty($owhere)){
					$owhere="classid=0";
				}
				$oosql=$empire->query("select sonclass,classid from {$dbtbpre}enewsclass where ".$owhere);
				while($oo=$empire->fetch($oosql)){
					$newsonclass=str_replace($o[sonclass],"|",$oo[sonclass]);
					$usql=$empire->query("update {$dbtbpre}enewsclass set sonclass='$newsonclass' where classid='$oo[classid]'");
				}
				//�ı��´���Ŀ������Ŀ
				$where=ReturnClass($featherclass);
				if(empty($where)){
					$where="classid=0";
				}
				$nbsql=$empire->query("select sonclass,classid from {$dbtbpre}enewsclass where ".$where);
				while($nb=$empire->fetch($nbsql)){
					if(empty($nb[sonclass]))
					{$nb[sonclass]="|";}
					$newsonclass=$nb[sonclass].substr($o[sonclass],1);
					$usql=$empire->query("update {$dbtbpre}enewsclass set sonclass='$newsonclass' where classid='$nb[classid]'");
				}
			}
			$change=",bclassid=$add[bclassid],featherclass='$featherclass'";
		}
		//������Ӧ��������Ŀ
		if($add['UrlToSmall']){
			UpdateSmallClassDomain($add['classid'],$add['classurl'],$classpath);
		}
		//wapģ��Ӧ��������Ŀ
		if($add['wapstylesclass'])
		{
			$empire->query("update {$dbtbpre}enewsclass set wapstyleid='$add[wapstyleid]' where featherclass like '%|".$add[classid]."|%'");
		}
		//�޸����ݿ�����
		$sql=$empire->query("update {$dbtbpre}enewsclass set classname='$add[classname]',classpath='$classpath',classtype='$add[classtype]',newline=$add[newline],hotline=$add[hotline],goodline=$add[goodline],classurl='$add[classurl]',groupid=$add[groupid],myorder=$add[myorder],filename_qz='$add[filename_qz]',hotplline=$add[hotplline],modid=$add[modid],checked=$add[checked],firstline=$add[firstline],bname='$add[bname]',islist=$add[islist],listtempid=$add[listtempid],lencord=$add[lencord],searchtempid=$add[searchtempid],tid=$tabler[tid],tbname='$tabler[tbname]',maxnum=$add[maxnum],checkpl=$add[checkpl],down_num=$add[down_num],online_num=$add[online_num],listorder='$add[listorder]',reorder='$add[reorder]',intro='$add[intro]',classimg='$add[classimg]',jstempid=$add[jstempid],listdt=$add[listdt],showclass=$add[showclass],showdt=$add[showdt],qaddgroupid='$add[qaddgroupid]',qaddshowkey=$add[qaddshowkey],adminqinfo=$add[adminqinfo],doctime=$add[doctime],classpagekey='$add[classpagekey]',dtlisttempid='$add[dtlisttempid]',classtempid='$add[classtempid]',nreclass=$add[nreclass],nreinfo=$add[nreinfo],nrejs=$add[nrejs],nottobq=$add[nottobq],ipath='$add[ipath]',addreinfo=$add[addreinfo],haddlist=$add[haddlist],sametitle=$add[sametitle],definfovoteid=$add[definfovoteid],wburl='',qeditchecked=$add[qeditchecked],openadd=$add[openadd],wapstyleid='$add[wapstyleid]',repreinfo='$add[repreinfo]',pltempid='$add[pltempid]',cgroupid='$add[cgroupid]',yhid='$add[yhid]',wfid='$add[wfid]',cgtoinfo='$add[cgtoinfo]',bdinfoid='$add[bdinfoid]'".$change." where classid='$add[classid]'");
		//����
		$ret_cr=ReturnClassAddF($add,1);
		$empire->query("update {$dbtbpre}enewsclassadd set classtext='".addslashes($add[classtext])."'".$ret_cr[0]." where classid='$add[classid]'");
		GetClass();
		//������Ŀ�ļ�
		if($add[islist]==0||$add[islist]==2)
		{
			$classtemp=$add[islist]==2?GetClassText($add[classid]):GetClassTemp($add['classtempid']);
			NewsBq($add[classid],$classtemp,0,1);
		}
		elseif($add[islist]==3)
		{
			ReClassBdInfo($add[classid]);
		}
		if($add[islist]==2)
		{
			//ɾ����̬ģ�建���ļ�
			DelOneTempTmpfile('classpage'.$add[classid]);
		}
	}
	//�ռ���Ŀ
	else
	{
		if($add[modid]<>$add[oldmodid])//��ϵͳģ��
		{
			$chmtbr=GetModTable($add[oldmodid]);
			if($chmtbr[tid]<>$tabler[tid]&&$chmtbr[tbname])
			{
				$chmchecknum=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_".$chmtbr[tbname]." where classid='$add[classid]'");
				if($chmchecknum)
				{
					printerror("ClassChangeModHaveInfo","history.go(-1)");
				}
			}
		}
		//�ı����Ŀ
		if($add[bclassid]<>$add[oldbclassid]){
			//ת������Ŀ
			if(empty($add[bclassid])){
				$sonclass="";
				$featherclass="";
				//ȡ����Ŀԭ���Ĵ���Ŀ
				$r=$empire->fetch1("select featherclass,classpath from {$dbtbpre}enewsclass where classid='$add[classid]'");
				//�ı�ԭ������Ŀ������Ŀ
				$where=ReturnClass($r[featherclass]);
				if(empty($where)){
					$where="classid=0";
				}
				$bsql=$empire->query("select classid,sonclass from {$dbtbpre}enewsclass where ".$where);
				while($br=$empire->fetch($bsql)){
					$newsonclass=str_replace("|".$add[classid]."|","|",$br[sonclass]);
					$usql=$empire->query("update {$dbtbpre}enewsclass set sonclass='$newsonclass' where classid='$br[classid]'");
				}
			}
			//ת���м���Ŀ
			else
			{
				//ȡ�����ڴ���Ŀ��ֵ
				$b=$empire->fetch1("select featherclass,islast,wburl from {$dbtbpre}enewsclass where classid='$add[bclassid]'");
				//������Ŀ�Ƿ�Ϊ�ռ���Ŀ
				if($b[islast])
				{
					printerror("BclassNotLast","");
				}
				if($b[wburl])
				{
					printerror("BclassNotWb","");
				}
				if(empty($b[featherclass])){
					$b[featherclass]="|";
				}
				$featherclass=$b[featherclass].$add[bclassid]."|";
				//�ı��´���Ŀ������Ŀ
				$where=ReturnClass($featherclass);
				if(empty($where)){
					$where="classid=0";
				}
				$bsql=$empire->query("select sonclass,classid from {$dbtbpre}enewsclass where ".$where);
				while($nb=$empire->fetch($bsql))
				{
					if(empty($nb[sonclass]))
					{$nb[sonclass]="|";}
					$newsonclass=$nb[sonclass].$add[classid]."|";
					$usql=$empire->query("update {$dbtbpre}enewsclass set sonclass='$newsonclass' where classid='$nb[classid]'");
				}
				//�ı�ɴ���Ŀ������Ŀ
				$o=$empire->fetch1("select sonclass,featherclass from {$dbtbpre}enewsclass where classid='$add[classid]'");
				$where=ReturnClass($o[featherclass]);
				if(empty($where)){
					$where="classid=0";
				}
				$osql=$empire->query("select sonclass,classid from {$dbtbpre}enewsclass where ".$where);
				while($ob=$empire->fetch($osql)){
				   $newsonclass=str_replace("|".$add[classid]."|","|",$ob[sonclass]);
				   $usql=$empire->query("update {$dbtbpre}enewsclass set sonclass='$newsonclass' where classid='$ob[classid]'");
			   }
			}
			$change=",bclassid=$add[bclassid],featherclass='$featherclass'";
		}
		//Ӧ���������ɵ���Ϣ
		if($add['tobetempinfo']){
			$upsql=$empire->query("update {$dbtbpre}ecms_".$tabler[tbname]." set newstempid=$add[newstempid] where classid='$add[classid]'");
		}
		//�ļ�ǰ׺
	    $add[filename_qz]=RepFilenameQz($add[filename_qz]);
		$sql=$empire->query("update {$dbtbpre}enewsclass set classname='$add[classname]',classpath='$classpath',classtype='$add[classtype]',link_num=$add[link_num],lencord=$add[lencord],newstempid=$add[newstempid],listtempid=$add[listtempid],newspath='$add[newspath]',filename=$add[filename],filetype='$add[filetype]',openpl=$add[openpl],openadd=$add[openadd],newline=$add[newline],hotline=$add[hotline],goodline=$add[goodline],classurl='$add[classurl]',groupid=$add[groupid],myorder=$add[myorder],filename_qz='$add[filename_qz]',hotplline=$add[hotplline],modid=$add[modid],checked=$add[checked],firstline=$add[firstline],bname='$add[bname]',searchtempid=$add[searchtempid],tid=$tabler[tid],tbname='$tabler[tbname]',maxnum=$add[maxnum],checkpl=$add[checkpl],down_num=$add[down_num],online_num=$add[online_num],listorder='$add[listorder]',reorder='$add[reorder]',intro='$add[intro]',classimg='$add[classimg]',jstempid=$add[jstempid],addinfofen=$add[addinfofen],listdt=$add[listdt],showclass=$add[showclass],showdt=$add[showdt],checkqadd=$add[checkqadd],qaddlist=$add[qaddlist],qaddgroupid='$add[qaddgroupid]',qaddshowkey=$add[qaddshowkey],adminqinfo=$add[adminqinfo],doctime=$add[doctime],classpagekey='$add[classpagekey]',dtlisttempid='$add[dtlisttempid]',classtempid='$add[classtempid]',nreclass=$add[nreclass],nreinfo=$add[nreinfo],nrejs=$add[nrejs],nottobq=$add[nottobq],ipath='$add[ipath]',addreinfo=$add[addreinfo],haddlist=$add[haddlist],sametitle=$add[sametitle],definfovoteid=$add[definfovoteid],wburl='',qeditchecked=$add[qeditchecked],wapstyleid='$add[wapstyleid]',repreinfo='$add[repreinfo]',pltempid='$add[pltempid]',cgroupid='$add[cgroupid]',yhid='$add[yhid]',wfid='$add[wfid]',cgtoinfo='$add[cgtoinfo]',bdinfoid='$add[bdinfoid]'".$change." where classid='$add[classid]'");
		//����
		$ret_cr=ReturnClassAddF($add,1);
		$empire->query("update {$dbtbpre}enewsclassadd set classtext='".addslashes($add[classtext])."'".$ret_cr[0]." where classid='$add[classid]'");
		GetClass();
	}
	//�ƶ�Ŀ¼
	if($add[bclassid]<>$add[oldbclassid]||($add[oldclasspath]<>$classpath&&$add['classpath']==$add['oldcpath'])){
		$opath="../../".$add[oldclasspath];
		$newpath="../../".$classpath;
		MovePath($opath,$newpath);
		$opath="../../d/file/".$add[oldclasspath];
		$npath="../../d/file/".$classpath;
		CopyPath($opath,$npath);
    }
	else{
		if($add['oldcpath']<>$add['classpath'])//������ĿĿ¼
		{
			AlterClassPath($add['classid'],$add['islast'],$add['oldclasspath'],$classpath);
			GetClass();
		}
	}
	//ɾ�������ļ�
	if($add[oldclassname]<>$add[classname]||$add[bclassid]<>$add[oldbclassid]){
		DelListEnews();
		GetSearch($add[modid]);
    }
	else{
		if(($add[oldclasspath]<>$classpath&&$add['classpath']==$add['oldcpath'])||$add[listdt]<>$add[oldlistdt])
		{
			DelListEnews();
		}
		if($add[openadd]<>$add[oldopenadd]||$add[modid]<>$add[oldmodid]){
			GetSearch($add[modid]);
			if($add[modid]<>$add[oldmodid]){
				GetSearch($add[oldmodid]);
			}
		}
	}
	//�޸���Ŀ��չ��
	if($add[oldclasstype]<>$add[classtype]){
		$todaytime=date("Y-m-d H:i:s");
		if($add[islast]){
			$query="select count(*) as total from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where checked=1 and classid='$add[classid]'";
			$lencord=$add[oldlencord];
			$num=$empire->gettotal($query);
		}
		else{
			$lencord=$add[oldlencord];
			if($add[oldislist]==1){
				$where=ReturnClass($class_r[$add[classid]][sonclass]);
				$query="select count(*) as total from {$dbtbpre}ecms_".$class_r[$add[classid]][tbname]." where checked=1 and (".$where.")";
				$num=$empire->gettotal($query);
			}
			else
			{
				$num=1;
			}
		}
		RenameListfile($add[classid],$lencord,$num,$add[oldclasstype],$add[classtype],$classpath);
	}
	//��Դ
	if($add['from']){
		$returnurl="ListPageClass.php";
	}
	else{
		$returnurl="ListClass.php";
	}
	TogNotReClass(1);
	if($sql){
		insert_dolog("classid=".$add[classid]."<br>classname=".$add[classname]);//������־
		printerror("EditClassSuccess",$returnurl);
	}
	else{
		printerror("DbError","history.go(-1)");
	}
}

//�ռ���Ŀ����ռ���Ŀ֮���ת��
function ChangeClassIslast($reclassid,$userid,$username){
	global $empire,$dbtbpre;
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"class");
	$count=count($reclassid);
	$classid=(int)$reclassid[0];
	if($count==0||!$classid)
	{
		printerror("NotChangeIslastClassid","");
	}
	//ȡ�ñ���Ŀ��Ϣ
	$r=$empire->fetch1("select classid,sonclass,featherclass,islist,islast,classname,modid,tbname,wburl from {$dbtbpre}enewsclass where classid=$classid");
	if(empty($r[classid]))
	{
		printerror("NotChangeIslastClassid","");
	}
	if($r[wburl])
	{
		printerror("NotChangeWbClassid","");
	}
	//���ռ���Ŀ
	if(!$r[islast])
	{
		$num=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsclass where bclassid=$classid");
		if($num)
		{
			printerror("LastTheClassHaveSonclass","history.go(-1)");
		}
		//�޸ĸ���Ŀ������Ŀ
		$where=ReturnClass($r[featherclass]);
		if(empty($where))
		{
			$where="classid=0";
		}
		$sql=$empire->query("select classid,sonclass from {$dbtbpre}enewsclass where ".$where);
		while($br=$empire->fetch($sql))
		{
			if(empty($br[sonclass]))
			{
				$br[sonclass]="|";
			}
			$newsonclass=$br[sonclass].$classid."|";
			$usql=$empire->query("update {$dbtbpre}enewsclass set sonclass='$newsonclass' where classid=$br[classid]");
		}
		$dosql=$empire->query("update {$dbtbpre}enewsclass set islast=1 where classid=$classid");
		$mess="ChangeClassToLastSuccess";
	}
	//�ռ���Ŀ
	else
	{
		$num=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_".$r[tbname]." where classid=$classid");
		if($num)
		{
			printerror("LastTheClassHaveInfo","history.go(-1)");
		}
		//�޸ĸ���Ŀ������Ŀ
		$where=ReturnClass($r[featherclass]);
		if(empty($where))
		{
			$where="classid=0";
		}
		$sql=$empire->query("select classid,sonclass from {$dbtbpre}enewsclass where ".$where);
		while($br=$empire->fetch($sql))
		{
			if(empty($br[sonclass]))
			{
				$br[sonclass]="|";
			}
			$newsonclass=str_replace("|".$classid."|","|",$br[sonclass]);
			$usql=$empire->query("update {$dbtbpre}enewsclass set sonclass='$newsonclass' where classid=$br[classid]");
		}
		$dosql=$empire->query("update {$dbtbpre}enewsclass set islast=0 where classid=$classid");
		$mess="ChangeClassToNolastSuccess";
	}
	//ɾ�������ļ�
	DelListEnews();
	//���»���
	GetClass();
	GetSearch($r[modid]);
	if($dosql)
	{
		//������־
		insert_dolog("classid=".$classid."<br>classname=".$r[classname]);
		printerror($mess,$_SERVER['HTTP_REFERER']);
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//ɾ����Ŀ
function DelClass($classid,$userid,$username){
	global $empire,$dbtbpre;
	$classid=(int)$classid;
	if(!$classid)
	{
		printerror("NotDelClassid","");
	}
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"class");
	$r=$empire->fetch1("select * from {$dbtbpre}enewsclass where classid='$classid'");
	if(empty($r[classid]))
	{
		printerror("NotClassid","history.go(-1)");
	}
    DelClass1($classid);
    GetClass();
	GetSearch($r[modid]);
	//���ص�ַ
	if($_GET['from'])
	{$returnurl="ListPageClass.php";}
	else
	{$returnurl="ListClass.php";}
	TogNotReClass(1);
	insert_dolog("classid=".$classid."<br>classname=".$r[classname]);//������־
	printerror("DelClassSuccess",$returnurl);
}

//ɾ����Ŀ,������ֵ
function DelClass1($classid){
	global $empire,$class_r,$dbtbpre;
	$r=$empire->fetch1("select * from {$dbtbpre}enewsclass where classid='$classid'");
	//�ⲿ��Ŀ
	if($r[wburl])
	{
		$sql=$empire->query("delete from {$dbtbpre}enewsclass where classid='$classid'");
		$empire->query("delete from {$dbtbpre}enewsclassadd where classid='$classid'");
		//ɾ������
		DelListEnews();
		return "";
	}
	//ɾ���ռ���Ŀ
	if($r[islast])
	{
		//ɾ������
		DelClassTranFile($classid);
		$filepath="../../d/file/".$r[classpath];
		$delf=DelPath($filepath);
		$usql=$empire->query("delete from {$dbtbpre}enewsfile where classid='$classid'");
		//ɾ����Ϣ
		$sql=$empire->query("delete from {$dbtbpre}ecms_".$r[tbname]." where classid='$classid'");
		DelClassTbDataInfo($classid);
		//ɾ����Ϣ���ӱ�
		$delsql=$empire->query("delete from {$dbtbpre}enewswfinfo where classid='$classid'");
		$delsql=$empire->query("delete from {$dbtbpre}enewswfinfolog where classid='$classid'");
		$delsql=$empire->query("delete from {$dbtbpre}enewsinfovote where classid='$classid'");
		$delsql=$empire->query("delete from {$dbtbpre}enewsdiggips where classid='$classid'");
		//ɾ����Ŀ����
	    $sql1=$empire->query("delete from {$dbtbpre}enewsclass where classid='$classid'");
		$empire->query("delete from {$dbtbpre}enewsclassadd where classid='$classid'");
		$delpath="../../".$r[classpath];
		$del=DelPath($delpath);
		//���´���Ŀ������Ŀ
		$where=ReturnClass($r[featherclass]);
	    if(empty($where))
		{$where="classid=0";}
	    $bsql=$empire->query("select sonclass,classid from {$dbtbpre}enewsclass where ".$where);
		while($br=$empire->fetch($bsql))
		{
			$newsonclass=str_replace("|".$classid."|","|",$br[sonclass]);
			$usql=$empire->query("update {$dbtbpre}enewsclass set sonclass='$newsonclass' where classid='$br[classid]'");
		}
	}
	//ɾ������Ŀ
	else
	{
	    //ɾ����Ŀ
		$where=ReturnClass($r[sonclass]);
		if(empty($where))
		{$where="classid=0";}
		$delcr=explode("|",$r[sonclass]);
		$count=count($delcr);
		for($i=1;$i<$count-1;$i++)
		{
			$delcid=$delcr[$i];
			//ɾ������
			DelClassTranFile($delcid);
			$sql=$empire->query("delete from {$dbtbpre}ecms_".$class_r[$delcid][tbname]." where classid='$delcid'");
			DelClassTbDataInfo($delcid);
			//ɾ����Ϣ���ӱ�
			$delsql=$empire->query("delete from {$dbtbpre}enewswfinfo where classid='$delcid'");
			$delsql=$empire->query("delete from {$dbtbpre}enewswfinfolog where classid='$delcid'");
			$delsql=$empire->query("delete from {$dbtbpre}enewsinfovote where classid='$delcid'");
			$delsql=$empire->query("delete from {$dbtbpre}enewsdiggips where classid='$delcid'");
		}
		//ɾ������
		$filepath="../../d/file/".$r[classpath];
	    $delf=DelPath($filepath);
		if($where<>'classid=0')
		{
			$usql=$empire->query("delete from {$dbtbpre}enewsfile where ".$where);
		}
		//ɾ������Ŀ����
		$fcsql=$empire->query("select classid from {$dbtbpre}enewsclass where featherclass like '%|".$classid."|%'");
		while($fcr=$empire->fetch($fcsql))
		{
			$empire->query("delete from {$dbtbpre}enewsclassadd where classid='$fcr[classid]'");
		}
		//ɾ������Ŀ
		$sql1=$empire->query("delete from {$dbtbpre}enewsclass where featherclass like '%|".$classid."|%'");
		//�ı丸��Ŀ������
		$where=ReturnClass($r[featherclass]);
		if(empty($where))
		{$where="classid=0";}
		$bbsql=$empire->query("select classid,sonclass from {$dbtbpre}enewsclass where ".$where);
		while($bbr=$empire->fetch($bbsql))
		{
			$newsonclass=str_replace($r[sonclass],"|",$bbr[sonclass]);
			$usql=$empire->query("update {$dbtbpre}enewsclass set sonclass='$newsonclass' where classid='$bbr[classid]'");
		}
		//ɾ����Ŀ����
		$sql2=$empire->query("delete from {$dbtbpre}enewsclass where classid='$classid'");
		$empire->query("delete from {$dbtbpre}enewsclassadd where classid='$classid'");
		$delpath="../../".$r[classpath];
		$del=DelPath($delpath);
	}
	//ɾ������
	DelListEnews();
}

//ɾ����Ŀ����
function DelClassTranFile($classid){
	global $empire,$class_r,$dbtbpre,$emod_r;
	//ɾ�����ı�
	$mid=$class_r[$classid][modid];
	$savetxtf=$emod_r[$mid]['savetxtf'];
	if($savetxtf)
	{
		$txtsql=$empire->query("select ".$savetxtf." from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where classid='$classid'");
		while($txtr=$empire->fetch($txtsql))
		{
			$newstextfile=$txtr[$savetxtf];
			$txtr[$savetxtf]=GetTxtFieldText($txtr[$savetxtf]);
			DelTxtFieldText($newstextfile);//ɾ���ļ�
		}
	}
	//ɾ������
	$filesql=$empire->query("select id from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where classid='$classid'");
	while($filer=$empire->fetch($filesql))
	{
		DelNewsTheFile($filer[id],$classid);//ɾ������
	}
}

//ɾ����Ŀ������Ϣ
function DelClassTbDataInfo($classid){
	global $empire,$class_r,$dbtbpre,$emod_r;
	$mid=$class_r[$classid][modid];
	$tbname=$class_r[$classid][tbname];
	$dtbr=explode(',',$emod_r[$mid][datatbs]);
	$tbcount=count($dtbr);
	for($i=1;$i<$tbcount-1;$i++)
	{
		$empire->query("delete from {$dbtbpre}ecms_".$tbname."_data_".$dtbr[$i]." where classid='$classid'");
	}
}

//�޸���Ŀ˳��
function EditClassOrder($classid,$myorder,$userid,$username){
	global $empire,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"class");
	for($i=0;$i<count($classid);$i++)
	{
		$newmyorder=(int)$myorder[$i];
		$sql=$empire->query("update {$dbtbpre}enewsclass set myorder=$newmyorder where classid='$classid[$i]'");
    }
	//ɾ������
	DelListEnews();
	//������־
	insert_dolog("");
	printerror("EditClassOrderSuccess",$_SERVER['HTTP_REFERER']);
}

//������Ŀ��ϵ
function ChangeSonclass($start,$userid,$username){
	global $empire,$public_r,$fun_r,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"changedata");
	$start=(int)$start;
	$b=0;
	$sql=$empire->query("select classid from {$dbtbpre}enewsclass where islast=0 and classid>".$start." order by classid limit ".$public_r[relistnum]);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$newstart=$r[classid];
		//����Ŀ
		$sonclass="|";
		$ssql=$empire->query("select classid from {$dbtbpre}enewsclass where islast=1 and featherclass like '%|".$r[classid]."|%' order by classid");
		while($sr=$empire->fetch($ssql))
		{
			$sonclass.=$sr[classid]."|";
	    }
		$usql=$empire->query("update {$dbtbpre}enewsclass set sonclass='$sonclass' where classid='$r[classid]'");
    }
	//���
	if(empty($b))
	{
		GetClass();
		printerror("ChangeSonclassSuccess","ReHtml/ChangeData.php");
	}
	echo $fun_r['OneChangeSonclassSuccess']."(ID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmsclass.php?enews=ChangeSonclass&start=$newstart';</script>";
	exit();
}

//ɾ����Ŀ�����ļ�
function DelFcListClass(){
	DelListEnews();
	//������־
	insert_dolog("");
	printerror("DelListEnewsSuccess","history.go(-1)");
}

//����������Ŀ
function SetMoreClass($add,$userid,$username){
	global $empire,$dbtbpre;
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"setmclass");
	//��Ŀ
	$classid=$add['classid'];
	$count=count($classid);
	if($count==0)
	{
		printerror("NotChangeSetClass","");
	}
	$cids='';
	$dh='';
	for($i=0;$i<$count;$i++)
	{
		$cids.=$dh.intval($classid[$i]);
		$dh=',';
	}
	$whereclass='classid in ('.$cids.')';
	$seting='';
	//��������
	if($add['doclasstype'])
	{
		$seting.=",classtype='$add[classtype]'";
	}
	if($add['dolisttempid']&&$add[listtempid])
	{
		$seting.=",listtempid='$add[listtempid]'";
	}
	if($add['dodtlisttempid'])
	{
		$seting.=",dtlisttempid='$add[dtlisttempid]'";
	}
	if($add['domaxnum'])
	{
		$seting.=",maxnum='$add[maxnum]'";
	}
	if($add['dolencord'])
	{
		$seting.=",lencord='$add[lencord]'";
	}
	if($add['dosearchtempid'])
	{
		$seting.=",searchtempid='$add[searchtempid]'";
	}
	if($add['dowapstyleid'])
	{
		$seting.=",wapstyleid='$add[wapstyleid]'";
	}
	if($add['dolistorder'])
	{
		$seting.=",listorder='$add[listorder]'";
	}
	if($add['doreorder'])
	{
		$seting.=",reorder='$add[reorder]'";
	}
	if($add['dolistdt'])
	{
		$seting.=",listdt='$add[listdt]'";
	}
	if($add['doshowdt'])
	{
		$seting.=",showdt='$add[showdt]'";
	}
	if($add['doshowclass'])
	{
		$seting.=",showclass='$add[showclass]'";
	}
	if($add['doopenadd'])
	{
		$seting.=",openadd='$add[openadd]'";
	}
	//ѡ������[����Ŀ]
	if($add['doclasstempid'])
	{
		$seting.=",classtempid='$add[classtempid]'";
	}
	if($add['doislist'])
	{
		$seting.=",islist='$add[islist]'";
	}
	//ѡ������[�ռ���Ŀ]
	if($add['donewstempid']&&$add[newstempid])
	{
		$seting.=",newstempid='$add[newstempid]'";
		if($add['tobetempinfo'])
		{
			$donewstemp=1;
		}
	}
	if($add['dopltempid'])
	{
		$seting.=",pltempid='$add[pltempid]'";
	}
	if($add['dolink_num'])
	{
		$seting.=",link_num='$add[link_num]'";
	}
	if($add['doinfopath'])
	{
		if($add['infopath']==0)
		{
			$add['ipath']='';
		}
		$seting.=",ipath='$add[ipath]'";
	}
	if($add['donewspath'])
	{
		$seting.=",newspath='$add[newspath]'";
	}
	if($add['dofilename_qz'])
	{
		$seting.=",filename_qz='$add[filename_qz]'";
	}
	if($add['dofilename'])
	{
		$seting.=",filename='$add[filename]'";
	}
	if($add['dofiletype'])
	{
		$seting.=",filetype='$add[filetype]'";
	}
	if($add['doopenpl'])
	{
		$seting.=",openpl='$add[openpl]'";
	}
	if($add['docheckpl'])
	{
		$seting.=",checkpl='$add[checkpl]'";
	}
	if($add['doqaddshowkey'])
	{
		$seting.=",qaddshowkey='$add[qaddshowkey]'";
	}
	if($add['docheckqadd'])
	{
		$seting.=",checkqadd='$add[checkqadd]'";
	}
	if($add['doqaddgroupid'])
	{
		$add[qaddgroupid]=DoPostClassQAddGroupid($add[qaddgroupidck]);
		$seting.=",qaddgroupid='$add[qaddgroupid]'";
	}
	if($add['doqaddlist'])
	{
		$seting.=",qaddlist='$add[qaddlist]'";
	}
	if($add['doaddinfofen'])
	{
		$seting.=",addinfofen='$add[addinfofen]'";
	}
	if($add['doadminqinfo'])
	{
		$seting.=",adminqinfo='$add[adminqinfo]'";
	}
	if($add['doqeditchecked'])
	{
		$seting.=",qeditchecked='$add[qeditchecked]'";
	}
	if($add['doaddreinfo'])
	{
		$seting.=",addreinfo='$add[addreinfo]'";
	}
	if($add['dohaddlist'])
	{
		$seting.=",haddlist='$add[haddlist]'";
	}
	if($add['dosametitle'])
	{
		$seting.=",sametitle='$add[sametitle]'";
	}
	if($add['dochecked'])
	{
		$seting.=",checked='$add[checked]'";
	}
	if($add['dorepreinfo'])
	{
		$seting.=",repreinfo='$add[repreinfo]'";
	}
	if($add['dodefinfovoteid'])
	{
		$seting.=",definfovoteid='$add[definfovoteid]'";
	}
	if($add['dogroupid'])
	{
		$seting.=",groupid='$add[groupid]'";
	}
	if($add['dodoctime'])
	{
		$seting.=",doctime='$add[doctime]'";
	}
	//����ģ������
	if($add['dodown_num'])
	{
		$seting.=",down_num='$add[down_num]'";
	}
	if($add['doonline_num'])
	{
		$seting.=",online_num='$add[online_num]'";
	}
	//JS��������
	if($add['dojstempid'])
	{
		$seting.=",jstempid='$add[jstempid]'";
	}
	if($add['donewjs'])
	{
		$seting.=",newline='$add[newline]'";
	}
	if($add['dohotjs'])
	{
		$seting.=",hotline='$add[hotline]'";
	}
	if($add['dogoodjs'])
	{
		$seting.=",goodline='$add[goodline]'";
	}
	if($add['dohotpljs'])
	{
		$seting.=",hotplline='$add[hotplline]'";
	}
	if($add['dofirstjs'])
	{
		$seting.=",firstline='$add[firstline]'";
	}
	if(empty($seting))
	{
		printerror("NotChangeSetClassInfo","");
	}
	$seting=substr($seting,1);
	$sql=$empire->query("update {$dbtbpre}enewsclass set ".$seting." where ".$whereclass);
	//����ģ��Ӧ���������ɵ���Ϣ
	if($donewstemp==1)
	{
		$csql=$empire->query("select classid,tbname from {$dbtbpre}enewsclass where (".$whereclass.") and islast=1");
		while($r=$empire->fetch($csql))
		{
			$upsql=$empire->query("update {$dbtbpre}ecms_".$r[tbname]." set newstempid='$add[newstempid]' where classid='$r[classid]'");
		}
	}
	if($sql)
	{
		GetClass();
		//������־
		insert_dolog("");
		printerror("SetMoreClassSuccess","SetMoreClass.php");
	}
	else
	{printerror("DbError","");}
}
?>