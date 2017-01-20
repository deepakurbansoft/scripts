<div class="page-header">
    <div class="pull-left">
        <h1>Dashboard</h1>
    </div>
    <div class="pull-right">

        <ul class="stats">

            <li class='blue'>
                <i class="icon-money"></i>
                <div class="details">
									<span class="big">BHD <?php
                                        $loc = $_SESSION['gym_location'];
                                        $date  = date('Y-m');
                                        //                                        $query = "select * from subsciption WHERE  paid_date LIKE '$date%'";

                                        if($_SESSION['auth_type']== 1) {
                                            $query = "SELECT subsciption.total FROM subsciption INNER JOIN `user_data` ON user_data.newid = subsciption.mem_id AND subsciption.paid_date LIKE '$date%'";
                                        }
                                        else{
                                            $query = "SELECT subsciption.total FROM subsciption INNER JOIN `user_data` ON user_data.newid = subsciption.mem_id AND user_data.gym_location = '$loc' AND subsciption.paid_date LIKE '$date%' ";
                                        }



                                        //                                        echo $query;
                                        $result  = mysqli_query($con, $query);
                                        $revenue = 0;
                                        if (mysqli_affected_rows($con) != 0) {
                                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                $revenue = $row['total'] + $revenue;
                                            }
                                        }
                                        echo $revenue;
                                        ?></span>
                    <span>Income This Month</span>
                </div>
            </li>

            <li class='brown'>
                <i class="icon-bolt"></i>
                <div class="details">
									<span class="big">
                                        <?php
                                        $date  = date('Y-m');

                                        if($_SESSION['auth_type']== 1) {
                                            $query = "select COUNT(*) from user_data WHERE wait='no'";
                                        }
                                        else{

                                            $query = "select COUNT(*) from user_data WHERE wait='no' AND gym_location='$loc'";
                                        }
                                        //echo $query;
                                        $result = mysqli_query($con, $query);
                                        $i      = 1;
                                        if (mysqli_affected_rows($con) != 0) {
                                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                echo $row['COUNT(*)'];
                                            }
                                        }
                                        $i = 1;
                                        ?>
                                    </span>
                                        <span>Total Members </span>
                </div>
            </li>

            <li class='red'>
                <i class="icon-shopping-cart"></i>
                <div class="details">
									<span class="big"><?php
                                        $date  = date('Y-m');
                                        if($_SESSION['auth_type']== 1) {
                                            $query = "select COUNT(*) from user_data WHERE joining LIKE '$date%' AND wait='no'";
                                        }
                                        else{
                                        $query = "select COUNT(*) from user_data WHERE joining LIKE '$date%' AND wait='no'  AND gym_location='$loc'";
                                        }
                                        //echo $query;
                                        $result = mysqli_query($con, $query);
                                        $i      = 1;
                                        if (mysqli_affected_rows($con) != 0) {
                                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                echo $row['COUNT(*)'];
                                            }
                                        }
                                        $i = 1;
                                        ?></span>
                    <span>Joined This Month</span>
                </div>
            </li>


            <li class='blue'>
                <i class="icon-money"></i>
                <div class="details">
									<span class="big">BHD <?php

                                        $date  = date('Y-m');
                                        //                                        $query = "select * from subsciption WHERE  paid_date LIKE '$date%'";

                                        if($_SESSION['auth_type']== 1) {
                                            $query = "SELECT subsciption.paid FROM subsciption INNER JOIN `user_data` ON user_data.newid = subsciption.mem_id AND subsciption.paid_date LIKE '$date%'";
                                        }
                                        else{
                                            $query = "SELECT subsciption.paid FROM subsciption INNER JOIN `user_data` ON user_data.newid = subsciption.mem_id AND user_data.gym_location = '$loc' AND subsciption.paid_date LIKE '$date%' ";
                                        }

                                        //                                        echo $query;
                                        $result  = mysqli_query($con, $query);
                                        $revenue = 0;
                                        if (mysqli_affected_rows($con) != 0) {
                                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                $revenue = $row['paid'] + $revenue;
                                            }
                                        }
                                        echo $revenue;
                                        ?></span>
                    <span>Paid Income This Month</span>
                </div>
            </li>

            <?php if($_SESSION['auth_type']== 1){?>
            <li class='orange'>
                <a href="pending_users.php" style="display: block;">
                <i class="icon-money"></i>
                <div class="details">
									<span class="big"> <?php

                                        $date  = date('Y-m');
                                        $query = "select COUNT(*) from user_data WHERE wait='yes'";

                                        //echo $query;
                                        $result = mysqli_query($con, $query);
                                        $i      = 1;
                                        if (mysqli_affected_rows($con) != 0) {
                                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                echo $row['COUNT(*)'];
                                            }
                                        }
                                        $i = 1;

                                        ?></span>
                    <span>New Member Requests</span>
                </div>
                </a>
            </li>

            <?php }else{ ?>

                <li class='orange'>
                    <i class="icon-money"></i>
                    <div class="details">
									<span class="big"> <?php

                                        $date  = date('Y-m');
                                        $query = "select COUNT(*) from user_data WHERE wait='yes'  AND gym_location='$loc'";

                                        //echo $query;
                                        $result = mysqli_query($con, $query);
                                        $i      = 1;
                                        if (mysqli_affected_rows($con) != 0) {
                                            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                echo $row['COUNT(*)'];
                                            }
                                        }
                                        $i = 1;

                                        ?></span>
                        <span>Pending Requests</span>
                    </div>
                </li>

            <?php } ?>
<!--            <li class='orange'>-->
<!--                <i class="icon-calendar"></i>-->
<!--                <div class="details">-->
<!--                    <span class="big"></span>-->
<!--									<span>--><?php
//                                        echo date('Z');
//                                        ?><!--</span>-->
<!--                </div>-->
<!--            </li>-->
        </ul>
    </div>
</div>