<script src="assets/plugins/webui/jquery.webui-popover.min.js"></script>
<script>
(function(){
    function initPopover(){
    $('a.show-pop-delay').webuiPopover('destroy').webuiPopover({trigger:'hover',width:150});
    $('a.show-pop-code-delay').webuiPopover('destroy').webuiPopover({
         trigger:'hover',
         width:150,
         delay:{
         show:0,
         hide:100
              }
          });
     }
        initPopover();
})();

</script>