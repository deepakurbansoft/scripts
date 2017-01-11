<form name="profe_form" id="profe_form" >

    ID : <input type="text" name="id" value="69">

    <input type="button" onclick="test_submit()"  value="Submit">
</form>

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>

<script type="text/javascript">

    function test_submit(){

//
//        $.ajax({
//
//            url: 'http://ifm.urbansoft-googleglass.com/WebService/Category',
//            dataType: 'JSONP',
//            data      : $('#profe_form').serialize(),
////            jsonpCallback: 'callbackFnc',
//            type: 'POST',
//            async: false,
//            crossDomain: true,
//
//        }).done(function(data){
//            console.log(data);
//        });

        $.ajax({
            url: 'http://ifm.urbansoft-googleglass.com/WebService/Profile',
            dataType: 'JSONP',
            data      : $('#profe_form').serialize(),
//            jsonpCallback: 'callbackFnc',
            type: 'POST',
            async: false,
            crossDomain: true,
            jsonp: "jsonpcallback",
            success: function (data) {
                console.log(data);
                alert(2)

            },
            failure: function () {
                alert(3)
            },
            complete: function (data) {

                console.log(data);
//               alert(data);

//                var obj = jQuery.parseJSON(data);
//                alert(obj);
//                var obj = $.parseJSON(JSON.stringify(data));
//                alert(obj);
            },

            error: function(xhr, ajaxOptions, thrownError, textStatus, responseText) {
                console.log(name + ' environment failed with error: ' + xhr.status + "  " + thrownError);

                var errorMessage = "Error";
                if (xhr.status == 0) {
                    errorMessage = "Can't Connect";
                }
            }

        });

    }

    $('#profe_form').submit(function(){

        $.ajax({
            url: 'http://ifm.urbansoft-googleglass.com/WebService/Profile',
            dataType: 'JSONP',
            data      : $('#profe_form').serialize(),
//            jsonpCallback: 'callbackFnc',
            type: 'POST',
            async: false,
            crossDomain: true,
            success: function () {
                alert(2)
            },
            failure: function () {
                alert(3)
            },
            complete: function (data) {

                console.log(data);
//               alert(data);

//                var obj = jQuery.parseJSON(data);
//                alert(obj);
//                var obj = $.parseJSON(JSON.stringify(data));
//                alert(obj);
            }
        });

//        $.ajax({ //Process the form using $.ajax()
//            type      : 'POST', //Method type
//            url       : 'http://ifm.urbansoft-googleglass.com/WebService/Profile', //Your form processing file URL
//            data      : $('#profe_form').serialize(),
//            dataType  : 'json',
//            async:true,
//            crossDomain:true,
//            success   : function(data) {
//
//                if (data.success) { //If fails
//
//                    alert(data.users.name);
//
//                }
//                else {
//
//                    alert('Something Went Wrong. Contact Admin.  ');
//                }
//            }
//        });

//        event.preventDefault();

    });

    $(document).ready(function(){





    })


</script>


</div>
</div>
</div>