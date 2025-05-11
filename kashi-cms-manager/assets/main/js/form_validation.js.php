<!-- Pace Loader Js -->
<script src="assets/plugins/pace/pace.js"></script>
<!-- iCheck Js -->
<script src="assets/plugins/iCheck/icheck.js"></script>
<!-- Screenfull Js -->
<script src="assets/plugins/screenfull/src/screenfull.js"></script>
<!-- Metis Menu Js -->
<script src="assets/plugins/metisMenu/dist/metisMenu.js"></script>
<!-- Jquery Slimscroll Js -->
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- Switchery Js -->
<script src="assets/plugins/switchery/dist/switchery.js"></script>
<!-- Jquery Validation Js -->
<script src="assets/plugins/jquery-validation/dist/jquery.validate.js"></script>
<!-- Custom Js -->
<!--<script src="assets/themes/theme2.2/js/admin.js"></script>-->
<script src="assets/plugins/validate/forms/form-validation.js"></script>
<!-- Google Analytics Code -->
<!--<script src="assets/themes/theme2.2/js/google-analytics.js"></script>-->
<script src="assets/plugins/jscolor-2.0.4/jscolor.js"></script>
<!-- Steps -->
<script src="assets/plugins/steps/jquery.steps.min.js"></script>
<!-- Jquery Validate -->
<script src="assets/plugins/validate/jquery.validate.min.js"></script>
<script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
</script>
    