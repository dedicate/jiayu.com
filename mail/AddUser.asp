<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->

<%if reg="1" then%>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
	<title><%=eChSys%> - �������������</title>
	<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
	<link rel="stylesheet" type="text/css" href="site.css">
	</head>
	<body>
	<form align="center" method="post" name="FrmAddLink" LANGUAGE="javascript"  action="adduser1.asp">

			
			<table width="600" border="1" align="center" cellpadding="3" cellspacing="0" bordercolor="#FF6600" bgcolor="#FFFFFF" id="AutoNumber1" style="border-collapse: collapse">
			<TBODY>
				<TR>
				   <td  width="100%" height="25" align="center" class="TDtop">
                       �� <strong>�� �� �� �� �� �� ��</strong> ��</div></TD>
				</TR>
				<TR>
					<TD>
						<P> ��ӭ�����롾<%=eChSys%>������<%=eChSys%>��Ϊ���ŷ���ϵͳ��Ϊά�����Ϲ������������ȶ��������Ծ������������<br><br>
						һ���������ñ�վΣ�����Ұ�ȫ��й¶�������ܣ������ַ�������Ἧ��ĺ͹���ĺϷ�Ȩ�棬�������ñ�վ���������ƺʹ���������Ϣ�� <br><br>
						��һ��ɿ�����ܡ��ƻ��ܷ��ͷ��ɡ���������ʵʩ�ģ� <br>
						������ɿ���߸�������Ȩ���Ʒ���������ƶȵģ� <br>
						������ɿ�����ѹ��ҡ��ƻ�����ͳһ�ģ� <br>
						���ģ�ɿ�������ޡ��������ӣ��ƻ������Ž�ģ� <br>
						���壩�������������ʵ��ɢ��ҥ�ԣ������������ģ� <br>
						����������⽨���š����ࡢɫ�顢�Ĳ�����������ɱ���ֲ�����������ģ� <br>
						���ߣ���Ȼ�������˻���������ʵ�̰����˵ģ����߽����������⹥���ģ� <br>
						���ˣ��𺦹��һ��������ģ� <br>
						���ţ�����Υ���ܷ��ͷ�����������ģ� <br>
						��ʮ��������ҵ�����Ϊ�ġ� <br>
						<br>
						�����������أ����Լ������ۺ���Ϊ���� <br>
						</P>
					</TD>
				</TR>
				<TR>
					<TD  align="center" class="TDtop">
						<INPUT  type=submit value=��ͬ�� name=Submit>
						<INPUT  onclick="javascript:window.close();" type=button value=��ͬ�� name=Submit1>
				  </TD>
				</TR>
			</TBODY>
	  </TABLE>
	</form>
	</body>
	</html>
<%else%>
	<script language=javascript>
		alert("�Բ����û�ע�Ṧ���ѱ�����Ա�رգ�")
	</script>
	<body onLoad="javascript:window.close()"></body>
<%end if%>