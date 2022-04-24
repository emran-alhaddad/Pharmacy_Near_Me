<?php
require_once('functions.php');


//for regiester new user
if(isset($_GET['signup'])){
    $response = validateSignup($_POST); // calling validating function from functions.php
   
    if($response['status']){
// statement if validation status is true
if(createUser($_POST)){
    header("location:../../?login=newuser");
}else{
    header("location:../../?signup=signup_failed");
}


    }else{
// statement if validation status is false

       $_SESSION['form_data']=$_POST;
       $_SESSION['error'] = $response;
       header("location:../../?signup");
    }
}



//for loging user
if(isset($_GET['login'])){
    print_r($_POST);
    $userdata = checkUser($_POST['mobile_or_email'],$_POST['password']);

    if(count($userdata)>0){
     $_SESSION['userdata']=$userdata;
     $_SESSION['Auth']=true;
     header("location:../../");
    }else{
     $_SESSION['error']['field'] = 'nouser' ;
     $_SESSION['error']['msg'] = 'User not registered !' ;
       header("location:../../?login");
    }
    
}


//for loging out user
if(isset($_GET['logout'])){
session_destroy();
header("location:../../?login");
}

