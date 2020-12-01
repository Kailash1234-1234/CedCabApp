<?php
 session_start();
require_once 'config.php';
require_once 'admin/AR.php';
   $con=new Config();
   $conn=$con->createConnection();
   $arl=new AR();
   $data=$arl->showlocation($conn);
  // print_r($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page !!</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="userstyle.css">
</head>
<body>
<div class="container-fluid p-0 m-0 fixed-top">  
      <nav class="navbar navbarstyle navbar-expand-sm navbar-light">
          <h1 class="logo ml-5 ">
              <a class="navbar-brand" href="#"><span class="aa" > Ced-</span><span id="sp">Cab</span></a>
          </h1>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"> 
            </ul>
            <form class="form-inline mr-5">
            <ul class="navbar-nav"> 
            <a class="p-4" href="#"></a>
                <a class="p-4" href="#">FEATURE</a>
                <a class="p-4" href="#">REVIEWS</a>
                <?php if (isset($_SESSION['user_name'])) { ?>
                     <a  class="mt-3 mb-3 mr-3 btn btn-outline-danger" href="logout.php">Logout</a>  
                <?php   } else { ?>
                <a  class="mt-3 mb-3 mr-3 btn btn-outline-primary" href="home.php">LOGIN</a>   
              
                <?php  } ?> 
            </ul>
            </form>
          </div>
        </nav>
    </div>
<div class="container-fluid back pb-5 m-0 p-0">
    <div class="row text-center text-light">
        <div class="col pt-3">
            <h2 class="hh">Book a city Taxi to your destination in town</h2>
            <p class="">Chose from a range of categories and price</p>
        </div>
    </div> 
    <div class="row text-center text-light">
        <div class="col pt-3">
            <h2 class="hh">Book a city Taxi to your destination in town</h2>
            <p class="">Chose from a range of categories and price</p>
        </div>
    </div> 
    <div class="row pl-5 pr-5">
        <div class="col-sm-6  col-md-6 col-lg-5 col-xl-4  bg-light text-center mb-3 p-5">
            <div class="card-header bg-light">
                <span class=" p-2 myspan">CITY TAXI</span>
            </div>
            <h5 class="mt-2">Your everyday travel partner !!</h5>
            <p>AC cabs for piont to point travel</p>
            <form>   
                <div class="input-group mb-2 input-group-text2">
                    <div class="input-group-prepend">
                        <div class="input-group-text input-group-text2">PICUP</div>
                    </div>
                    <select class="form-control input-group-text2" id="currentlocation">
                        <option value="">Select Current Location</option>
                        <?php
                        foreach ($data as $k=> $val) { ?>
                            <option value="<?php echo $k ?>"><?php echo $k ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text input-group-text2">DROP</div>
                    </div>
                    <select class="form-control input-group-text2" id="droplocation">
                    <option value="">Select drop Location</option>
                    <?php
                    foreach ($data as $k=> $val) { ?>
                        <option value="<?php echo $k ?>"><?php echo $k ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text input-group-text2">CAB TYPE</div>
                    </div>
                    <select class="form-control input-group-text2" id="cabtype">
                        <option value="">Select CAB Type</option>
                        <option value="CedMicro">CedMicro</option>
                        <option value="CedMini">CedMini</option>
                        <option value="CedRoyal">CedRoyal</option>
                        <option value="Ced SUV">Ced SUV</option>
                    </select>
                </div>
                <div class="input-group mb-2" id="lgw">
                    <div class="input-group-prepend">
                        <div class="input-group-text input-group-text2">LUGGAGE</div>
                    </div>
                    <input class="form-control input-group-text2" type="text" onKeyPress="return check()" name="place" id="luggage">
                </div>
                <div class="input-group mb-2">
                    <input type="button" class="btn text-center w-100 mybtn" id="btn" value="Calculate Fare">
                </div>
            </form>
        </div>
        <div class="col-sm-6" id="details">
            <div class=" bg-light text-center ">
            <div class="card-body bg-light" >
                <span class="p-2 w-100 myspan">CITY TAXI</span>
                <h5 class="pt-2">Your everyday travel partner !!</h5>
                <p>AC cabs for piont to point travel</p>
                <div class="text-left" id="showresult">
               
                </div>
                <button type="button" class="btn mybtn text-center w-25" id="idbtn">Close</button>
                <a type="button" href="user/userdashboard.php"  class="btn mybtn text-center w-50" id="printbtn">Book Now</a>
            </div>
            </div>
        </div>
    </div>
</div>
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
              <h1 class="mt-4"><a href="#"><span class="aa" > Ced-</span><span id="sp">Cab</span></a></h1>
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
        // function check(){
        //     if((event.keyCode>47) && (event.keyCode<58)){
        //         return true;
        //     } else {
        //         alert("Enter a number");
        //         return false;
        //     }
        // }
        $("#details").hide();
        var luggage= $("#luggage").val()
        $("#luggage").on("input", function(){
            var luggage= $("#luggage").val()
           if (isNaN($('#luggage').val())){
             alert('not a number');
             luggage='';
           } else {
            luggage+=$('#luggage').val();
           } 
        });
       
        var type=  $("#cabtype").val();
        $("#cabtype").change(function(){
            if( $("#cabtype").val()=='CedMicro'){
                $("#lgw").hide();
            }
            else{
                $("#lgw").show();  
            }
        })
      
        $("#btn").on("click", function(e){
            e.preventDefault();
            var currentlocation= $("#currentlocation").val();
            var droplocation= $("#droplocation").val();
            var type=  $("#cabtype").val();
            var rfrom= $("#rfrom").val();
            if(type=='CedMicro'){
                var luggage=0;
            } else{
                var luggage= $("#luggage").val();
            }
            if((currentlocation=='' || droplocation=='' || type=='')){
              if(currentlocation==''){
                alert("select Current location");
              }
              if(droplocation==''){
                alert("select drop location");
              }
              if(type==''){
                alert("select Cab type");
              }
             
          } else {

             if(currentlocation==droplocation){
                alert("Source and Destination Both Are Same");
                return false;
             } else {
           // alert(type+luggage+droplocation+currentlocation);
            $.ajax({
                url:"calculatefare.php",
                type:"POST",
                data : {current:currentlocation, drop:droplocation, type:type, lugg:luggage},
                success : function(data){
                    $("#details").show();
                    $("#showresult").html(data);
                  
                }
            })
          }
          }
        
        })

        $("#idbtn").click(function(){
            $("#details").hide();
           
         })

    function printData(){
        var divToPrint=document.getElementById("showresult");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
    $('#printbtn').on('click',function(){
       // printData();
      
    }) 
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

