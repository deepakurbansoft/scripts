<?php


$time = strtotime('10:00');
echo $startTime = date("H:i", strtotime('-30 minutes', $time));
echo $endTime = date("H:i", strtotime('+30 minutes', $time));


?>

<?php
//$food_groups = array(
//    'meat' => array(),
//    'vegetables' => array(
//        'leafy' => array('collard greens', 'kale', 'chard', 'spinach', 'lettuce'),
//        'root' => array('radish', 'turnip', 'potato', 'beet'),
//        'other' => array('brocolli', 'green beans', 'corn', 'tomatoes')
//    ),
//    'grains' => array('bread', 'rice', 'oatmeal'),
//    'legumes' => array('kidney beans', 'lentils', 'split peas'),
//    'fruits' => array('apple', 'raspberry', 'pear', 'banana'),
//    'sweets' => array('cookies', 'brownies', 'cake', 'pie'),
//);
//
//$etc = array('cars'=>'AUDI');
//
//array_push($food_groups,$etc);
//
//echo json_encode($etc);
//?>


<?php
//$foo = "0123456789a123456789b123456789c";
//
//var_dump(strrpos($foo, '7', -5));  // Starts looking backwards five positions
//// from the end. Result: int(17)
//
//var_dump(strrpos($foo, '7', 20));  // Starts searching 20 positions into the
//// string. Result: int(27)
//
//var_dump(strrpos($foo, '7', 28));  // Result: bool(false)
//?>

