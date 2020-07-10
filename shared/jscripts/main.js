function menuOpen(){
	$("#scrollayer").animate({left:"0"},300);
}

function menuClose(){
	$("#scrollayer").animate({left:"-300px"});
}

function msgClose(){
	$("#msg-modal").hide();
}

function qlistOpen(){
	$(".qlistCont").animate({right:"0px"});
}

function qlistHide(){
	$(".qlistCont").animate({right:"-350px"});
}
function commentOpen(){
	$("span.testcomment").animate({top:"0px"});
}

function commentHide(){
	$("span.testcomment").animate({top:"-147px"});
}

function infoToggle(){
	$("h1#h1_testpage").toggle();
	$("div#infolinkCont").toggle();
}

$("span.infolink a").append('&nbsp;&nbsp;<i class="fas fa-window-restore"></i>');