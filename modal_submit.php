<form id="myform" action="javascript:alert('success!');" method="post">
    <input type="text" name="check_me" />
    <input type="button" id="btnSubmit" value="Go!" />
</form>
<div id="confirm" style="display:none;">Please confirm that you want to submit</div>

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>

<script type="application/javascript">

    $(document).ready(function(){
        var submitForm = $('#myform');
        submit = false;

        $("#confirm").dialog({
            resizable: false,
            height: 140,
            modal: true,
            autoOpen: false,
            buttons: {
                'Submit': function() {
                    $(this).dialog('close');
                    submit = true;
                    $('#myform').submit();
                    //submitForm.submit();
                },
                'Cancel': function() {
                    $(this).dialog('close');
                }
            }
        });

        $("#confirm").parent().appendTo($("#myform"));

        $("#btnSubmit").click(function() { $('#myform').submit(); });

        submitForm.submit(function() {
            if (submit) {
                return true;
            } else {
                $("#confirm").dialog('open');
                return false;
            }
        });
    });​

</script>
