<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$r=ReturnLeftLevel($loginlevel);
//�˵���ʾ
$showfastmenu=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsmenuclass where classtype=1 limit 1");//���ò˵�
$showextmenu=$empire->gettotal("select count(*) as total from {$dbtbpre}enewsmenuclass where classtype=3 limit 1");//��չ�˵�
//ͼƬʶ��
if(stristr($_SERVER['HTTP_USER_AGENT'],'MSIE 6.0'))
{
	$menufiletype='.gif';
}
else
{
	$menufiletype='.png';
}
?>
<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<TITLE>����������</TITLE>
<LINK href="adminstyle/1/adminmain.css" rel=stylesheet>
<STYLE>
.flyoutLink A {
	COLOR: black; TEXT-DECORATION: none
}
.flyoutLink A:hover {
	COLOR: black; TEXT-DECORATION: none
}
.flyoutLink A:visited {
	COLOR: black; TEXT-DECORATION: none
}
.flyoutLink A:active {
	COLOR: black; TEXT-DECORATION: none
}
.flyoutMenu {
	BACKGROUND-COLOR: #C9F1FF
}
.flyoutMenu TD.flyoutLink {
	BORDER-RIGHT: #C9F1FF 1px solid; BORDER-TOP: #C9F1FF 1px solid; BORDER-LEFT: #C9F1FF 1px solid; CURSOR: hand; PADDING-TOP: 1px; BORDER-BOTTOM: #C9F1FF 1px solid
}
.flyoutMenu1 {
	BACKGROUND-COLOR: #fbf9f9
}
.flyoutMenu1 TD.flyoutLink1 {
	BORDER-RIGHT: #fbf9f9 1px solid; BORDER-TOP: #fbf9f9 1px solid; BORDER-LEFT: #fbf9f9 1px solid; CURSOR: hand; PADDING-TOP: 1px; BORDER-BOTTOM: #fbf9f9 1px solid
}
</STYLE>
<SCRIPT>
function switchSysBar(){
	if(switchPoint.innerText==3)
	{
		switchPoint.innerText=4
		document.all("frmTitle").style.display="none"
	}
	else
	{
		switchPoint.innerText=3
		document.all("frmTitle").style.display=""
	}
}
function switchSysBarInfo(){
	switchPoint.innerText=3
	document.all("frmTitle").style.display=""
}

function about(){
	window.showModalDialog("adminstyle/1/page/about.htm","ABOUT","dialogwidth:300px;dialogheight:150px;center:yes;status:no;scroll:no;help:no");
}

function over(obj){
		if(obj.className=="flyoutLink")
		{
			obj.style.backgroundColor='#B5C4EC'
			obj.style.borderColor = '#380FA6'
		}
		else if(obj.className=="flyoutLink1")
		{
		    obj.style.backgroundColor='#B5C4EC'
			obj.style.borderColor = '#380FA6'				
		}
}
function out(obj){
		if(obj.className=="flyoutLink")
		{
			obj.style.backgroundColor='#C9F1FF'
			obj.style.borderColor = 'C9F1FF'
		}
		else if(obj.className=="#flyoutLink1")
		{
		    obj.style.backgroundColor='#FBF9F9'
			obj.style.borderColor = '#FBF9F9'				
		}
}

function show(d){
	if(obj=document.all(d))	obj.style.visibility="visible";

}
function hide(d){
	if(obj=document.all(d))	obj.style.visibility="hidden";
}

