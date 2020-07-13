$("span#mmCloseBtn").click(function(){
	$("div#scrollayer").toggle();
});
$("a.white").parent().css({"visibility":"hidden","height":"0"});

$("span.active").parents().eq(1).show();

$("ul.menu li a").click(function(){
	$(this).next("ul").slideToggle();
	$("ul.menu li a").not(this).next("ul").slideUp();
});

$("div.pagehelp").prepend("<i class='fas fa-info info-icon'></i>");