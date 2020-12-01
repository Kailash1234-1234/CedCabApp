<body>
    <h1>Welcome to user dashboard !!</h1>
    <?php
        echo $_SESSION['user_name'];
        echo $_SESSION['name'];
        echo $_SESSION['dos'];
    ?>
    <div class="tabledata" id="showuser">
    
    </div>


<script>
 $(document).ready(function(){
     alert("i am user dashboard")
     function loaddata(){
         var action="load";
         $.ajax({
             url : "action.php",
             type : "POST",
             data : {
                 action: action
             },
             success : function(data){
                 $("#showuser").html(data);
             }
         })
     }
     loaddata();
 })
</script>









<div class="container-fluid back pb-5 m-0 p-0">
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
                        <option value="Charbagh">Charbagh</option>
                        <option value="Indra Nagar">Indra Nagar</option>
                        <option value="BBD">BBD</option>
                        <option value="Barabanki">Barabanki</option>
                        <option value="Faizabad">Faizabad</option>
                        <option value="Basti">Basti</option>
                        <option value="Gorakhpur">Gorakhpur</option>
                    </select>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text input-group-text2">DROP</div>
                    </div>
                    <select class="form-control input-group-text2" id="droplocation">
                        <option value="">Select drop Location</option>
                        <option value="Charbagh">Charbagh</option>
                        <option value="Indra Nagar">Indra Nagar</option>
                        <option value="BBD">BBD</option>
                        <option value="Barabanki">Barabanki</option>
                        <option value="Faizabad">Faizabad</option>
                        <option value="Basti">Basti</option>
                        <option value="Gorakhpur">Gorakhpur</option>
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
                    <input class="form-control input-group-text2" type="text" name="place" id="luggage">
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
                <div class="text-left" id="showresult">
               
        <div class="tabledata" id="showuser">
    
        </div>

                </div>
                <button type="button" class="btn mybtn text-center w-25" id="idbtn">Close</button>
                <button type="button"  class="btn mybtn text-center w-25" id="printbtn">Book Now</button>
            </div>
            </div>
        </div>
    </div>
</div>