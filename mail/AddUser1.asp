<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->

<%if reg="1" then%>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<title><%=eChSys%> - ��Աע��</title>
	<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
	<link rel="stylesheet" type="text/css" href="site.css">
	<script LANGUAGE="javascript">
	<!--
	function FrmAddLink_onsubmit() {
	var i, n;
	if (document.FrmAddLink.username.value=="")
		{
		  alert("�Բ��������������û�����")
		  document.FrmAddLink.username.focus()
		  return false
		 }
	else if (document.FrmAddLink.username.value.length < 2)
		{
		  alert("�����û����ܲ��ܳ�һ�㣡")
		  document.FrmAddLink.username.focus()
		  return false
		 }
	else if (document.FrmAddLink.username.value.length > 30)
		{
		  alert("�����û���̫���˰ɣ�")
		  document.FrmAddLink.username.focus()
		  return false
		 }
	else if (document.FrmAddLink.username.value.indexOf('`') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('~') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('!') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('@') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('#') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('$') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('%') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('^') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('&') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('*') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('(') >= 0 ||
	          document.FrmAddLink.username.value.indexOf(')') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('+') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('{') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('}') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('|') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('[') >= 0 ||
	          document.FrmAddLink.username.value.indexOf(']') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('\\') >= 0 ||
	          document.FrmAddLink.username.value.indexOf(';') >= 0 ||
	          document.FrmAddLink.username.value.indexOf(':') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('>') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('<') >= 0 ||
	          document.FrmAddLink.username.value.indexOf(',') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('?') >= 0 ||
	          document.FrmAddLink.username.value.indexOf('/') >= 0 || 
	          document.FrmAddLink.username.value.indexOf('\'') >= 0 || 
	          document.FrmAddLink.username.value.indexOf('"') >= 0 || 
	          document.FrmAddLink.username.value.indexOf(' ') >= 0 || 
	          document.FrmAddLink.username.value.indexOf('=') >= 0 || 
	          document.FrmAddLink.username.value.indexOf('%') >= 0
	         )  
	          {
	            alert("�û����а�����Ч�ַ���������ѡ���û�����"); 
	            document.FrmAddLink.username.focus();
	            return false;
	          }
	else if (document.FrmAddLink.passwd.value=="")
		{
		  alert("�Բ��������������룡")
		  document.FrmAddLink.passwd.focus()
		  return false
		 }
	else if (document.FrmAddLink.passwd.value.length < 4)
		{
		  alert("Ϊ�˰�ȫ����������Ӧ�ó�һ�㣡")
		  document.FrmAddLink.passwd.focus()
		  return false
		 }
	else if (document.FrmAddLink.passwd.value.length > 16)
		{
		  alert("��������̫���˰ɣ�")
		  document.FrmAddLink.passwd.focus()
		  return false
		 }
	else if (document.FrmAddLink.username.value==document.FrmAddLink.passwd.value)
		{
		  alert("Ϊ�˰�ȫ���û��������벻Ӧ����ͬ��")
		  document.FrmAddLink.passwd.focus()
		  return false
		 }
	else if (document.FrmAddLink.passwd2.value=="")
		{
		  alert("�Բ�������������֤���룡")
		  document.FrmAddLink.passwd2.focus()
		  return false
		 }
	else if (document.FrmAddLink.passwd2.value !== document.FrmAddLink.passwd.value)
		{
		  alert("�Բ�����������������벻һ�£�")
		  document.FrmAddLink.passwd2.focus()
		  return false
		 }
	else if (document.FrmAddLink.question.value=="")
		{
		  alert("�Բ�������������ʾ���⣡")
		  document.FrmAddLink.question.focus()
		  return false
		 }
	else if (document.FrmAddLink.answer.value=="")
		{
		  alert("�Բ���������������𰸣�")
		  document.FrmAddLink.answer.focus()
		  return false
		 }
	else if (document.FrmAddLink.question.value==document.FrmAddLink.answer.value)
		{
		  alert("Ϊ�˰�ȫ����ʾ����������𰸲�Ӧ����ͬ��")
		  document.FrmAddLink.answer.focus()
		  return false
		 }
	else if (document.FrmAddLink.fullname.value=="")
		{
		  alert("�Բ���������������ʵ������")
		  document.FrmAddLink.fullname.focus()
		  return false
		 }
	else if (document.FrmAddLink.depid.value=="")
		{
		  alert("�Բ�����ѡ�����Ĺ�����λ��")
		  document.FrmAddLink.depid.focus()
		  return false
		 }
	else if (document.FrmAddLink.sex.value=="")
		{
		  alert("�Բ�����ѡ�������Ա�")
		  document.FrmAddLink.sex.focus()
		  return false
		 }
	else if (document.FrmAddLink.tel.value=="")
		{
		  alert("�Բ���������������ϵ�绰��")
		  document.FrmAddLink.tel.focus()
		  return false
		 }
	else if (document.FrmAddLink.email.value=="")
		{
		  alert("�Բ������������ĵ����ʼ���")
		  document.FrmAddLink.email.focus()
		  return false
		 }
	else if (document.FrmAddLink.email.value.indexOf("@",0)== -1||document.FrmAddLink.email.value.indexOf(".",0)==-1)
		  {
		  alert("�Բ���������ĵ����ʼ�����")
		  document.FrmAddLink.email.focus()
		  return false
		 }
	}
	
	//Function to open pop up window
	function openWin(theURL,winName,features) {
	  	window.open(theURL,winName,features);
	}
	//-->
	</script>
	
	<//����ѡ�����ڴ���ʼ>
