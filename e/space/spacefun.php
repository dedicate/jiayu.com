<?php
//����sql���
function espace_ReturnBqQuery($classid,$line,$enews=0,$do=0,$ewhere='',$eorder=''){
	global $empire,$dbtbpre,$public_r,$class_r,$class_zr,$do_openbqquery,$fun_r,$class_tr,$emod_r,$etable_r,$userid,$eyh_r;
	if($enews==24&&$do_openbqquery==1)//��sql��ѯ
	{
		$query_first=substr($classid,0,7);
		if(!($query_first=='select '||$query_first=='SELECT '))
		{
			return "";
		}
		$classid=RepSqlTbpre($classid);
		$sql=$empire->query1($classid);
		if(!$sql)
		{
			echo"SQL Error: ".ReRepSqlTbpre($classid);
		}
		return $sql;
	}
	if($enews==0||$enews==1||$enews==2||$enews==9||$enews==12||$enews==15)//��Ŀ
	{
		if(strstr($classid,','))//����Ŀ
		{
			$son_r=sys_ReturnMoreClass($classid,1);
			$classid=$son_r[0];
			$where=$son_r[1];
		}
		else
		{
			if($class_r[$classid][islast])
			{
				$where="classid='$classid'";
			}
			else
			{
				$where=ReturnClass($class_r[$classid][sonclass]);
			}
		}
		$tbname=$class_r[$classid][tbname];
		$mid=$class_r[$classid][modid];
		$yhid=$class_r[$classid][yhid];
    }
	elseif($enews==6||$enews==7||$enews==8||$enews==11||$enews==14||$enews==17)//ר��
	{
		if(strstr($classid,','))//��ר��
		{
			$son_r=sys_ReturnMoreZt($classid);
			$classid=$son_r[0];
			$where=$son_r[1];
		}
		else
		{
			$where="ztid like '%|".$classid."|%'";
		}
		$tbname=$class_zr[$classid][tbname];
		$mid=$etable_r[$tbname][mid];
		$yhid=$class_zr[$classid][yhid];
	}
	elseif($enews==25||$enews==26||$enews==27||$enews==28||$enews==29||$enews==30)//�������
	{
		if(strstr($classid,','))//��������
		{
			$son_r=sys_ReturnMoreTT($classid);
			$classid=$son_r[0];
			$where=$son_r[1];
		}
		else
		{
			$where="ttid='$classid'";
		}
		$mid=$class_tr[$classid][mid];
		$tbname=$emod_r[$mid][tbname];
		$yhid=$class_tr[$classid][yhid];
	}
	if($enews==0)//��Ŀ����
	{
		$query='('.$where.') and checked=1';
		$order='newstime';
		$yhvar='bqnew';
    }
	elseif($enews==1)//��Ŀ����
	{
		$query='('.$where.') and checked=1';
		$order='onclick';
		$yhvar='bqhot';
    }
	elseif($enews==2)//��Ŀ�Ƽ�
	{
		$query='('.$where.') and isgood>0 and checked=1';
		$order='newstime';
		$yhvar='bqgood';
    }
	elseif($enews==9)//��Ŀ��������
	{
		$query='('.$where.') and checked=1';
		$order='plnum';
		$yhvar='bqpl';
    }
	elseif($enews==12)//��Ŀͷ��
	{
		$query='('.$where.') and firsttitle>0 and checked=1';
		$order='newstime';
		$yhvar='bqfirst';
    }
	elseif($enews==15)//��Ŀ��������
	{
		$query='('.$where.') and checked=1';
		$order='totaldown';
		$yhvar='bqdown';
    }
	elseif($enews==3)//��������
	{
		$query='checked=1';
		$order='newstime';
		$tbname=$public_r[tbname];
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqnew';
		$yhid=$etable_r[$tbname][yhid];
    }
	elseif($enews==4)//���е������
	{
		$query='checked=1';
		$order='onclick';
		$tbname=$public_r[tbname];
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqhot';
		$yhid=$etable_r[$tbname][yhid];
    }
	elseif($enews==5)//�����Ƽ�
	{
		$query='isgood>0 and checked=1';
		$order='newstime';
		$tbname=$public_r[tbname];
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqgood';
		$yhid=$etable_r[$tbname][yhid];
    }
	elseif($enews==10)//������������
	{
		$query='checked=1';
		$order='plnum';
		$tbname=$public_r[tbname];
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqpl';
		$yhid=$etable_r[$tbname][yhid];
    }
	elseif($enews==13)//����ͷ��
	{
		$query='firsttitle>0 and checked=1';
		$order='newstime';
		$tbname=$public_r[tbname];
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqfirst';
		$yhid=$etable_r[$tbname][yhid];
    }
	elseif($enews==16)//������������
	{
		$query='checked=1';
		$order='totaldown';
		$tbname=$public_r[tbname];
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqdown';
		$yhid=$etable_r[$tbname][yhid];
    }
	elseif($enews==6)//ר������
	{
		$query='('.$where.') and checked=1';
		$order='newstime';
		$yhvar='bqnew';
    }
	elseif($enews==7)//ר��������
	{
		$query='('.$where.') and checked=1';
		$order='onclick';
		$yhvar='bqhot';
    }
	elseif($enews==8)//ר���Ƽ�
	{
		$query='('.$where.') and isgood>0 and checked=1';
		$order='newstime';
		$yhvar='bqgood';
    }
	elseif($enews==11)//ר����������
	{
		$query='('.$where.') and checked=1';
		$order='plnum';
		$yhvar='bqpl';
    }
	elseif($enews==14)//ר��ͷ��
	{
		$query='('.$where.') and firsttitle>0 and checked=1';
		$order='newstime';
		$yhvar='bqfirst';
    }
	elseif($enews==17)//ר����������
	{
		$query='('.$where.') and checked=1';
		$order='totaldown';
		$yhvar='bqdown';
    }
	elseif($enews==18)//��������
	{
		$query='checked=1';
		$order='newstime';
		$tbname=$classid;
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqnew';
		$yhid=$etable_r[$tbname][yhid];
	}
	elseif($enews==19)//��������
	{
		$query='checked=1';
		$order='onclick';
		$tbname=$classid;
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqhot';
		$yhid=$etable_r[$tbname][yhid];
	}
	elseif($enews==20)//�����Ƽ�
	{
		$query='isgood>0 and checked=1';
		$order='newstime';
		$tbname=$classid;
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqgood';
		$yhid=$etable_r[$tbname][yhid];
	}
	elseif($enews==21)//������������
	{
		$query='checked=1';
		$order='plnum';
		$tbname=$classid;
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqpl';
		$yhid=$etable_r[$tbname][yhid];
	}
	elseif($enews==22)//����ͷ����Ϣ
	{
		$query='firsttitle>0 and checked=1';
		$order="newstime";
		$tbname=$classid;
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqfirst';
		$yhid=$etable_r[$tbname][yhid];
	}
	elseif($enews==23)//������������
	{
		$query='checked=1';
		$order='totaldown';
		$tbname=$classid;
		$mid=$etable_r[$tbname][mid];
		$yhvar='bqdown';
		$yhid=$etable_r[$tbname][yhid];
	}
	elseif($enews==25)//�����������
	{
		$query='('.$where.') and checked=1';
		$order='newstime';
		$yhvar='bqnew';
    }
	elseif($enews==26)//�������������
	{
		$query='('.$where.') and checked=1';
		$order='onclick';
		$yhvar='bqhot';
    }
	elseif($enews==27)//��������Ƽ�
	{
		$query='('.$where.') and isgood>0 and checked=1';
		$order='newstime';
		$yhvar='bqgood';
    }
	elseif($enews==28)//���������������
	{
		$query='('.$where.') and checked=1';
		$order='plnum';
		$yhvar='bqpl';
    }
	elseif($enews==29)//�������ͷ��
	{
		$query='('.$where.') and firsttitle>0 and checked=1';
		$order='newstime';
		$yhvar='bqfirst';
    }
	elseif($enews==30)//���������������
	{
		$query='('.$where.') and checked=1';
		$order='totaldown';
		$yhvar='bqdown';
    }
	//������
	if(!strstr($public_r['nottobq'],','.$classid.','))
	{
		$query.=ReturnNottoBqWhere();
	}
	$query.=" and userid='$userid' and ismember=1";
	//��������
	if(!empty($ewhere))
	{
		$query.=' and ('.$ewhere.')';
	}
	//ͼƬ��Ϣ
	if(!empty($do))
	{
		$query.=" and ispic=1";
    }
	//��ֹ
	if(empty($tbname))
	{
		echo $fun_r['BqErrorCid']."=<b>".$classid."</b>".$fun_r['BqErrorNtb']."(".$fun_r['BqErrorDo']."=".$enews.")";
		return false;
	}
	//����
	$addorder=empty($eorder)?$order.' desc':$eorder;
	//�Ż�
	$yhadd='';
	if(!empty($eyh_r[$yhid]['dosbq']))
	{
		$yhadd=ReturnYhSql($yhid,$yhvar);
	}
	$query='select '.ReturnSqlListF($mid).' from '.$dbtbpre.'ecms_'.$tbname.' where '.$yhadd.$query.' order by '.$addorder.' limit '.$line;
	$sql=$empire->query1($query);
	if(!$sql)
	{
		echo"SQL Error: ".ReRepSqlTbpre($query);
	}
	return $sql;
}

//�鶯��ǩ������SQL���ݺ���
function espace_eloop($classid=0,$line=10,$enews=3,$doing=0,$ewhere='',$eorder=''){
	return espace_ReturnBqQuery($classid,$line,$enews,$doing,$ewhere,$eorder);
}

//�鶯��ǩ�������������ݺ���
function espace_eloop_sp($r){
	global $class_r;
	$sr['titleurl']=sys_ReturnBqTitleLink($r);
	$sr['classname']=$class_r[$r[classid]][bname]?$class_r[$r[classid]][bname]:$class_r[$r[classid]][classname];
	$sr['classurl']=sys_ReturnBqClassname($r,9);
	return $sr;
}
?>