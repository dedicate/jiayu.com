<?php
//������������ҳ��
function ReNewsHtml($start,$classid,$from,$retype,$startday,$endday,$startid,$endid,$tbname,$havehtml){
	global $empire,$public_r,$class_r,$fun_r,$dbtbpre,$etable_r;
	$tbname=RepPostVar($tbname);
	if(empty($tbname))
	{
		printerror("ErrorUrl","history.go(-1)");
    }
	$start=(int)$start;
	//��ID
	if($retype)
	{
		$startid=(int)$startid;
		$endid=(int)$endid;
		$add1=$endid?' and id>='.$startid.' and id<='.$endid:'';
    }
	else
	{
		$startday=RepPostVar($startday);
		$endday=RepPostVar($endday);
		$add1=$startday&&$endday?' and truetime>='.to_time($startday.' 00:00:00').' and truetime<='.to_time($endday.' 23:59:59'):'';
    }
	//����Ŀ
	$classid=(int)$classid;
	if($classid)
	{
		$where=empty($class_r[$classid][islast])?ReturnClass($class_r[$classid][sonclass]):"classid='$classid'";
		$add1.=' and '.$where;
    }
	//������
	$add1.=ReturnNreInfoWhere();
	//�Ƿ��ظ�����
	if($havehtml!=1)
	{
		$add1.=' and havehtml=0';
	}
	//�Ż�
	$yhadd='';
	$yhid=$etable_r[$tbname][yhid];
	$yhvar='rehtml';
	if($yhid)
	{
		$yhadd=ReturnYhSql($yhid,$yhvar);
	}
	$b=0;
	$sql=$empire->query("select * from {$dbtbpre}ecms_".$tbname." where ".$yhadd."id>$start".$add1." and checked=1 order by id limit ".$public_r[renewsnum]);
	while($r=$empire->fetch($sql))
	{
		if(!empty($r['titleurl'])||$class_r[$r[classid]][showdt]==2)
		{
			continue;
		}
		$b=1;
		GetHtml($r,'',1);//������Ϣ�ļ�
		$new_start=$r[id];
	}
	if(empty($b))
	{
		echo "<link rel=\"stylesheet\" href=\"../data/images/css.css\" type=\"text/css\"><center><b>".$tbname.$fun_r[ReTableIsOK]."!</b></center>";
		db_close();
		$empire=null;
		exit();
	}
	echo"<link rel=\"stylesheet\" href=\"../data/images/css.css\" type=\"text/css\"><meta http-equiv=\"refresh\" content=\"".$public_r['realltime'].";url=ecmschtml.php?enews=ReNewsHtml&tbname=$tbname&classid=$classid&start=$new_start&from=$from&retype=$retype&startday=$startday&endday=$endday&startid=$startid&endid=$endid&havehtml=$havehtml&reallinfotime=".$_GET['reallinfotime']."\">".$fun_r[OneReNewsHtmlSuccess]."(ID:<font color=red><b>".$new_start."</b></font>)";
	exit();
}

