<?php
define('EmpireCMSAdmin','1');
require("../class/connect.php");
require("../class/db_sql.php");
require("../class/functions.php");
require("../class/user.php");
$link=db_connect();
$empire=new mysqlquery();
//��֤�û�
$lur=is_login();
$logininid=(int)$lur['userid'];
$loginin=$lur['username'];
$loginrnd=$lur['rnd'];
$loginlevel=(int)$lur['groupid'];
$loginadminstyleid=$lur['adminstyleid'];
//�ҵ�״̬
$user_r=$empire->fetch1("select pretime,preip,loginnum from {$dbtbpre}enewsuser where userid='$logininid'");
$gr=$empire->fetch1("select groupname from {$dbtbpre}enewsgroup where groupid='$loginlevel'");
//����Աͳ��
$adminnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsuser");
$date=date("Y-m-d");
$noplnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewspl where checked=1");
//δ��˻�Ա
$nomembernum=$empire->gettotal("select count(*) as total from ".$user_tablename." where ".$user_checked."=0");
//���ڹ��
$outtimeadnum=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsad where endtime<'$date'");
//ϵͳ��Ϣ
if (function_exists('ini_get')){
        $onoff = ini_get('register_globals');
    } else {
        $onoff = get_cfg_var('register_globals');
    }
    if ($onoff){
        $onoff="��";
    }else{
        $onoff="�ر�";
    }
    if (function_exists('ini_get')){
        $upload = ini_get('file_uploads');
    } else {
        $upload = get_cfg_var('file_uploads');
    }
    if ($upload){
        $upload="����";
    }else{
        $upload="������";
    }
