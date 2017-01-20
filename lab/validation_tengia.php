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
                    <label>What industries would you like to work in? *</label>
                    <select name="industry[]" id="profe_industry" class="form-control chosen-select"  multiple required>

                        <option value="Accounting">Accounting</option>
                        <option value="Advertising">Advertising</option>
                        <option value="Architecture">Architecture</option>
                        <option value="Art">Art</option>
                        <option value="Alterations">Alterations</option>
                        <option value="Beauty">Beauty</option>
                        <optgroup label="Business">Business
                            <option value="Administrative">Administrative</option>
                            <option value="Management">Management</option>
                            <option value="Executive">Executive</option>
                        </optgroup>
                        <option value="Biology">Biology</option>
                        <option value="Customer Service">Customer Service</option>
                        <option value="Culinary">Culinary</option>
                        <option value="Child Care">Child Care</option>
                        <option value="Database Analyst">Database Analyst</option>
                        <option value="Driving Instructor">Driving Instructor</option>
                        <option value="Education">Education</option>
                        <option value="Teaching">Teaching</option>
                        <option value="Tutoring">Tutoring</option>
                        <option value="Engineering">Engineering</option>
                        <optgroup label="Entertainment">Entertainment
                            <option value="Film">Film</option>
                            <option value="Music">Music</option>
                            <option value="Theater">Theater</option>
                        </optgroup>
                        <option value="Event Planning">Event Planning</option>
                        <option value="Executive">Executive</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Finance">Finance</option>
                        <option value="Floral Design">Floral Design</option>
                        <option value="Government">Government</option>
                        <option value="Hospice Care/In-Home Nursing">Hospice Care/In-Home Nursing</option>
                        <option value="Hospitality">Hospitality</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Interior Design">Interior Design</option>
                        <optgroup label="Legal">Legal
                            <option value="Paralegal">Paralegal</option>
                        </optgroup>
                        <option value="Logistics">Logistics</option>
                        <option value="Management">Management</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Media">Media</option>
                        <option value="Broadcast">Broadcast</option>
                        <option value="Digital">Digital</option>
                        <option value="Print">Print</option>
                        <option value="Radio">Radio</option>
                        <option value="Social">Social</option>
                        <option value="Non-Profit">Non-Profit</option>
                        <option value="Nursing">Nursing</option>
                        <option value="Photography">Photography</option>
                        <option value="PR">PR</option>
                        <option value="Private Investigation">Private Investigation</option>
                        <option value="Recruitment">Recruitment</option>
                        <optgroup label="Retail">Retail
                            <option value="Merchandise Buyer">Merchandise Buyer</option>
                        </optgroup>
                        <option value="Sales">Sales</option>
                        <option value="Security">Security</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Science">Science</option>
                        <optgroup label="Technology">Technology
                            <option value="IT">IT</option>
                            <option value="Software">Software</option>
                            <option value="Systems">Systems</option>

                        </optgroup>
                        <option value="Tour Guide">Tour Guide</option>
                        <option value="Writing">Writing</option>
                        <option value="Other">Other</option>
                    </select>
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
<div id="Modal" class="modal fadeIn">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <a class="close" data-dismiss="modal">×</a>
                <h4 class="modal-title">Tengia Seeker</h4>
            </div>
            <div class="modal-body">
                <label class="req">* All Fields are required before submitting</label>
                <form method="POST" name="seekers_form" id="seekers_form" >

                    <label>First Name *</label>
                    <input type="text" name="fname" id="firstname" class="form-control">
                    <span class="colo"  id="f"></span>
                    <label>Last Name *</label>
                    <input type="text" name="lname" id="lastname" class="form-control">
                    <span class="colo"  id="l"></span>
                    <label>What industries would you like to work in? *</label>
                    <select name="industry[]" id="industryname" class="form-control chosen-select"  multiple required>

                        <option value="Accounting">Accounting</option>
                        <option value="Advertising">Advertising</option>
                        <option value="Architecture">Architecture</option>
                        <option value="Art">Art</option>
                        <option value="Alterations">Alterations</option>
                        <option value="Beauty">Beauty</option>
                        <optgroup label="Business">Business
                            <option value="Administrative">Administrative</option>
                            <option value="Management">Management</option>
                            <option value="Executive">Executive</option>
                        </optgroup>
                        <option value="Biology">Biology</option>
                        <option value="Customer Service">Customer Service</option>
                        <option value="Culinary">Culinary</option>
                        <option value="Child Care">Child Care</option>
                        <option value="Database Analyst">Database Analyst</option>
                        <option value="Driving Instructor">Driving Instructor</option>
                        <option value="Education">Education</option>
                        <option value="Teaching">Teaching</option>
                        <option value="Tutoring">Tutoring</option>
                        <option value="Engineering">Engineering</option>
                        <optgroup label="Entertainment">Entertainment
                            <option value="Film">Film</option>
                            <option value="Music">Music</option>
                            <option value="Theater">Theater</option>
                        </optgroup>
                        <option value="Event Planning">Event Planning</option>
                        <option value="Executive">Executive</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Finance">Finance</option>
                        <option value="Floral Design">Floral Design</option>
                        <option value="Government">Government</option>
                        <option value="Hospice Care/In-Home Nursing">Hospice Care/In-Home Nursing</option>
                        <option value="Hospitality">Hospitality</option>
                        <option value="Human Resources">Human Resources</option>
                        <option value="Interior Design">Interior Design</option>
                        <optgroup label="Legal">Legal
                            <option value="Paralegal">Paralegal</option>
                        </optgroup>
                        <option value="Logistics">Logistics</option>
                        <option value="Management">Management</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Media">Media</option>
                        <option value="Broadcast">Broadcast</option>
                        <option value="Digital">Digital</option>
                        <option value="Print">Print</option>
                        <option value="Radio">Radio</option>
                        <option value="Social">Social</option>
                        <option value="Non-Profit">Non-Profit</option>
                        <option value="Nursing">Nursing</option>
                        <option value="Photography">Photography</option>
                        <option value="PR">PR</option>
                        <option value="Private Investigation">Private Investigation</option>
                        <option value="Recruitment">Recruitment</option>
                        <optgroup label="Retail">Retail
                            <option value="Merchandise Buyer">Merchandise Buyer</option>
                        </optgroup>
                        <option value="Sales">Sales</option>
                        <option value="Security">Security</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Science">Science</option>
                        <optgroup label="Technology">Technology
                            <option value="IT">IT</option>
                            <option value="Software">Software</option>
                            <option value="Systems">Systems</option>

                        </optgroup>
                        <option value="Tour Guide">Tour Guide</option>
                        <option value="Writing">Writing</option>
                        <option value="Other">Other</option>
                    </select>
                    <span class="colo"  id="indus"></span>
                    <label>Please enter your specialization if you choose other option</label>
                    <input type="text"  name="other_text" class="form-control">
                    <span class="colo"  id="other"></span>
                    <label>Zip Code *</label>
                    <input type="text" id="seekers_zipcode" name="zip_code" class="form-control">
                    <span class="colo"  id="zip"></span>
                    <label>Phone Number *</label>
                    <input type="text" id="seekers_phoneno" name="phone_number" class="form-control">
                    <span class="colo"  id="phone"></span>
                    <label>Email *</label>
                    <input type="text" id="seekers_email" name="email" class="form-control">
                    <span class="colo"  id="email"></span>
                    <input type="hidden" name="user_type" value="3" class="form-control">
                    <input type="button" onclick="submit_seekers()" name="submit_form" value="Submit" class="wpcf7-form-control wpcf7-submit">
                    <div class="succ_div" id="succ_div"></div>
                </form>
            </div>

            <script type="text/javascript">


                function isValidEmailAddress(emailAddress) {
                    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                    return pattern.test(emailAddress);
                }

                function submit_profe() {

                    jQuery('#result_div').html('');
                    var flag = 0;

                    var fname = jQuery('#fname').val();
                    var lname = jQuery('#lname').val();
                    var profe_phoneno = jQuery('#profe_phoneno').val();
                    var profe_zipcode = jQuery('#profe_zipcode').val();
                    var profe_email = jQuery('#profe_email').val();


                    if (fname == "") {
                        jQuery('#fname').css('border-color', 'red');
                        jQuery('#f_error').html("can't be blank");

                        flag = 1;
                    } else {
                        jQuery('#fname').css('border-color', '#cccccc');
                        jQuery('#f_error').html("");

                    }

                    if (lname == "") {
                        jQuery('#lname').css('border-color', 'red');
                        jQuery('#l_error').html("can't be blank");
                        flag = 1;
                    } else {
                        jQuery('#lname').css('border-color', '#cccccc');
                        jQuery('#l_error').html("");

                    }

                    if (jQuery('#profe_industry_chosen ul li').hasClass('search-choice')) {
                        jQuery('#profe_industry_chosen .chosen-choices').css('border-color', '#cccccc');
                        jQuery('#ind_error').html("");
                    }

                    else {
                        jQuery('#profe_industry_chosen .chosen-choices').css('border-color', 'red');
                        jQuery('#ind_error').html("can't be blank");
                        flag = 1;

                    }

                    if (profe_zipcode == "") {
                        jQuery('#profe_zipcode').css('border-color', 'red');
                        jQuery('#zip_error').html("can't be blank");
                        flag = 1;
                    } else {

                        if(!jQuery.isNumeric(profe_zipcode)){
                            jQuery('#profe_zipcode').css('border-color', 'red');
                            jQuery('#zip_error').html("Enter valid 5 digit zipcode ");
                            flag = 1;
                        }else {
                            if(profe_zipcode.length==5){
                                jQuery('#profe_zipcode').css('border-color', '#cccccc');
                                jQuery('#zip_error').html("");

                            }else{
                                jQuery('#profe_zipcode').css('border-color', 'red');
                                jQuery('#zip_error').html("Enter valid 5 digit zipcode ");
                                flag = 1;


                            }
                        }

                    }
                    if (profe_phoneno == "") {
                        jQuery('#profe_phoneno').css('border-color', 'red');
                        jQuery('#phone_error').html("can't be blank");
                        flag = 1;

                    } else {
                        if(!jQuery.isNumeric(profe_phoneno)){
                            jQuery('#profe_phoneno').css('border-color', 'red');
                            jQuery('#phone_error').html("Enter valid phone number");
                            flag = 1;
                        }else {

                            jQuery('#profe_phoneno').css('border-color', '#cccccc');
                            jQuery('#phone_error').html("");

//                            if(profe_phoneno.length<=15){
//                                jQuery('#profe_phoneno').css('border-color', 'red');
//                                jQuery('#phone_error').html("Enter valid phone number");
//                                flag = 1;
//                            }else{
//                                jQuery('#profe_phoneno').css('border-color', '#cccccc');
//                                jQuery('#phone_error').html("");
//
//                            }
                        }


                    }
                    if (profe_email == "") {
                        jQuery('#profe_email').css('border-color', 'red');
                        jQuery('#email_error').html("can't be blank");

                        flag = 1;
                    } else {

                        if(isValidEmailAddress(profe_email))
                        {
                            jQuery('#profe_email').css('border-color', '#cccccc');
                            jQuery('#email_error').html("");


                        } else {
                            jQuery('#profe_email').css('border-color', 'red');
                            jQuery('#email_error').html("Enter valid email");

                            flag = 1;
                        }


                    }


                    if(flag==1)
                    {
                        //alert('Check Errors.');
                    }
                    else
                    {

                        jQuery.ajax({
                            type      : 'POST',
                            url       : 'http://tengia.com/insert_profe.php',
                            data      : jQuery('#profe_form').serialize(),

                            success   : function(data) {
                                if (data.success) {

                                }
                                else {

                                    jQuery('#result_div').html('Congrats! You have been successfully registered! Look out for an email from us very soon.');

                                    jQuery('#profe_form').each(function(){
                                        this.reset();
                                    });

                                    jQuery('.chosen-select option').prop('selected', false).trigger('chosen:updated');


                                }
                            }
                        });

                    }

                }

                function submit_seekers() {
                    jQuery('#succ_div').html('');
                    var flag = 0;
                    var fname = jQuery('#firstname').val();
                    var lname = jQuery('#lastname').val();

                    var seekers_phoneno = jQuery('#seekers_phoneno').val();
                    var seekers_zipcode = jQuery('#seekers_zipcode').val();
                    var seekers_email = jQuery('#seekers_email').val();



                    if(fname=="")
                    {
                        jQuery('#firstname').css('border-color', 'red');
                        jQuery('#f').html("can't be blank");
                        flag = 1;
                    }else {
                        jQuery('#firstname').css('border-color', '#cccccc');
                        jQuery('#f').html("");

                    }

                    if(lname=="")
                    {
                        jQuery('#lastname').css('border-color', 'red');
                        jQuery('#l').html("can't be blank");
                        flag = 1;
                    }else {
                        jQuery('#lastname').css('border-color', '#cccccc');
                        jQuery('#l').html("");

                    }

                    if (jQuery('#industryname_chosen ul li').hasClass('search-choice')) {

                        jQuery('#industryname_chosen .chosen-choices').css('border-color', '#cccccc');
                        jQuery('#indus').html("");


                    }else {
                        jQuery('#industryname_chosen .chosen-choices').css('border-color', 'red');
                        jQuery('#indus').html("can't be blank");
                        flag = 1;
                    }



                    if (seekers_zipcode == "") {
                        jQuery('#seekers_zipcode').css('border-color', 'red');
                        jQuery('#zip').html("can't be blank");
                        flag = 1;
                    } else {

                        if(!jQuery.isNumeric(seekers_zipcode)){
                            jQuery('#seekers_zipcode').css('border-color', 'red');
                            jQuery('#zip').html("Enter valid 5 digit zipcode ");
                            flag = 1;
                        }else {
                            if(seekers_zipcode.length==5){
                                jQuery('#seekers_zipcode').css('border-color', '#cccccc');
                                jQuery('#zip').html("");
                            }else{
                                jQuery('#seekers_zipcode').css('border-color', 'red');
                                jQuery('#zip').html("Enter valid 5 digit zipcode ");
                                flag = 1;


                            }
                        }

                    }

                    if (seekers_phoneno == "") {
                        jQuery('#seekers_phoneno').css('border-color', 'red');
                        jQuery('#phone').html("can't be blank");
                        flag = 1;

                    } else {
                        if(!jQuery.isNumeric(seekers_phoneno)){
                            jQuery('#seekers_phoneno').css('border-color', 'red');
                            jQuery('#phone').html("Enter valid phone number");
                            flag = 1;
                        }else {

                            jQuery('#seekers_phoneno').css('border-color', '#cccccc');
                            jQuery('#phone').html("");

//                            if(seekers_phoneno.length<=15){
//                                jQuery('#seekers_phoneno').css('border-color', 'red');
//                                jQuery('#phone').html("Enter valid phone number");
//                                flag = 1;
//                            }else{
//                                jQuery('#seekers_phoneno').css('border-color', '#cccccc');
//                                jQuery('#phone').html("");
//
//                            }
                        }


                    }


                    if (seekers_email == "") {
                        jQuery('#seekers_email').css('border-color', 'red');
                        jQuery('#email').html("can't be blank");

                        flag = 1;
                    } else {

                        if(isValidEmailAddress(seekers_email))
                        {
                            jQuery('#seekers_email').css('border-color', '#cccccc');
                            jQuery('#email').html("");


                        } else {
                            jQuery('#seekers_email').css('border-color', 'red');
                            jQuery('#email').html("Enter valid email");

                            flag = 1;
                        }


                    }



                    if (flag == 1) {
                        // alert('Check Errors.');
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

                                    jQuery('.chosen-select option').prop('selected', false).trigger('chosen:updated');
                                }
                            }
                        });

                    }
                }

            </script>


        </div>
    </div>
</div>