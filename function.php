
<span style="background-color:#ee403b; padding:5px; border-radius:50%; color:#fff; float:right"><?php get_calldetails('69','98','2');?></span>
<?php


function get_calldetails($user_id,$prop_id,$cat_id){

    $ch1 = curl_init();// init curl
    curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch1, CURLOPT_URL,"http://ifm.urbansoft-googleglass.com/WebService/Properties");
    curl_setopt($ch1, CURLOPT_POST, 1);// set post data to true
    curl_setopt($ch1, CURLOPT_POSTFIELDS,"id=$user_id");// post data

    curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);// gives you a response from the server

    $response_pro = curl_exec ($ch1);// response it ouputed in the response var

    curl_close ($ch1);// close curl connection

//    var_dump($response_pro);

//$obj_prop = json_decode($response_pro);

    $obj_prop = json_decode($response_pro);

    foreach($obj_prop as $res){


        if($res->prop_id == $prop_id){

            // echo $res->prop_name.",";
            $features_array = $res->packages;

            $cat = json_decode($features_array);
            $cat1 = $cat->feature;
            $a=array();
            foreach($cat1 as $pdet=>$pval){

                if($cat_id == $pval->feature_id)

                echo $pval->remaining_call;

            }

        }

    }
}


