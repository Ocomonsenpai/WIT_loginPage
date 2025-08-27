<?php 
error_reporting(E_ALL); 
ini_set('display_errors', 1); 

$conn = mysqli_connect("localhost", "root", "", "psits");
 
if (!$conn) { 
    die("Connection failed: " . mysqli_connect_error()); 
    } 
if (!isset($_POST['email'], $_POST['password'], $_POST['mobile'])) { 
    die("Form data missing. Make sure your form uses method='POST' and correct input names."); 
    } 
    $email = $_POST['email']; 
    $password = $_POST['password']; 
    $mobile = $_POST['mobile']; 
    $sql = "SELECT * FROM students WHERE email='$email' AND 
    password='$password' AND 
    mobile='$mobile'"; 
    $result = mysqli_query($conn, $sql); if (!$result) { 
        die("Query failed: " . mysqli_error($conn)); 
        } 
    if (mysqli_num_rows($result) > 0) { 
        echo "✅ Login successful!"; 
        } 
    else { 
        echo "❌ Invalid email, password, or mobile number."; } 
?>