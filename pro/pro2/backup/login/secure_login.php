<?php
$a = $_SERVER['HTTP_REFERER'];

if (strpos($a, '/gym/') !== false) {
    
} else {
    header("Location: ../login/");
}

?>
<?php
include '../include/db_conn.php';

$user_id_auth = ltrim($_POST['user_id_auth']);
$user_id_auth = rtrim($user_id_auth);

$pass_key = ltrim($_POST['pass_key']);
$pass_key = rtrim($_POST['pass_key']);

$user_id_auth = stripslashes($user_id_auth);
$pass_key     = stripslashes($pass_key);

$user_id_auth = mysql_real_escape_string($con, $user_id_auth);
$pass_key     = mysql_real_escape_string($con, $pass_key);
$sql          = "SELECT * FROM auth_user WHERE login_id='$user_id_auth' and pass_key='$pass_key'";
$result       = mysql_query($con, $sql);
$count        = mysql_num_rows($result);
if ($count == 1) {
    $row = mysql_fetch_assoc($result);
    session_start();
    // store session data
    $_SESSION['user_data']  = $user_id_auth;
    $_SESSION['logged']     = "start";
    $_SESSION['auth_level'] = $row['level'];
    $_SESSION['sex']        = $row['sex'];
    $_SESSION['full_name']  = $row['name'];
    $auth_l_x               = $_SESSION['auth_level'];

    header("location: ../dashboard/auth_l_5/");

//    if ($auth_l_x == 5) {
//        header("location: ../dashboard/auth_l_5/");
//    } else if ($auth_l_x == 4) {
//        header("location: ../dashboard/auth_l_4/");
//    } else {
//        header("location: ../login/");
//    }
} else {
    include 'index.php';
    echo "<html><head><script>alert('Username OR Password is Invalid');</script></head></html>";
}
?>