<%
'����Ϊ�ɸ���������
'======================================================================
'E��������վϵͳ���ݱ���
Const db_EC_Attach_Table = "[EC_attach]"		'ճ��[�ϴ�]�ļ���Ϣ��X
Const db_EC_BigClass_Table = "[EC_BigClass]"	'�����X
Const db_EC_Board_Table = "[EC_board]"		'�������Ϣ��X
Const db_EC_Dep_Table = "[EC_dep]"			'������Ϣ��X
Const db_EC_Link_Table = "[EC_link]"		'����������Ϣ��X
Const db_EC_News_Table = "[EC_News]"		'ͼ��ϵͳ��Ϣ��X
Const db_NewsFile_Table = "[newsfile]"	'���޵���-----------------
Const db_EC_Review_Table = "[EC_Review]"		'������Ϣ��X
Const db_EC_Complain_Table = "[EC_Complain]"		'Ͷ����Ϣ��X
Const db_EC_LeadMail_Table = "[EC_LeadMail]"		'�г������X
Const db_EC_Opinion_Table = "[EC_Opinion]"		'�г������X
Const db_EC_Approve_Table = "[EC_Approve]"		'���������X
Const db_EC_SmallClass_Table = "[EC_smallclass]"	'С���X
Const db_EC_Special_Table = "[EC_Special]"		'ר����Ϣ��X
Const db_EC_System_Table = "[EC_System]"		'ϵͳ������Ϣ��X
Const db_EC_Type_Table = "[EC_type]"		'�ļ�������Ϣ��X
Const db_UploadPic_Table = "[uploadpic]"	'�����ļ�������Ϣ��
Const db_EC_Vote_Table = "[EC_vote]"		'ͶƱ��Ϣ��
Const db_EC_Manage_Table = "[EC_Admin]"		'��̨���ù����û���
'======================================================================
'E��������վϵͳ�뱻����ϵͳ���õ��û����ݱ�
Const db_User_Table = "[EC_User]"		'������ϵͳ���õ��û���
						'����7.1 Ϊ   [Dv_User]
						'��������ֵΪ [EC_User]
'======================================================================
'E��������վϵͳ�붯����̳���õ��û��ֶ���
Const db_User_ID = "UserID"			'ID		�û�ID��
Const db_User_Name = "UserName"			'UserName	�û���¼��
Const db_User_Sex = "UserSex"			'sex		�û��Ա�[����=1 Ůʿ=0]
Const db_User_Email = "UserEmail"		'email		�û���������
Const db_User_Password = "UserPassword"		'PassWD	�û���¼����
Const db_User_Question = "UserQuestion"		'question	�û�����
Const db_User_Answer = "UserAnswer"		'answer	�û��ش�
Const db_User_Face = "UserFace"			'photo		�û���Ƭ�ļ�·��
Const db_User_RegDate = "JoinDate"		'dateandtime	�û�ע��ʱ��
Const db_User_LoginTimes = "UserLogins"		'logins	�û���¼����
Const db_User_LastLoginTime = "lastlogin"	'lastlogin	�û����һ�ε�¼ʱ��
Const db_User_LastLoginIP = "UserLastIP"	'IP		�û������¼IP
Const db_User_birthday = "UserBirthday"		'birthday	�û����գ�����������
Const db_User_FaceWidth = "UserWidth"		'�û�ͷ����
Const db_User_FaceHeight = "UserHeight"		'�û�ͷ��߶�

'======================================================================
'E��������վϵͳ�����û��ֶ�����һ�㲻Ҫ�޸ģ�
Const db_ManageUser_ID = "ID"				'ID		�����û�ID��
Const db_ManageUser_Name = "UserName"			'UserName	�����û���¼��
Const db_ManageUser_Sex = "sex"			'sex		�����û��Ա�[����=1 Ůʿ=0]
Const db_ManageUser_Email = "email"			'email		�����û���������
Const db_ManageUser_Password = "Passwd"		'PassWD	�����û���¼����
Const db_ManageUser_Question = "question"		'question	�����û�����
Const db_ManageUser_Answer = "answer"			'answer	�����û��ش�
Const db_ManageUser_Face = "photo"			'photo		�����û���Ƭ�ļ�·��
Const db_ManageUser_RegDate = "dateandtime"		'dateandtime	�����û�ע��ʱ��
Const db_ManageUser_LoginTimes = "logins"		'logins	�����û���¼����
Const db_ManageUser_LastLoginTime = "lastlogin"	'lastlogin	�����û����һ�ε�¼ʱ��
Const db_ManageUser_LastLoginIP = "IP"		'IP		�����û������¼IP
Const db_ManageUser_birthday = "birthday"		'birthday	�����û����գ�����������
'----------------------------------------------------------------------
'E��������վϵͳ�����ֶ�
Const db_User_birthyear = "birthyear"		'ԭ������
Const db_User_birthmonth = "birthmonth"		'ԭ������
Const ReadNews_CopyRight_Logo = "images/logo.gif"	'�����Ķ���Ȩ��ʶ
'======================================================================
'�ۺ�������

