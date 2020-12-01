<?php
// session_start();
class AR
{
    public $name;
    public $distance;

    function addlocation($name, $distance, $conn)
    {
        $query = "INSERT INTO tbl_location(`name`, `distance`) 
        VALUES('{$name}', '{$distance}')";
        $result= mysqli_query($conn, $query) or die("error".print_r($conn));
        if ($result == true) {
            echo "success";
        } else {
            echo "error";
        }
    }

    function showlocation($conn){
        $arr=array();
        //$output='';
        $query= $query = "SELECT * FROM tbl_location";
        $result= mysqli_query($conn, $query) or die("error");
        // $output.='';
        while ($row=mysqli_fetch_assoc($result)) {
            // $output.='<option value='.$row["name"].'>'.$row["name"].'</option>';
            $this->arr[$row['name']]=$row['distance'];
        }
        return $this->arr;
    }
    function allLocation($conn)
    {
        $arr=array();
        //$output='';
        $query= $query = "SELECT * FROM tbl_location";
        $result= mysqli_query($conn, $query) or die("error");
        // $output.='';
        while ($uapdata=mysqli_fetch_assoc($result)) {
                $uaprow[]=$uapdata;
        }
        return $uaprow;
    }

    function  sortlocationTabledata($conn, $search) 
    {    
        echo $query = "SELECT * FROM `tbl_location` ORDER BY `$search` ASC";
        $result= mysqli_query($conn, $query) or die("error".print_r($conn));
        $output='  
        <tr>
        <th>Location Id</th>
        <th>Name</th>
        <th>Distance</th>
        <th>Availavility</th>
        <th>Action</th>
        </tr>';
        if (mysqli_num_rows($result)>0) {
            while ($row=mysqli_fetch_assoc($result)) {
                $output.= "<tr> 
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['distance']."</td>
                <td>".$row['is_available']."</td>
                <td><button  class='btn btn-success available' data-aid='".$row['id']."'>Available</button>
                <button  class='btn btn-primary notavailable' data-rid='".$row['id']."'>Not Available</button>
                <a href='#' class='btn btn-danger deleteloc' id='deletebtn' data-did='".$row['id']."'>delete</a></td>
                </tr>";
            }
            $output.="";
        }
        echo $output;
    }
    
    
    function isAvailable($conn, $rid){
        $sql="UPDATE `tbl_location` SET `is_available` = 1  where  `id` = '$rid'";
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
    }
    function isNotAvailable($conn, $rid){
        $sql="UPDATE `tbl_location` SET `is_available` = 0  where  `id` = '$rid'";
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function  deleteLoc($conn, $rid){
        $sql = "DELETE FROM tbl_location WHERE `id`= '$rid'";
        //$result= mysqli_query($conn, $sql) or die("error".$conn);
        if (mysqli_query($conn, $sql)==true) {
            return 1;
        } else {
            return 0;
        }
    }

    function deleteridedata($conn, $rid)
    {
        $sql = "DELETE FROM tbl_ride WHERE `ride_id`= '$rid'";
        //$result= mysqli_query($conn, $sql) or die("error".$conn);
        if (mysqli_query($conn, $sql)==true) {
            return 1;
        } else {
            return 0;
        }
    }



    function cancelridedata($conn, $rid) 
    {
         $sql="UPDATE `tbl_ride` SET `status` = 0 where  `ride_id` = '$rid'";
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
    }

    function completeridedata($conn, $rid)
    {
        $sql="UPDATE `tbl_ride` SET `status` = 2 where  `ride_id` = '$rid'";
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
    }


    function acceptridedata($conn, $rid) 
    {

        $sql="UPDATE `tbl_ride` SET `status` = 2 where  `ride_id` = '$rid'";
        if (mysqli_query($conn, $sql)) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
?>