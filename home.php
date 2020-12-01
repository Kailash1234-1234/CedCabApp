<?php 
require_once 'config.php';
require_once 'user/Bookride.php';
require_once 'user/user.php';
if (!isset($_SESSION['user_name']) || !isset($_SESSION['type']) || !isset($_SESSION['uid'])) {
   // header('location:home.php');
} else if(isset($_SESSION['user_name']) || isset($_SESSION['type'])==0 || isset($_SESSION['uid']) ) {
  if(isset($_SESSION['type'])==0){
     header('location:user/userdashboard.php');
  }
  else{
    header('location:admin/admindashboard.php');
  }
 
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" 
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <section id="header">
    <div class="container-fluid p-0 m-0">  
        <nav class="navbar navbarstyle navbar-expand-sm navbar-light">
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
                <a class="p-4" href="index.php">USER PANNEL</a>
                  <a class="p-4" href="#">ABOUT US</a>
                  <a class="p-4" href="#">SERVICES</a>
                  <a class="p-4" href="#">FEATURE</a>
                  <a class="p-4" href="#">REVIEWS</a>
              </ul>
              </form>
            </div>
          </nav>
  </div>
    </section> 
   </section> 
   <section id="main">
        <div class="rowleft bg-dark text-light">
                <h1 class=" text-center">Register Here !!</h1>
                    <form>
                        
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name">
                        
                     
                        <label for="email">User Name</label>
                        <input type="email" name="email" id="email">
                        
                       
                        <label for="phone">Mobile</label>
                        <input  type="number" name="phone" id="phone">
                        
                        <label for="password">password</label>
                        <input  type="password" name="password" id="password">
                        <label for="password">Re-Enter password</label>
                        <input  type="password" name="rpassword" id="rpassword">
                        <input type="button" class="btn btn-outline-success w-100 btn-lg" id="rbtn" value="Register Here..">
                    </form>
              
        </div>
        <div class="rowright bg-dark text-light">
            <h1 class="text-center">Login here !!</h1>
            <form action="login.php" method="POST">
                <label for="email">User Name</label>
                <input type="email" name="uemail" id="lemail">
                <label for="password">password</label>
                <input  type="password" name="upassword" id="lpassword">
                <input class="btn btn-outline-success w-100 btn-lg" type="submit"  id="lbtn" value="Login Here..">
            </form>
        </div>
   </section>
   <section id="footer">
    <div class="container-fluid p-0 m-0">  
        <nav class="navbar navbarstyle navbar-expand-sm navbar-light">
              <ul class="navbar-nav mr-auto"> 
                <a class="p-4" href="#">About Developer</a>
                <h1 class="logo ml-5 text-center">
                    <a class="navbar-brand " href="#"><span class="aa" > Ced-</span><span id="sp">Cab</span></a>
                  </h1>
              </ul>
             
              <form class="form-inline mr-5">
              <ul class="navbar-nav"> 
                <a class="p-4" href="#">REVIEWS</a>  <a class="p-4" href="#">Services</a>
                  <a class="p-4" href="#">Help Us</a>
              </ul>
              </form>
            </div>
          </nav>
  </div>
    </section> 
<?php
  $email = $_COOKIE["email"];
  $pass = $_COOKIE['pass'];
 echo "<script>
 document.getElementById('lemail').value='$email';
 document.getElementById('lpassword').value='$pass';
  </script>";
?>

   <script>
       $(document).ready(function(){
           // register user by ajax
        $("#rbtn").on("click", function(e){
            e.preventDefault();
            var name=$("#name").val();
            var email=$("#email").val();
            var password=$("#password").val();
            var rpassword=$("#rpassword").val();
            var phone=$("#phone").val();
            var phone = $('input[name="phone"]').val();
            if (name=='' || email==''|| password=='' || phone=='') {
                alert("All field Are required");
               
                if (name=='') {
                    alert("Name is required");
                    return false;
                }
                if (email=='') {
                    alert("User name is required");
                    return false;
                }
                if (password=='') {
                    alert("password is required");
                    return false;
                }
                if (phone=='') {
                    alert("Phone  is required") ;
                    return false;
                }
               } else {
              intRegex = /[0-9 -()+]+$/;
              if((phone.length < 9) || (phone.length > 12) || (!intRegex.test(phone)))
              {
                  alert('Please enter a valid phone number.');
                  return false;
              } 
               
               if (password!=rpassword) {
               alert(' Password mismatch try again  !!!'); 
               return false;
             } else {
              $.ajax({
                url: "register.php",
                type: "POST",
                data: {name:name, email:email, password:password, rpassword:rpassword, phone:phone},
                success: function(data){
                    alert("successfully registered please wait for login while your request are not accepted by Admin !!"); 
                    //loaddata();               }
            }
           })
        }
      }
       })
         // login user by ajax
      //    $("#lbtn").on("click", function(e){
      //       e.preventDefault();
      //       var email=$("#lemail").val();
      //       var password=$("#lpassword").val();
      //       $.ajax({
      //           url: "login.php",
      //           type: "POST",
      //           data: { email:email, password:password},
      //           success: function(data){
      //               alert(data); 
      //               //loaddata();               }
      //       }
      //   })
      //  })
       })
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
</body>
</html>