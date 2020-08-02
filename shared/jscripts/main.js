function menuOpen(){
	$("#scrollayer").animate({left:"0"},300);
}

function menuClose(){
	$("#scrollayer").animate({left:"-300px"});
}

function qlistOpen(){
	$("#qlistContID").animate({right:"0px"});
}

function qlistHide(){
	$("#qlistContID").animate({right:"-350px"});
}

function userInfoOpen(){
	$("#userInfoID").animate({right:"0px"});
}

function userInfoHide(){
	$("#userInfoID").animate({right:"-350px"});
}

function langSelOpen(){
	$("#langSelID").animate({right:"0px"});
}

function langSelHide(){
	$("#langSelID").animate({right:"-350px"});
}

function commentOpen(){
	$("span.testcomment").animate({top:"0px"});
}

function commentHide(){
	$("span.testcomment").animate({top:"-147px"});
}

function infoToggle(){
	$("h1#h1_testpage").slideToggle();
	$("div#infolinkCont").slideToggle();
}
$("span#close_btn").click(function(){
	$(this).parent().hide();
});
$("span.infolink a").append('&nbsp;&nbsp;<i class="fas fa-window-restore"></i>');

var answTxt = $("div#hiddenAnswerText").html();
$("textarea#answertext").val(answTxt);

$("a#btn_uploadFile").click(function(){
	$("a#imgProblem").removeClass("hidden");
	
});

$("a#imgProblem").click(function(){
	$(this).addClass("hidden");
});

$("input#cancel").click(function(){
	event.preventDefault();
	//$("div.confirmbox").hide();
	//$("div.warning").hide();
	 window.history.back();
});

$("div#h_fileAction").click(function(){
	$("div#c_fileAction").toggle();
});

//$("div#nosoalCont").prependTo("div#timerdiv");
$("span#nosoal").appendTo("div#nosoalTop").show();
$("span#qlistShow").appendTo("div#qlistTop").show();

$("div.pagehelp").prepend("<div><i class='fas fa-info-circle'></i></div>");