function JumpToLeftMenu(url){
	document.getElementById("left").src=url;
}
function JumpToMain(url){
	document.getElementById("main").src=url;
}
function DoOnclickMenu(m){
	if(m!='dosysmenu')
	{
		document.getElementById("dosysmenu").style.backgroundColor='';
	}
	else
	{
		document.getElementById("dosysmenu").style.backgroundColor='#8CBDEF';
	}
	if(m!='doinfomenu')
	{
		document.getElementById("doinfomenu").style.backgroundColor='';
	}
	else
	{
		document.getElementById("doinfomenu").style.backgroundColor='#8CBDEF';
	}
	if(m!='doclassmenu')
	{
		document.getElementById("doclassmenu").style.backgroundColor='';
	}
	else
	{
		document.getElementById("doclassmenu").style.backgroundColor='#8CBDEF';
	}
	if(m!='dotempmenu')
	{
		document.getElementById("dotempmenu").style.backgroundColor='';
	}
	else
	{
		document.getElementById("dotempmenu").style.backgroundColor='#8CBDEF';
	}
	if(m!='dousermenu')
	{
		document.getElementById("dousermenu").style.backgroundColor='';
	}
	else
	{
		document.getElementById("dousermenu").style.backgroundColor='#8CBDEF';
	}
	if(m!='dotoolmenu')
	{
		document.getElementById("dotoolmenu").style.backgroundColor='';
	}
	else
	{
		document.getElementById("dotoolmenu").style.backgroundColor='#8CBDEF';
	}
	if(m!='doextmenu')
	{
		document.getElementById("doextmenu").style.backgroundColor='';
	}
	else
	{
		document.getElementById("doextmenu").style.backgroundColor='#8CBDEF';
	}
	if(m!='doothermenu')
	{
		document.getElementById("doothermenu").style.backgroundColor='';
	}
	else
	{
		document.getElementById("doothermenu").style.backgroundColor='#8CBDEF';
	}
	if(m!='dofastmenu')
	{
		document.getElementById("dofastmenu").style.backgroundColor='';
	}
	else
	{
		document.getElementById("dofastmenu").style.backgroundColor='#8CBDEF';
	}
	document.menuform.onclickmenu.value=m;
}
</SCRIPT>
</HEAD>
<BODY bgColor="#C9F1FF" leftMargin=0 topMargin=0>
<TABLE width="100%" height="100%" border=0 cellpadding="0" cellSpacing=0>
<tr>
<td height="60">

  <TABLE width="100%" height="60" border=0 cellpadding="0" cellSpacing=0 background="adminstyle/1/images/topbg.gif">
  <form name="menuform" id="menuform">
    <TBODY>
	<input type="hidden" name="onclickmenu" value="">
      <TR> 
            <TD width="180"><div align="center"><a href="main.php" target="main" title="�۹���վ����ϵͳ"><img src="adminstyle/1/images/logo.gif" border="0"></a></div></TD>
		<TD height="60"> 
			<TABLE width="700" height="60" border=0 cellpadding="0" cellSpacing=0>
                <TBODY>
                  <TR align=middle> 
                    <TD width=60 onMouseOver="if(document.menuform.onclickmenu.value!='dosysmenu'){this.style.backgroundColor='#8CBDEF';}" onMouseOut="if(document.menuform.onclickmenu.value!='dosysmenu'){this.style.backgroundColor='';}" onClick="DoOnclickMenu('dosysmenu');JumpToLeftMenu('adminstyle/1/left.php?ecms=system');" style="CURSOR: hand" id="dosysmenu"> 
                      <table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr> 
                          <td><div align="center"><IMG height=32 src="adminstyle/1/images/system<?=$menufiletype?>" width=32 border=0 title="ϵͳ����"></div></td>
                        </tr>
                        <tr> 
                          <td height="20">
<div align="center"><font color="#FFFFFF"><strong>ϵͳ</strong></font></div></td>
                        </tr>
                      </table></TD>
                    <TD width=60 onMouseOut="if(document.menuform.onclickmenu.value!='doinfomenu'){this.style.backgroundColor='';}" onMouseOver="if(document.menuform.onclickmenu.value!='doinfomenu'){this.style.backgroundColor='#8CBDEF';}" onClick="DoOnclickMenu('doinfomenu');switchSysBarInfo();JumpToLeftMenu('ListEnews.php');" style="CURSOR: hand" id="doinfomenu"> 
                      <table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr> 
                          <td><div align="center"><IMG height=32 src="adminstyle/1/images/info<?=$menufiletype?>" width=32 border=0 title="��Ϣ����"></div></td>
                        </tr>
                        <tr> 
                          <td height="20">