//����
$register_ok="����";
if($public_r[register_ok])
{$register_ok="�ر�";}
$addnews_ok="����";
if($public_r[addnews_ok])
{$addnews_ok="�ر�";}
//�汾
@include("../class/EmpireCMS_version.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���������������Ż���վ</title>
<link href="adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr> 
    <td><div align="center"><strong> 
        <h3>���������������Ż���վ</h3>
        </strong></div></td>
  </tr>
  <tr> 
    <td><table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="25">�ҵ�״̬</td>
        </tr>
        <tr> 
          <td height="25" bgcolor="#FFFFFF"> <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr> 
                <td height="22">��¼��:&nbsp;<b>
                  <?=$loginin?>
                  </b>&nbsp;&nbsp;,�����û���:&nbsp;<b>
                  <?=$gr[groupname]?>
                  </b></td>
              </tr>
              <tr>
                <td height="22">�������� <b>
                  <?=$user_r[loginnum]?>
                  </b> �ε�¼���ϴε�¼ʱ�䣺
                  <?=$user_r[pretime]?date('Y-m-d H:i:s',$user_r[pretime]):'---'?>
                  ����¼IP��
                  <?=$user_r[preip]?$user_r[preip]:'---'?>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td></td>
  </tr>
  <tr> 
    <td><table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td width="100%" height="25"> 
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%"><strong><a href="#ecms">��ݲ˵�</a></strong></td>
                <td><div align="right"><a href="http://www.dotool.cn" target="_blank"><strong>վ������</strong></a></div></td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td height="25" bgcolor="#FFFFFF"><strong>��Ϣ����</strong>��&nbsp;&nbsp;<a href="AddInfoChClass.php">������Ϣ</a>&nbsp;&nbsp; 
            <a href="ListAllInfo.php">������Ϣ</a>&nbsp;&nbsp; <a href="ListAllInfo.php?showspecial=4&sear=1">�����Ϣ</a> 
            &nbsp;&nbsp; <a href="workflow/ListWfInfo.php">ǩ����Ϣ</a>&nbsp;&nbsp; <a href="pl/ListAllPl.php">��������</a>&nbsp;&nbsp; <a href="sp/UpdateSp.php">������Ƭ</a>&nbsp;&nbsp; 
            <a href="ReHtml/ChangeData.php">���ݸ�������</a></td>
          &nbsp;&nbsp; </tr>
        <tr> 
          <td height="25" bgcolor="#FFFFFF"><strong>��Ŀ����</strong>��&nbsp;&nbsp;<a href="ListClass.php">������Ŀ</a>&nbsp;&nbsp; 
            <a href="ListZt.php">����ר��</a>&nbsp;&nbsp; <a href="ListInfoClass.php">����ɼ�</a> 
            &nbsp;&nbsp; <a href="file/ListFile.php?type=9">��������</a>&nbsp;&nbsp; 
            <a href="SetEnews.php">ϵͳ��������</a></td>
        </tr>
        <tr> 
          <td height="25" bgcolor="#FFFFFF"><strong>�û�����</strong>��&nbsp;&nbsp;<a href="member/ListMember.php?sear=1&schecked=1">��˻�Ա</a>&nbsp;&nbsp; 
            <a href="member/ListMember.php">�����Ա</a> &nbsp; <a href="user/ListLog.php">�����½��־</a> 
            &nbsp;&nbsp; <a href="user/ListDolog.php">���������־</a>&nbsp;&nbsp; <a href="user/EditPassword.php">�޸ĸ�������</a>&nbsp;&nbsp; 
            <a href="user/UserTotal.php">�û�����ͳ��</a></td>
        </tr>
        <tr> 
          <td height="25" bgcolor="#FFFFFF"><strong>��������</strong>��&nbsp;&nbsp;<a href="tool/gbook.php">��������</a>&nbsp;&nbsp; 
            <a href="tool/feedback.php">��������Ϣ</a>&nbsp;&nbsp;<a href="DownSys/ListError.php">������󱨸�</a>&nbsp;&nbsp; 
            <a href="ShopSys/ListDd.php">������</a>&nbsp;&nbsp;<a href="pay/ListPayRecord.php">����֧����¼</a>&nbsp;&nbsp; 
            <a href="PathLevel.php">�鿴Ŀ¼Ȩ��״̬</a></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
        <tr> 
          <td height="42"> <div align="center"><strong><font color="#0000FF" size="3">���������������Ż���վ</font></strong></div></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="25" colspan="2"> <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr> 
                <td width="50%"><a href="#"><strong>ϵͳ��Ϣ</strong></a></td>             
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td width="43%"><strong>��վ��Ϣ</strong></td>
          <td width="57%"><strong>��������Ϣ</strong></td>
        </tr>
        <tr> 
          <td valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="1" cellpadding="3">
              <tr> 
                <td width="28%" height="23">��Աע��:</td>
                <td width="72%"> 
                  <?=$register_ok?>
                </td>
              </tr>
              <tr> 
                <td height="23">��ԱͶ��:</td>
                <td> 
                  <?=$addnews_ok?>
                </td>
              </tr>
              <tr> 
                <td height="23">����Ա����:</td>
                <td><a href="user/ListUser.php"><?=$adminnum?></a> ��</td>
              </tr>
              <tr> 
                <td height="23">δ�������:</td>
                <td><a href="pl/ListAllPl.php?checked=2"><?=$noplnum?></a> ��</td>
              </tr>
              <tr> 
                <td height="23">δ��˻�Ա:</td>
                <td><a href="member/ListMember.php?sear=1&schecked=1"><?=$nomembernum?></a> ��</td>
              </tr>
              <tr> 
                <td height="23">���ڹ��:</td>
                <td><a href="tool/ListAd.php?time=1"><?=$outtimeadnum?></a> ��</td>
              </tr>
              <tr> 
                <td height="23">��½��IP:</td>
                <td><? echo egetip();?></td>
              </tr>
              <tr> 
                <td height="23">����汾:</td>
                <td> <a href="http://www.phome.net" target="_blank"><strong>EmpireCMS 
                  v<?=EmpireCMS_VERSION?></strong></a> <font color="#666666">(<?=EmpireCMS_LASTTIME?>)</font></td>
              </tr>
              <tr>
                <td height="23">�������:</td>
                <td><?=EmpireCMS_CHARVER?></td>
              </tr>
            </table></td>
          <td valign="top" bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="1" cellpadding="3">
              <tr> 
                <td width="25%" height="23">���������:</td>
                <td width="75%"> 
                  <?=$_SERVER['SERVER_SOFTWARE']?>
                </td>
              </tr>
              <tr> 
                <td height="23">����ϵͳ:</td>
                <td><? echo defined('PHP_OS')?PHP_OS:'δ֪';?></td>
              </tr>
              <tr> 
                <td height="23">PHP�汾:</td>
                <td><? echo @phpversion();?></td>
              </tr>
              <tr> 
                <td height="23">MYSQL�汾:</td>
                <td><? echo @mysql_get_server_info();?></td>
              </tr>
              <tr> 
                <td height="23">ȫ�ֱ���:</td>
                <td> 
                  <?=$onoff?>
                  <font color="#666666">(����ر�)</font></td>
              </tr>
              <tr>
                <td height="23">ħ������:</td>
                <td> 
                  <?=MAGIC_QUOTES_GPC?'����':'�ر�'?>
                  <font color="#666666">(���鿪��)</font></td>
              </tr>
              <tr> 
                <td height="23">�ϴ��ļ�:</td>
                <td> 
                  <?=$upload?>
                </td>
              </tr>
              <tr> 
                <td height="23">��ǰʱ��:</td>
                <td><? echo date("Y-m-d H:i:s");?></td>
              </tr>
              <tr> 
                <td height="23">ʹ������:</td>
                <td> 
                  <?=$_SERVER['HTTP_HOST']?>
                </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php
db_close();
$empire=null;
?>