//ˢ�������б�
function ReListHtml_all($start,$do,$from){
	global $empire,$public_r,$fun_r,$class_r,$dbtbpre;
	$start=(int)$start;
	$b=0;
	if($do=="all")
	{
		insert_dolog("");//������־
		printerror("ReClassidAllSuccess",$from);
    }
	elseif($do=="zt")//ˢ��ר��
	{
		$zsql=$empire->query("select ztid,ztname,ztnum,listtempid,classid from {$dbtbpre}enewszt where ztid>$start order by ztid limit ".$public_r[relistnum]);
		while($z_r=$empire->fetch($zsql))
		{
			$b=1;
			ListHtml($z_r[ztid],$ret_r,1);
			$end_classid=$z_r[ztid];
		}
		if(empty($b))
		{
			echo $fun_r[ReZtListNewsSuccess]."<script>self.location.href='ecmschtml.php?enews=ReListHtml_all&start=0&do=all&from=$from';</script>";
			exit();
		}
		//echo $fun_r[OneReZtListNewsSuccess]."(ZtID:<font color=red><b>".$end_classid."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReListHtml_all&start=$end_classid&do=zt&from=$from';</script>";
		echo"<meta http-equiv=\"refresh\" content=\"".$public_r['realltime'].";url=ecmschtml.php?enews=ReListHtml_all&start=$end_classid&do=zt&from=$from\">".$fun_r[OneReZtListNewsSuccess]."(ZtID:<font color=red><b>".$end_classid."</b></font>)";
		exit();
	}
	//��Ŀ
	$sql=$empire->query("select classid,classtempid,islast,islist from {$dbtbpre}enewsclass where classid>$start and nreclass=0 order by classid limit ".$public_r[relistnum]);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		if(!$r[islast])//����Ŀ
		{
			if($r[islist]==1)
			{
				ListHtml($r[classid],$ret_r,3);
			}
			elseif($r[islist]==3)//��Ŀ����Ϣ
			{
				ReClassBdInfo($r[classid]);
			}
			else
			{
				$classtemp=$r[islist]==2?GetClassText($r[classid]):GetClassTemp($r['classtempid']);
				NewsBq($r[classid],$classtemp,0,0);
			}
		}
		else//����Ŀ
		{
			ListHtml($r[classid],$ret_r,0);
		}
		$end_classid=$r[classid];
	}
	if(empty($b))
	{
		echo $fun_r[ReListNewsSuccess]."<script>self.location.href='ecmschtml.php?enews=ReListHtml_all&start=0&from=$from&do=zt';</script>";
		exit();
    }
	//echo $fun_r[OneReListNewsSuccess]."(ID:<font color=red><b>".$end_classid."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReListHtml_all&start=$end_classid&do=class&from=$from';</script>";
	echo"<meta http-equiv=\"refresh\" content=\"".$public_r['realltime'].";url=ecmschtml.php?enews=ReListHtml_all&start=$end_classid&do=class&from=$from\">".$fun_r[OneReListNewsSuccess]."(ID:<font color=red><b>".$end_classid."</b></font>)";
	exit();
}