<div align="center"><font color="#FFFFFF"><strong>��Ϣ</strong></font></div></td>
                        </tr>
                      </table></TD>
                    <TD width=60 onMouseOut="if(document.menuform.onclickmenu.value!='doclassmenu'){this.style.backgroundColor='';}" onMouseOver="if(document.menuform.onclickmenu.value!='doclassmenu'){this.style.backgroundColor='#8CBDEF';}" onClick="DoOnclickMenu('doclassmenu');JumpToLeftMenu('adminstyle/1/left.php?ecms=classdata');" style="CURSOR: hand" id="doclassmenu"> 
                      <table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr> 
                          <td><div align="center"><img height=32 src="adminstyle/1/images/class<?=$menufiletype?>" width=32 border=0 title="��Ŀ����"></div></td>
                        </tr>
                        <tr> 
                          <td height="20">
<div align="center"><font color="#FFFFFF"><strong>��Ŀ</strong></font></div></td>
                        </tr>
                      </table></TD>
                    <TD width=60 onMouseOut="if(document.menuform.onclickmenu.value!='dotempmenu'){this.style.backgroundColor='';}" onMouseOver="if(document.menuform.onclickmenu.value!='dotempmenu'){this.style.backgroundColor='#8CBDEF';}" onClick="DoOnclickMenu('dotempmenu');JumpToLeftMenu('adminstyle/1/left.php?ecms=template');" style="CURSOR: hand" id="dotempmenu"> 
                      <table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr> 
                          <td><div align="center"><img src="adminstyle/1/images/template<?=$menufiletype?>" width="32" height="32" border="0" title="ģ�����"></div></td>
                        </tr>
                        <tr> 
                          <td height="20">
<div align="center"><font color="#FFFFFF"><strong>ģ��</strong></font></div></td>
                        </tr>
                      </table></TD>
                    <TD width=60 onMouseOut="if(document.menuform.onclickmenu.value!='dousermenu'){this.style.backgroundColor='';}" onMouseOver="if(document.menuform.onclickmenu.value!='dousermenu'){this.style.backgroundColor='#8CBDEF';}" onClick="DoOnclickMenu('dousermenu');JumpToLeftMenu('adminstyle/1/left.php?ecms=usercp');" style="CURSOR: hand" id="dousermenu"> 
                      <table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr> 
                          <td><div align="center"><IMG height=32 src="adminstyle/1/images/usercp<?=$menufiletype?>" width=32 border=0 title="�û��ͻ�Ա"></div></td>
                        </tr>
                        <tr> 
                          <td height="20">
<div align="center"><font color="#FFFFFF"><strong>�û�</strong></font></div></td>
                        </tr>
                      </table></TD>
                    <TD width=60 onMouseOut="if(document.menuform.onclickmenu.value!='dotoolmenu'){this.style.backgroundColor='';}" onMouseOver="if(document.menuform.onclickmenu.value!='dotoolmenu'){this.style.backgroundColor='#8CBDEF';}" onClick="DoOnclickMenu('dotoolmenu');JumpToLeftMenu('adminstyle/1/left.php?ecms=tool');" style="CURSOR: hand" id="dotoolmenu"> 
                      <table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr> 
                          <td><div align="center"><IMG height=32 src="adminstyle/1/images/tool<?=$menufiletype?>" width=32 border=0 title="�������"></div></td>
                        </tr>
                        <tr> 
                          <td height="20">
