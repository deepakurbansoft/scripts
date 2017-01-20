<?php
require 'db_conn.php';
page_protect();
?>

<!doctype html>


<head><title>Gym Management - ELITE HOSPITALITY GROUP</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Apple devices fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Apple devices fullscreen -->
    <meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- Bootstrap responsive -->
    <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css">
    <!-- jQuery UI -->
    <link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../../css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
    <!-- dataTables -->
    <link rel="stylesheet" href="../../css/plugins/datatable/TableTools.css">
    <!-- chosen -->
    <link rel="stylesheet" href="../../css/plugins/chosen/chosen.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- Color CSS -->
    <!--	<link rel="stylesheet" href="../../css/themes.css">-->

    <!-- Datepicker -->
    <link rel="stylesheet" href="../../css/plugins/datepicker/datepicker.css">

    <!-- jQuery -->
    <script src="../../js/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="../../js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="../../js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
    <script src="../../js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
    <script src="../../js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
    <!-- slimScroll -->
    <script src="../../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../js/bootstrap.min.js"></script>
    <!-- Bootbox -->
    <script src="../../js/plugins/bootbox/jquery.bootbox.js"></script>
    <!-- dataTables -->
    <script src="../../js/plugins/datatable/jquery.dataTables.min.js"></script>
    <script src="../../js/plugins/datatable/TableTools.min.js"></script>
    <script src="../../js/plugins/datatable/ColReorder.min.js"></script>
    <script src="../../js/plugins/datatable/ColVis.min.js"></script>
    <!-- Chosen -->
    <script src="../../js/plugins/chosen/chosen.jquery.min.js"></script>

    <!-- Theme framework -->
    <script src="../../js/eakroko.min.js"></script>
    <!-- Theme scripts -->
    <script src="../../js/application.min.js"></script>
    <!-- Just for demonstration -->
    <script src="../../js/demonstration.min.js"></script>

    <!-- Datepicker -->
    <script src="../../js/plugins/datepicker/bootstrap-datepicker.js"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" />
    <!-- Apple devices Homescreen icon -->
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-precomposed.png" />

    <script type="text/javascript">
        function ConfirmDelete()
        {
            if (confirm("Delete Member?"))
                return true;
            else
                return false;
        }
    </script>
</head>
<body>


<?php

include 'common_files/nav_top.php';?>



<div class="container-fluid" id="content">

    <div id="main">

        <div class="container-fluid">

        <?php include 'common_files/header_dashboard.php'; ?>

        <div class="breadcrumbs">
            <ul>
                <li>
                    <a href="index.php">Home</a>
                    <i class="icon-angle-right"></i>
                </li>

                <li>
                    <a href="#">Members</a>
                    <i class="icon-angle-right"></i>
                </li>

                <li>
                    <a href="#">Freezed Members</a>

                </li>

            </ul>
            <div class="close-bread">
                <a href="#">
                    <i class="icon-remove"></i>
                </a>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="box box-color box-bordered">
                    <div class="box-title">
                        <h3>
                            <i class="icon-inbox"></i>
                            Freezed Members
                        </h3>
                    </div>


<!--                    <div style="padding: 10px;" class="row  box-color box-bordered">-->
<!--                        <form action="" method="POST">-->
<!---->
<!--                            <div style="" class="pull-right">-->
<!--                                <span style="padding-bottom: 2px;">Plan : </span>-->
<!--                                <select style="margin-right: 10px;" name="plan">-->
<!--                                    <option value="">Select Plan</option>-->
<!--                                    --><?php
//
//
//                                    $query  = "select * from mem_types WHERE 1";
//                                    //echo $query;
//                                    $result = mysqli_query($con, $query);
//
//                                    if (mysqli_affected_rows($con) != 0) {
//
//                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//                                            ?>
<!---->
<!--                                            <option value="--><?php //echo $row['mem_type_id'] ?><!--">--><?php //echo $row['name'] ?><!--</option>-->
<!---->
<!--                                            --><?php
//
//                                        }
//                                    }
//
//
//
//                                    ?>
<!---->
<!--                                </select>-->
<!---->
<!--                                <span style="padding-bottom: 2px;">Location : </span>-->
<!--                                <select style="margin-right: 10px;" name="location">-->
<!--                                    <option value="">Select Location</option>-->
<!---->
<!--                                    --><?php
//
//
//                                    $query  = "select * from gym_location WHERE 1";
//                                    //echo $query;
//                                    $result = mysqli_query($con, $query);
//
//                                    if (mysqli_affected_rows($con) != 0) {
//
//                                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
//                                            ?>
<!---->
<!--                                            <option value="--><?php //echo $row['id'] ?><!--">--><?php //echo $row['name'] ?><!--</option>-->
<!---->
<!--                                            --><?php
//
//                                        }
//                                    }
//
//
//
//                                    ?>
<!---->
<!--                                </select>-->
<!---->
<!--                                <button class="btn btn-primary" type="submit" style="margin-bottom: 10px;">Search</button>-->
<!--                        </form>-->
<!---->
<!--                    </div>-->

                </div>

                <div class="box-content nopadding">

                    <table class="table table-nomargin dataTable dataTable-tools  table-bordered">
                        <thead>
                        <tr>
                            <th>Membership Expiry</th>
                            <th>Name / Member ID</th>
                            <th>Address / Contact</th><th>Proof</th>
                            <th>E-Mail / Age / Sex</th>
                            <th>Location</th>
                            <th>Date Joined / Member Type</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $user_type = $_SESSION['auth_type'];
                        $location = $_SESSION['gym_location'];

                        if($user_type == 1){
                            $query = "select * from user_data where wait='freeze'";
                        }else{
                            $query  = "select * from user_data where wait='freeze' AND `gym_location` = '$location'";
                        }




