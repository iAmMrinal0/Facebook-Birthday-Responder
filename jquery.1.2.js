$(document).ready(function(){
	$(".box").hide();
	$(".click").click(function(){
    $(".box").slideToggle("slow");
  });
});

(function($)
{
    $(document).ready(function()
    {
        $.ajaxSetup(
        {
            cache: false,
            beforeSend: function() {
                $('#content').hide();
                $('#loading').show();
            },
            complete: function() {
                $('#loading').hide();
                $('#content').show();
            },
            success: function() {
                $('#loading').hide();
                $('#content').show();
            }
        });
        var $container = $("#content");
        $container.load("ref.php");
        var refreshId = setInterval(function()
        {
            $container.load('ref.php');
        }, 9000);
    });
})(jQuery);