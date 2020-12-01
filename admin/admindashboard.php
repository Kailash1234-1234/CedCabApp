
<?php
require_once '../config.php';
require_once '../user/user.php';
require_once '../user/Bookride.php';
// session_start();
if (isset($_SESSION['user_name']) || isset($_SESSION['type'])) {
    $username=$_SESSION['user_name'];
    $name = $_SESSION['name'];
    $type = $_SESSION['type'];
    $mobile = $_SESSION['mobile'];
  
    if ($type==1) {

    } else {
        header('location:../user/userdashboard.php');
    }
} else {
    header('location:../home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pannel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <script src="https://code.jquery.com/jquery-3.5.1.js" 
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    
</head>
<body>
<section id="">
<div class="container-fluid p-0 m-0">  
      <nav class="navbar navbarstyle navbar-expand-sm navbar-light fixed-top">
          <h1 class="logo ml-5 ">
              <a class="navbar-brand" href="#"><span class="aa" ><i class="fa fa-cab"></i> Ced-</span><span id="sp">Cab  <i class="fa fa-angellist"></i></span></a>
          </h1>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"> 
            </ul>
            <form class="form-inline mr-5">
            <ul class="navbar-nav"> 
            <a class="p-4 myaccount" href="#"><?php echo $username; ?></a>
                
                <a class="p-4" href="#">FEATURE</a>
                <a class="p-4" href="#">REVIEWS</a>
                <a  class="mt-3 mb-3 btn btn-outline-danger" href="../logout.php">Logout  <i class="fa fa-sign-out"></i>  </a>  
            </ul>
            </form>
          </div>
        </nav>
</div>
</div>
   </section> 
   <section>
       <div class="container-fluid m-0 p-0">
          
       <div class="row bg-dark text-light p-0">
                <div class="col mt-2 ">
                      <h1> <marquee behavior="alternate" direction="right">WELCOME TO ADMIN DASHBOARD</marquee></h1>
                </div>
        </div>
       
           <div class="row">
               
               <div class="col-sm-3"  >
                   <nav class=" pl-3 p-5" style="height:700px ;background-color:black;">
                   <a class="active d-block mr-4 mb-5" id="dash" href="#"><h3> <i class="fa fa-user-plus"></i> &nbsp;ADMIN DASH</h3></a>
                   <a class="active d-block p-3 mb-5" id="home" href="#">HOME</a>
                    <div class="btn-group dropright d-block pl-3 mb-5">
                        <a type="button" class="text-light dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        RIDES
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item"  id="pendingreq" href="#">Pending Rides</a>
                        <a class="dropdown-item" id="completereq" href="#">Complete Rides</a>
                        <a class="dropdown-item" id="cancelreq" href="#">Cancel Rides</a>
                        <a class="dropdown-item" id="ridereq" href="#">All Rides</a> <!-- Dropdown menu links -->
                    </div>
                  </div>
                    <div class="btn-group dropright d-block pl-3 mb-5">
                        <a type="button" class="text-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        USERS
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" id="pendinguserreq" href="#">Pending user Request</a>
                        <a class="dropdown-item" id="approveuserreq" href="#">Approved User Request</a>
                        <a class="dropdown-item" id="alluser" href="#">All User</a>
                    </div>
                 </div> 
                    <div class="btn-group dropright d-block pl-3 mb-5">
                        <a type="button" class="text-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    LOCATION
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" id="showloc" href="#">Location List</a>
                        <a class="dropdown-item  p-3"  data-toggle="modal" data-target="#exampleModal" href="#">Add Location</a>
                    </div>
                 </div>
                    <div class="btn-group dropright d-block pl-3 mb-5">
                        <a type="button" class="text-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    ACCOUNT
                        </a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item  p-3 myaccount" href="#">My Account</a>
                        <a class="dropdown-item"  data-toggle='modal' data-target='#changepassword' href="#">Change Password</a>
                   </div>
                    </div>  
                   </nav>
               </div>
           <div class="col-sm-9 pr-5 mt-3">
           <div class="row  text-warning p-0 m-0">
                <div class="col mt-2">
                      <h1 class="hh"> <marquee behavior="alternate" direction="right"> <span class="text-success">WELCOME</span> TO ADMIN <span class="text-danger"> DASHBOARD</span></marquee></h1>
                </div>
           </div>
             
<div class="container">
<div id="showride" class="deleteride">
    <?php 
    $con=new Config();
    $conn=$con->createConnection();
    $user=new user();
    $newride=new Bookride();
    $arr1[] = $newride-> showriderequest($conn)
    ?>
    <table class="table table-hover  table-striped">
        <tr class="bg-success"><td colspan="5"><h3 class="text-center p-4 text-light bg-success ">ALL RIDE REQUESTS</h3></td><td  colspan="4"> <span>
        <form>
            <div class="row mt-4 mr-3">
                <div class="col-7">
                <select class="form-control w-100" id="allridesort">
                    <option value="distance">Distance</option>
                    <option value="fare">Total Fare</option>
                    <option value="date">Date</option>
                    <option value="ddistance">Distance DESC</option>
                    <option value="dfare"> Total Fare DESC</option>
                    <option value="ddate">Date DESC</option>
                </select>   
                </div>
                <div class="col">
                <button class="btn btn-outline-dark w-100 " id="allsortride" type="submit">Sort By</button>
                </div>
            </div>
        </form>
</span>  
</td>
    </tr>
    <table class="table table-hover  table-striped deleteride"  id="fdata">
    <tr>
        <th>Ride Id</th>
        <th>Ride Date</th>
        <th>From</th>
        <th>To</th>
        <th>Distance</th>
        <th>Luggage</th>
        <th>Total fare</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
        <?php 
        $allrisereq=0;
        foreach ($arr1 as $k => $val) {
            if (empty($val)) {
                echo "Data not Found !! ";
            } else {
                foreach ($val as $k1 => $v) {
                    $allrisereq++;
                    $ridestatus = $v['status'];
                    if ($ridestatus==1) {
                        $ridestatus="pending";
                    
                    } else if ($ridestatus==2) {
                        $ridestatus="Completed";
                    } else {
                        $ridestatus="Canceled";;
                    }
                    echo"<tr>";  
                    echo "<td>".$v['ride_id']."</td>";
                    echo "<td>".$v['ride_date']."</td>";
                    echo "<td>".$v['ride_from']."</td>";
                    echo "<td>".$v['ride_to']."</td>";
                    echo "<td>".$v['total_distance']."</td>";
                    echo "<td>".$v['luggage']."</td>";
                    echo "<td>".$v['total_fare']."</td>";
                    echo "<td>".$ridestatus."</td>";
                    echo "<td> <a href='#' class='btn btn-danger deleteridebtn' id='deletebtn' data-did='".$v['ride_id']."'>Delete</i></a></td>";
                    echo"</tr>"; 
                }
                echo "<br>";
            }
        }
        ?>
        </tr>
        </div>
    </table>
</div>
<div class="pendingreq deleteridebtn deleteride" id="pendingreq">
    <?php 
        $newride1=new Bookride();
            $arr2[] = $newride1->showpendindrequest($conn);
    ?>    
            <table class="table table-hover table-bordered table-striped">
        <tr class="bg-success"><h3 class="text-center p-4 text-light bg-success ">PENDING RIDE</h3></tr>
    <tr>
        <th>Ride Id</th>
        <th>Ride Date</th>
        <th>From</th>
        <th>To</th>
        <th>Distance</th>
        <th>Luggage</th>
        <th>Total fare</th>
        <th>Status</th>
        <th>Action</th>
        </tr>
        <?php 
        $allpendingreq=0;
        foreach ($arr2 as $k => $val) {
            if (empty($val)) {
                echo "Data not Found !! ";
            } else {
                foreach ($val as $k1 => $v) {
                    $allpendingreq++;
                    $ridestatus = $v['status'];
                    if ($ridestatus==1) {
                        $ridestatus="pending";
                    
                    } else if ($ridestatus==2) {
                        $ridestatus="Completed";
                    } else {
                        $ridestatus="Canceled";;
                    }
                    echo"<tr>";  
                    echo "<td>".$v['ride_id']."</td>";
                    echo "<td>".$v['ride_date']."</td>";
                    echo "<td>".$v['ride_from']."</td>";
                    echo "<td>".$v['ride_to']."</td>";
                    echo "<td>".$v['total_distance']."</td>";
                    echo "<td>".$v['luggage']."</td>";
                    echo "<td>".$v['total_fare']."</td>";
                    echo "<td>".$ridestatus."</td>";
                    echo "<td ><button  class='btn btn-success acceptridebtn' data-aid='".$v['ride_id']."'>Accept</button>
                    
                    <a href='#' class='btn btn-danger cancelridebtn' id='deletebtn' data-did='".$v['ride_id']."'>Cancel</a></td>";
                    echo"</tr>"; 
                }
            }    echo "<br>";
        }
        ?>
        </tr>
    </table>
</div>
<div class="completereq deleteride" id="completereq">
    <?php
        $newride2=new Bookride();
        $arr3[] = $newride2->showcompletedrequest($conn);
    ?>
     <table class="table table-hover table-bordered table-striped">
            <tr class="bg-success"><h3 class="text-center p-4 text-light bg-success ">COMPLETE RIDE</h3></tr>
        <tr>
            <th>Ride Id</th>
            <th>Ride Date</th>
            <th>From</th>
            <th>To</th>
            <th>Distance</th>
            <th>Luggage</th>
            <th>Total fare</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
            <?php 
            $completeride=0;
            $tfare=0;
            foreach ($arr3 as $k => $val) {
                if (empty($val)) {
                    echo "Data not Found !! ";
                } else {
                    foreach ($val as $k1 => $v) {
                        $completeride++;
                        $tfare=$tfare+$v['total_fare'];
                        $ridestatus = $v['status'];
                        if ($ridestatus==1) {
                            $ridestatus="pending";
                        
                        } else if ($ridestatus==2) {
                            $ridestatus="Completed";
                        } else {
                            $ridestatus="Canceled";;
                        }
                        echo"<tr>";  
                        echo "<td>".$v['ride_id']."</td>";
                        echo "<td>".$v['ride_date']."</td>";
                        echo "<td>".$v['ride_from']."</td>";
                        echo "<td>".$v['ride_to']."</td>";
                        echo "<td>".$v['total_distance']."</td>";
                        echo "<td>".$v['luggage']."</td>";
                        echo "<td>".$v['total_fare']."</td>";
                        echo "<td>".$ridestatus."</td>";
                        echo "<td class=''>
                       
                        <a href='#' class='btn btn-outline-danger deleteridebtn' id='deletebtn' data-did='".$v['ride_id']."'>Delete</a>
                        <a href='#' class='btn btn-outline-primary invoicebtn'  data-toggle='modal' data-target='#Invoice'  data-inid='".$v['ride_id']."'>Invoice</a>
                        </td>";
                        echo"</tr>"; 
                    }
                }    echo "<br>";
            }
            ?>
            </tr>
        </table>
    </div>
<div id="cancelride" class="deleteride">
    <?php
        $newride3=new Bookride();
        $arr4[] = $newride2->cancelriderequest($conn);
    ?>
    <table class="table table-hover table-bordered table-striped">
        <tr class="bg-success"><h3 class="text-center p-4 text-light bg-success ">CANCEL RIDE</h3></tr>
        <tr>
            <th>Ride Id</th>
            <th>Ride Date</th>
            <th>From</th>
            <th>To</th>
            <th>Distance</th>
            <th>Luggage</th>
            <th>Total fare</th>
            <th>Status</th>
            <th>Action</th>
            </tr>
            <?php 
            $cancelridereq=0;
            foreach ($arr4 as $k => $val) {
                if (empty($val)) {
                    echo "Data not Found !! ";
                } else {
                    foreach ($val as $k1 => $v) {
                        $cancelridereq++;
                        $ridestatus = $v['status'];
                        if ($ridestatus==1) {
                            $ridestatus="pending";
                        
                        } else if ($ridestatus==2) {
                            $ridestatus="Completed";
                        } else {
                            $ridestatus="Canceled";;
                        }
                        echo"<tr>";  
                        echo "<td>".$v['ride_id']."</td>";
                        echo "<td>".$v['ride_date']."</td>";
                        echo "<td>".$v['ride_from']."</td>";
                        echo "<td>".$v['ride_to']."</td>";
                        echo "<td>".$v['total_distance']."</td>";
                        echo "<td>".$v['luggage']."</td>";
                        echo "<td>".$v['total_fare']."</td>";
                        echo "<td>".$ridestatus."</td>";
                        echo "<td class=''><button  class='btn btn-success acceptridebtn' data-aid='".$v['ride_id']."'>Accept</button>
                        <button  class='btn btn-primary deleteride' data-rid='".$v['ride_id']."'>delete</button>
                        </td>";
                        echo"</tr>"; 
                    }
                
                    echo "<br>";
                }
            }
            ?>
    </table>
</div>


<!-- start users details print_r -->
           
                <div class="showdatauser" id="showdatauser">
                        <?php
                            $user1=new user();
                            $urr1[] = $user1-> userData($conn);
                        ?>
                       <table class="table table-hover  table-striped">
                        <tr class="bg-success"><td colspan="5"><h3 class="text-center p-4 text-light bg-success ">ALL USER'S REQUESTS</h3></td><td  colspan="4"> <span>
                        <form>
                            <div class="row mt-4 mr-3">
                                <div class="col-7">
                                <select class="form-control w-100" id="allusersort">
                                    <option value="name">name</option>
                                    <option value="username">username</option>
                                    <option value="mobile">mobile</option>
                                    <option value="dos">Date of Signup</option>
                                    <option value="dname">name DESC</option>
                                    <option value="dusername">username DESC</option>
                                    <option value="dmobile">mobile DESC</option>
                                    <option value="ddos">Date of Signup DESC</option>
                                
                                </select>   
                                </div>
                                <div class="col">
                                <button class="btn btn-outline-dark w-100 " id="allsortuser" type="submit">Sort By</button>
                                </div>
                            </div>
                        </form>
                </span>  
                </td>
                </tr>
                <table class="table table-hover  table-striped "  id="udata">
                <!-- <div class="table table-hover  table-striped"> -->
                <tr>
                            <th>User Id</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Phone No</th>
                            <th>Blocked Status</th>
                            <th>Admin status</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        $alluserreq=0;
                        foreach ($urr1 as $k => $val) {
                            if (empty($val)) {
                                echo "Data not Found !! ";
                            } else {
                                foreach ($val as $k1 => $v) {
                                    $alluserreq++;
                                    $isadmin = $v['is_blocked'];
                                    if ($isadmin==1) {
                                        $isadmin="Admin";
                                    } else {
                                        $isadmin="Normal User";
                                    }
                                    $isblocked=$v['is_blocked'];
                                    if ($isblocked==1) {
                                        $isblocked="UnBlocked";
                                    } else {
                                        $isblocked="Blocked";
                                    }
                                    echo"<tr>";  
                                    echo "<td>".$v['user_id']."</td>";
                                    echo "<td>".$v['name']."</td>";
                                    echo "<td>".$v['user_name']."</td>";
                                    echo "<td>".$v['mobile']."</td>";
                                    echo "<td>".$isblocked."</td>";
                                    echo "<td>".$isadmin."</td>";
                                    echo "<td><button  class='btn btn-success allow' data-aid='".$v['user_id']."'>Approve</button>
                                    <button  class='btn btn-primary disallow' data-rid='".$v['user_id']."'>Disapprove</button>
                                    <a href='#' class='btn btn-danger deletebtn' id='deletebtn' data-did='".$v['user_id']."'>Delete</a></td>";
                                    echo"</tr>"; 
                                }
                                echo "<br>";
                            }
                        }
                        ?>
                    </table>
                </div>
             
                

            <div class="showdatauser" id="showpendinguser">
                <?php
                    $user2=new user();
                    $urr2[] = $user2-> userpending($conn);
                ?>
                <table class="table table-hover table-bordered m-0 p-0 table-striped">
                    <tr class="bg-success m-0 p-0"><h3 class="text-center p-4 text-light bg-success ">PENDING USERS REQUEST LIST</h3></tr>
                    <tr>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Phone No</th>
                        <th>Blocked Status</th>
                        <th>Admin status</th>
                        <th>Action</th>
                    </tr>
                    <?php 
                    $userpendingreq=0;
                    foreach ($urr2 as $k => $val) {
                        if (empty($val)) {
                            echo "Data not Found !! ";
                        } else {
                            foreach ($val as $k1 => $v) {
                                $userpendingreq++;
                                $isadmin = $v['is_blocked'];
                                if ($isadmin==1) {
                                    $isadmin="Admin";
                                } else {
                                    $isadmin="Normal User";
                                }
                                $isblocked=$v['is_blocked'];
                                if ($isblocked==1) {
                                    $isblocked="UnBlocked";
                                } else {
                                    $isblocked="Blocked";
                                }
                                echo"<tr>";  
                                echo "<td>".$v['user_id']."</td>";
                                echo "<td>".$v['name']."</td>";
                                echo "<td>".$v['user_name']."</td>";
                                echo "<td>".$v['mobile']."</td>";
                                echo "<td>".$isblocked."</td>";
                                echo "<td>".$isadmin."</td>";
                                echo "<td><button  class='btn btn-success allow' data-aid='".$v['user_id']."'>Approve</button>
                                <a href='#' class='btn btn-danger deletebtn' id='deletebtn' data-did='".$v['user_id']."'>Delete</a></td>";
                                echo"</tr>"; 
                            }
                            }    echo "<br>";
                    }
                    ?>
                </table>
            </div>
                        


                   
            <div class="showdatauser" id="showapproveuser">
                        <?php
                            $user3=new user();
                            $urr3[] = $user3-> approveuserrequest($conn);
                        ?>
                        <table class="table table-hover m-0 p-0 table-striped">
                           <tr class="bg-success m-0 p-0"><h3 class="text-center p-4 text-light bg-success ">APPROVE USERS LIST</h3></tr>
                            <tr>
                                <th>User Id</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Phone No</th>
                                <th>Blocked Status</th>
                                <th>Admin status</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                            $approveuserlist=0;
                            foreach ( $urr3 as $k => $val) {
                                if (empty($val)) {
                                    echo "Data not Found !! ";
                                } else {
                                    foreach ($val as $k1 => $v) {
                                        $isadmin = $v['is_admin'];
                                        if ($isadmin==1) {
                                            $isadmin="Admin";
                                        } else {
                                            $isadmin="Normal User";
                                        }

                                        $isblocked=$v['is_blocked'];
                                        if ($isblocked==1) {
                                            $isblocked="UnBlocked";
                                        } else {
                                            $isblocked="Blocked";
                                        }
                                            $approveuserlist++;
                                            echo"<tr>";  
                                            echo "<td>".$v['user_id']."</td>";
                                            echo "<td>".$v['name']."</td>";
                                            echo "<td>".$v['user_name']."</td>";
                                            echo "<td>".$v['mobile']."</td>";
                                            echo "<td>".$isblocked."</td>";
                                            echo "<td>".$isadmin."</td>";
                                            echo "<td>
                                            <button  class='btn btn-primary disallow' data-rid='".$v['user_id']."'>DisApprove</button>
                                            <a href='#' class='btn btn-danger deletebtn' id='deletebtn' data-did='".$v['user_id']."'>Delete</a></td>";
                                            echo"</tr>"; 
                                    }
                                        echo "<br>";
                                }
                            }
                                ?>
                         </table>       
                    </div>
         <!-- Button trigger modal -->

</div>    
<!-- end ride details -->
           <!-- start location -->
                  <div id="showlocation" class="showlocation">
                        <?php
                           require_once 'AR.php';
                           $loc=new AR();
                            $lrr1[] = $loc-> allLocation($conn);
                        ?>
                       <table class="table table-hover table-bordered  table-striped">
                        <tr class="bg-success"><td colspan="5"><h3 class="text-center p-4 text-light bg-success ">ALL LOCATION LIST</h3></td><td  colspan="4"> <span>
                        <form>
                            <div class="row mt-4 mr-3">
                                <div class="col-7">
                                <select class="form-control w-100 alllocation">
                                    <option value="Sort location by">Sort location by ...</option>
                                    <option value="name">name</option>
                                    <option value="distance">distance</option>
                                    <option value="is_available">Availbility</option>
                                </select>   
                                </div>
                            </div>
                        </form>
                </span>  
                </td>
                </tr>
                <table class="table table-hover  table-bordered table-striped showlocation"  id="ldata">
                <!-- <div class="table table-hover  table-striped"> -->
                <tr>
                            <th>Location Id</th>
                            <th>Name</th>
                            <th>Distance</th>
                            <th>Is Available</th>
                            <th>Action</th>
                        </tr>
                        <?php 
                        $allloc=0;
                        foreach ($lrr1 as $k => $val) {
                            if (empty($val)) {
                                echo "Data not Found !! ";
                            } else {
                                foreach ($val as $k1 => $v) {
                                    $allloc++;
                                    $aval=$v['is_available'];
                                    if ($aval==1) {
                                        $aval="Available";
                                    } else {
                                        $aval="Not Availabale";
                                    }
                                    echo"<tr>";  
                                    echo "<td>".$v['id']."</td>";
                                    echo "<td>".$v['name']."</td>";
                                    echo "<td>".$v['distance']."</td>";
                                    echo "<td>".$aval."</td>";
                                    echo "<td><button  class='btn btn-success available' data-aid='".$v['id']."'>Available</button>
                                    <button  class='btn btn-primary notavailable' data-rid='".$v['id']."'>Not Available</button>
                                    <a href='#' class='btn btn-danger deleteloc' id='deletebtn' data-did='".$v['id']."'>delete</a></td>";
                                    echo"</tr>"; 
                                }
                                echo "<br>";
                            }
                        }
                        ?>
                    </table>
                </div>
            <!-- start main dash page -->
            <div class="row p-2 text-center"  id="maindash">
                <div class="col-sm-4 mb-3 ridereqtile">
                    <div class="card bg-success text-light">
                    <div class="card-body">
                        <h5 class="card-title">All User Ride Request</h5>
                        <h1 class="card-text"><?php echo $allrisereq; ?>   <i class="fa fa-dashboard"></i></h1>
                        <a href="#" class="btn btn-outline-light w-100"> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4 pendingreqtile">
                    <div class="card bg-warning text-light">
                    <div class="card-body">
                        <h5 class="card-title">Pending Ride Request</h5>
                        <h1 class="card-text"><?php echo $allpendingreq; ?>  <i class="fa fa-dashboard"></i></h1>
                        <a href="#" class="btn btn-outline-light w-100"> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4 cancelreqtile">
                    <div class="card bg-danger text-light">
                    <div class="card-body">
                        <h5 class="card-title">All Cancel Ride</h5>
                        <h1 class="card-text"><?php echo $cancelridereq; ?>  <i class="fa fa-dashboard"></i> </h1>
                        <a href="#" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-3 completetile">
                    <div class="card bg-success text-light">
                    <div class="card-body">
                    <h5 class="card-title">All Complete Ride</h5>
                        <h1 class="card-text"><?php echo $completeride; ?>   <i class="fa fa-dashboard"></i> </h1>
                        <a href="#" class="btn btn-outline-light w-100"> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4 allusertile">
                    <div class="card bg-warning text-light">
                    <div class="card-body">
                        <h5 class="card-title">All User Request</h5>
                        <h1 class="card-text"><?php echo $alluserreq; ?>  <i class="fa fa-group"></i></h1>
                        <a href="#" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4 pendingusertile">
                    <div class="card bg-danger text-light">
                    <div class="card-body">
                    <h5 class="card-title">Disapprove User List</h5>
                        <h1 class="card-text"><?php echo $userpendingreq++; ?>   <i class="fa fa-user-times"></i></h1>
                     
                        <a href="#" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4 mb-5 approveusertile ">
                    <div class="card bg-success text-light">
                    <div class="card-body">
                    <h5 class="card-title">Approve User List</h5>
                        <h1 class="card-text"><?php echo $approveuserlist; ?>  <i class="fa fa-user-plus"></i></h1>
                        <a href="#" class="btn btn-outline-light w-100"> <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card bg-warning text-light">
                    <div class="card-body">
                        <h5 class="card-title">Total Earning</h5>
                        <h1 class="card-text"><i class="fa fa-inr"></i>   <?php echo $tfare; ?> </h1>
                        <a href="#" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card bg-danger text-light alllocationtile">
                    <div class="card-body">
                        <h5 class="card-title">Total Number Of Locations</h5>
                        <h1 class="card-text"><?php echo  $allloc; ?>   <i class="fa fa-gear fa-spin "></i>  </h1>
                        <a href="#" class="btn btn-outline-light w-100"><i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                </div>
                
            </div>
            <!-- end main dash page  -->
             

                <!-- Modal -->
                <div class="modal fade "  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body bg-secondary text-light">
                                    <h1 class="text-center">Add Ride Details</h1>
                                    <form>
                                        <div class="form-group">
                                            <label for="ridename">Add Place</label>
                                            <input type="text" class="form-control" id="ridename" placeholder="Enter Place Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="distance">Add Distance</label>
                                            <input type="number" class="form-control" id="distance" placeholder="Enter distance">
                                        </div>
                                        <button type="button"  id="addride"  data-dismiss="modal" class="btn btn-outline-success w-50">ADD HERE</button>
                                        <button type="button" class="btn btn-outline-danger w-25" data-dismiss="modal">Close</button>
                                        <form>
                                    </div>
                    </div>
                </div>
                </div>

                <div id="myprofile" class="col-8   bg-light text-center mb-3 p-3 mr-5">
                        <?php
                            $user11=new user();
                            $urr11[] = $user11-> userData111($conn, $username);
                        ?>
                        <div class="card-header bg-light">
                        <span class=" p-2 myspan">Your Details Here..</span>
                        </div>      
                        <table class='table'><?php
                         
                        foreach ($urr11 as $k => $val) {
                            foreach ($val as $k1 => $v) {
                                $username1 = $v['user_id'];
                                $name1=$v['name'];
                                $mobile1=$v['mobile'];
                                $isadmin1 = $v['is_admin'];
                                if ($isadmin==1) {
                                    $isadmin="Admin";
                                } else {
                                    $isadmin="Normal User";
                                }

                                $isblocked=$v['is_blocked'];
                                if ($isblocked==1) {
                                    $isblocked="UnBlocked";
                                } else {
                                    $isblocked="Blocked";
                                }
                                echo"<tr>";  
                                echo "<th>User Id</th><td>".$v['user_id']."</td></tr><tr>";
                                echo "<th>Name</th><td>".$v['name']."</td></tr><tr>";
                                echo "<th>User Name</th><td>".$v['user_name']."</td></tr><tr>";
                                echo "<th>Mobile</th><td>".$v['mobile']."</td></tr><tr>";
                                echo "<th>Isbolcked Status</th><td>".$isblocked."</td></tr><tr>";
                                echo "<tr>";
                                echo '<td><button id="myaccountbtn" class="btn w-100 btn-outline-danger">Close</button></td><td>
                                <button type="button" class="btn btn-outline-success w-100" data-toggle="modal" data-target="#exampleModal11">EDIT DETAILS</button></td>';
                                echo"</tr>"; 
                            }
                        }
                        ?>
                    </table>
                </div>
    <!-- Button trigger modal -->


                                    <!-- Modal -->
                                <div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="id">USER ID</label>
                                                <input type="text" readonly class="form-control text-left" id="id" value="<?php echo $username1; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="id">NEW Name</label>
                                                <input type="text" class="form-control" id="aname" value="<?php echo $name1; ?>">
                                                </div>
                                            <div class="form-group">
                                                <label for="id">New Mobile</label>
                                                <input type="text" class="form-control" id="amobile"  value="<?php echo $mobile1; ?>">
                                            </div>
                                            <button type="submit" class="btn btn-primary updateadmin"  data-dismiss="modal">UPDATE DETAILS</button>
                                            <button type="button" class="btn btn-secondary w-50" data-dismiss="modal">Close</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
<!-- starts ride details -->

                        <!-- Modal -->
                        <div class="modal fade " id="addridemodal" tabindex="-1" role="dialog" aria-labelledby="modaltitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body bg-secondary text-light">
                                        <h1 class="text-center">Add Ride Details</h1>
                                        <form>
                                            <div class="form-group">
                                                <label for="ridename">Add Place</label>
                                                <input type="text" class="form-control" id="ridename" placeholder="Enter Place Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="distance">Add Distance</label>
                                                <input type="number" class="form-control" id="distance" placeholder="Enter distance">
                                            </div>
                                            <button type="button"  id="addride" class="btn btn-outline-success w-50">ADD HERE</button>
                                            <button type="button" class="btn btn-outline-danger w-25" data-dismiss="modal">Close</button>
                                        <form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>

<!-- Modal  Invoice for ride-->
<div class="modal fade" id="Invoice" tabindex="-1" role="dialog" aria-labelledby="invoice" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content bg-success">
                                    <div class="modal-header">
                                        <h2 class="modal-title text-light" id="exampleModalLabel">Ride Invoice Details</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body showinvoice bg-warning" >
                                      
                                    </div>
                                   <div class="modal-footer ">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
 <!-- Modal  change password-->
             <div class="modal fade" id="changepassword" tabindex="-1" role="dialog" aria-labelledby="changepassword" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="id">USER ID</label>
                                                <input type="button" class="form-control text-left" id="id" value="<?php echo $username; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="id">Old Password</label>
                                                <input type="text" class="form-control" id="oldp" placeholder="enter old password">
                                                </div>
                                            <div class="form-group">
                                                <label for="id">New passwoed</label>
                                                <input type="text" class="form-control" id="newp" placeholder="enter new password">
                                            </div>
                                            <button type="submit" class="btn btn-primary updatepass"  data-dismiss="modal">UPDATE PASSWORD</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
<!-- start footer  -->

    <div class="container-fluid p-0 m-0" id="footer11">
       <div class="row">
         <div class="col-sm-5">
          <div class="footerleft">
            <nav>
                <span class="box p-3 bg-light">
                    <i class="fa fa-facebook-official fa-1x colorfooter"></i>
                </span>
                <span class="box p-3 bg-light">
                    <i class="fa fa-google fa-1x colorfooter"></i>
                </span> 
                <span class="box p-3 bg-light">
                    <i class="fa fa-skype fa-1x colorfooter"></i>
                </span>  
                <span class="box p-3 bg-light">
                    <i class="fa fa-instagram fa-1x colorfooter"></i>
                </span>
            </nav>
        </div>
         </div>
        <div class="col-sm-7">
        <div class="footerright">
          <nav class="navbar">
              <h1 class="mt-4">
              <a class="navbar-brand" href="#"><span class="aa" ><i class="fa fa-cab"></i> Ced-</span><span id="sp">Cab  <i class="fa fa-angellist"></i></span></a>
              </h1>
              <form class="form-inline text-light">
                  <a class="p-4" href="#">FEATURE</a>
                  <a class="p-4" href="#">REVIEWS</a>
              </form>
          </nav> 
      </div>
        </div>
      </div>
       <div class="row">
         <div class="col">
          <p class="text-center star">Cedcab2020@gmail.com &copy; 2020 </p>
         </div>
         
       </div> 
    </div>
   
<script>
$(document).ready(function(){

     //update password myprofile
     $("#changepassword").on("click",".updatepass", function(){
            var uid=$("#id").val();
            var oldp=$("#oldp").val();
            var newp=$("#newp").val();
            //alert("i am up date"+uid+oldp+newp);
            var action ="changepass";
            $.ajax({
                url : "../user/action.php",
                type: "POST",
                data:{uid:uid, action:action, oldp:oldp, newp:newp},
                success: function(data){
                        alert("details updatedsuccessfully");
                        window.location.href='../logout.php';
                }
                
            })
        })
         //update password myprofile
     $("#exampleModal11").on("click",".updateadmin", function(){
            var uid=$("#id").val();
            var name=$("#aname").val();
            var phone=$("#amobile").val();
            var action ="changedetails";
            intRegex = /[0-9 -()+]+$/;
              if((phone.length < 9) || (phone.length > 12) || (!intRegex.test(phone)))
              {
                  alert('Please enter a valid phone number.');
                  return false;
              } else {
           
            $.ajax({
                url : "../user/action.php",
                type: "POST",
                data:{uid:uid, action:action, name:name, mobile:phone},
                success: function(data){
                        alert("details updatedsuccessfully");
                }
            })
              }
        })
      //laod data in php ajax
    
        function loaddata(){
            var action="load";
            $.ajax({
                url: 'adminaction.php',
                type: 'POST',
                data : {
                 action: action
                },
                success: function(data){
                     $("#showdata").html(data);
                },
                error : function(){
                    alert("error");
                } 
            });
        }
        loaddata();
        $("#dash").on("click", function(e){
            alert("heloo i am dashboard");
        })
        $("#addride").on("click", function(e){
            var name= $("#ridename").val();
            var distance= $("#distance").val();
           // alert("heloo i am add ride"+name+distance);
            $.ajax({
                url : "addride.php",
                type : "POST",
                data : {name:name, distance:distance},
                success : function(data){
                    alert(data);
                }
            })
        })
         
            // show my account
            $(".pendingreq").hide();
            $(".completereq").hide();
            $("#myprofile").hide();
            $("#showdatauser").hide();

            $(".myaccount").on("click", function(e){
            e.preventDefault();
            $("#myprofile").show();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $("#cancelride").hide();
            $(".pendingreq").hide();
            $(".completereq").hide();
            $("#showlocation").hide();
            $("#cancelride").hide();
        })
        $("#myaccountbtn").on("click", function(e){
            e.preventDefault();
            $("#myprofile").hide();
            $("#maindash").show();
            $("#showlocation").hide();
            $(".completereq").hide();
            $(".pendingreq").hide();
        })
        // show ride request
        $("#showride").hide();
        $("#ridereq").on("click", function(e){
            $("#showride").show();
            $("#maindash").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $("#cancelride").hide();
            $("#showlocation").hide();
            $(".pendingreq").hide();
            $("#myprofile").hide();
            $(".completereq").hide();
            $("#showdata").hide();
        });
        $("#showride").hide();
        $(".ridereqtile").on("click", function(e){
            $("#showride").show();
            $("#maindash").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $("#cancelride").hide();
            $("#showlocation").hide();
            $(".pendingreq").hide();
            $("#myprofile").hide();
            $(".completereq").hide();
            $("#showdata").hide();
        });
         // cancel ride request
        $("#cancelride").hide();
        $("#cancelreq").on("click", function(e){
            $("#cancelride").show();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $("#showlocation").hide();
            $(".pendingreq").hide();
            $("#myprofile").hide();
            $(".completereq").hide();
        })
          $("#cancelride").hide();
        $(".cancelreqtile").on("click", function(e){
            $("#cancelride").show();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $("#showlocation").hide();
            $(".pendingreq").hide();
            $("#myprofile").hide();
            $(".completereq").hide();
        })
       
         // show all user request list
        $("#showdata").hide();
        $("#alluser").on("click", function(e){
            $("#showdata").show();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").show();
            $("#cancelride").hide();
            $("#showlocation").hide();
            $(".pendingreq").hide();
            $("#myprofile").hide();
            $(".completereq").hide();
        })
        $("#showdata").hide();
        $(".allusertile").on("click", function(e){
            $("#showdata").show();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").show();
            $("#cancelride").hide();
            $("#showlocation").hide();
            $(".pendingreq").hide();
            $("#myprofile").hide();
            $(".completereq").hide();
        })
        // show apending user request list
        $("#showpendinguser").hide();
        $("#pendinguserreq").on("click", function(e){
            $("#showpendinguser").show();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $("#cancelride").hide();
            $(".pendingreq").hide();
            $("#showlocation").hide();
            $("#myprofile").hide();
            $(".completereq").hide();
        })
        $("#showpendinguser").hide();
        $(".pendingusertile").on("click", function(e){
            $("#showpendinguser").show();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $("#cancelride").hide();
            $(".pendingreq").hide();
            $("#showlocation").hide();
            $("#myprofile").hide();
            $(".completereq").hide();
        })
        // show approved user request list
        $("#showapproveuser").hide();
        $("#approveuserreq").on("click", function(e){
            $("#showpendinguser").hide();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").show();
            $("#showdatauser").hide();
            $("#cancelride").hide();
            $("#showlocation").hide();
            $(".pendingreq").hide();
            $("#myprofile").hide();
            $(".completereq").hide();
        })
        $("#showapproveuser").hide();
        $(".approveusertile").on("click", function(e){
            $("#showpendinguser").hide();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").show();
            $("#showdatauser").hide();
            $("#cancelride").hide();
            $("#showlocation").hide();
            $(".pendingreq").hide();
            $("#myprofile").hide();
            $(".completereq").hide();
        })
        // pending req list
        $(".pendingreq").hide();
        $("#pendingreq").on("click", function(){
            $(".pendingreq").show();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $("#cancelride").hide();
            $(".completereq").hide();
            $("#showlocation").hide();
            $("#myprofile").hide();
        })
        $(".pendingreq").hide();
        $(".pendingreqtile").on("click", function(){
            $(".pendingreq").show();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $("#cancelride").hide();
            $(".completereq").hide();
            $("#showlocation").hide();
            $("#myprofile").hide();
        })

        // complete ride request list
        $(".completereq").hide();
        $("#completereq").on("click", function(e){
            $(".completereq").show();
            $(".pendingreq").hide();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $("#cancelride").hide();
            $("#showlocation").hide();
            $("#myprofile").hide();
        })
        $(".completereq").hide();
        $(".completetile").on("click", function(e){
            $(".completereq").show();
            $(".pendingreq").hide();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $("#cancelride").hide();
            $("#showlocation").hide();
            $("#myprofile").hide();
        })
        // cancel ride request
        $("#cancelride").hide();
        $("#cancelreq").on("click", function(e){
            $(".pendingreq").hide();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $(".completereq").hide();
            $("#showlocation").hide();
            $("#cancelride").show();
            $("#myprofile").hide();
        })
        $("#cancelride").hide();
        $(".canceltile").on("click", function(e){
            $(".pendingreq").hide();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $(".completereq").hide();
            $("#showlocation").hide();
            $("#cancelride").show();
            $("#myprofile").hide();
        })
       
        // show all location list
        $("#showlocation").hide();
        $("#showloc").on("click", function(e){
            $(".pendingreq").hide();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $(".completereq").hide();
            $("#cancelride").hide();
            $("#showlocation").show();
            $("#myprofile").hide();
        })
        $("#showlocation").hide();
        $(".alllocationtile").on("click", function(e){
            $(".pendingreq").hide();
            $("#showride").hide();
            $("#maindash").hide();
            $("#showdata").hide();
            $("#showapproveuser").hide();
            $("#showdatauser").hide();
            $(".completereq").hide();
            $("#cancelride").hide();
            $("#showlocation").show();
            $("#myprofile").hide();
        })

        $(".showdatauser").on("click", ".allow", function(){
            var userId= $(this).data("aid");
            // alert(userId);
            $.ajax({
                url : "adminaction.php",
                type : "POST",
                data : {uid:userId, action:"allow"},
                success : function(data){
                    location.reload();
                }
            })
        })

        $(".showdatauser").on("click", ".disallow", function(){
            var userId= $(this).data("rid");
            $.ajax({
                url : "adminaction.php",
                type : "POST",
                data : {uid:userId, action:"disallow"},
                success : function(data){
                    location.reload();
                }
            })
        })

        $(".showdatauser").on("click", "#deletebtn", function(){
            var userId= $(this).data("did");
            $.ajax({
                url : "adminaction.php",
                type : "POST",
                data : {uid:userId, action:"delete"},
                success : function(data){
                  
                    if(data==1){
                        alert("not delete")
                    } else {
                        alert("User delete Successfully"); 
                        location.reload();
                    }
                   
                }
                
            })
        })  
        
       // all location sorting
        $(".alllocation").on("change" ,function(e){
            var id = $(".alllocation").val();
            //alert("i am sort all ride "+id)
            $.ajax({
                url : "adminaction.php",
                type : "POST",
                data : {uid:id, action:"locsort"},
                success : function(data){
                   //alert(data);
                   $("#ldata").html(data);
                }    
            })
        })
    
  //avilable location
  $(".showlocation").on("click" ,".available", function(){
        var id= $(this).data("aid");
       // alert("i am available" +id);
        $.ajax({
                url : "../user/action.php",
                type : "POST",
                data : {uid:id, action:"available"},
                success : function(data){
                     alert("Successfully Updated");
                   location.reload();
                }    
            })
       });
       // not avialable location
       $(".showlocation").on("click" ,".notavailable", function(){
        var id= $(this).data("rid");
        alert("i am not available"+id)
        $.ajax({
                url : "../user/action.php",
                type : "POST",
                data : {uid:id, action:"notavailable"},
                success : function(data){
                    alert("Success fully Updated");
                   //location.reload();
                }    
            })
       });
       //delete loction
       $(".showlocation").on("click" ,".deleteloc", function(){
        var id= $(this).data("did");
        alert("i am delete loc"+id)
        $.ajax({
                url : "../user/action.php",
                type : "POST",
                data : {uid:id, action:"deleteloc"},
                success : function(data){
                   location.reload();
                    alert( "Successfully Deleted location");
                }    
            })
       });
        //end location btn


        $("#allsortride").on("click" ,function(e){
            e.preventDefault();
            var id = $("#allridesort").val();
            //alert("i am sort all ride "+id)
            $.ajax({
                url : "adminaction.php",
                type : "POST",
                data : {uid:id, action:"sortbyname"},
                success : function(data){
                  // alert(data);
                   $("#fdata").html(data);
                }    
            })
        })


        $("#allsortuser").on("click" ,function(e){
            e.preventDefault();
            var id = $("#allusersort").val();
             // alert("i am sort all ride "+id)
            $.ajax({
                url : "adminaction.php",
                type : "POST",
                data : {uid:id, action:"sortusername"},
                success : function(data){
                  //   alert(data);
                   $("#udata").html(data);
                }    
            })
        })

       //cancel ride by user
       $(".deleteride").on("click" ,".cancelridebtn", function(){
        var id= $(this).data("did");
       // alert("i am delete ride" +id);
        $.ajax({
                url : "../user/action.php",
                type : "POST",
                data : {uid:id, action:"cancelride"},
                success : function(data){
                //   
                alert(data);
                }    
            })
       });
       $(".deleteride").on("click" ,".deleteridebtn", function(){
        var id= $(this).data("did");
       // alert("i am delete ride" +id);
        $.ajax({
                url : "../user/action.php",
                type : "POST",
                data : {uid:id, action:"deleteride"},
                success : function(data){
                //   
                alert(data);
                }    
            })
       });


        // show invoice of particular user
       $(".deleteride").on("click" ,".invoicebtn", function(){
        var id= $(this).data("inid");
      //  alert("i am  ride Invoice" +id);
        $.ajax({
                url : "../user/action.php",
                type : "POST",
                data : {uid:id, action:"rideinvoice"},
                success : function(data){
                    $(".showinvoice").html(data);
                    //alert(data)
                   //location.reload();
                }    
            })
       });
       
       // complete by user
       $(".deleteride").on("click" ,".completeridebtn", function(){
        var id= $(this).data("rid");
        $.ajax({
                url : "../user/action.php",
                type : "POST",
                data : {uid:id, action:"completeride"},
                success : function(data){
                   location.reload();
                }    
            })
       });
       //pending acccecpt ride by user
       $(".deleteride").on("click" ,".acceptridebtn", function(){
        var id= $(this).data("aid");
        $.ajax({
                url : "../user/action.php",
                type : "POST",
                data : {uid:id, action:"acceptride"},
                success : function(data){
                    location.reload();
                }    
            })
       });
        
 })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>