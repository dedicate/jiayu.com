<!--#include file="conn.asp"-->
<!--#include file="config.asp"-->
<!--#include file="function.asp"-->
<%
	PageShowSize = 10            '每页显示多少个页
	MyPageSize   = 10           '每页显示多少条文章
		
	If Not IsNumeric(Request("page")) Or IsEmpty(Request("page")) Or Request("page") <=0 Then
		MyPage=1
	Else
		MyPage=Int(Abs(Request("page")))
	End if
%>
<html>
<head>
<title>嘉鱼县人民政府门户网站 - 县长信箱</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link href="news.css" rel=stylesheet type=text/css>
<noscript><iframe scr="*"></iframe></noscript>
<script language="JavaScript">
<!--
function na_select_form (fname, type_name) 
{
  document.forms[fname].elements[type_name].select()
  document.forms[fname].elements[type_name].focus()
}
// -->
</script>
<script language="javascript">
<!--
function checkdata()
{
if (document.form1.YourName.value=="")
	{
	  alert("对不起，请输入您的姓名！")
	  return false
	 }
if (document.form1.email.value=="")
	{
	  alert("对不起，请输入您的联系邮箱！")
	  return false
	 }
if (document.form1.TelePhone.value=="")
	{
	  alert("对不起，请输入您的联系电话！")
	  return false
	 }
if (document.form1.Address.value=="")
	{
	  alert("对不起，请输入您的联系地址！")
	  return false
	 }
if (document.form1.Address.value=="")
	{
	  alert("对不起，请输入您的邮政编码！")
	  return false
    }
if (document.form1.Topic.value=="")
	{
	  alert("对不起，请输入您要信件标题！")
	  return false
	 }
if (document.form1.content.value=="")
	{
	  alert("对不起，请输入您要信件内容！")
	  return false
	 }
}

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script  language="JavaScript">
<!-- Hide from older browsers...

//Function to format text in the text box
function FormatText(command, option){
	
  	frames.message.document.execCommand(command, true, option);
  	frames.message.focus();
}

//Function to clear form
function ResetForm(){

	if (window.confirm('确认要清空对话框内容?')){
	 	frames.message.document.body.innerHTML = ''; 
	 	return true;
	 } 
	 return false;		
}

//Function to open pop up window
function openWin(theURL,winName,features) {
  	window.open(theURL,winName,features);
}

function setMode(newMode)
{
  bTextMode = newMode;
  var cont;
  if (bTextMode) {
    cleanHtml();
    cleanHtml();

    cont=message.document.body.innerHTML;
    message.document.body.innerText=cont;
  } else {
    cont=message.document.body.innerText;
    message.document.body.innerHTML=cont;
  }
  message.focus();
}

function cleanHtml()
{
  var fonts = message.document.body.all.tags("FONT");
  var curr;
  for (var i = fonts.length - 1; i >= 0; i--) {
    curr = fonts[i];
    if (curr.style.backgroundColor == "#ffffff") curr.outerHTML	= curr.innerHTML;
  }

}

// -->
</script>
</head>
<body bgcolor="#FFFFFF" text="#000000" topmargin="0">
<!--#include file="Top.asp"-->

<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr valign="top">
          <td width="210" height="163" background="Images/L_b.gif">
		  <table width="192" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr> 
              <td><img src="Images/mail_top_bg.gif" width="200" height="40"></td>
            </tr>
			            <tr> 
              <td align="center"><img src="Images/xzmail.gif" width="168" height="126"></td>
            </tr>
             <tr> 
              <td height="20" align="center"></td>
            </tr>
            <tr> 
			<td align="left">
<p><font color="#FF0000"><b>"县长信箱"友情提示：</b></font></p>
<p>欢迎您使用"县长信箱"，了解并遵循以下基本注意事项，将有助于您的来信能得到及时处理。</p>
<p>请您必须提供个人真实联系方式，以利于信件办理和反馈。</p>
<p><font color="#FF0000"><b>1 、受理范围</b></font></p>
<p>( 1 )对国家机关及其工作人员提出批评、意见和建议；</p>
<p>&nbsp;( 2 )对国家机关及其工作人员的违法失职行为提出控告或者检举；</p>
<p>( 3 )对侵害自身合法权益的行为提出控告或者申诉；</p>
<p>( 4 )对损害国家、社会、集体利益的行为提出控告或者检举；</p>
<p>( 5 )其他需要反映的情况、问题和要求。</p> 
<p><font color="#FF0000"><b>特别提示：因本信箱内容是对外公开的，所以有关举报的内容请进入县纪委举报网来举报，不要向本信箱写信。</b></font></p>
<p><font color="#FF0000"><b>2、不受理范围（网站管理员将予以删除）</b></font></p>
<p>( 1 )向行政机关提出行政许可、登记、备案等事宜的；</p>
<p>( 2 )依法应当通过诉讼、仲裁、行政复议等法定途径解决的；</p>
<p>( 3 )需要向来信人求证而又无法与来信人取得联系的；</p>
<p>( 4 )无实际内容的；</p>
<p>( 5 )以盈利为目的的商业推销广告；</p>
<p>( 6 )各种恶意攻击性信息。</p>
<p><font color="#FF0000"><b>3 、办理程序</b></font></p>
<p>您的来信将由县政府办信息管理科分类，通知相关单位负责调查回复。</p>
<p><font color="#FF0000"><b>4 、办理时限</b></font></p>
<p>一般情况下，您的来信将在受理之日起30日内办结；情况复杂的，可以适当延长不超过30日的办理期限。( 详见《国家信访条例》第三十三条、第三十四条、第三十五条)</p>
<p>&nbsp;<font color="#FF0000"><b>5 、公开约定</b></font></p>
<p>当您写信时可以选择"公开信件"或"不希望公开信件"，如果选择不希望公开信件，我们将通过电话或邮件单独联系个人回复。</p>
            </td>

            </tr>
          </table>
          </td>
		  
		  
		  
		  
		  
          <td width="782"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td width="9%" height="53" valign="middle" background="Images/location_bg.gif" align="center" >&nbsp;<img src="Images/point_location.gif" width="24" height="24"></td>
              <td width="91%" valign="middle" background="Images/location_bg.gif" class="daohang">&nbsp;您的位置：&nbsp;<a class=daohang href="../" target="_blank">网站首页</a>&gt;&gt;<a href="E_LeadMail.asp" class="daohang">县长信箱</a>&gt;&gt;书写信件</td>
            </tr>
          </table>
            <table width="760" height="507" border="0" align="center" cellpadding="0" cellspacing="0">

              <tr>
                <td>

                    <br>
                    <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#E6D9A4" id="AutoNumber1" style="border-collapse: collapse">
                      <tr class="TDtop">
                        <td height="25" colspan="8" align="center" bgcolor="#F5E2A7" class="top1"><div align="left">&nbsp;&nbsp;&nbsp;&nbsp;来信列表&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">重点提示：凡没有留下联系方式的信件将作为不受理信件被删除，请留下准确的联系方式！</font></div></td>
                      </tr>
                      <tr class="TDtop1" align="center">
                        <td width="7%" height="25" bgcolor="#FCFDEB"><span class="top1">状态</span></td>
                        <td width="43%" bgcolor="#FCFDEB" class="top1">信件标题</td>
                        <td width="12%" bgcolor="#FCFDEB" class="top1">回复领导</td>
						<td width="12%" bgcolor="#FCFDEB" class="top1">回复时间</td>
                      </tr>
                      <%
	set rs=server.CreateObject("ADODB.RecordSet")
	rs.Source="select * from "& db_EC_LeadMail_Table &"  where Checked=1 order by LeadMailID desc"	
	rs.Open rs.Source,conn,1,1
	If Not rs.eof then
	rs.PageSize     = MyPageSize
	MaxPages        = rs.PageCount
	rs.absolutepage = MyPage
	total           = rs.RecordCount
    i = 0
    do until rs.Eof or i = rs.PageSize
	topic=trim(rs("topic"))
	DisplayTopic=mid(Topic,1,28)
