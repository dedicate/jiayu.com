<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
require("../../data/dbcache/class.php");
require "../".LoadLang("pub/fun.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//��֤
$lur=is_login();
$logininid=$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];

//���ذ�ť�¼�
function ToReturnDoFileButton($doing,$tranfrom,$field,$file,$filename,$fileid,$filesize,$filetype,$no,$type){
	if($doing==1)//���ص�ַ
	{
		$bturl="ChangeFile1(1,'".$file."');";
		$button="<input type=button name=button value='ѡ��' onclick=\"javascript:".$bturl."\">";
	}
	elseif($doing==2)//���ص�ַ
	{
		$bturl="ChangeFile1(2,'".$file."');";
		$button="<input type=button name=button value='ѡ��' onclick=\"javascript:".$bturl."\">";
	}
	else
	{
		if($tranfrom==1)//�༭��ѡ��
		{
			$bturl="EditorChangeFile('".$file."','".addslashes($filename)."','".$filetype."','".$filesize."','".addslashes($no)."');";
			$button="<input type=button name=button value='ѡ��' onclick=\"javascript:".$bturl."\">";
		}
		elseif($tranfrom==2)//�����ֶ�ѡ��
		{
			$bturl="SFormIdChangeFile('".addslashes($no)."','$file','$filesize','$filetype','$field');";
			$button="<input type=button name=button value='ѡ��' onclick=\"javascript:".$bturl."\">";
		}
		else
		{
			$bturl="InsertFile('".$file."','".addslashes($filename)."','".$fileid."','".$filesize."','".$filetype."','','".$type."');";
			$button="<input type=button name=button value='����' onclick=\"javascript:".$bturl."\">";
		}
	}
	$retr['button']=$button;
	$retr['bturl']=$bturl;
	return $retr;
}