<div align="center"><font color="#FFFFFF"><strong>���</strong></font></div></td>
                        </tr>
                      </table></TD>
                    <TD width=60 onMouseOut="if(document.menuform.onclickmenu.value!='doothermenu'){this.style.backgroundColor='';}" onMouseOver="if(document.menuform.onclickmenu.value!='doothermenu'){this.style.backgroundColor='#8CBDEF';}" onClick="DoOnclickMenu('doothermenu');JumpToLeftMenu('adminstyle/1/left.php?ecms=other');" style="CURSOR: hand" id="doothermenu"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr> 
                          <td><div align="center"><IMG height=32 src="adminstyle/1/images/other<?=$menufiletype?>" width=32 border=0 title="��������"></div></td>
                        </tr>
                        <tr> 
                          <td height="20">
<div align="center"><font color="#FFFFFF"><strong>����</strong></font></div></td>
                        </tr>
                      </table></TD>
					  <TD width=60 onMouseOut="if(document.menuform.onclickmenu.value!='doextmenu'){this.style.backgroundColor='';}" onMouseOver="if(document.menuform.onclickmenu.value!='doextmenu'){this.style.backgroundColor='#8CBDEF';}" onClick="DoOnclickMenu('doextmenu');JumpToLeftMenu('adminstyle/1/left.php?ecms=extend');" style="CURSOR:hand;<?=$showextmenu?'':'display:none'?>" id="doextmenu"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr> 
                          <td><div align="center"><IMG height=32 src="adminstyle/1/images/extend<?=$menufiletype?>" width=32 border=0 title="��չ�˵���"></div></td>
                        </tr>
                        <tr> 
                          <td height="20">
<div align="center"><font color="#FFFFFF"><strong>��չ</strong></font></div></td>
                        </tr>
                      </table> </TD>
                    <TD width=60 onMouseOut="if(document.menuform.onclickmenu.value!='dofastmenu'){this.style.backgroundColor='';}" onMouseOver="if(document.menuform.onclickmenu.value!='dofastmenu'){this.style.backgroundColor='#8CBDEF';}" onClick="DoOnclickMenu('dofastmenu');JumpToLeftMenu('adminstyle/1/left.php?ecms=fastmenu');" style="CURSOR:hand;<?=$showfastmenu?'':'display:none'?>" id="dofastmenu"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                        <tr> 
                          <td><div align="center"><IMG height=32 src="adminstyle/1/images/fastmenu<?=$menufiletype?>" width=32 border=0 title="���ò���"></div></td>
                        </tr>
                        <tr> 
                          <td height="20">
<div align="center"><font color="#FFFFFF"><strong>����</strong></font></div></td>
                        </tr>
                      </table></TD>
                    <TD width="301"><div align="right"><font color="#ffffff">�û���<a href="user/EditPassword.php" target="main"><font color="#ffffff"><b><?=$loginin?></b></font></a>&nbsp;&nbsp;&nbsp;[<a href="#ecms" onClick="if(confirm('ȷ��Ҫ�˳�?')){JumpToMain('ecmsadmin.php?enews=exit');}"><font color="#ffffff">�˳�</font></a>]&nbsp;&nbsp;</font></div></TD>
                  </TR>
                </TBODY>
              </TABLE>
        
      </TD>
      </TR>
    </TBODY>
	</form>
  </TABLE>

