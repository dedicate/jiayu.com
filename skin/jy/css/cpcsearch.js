//code:GBK
		var gj_basenames = "RMWCPC";
		/*
		 *********************************************************************�õ���������
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
			//ѡ�л�����ȡ�����е�ѡ��
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
		
		//�õ��ͼ������Ĳ����б�
		function getParameter_DJ(channel,searchfield)
		{
			var basenames = gj_basenames;
			//1���õ��û�����Ĺؼ��ʣ�Ϊ���������ύ
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("������ؼ��ʣ�Ȼ���ύ");
				return false;
			}
			keyword = keywordele.value;
			//2������XML�ַ���<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
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
		
		//Ϊ�˸��������������ҳ�������ӵķ���
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
		
		//��ʷƵ����ʷ�ٿƼ���
		function getParameter_DJ_DSBK(channel)
		{
			var basenames = gj_basenames;
			//1���õ��û�����Ĺؼ��ʣ�Ϊ���������ύ
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("������ؼ��ʣ�Ȼ���ύ");
				return false;
			}
			keyword = keywordele.value;
			//2���õ��û��������ֶ�,Ĭ��ΪTitle
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "Title";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3������XML�ַ���<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="docclass=%��ʷ�ٿ�%";
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
		//��ʷƵ����ʷ�ٿƼ���form�����ֱ���ͬҳ���ͻ
		function getParameter_DJ_DSBKN(channel)
		{
			var basenames = gj_basenames;
			//1���õ��û�����Ĺؼ��ʣ�Ϊ���������ύ
			var keywordele = document.getElementById("namesn");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("������ؼ��ʣ�Ȼ���ύ");
				return false;
			}
			keyword = keywordele.value;
			//2���õ��û��������ֶ�,Ĭ��ΪTitle
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "Title";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3������XML�ַ���<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="docclass=%��ʷ�ٿ�%";
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
		//��ֱ����������
		function getParameter_DJ_ZZDJ(channel)
		{
			var basenames = gj_basenames;
			//1���õ��û�����Ĺؼ��ʣ�Ϊ���������ύ
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("������ؼ��ʣ�Ȼ���ύ");
				return false;
			}
			keyword = keywordele.value;
			//2���õ��û��������ֶ�,Ĭ��ΪTitle
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "CONTENT";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3������XML�ַ���<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=��ֱ������";
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

		//�й���������Ҫ�������
		function getParameter_DJ_ZYHY(channel)
		{
			var basenames = gj_basenames;
			//1���õ��û�����Ĺؼ��ʣ�Ϊ���������ύ
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("������ؼ��ʣ�Ȼ���ύ");
				return false;
			}
			keyword = keywordele.value;
			//2���õ��û��������ֶ�,Ĭ��ΪTitle
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "CONTENT";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3������XML�ַ���<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=��ʷƵ��  and node_ids =%176588%";
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
		//��ֱ����������
		function getParameter_DJ_CONGRESS(channel)
		{
			var basenames = gj_basenames;
			//1���õ��û�����Ĺؼ��ʣ�Ϊ���������ύ
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("������ؼ��ʣ�Ȼ���ύ");
				return false;
			}
			keyword = keywordele.value;
			//2���õ��û��������ֶ�,Ĭ��ΪTitle
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "CONTENT";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3������XML�ַ���<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=�������� and node_ids =%64168%";
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

		//���������о�����վ����
		function getParameter_DJ_WXYJS(channel)
		{
			var basenames = gj_basenames;
			//1���õ��û�����Ĺؼ��ʣ�Ϊ���������ύ
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("������ؼ��ʣ�Ȼ���ύ");
				return false;
			}
			keyword = keywordele.value;
			//2���õ��û��������ֶ�,Ĭ��ΪTitle
			var searchfield= document.searchForm.searchfield.value;
			
			//3������XML�ַ���<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=���������о�����վ";
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
		//Ϊ�˸������о�����վ���ҳ�������ӵķ���
		function search_wxyjs()
		{
			var channel = document.searchForm.channel.value;
			getParameter_DJ_WXYJS(channel);
		}

		//�������׳��������
		function getParameter_DJ_ZYWXPRESS(channel)
		{
			var basenames = gj_basenames;
			//1���õ��û�����Ĺؼ��ʣ�Ϊ���������ύ
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("������ؼ��ʣ�Ȼ���ύ");
				return false;
			}
			keyword = keywordele.value;
			//2���õ��û��������ֶ�,Ĭ��ΪTitle
			var searchfield= document.searchForm.searchfield.value;
			
			//3������XML�ַ���<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=���������о�����վ and docclass=%���׳�����%";
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
		//Ϊ�˸��������׳��������ҳ�������ӵķ���
		function search_zywxpress()
		{
			var channel = document.searchForm.channel.value;
			getParameter_DJ_ZYWXPRESS(channel);
		}
		
		
		
		//����ר�Ҽ�����������Ƶ���м���
		function getParameter_DJ_LLGCJ(channel)
		{
			var basenames = gj_basenames;
			//1���õ��û�����Ĺؼ��ʣ�Ϊ���������ύ
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("������ؼ��ʣ�Ȼ���ύ");
				return false;
			}
			keyword = keywordele.value;
			//2���õ��û��������ֶ�,Ĭ��ΪTitle
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "CONTENT";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3������XML�ַ���<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="class3=����";
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

		//����������
		function getParameter_DJ_DJALK(channel)
		{
			var basenames = gj_basenames;
			//1���õ��û�����Ĺؼ��ʣ�Ϊ���������ύ
			var keywordele = document.getElementById("names");
			var keyword = "";
			if(keywordele.value == "")
			{
				alert("������ؼ��ʣ�Ȼ���ύ");
				return false;
			}
			keyword = keywordele.value;
			//2���õ��û��������ֶ�,Ĭ��ΪTitle
			var searchfieldeles = document.getElementsByName("SearchField");
			var searchfieldele = false;
			var searchfield = "CONTENT";
			for(var i=0;i<searchfieldeles.length;i++)
			{
				searchfieldele = searchfieldeles[i];
				if(searchfieldele.checked)
					searchfield = searchfieldele.value;
			}
			
			//3������XML�ַ���<RMW><BASENAMES></BASENAMES><KEYWORD></KEYWORD><SEARCHFIELD></SEARCHFIELD></RMW>
			var xmllist = "";
			var otherwhere="docclass=%����������%";
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
		