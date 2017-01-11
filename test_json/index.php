<div id="myModal" class="modal fadeIn">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <a class="close" data-dismiss="modal">×</a>
                <h4 class="modal-title">Tengia Professional</h4>
            </div>
            <div class="modal-body">
                <label class="req">* All Fields are required before submitting</label>
                <form method="POST" name="profe_form" id="profe_form" >
                    <label>First Name *</label>
                    <input type="text" name="fname" id="fname" class="form-control">
                    <span class="colo" id="f_error"></span>
                    <label>Last Name *</label>
                    <input type="text" name="lname" id="lname" class="form-control">
                    <span class="colo"  id="l_error"></span>

                    <span class="colo"  id="ind_error"></span>
                    <label>Please enter your specialization if you choose other option</label>
                    <input type="text"  name="other_text" class="form-control">
                    <span class="colo"  id="other"></span>
                    <label>Zip Code *</label>
                    <input type="text" id="profe_zipcode" name="zip_code" class="form-control">
                    <span class="colo"  id="zip_error"></span>
                    <label>Phone Number *</label>
                    <input type="text" id="profe_phoneno" name="phone_number" class="form-control">
                    <span class="colo"  id="phone_error"></span>
                    <label>Email *</label>
                    <input type="email" id="profe_email" name="email" class="form-control">
                    <span class="colo"  id="email_error"></span>
                    <input type="hidden" name="user_type" value="2" class="form-control">
                    <input type="button" onclick="submit_profe()" name="submit_form" value="Submit" class="wpcf7-form-control wpcf7-submit">
                    <div id="result_div"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script
    src="https://code.jquery.com/jquery-3.1.1.min.js"
    integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
    crossorigin="anonymous"></script>

            <script type="text/javascript">


                function isValidEmailAddress(emailAddress) {
                    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                    return pattern.test(emailAddress);
                }

                function submit_profe() {
                    $('#result_div').html('');
                    var flag = 0;
                    var fname = $('#fname').val();
                    var lname = $('#lname').val();
                    var profe_phoneno = $('#profe_phoneno').val();
                    var profe_zipcode = $('#profe_zipcode').val();
                    var profe_email = $('#profe_email').val();


                    if (fname == "") {
                        $('#fname').css('border-color', 'red');
                        $('#f_error').html("can't be blank");

                        flag = 1;
                    } else {
                        $('#fname').css('border-color', '#cccccc');
                        $('#f_error').html("");

                    }

                    if (lname == "") {
                        $('#lname').css('border-color', 'red');
                        $('#l_error').html("can't be blank");
                        flag = 1;
                    } else {
                        $('#lname').css('border-color', '#cccccc');
                        $('#l_error').html("");

                    }



                    if (profe_zipcode == "") {
                        $('#profe_zipcode').css('border-color', 'red');
                        $('#zip_error').html("can't be blank");
                        flag = 1;
                    } else {

                        if(!$.isNumeric(profe_zipcode)){
                            $('#profe_zipcode').css('border-color', 'red');
                            $('#zip_error').html("Enter valid 5 digit zipcode ");
                            flag = 1;
                        }else {
                            if(profe_zipcode.length==5){
                                $('#profe_zipcode').css('border-color', '#cccccc');
                                $('#zip_error').html("");

                            }else{
                                $('#profe_zipcode').css('border-color', 'red');
                                $('#zip_error').html("Enter valid 5 digit zipcode ");
                                flag = 1;


                            }
                        }

                    }
                    if (profe_phoneno == "") {
                        $('#profe_phoneno').css('border-color', 'red');
                        $('#phone_error').html("can't be blank");
                        flag = 1;

                    } else {
                        if(!$.isNumeric(profe_phoneno)){
                            $('#profe_phoneno').css('border-color', 'red');
                            $('#phone_error').html("Enter valid phone number");
                            flag = 1;
                        }else {

                            $('#profe_phoneno').css('border-color', '#cccccc');
                            $('#phone_error').html("");
                            
                        }


                    }
                    if (profe_email == "") {
                        $('#profe_email').css('border-color', 'red');
                        $('#email_error').html("can't be blank");

                        flag = 1;
                    } else {

                        if(isValidEmailAddress(profe_email))
                        {
                            $('#profe_email').css('border-color', '#cccccc');
                            $('#email_error').html("");


                        } else {
                            $('#profe_email').css('border-color', 'red');
                            $('#email_error').html("Enter valid email");

                            flag = 1;
                        }


                    }


                    if(flag==1)
                    {
                        //alert('Check Errors.');
                    }
                    else
                    {

                        $.ajax({ //Process the form using $.ajax()
                            type      : 'POST', //Method type
                            url       : 'insert_profe.php', //Your form processing file URL
                            data      : $('#profe_form').serialize(),
                            dataType  : 'json',
                            success   : function(data) {

                                if (data.success) { //If fails

                                    alert(data.users.name);

                                }
                                else {

                                    alert('Something Went Wrong. Contact Admin.  ');
                                }
                            }
                        });



                    }

                }



            </script>


        </div>
    </div>
</div>