<SCRIPT language=JavaScript src="inc/User_Info_Modify.js"></SCRIPT>
	<//����ѡ�����ڴ������>
	</head>
	<body topmargin="0">
	<form align="center" method="post" name="FrmAddLink" LANGUAGE="javascript" onSubmit="return FrmAddLink_onsubmit()" action="saveuser.asp">
  <table width="600" border="1" align=center cellpadding="3" cellspacing="0" bordercolor="#FF6600" bgcolor="#FFFFFF">
    <tr> 
      <td height="25" colspan="2" align="center" valign="middle" class="TDtop"><span class="smallFont">��<strong> �� Ա ע �� </strong>��</span></td>
    </tr>
    <tr> 
      <td height="20" colspan="2" align="center" valign="middle">Ϊ��ʹ��������ʹ�ñ�ϵͳ������ϸ��дÿһ������</td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right" valign="middle"> <div align="center"><span class="smallFont">�� 
          �� ����</span></div></td>
      <td width="264" height="20">        <input name="username" size="26" class="smallInput" maxlength="30" style="font-family: ����; font-size: 9pt" title="����������д�����û�����ע��ɹ����ô��û�����¼��ϵͳ��">
      </td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">��&nbsp;&nbsp;&nbsp;�룺</span></div></td>
      <td width="264" height="20">        <input name="passwd" size="26" class="smallInput" maxlength="15" style="font-family: ����; font-size: 9pt" type="password"  title="����������д���ĵ�¼���룬�ڵ�¼ʱ��ϵͳ����֤�������롣">
      </td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">��֤���룺</span></div></td>
      <td width="264" height="20">        <input name="passwd2" size="26" class="smallInput" maxlength="15" style="font-family: ����; font-size: 9pt" type="password" title="����������д������֤���룬���������������һ�£���Ҫ�Ƿ�ֹ���Ĵ������롣">
      </td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">��ʾ���⣺</span></div></td>
      <td width="264" height="20">        <input name="question" size="26" class="smallInput" maxlength="50" style="font-family: ����; font-size: 9pt" type="text" title="����������д������ʾ���⣬��������������룬�������ô˹������һ��������롣">
      </td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">����𰸣�</span></div></td>
      <td width="264" height="20">        <input name="answer" size="26" class="smallInput" maxlength="50" style="font-family: ����; font-size: 9pt" type="text" title="����������д������ʾ����Ĵ𰸣���������������룬�������ô˹������һ��������롣">
      </td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">��ʵ������</span></div></td>
      <td width="264" height="20">        <input name="fullname" size="26" class="smallInput" maxlength="10" style="font-family: ����; font-size: 9pt" title="����������д������ʵ������">
      </td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">������λ��</span></div></td>
      <td width="264" height="20"> 
        <%set rstype=createobject("adodb.recordset")
					sql="select * from "& db_EC_Dep_Table &" order by id"
					rstype.Open sql,conn,1,3%>
        <select name="depid" style="font-family: ����; font-size: 9pt" title="��������ѡ�����Ĺ�����λ��">
          <option value="">��ѡ������λ</option>
          <%do while not rstype.EOF%>
          <option value="<%=rstype("id")%>"><%=rstype("E_DepName")%>==<%=rstype("E_DepType")%></option>
          <%rstype.MoveNext
					loop
					set rstype=nothing%>
        </select> </td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">��&nbsp;&nbsp;&nbsp; 
          ��</span></div></td>
      <td width="264" height="20"> <select size="1" name="sex" style="font-family: ����; font-size: 9pt" title="����������д�����Ա�">
          <option selected value="">��ѡ���Ա�</option>
          <%if db_Sex_Select = "EChuang" then%>
          <option value="����">����</option>
          <option value="Ůʿ">Ůʿ</option>
          <option value="����">����</option>
          <%else%>
          <%if db_Sex_Select = "Number" then%>
          <option value="1">����</option>
          <option value="0">Ůʿ</option>
          <%end if%>
          <%end if%>
        </select> </td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">��&nbsp;&nbsp;&nbsp;�գ�</span></div></td>
      <td width="264" height="40"> 
        <%if db_Birthday_Select = "EChuang" then%>
 
        <select size="1" name="birthyear" style="font-family: ����; font-size: 9pt">
          <%for i=1950 to 2004%>
          <option value="<%=i%>"><%=i%></option>
          <%next%>
        </select>
        �� 
        <select size="1" name="birthmonth" style="font-family: ����; font-size: 9pt">
          <%for i=1 to 12%>
          <option value="<%=i%>"><%=i%></option>
          <%next%>
        </select>
        �� 
        <select size="1" name="birthday" style="font-family: ����; font-size: 9pt">
          <%for i=1 to 31%>
          <option value="<%=i%>"><%=i%></option>
          <%next%>
        </select>
        �� 
        <%else%>
        <%if db_Birthday_Select = "Text" then%>
        <INPUT  name=birthday onFocus="show_cele_date(birthday,'','',birthday)" value="<%=year(now())-18%>-<%=month(now())%>-<%=day(now())%>" >
        <%end if%>
        <%end if%>
      </td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">��ϵ�绰��</span></div></td>
      <td width="264" height="20" valign="middle"> <input name="tel" size="26" class="smallInput" maxlength="100" style="font-family: ����; font-size: 9pt" title="����������д������ϵ�绰���Ա�����������ϵ��"></td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">�����ʼ���</span></div></td>
      <td width="264" height="20" valign="middle"> <input name="email" size="26" class="smallInput" maxlength="100" style="font-family: ����; font-size: 9pt" title="����������д���ĵ����ʼ���ַ��"></td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">������Ƭ��</span></div></td>
      <td width="264" height="20" valign="middle"> 
        <%dim i  
        if UserTableType = "Dvbbs"	then ''��ʾ�û�ͷ�񣬼�'bbs/'ǰ׺·��,ʹͼ��ϵͳֱ����ʾ������̳ͷ��%>
        bbs/ <input id="photo" name="photo" value="<%=replace(BbsUserFace,"{$i}","1")%>" onChange="document.all.imag.src=this.value" size="26" class="smallInput" maxlength="255" style="font-family: ����; font-size: 9pt" title="����ͷ��Ҳ����ֱ����������������Ƭ�ĵ�ַ�����http://����"> 
				<select onChange="var bbspath='<%=BbsPath%>';document.all.imag.src=bbspath+options[selectedIndex].value;document.all.photo.value=options[selectedIndex].value;" >
					<%
					BbsUserFaceMax="60"			'�û�ͷ���ļ�{$i}ֵ��ȡ�����ֵ
					FaceDefault = "Images/userface/image1.gif"	'�û�ע�ᣨE��ͼ�ĲࣩĬ��ͷ���ļ�������� BbsPath ·����
					BbsUserFace = "Images/userface/image{$i}.gif" %>
					<option select value="<%=FaceDefault%>">Ĭ��</option> 
					<%for i=1 to BbsUserFaceMax
						%> 
					<option select value="<%=replace(BbsUserFace,"{$i}",i)%>">ͷ��<%=i%></option> 
					<%next%> 
				</select>
        <p align=center><img src="<%=BbsPath%>Images/userface/image1.gif" name="imag" border="0" onload="javascript:if(this.width>screen.width-550)this.width=screen.width-550">
        </P>
        <%else%>
        <input id="photo" name="photo" value="images/nopic.gif" onChange="document.all.imag.src=this.value" size="26" class="smallInput" maxlength="255" style="font-family: ����; font-size: 9pt" title="������Ƭ���������ϴ��Լ�����Ƭ��Ҳ����ֱ����д����������Ƭ�ĵ�ַ��"> 
				<select onChange="document.all.imag.src=options[selectedIndex].value;document.all.photo.value=options[selectedIndex].value" >
					<option select value="images/nopic.gif">Ĭ��</option> 
					<%
					for i=1 to 35
						%> 
					<option select value="images/Image<%=I%>.gif">ͷ��<%=I%></option> 
					<%next%> 
				</select>
        <p align=center><img src="images/nopic.gif" name="imag" border="0" onload="javascript:if(this.width>screen.width-550)this.width=screen.width-550">
        </P>
        <%end if%>
      </td>
    </tr>
    <tr> 
      <td width="81" height="20" align="right"> <div align="center"><span class="smallFont">���ҽ��ܣ�</span></div></td>
      <td width="264" height="32" valign="middle"> <textarea rows="5" name="content" cols="29" style="font-family: ����; font-size: 9pt" title="����������д���ĸ��˽��ܡ�"></textarea> 
      </td>
    </tr>
  </table>
		<div align="center">
				<br>
					<input type="submit" value=" ȷ �� " name="cmdOk" class="buttonface" style="font-family: ����; font-size: 9pt;">
					&nbsp; 
					<input type="reset" value=" �� �� " name="cmdReset" class="buttonface" style="font-family: ����; font-size: 9pt;" >
		</div>
	</form>
	</body>
	</html>
<%else%>
	<script language=javascript>
	alert("�Բ����û�ע�Ṧ���ѱ�����Ա�رգ�")
	</script>
	<body onLoad="javascript:window.close()"></body>
<%end if%>