//code:GBK
		var gj_basenames = "RMWCPC";
		/*
		 *********************************************************************得到检索参数
		 */
		function trim(str) 
		{
			if (!str || str=="") 
				return "";
			while ((str.charAt(0)==' ') || (str.charAt(0)=='\n') || (str.charAt(0,1)=='\r')) 
				str=str.substring(1,str.length);
			while ((str.charAt(str.length-1)==' ') || (str.charAt(str.length-1)=='\n') || (str.charAt(str.length-1)=='\r')) 
				str=str.substring(0,str.length-1);
			return str;
		}
		function allchange()
		{
			var allchangeele = document.RMWSearch.ALLCHANGE;
			//选中或者是取消所有的选择
			var ssfweles = document.getElementsByName("SSFW");
			var ssfwele = false;
			var ssfwlist = "(";
			for(var i=0;i<ssfweles.length;i++)
			{
				ssfwele = ssfweles[i];
				ssfwele.checked = allchangeele.checked;
			}
		}
		function createXMLNode(key,value)
		{
			var sResult = "";
			sResult += "<"+key+">";
			sResult += "<![CDATA["+encode(value)+"]]>";
			sResult += "</"+key+">";
			return sResult;
		}
		function encode(str,u) 
		{
			if (typeof(encodeURIComponent) == 'function')
			{
				if (u) 
					return encodeURI(str);
				else 
					return encodeURIComponent(str);
			}
			else 
			{
				return escape(str);
			}
		}
		
		//得到低级检索的参数列表
		function getParameter_DJ(channel,searchfield)
		{
			var basenames = gj_basenames;
			//1、得到用户输入的关键词，为空则不允许提交
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("请输入关键词，然后提交");
				return false;
			}
			keyword = keywordele.value;
			//2、构造XML字符串<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			
			xmllist += "<RMW>";
			xmllist += createXMLNode("BASENAMES",basenames);
			xmllist += createXMLNode("ALLKEYWORD","");
			xmllist += createXMLNode("ALLINPUT","");
			xmllist += createXMLNode("ANYKEYWORD","");
			xmllist += createXMLNode("NOALLKEYWORD","");
			xmllist += createXMLNode("DATEFROM","");
			xmllist += createXMLNode("DATETO","");
			xmllist += createXMLNode("DOCTYPE","0");
			xmllist += createXMLNode("SORTFIELD","-PUBLISHTIME");
			xmllist += createXMLNode("ZNKZ","0");
			xmllist += createXMLNode("CHANNEL",channel);
			xmllist += createXMLNode("KEYWORD",keyword);
			if(searchfield == "TITLE")
				xmllist += createXMLNode("SEARCHFIELD","TITLE");
			else
				xmllist += createXMLNode("SEARCHFIELD","Content");
			xmllist += "</RMW>";
			document.searchForm.XMLLIST.value = encodeURIComponent(xmllist);
			document.searchForm.submit();
			return false;
		}
		
		//为了给共产党新闻添加页面检索添加的方法
		function search()
		{
			var names = document.searchForm.names.value;
			var channel = document.searchForm.channel.options[document.searchForm.channel.options.selectedIndex].value;
			var searchfields= document.getElementsByName("searchfield");
			var searchfieldele = false;
			var searchfieldstr = "CONTENT";
			for(var i=0;i<searchfields.length;i++)
			{
				searchfieldele = searchfields[i];
				if(searchfieldele.checked)
				{
					searchfieldstr = searchfieldele.value;
					break;
				}
			}
			getParameter_DJ(channel,searchfieldstr);
		}
		
		//党史频道党史百科检索
		function getParameter_DJ_DSBK(channel)
		{
			var basenames = gj_basenames;
			//1、得到用户输入的关键词，为空则不允许提交
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("请输入关键词，然后提交");
				return false;
			}
			keyword = keywordele.value;
			//2、得到用户检索的字段,默认为Title
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "Title";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3、构造XML字符串<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="docclass=%党史百科%";
			xmllist += "<RMW>";
			xmllist += createXMLNode("BASENAMES",basenames);
			xmllist += createXMLNode("ALLKEYWORD","");
			xmllist += createXMLNode("ALLINPUT","");
			xmllist += createXMLNode("ANYKEYWORD","");
			xmllist += createXMLNode("NOALLKEYWORD","");
			xmllist += createXMLNode("DATEFROM","");
			xmllist += createXMLNode("DATETO","");
			xmllist += createXMLNode("DOCTYPE","0");
			xmllist += createXMLNode("SORTFIELD","-INPUTTIME");
			xmllist += createXMLNode("ZNKZ","0");
			xmllist += createXMLNode("OTHERWHERE",otherwhere);
			xmllist += createXMLNode("CHANNEL",channel);
			xmllist += createXMLNode("KEYWORD",keyword);
			xmllist += createXMLNode("SEARCHFIELD",searchfield);
			xmllist += "</RMW>";
			document.searchForm.XMLLIST.value = encodeURIComponent(xmllist);
			document.searchForm.submit();
			return false;
		}
		//党史频道党史百科检索form改名字避免同页面冲突
		function getParameter_DJ_DSBKN(channel)
		{
			var basenames = gj_basenames;
			//1、得到用户输入的关键词，为空则不允许提交
			var keywordele = document.getElementById("namesn");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("请输入关键词，然后提交");
				return false;
			}
			keyword = keywordele.value;
			//2、得到用户检索的字段,默认为Title
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "Title";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3、构造XML字符串<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="docclass=%党史百科%";
			xmllist += "<RMW>";
			xmllist += createXMLNode("BASENAMES",basenames);
			xmllist += createXMLNode("ALLKEYWORD","");
			xmllist += createXMLNode("ALLINPUT","");
			xmllist += createXMLNode("ANYKEYWORD","");
			xmllist += createXMLNode("NOALLKEYWORD","");
			xmllist += createXMLNode("DATEFROM","");
			xmllist += createXMLNode("DATETO","");
			xmllist += createXMLNode("DOCTYPE","0");
			xmllist += createXMLNode("SORTFIELD","-INPUTTIME");
			xmllist += createXMLNode("ZNKZ","0");
			xmllist += createXMLNode("OTHERWHERE",otherwhere);
			xmllist += createXMLNode("CHANNEL",channel);
			xmllist += createXMLNode("KEYWORD",keyword);
			xmllist += createXMLNode("SEARCHFIELD",searchfield);
			xmllist += "</RMW>";
			document.searchFormn.XMLLIST.value = encodeURIComponent(xmllist);
			document.searchFormn.submit();
			return false;
		}
		//中直党建网检索
		function getParameter_DJ_ZZDJ(channel)
		{
			var basenames = gj_basenames;
			//1、得到用户输入的关键词，为空则不允许提交
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("请输入关键词，然后提交");
				return false;
			}
			keyword = keywordele.value;
			//2、得到用户检索的字段,默认为Title
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "CONTENT";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3、构造XML字符串<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=中直党建网";
			xmllist += "<RMW>";
			xmllist += createXMLNode("BASENAMES",basenames);
			xmllist += createXMLNode("ALLKEYWORD","");
			xmllist += createXMLNode("ALLINPUT","");
			xmllist += createXMLNode("ANYKEYWORD","");
			xmllist += createXMLNode("NOALLKEYWORD","");
			xmllist += createXMLNode("DATEFROM","");
			xmllist += createXMLNode("DATETO","");
			xmllist += createXMLNode("DOCTYPE","0");
			xmllist += createXMLNode("SORTFIELD","-INPUTTIME");
			xmllist += createXMLNode("ZNKZ","0");
			xmllist += createXMLNode("OTHERWHERE",otherwhere);
			xmllist += createXMLNode("CHANNEL",channel);
			xmllist += createXMLNode("KEYWORD",keyword);
			xmllist += createXMLNode("SEARCHFIELD",searchfield);
			xmllist += "</RMW>";
			document.searchForm.XMLLIST.value = encodeURIComponent(xmllist);
			document.searchForm.submit();
			return false;
		}

		//中国共产党重要会议检索
		function getParameter_DJ_ZYHY(channel)
		{
			var basenames = gj_basenames;
			//1、得到用户输入的关键词，为空则不允许提交
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("请输入关键词，然后提交");
				return false;
			}
			keyword = keywordele.value;
			//2、得到用户检索的字段,默认为Title
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "CONTENT";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3、构造XML字符串<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=党史频道  and node_ids =%176588%";
			xmllist += "<RMW>";
			xmllist += createXMLNode("BASENAMES",basenames);
			xmllist += createXMLNode("ALLKEYWORD","");
			xmllist += createXMLNode("ALLINPUT","");
			xmllist += createXMLNode("ANYKEYWORD","");
			xmllist += createXMLNode("NOALLKEYWORD","");
			xmllist += createXMLNode("DATEFROM","");
			xmllist += createXMLNode("DATETO","");
			xmllist += createXMLNode("DOCTYPE","0");
			xmllist += createXMLNode("SORTFIELD","-INPUTTIME");
			xmllist += createXMLNode("ZNKZ","0");
			xmllist += createXMLNode("OTHERWHERE",otherwhere);
			xmllist += createXMLNode("CHANNEL",channel);
			xmllist += createXMLNode("KEYWORD",keyword);
			xmllist += createXMLNode("SEARCHFIELD",searchfield);
			xmllist += "</RMW>";
			document.searchForm.XMLLIST.value = encodeURIComponent(xmllist);
			document.searchForm.submit();
			return false;
		}
		//中直党建网检索
		function getParameter_DJ_CONGRESS(channel)
		{
			var basenames = gj_basenames;
			//1、得到用户输入的关键词，为空则不允许提交
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("请输入关键词，然后提交");
				return false;
			}
			keyword = keywordele.value;
			//2、得到用户检索的字段,默认为Title
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "CONTENT";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3、构造XML字符串<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=资料中心 and node_ids =%64168%";
			xmllist += "<RMW>";
			xmllist += createXMLNode("BASENAMES",basenames);
			xmllist += createXMLNode("ALLKEYWORD","");
			xmllist += createXMLNode("ALLINPUT","");
			xmllist += createXMLNode("ANYKEYWORD","");
			xmllist += createXMLNode("NOALLKEYWORD","");
			xmllist += createXMLNode("DATEFROM","");
			xmllist += createXMLNode("DATETO","");
			xmllist += createXMLNode("DOCTYPE","0");
			xmllist += createXMLNode("SORTFIELD","-INPUTTIME");
			xmllist += createXMLNode("ZNKZ","0");
			xmllist += createXMLNode("OTHERWHERE",otherwhere);
			xmllist += createXMLNode("CHANNEL",channel);
			xmllist += createXMLNode("KEYWORD",keyword);
			xmllist += createXMLNode("SEARCHFIELD",searchfield);
			xmllist += "</RMW>";
			document.searchForm.XMLLIST.value = encodeURIComponent(xmllist);
			document.searchForm.submit();
			return false;
		}

		//中央文献研究室网站检索
		function getParameter_DJ_WXYJS(channel)
		{
			var basenames = gj_basenames;
			//1、得到用户输入的关键词，为空则不允许提交
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("请输入关键词，然后提交");
				return false;
			}
			keyword = keywordele.value;
			//2、得到用户检索的字段,默认为Title
			var searchfield= document.searchForm.searchfield.value;
			
			//3、构造XML字符串<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=中央文献研究室网站";
			xmllist += "<RMW>";
			xmllist += createXMLNode("BASENAMES",basenames);
			xmllist += createXMLNode("ALLKEYWORD","");
			xmllist += createXMLNode("ALLINPUT","");
			xmllist += createXMLNode("ANYKEYWORD","");
			xmllist += createXMLNode("NOALLKEYWORD","");
			xmllist += createXMLNode("DATEFROM","");
			xmllist += createXMLNode("DATETO","");
			xmllist += createXMLNode("DOCTYPE","0");
			xmllist += createXMLNode("SORTFIELD","-INPUTTIME");
			xmllist += createXMLNode("ZNKZ","0");
			xmllist += createXMLNode("OTHERWHERE",otherwhere);
			xmllist += createXMLNode("CHANNEL",channel);
			xmllist += createXMLNode("KEYWORD",keyword);
			xmllist += createXMLNode("SEARCHFIELD",searchfield);
			xmllist += "</RMW>";
			document.searchForm.XMLLIST.value = encodeURIComponent(xmllist);
			document.searchForm.submit();
			return false;
		}
		//为了给文献研究室网站添加页面检索添加的方法
		function search_wxyjs()
		{
			var channel = document.searchForm.channel.value;
			getParameter_DJ_WXYJS(channel);
		}

		//中央文献出版社检索
		function getParameter_DJ_ZYWXPRESS(channel)
		{
			var basenames = gj_basenames;
			//1、得到用户输入的关键词，为空则不允许提交
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("请输入关键词，然后提交");
				return false;
			}
			keyword = keywordele.value;
			//2、得到用户检索的字段,默认为Title
			var searchfield= document.searchForm.searchfield.value;
			
			//3、构造XML字符串<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=中央文献研究室网站 and docclass=%文献出版社%";
			xmllist += "<RMW>";
			xmllist += createXMLNode("BASENAMES",basenames);
			xmllist += createXMLNode("ALLKEYWORD","");
			xmllist += createXMLNode("ALLINPUT","");
			xmllist += createXMLNode("ANYKEYWORD","");
			xmllist += createXMLNode("NOALLKEYWORD","");
			xmllist += createXMLNode("DATEFROM","");
			xmllist += createXMLNode("DATETO","");
			xmllist += createXMLNode("DOCTYPE","0");
			xmllist += createXMLNode("SORTFIELD","-INPUTTIME");
			xmllist += createXMLNode("ZNKZ","0");
			xmllist += createXMLNode("OTHERWHERE",otherwhere);
			xmllist += createXMLNode("CHANNEL",channel);
			xmllist += createXMLNode("KEYWORD",keyword);
			xmllist += createXMLNode("SEARCHFIELD",searchfield);
			xmllist += "</RMW>";
			document.searchForm.XMLLIST.value = encodeURIComponent(xmllist);
			document.searchForm.submit();
			return false;
		}
		//为了给中央文献出版社添加页面检索添加的方法
		function search_zywxpress()
		{
			var channel = document.searchForm.channel.value;
			getParameter_DJ_ZYWXPRESS(channel);
		}
		
		
		
		//党网专家检索，从理论频道中检索
		function getParameter_DJ_LLGCJ(channel)
		{
			var basenames = gj_basenames;
			//1、得到用户输入的关键词，为空则不允许提交
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("请输入关键词，然后提交");
				return false;
			}
			keyword = keywordele.value;
			//2、得到用户检索的字段,默认为Title
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "CONTENT";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3、构造XML字符串<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=理论";
			xmllist += "<RMW>";
			xmllist += createXMLNode("BASENAMES",basenames);
			xmllist += createXMLNode("ALLKEYWORD","");
			xmllist += createXMLNode("ALLINPUT","");
			xmllist += createXMLNode("ANYKEYWORD","");
			xmllist += createXMLNode("NOALLKEYWORD","");
			xmllist += createXMLNode("DATEFROM","");
			xmllist += createXMLNode("DATETO","");
			xmllist += createXMLNode("DOCTYPE","0");
			xmllist += createXMLNode("SORTFIELD","-INPUTTIME");
			xmllist += createXMLNode("ZNKZ","0");
			xmllist += createXMLNode("OTHERWHERE",otherwhere);
			xmllist += createXMLNode("CHANNEL",channel);
			xmllist += createXMLNode("KEYWORD",keyword);
			xmllist += createXMLNode("SEARCHFIELD",searchfield);
			xmllist += "</RMW>";
			document.searchForm.XMLLIST.value = encodeURIComponent(xmllist);
			document.searchForm.submit();
			return false;
		}

		//党建案例库
		function getParameter_DJ_DJALK(channel)
		{
			var basenames = gj_basenames;
			//1、得到用户输入的关键词，为空则不允许提交
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("请输入关键词，然后提交");
				return false;
			}
			keyword = keywordele.value;
			//2、得到用户检索的字段,默认为Title
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "CONTENT";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3、构造XML字符串<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="docclass=%党建案例库%";
			xmllist += "<RMW>";
			xmllist += createXMLNode("BASENAMES",basenames);
			xmllist += createXMLNode("ALLKEYWORD","");
			xmllist += createXMLNode("ALLINPUT","");
			xmllist += createXMLNode("ANYKEYWORD","");
			xmllist += createXMLNode("NOALLKEYWORD","");
			xmllist += createXMLNode("DATEFROM","");
			xmllist += createXMLNode("DATETO","");
			xmllist += createXMLNode("DOCTYPE","0");
			xmllist += createXMLNode("SORTFIELD","-INPUTTIME");
			xmllist += createXMLNode("ZNKZ","0");
			xmllist += createXMLNode("OTHERWHERE",otherwhere);
			xmllist += createXMLNode("CHANNEL",channel);
			xmllist += createXMLNode("KEYWORD",keyword);
			xmllist += createXMLNode("SEARCHFIELD",searchfield);
			xmllist += "</RMW>";
			document.searchForm.XMLLIST.value = encodeURIComponent(xmllist);
			document.searchForm.submit();
			return false;
		}
		