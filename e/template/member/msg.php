<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<?php
$url="<a href=../../../>��ҳ</a>&nbsp;>&nbsp;<a href=../cp/>�������</a>&nbsp;>&nbsp;".$word."&nbsp;&nbsp;(<a href='AddMsg/?enews=AddMsg'>���Ͷ���Ϣ</a>)";
require(ECMS_PATH.'e/data/template/cp_1.php');
?>
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
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="15%" valign="top"> <table width="100%" border="0" cellpadding="3" cellspacing="1" class="tableborder">
        <tr class="header"> 
          <td height="23">����Ϣ����</td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../msg/">�ռ���</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="../msg/?out=1">������</a></td>
        </tr>
        <tr> 
          <td height="23" bgcolor="#FFFFFF"><img src="../../data/images/msgnav.gif" width="5" height="5">&nbsp;<a href="AddMsg/?enews=AddMsg">������Ϣ</a></td>
        </tr>
      </table>
      
    </td>
    <td width="1%" valign="top">&nbsp;</td>
    <td width="84%" valign="top"> <div align="center"> 
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" class="tableborder">
          <form name="listmsg" method="post" action="../../enews/index.php" onsubmit="return confirm('ȷ��Ҫɾ��?');">
            <tr class="header"> 
              <td width="4%" height="23"> <div align="center"></div></td>
              <td width="45%"><div align="center">����</div></td>
              <td width="18%"><div align="center">������</div></td>
              <td width="23%"><div align="center">����ʱ��</div></td>
              <td width="10%"><div align="center">����</div></td>
            </tr>
            <?php
			while($r=$empire->fetch($sql))
			{
				$img="haveread";
				if(!$r[haveread])
				{$img="nohaveread";}
				$from_username="<a href='../ShowInfo/?userid=".$r[from_userid]."' target=_blank>".$r[from_username]."</a>";
				//ϵͳ��Ϣ
				if($r['issys'])
				{
					$from_username="<b>ϵͳ��Ϣ</b>";
					$r[title]="<b>".$r[title]."</b>";
				}
			?>
            <tr bgcolor="#FFFFFF"> 
              <td height="25"> <div align="center"> 
                  <input name="mid[]" type="checkbox" id="mid[]2" value="<?=$r[mid]?>">
                </div></td>
              <td> <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="9%"><div align="center"><img src="../../data/images/<?=$img?>.gif" border=0></div></td>
                    <td width="91%"><a href="<?=$titleurl?>mid=<?=$r[mid]?>&out=<?=$out?>"> 
                      <?=stripSlashes($r[title])?>
                      </a></td>
                  </tr>
                </table></td>
              <td><div align="center"> 
                  <?=$from_username?>
                </div></td>
              <td><div align="center"> 
                  <?=$r[msgtime]?>
                </div></td>
              <td> <div align="center">&nbsp;[<a href="../../enews/?enews=DelMsg&mid=<?=$r[mid]?>&out=<?=$out?>" onclick="return confirm('ȷ��Ҫɾ��?');">ɾ��</a>]</div></td>
            </tr>
            <?php
			}
			?>
            <tr bgcolor="#FFFFFF"> 
              <td><div align="center"> 
                  <input type=checkbox name=chkall value=on onclick=CheckAll(this.form)>
                </div></td>
              <td colspan="4"><input type="submit" name="Submit2" value="ɾ��ѡ��"> 
                <input name="enews" type="hidden" value="DelMsg_all"> <input name="out" type="hidden" id="out" value="<?=$out?>"> 
              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td><div align="center"></div></td>
              <td colspan="4"> 
                <?=$returnpage?>
              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="23" colspan="5"><div align="center">˵����<img src="../../data/images/nohaveread.gif" width="14" height="11"> 
                  ����δ�Ķ���Ϣ��<img src="../../data/images/haveread.gif" width="15" height="12"> 
                  �������Ķ���Ϣ.</div></td>
            </tr>
          </form>
        </table>
      </div></td>
  </tr>
</table>
<?php
require(ECMS_PATH.'e/data/template/cp_2.php');
?>