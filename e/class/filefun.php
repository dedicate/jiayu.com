<?php
//ɾ���ļ�
function DelFile($fileid,$userid,$username){
	global $empire,$class_r,$dbtbpre;
	$fileid=(int)$fileid;
	if(!$fileid)
	{printerror("NotFileid","history.go(-1)");}
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"file");
	$r=$empire->fetch1("select filename,path,classid,fpath from {$dbtbpre}enewsfile where fileid='$fileid' limit 1");
	$sql=$empire->query("delete from {$dbtbpre}enewsfile where fileid='$fileid'");
	DoDelFile($r);
	if($sql)
	{
		//������־
		insert_dolog("fileid=".$fileid."<br>filename=".$r[filename]);
		printerror("DelFileSuccess",$_SERVER['HTTP_REFERER']);
    }
	else
	{
		printerror("DbError","history.go(-1)");
    }
}

//����ɾ���ļ�
function DelFile_all($fileid,$userid,$username){
	global $empire,$dbtbpre,$class_r;
	//����Ȩ��
	if($_POST['enews']=='TDelFile_all')
	{
		$userid=(int)$userid;
		$ur=$empire->fetch1("select groupid,adminclass,filelevel from {$dbtbpre}enewsuser where userid='$userid' limit 1");
		if($ur['filelevel'])
		{
			$gr=$empire->fetch1("select dofile from {$dbtbpre}enewsgroup where groupid='$ur[groupid]'");
			if(!$gr['dofile'])
			{
				$classid=(int)$_POST['classid'];
				$searchclassid=(int)$_POST['searchclassid'];
				$classid=$searchclassid?$searchclassid:$classid;
				if(!$class_r[$classid]['classid'])
				{
					printerror("NotLevel","history.go(-1)");
				}
				if(!strstr($ur['adminclass'],'|'.$classid.'|'))
				{
					printerror("NotLevel","history.go(-1)");
				}
			}
		}
		else
		{
			CheckLevel($userid,$username,$classid,"file");
		}
	}
	else
	{
		CheckLevel($userid,$username,$classid,"file");
	}
	$count=count($fileid);
	if(!$count)
	{printerror("NotFileid","history.go(-1)");}
	for($i=0;$i<count($fileid);$i++)
	{
		$fileid[$i]=(int)$fileid[$i];
		$r=$empire->fetch1("select filename,path,classid,fpath from {$dbtbpre}enewsfile where fileid='$fileid[$i]' limit 1");
		$sql=$empire->query("delete from {$dbtbpre}enewsfile where fileid='$fileid[$i]'");
		DoDelFile($r);
    }
	if($sql)
	{
		//������־
		insert_dolog("");
		printerror("DelFileAllSuccess",$_SERVER['HTTP_REFERER']);
    }
	else
	{
		printerror("DbError","history.go(-1)");
    }
}

//ɾ�����฽��
function DelFreeFile($userid,$username){
	global $empire,$dbtbpre;
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"file");
	$sql=$empire->query("select filename,path,classid,fpath from {$dbtbpre}enewsfile where cjid<>0 and (id=0 or cjid=id)");
	while($r=$empire->fetch($sql))
	{
       DoDelFile($r);
    }
	$delsql=$empire->query("delete from {$dbtbpre}enewsfile where cjid<>0 and (id=0 or cjid=id)");
	if($sql)
	{
		//������־
		insert_dolog("");
		printerror("DelFreeFileSuccess",$_SERVER['HTTP_REFERER']);
    }
	else
	{
		printerror("DbError","history.go(-1)");
    }
}

