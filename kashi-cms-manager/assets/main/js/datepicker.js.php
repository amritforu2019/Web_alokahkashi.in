<script type="text/javascript" src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<script type="text/javascript">

$('#sandbox-container input').datepicker({

format: "yyyy-mm-dd",

todayHighlight: true,

autoclose: true

});



$('#sandbox-container1 input').datepicker({

format: "yyyy-mm-dd",

todayHighlight: true,

endDate: '+0d',

autoclose: true

});



$('#sandbox-container2 input').datepicker({

format: "yyyy-mm-dd",

todayHighlight: true,

startDate: '-0d',

autoclose: true

});

</script>
