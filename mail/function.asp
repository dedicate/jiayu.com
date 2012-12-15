<!--#include file="conn.asp"-->
<!--#include file="ConnUser.asp"-->
<%
    '****************************************************************************
    '' @����˵��: �������ṩ��classidֵ��newsid�����ҷ�����������ͬ���µ��뵱ǰ��
	''            ���������µ�newsid
    '' @����˵��:  fx>0 ������һ�������������һ��
    '' @����ֵ:   NewsID���Ҳ�����ռ�¼Ϊ0
    '****************************************************************************
Function getSideNewsID(ClassId, NewsId, FX)
    Set rs = server.CreateObject("adodb.recordset")
    sql = "select newsid from EC_News where E_BigClassID=" & ClassId
    rs.Open sql, Conn, 1, 1
    If rs.EOF And rs.BOF Then
        getSideNewsID = 0
        Exit Function
    End If
    
    rs.MoveFirst
    rs.Find "newsid=" & NewsId
    
    If FX > 0 Then
        rs.MoveNext
    Else
        rs.MovePrevious
    End If
    
    If rs.EOF Or rs.BOF Then
        getSideNewsID = 0
    Else
        getSideNewsID = rs(0)
    End If
    
    rs.Close
    Set rs = Nothing
End Function

    '****************************************************************************
    '' @����˵��: ��ȡָ��newsid�ı���
    '' @����˵��:  
    '' @����ֵ:   
    '****************************************************************************
Function getNewsTitle(NewsId)
    If NewsId = 0 Then
        getNewsTitle = "û���ˣ�"
        Exit Function
    Else
        Set rs = server.CreateObject("adodb.recordset")
        sql = "select title from EC_News where newsid=" & NewsId
        rs.Open sql, conn, 1, 1
        getNewsTitle = rs(0)
        rs.Close
        Set rs = Nothing
    End If
End Function

	
    '****************************************************************************
    '' @����˵��: ����ļ���չ��
    '' @����˵��:  
    '' @����ֵ:   
    '****************************************************************************

function getFileExtName(strFileName)
	dim pos
	If (IsNull(strFileName) or strFileName = "" or IsEmpty(strFileName)) Then
		getFileExtName = ""
	Else
		pos=instrrev(strFileName, ".")
		if pos>0 then
			getFileExtName=mid(strFileName, pos+1)
		else
			getFileExtName=""
		end if
	End if
end function

function gotTopic(str,strlen)
	dim l,t,c
	l=len(str)
	t=0
	for i=1 to l
		c=Abs(Asc(Mid(str,i,1)))
		if c>255 then
			t=t+2
		else
			t=t+1
		end if
		if t>=strlen then
			gotTopic=left(str,i)&""
			exit for
		else
			gotTopic=str&""
		end if
	next
end function

    '****************************************************************************
    '' @����˵��: ����Դ�ַ���Str�ĳ���(һ�������ַ�Ϊ2���ֽڳ�)
    '' @����˵��:  - str [string]: Դ�ַ���
    '' @����ֵ:   - [Int] Դ�ַ����ĳ���
    '****************************************************************************
 Public Function strLen(Str)
  If Trim(Str)="" Or IsNull(str) Then 
   strlen=0
  else
   Dim P_len,x
   P_len=0
   StrLen=0
   P_len=Len(Trim(Str))
   For x=1 To P_len
    If Asc(Mid(Str,x,1))<0 Then
     StrLen=Int(StrLen) + 2
    Else
     StrLen=Int(StrLen) + 1
    End If
   Next
  end if
 End Function

    '****************************************************************************
    '' @����˵��: ��ȡԴ�ַ���Str��ǰLenNum���ַ�(һ�������ַ�Ϊ2���ֽڳ�)
    '' @����˵��:  - str [string]: Դ�ַ���
    '' @����˵��:  - LenNum [int]: ��ȡ�ĳ���
    '' @����ֵ:   - [string]: ת������ַ���
    '****************************************************************************
 Public Function CutStr(Str,LenNum)
  Dim P_num
  Dim I,X
  If StrLen(Str)<=LenNum Then
   Cutstr=Str
  Else
   P_num=0
   X=0
   Do While Not P_num > LenNum-2
    X=X+1
    If Asc(Mid(Str,X,1))<0 Then
     P_num=Int(P_num) + 2
    Else
     P_num=Int(P_num) + 1
    End If
    Cutstr=Left(Trim(Str),X)&".."
   Loop
  End If
 End Function


    '****************************************************************************
    '' @����˵��: ���ַ����е�str�е�HTML������й���
    '' @����˵��:  - str [string]: Դ�ַ���
    '' @����ֵ:   - [string] ת������ַ���
    '****************************************************************************