//ˢ������js
function ReAllNewsJs($start,$do,$from){
	global $empire,$public_r,$fun_r,$dbtbpre;
	$start=(int)$start;
	$line=$public_r[relistnum];
	$b=0;
	if($do=="all")
	{
		$pr=$empire->fetch1("select hotnum,newnum,goodnum,hotplnum,firstnum,jstempid from {$dbtbpre}enewspublic limit 1");
		$jstemptext=GetTheJstemp($pr['jstempid']);//jsģ��
		//ˢ��ȫ��js
		GetNewsJs($classid,$pr[newnum],$pr[sub_new],$pr[newshowdate],3,$jstemptext);
		GetNewsJs($classid,$pr[hotnum],$pr[sub_hot],$pr[hotshowdate],4,$jstemptext);
		GetNewsJs($classid,$pr[goodnum],$pr[sub_good],$pr[goodshowdate],5,$jstemptext);
		GetNewsJs($classid,$pr[hotplnum],$pr[sub_hotpl],$pr[hotplshowdate],10,$jstemptext);
		GetNewsJs($classid,$pr[firstnum],$pr[sub_first],$pr[firstshowdate],13,$jstemptext);
		insert_dolog("");//������־
		printerror("ReAllJsSuccess",$from);
	}
	elseif($do=="zt")//ˢ��ר��js
	{
		$from=urlencode($from);
		$sql=$empire->query("select ztid,newline,hotline,goodline,hotplline,firstline,jstempid from {$dbtbpre}enewszt where ztid>$start and nrejs=0 order by ztid limit $line");
		while($r=$empire->fetch($sql))
		{
			$jstemptext=GetTheJstemp($r[jstempid]);//jsģ��
			$b=1;
			GetNewsJs($r[ztid],$r[newline],$r[newstrlen],$r[newshowdate],6,$jstemptext);
			GetNewsJs($r[ztid],$r[hotline],$r[hotstrlen],$r[hotshowdate],7,$jstemptext);
			GetNewsJs($r[ztid],$r[goodline],$r[goodstrlen],$r[goodshowdate],8,$jstemptext);
			GetNewsJs($r[ztid],$r[hotplline],$r[hotplstrlen],$r[hotplshowdate],11,$jstemptext);
			GetNewsJs($r[ztid],$r[firstline],$r[firststrlen],$r[firstshowdate],14,$jstemptext);
			$newstart=$r[ztid];
		}
		//ˢ�����
		if(empty($b))
		{
			echo $fun_r[ReZtNewsJsSuccess]."<script>self.location.href='ecmschtml.php?enews=ReAllNewsJs&do=all&start=0&from=$from';</script>";
			exit();
	    }
		//echo $fun_r[OneReZtNewsJsSuccess]."(ZtID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReAllNewsJs&do=zt&start=$newstart&from=$from';</script>";
		echo"<meta http-equiv=\"refresh\" content=\"".$public_r['realltime'].";url=ecmschtml.php?enews=ReAllNewsJs&do=zt&start=$newstart&from=$from\">".$fun_r[OneReZtNewsJsSuccess]."(ZtID:<font color=red><b>".$newstart."</b></font>)";
		exit();
	}
	else//ˢ����Ŀjs
	{
		$from=urlencode($from);
		$sql=$empire->query("select classid,newline,hotline,goodline,hotplline,firstline,jstempid from {$dbtbpre}enewsclass where classid>$start and nrejs=0 and wburl='' order by classid limit $line");
		while($r=$empire->fetch($sql))
		{
			$jstemptext=GetTheJstemp($r[jstempid]);//jsģ��
			$b=1;
			GetNewsJs($r[classid],$r[newline],$r[newstrlen],$r[newshowdate],0,$jstemptext);
			GetNewsJs($r[classid],$r[hotline],$r[hotstrlen],$r[hotshowdate],1,$jstemptext);
			GetNewsJs($r[classid],$r[goodline],$r[goodstrlen],$r[goodshowdate],2,$jstemptext);
			GetNewsJs($r[classid],$r[hotplline],$r[hotplstrlen],$r[hotplshowdate],9,$jstemptext);
			GetNewsJs($r[classid],$r[firstline],$r[firststrlen],$r[firstshowdate],12,$jstemptext);
			$newstart=$r[classid];
		}
		//ˢ�����
		if(empty($b))
		{
			echo $fun_r[ReClassNewsJsSuccess]."<script>self.location.href='ecmschtml.php?enews=ReAllNewsJs&do=zt&start=0&from=$from';</script>";
			exit();
	    }
		//echo $fun_r[OneReClassNewsJsSuccess]."(ID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReAllNewsJs&do=class&start=$newstart&from=$from';</script>";
		echo"<meta http-equiv=\"refresh\" content=\"".$public_r['realltime'].";url=ecmschtml.php?enews=ReAllNewsJs&do=class&start=$newstart&from=$from\">".$fun_r[OneReClassNewsJsSuccess]."(ID:<font color=red><b>".$newstart."</b></font>)";
		exit();
	}
}

//ˢ��������������������
function ReHot_NewNews(){
	global $empire,$dbtbpre;
	$public_r=$empire->fetch1("select hotnum,newnum,goodnum,hotplnum,firstnum,jstempid from {$dbtbpre}enewspublic limit 1");
	$jstemptext=GetTheJstemp($public_r['jstempid']);//ȡ��jsģ��
	GetNewsJs($classid,$public_r[newnum],$public_r[sub_new],$public_r[newshowdate],3,$jstemptext);
	GetNewsJs($classid,$public_r[hotnum],$public_r[sub_hot],$public_r[hotshowdate],4,$jstemptext);
	GetNewsJs($classid,$public_r[goodnum],$public_r[sub_good],$public_r[goodshowdate],5,$jstemptext);
	GetNewsJs($classid,$public_r[hotplnum],$public_r[sub_hotpl],$public_r[hotplshowdate],10,$jstemptext);
	GetNewsJs($classid,$public_r[firstnum],$public_r[sub_first],$public_r[firstshowdate],13,$jstemptext);
	insert_dolog("");//������־
	printerror("ReNewHotSuccess","history.go(-1)");
}

