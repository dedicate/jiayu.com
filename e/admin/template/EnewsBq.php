<?php
define('EmpireCMSAdmin','1');
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../../class/functions.php");
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

$sql=$empire->query("select bqname,bqsay,funname,bq,issys,bqgs from {$dbtbpre}enewsbq where isclose=0 order by myorder desc,bqid");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�۹���վ����ϵͳ��ǩ˵��</title>
<link href="../adminstyle/<?=$loginadminstyleid?>/adminstyle.css" rel="stylesheet" type="text/css">
<script language="javascript">
window.resizeTo(760,600);
window.focus();
</script>
</head>
<body>
  <table width="100%" border="0" cellspacing="1" cellpadding="3">
    <tr> 
      <td id='bqnav'></td>
    </tr>
  </table>
<br>
<table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
  <tr> 
    <td colspan="2" class="header">��Ϣ��ǩ���ò�������</td>
  </tr>
  <tr> 
    <td width="50%" bgcolor="#FFFFFF"> <table width="100%" border="0">
        <tr> 
          <td width="12%" rowspan="6" bgcolor="dbeaf5"> <div align="center"><strong>��<br>
              ��<br>
              Ŀ<br>
              ��<br>
              ��</strong></div></td>
          <td width="16%" height="20"><div align="center"><strong>0</strong></div></td>
          <td width="72%">��Ŀ������Ϣ <font color="#666666">(��ĿID=��ĿID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>1</strong></div></td>
          <td>��Ŀ������� <font color="#666666">(��ĿID=��ĿID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>2</strong></div></td>
          <td>��Ŀ�Ƽ���Ϣ <font color="#666666">(��ĿID=��ĿID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>9</strong></div></td>
          <td>��Ŀ�������� <font color="#666666">(��ĿID=��ĿID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>12</strong></div></td>
          <td>��Ŀͷ����Ϣ <font color="#666666">(��ĿID=��ĿID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>15</strong></div></td>
          <td>��Ŀ�������� <font color="#666666">(��ĿID=��ĿID)</font></td>
        </tr>
      </table></td>
    <td bgcolor="#FFFFFF"> <table width="100%" border="0">
        <tr> 
          <td width="11%" rowspan="6" bgcolor="dbeaf5"> <div align="center"><strong>��<br>
              Ĭ<br>
              ��<br>
              ��<br>
              ��<br>
              ��</strong></div></td>
          <td width="16%" height="20"><div align="center"><strong>3</strong></div></td>
          <td width="73%">Ĭ�ϱ�������Ϣ <font color="#666666">(��ĿID=0)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>4</strong></div></td>
          <td>Ĭ�ϱ������� <font color="#666666">(��ĿID=0)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>5</strong></div></td>
          <td>Ĭ�ϱ��Ƽ���Ϣ <font color="#666666">(��ĿID=0)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>10</strong></div></td>
          <td>Ĭ�ϱ��������� <font color="#666666">(��ĿID=0)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>13</strong></div></td>
          <td>Ĭ�ϱ�ͷ����Ϣ <font color="#666666">(��ĿID=0)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>16</strong></div></td>
          <td>Ĭ�ϱ��������� <font color="#666666">(��ĿID=0)</font></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF"> <table width="100%" border="0">
        <tr> 
          <td width="12%" rowspan="6" bgcolor="dbeaf5"> <div align="center"><strong>��<br>
              ר<br>
              ��<br>
              ��<br>
              ��</strong></div></td>
          <td width="16%" height="20"><div align="center"><strong>6</strong></div></td>
          <td width="72%">ר��������Ϣ <font color="#666666">(��ĿID=ר��ID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>7</strong></div></td>
          <td>ר�������� <font color="#666666">(��ĿID=ר��ID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>8</strong></div></td>
          <td>ר���Ƽ���Ϣ <font color="#666666">(��ĿID=ר��ID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>11</strong></div></td>
          <td>ר���������� <font color="#666666">(��ĿID=ר��ID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>14</strong></div></td>
          <td>ר��ͷ����Ϣ <font color="#666666">(��ĿID=ר��ID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>17</strong></div></td>
          <td>ר���������� <font color="#666666">(��ĿID=ר��ID)</font></td>
        </tr>
      </table></td>
    <td bgcolor="#FFFFFF"> <table width="100%" border="0">
        <tr> 
          <td width="11%" rowspan="6" bgcolor="dbeaf5"> <div align="center"><strong>��<br>
              ��<br>
              ��<br>
              ��<br>
              ��<br>
              ��</strong></div></td>
          <td width="16%" height="20"><div align="center"><strong>18</strong></div></td>
          <td width="73%">����������Ϣ <font color="#666666">(��ĿID='����')</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>19</strong></div></td>
          <td>����������<font color="#666666"> (��ĿID='����')</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>20</strong></div></td>
          <td>�����Ƽ���Ϣ <font color="#666666">(��ĿID='����')</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>21</strong></div></td>
          <td>������������ <font color="#666666">(��ĿID='����')</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>22</strong></div></td>
          <td>����ͷ����Ϣ <font color="#666666">(��ĿID='����')</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>23</strong></div></td>
          <td>������������ <font color="#666666">(��ĿID='����')</font></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF"> <table width="100%" border="0">
        <tr> 
          <td width="12%" rowspan="6" bgcolor="dbeaf5"> <div align="center"><strong>��<br>
              ��<br>
              ��<br>
              ��<br>
              ��<br>
              ��<br>
              ��</strong></div></td>
          <td width="16%" height="20"><div align="center"><strong>25</strong></div></td>
          <td width="72%">�������������Ϣ <font color="#666666">(��ĿID=�������ID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>26</strong></div></td>
          <td>������������� <font color="#666666">(��ĿID=�������ID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>27</strong></div></td>
          <td>��������Ƽ���Ϣ <font color="#666666">(��ĿID=�������ID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>28</strong></div></td>
          <td>��������������� <font color="#666666">(��ĿID=�������ID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>29</strong></div></td>
          <td>�������ͷ����Ϣ <font color="#666666">(��ĿID=�������ID)</font></td>
        </tr>
        <tr> 
          <td height="20"><div align="center"><strong>30</strong></div></td>
          <td>��������������� <font color="#666666">(��ĿID=�������ID)</font></td>
        </tr>
      </table></td>
    <td bgcolor="#FFFFFF"> <table width="100%" border="0">
        <tr> 
          <td width="12%" rowspan="6" bgcolor="dbeaf5"> <div align="center"><strong>��<br>
              S<br>
              Q<br>
              L<br>
              ��<br>
              ��</strong></div></td>
          <td width="15%" height="20" rowspan="2"><div align="center"><strong>24</strong></div></td>
          <td width="73%" height="20">��sql��ѯ <font color="#666666">(��ĿID='sql���')</font></td>
        </tr>
        <tr> 
          <td height="20"><font color="#666666">���ݱ�ǰ׺���ã���[!db.pre!]&quot;��ʾ</font></td>
        </tr>
        <tr> 
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr> 
          <td height="20">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<br>
<?
$bqnav="";
while($r=$empire->fetch($sql))
{
	$bqnav.="<option value='".$r['bq']."'>".$r['bqname']."(".$r['bq'].")</option>";
?>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="<?=$r[bq]?>">
  <tr>
    <td class="header"> 
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr class="header">
          <td width="14%">��ǩ���ƣ�</td>
          <td width="86%"><b><?=$r[bqname]?>&nbsp;(<?=$r[bq]?>)</b></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="6%">��ʽ:</td>
          <td>
<input type=text name="text" size=80 value="<?=stripSlashes($r[bqgs])?>" style="width:100%"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
        <tr>
          <td>����˵����</td>
        </tr>
        <tr> 
          <td><?=stripSlashes($r[bqsay])?></td>
        </tr>
      </table></td>
  </tr>
</table>
<br>
<?
}
$bqnav="<select name='bq' id='bq' onchange=window.location='#'+this.options[this.selectedIndex].value><option value='' selected style='background:#99C4E3'>��ǩ����</option>".$bqnav."<option value='eloop'>�鶯��ǩ (e:loop)</option><option value='ShowMemberInfo'>��Ա��Ϣ���ú���</option><option value='ListMemberInfo'>��Ա�б���ú���</option><option value='spaceeloop'>��Ա�ռ���Ϣ��ǩ����</option><option value='resizeimg'>������ͼ����</option></select>";
?>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="eloop">
  <tr>
    <td class="header"> 
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr class="header">
          <td width="14%">��ǩ���ƣ�</td>
          <td width="86%"><b>�鶯��ǩ&nbsp;(e:loop)</b></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="6%">��ʽ:</td>
          <td width="86%"><textarea name="text" cols="80" rows="4" style="width:100%">[e:loop={��ĿID/ר��ID,��ʾ����,��������,ֻ��ʾ�б���ͼƬ,����SQL����,��ʾ����}]
ģ���������
[/e:loop]</textarea></td>
        </tr>
        <tr>
          <td>����:</td>
          <td><textarea name="textarea" cols="80" rows="9" style="width:100%">&lt;table width="100%" border="0" cellspacing="1" cellpadding="3"&gt;
[e:loop={��ĿID/ר��ID,��ʾ����,��������,ֻ��ʾ�б���ͼƬ,����SQL����,��ʾ����}]
&lt;tr&gt;&lt;td&gt;
&lt;a href="&lt;?=$bqsr[titleurl]?&gt;" target="_blank"&gt;&lt;?=$bqr[title]?&gt;&lt;/a&gt;
(&lt;?=date('Y-m-d',$bqr[newstime])?&gt;)
&lt;/td&gt;&lt;/tr&gt;
[/e:loop]
&lt;/table&gt;</textarea></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1">
        <tr> 
          <td height="23"><strong>��ǩ˵��</strong></td>
        </tr>
        <tr> 
          <td height="23">�鶯��ǩ����������ǩģ�壬��ģ������ΪPHP���룬�����������ʹ��php���д�������<font color="#666666">ʹ�ñ���ǩ���迪��ģ��֧�ֳ������(��������)��</font></td>
        </tr>
        <tr> 
          <td height="23"><strong>����</strong></td>
        </tr>
        <tr> 
          <td><table cellspacing="1" cellpadding="3" width="100%" bgcolor="#dbeaf5" border="0">
              <tbody>
                <tr> 
                  <td width="23%"> 
                    <div align="center">����</div></td>
                  <td>����˵��</td>
                </tr>
                <tr bgcolor="#ffffff"> 
                  <td height="25"><div align="center">��ĿID/ר��ID</div></td>
                  <td height="25">�鿴��ĿID��<a onclick="window.open('../ListClass.php');"><strong><u>����</u></strong></a>���鿴ר��ID��<a onclick="window.open('../ListZt.php');"><strong><u>����</u></strong></a>,��ǰID='selfinfo'<br />
                    �����ĿID��ר��ID����,�Ÿ񿪣���'1,2'</td>
                </tr>
                <tr bgcolor="#ffffff"> 
                  <td height="25"><div align="center">��ʾ����</div></td>
                  <td height="25">��ʾǰ������¼</td>
                </tr>
                <tr bgcolor="#ffffff"> 
                  <td height="25"><div align="center">��������</div></td>
                  <td height="25">���忴��������˵��</td>
                </tr>
                <tr bgcolor="#ffffff"> 
                  <td height="25"><div align="center">ֻ��ʾ�б���ͼƬ</div></td>
                  <td height="25">0Ϊ�����ƣ�1Ϊֻ��ʾ�б���ͼƬ����Ϣ</td>
                </tr>
				<tr bgcolor="#ffffff">
            		<td height="25">
            			<div align="center">����SQL����</div>
            		</td>
            		<td height="25">���ӵ����������磺&quot;title='�۹�'&quot;</td>
        		</tr>
        		<tr bgcolor="#ffffff">
            		<td height="25">
            			<div align="center">��ʾ����</div>
            		</td>
            		<td height="25">��ָ������Ӧ���ֶ������磺&quot;id desc&quot;</td>
        		</tr>
              </tbody>
            </table></td>
        </tr>
        <tr>
          <td><strong>����˵��</strong></td>
        </tr>
        <tr>
          <td height="139">
<table cellspacing="1" cellpadding="3" width="100%" bgcolor="#dbeaf5" border="0">
              <tbody>
                <tr> 
                  <td height="25"><div align="center">��������</div></td>
                  <td height="25">˵��</td>
                </tr>
                <tr> 
                  <td width="23%" height="25" bgcolor="#ffffff"> <div align="center">$bqr</div></td>
                  <td height="25" bgcolor="#ffffff">$bqr[�ֶ���]����ʾ�ֶε�����</td>
                </tr>
                <tr> 
                  <td height="25" bgcolor="#ffffff"> <div align="center">$bqsr</div></td>
                  <td height="25" bgcolor="#ffffff">$bqsr[titleurl]����������<br>
                    $bqsr[classname]����Ŀ����<br>
                    $bqsr[classurl]����Ŀ����</td>
                </tr>
                <tr> 
                  <td height="25" bgcolor="#ffffff"><div align="center">$bqno</div></td>
                  <td height="25" bgcolor="#ffffff">$bqno��Ϊ�������</td>
                </tr>
                <tr>
                  <td height="25" bgcolor="#ffffff"><div align="center">$public_r</div></td>
                  <td height="25" bgcolor="#ffffff">$public_r[newsurl]����վ��ַ</td>
                </tr>
              </tbody>
            </table></td>
        </tr>
        <tr> 
          <td><strong>���ú�������</strong></td>
        </tr>
        <tr> 
          <td>���ֽ�ȡ��<strong>esub(�ַ���,��ȡ����)</strong>�����ӣ�esub($bqr[title],30)��ȡ����ǰ30���ַ�<br>
            ʱ���ʽ��<strong>date('��ʽ�ִ�',ʱ���ֶ�)</strong>�����ӣ�date('Y-m-d',$bqr[newstime])ʱ����ʾ��ʽΪ&quot;2008-10-01&quot;</td>
        </tr>
      </table></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ShowMemberInfo">
  <tr>
    <td class="header"> 
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr class="header">
          <td width="14%">��ǩ���ƣ�</td>
          <td width="86%"><b>��Ա��Ϣ���ú���</b></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="6%">��ʽ:</td>
          <td>
<input type=text name="text" size=80 value="sys_ShowMemberInfo(�û�ID,��ѯ�ֶ�)" style="width:100%"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
        <tr> 
          <td>�û�ID������Ҫ���õĻ�Ա��Ϣ���û�ID������Ϣ����ҳ�µ��ÿ�������Ϊ0����ʾ������Ϣ�����ߵ����ϡ�<br>
            ��ѯ�ֶΣ�Ĭ��Ϊ��ѯ���л�Ա�ֶΣ��˲���һ�㲻�����ã����Ϊ��Ч�ʸ��߿���ָ����Ӧ���ֶΡ��磺��u.userid,ui.company��(uΪ����uiΪ����)��<br>
            <strong>ʹ�ý̳̣�</strong><a href="http://bbs.phome.net/showthread-13-108558-0.html" target="_blank">http://bbs.phome.net/showthread-13-108558-0.html</a></td>
        </tr>
      </table></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="ListMemberInfo">
  <tr>
    <td class="header"> 
      <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr class="header">
          <td width="14%">��ǩ���ƣ�</td>
          <td width="86%"><b>��Ա�б���ú���</b></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
<table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="6%">��ʽ:</td>
          <td>
<input type=text name="text" size=80 value="sys_ListMemberInfo(��������,��������,��Ա��ID,�û�ID,��ѯ�ֶ�)" style="width:100%"></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
        <tr> 
          <td>��������������ǰ������¼��<br>
            �������ͣ�0Ϊ��ע��ʱ�䡢1Ϊ���������С�2Ϊ���ʽ����С�3Ϊ����Ա�ռ���������<br>
            ��Ա��ID��ָ��Ҫ���õĻ�Ա��ID��������Ϊ���ޣ������Ա���ö��Ÿ������磺'1,2'<br>
            �û�ID��ָ��Ҫ���õĻ�ԱID��������Ϊ���ޣ�����û�ID�ö��Ÿ������磺'25,27'<br>
            ��ѯ�ֶΣ�Ĭ��Ϊ��ѯ���л�Ա�ֶΣ��˲���һ�㲻�����ã����Ϊ��Ч�ʸ��߿���ָ����Ӧ���ֶΡ��磺��u.userid,ui.company��(uΪ����uiΪ����)��<br>
            <strong>ʹ�ý̳̣�</strong><a href="http://bbs.phome.net/showthread-13-108558-0.html" target="_blank">http://bbs.phome.net/showthread-13-108558-0.html</a></td>
        </tr>
      </table></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="spaceeloop">
  <tr> 
    <td class="header"> <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr class="header"> 
          <td width="14%">��ǩ���ƣ�</td>
          <td width="86%"><b>��Ա�ռ���Ϣ��ǩ����</b></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="6%">��ʽ:</td>
          <td> <textarea name="textarea2" cols="80" rows="11" style="width:100%">&lt;?php
$spacesql=espace_eloop(��ĿID,��ʾ����,��������,ֻ��ʾ�б���ͼƬ,����SQL����,��ʾ����);
while($spacer=$empire->fetch($spacesql))
{
        $spacesr=espace_eloop_sp($spacer);
?&gt;
ģ���������
&lt;?
}
?&gt;</textarea></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF"> <table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
        <tr> 
          <td> <strong>ʹ�ý̳̣�</strong><a href="http://bbs.phome.net/showthread-13-109152-0.html" target="_blank">http://bbs.phome.net/showthread-13-109152-0.html</a></td>
        </tr>
      </table></td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder" id="resizeimg">
  <tr> 
    <td class="header"> <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr class="header"> 
          <td width="14%">��ǩ���ƣ�</td>
          <td width="86%"><b>������ͼ����</b></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td><table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="6%">��ʽ:</td>
          <td> <input type=text name="text2" size=80 value="sys_ResizeImg(ԭͼƬ,��ͼ���,��ͼ�߶�,�Ƿ����ͼƬ,Ŀ���ļ���)" style="width:100%"></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF"> <table width="100%" border="0" cellspacing="1" cellpadding="3">
        <tr> 
          <td width="6%">��ʽ:</td>
          <td> <textarea name="textarea2" cols="80" rows="5" style="width:100%">&lt;?php
$resizeimgurl=sys_ResizeImg($bqr[titlepic],170,120,1,'');
echo"&lt;img src='$resizeimgurl'&gt;";
?&gt;</textarea></td>
        </tr>
      </table> 
    </td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="98%" border="0" align="center" cellpadding="3" cellspacing="1">
        <tr> 
          <td>ԭͼƬ��Ҫ������ͼ��Դ�ļ���<br>
            ��ͼ��ȡ���ͼ�߶ȣ�������ͼ�Ĺ��<br>
            �Ƿ����ͼƬ����������ͼ�󳬳��������²��ò��巽ʽ��<br>
            Ŀ���ļ����������ʡ�ԣ��������Ŀ���ļ��������Ǵ��ļ�������ֹ�ظ�������ʱͼƬ�ļ���</td>
        </tr>
      </table></td>
  </tr>
</table>
<script>
document.getElementById("bqnav").innerHTML="<?=$bqnav?>";
</script>
</body>
</html>
<?
db_close();
$empire=null;
?>
