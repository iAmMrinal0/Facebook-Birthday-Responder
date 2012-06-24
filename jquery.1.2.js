var reload = function(){
    $('#reff').fadeOut().load('ref.php').fadeIn();
};

var auto_refresh = setInterval(reload, 10000);

$('.clickit').click(function(){
    clearInterval(auto_refresh);
});
$(document).ready(function(){
	$(".box").hide();
	$(".click").click(function(){
    $(".box").slideToggle("slow");
  });
});