//ˢ��ר��
function ReZtHtml($ztid){
	global $class_zr;
	$ztid=(int)$ztid;
	if(!$ztid)
	{
		printerror("NotChangeReZtid","history.go(-1)");
	}
	$classid=$class_zr[$ztid][classid];
	ListHtml($ztid,$ret_r,1);
	insert_dolog("");//������־
	printerror("ReZtidSuccess","history.go(-1)");
}

//ˢ�µ�����Ŀ
function ReSingleJs($classid,$doing=0){
	global $empire,$dbtbpre;
	$classid=(int)$classid;
	//ˢ����Ŀ
	if($doing==0)
	{
		$r=$empire->fetch1("select classid,newline,hotline,goodline,hotplline,firstline,jstempid from {$dbtbpre}enewsclass where classid='$classid'");
		$jstemptext=GetTheJstemp($r[jstempid]);//jsģ��
		GetNewsJs($r[classid],$r[newline],$r[newstrlen],$r[newshowdate],0,$jstemptext);
		GetNewsJs($r[classid],$r[hotline],$r[hotstrlen],$r[hotshowdate],1,$jstemptext);
		GetNewsJs($r[classid],$r[goodline],$r[goodstrlen],$r[goodshowdate],2,$jstemptext);
		GetNewsJs($r[classid],$r[hotplline],$r[hotplstrlen],$r[hotplshowdate],9,$jstemptext);
		GetNewsJs($r[classid],$r[firstline],$r[firststrlen],$r[firstshowdate],12,$jstemptext);
	}
	//ˢ��ר��js
	elseif($doing==1)
	{
		$r=$empire->fetch1("select ztid,newline,hotline,goodline,hotplline,firstline,jstempid from {$dbtbpre}enewszt where ztid='$classid'");
		$jstemptext=GetTheJstemp($r[jstempid]);//jsģ��
		GetNewsJs($r[ztid],$r[newline],$r[newstrlen],$r[newshowdate],6,$jstemptext);
		GetNewsJs($r[ztid],$r[hotline],$r[hotstrlen],$r[hotshowdate],7,$jstemptext);
		GetNewsJs($r[ztid],$r[goodline],$r[goodstrlen],$r[goodshowdate],8,$jstemptext);
		GetNewsJs($r[ztid],$r[hotplline],$r[hotplstrlen],$r[hotplshowdate],11,$jstemptext);
		GetNewsJs($r[ztid],$r[firstline],$r[firststrlen],$r[firstshowdate],14,$jstemptext);
    }
	else
	{}
	insert_dolog("");//������־
	printerror("ReJsSuccess","history.go(-1)");
}

//�������ɶ�̬ҳ��
function ReDtPage($userid,$username){
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"changedata");
	GetPlTempPage();//�����б�ģ��
	GetPlJsPage();//����JSģ��
	ReCptemp();//�������ģ��
	GetSearch();//��������ģ��
	GetPrintPage();//��ӡģ��
	GetDownloadPage();//���ص�ַҳ��
	ReGbooktemp();//���԰�ģ��
	ReLoginIframe();//��½״̬ģ��
	ReSchAlltemp();//ȫվ����ģ��
	//������־
	insert_dolog("");
	printerror("ReDtPageSuccess","history.go(-1)");
}

//����ˢ���Զ���ҳ��
function ReUserpageAll($start=0,$from,$userid,$username){
	global $empire,$public_r,$fun_r,$dbtbpre;
	$start=(int)$start;
	$b=0;
	$sql=$empire->query("select id,path,pagetext,title,pagetitle,pagekeywords,pagedescription,tempid from {$dbtbpre}enewspage where id>$start order by id limit ".$public_r['reuserpagenum']);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$newstart=$r[id];
		ReUserpage($r[id],$r[pagetext],$r[path],$r[title],$r[pagetitle],$r[pagekeywords],$r[pagedescription],$r[tempid]);
	}
	//���
	if(empty($b))
	{
		//������־
	    insert_dolog("");
		printerror("ReUserpageAllSuccess",$from);
	}
	echo $fun_r['OneReUserpageSuccess']."(ID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReUserpageAll&start=$newstart&from=$from';</script>";
	exit();
}

