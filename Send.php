<?php
include 'Config.php';

session_start();

$name= "";
$MobileNumber="";
$address = "";
$id = 0;
$edit_state = false;

if(isset($_POST['Save'])) {
$name =$_POST['name'];
$mobile = $_POST['MobileNumber'];
$Address = $_POST['Address'];


$sql="insert into info(Name,Mobile,Address) values ('$name','$mobile','$Address')"; //insert records to database
$result = $conn-> query($sql);
header("Location: index.php");
}

if(isset($_POST['Update'])) {
     $Name =$_POST['name'];
     $Mobile =$_POST['MobileNumber'];
     $Address =$_POST['Address'];
     $id =$_POST['id'];    
    
    mysqli_query($conn, "Update info set Name='$Name',Mobile='$Mobile', Address = '$Address' where id=$id");
    $_SESSION['msg'] = "Address Updated";
    header("Location: index.php");
    

}

if(isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($conn, "Delete from info where id=$id");
    $_SESSION['msg'] ="Address deleted";
       header("Location: index.php");
    
}

$results = mysqli_query($conn, "SELECT * from info"); //retrieve records


?>