$(document).ready(function() {
 	 $("#reff").load("ref.php");
   var refreshId = setInterval(function() {
      $("#reff").load('ref.php');
   }, 6000);
   $.ajaxSetup({ cache: false });
});
$(document).ready(function(){
	$(".box").hide();
	$(".click").click(function(){
    $(".box").slideToggle("slow");
  });
});