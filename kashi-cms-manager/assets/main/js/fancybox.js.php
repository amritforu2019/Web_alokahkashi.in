<!--<script type="text/javascript" src="assets/plugins/fancybox/jquery-1.10.1.min.js"></script>
--> 
<script type="text/javascript" src="assets/plugins/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript">
$(document).ready(function()
{
    $(".various").fancybox({
    	maxWidth	: 500,
		maxHeight	: 700,
    	fitToView	: true,
   	 	width		: '70%',
    	height		: '90%',
    	autoSize	: false,
    	closeClick	: false,
    	openEffect	: 'fade',
    	closeEffect	: 'fade'
    });
});

$(document).ready(function() 
{
	$(".various2").fancybox({
		maxWidth	: 1400,
		maxHeight	: 1200,
		fitToView	: false,
		width		: '90%',
		height		: '90%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'fade',
		closeEffect	: 'fade'
	});
});
		
$(document).ready(function() {
    $("a.grouped_elements").fancybox({
        maxWidth	: 900,
        maxHeight	: 700,
        fitToView	: false,
        width		: '100%',
        height		: '100%',
        autoSize	: false,
        closeClick	: false,
        openEffect	: 'fade',
        closeEffect	: 'fade'
    });
});
</script>