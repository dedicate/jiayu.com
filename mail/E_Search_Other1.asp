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
<table width="175" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="175" align="center">
        <select name="action" style="border:1 solid #ffffff; font-size:9pt; background-color:#ffffff" size="1">
          <option value="">=== 全  部  内  容 ===</option>
          <option value="title">===按 标 题===</option>
          <option value="content">===按  内  容===</option>
          <option value="editor">===按  作  者===</option>
          <option value="about">===按 关 键 字===</option>
        </select><br />
        <select name="E_BigClassID" onchange="changelocation(document.myform.E_BigClassID.options[document.myform.E_BigClassID.selectedIndex].value)" style="border:1 solid #ffffff; font-size:9pt; background-color:#ffffff" size="1">
          <option selected="selected" value="">=== 全  部  大  类 ===</option>
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
        </select><br />
        <select name="E_SmallClassID" style="border:1 solid #ffffff; font-size:9pt; background-color:#ffffff" size="1" >
          <option selected="selected" value="">=== 全 部 小 类 ===</option>
        </select><br />
        <input type="text" name="keyword" class="login_username" onmouseover ="this.style.backgroundColor='#FDF6E7'" onmouseout ="this.style.backgroundColor='#FFFFFF'" size="14" value="关键字"onfocus="if (value =='关键字'){value =''}"onblur="if (value ==''){value='关键字'}" maxlength="50" />
        <input type="submit" name="Submit" value="搜索" sclass="login_username" onmouseover ="this.style.backgroundColor='#FDF6E7'" onmouseout ="this.style.backgroundColor='#FFFFFF'" />
</td>
  </tr>
</table>
