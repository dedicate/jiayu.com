<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
//��ѯSQL�����Ҫ��ʾ�Զ����ֶμǵ���SQL�����Ӳ�ѯ�ֶ�
$query="select id,classid,titleurl,groupid,newspath,filename,checked,isqf,havehtml,istop,isgood,firsttitle,ismember,userid,username,plnum,totaldown,onclick,newstime,truetime,lastdotime,titlepic,title from {$dbtbpre}ecms_".$class_r[$classid][tbname].$ewhere." order by ".$doorder." limit $offset,$line";
$sql=$empire->query($query);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" href="adminstyle/<?=$loginadminstyleid?>/adminstyle.css" type="text/css">
<title>������Ϣ</title>
<script>
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
  }

function GetSelectId(form)
{
  var ids='';
  var dh='';
  for (var i=0;i<form.elements.length;i++)
  {
	var e = form.elements[i];
	if (e.name == 'id[]')
	{
	   if(e.checked==true)
	   {
       		ids+=dh+e.value;
			dh=',';
	   }
	}
  }
  return ids;
}

function PushInfoToSp(form)
{
	var id='';
	id=GetSelectId(form);
	if(id=='')
	{
		alert('��ѡ��Ҫ���͵���Ϣ');
		return false;
	}
	window.open('sp/PushToSp.php?classid=<?=$classid?>&id='+id,'PushToSp','width=360,height=500,scrollbars=yes,left=300,top=150,resizable=yes');
}
</script>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td width="52%">λ�ã� 
      <?=$url?>
    </td>
    <td width="48%"> <div align="right">[<a href="AddClass.php?enews=EditClass&classid=<?=$classid?>">��Ŀ����</a>] 
        [<a href="AddInfoClass.php?enews=AddInfoClass&newsclassid=<?=$classid?>">���Ӳɼ�</a>] 
        [<a href="ListInfoClass.php">����ɼ�</a>] [<a href="ecmschtml.php?enews=ReAllNewsJs&from=<?=$phpmyself?>">ˢ��������ϢJS</a>]</div></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="searchinfo" method="GET" action="ListNews.php">
    <tr> 
      <td width="35%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="23%"> <div align="left" class="emenubutton"> 
                <input type=button name=button value="������Ϣ" onClick="self.location.href='AddNews.php?enews=AddNews&ecmsnfrom=1&bclassid=<?=$bclassid?>&classid=<?=$classid?>'">
              </div></td>
            <td width="77%" title="������Ϣ��ʹ�ñ���������Ϣ��ʾ��ǰ̨"> <div align="right"> 
                <select name="dore">
                  <option value="1">ˢ�µ�ǰ��Ŀ</option>
                  <option value="2">ˢ����ҳ</option>
                  <option value="3">ˢ�¸���Ŀ</option>
                  <option value="4">ˢ�µ�ǰ��Ŀ�븸��Ŀ</option>
                  <option value="5">ˢ�¸���Ŀ����ҳ</option>
                  <option value="6" selected>ˢ�µ�ǰ��Ŀ������Ŀ����ҳ</option>
                </select>
                <input type="button" name="Submit12" value="�ύ" onclick="self.location.href='ecmsinfo.php?enews=AddInfoToReHtml&classid=<?=$classid?>&dore='+document.searchinfo.dore.value;">
              </div></td>
          </tr>
        </table>
      </td>
      <td width="65%">
<div align="right">����: 
          <select name="showspecial" id="showspecial">
            <option value="0"<?=$showspecial==0?' selected':''?>>��������</option>
			<option value="1"<?=$showspecial==1?' selected':''?>>�ö�</option>
            <option value="2"<?=$showspecial==2?' selected':''?>>�Ƽ�</option>
            <option value="3"<?=$showspecial==3?' selected':''?>>ͷ��</option>
            <option value="4"<?=$showspecial==4?' selected':''?>>δ���</option>
			<option value="6"<?=$showspecial==6?' selected':''?>>�����</option>
			<option value="7"<?=$showspecial==7?' selected':''?>>Ͷ��</option>
            <option value="5"<?=$showspecial==5?' selected':''?>>ǩ��</option>
			<option value="8"<?=$showspecial==8?' selected':''?>>�ҵ���Ϣ</option>
          </select>
          <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>" size="16">
          <select name="show">
            <option value="0" selected>�����ֶ�</option>
            <?=$searchoptions_r['select']?>
          </select>
		  <?=$stts?>
          <select name="ztid" id="ztid">
            <option value="0">����ר��</option>
            <?=$ztclass?>
          </select>
          <select name="infolday" id="infolday">
            <option value="1"<?=$infolday==1?' selected':''?>>ȫ��ʱ��</option>
            <option value="86400"<?=$infolday==86400?' selected':''?>>1 ��</option>
            <option value="172800"<?=$infolday==172800?' selected':''?>>2 
            ��</option>
            <option value="604800"<?=$infolday==604800?' selected':''?>>һ��</option>
            <option value="2592000"<?=$infolday==2592000?' selected':''?>>1 
            ����</option>
            <option value="7948800"<?=$infolday==7948800?' selected':''?>>3 
            ����</option>
            <option value="15897600"<?=$infolday==15897600?' selected':''?>>6 
            ����</option>
            <option value="31536000"<?=$infolday==31536000?' selected':''?>>1 
            ��</option>
          </select>
          <input type="submit" name="Submit2" value="����">
          <input name="sear" type="hidden" id="sear" value="1">
          <input name="bclassid" type="hidden" id="bclassid" value="<?=$bclassid?>">
          <input name="classid" type="hidden" id="classid" value="<?=$classid?>">
        </div></td>
    </tr>
  </form>
