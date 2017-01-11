<form method="POST" name="profe_form" id="profe_form" >



    <label>Zip Code *</label>
    <input type="text" id="zip_code" name="zip_code" class="form-control"><br><br>
    <label>Phone Number *</label>
    <input type="text" id="phone_number" name="phone_number" class="form-control"><br><br>
    <label>Email *</label>
    <input type="text" id="email" name="email" class="form-control"><br><br>
    <span id="email_error" style="color: red;"></span><br><br>

    <input type="button" onclick="submit_profe()" name="submit_form" value="Submit" class="wpcf7-form-control wpcf7-submit">
    <div id="result_div"></div>
</form>

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

                    var flag = 0;
                    var fname = jQuery('#fname').val();
                    var lname = jQuery('#lname').val();
                    var industry = jQuery('#industry').val();
                    var phone_no = jQuery('#phone_number').val();
                    var zip_code = jQuery('#zip_code').val();
                    var email = jQuery('#email').val();


                    if (fname == "") {
                        jQuery('#fname').css('border-color', 'red');
                        flag = 1;
                    } else {
                        jQuery('#fname').css('border-color', '#cccccc');
                        flag = 0;
                    }

                    if (lname == "") {
                        jQuery('#lname').css('border-color', 'red');
                        flag = 1;
                    } else {
                        jQuery('#lname').css('border-color', '#cccccc');
                        flag = 0;
                    }
                    if (industry == "null") {
                        jQuery('#industry').css('border-color', 'red');
                        flag = 1;
                    } else {
                        jQuery('#industry').css('border-color', '#cccccc');
                        flag = 0;
                    }
                    if (zip_code == "") {
                        jQuery('#zip_code').css('border-color', 'red');
                        flag = 1;
                    } else {

                        if(!$.isNumeric(zip_code)){
                            alert('Only number in zip code');
                        }else {
                            if(zip_code.length!=6){
                                alert('Zip code must be 6 numbers ');
                            }
                        }
                        jQuery('#zip_code').css('border-color', '#cccccc');
                        flag = 0;
                    }
                    if (phone_no == "") {

                        jQuery('#phone_number').css('border-color', 'red');
                        flag = 1;

                    } else {
                        if(!$.isNumeric(phone_no)){
                            alert('Only number in Phone Number');
                        }else {
                            if(phone_no.length!=10){
                                alert('Phone must be 10 numbers');
                            }
                        }
                        jQuery('#phone_number').css('border-color', '#cccccc');
                        flag = 0;

                    }



                    if (email == "") {
                        jQuery('#email').css('border-color', 'red');
                        $("#email_error").html('Email Should not be empty.');
                        flag = 1;
                    } else {
                        $("#email_error").html('');
                        if(isValidEmailAddress(email))
                        {
                            alert('valid email');
                            flag = 0;

                        } else {
                            jQuery('#email').css('border-color', 'red');
                            $("#email_error").html('Enter Valid email');
                            flag = 1;
                        }


                    }


                    if(flag==1)
                    {
                        alert('Check Empty Fields.');
                    }
                    else
                    {

                    }

                }

                function submit_seekers() {

                    var flag = 0;
                    var fname = jQuery('#firstname').val();
                    var lname = jQuery('#lastname').val();
                    var industry = jQuery('#industryname').val();
                    var phone_no = jQuery('#phone_no').val();
                    var zip_code = jQuery('#zip_code_one').val();
                    var email = jQuery('#email_id').val();


                    if(fname=="")
                    {
                        jQuery('#firstname').css('border-color', 'red');
                        flag = 1;
                    }else {
                        jQuery('#firstname').css('border-color', '#cccccc');
                        flag = 0;
                    }

                    if(lname=="")
                    {
                        jQuery('#lastname').css('border-color', 'red');
                        flag = 1;
                    }else {
                        jQuery('#lastname').css('border-color', '#cccccc');
                        flag = 0;
                    }
                    if(industry=="")
                    {
                        jQuery('#industryname').css('border-color', 'red');
                        flag = 1;
                    }else {
                        jQuery('#industryname').css('border-color', '#cccccc');
                        flag = 0;
                    }
                    if(zip_code=="")
                    {
                        jQuery('#zip_code_one').css('border-color', 'red');
                        flag = 1;
                    }else {
                        jQuery('#zip_code_one').css('border-color', '#cccccc');
                        flag = 0;
                    }
                    if(phone_no=="")
                    {
                        jQuery('#phone_no').css('border-color', 'red');
                        flag = 1;
                    }else {
                        jQuery('#phone_no').css('border-color', '#cccccc');
                        flag = 0;
                    }
                    if(email=="")
                    {
                        jQuery('#email_id').css('border-color', 'red');
                        flag = 1;
                    }else {
                        jQuery('#email_id').css('border-color', '#cccccc');
                        flag = 0;
                    }



                    if (flag == 1) {
                        alert('Check Empty Fields.');
                    }
                    else {

                        jQuery.ajax({ //Process the form using $.ajax()
                            type: 'POST', //Method type
                            url: 'http://tengia.com/insert_profe.php', //Your form processing file URL
//                data: formData,
                            data: jQuery('#seekers_form').serialize(),

                            success: function (data) {
                                if (data.success) { //If fails



                                }
                                else {
                                    jQuery('#succ_div').html('Congrats! You have been successfully registered! Look out for an email from us very soon.');

                                    jQuery('#seekers_form').each(function(){
                                        this.reset();
                                    })
                                    // location.reload();

                                }
                            }
                        });

                    }
                }

            </script>


        </div>
    </div>
</div>