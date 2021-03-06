<?php
/*
  Plugin Name: IFM Custom Signin
  Plugin URI: http://ifm.com/
  Description: Integrated custom tasks
  Version: 1.0
  Author: Deepak C | UrbanSoft
  Author URI: http://urbansoft.co
  License: UrbanSoft Technologies
  Text Domain: ifm-custom-plugin
*/


add_shortcode( 'ifmsignin', 'signin_ifm' );

function signin_ifm(){

    ?>
    <div class="row">
        <div class="container">
            <h3 class="text-center">To avail our packages for home maintenance services</h3>
            <ul class="cont_list">
                <li><a href="tel:97317402112">Telephone: +973 17402112</a></li>
                <li><a href="mailto:info.ifm@ifmgcc.com">Email: info.ifm@ifmgcc.com</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <form class="form-horizontal" method="post" action="#">
                <div class="col-md-12">
                    <div class="col-md-4 colspac">
                        <div class="form-group">
                            <p class="signdata pull-left">Full Name</p>
                            <input type="text" class="form-control" name="username" id="username"  placeholder="" Required>

                            <p class="errorname" id="errorname1" style="color:red;"></p>
                        </div>

                    </div>
                    <div class="col-md-4 colspac">
                        <div class="form-group">
                            <p class="signdata pull-left">Email</p>
                            <input type="email" class="form-control" name="email" id="email"  placeholder="" Required>
                            <p id="erroremail" style="color:red;"></p><p class="errorname" id="errorname2" style="color:red;"></p>


                        </div>

                    </div>
                    <div class="col-md-4 colspac">
                        <div class="form-group">
                            <p class="signdata pull-left">Phone Number</p>
                            <input type="text" class="form-control" name="mobile" id="mobile"  placeholder="" Required onkeypress="return onlyNos(event,this);">
                            <p class="err_show2" id="errshow" style="color:red; display:none;">Enter Valid Mobile Number ! </p><p class="errorname3" id="errorname3" style="color:red;"></p>

                        </div>

                    </div>
                </div>



                <div class="col-md-12">
                    <div class="col-md-4 colspac">
                        <div class="form-group">
                            <p class="signdata pull-left">Password</p>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="" Required>
                            <p class="err_showpassword" id="err_showpassword" style="color:red;"></p><p class="errorname4" id="errorname4" style="color:red;"></p>
                        </div>

                    </div>
                    <div class="col-md-4 colspac">
                        <div class="form-group">
                            <p class="signdata pull-left">Confirm Password</p>
                            <input type="password" class="form-control" name="cpassword" id="cpassword"  placeholder="" Required>
                            <p class="errornamematch" id="errornamematch" style="color:red;"></p><p class="errorname5" id="errorname5" style="color:red;"></p>
                        </div>

                    </div>

                </div>
                <div class="col-md-12 text-center">
                    <!--input type="submit" name="register" value="Go" id="signin" class="btn btl-lg btn-default btnsty2"-->
                    <button type="button" id="signin" class="btn btl-lg btn-default btnsty2">Go</button>
                </div>
            </form>

        </div>


    </div>



    <?php
    if($_POST['register'])
    {
//echo "hi";


        $name = $_POST['username'];
        $email = $_POST['email'];
        $passw = $_POST['password'];
        $mobil = $_POST['mobile'];
        $autht = 'web';
        $autid = '1';
        $onsid = '1';

        $source = '1';
        $ip_address = $_SERVER["REMOTE_ADDR"];


        $ch = curl_init();// init curl
        curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Register");
        curl_setopt($ch, CURLOPT_POST, 1);// set post data to true
        curl_setopt($ch, CURLOPT_POSTFIELDS,"name=$name&email=$email&password=$passw&mobile=$mobil&auth_type=$autht&auth_id=$autid&onsignalid=$onsid&source=$source&ip_address=$ip_address");// post data

// receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

        $response = curl_exec ($ch);// response it ouputed in the response var

//var_dumb($response);

        curl_close ($ch);// close curl connection

//var_dump($response);




        $obj = json_decode($response);

//	var_dump($obj);

        $status = $obj->status;

        if($status =='success'){

            echo '<span style="color: green;">Register Success. Please <a href="http://ifm2.urbansoft.co/login/">Login</a> to Continue.</span>';
//		wp_redirect('http://ifm2.urbansoft.co/login/');

        }else{

            echo '<span style="color: red;">'.$obj->message.'</span>';
        }




    }
    ?>



    <script>



        function isValidEmailAddress(emailAddress) {
            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
            return pattern.test(emailAddress);
        }

        function onlyNos(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                return true;
            }
            catch (err) {
                alert(err.Description);
            }
        }


        //email

        jQuery('#email').on('keypress', function () {
            var re = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/.test(this.value);
            if(!re) {
                //     jQuery('#erroremail').show();
                jQuery(this).css('color', 'red');


            } else {
                // jQuery('#erroremail').hide();
                jQuery(this).css('color', 'black');
            }
        })

        //email


        jQuery(document).ready(function () {
            jQuery("#signin").click(function () {

                var flag = 0;


                name = jQuery('#username').val();
                email = jQuery('#email').val();
                mobile = jQuery('#mobile').val();
                password = jQuery('#password').val();
                cpassword = jQuery('#cpassword').val();


                autht = 'web';
                autid = '1';
                onsid = '1';

                var mob = /^[1-9]{1}[0-9]{9}$/;
//var emailpatern = /([A-Z0-9a-z_-][^@])+?@[^$#<>?]+?\.[\w]{2,4}/;



                var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                //var address = document.getElementById[email].value;
//alert("hi");





                if (name == "") {
                    jQuery('#username').css('border-color', 'red');
                    jQuery('#errorname1').html("can't be blank");

                    flag = 1;
                } else {
                    jQuery('#username').css('border-color', '#cccccc');
                    jQuery('#errorname1').html("");

                }





                if (email == "") {
                    jQuery('#email').css('border-color', 'red');
                    jQuery('#errorname2').html("can't be blank");
                    flag = 1;
                } else {
                    //jQuery('#email').css('border-color', '#cccccc');
                    // jQuery('#errorname2').html("");

                    if(isValidEmailAddress(email))
                    {
                        jQuery('#email ').css('border-color', '#cccccc');
                        jQuery('#errorname2').html("");


                    } else {
                        jQuery('#profe_email').css('border-color', 'red');
                        jQuery('#errorname2').html("Enter valid email");

                        flag = 1;
                    }

                }






                if (mobile == "") {
                    jQuery('#mobile').css('border-color', 'red');
                    jQuery('#errorname3').html("can't be blank");
                    flag = 1;
                } else {
                    jQuery('#mobile').css('border-color', '#cccccc');
                    jQuery('#errorname3').html("");

                }

                if (password == "" && cpassword == "") {
                    jQuery('#cpassword').css('border-color', 'red');
                    jQuery('#password').css('border-color', 'red');
                    jQuery('#errorname4').html("can't be blank");
                    jQuery('#errorname5').html("can't be blank");
                    flag = 1;
                } else

                if(password.length <= 4){
                    jQuery('#password').css('border-color', 'red');
                    jQuery('#err_showpassword').html("Your Password Is To Short (At-least 5 Characters) !");
                    flag = 1;

                }
                else if(password != cpassword && cpassword.length <= 4){
                    jQuery('#cpassword').css('border-color', 'red');
                    jQuery('#password').css('border-color', 'red');
                    jQuery('#errornamematch').html("Password And Confirm Passwod Not Match !");
                    flag = 1;
                }
                else{
                    jQuery('#cpassword').css('border-color', '#cccccc');
                    jQuery('#password').css('border-color', '#cccccc');
                    jQuery('#errorname4').html("");
                    jQuery('#errorname5').html("");
                    jQuery('#err_showpassword').html("");
                    jQuery('#errornamematch').html("");

                }



                if(flag==1)
                {
                    //alert('Check Errors.');
                }
                else
                {
                    alert('Check ok.');
                }







            });
        });
    </script>

    <?php
}