function nohtml(str)
    dim re
    If(isnull(str)) Then
	nohtml=str
    else
	Set re=new RegExp
	re.IgnoreCase =true
	re.Global=True
	re.Pattern="(\<.[^\<]*\>)"
	str=re.replace(str," ")
	re.Pattern="(\<\/[^\<]*\>)"
	str=re.replace(str," ")
	nohtml=str
    End if
    set re=nothing
end function

'�滻һ�� HTML ���
function nohtmlcode(str)
	lsstart=instr(1,str,"<",1)
	while lsstart>0
		lsstart=instr(1,str,"<",0)
		if lsstart>0 then
			lsend=instr(lsstart,str,">",0)+1
			lstemp=mid(str,lsstart,lsend-lsstart)
			str=replace(str,lstemp,"",1,-1,1)	'
		end if
	wend

	str=replace(str,"&nbsp;","",1,-1,1) '�ո�
	str=replace(str,vbcrlf,"",1,-1,1)	'���з�
	str=replace(str,chr(13),"",1,-1,1)	'�س�
	str=replace(str,chr(32),"",1,-1,1)	'�ո�
	str=replace(str,chr(34),"",1,-1,1)	'˫����
	str=replace(str,chr(39),"",1,-1,1)	'������
	str=replace(str,"'","",1,-1,1)	'������
	str=replace(str,"=","",1,-1,1)	'˫����
	str=replace(str,"/","",1,-1,1)	'������
	str=replace(str,"&copy;","",1,-1,1)	'��Ȩ��
	str=replace(str,"&reg;","",1,-1,1)	'
	str=replace(str,"&amp;","",1,-1,1)	'
	str=replace(str,"&","",1,-1,1)	'
	str=replace(str,"#","",1,-1,1)	'
	str=replace(str,"<BR>"," ",1,-1,1)	'
	str=replace(str,"<p>"," ",1,-1,1)	'
	str=replace(str,"</p>","",1,-1,1)	'
	str=replace(str,"<B>","",1,-1,1)	'
	str=replace(str,"</B>","",1,-1,1)	'
	str=replace(str,"\n","",1,-1,1)	'
	str=replace(str,"<","",1,-1,1)	'
	str=replace(str,">","",1,-1,1)	'
	nohtmlcode=str
end function
'****************************************************************************
'' @����˵��: ��ȡ��ϵͳ��http��װ·��,������ȡ��Ĭ�϶˿�
'' @����˵��:  - str [strFileName]: ���øö���ĳ����ļ���
'' @����ֵ:   - str [ServerHttpUrl]: http·������ http://www.xxx.com/news/
'****************************************************************************
Function ServerHttpUrl(strFileName)
	dim weburl
	if Request.ServerVariables("SERVER_PORT")="80" then
		weburl="http://"& Cstr(Request.ServerVariables("SERVER_NAME")) & Cstr(Request.ServerVariables("url"))
	else
		weburl="http://"& Cstr(Request.ServerVariables("SERVER_NAME")) &":"& Request.ServerVariables("SERVER_PORT") & Cstr(Request.ServerVariables("url"))
	end if
	'ע��,��һ���б��滻�ַ���ӦΪʵ�ʵı��ļ���
	weburl=replace(weburl,strFileName,"",1,-1,1)
	ServerHttpUrl=weburl
end Function
%>