<?php
require_once '../config.php';
require_once '../user/user.php';
require_once '../user/Bookride.php';
require_once 'AR.php';
    
   $con=new Config();
   $conn=$con->createConnection();
   $user=new user();
   $newride=new Bookride();
   $action = $_POST['action'];
   $newlocation = new AR();
switch($action){
case "load":{
    echo $user->userData($conn);
    break;
}
case "allow":{
    $uid=$_POST['uid'];
    echo $user->allowUser($conn, $uid);
    break;
}
case "disallow":{
    $uid=$_POST['uid'];
    echo $user->disallowUser($conn, $uid);
    break;
}
case "delete":{
    $uid=$_POST['uid'];
    echo $user->deleteuser($conn, $uid);
    break;
}
case "riderequest":{
    $newride->showriderequest($conn);
    break; 
}
case "sortbyname":{
    $search= $_POST['uid'];
    $newride->sortbynameTable($conn, $search);
    break;
}
case "sortusername":{
  
    $search= $_POST['uid'];
    $user->sortbyuserTable($conn, $search);
    break;
}
case "sortbyname11":{
    $userId= $_SESSION['uid'];
    $search= $_POST['uid'];
    $newride->sortbynameTable11($conn, $search, $userId);
    break;
}

case "filterridedata":{
    $userId= $_SESSION['uid'];
    $search= $_POST['uid'];
    $newride->filterrideTabledata($conn, $search, $userId);
    break;
} 
case "locsort":{
    echo  $search= $_POST['uid'];
    $newlocation->sortlocationTabledata($conn, $search);
    break;
}

}

?>
