var auto_refresh = setInterval(
function()
    {
    $('#reff').fadeOut().load('ref.php').fadeIn();

    }, 10000);
$(document).ready(function(){
	$(".box").hide();
	$(".click").click(function(){
    $(".box").slideToggle("slow");
  });
});