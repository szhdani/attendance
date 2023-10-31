<?php
    require_once 'db/conn.php';
    if(!isset($_POST['id'])){
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_POST['id'];
        $result = $crud->deleteAttendee($id);
        if($result){
            header("Location: viewrecords.php?result=$result");
        }
        else{
            include 'includes/errormessage.php';
        }
    }
?>