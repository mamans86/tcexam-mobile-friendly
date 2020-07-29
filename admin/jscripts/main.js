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
/**
$str = $("span#user-answer").text();
$str2 = $("ol.question").html();
//$str = 'this is a [b]bolded[/b] and [i]italic[/i] string';

// The array of regex patterns to look for
$format_search =  [
    /\[img\](.*?)\[\/img\]/ig,
	/\[b\](.*?)\[\/b\]/ig,
    /\[i\](.*?)\[\/i\]/ig,
    /\[u\](.*?)\[\/u\]/ig
]; // note: NO comma after the last entry

// The matching array of strings to replace matches with
$format_replace = [
    '<img src="$1" />',
	'<strong>$1</strong>',
    '<em>$1</em>',
    '<span style="text-decoration: underline;">$1</span>'
];

// Perform the actual conversion
for (var i =0;i<$format_search.length;i++) {
  $str = $str.replace($format_search[i], $format_replace[i]);
}
for (var i =0;i<$format_search.length;i++) {
  $str2 = $str2.replace($format_search[i], $format_replace[i]);
}
$("span#user-answer").html($str);
$("ol.question").html($str2);**/