//
//                        if($_POST['location']){
//                            $location = $_POST['location'];
//                            $query.=" and `gym_location` =  '$location'";
//                        }
//
//                        if($_POST['plan']){
//                            $plan = $_POST['plan'];
//                            $query.=" and `sub_type` =  '$plan'";
//                        }


//                        echo $query;
                        $result = mysqli_query($con, $query);
                        $sno    = 1;

                        if (mysqli_affected_rows($con) != 0) {
                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                $msgid   = $row['newid'];
                                $query1  = "select * from subsciption WHERE mem_id='$msgid' AND renewal='yes'";
                                $result1 = mysqli_query($con, $query1);
                                if (mysqli_affected_rows($con) == 1) {
                                    while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {


                                        echo "<tr><td>" . $row1['expiry'] . "</td>";
                                        $expiry        = $row1['expiry'];
                                        $sub_type_name = $row1['sub_type_name'];

                                        echo "<td>" . $row['name'] . " / " . $row['newid'] . "<img width='100' src='" . $row['pic_add'] . "'></td>";
                                        echo "<td>" . $row['address'] . " / " . $row['contact'] . "</td>";
                                        echo "<td>" . $row['proof'] . " / " . $row['other_proof'] . "</td>";
                                        echo "<td>" . $row['email'] . " / " . $row['age'] . " / " . $row['sex'] . "</td>";
                                        ?>
                                        <td><?php echo get_field('gym_location',$row['gym_location'],'id','name');?></td>
                                        <?php
//                                        echo "<td>" . $row['height'] . " / " . $row['weight'] . "</td>";
                                        echo "<td>" . $row['joining'] . " / " . $row1['sub_type_name'] . "</td>";

                                        $sno++;

//                                        echo "<td><form action='read_member.php' method='post'><input type='hidden' name='name' value='" . $msgid . "'/><input type='submit' value='View History ' class='btn btn-info'/></form><form action='edit_member.php' method='post'><input type='hidden' name='name' value='" . $msgid . "'/><input type='submit' value='Edit' class='btn btn-warning'/></form><form action='del_member.php' method='post' onSubmit='return ConfirmDelete();'><input type='hidden' name='name' value='" . $msgid . "'/><input type='submit' value='Delete ' class='btn btn-danger'/></form><form><input type='button' class='btn btn-warning open-cancelmodal cancel_button' value='Cancel' data-toggle='modal' data-id='".$row['newid']."' data-target='#cancelModal' /></form></td></tr>";
                                        echo "<td><form><input type='button' class='btn btn-warning open-activatemodal activate_button".$row['newid']."' data-toggle='modal' data-id='".$row['newid']."' data-target='#activateModal' value='Activate' /></form><form action='del_member.php' method='post' onSubmit='return ConfirmDelete();'><input type='hidden' name='name' value='" . $msgid . "'/><input type='submit' value='Delete ' class='btn btn-danger'/></form></td></tr>";
                                        $msgid = 0;
                                    }
                                }
                            }
                        }

                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

<?php include 'common_files/footer.php';?>

<div id="activateModal" class="modal fade" style="display: none;" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #368EE0; color: #ffffff;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Activate User</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" role="form" id="activate_form" name="activate_form">

                    <input type="hidden" name="activate_userid" id="activate_userid">
                    Are Sure to Activate this User?




            </div>
            <div class="modal-footer">
                <input type="submit" value="Activate" class="btn btn-primary">
                <!--				<button type="submit" class="btn btn-primary" >Submit</button>-->
            </div>

            </form>
        </div>

    </div>
</div>


<script type="application/javascript">

    $(document).on("click", ".open-activatemodal", function () {

        var Id = $(this).data('id');


        $(".modal-body #activate_userid").val( Id );


    });

    $(document).ready(function(){

        $('#activate_form').submit(function(event) { //Trigger on form submit


            $.ajax({ //Process the form using $.ajax()
                type      : 'POST', //Method type
                url       : 'activate_submit.php', //Your form processing file URL
                data      : $('#activate_form').serialize(), //Forms name
                dataType  : 'json',
                success   : function(data) {
                    if (data.success) { //If fails
                        $('#activateModal').modal('hide');
                        $(".activate_button"+data.user_id).val("Activated");

                    }
                    else {


                    }
                }
            });


            event.preventDefault(); //Prevent the default submit
        });

    })



</script>
</body>

</html>



