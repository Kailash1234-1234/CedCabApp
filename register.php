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
// session_start();
require_once 'config.php';
require_once 'user/user.php';
$con=new Config();
$conn=$con->createConnection();
$user=new user();
$name= $_POST['name'];
$email=$_POST['email'];
$password= $_POST['password'];
$rpassword= $_POST['rpassword'];
$phone=$_POST['phone'];
if ($name=='' || $email==''|| $password=='' || $phone=='') {
    echo "All field Are required";
    if ($name=='') {
        echo "Name is required";
    }
    if ($email=='') {
        echo "User name is required";
    }
    if ($password=='') {
        echo "password is required";
    }
    if ($phone=='') {
        echo "Phone  is required";
    }
} else {
    $password= md5($_POST['password']);
    $rpassword= md5($_POST['rpassword']);
    $user->register($email, $name, $password, $phone, $conn);
}
?>