//ɾ��Ŀ¼�ļ�
function DelPathFile($filename,$userid,$username){
	global $empire,$dbtbpre,$public_r,$efileftp_dr;
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"file");
	$count=count($filename);
	if(empty($count))
	{
		printerror("NotFileid","history.go(-1)");
	}
	//��Ŀ¼
	$basepath="../../d/file";
	for($i=0;$i<$count;$i++)
	{
		if(strstr($filename[$i],".."))
		{
			continue;
	    }
		DelFiletext($basepath."/".$filename[$i]);
		$dfile=ReturnPathFile($filename[$i]);
		$dfnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsfile where filename='$dfile'");
		if($dfnum)
		{
			$empire->query("delete from {$dbtbpre}enewsfile where filename='$dfile'");
			//FileServer
			if($public_r['openfileserver'])
			{
				$efileftp_dr[]=$basepath."/".$filename[$i];
			}
		}
    }
	//������־
	insert_dolog("");
	printerror("DelFileSuccess",$_SERVER['HTTP_REFERER']);
}

//������ˮӡ/����ͼ
function DoMarkSmallPic($add,$userid,$username){
	global $empire,$class_r,$dbtbpre,$public_r,$efileftp_fr;
	//����gd�����ļ�
	if($add['getsmall']||$add['getmark'])
	{
		@include(ECMS_PATH."e/class/gd.php");
	}
	else
	{
		printerror("EmptyDopicFileid","history.go(-1)");
	}
	$fileid=$add['fileid'];
	$count=count($fileid);
	if($count==0)
	{
		printerror("EmptyDopicFileid","history.go(-1)");
	}
	for($i=0;$i<$count;$i++)
	{
		$fileid[$i]=intval($fileid[$i]);
		$r=$empire->fetch1("select classid,filename,path,no,fpath from {$dbtbpre}enewsfile where fileid='$fileid[$i]'");
		$rpath=$r['path']?$r['path'].'/':$r['path'];
		$fspath=ReturnFileSavePath($r[classid],$r[fpath]);
		$path="../../".$fspath['filepath'].$rpath;
		$yname=$path.$r[filename];
		//����ͼ
		if($add['getsmall'])
		{
			$filetype=GetFiletype($r[filename]);
			$insertfile=substr($r[filename],0,strlen($r[filename])-strlen($filetype)).time();
			$name=$path."small".$insertfile;
			GetMySmallImg($add['classid'],$r[no],$insertfile,$r[path],$yname,$add[width],$add[height],$name,$add['filepass'],$add['filepass'],$userid,$username);
		}
		//ˮӡ
		if($add['getmark'])
		{
			GetMyMarkImg($yname);
			//FileServer
			if($public_r['openfileserver'])
			{
				$efileftp_fr[]=$yname;
			}
		}
	}
	printerror("DoMarkSmallPicSuccess",$_SERVER['HTTP_REFERER']);
}

//�ϴ��฽��
function TranMoreFile($file,$file_name,$file_type,$file_size,$no,$type,$userid,$username){
	global $empire,$public_r,$dbtbpre;
	$count=count($file_name);
	if(empty($count))
	{
		printerror("MustChangeTranOneFile","history.go(-1)");
    }
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"file");
	$type=(int)$type;
	for($i=0;$i<$count;$i++)
	{
		if(empty($file_name[$i]))
		{
			continue;
		}
		//ȡ���ļ�����
		$filetype=GetFiletype($file_name[$i]);
		//�����.php�ļ�
		if(CheckSaveTranFiletype($filetype))
		{continue;}
	    $type_r=explode("|".$filetype."|",$public_r['filetype']);
	    if(count($type_r)<2)
		{continue;}
		if($file_size[$i]>$public_r['filesize']*1024)
		{continue;}
		//�ϴ�
		$r=DoTranFile($file[$i],$file_name[$i],$file_type[$i],$file_size[$i],$classid);
		//д�����ݿ�
		$r[filesize]=(int)$r[filesize];
		$classid=(int)$classid;
		$filetime=date("Y-m-d H:i:s");
		if(empty($no[$i]))
		{$no[$i]=$r[filename];}
		$sql=$empire->query("insert into {$dbtbpre}enewsfile(filename,filesize,adduser,path,filetime,classid,no,type,onclick,id,cjid,fpath) values('$r[filename]',$r[filesize],'$username','$r[filepath]','$filetime',$classid,'$no[$i]',$type,0,0,0,'$public_r[fpath]');");
	}
	insert_dolog("");//������־
	printerror("TranMoreFileSuccess","file/TranMoreFile.php");
}
?>