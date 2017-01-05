<?php
error_reporting(0);
session_start();
include('db_connect.php');
include ("class_lib.php");

//$deepak = new person('Deepak');

//$deepak->setHeight(10);
//echo $deepak->get_name();
//echo $deepak->get_height();


//extract($_POST);
//$pdo = new PDO('mysql:dbname=login', 'root', '');
//
//$userService = new UserService($pdo, $_POST['email'], $_POST['password']);
//if ($user_id = $userService->login()) {
//
//    $userData = $userService->getUser();
//
//    $form_data['success'] = true;
//    $form_data['posted'] = 'Success';
//    // do stuff
//} else {
//    $form_data['success'] = false;
//    $errors['name'] = 'Email id or password Incorrect.';
//    $form_data['errors']  = $errors;
//}


$email=addslashes($email);
$password=addslashes($password);

if(mysql_num_rows(mysql_query("select * from `users` where email='$email' and password='$password'"))>0)
{
    $admin_details=mysql_fetch_assoc(mysql_query("select * from `users` where email='$email' and password='$password'"));
    $admin_id=$admin_details['id'];
    $admin_name=$admin_details['name'];
    $_SESSION['admin_name']=$admin_name;
    $_SESSION['admin_id']=$admin_id;
    $form_data['success'] = true;
    $form_data['posted'] = 'Success';

}
else
{
    $form_data['success'] = false;

    $errors['name'] = 'Email id or password Incorrect.';

    $form_data['errors']  = $errors;


}

echo json_encode($form_data);
?>