Const eChuang = "eChuang2004-2010"	'��װ���к�

dim UserTableType,FileUploadPath,BbsPath
UserTableType = "EChuang"	    			'���϶�����̳��ֵΪ"Dvbbs"
						'��������ֵΪ"EChuang"
						'---------------------------------
FileUploadPath = "uploadfile/"			'ͼ��ϵͳ�ļ��ϴ�·��[��������]
						'---------------------------------
BbsPath = "bbs/"				'BBS����ڱ�ϵͳ��Ŀ¼,������"/"
ScrollClick = "double"				'�������Զ���������¼���ʽ,"double"Ϊ˫���Զ�������ʽ,
						'����ֵ��Ϊ��������϶���ʽ��
mouse_wheel_zoom="off"				'����ͼƬ����������,"on"Ϊ��������Ч��,"off"Ϊ������
TransShow="off"					'ҳ���л�Ч����"on"Ϊ�����л�Ч��,"off"Ϊ������
eWebEditor="0"					'�Ƿ�����eWebEditor������E��ԭ�༭����ֵΪ"1"ʱ���ã�����ֵΪ�����á�
IsDebug="0"							'�Ƿ�Ϊ����ģʽ��ֵΪ"1"ʱ����,����ֵΪ������.
'=======================================================================
'����Ϊ�ɸ���������

'=======================================================================
'������Ϣһ��������������
'=======================================================================
dim db_Sex_select , db_Birthday_Select , FaceUploadPath , db_Set_Table , db_Forum_UserNum , db_Form_lastUser

if UserTableType = "EChuang" then
	'------------����ѡ��------------		========================================
	db_Sex_Select = "EChuang"			'�Ա��ֶ�����ѡ���ҪΪ����ԭͼ��ϵͳ������ϵͳ
							'��������ֵΪ "EChuang",Ϊ�ı���
							'E��������վϵͳԭ�û��Ա��ֶ�����Ϊ�ı���
							'---------------------------------------
	db_Birthday_Select = "EChuang"			'�����ֶμ���ѡ��
							'��������ֵΪ "EChuang",Ϊһ�����������ڵ��ı����ֶ�,
							'����birthyear��birthmonth�ֶ���ϣ��γ�������������
							'=======================================
	FaceUploadPath = "uploadfile/face/"		'ͷ���ϴ�Ŀ¼,������"/"
							'��������ֵΪ "uploadfile/face/"
							'E��������վ�����ͷ��·��
							'---------------------------------
else
	if UserTableType = "Dvbbs" then
		'E��������վϵͳ V1.0Finish���붯����̳�������ݿ��BBS���ò�����
		db_Set_Table = "[Dv_Setup]"
							'------------DVBBS���ò�������-------------
		db_Forum_UserNum = "Forum_UserNum"	'��̳���û���
		db_Forum_lastUser = "Forum_lastUser"	'��̳���ñ�����ע���û�

		'------------����ѡ��------------	========================================
		db_Sex_Select = "Number"		'�Ա��ֶ�����ѡ���ҪΪ����ԭͼ��ϵͳ������ϵͳ
							'����ϵͳ��ֵΪ "Number",Ϊ������
							'�����û��Ա��ֶ�����Ϊ��ֵ��
							'---------------------------------------
		db_Birthday_Select = "Text"	'�����ֶμ���ѡ��
							'����ϵͳ��ֵΪ "Text",Ϊ���������յ�һ���ı����ֶ�
							'=======================================
		FaceUploadPath = "UploadFace/"		'ͷ���ϴ�Ŀ¼,������"/"
							'���϶�����Ϊ"UploadFace/",�����BBS��װĿ¼
							'---------------------------------
	end if
end if

