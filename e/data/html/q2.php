<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><script>
function AddFj(str)
{var r;
var a;
a=document.add.softfj.value;
r=a.split(str);
if(r.length!=1)
{return true;}
document.add.softfj.value+="/"+str;
}
function DelFj(str)
{
var a;
a=document.add.softfj.value;
document.add.softfj.value=a.replace("/"+str,"");
}
</script>
<table width=100% align=center cellpadding=3 cellspacing=1 class="tableborder">
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>�������(*)</td>
    <td bgcolor=ffffff><input name="title" type="text" size="42" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'title',stripSlashes($r[title]))?>"></td>
  </tr>
  <tr>
    <td width='16%' height=25 bgcolor='ffffff'>�ؼ���</td>
    <td bgcolor='ffffff'><input name="keyboard" type="text" size=42 value="<?=stripSlashes($r[keyboard])?>">
      <font color="#666666">(�������&quot;,&quot;����)</font></td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>���Ԥ��ͼ</td>
    <td bgcolor=ffffff>
<input type="file" name="titlepicfile" size="45">
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>�������</td>
    <td bgcolor=ffffff><input name="softwriter" type="text" size=42 id="softwriter" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'softwriter',stripSlashes($r[softwriter]))?>">
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>������ҳ</td>
    <td bgcolor=ffffff><input name="homepage" type="text" size=42 id="homepage" value="<?=$ecmsfirstpost==1?"http://":DoReqValue($mid,'homepage',stripSlashes($r[homepage]))?>">
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>ϵͳ��ʾ</td>
    <td bgcolor=ffffff><input name="demo" type="text" size=42 id="demo" value="<?=$ecmsfirstpost==1?"http://":DoReqValue($mid,'demo',stripSlashes($r[demo]))?>">
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>���л���</td>
    <td bgcolor=ffffff><input name="softfj" type="text" size=42 id="softfj" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'softfj',stripSlashes($r[softfj]))?>">
</td>
  </tr>
  <tr> 
    <td height=25 bgcolor=ffffff>&nbsp;</td>
    <td bgcolor=ffffff><input type=checkbox name=check value='Win9X/Me' onclick="if(this.checked){AddFj(this.value);}else{DelFj(this.value);}">
      Win9X/Me&nbsp; <input type=checkbox name=check value='WinNT/2000/XP' onclick="if(this.checked){AddFj(this.value);}else{DelFj(this.value);}">
      WinNT/2000/XP&nbsp; <input type=checkbox name=check value='Unix' onclick="if(this.checked){AddFj(this.value);}else{DelFj(this.value);}">
      Unix&nbsp; <input type=checkbox name=check value='Linux' onclick="if(this.checked){AddFj(this.value);}else{DelFj(this.value);}">
      Linux&nbsp; <input type=checkbox name=check value='DOS' onclick="if(this.checked){AddFj(this.value);}else{DelFj(this.value);}">
      DOS&nbsp; <input type=checkbox name=check value='MAC OS' onclick="if(this.checked){AddFj(this.value);}else{DelFj(this.value);}">
      MAC OS&nbsp; <input type=checkbox name=check value='Other' onclick="if(this.checked){AddFj(this.value);}else{DelFj(this.value);}">
      Other</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>�������</td>
    <td bgcolor=ffffff>������ԣ�<select name="language" id="language"><option value="��������"<?=$r[language]=="��������"?' selected':''?>>��������</option><option value="��������"<?=$r[language]=="��������"?' selected':''?>>��������</option><option value="Ӣ��"<?=$r[language]=="Ӣ��"?' selected':''?>>Ӣ��</option><option value="�������"<?=$r[language]=="�������"?' selected':''?>>�������</option></select>��������ͣ�<select name="softtype" id="softtype"><option value="�������"<?=$r[softtype]=="�������"?' selected':''?>>�������</option><option value="�������"<?=$r[softtype]=="�������"?' selected':''?>>�������</option><option value="�������"<?=$r[softtype]=="�������"?' selected':''?>>�������</option></select>����Ȩ��ʽ��<select name="softsq" id="softsq"><option value="�������"<?=$r[softsq]=="�������"?' selected':''?>>�������</option><option value="������"<?=$r[softsq]=="������"?' selected':''?>>������</option><option value="�������"<?=$r[softsq]=="�������"?' selected':''?>>�������</option><option value="�������"<?=$r[softsq]=="�������"?' selected':''?>>�������</option><option value="��ʾ���"<?=$r[softsq]=="��ʾ���"?' selected':''?>>��ʾ���</option><option value="��ҵ���"<?=$r[softsq]=="��ҵ���"?' selected':''?>>��ҵ���</option></select></td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>�ļ�</td>
    <td bgcolor=ffffff>�ļ����ͣ�<input name="filetype" type="text" size=10 id="filetype" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'filetype',stripSlashes($r[filetype]))?>">
<select name="select2" onchange="document.add.filetype.value=this.value">
        <option value="">����</option>
        <option value=".zip">.zip</option>
        <option value=".rar">.rar</option>
        <option value=".exe">.exe</option>
      </select>���ļ���С��<input name="filesize" type="text" size=10 id="filesize" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'filesize',stripSlashes($r[filesize]))?>">
<select name="select" onchange="document.add.filesize.value+=this.value">
        <option value="">��λ</option>
        <option value=" MB">MB</option>
        <option value=" KB">KB</option>
        <option value=" GB">GB</option>
        <option value=" BYTES">BYTES</option>
      </select></td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>�ϴ����(*)</td>
    <td bgcolor=ffffff><input type="file" name="downpathfile" size="45">
</td>
  </tr>
  <tr> 
    <td width=16% height=25 bgcolor=ffffff>������(*)</td>
    <td bgcolor=ffffff><textarea name="softsay" cols="60" rows="10" id="softsay"><?=$ecmsfirstpost==1?"":DoReqValue($mid,'softsay',stripSlashes($r[softsay]))?></textarea>
</td>
  </tr>
</table>