$classid=(int)$_GET['classid'];
$filepass=(int)$_GET['filepass'];
$type=(int)$_GET['type'];
$doing=(int)$_GET['doing'];
$field=$_GET['field'];
$tranfrom=$_GET['tranfrom'];
$fileno=$_GET['fileno'];
if(empty($field))
{
	$field="ecms";
}
$add="";
//��Ŀ
$searchclassid=$_GET['searchclassid'];
if($searchclassid=='all')
{
	$searchclassid=0;
	$searchvarclassid='all';
}
else
{
	$searchclassid=$searchclassid?$searchclassid:$classid;
	$searchvarclassid=$searchclassid;
}
$searchclassid=(int)$searchclassid;
if($searchclassid)
{
	if($class_r[$searchclassid]['islast'])
	{
		$add.=" and classid='$searchclassid'";
	}
	else
	{
		$add.=" and ".ReturnClass($class_r[$searchclassid]['sonclass']);
	}
}
//ʱ�䷶Χ
$filelday=(int)$_GET['filelday'];
if(empty($filelday))
{
	$filelday=$public_r['filelday'];
}
if($filelday&&$filelday!=1)
{
	$ckfilelday=date('Y-m-d H:i:s',time()-$filelday);
	$add.=" and filetime>'$ckfilelday'";
}
//��ǰ��Ϣ
$sinfo=(int)$_GET['sinfo'];
$select_sinfo='';
if($classid)
{
	if($sinfo)
	{
		$add.=" and id='$filepass'";
	}
	$select_sinfo='<input name="sinfo" type="checkbox" id="sinfo" value="1"'.($sinfo?' checked':'').'>��ǰ��Ϣ';
}
//�ؼ���
$keyboard=RepPostVar2($_GET['keyboard']);
if(!empty($keyboard))
{
	$show=$_GET['show'];
	if($show==0)//����ȫ��
	{
		$add.=" and (filename like '%$keyboard%' or no like '%$keyboard%' or adduser like '%$keyboard%')";
	}
	elseif($show==1)//�����ļ���
	{
		$add.=" and filename like '%$keyboard%'";
	}
	elseif($show==2)//�������
	{
		$add.=" and no like '%$keyboard%'";
	}
	else//�����ϴ���
	{
		$add.=" and adduser like '%$keyboard%'";
	}
}
$search="&classid=$classid&filepass=$filepass&type=$type&doing=$doing&tranfrom=$tranfrom&field=$field&show=$show&searchclassid=$searchvarclassid&keyboard=$keyboard&fileno=$fileno&filelday=$filelday&sinfo=$sinfo";
//��ҳ
$page=(int)$_GET['page'];
$start=0;
$line=25;//ÿҳ��ʾ����
if($type==1)//ͼƬ
{
	$line=12;
}
$page_line=12;//ÿҳ��ʾ������
$offset=$page*$line;//��ƫ����
$query="select fileid,filename,filesize,path,filetime,classid,no,fpath from {$dbtbpre}enewsfile where type='$type'".$add;
$totalquery="select count(*) as total from {$dbtbpre}enewsfile where type='$type'".$add;
$num=$empire->gettotal($totalquery);//ȡ��������
$query.=" order by fileid desc limit $offset,$line";
$sql=$empire->query($query);
$returnpage=page2($num,$line,$page_line,$start,$page,$search);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>ѡ���ļ�</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<script>
function InsertFile(filename,fname,fileid,filesize,filetype,fileno,dotype){
	var vstr="";
	if(dotype!=undefined)
	{
		vstr=showModalDialog("infoeditor/epage/insertfile.php?ecms="+dotype+"&fname="+fname+"&fileid="+fileid+"&filesize="+filesize+"&filetype="+filetype+"&filename="+filename, "", "dialogWidth:45.5em; dialogHeight:27.5em; status:0");
		if(vstr==undefined)
		{
			return false;
		}
	}
	parent.opener.DoFile(vstr);
	parent.window.close();
}
function TInsertFile(vstr){
	parent.opener.DoFile(vstr);
	parent.window.close();
}
//ѡ���ֶ�
function ChangeFile1(obj,str){
<?php
if(strstr($field,'.'))
{
?>
	parent.<?=$field?>.value=str;
<?php
}
else
{
?>
	if(obj==1)
	{
		parent.opener.document.add.<?=$field?>.value=str;
	}
	else
	{
		parent.opener.document.form1.<?=$field?>.value=str;
	}
<?php
}
?>
	parent.window.close();
}
//�༭��ѡ��
function EditorChangeFile(fileurl,filename,filetype,filesize,name){
	parent.opener.OnUploadCompleted(2,fileurl,filename,'',name,filesize);
<?php
if($type==1)
{
?>
	if(parent.opener.document.getElementById('txtAlt').value=='')
	{
		parent.opener.document.getElementById('txtAlt').value=name;
	}
<?php
}
elseif($type==0)
{
?>
	if(parent.opener.document.getElementById('fname').value=='')
	{
		parent.opener.document.getElementById('fname').value=name;
	}
	if(parent.opener.document.getElementById('filesize').value=='')
	{
		parent.opener.document.getElementById('filesize').value=filesize;
	}
<?php
}
?>
	parent.window.close();
}
//������ѡ��
function SFormIdChangeFile(name,url,filesize,filetype,idvar){
	parent.opener.doSpChangeFile(name,url,filesize,filetype,idvar);
	parent.window.close();
}
//ȫѡ
function CheckAll(form){
  for(var i=0;i<form.elements.length;i++)
  {
    var e = form.elements[i];
	if(e.name=='getmark'||e.name=='getsmall')
		{
			continue;
		}
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
}

//���ر��
function ExpStr(str,exp){
	var pos,len,ext;
	pos=str.lastIndexOf(exp)+1;
	len=str.length;
	ext=str.substring(pos,len);
	return ext;
}
function ReturnFileNo(obj){
	var filename,str,exp;
	if(obj.no.value!='')
	{
		return '';
	}
	if(obj.file.value!='')
	{
		str=obj.file.value;
	}
	else
	{
		str=obj.tranurl.value;
	}
	if(str.indexOf("\\")>=0)
	{
		exp="\\";
	}
	else
	{
		exp="/";
	}
	filename=ExpStr(str,exp);
	obj.no.value=filename;
}
//��������ҳ��
function ReloadChangeFilePage(){
	self.location.reload();
}
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr valign="top"> 
    <td width="68%"> <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
        <form action="ecmseditor.php" target="ECUploadWindow" method="post" enctype="multipart/form-data" name="etform" onsubmit="return ReturnFileNo(document.etform);">
          <input type=hidden name=classid value="<?=$classid?>">
          <input type=hidden name=filepass value="<?=$filepass?>">
          <input type=hidden name=enews value="TranFile">
          <input type=hidden name=type value="<?=$type?>">
          <input type=hidden name=doing value="<?=$doing?>">
		  <input type=hidden name=sinfo value="<?=$sinfo?>">
          <tr class="header"> 
            <td colspan="2">�ϴ�</td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td width="16%">Զ�̱���</td>
            <td width="84%"><input name="tranurl" type="text" id="tranurl" value="http://" size="36"></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>�����ϴ�</td>
            <td><input name="file" type="file" size="32"> </td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>�ļ�����</td>
            <td><input name="no" type="text" id="no" value="<?=$_GET['fileno']?>" size="36"> 
            </td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>ͼƬѡ��</td>
            <td> <input name="getmark" type="checkbox" id="getmark" value="1"> 
              <a href="../SetEnews.php" target="_blank">��ˮӡ</a> <input name="getsmall" type="checkbox" id="getsmall" value="1">
              ��������ͼ����� <input name="width" type="text" id="width" value="<?=$public_r['spicwidth']?>" size="6">
              * �߶� <input name="height" type="text" id="height" value="<?=$public_r['spicheight']?>" size="6"></td>
          </tr>
          <tr bgcolor="#FFFFFF"> 
            <td>&nbsp;</td>
            <td><input type="submit" name="Submit3" value="�ϴ�"></td>
          </tr>
        </form>
      </table>
	  <script type="text/javascript">
					document.write( '<iframe name="ECUploadWindow" style="DISPLAY: none" src="images/blank.html"><\/iframe>' ) ;
	  </script>
	  </td>
  </tr>
  <tr> 
    <td> <div align="center"> </div></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="0">
  <form name="searchfile" method="get" action="file.php">
  <input type=hidden name=type value="<?=$type?>">
  <input type=hidden name=classid value="<?=$classid?>">
  <input type=hidden name=filepass value="<?=$filepass?>">
  <input type=hidden name=doing value="<?=$doing?>">
  <input type=hidden name=tranfrom value="<?=$tranfrom?>">
  <input type=hidden name=field value="<?=$field?>">
  <input type=hidden name=fileno value="<?=$fileno?>">
    <tr> 
      <td><div align="center">������ 
          <input name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>">
          <select name="show" id="show">
		  <option value="0">����</option>
		  <option value="1">�ļ���</option>
		  <option value="2" selected>���</option>
		  <option value="3">�ϴ���</option>
          </select>
          <span id="fileclassnav"></span> 
          <select name="filelday" id="filelday">
            <option value="1"<?=$filelday==1?' selected':''?>>ȫ��ʱ��</option>
            <option value="86400"<?=$filelday==86400?' selected':''?>>1 ��</option>
            <option value="172800"<?=$filelday==172800?' selected':''?>>2 
            ��</option>
            <option value="604800"<?=$filelday==604800?' selected':''?>>һ��</option>
            <option value="2592000"<?=$filelday==2592000?' selected':''?>>1 
            ����</option>
            <option value="7948800"<?=$filelday==7948800?' selected':''?>>3 
            ����</option>
            <option value="15897600"<?=$filelday==15897600?' selected':''?>>6 
            ����</option>
            <option value="31536000"<?=$filelday==31536000?' selected':''?>>1 
            ��</option>
          </select>
		  <?=$select_sinfo?>
          <input type="submit" name="Submit2" value="����">
        </div></td>
    </tr>
  </form>
</table>
<form name="dofile" method="post" action="../ecmsfile.php" onsubmit="return confirm('ȷ��Ҫ����?');">
<input type=hidden name=enews value="DoMarkSmallPic">
  <input type=hidden name=type value="<?=$type?>">
  <input type=hidden name=classid value="<?=$classid?>">
  <input type=hidden name=searchclassid value="<?=$searchclassid?>">
  <input type=hidden name=filepass value="<?=$filepass?>">
  <input type=hidden name=doing value="<?=$doing?>">
  <input type=hidden name=field value="<?=$field?>">
  <input type=hidden name=sinfo value="<?=$sinfo?>">
<?
if($type==1)//ͼƬ
{
	include('fileinc/editorpic.php');
}
elseif($type==2)//flash
{
	include('fileinc/editorflash.php');
}
elseif($type==3)//��ý���ļ�
{
	include('fileinc/editormedia.php');
}
else//����
{
	include('fileinc/editorfile.php');
}
?>
</form>
<IFRAME frameBorder="0" id="showclassnav" name="showclassnav" scrolling="no" src="../ShowClassNav.php?ecms=4&classid=<?=$searchclassid?>" style="HEIGHT:0;VISIBILITY:inherit;WIDTH:0;Z-INDEX:1"></IFRAME>
</body>
</html>
<?
db_close();
$empire=null;
?>