add_shortcode( 'ifmguestpopup', 'guestpopup_ifm' );

function guestpopup_ifm(){

    ?>

    <style type="text/css">
        .wizard {
            margin: 20px auto;
            background: #fff;
        }

        .wizard .nav-tabs {
            position: relative;
            margin: 40px auto;
            margin-bottom: 0;
            border-bottom-color: #e0e0e0;
        }

        .wizard > div.wizard-inner {
            position: relative;
        }

        .connecting-line {
            height: 2px;
            background: #e0e0e0;
            position: absolute;
            width: 80%;
            margin: 0 auto;
            left: 0;
            right: 0;
            top: 50%;
            z-index: 1;
        }

        .wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
            color: #555555;
            cursor: default;
            border: 0;
            border-bottom-color: transparent;
        }

        span.round-tab {
            width: 70px;
            height: 70px;
            line-height: 70px;
            display: inline-block;
            border-radius: 100px;
            background: #fff;
            border: 2px solid #e0e0e0;
            z-index: 2;
            position: absolute;
            left: 0;
            text-align: center;
            font-size: 25px;
        }
        span.round-tab i{
            color:#555555;
        }
        .wizard li.active span.round-tab {
            background: #fff;
            border: 2px solid #5bc0de;

        }
        .wizard li.active span.round-tab i{
            color: #5bc0de;
        }

        span.round-tab:hover {
            color: #333;
            border: 2px solid #333;
        }

        .wizard .nav-tabs > li {
            width: 20%;
        }

        .wizard li:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 0;
            margin: 0 auto;
            bottom: 0px;
            border: 5px solid transparent;
            border-bottom-color: #5bc0de;
            transition: 0.1s ease-in-out;
        }

        .wizard li.active:after {
            content: " ";
            position: absolute;
            left: 46%;
            opacity: 1;
            margin: 0 auto;
            bottom: 0px;
            border: 10px solid transparent;
            border-bottom-color: #5bc0de;
        }

        .wizard .nav-tabs > li a {
            width: 70px;
            height: 70px;
            margin: 20px auto;
            border-radius: 100%;
            padding: 0;
        }

        .wizard .nav-tabs > li a:hover {
            background: transparent;
        }

        .wizard .tab-pane {
            position: relative;
            padding-top: 50px;
        }

        .wizard h3 {
            margin-top: 0;
        }

        @media( max-width : 585px ) {

            .wizard {
                width: 90%;
                height: auto !important;
            }

            span.round-tab {
                font-size: 16px;
                width: 50px;
                height: 50px;
                line-height: 50px;
            }

            .wizard .nav-tabs > li a {
                width: 50px;
                height: 50px;
                line-height: 50px;
            }

            .wizard li.active:after {
                content: " ";
                position: absolute;
                left: 35%;
            }
        }
    </style>
    <button class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#myModal">Book Now</button>
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <button class="close" type="button" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Book Service</h4>
                </div>
                <div class="modal-body">

                    <div class="container" style="width: 100%;">
                        <div class="row">
                            <section>
                                <div class="wizard">
                                    <div class="wizard-inner">
                                        <div class="connecting-line"></div>
                                        <ul class="nav nav-tabs" role="tablist">

                                            <li role="presentation" class="active">
                                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-home"></i>
                            </span>
                                                </a>
                                            </li>

                                            <li role="presentation" class="disabled">
                                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-tag"></i>
                            </span>
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </span>
                                                </a>
                                            </li>

                                            <li role="presentation" class="disabled">
                                                <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                                                </a>
                                            </li>

                                            <li role="presentation" class="disabled">
                                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <form role="form">
                                        <div class="tab-content">
                                            <div class="tab-pane active" role="tabpanel" id="step1">
                                                <h3>Step 1</h3>
                                                <p>This is step 1</p>
                                                <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step2">
                                                <h3>Step 2</h3>
                                                <p>This is step 2</p>
                                                <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                    <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step3">
                                                <h3>Step 3</h3>
                                                <p>This is step 3</p>
                                                <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                    <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                                    <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                                </ul>
                                            </div>

                                            <div class="tab-pane" role="tabpanel" id="step4">
                                                <h3>Step 4</h3>
                                                <p>This is step 4</p>
                                                <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                    <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                                    <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                                </ul>
                                            </div>

                                            <div class="tab-pane" role="tabpanel" id="complete">
                                                <h3>Complete</h3>
                                                <p>You have successfully completed all steps.</p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>

                </div>
                <div class="modal-footer"><button class="btn btn-default" type="button" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <script type="application/javascript">

        jQuery(document).ready(function () {
            //Initialize tooltips
            jQuery('.nav-tabs > li a[title]').tooltip();

            //Wizard
            jQuery('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

                var $target = jQuery(e.target);

                if ($target.parent().hasClass('disabled')) {
                    return false;
                }
            });

            jQuery(".next-step").click(function (e) {

                var $active = jQuery('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);

            });
            jQuery(".prev-step").click(function (e) {

                var $active = jQuery('.wizard .nav-tabs li.active');
                prevTab($active);

            });
        });

        function nextTab(elem) {
            jQuery(elem).next().find('a[data-toggle="tab"]').click();
        }
        function prevTab(elem) {
            jQuery(elem).prev().find('a[data-toggle="tab"]').click();
        }

    </script>
    <?php
}


