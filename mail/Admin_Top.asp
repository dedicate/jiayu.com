<!--#include file="Conn.ASP"-->
<!--#include file="ConnUser.asp"-->
<!--#include file="config.asp"-->
<!--#include file="char.inc"-->
<!--#include file="chkuser.asp" -->

<%dim jingyong
set rs=server.createobject("adodb.recordset")
sql="select * from "& db_User_Table &" where  "& db_User_Name &"='"&Request.cookies(eChsys)("username")&"'"
rs.open sql,ConnUser,1,3
if rs.bof or rs.eof then
	response.redirect "login.asp"
	response.end
end if'
jingyong=rs("jingyong")
rs.close
set rs=nothing

if Request.cookies(eChsys)("key")="super" or Request.cookies(eChsys)("key")="check"  or Request.cookies(eChsys)("key")="checkdep"  or Request.cookies(eChsys)("KEY")="bigmaster" or Request.cookies(eChsys)("KEY")="smallmaster" or Request.cookies(eChsys)("KEY")="typemaster" or (Request.cookies(eChsys)("key")="selfreg" and jingyong=0) then
%>

<HTML><HEAD><TITLE></TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content="MSHTML 6.00.3790.118" name=GENERATOR>
<LINK href=site.css rel=stylesheet>
<base target="main">
<script language="javascript">
<!--
var displayBar=true;
function switchBar(obj){
	if (displayBar)
	{
		parent.frame.cols="0,*";
		displayBar=false;
		obj.src="images/bar2.gif";
		obj.title="����߹���˵�";
	}
	else{
		parent.frame.cols="180,*";
		displayBar=true;
		obj.src="images/bar1.gif";
		obj.title="�ر���߹���˵�";
	}
}
//-->
</script>
<SCRIPT language=javascript>
function checkclick(msg){
	if(confirm(msg)){
		event.returnValue=true;
	}else{
		event.returnValue=false;
	}
}
</SCRIPT>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="100%" id="AutoNumber1">
<tr>
<td width="15%" background="images/admin_topbg.gif">
  </td>
<td width="2%" background="images/admin_topbg.gif"><img onClick="switchBar(this)" alt="�ر���߹���˵�" style="cursor:hand" src="Images/bar1.gif" width="15" height="15"></td>
<td width="55%" background="images/admin_topbg.gif"><table cellpadding=0 cellspacing=0 align=center width=100%>
  <tr>
    <td height=20 class="title">��ӭ���� <%=Request.cookies(eChsys)("UserName")%>
        <%if db_Birthday_Select="EChuang" then		'�Ա��ֶ���ԭE���ֶ�%>
        <%=Request.cookies(eChsys)("sex")%>
        <%else
				if db_Birthday_Select="Text" then		'�Ա��ֶ���BBS���ı��Ͱ���������
					if Request.cookies(eChsys)("sex")=1 then%>
      ��
      <%else
						if Request.cookies(eChsys)("sex")=0 then%>
      Ů
      <%else%>
      ����
      <%end if
					end if
				end if
			end if%>
      ����Ȩ�ޣ�
      <%if Request.cookies(eChsys)("KEY")="super" and Request.cookies(eChsys)("purview")="99999" then%>
      <font color="#990000">��������Ա</font>
      <%end if%>
      <%if Request.cookies(eChsys)("KEY")="super" and Request.cookies(eChsys)("purview")<>"99999" then%>
      <font color="#990000">ϵͳ����Ա</font>
      <%end if%>
      <%if Request.cookies(eChsys)("KEY")="check" then%>
      <font color="#990000">�������Ա</font>
      <%end if%>
      <%if Request.cookies(eChsys)("KEY")="selfreg" then%>
      <font color="#990000">ע���û�</font>
      <%end if%>
      <%if Request.cookies(eChsys)("KEY")="smallmaster" then%>
      <font color="#990000">С�����Ա</font>
      <%end if%>
      <%if Request.cookies(eChsys)("KEY")="bigmaster" then%>
      <font color="#990000">�������Ա</font>
      <%end if%>
      <%if Request.cookies(eChsys)("KEY")="typemaster" then%>
      <font color="#990000">��������Ա</font>
      <%end if%>
      ���ĵȼ���
      <%if Request.cookies(eChsys)("KEY")<>"selfreg" then%>
      <font color="#990000">�ڲ���Ա</font>
      <%end if%>
      <%if Request.cookies(eChsys)("KEY")="selfreg" and Request.cookies(eChsys)("reglevel")="1" then%>
      <font color="red">��ͨ</font>
      <%end if%>
      <%if Request.cookies(eChsys)("KEY")="selfreg" and Request.cookies(eChsys)("reglevel")="2" then%>
      <font color="red">�߼�</font>
      <%end if%>
      <%if Request.cookies(eChsys)("KEY")="selfreg" and Request.cookies(eChsys)("reglevel")="3" then%>
      <font color="red">�ؼ�</font>
      <%end if%>
      ��¼������<%=Request.cookies(eChsys)("UserLoginTimes")%><br>
    </td>
  </tr>
</table></td>

</tr>
</table>
</BODY>
</HTML>
<%else%>
	<script language=javascript>
		history.back()
		alert("�Բ��𣬹���Ա��δ��ͨ�����ʺţ����Ժ�")
	</script>
<%end if%>