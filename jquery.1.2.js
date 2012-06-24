var auto_refresh = setInterval(
function()
{
$('#reff').fadeOut('slow').load('ref.php').fadeIn("slow");
}, 60000);
$(document).ready(function(){
	$(".box").hide();
	$(".click").click(function(){
    $(".box").slideToggle("slow");
  });
});