add_shortcode( 'ifmbookservice', 'bookservice_ifm' );

function bookservice_ifm(){

    ?>

    <style type="text/css">

    </style>


    <form method="POST" action="/book-servicestep2">

        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label labname">First Name</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="ifm_fname" id="ifm_fname"  placeholder="First Name" required/>
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label labname">Email</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                    <input type="email" class="form-control" name="ifm_email" id="email" placeholder="Email" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="name" class="cols-sm-2 control-label labname">Building Name</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-building fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="prop_name" id="prop_name"  placeholder="Building Name" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="type" class="cols-sm-2 control-label labname">Type</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-step-forward" aria-hidden="true"></i></span>
                    <!--input type="text" class="form-control" name="home_type" id="type"  placeholder="Home Type"/-->
                    <select class="form-control" name="type" id="type" required>
                        <option value="">--select--</option>
                        <option value="1">House</option>
                        <option value="2">Office</option>
                    </select>

                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="address" class="cols-sm-2 control-label labname">Address</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-map-marker fa-lg"></i></span>
                    <!--input type="text" class="form-control" name="mobile" id="mobile"  placeholder="Your Mobile"/-->
                    <textarea name="address" id="address" class="form-control" required></textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="mobile" class="cols-sm-2 control-label labname">Mobile</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-mobile aria-hidden-true"></i></span>
                    <input type="text" class="form-control" name="mobile" id="mobile"  placeholder="Your Mobile" required/>

                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="mobile" class="cols-sm-2 control-label labname">Number of rooms</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-list-ol aria-hidden-true"></i></span>
                    <input type="text" class="form-control" name="no_of_rooms" id="no_of_rooms"  placeholder="No.of Rooms" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="mobile" class="cols-sm-2 control-label labname">Location</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-location-arrow aria-hidden-true"></i></span>
                    <input type="text" class="form-control" name="prop_location" id="prop_location"  placeholder="Your Location" required/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="mobile" class="cols-sm-2 control-label labname">Amenities</label>
            <div class="cols-sm-10">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-wifi aria-hidden-true"></i></span>
                    <input type="text" class="form-control" name="amenities" id="amenities"  placeholder="Amenities"/>
                </div>
            </div>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-default pull-right" value="Next" name="bookservie-step2">
        </div>



    </form>



    <script type="application/javascript">

        jQuery(document).ready(function () {

        });



    </script>
    <?php
}