</table>
<form name="listform" method="post" action="ecmsinfo.php" onsubmit="return confirm('ȷ��Ҫִ�д˲�����');">
<input type=hidden name=classid value=<?=$classid?>>
<input type=hidden name=bclassid value=<?=$bclassid?>>
<input type=hidden name=enews value=DelNews_all>
<input type=hidden name=doing value=0>
  <input name="ecmsdoc" type="hidden" id="ecmsdoc" value="0">
  <input name="docfrom" type="hidden" id="docfrom" value="<?=$phpmyself?>">
  <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  	<tr class="header"> 
      <td height="25" colspan="8"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="60%"><font color="#ffffff"><a href="ListNews.php?bclassid=<?=$bclassid?>&classid=<?=$classid?>&sear=1&showspecial=8">�ҵ���Ϣ</a> 
              | <a href="ListNews.php?bclassid=<?=$bclassid?>&classid=<?=$classid?>&sear=1&showspecial=4">δ�����Ϣ</a> 
              | <a href="ListNews.php?bclassid=<?=$bclassid?>&classid=<?=$classid?>&sear=1&showspecial=5">ǩ����Ϣ</a> 
              | <a href="ListNews.php?bclassid=<?=$bclassid?>&classid=<?=$classid?>&sear=1&showspecial=7">Ͷ����Ϣ</a> 
              | <a href="ListNews.php?bclassid=<?=$bclassid?>&classid=<?=$classid?>&showretitle=1&srt=1" title="��ѯ�ظ����⣬������һ����Ϣ">��ѯ�ظ�����A</a> 
              | <a href="ListNews.php?bclassid=<?=$bclassid?>&classid=<?=$classid?>&showretitle=1&srt=0" title="��ѯ�ظ��������Ϣ(��������Ϣ)">��ѯ�ظ�����B</a> 
              | <a href="ecmsinfo.php?bclassid=<?=$bclassid?>&classid=<?=$classid?>&enews=SetAllCheckInfo" title="����Ŀ������Ϣȫ��Ϊ���״̬" onclick="return confirm('ȷ��Ҫ����?');">�����Ŀȫ����Ϣ</a></font> 
            </td>
            <td width="40%"> <div align="right"><font color="#ffffff"><a href="file/ListFile.php?type=9&classid=<?=$classid?>">��������</a> | <a href="ListInfoDoc.php?bclassid=<?=$bclassid?>&classid=<?=$classid?>">����鵵</a> | <a href=ReHtml/ChangeData.php target=_blank>��������</a> | <a href=../../ target=_blank>Ԥ����ҳ</a> | <a href="<?=$classurl?>" target=_blank>Ԥ����Ŀ</a></font></div></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td width="3%"><div align="center"></div></td>
      <td width="6%" height="25"><div align="center"><a href='ListNews.php?<?=$search1?>&myorder=4'><u>ID</u></a></div></td>
      <td width="36%" height="25"> <div align="center">����</div></td>
      <td width="12%" height="25"><div align="center">������</div></td>
      <td width="16%" height="25"> <div align="center"><a href='ListNews.php?<?=$search1?>&myorder=1'><u>����ʱ��</u></a></div></td>
	  <td width="7%" height="25"><div align="center"><a href='ListNews.php?<?=$search1?>&myorder=3'><u>���</u></a></div></td>
      <td width="6%"><div align="center"><a href='ListNews.php?<?=$search1?>&myorder=2'><u>����</u></a></div></td>
      <td width="14%" height="25"> <div align="center">����</div></td>
    </tr>
    <?php
	while($r=$empire->fetch($sql))
	{
		//״̬
		$st='';
		if($r[istop])//�ö�
		{
			$st.="<font color=red>[��".$r[istop]."]</font>";
		}
		if($r[isgood])//�Ƽ�
		{
			$st.="<font color=red>[��".$r[isgood]."]</font>";
		}
		if($r[firsttitle])//ͷ��
		{
			$st.="<font color=red>[ͷ".$r[firsttitle]."]</font>";
		}
		//ʱ��
		$truetime=date("Y-m-d H:i:s",$r[truetime]);
		$lastdotime=date("Y-m-d H:i:s",$r[lastdotime]);
		$oldtitle=$r[title];
		$r[title]=stripSlashes(sub($r[title],0,50,false));
		//���
		if(empty($r[checked]))
		{
			$checked=" title='δ���' style='background:#99C4E3'";
			$titleurl="ShowInfo.php?classid=$r[classid]&id=$r[id]";
		}
		else
		{
			$checked="";
			$titleurl=sys_ReturnBqTitleLink($r);
		}
		//��ԱͶ��
		if($r[ismember])
		{
			$r[username]="<a href='member/AddMember.php?enews=EditMember&userid=".$r[userid]."' target='_blank'><font color=red>".$r[username]."</font></a>";
		}
		//ǩ��
		$qf="";
		if($r[isqf])
		{
			$qfr=$empire->fetch1("select checktno,tstatus from {$dbtbpre}enewswfinfo where id='$r[id]' and classid='$r[classid]' limit 1");
			if($qfr[checktno]=='100')
			{
				$qf="(<font color='red'>��ͨ��</font>)";
			}
			elseif($qfr[checktno]=='101')
			{
				$qf="(<font color='red'>����</font>)";
			}
			elseif($qfr[checktno]=='102')
			{
				$qf="(<font color='red'>�ѷ��</font>)";
			}
			else
			{
				$qf="(<font color='red'>$qfr[tstatus]</font>)";
			}
			$qf="<a href='#ecms' onclick=\"window.open('workflow/DoWfInfo.php?classid=$r[classid]&id=$r[id]','','width=600,height=520,scrollbars=yes');\">".$qf."</a>";
		}
		//����ͼƬ
		$showtitlepic="";
		if($r[titlepic])
		{
			$showtitlepic="<a href='".$r[titlepic]."' title='Ԥ������ͼƬ' target=_blank><img src='../data/images/showimg.gif' border=0></a>";
		}
		//δ����
		$myid="<a href='ecmschtml.php?enews=ReSingleInfo&classid=$r[classid]&id[]=".$r[id]."'>".$r['id']."</a>";
		if(empty($r[havehtml]))
		{
			$myid="<a href='ecmschtml.php?enews=ReSingleInfo&classid=$r[classid]&id[]=".$r[id]."' title='δ����'><b>".$r[id]."</b></a>";
		}
	?>
    <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'" id=news<?=$r[id]?>> 
      <td><div align="center"> 
          <input name="id[]" type="checkbox" id="id[]" value="<?=$r[id]?>"<?=$checked?>>
        </div></td>
      <td height="32"> <div align="center"> 
          <?=$myid?>
        </div></td>
      <td height="25"> <div align="left"> 
          <?=$st?>
          <?=$showtitlepic?>
          <a href='<?=$titleurl?>' target=_blank title="<?=$oldtitle?>"> 
          <?=$r[title]?>
          </a> 
          <?=$qf?>
        </div></td>
      <td height="25"> <div align="center"> 
          <?=$r[username]?>
        </div></td>
      <td height="25"> <div align="center"> <a href="AddNews.php?enews=EditNews&id=<?=$r[id]?>&classid=<?=$classid?>&bclassid=<?=$bclassid?>" title="<? echo"����ʱ�䣺".$truetime."\r\n����޸ģ�".$lastdotime;?>"> 
          <?=date("Y-m-d H:i:s",$r[newstime])?>
          </a> </div></td>
      <td height="25"> <div align="center"> <a title="���ش���:<?=$r[totaldown]?>"> 
          <?=$r[onclick]?>
          </a> </div></td>
      <td><div align="center"><a href="pl/ListPl.php?id=<?=$r[id]?>&classid=<?=$classid?>&bclassid=<?=$bclassid?>" target=_blank title="��������"><u> 
          <?=$r[plnum]?>
          </u></a></div></td>
      <td height="25"> <div align="center"><a href="AddNews.php?enews=EditNews&id=<?=$r[id]?>&classid=<?=$classid?>&bclassid=<?=$bclassid?>">�޸�</a> | <a href="#empirecms" onclick="window.open('info/EditInfoSimple.php?enews=EditNews&id=<?=$r[id]?>&classid=<?=$classid?>&bclassid=<?=$bclassid?>','EditInfoSimple','width=600,height=360,scrollbars=yes,resizable=yes');">���</a> | <a href="ecmsinfo.php?enews=DelNews&id=<?=$r[id]?>&classid=<?=$classid?>&bclassid=<?=$bclassid?>" onClick="return confirm('ȷ��Ҫɾ����');">ɾ��</a>
        </div></td>
    </tr>
    <?
	}
	?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25"> <div align="center">
          <input type=checkbox name=chkall value=on onClick="CheckAll(this.form)">
        </div></td>
      <td height="25" colspan="7"><div align="right">
          <input type="submit" name="Submit3" value="ɾ��" onClick="document.listform.enews.value='DelNews_all';document.listform.action='ecmsinfo.php';">
          <input type="submit" name="Submit8" value="���" onClick="document.listform.enews.value='CheckNews_all';document.listform.action='ecmsinfo.php';">
          <input type="submit" name="Submit9" value="ȡ�����" onClick="document.listform.enews.value='NoCheckNews_all';document.listform.action='ecmsinfo.php';">
		  <input type="submit" name="Submit8" value="ˢ��" onClick="document.listform.enews.value='ReSingleInfo';document.listform.action='ecmschtml.php';">
          <select name="isgood" id="isgood">
            <option value="0">���Ƽ�</option>
            <option value="1">һ���Ƽ�</option>
            <option value="2">�����Ƽ�</option>
            <option value="3">�����Ƽ�</option>
            <option value="4">�ļ��Ƽ�</option>
            <option value="5">�弶�Ƽ�</option>
            <option value="6">�����Ƽ�</option>
            <option value="7">�߼��Ƽ�</option>
            <option value="8">�˼��Ƽ�</option>
            <option value="9">�ż��Ƽ�</option>
          </select>
          <input type="submit" name="Submit82" value="�Ƽ�" onClick="document.listform.enews.value='GoodInfo_all';document.listform.doing.value='0';document.listform.action='ecmsinfo.php';">
          <select name="firsttitle" id="firsttitle">
            <option value="0">ȡ��ͷ��</option>
            <option value="1">һ��ͷ��</option>
            <option value="2">����ͷ��</option>
            <option value="3">����ͷ��</option>
            <option value="4">�ļ�ͷ��</option>
            <option value="5">�弶ͷ��</option>
            <option value="6">����ͷ��</option>
            <option value="7">�߼�ͷ��</option>
            <option value="8">�˼�ͷ��</option>
            <option value="9">�ż�ͷ��</option>
          </select>
          <input type="submit" name="Submit823" value="ͷ��" onClick="document.listform.enews.value='GoodInfo_all';document.listform.doing.value='1';document.listform.action='ecmsinfo.php';">
          <input type="button" name="Submit112" value="����" onClick="PushInfoToSp(this.form);">
          <input type="submit" name="Submit11" value="�鵵" onClick="document.listform.enews.value='InfoToDoc';document.listform.doing.value='0';document.listform.action='ecmsinfo.php';">
          <select name="istop" id="select">
            <option value="0">���ö�</option>
            <option value="1">һ���ö�</option>
            <option value="2">�����ö�</option>
            <option value="3">�����ö�</option>
            <option value="4">�ļ��ö�</option>
            <option value="5">�弶�ö�</option>
            <option value="6">�����ö�</option>
			<option value="7">�߼��ö�</option>
			<option value="8">�˼��ö�</option>
			<option value="9">�ż��ö�</option>
          </select>
          <input type="submit" name="Submit7" value="�ö�" onClick="document.listform.enews.value='TopNews_all';document.listform.action='ecmsinfo.php';">
          <select name="ztid">
            <option value="0">ѡ��ר��</option>
            <?=$doztclass?>
          </select>
          <input type="submit" name="Submit52" value="ת��" onClick="document.listform.enews.value='DoZtNews_all';document.listform.action='ecmsinfo.php';">
        </div></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="8"> <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr> 
            <td width="68%"> 
              <?=$returnpage?>
            </td>
            <td width="32%"> <div align="right">
			<span id="moveclassnav"></span>
                <input type="submit" name="Submit5" value="�ƶ�" onClick="document.listform.enews.value='MoveNews_all';document.listform.action='ecmsinfo.php';">
                <input type="submit" name="Submit6" value="����" onClick="document.listform.enews.value='CopyNews_all';document.listform.action='ecmsinfo.php';">
              </div></td>
          </tr>
        </table></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="8"> <font color="#666666">��ע����ѡ����ɫΪδ�����Ϣ�������ߺ�ɫΪ��ԱͶ�壻��ϢID����Ϊδ����,���ID��ˢ��ҳ��.</font></td>
    </tr>
  </table>
</form>
<IFRAME frameBorder="0" id="showclassnav" name="showclassnav" scrolling="no" src="ShowClassNav.php?ecms=3" style="HEIGHT:0;VISIBILITY:inherit;WIDTH:0;Z-INDEX:1"></IFRAME>
</body>
</html>