%>
                      <tr bgcolor=ffffff>
                        <td height="23" align=center bgcolor="#FCFDEB" ><%if trim(rs("ReplyContent"))<>"" then %>
                            <font color=red >已回复</font>
                            <%else%>
                            <font color=red >未回复</font>
                            <%end if%>
                        </td>
                        <td align="left" bgcolor="#FCFDEB">·<a class=middle href='E_ReadLeadMail.asp?LeadMailID=<%=rs("LeadMailID")%>' target="_black"><%=trim(rs("Topic"))%>...</a></td>
                        <td align=center bgcolor="#FCFDEB"><%=trim(rs("zip"))%></td>
						<td align=center bgcolor="#FCFDEB"><%=year(rs("UpdateTime")) %>-<%=Month(rs("UpdateTime")) %>-<%=Day(rs("UpdateTime")) %></td>
                      </tr>
                      <%
Rs.MoveNext
i = i + 1
loop
else
Response.write "<tr><td bgcolor=#FCFDEB align=center valign=middle colspan=4 height=80>&nbsp;<font color=red >暂没有来信！</font></td></tr>"				
End If%>
                      <tr>
                        <td height=29 colspan=8  align=center bgcolor="#FCFDEB"> 共 <%=total%> 条，当前第 <%=Mypage%>/<%=Maxpages%> 页，每页 <%=MyPageSize%> 条
                          <%
		url="E_LeadMail.asp?" 
		PageNextSize=int((MyPage-1)/PageShowSize)+1
		Pagetpage=int((total-1)/rs.PageSize)+1
		if PageNextSize >1 then
			PagePrev=PageShowSize*(PageNextSize-1)
			Response.write "<a class=black href='" & Url & "page=" & PagePrev & "' title='上" & PageShowSize & "页'>上一翻页</a> "
			Response.write "<a class=black href='" & Url & "page=1' title='第1页'>页首</a> "
		end if
		if MyPage-1 > 0 then
			Prev_Page = MyPage - 1
			Response.write "<a class=black href='" & Url & "page=" & Prev_Page & "' title='第" & Prev_Page & "页'>上一页</a> "
		end if
	
		if Maxpages>=PageNextSize*PageShowSize then
			PageSizeShow = PageShowSize
		Else
			PageSizeShow = Maxpages-PageShowSize*(PageNextSize-1)
		End if
		If PageSizeShow < 1 Then PageSizeShow = 1
		for PageCounterSize=1 to PageSizeShow
			PageLink = (PageCounterSize+PageNextSize*PageShowSize)-PageShowSize
			if PageLink <> MyPage Then
				Response.write "<a class=black href='" & Url & "page=" & PageLink & "'>[" & PageLink & "]</a> "
			else
				Response.Write "<B>["& PageLink &"]</B> "
			end if
			If PageLink = MaxPages Then Exit for
		Next
		if Mypage+1 <=Pagetpage  then
			Next_Page = MyPage + 1
			Response.write "<a class=black href='" & Url & "page=" & Next_Page & "' title='第" & Next_Page & "页'>下一页</A>"
		end if
		if MaxPages > PageShowSize*PageNextSize then
		PageNext = PageShowSize * PageNextSize + 1
		Response.write " <A class=black href='" & Url & "page=" & Pagetpage & "' title='第"& Pagetpage &"页'>页尾</A>"
		Response.write " <a class=black href='" & Url & "page=" & PageNext & "' title='下" & PageShowSize & "页'>下一翻页</a>"
		End if
		
		rs.close
		set rs=nothing
		conn.close
		set conn=nothing		
		%>
                        </td>
                      </tr>
                      <form action="E_LeadMail_Result.asp" method="post" name="myform" target="_blank">
                        <tr>
                          <td height=25 colspan=4  align=center valign=middle bgcolor="#FCFDEB"><span class=top1>信件查找：</span>
                              <input type="text" name="keyword" class="login_username" onMouseOver ="this.style.backgroundColor='#F3EAD5'" onMouseOut ="this.style.backgroundColor='#FFFFFF'" size=20 value="请输入标题关键字"onfocus="if (value =='请输入标题关键字'){value =''}"onblur="if (value ==''){value='请输入标题关键字'}" maxlength="50">
                              <input type="submit" name="Submit" value="搜 索" class="login_username" onMouseOver ="this.style.backgroundColor='#F3EAD5'" onMouseOut ="this.style.backgroundColor='#FFFFFF'" >
                          </td>
                        </tr>
                      </form>
                    </table>
                  <br>
				        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="18%" height="28">&nbsp;</td>
          <td width="64%" height="28" align="center" background="images/body_after_2.gif">&nbsp;</td>
          <td width="18%" height="28">&nbsp;</td>
        </tr>
      </table>
                    <form action="E_LeadMailSave.asp" method="post" name="form1" OnSubmit="return checkdata()" onReset="return ResetForm();">
                      <table width="98%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#E6D9A4">
                        
						<tr>
                          <td height="27" colspan="4" bgcolor="#F5E2A7" class="top1">&nbsp;&nbsp;&nbsp;&nbsp;我要写信 (提示：写信前请看县领导<a href="http://www.jiayu.gov.cn/jiayuzhengwu/lingdaoxinxi/2011-11-24/933.html" target="_blank"><font color="#FF0000">分工情况</font></a>，然后选择相应的县领导写信！）</td>
                        </tr>
                          <tr>
                         <td width="161" height="25" bgcolor="#FCFDEB"><div align="center">
                              <div align="center">请选择分管县长：</div>
                          </div></td>
                          <td colspan="3" bgcolor="#FCFDEB"><div align="left"><input type="radio" name="zip" value="余珂" checked="checked" />余珂<input type="radio" name="zip" value="熊武华" />熊武华<input type="radio" name="zip" value="许标" />许标<input type="radio" name="zip" value="饶自斌" />饶自斌<input type="radio" name="zip" value="李德炳" />李德炳<input type="radio" name="zip" value="吴维明" />吴维明<input type="radio" name="zip" value="熊吉" />熊吉<input type="radio" name="zip" value="许隆高" />许隆高<input type="radio" name="zip" value="魏萍" />魏萍</div></td></tr>
						  
						  <tr>
                          <td width="161" height="25" align="center" bgcolor="#FCFDEB">您的姓名：</td>
                          <td colspan="3" bgcolor="#FCFDEB">&nbsp;&nbsp;
                                  <input name="YourName" type="text" id="YourName" class="login_username" onMouseOver ="this.style.backgroundColor='#F3EAD5'" onMouseOut ="this.style.backgroundColor='#FFFFFF'" size="20" maxlength="50"></td></tr>
                        
						 <tr>
                          <td width="161" height="25" align="center" bgcolor="#FCFDEB">联系信箱：</td>
                          <td colspan="3" bgcolor="#FCFDEB">&nbsp;&nbsp;
                            <input name="email" type="text" class="login_username" onMouseOver ="this.style.backgroundColor='#F3EAD5'" onMouseOut ="this.style.backgroundColor='#FFFFFF'" size="20" maxlength="255"></td></tr>
						  
						  <tr>
                          <td width="161" height="25" align="center" bgcolor="#FCFDEB">联系电话：</td>
                          <td colspan="3" bgcolor="#FCFDEB">&nbsp;&nbsp;
                              <input type="text" name="TelePhone" class="login_username" onMouseOver ="this.style.backgroundColor='#F3EAD5'" onMouseOut ="this.style.backgroundColor='#FFFFFF'" size="20"></td></tr>
                        
						<tr>
                          <td width="161" height="25" align="center" bgcolor="#FCFDEB">联系地址：</td>
                          <td colspan="3" bgcolor="#FCFDEB">&nbsp;&nbsp;
                              <input name="Address" type="text" id="Address" class="login_username" onMouseOver ="this.style.backgroundColor='#F3EAD5'" onMouseOut ="this.style.backgroundColor='#FFFFFF'" size="40" maxlength="255">
                          </td></tr>

                        <tr>
                          <td width="161" height="25" align="center" bgcolor="#FCFDEB">是否公开：</td>
                          <td colspan="3" valign="top" bgcolor="#FCFDEB"><input name="ClassID" type="radio" value=-1 checked>
                            &nbsp;&nbsp;可以公开信件
                            <input type="radio" name="ClassID" value=0>
                            不希望公开信件,请回复到我的信箱。</td>
                        </tr>
                        
						<tr>
                          <td width="161" height="25" align="center"  bgcolor="#FCFDEB">发信主题：</td>
                          <td colspan="3" bgcolor="#FCFDEB">&nbsp;&nbsp;<input name="Topic" type="text" id="Topic" class="login_username" onMouseOver ="this.style.backgroundColor='#F3EAD5'" onMouseOut ="this.style.backgroundColor='#FFFFFF'" size="50" maxlength="255"></td>
                        </tr>
                        
						<tr>
                          <td height="23" align="center" bgcolor="#FCFDEB">发信内容：</td>
                          <td colspan="3" bgcolor="#FCFDEB"><br>
                              <select name="selectFont" onChange="FormatText('fontname', selectFont.options[selectFont.selectedIndex].value);document.form1.selectFont.options[0].selected = true;"  style="font-family: 宋体; font-size: 9pt" onMouseOver="window.status='选择选定文字的字体。';return true;" onMouseOut="window.status='';return true;">
                                <option selected>选择字体</option>
                                <option value="宋体">宋体</option>
                                <option value="楷体_GB2312">楷体</option>
                                <option value="新宋体">新宋体</option>
                                <option value="黑体">黑体</option>
                                <option value="隶书">隶书</option>
                                <option value="幼圆">幼圆</option>
                                <OPTION value="Andale Mono">Andale Mono</OPTION>
                                <OPTION value=Arial>Arial</OPTION>
                                <OPTION value="Arial Black">Arial Black</OPTION>
                                <OPTION value="Book Antiqua">Book Antiqua</OPTION>
                                <OPTION value="Century Gothic">Century Gothic</OPTION>
                                <OPTION value="Comic Sans MS">Comic Sans MS</OPTION>
                                <OPTION value="Courier New">Courier New</OPTION>
                                <OPTION value=Georgia>Georgia</OPTION>
                                <OPTION value=Impact>Impact</OPTION>
                                <OPTION value=Tahoma>Tahoma</OPTION>
                                <OPTION value="Times New Roman" >Times New Roman</OPTION>
                                <OPTION value="Trebuchet MS">Trebuchet MS</OPTION>
                                <OPTION value="Script MT Bold">Script MT Bold</OPTION>
                                <OPTION value=Stencil>Stencil</OPTION>
                                <OPTION value=Verdana>Verdana</OPTION>
                                <OPTION value="Lucida Console">Lucida Console</OPTION>
                              </select>
                              <select name="selectColour" onChange="FormatText('ForeColor',selectColour.options[selectColour.selectedIndex].value);document.form1.selectColour.options[0].selected = true;" onMouseOver="window.status='选择选定文字的颜色。';return true;" onMouseOut="window.status='';return true;">
                                <option value="0" selected>选择文字颜色</option>
                                <option style="background-color:#F0F8FF;color: #F0F8FF" value="#F0F8FF">#F0F8FF</option>
                                <option style="background-color:#FAEBD7;color: #FAEBD7" value="#FAEBD7">#FAEBD7</option>
                                <option style="background-color:#00FFFF;color: #00FFFF" value="#00FFFF">#00FFFF</option>
                                <option style="background-color:#7FFFD4;color: #7FFFD4" value="#7FFFD4">#7FFFD4</option>
                                <option style="background-color:#F0FFFF;color: #F0FFFF" value="#F0FFFF">#F0FFFF</option>
                                <option style="background-color:#F5F5DC;color: #F5F5DC" value="#F5F5DC">#F5F5DC</option>
                                <option style="background-color:#FFE4C4;color: #FFE4C4" value="#FFE4C4">#FFE4C4</option>
                                <option style="background-color:#000000;color: #000000" value="#000000">#000000</option>
                                <option style="background-color:#FFEBCD;color: #FFEBCD" value="#FFEBCD">#FFEBCD</option>
                                <option style="background-color:#0000FF;color: #0000FF" value="#0000FF">#0000FF</option>
                                <option style="background-color:#8A2BE2;color: #8A2BE2" value="#8A2BE2">#8A2BE2</option>
                                <option style="background-color:#A52A2A;color: #A52A2A" value="#A52A2A">#A52A2A</option>
                                <option style="background-color:#DEB887;color: #DEB887" value="#DEB887">#DEB887</option>
                                <option style="background-color:#5F9EA0;color: #5F9EA0" value="#5F9EA0">#5F9EA0</option>
                                <option style="background-color:#7FFF00;color: #7FFF00" value="#7FFF00">#7FFF00</option>
                                <option style="background-color:#D2691E;color: #D2691E" value="#D2691E">#D2691E</option>
                                <option style="background-color:#FF7F50;color: #FF7F50" value="#FF7F50">#FF7F50</option>
                                <option style="background-color:#6495ED;color: #6495ED" value="#6495ED">#6495ED</option>
                                <option style="background-color:#FFF8DC;color: #FFF8DC" value="#FFF8DC">#FFF8DC</option>
                                <option style="background-color:#DC143C;color: #DC143C" value="#DC143C">#DC143C</option>
                                <option style="background-color:#00FFFF;color: #00FFFF" value="#00FFFF">#00FFFF</option>
                                <option style="background-color:#00008B;color: #00008B" value="#00008B">#00008B</option>
                                <option style="background-color:#008B8B;color: #008B8B" value="#008B8B">#008B8B</option>
                                <option style="background-color:#B8860B;color: #B8860B" value="#B8860B">#B8860B</option>
                                <option style="background-color:#A9A9A9;color: #A9A9A9" value="#A9A9A9">#A9A9A9</option>
                                <option style="background-color:#006400;color: #006400" value="#006400">#006400</option>
                                <option style="background-color:#BDB76B;color: #BDB76B" value="#BDB76B">#BDB76B</option>
                                <option style="background-color:#8B008B;color: #8B008B" value="#8B008B">#8B008B</option>
                                <option style="background-color:#556B2F;color: #556B2F" value="#556B2F">#556B2F</option>
                                <option style="background-color:#FF8C00;color: #FF8C00" value="#FF8C00">#FF8C00</option>
                                <option style="background-color:#9932CC;color: #9932CC" value="#9932CC">#9932CC</option>
                                <option style="background-color:#8B0000;color: #8B0000" value="#8B0000">#8B0000</option>
                                <option style="background-color:#E9967A;color: #E9967A" value="#E9967A">#E9967A</option>
                                <option style="background-color:#8FBC8F;color: #8FBC8F" value="#8FBC8F">#8FBC8F</option>
                                <option style="background-color:#483D8B;color: #483D8B" value="#483D8B">#483D8B</option>
                                <option style="background-color:#2F4F4F;color: #2F4F4F" value="#2F4F4F">#2F4F4F</option>
                                <option style="background-color:#00CED1;color: #00CED1" value="#00CED1">#00CED1</option>
                                <option style="background-color:#9400D3;color: #9400D3" value="#9400D3">#9400D3</option>
                                <option style="background-color:#FF1493;color: #FF1493" value="#FF1493">#FF1493</option>
                                <option style="background-color:#00BFFF;color: #00BFFF" value="#00BFFF">#00BFFF</option>
                                <option style="background-color:#696969;color: #696969" value="#696969">#696969</option>
                                <option style="background-color:#1E90FF;color: #1E90FF" value="#1E90FF">#1E90FF</option>
                                <option style="background-color:#B22222;color: #B22222" value="#B22222">#B22222</option>
                                <option style="background-color:#FFFAF0;color: #FFFAF0" value="#FFFAF0">#FFFAF0</option>
                                <option style="background-color:#228B22;color: #228B22" value="#228B22">#228B22</option>
                                <option style="background-color:#FF00FF;color: #FF00FF" value="#FF00FF">#FF00FF</option>
                                <option style="background-color:#DCDCDC;color: #DCDCDC" value="#DCDCDC">#DCDCDC</option>
                                <option style="background-color:#F8F8FF;color: #F8F8FF" value="#F8F8FF">#F8F8FF</option>
                                <option style="background-color:#FFD700;color: #FFD700" value="#FFD700">#FFD700</option>
                                <option style="background-color:#DAA520;color: #DAA520" value="#DAA520">#DAA520</option>
                                <option style="background-color:#808080;color: #808080" value="#808080">#808080</option>
                                <option style="background-color:#008000;color: #008000" value="#008000">#008000</option>
                                <option style="background-color:#ADFF2F;color: #ADFF2F" value="#ADFF2F">#ADFF2F</option>
                                <option style="background-color:#F0FFF0;color: #F0FFF0" value="#F0FFF0">#F0FFF0</option>
                                <option style="background-color:#FF69B4;color: #FF69B4" value="#FF69B4">#FF69B4</option>
                                <option style="background-color:#CD5C5C;color: #CD5C5C" value="#CD5C5C">#CD5C5C</option>
                                <option style="background-color:#4B0082;color: #4B0082" value="#4B0082">#4B0082</option>
                                <option style="background-color:#FFFFF0;color: #FFFFF0" value="#FFFFF0">#FFFFF0</option>
                                <option style="background-color:#F0E68C;color: #F0E68C" value="#F0E68C">#F0E68C</option>
                                <option style="background-color:#E6E6FA;color: #E6E6FA" value="#E6E6FA">#E6E6FA</option>
                                <option style="background-color:#FFF0F5;color: #FFF0F5" value="#FFF0F5">#FFF0F5</option>
                                <option style="background-color:#7CFC00;color: #7CFC00" value="#7CFC00">#7CFC00</option>
                                <option style="background-color:#FFFACD;color: #FFFACD" value="#FFFACD">#FFFACD</option>
                                <option style="background-color:#ADD8E6;color: #ADD8E6" value="#ADD8E6">#ADD8E6</option>
                                <option style="background-color:#F08080;color: #F08080" value="#F08080">#F08080</option>
                                <option style="background-color:#E0FFFF;color: #E0FFFF" value="#E0FFFF">#E0FFFF</option>
                                <option style="background-color:#FAFAD2;color: #FAFAD2" value="#FAFAD2">#FAFAD2</option>
                                <option style="background-color:#90EE90;color: #90EE90" value="#90EE90">#90EE90</option>
                                <option style="background-color:#D3D3D3;color: #D3D3D3" value="#D3D3D3">#D3D3D3</option>
                                <option style="background-color:#FFB6C1;color: #FFB6C1" value="#FFB6C1">#FFB6C1</option>
                                <option style="background-color:#FFA07A;color: #FFA07A" value="#FFA07A">#FFA07A</option>
                                <option style="background-color:#20B2AA;color: #20B2AA" value="#20B2AA">#20B2AA</option>
                                <option style="background-color:#87CEFA;color: #87CEFA" value="#87CEFA">#87CEFA</option>
                                <option style="background-color:#778899;color: #778899" value="#778899">#778899</option>
                                <option style="background-color:#B0C4DE;color: #B0C4DE" value="#B0C4DE">#B0C4DE</option>
                                <option style="background-color:#FFFFE0;color: #FFFFE0" value="#FFFFE0">#FFFFE0</option>
                                <option style="background-color:#00FF00;color: #00FF00" value="#00FF00">#00FF00</option>
                                <option style="background-color:#32CD32;color: #32CD32" value="#32CD32">#32CD32</option>
                                <option style="background-color:#FAF0E6;color: #FAF0E6" value="#FAF0E6">#FAF0E6</option>
                                <option style="background-color:#FF00FF;color: #FF00FF" value="#FF00FF">#FF00FF</option>
                                <option style="background-color:#800000;color: #800000" value="#800000">#800000</option>
                                <option style="background-color:#66CDAA;color: #66CDAA" value="#66CDAA">#66CDAA</option>
                                <option style="background-color:#0000CD;color: #0000CD" value="#0000CD">#0000CD</option>
                                <option style="background-color:#BA55D3;color: #BA55D3" value="#BA55D3">#BA55D3</option>
                                <option style="background-color:#9370DB;color: #9370DB" value="#9370DB">#9370DB</option>
                                <option style="background-color:#3CB371;color: #3CB371" value="#3CB371">#3CB371</option>
                                <option style="background-color:#7B68EE;color: #7B68EE" value="#7B68EE">#7B68EE</option>
                                <option style="background-color:#00FA9A;color: #00FA9A" value="#00FA9A">#00FA9A</option>
                                <option style="background-color:#48D1CC;color: #48D1CC" value="#48D1CC">#48D1CC</option>
                                <option style="background-color:#C71585;color: #C71585" value="#C71585">#C71585</option>
                                <option style="background-color:#191970;color: #191970" value="#191970">#191970</option>
                                <option style="background-color:#F5FFFA;color: #F5FFFA" value="#F5FFFA">#F5FFFA</option>
                                <option style="background-color:#FFE4E1;color: #FFE4E1" value="#FFE4E1">#FFE4E1</option>
                                <option style="background-color:#FFE4B5;color: #FFE4B5" value="#FFE4B5">#FFE4B5</option>
                                <option style="background-color:#FFDEAD;color: #FFDEAD" value="#FFDEAD">#FFDEAD</option>
                                <option style="background-color:#000080;color: #000080" value="#000080">#000080</option>
                                <option style="background-color:#FDF5E6;color: #FDF5E6" value="#FDF5E6">#FDF5E6</option>
                                <option style="background-color:#808000;color: #808000" value="#808000">#808000</option>
                                <option style="background-color:#6B8E23;color: #6B8E23" value="#6B8E23">#6B8E23</option>
                                <option style="background-color:#FFA500;color: #FFA500" value="#FFA500">#FFA500</option>
                                <option style="background-color:#FF4500;color: #FF4500" value="#FF4500">#FF4500</option>
                                <option style="background-color:#DA70D6;color: #DA70D6" value="#DA70D6">#DA70D6</option>
                                <option style="background-color:#EEE8AA;color: #EEE8AA" value="#EEE8AA">#EEE8AA</option>
                                <option style="background-color:#98FB98;color: #98FB98" value="#98FB98">#98FB98</option>
                                <option style="background-color:#AFEEEE;color: #AFEEEE" value="#AFEEEE">#AFEEEE</option>
                                <option style="background-color:#DB7093;color: #DB7093" value="#DB7093">#DB7093</option>
                                <option style="background-color:#FFEFD5;color: #FFEFD5" value="#FFEFD5">#FFEFD5</option>
                                <option style="background-color:#FFDAB9;color: #FFDAB9" value="#FFDAB9">#FFDAB9</option>
                                <option style="background-color:#CD853F;color: #CD853F" value="#CD853F">#CD853F</option>
                                <option style="background-color:#FFC0CB;color: #FFC0CB" value="#FFC0CB">#FFC0CB</option>
                                <option style="background-color:#DDA0DD;color: #DDA0DD" value="#DDA0DD">#DDA0DD</option>
                                <option style="background-color:#B0E0E6;color: #B0E0E6" value="#B0E0E6">#B0E0E6</option>
                                <option style="background-color:#800080;color: #800080" value="#800080">#800080</option>
                                <option style="background-color:#FF0000;color: #FF0000" value="#FF0000">#FF0000</option>
                                <option style="background-color:#BC8F8F;color: #BC8F8F" value="#BC8F8F">#BC8F8F</option>
                                <option style="background-color:#4169E1;color: #4169E1" value="#4169E1">#4169E1</option>
                                <option style="background-color:#8B4513;color: #8B4513" value="#8B4513">#8B4513</option>
                                <option style="background-color:#FA8072;color: #FA8072" value="#FA8072">#FA8072</option>
                                <option style="background-color:#F4A460;color: #F4A460" value="#F4A460">#F4A460</option>
                                <option style="background-color:#2E8B57;color: #2E8B57" value="#2E8B57">#2E8B57</option>
                                <option style="background-color:#FFF5EE;color: #FFF5EE" value="#FFF5EE">#FFF5EE</option>
                                <option style="background-color:#A0522D;color: #A0522D" value="#A0522D">#A0522D</option>
                                <option style="background-color:#C0C0C0;color: #C0C0C0" value="#C0C0C0">#C0C0C0</option>
                                <option style="background-color:#87CEEB;color: #87CEEB" value="#87CEEB">#87CEEB</option>
                                <option style="background-color:#6A5ACD;color: #6A5ACD" value="#6A5ACD">#6A5ACD</option>
                                <option style="background-color:#708090;color: #708090" value="#708090">#708090</option>
                                <option style="background-color:#FFFAFA;color: #FFFAFA" value="#FFFAFA">#FFFAFA</option>
                                <option style="background-color:#00FF7F;color: #00FF7F" value="#00FF7F">#00FF7F</option>
                                <option style="background-color:#4682B4;color: #4682B4" value="#4682B4">#4682B4</option>
                                <option style="background-color:#D2B48C;color: #D2B48C" value="#D2B48C">#D2B48C</option>
                                <option style="background-color:#008080;color: #008080" value="#008080">#008080</option>
                                <option style="background-color:#D8BFD8;color: #D8BFD8" value="#D8BFD8">#D8BFD8</option>
                                <option style="background-color:#FF6347;color: #FF6347" value="#FF6347">#FF6347</option>
                                <option style="background-color:#40E0D0;color: #40E0D0" value="#40E0D0">#40E0D0</option>
                                <option style="background-color:#EE82EE;color: #EE82EE" value="#EE82EE">#EE82EE</option>
                                <option style="background-color:#F5DEB3;color: #F5DEB3" value="#F5DEB3">#F5DEB3</option>
                                <option style="background-color:#FFFFFF;color: #FFFFFF" value="#FFFFFF">#FFFFFF</option>
                                <option style="background-color:#F5F5F5;color: #F5F5F5" value="#F5F5F5">#F5F5F5</option>
                                <option style="background-color:#FFFF00;color: #FFFF00" value="#FFFF00">#FFFF00</option>
                                <option style="background-color:#9ACD32;color: #9ACD32" value="#9ACD32">#9ACD32</option>
                              </select>
                              <select name="selectbgColour" onChange="FormatText('BackColor',selectbgColour.options[selectbgColour.selectedIndex].value);document.form1.selectbgColour.options[0].selected = true;" onMouseOver="window.status='选择选定文字的背景颜色。';return true;" onMouseOut="window.status='';return true;">
                                <option value="0" selected>选择文字背景颜色</option>
                                <option style="background-color:#F0F8FF;color: #F0F8FF" value="#F0F8FF">#F0F8FF</option>
                                <option style="background-color:#FAEBD7;color: #FAEBD7" value="#FAEBD7">#FAEBD7</option>
                                <option style="background-color:#00FFFF;color: #00FFFF" value="#00FFFF">#00FFFF</option>
                                <option style="background-color:#7FFFD4;color: #7FFFD4" value="#7FFFD4">#7FFFD4</option>
                                <option style="background-color:#F0FFFF;color: #F0FFFF" value="#F0FFFF">#F0FFFF</option>
                                <option style="background-color:#F5F5DC;color: #F5F5DC" value="#F5F5DC">#F5F5DC</option>
                                <option style="background-color:#FFE4C4;color: #FFE4C4" value="#FFE4C4">#FFE4C4</option>
                                <option style="background-color:#000000;color: #000000" value="#000000">#000000</option>
                                <option style="background-color:#FFEBCD;color: #FFEBCD" value="#FFEBCD">#FFEBCD</option>
                                <option style="background-color:#0000FF;color: #0000FF" value="#0000FF">#0000FF</option>
                                <option style="background-color:#8A2BE2;color: #8A2BE2" value="#8A2BE2">#8A2BE2</option>
                                <option style="background-color:#A52A2A;color: #A52A2A" value="#A52A2A">#A52A2A</option>
                                <option style="background-color:#DEB887;color: #DEB887" value="#DEB887">#DEB887</option>
                                <option style="background-color:#5F9EA0;color: #5F9EA0" value="#5F9EA0">#5F9EA0</option>
                                <option style="background-color:#7FFF00;color: #7FFF00" value="#7FFF00">#7FFF00</option>
                                <option style="background-color:#D2691E;color: #D2691E" value="#D2691E">#D2691E</option>
                                <option style="background-color:#FF7F50;color: #FF7F50" value="#FF7F50">#FF7F50</option>
                                <option style="background-color:#6495ED;color: #6495ED" value="#6495ED">#6495ED</option>
                                <option style="background-color:#FFF8DC;color: #FFF8DC" value="#FFF8DC">#FFF8DC</option>
                                <option style="background-color:#DC143C;color: #DC143C" value="#DC143C">#DC143C</option>
                                <option style="background-color:#00FFFF;color: #00FFFF" value="#00FFFF">#00FFFF</option>
                                <option style="background-color:#00008B;color: #00008B" value="#00008B">#00008B</option>
                                <option style="background-color:#008B8B;color: #008B8B" value="#008B8B">#008B8B</option>
                                <option style="background-color:#B8860B;color: #B8860B" value="#B8860B">#B8860B</option>
                                <option style="background-color:#A9A9A9;color: #A9A9A9" value="#A9A9A9">#A9A9A9</option>
                                <option style="background-color:#006400;color: #006400" value="#006400">#006400</option>
                                <option style="background-color:#BDB76B;color: #BDB76B" value="#BDB76B">#BDB76B</option>
                                <option style="background-color:#8B008B;color: #8B008B" value="#8B008B">#8B008B</option>
                                <option style="background-color:#556B2F;color: #556B2F" value="#556B2F">#556B2F</option>
                                <option style="background-color:#FF8C00;color: #FF8C00" value="#FF8C00">#FF8C00</option>
                                <option style="background-color:#9932CC;color: #9932CC" value="#9932CC">#9932CC</option>
                                <option style="background-color:#8B0000;color: #8B0000" value="#8B0000">#8B0000</option>
                                <option style="background-color:#E9967A;color: #E9967A" value="#E9967A">#E9967A</option>
                                <option style="background-color:#8FBC8F;color: #8FBC8F" value="#8FBC8F">#8FBC8F</option>
                                <option style="background-color:#483D8B;color: #483D8B" value="#483D8B">#483D8B</option>
                                <option style="background-color:#2F4F4F;color: #2F4F4F" value="#2F4F4F">#2F4F4F</option>
                                <option style="background-color:#00CED1;color: #00CED1" value="#00CED1">#00CED1</option>
                                <option style="background-color:#9400D3;color: #9400D3" value="#9400D3">#9400D3</option>
                                <option style="background-color:#FF1493;color: #FF1493" value="#FF1493">#FF1493</option>
                                <option style="background-color:#00BFFF;color: #00BFFF" value="#00BFFF">#00BFFF</option>
                                <option style="background-color:#696969;color: #696969" value="#696969">#696969</option>
                                <option style="background-color:#1E90FF;color: #1E90FF" value="#1E90FF">#1E90FF</option>
                                <option style="background-color:#B22222;color: #B22222" value="#B22222">#B22222</option>
                                <option style="background-color:#FFFAF0;color: #FFFAF0" value="#FFFAF0">#FFFAF0</option>
                                <option style="background-color:#228B22;color: #228B22" value="#228B22">#228B22</option>
                                <option style="background-color:#FF00FF;color: #FF00FF" value="#FF00FF">#FF00FF</option>
                                <option style="background-color:#DCDCDC;color: #DCDCDC" value="#DCDCDC">#DCDCDC</option>
                                <option style="background-color:#F8F8FF;color: #F8F8FF" value="#F8F8FF">#F8F8FF</option>
                                <option style="background-color:#FFD700;color: #FFD700" value="#FFD700">#FFD700</option>
                                <option style="background-color:#DAA520;color: #DAA520" value="#DAA520">#DAA520</option>
                                <option style="background-color:#808080;color: #808080" value="#808080">#808080</option>
                                <option style="background-color:#008000;color: #008000" value="#008000">#008000</option>
                                <option style="background-color:#ADFF2F;color: #ADFF2F" value="#ADFF2F">#ADFF2F</option>
                                <option style="background-color:#F0FFF0;color: #F0FFF0" value="#F0FFF0">#F0FFF0</option>
                                <option style="background-color:#FF69B4;color: #FF69B4" value="#FF69B4">#FF69B4</option>
                                <option style="background-color:#CD5C5C;color: #CD5C5C" value="#CD5C5C">#CD5C5C</option>
                                <option style="background-color:#4B0082;color: #4B0082" value="#4B0082">#4B0082</option>
                                <option style="background-color:#FFFFF0;color: #FFFFF0" value="#FFFFF0">#FFFFF0</option>
                                <option style="background-color:#F0E68C;color: #F0E68C" value="#F0E68C">#F0E68C</option>
                                <option style="background-color:#E6E6FA;color: #E6E6FA" value="#E6E6FA">#E6E6FA</option>
                                <option style="background-color:#FFF0F5;color: #FFF0F5" value="#FFF0F5">#FFF0F5</option>
                                <option style="background-color:#7CFC00;color: #7CFC00" value="#7CFC00">#7CFC00</option>
                                <option style="background-color:#FFFACD;color: #FFFACD" value="#FFFACD">#FFFACD</option>
                                <option style="background-color:#ADD8E6;color: #ADD8E6" value="#ADD8E6">#ADD8E6</option>
                                <option style="background-color:#F08080;color: #F08080" value="#F08080">#F08080</option>
                                <option style="background-color:#E0FFFF;color: #E0FFFF" value="#E0FFFF">#E0FFFF</option>
                                <option style="background-color:#FAFAD2;color: #FAFAD2" value="#FAFAD2">#FAFAD2</option>
                                <option style="background-color:#90EE90;color: #90EE90" value="#90EE90">#90EE90</option>
                                <option style="background-color:#D3D3D3;color: #D3D3D3" value="#D3D3D3">#D3D3D3</option>
                                <option style="background-color:#FFB6C1;color: #FFB6C1" value="#FFB6C1">#FFB6C1</option>
                                <option style="background-color:#FFA07A;color: #FFA07A" value="#FFA07A">#FFA07A</option>
                                <option style="background-color:#20B2AA;color: #20B2AA" value="#20B2AA">#20B2AA</option>
                                <option style="background-color:#87CEFA;color: #87CEFA" value="#87CEFA">#87CEFA</option>
                                <option style="background-color:#778899;color: #778899" value="#778899">#778899</option>
                                <option style="background-color:#B0C4DE;color: #B0C4DE" value="#B0C4DE">#B0C4DE</option>
                                <option style="background-color:#FFFFE0;color: #FFFFE0" value="#FFFFE0">#FFFFE0</option>
                                <option style="background-color:#00FF00;color: #00FF00" value="#00FF00">#00FF00</option>
                                <option style="background-color:#32CD32;color: #32CD32" value="#32CD32">#32CD32</option>
                                <option style="background-color:#FAF0E6;color: #FAF0E6" value="#FAF0E6">#FAF0E6</option>
                                <option style="background-color:#FF00FF;color: #FF00FF" value="#FF00FF">#FF00FF</option>
                                <option style="background-color:#800000;color: #800000" value="#800000">#800000</option>
                                <option style="background-color:#66CDAA;color: #66CDAA" value="#66CDAA">#66CDAA</option>
                                <option style="background-color:#0000CD;color: #0000CD" value="#0000CD">#0000CD</option>
                                <option style="background-color:#BA55D3;color: #BA55D3" value="#BA55D3">#BA55D3</option>
                                <option style="background-color:#9370DB;color: #9370DB" value="#9370DB">#9370DB</option>
                                <option style="background-color:#3CB371;color: #3CB371" value="#3CB371">#3CB371</option>
                                <option style="background-color:#7B68EE;color: #7B68EE" value="#7B68EE">#7B68EE</option>
                                <option style="background-color:#00FA9A;color: #00FA9A" value="#00FA9A">#00FA9A</option>
                                <option style="background-color:#48D1CC;color: #48D1CC" value="#48D1CC">#48D1CC</option>
                                <option style="background-color:#C71585;color: #C71585" value="#C71585">#C71585</option>
                                <option style="background-color:#191970;color: #191970" value="#191970">#191970</option>
                                <option style="background-color:#F5FFFA;color: #F5FFFA" value="#F5FFFA">#F5FFFA</option>
                                <option style="background-color:#FFE4E1;color: #FFE4E1" value="#FFE4E1">#FFE4E1</option>
                                <option style="background-color:#FFE4B5;color: #FFE4B5" value="#FFE4B5">#FFE4B5</option>
                                <option style="background-color:#FFDEAD;color: #FFDEAD" value="#FFDEAD">#FFDEAD</option>
                                <option style="background-color:#000080;color: #000080" value="#000080">#000080</option>
                                <option style="background-color:#FDF5E6;color: #FDF5E6" value="#FDF5E6">#FDF5E6</option>
                                <option style="background-color:#808000;color: #808000" value="#808000">#808000</option>
                                <option style="background-color:#6B8E23;color: #6B8E23" value="#6B8E23">#6B8E23</option>
                                <option style="background-color:#FFA500;color: #FFA500" value="#FFA500">#FFA500</option>
                                <option style="background-color:#FF4500;color: #FF4500" value="#FF4500">#FF4500</option>
                                <option style="background-color:#DA70D6;color: #DA70D6" value="#DA70D6">#DA70D6</option>
                                <option style="background-color:#EEE8AA;color: #EEE8AA" value="#EEE8AA">#EEE8AA</option>
                                <option style="background-color:#98FB98;color: #98FB98" value="#98FB98">#98FB98</option>
                                <option style="background-color:#AFEEEE;color: #AFEEEE" value="#AFEEEE">#AFEEEE</option>
                                <option style="background-color:#DB7093;color: #DB7093" value="#DB7093">#DB7093</option>
                                <option style="background-color:#FFEFD5;color: #FFEFD5" value="#FFEFD5">#FFEFD5</option>
                                <option style="background-color:#FFDAB9;color: #FFDAB9" value="#FFDAB9">#FFDAB9</option>
                                <option style="background-color:#CD853F;color: #CD853F" value="#CD853F">#CD853F</option>
                                <option style="background-color:#FFC0CB;color: #FFC0CB" value="#FFC0CB">#FFC0CB</option>
                                <option style="background-color:#DDA0DD;color: #DDA0DD" value="#DDA0DD">#DDA0DD</option>
                                <option style="background-color:#B0E0E6;color: #B0E0E6" value="#B0E0E6">#B0E0E6</option>
                                <option style="background-color:#800080;color: #800080" value="#800080">#800080</option>
                                <option style="background-color:#FF0000;color: #FF0000" value="#FF0000">#FF0000</option>
                                <option style="background-color:#BC8F8F;color: #BC8F8F" value="#BC8F8F">#BC8F8F</option>
                                <option style="background-color:#4169E1;color: #4169E1" value="#4169E1">#4169E1</option>
                                <option style="background-color:#8B4513;color: #8B4513" value="#8B4513">#8B4513</option>
                                <option style="background-color:#FA8072;color: #FA8072" value="#FA8072">#FA8072</option>
                                <option style="background-color:#F4A460;color: #F4A460" value="#F4A460">#F4A460</option>
                                <option style="background-color:#2E8B57;color: #2E8B57" value="#2E8B57">#2E8B57</option>
                                <option style="background-color:#FFF5EE;color: #FFF5EE" value="#FFF5EE">#FFF5EE</option>
                                <option style="background-color:#A0522D;color: #A0522D" value="#A0522D">#A0522D</option>
                                <option style="background-color:#C0C0C0;color: #C0C0C0" value="#C0C0C0">#C0C0C0</option>
                                <option style="background-color:#87CEEB;color: #87CEEB" value="#87CEEB">#87CEEB</option>
                                <option style="background-color:#6A5ACD;color: #6A5ACD" value="#6A5ACD">#6A5ACD</option>
                                <option style="background-color:#708090;color: #708090" value="#708090">#708090</option>
                                <option style="background-color:#FFFAFA;color: #FFFAFA" value="#FFFAFA">#FFFAFA</option>
                                <option style="background-color:#00FF7F;color: #00FF7F" value="#00FF7F">#00FF7F</option>
                                <option style="background-color:#4682B4;color: #4682B4" value="#4682B4">#4682B4</option>
                                <option style="background-color:#D2B48C;color: #D2B48C" value="#D2B48C">#D2B48C</option>
                                <option style="background-color:#008080;color: #008080" value="#008080">#008080</option>
                                <option style="background-color:#D8BFD8;color: #D8BFD8" value="#D8BFD8">#D8BFD8</option>
                                <option style="background-color:#FF6347;color: #FF6347" value="#FF6347">#FF6347</option>
                                <option style="background-color:#40E0D0;color: #40E0D0" value="#40E0D0">#40E0D0</option>
                                <option style="background-color:#EE82EE;color: #EE82EE" value="#EE82EE">#EE82EE</option>
                                <option style="background-color:#F5DEB3;color: #F5DEB3" value="#F5DEB3">#F5DEB3</option>
                                <option style="background-color:#FFFFFF;color: #FFFFFF" value="#FFFFFF">#FFFFFF</option>
                                <option style="background-color:#F5F5F5;color: #F5F5F5" value="#F5F5F5">#F5F5F5</option>
                                <option style="background-color:#FFFF00;color: #FFFF00" value="#FFFF00">#FFFF00</option>
                                <option style="background-color:#9ACD32;color: #9ACD32" value="#9ACD32">#9ACD32</option>
                              </select>
                              <select language="javascript"  id="select" title="字号大小" onChange="FormatText('fontsize',this[this.selectedIndex].value);" name="select" onMouseOver="window.status='选择选定文字的字号大小。';return true;" onMouseOut="window.status='';return true;">
                                <option class="heading" selected>字号 
                                <option value="7">一号 
                                <option value="6">二号 
                                <option value="5">三号 
                                <option value="4">四号 
                                <option value="3">五号 
                                <option value="2">六号 
                                <option value="1">七号</option>
                              </select>
                              <br>
                              <img class=None src="images/selectall.gif" align="absmiddle" border="0" alt="全部选择" onClick="FormatText('selectall')" style="cursor: hand;"> <img class=None src="images/cut.gif"  align="absmiddle" onClick="FormatText('cut')" style="cursor: hand;" alt="剪切"> <img class=None src="images/copy.gif"  align="absmiddle" onClick="FormatText('copy')" style="cursor: hand;" alt="复制"> <img class=None src="images/paste.gif"  align="absmiddle" onClick="FormatText('paste')" style="cursor: hand;" alt="粘贴"> <img class=None src="images/DELETE.gif" align="absmiddle" border="0" alt="删除" onClick="FormatText('DELETE')" style="cursor: hand;"> <img class=None src="images/undo.gif" align="absmiddle" border="0" alt="撤消" onClick="FormatText('undo')" style="cursor: hand;"> <img class=None src="images/redo.gif" align="absmiddle" border="0" alt="恢复" onClick="FormatText('redo')" style="cursor: hand;"> <img class=None src="images/bold.gif" align="absmiddle" alt="粗体" onClick="FormatText('bold', '')" style="cursor: hand;"> <img class=None src="images/italic.gif" align="absmiddle" alt="斜体" onClick="FormatText('italic', '')" style="cursor: hand;"> <img class=None src="images/underline.gif" align="absmiddle" alt="下划线" onClick="FormatText('underline', '')" style="cursor: hand;"> <img class=None src="images/ALEFT.gif" align="absmiddle" onClick="FormatText('Justifyleft', '')" style="cursor: hand;" alt="左对齐"> <img class=None src="images/center.gif" align="absmiddle" border="0" alt="居中" onClick="FormatText('JustifyCenter', '')" style="cursor: hand;"> <img class=None src="images/aright.gif" align="absmiddle" onClick="FormatText('JustifyRight', '')" style="cursor: hand;" alt="右对齐"> <img class=None src="images/list.gif" align="absmiddle" border="0" alt="项目符号" onClick="FormatText('InsertUnorderedList', '')" style="cursor: hand;"> <img class=None src="images/number.gif" align="absmiddle" alt="编号" border="0" onClick="FormatText('insertorderedlist', '')" style="cursor: hand;"> <img class=None src="images/outdent.gif" align="absmiddle" onClick="FormatText('Outdent', '')" style="cursor: hand;" alt="回退"> <img class=None src="images/indent.gif" align="absmiddle" border="0" alt="缩进" onClick="FormatText('indent', '')" style="cursor: hand;"> <img class=None src="images/line.gif" align="absmiddle" alt="普通水平线" border="0" onClick="FormatText('InsertHorizontalRule', '')"  style="cursor: hand;"> <img class=None src="images/link.gif" align="absmiddle" border="0" alt="超级链接" onClick="FormatText('createLink')" style="cursor: hand;"> <img class=None src="images/unlink.gif" align="absmiddle" border="0" alt="取消超级链接" onClick="FormatText('unLink')" style="cursor: hand;"> <img class=None src="images/sup.gif" align="absmiddle" border="0" alt="上标" onClick="FormatText('superscript')" style="cursor: hand;"> <img class=None src="images/sub.gif" align="absmiddle" border="0" alt="下标" onClick="FormatText('subscript')" style="cursor: hand;"> <img class=None src="images/clear.gif" align="absmiddle" border="0" alt="删除文字格式" onClick="FormatText('RemoveFormat')" style="cursor: hand;">
                              
                              <iframe style="top:2px" ID="UploadFiles" src="Uploadfile1.htm" frameborder=0 scrolling=no width="420" height="40"></iframe>
                            <script language="javascript">
		document.write ('<iframe src="E_LeadMailBox.asp?action=new" id="message" width="550" height="400" align=left></iframe>')
		frames.message.document.designMode = "On";
	            </script>
                          </td>
                        </tr>
                        <tr>
                          <td height="31" colspan="4" bgcolor="#FCFDEB"><div align="center">
                              <input name="button" type="button" onClick="javascript:history.go(-1)" value=" 返 回 ">
                            &nbsp;&nbsp;
                            <input type="submit" value=" 发 表 " name="Submit" onClick="document.form1.content.value = frames.message.document.body.innerHTML;">
                            &nbsp;
                            <input type="reset" value=" 清 除 " name="Reset">
                            <input type="hidden" name="content" value="">
                          </div></td>
                        </tr>
                      </table>
                    </form></td>
              </tr>

            </table></td>
        </tr>
</table>
<!--#include file="bottom.asp"-->
