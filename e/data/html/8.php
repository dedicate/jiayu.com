<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><table width=100% align=center cellpadding=3 cellspacing=1 class="tableborder"><tr><td width=16% height=25 bgcolor=ffffff>����</td><td bgcolor=ffffff><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DBEAF5">
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
</table></td></tr><tr><td width=16% height=25 bgcolor=ffffff>��������</td><td bgcolor=ffffff><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DBEAF5">
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
</td></tr><tr><td width=16% height=25 bgcolor=ffffff>����ʱ��</td><td bgcolor=ffffff><input name="newstime" type="text" value="<?=$r[newstime]?>"><input type=button name=button value="��Ϊ��ǰʱ��" onclick="document.add.newstime.value='<?=$todaytime?>'"></td></tr><tr><td width=16% height=25 bgcolor=ffffff>��Ϣ����</td><td bgcolor=ffffff><textarea name="smalltext" cols="80" rows="10" id="smalltext"><?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[smalltext]))?></textarea>
</td></tr><tr><td width=16% height=25 bgcolor=ffffff>ͼƬ</td><td bgcolor=ffffff>
<input name="titlepic" type="text" id="titlepic" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[titlepic]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic','','width=700,height=550,scrollbars=yes');" title="ѡ�����ϴ���ͼƬ"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td width=16% height=25 bgcolor=ffffff>���ڵ�</td><td bgcolor=ffffff><select name="myarea" id="myarea" size=6 style="width=150"><option value="������"<?=$r[myarea]=="������"||$ecmsfirstpost==1?' selected':''?>>������</option><option value="������"<?=$r[myarea]=="������"?' selected':''?>>������</option><option value="������"<?=$r[myarea]=="������"?' selected':''?>>������</option><option value="������"<?=$r[myarea]=="������"?' selected':''?>>������</option><option value="������"<?=$r[myarea]=="������"?' selected':''?>>������</option><option value="������"<?=$r[myarea]=="������"?' selected':''?>>������</option><option value="��̨��"<?=$r[myarea]=="��̨��"?' selected':''?>>��̨��</option><option value="ʯ��ɽ��"<?=$r[myarea]=="ʯ��ɽ��"?' selected':''?>>ʯ��ɽ��</option><option value="ͨ����"<?=$r[myarea]=="ͨ����"?' selected':''?>>ͨ����</option><option value="��ƽ��"<?=$r[myarea]=="��ƽ��"?' selected':''?>>��ƽ��</option><option value="������"<?=$r[myarea]=="������"?' selected':''?>>������</option><option value="����"<?=$r[myarea]=="����"?' selected':''?>>����</option></select></td></tr><tr><td width=16% height=25 bgcolor=ffffff>��ϵ����</td><td bgcolor=ffffff><input name="email" type="text" id="email" value="<?=$ecmsfirstpost==1?$memberinfor[$user_email]:htmlspecialchars(stripSlashes($r[email]))?>" size="60">
</td></tr><tr><td width=16% height=25 bgcolor=ffffff>��ϵ��ʽ</td><td bgcolor=ffffff><input name="mycontact" type="text" size=60 id="mycontact" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[mycontact]))?>">
</td></tr><tr><td width=16% height=25 bgcolor=ffffff>��ϵ��ַ</td><td bgcolor=ffffff><input name="address" type="text" id="address" value="<?=$ecmsfirstpost==1?$memberinfor[address]:htmlspecialchars(stripSlashes($r[address]))?>" size="60">
</td></tr></table>