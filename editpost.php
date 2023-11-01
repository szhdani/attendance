<?php
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    if(!isset($_POST['id'])){
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    }
    else{
        $id = $_POST['id'];
        if($crud->attendeeExists($id)){
            if(isset($_POST['submit'])){
                $fname = $_POST['firstname'];
                $lname = $_POST['lastname'];
                $dob = $_POST['dob'];
                $email = $_POST['email'];
                $contact = $_POST['phone'];
                $specialty = $_POST['specialty'];
    
                $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty);
    
                if($result){
                    header("Location: viewrecords.php?result=$result");
                }
                else{
                    include 'includes/errormessage.php';
                }
            }
            else{
                include 'includes/errormessage.php';
            }
        }
        else{
            include 'includes/idnotfound.php';
        }
    }
?>