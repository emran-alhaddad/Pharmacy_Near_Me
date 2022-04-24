<?php
require_once('functions.php');
sleep(1);
if(isset($_GET['sendmoney'])){
    $response = array();
if(checkDuplicateMobile($_POST['user_mobile_no'])){
    $user=$_SESSION['userdata'];
    $balance = $user['balance']=getCreditedBalance($user['id'])- getDebitedBalance($user['id']);
    if($balance<$_POST['amount']){
        $response['txn_status']=false;
        $response['msg']="you have insufficient balance";
     }else{
         // runs if everything is ok
         if(sendMoney(getUserIdByMobileNo($_POST['user_mobile_no']),$user['id'],$_POST['amount'])){
            $response['txn_status']=true;
            $response['msg']=$_POST['amount']." Rs is sended to ".$_POST['user_mobile_no']." Successfully";

         }else{
            $response['txn_status']=false;
            $response['msg']="something went wrong, please try again after some time";
         }
     }

}else{
    $response['txn_status']=false;
    $response['msg']="mobile no not registered";
}

echo json_encode($response);
}