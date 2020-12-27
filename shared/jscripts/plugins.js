function backdrop(bd){
	var bdDiv = document.querySelector(".backdrop");
	if(bd==="1"){bdDiv.style.display = "block"}else{bdDiv.style.display = "none"}
	bdDiv.style.zIndex = bd;
}

var noSoal = document.getElementById("nosoal");
var noSoalTop = document.getElementById("nosoalTop");
if(noSoal){noSoalTop.appendChild(noSoal);noSoal.style.display = "block"}

var qlistShow = document.getElementById("qlistShow");
var qlistTop = document.getElementById("qlistTop");
if(qlistShow){qlistTop.appendChild(qlistShow);qlistShow.style.display = "flex"}

var scrolLayer = document.getElementById("scrollayer");
function menuOpen(){scrolLayer.setAttribute("class","slide-in-header");backdrop("1")}
function menuClose(){var slideInHeader = document.querySelector(".slide-in-header");if(slideInHeader){scrolLayer.setAttribute("class","slide-out-header");backdrop("-1")}}

var qlistContID = document.getElementById("qlistContID");
function qlistOpen(){qlistContID.setAttribute("class","tcecontentbox qlistCont slide-in-qlist");backdrop("1")}
function qlistHide(){var slideInQlist = document.querySelector(".slide-in-qlist");if(slideInQlist){qlistContID.setAttribute("class","tcecontentbox qlistCont slide-out-qlist");backdrop("-1")}}

var langSelID = document.getElementById("langSelID");
function langSelOpen(){langSelID.setAttribute("class","qlistCont slide-in-langsel");backdrop("1")}
function langSelHide(){var slideInLangsel = document.querySelector(".slide-in-langsel");if(slideInLangsel){langSelID.setAttribute("class","qlistCont slide-out-langsel");backdrop("-1")}}

var userInfoID = document.getElementById("userInfoID");
function userInfoOpen(){userInfoID.setAttribute("class","qlistCont slide-in-userIID");backdrop("1")}
function userInfoHide(){var slideInUserIID = document.querySelector(".slide-in-userIID");if(slideInUserIID){userInfoID.setAttribute("class","qlistCont slide-out-userIID");backdrop("-1")}}

var testComment = document.querySelector(".testcomment");
function commentOpen(){testComment.setAttribute("class","testcomment slide-in-comment");backdrop("1")}
function commentHide(){var slideInComment = document.querySelector(".slide-in-comment");if(slideInComment){testComment.setAttribute("class","testcomment slide-out-comment");backdrop("-1")}}

var h1_testpage = document.getElementById("h1_testpage");
var infolinkCont = document.getElementById("infolinkCont");
function infoToggle(){
	if(h1_testpage.style.display==="block"){	
		h1_testpage.style.display = "none";
	}else{
		h1_testpage.style.display = "block";
	}

	if(infolinkCont.style.display==="block"){
		infolinkCont.style.display = "none";
	}else{
		infolinkCont.style.display = "block";
	}
}

var close_btn = document.getElementById("close_btn");
if(close_btn){
	close_btn.addEventListener("click", function() {
		close_btn.parentNode.style.display = "none";	
	})
}

var iCancel = document.getElementById("cancel");
if(iCancel){
	iCancel.addEventListener("click", function() {
		event.preventDefault();window.history.back()		
	})
}

var hiddenAnswerText = document.getElementById("hiddenAnswerText");
if(hiddenAnswerText){
	hiddenAnswerText = hiddenAnswerText.innerHTML;
}

var answertext = document.getElementById("answertext");
if(answertext){answertext.value = hiddenAnswerText}

var imgProblem = document.getElementById("imgProblem");
if(imgProblem){
	imgProblem.addEventListener("click", function() {
		imgProblem.setAttribute("class","hidden");
	})
}

var btn_uploadFile = document.getElementById("btn_uploadFile");
if(btn_uploadFile){
	btn_uploadFile.addEventListener("click", function() {
		imgProblem.removeAttribute("class");
	})
}

function qNumUnsureStyle(){
	noSoal.style.color = "#313131";
	noSoal.style.background = "#FFEB3B";
	noSoal.style.border = "1px solid #607D8B";
	noSoal.style.textShadow = "none";
}

var fTestForm = document.getElementById("testform");
function addUnsure(){
	if(fTestForm){
		let unsure;		
		if(localStorage.getItem('unsure') === null){
			unsure = [];
		}else{
			unsure = JSON.parse(localStorage.getItem('unsure'));
		}
		unsure.push(index);
		localStorage.setItem('unsure', JSON.stringify(unsure));
	}
}

function removeUnsure(){
	if(fTestForm){
		var index = document.getElementById("nosoal").textContent.replace(/\D/g,'')-1;
		let unsure;
		if(localStorage.getItem('unsure') === null){
			unsure = [];
		}else{
			unsure = JSON.parse(localStorage.getItem('unsure'));
		}
		for(var i = 0; i < unsure.length;){
			if(unsure[i] === index){
				unsure.splice(i, 1);
			}else{
				i++;
			}
		}
		localStorage.setItem('unsure', JSON.stringify(unsure));
	}
}

