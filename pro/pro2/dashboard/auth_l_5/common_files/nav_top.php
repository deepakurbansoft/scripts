<?php
$currentFile = $_SERVER["PHP_SELF"];
$parts = explode('/', $currentFile);
$page = $parts[count($parts) - 1];

if($page == 'index.php'){
    $status_home = 'active';
}
elseif($page == 'new_entry.php'){
        $status_newmember = 'active';
}
elseif($page == 'view_mem.php' || $page == 'canceled_users.php' || $page == 'freezed_users.php' || $page == 'pending_users.php' || $page == 'read_member.php' || $page == 'edit_member.php'){
      $status_members = 'active';
}
elseif($page == 'view_plan.php' || $page == 'edit_plan.php' || $page == 'view_plan_sub.php' || $page == 'edit_plan_sub.php'){
    $status_plans = 'active';
}
elseif($page == 'manage_users.php' || $page == 'edit_trainer.php'){
    $status_users = 'active';
}
elseif($page == 'manage_locations.php' || $page == 'edit_location.php'){
    $status_location = 'active';
}
elseif($page == 'members_date.php' || $page == 'members_package.php' || $page == 'subend_report.php' || $page == 'payments_report.php' || $page == 'unpaid_report.php'){
    $status_report = 'active';
}
elseif($page == 'mail_tracking.php'){
    $status_mail = 'active';
}
?>

<div id="navigation">
    <div class="container-fluid">

        <a href="index.php" id="brand">
            <?php
            $location =  $_SESSION['gym_location'];
            $get_logo = get_field('gym_location',$location,'id','logo');
            if($get_logo!=''){
                $logo = $get_logo;
            }
            else{
                $logo = 'logo/logo_hospitality.png';
            }
            ?>
            <img src="<?php echo $logo;?>" alt="" class='retina-ready'/>

        </a>


        <ul class='main-nav'>
            <li class='<?php echo $status_home?>'>
                <a href="index.php">
                    <i class="icon-home"></i>
                    <span>Dashboard</span>

                </a>
            </li>

            <li class="<?php echo $status_newmember?>">
                <a href="new_entry.php">
                    <i class="icon-edit"></i>
                    <span>New Member</span>

                </a>

            </li>



<!--                <li>-->
<!--                    <a href="payments.php">-->
<!--                        <i class="icon-edit"></i>-->
<!--                        <span>Payments</span>-->
<!---->
<!--                    </a>-->
<!---->
<!--                </li>-->







            <li class="<?php echo $status_members;?>">
                <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                    <i class="icon-edit"></i>
                    <span>Members</span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="view_mem.php">View Members</a>
                    </li>
<!--                    <li>-->
<!--                        <a href="table_view.php">View / Enter Schedule</a>-->
<!--                    </li>-->

                    <li>
                        <a href="canceled_users.php">Cancelled Members</a>
                    </li>

                    <li>
                        <a href="freezed_users.php">Freezed Members</a>
                    </li>

                    <li>
                        <a href="pending_users.php">Pending Users</a>
                    </li>

                </ul>
            </li>

            <?php if($_SESSION['auth_type']== 1 || $_SESSION['auth_type']== 2){?>

<!--                <li>-->
<!--                    <a href="change_values.php">-->
<!--                        <i class="icon-edit"></i>-->
<!--                        <span>Edit Subsciption Details</span>-->
<!---->
<!--                    </a>-->
<!---->
<!--                </li>-->


                <li class="<?php echo $status_plans;?>">
                    <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                        <i class="icon-edit"></i>
                        <span>Plans</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="view_plan.php">Main Plan</a>
<!--                            <a href="new_plan.php">Main Plan</a>-->
                        </li>
                        <li>
                            <a href="view_plan_sub.php">Sub Plan</a>
                        </li>

                    </ul>
                </li>



<!--                <li>-->
<!--                    <a href="new_plan.php">-->
<!--                        <i class="icon-edit"></i>-->
<!--                        <span>New Plan</span>-->
<!---->
<!--                    </a>-->
<!---->
<!--                </li>-->
                
            <?php } ?>

<!--            <li>-->
<!--                <a href="#" data-toggle="dropdown" class='dropdown-toggle'>-->
<!--                    <i class="icon-edit"></i>-->
<!--                    <span>Overview</span>-->
<!--                    <span class="caret"></span>-->
<!--                </a>-->
<!--                <ul class="dropdown-menu">-->
<!--                    <li>-->
<!--                        <a href="over_members_month.php">Members per Month</a>-->
<!--                    </li><li>-->
<!--                        <a href="over_members_year.php">Members per Year</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="revenue_month.php">Income per month</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

            <?php if($_SESSION['auth_type']== 1 || $_SESSION['auth_type']== 2) { ?>

                <li class="<?php echo $status_users?>">
                    <a href="manage_users.php">
                        <i class="icon-edit"></i>
                        <span>Users</span>

                    </a>

                </li>
                <?php
            }
            ?>

            <?php if($_SESSION['auth_type']== 1 || $_SESSION['auth_type']== 2){?>
                <li class="<?php echo $status_location;?>">
                    <a href="manage_locations.php">
                        <i class="icon-edit"></i>
                        <span>Locations</span>

                    </a>

                </li>

                <li class="<?php echo $status_report;?>">
                    <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                        <i class="icon-edit"></i>
                        <span>Reports</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                        <li>
                            <a href="members_date.php">Total   Members - Location</a>
                        </li>

                        <li>
                            <a href="members_package.php">Total Members - Package</a>
                        </li>

                        <li>
                            <a href="subend_report.php">Members Expired - Location</a>
                        </li>

                        <li>
                            <a href="payments_report.php">Payments - Location</a>
                        </li>
<!---->
                        <li>
                            <a href="unpaid_report.php">Pending Payments - Location</a>
                        </li>
<!---->

<!---->
<!--                        <li>-->
<!--                            <a href="members_daterange.php">Members Date Range</a>-->
<!--                        </li>-->
<!---->
<!---->
<!--                        <li>-->
<!--                            <a href="over_members_month.php">Members per Month</a>-->
<!--                        </li><li>-->
<!--                            <a href="over_members_year.php">Members per Year</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <a href="revenue_month.php">Income per month</a>-->
<!--                        </li>-->


                    </ul>
                </li>

                <li class="<?php echo $status_mail;?>">
                    <a href="#" data-toggle="dropdown" class='dropdown-toggle'>
                        <i class="icon-edit"></i>
                        <span>Alerts</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">


                        <li>
                            <a href="mail_tracking.php">Mail Tracking</a>
                        </li>

                    </ul>
                </li>

            <?php }?>


            <li>
                <a href="logout.php">Logout</a>
            </li>


            </li>




        </ul>
        <div class="user">
            <ul class="icon-nav">

                <li>
                    <a href="logout.php" class='lock-screen' rel='tooltip' title="Sign Out" data-placement="bottom"><i class="icon-lock"></i></a>
                </li>

            </ul>
            <div class="dropdown">
                <a href="#" class='dropdown-toggle' data-toggle="dropdown">

                    <?php
                    echo $_SESSION['full_name'];

                        echo "<img width='30' src='".$_SESSION['profile_photo']."'/></a>";

                    ?>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="more-userprofile.php">Edit profile</a>
                        </li>
                        <li>
                            <a href="../../login/lock.php">Lock Screen</a>
                        </li>

                    </ul>
            </div>
        </div>
        <a href="#" class='toggle-mobile'><i class="icon-reorder"></i></a>
    </div>
</div>