<?php
session_start();
include_once "config.php";

// Check if the user is logged in
if(!isset($_SESSION['unique_id'])){
    header("location: ../login.php");
    exit();
}

$output = "";

// Check if the user is an admin
// if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1){
//     // Admin view: show all users
//     $sql = "SELECT * FROM  users ORDER BY user_id DESC";
// } else {
//     // Regular user view: show other users except the current user
//     $outgoing_id = $_SESSION['unique_id'];
//     $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
// }
    // Regular user view: show other users except the current user
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    } elseif(mysqli_num_rows($query) > 0){
        
        include_once "data.php";
    }

echo $output;
?>