// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function () {};
  var methods = [
    'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
    'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());

// Place any jQuery/helper plugins in here.
var bd;
function backdrop(bd){
	var bdDiv=".backdrop";
	if(bd==="1"){
		$(bdDiv).show();
	}else{
		$(bdDiv).hide();
	}
	$(".backdrop").css({zIndex:bd})
}

function menuOpen(){$("#scrollayer").animate({left:"0"});backdrop("1")}
function menuClose(){$("#scrollayer").animate({left:"-300px"});backdrop("-1")}
function qlistOpen(){$("#qlistContID").animate({right:"0px"});backdrop("1")}
function qlistHide(){$("#qlistContID").animate({right:"-350px"});backdrop("-1")}
function userInfoOpen(){$("#userInfoID").animate({right:"0px"});backdrop("1")}
function userInfoHide(){$("#userInfoID").animate({right:"-350px"});backdrop("-1")}
function langSelOpen(){$("#langSelID").animate({right:"0px"});backdrop("1")}
function langSelHide(){$("#langSelID").animate({right:"-350px"});backdrop("-1")}
function commentOpen(){$("span.testcomment").animate({top:"0px"});backdrop("1")}
function commentHide(){$("span.testcomment").animate({top:"-147px"});backdrop("-1")}
function drawerClose(){menuClose();commentHide();langSelHide();userInfoHide();qlistHide()}

function infoToggle(){$("h1#h1_testpage").slideToggle();$("div#infolinkCont").slideToggle();}

$("span#close_btn").click(function(){$(this).parent().hide()});
$("span.infolink a").append('&nbsp;&nbsp;<i class="fas fa-window-restore"></i>');

var answTxt = $("div#hiddenAnswerText").html();
$("textarea#answertext").val(answTxt);

$("a#btn_uploadFile").click(function(){$("a#imgProblem").removeClass("hidden")});

$("a#imgProblem").click(function(){$(this).addClass("hidden")});

$("input#cancel").click(function(){event.preventDefault();window.history.back()});

$("div#h_fileAction").click(function(){$("div#c_fileAction").toggle()});

$("span#nosoal").appendTo("div#nosoalTop").show();
$("span#qlistShow").appendTo("div#qlistTop").show();

$("div.pagehelp").prepend("<div><i class='fas fa-info-circle'></i></div>");

$("#showPass").click(function(){$(this).toggle();$("#hidePass").toggle();$("#xuser_password").attr("type","text")});
$("#hidePass").click(function(){$(this).toggle();$("#showPass").toggle();$("#xuser_password").attr("type","password")});