add_shortcode( 'ifmbookservicestep2', 'bookservicestep2_ifm' );

function bookservicestep2_ifm(){

    ?>


    <style type="text/css">

    </style>

    <?php
    $name = $_POST['name'];
    $type= $_POST['type'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $prop_name = $_POST['prop_name'];
    $no_of_rooms = $_POST['no_of_rooms'];
    $prop_location = $_POST['prop_location'];
    $amenities = $_POST['amenities'];
    $email = $_POST['email'];



    $ch = curl_init();// init curl
    curl_setopt($ch, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Createpropertypackage");
    curl_setopt($ch, CURLOPT_POST, 1);// set post data to true

    curl_setopt($ch, CURLOPT_POSTFIELDS,"name=$name&type=$type&address=$address&mobile=$mobile&prop_name=$prop_name&no_of_rooms=$no_of_rooms&prop_location=$prop_location&amenities=$amenities&email=$email");// post data

// receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

    $response = curl_exec ($ch);// response it ouputed in the response var

//var_dumb($response);

    curl_close ($ch);// close curl connection

//var_dump($response);

    $obj = json_decode($response);

//	var_dump($obj);

    $status = $obj->status;


    if($status =='success'){


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, 'http://ifm.urbansoft-googleglass.com/WebService/Category');
        $result = curl_exec($ch);
        curl_close($ch);
//var_dump($result);
        $obj = json_decode($result);



        foreach($obj as $data){

            foreach($data as $result) {


                ?>

                <div class="col-sm-3 servicbgimggrid"
                     style="border: 1px solid #ccc;box-shadow: 5px 5px 9px 0;background-size:50%;background-position:center;background-image:url(http://ifm.urbansoft-googleglass.com/<?php echo $result->cat_image; ?>);">
                    <p class="servcimggridtitle">


                        <button type="button" data-toggle="modal" data-target="#catModal<?php echo $result->cat_id;?>"><?php echo $result->cat_name; ?></button>

                    <div class="modal fade" id="catModal<?php echo $result->cat_id;?>" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <form method="POST" action="/problem-list">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">IFM</h4>
                                    </div>
                                    <div class="modal-body">


                                        Sorry your package is not suitable for this category. Click continue, it has labour charges.


                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="cat_id" value="<?php echo $result->cat_id;?>">

                                        <input type="hidden" name="prop_id" value="<?php echo $_POST['prop_id'];?>">

                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-default pull-right" value="Continue" name="continue">

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>





                    </p></div>

                <?php

            }
        }

        ?>



        <?php
    }


    ?>


    <script type="application/javascript">

        jQuery(document).ready(function () {

        });



    </script>
    <?php
}
?>
