<%
dim count
set rs7=server.createobject("adodb.recordset")
rs7.Source= "select * from "& db_EC_SmallClass_Table &" order by E_SmallClassID asc"
rs7.open rs7.Source,conn,1,1
%>
<script language = "JavaScript">
var onecount;
onecount=0;
subcat = new Array();
        <%
        count = 0		
        do while not rs7.eof 
        %>
subcat[<%=count%>] = new Array("<%=rs7("E_smallclassname")%>","<%=rs7("E_BigClassID")%>","<%=rs7("E_SmallClassID")%>");
        <%
        count = count + 1
        rs7.movenext
        loop
        rs7.close
		set rs7=nothing
        %>
onecount=<%=count%>;

function changelocation(locationid)
    {
    document.myform.E_SmallClassID.length = 0; 

    var locationid=locationid;
    var i;
    for (i=0;i < onecount; i++)
        {
            if (subcat[i][1] == locationid)
            { 
                document.myform.E_SmallClassID.options[document.myform.E_SmallClassID.length] = new Option(subcat[i][0], subcat[i][2]);
            }        
        }
        
    }    
</script>

<select name="action" style="border:1 solid #CCD5F9; font-size:9pt; background-color:#FEEBE4" size="1">
      <option selected value="">ȫ������</option>
      <option value="title">������</option>
      <option value="content">������</option>
	<option value="editor">������</option>
	<option value="about">���ؼ���</option>
    </select>

<select name="E_BigClassID" onChange="changelocation(document.myform.E_BigClassID.options[document.myform.E_BigClassID.selectedIndex].value)" style="border:1 solid #CCD5F9; font-size:9pt; background-color:#FEEBE4" size="1">
      <option selected value="">ȫ������</option>
      <%         
set rs8=server.CreateObject("ADODB.RecordSet")
rs8.Source="select * from "& db_EC_BigClass_Table &" order by E_BigClassID"
rs8.Open rs8.Source,conn,1,1
        do while not rs8.eof
        %>
      <option value="<%=rs8("E_BigClassID")%>"><%=rs8("E_BigClassName")%></option>
      <%
        rs8.movenext
        loop
        rs8.close
		set rs8=nothing
        %>
    </select>

    <select name="E_SmallClassID" style="border:1 solid #CCD5F9; font-size:9pt; background-color:#FEEBE4" size="1" >                  
        <option selected value="">ȫ��С��</option>
    </select>  

    <input type="text" name="keyword" style="font-size:9pt; background-color:#FEEBE4" size=10 value="�ؼ���"onfocus="if (value =='�ؼ���'){value =''}"onblur="if (value ==''){value='�ؼ���'}" maxlength="50">
    <input type="submit" name="Submit" value="����" >