''============================================
''����ΪԭE��������վϵͳ V6.0������
''============================================
Set rs9 = Server.CreateObject("ADODB.Recordset")
sql9 ="SELECT * From "& db_EC_System_Table &""
RS9.open sql9,Conn,3,3

xpurl = rs9("xpurl")
email = rs9("email")
QQ = rs9("QQ")
copyright = rs9("copyright")
Address = rs9("Address")
Zip = rs9("Zip")
Tel = rs9("Tel")
version = rs9("version")
ver = rs9("ver")
logo = rs9("logo")
logourl = rs9("logourl")
TopBanner = rs9("TopBanner")
TopBannerurl = rs9("TopBannerurl")
OtherTopBanner = rs9("OtherTopBanner")
OtherTopBannerurl = rs9("OtherTopBannerurl")
moveurl = rs9("moveurl")
bgcolor = rs9("bgcolor")
bgimg = rs9("bgimg")
zs = rs9("zs")
zs1 = rs9("zs1")
zs2 = rs9("zs2")
reg = rs9("reg")
inputmodpwd = rs9("inputmodpwd")
upload = rs9("upload")
fabiao = rs9("fabiao")
fabiaomod = rs9("fabiaomod")
fabiaocheck = rs9("fabiaocheck")
gd1 = rs9("gd1")
gd2 = rs9("gd2")
checkmod = rs9("checkmod")
checkdel = rs9("checkdel")
smallgl = rs9("smallgl")
specialgl = rs9("specialgl")
usecheck =rs9("usecheck")
system = rs9("system")
css = rs9("css")
init = rs9("init")
delreview = rs9("delreview")
shsmallgl = rs9("shsmallgl")
shspecialgl = rs9("shspecialgl")
shdelreview = rs9("shdelreview")
reviewable = rs9("reviewable")
modnewsable = rs9("modnewsable")
checkshow = rs9("checkshow")
showuser = rs9("showuser")
showmove = rs9("showmove")
search = rs9("search")
showsearch = rs9("showsearch")
showspecial = rs9("showspecial")
showdata = rs9("showdata")
showauthor = rs9("showauthor")
showclub = rs9("showclub")
showlink = rs9("showlink")
showlinkmap = rs9("showlinkmap")
showvote = rs9("showvote")
showcount = rs9("showcount")
linkreg = rs9("linkreg")
linkpass = rs9("linkpass")
linkmana = rs9("linkmana")
votemana = rs9("votemana")
powermana = rs9("powermana")
depmanage = rs9("depmanage")
ggmanage = rs9("ggmanage")
lymanage = rs9("lymanage")
plmanage = rs9("plmanage")
mailmanage = rs9("mailmanage")
complainmanage= rs9("complainmanage")
opininomanage= rs9("opininomanage")
showip = rs9("showip")
reviewcheck = rs9("reviewcheck")
reviewcheckshow = rs9("reviewcheckshow")
LeadMailCheckShow = rs9("LeadMailCheckShow")
OpinionCheckShow = rs9("OpinionCheckShow")
showyear = rs9("showyear")
showtime = rs9("showtime")
showclick = rs9("showclick")
shownum = rs9("shownum")
freetime = rs9("freetime")
uselevel = rs9("uselevel")
uploadtype = rs9("uploadtype")

top_news = rs9("top_news")
bigclassshownum = rs9("bigclassshownum")
top_sp = rs9("top_sp")
top_txt = rs9("top_txt")
top_img = rs9("top_img")
topuser = rs9("topuser")
linkshownum = rs9("linkshownum")
reviewnum = rs9("reviewnum")

topbg = rs9("topbg")
topfont = rs9("topfont")
t_bg = rs9("t_bg")
b_bg = rs9("b_bg")
T_m_bg = rs9("T_m_bg")
l_BG = rs9("l_BG")
l_top = rs9("l_top")
l_main = rs9("l_main")
E_announceview=rs9("E_announceview")
m_main = rs9("m_main")
m_top = rs9("m_top")
r_top = rs9("r_top")
r_BG = rs9("R_BG")
AD_Show = rs9("AD_Show")
ad_class = rs9("ad_class")
r_main = rs9("r_main")
border = rs9("border")

gg = rs9("gg")
gg1 = rs9("gg1")
eChSys = rs9("SiteName")
PicNum = rs9("picnum")			'����ͼƬJS���ŵ�����
newsNum = rs9("newsnum")		'����һ��JS���ŵ�����
rs9.close
set rs9 = nothing
%>