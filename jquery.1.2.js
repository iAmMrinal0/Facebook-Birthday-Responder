$(document).ready(function(){
	$(".box").hide();
	$(".click").click(function(){
    $(".box").slideToggle("slow");
  });
});
var auto_refresh = setInterval(
function()
{
$('#reff').fadeOut('slow').load('http://bdayresponder.herokuapp.com/ref.php').fadeIn("slow");
}, 20000);