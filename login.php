<?php
/**
 * Recipe class file
 *
 * PHP Version 5.2
 *
 * @category Recipe
 * @package  Recipe
 * @author   Lorna Jane Mitchell <lorna@ibuildings.com>
 * @license  http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link     http://example.com/recipes
 */

 
require_once 'config.php';
require_once 'user/user.php';
$con=new Config();
$conn=$con->createConnection();
$user=new user();
$email=$_POST['uemail'];
$password= $_POST['upassword'];

if ($email=='' || $password=='') {
    echo "<script>alert('User Name And Password Required!!!')</script>"; 
    header("Location:home.php");
} else {
    setcookie("email", $email, time()+60*60*24*10);
    setcookie("pass", $password, time()+60*60*24*10);   
    $password=md5($_POST['upassword']);
   
    $user->login($email, $password, $conn);

}

?>