function setUnsureLiBg(a){
	// document.querySelectorAll("ol.qlist li")[a].firstElementChild.style.setProperty("color","#313131","important");
	// document.querySelectorAll("ol.qlist li")[a].firstElementChild.style.setProperty("background","#ffeb3b","important");
	document.querySelectorAll("ol.qlist li")[a].firstElementChild.style.setProperty("background-image","linear-gradient(45deg, transparent 2.5em, #FFEB3B 2.5em)","important");
}
function resetUnsureLiBg(a){
	document.querySelectorAll("ol.qlist li")[a].firstElementChild.removeAttribute("style");
}

var lblUnsure = document.getElementById("lblUnsure");
var cbUnsure = document.getElementById("cbUnsure");
if(cbUnsure){
	var index = document.getElementById("nosoal").textContent.replace(/\D/g,'')-1;
	cbUnsure.addEventListener("change", function() {
		if(cbUnsure.checked){
			qNumUnsureStyle();
			addUnsure();
			setUnsureLiBg(index);			
		}else{
			noSoal.setAttribute("style","display:block");
			removeUnsure();
			resetUnsureLiBg(index);
		}
	})
}

if(localStorage.getItem('unsure') && fTestForm){
	const unsures = JSON.parse(localStorage.getItem('unsure'));
	unsures.forEach(el => {
		//var currNo = document.getElementById("qNum").textContent-1;
		if(index===el){
			qNumUnsureStyle();
			cbUnsure.setAttribute("checked","checked");
		}
	  setUnsureLiBg(el);
	});
}

var h_fileAction = document.getElementById("h_fileAction");
var c_fileAction = document.getElementById("c_fileAction");
if(h_fileAction){
	h_fileAction.addEventListener("click", function() {
		if(c_fileAction.style.display==="block"){	
			c_fileAction.style.display = "none";
		}else{
			c_fileAction.style.display = "block";
		}
	})
}

function clearUnsure(){
	localStorage.setItem('unsure', '[]');
}

function darkMode(){
	if(fTestForm){
		var questionBlock = document.querySelector(".question-block");
		var lightModeBtn = document.getElementById("lightModeBtn");
		var darkModeBtn = document.getElementById("darkModeBtn");
		document.body.style.background = "#323232";
		fTestForm.style.background = "#323232";
		questionBlock.style.color = "#fff";
		darkModeBtn.style.display = "none";
		lightModeBtn.style.display = "block";
		localStorage.setItem("darkMode","1")
	}
}

function lightMode(){
	if(fTestForm){
		var questionBlock = document.querySelector(".question-block");
		var lightModeBtn = document.getElementById("lightModeBtn");
		var darkModeBtn = document.getElementById("darkModeBtn");
		document.body.removeAttribute("style");
		fTestForm.removeAttribute("style");
		questionBlock.removeAttribute("style");
		darkModeBtn.style.display = "block";
		lightModeBtn.style.display = "none";
		localStorage.setItem("darkMode","0")
	}
}

if(fTestForm){
	var lsDarkMode = localStorage.getItem("darkMode");
	if(lsDarkMode){
		if(lsDarkMode==="1"){
			document.getElementById("darkModeBtn").style.display = "none";
			document.getElementById("lightModeBtn").style.display = "block";
			darkMode()
		}else{
			document.getElementById("darkModeBtn").style.display = "block";
			document.getElementById("lightModeBtn").style.display = "none";
			lightMode()
		}
	}
}

if(fTestForm){
	var lsFontSize = localStorage.getItem("fontSize");
	if(lsFontSize){
		document.querySelector(".tcecontentbox").style.fontSize =lsFontSize+'px';
		if(document.querySelector(".answer")){
			document.querySelector(".answer").style.fontSize =lsFontSize+'px';
		}
	}
}

function zoomintext(){
	if(fTestForm){
		var fs=parseFloat(window.getComputedStyle(document.querySelector(".tcecontentbox")).fontSize);
		newfontSize=fs*(1.1);
		document.querySelector(".tcecontentbox").style.fontSize =newfontSize+'px';
		if(document.querySelector(".answer")){
			document.querySelector(".answer").style.fontSize =newfontSize+'px';
		}
		fontSize=newfontSize;
		localStorage.setItem("fontSize", fontSize);
	}
}
function zoomouttext(){
	if(fTestForm){
		var fs=parseFloat(window.getComputedStyle(document.querySelector(".tcecontentbox")).fontSize);
		newfontSize=fs/(1.1);
		document.querySelector(".tcecontentbox").style.fontSize =newfontSize+'px';
		if(document.querySelector(".answer")){
			document.querySelector(".answer").style.fontSize =newfontSize+'px';
		}
		fontSize=newfontSize;
		localStorage.setItem("fontSize", fontSize);
	}	
}

var showPass = document.getElementById("showPass");
var hidePass = document.getElementById("hidePass");
var xuser_password = document.getElementById("xuser_password");
if(showPass){
	showPass.addEventListener("click", function() {
		showPass.style.display = "none";	
		hidePass.style.display = "block";
		xuser_password.setAttribute("type","text");		
	})
}
if(hidePass){
	hidePass.addEventListener("click", function() {
		showPass.style.display = "block";	
		hidePass.style.display = "none";
		xuser_password.setAttribute("type","password");		
	})
}

function drawerClose(){menuClose();qlistHide();langSelHide();userInfoHide();commentHide()}