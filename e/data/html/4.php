<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><table width=100% align=center cellpadding=3 cellspacing=1 class=tableborder>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>��Ʒ��(*)</td>
    <td bgcolor=ffffff><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DBEAF5">
<tr> 
  <td height="25" bgcolor="#FFFFFF">
<?=$tts?"<select name='ttid'><option value='0'>�������</option>$tts</select>":""?>
	<input type=text name=title value="<?=htmlspecialchars(stripSlashes($r[title]))?>" size="60"> 
	<input type="button" name="button" value="ͼ��" onclick="document.add.title.value=document.add.title.value+'(ͼ��)';"> 
  </td>
</tr>
<tr> 
  <td height="25" bgcolor="#FFFFFF">����: 
	<input name="titlefont[b]" type="checkbox" value="b"<?=$titlefontb?>>����
	<input name="titlefont[i]" type="checkbox" value="i"<?=$titlefonti?>>б��
	<input name="titlefont[s]" type="checkbox" value="s"<?=$titlefonts?>>ɾ����
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��ɫ: <input name="titlecolor" type="text" value="<?=stripSlashes($r[titlecolor])?>" size="10"><a onclick="foreColor();"><img src="../data/images/color.gif" width="21" height="21" align="absbottom"></a>
  </td>
</tr>
</table></td>
  </tr>
  <tr>
    <td width='16%' height=25 bgcolor='ffffff'>��������</td>
    <td bgcolor='ffffff'><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DBEAF5">
  <tr>
    <td height="25" bgcolor="#FFFFFF">��Ϣ����: 
      <input name="checked" type="checkbox" value="1"<?=$r[checked]?' checked':''?>>
      ��� &nbsp;&nbsp; �Ƽ� 
      <select name="isgood" id="isgood">
        <option value="0"<?=$r[isgood]==0?' selected':''?>>���Ƽ�</option>
        <option value="1"<?=$r[isgood]==1?' selected':''?>>һ���Ƽ�</option>
        <option value="2"<?=$r[isgood]==2?' selected':''?>>�����Ƽ�</option>
        <option value="3"<?=$r[isgood]==3?' selected':''?>>�����Ƽ�</option>
        <option value="4"<?=$r[isgood]==4?' selected':''?>>�ļ��Ƽ�</option>
        <option value="5"<?=$r[isgood]==5?' selected':''?>>�弶�Ƽ�</option>
        <option value="6"<?=$r[isgood]==6?' selected':''?>>�����Ƽ�</option>
        <option value="7"<?=$r[isgood]==7?' selected':''?>>�߼��Ƽ�</option>
        <option value="8"<?=$r[isgood]==8?' selected':''?>>�˼��Ƽ�</option>
        <option value="9"<?=$r[isgood]==9?' selected':''?>>�ż��Ƽ�</option>
      </select>
      &nbsp;&nbsp; ͷ�� 
      <select name="firsttitle" id="firsttitle">
        <option value="0"<?=$r[firsttitle]==0?' selected':''?>>��ͷ��</option>
        <option value="1"<?=$r[firsttitle]==1?' selected':''?>>һ��ͷ��</option>
        <option value="2"<?=$r[firsttitle]==2?' selected':''?>>����ͷ��</option>
        <option value="3"<?=$r[firsttitle]==3?' selected':''?>>����ͷ��</option>
        <option value="4"<?=$r[firsttitle]==4?' selected':''?>>�ļ�ͷ��</option>
        <option value="5"<?=$r[firsttitle]==5?' selected':''?>>�弶ͷ��</option>
        <option value="6"<?=$r[firsttitle]==6?' selected':''?>>����ͷ��</option>
        <option value="7"<?=$r[firsttitle]==7?' selected':''?>>�߼�ͷ��</option>
        <option value="8"<?=$r[firsttitle]==8?' selected':''?>>�˼�ͷ��</option>
        <option value="9"<?=$r[firsttitle]==9?' selected':''?>>�ż�ͷ��</option>
      </select></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF">�ؼ���&nbsp;&nbsp;&nbsp;: 
      <input name="keyboard" type="text" size="52" value="<?=stripSlashes($r[keyboard])?>">
      <font color="#666666">(�������&quot;,&quot;����)</font></td>
  </tr>
  <tr> 
    <td height="25" bgcolor="#FFFFFF">�ⲿ����: 
      <input name="titleurl" type="text" value="<?=stripSlashes($r[titleurl])?>" size="52">
      <font color="#666666">(��д����Ϣ���ӵ�ַ��Ϊ������)</font></td>
  </tr>
</table>
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>����ʱ��</td>
    <td bgcolor=ffffff><input name="newstime" type="text" value="<?=$r[newstime]?>"><input type=button name=button value="��Ϊ��ǰʱ��" onclick="document.add.newstime.value='<?=$todaytime?>'"></td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>��ƷԤ��ͼ</td>
    <td bgcolor=ffffff>
<input name="titlepic" type="text" id="titlepic" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[titlepic]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic','','width=700,height=550,scrollbars=yes');" title="ѡ�����ϴ���ͼƬ"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>����</td>
    <td bgcolor=ffffff><input name="flashwriter" type="text" size=60 id="flashwriter" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[flashwriter]))?>">
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>��������</td>
    <td bgcolor=ffffff><input name="email" type="text" size=60 id="email" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[email]))?>">
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>��Ʒ����</td>
    <td bgcolor=ffffff><select name="star" id="star"><option value="1"<?=$r[star]=="1"?' selected':''?>>1��</option><option value="2"<?=$r[star]=="2"||$ecmsfirstpost==1?' selected':''?>>2��</option><option value="3"<?=$r[star]=="3"?' selected':''?>>3��</option><option value="4"<?=$r[star]=="4"?' selected':''?>>4��</option><option value="5"<?=$r[star]=="5"?' selected':''?>>5��</option></select></td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>�ļ���С</td>
    <td bgcolor=ffffff><input name="filesize" type="text" size=60 id="filesize" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[filesize]))?>">
<select name="select" onchange="document.add.filesize.value+=this.value">
        <option value="">��λ</option>
        <option value=" MB">MB</option>
        <option value=" KB">KB</option>
        <option value=" GB">GB</option>
        <option value=" BYTES">BYTES</option>
      </select></td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>Flash��ַ(*)</td>
    <td bgcolor=ffffff>
<input name="flashurl" type="text" id="flashurl" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[flashurl]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=2&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=flashurl','','width=700,height=550,scrollbars=yes');" title="ѡ�����ϴ���FLASH"><img src="../data/images/changeflash.gif" border="0" align="absbottom"></a> 
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>Flash���</td>
    <td bgcolor=ffffff><input name="width" type="text" size=6 id="width" value="<?=$ecmsfirstpost==1?"600":htmlspecialchars(stripSlashes($r[width]))?>">
*<input name="height" type="text" size=6 id="height" value="<?=$ecmsfirstpost==1?"450":htmlspecialchars(stripSlashes($r[height]))?>">
<font color="#666666">(����*�߶�)</font></td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>��Ʒ���(*)</td>
    <td bgcolor=ffffff><textarea name="flashsay" cols="80" rows="10" id="flashsay"><?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[flashsay]))?></textarea>
</td>
  </tr>
</table>