</td></tr>
<tr><td height="22">

  <TABLE width="100%" height="22" border=0 cellpadding="0" cellSpacing=0>
    <TBODY>
      <TR> 
        <TD class=flyoutMenu width="1%"> </TD>   
		    <TD width="99%" height="27"> 
              <TABLE class=flyoutMenu border=0>
                <TBODY>
                  <TR align=middle> 
                    <TD width="60" class="flyoutLink" onClick="JumpToMain('AddInfoChClass.php');" onMouseOver="over(this)" onMouseOut="out(this)">������Ϣ</TD>
                    <TD width="60" class="flyoutLink" onClick="JumpToMain('ListAllInfo.php');" onMouseOver="over(this)" onMouseOut="out(this)">������Ϣ</TD>
                    <TD width="60" class="flyoutLink" onClick="JumpToMain('ListAllInfo.php?showspecial=4&sear=1');" onMouseOver="over(this)" onMouseOut="out(this)">�����Ϣ</TD>
                    <TD width="60" class="flyoutLink" onClick="JumpToMain('workflow/ListWfInfo.php');" onMouseOver="over(this)" onMouseOut="out(this)">ǩ����Ϣ</TD>
					<?php
					if($r[dopl])
					{
					?>
                    <TD width="60" class="flyoutLink" onClick="JumpToMain('pl/ListAllPl.php');" onMouseOver="over(this)" onMouseOut="out(this)">��������</TD>
					<?php
					}
					?>
                    <TD width="60" class="flyoutLink" onClick="JumpToMain('sp/UpdateSp.php');" onMouseOver="over(this)" onMouseOut="out(this)">������Ƭ</TD>
					<?php
					if($r[dochangedata])
					{
					?>
                    <TD width="60" class="flyoutLink" onClick="JumpToMain('ReHtml/ChangeData.php');" onMouseOver="over(this)" onMouseOut="out(this)">���ݸ���</TD>
					<?php
					}
					?>
                    <TD width="60" class="flyoutLink" onClick="JumpToMain('infotop.php');" onMouseOver="over(this)" onMouseOut="out(this)">����ͳ��</TD>
                    <TD width="60" class="flyoutLink" onClick="JumpToMain('main.php');" onMouseOver="over(this)" onMouseOut="out(this)">��̨��ҳ</TD>
                    <TD width="60" class="flyoutLink" onClick="window.open('../../');" onMouseOver="over(this)" onMouseOut="out(this)">��վ��ҳ</TD>
                    <TD width="60" class="flyoutLink" onClick="window.open('map.php','','width=1250,height=620,scrollbars=auto,resizable=yes,top=190,left=120');" onMouseOver="over(this)" onMouseOut="out(this)">��̨��ͼ</TD>
                    <TD width="60" class="flyoutLink" onClick="window.open('http://bbs.phome.net/listthread-23-cms-page-0.html');" onMouseOver="over(this)" onMouseOut="out(this)">�汾����</TD>
                  </TR>
                </TBODY>
              </TABLE>
            </TD>
      </TR>
    </TBODY>
  </TABLE>

</td></tr>
<tr><td height="100%" bgcolor="#ffffff">

  <TABLE width="100%" height="100%" cellpadding="0" cellSpacing=0 border=0 borderColor="#ff0000">
  <TBODY>
    <TR> 
      <TD width="123" valign="top" bgcolor="#C9F1FF">
		<IFRAME frameBorder="0" id="dorepage" name="dorepage" scrolling="no" src="DoTimeRepage.php" style="HEIGHT:0;VISIBILITY:inherit;WIDTH:0;Z-INDEX:1"></IFRAME>
      </TD>
      <TD noWrap id="frmTitle">
		<IFRAME frameBorder="0" id="left" name="left" scrolling="auto" src="ListEnews.php" style="HEIGHT:100%;VISIBILITY:inherit;WIDTH:200px;Z-INDEX:2"></IFRAME>
      </TD>
      <TD>
		<TABLE border=0 cellPadding=0 cellSpacing=0 height="100%" bgcolor="#C9F1FF">
          <TBODY>
            <tr> 
              <TD onClick="switchSysBar()" style="HEIGHT:100%;"> <font style="COLOR:666666;CURSOR:hand;FONT-FAMILY:Webdings;FONT-SIZE:9pt;"> 
                <SPAN id="switchPoint" title="��/�ر���ߵ�����">3</SPAN></font> 
          </TBODY>
        </TABLE>
      </TD>
      <TD width="100%">
		<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" align="right" border=0>
          <TBODY>
            <TR> 
              <TD align=right>
				<IFRAME id="main" name="main" style="WIDTH: 100%; HEIGHT: 100%" src="main.php" frameBorder=0></IFRAME>
              </TD>
            </TR>
          </TBODY>
        </TABLE>
      </TD>
    </TR>
  </TBODY>
  </TABLE>

</td></tr>
</TABLE>

</BODY>
</HTML>