//����ˢ���Զ�����Ϣ�б�
function ReUserlistAll($start=0,$from,$userid,$username){
	global $empire,$public_r,$fun_r,$dbtbpre;
	$start=(int)$start;
	$b=0;
	$sql=$empire->query("select listid,pagetitle,filepath,filetype,totalsql,listsql,maxnum,lencord,listtempid from {$dbtbpre}enewsuserlist where listid>$start order by listid limit ".$public_r['reuserlistnum']);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$newstart=$r[listid];
		ReUserlist($r,"");
	}
	//���
	if(empty($b))
	{
		//������־
	    insert_dolog("");
		printerror("ReUserlistAllSuccess",$from);
	}
	echo $fun_r['OneReUserlistSuccess']."(ID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReUserlistAll&start=$newstart&from=$from';</script>";
	exit();
}

//����ˢ���Զ���JS
function ReUserjsAll($start=0,$from,$userid,$username){
	global $empire,$public_r,$fun_r,$dbtbpre;
	$start=(int)$start;
	$b=0;
	$sql=$empire->query("select jsid,jsname,jssql,jstempid,jsfilename from {$dbtbpre}enewsuserjs where jsid>$start order by jsid limit ".$public_r['reuserjsnum']);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$newstart=$r[jsid];
		ReUserjs($r,"");
	}
	//���
	if(empty($b))
	{
		//������־
	    insert_dolog("");
		printerror("ReUserjsAllSuccess",$from);
	}
	echo $fun_r['OneReUserjsSuccess']."(ID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReUserjsAll&start=$newstart&from=$from';</script>";
	exit();
}

//ת�����ļ�
function GoReListHtmlMore($classid,$gore,$from){
	global $empire,$class_r;
	$count=count($classid);
	if($count==0)
	{
		printerror("EmptyReListHtmlMoreId","history.go(-1)");
    }
	$cid="";
	for($i=0;$i<$count;$i++)
	{
		if($i==0)
		{
			$fh="";
		}
		else
		{
			$fh=",";
		}
		$cid.=$fh.$classid[$i];
	}
	//��Ŀ
	if(empty($gore))
	{
		$phome="ReListHtmlMore";
	}
	//ר��
	else
	{
		$phome="ReListZtHtmlMore";
	}
	echo"<script>self.location.href='ecmschtml.php?enews=$phome&classid=$cid&from=$from';</script>";
	exit();
}

//ˢ�¶��б�
function ReListHtmlMore($start,$classid,$from){
	global $empire,$public_r,$fun_r,$class_r,$dbtbpre;
	$start=(int)$start;
	$classid=RepPostVar($classid);
	if(empty($classid))
	{
		printerror("ErrorUrl",$from);
    }
	$b=0;
	$sql=$empire->query("select classid,classtempid,islast,islist from {$dbtbpre}enewsclass where classid>$start and classid in(".$classid.") order by classid limit ".$public_r[relistnum]);
	while($r=$empire->fetch($sql))
	{
		$b=1;
		//����Ŀ
		if(!$r[islast])
		{
			if($r[islist]==1)
			{
				ListHtml($r[classid],$ret_r,3);
			}
			elseif($r[islist]==3)//��Ŀ����Ϣ
			{
				ReClassBdInfo($r[classid]);
			}
			else
			{
				$classtemp=$r[islist]==2?GetClassText($r[classid]):GetClassTemp($r['classtempid']);
				NewsBq($r[classid],$classtemp,0,0);
			}
		}
		//����Ŀ
		else
		{
			ListHtml($r[classid],$ret_r,0);
		}
		$end_classid=$r[classid];
	}
	if(empty($b))
	{
		//������־
		insert_dolog("");
		printerror("ReClassidAllSuccess",$from);
    }
	echo $fun_r[OneReListNewsSuccess]."(ID:<font color=red><b>".$end_classid."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReListHtmlMore&start=$end_classid&classid=$classid&from=$from';</script>";
	exit();
}

