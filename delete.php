<?php
// include database connection file
require_once 'config.php';
// Code for record deletion
if (isset($_REQUEST['del'])) {
    //Get row id
    $carId = intval($_GET['del']);
    //Qyery for deletion
    $sql = "delete from car_info WHERE  CarID=:id";
    // Prepare query for execution
    $query = $conn->prepare($sql);
    // bind the parameters
    $query->bindParam(':id', $carId, PDO::PARAM_STR);
    // Query Execution
    $query->execute();
    // Mesage after updation
    // echo "<script>alert('Record deleted successfully');</script>";
    // Code for redirection
    echo "<script>window.location.href='index.php'</script>";
}