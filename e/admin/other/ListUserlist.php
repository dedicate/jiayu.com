<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
require "../".LoadLang("pub/fun.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//��֤�û�
$lur=is_login();
$logininid=$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];
//��֤Ȩ��
CheckLevel($logininid,$loginin,$classid,"userlist");

//�����Զ�����Ϣ�б�
function AddUserlist($add,$userid,$username){
	global $empire,$dbtbpre;
	$listtempid=(int)$add['listtempid'];
	$maxnum=(int)$add['maxnum'];
	$lencord=(int)$add['lencord'];
	if(!$add[listname]||!$listtempid||!$add[listsql]||!$add[totalsql]||!$add[filepath]||!$add[filetype]||!$add[lencord])
	{
		printerror("EmptyUserListname","history.go(-1)");
	}
	$query_first=substr($add['totalsql'],0,7);
	$query_firstlist=substr($add['listsql'],0,7);
	if(!($query_first=="select "||$query_first=="SELECT "||$query_firstlist=="select "||$query_firstlist=="SELECT "))
	{
		printerror("ListSqlError","history.go(-1)");
	}
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"userlist");
	if(empty($add['pagetitle']))
	{
		$add['pagetitle']=$add['listname'];
	}
	$add[totalsql]=ClearAddsData($add[totalsql]);
	$add[listsql]=ClearAddsData($add[listsql]);
	$sql=$empire->query("insert into {$dbtbpre}enewsuserlist(listname,pagetitle,filepath,filetype,totalsql,listsql,maxnum,lencord,listtempid) values('$add[listname]','$add[pagetitle]','$add[filepath]','$add[filetype]','".addslashes($add[totalsql])."','".addslashes($add[listsql])."',$maxnum,$lencord,$listtempid);");
	//ˢ���б�
	$add[listsql]=addslashes($add[listsql]);
	$add[totalsql]=addslashes($add[totalsql]);
	ReUserlist($add,"../");
	if($sql)
	{
		$listid=$empire->lastid();
		//������־
		insert_dolog("listid=$listid&listname=$add[listname]");
		printerror("AddUserlistSuccess","AddUserlist.php?enews=AddUserlist");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//�޸��Զ�����Ϣ�б�
function EditUserlist($add,$userid,$username){
	global $empire,$dbtbpre;
	$listid=(int)$add['listid'];
	$listtempid=(int)$add['listtempid'];
	$maxnum=(int)$add['maxnum'];
	$lencord=(int)$add['lencord'];
	if(!$listid||!$add[listname]||!$listtempid||!$add[listsql]||!$add[totalsql]||!$add[filepath]||!$add[filetype]||!$add[lencord])
	{
		printerror("EmptyUserListname","history.go(-1)");
	}
	$query_first=substr($add['totalsql'],0,7);
	$query_firstlist=substr($add['listsql'],0,7);
	if(!($query_first=="select "||$query_first=="SELECT "||$query_firstlist=="select "||$query_firstlist=="SELECT "))
	{
		printerror("ListSqlError","history.go(-1)");
	}
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"userlist");
	/*
	//ɾ�����ļ�
	if(!($add['oldfilepath']<>$add['filepath']||$add['oldfiletype']<>$add['filetype']))
	{
		DelFiletext($add['oldjsfilename']);
	}
	*/
	if(empty($add['pagetitle']))
	{
		$add['pagetitle']=$add['listname'];
	}
	$add[totalsql]=ClearAddsData($add[totalsql]);
	$add[listsql]=ClearAddsData($add[listsql]);
	$sql=$empire->query("update {$dbtbpre}enewsuserlist set listname='$add[listname]',pagetitle='$add[pagetitle]',filepath='$add[filepath]',filetype='$add[filetype]',totalsql='".addslashes($add['totalsql'])."',listsql='".addslashes($add['listsql'])."',maxnum=$maxnum,lencord=$lencord,listtempid=$listtempid where listid=$listid");
	//ˢ���б�
	$add[listsql]=addslashes($add[listsql]);
	$add[totalsql]=addslashes($add[totalsql]);
	ReUserlist($add,"../");
	if($sql)
	{
		//������־
	    insert_dolog("listid=$listid&listname=$add[listname]");
		printerror("EditUserlistSuccess","ListUserlist.php");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//ɾ���Զ�����Ϣ�б�
function DelUserlist($listid,$userid,$username){
	global $empire,$dbtbpre;
	$listid=(int)$listid;
	if(!$listid)
	{
		printerror("NotChangeUserlistid","history.go(-1)");
	}
	//��֤Ȩ��
	CheckLevel($userid,$username,$classid,"userlist");
	$r=$empire->fetch1("select listname from {$dbtbpre}enewsuserlist where listid=$listid");
	$sql=$empire->query("delete from {$dbtbpre}enewsuserlist where listid=$listid");
	if($sql)
	{
		//������־
		insert_dolog("listid=$listid&listname=$r[listname]");
		printerror("DelUserlistSuccess","ListUserlist.php");
	}
	else
	{
		printerror("DbError","history.go(-1)");
	}
}

//ˢ���Զ����б�
function DoReUserlist($add,$userid,$username){
	global $empire,$dbtbpre;
	//����Ȩ��
	CheckLevel($userid,$username,$classid,"userlist");
	$listid=$add['listid'];
	$count=count($listid);
	if(!$count)
	{
		printerror("EmptyReUserlistid","history.go(-1)");
    }
	for($i=0;$i<$count;$i++)
	{
		$listid[$i]=(int)$listid[$i];
		if(empty($listid[$i]))
		{
			continue;
		}
		$ur=$empire->fetch1("select listid,pagetitle,filepath,filetype,totalsql,listsql,maxnum,lencord,listtempid from {$dbtbpre}enewsuserlist where listid='".$listid[$i]."'");
		ReUserlist($ur,"../");
	}
	//������־
	insert_dolog("");
	printerror("DoReUserlistSuccess",$_SERVER['HTTP_REFERER']);
}

$addgethtmlpath="../";
$enews=$_POST['enews'];
if(empty($enews))
{$enews=$_GET['enews'];}
if($enews)
{
	require("../../data/dbcache/class.php");
	include("../../class/t_functions.php");
}
if($enews=="AddUserlist")
{
	AddUserlist($_POST,$logininid,$loginin);
}
elseif($enews=="EditUserlist")
{
	EditUserlist($_POST,$logininid,$loginin);
}
elseif($enews=="DelUserlist")
{
	$listid=$_GET['listid'];
	DelUserlist($listid,$logininid,$loginin);
}
elseif($enews=="DoReUserlist")
{
	DoReUserlist($_POST,$logininid,$loginin);
}
else
{}
$page=(int)$_GET['page'];
$start=0;
$line=20;//ÿҳ��ʾ����
$page_line=20;//ÿҳ��ʾ������
$offset=$page*$line;//��ƫ����
$query="select listid,listname,filepath from {$dbtbpre}enewsuserlist";
$totalquery="select count(*) as total from {$dbtbpre}enewsuserlist";
$num=$empire->gettotal($totalquery);//ȡ��������
$query=$query." order by listid desc limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page2($num,$line,$page_line,$start,$page,$search);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<title>�����Զ�����Ϣ�б�</title>
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
</script>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
  <tr> 
    <td width="50%" height="25">λ�ã�<a href=ListUserlist.php>�����Զ�����Ϣ�б�</a></td>
    <td><div align="right" class="emenubutton">
        <input type="button" name="Submit" value="�����Զ����б�" onclick="self.location.href='AddUserlist.php?enews=AddUserlist';">
      </div></td>
  </tr>
</table>

<br>
  
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
  <form name="form1" method="post" action="ListUserlist.php">
    <tr class="header">
      <td width="5%"><div align="center">
          <input type=checkbox name=chkall value=on onclick=CheckAll(this.form)>
        </div></td>
      <td width="11%" height="25"> <div align="center">ID</div></td>
      <td width="48%" height="25"> <div align="center">�б�����</div></td>
      <td width="15%"><div align="center">Ԥ��</div></td>
      <td width="21%" height="25"> <div align="center">����</div></td>
    </tr>
    <?
  while($r=$empire->fetch($sql))
  {
  $jspath=$public_r['newsurl'].str_replace("../../","",$r['filepath']);
  ?>
    <tr bgcolor="#FFFFFF" onmouseout="this.style.backgroundColor='#ffffff'" onmouseover="this.style.backgroundColor='#C3EFFF'">
      <td><div align="center">
          <input name="listid[]" type="checkbox" id="listid[]" value="<?=$r[listid]?>">
        </div></td>
      <td height="25"> <div align="center"> 
          <?=$r[listid]?>
        </div></td>
      <td height="25"> <div align="center"> 
          <?=$r[listname]?>
        </div></td>
      <td><div align="center">[<a href="<?=$jspath?>" target="_blank">Ԥ��</a>]</div></td>
      <td height="25"> <div align="center">[<a href="AddUserlist.php?enews=EditUserlist&listid=<?=$r[listid]?>">�޸�</a>]&nbsp;[<a href="AddUserlist.php?enews=AddUserlist&docopy=1&listid=<?=$r[listid]?>">����</a>]&nbsp;[<a href="ListUserlist.php?enews=DelUserlist&listid=<?=$r[listid]?>" onclick="return confirm('ȷ��Ҫɾ����');">ɾ��</a>]</div></td>
    </tr>
    <?
  }
  ?>
    <tr bgcolor="#FFFFFF"> 
      <td height="25" colspan="5"> 
        <?=$returnpage?>
        &nbsp;&nbsp;&nbsp; <input type="submit" name="Submit3" value="ˢ��"> <input name="enews" type="hidden" id="enews" value="DoReUserlist"> 
      </td>
    </tr>
  </form>
</table>
</body>
</html>
<?
db_close();
$empire=null;
?>
