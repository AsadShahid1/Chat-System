<?php 
     session_start();
    // include "db.php";
    include ('../inc/conn.php');


    // $obj = new Database('batch' , 'chats');
    // echo "coming";
        
    if(isset($_SESSION['id'])){
        
        // $date = time();
        $sender_id = $_SESSION['id'];
        $group_id = $_GET['group_id'];
        $message = $_GET['msg'];
        if(!empty($message)){
            $sql = mysqli_query($con,"INSERT INTO group_msg (msg, group_id, sender_id)
            VALUES ({$message}, {$group_id}, {$sender_id})");
            if($sql){
                echo "successfully inserted";
            }
            else{
                echo mysqli_error($con);
               }
        }
    }


    
?>