<%
starttime=timer()

DbType = "ACCESS" '����MSSQL���ݿ�
'DbType = "MYSQL" '����MYSQL���ݿ�
'DbType = "ACCESS" '����ACCESS���ݿ�

if DbType="ACCESS" then
	DB = "../mail/DataBase/@#@#@#jyzwwxzxx@@110816.asp"
	ConnStr = "Provider = Microsoft.Jet.OLEDB.4.0;Data Source = " & Server.MapPath(db)
end if

if DbType="MSSQL" then
	ConnStr = "driver={SQL Server};server=127.0.0.1;uid=sa;pwd=;database=GovSQL6017"
end if

if DbType="MYSQL" then
	ConnStr = "driver=MySQL;server=SERVER_NAME;uid=UID;pwd=PWD;database=DB_NAME"
end if


On Error Resume Next
Set conn = Server.CreateObject("ADODB.Connection")
conn.open ConnStr

If Err Then
	err.Clear
	Set Conn = Nothing
	Response.Write "���ݿ����ӳ���[���룺01]���������ݿ������ļ��е������ִ���"
	Response.End
End If
%>