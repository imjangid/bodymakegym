$(".profile").addClass("pre-enter");
setTimeout(function(){
	$(".profile").addClass("on-enter");
}, 500);
setTimeout(function(){
	$(".profile").removeClass("pre-enter on-enter");
}, 3000);

var snd = new Audio("voice/gandu.m4a");
$(".gandu").hover(function(){
	console.log("here");
	snd.play();

})