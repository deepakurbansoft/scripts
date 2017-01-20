<?php
include("db.php");
session_start();

$loginuser = $_SESSION['login_user'];

$currentFile = $_SERVER["PHP_SELF"];
$parts = explode('/', $currentFile);
$page = $parts[count($parts) - 1];

function get_cellcount($table_name)
{
    $query = "SELECT count(*) AS count FROM `$table_name` WHERE 1";
    $get_count = mysql_query($query);
    $res = mysql_fetch_assoc($get_count);
    return $res['count'];
}

function get_counponcount(){
    $select = "SELECT list.id,list.item_name,list.coupon_price,list.coupon_img,list.dollar_value,list.featured_home,list.firstpage_coupon,company.name,company.logo FROM `list` INNER JOIN `company` ON list.company_id = company.id ORDER BY `list`.`id` DESC";
    $result = mysql_query($select);
    $coupon_count = mysql_num_rows($result);

    return $coupon_count;
}
?>
 <link rel="stylesheet" href="css/style.css">
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="images/no-profile-img.gif" class="img-circle" alt="User Image">
            </div>
			<?php
				$sel_loginuser = "SELECT * FROM admin_login WHERE id = '$loginuser'";
				$res_loginuser = mysql_query($sel_loginuser);
				$row_loginuser = mysql_fetch_assoc($res_loginuser);
			?>
            <div class="pull-left info">
                <p class="loguser"><?php echo $row_loginuser['name']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <li class="<?php if($page == 'dashboard.php'){echo 'active';}?>">
                <a href="dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>

            </li>

            <li class="treeview <?php if($page == 'add_company.php' || $page == 'company.php' || $page == 'edit_company.php'){echo 'active';}?>">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Company</span>
                    <span class="label label-primary pull-right"><?php echo get_cellcount('company')?></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="add_company"><i class="fa fa-circle-o"></i>Add Company</a></li>
                    <li><a href="company"><i class="fa fa-circle-o"></i>Company List</a></li>

                </ul>
            </li>

            <li class="treeview <?php if($page == 'addcoupon.php' || $page == 'couponlist.php' || $page == 'edit_coupon.php'){echo 'active';}?>">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Coupons</span>
                    <span class="label label-primary pull-right"><?php echo get_counponcount();?></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="addcoupon"><i class="fa fa-circle-o"></i>Add Coupons</a></li>
                    <li><a href="couponlist"><i class="fa fa-circle-o"></i>Coupon List</a></li>
                    <!--li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                    <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li-->
                </ul>
            </li>


        </ul>

    </section>
    <!-- /.sidebar -->
</aside>