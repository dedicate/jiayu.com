function Selecter(listId/*list id*/){
    this.list =document.getElementById(listId) ;
    this.selectedElement=null;
    this.state = false;

    this.changeListState = function(event){
        var e = event ? event : window.event;
        this.selectedElement = e.srcElement || e.target ;
        this.list.style.left = this.selectedElement.offsetLeft + "px" ;
        this.list.style.top = (this.selectedElement.offsetTop+22) + "px";
        this.list.style.display=this.list.style.display=="block"?"none":"block";
    };
    this.changeSelected = function(option,event){
        this.selectedElement.innerHTML=option.innerHTML;
        var value = option.getAttribute("value") ;
        document.getElementById(this.selectedElement.id+"_value").value=value;
        this.changeListState(event);
    };
	this.changeSelected1 = function(option,event){
        this.selectedElement.innerHTML=option.innerHTML;
        var value = option.getAttribute("value") ;
        document.getElementById(this.selectedElement.id+"_value").value=value;
        this.changeListState(event);
    };
    this.hiddenList = function(){
        if(!this.state)
            this.list.style.display="none";
    };
};
var s ;
function Selecter1(listId/*list id*/){
    this.list =document.getElementById(listId) ;
    this.selectedElement=null;
    this.state = false;

    this.changeListState = function(event){
        var e = event ? event : window.event;
        this.selectedElement = e.srcElement || e.target ;
        this.list.style.left = this.selectedElement.offsetLeft + "px" ;
        this.list.style.top = (this.selectedElement.offsetTop+22) + "px";
        this.list.style.display=this.list.style.display=="block"?"none":"block";
    };
    this.changeSelected = function(option,event){
        this.selectedElement.innerHTML=option.innerHTML;
        var value1 = option.getAttribute("value") ;
        document.getElementById(this.selectedElement.id+"_value").value=value1;
        this.changeListState(event);
    };
    this.hiddenList = function(){
        if(!this.state)
            this.list.style.display="none";
    };
};
var v;
function Selecter2(listId/*list id*/){
    this.list =document.getElementById(listId) ;
    this.selectedElement=null;
    this.state = false;

    this.changeListState = function(event){
        var e = event ? event : window.event;
        this.selectedElement = e.srcElement || e.target ;
        this.list.style.left = this.selectedElement.offsetLeft + "px" ;
        this.list.style.top = (this.selectedElement.offsetTop+22) + "px";
        this.list.style.display=this.list.style.display=="block"?"none":"block";
    };
    this.changeSelected = function(option,event){
        this.selectedElement.innerHTML=option.innerHTML;
        var value1 = option.getAttribute("value") ;
        document.getElementById(this.selectedElement.id+"_value").value=value1;
        this.changeListState(event);
    };
    this.hiddenList = function(){
        if(!this.state)
            this.list.style.display="none";
    };
};
var e;
function Selecter4(listId/*list id*/){
    this.list =document.getElementById(listId) ;
    this.selectedElement=null;
    this.state = false;

    this.changeListState = function(event){
        var e = event ? event : window.event;
        this.selectedElement = e.srcElement || e.target ;
        this.list.style.left = this.selectedElement.offsetLeft + "px" ;
        this.list.style.top = (this.selectedElement.offsetTop+22) + "px";
        this.list.style.display=this.list.style.display=="block"?"none":"block";
    };
    this.changeSelected = function(option,event){
        this.selectedElement.innerHTML=option.innerHTML;
        var value1 = option.getAttribute("value") ;
        document.getElementById(this.selectedElement.id+"_value").value=value1;
        this.changeListState(event);
    };
    this.hiddenList = function(){
        if(!this.state)
            this.list.style.display="none";
    };
};
var g;
//
function showNew(n){
	for(var i=1;i<=19;i++){
		var curCon=document.getElementById("new_"+i);
		var curBtn=document.getElementById("newc_"+i);
		if(n==i){
			curBtn.style.display="block";
			curCon.className="one"
		}else{
			curBtn.style.display="none";
			curCon.className="";			
		}
	}
}
function showNew1(n){
	for(var i=1;i<=3;i++){
		var curCon=document.getElementById("new1_"+i);
		var curBtn=document.getElementById("newc1_"+i);
		if(n==i){
			curBtn.style.display="block";
			curCon.className="one";
			
		}else{
			curBtn.style.display="none";
			curCon.className="";			
		}
	}
}
function showNew2(n){
	for(var i=1;i<=2;i++){
		var curCon=document.getElementById("new2_"+i);
		var curBtn=document.getElementById("newc2_"+i);
		if(n==i){
			curBtn.style.display="block";
			curCon.className="";
			
		}else{
			curBtn.style.display="none";
			curCon.className="one";			
		}
	}
}
function showNew3(n){
	for(var i=1;i<=7;i++){
		var curCon=document.getElementById("new3_"+i);
		var curBtn=document.getElementById("newc3_"+i);
		if(n==i){
			curBtn.style.display="block";
			curCon.className="one";
			
		}else{
			curBtn.style.display="none";
			curCon.className="";			
		}
	}
}
function showNew4(n){
	for(var i=1;i<=8;i++){
		var curCon=document.getElementById("new4_"+i);
		var curBtn=document.getElementById("newc4_"+i);
		if(n==i){
			curBtn.style.display="block";
			curCon.className="one";
			
		}else{
			curBtn.style.display="none";
			curCon.className="";			
		}
	}
}
function showtools(n){
	for(var i=1;i<=6;i++){
		var curCon=document.getElementById("tools_"+i);
		var curBtn=document.getElementById("toolsc_"+i);
		if(n==i){
			curBtn.style.display="block";
			curCon.className="one";
			
		}else{
			curBtn.style.display="none";
			curCon.className="";			
		}
	}
}
function showblog(n){
	for(var i=1;i<=2;i++){
		var curCon=document.getElementById("blog_"+i);
		var curBtn=document.getElementById("blogc_"+i);
		if(n==i){
			curBtn.style.display="block";
			curCon.className="one";
			
		}else{
			curBtn.style.display="none";
			curCon.className="";			
		}
	}
}
