<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><tr><td bgcolor=ffffff>��Ʒ����</td><td bgcolor=ffffff><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#DBEAF5">
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
</table></td></tr><tr><td bgcolor=ffffff>����ʱ��</td><td bgcolor=ffffff><input name="newstime" type="text" value="<?=$r[newstime]?>"><input type=button name=button value="��Ϊ��ǰʱ��" onclick="document.add.newstime.value='<?=$todaytime?>'"></td></tr><tr><td bgcolor=ffffff>��Ʒ���</td><td bgcolor=ffffff><input name="productno" type="text" size=60 id="productno" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[productno]))?>">
</td></tr><tr><td bgcolor=ffffff>Ʒ��</td><td bgcolor=ffffff><input name="pbrand" type="text" size=60 id="pbrand" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[pbrand]))?>">
</td></tr><tr><td bgcolor=ffffff>������</td><td bgcolor=ffffff><textarea name="intro" cols="80" rows="10" id="intro"><?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[intro]))?></textarea>
</td></tr><tr><td bgcolor=ffffff>������λ</td><td bgcolor=ffffff><input name="unit" type="text" size=60 id="unit" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[unit]))?>">
</td></tr><tr><td bgcolor=ffffff>��λ����</td><td bgcolor=ffffff><input name="weight" type="text" size=60 id="weight" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[weight]))?>">
</td></tr><tr><td bgcolor=ffffff>�г��۸�</td><td bgcolor=ffffff><input name="tprice" type="text" size=60 id="tprice" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[tprice]))?>">
</td></tr><tr><td bgcolor=ffffff>����۸�</td><td bgcolor=ffffff><input name="price" type="text" size=60 id="price" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[price]))?>">
</td></tr><tr><td bgcolor=ffffff>���ֹ���</td><td bgcolor=ffffff><input name="buyfen" type="text" size=60 id="buyfen" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[buyfen]))?>">
</td></tr><tr><td bgcolor=ffffff>���</td><td bgcolor=ffffff><input name="pmaxnum" type="text" size=60 id="pmaxnum" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[pmaxnum]))?>">
</td></tr><tr><td bgcolor=ffffff>��Ʒ����Ƭ</td><td bgcolor=ffffff>
<input name="titlepic" type="text" id="titlepic" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[titlepic]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=titlepic','','width=700,height=550,scrollbars=yes');" title="ѡ�����ϴ���ͼƬ"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td bgcolor=ffffff>��Ʒ��ͼ</td><td bgcolor=ffffff>
<input name="productpic" type="text" id="productpic" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($r[productpic]))?>" size="45">
<a onclick="window.open('ecmseditor/FileMain.php?type=1&classid=<?=$classid?>&filepass=<?=$filepass?>&doing=1&field=productpic','','width=700,height=550,scrollbars=yes');" title="ѡ�����ϴ���ͼƬ"><img src="../data/images/changeimg.gif" border="0" align="absbottom"></a> 
</td></tr><tr><td bgcolor=ffffff>��Ʒ����</td><td bgcolor=ffffff><?=ECMS_ShowEditorVar("newstext",$ecmsfirstpost==1?"":stripSlashes($r[newstext]),"Default","","300","100%")?>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#DBEAF5">
          <tr> 
            <td bgcolor="#FFFFFF"> <input name="dokey" type="checkbox" value="1"<?=$r[dokey]==1?' checked':''?>>
              �ؼ����滻&nbsp;&nbsp; <input name="copyimg" type="checkbox" id="copyimg" value="1">
      Զ�̱���ͼƬ(
      <input name="mark" type="checkbox" id="mark" value="1">
      <a href="SetEnews.php" target="_blank">��ˮӡ</a>)&nbsp;&nbsp; 
      <input name="copyflash" type="checkbox" id="copyflash" value="1">
      Զ�̱���FLASH(��ַǰ׺�� 
      <input name="qz_url" type="text" id="qz_url" size="">
              )</td>
          </tr>
          <tr>
            
    <td bgcolor="#FFFFFF"><input name="repimgnexturl" type="checkbox" id="repimgnexturl" value="1"> ͼƬ����תΪ��һҳ&nbsp;&nbsp; <input name="autopage" type="checkbox" id="autopage" value="1">�Զ���ҳ 
      ,ÿ 
      <input name="autosize" type="text" id="autosize" value="5000" size="5">
      ���ֽ�Ϊһҳ&nbsp;&nbsp; ȡ�� 
      <input name="getfirsttitlepic" type="text" id="getfirsttitlepic" value="" size="1">
      ���ϴ�ͼΪ����ͼƬ( 
      <input name="getfirsttitlespic" type="checkbox" id="getfirsttitlespic" value="1">
      ����ͼ: �� 
      <input name="getfirsttitlespicw" type="text" id="getfirsttitlespicw" size="3" value="<?=$public_r[spicwidth]?>">
      *��
      <input name="getfirsttitlespich" type="text" id="getfirsttitlespich" size="3" value="<?=$public_r[spicheight]?>">
      )</td>
          </tr>
        </table>
</td></tr>