//ˢ�¶�ר���б�
function ReListZtHtmlMore($start,$classid,$from){
	global $empire,$public_r,$fun_r,$class_r,$dbtbpre;
	$start=(int)$start;
	$classid=RepPostVar($classid);
	if(empty($classid))
	{
		printerror("ErrorUrl",$from);
    }
	$b=0;
	//ˢ��ר��
	$zsql=$empire->query("select ztid,ztname,ztnum,listtempid,classid from {$dbtbpre}enewszt where ztid>$start and ztid in(".$classid.") order by ztid limit ".$public_r[relistnum]);
    while($z_r=$empire->fetch($zsql))
	{
		$b=1;
        ListHtml($z_r[ztid],$ret_r,1);
		$end_classid=$z_r[ztid];
    }
	if(empty($b))
	{
		//������־
		insert_dolog("");
		printerror("ReClassidAllSuccess",$from);
    }
    echo $fun_r[OneReZtListNewsSuccess]."(ZtID:<font color=red><b>".$end_classid."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReListZtHtmlMore&start=$end_classid&classid=$classid&from=$from';</script>";
    exit();
}

//���ɵ���Ϣ
function ReSingleInfo($userid,$username){
	global $empire,$public_r,$class_r,$dbtbpre;
	if($_GET['classid'])
	{
		$classid=(int)$_GET['classid'];
		$id=$_GET['id'];
	}
	else
	{
		$classid=(int)$_POST['classid'];
		$id=$_POST['id'];
	}
	if(empty($classid))
	{
		printerror('ErrorUrl','history.go(-1)');
	}
	$count=count($id);
	if(empty($count))
	{
		printerror("NotReInfoid","history.go(-1)");
	}
	for($i=0;$i<$count;$i++)
	{
		$add.="id='$id[$i]' or ";
    }
	$add=substr($add,0,strlen($add)-4);
	$sql=$empire->query("select * from {$dbtbpre}ecms_".$class_r[$classid][tbname]." where ".$add);
	while($r=$empire->fetch($sql))
	{
		GetHtml($r,$ret_r);//������Ϣ�ļ�
	}
	//������־
	insert_dolog("classid=".$classid);
	printerror("ReSingleInfoSuccess",$_SERVER['HTTP_REFERER']);
}

//�ָ���ĿĿ¼
function ReClassPath($start=0){
	global $empire,$public_r,$dbtbpre;
	$start=(int)$start;
	$sql=$empire->query("select classid,classpath,islast from {$dbtbpre}enewsclass where wburl='' and classid>$start order by classid limit ".$public_r[relistnum]);
	$b=0;
	while($r=$empire->fetch($sql))
	{
		$b=1;
		$newstart=$r[classid];
		$returnpath=FormatClassPath($r[classpath],$r[islast]);
		echo "Create Path:".$returnpath." success!<br>";
    }
	//�ָ�ר��Ŀ¼
	if(empty($b))
	{
		$zsql=$empire->query("select ztid,ztpath from {$dbtbpre}enewszt order by ztid");
		while($zr=$empire->fetch($zsql))
		{
			CreateZtPath($zr[ztpath]);
		}
	}
	if(empty($b))
	{
		//������־
	    insert_dolog("");
		printerror("ReClassPathSuccess","ReHtml/ChangeData.php");
	}
	echo"(ID:<font color=red><b>".$newstart."</b></font>)<script>self.location.href='ecmschtml.php?enews=ReClassPath&start=$newstart';</script>";
	exit();
}

//������ĿĿ¼
function FormatClassPath($classpath,$islast){
	$r=explode("/",$classpath);
	$returnpath="";
	for($i=0;$i<count($r);$i++)
	{
		if($i>0)
		{
			$returnpath.="/".$r[$i];
		}
		else
		{
			$returnpath.=$r[$i];
		}
		CreateClassPath($returnpath);
	}
	return $returnpath;
}

//ˢ����ҳ
function ReIndex(){
	$indextemp=GetIndextemp();//ȡ��ģ��
	NewsBq($classid,$indextemp,1,0);
	insert_dolog("");//������־
	printerror("ReIndexSuccess","history.go(-1)");
}
?>