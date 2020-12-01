<?php

// $myarray=[
//         "Charbagh"=>0,
//         "Indra Nagar"=>10,
//         "BBD"=>30,
//         "Barabanki"=>60,
//         "Faizabad"=>100,
//         "Basti"=>150,
//         "Gorakhpur"=>210
// ];
session_start();
require_once 'config.php';
require_once 'admin/AR.php';
$con=new Config();
$conn=$con->createConnection();
$arl=new AR();
$myarray=$arl->showlocation($conn);



$current=$_POST['current'];
$drop=$_POST['drop'];
$GLOBALS['$type'] = $_POST['type'];
$GLOBALS['$lugg'] = $_POST['lugg'];
foreach ($myarray as $k => $val) {
    if ($k==$current) {
         $GLOBALS['$current']=$k; 
         $cval=$val;
    }
}
foreach ($myarray as $k => $val) {
    if ($k==$drop) {
        $GLOBALS['$drop']=$k; 
        $dval=$val;
    }
}

switch ($current){
case "CHARBAGH": {
    calculateDistance($dval, $cval);
    break;
}
case "INDRA NAGAR":{
    calculateDistance($dval, $cval);
    break;
}
case 'BBD':{
    calculateDistance($dval, $cval);
    break;
}
case 'BARABANKI':{
    calculateDistance($dval, $cval);
    break;
}
case 'FAIZABAD':{
    calculateDistance($dval, $cval);
    break;
}
case 'BASTI':{
    calculateDistance($dval, $cval);
    break;
}
case 'GORAKHPUR': {
    calculateDistance($dval, $cval);
    break;
}
}

function calculateDistance($dropdis,$currentdis) {
    $distance=abs($dropdis-$currentdis);
    $luggage = $GLOBALS['$lugg'];
    if ($luggage<=10) {
        if ($luggage==0) {
            $lcost=0;
        } else {
            $lcost=50;
        }
    }
    if ($luggage>10 && $luggage<=20) {
        $lcost=100; 
    }
    if ($luggage>20) {
        $lcost=200;
    }
    switch ($GLOBALS['$type']) {
    case 'CedMicro':{
        $extfare=50;
        $lcost=0;
        $car=  $GLOBALS['$type'];
        if ($distance<=10) {
            $fare = ($distance*13.50)+$extfare;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>10 && $distance<=60) {
            $distance50= $distance-10;
            $fare = ((10*13.50)+($distance50*12.00)+$extfare);
            showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>60 && $distance<=160) {
            $distance50 = $distance-60;
            $fare = (10*13.50 + 50*12.00+($distance50*10.20)+$extfare);
            showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>160) {
            $distance100 = $distance-160;
            $fare = ((10*13.50 + 50*12.00 +100*10.20)+($distance100*8.50)+$extfare);
            showAmount($fare, $car, $distance, $lcost, $extfare);
        }
        break;
    }
    case 'CedMini':{
        $extfare=150;
        $car=  $GLOBALS['$type'];
        if ($distance<=10) {
              $fare = ($distance*14.50)+$extfare+$lcost;
              showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>10 && $distance<=60) {
            $distance50 = $distance-10;
            $fare = ((10*14.50)+($distance50*13.00)+$extfare)+$lcost;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>60 && $distance<=160) {
            $distance50= $distance-60;
            $fare = ((10*14.50 + 50*13.00)+($distance50*11.20)+$extfare)+$lcost;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>160) {
            $distance100= $distance-160;
            $fare = ((10*14.50 + 50*13.00 +100*11.20)+($distance100*9.50)+$extfare)+$lcost;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        }
        break;
    }
    case 'CedRoyal':{
        $extfare=200;
        $car=  $GLOBALS['$type'];
        if ($distance<=10) {
            $fare = ($distance*15.50)+$extfare+$lcost;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>10 && $distance<=60) {
            $distance50= $distance-10;
            $fare = ((10*15.50)+($distance50*14.00)+$extfare)+$lcost;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>60 && $distance<=160) {
            $distance50= $distance-60;
            $fare = ((10*15.50 + 50*14.00)+($distance50*12.20)+$extfare)+$lcost;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>160) {
            $distance100= $distance-160;
            $fare = (10*15.50 + 50*14.00 + 100*12.20)+($distance100*10.50)+$extfare+$lcost;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        }
        break;
    }
    case 'Ced SUV':{
        $extfare=250;
        $lcost=2*$lcost;
        $car=  $GLOBALS['$type'];
        if ($distance<=10) {
            $fare = ($distance*16.50)+$extfare+$lcost;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>10 && $distance<=60) {
            $distance50= $distance-10;
            $fare = ((10*16.50)+($distance50*15.00)+$extfare)+$lcost;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>60 && $distance<=160) {
            $distance50= $distance-60;
            $fare = ((10*16.50 + 50*15.00)+($distance50*13.20)+$extfare)+$lcost;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        } else if ($distance>160) {
            $distance100= $distance-160;
            $fare = (10*16.50 + 50*15.00 +100*13.20)+($distance100*11.50)+$extfare+$lcost;
            showAmount($fare, $car, $distance, $lcost, $extfare);
        }
        break;
    }
    }
}

function showAmount($fare,$car,$distance,$lcost,$extfare) 
{    
     $_SESSION['drop']=$GLOBALS['$drop'];
     $_SESSION['current']=$GLOBALS['$current'];
     $_SESSION['car']=$car;
     $_SESSION['dis']=$distance;
     $_SESSION['fare']=$fare;
     $_SESSION['lcost']=$lcost;
     $_SESSION['efare']=$extfare;
    echo "<table class='table'>"; 
    echo "<tr><th>Details </th><th>Amounts</th></tr>";
    echo "<tr><th>Car Type</th><td data-car=".$car.">".$car."</td></tr>";
    echo "<tr><th>Total Distance</th><td>".$distance."/Km</td></tr>";
    echo "<tr><th>Extra Booking Amount</th><td>".$extfare."/Rs</td></tr>";
    echo "<tr><th>Luggage Cost</th><td>".$lcost."/Rs</td></tr>";
    echo "<tr><th>Total Amount</th><th>".$fare."/Rs</th></tr>";
    // echo '<tr><td colspan="2" class="w-100 ml-2"> <button type="button" class="btn text-center w-100 btn-warning" id="bb">Close</button><td> </tr>';
    echo "</table>"; 
}
?>